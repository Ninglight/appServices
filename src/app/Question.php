<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
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

    public static function boot() {
        parent::boot();

        self::deleting(function($question) {
            $question->answer()->delete();
            $question->information()->delete();
        });
    }

}
