<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response\
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index')->with('orders', $orders);
    }

    /**
     * Display all orders with a given status.
     *
     * @param String $status The requested status to sort by.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexStatus($status)
    {
        $orders = Order::where('status', $status)->get();
        return view('admin.orders.index')->with('orders', $orders)->with('status', $status);
    }

    /**
     * Display the specified order.
     *
     * @param  Order $order The given order the user wants to view.
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $contactInformation = $order->contactInfo;
        $shippingInformation = $order->shippingInfo;

        return view('admin.orders.view')->with('order', $order)->with('contactInformation', $contactInformation)->with('shippingInformation', $shippingInformation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        try {
            $order->update([
                'status' => strtoupper($request->status)
            ]);
        } catch (\Exception $ex) {
            return back()->with('errors', ['status' => 'Updated order status to {$request->status}']);
        }

        return back()->with('success', "Updated order status to {$request->status}");
    }
}
