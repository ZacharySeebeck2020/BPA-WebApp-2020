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
// All the default authentication routes wrapped into one nice little package.
Auth::routes();

// Public no authentication routes. ---------------------------------------
Route::get('/', 'BasicsController@landing')->name('landing');

// Public auth routes -----------------------------------------------------
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'UserController@home')->name('user.dashboard');
    Route::get('/dashboard/orders', 'UserController@orders')->name('user.orders');
});

// Administration Routes --------------------------------------------------
Route::name('admin.')->prefix('admin')->middleware('administrator')->namespace('Admin')->group(function () {
    Route::get('/', 'BasicsController@index')->name('dashboard');

    // Order Routes -------------------------------------------------------
    Route::name('orders.')->prefix('orders')->group(function () {
        Route::get('/', 'OrdersController@index')->name('index');
    });

    // Product Routes -----------------------------------------------------
    Route::name('products.')->prefix('products')->group(function () {
        Route::get('/', 'ProductsController@index')->name('index');
        Route::get('/new', 'ProductsController@create')->name('create');
        Route::put('/new', 'ProductsController@store')->name('store');
        Route::get('/{product}', 'ProductsController@edit')->name('edit');
        Route::post('/{product}', 'ProductsController@update')->name('update');
        Route::delete('/{product}', 'ProductsController@destroy')->name('delete');
    });

    // Category Routes ----------------------------------------------------
    Route::name('categories.')->prefix('categories')->group(function () {
        Route::get('/', 'CategoriesController@index')->name('index');
        Route::get('/new', 'CategoriesController@create')->name('create');
        Route::put('/new', 'CategoriesController@store')->name('store');
        Route::get('/{category}', 'CategoriesController@edit')->name('edit');
        Route::post('/{category}', 'CategoriesController@update')->name('update');
        Route::delete('/{category}', 'CategoriesController@destroy')->name('delete');

    });

    // Coupon Routes ------------------------------------------------------
    Route::name('coupons.')->prefix('coupons')->group(function () {
        Route::get('/', 'CouponsController@index')->name('index');
    });
});
