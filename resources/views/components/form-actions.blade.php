@props([
    'backUrl' => '',
    'submitText' => '',
    'cancelText' => '',
    'submitVariant' => 'primary',
    'cancelVariant' => 'secondary',
    'align' => 'right'
])

<div class="flex justify-{{ $align }} gap-3 mt-8 pt-6 border-t border-slate-200">
    @if($backUrl)
        <x-base.button 
            as="a" 
            href="{{ $backUrl }}" 
            variant="{{ $cancelVariant }}" 
            class="w-24">
            <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
            {{ $cancelText ?: __('global.cancel') }}
        </x-base.button>
    @else
        <x-base.button 
            type="button" 
            variant="{{ $cancelVariant }}" 
            class="w-24"
            onclick="window.history.back()">
            <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
            {{ $cancelText ?: __('global.cancel') }}
        </x-base.button>
    @endif

    <x-base.button 
        type="submit" 
        variant="{{ $submitVariant }}" 
        class="w-24">
        @if($submitVariant === 'primary')
            <x-base.lucide icon="Save" class="w-4 h-4 me-2" />
        @endif
        {{ $submitText ?: __('global.save') }}
    </x-base.button>
</div>