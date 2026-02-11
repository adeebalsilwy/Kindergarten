<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    public function showRegistrationForm(): View
    {
        // Check registration rate limiting
        $registrationAttempts = RateLimiter::attempts($this->throttleKey(request()));
        $maxAttempts = 3;
        $remainingAttempts = max(0, $maxAttempts - $registrationAttempts);

        // Get available roles for registration
        $availableRoles = Role::whereIn('name', ['Parent', 'Teacher', 'Staff'])->get();

        return view('pages.register', compact('registrationAttempts', 'remainingAttempts', 'maxAttempts', 'availableRoles'));
    }

    public function register(Request $request): RedirectResponse
    {
        // Check rate limiting
        $this->ensureIsNotRateLimited($request);

        $validated = $request->validate(
            [
                'first_name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
                'last_name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
                'email' => ['required', 'email', 'max:255', 'unique:users,email'],
                'phone' => ['nullable', 'string', 'max:20', 'regex:/^[0-9+\s\-()]+$/'],
                'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]/'],
                'role' => ['required', 'string', Rule::in(['Parent', 'Teacher', 'Staff'])],
                'accept_terms' => ['required', 'accepted'],
            ],
            [
                'first_name.required' => __('validation.required', ['attribute' => __('global.first_name')]),
                'first_name.regex' => __('validation.alpha_spaces', ['attribute' => __('global.first_name')]),
                'last_name.required' => __('validation.required', ['attribute' => __('global.last_name')]),
                'last_name.regex' => __('validation.alpha_spaces', ['attribute' => __('global.last_name')]),
                'email.required' => __('validation.required', ['attribute' => __('global.email')]),
                'email.email' => __('validation.email', ['attribute' => __('global.email')]),
                'email.unique' => __('validation.unique', ['attribute' => __('global.email')]),
                'phone.regex' => __('validation.phone', ['attribute' => __('global.phone')]),
                'password.required' => __('validation.required', ['attribute' => __('global.password')]),
                'password.min' => __('validation.min.string', ['attribute' => __('global.password'), 'min' => 8]),
                'password.confirmed' => __('validation.confirmed', ['attribute' => __('global.password')]),
                'password.regex' => __('validation.password_strength', ['attribute' => __('global.password')]),
                'role.required' => __('validation.required', ['attribute' => __('global.role')]),
                'accept_terms.accepted' => __('validation.accepted', ['attribute' => __('global.terms_and_conditions')]),
            ]
        );

        try {
            // Create user
            $user = User::create([
                'name' => trim($validated['first_name'].' '.$validated['last_name']),
                'email' => strtolower($validated['email']),
                'phone' => $validated['phone'] ?? null,
                'password' => Hash::make($validated['password']),
                'is_active' => true,
                'email_verified_at' => null,
            ]);

            // Assign role
            if (class_exists(Role::class)) {
                $role = Role::where('name', $validated['role'])->first();
                if ($role) {
                    $user->assignRole($role);
                }
            }

            // Log successful registration
            activity()
                ->causedBy($user)
                ->withProperties(['ip' => $request->ip(), 'user_agent' => $request->userAgent(), 'role' => $validated['role']])
                ->log('User registered');

            // Send email verification
            $user->sendEmailVerificationNotification();

            // Clear rate limiter on successful registration
            RateLimiter::clear($this->throttleKey($request));

            // Auto-login user
            Auth::login($user);

            // Send welcome notification (if notification system is implemented)
            // $user->notify(new WelcomeNotification());

            return redirect()
                ->route('verification.notice')
                ->with('success', __('auth.registration_success', ['name' => $user->name]));

        } catch (\Exception $e) {
            // Increment rate limiter on failure
            RateLimiter::hit($this->throttleKey($request));

            throw ValidationException::withMessages([
                'email' => [__('auth.registration_failed')],
            ]);
        }
    }

    /**
     * Ensure the registration request is not rate limited.
     */
    private function ensureIsNotRateLimited(Request $request): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey($request), 3)) {
            return;
        }

        $seconds = RateLimiter::availableIn($this->throttleKey($request));

        throw ValidationException::withMessages([
            'email' => [__('auth.registration_throttle', [
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
        return Str::transliterate(Str::lower($request->ip()));
    }
}
