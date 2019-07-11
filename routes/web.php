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

// ADMIN ROUTES
Route::get('/admi', function () {
    return view('admin-home');
});
Route::get('/admi/add-article', function () {
    return view('admin-add-article');
});

// USER ROUTES

Route::get('/', function () {
    return view('landing_page');
});
Route::get('/articles', function () {
    return view('articles_page');
});
Route::get('/article/:id', function () {
    return view('article_page');
});
Route::resource('/forum', '\App\ForumController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
