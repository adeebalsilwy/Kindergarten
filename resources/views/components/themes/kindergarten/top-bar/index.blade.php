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
</div>
