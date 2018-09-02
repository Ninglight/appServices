<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'url_logo'
    ];

    public $timestamps = true;

    // Un produit est affecté à une categorie
    public function products() {
        return $this->hasMany('App\Product');
    }

    public static function boot() {
        parent::boot();

        self::deleting(function($brand) {
           $brand->products()->delete();
        });
    }
}
