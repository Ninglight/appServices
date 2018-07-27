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
}
