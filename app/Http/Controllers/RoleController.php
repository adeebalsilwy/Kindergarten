<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $query = Role::with('permissions');

        // Handle export functionality if needed
        if ($request->has('export')) {
            // Logic for export could go here, for now we just continue
        }

        $roles = $query->paginate(15);
        $allPermissions = Permission::all();

        return view('pages.access-control.roles.index', compact('roles', 'allPermissions'));

    }

    public function show(Role $role)
    {
        $role->load('permissions');
        return view('pages.access-control.roles.show', compact('role'));
    }

    public function assignPermissions(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permissions' => 'required|array',
        ]);

        $role = Role::findById($request->role_id);
        $role->syncPermissions($request->permissions);

        return redirect()->route('roles.index')->with('success', __('access_control.messages.permissions_updated'));
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

        return redirect()->route('roles.index')->with('success', __('access_control.messages.created'));
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

        return redirect()->route('roles.index')->with('success', __('access_control.messages.updated'));
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->with('success', __('access_control.messages.deleted'));
    }
}
