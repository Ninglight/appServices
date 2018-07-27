<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    // Une catégorie est lié à plusieurs produits
    /*public function products() {
        return $this->belongsTo('App\Product');
    }*/

    // Un produit est affecté à une categorie
    public function products() {
        return $this->hasMany('App\Product');
    }

    public static function boot() {
        parent::boot();

        self::deleting(function($category) {
            $category->products()->delete();
        });
    }
}
