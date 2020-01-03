<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'name' => 'required|min: 5|max: 50|unique:App\Category,name',
            'slug' => 'required|min: 5|max: 50|unique:App\Category,slug'
        ]);

        $validated['slug'] = str_replace([' '], ['_'], $validated['slug']);

        $category = Category::create($validated);

        return Redirect(Route('admin.categories.index'))->with('success', "Created new category {$category->name} with slug {$category->slug}");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|min: 5|max: 50',
            'slug' => 'required|min: 5|max: 50'
        ]);

        if ($category->name != $validated['name']) {
            $request->validate([
                'name' => 'unique:App\Category,name'
            ]);

            $category->name = $validated['name'];
        }

        if ($category->slug != $validated['slug']) {
            $request->validate([
                'slug' => 'unique:App\Category,name'
            ]);

            $category->slug = $validated['slug'];
        }

        $category->save();

        return Redirect(Route('admin.categories.index'))->with('success', "Updated category {$category->name}.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $success = "Successfully deleted the category: " . $category->name;
        $category->delete();

        return back()->with('success', $success);
    }
}
