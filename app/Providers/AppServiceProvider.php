<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();
        Blade::if('admin', function () {
            return auth()->user()->isAdmin();
        });
        Blade::if('tenant', function () {
            return auth()->user()->isTenant();
        });
        Blade::if('user', function () {
            return auth()->user()->isUser();
        });
    }
}
