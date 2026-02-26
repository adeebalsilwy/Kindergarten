@extends('../themes/base')

@section('head')
    @yield('subhead')
@endsection

@section('content')
    <div @class([
        'kindergarten px-5 sm:px-8 py-5',
        "before:content-[''] before:bg-gradient-to-b before:from-pink-300 before:to-blue-300 dark:before:from-purple-900 dark:before:to-indigo-900 before:fixed before:inset-0 before:z-[-1]",
    ])>
        <x-mobile-menu />
        <!-- BEGIN: Top Bar -->
        <div class="-mx-5 mb-10 mt-[2.2rem] border-b border-white/[0.08] px-3 pt-3 sm:-mx-8 sm:px-8 md:-mt-5 md:pt-0">
            <div class="relative z-[51] flex h-[70px] items-center">
                <!-- BEGIN: Logo -->
                <a
                    class="-intro-x hidden md:flex items-center"
                    href="{{ route('dashboard-overview-1') }}"
                >
                    <img
                        class="w-8"
                        src="{{ Vite::asset('resources/images/logo.svg') }}"
                        alt="Kindergarten Management System"
                    />
                    <span class="ms-3 text-lg font-bold text-white"> 
                        <span class="text-yellow-300">Kids</span>
                        <span class="text-green-300">Care</span>
                    </span>
                </a>
                <!-- END: Logo -->
                <!-- BEGIN: Breadcrumb -->
                <x-base.breadcrumb
                    class="-intro-x me-auto h-full border-white/[0.08] md:ms-10 md:border-l md:ps-10"
                    light
                >
                    <x-base.breadcrumb.link :index="0">{{ __('global.kindergarten') }}</x-base.breadcrumb.link>
                    <x-base.breadcrumb.link
                        :index="1"
                        :active="true"
                    >
                        {{ __('global.dashboard') }}
                    </x-base.breadcrumb.link>
                </x-base.breadcrumb>
                <!-- END: Breadcrumb -->
                <!-- BEGIN: Search -->
                <div class="search intro-x relative me-3 sm:me-6">
                    <div class="hidden sm:block">
                        <x-base.form-input
                            class="w-56 rounded-full border-transparent bg-white/20 pe-8 shadow-none transition-[width] duration-300 ease-in-out focus:w-72 focus:border-transparent dark:bg-darkmode-400/70"
                            type="text"
                            placeholder="{{ __('global.search') }}..."
                        />
                        <x-base.lucide
                            class="absolute inset-y-0 right-0 my-auto me-3 h-5 w-5 text-white/70 dark:text-slate-300"
                            icon="Search"
                        />
                    </div>
                    <a
                        class="relative text-white/70 sm:hidden"
                        href=""
                    >
                        <x-base.lucide
                            class="h-5 w-5 dark:text-slate-300"
                            icon="Search"
                        />
                    </a>
                    <x-base.transition
                        class="search-result absolute right-0 z-10 mt-[3px] hidden"
                        selector=".show"
                        enter="transition-all ease-linear duration-150"
                        enterFrom="mt-5 invisible opacity-0 translate-y-1"
                        enterTo="mt-[3px] visible opacity-100 translate-y-0"
                        leave="transition-all ease-linear duration-150"
                        leaveFrom="mt-[3px] visible opacity-100 translate-y-0"
                        leaveTo="mt-5 invisible opacity-0 translate-y-1"
                    >
                        <div class="box w-[450px] p-5 bg-white/90 backdrop-blur">
                            <div class="mb-2 font-medium">{{ __('global.pages') }}</div>
                            <div class="mb-5">
                                <a
                                    class="flex items-center"
                                    href="{{ route('children.index') }}"
                                >
                                    <div
                                        class="flex h-8 w-8 items-center justify-center rounded-full bg-green-500/20 text-green-600">
                                        <x-base.lucide
                                            class="h-4 w-4"
                                            icon="Users"
                                        />
                                    </div>
                                    <div class="ms-3">{{ __('global.children') }}</div>
                                </a>
                                <a
                                    class="mt-2 flex items-center"
                                    href="{{ route('teachers.index') }}"
                                >
                                    <div
                                        class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-500/20 text-blue-600">
                                        <x-base.lucide
                                            class="h-4 w-4"
                                            icon="User"
                                        />
                                    </div>
                                    <div class="ms-3">{{ __('global.teachers') }}</div>
                                </a>
                                <a
                                    class="mt-2 flex items-center"
                                    href="{{ route('finance.dashboard') }}"
                                >
                                    <div
                                        class="flex h-8 w-8 items-center justify-center rounded-full bg-yellow-500/20 text-yellow-600">
                                        <x-base.lucide
                                            class="h-4 w-4"
                                            icon="CreditCard"
                                        />
                                    </div>
                                    <div class="ms-3">{{ __('global.financial_reports') }}</div>
                                </a>
                            </div>
                            <div class="mb-2 font-medium">{{ __('global.quick_actions') }}</div>
                            <div class="mb-5">
                                <a
                                    class="mt-2 flex items-center"
                                    href="{{ route('attendance.index') }}"
                                >
                                    <div class="image-fit h-8 w-8">
                                        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-purple-500/20 text-purple-600">
                                            <x-base.lucide
                                                class="h-4 w-4"
                                                icon="Calendar"
                                            />
                                        </div>
                                    </div>
                                    <div class="ms-3">{{ __('global.attendance') }}</div>
                                </a>
                                <a
                                    class="mt-2 flex items-center"
                                    href="{{ route('payments.index') }}"
                                >
                                    <div class="image-fit h-8 w-8">
                                        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-red-500/20 text-red-600">
                                            <x-base.lucide
                                                class="h-4 w-4"
                                                icon="DollarSign"
                                            />
                                        </div>
                                    </div>
                                    <div class="ms-3">{{ __('global.payments') }}</div>
                                </a>
                            </div>
                        </div>
                    </x-base.transition>
                </div>
                <!-- END: Search -->
                <!-- BEGIN: Language Switcher -->
                <div class="intro-x me-4 sm:me-6">
                    <x-base.dropdown>
                        <x-base.dropdown.button class="flex items-center text-white/90">
                            <x-base.lucide
                                class="h-5 w-5 me-1"
                                icon="Globe"
                            />
                            {{ app()->getLocale() == 'ar' ? 'AR' : 'EN' }}
                            <x-base.lucide
                                class="h-4 w-4 ms-1"
                                icon="ChevronDown"
                            />
                        </x-base.dropdown.button>
                        <x-base.dropdown.menu>
                            <x-base.dropdown.content>
                                <x-base.dropdown.item href="{{ route('locale.switch', 'en') }}">
                                    <x-base.lucide
                                        class="h-4 w-4 me-2"
                                        icon="Globe"
                                    />
                                    English
                                </x-base.dropdown.item>
                                <x-base.dropdown.item href="{{ route('locale.switch', 'ar') }}">
                                    <x-base.lucide
                                        class="h-4 w-4 me-2"
                                        icon="Globe"
                                    />
                                    العربية
                                </x-base.dropdown.item>
                            </x-base.dropdown.content>
                        </x-base.dropdown.menu>
                    </x-base.dropdown>
                </div>
                <!-- END: Language Switcher -->
                <!-- BEGIN: Notifications -->
                <x-base.popover class="intro-x me-4 sm:me-6">
                    <x-base.popover.button
                        class="relative block text-white/70 outline-none before:absolute before:right-0 before:top-[-2px] before:h-[8px] before:w-[8px] before:rounded-full before:bg-danger before:content-['']"
                    >
                        <x-base.lucide
                            class="h-5 w-5 dark:text-slate-300"
                            icon="Bell"
                        />
                    </x-base.popover.button>
                    <x-base.popover.panel class="mt-2 w-[280px] p-5 sm:w-[350px] bg-white/90 backdrop-blur">
                        <div class="mb-5 font-medium">{{ __('global.notifications') }}</div>
                        <div class="cursor-pointer relative flex items-center mt-2">
                            <div class="image-fit relative me-1 h-10 w-10 flex-none">
                                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-green-500/20 text-green-600">
                                    <x-base.lucide
                                        class="h-5 w-5"
                                        icon="UserPlus"
                                    />
                                </div>
                            </div>
                            <div class="ms-2 overflow-hidden">
                                <div class="flex items-center">
                                    <div class="me-5 truncate font-medium">
                                        {{ __('global.new_student_enrolled') }}
                                    </div>
                                </div>
                                <div class="mt-0.5 w-full truncate text-slate-600">
                                    {{ __('global.student_joined_today') }}
                                </div>
                            </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-3">
                            <div class="image-fit relative me-1 h-10 w-10 flex-none">
                                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-yellow-500/20 text-yellow-600">
                                    <x-base.lucide
                                        class="h-5 w-5"
                                        icon="DollarSign"
                                    />
                                </div>
                            </div>
                            <div class="ms-2 overflow-hidden">
                                <div class="flex items-center">
                                    <div class="me-5 truncate font-medium">
                                        {{ __('global.payment_received') }}
                                    </div>
                                </div>
                                <div class="mt-0.5 w-full truncate text-slate-600">
                                    {{ __('global.new_payment_recorded') }}
                                </div>
                            </div>
                        </div>
                    </x-base.popover.panel>
                </x-base.popover>
                <!-- END: Notifications -->
                <!-- BEGIN: Account Menu -->
                <x-base.menu>
                    <x-base.menu.button
                        class="image-fit zoom-in intro-x block h-8 w-8 scale-110 overflow-hidden rounded-full shadow-lg border-2 border-white/30"
                    >
                        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-white/20 text-white">
                            <x-base.lucide
                                class="h-5 w-5"
                                icon="User"
                            />
                        </div>
                    </x-base.menu.button>
                    <x-base.menu.items
                        class="relative mt-px w-56 bg-white/90 backdrop-blur text-slate-800 before:absolute before:inset-0 before:z-[-1] before:block before:rounded-md before:bg-black/5"
                    >
                        <x-base.menu.header class="font-normal">
                            <div class="font-medium">{{ Auth::user()->name ?? 'Administrator' }}</div>
                            <div class="mt-0.5 text-xs text-slate-600">
                                {{ __('global.administrator') }}
                            </div>
                        </x-base.menu.header>
                        <x-base.menu.divider class="bg-slate-200" />
                        <x-base.menu.item class="hover:bg-slate-100">
                            <x-base.lucide
                                class="me-2 h-4 w-4"
                                icon="User"
                            /> {{ __('global.profile') }}
                        </x-base.menu.item>
                        <x-base.menu.item class="hover:bg-slate-100">
                            <x-base.lucide
                                class="me-2 h-4 w-4"
                                icon="Settings"
                            /> {{ __('global.settings') }}
                        </x-base.menu.item>
                        <x-base.menu.divider class="bg-slate-200" />
                        <x-base.menu.item class="hover:bg-slate-100">
                            <x-base.lucide
                                class="me-2 h-4 w-4"
                                icon="LogOut"
                            /> {{ __('global.logout') }}
                        </x-base.menu.item>
                    </x-base.menu.items>
                </x-base.menu>
                <!-- END: Account Menu -->
            </div>
        </div>
        <!-- END: Top Bar -->
        <!-- BEGIN: Top Menu -->
        <nav class="top-nav relative z-50 hidden md:block">
            <ul class="flex flex-wrap pb-3 xl:px-[50px] xl:pb-0">
                @foreach ($mainMenu as $menuKey => $menu)
                    <li>
                        <a
                            href="{{ isset($menu['route_name']) ? route($menu['route_name'], isset($menu['params']) ? $menu['params'] : []) : 'javascript:;' }}"
                            @class([
                                $firstLevelActiveIndex == $menuKey
                                    ? 'top-menu top-menu--active'
                                    : 'top-menu',
                            ])
                        >
                            <div class="top-menu__icon">
                                <x-base.lucide icon="{{ $menu['icon'] }}" />
                            </div>
                            <div class="top-menu__title">
                                {{ $menu['title'] }}
                                @if (isset($menu['sub_menu']))
                                    <x-base.lucide
                                        class="top-menu__sub-icon"
                                        icon="chevron-down"
                                    />
                                @endif
                            </div>
                        </a>
                        @if (isset($menu['sub_menu']))
                            <ul class="{{ $firstLevelActiveIndex == $menuKey ? 'top-menu__sub-open' : '' }}">
                                @foreach ($menu['sub_menu'] as $subMenuKey => $subMenu)
                                    <li>
                                        <a
                                            class="top-menu"
                                            href="{{ isset($subMenu['route_name']) ? route($subMenu['route_name'], isset($subMenu['params']) ? $subMenu['params'] : []) : 'javascript:;' }}"
                                        >
                                            <div class="top-menu__icon">
                                                <x-base.lucide icon="{{ $subMenu['icon'] }}" />
                                            </div>
                                            <div class="top-menu__title">
                                                {{ $subMenu['title'] }}
                                                @if (isset($subMenu['sub_menu']))
                                                    <x-base.lucide
                                                        class="top-menu__sub-icon"
                                                        icon="chevron-down"
                                                    />
                                                @endif
                                            </div>
                                        </a>
                                        @if (isset($subMenu['sub_menu']))
                                            <ul
                                                class="{{ $secondLevelActiveIndex == $subMenuKey ? 'top-menu__sub-open' : '' }}">
                                                @foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu)
                                                    <li>
                                                        <a
                                                            class="top-menu"
                                                            href="{{ isset($lastSubMenu['route_name']) ? route($lastSubMenu['route_name'], isset($lastSubMenu['params']) ? $lastSubMenu['params'] : []) : 'javascript:;' }}"
                                                        >
                                                            <div class="top-menu__icon">
                                                                <x-base.lucide icon="{{ $lastSubMenu['icon'] }}" />
                                                            </div>
                                                            <div class="top-menu__title">{{ $lastSubMenu['title'] }}</div>
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
                @endforeach
            </ul>
        </nav>
        <!-- END: Top Menu -->
        <!-- BEGIN: Content -->
        <div
            class="md:max-w-auto min-h-screen min-w-0 max-w-full flex-1 rounded-[30px] bg-gradient-to-br from-pink-50 to-blue-50 px-4 pb-10 before:block before:h-px before:w-full before:content-[''] dark:bg-darkmode-700 md:px-[22px]">
            @yield('subcontent')
        </div>
        <!-- END: Content -->
    </div>
@endsection

@pushOnce('styles')
    @vite('resources/css/themes/kindergarten/top-nav.css')
@endPushOnce

@pushOnce('scripts')
    @vite('resources/js/components/themes/kindergarten/top-bar.js')
@endPushOnce
