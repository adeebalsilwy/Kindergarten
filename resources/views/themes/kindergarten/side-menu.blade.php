@extends('../themes/base')

@section('head')
    @yield('subhead')
@endsection

@section('content')
    <div @class([
        'kindergarten px-5 sm:px-8 py-5',
        "before:content-[''] before:bg-[#1e293b] dark:before:bg-darkmode-900 before:fixed before:inset-0 before:z-[-1]",
    ])>
        <x-mobile-menu />
        <div class="mt-[4.7rem] flex md:mt-0">
            <!-- BEGIN: Side Menu -->
            <nav class="side-nav hidden w-[80px] overflow-x-hidden pb-16 pe-5 md:block xl:w-[230px]">
                <a
                    class="flex items-center pt-4 ps-5 intro-x"
                    href="{{ route('dashboard-overview-1') }}"
                >
                    <img
                        class="w-8"
                        src="{{ Vite::asset('resources/images/logo.svg') }}"
                        alt="Kindergarten Management System"
                    />
                    <span class="hidden ms-3 text-lg font-bold text-white xl:block"> 
                        <span class="text-yellow-300">Kids</span>
                        <span class="text-green-300">Care</span>
                    </span>
                </a>
                <div class="my-6 side-nav__divider"></div>
                <div class="px-5">
                    <div class="text-xs font-medium text-white/90">{{ __('global.themes') }}</div>
                    <div class="mt-3 grid grid-cols-2 gap-2">
                        @foreach (['rubick', 'icewall', 'tinker', 'enigma', 'kindergarten'] as $theme)
                            <a
                                href="{{ route('theme-switcher', ['activeTheme' => $theme]) }}"
                                @class([
                                    'text-xs rounded-md px-3 py-2 block text-center',
                                    $activeTheme == $theme ? 'bg-emerald-600 text-white' : 'bg-white/10 text-white/80 hover:bg-white/15',
                                ])
                            >
                                {{ ucfirst($theme) }}
                            </a>
                        @endforeach
                    </div>
                </div>
                <ul>
                    @foreach ($mainMenu as $menuKey => $menu)
                        @if ($menu == 'divider')
                            <li class="my-6 side-nav__divider"></li>
                        @else
                            <li>
                                <a
                                    href="{{ isset($menu['route_name']) ? route($menu['route_name'], isset($menu['params']) ? $menu['params'] : []) : 'javascript:;' }}"
                                    @class([
                                        $firstLevelActiveIndex == $menuKey
                                            ? 'side-menu side-menu--active'
                                            : 'side-menu',
                                    ])
                                >
                                    <div class="side-menu__icon">
                                        <x-base.lucide icon="{{ $menu['icon'] }}" />
                                    </div>
                                    <div class="side-menu__title">
                                        {{ $menu['title'] }}
                                        @if (isset($menu['sub_menu']))
                                            <div
                                                class="side-menu__sub-icon {{ $firstLevelActiveIndex == $menuKey ? 'transform rotate-180' : '' }}">
                                                <x-base.lucide icon="ChevronDown" />
                                            </div>
                                        @endif
                                    </div>
                                </a>
                                @if (isset($menu['sub_menu']))
                                    <ul class="{{ $firstLevelActiveIndex == $menuKey ? 'side-menu__sub-open' : '' }}">
                                        @foreach ($menu['sub_menu'] as $subMenuKey => $subMenu)
                                            <li>
                                                <a
                                                    href="{{ isset($subMenu['route_name']) ? route($subMenu['route_name'], isset($subMenu['params']) ? $subMenu['params'] : []) : 'javascript:;' }}"
                                                    @class([
                                                        $secondLevelActiveIndex == $subMenuKey
                                                            ? 'side-menu side-menu--active'
                                                            : 'side-menu',
                                                    ])
                                                >
                                                    <div class="side-menu__icon">
                                                        <x-base.lucide icon="{{ $subMenu['icon'] }}" />
                                                    </div>
                                                    <div class="side-menu__title">
                                                        {{ $subMenu['title'] }}
                                                        @if (isset($subMenu['sub_menu']))
                                                            <div
                                                                class="side-menu__sub-icon {{ $secondLevelActiveIndex == $subMenuKey ? 'transform rotate-180' : '' }}">
                                                                <x-base.lucide icon="ChevronDown" />
                                                            </div>
                                                        @endif
                                                    </div>
                                                </a>
                                                @if (isset($subMenu['sub_menu']))
                                                    <ul
                                                        class="{{ $secondLevelActiveIndex == $subMenuKey ? 'side-menu__sub-open' : '' }}">
                                                        @foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu)
                                                            <li>
                                                                <a
                                                                    href="{{ isset($lastSubMenu['route_name']) ? route($lastSubMenu['route_name'], isset($lastSubMenu['params']) ? $lastSubMenu['params'] : []) : 'javascript:;' }}"
                                                                    @class([
                                                                        $thirdLevelActiveIndex == $lastSubMenuKey
                                                                            ? 'side-menu side-menu--active'
                                                                            : 'side-menu',
                                                                    ])
                                                                >
                                                                    <div class="side-menu__icon">
                                                                        <x-base.lucide icon="{{ $lastSubMenu['icon'] }}" />
                                                                    </div>
                                                                    <div class="side-menu__title">
                                                                        {{ $lastSubMenu['title'] }}
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endif
                    @endforeach
                </ul>
            </nav>
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div
                class="md:max-w-auto min-h-screen min-w-0 max-w-full flex-1 rounded-[30px] bg-slate-50 px-4 pb-10 before:block before:h-px before:w-full before:content-[''] dark:bg-darkmode-700 md:px-[22px]">
                <x-themes.kindergarten.top-bar />
                @if (session('success'))
                    <x-base.alert variant="success" class="mb-2 flex items-center">
                        <x-base.lucide icon="CheckCircle" class="w-6 h-6 me-2" /> {{ session('success') }}
                    </x-base.alert>
                @endif
                @if (session('error'))
                    <x-base.alert variant="danger" class="mb-2 flex items-center">
                        <x-base.lucide icon="AlertOctagon" class="w-6 h-6 me-2" /> {{ session('error') }}
                    </x-base.alert>
                @endif
                @yield('subcontent')
            </div>
            <!-- END: Content -->
        </div>
    </div>
@endsection

@pushOnce('styles')
    @vite('resources/css/vendors/tippy.css')
    @vite('resources/css/themes/kindergarten/side-nav.css')
@endPushOnce

@pushOnce('vendors')
    @vite('resources/js/vendors/tippy.js')
@endPushOnce

@pushOnce('scripts')
    @vite('resources/js/themes/kindergarten.js')
@endPushOnce
