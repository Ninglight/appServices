<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = \App\Category::all();
        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            'name' => 'required|max:255|unique:categories',
            'image' => 'required|file|max:500000',
            'identification' => 'required|max:255',

        ]);

        $category= new \App\Category;
        $category->name=$request->get('name');
        $category->url_img=$this->manageImageCategory($request->file('image'));
        $category->identification=$request->get('identification');
        $category->save();

        //Le with va aller intégrer le tableau avec la clé "success" dans la variable de session
        return redirect('admin/categories')->with(['success' => "La catégorie a bien été ajoutée"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = \App\Category::find($id);
        return view('categories.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = \App\Category::find($id);
        return view('categories.edit', ['category' => $category]);
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
            'name' => 'required|max:255',
            'image' => 'file|max:500000',
            'identification' => 'required|max:255'
        ]);

        $category= \App\Category::find($id);
        $category->name=$request->get('name');

        if ($request->file('image')) {
            // Destroy brand icon before add new
            Storage::delete('public/'.$category->url_img);
            $category->url_img=$this->manageImageCategory($request->file('image'));

        }

        $category->identification=$request->get('identification');

        $category->save();

        //Le with va aller intégrer le tableau avec la clé "success" dans la variable de session
        return redirect('admin/categories')->with(['success' => "La catégorie a bien été mise à jour"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = \App\Category::find($id);
        $category->delete();
        return redirect('admin/categories')->with('success','La catégorie a bien été supprimée');
    }

    public function manageImageCategory($image)
    {
        $path=$image->store('public/category');
        return $path=str_replace("public/", "", $path);
    }
}
