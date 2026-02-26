@extends('../themes/base')

@section('head')
    <title>{{ __('global.register') }} - {{ config('app.name') }}</title>
@endsection

@section('content')
    <div @class([
        'p-3 sm:px-8 relative h-screen lg:overflow-hidden bg-primary xl:bg-white dark:bg-darkmode-800 xl:dark:bg-darkmode-600',
        'before:hidden before:xl:block before:content-[\'\'] before:w-[57%] before:-mt-[28%] before:-mb-[16%] before:-ml-[13%] before:absolute before:inset-y-0 before:left-0 before:transform before:rotate-[-4.5deg] before:bg-primary/20 before:rounded-[100%] before:dark:bg-darkmode-400',
        'after:hidden after:xl:block after:content-[\'\'] after:w-[57%] after:-mt-[20%] after:-mb-[13%] after:-ml-[13%] after:absolute after:inset-y-0 after:left-0 after:transform after:rotate-[-4.5deg] after:bg-primary after:rounded-[100%] after:dark:bg-darkmode-700',
    ])>
        <div class="container relative z-10 sm:px-10">
            <div class="block grid-cols-2 gap-4 xl:grid">
                <!-- BEGIN: Register Info -->
                <div class="hidden min-h-screen flex-col xl:flex">
                    <a
                        class="-intro-x flex items-center pt-5"
                        href=""
                    >
                        <img
                            class="w-6"
                            src="{{ Vite::asset('resources/images/logo.svg') }}"
                            alt="{{ config('app.name') }}"
                        />
                        <span class="ms-3 text-lg text-white"> {{ config('app.name') }} </span>
                    </a>
                    <div class="my-auto">
                        <img
                            class="-intro-x -mt-16 w-1/2"
                            src="{{ Vite::asset('resources/images/illustration.svg') }}"
                            alt="{{ config('app.name') }}"
                        />
                        <div class="-intro-x mt-10 text-4xl font-medium leading-tight text-white">
                            {{ __('global.auth_intro_sign_up') }}
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">
                            {{ __('global.manage_accounts_one_place') }}
                        </div>
                    </div>
                </div>
                <!-- END: Register Info -->
                <!-- BEGIN: Register Form -->
                <div class="my-10 flex h-screen py-5 xl:my-0 xl:h-auto xl:py-0">
                    <div
                        class="mx-auto my-auto w-full rounded-md bg-white px-5 py-8 shadow-md dark:bg-darkmode-600 sm:w-3/4 sm:px-8 lg:w-2/4 xl:ms-20 xl:w-auto xl:bg-transparent xl:p-0 xl:shadow-none">
                        @php
                            $activeLangs = \App\Models\Language::where('is_active', true)->get();
                            $currentLocale = app()->getLocale();
                            $nextLang = $activeLangs->where('code', '!=', $currentLocale)->first() ?? $activeLangs->first();
                        @endphp
                        <div class="flex justify-end mb-4">
                            <a href="{{ route('locale.switch', $nextLang->code) }}">
                                <x-base.button variant="outline-secondary" class="px-3 py-2">
                                    <x-base.lucide icon="Languages" class="w-5 h-5 me-2" />
                                    <span>
                                        <span class="font-semibold text-primary">{{ $nextLang->name }}</span>
                                    </span>
                                </x-base.button>
                            </a>
                        </div>
                        <h2 class="intro-x text-center text-2xl font-bold xl:text-start xl:text-3xl">
                            {{ __('global.register') }}
                        </h2>
                        <div class="intro-x mt-2 text-center text-slate-400 dark:text-slate-400 xl:hidden">
                            {{ __('global.auth_intro_sign_up') }} {{ __('global.manage_accounts_one_place') }}
                        </div>
                        <!-- Registration Security Indicator -->
                        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                            <div class="flex items-center">
                                <x-base.lucide icon="UserPlus" class="w-5 h-5 text-green-500 me-3" />
                                <div>
                                    <div class="font-medium text-green-800">{{ __('global.secure_registration') }}</div>
                                    <div class="text-sm text-green-600 mt-1">
                                        {{ __('global.registration_attempts_remaining', ['attempts' => $remainingAttempts ?? 3]) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @if ($errors->any())
                            <x-base.alert variant="danger" class="mb-6">
                                <div class="font-medium">{{ __('global.validation_errors') }}</div>
                                <ul class="mt-2 text-sm">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </x-base.alert>
                        @endif
                        
                        @if (session('success'))
                            <x-base.alert variant="success" class="mb-6">
                                {{ session('success') }}
                            </x-base.alert>
                        @endif
                        @if (session('error'))
                            <x-base.alert variant="danger" class="mb-6">
                                {{ session('error') }}
                            </x-base.alert>
                        @endif
                        
                        <form method="POST" action="{{ route('auth.register.post') }}" class="intro-x mt-8" id="registration-form">
                            @csrf
                            
                            <!-- Name Fields -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <x-base.form-label class="font-medium text-slate-700 dark:text-slate-300 mb-2">
                                        {{ __('global.first_name') }} *
                                    </x-base.form-label>
                                    <x-base.form-input
                                        class="intro-x block min-w-full px-4 py-3 xl:min-w-[350px] border-slate-300 focus:border-primary focus:ring-primary"
                                        type="text"
                                        name="first_name"
                                        id="first_name"
                                        placeholder="{{ __('global.enter_first_name') }}"
                                        value="{{ old('first_name') }}"
                                        required
                                        autocomplete="given-name"
                                    />
                                    @if($errors->has('first_name'))
                                        <x-base.form-help class="text-danger mt-2">{{ $errors->first('first_name') }}</x-base.form-help>
                                    @endif
                                </div>
                                
                                <div>
                                    <x-base.form-label class="font-medium text-slate-700 dark:text-slate-300 mb-2">
                                        {{ __('global.last_name') }} *
                                    </x-base.form-label>
                                    <x-base.form-input
                                        class="intro-x block min-w-full px-4 py-3 xl:min-w-[350px] border-slate-300 focus:border-primary focus:ring-primary"
                                        type="text"
                                        name="last_name"
                                        id="last_name"
                                        placeholder="{{ __('global.enter_last_name') }}"
                                        value="{{ old('last_name') }}"
                                        required
                                        autocomplete="family-name"
                                    />
                                    @if($errors->has('last_name'))
                                        <x-base.form-help class="text-danger mt-2">{{ $errors->first('last_name') }}</x-base.form-help>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Email Field -->
                            <div class="mb-4">
                                <x-base.form-label class="font-medium text-slate-700 dark:text-slate-300 mb-2">
                                    {{ __('global.email_address') }} *
                                </x-base.form-label>
                                <x-base.form-input
                                    class="intro-x block min-w-full px-4 py-3 xl:min-w-[350px] border-slate-300 focus:border-primary focus:ring-primary"
                                    type="email"
                                    name="email"
                                    id="email"
                                    placeholder="{{ __('global.enter_your_email') }}"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="email"
                                />
                                @if($errors->has('email'))
                                    <x-base.form-help class="text-danger mt-2">{{ $errors->first('email') }}</x-base.form-help>
                                @endif
                            </div>
                            
                            <!-- Phone Field -->
                            <div class="mb-4">
                                <x-base.form-label class="font-medium text-slate-700 dark:text-slate-300 mb-2">
                                    {{ __('global.phone_number') }}
                                </x-base.form-label>
                                <x-base.form-input
                                    class="intro-x block min-w-full px-4 py-3 xl:min-w-[350px] border-slate-300 focus:border-primary focus:ring-primary"
                                    type="tel"
                                    name="phone"
                                    id="phone"
                                    placeholder="{{ __('global.enter_phone_number') }}"
                                    value="{{ old('phone') }}"
                                    autocomplete="tel"
                                />
                                @if($errors->has('phone'))
                                    <x-base.form-help class="text-danger mt-2">{{ $errors->first('phone') }}</x-base.form-help>
                                @endif
                            </div>
                            
                            <!-- Role Selection -->
                            <div class="mb-4">
                                <x-base.form-label class="font-medium text-slate-700 dark:text-slate-300 mb-2">
                                    {{ __('global.role') }} *
                                </x-base.form-label>
                                <select 
                                    name="role" 
                                    id="role"
                                    class="intro-x block min-w-full px-4 py-3 xl:min-w-[350px] border-slate-300 focus:border-primary focus:ring-primary rounded-md"
                                    required
                                >
                                    <option value="">{{ __('global.select_role') }}</option>
                                    @foreach($availableRoles ?? [] as $role)
                                        <option value="{{ $role->name }}" {{ old('role') == $role->name ? 'selected' : '' }}>
                                            {{ __($role->name) }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has('role'))
                                    <x-base.form-help class="text-danger mt-2">{{ $errors->first('role') }}</x-base.form-help>
                                @endif
                            </div>
                            
                            <!-- Password Fields -->
                            <div class="mb-4">
                                <x-base.form-label class="font-medium text-slate-700 dark:text-slate-300 mb-2">
                                    {{ __('global.password') }} *
                                </x-base.form-label>
                                <div class="relative">
                                    <x-base.form-input
                                        class="intro-x block min-w-full px-4 py-3 xl:min-w-[350px] border-slate-300 focus:border-primary focus:ring-primary pe-12"
                                        type="password"
                                        name="password"
                                        id="password"
                                        placeholder="{{ __('global.enter_strong_password') }}"
                                        required
                                        autocomplete="new-password"
                                    />
                                    <button type="button" class="absolute inset-y-0 right-0 pe-3 flex items-center" onclick="togglePasswordVisibility('password', 'password-eye')">
                                        <x-base.lucide icon="Eye" class="w-5 h-5 text-slate-400 hover:text-slate-600" id="password-eye" />
                                    </button>
                                </div>
                                
                                <!-- Password Strength Meter -->
                                <div class="mt-3">
                                    <div class="flex justify-between text-xs text-slate-500 mb-1">
                                        <span>{{ __('global.password_strength') }}</span>
                                        <span id="password-strength-text">{{ __('global.weak') }}</span>
                                    </div>
                                    <div class="h-2 bg-slate-200 rounded-full overflow-hidden">
                                        <div id="password-strength-bar" class="h-full bg-red-500 rounded-full transition-all duration-300" style="width: 0%"></div>
                                    </div>
                                </div>
                                
                                <div class="mt-2 text-xs text-slate-500">
                                    {{ __('global.password_requirements') }}
                                </div>
                                
                                @if($errors->has('password'))
                                    <x-base.form-help class="text-danger mt-2">{{ $errors->first('password') }}</x-base.form-help>
                                @endif
                            </div>
                            
                            <!-- Password Confirmation -->
                            <div class="mb-4">
                                <x-base.form-label class="font-medium text-slate-700 dark:text-slate-300 mb-2">
                                    {{ __('global.confirm_password') }} *
                                </x-base.form-label>
                                <div class="relative">
                                    <x-base.form-input
                                        class="intro-x block min-w-full px-4 py-3 xl:min-w-[350px] border-slate-300 focus:border-primary focus:ring-primary pe-12"
                                        type="password"
                                        name="password_confirmation"
                                        id="password_confirmation"
                                        placeholder="{{ __('global.confirm_your_password') }}"
                                        required
                                        autocomplete="new-password"
                                    />
                                    <button type="button" class="absolute inset-y-0 right-0 pe-3 flex items-center" onclick="togglePasswordVisibility('password_confirmation', 'confirm-eye')">
                                        <x-base.lucide icon="Eye" class="w-5 h-5 text-slate-400 hover:text-slate-600" id="confirm-eye" />
                                    </button>
                                </div>
                                @if($errors->has('password_confirmation'))
                                    <x-base.form-help class="text-danger mt-2">{{ $errors->first('password_confirmation') }}</x-base.form-help>
                                @endif
                            </div>
                            <!-- Terms and Conditions -->
                            <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                                <div class="flex items-start">
                                    <x-base.form-check.input
                                        class="me-3 mt-1 border-slate-300 text-primary focus:ring-primary"
                                        id="accept_terms"
                                        name="accept_terms"
                                        type="checkbox"
                                        required
                                    />
                                    <label
                                        class="cursor-pointer select-none text-sm text-slate-700 dark:text-slate-300"
                                        for="accept_terms"
                                    >
                                        {{ __('global.i_agree_to') }}
                                        <a
                                            class="text-primary hover:underline font-medium"
                                            href="#"
                                            target="_blank"
                                        >
                                            {{ __('global.terms_and_conditions') }}
                                        </a>
                                        {{ __('global.and') }}
                                        <a
                                            class="text-primary hover:underline font-medium"
                                            href="#"
                                            target="_blank"
                                        >
                                            {{ __('global.privacy_policy') }}
                                        </a>
                                        *
                                    </label>
                                </div>
                                @if($errors->has('accept_terms'))
                                    <x-base.form-help class="text-danger mt-2">{{ $errors->first('accept_terms') }}</x-base.form-help>
                                @endif
                            </div>
                            
                            <!-- Submit Button -->
                            <div class="intro-x mt-5 text-center xl:mt-8 xl:text-start">
                                <x-base.button
                                    class="w-full px-4 py-3 align-top xl:me-3 xl:w-40 flex items-center justify-center"
                                    variant="primary"
                                    type="submit"
                                    id="register-button"
                                >
                                    <x-base.lucide icon="UserPlus" class="w-4 h-4 me-2" />
                                    {{ __('global.create_account') }}
                                </x-base.button>
                                <div class="mt-4 text-center">
                                    <span class="text-slate-600 dark:text-slate-400">{{ __('global.already_have_account') }}</span>
                                    <a href="{{ route('auth.login') }}" class="text-primary hover:underline font-medium ms-1">
                                        {{ __('global.sign_in_here') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END: Register Form -->
            </div>
        </div>
    </div>
@pushOnce('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Scroll to first error
            var firstErrorField = document.querySelector('.text-danger');
            if (firstErrorField) {
                firstErrorField.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
            
            // Password visibility toggle
            window.togglePasswordVisibility = function(inputId, eyeId) {
                const input = document.getElementById(inputId);
                const eyeIcon = document.getElementById(eyeId);
                
                if (input.type === 'password') {
                    input.type = 'text';
                    eyeIcon.setAttribute('icon', 'EyeOff');
                } else {
                    input.type = 'password';
                    eyeIcon.setAttribute('icon', 'Eye');
                }
            };
            
            // Password strength checker
            const passwordInput = document.getElementById('password');
            const strengthBar = document.getElementById('password-strength-bar');
            const strengthText = document.getElementById('password-strength-text');
            
            if (passwordInput) {
                passwordInput.addEventListener('input', function() {
                    const password = this.value;
                    const strength = calculatePasswordStrength(password);
                    updatePasswordStrength(strength);
                });
            }
            
            function calculatePasswordStrength(password) {
                let score = 0;
                
                // Length check
                if (password.length >= 8) score += 20;
                if (password.length >= 12) score += 10;
                
                // Character variety
                if (/[a-z]/.test(password)) score += 15;
                if (/[A-Z]/.test(password)) score += 15;
                if (/[0-9]/.test(password)) score += 15;
                if (/[^A-Za-z0-9]/.test(password)) score += 25;
                
                return Math.min(score, 100);
            }
            
            function updatePasswordStrength(score) {
                strengthBar.style.width = score + '%';
                
                if (score < 30) {
                    strengthBar.className = 'h-full bg-red-500 rounded-full transition-all duration-300';
                    strengthText.textContent = '{{ __('global.weak') }}';
                    strengthText.className = 'text-red-600 font-medium';
                } else if (score < 60) {
                    strengthBar.className = 'h-full bg-orange-500 rounded-full transition-all duration-300';
                    strengthText.textContent = '{{ __('global.medium') }}';
                    strengthText.className = 'text-orange-600 font-medium';
                } else if (score < 80) {
                    strengthBar.className = 'h-full bg-yellow-500 rounded-full transition-all duration-300';
                    strengthText.textContent = '{{ __('global.good') }}';
                    strengthText.className = 'text-yellow-600 font-medium';
                } else {
                    strengthBar.className = 'h-full bg-green-500 rounded-full transition-all duration-300';
                    strengthText.textContent = '{{ __('global.strong') }}';
                    strengthText.className = 'text-green-600 font-medium';
                }
            }
            
            // Form validation and submission
            const form = document.getElementById('registration-form');
            const registerButton = document.getElementById('register-button');
            
            if (form && registerButton) {
                form.addEventListener('submit', function(e) {
                    const originalText = registerButton.innerHTML;
                    
                    // Show loading state
                    registerButton.innerHTML = '<x-base.lucide icon="Loader" class="w-4 h-4 me-2 animate-spin" /> {{ __('global.creating_account') }}';
                    registerButton.disabled = true;
                    
                    // Revert after 10 seconds if no response
                    setTimeout(() => {
                        registerButton.innerHTML = originalText;
                        registerButton.disabled = false;
                    }, 10000);
                });
            }
            
            // Input validation feedback
            const inputs = form.querySelectorAll('input, select');
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (this.value && this.checkValidity()) {
                        this.classList.add('border-green-500');
                        this.classList.remove('border-red-500');
                    } else if (this.value) {
                        this.classList.add('border-red-500');
                        this.classList.remove('border-green-500');
                    } else {
                        this.classList.remove('border-green-500', 'border-red-500');
                    }
                });
            });
        });
    </script>
@endPushOnce
@endsection
