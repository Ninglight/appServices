<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = \App\Brand::all();
        return view('brands.index', ['brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brands.create');
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
            'name' => 'required|max:255',
            'logo' => 'required|file'
        ]);

        $brand= new \App\Brand;
        $brand->name=$request->get('name');
        $brand->url_logo=$this->manageLogoBrand($request->file('logo'));
        $brand->save();

        return redirect('brands')->with(['success' => "La marque a bien été ajoutée"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = \App\Brand::find($id);
        return view('brands.show', ['brand' => $brand]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = \App\Brand::find($id);
        return view('brands.edit', ['brand' => $brand]);
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
            'name' => 'required|max:255'
        ]);

        $brand= \App\Brand::find($id);
        $brand->name=$request->get('name');

        if ($request->file('logo')) {
            // Destroy brand icon before add new
            Storage::delete('public/'.$brand->url_logo);
            $brand->url_logo=$this->manageLogoBrand($request->file('logo'));
        }

        $brand->save();

        //Le with va aller intégrer le tableau avec la clé "success" dans la variable de session
        return redirect('brands')->with(['success' => "La marque a bien été mise à jour"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = \App\Brand::find($id);
        $brand->delete();

        // Destroy brand icon
        Storage::delete('public/'.$brand->url_logo);

        return redirect('brands')->with('success','La marque a bien été supprimée');
    }


    public function manageLogoBrand($logo)
    {
        $path=$logo->store('public/brand');
        return $path=str_replace("public/", "", $path);
    }
}
