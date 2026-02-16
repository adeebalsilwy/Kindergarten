@props([
    'title' => '',
    'description' => '',
    'icon' => 'Plus',
    'route' => '',
    'color' => 'primary',
    'permission' => null
])

@php
    $colorClasses = [
        'primary' => 'bg-primary text-white hover:bg-primary/90',
        'success' => 'bg-success text-white hover:bg-success/90',
        'warning' => 'bg-warning text-white hover:bg-warning/90',
        'danger' => 'bg-danger text-white hover:bg-danger/90',
        'info' => 'bg-info text-white hover:bg-info/90',
        'secondary' => 'bg-secondary text-white hover:bg-secondary/90',
    ];
    
    $colorClass = $colorClasses[$color] ?? $colorClasses['primary'];
    
    $canAccess = true;
    if ($permission) {
        $canAccess = auth()->user() && auth()->user()->can($permission);
    }
@endphp

@if($canAccess)
    <a href="{{ $route ? route($route) : '#' }}" 
       class="block {{ $colorClass }} rounded-lg p-4 transition-all duration-200 hover:shadow-lg transform hover:-translate-y-1">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <x-base.lucide class="h-8 w-8" icon="{{ $icon }}" />
            </div>
            <div class="ms-4">
                <h3 class="text-lg font-medium">{{ $title }}</h3>
                @if($description)
                    <p class="mt-1 text-sm opacity-90">{{ $description }}</p>
                @endif
            </div>
            <div class="ms-auto">
                <x-base.lucide class="h-5 w-5" icon="ArrowRight" />
            </div>
        </div>
    </a>
@else
    <div class="block bg-slate-100 text-slate-400 rounded-lg p-4 cursor-not-allowed opacity-50">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <x-base.lucide class="h-8 w-8" icon="{{ $icon }}" />
            </div>
            <div class="ms-4">
                <h3 class="text-lg font-medium">{{ $title }}</h3>
                @if($description)
                    <p class="mt-1 text-sm">{{ $description }}</p>
                @endif
            </div>
            <div class="ms-auto">
                <x-base.lucide class="h-5 w-5" icon="Lock" />
            </div>
        </div>
    </div>
@endif