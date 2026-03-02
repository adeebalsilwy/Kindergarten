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
        if ($this->app->environment('production')) {
            // Force HTTPS in production
            \URL::forceScheme('https');

            // Enable asset URL with CDN if configured
            if (config('app.asset_url')) {
                \URL::forceRootUrl(config('app.asset_url'));
            }
        }
    }
}
