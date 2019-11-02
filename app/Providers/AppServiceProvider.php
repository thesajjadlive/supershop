<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\ServiceProvider;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); //NEW: Increase StringLength
        view()->composer('layouts/front/_header', function ($view){
            $view->with('categories',Category::orderBy('name','ASC')->pluck('name','id'));
        });
    }
}
