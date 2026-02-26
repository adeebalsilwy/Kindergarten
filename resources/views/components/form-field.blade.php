@props([
    'label' => '',
    'name' => '',
    'type' => 'text',
    'value' => '',
    'placeholder' => '',
    'required' => false,
    'help' => '',
    'error' => '',
    'icon' => '',
    'addon' => '',
    'options' => [],
    'multiple' => false,
    'rows' => 3,
    'disabled' => false,
    'readonly' => false,
    'autocomplete' => 'off'
])

<div class="mb-4">
    @if($label)
        <x-base.form-label class="{{ $required ? 'required' : '' }}">
            {{ $label }}
            @if($required)
                <span class="text-danger">*</span>
            @endif
        </x-base.form-label>
    @endif

    <div class="mt-1">
        @switch($type)
            @case('select')
                <x-base.tom-select 
                    name="{{ $name }}" 
                    class="w-full" 
                    :multiple="$multiple"
                    :disabled="$disabled"
                    data-placeholder="{{ $placeholder ?: __('global.select_option') }}">
                    @if(!$multiple)
                        <option value="">{{ $placeholder ?: __('global.select_option') }}</option>
                    @endif
                    @foreach($options as $key => $option)
                        <option value="{{ is_array($option) ? $option['value'] : $key }}" 
                                {{ (is_array($option) ? $option['value'] : $key) == old($name, $value) ? 'selected' : '' }}>
                            {{ is_array($option) ? $option['label'] : $option }}
                        </option>
                    @endforeach
                </x-base.tom-select>
                @break

            @case('textarea')
                <x-base.form-textarea 
                    name="{{ $name }}" 
                    rows="{{ $rows }}"
                    class="w-full resize-none {{ $disabled ? 'bg-slate-100' : '' }}"
                    placeholder="{{ $placeholder }}"
                    :disabled="$disabled"
                    :readonly="$readonly">{{ old($name, $value) }}</x-base.form-textarea>
                @break

            @case('file')
                <div class="flex items-center">
                    <x-base.form-input 
                        type="file" 
                        name="{{ $name }}" 
                        accept="{{ $addon ?: 'image/*' }}"
                        class="block w-full text-sm text-slate-500 file:me-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary/90"
                        :disabled="$disabled" />
                </div>
                @if($value && $type === 'file')
                    <div class="mt-2 flex items-center">
                        @if(Str::startsWith($value, ['http', 'https']))
                            <img src="{{ $value }}" alt="Current File" class="w-16 h-16 object-cover rounded border-2 border-slate-200">
                        @else
                            <img src="{{ asset('storage/' . $value) }}" alt="Current File" class="w-16 h-16 object-cover rounded border-2 border-slate-200">
                        @endif
                        <span class="ms-3 text-sm text-slate-500">{{ __('global.current_file') }}</span>
                    </div>
                @endif
                @break

            @case('checkbox')
                <div class="flex items-center">
                    <x-base.form-check-input 
                        type="checkbox" 
                        name="{{ $name }}" 
                        value="1"
                        class="border-slate-300 rounded text-primary focus:ring-primary"
                        {{ old($name, $value) ? 'checked' : '' }}
                        :disabled="$disabled" />
                    <x-base.form-label class="ms-2 mb-0">{{ $placeholder }}</x-base.form-label>
                </div>
                @break

            @case('radio')
                <div class="space-y-2">
                    @foreach($options as $key => $option)
                        <div class="flex items-center">
                            <x-base.form-check-input 
                                type="radio" 
                                name="{{ $name }}" 
                                value="{{ is_array($option) ? $option['value'] : $key }}"
                                class="border-slate-300 text-primary focus:ring-primary"
                                {{ (is_array($option) ? $option['value'] : $key) == old($name, $value) ? 'checked' : '' }}
                                :disabled="$disabled" />
                            <x-base.form-label class="ms-2 mb-0">
                                {{ is_array($option) ? $option['label'] : $option }}
                            </x-base.form-label>
                        </div>
                    @endforeach
                </div>
                @break

            @default
                @if($icon || $addon)
                    <div class="relative">
                        @if($icon)
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <x-base.lucide icon="{{ $icon }}" class="h-5 w-5 text-slate-400" />
                            </div>
                        @endif
                        @if($addon)
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <span class="text-slate-500 sm:text-sm">{{ $addon }}</span>
                            </div>
                        @endif
                        <x-base.form-input 
                            type="{{ $type }}" 
                            name="{{ $name }}" 
                            value="{{ old($name, $value) }}"
                            class="w-full {{ $icon ? 'pl-10' : '' }} {{ $addon ? 'pr-12' : '' }} {{ $disabled ? 'bg-slate-100' : '' }}"
                            placeholder="{{ $placeholder }}"
                            :disabled="$disabled"
                            :readonly="$readonly"
                            autocomplete="{{ $autocomplete }}" />
                    </div>
                @else
                    <x-base.form-input 
                        type="{{ $type }}" 
                        name="{{ $name }}" 
                        value="{{ old($name, $value) }}"
                        class="w-full {{ $disabled ? 'bg-slate-100' : '' }}"
                        placeholder="{{ $placeholder }}"
                        :disabled="$disabled"
                        :readonly="$readonly"
                        autocomplete="{{ $autocomplete }}" />
                @endif
        @endswitch
    </div>

    @if($help)
        <p class="mt-2 text-sm text-slate-500">{{ $help }}</p>
    @endif

    @if($error || $errors->has($name))
        <p class="mt-2 text-sm text-danger">
            {{ $error ?: $errors->first($name) }}
        </p>
    @endif
</div>