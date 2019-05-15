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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    // return view('welcome');
    return '<h1>Hello World </h1>';
});


Route::get('/userx/{id}', function ($id) {
    return "this is the user $id";
    return view('about');
});

Route::get('/userx/{id}/{name}', function ($id, $name) {
    return "this is the user $id with $name";
    return view('about');
});


Route::get('/about', function () {
    return view('about');
});

## Pages
Route::get('/', 'PagesController@index');
Route::get('/pages/about', 'PagesController@about');
Route::get('/pages/services', 'PagesController@services');

##user
Auth::routes();
Route::get('/home', 'UserController@index')->name('home');

##controllers

##Contact
Route::resource('contact', 'ContactController');

### Posts
Route::resource('posts', 'PostsController');
##customers
// Route::resource('customers', 'CustomersController')->middleware('auth');

Route::resource('customers', 'CustomersController');
