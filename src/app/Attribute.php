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

    // Une catégorie a plusieurs attributs d'associés
    public function default_value() {
        return $this->hasMany('App\Attribute');
    }

    public static function boot() {
        parent::boot();

        self::deleting(function($attribute) {
            $attribute->default_value()->delete();
        });
    }
}
