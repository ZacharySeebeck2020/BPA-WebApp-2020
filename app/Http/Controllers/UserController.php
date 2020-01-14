<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance, and make sure the user is logged in.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the user dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $orders = \App\Order::where('type', 'USER')->where('identifier', \Auth::user()->id)->get();
        // dd($orders);
        return view('user.home')->with('orders', $orders);
    }

    /**
     * Show all of the user's orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function orders()
    {
        return view('user.home');
    }
}
