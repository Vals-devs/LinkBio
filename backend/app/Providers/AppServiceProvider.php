<?php

namespace App\Providers;

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
        // Pastikan view compiled disimpan di /tmp untuk environment serverless (Vercel)
        if (config('app.env') === 'production') {
            config(['view.compiled' => '/tmp']);
        }
    }
}
