<div class="relative z-[51] flex h-[70px] items-center border-b border-white/[0.08]">
    <x-base.breadcrumb class="-intro-x me-auto h-full border-white/[0.08] md:ms-10 md:border-l md:ps-10" light>
        <x-base.breadcrumb.link :index="0">{{ __('global.kindergarten') }}</x-base.breadcrumb.link>
        <x-base.breadcrumb.link :index="1" :active="true">
            {{ __('global.dashboard') }}
        </x-base.breadcrumb.link>
    </x-base.breadcrumb>
    <div class="intro-x me-4 sm:me-6">
        <x-base.dropdown>
            <x-base.dropdown.button class="flex items-center text-white/90">
                <x-base.lucide class="h-5 w-5 me-1" icon="Globe"/>
                @php
                    $isAr = app()->getLocale() === 'ar';
                    $langLeft = $isAr ? __('global.arabic') : __('global.english');
                    $langRight = $isAr ? __('global.english') : __('global.arabic');
                @endphp
                <span>
                    <span class="font-semibold text-primary">{{ $langLeft }}</span>
                    <span class="mx-1">|</span>
                    <span class="text-white/70">{{ $langRight }}</span>
                </span>
                <x-base.lucide class="h-4 w-4 ms-1" icon="ChevronDown"/>
            </x-base.dropdown.button>
            <x-base.dropdown.menu>
                <x-base.dropdown.content>
                    <x-base.dropdown.item href="{{ route('locale.switch', 'en') }}">
                        <x-base.lucide class="h-4 w-4 me-2" icon="Globe"/>
                        {{ __('global.english') }}
                    </x-base.dropdown.item>
                    <x-base.dropdown.item href="{{ route('locale.switch', 'ar') }}">
                        <x-base.lucide class="h-4 w-4 me-2" icon="Globe"/>
                        {{ __('global.arabic') }}
                    </x-base.dropdown.item>
                </x-base.dropdown.content>
            </x-base.dropdown.menu>
        </x-base.dropdown>
    </div>

    <div class="intro-x dropdown w-10 h-10 me-4 sm:me-6">
        <x-base.dropdown>
            <x-base.dropdown.button class="w-10 h-10 rounded-full overflow-hidden shadow-lg image-fit zoom-in intro-x">
                <img alt="{{ auth()->user()->name }}" src="{{ auth()->user()->photo_url ?? asset('build/assets/images/profile-1.jpg') }}">
            </x-base.dropdown.button>
            <x-base.dropdown.menu class="w-56">
                <x-base.dropdown.content class="bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
                    <x-base.dropdown.header tag="div" class="p-4 border-b border-white/10">
                        <div class="font-black text-base">{{ auth()->user()->name }}</div>
                        <div class="text-xs text-white/70 mt-0.5 font-bold">{{ auth()->user()->email }}</div>
                    </x-base.dropdown.header>
                    <x-base.dropdown.divider class="bg-white/10" />
                    <x-base.dropdown.item href="{{ route('profile.index') }}" class="hover:bg-white/10 rounded-md p-3">
                        <x-base.lucide icon="User" class="w-4 h-4 me-2" /> {{ __('global.profile') }}
                    </x-base.dropdown.item>
                    <x-base.dropdown.item href="{{ route('profile.edit') }}" class="hover:bg-white/10 rounded-md p-3">
                        <x-base.lucide icon="Settings" class="w-4 h-4 me-2" /> {{ __('global.settings') }}
                    </x-base.dropdown.item>
                    <x-base.dropdown.divider class="bg-white/10" />
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-base.dropdown.item as="button" type="submit" class="w-full text-start hover:bg-white/10 rounded-md p-3">
                            <x-base.lucide icon="LogOut" class="w-4 h-4 me-2" /> {{ __('global.logout') }}
                        </x-base.dropdown.item>
                    </form>
                </x-base.dropdown.content>
            </x-base.dropdown.menu>
        </x-base.dropdown>
    </div>
</div>
