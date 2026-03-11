@props([
    'action' => '',
    'method' => 'GET',
    'cols' => 4,
    'showReset' => true,
    'resetRoute' => null
])

<div class="intro-y col-span-12">
    <div class="box p-5 bg-slate-50">
        <form action="{{ $action }}" method="{{ $method }}">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-{{ $cols }} gap-4 mb-4">
                {{ $slot }}
            </div>

            <div class="flex items-center justify-end gap-2 pt-4 border-t border-slate-200">
                @if($showReset && $resetRoute)
                    <a href="{{ $resetRoute }}"
                       class="px-4 py-2 text-sm font-medium text-slate-600 hover:text-slate-800 transition-colors">
                        <x-base.lucide icon="RotateCcw" class="w-4 h-4 inline me-1" />
                        {{ __('global.reset_filters') }}
                    </a>
                @endif

                <x-base.button type="submit" variant="primary" class="flex items-center">
                    <x-base.lucide icon="Search" class="w-4 h-4 me-2" />
                    {{ __('global.filter') }}
                </x-base.button>
            </div>
        </form>
    </div>
</div>
