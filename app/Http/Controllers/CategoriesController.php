<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    public function view($category) {
        $categories = Category::all();
        $category = Category::where('slug', $category)->first();
        $products = $category->products()->paginate(10);

        return view('products.categoryIndex')->with('categories', $categories)->with('products', $products)->with('category', $category);
    }
}
