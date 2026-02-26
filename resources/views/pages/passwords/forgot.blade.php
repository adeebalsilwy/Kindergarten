@extends('../themes/base')

@section('head')
    <title>{{ __('global.reset_password') }} - {{ config('app.name') }}</title>
@endsection

@section('content')
    <div class="p-3 sm:px-8 bg-primary xl:bg-white dark:bg-darkmode-800 xl:dark:bg-darkmode-600 h-screen lg:overflow-hidden">
        <div class="container relative z-10 sm:px-10">
            <div class="my-10 flex h-screen py-5 xl:my-0 xl:h-auto xl:py-0">
                <div class="mx-auto my-auto w-full rounded-md bg-white px-5 py-8 shadow-md dark:bg-darkmode-600 sm:w-3/4 sm:px-8 lg:w-2/4 xl:w-auto xl:bg-transparent xl:p-0 xl:shadow-none">
                    <h2 class="text-center text-2xl font-bold xl:text-start xl:text-3xl">
                        {{ __('global.reset_password') }}
                    </h2>
                    <div class="mt-2 text-center text-slate-400 xl:text-start">
                        {{ __('global.email_reset_instructions') }}
                    </div>
                    @if(session('status'))
                        <div class="mt-4 rounded bg-success/10 text-success p-3">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}" class="mt-6">
                        @csrf
                        <x-base.form-input
                            class="block min-w-full px-4 py-3 xl:min-w-[350px]"
                            type="email"
                            name="email"
                            placeholder="{{ __('global.email') }}"
                            value="{{ old('email') }}"
                            required
                        />
                        @error('email')
                            <x-base.form-help class="text-danger mt-2">{{ $message }}</x-base.form-help>
                        @enderror
                        <div class="mt-5 text-center xl:text-start">
                            <x-base.button class="w-full px-4 py-3 xl:w-40" variant="primary" type="submit">
                                {{ __('global.send_reset_link') }}
                            </x-base.button>
                            <a href="{{ route('auth.login') }}" class="inline-block w-full xl:w-32 mt-3 xl:mt-0">
                                <x-base.button class="w-full px-4 py-3" variant="outline-secondary" as="a">
                                    {{ __('global.login') }}
                                </x-base.button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
