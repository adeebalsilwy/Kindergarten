<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Display the login view.
     */
    public function showLoginForm(): View
    {
        $demoAccounts = [
            ['role_key' => 'Super Admin', 'email' => 'superadmin@nursery.ye', 'password' => 'admin123', 'name' => __('global.administrator')],
            ['role_key' => 'Administrator', 'email' => 'admin@nursery.ye', 'password' => 'admin123', 'name' => __('global.administrator')],
            ['role_key' => 'Principal', 'email' => 'principal@nursery.ye', 'password' => 'admin123', 'name' => __('global.principal')],
            ['role_key' => 'Accountant', 'email' => 'accountant@nursery.ye', 'password' => 'admin123', 'name' => __('global.accountant')],
            ['role_key' => 'Teacher', 'email' => 'teacher@nursery.ye', 'password' => 'admin123', 'name' => __('global.teacher')],
            ['role_key' => 'Staff', 'email' => 'staff@nursery.ye', 'password' => 'admin123', 'name' => __('global.staff')],
            ['role_key' => 'Parent', 'email' => 'parent@nursery.ye', 'password' => 'admin123', 'name' => __('global.parent_user')],
        ];

        // Get login attempt count for rate limiting info
        $loginAttempts = RateLimiter::attempts($this->throttleKey(request()));
        $maxAttempts = 5;
        $remainingAttempts = max(0, $maxAttempts - $loginAttempts);

        return view('pages.login', compact('demoAccounts', 'loginAttempts', 'remainingAttempts', 'maxAttempts'));
    }

    /**
     * Handle an authentication attempt.
     */
    public function login(Request $request): RedirectResponse
    {
        // Check rate limiting
        $this->ensureIsNotRateLimited($request);

        $credentials = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'min:6'],
        ]);

        // Check if user exists and is active
        $user = User::where('email', $credentials['email'])->first();

        if (! $user) {
            RateLimiter::hit($this->throttleKey($request));
            throw ValidationException::withMessages([
                'email' => [__('auth.failed')],
            ]);
        }

        if (! $user->is_active) {
            throw ValidationException::withMessages([
                'email' => [__('auth.account_inactive')],
            ]);
        }


        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Clear rate limiter on successful login
            RateLimiter::clear($this->throttleKey($request));

            $request->session()->regenerate();

            // Log successful login
            activity()
                ->causedBy($user)
                ->withProperties(['ip' => $request->ip(), 'user_agent' => $request->userAgent()])
                ->log('User logged in');

            // If email not verified, redirect to verification notice
            if (is_null($user->email_verified_at)) {
                return redirect()->intended(route('verification.notice'));
            }

            // Redirect based on user role if verified
            return $this->redirectToDashboard($user);
        }

        // Increment rate limiter on failed attempt
        RateLimiter::hit($this->throttleKey($request));

        throw ValidationException::withMessages([
            'email' => [__('auth.failed')],
        ]);
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request): RedirectResponse
    {
        $user = Auth::user();

        if ($user) {
            activity()
                ->causedBy($user)
                ->log('User logged out');
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', __('auth.logout_success'));
    }

    /**
     * Ensure the login request is not rate limited.
     */
    private function ensureIsNotRateLimited(Request $request): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey($request), 5)) {
            return;
        }

        $seconds = RateLimiter::availableIn($this->throttleKey($request));

        throw ValidationException::withMessages([
            'email' => [__('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ])],
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    private function throttleKey(Request $request): string
    {
        return Str::transliterate(Str::lower($request->input('email')).'|'.$request->ip());
    }

    /**
     * Redirect user to appropriate dashboard based on role.
     */
    private function redirectToDashboard(User $user): RedirectResponse
    {
        // Check for English role names that correspond to the system
        if ($user->hasRole('Super Admin') || $user->hasRole('Administrator')) {
            return redirect()->intended(route('dashboard-overview-1'));
        } elseif ($user->hasRole('Principal')) {
            return redirect()->intended(route('dashboard-overview-1'));
        } elseif ($user->hasRole('Accountant')) {
            return redirect()->intended(route('dashboard-overview-1'));
        } elseif ($user->hasRole('Teacher')) {
            return redirect()->intended(route('dashboard-overview-1'));
        } elseif ($user->hasRole('Staff')) {
            return redirect()->intended(route('dashboard-overview-1'));
        } else {
            return redirect()->intended(route('dashboard-overview-1')); // Default redirect
        }
    }
}
