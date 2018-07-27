<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DefaultValue extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value'
    ];


    // Un produit est affecté à une categorie
    public function attribute() {
        return $this->belongsTo('App\Attribute');
    }
}
