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

    // Un attribut à plusieurs valeurs par défaut
    public function default_values() {
        return $this->hasMany('App\DefaultValue');
    }

    // Un attribut à plusieurs valeurs liés aux produits
    public function product_values() {
        return $this->hasMany('App\ProductValue');
    }

    // Un attribut a une question d'associés
    public function question() {
        return $this->hasOne('App\Question');
    }

    public static function boot() {
        parent::boot();

        self::deleting(function($attribute) {
            $attribute->default_value()->delete();
            $attribute->product_value()->delete();
            $attribute->question()->delete();
        });
    }
}
