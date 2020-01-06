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

    public function view($product) {
        // Attempt to retrieve the product, but fail if it's not found.
        $product = Product::where('slug', $product)->firstOrFail();

        return view('products.view')->with('product', $product);

    }
}
