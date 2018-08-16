<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'constructor_reference', 'connexing_reference', 'price', 'url_ecommerce'
    ];

    // Un produit est affecté à une categorie
    public function category() {
        return $this->belongsTo('App\Category');
    }

    // Un produit est affecté à une marque
    public function brand() {
        return $this->belongsTo('App\Brand');
    }

    // Un produit a plusieurs valeurs d'attribut associés
    public function product_values() {
        return $this->hasMany('App\ProductValue');
    }

    public static function boot() {
        parent::boot();

        self::deleting(function($product) {
            $product->product_value()->delete();
        });
    }
}
