<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view ('admin.products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:5|max:100',
            'basePrice' => 'required|min:1',
            'features' => 'nullable'
        ]);

        $features = [];
        // TODO: Validate and split feature list.

        Product::create([
            'base_name' => $validated['name'],
            'base_price' => $validated['basePrice'],
            'features' => json_encode($features),
        ]);

        return redirect(route('admin.products.all'))->with('success', ['Created new product: ' . $validated['name']]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|min:5|max:100',
            'basePrice' => 'required|min:1',
            'features' => 'nullable'
        ]);

        $features = [];
        // TODO: Validate and split feature list.


        $product->update([
            'base_name' => $validated['name'],
            'base_price' => $validated['basePrice'],
            'features' => json_encode($features),
        ]);

        return redirect(route('admin.products.all'))->with('success', ['Updated product: ' . $validated['name']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
