<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a form listing all categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all categories through a model.
        $categories = Category::all();

        return view('admin.categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming data from the request.
        $validated = $request->validate([
            'name' => 'required|min: 5|max: 50|unique:App\Category,name',
            'slug' => 'required|min: 5|max: 50|unique:App\Category,slug'
        ]);

        // Slugify the provided slug.
        $validated['slug'] = Str::slug($validated['slug'], '_');

        // Create the category and store it in the database using the provided model.
        $category = Category::create($validated);

        // Return the new page with any information needed.
        return Redirect(Route('admin.categories.index'))->with('success', "Created new category {$category->name} with slug {$category->slug}");
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit')->with('category', $category);
    }

    /**
     * Update the specified category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // Validate the incoming data from the request.
        $validated = $request->validate([
            'name' => 'required|min: 5|max: 50',
            'slug' => 'required|min: 5|max: 50'
        ]);

        // If the name has been updated, make sure it's not currently in the database.
        if ($category->name != $validated['name']) {
            $request->validate([
                'name' => 'unique:App\Category,name'
            ]);

            $category->name = $validated['name'];
        }

        // If the slug has been updated, make sure it's not currently in the database.
        if ($category->slug != $validated['slug']) {
            $request->validate([
                'slug' => 'unique:App\Category,name'
            ]);

            $category->slug = $validated['slug'];
        }

        // Save the category to the database.
        $category->save();

        // Return the new page with any information needed.
        return Redirect(Route('admin.categories.index'))->with('success', "Updated category {$category->name}.");
    }

    /**
     * Remove the specified category from the database.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // Delete the category from the database.
        $category->delete();

        // Return back with the success message.
        return back()->with('success',  "Successfully deleted the category: " . $category->name);
    }
}
