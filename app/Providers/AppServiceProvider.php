<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Comment;
use App\Models\Category;
use App\Models\ReleaseYear;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share('comments', Comment::all());
        View::share('categories', Category::all());
        View::share('release_years', ReleaseYear::all());
    }
}
