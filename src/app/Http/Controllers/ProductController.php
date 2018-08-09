<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = \App\Product::all();
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = \App\Brand::all();
        $categories = \App\Category::all();
        return view('products.create', ['brands' => $brands, 'categories' => $categories]);
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
            'name' => 'required|max:255|unique:products',
            'description' => 'required|max:255',
            'constructor_reference' => 'required|max:255|unique:products',
            'connexing_reference' => 'required|max:255|unique:products',
            'price' => 'required|max:255',
            'url_ecommerce' => 'required|max:255',
            'category_id' => 'required|max:255',
            'brand_id' => 'required|max:255',
        ]);

        $product= new \App\Product;
        $product->name=$request->get('name');
        $product->description=$request->get('description');
        $product->constructor_reference=$request->get('constructor_reference');
        $product->connexing_reference=$request->get('connexing_reference');
        $product->price=$request->get('price');
        $product->url_ecommerce=$request->get('url_ecommerce');
        $product->category_id=$request->get('category_id');
        $product->brand_id=$request->get('brand_id');

        $product->save();

        //Le with va aller intégrer le tableau avec la clé "success" dans la variable de session
        return redirect('admin/products')->with(['success' => "Le produit a bien été ajouté"]);
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
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = \App\Product::find($id);
        $brands = \App\Brand::all();
        $categories = \App\Category::all();
        return view('products.edit', ['product' => $product, 'brands' => $brands, 'categories' => $categories]);
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
            'name' => 'required|max:255|unique:products',
            'description' => 'required|max:255',
            'constructor_reference' => 'required|max:255|unique:products',
            'connexing_reference' => 'required|max:255|unique:products',
            'price' => 'required|max:255',
            'url_ecommerce' => 'required|max:255',
            'category_id' => 'required|max:255',
            'brand_id' => 'required|max:255',
        ]);

        $product= \App\Product::find($id);
        $product->name=$request->get('name');
        $product->description=$request->get('description');
        $product->constructor_reference=$request->get('constructor_reference');
        $product->connexing_reference=$request->get('connexing_reference');
        $product->price=$request->get('price');
        $product->url_ecommerce=$request->get('url_ecommerce');
        $product->category_id=$request->get('category_id');
        $product->brand_id=$request->get('brand_id');

        $product->save();

        //Le with va aller intégrer le tableau avec la clé "success" dans la variable de session
        return redirect('admin/products')->with(['success' => "Le produit a bien été mis à jour"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = \App\Product::find($id);
        $product->delete();
        return redirect('admin/products')->with('success','Le produit a bien été supprimé');
    }
}
