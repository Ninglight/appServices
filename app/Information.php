<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{

    protected $table = 'informations';

    public $timestamps = true;

    // Une information est affectée à une question
    public function question() {
        return $this->belongsTo('App\Question');
    }
}
