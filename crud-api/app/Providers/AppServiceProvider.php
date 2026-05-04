<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
     * define Gate to authorize login: admin
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        
        Gate::define('access-admin', function ($user) {
            return $user->isAdmin;
        });
    }
}