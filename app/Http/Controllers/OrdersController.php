<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactInformation;
use App\ShippingInformation;
use App\Cart;
use App\Order;

class OrdersController extends Controller
{
    /**
     * Show the checkout form
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get the user's active cart.
        $cart = Cart::getActiveCart();

        // If the cart has no products, return to the landing page.
        if ($cart->productCount() == 0) return redirect(route('landing'));

        $states = array('AL', 'AK', 'AS', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'DC', 'FM', 'FL', 'GA', 'GU', 'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY', 'LA', 'ME', 'MH', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO', 'MT', 'NE', 'NV', 'NH', 'NJ', 'NM', 'NY', 'NC', 'ND', 'MP', 'OH', 'OK', 'OR', 'PW', 'PA', 'PR', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VT', 'VI', 'VA', 'WA', 'WV', 'WI', 'WY', 'AE', 'AA', 'AP');

        return view('user.cart.checkout')->with('cart', $cart)->with('states', $states);
    }

    /**
     * Store the new order in the database.
     *
     * @param  mixed $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get the user's active cart.
        $cart = Cart::getActiveCart();

        // Validate and return back if validation fails.
        $v = \Validator::make($request->all(), [
            'name_first' => 'required|max: 50',
            'name_last' => 'required|max: 50',
            'email' => 'required|email',
            'phone' => 'required|digits: 10',
            'address' => 'required|max: 50',
            'zip' => 'required|digits: 5',
            'state' => 'required|max: 2',
            'city' => 'required|max: 50',
            'cc_num' => 'required|digits: 16',
            'cc_exp_mon' => 'required|digits: 2',
            'cc_exp_yr' => 'required|digits:2',
            'cc_name' => 'required|max: 50',
            'cc_cvv' => 'required|digits: 3',
        ]);
        if($v->fails())
        {
            return redirect()->back()->withInput();
        }

        // Create a new contact information entry in the database.
        $contact = ContactInformation::create([
            'first_name' => $request->name_first,
            'last_name' => $request->name_last,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        // Create a new shipping information entry in the database.
        $shipping = ShippingInformation::create([
            'address' => $request->address,
            'zip' => $request->zip,
            'state' => $request->state,
            'city' => $request->city,
        ]);

        // Create a new order entry in the database, linking it with the shipping and contact entries.
        $order = Order::create([
            'status' => 'OPEN',
            'type' => is_null(\Auth::user()) ? 'ONETIME' : 'USER',
            'identifier' => $cart->identifier,
            'shipping_info' => $shipping->id,
            'contact_info' => $contact->id,
        ]);

        // Get all the current cart's products.
        $cart_products = \DB::table('cart_products')->where('cart_id', $cart->id)->get();

        // For each of the products, add them to the order.
        foreach ($cart_products as $cart_entry) {
            \DB::table('order_products')->insert([
                'order_id' => $order->id,
                'product_id' => $cart_entry->product_id,
                'count' => $cart_entry->count,
            ]);
        }

        // Reset/Empty the user's cart.
        Cart::emptyCart();

        // Redirect to the order finish screen.
        return redirect(route('order.finish'));
    }

    /**
     * Show the order finish form.
     *
     * @return \Illuminate\Http\Response
     */
    public function finish() {
        return view('user.cart.finish');
    }
}
