<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
            'name' => 'required|max:50|min:5|unique:App\Product,name',
            'slug' => 'required|max:25|min:3|unique:App\Product,slug',
            'price' => 'required|numeric|min:0|max:10000',
            'category' => 'required|numeric|exists:App\Category,id',
            'featured' => 'nullable',
            'description' => 'required|min:20',
            'features' => 'nullable|min:20',
        ]);

        $validated['slug'] = str_replace([' '], ['_'], $validated['slug']);

        $product = Product::create([
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'details' => $validated['features'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'featured' => array_key_exists('feature', $request->all()),
            'category_id' => $validated['category']
        ]);

        return Redirect(Route('admin.products.index'))->with('success', "Created new product {$product->name} with slug {$product->slug}");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('admin.products.edit')->with('categories', $categories)->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|max:50|min:5',
            'slug' => 'required|max:25|min:3',
            'price' => 'required|numeric|min:0|max:10000',
            'category' => 'required|numeric|exists:App\Category,id',
            'featured' => 'nullable',
            'description' => 'required|min:20',
            'features' => 'nullable|min:20',
        ]);

        if ($product->name != $validated['name']) {
            $request->validate([
                'name' => 'unique:App\Category,name'
            ]);
        }

        if ($product->slug != $validated['slug']) {
            $request->validate([
                'slug' => 'unique:App\Category,name'
            ]);
        }

        $product->update([
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'details' => $validated['features'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'featured' => array_key_exists('feature', $request->all()),
            'category_id' => $validated['category']
        ]);

        return Redirect(Route('admin.products.index'))->with('success', "Updated product {$product->name}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $success = "Successfully deleted the product: " . $product->name;
        $product->delete();

        return back()->with('success', $success);
    }
}
