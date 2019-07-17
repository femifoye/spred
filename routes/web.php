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

Route::resource('/articles', 'ArticleController');
Route::get('/articles/view/{slug}/{id}', 'ArticleController@single')->name('single.article');
Route::post('articles/search', 'ArticleController@search')->name('search');
Route::get('article/post', 'ArticleController@create')->name('create');
Route::get('articles/sort/{sort}', 'ArticleController@sort')->name('sort');
Route::resource('/forum', 'ForumController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@landing')->name('landing');

//ADMIN ROUTES
Route::resource('/admin/categories', 'Admin\CategoryController');
