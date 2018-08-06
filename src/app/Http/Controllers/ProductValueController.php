<?php

namespace App\Http\Controllers;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|max:255',
            'default_value_id' => 'required|max:255'
        ]);

        $product_value= new \App\ProductValue;
        $product_value->product_id=$request->get('product_id');
        $product_value->default_value_id=$request->get('default_value_id');

        $product_value->save();

        //Le with va aller intégrer le tableau avec la clé "success" dans la variable de session
        return redirect('product_values')->with(['success' => "La valeur du produit a bien été ajouté"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required|max:255',
            'default_value_id' => 'required|max:255'
        ]);

        $product_value= \App\ProductValue::find($id);
        $product_value->product_id=$request->get('product_id');
        $product_value->default_value_id=$request->get('default_value_id');

        $product_value->save();

        //Le with va aller intégrer le tableau avec la clé "success" dans la variable de session
        return redirect('product_values')->with(['success' => "La valeur du produit a bien été mis à jour"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_value = \App\ProductValue::find($id);
        $product_value->delete();
        return redirect('product_values')->with("success","La valeur du produit a bien été supprimé");
    }
}
