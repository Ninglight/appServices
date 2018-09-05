<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = true;

    // Une question est affecté à une catégorie
    public function category() {
        return $this->belongsTo('App\Category');
    }

    // Une question est affecté à un attribut
    public function attribute() {
        return $this->belongsTo('App\Attribute');
    }

    // Une question est affecté à un attribut
    public function answers() {
        return $this->hasMany('App\Answer');
    }

    // Une question est affecté à un attribut
    public function information() {
        return $this->hasOne('App\Information');
    }

    public static function countQuestion() {
        return Question::all()->count();
    }

    public static function findByCategory($category_id) {
        $questions = Question::where('category_id', $category_id)->get();

        if($questions) {
            return $questions;
        } else {
            return;
        }
    }

    public static function boot() {
        parent::boot();

        self::deleting(function($question) {
            $question->answers()->delete();
            $question->information()->delete();
        });
    }

}
