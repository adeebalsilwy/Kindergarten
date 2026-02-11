<?php

namespace App\Traits;

use App\Models\Permission;
use App\Models\Role;

trait HasPermissions
{
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'model_has_roles', 'model_id', 'role_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'model_has_permissions', 'model_id', 'permission_id');
    }

    public function hasPermissionTo($permission)
    {
        if (is_string($permission)) {
            $permission = Permission::where('name', $permission)->first();
        }

        if (! $permission) {
            return false;
        }

        return $this->permissions->contains('id', $permission->id) ||
               $this->roles()->whereHas('permissions', function ($q) use ($permission) {
                   $q->where('permissions.id', $permission->id);
               })->exists();
    }

    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return $this->roles->contains('id', $role->id);
    }

    public function assignRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name', $role)->first();
        }
        $this->roles()->syncWithoutDetaching([$role->id]);
    }

    public function givePermissionTo($permission)
    {
        if (is_string($permission)) {
            $permission = Permission::where('name', $permission)->first();
        }
        $this->permissions()->syncWithoutDetaching([$permission->id]);
    }
}
