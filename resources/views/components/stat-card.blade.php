@props([
    'title' => '',
    'value' => '',
    'icon' => 'BarChart',
    'trend' => null,
    'trendLabel' => '',
    'color' => 'blue',
    'subtitle' => ''
])

@php
    $colors = [
        'blue' => 'bg-blue-50 text-blue-600',
        'green' => 'bg-green-50 text-green-600',
        'purple' => 'bg-purple-50 text-purple-600',
        'red' => 'bg-red-50 text-red-600',
        'yellow' => 'bg-yellow-50 text-yellow-600',
        'indigo' => 'bg-indigo-50 text-indigo-600',
        'pink' => 'bg-pink-50 text-pink-600',
        'orange' => 'bg-orange-50 text-orange-600',
    ];
    $selectedColor = $colors[$color] ?? $colors['blue'];
@endphp

<div class="box p-5 hover:shadow-lg transition-shadow duration-300">
    <div class="flex items-center justify-between">
        <div class="flex-1">
            @if($title)
                <div class="text-slate-500 text-sm font-medium mb-1">{{ $title }}</div>
            @endif

            @if($value !== '')
                <div class="text-2xl lg:text-3xl font-bold text-slate-800">{{ $value }}</div>
            @endif

            @if($subtitle)
                <div class="text-xs text-slate-500 mt-1">{{ $subtitle }}</div>
            @endif

            @if($trend !== null)
                <div class="flex items-center mt-2">
                    @if($trend > 0)
                        <x-base.lucide icon="TrendingUp" class="w-4 h-4 text-success me-1" />
                        <span class="text-xs text-success font-medium">+{{ number_format(abs($trend), 1) }}%</span>
                    @elseif($trend < 0)
                        <x-base.lucide icon="TrendingDown" class="w-4 h-4 text-warning me-1" />
                        <span class="text-xs text-warning font-medium">{{ number_format(abs($trend), 1) }}%</span>
                    @else
                        <x-base.lucide icon="Minus" class="w-4 h-4 text-slate-400 me-1" />
                        <span class="text-xs text-slate-500 font-medium">0%</span>
                    @endif

                    @if($trendLabel)
                        <span class="text-xs text-slate-400 ms-2">{{ $trendLabel }}</span>
                    @endif
                </div>
            @endif
        </div>

        <div class="{{ $selectedColor }} p-3 rounded-xl">
            <x-base.lucide :icon="$icon" class="w-6 h-6" />
        </div>
    </div>
</div>
