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
        $products = Product::all();
        $categories = Category::all();

        return view('products.index')->with('products', $products)->with('categories', $categories);
    }
}
