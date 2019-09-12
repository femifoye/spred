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

//VISITORS / General

Route::get('/', 'HomeController@landing')->name('landing');
Route::get('/polls/single/vote/{poll}/{slug}/', 'PollResponseController@takePoll')->name('vote');
Route::get('/polls/slide/vote/', 'PollResponseController@takePoll')->name('slide-polls');
Route::resource('/polls', 'PollResponseController');
Route::resource('/articles', 'ArticleController');
Route::get('/articles/view/{article}/{slug}', 'ArticleController@single')->name('single.article');
Route::post('articles/search/', 'ArticleController@search')->name('articles.search');
Route::get('/articles/sort/{sort}/', 'ArticleController@sort')->name('sort');
Route::get('/videos', 'VideoController@index')->name('videos');
Route::get('/videos/view/{video}/{slug}', 'VideoController@single')->name('single.video');
Route::resource('/forums', 'ForumController')->names('forums');
Route::get('/forums/view/{forum}/{slug}', 'ForumController@single')->name('single.forum');
Route::get('/forums/filter/{sort}/', 'ForumController@filter')->name('filter');
Route::post('/forums/search/', 'ForumController@search')->name('forums.search');

// USER ROUTES
Route::resource('/profile', 'UserController');
Route::get('/profile/me/{profile}', 'UserController@profile')->name('profile.me');
Route::post('/comment/articles/{commentable}', 'CommentController@store')->name('article_comment');
Route::post('/comment/forums/{commentable}', 'CommentController@store')->name('forum_comment');
Route::post('/comment/videos/{commentable}', 'CommentController@store')->name('video_comment');
Route::get('/user/home', 'HomeController@index')->name('home');
Route::post('/subscribe/', 'SubscriptionController@store')->name('subscribe');
Route::get('/subscribers/', 'SubscriptionController@index');
Route::get('/thanks-for-subscribing/', 'SubscriptionController@thanks');

//INTERNAL API
Route::get('/chats', 'ChatController@index');
Route::post('/chats', 'ChatController@store')->name('chats.store');

// ADMIN ROUTES
Route::get('/admin/dashboard', 'Admin\HomeController@index');
Route::resource('/admin/categories', 'Admin\CategoryController')->names('admin.categories');
Route::resource('/admin/forums', 'Admin\ForumController')->names('admin.forums');
Route::resource('/admin/polls', 'Admin\PollController')->names('admin.polls');
Route::patch('/admin/feature/video/{video}', 'Admin\VideoController@featureVideo')->name('admin.video.featureVideo');
Route::resource('/admin/videos', 'Admin\VideoController')->names('admin.videos');
Route::resource('/admin/articles', 'Admin\ArticleController')->names('admin.articles');

Auth::routes();
// Route::get('/test/host', function(){
//     $va = encrypt('user');
//     //     dd("I found you");
//     // }
// });
