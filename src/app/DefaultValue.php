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

    // Une valeur par défaut a plusieurs valeurs d'attribut associés
    public function product_value() {
        return $this->hasMany('App\ProductValue');
    }

    public static function boot() {
        parent::boot();

        self::deleting(function($default_value) {
            $default_value->product_value()->delete();
        });
    }
}
