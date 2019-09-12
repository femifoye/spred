<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Admin\Category;
use App\Article;
use App\Forum;
use App\Comment;

class ArticleComposerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $articleLength = Article::count();
        global $articleTake;
        $articleTake = ($articleLength > 10)?10:$articleLength;
        View::composer(
            [
                'articles_page',
                'article_page',
                'article_create_form',
                'admins.admin_create_forum',
                'admins.admin-add-article',
                'includes.sidebar',
                'forum_page',
                'forum_page_single'
            ],
            function($view){
                $view->with([
                    'categories' => Category::all(),
                    'popularPost' => Article::latest()->get()->random($GLOBALS['articleTake'])->all()
                ]);
            }
        );
    }
}
