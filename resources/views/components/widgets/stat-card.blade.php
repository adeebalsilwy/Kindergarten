@props([
    'title',
    'value',
    'icon' => 'BarChart3',
    'color' => 'primary',
    'route' => null,
    'format' => null,
    'description' => null,
])

<div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
    <div class="report-box zoom-in before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']">
        <div class="box p-5">
            <div class="flex">
                @if($route)
                    <a href="{{ route($route) }}">
                        <x-base.lucide class="h-8 w-8 text-{{ $color }}" icon="{{ $icon }}" />
                    </a>
                @else
                    <x-base.lucide class="h-8 w-8 text-{{ $color }}" icon="{{ $icon }}" />
                @endif
                @if($description)
                    <div class="ml-auto">
                        <div class="report-box__indicator bg-success"> 
                            <x-base.lucide icon="TrendingUp" class="w-4 h-4" /> 
                        </div>
                    </div>
                @endif
            </div>
            <div class="mt-6 text-2xl font-medium leading-8 text-slate-600 dark:text-slate-300">
                @if($format === 'currency')
                    {{ __('global.currency_symbol', ['amount' => number_format($value)]) }}
                @else
                    {{ number_format($value) }}
                @endif
            </div>
            <div class="mt-1 text-base text-slate-500">{{ $title }}</div>
            @if($description)
                <div class="mt-1 text-sm text-slate-400">{{ $description }}</div>
            @endif
        </div>
    </div>
</div>