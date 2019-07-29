<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Admin\Category;
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
        View::composer(
            [
                'articles_page',
                'article_page',
                'article_create_form'
            ],
            function($view){
                $view->with([
                    'categories' => Category::all(),
                    'forums' => Forum::all(),
                ]);
            }
        );
    }
}
