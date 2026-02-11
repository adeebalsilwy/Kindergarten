<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function showRegistrationForm(): View
    {
        return view('pages.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'unique:users,email'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
            ],
            [
                'first_name.required' => __('validation.required', ['attribute' => __('global.first_name')]),
                'last_name.required' => __('validation.required', ['attribute' => __('global.last_name')]),
                'email.required' => __('validation.required', ['attribute' => __('global.email')]),
                'email.email' => __('validation.email', ['attribute' => __('global.email')]),
                'email.unique' => __('validation.unique', ['attribute' => __('global.email')]),
                'password.required' => __('validation.required', ['attribute' => __('global.password')]),
                'password.min' => __('validation.min.string', ['attribute' => __('global.password'), 'min' => 6]),
                'password.confirmed' => __('validation.confirmed', ['attribute' => __('global.password')]),
            ]
        );

        $user = User::create([
            'name' => $validated['first_name'].' '.$validated['last_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        try {
            if (class_exists(\Spatie\Permission\Models\Role::class)) {
                $defaultRole = \Spatie\Permission\Models\Role::where('name', 'Parent')->first();
                if ($defaultRole) {
                    $user->assignRole($defaultRole);
                }
            }
        } catch (\Throwable $e) {
        }

        Auth::login($user);

        return redirect()->intended(route('dashboard-overview-1'));
    }
}
