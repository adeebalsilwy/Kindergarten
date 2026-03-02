<?php

namespace App\Providers;

use App\Models\ClassEnrollment;
use App\Models\Material;
use App\Policies\ClassEnrollmentPolicy;
use App\Policies\MaterialPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Material::class => MaterialPolicy::class,
        ClassEnrollment::class => ClassEnrollmentPolicy::class,
    ];
    
    public function boot(): void
    {
        $this->registerPolicies();
        
        Gate::before(function ($user, $ability) {
            if (! method_exists($user, 'hasRole')) {
                return null;
            }

            return ($user->hasRole('super-admin') || $user->hasRole('Administrator')) ? true : null;
        });
    }
}
