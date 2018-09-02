<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = \App\Question::all();
        return view('questions.index', ['questions' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Category::all();
        $attributes = \App\Attribute::all();
        $numberQuestion = \App\Question::countQuestion();
        return view('questions.create', ['attributes' => $attributes, 'categories' => $categories, 'numberQuestion' => $numberQuestion]);
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
            'category_id' => 'required|max:255',
            'attribute_id' => 'required|max:255'
        ]);

        $question= new \App\Question;
        $question->value=$request->get('value');
        $question->category_id=$request->get('category_id');
        $question->attribute_id=$request->get('attribute_id');
        if($request->get('order')) {
            $question->order=$request->get('order');
        }
        $question->save();

        //Le with va aller intégrer le tableau avec la clé "success" dans la variable de session
        return redirect('admin/questions')->with(['success' => "La question a bien été ajoutée"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = \App\Question::find($id);
        return view('questions.show', ['question' => $question]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = \App\Question::find($id);
        $categories = \App\Category::all();
        $attributes = \App\Attribute::all();
        $default_values = \App\DefaultValue::all();
        $numberQuestion = \App\Question::countQuestion();
        return view('questions.edit', ['question' => $question, 'attributes' => $attributes, 'categories' => $categories, 'default_values' => $default_values, 'numberQuestion' => $numberQuestion]);
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
            'category_id' => 'required|max:255',
            'attribute_id' => 'required|max:255'
        ]);

        $question= \App\Question::find($id);
        $question->value=$request->get('value');
        $question->category_id=$request->get('category_id');
        $question->attribute_id=$request->get('attribute_id');
        if($request->get('order')) {
            $question->order=$request->get('order');
        }
        $question->save();

        //Le with va aller intégrer le tableau avec la clé "success" dans la variable de session
        return redirect('admin/questions')->with(['success' => "La question a bien été mise à jour"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = \App\Question::find($id);
        $question->delete();
        return redirect('admin/questions')->with('success','La question a bien été supprimée');
    }
}
