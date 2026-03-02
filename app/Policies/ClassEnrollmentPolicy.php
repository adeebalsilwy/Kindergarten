<?php

namespace App\Policies;

use App\Models\ClassEnrollment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClassEnrollmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole(['Administrator', 'Principal', 'Teacher']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ClassEnrollment $classEnrollment): bool
    {
        return $user->hasRole(['Administrator', 'Principal', 'Teacher']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole(['Administrator', 'Principal', 'Teacher']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ClassEnrollment $classEnrollment): bool
    {
        return $user->hasRole(['Administrator', 'Principal', 'Teacher']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ClassEnrollment $classEnrollment): bool
    {
        return $user->hasRole(['Administrator', 'Principal']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ClassEnrollment $classEnrollment): bool
    {
        return $user->hasRole(['Administrator']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ClassEnrollment $classEnrollment): bool
    {
        return $user->hasRole(['Administrator']);
    }
}