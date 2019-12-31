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

// Public no authentication routes. ---------------------------------------------------
Route::get('/', 'BasicsController@landing')->name('landing');

// Public auth routes ---------------------------------------------------
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'UserController@home')->name('user.dashboard');
    Route::get('/dashboard/orders', 'UserController@orders')->name('user.orders');
});

// Administrator Routes ---------------------------------------------------
Route::group(['middleware' => ['administrator']], function () {
    Route::get('/admin', 'Admin\BasicsController@index')->name('admin.dashboard');
});
