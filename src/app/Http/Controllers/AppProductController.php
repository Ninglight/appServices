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
    public function index($filters)
    {
        $products = \App\Product::all();
        return view('app.products.index', ['products' => $products]);
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
