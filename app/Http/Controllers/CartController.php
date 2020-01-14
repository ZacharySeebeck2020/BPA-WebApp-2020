<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;

class CartController extends Controller
{
    /**
     * Return the user's cart page.
     *
     * @param  mixed $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $cart = Cart::getActiveCart();

        return view('user.cart.index')->with('cart', $cart);
    }

    /**
     * Add a product to the user's cart.
     *
     * @param  string $slug The slug connected to the product.
     *
     * @return \Illuminate\Http\Response
     */
    public function addProduct($slug) {
        // Retrieve the product to add to the user's cart.
        $product = Product::where('slug', $slug)->firstOrFail();

        // Retrieve the user's cart.
        $cart = Cart::getActiveCart();

        // See if the product has been added in the past.
        $entry = \DB::table('cart_products')->where('cart_id', $cart->id)->where('product_id', $product->id)->get();

        // If the product has been added before, increase the count. If not, then make a new entry.
        if ($entry->count() < 1) {
            \DB::table('cart_products')->insert([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'count' => 1,
            ]);
        } else {
            \DB::table('cart_products')
                ->where('id', $entry[0]->id)
                ->update([
                    'count' => $entry[0]->count + 1
                ]);
        }

        return redirect(route('products.index'))->with('success', "Added {$product->name} to your cart!");
    }

    /**
     * Remove a given product by ID from the active user's cart.
     *
     * @param  integer $product_id The ID connected to the product.
     *
     * @return \Illuminate\Http\Response
     */
    public function removeProduct($product_id) {
        // Get the active cart
        $cart = Cart::getActiveCart();

        // Get the entry for the cart's product.
        $entry = \DB::table('cart_products')->where('cart_id', $cart->id)->where('product_id', $product_id)->get();

        // If there's more than one, get rid of one, else, get rid of the entry all together.
        if ($entry[0]->count > 1) {
            \DB::table('cart_products')
            ->where('id', $entry[0]->id)
            ->update([
                'count' => $entry[0]->count - 1
            ]);
        } else {
            \DB::table('cart_products')
            ->where('id', $entry[0]->id)
            ->delete();
        }

        return back();
    }
}
