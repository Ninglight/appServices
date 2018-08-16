<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'value' => 'required|max:255',
            'question_id' => 'required|max:255',
            'default_value_id' => 'required|max:255'
        ]);

        $answer= new \App\Answer;
        $answer->value=$request->get('value');
        $answer->question_id=$request->get('question_id');
        $answer->default_value_id=$request->get('default_value_id');

        $answer->save();

        //Le with va aller intégrer le tableau avec la clé "success" dans la variable de session
        return redirect('/admin/questions/'.$answer->question_id.'/edit#answer')->with(['success' => "La réponse a bien été ajoutée"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'question_id' => 'required|max:255',
            'default_value_id' => 'required|max:255'
        ]);

        $answer= \App\Answer::find($id);
        $answer->value=$request->get('value');
        $answer->question_id=$request->get('question_id');
        $answer->default_value_id=$request->get('default_value_id');

        $answer->save();

        //Le with va aller intégrer le tableau avec la clé "success" dans la variable de session
        return redirect('/admin/questions/'.$answer->question_id.'/edit#answer')->with(['success' => "La réponse a bien été mise à jour"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $answer = \App\Answer::find($id);
        $question_id = $answer->question_id;
        $answer->delete();
        return redirect('/admin/questions/'.$question_id.'/edit#answer')->with("success","La réponse a bien été supprimée");
    }
}
