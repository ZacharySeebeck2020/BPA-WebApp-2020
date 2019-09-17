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
Route::prefix('administration')->group(function () {
    // Home Route
    Route::get('/', 'AdminController@index');

    // Product Routes
    Route::prefix('products')->group(function () {
        // Overview Route
        Route::get('/', 'ProductController@index');
        // All Products Route
        Route::get('/all', 'ProductController@all');
        // Create
        Route::get('/create', 'ProductController@create');
        Route::post('/create', 'ProductController@store');
        // Modify
        Route::get('/modify/{id}', 'ProductController@edit');
        Route::post('/modify/{id}', 'ProductController@update');

    });
});
