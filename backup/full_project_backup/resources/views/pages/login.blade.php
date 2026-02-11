@extends('../themes/base')

@section('head')
    <title>{{ __('global.login') }} - {{ config('app.name') }}</title>
@endsection

@section('content')
    <div @class([
        'p-3 sm:px-8 relative h-screen lg:overflow-hidden bg-primary xl:bg-white dark:bg-darkmode-800 xl:dark:bg-darkmode-600',
        'before:hidden before:xl:block before:content-[\'\'] before:w-[57%] before:-mt-[28%] before:-mb-[16%] before:-ml-[13%] before:absolute before:inset-y-0 before:left-0 before:transform before:rotate-[-4.5deg] before:bg-primary/20 before:rounded-[100%] before:dark:bg-darkmode-400',
        'after:hidden after:xl:block after:content-[\'\'] after:w-[57%] after:-mt-[20%] after:-mb-[13%] after:-ml-[13%] after:absolute after:inset-y-0 after:left-0 after:transform after:rotate-[-4.5deg] after:bg-primary after:rounded-[100%] after:dark:bg-darkmode-700',
    ])>
        <div class="container relative z-10 sm:px-10">
            <div class="block grid-cols-2 gap-4 xl:grid">
                <!-- BEGIN: Login Info -->
                <div class="hidden min-h-screen flex-col xl:flex">
                    <a
                        class="-intro-x flex items-center pt-5"
                        href=""
                    >
                        <img
                            class="w-10"
                            src="{{ Vite::asset('resources/images/logo.svg') }}"
                            alt="{{ config('app.name') }}"
                        />
                        <span class="ml-3 text-2xl font-bold text-white"> {{ config('app.name') }} </span>
                    </a>
                    <div class="my-auto">
                        <img
                            class="-intro-x -mt-16 w-1/2"
                            src="{{ Vite::asset('resources/images/illustration.svg') }}"
                            alt="{{ config('app.name') }}"
                        />
                        <div class="-intro-x mt-10 text-4xl font-medium leading-tight text-white">
                            {{ __('global.auth_intro_sign_in') }}
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">
                            {{ __('global.manage_accounts_one_place') }}
                        </div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                <div class="my-10 flex h-screen py-5 xl:my-0 xl:h-auto xl:py-0">
                    <div
                        class="mx-auto my-auto w-full rounded-md bg-white px-5 py-8 shadow-md dark:bg-darkmode-600 sm:w-3/4 sm:px-8 lg:w-2/4 xl:ml-20 xl:w-auto xl:bg-transparent xl:p-0 xl:shadow-none">
                        
                        @php
                            $activeLangs = \App\Models\Language::where('is_active', true)->get();
                            $currentLocale = app()->getLocale();
                            $currentLang = $activeLangs->where('code', $currentLocale)->first();
                            $nextLang = $activeLangs->where('code', '!=', $currentLocale)->first() ?? $activeLangs->first();
                        @endphp
                        
                        <div class="intro-x flex justify-between items-center mb-10">
                            <div class="flex items-center">
                                <x-base.lucide icon="Globe" class="w-5 h-5 text-slate-600 dark:text-slate-400 mr-2" />
                                <span class="text-slate-600 dark:text-slate-400 text-sm">
                                    {{ $currentLang ? $currentLang->name : app()->getLocale() }}
                                </span>
                            </div>
                            <a href="{{ route('locale.switch', $nextLang->code) }}" class="flex items-center text-slate-600 dark:text-slate-400 hover:text-primary transition-colors">
                                <x-base.lucide icon="RefreshCw" class="w-5 h-5 mr-1" />
                                <span class="font-medium text-xs">{{ __('global.change_language') }}</span>
                            </a>
                        </div>

                        <h2 class="intro-x text-center text-2xl font-bold xl:text-left xl:text-3xl">
                            {{ __('global.login') }}
                        </h2>
                        <div class="intro-x mt-2 text-center text-slate-400 xl:hidden">
                            {{ __('global.auth_intro_sign_in') }} {{ __('global.manage_accounts_one_place') }}
                        </div>

                        <div class="intro-x mt-8">
                            <form method="POST" action="{{ route('auth.login.post') }}" id="login-form">
                                @csrf
                                <x-base.form-input
                                    class="intro-x block min-w-full px-4 py-3 xl:min-w-[400px]"
                                    type="email"
                                    name="email"
                                    id="email"
                                    placeholder="{{ __('global.email') }}"
                                    required
                                />
                                @if($errors->has('email'))
                                    <x-base.form-help class="text-danger mt-2">{{ $errors->first('email') }}</x-base.form-help>
                                @endif
                                
                                <x-base.form-input
                                    class="intro-x mt-4 block min-w-full px-4 py-3 xl:min-w-[400px]"
                                    type="password"
                                    name="password"
                                    id="password"
                                    placeholder="{{ __('global.password') }}"
                                    required
                                />
                                @if($errors->has('password'))
                                    <x-base.form-help class="text-danger mt-2">{{ $errors->first('password') }}</x-base.form-help>
                                @endif

                                <div class="intro-x mt-4 flex text-xs text-slate-600 dark:text-slate-500 sm:text-sm">
                                    <div class="mr-auto flex items-center">
                                        <x-base.form-check.input
                                            class="mr-2 border"
                                            id="remember-me"
                                            type="checkbox"
                                            name="remember"
                                        />
                                        <label
                                            class="cursor-pointer select-none ml-2"
                                            for="remember-me"
                                        >
                                            {{ __('global.remember_me') }}
                                        </label>
                                    </div>
                                    <a href="{{ route('password.request') }}" class="text-primary hover:underline">{{ __('global.forgot_password') }}</a>
                                </div>

                                <div class="intro-x mt-5 text-center xl:mt-8 xl:text-left">
                                    <x-base.button
                                        class="w-full px-4 py-3 align-top xl:mr-3 xl:w-40"
                                        variant="primary"
                                        type="submit"
                                    >
                                        {{ __('global.login') }}
                                    </x-base.button>
                                </div>
                            </form>

                            @if(!empty($demoAccounts))
                                <div class="intro-x mt-10">
                                    <div class="flex items-center mb-4">
                                        <div class="h-[1px] flex-1 bg-slate-200 dark:bg-darkmode-400"></div>
                                        <span class="px-3 text-slate-500 text-xs uppercase font-semibold">حسابات تجريبية / Demo Accounts</span>
                                        <div class="h-[1px] flex-1 bg-slate-200 dark:bg-darkmode-400"></div>
                                    </div>
                                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                                        @foreach($demoAccounts as $acc)
                                            <div class="relative group">
                                                <button
                                                    type="button"
                                                    class="w-full p-3 rounded-lg border border-slate-200 dark:border-darkmode-400 bg-slate-50 dark:bg-darkmode-700 hover:bg-primary hover:border-primary transition-all duration-200 text-left"
                                                    onclick="fillDemoData('{{ $acc['email'] }}', '{{ $acc['password'] }}')"
                                                    title="Click to fill or use Copy icon"
                                                >
                                                    <div class="text-xs font-bold text-slate-700 dark:text-slate-300 group-hover:text-white truncate">
                                                        {{ __($acc['role_key']) }}
                                                    </div>
                                                    <div class="text-[10px] text-slate-500 dark:text-slate-400 group-hover:text-white/80 truncate mt-1">
                                                        {{ $acc['email'] }}
                                                    </div>
                                                </button>
                                                <button 
                                                    type="button"
                                                    class="absolute top-2 right-2 p-1 text-slate-400 hover:text-primary dark:hover:text-white group-hover:text-white transition-colors"
                                                    onclick="copyToClipboard('{{ $acc['email'] }}', '{{ $acc['password'] }}', this); event.stopPropagation();"
                                                >
                                                    <x-base.lucide icon="Copy" class="w-3 h-3" />
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="intro-x mt-10 text-center text-slate-600 dark:text-slate-500 xl:mt-24 xl:text-left">
                            {{ __('global.agree_terms_prefix') }}
                            <a
                                class="text-primary dark:text-slate-200 underline"
                                href=""
                            >
                                {{ __('global.terms_and_conditions') }}
                            </a>
                            &
                            <a
                                class="text-primary dark:text-slate-200 underline"
                                href=""
                            >
                                {{ __('global.privacy_policy') }}
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>
    </div>

    <!-- Notification Container -->
    <div id="copy-notification" class="fixed bottom-5 right-5 z-[100] transform translate-y-20 transition-transform duration-300">
        <div class="bg-success text-white px-4 py-3 rounded-lg shadow-lg flex items-center">
            <x-base.lucide icon="CheckCircle" class="w-5 h-5 mr-3" />
            <span id="notification-message">{{ __('global.copied_to_clipboard') }}</span>
        </div>
    </div>

