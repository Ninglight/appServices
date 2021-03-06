<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public $timestamps = true;

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

    public static function columns() {
        return DB::table('information_schema.columns')->where('table_name', 'products')->where('table_schema', 'appservices')->get();
    }

    public static function boot() {
        parent::boot();

        self::deleting(function($product) {
            $product->product_values()->delete();
        });
    }

    public static function getActivatedProductByCategory($category_id) {
        $products = Product::where('category_id', $category_id)->where('status', 1)->get();

        if($products) {
            return $products;
        } else {
            return;
        }

    }

    public static function getProductByCategory($category_id) {
        $products = Product::where('category_id', $category_id)->get();

        if($products) {
            return $products;
        } else {
            return;
        }

    }
}
