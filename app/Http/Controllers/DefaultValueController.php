<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DefaultValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $default_values = \App\DefaultValue::all();
        return view('default_values.index', ['default_values' => $default_values]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attributes = \App\Attribute::all();
        return view('default_values.create', ['attributes' => $attributes]);
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
            'value' => 'required|max:255',
            'attribute_id' => 'required|max:255'
        ]);

        $default_value= new \App\DefaultValue;
        $default_value->value=$request->get('value');
        $default_value->identification=$request->get('identification');
        $default_value->attribute_id=$request->get('attribute_id');

        $default_value->save();

        //Le with va aller intégrer le tableau avec la clé "success" dans la variable de session
        return redirect('/admin/attributes/'.$default_value->attribute_id.'/edit#attribute')->with(['success' => "Default value has been created."]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $default_value = \App\DefaultValue::find($id);
        return view('default_values.show', ['default_value' => $default_value]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $default_value = \App\DefaultValue::find($id);
        $attributes = \App\Attribute::all();
        return view('default_values.edit', ['attributes' => $attributes, 'default_value' => $default_value]);
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
            'value' => 'required|max:255',
            'attribute_id' => 'required|max:255'
        ]);

        $default_value= \App\DefaultValue::find($id);
        $default_value->value=$request->get('value');
        $default_value->identification=$request->get('identification');
        $default_value->attribute_id=$request->get('attribute_id');

        $default_value->save();

        //Le with va aller intégrer le tableau avec la clé "success" dans la variable de session
        return redirect('/admin/attributes/'.$default_value->attribute_id.'/edit#attribute')->with(['success' => "Default value has been updated."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $default_value = \App\DefaultValue::find($id);
        $attribute_id = $default_value->attribute_id;
        $default_value->delete();
        return redirect('/admin/attributes/'.$attribute_id.'/edit#attribute')->with("success","Default value has been deleted.");
    }
}
