<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show the user's dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $orders = \App\Order::where('type', 'USER')->where('identifier', \Auth::user()->id)->get();
        // dd($orders);
        return view('user.home')->with('orders', $orders);
    }
}
