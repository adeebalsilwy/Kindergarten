<!-- BEGIN: Top Bar -->
<div class="relative z-[51] flex h-[67px] items-center border-b border-slate-200">
    <!-- BEGIN: Breadcrumb -->
    <x-base.breadcrumb class="-intro-x mr-auto hidden sm:flex">
        <x-base.breadcrumb.link :index="0">Application</x-base.breadcrumb.link>
        <x-base.breadcrumb.link
            :index="1"
            :active="true"
        >
            Dashboard
        </x-base.breadcrumb.link>
    </x-base.breadcrumb>
    <!-- END: Breadcrumb -->
    <!-- BEGIN: Search -->
    <div class="search intro-x relative mr-3 sm:mr-6">
        <div class="relative hidden sm:block">
            <x-base.form-input
                class="w-56 rounded-full border-transparent bg-slate-300/50 pr-8 shadow-none transition-[width] duration-300 ease-in-out focus:w-72 focus:border-transparent dark:bg-darkmode-400/70"
                type="text"
                placeholder="Search..."
            />
            <x-base.lucide
                class="absolute inset-y-0 right-0 my-auto mr-3 h-5 w-5 text-slate-600 dark:text-slate-500"
                icon="Search"
            />
        </div>
        <a
            class="relative text-slate-600 sm:hidden"
            href=""
        >
            <x-base.lucide
                class="h-5 w-5 dark:text-slate-500"
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
            <div class="box w-[450px] p-5">
                <div class="mb-2 font-medium">Pages</div>
                <div class="mb-5">
                    <a
                        class="flex items-center"
                        href=""
                    >
                        <div
                            class="flex h-8 w-8 items-center justify-center rounded-full bg-success/20 text-success dark:bg-success/10">
                            <x-base.lucide
                                class="h-4 w-4"
                                icon="Inbox"
                            />
                        </div>
                        <div class="ml-3">Mail Settings</div>
                    </a>
                    <a
                        class="mt-2 flex items-center"
                        href=""
                    >
                        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-pending/10 text-pending">
                            <x-base.lucide
                                class="h-4 w-4"
                                icon="Users"
                            />
                        </div>
                        <div class="ml-3">Users & Permissions</div>
                    </a>
                    <a
                        class="mt-2 flex items-center"
                        href=""
                    >
                        <div
                            class="flex h-8 w-8 items-center justify-center rounded-full bg-primary/10 text-primary/80 dark:bg-primary/20">
                            <x-base.lucide
                                class="h-4 w-4"
                                icon="CreditCard"
                            />
                        </div>
                        <div class="ml-3">Transactions Report</div>
                    </a>
                </div>
                <div class="mb-2 font-medium">Users</div>
                <div class="mb-5">
                    @foreach (array_slice($fakers, 0, 4) as $faker)
                        <a
                            class="mt-2 flex items-center"
                            href=""
                        >
                            <div class="image-fit h-8 w-8">
                                <img
                                    class="rounded-full"
                                    src="{{ Vite::asset($faker['photos'][0]) }}"
                                    alt="Midone - Tailwind Admin Dashboard Template"
                                />
                            </div>
                            <div class="ml-3">{{ $faker['users'][0]['name'] }}</div>
                            <div class="ml-auto w-48 truncate text-right text-xs text-slate-500">
                                {{ $faker['users'][0]['email'] }}
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="mb-2 font-medium">Products</div>
                @foreach (array_slice($fakers, 0, 4) as $faker)
                    <a
                        class="mt-2 flex items-center"
                        href=""
                    >
                        <div class="image-fit h-8 w-8">
                            <img
                                class="rounded-full"
                                src="{{ Vite::asset($faker['images'][0]) }}"
                                alt="Midone - Tailwind Admin Dashboard Template"
                            />
                        </div>
                        <div class="ml-3">{{ $faker['products'][0]['name'] }}</div>
                        <div class="ml-auto w-48 truncate text-right text-xs text-slate-500">
                            {{ $faker['products'][0]['category'] }}
                        </div>
                    </a>
                @endforeach
            </div>
        </x-base.transition>
    </div>
    <!-- END: Search  -->
    <!-- BEGIN: Notifications -->
    <x-base.popover class="intro-x mr-auto sm:mr-6">
        <x-base.popover.button
            class="relative block text-slate-600 outline-none before:absolute before:right-0 before:top-[-2px] before:h-[8px] before:w-[8px] before:rounded-full before:bg-danger before:content-['']"
        >
            <x-base.lucide
                class="h-5 w-5 dark:text-slate-500"
                icon="Bell"
            />
        </x-base.popover.button>
        <x-base.popover.panel class="mt-2 w-[280px] p-5 sm:w-[350px]">
            <div class="mb-5 font-medium">Notifications</div>
            @foreach (array_slice($fakers, 0, 5) as $fakerKey => $faker)
                <div @class([
                    'cursor-pointer relative flex items-center',
                    'mt-5' => $fakerKey,
                ])>
                    <div class="image-fit relative mr-1 h-12 w-12 flex-none">
                        <img
                            class="rounded-full"
                            src="{{ Vite::asset($faker['photos'][0]) }}"
                            alt="Midone - Tailwind Admin Dashboard Template"
                        />
                        <div
                            class="absolute bottom-0 right-0 h-3 w-3 rounded-full border-2 border-white bg-success dark:border-darkmode-600">
                        </div>
                    </div>
                    <div class="ml-2 overflow-hidden">
                        <div class="flex items-center">
                            <a
                                class="mr-5 truncate font-medium"
                                href=""
                            >
                                {{ $faker['users'][0]['name'] }}
                            </a>
                            <div class="ml-auto whitespace-nowrap text-xs text-slate-400">
                                {{ $faker['times'][0] }}
                            </div>
                        </div>
                        <div class="mt-0.5 w-full truncate text-slate-500">
                            {{ $faker['news'][0]['short_content'] }}
                        </div>
                    </div>
                </div>
            @endforeach
        </x-base.popover.panel>
    </x-base.popover>
    <!-- END: Notifications  -->
    <!-- BEGIN: Locale Switcher -->
    <x-base.dropdown class="intro-x mr-3 sm:mr-6">
        <x-base.dropdown.button class="flex items-center text-slate-700 dark:text-slate-300">
            <x-base.lucide class="h-5 w-5 mr-2" icon="Globe" />
            @php
                $activeLangs = \App\Models\Language::where('is_active', true)->get();
                $currentLang = $activeLangs->where('code', app()->getLocale())->first() ?? $activeLangs->first();
                $otherLangs = $activeLangs->where('code', '!=', app()->getLocale());
            @endphp
            <span>
                <span class="font-semibold text-primary">{{ $currentLang->name ?? 'Language' }}</span>
                @if($otherLangs->count() > 0)
                    <span class="mx-1">|</span>
                    <span class="text-slate-500 dark:text-slate-400">{{ $otherLangs->first()->name }}</span>
                @endif
            </span>
            <x-base.lucide class="h-4 w-4 ml-2" icon="ChevronDown"/>
        </x-base.dropdown.button>
        <x-base.dropdown.menu>
            @foreach($activeLangs as $lang)
                <x-base.dropdown.item as="a" href="{{ route('locale.switch', ['locale' => $lang->code]) }}">
                    {{ $lang->name }}
                </x-base.dropdown.item>
            @endforeach
        </x-base.dropdown.menu>
    </x-base.dropdown>
    <!-- END: Locale Switcher -->
    <!-- BEGIN: Account Menu -->
    <x-base.menu>
        <x-base.menu.button class="image-fit zoom-in intro-x block h-8 w-8 overflow-hidden rounded-full shadow-lg">
            <img
                src="{{ Vite::asset($faker['photos'][0]) }}"
                alt="Midone - Tailwind Admin Dashboard Template"
            />
        </x-base.menu.button>
        <x-base.menu.items class="mt-px w-56 bg-theme-1 text-white">
            <x-base.menu.header class="font-normal">
                <div class="font-medium">{{ auth()->user()->name }}</div>
                <div class="mt-0.5 text-xs text-white/70 dark:text-slate-500">
                    {{ auth()->user()->role ?? __('global.administrator') }}
                </div>
            </x-base.menu.header>
            <x-base.menu.divider class="bg-white/[0.08]" />
            <x-base.menu.item class="hover:bg-white/5" as="a" href="{{ route('profile-overview-1') }}">
                <x-base.lucide
                    class="mr-2 h-4 w-4"
                    icon="User"
                /> {{ __('global.profile') }}
            </x-base.menu.item>
            <x-base.menu.item class="hover:bg-white/5" as="a" href="{{ route('change-password') }}">
                <x-base.lucide
                    class="mr-2 h-4 w-4"
                    icon="Lock"
                /> {{ __('global.reset_password') }}
            </x-base.menu.item>
            <x-base.menu.divider class="bg-white/[0.08]" />
            <x-base.menu.item class="hover:bg-white/5">
                <form action="{{ route('auth.logout') }}" method="POST" class="w-full flex items-center">
                    @csrf
                    <x-base.lucide
                        class="mr-2 h-4 w-4"
                        icon="ToggleRight"
                    /> 
                    <button type="submit" class="w-full text-left">{{ __('global.logout') }}</button>
                </form>
            </x-base.menu.item>
        </x-base.menu.items>
    </x-base.menu>
    <!-- END: Account Menu -->
</div>
<!-- END: Top Bar -->

@pushOnce('scripts')
    @vite('resources/js/components/themes/rubick/top-bar.js')
@endPushOnce
