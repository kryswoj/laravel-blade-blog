<?php

namespace App\Providers;

use App\View\Components\Alert;
use App\View\Components\Tags;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\ActivityComposer;

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
        Blade::component('posts.components.alert', 'alert');
        Blade::component('tags', Tags::class);

        view()->composer(['posts.index', 'posts.show'], ActivityComposer::class);
        // view()->composer('*', ActivityComposer::class);
    }
}
