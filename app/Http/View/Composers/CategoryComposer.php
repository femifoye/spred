<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use \App\Category;

class CategoryComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $categories;

    /**
     * Create a new article composer.
     *
     * @param  ArticleRepository  $users
     * @return void
     */
    public function __construct(\App\Categroy $categories)
    {
        // Dependencies automatically resolved by service container...
        $this->categories = $categories;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categories', $this->categories);
    }
    /*

        View::composer(
            'articles_page', function($view){
                $view->with('categories', Category::all());
            });
    */
}
