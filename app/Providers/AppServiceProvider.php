<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //class Active on html
        Blade::directive('active', function ($expression) {
            list($pattern, $class) = explode(',', str_replace(['(',')', ' ', "'"], '', $expression));
            return "<?= request()->is('$pattern') ? '$class' : ''; ?>";
        });

        
        // pass variable to layouts or master views
        view()->composer('layouts.guest.master', function($view)
        {
            $view->with('mostViewed', \App\Book::mostViewed());
            $view->with('mostBookmark', \App\Book::mostBookmark());
            $view->with('mostDownload', \App\Book::mostDownload());
        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
