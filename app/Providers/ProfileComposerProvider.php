<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class ProfileComposerProvider extends ServiceProvider
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
                'includes.navigation'
            ],
            function($view){
                if(auth::check()){
                    $view->with([
                        'profile' => Auth::user()->profile()->first(),
                    ]);
                }
            }
        );
    }
}
