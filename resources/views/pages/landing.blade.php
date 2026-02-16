@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('global.kindergarten_management_system') }} - {{ __('global.kindergarten_management_system') }}</title>
@endsection

@section('subcontent')
<div class="intro-y">
    <!-- Navigation Bar -->
    <div class="box p-5 md:p-6 sticky top-0 z-50 shadow-lg">
        <div class="flex items-center justify-between">
            <a class="flex items-center" href="{{ route('home') }}">
                <img class="w-6" src="{{ Vite::asset('resources/images/logo.svg') }}" alt="{{ config('app.name') }}" />
                <span class="ms-3 text-lg font-semibold">{{ config('app.name') }}</span>
            </a>
            
            <!-- Navigation Links and Authentication -->
            <div class="flex items-center gap-3">
                <button id="mobile-nav-toggle" class="md:hidden p-2 rounded-md border border-slate-200">
                    <x-base.lucide icon="Menu" class="w-5 h-5" />
                </button>
                <div id="nav-links" class="hidden md:flex items-center gap-3">
                    <a class="text-slate-600 hover:text-primary transition-all duration-300" href="#features">{{ __('global.features') }}</a>
                    <a class="text-slate-600 hover:text-primary transition-all duration-300" href="#testimonials">{{ __('global.testimonials') }}</a>
                    <a class="text-slate-600 hover:text-primary transition-all duration-300" href="#footer">{{ __('global.contact_us') }}</a>
                </div>
                
                <!-- Language Selector -->
                <x-base.dropdown class="ms-2">
                    <x-base.dropdown.button as="a" class="flex items-center gap-2 hover:bg-slate-100 rounded-lg px-3 py-2 transition-all duration-300">
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
                            <x-base.dropdown.item as="a" href="{{ route('locale.switch', ['locale' => $lang->code]) }}" class="transition-all duration-200">
                                {{ $lang->name }}
                            </x-base.dropdown.item>
                        @endforeach
                    </x-base.dropdown.menu>
                </x-base.dropdown>
                
                <!-- User Profile or Auth Buttons -->
                @auth
                    <!-- User Profile Dropdown when logged in -->
                    <x-base.dropdown>
                        <x-base.dropdown.button as="a" class="flex items-center gap-2 hover:bg-slate-100 rounded-lg px-3 py-2 transition-all duration-300">
                            <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white font-medium text-sm">
                                {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                            </div>
                            <span class="hidden md:inline text-slate-700">{{ Str::limit(Auth::user()->name ?? 'User', 10) }}</span>
                        </x-base.dropdown.button>
                        <x-base.dropdown.menu>
                            <x-base.dropdown.item as="a" href="{{ route('profile.index') }}" class="transition-all duration-200">
                                <x-base.lucide icon="User" class="w-4 h-4 me-2" /> {{ __('global.profile') }}
                            </x-base.dropdown.item>
                            <x-base.dropdown.item as="a" href="{{ route('profile.edit') }}" class="transition-all duration-200">
                                <x-base.lucide icon="Settings" class="w-4 h-4 me-2" /> {{ __('global.settings') }}
                            </x-base.dropdown.item>
                            <x-base.dropdown.item as="a" href="{{ route('dashboard-overview-1') }}" class="transition-all duration-200">
                                <x-base.lucide icon="Layout" class="w-4 h-4 me-2" /> {{ __('global.dashboard') }}
                            </x-base.dropdown.item>
                            <x-base.dropdown.divider />
                            <x-base.dropdown.item as="a" href="{{ route('auth.logout') }}" 
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                                class="text-red-600 hover:bg-red-50 transition-all duration-200">
                                <x-base.lucide icon="LogOut" class="w-4 h-4 me-2" /> {{ __('global.sign_out') }}
                            </x-base.dropdown.item>
                            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </x-base.dropdown.menu>
                    </x-base.dropdown>
                @else
                    <div id="auth-buttons" class="hidden md:flex items-center gap-2">
                        <x-base.button as="a" href="{{ route('auth.login') }}" variant="outline-primary" class="transition-all duration-300 hover:scale-105">
                            {{ __('global.sign_in') }}
                        </x-base.button>
                        <x-base.button as="a" href="{{ route('auth.register') }}" variant="primary" class="transition-all duration-300 hover:scale-105">
                            {{ __('global.get_started') }}
                        </x-base.button>
                    </div>
                @endauth
            </div>
        </div>
    </div>
    
    <!-- Hero Section with Animations -->
    <div class="box mt-5 p-6 md:p-8 overflow-hidden">
        <div class="grid grid-cols-12 gap-6 items-center">
            <div class="col-span-12 md:col-span-6 animate__animated animate__fadeInLeft">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold bg-gradient-to-r from-primary to-theme-1 bg-clip-text text-transparent">
                    {{ __('global.kindergarten_management_system') }}
                </h2>
                <p class="mt-4 text-base md:text-lg text-slate-600 dark:text-slate-400 animate__animated animate__fadeInLeft animate__delay-1s">
                    {{ __('global.kindergarten_landing_subtitle') }}
                </p>
                <div class="mt-6 md:mt-8 flex flex-wrap gap-3 md:gap-4 animate__animated animate__fadeInLeft animate__delay-2s">
                    <x-base.button as="a" href="{{ route('auth.register') }}" variant="primary" class="px-6 py-3 rounded-lg transition-all duration-300 hover:scale-105 hover:shadow-lg">
                        <x-base.lucide icon="Rocket" class="w-4 h-4 me-2" /> {{ __('global.get_started') }}
                    </x-base.button>
                    <x-base.button as="a" href="#features" variant="outline-primary" class="px-6 py-3 rounded-lg transition-all duration-300 hover:scale-105 hover:shadow-lg">
                        {{ __('global.learn_more') }}
                    </x-base.button>
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 animate__animated animate__fadeInRight animate__delay-1s">
                <div class="tilt-card perspective-1000 relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-primary/10 to-theme-1/10 rounded-2xl blur-xl"></div>
                    <img class="w-full max-w-full h-auto will-change-transform rounded-2xl shadow-2xl relative z-10 transform transition-transform duration-500 hover:scale-105" 
                         src="{{ Vite::asset('resources/images/illustration.svg') }}" 
                         alt="{{ config('app.name') }}" />
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Section -->
    <div class="intro-y mt-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 animate__animated animate__fadeInUp">
                    <div class="text-4xl font-bold text-blue-600 mb-2">{{ $statistics['total_users'] ?? 0 }}</div>
                    <div class="text-blue-800 font-medium">{{ __('global.total_users') }}</div>
                    <div class="text-sm text-blue-600 mt-1">{{ __('global.across_the_platform') }}</div>
                </div>
                
                <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 animate__animated animate__fadeInUp animate__delay-1s">
                    <div class="text-4xl font-bold text-green-600 mb-2">{{ $statistics['active_users'] ?? 0 }}</div>
                    <div class="text-green-800 font-medium">{{ __('global.active_users') }}</div>
                    <div class="text-sm text-green-600 mt-1">{{ __('global.currently_online') }}</div>
                </div>
                
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 animate__animated animate__fadeInUp animate__delay-2s">
                    <div class="text-4xl font-bold text-purple-600 mb-2">{{ $statistics['recent_registrations'] ?? 0 }}</div>
                    <div class="text-purple-800 font-medium">{{ __('global.new_users') }}</div>
                    <div class="text-sm text-purple-600 mt-1">{{ __('global.last_30_days') }}</div>
                </div>
            </div>
        </div>
    </div>
    
<!-- Features Section -->
    <div class="intro-y mt-8" id="features">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 animate__animated animate__fadeInUp">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">{{ __('global.why_choose_kindergarten_system') }}</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">{{ __('global.kindergarten_features_description') }}</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-gradient-to-br from-white to-slate-50 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 animate__animated animate__fadeInUp animate__delay-1s">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ __('global.student_management') }}</h3>
                    <p class="text-gray-600">{{ __('global.student_management_description') }}</p>
                </div>
                
                <div class="bg-gradient-to-br from-white to-slate-50 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 animate__animated animate__fadeInUp animate__delay-2s">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ __('global.attendance_tracking') }}</h3>
                    <p class="text-gray-600">{{ __('global.attendance_tracking_description') }}</p>
                </div>
                
                <div class="bg-gradient-to-br from-white to-slate-50 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 animate__animated animate__fadeInUp animate__delay-3s">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ __('global.finance_reporting') }}</h3>
                    <p class="text-gray-600">{{ __('global.finance_reporting_description') }}</p>
                </div>
                
                <div class="bg-gradient-to-br from-white to-slate-50 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 animate__animated animate__fadeInUp animate__delay-4s">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ __('global.parent_communication') }}</h3>
                    <p class="text-gray-600">{{ __('global.parent_communication_description') }}</p>
                </div>
                
                <div class="bg-gradient-to-br from-white to-slate-50 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 animate__animated animate__fadeInUp animate__delay-5s">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ __('global.security') }}</h3>
                    <p class="text-gray-600">{{ __('global.security_description') }}</p>
                </div>
                
                <div class="bg-gradient-to-br from-white to-slate-50 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 animate__animated animate__fadeInUp animate__delay-6s">
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
    <div class="intro-y mt-16" id="testimonials">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 animate__animated animate__fadeInUp animate__delay-7s">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">{{ __('global.what_our_users_say') }}</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">{{ __('global.kindergarten_testimonials_description') }}</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gradient-to-br from-white to-slate-50 rounded-2xl p-6 shadow-md hover:shadow-xl transition-all duration-500 animate__animated animate__fadeInUp animate__delay-8s">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center text-blue-800 font-bold text-lg">JD</div>
                        <div class="ms-4">
                            <h4 class="font-semibold text-gray-800">John Doe</h4>
                            <p class="text-gray-600 text-sm">{{ __('global.principal') }}</p>
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
                
                <div class="bg-gradient-to-br from-white to-slate-50 rounded-2xl p-6 shadow-md hover:shadow-xl transition-all duration-500 animate__animated animate__fadeInUp animate__delay-9s">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-800 font-bold text-lg">AS</div>
                        <div class="ms-4">
                            <h4 class="font-semibold text-gray-800">Ahmad Smith</h4>
                            <p class="text-gray-600 text-sm">{{ __('global.teacher') }}</p>
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
                
                <div class="bg-gradient-to-br from-white to-slate-50 rounded-2xl p-6 shadow-md hover:shadow-xl transition-all duration-500 animate__animated animate__fadeInUp animate__delay-10s">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center text-purple-800 font-bold text-lg">MJ</div>
                        <div class="ms-4">
                            <h4 class="font-semibold text-gray-800">Maria Johnson</h4>
                            <p class="text-gray-600 text-sm">{{ __('global.administrator') }}</p>
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

    <!-- CTA Section -->
    <div class="intro-y mt-16">
        <div class="box p-8 bg-gradient-to-r from-theme-1 to-theme-2 text-white rounded-2xl overflow-hidden">
            <div class="absolute inset-0 bg-black opacity-10"></div>
            <div class="relative z-10 text-center">
                <h2 class="text-3xl md:text-4xl font-bold animate__animated animate__fadeInDown">{{ __('global.ready_to_get_started') }}</h2>
                <p class="mt-3 text-lg animate__animated animate__fadeInDown animate__delay-1s">{{ __('global.landing_cta_description') }}</p>
                <div class="mt-6 flex justify-center gap-3 animate__animated animate__fadeInDown animate__delay-2s">
                    <x-base.button as="a" href="{{ route('auth.register') }}" class="bg-white text-primary hover:bg-slate-100 px-8 py-3 rounded-lg transition-all duration-300 hover:scale-105" variant="secondary">
                        {{ __('global.start_free_trial') }}
                    </x-base.button>
                    <x-base.button as="a" href="{{ route('auth.login') }}" variant="outline-secondary" class="border-white text-white hover:bg-white hover:text-theme-1 px-8 py-3 rounded-lg transition-all duration-300 hover:scale-105">
                        {{ __('global.sign_in') }}
                    </x-base.button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="intro-y mt-16" id="footer">
        <div class="box p-8">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 md:col-span-4">
                    <h3 class="text-lg font-semibold">{{ __('global.company') }}</h3>
                    <ul class="mt-3 space-y-2 text-slate-600">
                        <li><a class="hover:text-primary transition-all duration-300" href="#features">{{ __('global.features') }}</a></li>
                        <li><a class="hover:text-primary transition-all duration-300" href="#testimonials">{{ __('global.testimonials') }}</a></li>
                        <li><a class="hover:text-primary transition-all duration-300" href="#footer">{{ __('global.contact_us') }}</a></li>
                    </ul>
                </div>
                <div class="col-span-12 md:col-span-4">
                    <h3 class="text-lg font-semibold">{{ __('global.resources') }}</h3>
                    <ul class="mt-3 space-y-2 text-slate-600">
                        @auth
                            <li><a class="hover:text-primary transition-all duration-300" href="{{ route('dashboard-overview-1') }}">{{ __('global.dashboard') }}</a></li>
                            <li><a class="hover:text-primary transition-all duration-300" href="{{ route('profile.index') }}">{{ __('global.profile') }}</a></li>
                        @else
                            <li><a class="hover:text-primary transition-all duration-300" href="{{ route('auth.login') }}">{{ __('global.sign_in') }}</a></li>
                            <li><a class="hover:text-primary transition-all duration-300" href="{{ route('auth.register') }}">{{ __('global.get_started') }}</a></li>
                        @endauth
                    </ul>
                </div>
                <div class="col-span-12 md:col-span-4">
                    <h3 class="text-lg font-semibold">{{ __('global.follow_us') }}</h3>
                    <div class="mt-3 flex gap-3 text-slate-600">
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center hover:bg-primary hover:text-white transition-all duration-300">
                            <x-base.lucide icon="Twitter" class="w-5 h-5" />
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center hover:bg-primary hover:text-white transition-all duration-300">
                            <x-base.lucide icon="Facebook" class="w-5 h-5" />
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center hover:bg-primary hover:text-white transition-all duration-300">
                            <x-base.lucide icon="Instagram" class="w-5 h-5" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-8 border-t pt-5 text-center text-slate-500">
                © {{ date('Y') }} {{ config('app.name') }}. {{ __('global.all_rights_reserved') }}
            </div>
        </div>
    </div>
