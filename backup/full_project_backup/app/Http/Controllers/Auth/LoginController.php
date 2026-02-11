<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Display the login view.
     */
    public function showLoginForm(): View
    {
        $demoAccounts = [
            ['role_key' => 'administrator', 'email' => 'admin@kindergarten.ye', 'password' => 'admin123'],
            ['role_key' => 'principal', 'email' => 'principal@kindergarten.ye', 'password' => 'principal123'],
            ['role_key' => 'accountant', 'email' => 'accountant@kindergarten.ye', 'password' => 'accountant123'],
            ['role_key' => 'teacher', 'email' => 'teacher@kindergarten.ye', 'password' => 'teacher123'],
            ['role_key' => 'staff', 'email' => 'staff@kindergarten.ye', 'password' => 'staff123'],
            ['role_key' => 'parent_user', 'email' => 'parent@kindergarten.ye', 'password' => 'parent123'],
        ];

        return view('pages.login', compact('demoAccounts'));
    }

    /**
     * Handle an authentication attempt.
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard-overview-1'));
        }

        return back()->withErrors([
            'email' => __('auth.failed'),
        ])->onlyInput('email');
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
