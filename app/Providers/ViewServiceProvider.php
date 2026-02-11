<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        View::composer('*', 'App\View\Composers\ThemeComposer');
        View::composer('*', 'App\View\Composers\LayoutComposer');
        View::composer('*', 'App\View\Composers\MenuComposer');
        View::composer('*', 'App\View\Composers\FakerComposer');
        View::composer('*', 'App\View\Composers\LanguageComposer');
    }
}
