@props([
    'title' => '',
    'icon' => 'Info',
    'color' => 'blue',
    'badge' => null,
    'badgeColor' => 'primary'
])

@php
    $colors = [
        'blue' => 'bg-blue-50 border-blue-200',
        'green' => 'bg-green-50 border-green-200',
        'purple' => 'bg-purple-50 border-purple-200',
        'red' => 'bg-red-50 border-red-200',
        'yellow' => 'bg-yellow-50 border-yellow-200',
        'indigo' => 'bg-indigo-50 border-indigo-200',
        'orange' => 'bg-orange-50 border-orange-200',
    ];
    $selectedColor = $colors[$color] ?? $colors['blue'];

    $badgeColors = [
        'primary' => 'bg-primary text-white',
        'success' => 'bg-success text-white',
        'warning' => 'bg-warning text-white',
        'danger' => 'bg-danger text-white',
        'info' => 'bg-info text-white',
    ];
    $selectedBadgeColor = $badgeColors[$badgeColor] ?? $badgeColors['primary'];
@endphp

<div class="box border-l-4 {{ $selectedColor }} p-5 hover:shadow-md transition-shadow duration-300">
    <div class="flex items-start justify-between mb-3">
        <div class="flex items-center">
            <div class="{{ str_replace('bg-', 'text-', $selectedColor) }} me-3">
                <x-base.lucide :icon="$icon" class="w-5 h-5" />
            </div>

            @if($title)
                <h3 class="text-lg font-bold text-slate-800">{{ $title }}</h3>
            @endif
        </div>

        @if($badge)
            <span class="{{ $selectedBadgeColor }} px-2 py-1 rounded text-xs font-medium">
                {{ $badge }}
            </span>
        @endif
    </div>

    <div class="text-slate-600">
        {{ $slot }}
    </div>
</div>
