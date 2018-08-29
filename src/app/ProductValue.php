<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;

class ProductValue extends Model
{

    protected $primaryKey = ['product_id', 'attribute_id', 'default_value_id'];
    public $incrementing = false;

    public static function getProductValueByProduct($product_id) {
        $product_values = ProductValue::where('product_id', $product_id)->get();

        if($product_values) {
            return $product_values;
        } else {
            return;
        }

    }

    public static function getProductValueByAttribute($attribute_id) {
        $product_values = ProductValue::where('attribute_id', $attribute_id)->get();

        if($product_values) {
            return $product_values;
        } else {
            return;
        }

    }


    public static function getProductValueByProductByAttribute($product_id, $attribute_id) {
        $product_values = ProductValue::where('product_id', $product_id)->where('attribute_id', $attribute_id)->get();

        dd($product_values);

        if($product_values) {
            return $product_values;
        } else {
            return;
        }


    }

    // Une valeur est affecté à un produit
    public function product() {
        return $this->belongsTo('App\Product');
    }

    // Une valeur est affecté à un produit
    public function attribute() {
        return $this->belongsTo('App\Attribute');
    }

    // Une valeur est affecté à une valeur par défaut
    public function default_value() {
        return $this->belongsTo('App\DefaultValue');
    }

    /**
     * Set the keys for a save update query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function setKeysForSaveQuery(Builder $query)
    {
        $keys = $this->getKeyName();
        if(!is_array($keys)){
            return parent::setKeysForSaveQuery($query);
        }

        foreach($keys as $keyName){
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

    /**
     * Get the primary key value for a save query.
     *
     * @param mixed $keyName
     * @return mixed
     */
    protected function getKeyForSaveQuery($keyName = null)
    {
        if(is_null($keyName)){
            $keyName = $this->getKeyName();
        }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }


}
