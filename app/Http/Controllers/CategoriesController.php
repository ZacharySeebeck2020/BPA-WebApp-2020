<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    /**
     * Return a page with all products of a requested category.
     *
     * @param  string $category The slug of the requested category.
     *
     * @return \Illuminate\Http\Response
     */
    public function view($category) {
        $categories = Category::all();
        $category = Category::where('slug', $category)->first();
        $products = $category->products()->paginate(10);

        return view('products.categoryIndex')->with('categories', $categories)->with('products', $products)->with('category', $category);
    }
}
