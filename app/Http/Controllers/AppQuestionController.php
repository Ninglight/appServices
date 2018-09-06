<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AppQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectCategories(Request $request)
    {

        $categories = \App\Category::all();
        return view('app.questions.index', ['categories' => $categories]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function initUserPath(Request $request, $category_id)
    {

        $questions = \App\Question::findByCategory($category_id)->sortBy('order')->sortBy('id');

        foreach ($questions as $key=>$question) {
            $question->user_answers = [];
            $question->validate = false;
        }

        // Add to session variable
        $request->session()->put('questions', $questions);

        return view('app.questions.reply', ['questions' => $questions ,'current_question' => $questions->first()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUserPath(Request $request)
    {

        $current_question = $request->get('current_question');

        //Récupération de la variable de session
        $questions = $request->session()->get('questions');

        //Mise à jour de la réponse à la question et la statut
        foreach ($questions as $question) {

            if($question-> id == $current_question) {

                $answers = [];

                if($question->attribute->assignment_multiple == 0) {

                    array_push($answers, $request->get('answer'));
                    $question->validate = true;

                } else {

                    foreach ($request->get('answers') as $answer) {

                        array_push($answers, $answer);
                        $question->validate = true;

                    }

                }

                if($answers) {
                    $question->user_answers = $answers;
                }

            }

        }

        // On passe à la prochaine question
        if ($questions->firstWhere('id', ++$current_question)) {

            //On retourne ce current_question
            foreach ($questions as $question) {

                if($question->id == $current_question) {

                    // Il y a une prochaine question donc on prépare les données
                    $current_question = $question;

                    return view('app.questions.reply', ['questions' => $questions, 'current_question' => $current_question]);

                }
            }

        }

        // On boucle pour savoir si il reste en attente de validation
        foreach ($questions as $question) {

            if($question->validate == false) {

                // Il y a une question non traitée donc on prépare les données
                $current_question = $question;

                return view('app.questions.reply', ['questions' => $questions, 'current_question' => $current_question]);

            }

        }

        //dd($questions);

        // Si on est ici c'est que c'est terminé donc on va pouvoir créer une liste d'attribut pour les filtres
        $filters = [];

        foreach($questions as $question) {

            // On get sur la question pour récupérer la default_value

            if($question->user_answers) {

                foreach($question->user_answers as $user_answer) {

                    if($user_answer != "null") {

                        $answer = \App\Answer::find($user_answer);

                        array_push($filters, $answer->default_value->id);

                    }

                }

            }

        }

        $category = \App\Category::find($questions[0]->category);

        return redirect()->action('AppProductController@index', ['category' => $category[0], 'filters' => $filters]);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function returnUserPath(Request $request)
    {

        $current_question = $request->get('current_question');

        //Récupération de la variable de session
        $questions = $request->session()->get('questions');

        // On passe à la question précédente
        if ($questions->firstWhere('id', --$current_question)) {

            //On retourne ce current_question
            foreach ($questions as $question) {

                if($question->id == $current_question) {

                    // Il y a une prochaine question donc on prépare les données
                    $current_question = $question;

                    return view('app.questions.reply', ['questions' => $questions, 'current_question' => $current_question]);

                }
            }

        } else {

            return redirect('questions/categories');

        }



    }



}
