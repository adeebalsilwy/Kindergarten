<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Gate::before(function ($user, $ability) {
            if (! method_exists($user, 'hasRole')) {
                return null;
            }

            return ($user->hasRole('super-admin') || $user->hasRole('Administrator')) ? true : null;
        });
    }
}