@pushOnce('scripts')
    <script>
        function fillDemoData(email, password) {
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            
            if (emailInput && passwordInput) {
                emailInput.value = email;
                passwordInput.value = password;
                
                // Add some visual feedback
                emailInput.classList.add('ring-2', 'ring-primary/50');
                passwordInput.classList.add('ring-2', 'ring-primary/50');
                
                setTimeout(() => {
                    emailInput.classList.remove('ring-2', 'ring-primary/50');
                    passwordInput.classList.remove('ring-2', 'ring-primary/50');
                    document.getElementById('login-form').submit();
                }, 500);
            }
        }

        function copyToClipboard(email, password, btn) {
            const text = `Email: ${email}\nPassword: ${password}`;
            
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(text).then(() => {
                    showNotification();
                });
            } else {
                // Fallback
                const textArea = document.createElement("textarea");
                textArea.value = text;
                document.body.appendChild(textArea);
                textArea.select();
                try {
                    document.execCommand('copy');
                    showNotification();
                } catch (err) {
                    console.error('Fallback: Oops, unable to copy', err);
                }
                document.body.removeChild(textArea);
            }
        }

        function showNotification() {
            const notification = document.getElementById('copy-notification');
            notification.classList.remove('translate-y-20');
            notification.classList.add('translate-y-0');
            
            setTimeout(() => {
                notification.classList.remove('translate-y-0');
                notification.classList.add('translate-y-20');
            }, 3000);
        }
    </script>
@endPushOnce
@endsection
