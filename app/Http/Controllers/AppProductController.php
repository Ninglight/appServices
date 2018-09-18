<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function select()
    {
        $categories = \App\Category::all();
        return view('app.products.select', ['categories' => $categories]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // On récupère la catégorie passée en paramètre
        $category = \App\Category::find($request->get('category'));

        // On récupère la liste des filtres passée en paramètre
        $filters = $request->get('filters');

        // On récupère la liste de produits actifs depuis la catégorie
        $products = \App\Product::getActivatedProductByCategory($category->id);

        // Si on a des filtres, on va pouvoir filtrer notre liste de produit
        if (isset($filters)){

            foreach ($filters as $key => $filter) {
                $filters[$key] = \App\DefaultValue::find($filter);
            }

            // On boucle sur la liste de produit
            foreach($products as $key => $product) {

                //On initialise la valeur qui sera utilisé pour compter si le produits passe tous les filtres
                $product->filtered = 0 ;

                // On boucle sur les filtres = default_value
                foreach ($filters as $filter){

                    $product->product_values->firstWhere('default_value_id', $filter->id);

                    // On boucle sur les valeurs du produit
                    foreach ($product->product_values as $product_value) {

                        // Si les default_values sont équivalents
                        if ($filter->id == $product_value->default_value_id){

                            ++$product->filtered;

                        }

                    }

                }



                if($product->filtered != count($filters)) {
                    unset($products[$key]);
                }

            }

        }


        return view('app.products.index', ['category' => $category, 'products' => $products, 'filters' => $filters]);
    }

    public function updateFilters(Request $request) {

        $category = \App\Category::find($request->get('category'));

        $filters = [];

        // On boucle sur les attributs
        foreach ($category->attributes as $attribute) {



            // On regarde si il y a eu une valeur de passée en paramètre par rapport à l'attribut
            if($request->get($attribute->identification)) {

                foreach ($request->get($attribute->identification) as $default_value) {

                    // On ajoute à la liste l'id de la valeur par défaut passée en paramètre
                    array_push($filters, $default_value);

                }

            }

        }


        return redirect()->action('AppProductController@index', ['category' => $category->id, 'filters' => $filters]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = \App\Product::find($id);
        return view('app.products.show', ['product' => $product]);
    }

}
