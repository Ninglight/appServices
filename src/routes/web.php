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

/*Route::get('/', 'AppController@index');*/

Route::prefix('admin')->group(function () {

    Route::middleware(['auth'])->group(function () {

        Route::resource('categories','CategoryController');
        Route::resource('brands','BrandController');
        Route::resource('products','ProductController');
        Route::resource('attributes','AttributeController');
        Route::resource('default_values','DefaultValueController');

    });

    // These will juste be prefixed with "manager"
    Route::view('/', 'admin');
});


Route::prefix('admin')->group(function () {
    Route::get('users', function () {
        print 'Salut';
    });
});