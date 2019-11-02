<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Public Routes
Route::get('/home', 'HomeController@index')->name('home');




// Administration Routes.
Route::prefix('administration')->name('admin.')->group(function () {
    // Home Route
    Route::get('/', 'AdminController@index')->name('index');

    // Catalog Routes
    Route::prefix('catalog')->name('catalog.')->group(function () {
        // Product Routes
        Route::prefix('products')->name('products.')->group(function () {
            // Overview Route
            Route::get('/', 'ProductController@index')->name('index');
            // Create
            Route::get('/create', 'ProductController@create')->name('create');
            Route::post('/create', 'ProductController@store')->name('store');
            // Modify
            Route::get('/modify/{id}', 'ProductController@edit')->name('edit');
            Route::post('/modify/{id}', 'ProductController@update')->name('update');

        });

        // Product Routes
        Route::prefix('categories')->name('categories.')->group(function () {
            // Overview Route
            Route::get('/', 'CategoryController@index')->name('index');
            // Create
            Route::get('/create', 'CategoryController@create')->name('create');
            Route::post('/create', 'CategoryController@store')->name('store');
            // Modify
            Route::get('/modify/{id}', 'CategoryController@edit')->name('edit');
            Route::post('/modify/{id}', 'CategoryController@update')->name('update');

        });
    });
});
