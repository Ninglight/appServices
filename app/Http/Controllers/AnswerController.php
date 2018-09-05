<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
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
        if($request->get('order')) {
            $answer->order=$request->get('order');
        }

        $answer->save();

        //Le with va aller intégrer le tableau avec la clé "success" dans la variable de session
        return redirect('/admin/questions/'.$answer->question_id.'/edit#answer')->with(['success' => "Answer has been created."]);
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
        if($request->get('order')) {
            $answer->order=$request->get('order');
        }

        $answer->save();

        //Le with va aller intégrer le tableau avec la clé "success" dans la variable de session
        return redirect('/admin/questions/'.$answer->question_id.'/edit#answer')->with(['success' => "Answer has been updated."]);
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
        return redirect('/admin/questions/'.$question_id.'/edit#answer')->with("success","Answer has been deleted.");
    }
}
