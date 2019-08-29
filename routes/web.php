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
Route::resource('/admin/videos', 'Admin\VideoController')->names('adm.videos');

Route::get('/admin/articles/view', 'ArticleController@adminView');
Route::get('/admin/forums/view', 'Admin\ForumController@adminView');
Route::get('/admin/videos/view', 'Admin\VideoController@adminView');
Route::get('/admin/polls/view', 'Admin\PollController@adminView');

// USER ROUTES
Route::get('/polls/single/vote/{slug}/', 'PollResponseController@takePoll');
Route::get('/polls/slide/vote/', 'PollResponseController@takePoll')->name('slide-polls');
Route::resource('/polls', 'PollResponseController');

Route::resource('/articles', 'ArticleController');
Route::get('/articles/view/{article}/{slug}', 'ArticleController@single')->name('single.article');
Route::post('articles/search/', 'ArticleController@search')->name('search');
Route::get('/article/post/', 'ArticleController@create')->name('create');
Route::get('/articles/sort/{sort}/', 'ArticleController@sort')->name('sort');
Route::post('/comment/articles/{commentable}', 'CommentController@store')->name('article_comment');
Route::post('/comment/forums/{commentable}', 'CommentController@store')->name('forum_comment');
Route::post('/comment/videos/{commentable}', 'CommentController@store')->name('video_comment');
Auth::routes();

Route::resource('/forums', 'ForumController')->names('forums');
Route::get('/forums/view/{forum}/{slug}', 'ForumController@single')->name('single.forum');


Route::resource('/videos', 'VideoController')->names('videos');
Route::get('/videos/view/{slug}/{id}', 'VideoController@single')->name('single.video');

Route::get('/member/', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@landing')->name('landing');
Route::post('/subscribe/', 'SubscriptionController@store')->name('subscribe');
Route::get('/subscribers/', 'SubscriptionController@index');
Route::get('/thanks-for-subscribing/', 'SubscriptionController@thanks');
//ADMIN ROUTES
//INTERNAL API
Route::get('/chats/create', 'ChatController@create');
Route::get('/chats', 'ChatController@index');
Route::post('/chats', 'ChatController@store')->name('chats.store');

// UTILITY ROUTES
Route::get('/user', 'UtilController@getUser')->name('util.getUser');

//Test Route
//Route::get('/respond-to-poll', 'PollResponseController@create');
//Route::get('/popular-poll', 'PollResponseController@popularPolls');
