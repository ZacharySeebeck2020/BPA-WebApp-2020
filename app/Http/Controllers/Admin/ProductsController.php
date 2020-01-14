<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductsController extends Controller
{
    /**
     * Display a listing of all products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all products from the database.
        $products = Product::all();
        return view('admin.products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get all categories for category selection.
        $categories = Category::all();

        return view('admin.products.create')->with('categories', $categories);
    }

    /**
     * Store a newly created product.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the given information.
        $validated = $request->validate([
            'name' => 'required|max:50|min:5|unique:App\Product,name',
            'slug' => 'required|max:25|min:3|unique:App\Product,slug',
            'price' => 'required|numeric|min:0|max:10000',
            'category' => 'required|numeric|exists:App\Category,id',
            'image' => 'nullable|file',
            'featured' => 'nullable',
            'short_description' => 'nullable|min:20|max:150',
            'description' => 'required|min:20',
            'features' => 'nullable|min:20',
        ]);

        // Sluggify the given slug.
        $validated['slug'] = str_replace([' '], ['_'], $validated['slug']);

        // Create the product and add it to the database.
        $product = Product::create([
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'details' => $validated['features'],
            'price' => sprintf('%01.2f', $validated['price']),
            'short_description' => $validated['short_description'],
            'description' => $validated['description'],
            'featured' => array_key_exists('feature', $request->all()),
            'image' => is_null($request->image) ? null : '/storage/products/images/' . $request->image->getClientOriginalName(),
            'category_id' => $validated['category']
        ]);

        // If an image was given, store the image.
        if (!is_null($request->image)) { $request->image->storeAs('/public/products/images/', $request->image->getClientOriginalName()); }

        // Return back to the index page with a success message.
        return Redirect(Route('admin.products.index'))->with('success', "Created new product {$product->name} with slug {$product->slug}");
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // Get all categories for category selection.
        $categories = Category::all();

        return view('admin.products.edit')->with('categories', $categories)->with('product', $product);
    }

    /**
     * Update the specified product.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // Validate the given information.
        $validated = $request->validate([
            'name' => 'required|max:50|min:5',
            'slug' => 'required|max:25|min:3',
            'price' => 'required|numeric|min:0|max:10000',
            'category' => 'required|numeric|exists:App\Category,id',
            'featured' => 'nullable',
            'short_description' => 'nullable|min:20|max:150',
            'description' => 'required|min:20',
            'features' => 'nullable|min:20',
            'image' => 'nullable',
        ]);

        // If the name was updated, check to see that the name doesn't exist in the database currently.
        if ($product->name != $validated['name']) {
            $request->validate([
                'name' => 'unique:App\Category,name'
            ]);
        }

        // If the slug was updated, check to see that the slug doesn't exist in the database currently.
        if ($product->slug != $validated['slug']) {
            $request->validate([
                'slug' => 'unique:App\Category,name'
            ]);
        }
        // If there was a new image uploaded, update the image in the database, then store the image where it's supposed to go.
        if ($request->image) {
            $image = '/storage/products/images/' . $request->image->getClientOriginalName();
        $request->image->storeAs('/public/products/images/', $request->image->getClientOriginalName());
        } else {
            $image = $product->image;
        }

        // Update the product in the database.
        $product->update([
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'details' => $validated['features'],
            'price' => sprintf('%01.2f', $validated['price']),
            'short_description' => $validated['short_description'],
            'description' => $validated['description'],
            'featured' => array_key_exists('feature', $request->all()),
            'image' => $image,
            'category_id' => $validated['category']
        ]);

        return Redirect(Route('admin.products.index'))->with('success', "Updated product {$product->name}");
    }

    /**
     * Remove the specified product.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // Delete the product from the database.
        $product->delete();

        return back()->with('success', "Successfully deleted the product: " . $product->name);
    }
}
