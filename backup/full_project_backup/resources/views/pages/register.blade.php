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
                        <span class="ml-3 text-lg text-white"> {{ config('app.name') }} </span>
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
                        class="mx-auto my-auto w-full rounded-md bg-white px-5 py-8 shadow-md dark:bg-darkmode-600 sm:w-3/4 sm:px-8 lg:w-2/4 xl:ml-20 xl:w-auto xl:bg-transparent xl:p-0 xl:shadow-none">
                        @php
                            $activeLangs = \App\Models\Language::where('is_active', true)->get();
                            $currentLocale = app()->getLocale();
                            $nextLang = $activeLangs->where('code', '!=', $currentLocale)->first() ?? $activeLangs->first();
                        @endphp
                        <div class="flex justify-end mb-4">
                            <a href="{{ route('locale.switch', $nextLang->code) }}">
                                <x-base.button variant="outline-secondary" class="px-3 py-2">
                                    <x-base.lucide icon="Languages" class="w-5 h-5 mr-2" />
                                    <span>
                                        <span class="font-semibold text-primary">{{ $nextLang->name }}</span>
                                    </span>
                                </x-base.button>
                            </a>
                        </div>
                        <h2 class="intro-x text-center text-2xl font-bold xl:text-left xl:text-3xl">
                            {{ __('global.register') }}
                        </h2>
                        <div class="intro-x mt-2 text-center text-slate-400 dark:text-slate-400 xl:hidden">
                            {{ __('global.auth_intro_sign_up') }} {{ __('global.manage_accounts_one_place') }}
                        </div>
                        <form method="POST" action="{{ route('auth.register.post') }}" class="intro-x mt-8">
                            @csrf
                            <x-base.form-input
                                class="intro-x block min-w-full px-4 py-3 xl:min-w-[350px]"
                                type="text"
                                name="first_name"
                                placeholder="{{ __('global.first_name') }}"
                                value="{{ old('first_name') }}"
                                required
                            />
                            @if($errors->has('first_name'))
                                <x-base.form-help class="text-danger mt-2">{{ $errors->first('first_name') }}</x-base.form-help>
                            @endif
                            <x-base.form-input
                                class="intro-x mt-4 block min-w-full px-4 py-3 xl:min-w-[350px]"
                                type="text"
                                name="last_name"
                                placeholder="{{ __('global.last_name') }}"
                                value="{{ old('last_name') }}"
                                required
                            />
                            @if($errors->has('last_name'))
                                <x-base.form-help class="text-danger mt-2">{{ $errors->first('last_name') }}</x-base.form-help>
                            @endif
                            <x-base.form-input
                                class="intro-x mt-4 block min-w-full px-4 py-3 xl:min-w-[350px]"
                                type="email"
                                name="email"
                                placeholder="{{ __('global.email') }}"
                                value="{{ old('email') }}"
                                required
                            />
                            @if($errors->has('email'))
                                <x-base.form-help class="text-danger mt-2">{{ $errors->first('email') }}</x-base.form-help>
                            @endif
                            <x-base.form-input
                                class="intro-x mt-4 block min-w-full px-4 py-3 xl:min-w-[350px]"
                                type="password"
                                name="password"
                                placeholder="{{ __('global.password') }}"
                                required
                            />
                            @if($errors->has('password'))
                                <x-base.form-help class="text-danger mt-2">{{ $errors->first('password') }}</x-base.form-help>
                            @endif
                            <div class="intro-x mt-3 grid h-1 w-full grid-cols-12 gap-4">
                                <div class="col-span-3 h-full rounded bg-success"></div>
                                <div class="col-span-3 h-full rounded bg-success"></div>
                                <div class="col-span-3 h-full rounded bg-success"></div>
                                <div class="col-span-3 h-full rounded bg-slate-100 dark:bg-darkmode-800"></div>
                            </div>
                            <a
                                class="intro-x mt-2 block text-xs text-slate-500 sm:text-sm"
                                href=""
                            >
                                {{ __('global.what_is_secure_password') }}
                            </a>
                            <x-base.form-input
                                class="intro-x mt-4 block min-w-full px-4 py-3 xl:min-w-[350px]"
                                type="password"
                                name="password_confirmation"
                                placeholder="{{ __('global.password_confirmation') }}"
                                required
                            />
                            @if($errors->has('password_confirmation'))
                                <x-base.form-help class="text-danger mt-2">{{ $errors->first('password_confirmation') }}</x-base.form-help>
                            @endif
                            <div class="intro-x mt-4 flex items-center text-xs text-slate-600 dark:text-slate-500 sm:text-sm">
                                <x-base.form-check.input
                                    class="mr-2 border"
                                    id="terms"
                                    type="checkbox"
                                    required
                                />
                                <label
                                    class="cursor-pointer select-none"
                                    for="terms"
                                >
                                    {{ __('global.agree_to_terms') }}
                                </label>
                                <a
                                    class="ml-1 text-primary dark:text-slate-200"
                                    href=""
                                >
                                    Privacy Policy
                                </a>
                                .
                            </div>
                            <div class="intro-x mt-5 text-center xl:mt-8 xl:text-left">
                                <x-base.button
                                    class="w-full px-4 py-3 align-top xl:mr-3 xl:w-32"
                                    variant="primary"
                                    type="submit"
                                >
                                    {{ __('global.register') ?? 'Register' }}
                                </x-base.button>
                                <a href="{{ route('auth.login') }}" class="inline-block w-full xl:w-32 mt-3 xl:mt-0">
                                    <x-base.button
                                        class="w-full px-4 py-3 align-top"
                                        variant="outline-secondary"
                                        as="a"
                                    >
                                        {{ __('global.login') }}
                                    </x-base.button>
                                </a>
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
            var firstErrorField = document.querySelector('.text-danger');
            if (firstErrorField) {
                firstErrorField.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        });
    </script>
@endPushOnce
@endsection
