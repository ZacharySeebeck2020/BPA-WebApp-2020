<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;

class OrdersController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cart = Cart::getActiveCart();

        return view('user.cart.checkout')->with('cart', $cart);
    }
}
