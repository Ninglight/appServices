<?php

namespace App\Http\Controllers;

use App\ProductValue;
use Illuminate\Http\Request;

class ProductValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_values = \App\ProductValue::all();
        return view('product_values.index', ['product_values' => $product_values]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = \App\Product::all();
        $default_values = \App\DefaultValue::all();
        return view('default_values.create', ['products' => $products, 'default_values' => $default_values]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|max:255',
            'attribute_id' => 'required|max:255',
            'default_value_id' => 'required|max:255'
        ]);

        $product_value = new \App\ProductValue;
        $product_value->product_id = $request->get('product_id');
        $product_value->attribute_id = $request->get('attribute_id');
        $product_value->default_value_id = $request->get('default_value_id');

        $product_value->save();

        //Le with va aller intégrer le tableau avec la clé "success" dans la variable de session
        return redirect('product_values')->with(['success' => "La valeur du produit a bien été ajouté"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product_value = \App\ProductValue::find($id);
        return view('product_values.show', ['product_value' => $product_value]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_value = \App\ProductValue::find($id);
        $default_values = \App\DefaultValue::all();
        $products = \App\Product::all();
        return view('default_values.edit', ['product_value' => $product_value, 'default_values' => $default_values, 'products' => $products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {

        $product = \App\Product::find($product_id);
        $attributes = $product->category->attributes;

        foreach ($attributes as $attribute) {

            // assignement unique
            if ($attribute->assignment_multiple == 0) {

                if ($request->get($attribute->name) != 'null') {

                    if (ProductValue::where('product_id', $product->id)->where('attribute_id', $attribute->id)->count() > 0) {
                        // Il existe un enregistrement avec ce produit et cet attribut
                        // On met à jour

                        $product_value = ProductValue::where('product_id', $product->id)->where('attribute_id', $attribute->id)->firstOrFail();

                        $product_value->default_value_id = $request->get($attribute->identification);

                        $product_value->save();

                    } else {
                        // Il n'existe pas d'enregistrement avec ce produit et cet attribut
                        // On crée

                        $product_value = new \App\ProductValue;
                        $product_value->product_id = $product->id;
                        $product_value->attribute_id = $attribute->id;
                        $product_value->default_value_id = $request->get($attribute->identification);



                        $product_value->save();
                    }

                } else {

                    $this->destroy($product->id, $attribute->id);
                }

                // assignement multiple
            } else {

                if($request->get($attribute->name)) {

                    $default_values = $request->get($attribute->identification);

                    // Suppression de toutes les products values d'insérés

                    $this->destroy($product->id, $attribute->id);

                    foreach ($default_values as $default_value) {

                        if ($default_value != 'null') {

                            $product_value = new \App\ProductValue;
                            $product_value->product_id = $product->id;
                            $product_value->attribute_id = $attribute->id;
                            $product_value->default_value_id = $default_value;

                            $product_value->save();

                        }

                    }
                }

            }

        }

        //Le with va aller intégrer le tableau avec la clé "success" dans la variable de session
        return redirect('/admin/products/' . $product->id . '/edit#profile')->with(['success' => "La valeur du produit a bien été mis à jour"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id, $attribute_id)
    {
        $product_values = \App\ProductValue::getProductValueByProductByAttribute($product_id, $attribute_id);
        foreach ($product_values as $product_value) {
            $product_value->delete();
        }
        return;
    }

    public static function getProductValues($product_id, $attribute_id)
    {
        $attribute = \App\Attribute::find($attribute_id);

        $product_values = ProductValue::getProductValueByProductByAttribute($product_id, $attribute_id);

        if ($attribute->assignement_multiple == 0) {
            return $product_values[0];
        } else {
            return $product_values;
        }

    }

}
