<?php

/*
|  -------------------------------------------------------------------------
|- Web Routes
|  -------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ADMIN ROUTES
Route::resource('/admin/categories', 'Admin\CategoryController');
Route::resource('admin/forums', 'Admin\ForumController')->names('adm_forums');
Route::resource('/admin/polls/', 'Admin\PollController')->names('adm_polls');
Route::resource('/admin/dashboard', 'Admin\HomeController')->names('adm_home');
Route::get('/admin/home', function () {
    return view('admin-home');
});

// USER ROUTES
Route::get('/polls/single/vote/{slug}/', 'PollResponseController@takePoll');
Route::get('/polls/slide/vote/', 'PollResponseController@takePoll')->name('slide-polls');
Route::resource('/polls', 'PollResponseController');

Route::resource('/articles', 'ArticleController');
Route::get('/articles/view/{slug}/{id}/', 'ArticleController@single')->name('single.article');
Route::post('articles/search/', 'ArticleController@search')->name('search');
Route::get('/article/post/', 'ArticleController@create')->name('create');
Route::get('/articles/sort/{sort}/', 'ArticleController@sort')->name('sort');
Route::post('/comment/article/{article}', 'ArticleController@comment')->name('comment');
Auth::routes();

Route::resource('/forums', 'ForumController')->names('forums');
Route::get('forums/view/{slug}/{id}', 'ForumController@single')->name('single.forum');

Route::resource('/videos', 'VideoController')->names('videos');

Route::get('/home/', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@landing')->name('landing');
Route::post('/subscribe/', 'SubscriptionController@store')->name('subscribe');
Route::get('/subscribers/', 'SubscriptionController@index');
Route::get('/thanks-for-subscribing/', 'SubscriptionController@thanks');
//ADMIN ROUTES
//

//Test Route
//Route::post('/respond-to-poll', 'PollResponseController@store')->name('respond_to_poll');
//Route::get('/respond-to-poll', 'PollResponseController@create');
//Route::get('/popular-poll', 'PollResponseController@popularPolls');
