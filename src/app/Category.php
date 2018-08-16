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

    // Une catégorie a plusieurs produits d'associés
    public function products() {
        return $this->hasMany('App\Product');
    }

    // Une catégorie a plusieurs attributs d'associés
    public function attributes() {
        return $this->hasMany('App\Attribute');
    }

    // Une catégorie a plusieurs attributs d'associés
    public function questions() {
        return $this->hasMany('App\Question');
    }

    public static function boot() {
        parent::boot();

        self::deleting(function($category) {
            $category->products()->delete();
            $category->attributes()->delete();
        });
    }
}
