<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;


class ProductsController extends Controller
{

    /**
     * Return all products
     *
     * @return void
     */
    public function index() {
        $products = Product::paginate(10);
        $categories = Category::all();
        return view('products.index')->with('products', $products)->with('categories', $categories);
    }

    public function search(Request $request) {
        $validated = $request->validate([
            'query' => 'required|max:150'
        ]);

        $products = Product::where('name','LIKE','%' . $validated['query'] . '%')
                ->orWhere('short_description','LIKE','%' . $validated['query'] . '%')
                ->get();
        $categories = Category::all();
        return view('products.search')->with('products', $products)->with('categories', $categories)->with('query', $validated['query']);
    }

    /**
     * Return featured products
     *
     * @return void
     */
    public function featured() {
        $products = Product::where('featured', true)->paginate(10);
        $categories = Category::all();
        return view('products.featured')->with('products', $products)->with('categories', $categories);
    }

    public function view($product) {
        // Attempt to retrieve the product, but fail if it's not found.
        $product = Product::where('slug', $product)->firstOrFail();

        return view('products.view')->with('product', $product);

    }
}
