<?php

namespace App\Http\Controllers;

use App\Category;
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
        $products = Product::get();
        $categories = Category::all();


        return view ('admin.products.index')->with('products', $products)->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::all();

        return view('admin.products.create')->with('categories', $categories);
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
            'sku' => 'required|min:5|max:100',
            'name' => 'required|min:5|max:100',
            'category' => 'required',
            'slug' => 'required|min:5|max:100',
            'price' => 'required|min:1|numeric',
        ]);

        $category = Category::where('name', $validated['category'])->first();

        if (is_null($category)) {
            return back()->withErrors(['category' => 'Unable to retrieve category. Please try again later.'])->withInput();
        }

        Product::create([
            'category_id' => $category->id,
            'sku' => $validated['sku'],
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'price' => $validated['price'],
        ]);

        return redirect(route('admin.catalog.products.index'))->with('successes', ['Created new product: ' . $validated['name']]);

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

        return redirect(route('admin.products.all'))->with('successes', ['Updated product: ' . $validated['name']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        Product::find($request->id)->delete();

        return redirect(route('admin.catalog.products.index'))->with('successes', ['Deleted the product successfully.']);
    }
}
