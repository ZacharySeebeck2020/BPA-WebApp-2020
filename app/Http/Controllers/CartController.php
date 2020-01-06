<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;

class CartController extends Controller
{
    public function index(Request $request) {
        $cart = Cart::getActiveCart();

        return view('user.cart.index')->with('cart', $cart);
    }

    public function addProduct($slug) {
        // Retrieve the product to add to the user's cart.
        $product = Product::where('slug', $slug)->firstOrFail();

        // Retrieve the user's cart.
        $cart = Cart::getActiveCart();

        \DB::table('cart_products')->insert([
            'cart_id' => $cart->id,
            'product_id' => $product->id
        ]);

        return redirect(route('products.index'))->with('success', "Added {$product->name} to your cart!");
    }

    public function removeProduct($product_id) {
        $cart = Cart::getActiveCart();

        $cart->products()->detach($product_id);

        return back();
    }
}
