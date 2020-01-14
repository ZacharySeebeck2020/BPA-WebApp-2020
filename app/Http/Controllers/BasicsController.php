<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class BasicsController extends Controller
{
    /**
     * Return the landing page for the app.
     *
     * @return \Illuminate\Http\Response
     */
    public function landing() {
        // Get a random 4 products that have been marked as featured in the administration panel.
        $featureProducts = Product::where('featured', true)->inRandomOrder()->limit(4)->get();

        // Return the landing view with the randomized 4 products.
        return view('landing')->with('products', $featureProducts);
    }


    /**
     * Return the BPA Judges page.
     *
     * @return \Illuminate\Http\Response
     */
    public function judges() {
        return view ('judges');
    }
}
