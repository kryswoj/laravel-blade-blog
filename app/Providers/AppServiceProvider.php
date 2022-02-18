<?php

namespace App\Providers;

use App\View\Components\Alert;
use App\View\Components\Tags;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\ActivityComposer;
use App\Models\BlogPost;
use App\Observers\BlogPostObserver;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Blade::component('posts.components.alert', 'alert');
        Blade::component('tags', Tags::class);

        view()->composer(['posts.index', 'posts.show'], ActivityComposer::class);
        // view()->composer('*', ActivityComposer::class);

        BlogPost::observe(BlogPostObserver::class);
    }
}
