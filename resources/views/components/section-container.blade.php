@props([
    'title' => '',
    'icon' => null,
    'collapsible' => false,
    'defaultOpen' => true,
    'actions' => null
])

@php
    $initialState = ($collapsible && !$defaultOpen) ? 'true' : 'false';
@endphp

<div class="intro-y col-span-12"
     x-data="{ collapsed: {{ $initialState }} }">
    <div class="box p-5">
        @if($title || $actions)
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    @if($icon)
                        <x-base.lucide :icon="$icon" class="w-5 h-5 text-primary me-2" />
                    @endif

                    @if($title)
                        <h3 class="text-lg font-bold text-slate-800">{{ $title }}</h3>
                    @endif
                </div>

                <div class="flex items-center gap-2">
                    @if($actions)
                        {{ $actions }}
                    @endif

                    @if($collapsible)
                        <button @click="collapsed = !collapsed"
                                class="p-2 rounded-lg hover:bg-slate-100 transition-colors">
                            <x-base.lucide
                                icon="ChevronDown"
                                class="w-5 h-5 text-slate-500 transform transition-transform"
                                ::class="{'rotate-180': !collapsed}"
                            />
                        </button>
                    @endif
                </div>
            </div>
        @endif

        <div x-show="!collapsed"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-95">
            {{ $slot }}
        </div>
    </div>
</div>
