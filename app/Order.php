<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

    public function products()
    {
        return $this->belongsToMany('App\Product', 'cart_products', 'cart_id', 'product_id')->withPivot('count');
    }

    public function productCount() {
        $products = $this->belongsToMany('App\Product', 'cart_products', 'cart_id', 'product_id');

        return $products->count();
    }
}
