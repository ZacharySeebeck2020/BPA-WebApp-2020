<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get a count of orders with the given status.
     *
     * @param  String $status
     *
     * @return integer
     */
    public static function getOrderCountByStatus($status) {
        return Order::where('status', $status)->get()->count();
    }

    /**
     * Get all products connected to that order.
     *
     * @return Collection
     */
    public function products()
    {
        return $this->belongsToMany('App\Product', 'order_products', 'order_id', 'product_id')->withPivot('count');
    }

    /**
     * Get a count of all products in the order.
     *
     * @return integer
     */
    public function productCount() {
        $products = $this->belongsToMany('App\Product', 'order_products', 'order_id', 'product_id');

        return $products->count();
    }

    /**
     * Get a total cost of all products in the order.
     *
     * @return double
     */
    public function getCost() {
        $cart_entries = \DB::table('order_products')->where('order_id', $this->id)->get();

        $cost = 0.00;

        foreach($cart_entries as $entry) {
            $product = Product::find($entry->product_id);

            $cost += $product->price * $entry->count;
        }

        return $cost;
    }

    /**
     * Get the contact information connected to this order.
     *
     * @return App\ContactInformation
     */
    public function contactInfo() {
        return $this->hasOne('App\ContactInformation', 'id', 'contact_info');
    }

    /**
     * Get the shipping information connected to this order.
     *
     * @return App\ShippingInformation
     */
    public function shippingInfo() {
        return $this->hasOne('App\ShippingInformation', 'id', 'shipping_info');
    }
}
