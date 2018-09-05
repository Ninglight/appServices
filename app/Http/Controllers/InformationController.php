<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformationController extends Controller
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
            'title' => 'required|max:255',
            'content' => 'required|max:255',
            'question_id' => 'required|max:255'
        ]);

        $information= new \App\Information;
        $information->title=$request->get('title');
        $information->content=$request->get('content');
        $information->question_id=$request->get('question_id');
        if($request->get('url_content')) {
            $information->url_content=$request->get('url_content');
        }

        $information->save();

        //Le with va aller intégrer le tableau avec la clé "success" dans la variable de session
        return redirect('/admin/questions/'.$information->question_id.'/edit#information')->with(['success' => "Information has been created."]);
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
            'title' => 'required|max:255',
            'content' => 'required|max:255',
            'question_id' => 'required|max:255'
        ]);

        $information= \App\Information::find($id);
        $information->title=$request->get('title');
        $information->content=$request->get('content');
        $information->question_id=$request->get('question_id');
        if($request->get('url_content')) {
            $information->url_content=$request->get('url_content');
        }

        $information->save();

        //Le with va aller intégrer le tableau avec la clé "success" dans la variable de session
        return redirect('/admin/questions/'.$information->question_id.'/edit#information')->with(['success' => "Information has been updated."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = \App\Information::find($id);
        $question_id = $information->question_id;
        $information->delete();
        return redirect('/admin/questions/'.$question_id.'/edit#information')->with("success","Information has been deleted.");
    }
}
