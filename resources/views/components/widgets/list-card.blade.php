@props([
    'title' => '',
    'items' => [],
    'icon' => 'List',
    'color' => 'primary',
    'route' => null,
    'showViewAll' => true,
    'emptyMessage' => 'No items found'
])

@php
    $colorClasses = [
        'primary' => 'text-primary',
        'success' => 'text-success',
        'warning' => 'text-warning',
        'danger' => 'text-danger',
        'info' => 'text-info',
        'secondary' => 'text-secondary',
    ];
    
    $colorClass = $colorClasses[$color] ?? $colorClasses['primary'];
@endphp

<div class="intro-y box p-5">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-lg font-medium truncate mr-5">
            <x-base.lucide class="inline h-5 w-5 mr-2 {{ $colorClass }}" icon="{{ $icon }}" />
            {{ $title }}
        </h2>
        @if($route && $showViewAll)
            <a href="{{ route($route) }}" class="text-{{ $color }} truncate ml-auto">
                {{ __('global.view_all') }}
                <x-base.lucide class="inline h-4 w-4 ml-1" icon="ArrowRight" />
            </a>
        @endif
    </div>
    
    @if(count($items) > 0)
        <div class="mt-2">
            @foreach($items as $item)
                <div class="intro-y">
                    <div class="box zoom-in mb-3 flex items-center px-4 py-3">
                        @if(isset($item['icon']))
                            <div class="flex-none mr-3">
                                <x-base.lucide 
                                    class="h-5 w-5 {{ $colorClasses[$item['color'] ?? 'primary'] ?? $colorClasses['primary'] }}" 
                                    icon="{{ $item['icon'] }}" 
                                />
                            </div>
                        @endif
                        
                        <div class="flex-1 min-w-0">
                            <div class="font-medium truncate">{{ $item['title'] ?? '' }}</div>
                            @if(isset($item['description']))
                                <div class="mt-1 text-xs text-slate-500 truncate">
                                    {{ $item['description'] }}
                                </div>
                            @endif
                            @if(isset($item['date']))
                                <div class="mt-1 text-xs text-slate-400">
                                    {{ \Carbon\Carbon::parse($item['date'])->diffForHumans() }}
                                </div>
                            @endif
                        </div>
                        
                        @if(isset($item['amount']))
                            <div class="ml-2 font-medium {{ $item['amount'] > 0 ? 'text-success' : 'text-danger' }}">
                                {{ $item['amount'] > 0 ? '+' : '' }}${{ number_format(abs($item['amount']), 2) }}
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-8 text-slate-500">
            <x-base.lucide class="h-12 w-12 mx-auto mb-3 text-slate-300" icon="{{ $icon }}" />
            <p>{{ $emptyMessage }}</p>
        </div>
    @endif
</div>