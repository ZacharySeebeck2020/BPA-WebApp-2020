<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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


    /**
     * Empty out the user's given cart.
     *
     * @return App\Cart
     */
    public static function emptyCart() {
        if(is_null(\Auth::user())) {
            // Get the current cart identifier from the user's session data, if it doesn't exist, create one.
            $identifier = \Session::get('cart_identifier', (string) \Str::uuid());

            // If a cart is found
            if (!is_null($identifier) && !is_null(Cart::where('type', 'SESSION')->where('identifier', $identifier)->first())) {
                $cart = Cart::where('type', 'SESSION')->where('identifier', $identifier)->first()->delete();

                $cart = Cart::create([
                    'type' => 'SESSION',
                    'identifier' => $identifier
                ]);

                session(['cart_identifier' => $identifier]);

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
                $cart = Cart::where('type', 'USER')->where('identifier', \Auth::user()->id)->first()->delete();

                $cart = Cart::create([
                    'type' => 'USER',
                    'identifier' => \Auth::user()->id
                ]);

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

    /**
     * Return a collection of all products connected to the current cart.
     *
     * @return Collection
     */
    public function products()
    {
        return $this->belongsToMany('App\Product', 'cart_products', 'cart_id', 'product_id')->withPivot('count');
    }

    /**
     * Return the number of products that are in the user's current cart.
     *
     * @return integer
     */
    public function productCount() {
        $products = $this->belongsToMany('App\Product', 'cart_products', 'cart_id', 'product_id');

        return $products->count();
    }

    /**
     * Get the total cost of all item's inside of the cart.
     *
     * @return double
     */
    public function getCost() {
        // Get all entries connected to the cart.
        $cart_entries = \DB::table('cart_products')->where('cart_id', $this->id)->get();

        // Initialize the cost value.
        $cost = 0.00;

        // Go through each entry and add the total cost of the product(s)
        foreach($cart_entries as $entry) {
            $product = Product::find($entry->product_id);

            $cost += $product->price * $entry->count;
        }

        return $cost;
    }
}
