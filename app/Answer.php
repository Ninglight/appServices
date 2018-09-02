<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    public $timestamps = true;

    // Une reponse est affectée à une question
    public function question() {
        return $this->belongsTo('App\Question');
    }

    // Une reponse est affectée à une valeur par défaut
    public function default_value() {
        return $this->belongsTo('App\DefaultValue');
    }
}
