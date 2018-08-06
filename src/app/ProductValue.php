<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductValue extends Model
{
    // Une valeur est affecté à un produit
    public function product() {
        return $this->belongsTo('App\Product');
    }

    // Une valeur est affecté à une valeur par défaut
    public function defaut_value() {
        return $this->belongsTo('App\DefaultValue');
    }
}
