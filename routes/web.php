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

Route::get('questions/categories', 'AppQuestionController@selectCategories');
Route::get('questions/init/{category_id}', 'AppQuestionController@initUserPath');
Route::post('questions/', 'AppQuestionController@updateUserPath');
Route::get('products/init/', 'AppProductController@select');
Route::get('products/', 'AppProductController@index');
Route::post('products/filters', 'AppProductController@updateFilters');
Route::get('product/{id}', 'AppProductController@show');

Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/request', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::prefix('admin')->group(function () {

    Route::get('register', 'Auth\RegisterController@showRegistrationForm');
    Route::post('register', 'Auth\RegisterController@register');

    Route::middleware(['auth'])->group(function () {

        Route::view('/', 'admin');

        Route::get('/categories', 'CategoryController@index');
        Route::get('/brands', 'BrandController@index');
        Route::get('/products', 'ProductController@index');
        Route::get('/attributes', 'AttributeController@index');
        Route::get('/questions', 'QuestionController@index');
        Route::get('/users', 'UserController@index');
        Route::get('/import', 'ImportController@index');


        Route::resource('categories','CategoryController');
        Route::resource('brands','BrandController');
        Route::resource('products','ProductController');
        Route::resource('attributes','AttributeController');
        Route::resource('default_values','DefaultValueController');
        Route::resource('product_values','ProductValueController');
        Route::resource('questions','QuestionController');
        Route::resource('answers','AnswerController');
        Route::resource('informations','InformationController');
        Route::resource('users','UserController');
        Route::resource('import','ImportController');

        Route::post('/import_parse', 'ImportController@parseImport')->name('import_parse');
        Route::post('/import_process', 'ImportController@processImport')->name('import_process');
        Route::post('/import_sucess', 'ImportController@sucessImport')->name('import_sucess');

    });

});