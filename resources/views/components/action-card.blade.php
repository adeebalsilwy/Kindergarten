@props([
    'title' => '',
    'icon' => 'ArrowRight',
    'href' => '#',
    'color' => 'primary',
    'description' => ''
])

@php
    $colors = [
        'primary' => 'hover:border-primary hover:shadow-primary/20',
        'success' => 'hover:border-success hover:shadow-success/20',
        'warning' => 'hover:border-warning hover:shadow-warning/20',
        'danger' => 'hover:border-danger hover:shadow-danger/20',
        'info' => 'hover:border-info hover:shadow-info/20',
    ];
    $selectedColor = $colors[$color] ?? $colors['primary'];
@endphp

<a href="{{ $href }}" class="block">
    <div class="box p-5 border-2 border-transparent {{ $selectedColor }} hover:shadow-lg transition-all duration-300 group cursor-pointer">
        <div class="flex items-center justify-between mb-3">
            <h3 class="text-lg font-bold text-slate-800 group-hover:text-{{ $color }}">{{ $title }}</h3>
            <x-base.lucide :icon="$icon" class="w-5 h-5 text-slate-400 group-hover:text-{{ $color }} transition-colors" />
        </div>

        @if($description)
            <p class="text-sm text-slate-600">{{ $description }}</p>
        @endif

        <div class="mt-4 flex items-center text-sm text-{{ $color }} font-medium opacity-0 group-hover:opacity-100 transition-opacity">
            <span>{{ __('global.view_details') }}</span>
            <x-base.lucide icon="ArrowRight" class="w-4 h-4 ms-1" />
        </div>
    </div>
</a>
