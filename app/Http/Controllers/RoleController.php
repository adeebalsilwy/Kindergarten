<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();

        return view('pages.access-control.roles.index', compact('roles'));

    }

    public function create()
    {
        $permissions = Permission::all();

        return view('pages.access-control.roles.create', compact('permissions'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'array',
        ]);

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);

        // If this is the admin role (ID 1) or if no permissions are specified, assign all permissions
        if ($role->id == 1 || ! $request->has('permissions')) {
            $allPermissions = Permission::all();
            $role->permissions()->sync($allPermissions);
        } elseif ($request->has('permissions')) {
            $role->permissions()->sync($request->permissions);
        }

        return redirect()->route('roles.index')->with('success', 'Role created successfully with automatic permission assignment');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('pages.access-control.roles.edit', compact('role', 'permissions', 'rolePermissions'));

    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,'.$role->id,
            'permissions' => 'array',
        ]);

        $role->update(['name' => $request->name]);

        // Admin role (ID 1) should always have all permissions
        if ($role->id == 1) {
            $allPermissions = Permission::all();
            $role->permissions()->sync($allPermissions);
        } else {
            $role->permissions()->sync($request->permissions ?? []);
        }

        return redirect()->route('roles.index')->with('success', 'Role updated successfully');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully');
    }
}
