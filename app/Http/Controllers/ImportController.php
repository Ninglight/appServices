<?php

namespace App\Http\Controllers;

use App\Import;
use App\Product;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = \App\Category::all();
        return view('import.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('file')->getRealPath();
        $category_id = $request->get('category_id');

        $stack = [];

        // On parse les lignes du fichier CSV dans un tableau
        if (($handle = fopen($path, 'r')) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ',', '"')) !== FALSE) {

                array_push($stack, $data);
            }
            fclose($handle);
        }

        // On regarde si le fichier CSV contenait dans enregistrement
        if (count($stack) > 0) {
            // On regarde si il existe un header dans le fichier
            if ($request->has('header')) {
                $csv_header_fields = [];
                // Si oui, on crée un tableau avec les titres des champs
                foreach ($stack[0] as $key => $value) {
                    $csv_header_fields[] = $value;
                }
                unset($stack[0]);
            }

            // On récupère que les 10 premiers histoires de tester.
            $rows = array_slice($stack, 0, 10);

            $request->session()->put('import', [
                'filename' => $request->file('file')->getClientOriginalName(),
                'header' => $csv_header_fields,
                'category_id' => $category_id,
                'data' => json_encode($rows)
            ]);

        } else {
            return redirect()->back()->with('error', 'Le fichier CSV transmit ne comporte pas de ligne.');
        }

        // Préparation des attributs pour faire correspondre l'import
        $match_attributes = $this->getMatchingAttributes();

        return view('import.results', compact('csv_header_fields', 'rows', 'match_attributes'));

    }

    public function getMatchingAttributes()
    {

        $attributes = \App\Attribute::all();
        $columns = \App\Product::columns();

        $match_attributes = [];

        array_push($match_attributes, [
            'name' => 'undefined',
            'source' => 'undefined'
        ]);

        foreach ($columns as $column) {

            // On ne recupère pas l'id, vu que c'est un incrément, et le prix et la marque id parce qu'on le gère dans les attributs
            if ($column->COLUMN_NAME != 'id') {

                array_push($match_attributes, [
                    'name' => $column->COLUMN_NAME,
                    'source' => 'Product'
                ]);
            }

        }

        foreach ($attributes as $attribute) {

            if($attribute->identification != 'brand' && $attribute->identification != 'price' ) {

                array_push($match_attributes, [
                    'attribute_id' => $attribute->id,
                    'name' => $attribute->identification,
                    'source' => 'Attribute',
                    'assignment_multiple' => $attribute->assignment_multiple
                ]);

            }
        }

        return $match_attributes;

    }

    public function processImport(Request $request)
    {
        // On récupère les données
        $data = $request->session()->get('import');
        $category_id = $data['category_id'];

        // On le récupère sous forme de tableau
        $rows = json_decode($data['data'], true);

        // On récupère les attributs
        $match_attributes = $this->getMatchingAttributes();

        // On récupère le source des attributs qui ont été donner en paramètre
        $param_attributes = $request->fields;

        // On fait correpondre les données des attributs avec ceux passés dans les colunnes
        $import_attributes = [];

        foreach ($param_attributes as $param_attribute) {

            foreach ($match_attributes as $match_attribute) {

                if ($match_attribute['name'] === $param_attribute) {
                    array_push($import_attributes, $match_attribute);
                }

            }

        }

        // On prépare le tableau pour les injections dans la base de données
        $injectable_products = [];

        // On prépare un tableau pour les lignes qui n'ont pas été ajouté
        $errors = [];

        // On prépare un tableau pour les lignes qui ont été ajouté
        $sucess = [];

        foreach ($rows as $row) {

            $injectable_product = new \App\Product;
            $injectable_product->category_id = $category_id;

            $injectable_attributes = [];

            foreach ($row as $cell_key => $cell) {

                foreach ($import_attributes as $import_attribute_key => $import_attribute) {

                    // On ne s'occupe pas des colonnes en undefined
                    if ($import_attribute['name'] != 'undefined' || $import_attribute['name'] != 'category_id') {

                        // On match entre la colonne et le cellule de la ligne produit
                        if ($cell_key === $import_attribute_key) {

                            // Si l'attribut est pour le produit
                            if ($import_attribute['source'] == 'Product') {

                                $product_param = strval($import_attribute['name']);

                                // Quelques traitements de règle métier
                                if ($product_param == 'status') {

                                    if ($cell == 'Enabled') {
                                        $injectable_product->$product_param = 1;
                                    } else {
                                        $injectable_product->$product_param = 0;
                                    }

                                // Si le parametre produit est le prix, on créer aussi un attribut pour le prix
                                } elseif ($product_param == 'brand_id') {

                                    // On recherche l'id de la marque passé en paramètre
                                    $brand = \App\Brand::where('name', $cell)->firstOrFail();
                                    $brand_default_value = \App\DefaultValue::where('value', $cell)->firstOrFail();

                                    $injectable_product->$product_param = $brand->id;

                                    $injectable_product_value = new \App\ProductValue;
                                    $injectable_product_value->attribute_id = $brand_default_value->attribute->id;
                                    $injectable_product_value->default_value_id = $brand_default_value->identification;
                                    array_push($injectable_attributes, $injectable_product_value);

                                // Si le parametre produit est la marque, on créer aussi un attribut pour le marque
                                } elseif ($product_param == 'price') {

                                    $injectable_product->$product_param = $cell;

                                    $price_attribute = \App\Attribute::where('identification', 'price')->firstOrFail();

                                    if($cell < 100) {

                                        $injectable_product_value = new \App\ProductValue;
                                        $injectable_product_value->attribute_id = $price_attribute->id;
                                        $injectable_product_value->default_value_id = 100;

                                    } elseif($cell > 100 && $cell < 200) {

                                        $injectable_product_value = new \App\ProductValue;
                                        $injectable_product_value->attribute_id = $price_attribute->id;
                                        $injectable_product_value->default_value_id = 150;

                                    } elseif($cell > 200) {

                                        $injectable_product_value = new \App\ProductValue;
                                        $injectable_product_value->attribute_id = $price_attribute->id;
                                        $injectable_product_value->default_value_id = 200;

                                    }

                                    if($injectable_product_value->default_value_id) {

                                        array_push($injectable_attributes, $injectable_product_value);

                                    }

                                } else {

                                    $injectable_product->$product_param = $cell;

                                }

                            }

                            if ($import_attribute['source'] == 'Attribute') {

                                // Si default_value est null on injecte pas dans la tableau
                                if ($cell) {

                                    $injectable_product_value = new \App\ProductValue;
                                    $injectable_product_value->attribute_id = $import_attribute['attribute_id'];
                                    $injectable_product_value->default_value_id = $cell;
                                    array_push($injectable_attributes, $injectable_product_value);

                                    /*// Si on a qu'un seul assignement, on va juste préparer le product value
                                    if ($import_attribute['assignment_multiple'] == 0) {



                                    // Si on a plusieurs assignement, on va bouclé sur les valeurs par défaut de l'attribut pour retrouver ce qui est dans la cellule
                                    } else {

                                        $attribute = \App\Attribute::where('identification', $import_attribute['name'])->firstOrFail();

                                        if($attribute) {

                                            foreach ($attribute->default_values as $default_value) {

                                                if(strpos($cell, $default_value->identification) == true || $cell == $default_value->identification) {

                                                    $injectable_product_value = new \App\ProductValue;
                                                    $injectable_product_value->attribute_id = $import_attribute['attribute_id'];
                                                    $injectable_product_value->default_value_id = $default_value->id;
                                                    array_push($injectable_attributes, $injectable_product_value);

                                                }

                                            }

                                        }

                                    }*/



                                }

                            }

                        }

                    }

                }


            }

            $injectable_data = [
                'product' => $injectable_product,
                'attributes' => $injectable_attributes
            ];

            array_push($injectable_products, $injectable_data);

        }

        foreach ($injectable_products as $injectable_data) {

            try {

                $product_tmp = \App\Product::where('constructor_reference', $injectable_data['product']->constructor_reference)->firstOrFail();

                if($product_tmp->id) {
                    $injectable_data['product']->id = $product_tmp->id;
                    $injectable_data['product']->save();
                } else {
                    $injectable_data['product']->save();
                }

                $injectable_data['product'] = \App\Product::where('constructor_reference', $injectable_data['product']->constructor_reference)->firstOrFail();
                array_push($sucess, $injectable_data['product']);

            } catch (\Exception $e) {

                $error = [
                    'id' => $e->getCode(),
                    'message' => $e->getPrevious()->getMessage()
                ];

                array_push($errors, $error);

                // On doit quand même récupérer l'id pour les attributs.

                $injectable_data['product'] = \App\Product::where('constructor_reference', $injectable_data['product']->constructor_reference)->firstOrFail();
            }



            // Duplication d'une clé unique, donc on test quand même d'ajouter les attributs
            if (!$error['id'] = 23000) {
                break;
            }

            // On réalise les affections par l'identifiant
            // On boucle sur les attributs
            foreach ($injectable_data['attributes'] as $product_value) {

                // On gère si nos attributs peuvent avoir plus de valeur
                if ($product_value->attribute->assignment_multiple == 1) {

                    $product_values = [];

                    //On boucle sur les valeurs par défaut de l'attribut
                    foreach ($product_value->attribute->default_values as $default_value) {

                        // Si l'identifiant est reconnu dans la valeur prête à être injecter, on y associe la valeur par defaut
                        if (strpos($product_value->default_value_id, $default_value->identification) == true || $product_value->default_value_id == $default_value->identification) {

                            array_push($product_values, $default_value->id);

                        }

                    }


                } else {

                    //On boucle sur les valeurs par défaut de l'attribut
                    foreach ($product_value->attribute->default_values as $default_value) {

                        // Si l'identifiant est reconnu dans la valeur prête à être injecter, on y associe la valeur par defaut
                        if (strpos($product_value->default_value_id, $default_value->identification) == true || $product_value->default_value_id == $default_value->identification) {

                            $product_value->default_value_id = $default_value->id;

                        }

                    }

                    $product_value->product_id = $injectable_data['product']->id;

                    try {
                        $product_value->save();
                        array_push($sucess, $product_value);
                    } catch (\Exception $e) {

                        $error = [
                            'id' => $e->getCode(),
                            'message' => $e->getPrevious()->getMessage()
                        ];

                        array_push($errors, $error);

                    }

                }


            }

        }

        return view('import.sucess', ['import_errors' => $errors, 'import_sucess' => $sucess]);
    }

}
