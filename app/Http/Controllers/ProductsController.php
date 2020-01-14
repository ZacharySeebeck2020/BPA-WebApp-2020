<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;


class ProductsController extends Controller
{

    /**
     * Return a page with all products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // Get all of the products, with pagination.
        $products = Product::paginate(10);

        // Get all of the categories to allow the user to sort by.
        $categories = Category::all();

        return view('products.index')->with('products', $products)->with('categories', $categories);
    }


    /**
     * Return a page with all products that match the given search request.
     *
     * @param  mixed $request
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        // Validate the given query to make sure it doesn't exceed a limit.
        $validated = $request->validate([
            'query' => 'required|max:150'
        ]);

        // Run the database query with the given search term looking at the name and the short description.
        $products = Product::where('name','LIKE','%' . $validated['query'] . '%')
                ->orWhere('short_description','LIKE','%' . $validated['query'] . '%')
                ->get();

        // Get all categories.
        $categories = Category::all();

        return view('products.search')->with('products', $products)->with('categories', $categories)->with('query', $validated['query']);
    }

    /**
     * Return a page with all featured products.
     *
     * @return \Illuminate\Http\Response
     */
    public function featured() {
        // Get all featured products, with pagination.
        $products = Product::where('featured', true)->paginate(10);

        // Get all categories.
        $categories = Category::all();

        return view('products.featured')->with('products', $products)->with('categories', $categories);
    }

    /**
     * Return the page with a single product's information.
     *
     * @param  mixed $product
     *
     * @return \Illuminate\Http\Response
     */
    public function view($product) {
        // Attempt to retrieve the product by it's slug, but fail if it's not found.
        $product = Product::where('slug', $product)->firstOrFail();

        return view('products.view')->with('product', $product);

    }
}
