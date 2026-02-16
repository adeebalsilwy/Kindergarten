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

        Gate::define('view_settings', function ($user) {
            return true;
        });

        Gate::define('edit_settings', function ($user) {
            return true;
        });

        Gate::define('view_attendances', function ($user) { return true; });
        Gate::define('create_attendances', function ($user) { return true; });
        Gate::define('edit_attendances', function ($user) { return true; });
        Gate::define('delete_attendances', function ($user) { return true; });

        Gate::define('view_grades', function ($user) { return true; });
        Gate::define('create_grades', function ($user) { return true; });
        Gate::define('edit_grades', function ($user) { return true; });
        Gate::define('delete_grades', function ($user) { return true; });
    }
}
