@props([
    'backUrl' => '',
    'submitText' => '',
    'cancelText' => '',
    'submitVariant' => 'primary',
    'cancelVariant' => 'secondary',
    'align' => 'right'
])

<div class="flex justify-{{ $align === 'right' ? 'end' : ($align === 'left' ? 'start' : 'center') }} gap-4 mt-12 pt-8 border-t border-slate-200">
    @if($backUrl)
        <x-base.button 
            as="a" 
            href="{{ $backUrl }}" 
            variant="outline-secondary" 
            class="w-32 shadow-sm hover:bg-slate-50 transition-colors">
            <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
            {{ $cancelText ?: __('global.cancel') }}
        </x-base.button>
    @else
        <x-base.button 
            type="button" 
            variant="outline-secondary" 
            class="w-32 shadow-sm hover:bg-slate-50 transition-colors"
            onclick="window.history.back()">
            <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
            {{ $cancelText ?: __('global.cancel') }}
        </x-base.button>
    @endif

    <x-base.button 
        type="submit" 
        variant="{{ $submitVariant }}" 
        class="w-48 shadow-lg hover:scale-105 transform transition-all duration-200 font-bold">
        @if($submitVariant === 'primary')
            <x-base.lucide icon="Save" class="w-5 h-5 me-2" />
        @endif
        {{ $submitText ?: __('global.save') }}
    </x-base.button>
</div>