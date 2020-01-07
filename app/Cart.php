<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'type',
        'identifier'
    ];

    /**
     * Retrieve the active cart for the current user.
     *
     * @return App\Cart
     */
    public static function getActiveCart() {
        if(is_null(\Auth::user())) {
            // Get the current cart identifier from the user's session data, if it doesn't exist, create one.
            $identifier = \Session::get('cart_identifier', (string) \Str::uuid());

            // If a cart is found
            if (!is_null($identifier) && !is_null(Cart::where('type', 'SESSION')->where('identifier', $identifier)->first())) {
                $cart = Cart::where('type', 'SESSION')->where('identifier', $identifier)->first();

                return $cart; // Return the session's active cart.
            }
            else { // A cart was not found
                $cart = Cart::create([
                    'type' => 'SESSION',
                    'identifier' => $identifier
                ]);

                session(['cart_identifier' => $identifier]);

                return $cart; // Return the now active cart.
            }
        } else {
            // If a cart is found
            if (!is_null(Cart::where('type', 'USER')->where('identifier', \Auth::user()->id)->first())) {
                $cart = Cart::where('type', 'USER')->where('identifier', \Auth::user()->id)->first();

                return $cart; // Return the session's active cart.
            }
            else { // A cart was not found
                $cart = Cart::create([
                    'type' => 'USER',
                    'identifier' => \Auth::user()->id
                ]);

                return $cart; // Return the now active cart.
            }
        }
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'cart_products', 'cart_id', 'product_id')->withPivot('count');
    }

    public function productCount() {
        $products = $this->belongsToMany('App\Product', 'cart_products', 'cart_id', 'product_id');

        return $products->count();
    }
}
