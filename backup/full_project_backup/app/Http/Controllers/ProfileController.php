<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.profile', ['user' => auth()->user()]);
    }

    public function edit()
    {
        return view('pages.profile-edit', ['user' => auth()->user()]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('profile.index')->with('success', __('global.profile_updated_successfully'));
    }

    public function changePassword()
    {
        return view('pages.change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = auth()->user();

        if (! Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => __('global.current_password_is_incorrect')]);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('profile.index')->with('success', __('global.password_changed_successfully'));
    }
}
