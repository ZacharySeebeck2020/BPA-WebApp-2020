<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
|   Here are all the administraton routes that are going to be used
|   by the app. All these routes already have the auth and administrator
|   middlewares attached, so there's no need to do it again. Which will
|   also keep these routes private for the users who need it.
|
|
*/

Route::get('/', 'BasicsController@index')->name('admin.dashboard');
