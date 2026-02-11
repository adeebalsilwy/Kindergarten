@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('global.kindergarten_management_system') }} - {{ __('global.kindergarten_management_system') }}</title>
@endsection

@section('subcontent')
<div class="intro-y">
    <div class="box p-5 md:p-6">
        <div class="flex items-center justify-between">
            <a class="flex items-center" href="{{ route('home') }}">
                <img class="w-6" src="{{ Vite::asset('resources/images/logo.svg') }}" alt="{{ config('app.name') }}" />
                <span class="ml-3 text-lg font-semibold">{{ config('app.name') }}</span>
            </a>
            <div class="flex items-center gap-3">
                <a class="text-slate-600 hover:text-primary" href="#features">{{ __('global.features') }}</a>
                <a class="text-slate-600 hover:text-primary" href="#footer">{{ __('global.contact_us') }}</a>
                <x-base.dropdown class="ml-2">
                    <x-base.dropdown.button as="a" class="flex items-center gap-2">
                        <x-base.lucide icon="Globe" class="w-4 h-4" />
                        @php
                            $activeLangs = \App\Models\Language::where('is_active', true)->get();
                            $currentLang = $activeLangs->where('code', app()->getLocale())->first() ?? $activeLangs->first();
                        @endphp
                        <span>
                            <span class="font-semibold text-primary">{{ $currentLang->name ?? 'Language' }}</span>
                        </span>
                    </x-base.dropdown.button>
                    <x-base.dropdown.menu>
                        @foreach($activeLangs as $lang)
                            <x-base.dropdown.item as="a" href="{{ route('locale.switch', ['locale' => $lang->code]) }}">
                                {{ $lang->name }}
                            </x-base.dropdown.item>
                        @endforeach
                    </x-base.dropdown.menu>
                </x-base.dropdown>
                <x-base.button as="a" href="{{ route('auth.login') }}" variant="outline-primary">
                    {{ __('global.sign_in') }}
                </x-base.button>
            </div>
        </div>
    </div>
    <div class="box mt-5 p-8">
        <div class="landing-slider">
            <div class="grid grid-cols-12 gap-6 items-center">
                <div class="col-span-12 md:col-span-6">
                    <h2 class="text-2xl md:text-3xl font-bold">{{ __('global.kindergarten_management_system') }}</h2>
                    <p class="mt-3 text-slate-600 dark:text-slate-500">{{ __('global.kindergarten_landing_subtitle') }}</p>
                    <div class="mt-6 flex flex-wrap gap-3">
                        <x-base.button as="a" href="{{ route('auth.register') }}" variant="primary">{{ __('global.get_started') }}</x-base.button>
                        <x-base.button as="a" href="{{ route('auth.login') }}" variant="outline-primary">{{ __('global.sign_in') }}</x-base.button>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-6">
                    <div class="tilt-card perspective-1000">
                        <img class="w-full will-change-transform rounded-xl shadow-lg" src="{{ Vite::asset('resources/images/illustration.svg') }}" alt="{{ config('app.name') }}" />
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-6 items-center">
                <div class="col-span-12 md:col-span-6">
                    <h2 class="text-2xl md:text-3xl font-bold">{{ __('global.parent_communication') }}</h2>
                    <p class="mt-3 text-slate-600 dark:text-slate-500">{{ __('global.parent_communication_description') }}</p>
                </div>
                <div class="col-span-12 md:col-span-6">
                    <div class="tilt-card perspective-1000">
                        <img class="w-full will-change-transform rounded-xl shadow-lg" src="{{ Vite::asset('resources/images/phone-illustration.svg') }}" alt="{{ config('app.name') }}" />
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-6 items-center">
                <div class="col-span-12 md:col-span-6">
                    <h2 class="text-2xl md:text-3xl font-bold">{{ __('global.finance_reporting') }}</h2>
                    <p class="mt-3 text-slate-600 dark:text-slate-500">{{ __('global.finance_reporting_description') }}</p>
                    <div class="mt-6 flex flex-wrap gap-3">
                        <x-base.button as="a" href="{{ route('auth.register') }}" variant="primary">{{ __('global.get_started') }}</x-base.button>
                        <x-base.button as="a" href="{{ route('auth.login') }}" variant="outline-primary">{{ __('global.sign_in') }}</x-base.button>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-6">
                    <div class="tilt-card perspective-1000">
                        <img class="w-full will-change-transform rounded-xl shadow-lg" src="{{ Vite::asset('resources/images/woman-illustration.svg') }}" alt="{{ config('app.name') }}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="intro-y mt-8">
    <div class="box p-8 text-center">
        <h1 class="text-3xl md:text-4xl font-bold">
            {{ __('global.welcome_to') }}
            <span class="text-primary">{{ __('global.kindergarten_management_system') }}</span>
        </h1>
        <p class="mt-3 text-slate-600 dark:text-slate-500">
            {{ __('global.kindergarten_landing_subtitle') }}
        </p>
        <div class="mt-6 flex justify-center gap-3">
            <x-base.button as="a" href="{{ route('auth.login') }}" variant="primary" class="px-6">
                {{ __('global.sign_in') }}
            </x-base.button>
            <x-base.button as="a" href="{{ route('auth.register') }}" variant="outline-primary" class="px-6">
                {{ __('global.get_started') }}
            </x-base.button>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="intro-y mt-8">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">{{ __('global.why_choose_kindergarten_system') }}</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">{{ __('global.kindergarten_features_description') }}</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-gray-50 rounded-xl p-6 text-center hover:shadow-lg transition duration-300">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ __('global.student_management') }}</h3>
                <p class="text-gray-600">{{ __('global.student_management_description') }}</p>
            </div>
            
            <div class="bg-gray-50 rounded-xl p-6 text-center hover:shadow-lg transition duration-300">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ __('global.attendance_tracking') }}</h3>
                <p class="text-gray-600">{{ __('global.attendance_tracking_description') }}</p>
            </div>
            
            <div class="bg-gray-50 rounded-xl p-6 text-center hover:shadow-lg transition duration-300">
                <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="h-8 w-8 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ __('global.finance_reporting') }}</h3>
                <p class="text-gray-600">{{ __('global.finance_reporting_description') }}</p>
            </div>
            
            <div class="bg-gray-50 rounded-xl p-6 text-center hover:shadow-lg transition duration-300">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="h-8 w-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ __('global.parent_communication') }}</h3>
                <p class="text-gray-600">{{ __('global.parent_communication_description') }}</p>
            </div>
            
            <div class="bg-gray-50 rounded-xl p-6 text-center hover:shadow-lg transition duration-300">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ __('global.security') }}</h3>
                <p class="text-gray-600">{{ __('global.security_description') }}</p>
            </div>
            
            <div class="bg-gray-50 rounded-xl p-6 text-center hover:shadow-lg transition duration-300">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ __('global.multilingual_support') }}</h3>
                <p class="text-gray-600">{{ __('global.multilingual_support_description') }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Testimonials Section -->
<div class="intro-y mt-8">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">{{ __('global.what_our_users_say') }}</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">{{ __('global.kindergarten_testimonials_description') }}</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-xl p-6 shadow-md">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center text-blue-800 font-bold text-lg">JD</div>
                    <div class="ml-4">
                        <h4 class="font-semibold text-gray-800">John Doe</h4>
                        <p class="text-gray-600 text-sm">Principal</p>
                    </div>
                </div>
                <p class="text-gray-600 italic">"{{ __('global.testimonial_principal') }}"</p>
                <div class="flex text-yellow-400 mt-2">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                    </svg>
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                    </svg>
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                    </svg>
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                    </svg>
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                    </svg>
                </div>
            </div>
            
            <div class="bg-white rounded-xl p-6 shadow-md">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-800 font-bold text-lg">AS</div>
                    <div class="ml-4">
                        <h4 class="font-semibold text-gray-800">Ahmad Smith</h4>
                        <p class="text-gray-600 text-sm">Teacher</p>
                    </div>
                </div>
                <p class="text-gray-600 italic">"{{ __('global.testimonial_teacher') }}"</p>
                <div class="flex text-yellow-400 mt-2">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                    </svg>
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                    </svg>
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                    </svg>
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                    </svg>
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                    </svg>
                </div>
            </div>
            
            <div class="bg-white rounded-xl p-6 shadow-md">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center text-purple-800 font-bold text-lg">MJ</div>
                    <div class="ml-4">
                        <h4 class="font-semibold text-gray-800">Maria Johnson</h4>
                        <p class="text-gray-600 text-sm">Administrator</p>
                    </div>
                </div>
                <p class="text-gray-600 italic">"{{ __('global.testimonial_admin') }}"</p>
                <div class="flex text-yellow-400 mt-2">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                    </svg>
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                    </svg>
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                    </svg>
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                    </svg>
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="intro-y mt-8">
    <div class="box p-8 bg-gradient-to-r from-theme-1 to-theme-2 text-white">
        <div class="text-center">
            <h2 class="text-3xl md:text-4xl font-bold">{{ __('global.ready_to_get_started') }}</h2>
            <p class="mt-3 text-lg">{{ __('global.landing_cta_description') }}</p>
            <div class="mt-6 flex justify-center gap-3">
                <x-base.button as="a" href="{{ route('auth.register') }}" class="bg-white text-primary hover:bg-slate-100" variant="secondary">
                    {{ __('global.start_free_trial') }}
                </x-base.button>
                <x-base.button as="a" href="{{ route('auth.login') }}" variant="outline-primary">
                    {{ __('global.contact_us') }}
                </x-base.button>
            </div>
        </div>
    </div>
</div>
<div class="intro-y mt-8">
    <div class="box p-8">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 md:col-span-4">
                <h3 class="text-lg font-semibold">{{ __('global.company') }}</h3>
                <ul class="mt-3 space-y-2 text-slate-600">
                    <li><a class="hover:text-primary" href="#features">{{ __('global.features') }}</a></li>
                    <li><a class="hover:text-primary" href="#footer">{{ __('global.contact_us') }}</a></li>
                </ul>
            </div>
            <div class="col-span-12 md:col-span-4">
                <h3 class="text-lg font-semibold">{{ __('global.resources') }}</h3>
                <ul class="mt-3 space-y-2 text-slate-600">
                    <li><a class="hover:text-primary" href="{{ route('auth.login') }}">{{ __('global.sign_in') }}</a></li>
                    <li><a class="hover:text-primary" href="{{ route('auth.register') }}">{{ __('global.get_started') }}</a></li>
                </ul>
            </div>
            <div class="col-span-12 md:col-span-4">
                <h3 class="text-lg font-semibold">{{ __('global.follow_us') }}</h3>
                <div class="mt-3 flex gap-3 text-slate-600">
                    <x-base.lucide icon="Twitter" class="w-5 h-5" />
                    <x-base.lucide icon="Facebook" class="w-5 h-5" />
                    <x-base.lucide icon="Instagram" class="w-5 h-5" />
                </div>
            </div>
        </div>
        <div class="mt-8 border-t pt-5 text-center text-slate-500">
            © {{ date('Y') }} {{ config('app.name') }}. {{ __('global.all_rights_reserved') }}
        </div>
    </div>
</div>
@endsection

@pushOnce('vendors')
    @vite('resources/js/vendors/tiny-slider.js')
@endPushOnce

@pushOnce('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (window.tns) {
                window.tns({
                    container: '.landing-slider',
                    items: 1,
                    slideBy: 'page',
                    autoplay: true,
                    autoplayButtonOutput: false,
                    controls: true,
                    nav: true
                });
            }
            var cards = document.querySelectorAll('.tilt-card');
            cards.forEach(function(card) {
                var img = card.querySelector('img');
                card.style.perspective = '1000px';
                card.addEventListener('mousemove', function(e) {
                    var rect = card.getBoundingClientRect();
                    var x = e.clientX - rect.left;
                    var y = e.clientY - rect.top;
                    var rx = ((y / rect.height) - 0.5) * -10;
                    var ry = ((x / rect.width) - 0.5) * 10;
                    img.style.transform = 'rotateX(' + rx + 'deg) rotateY(' + ry + 'deg) translateZ(20px)';
                });
                card.addEventListener('mouseleave', function() {
                    img.style.transform = 'rotateX(0) rotateY(0) translateZ(0)';
                });
            });
        });
    </script>
@endPushOnce
