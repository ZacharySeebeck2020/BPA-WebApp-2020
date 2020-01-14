<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

    public static function getOrderCountByStatus($status) {
        return Order::where('status', $status)->get()->count();
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'order_products', 'order_id', 'product_id')->withPivot('count');
    }

    public function productCount() {
        $products = $this->belongsToMany('App\Product', 'order_products', 'order_id', 'product_id');

        return $products->count();
    }

    public function getCost() {
        $cart_entries = \DB::table('order_products')->where('order_id', $this->id)->get();

        $cost = 0.00;

        foreach($cart_entries as $entry) {
            $product = Product::find($entry->product_id);

            $cost += $product->price * $entry->count;
        }

        return $cost;
    }

    public function contactInfo() {
        return $this->hasOne('App\ContactInformation', 'id', 'contact_info');
    }

    public function shippingInfo() {
        return $this->hasOne('App\ShippingInformation', 'id', 'shipping_info');
    }
}