</div>
@pushOnce('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggle = document.getElementById('mobile-nav-toggle');
    const links = document.getElementById('nav-links');
    const auth = document.getElementById('auth-buttons');
    if (toggle) {
        toggle.addEventListener('click', function() {
            const isHidden = links.classList.contains('hidden');
            if (isHidden) {
                links.classList.remove('hidden');
                links.classList.add('flex', 'flex-col', 'gap-2', 'absolute', 'right-4', 'top-14', 'bg-white', 'rounded-lg', 'shadow-md', 'p-3');
                if (auth) {
                    auth.classList.remove('hidden');
                    auth.classList.add('flex', 'flex-col', 'gap-2', 'absolute', 'right-4', 'top-36', 'bg-white', 'rounded-lg', 'shadow-md', 'p-3');
                }
            } else {
                links.classList.add('hidden');
                links.classList.remove('flex');
                if (auth) {
                    auth.classList.add('hidden');
                    auth.classList.remove('flex');
                }
            }
        });
    }
});
</script>
@endPushOnce
@endsection

@pushOnce('vendors')
    @vite('resources/js/vendors/tiny-slider.js')
    <!-- Animate.css for animations -->
    @vite('node_modules/animate.css/animate.min.css')
@endPushOnce

@pushOnce('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize tilt card effect
            var cards = document.querySelectorAll('.tilt-card');
            cards.forEach(function(card) {
                var img = card.querySelector('img');
                card.style.perspective = '1000px';
                card.addEventListener('mousemove', function(e) {
                    var rect = card.getBoundingClientRect();
                    var x = e.clientX - rect.left;
                    var y = e.clientY - rect.top;
                    var centerX = rect.width / 2;
                    var centerY = rect.height / 2;
                    var rotateY = (x - centerX) / centerX * 10; // Reduced rotation amount
                    var rotateX = (centerY - y) / centerY * 10; // Reduced rotation amount
                    img.style.transform = 'rotateX(' + rotateX + 'deg) rotateY(' + rotateY + 'deg) translateZ(20px)';
                });
                card.addEventListener('mouseleave', function() {
                    img.style.transform = 'rotateX(0) rotateY(0) translateZ(0)';
                });
            });
            
            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
    </script>
@endPushOnce
