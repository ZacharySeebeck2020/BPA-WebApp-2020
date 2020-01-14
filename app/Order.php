<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

    public function products()
    {
        return $this->belongsToMany('App\Product', 'order_products', 'order_id', 'product_id')->withPivot('count');
    }

    public function productCount() {
        $products = $this->belongsToMany('App\Product', 'order_products', 'order_id', 'product_id');

        return $products->count();
    }

    public function getProductCost() {

    }

    public function contactInfo() {
        return $this->hasOne('App\ContactInformation', 'id', 'contact_info');
    }

    public function shippingInfo() {
        return $this->hasOne('App\ShippingInformation', 'id', 'shipping_info');
    }
}
