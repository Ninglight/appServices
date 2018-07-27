<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    // Un attribut est affecté à une categorie
    public function category() {
        return $this->belongsTo('App\Category');
    }
}
