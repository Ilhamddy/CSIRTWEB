<?php

namespace App\Providers;

use App\Models\Layanan;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();

        View::composer('*', function ($view) {
            $view->with('menuLayanan', Layanan::orderBy('title')->where('is_active', true)->get());
        });
    }
}
