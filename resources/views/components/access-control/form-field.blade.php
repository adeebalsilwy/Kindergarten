@props([
    'field' => [],
    'model' => null,
    'validation' => true,
])

@php
    $fieldName = $field['name'] ?? '';
    $fieldType = $field['type'] ?? 'text';
    $fieldValue = old($fieldName, $model ? ($field['relation'] ?? false ? 
        data_get($model, $field['relation'] . '.' . $fieldName) : 
        $model->{$fieldName}) : ($field['default'] ?? ''));
    $fieldRequired = $field['required'] ?? false;
    $fieldDisabled = $field['disabled'] ?? false;
    $fieldReadonly = $field['readonly'] ?? false;
    $fieldPlaceholder = $field['placeholder'] ?? '';
    $fieldHelp = $field['help'] ?? '';
    $fieldError = $errors->first($fieldName);
@endphp

<div class="form-field-group mb-4">
    @if($field['label'] ?? false)
        <x-base.form-label for="{{ $fieldName }}" class="{{ $fieldRequired ? 'required' : '' }}">
            {{ __($field['label']) }}
            @if($fieldRequired)
                <span class="text-danger">*</span>
            @endif
        </x-base.form-label>
    @endif

    @switch($fieldType)
        @case('text')
        @case('email')
        @case('password')
        @case('number')
        @case('tel')
        @case('url')
            <x-base.form-input
                id="{{ $fieldName }}"
                name="{{ $fieldName }}"
                type="{{ $fieldType }}"
                value="{{ $fieldValue }}"
                placeholder="{{ __($fieldPlaceholder) }}"
                {{ $fieldRequired ? 'required' : '' }}
                {{ $fieldDisabled ? 'disabled' : '' }}
                {{ $fieldReadonly ? 'readonly' : '' }}
                class="{{ $fieldError ? 'border-danger' : '' }} {{ $field['class'] ?? '' }} {{ $validation ? 'auto-save' : '' }}"
            />
            @break

        @case('textarea')
            <x-base.form-textarea
                id="{{ $fieldName }}"
                name="{{ $fieldName }}"
                placeholder="{{ __($fieldPlaceholder) }}"
                rows="{{ $field['rows'] ?? 4 }}"
                {{ $fieldRequired ? 'required' : '' }}
                {{ $fieldDisabled ? 'disabled' : '' }}
                {{ $fieldReadonly ? 'readonly' : '' }}
                class="{{ $fieldError ? 'border-danger' : '' }} {{ $field['class'] ?? '' }} {{ $validation ? 'auto-save' : '' }}"
            >{{ $fieldValue }}</x-base.form-textarea>
            @break

        @case('select')
            <x-base.tom-select
                id="{{ $fieldName }}"
                name="{{ $fieldName }}"
                {{ $fieldRequired ? 'required' : '' }}
                {{ $fieldDisabled ? 'disabled' : '' }}
                {{ $fieldReadonly ? 'readonly' : '' }}
                class="{{ $fieldError ? 'border-danger' : '' }} {{ $field['class'] ?? '' }}"
            >
                @if($field['placeholder'] ?? false)
                    <option value="">{{ __($field['placeholder']) }}</option>
                @endif
                @foreach($field['options'] as $option)
                    <option 
                        value="{{ $option['value'] }}" 
                        {{ (string)$fieldValue === (string)$option['value'] ? 'selected' : '' }}
                        {{ $option['disabled'] ?? false ? 'disabled' : '' }}
                    >
                        {{ __($option['label']) }}
                    </option>
                @endforeach
            </x-base.tom-select>
            @break

        @case('checkbox')
            <div class="flex items-center">
                <x-base.form-check.input
                    id="{{ $fieldName }}"
                    name="{{ $fieldName }}"
                    type="checkbox"
                    value="{{ $field['value'] ?? '1' }}"
                    {{ (bool)$fieldValue ? 'checked' : '' }}
                    {{ $fieldRequired ? 'required' : '' }}
                    {{ $fieldDisabled ? 'disabled' : '' }}
                    {{ $fieldReadonly ? 'readonly' : '' }}
                    class="{{ $fieldError ? 'border-danger' : '' }} {{ $field['class'] ?? '' }}"
                />
                <x-base.form-check.label for="{{ $fieldName }}" class="ms-2">
                    {{ __($field['label']) }}
                </x-base.form-check.label>
            </div>
            @break

        @case('radio')
            <div class="space-y-2">
                @foreach($field['options'] as $option)
                    <div class="flex items-center">
                        <x-base.form-check.input
                            id="{{ $fieldName }}_{{ $option['value'] }}"
                            name="{{ $fieldName }}"
                            type="radio"
                            value="{{ $option['value'] }}"
                            {{ (string)$fieldValue === (string)$option['value'] ? 'checked' : '' }}
                            {{ $fieldRequired ? 'required' : '' }}
                            {{ $fieldDisabled ? 'disabled' : '' }}
                            {{ $fieldReadonly ? 'readonly' : '' }}
                            class="{{ $fieldError ? 'border-danger' : '' }} {{ $field['class'] ?? '' }}"
                        />
                        <x-base.form-check.label for="{{ $fieldName }}_{{ $option['value'] }}" class="ms-2">
                            {{ __($option['label']) }}
                        </x-base.form-check.label>
                    </div>
                @endforeach
            </div>
            @break

        @case('switch')
            <div class="form-switch mt-2">
                <x-base.form-check.input
                    id="{{ $fieldName }}"
                    name="{{ $fieldName }}"
                    type="checkbox"
                    value="{{ $field['value'] ?? '1' }}"
                    {{ (bool)$fieldValue ? 'checked' : '' }}
                    {{ $fieldRequired ? 'required' : '' }}
                    {{ $fieldDisabled ? 'disabled' : '' }}
                    {{ $fieldReadonly ? 'readonly' : '' }}
                    class="{{ $fieldError ? 'border-danger' : '' }} {{ $field['class'] ?? '' }}"
                />
                <x-base.form-check.label for="{{ $fieldName }}" class="ms-2">
                    {{ __($field['label']) }}
                </x-base.form-check.label>
            </div>
            @break

        @case('file')
            <div class="border-2 border-dashed rounded-md p-4 {{ $fieldError ? 'border-danger' : 'border-slate-300' }}">
                <div class="flex items-center justify-center w-full">
                    <label for="{{ $fieldName }}" class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed rounded-lg cursor-pointer {{ $fieldError ? 'border-danger' : 'border-slate-300' }} hover:border-primary">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <x-base.lucide icon="Upload" class="w-8 h-8 mb-2 text-slate-500" />
                            <p class="mb-2 text-sm text-slate-500">
                                <span class="font-semibold">{{ __('access_control.actions.click_to_upload') }}</span> {{ __('access_control.actions.or_drag_drop') }}
                            </p>
                            <p class="text-xs text-slate-500">
                                {{ $field['accept'] ?? 'PNG, JPG, GIF up to 10MB' }}
                            </p>
                        </div>
                        <input 
                            id="{{ $fieldName }}" 
                            name="{{ $fieldName }}" 
                            type="file" 
                            class="hidden" 
                            {{ $field['accept'] ?? '' }}
                            {{ $fieldRequired ? 'required' : '' }}
                            {{ $fieldDisabled ? 'disabled' : '' }}
                        />
                    </label>
                </div>
                @if($fieldValue && $field['show_preview'] ?? false)
                    <div class="mt-3">
                        <img src="{{ $fieldValue }}" alt="Preview" class="w-20 h-20 object-cover rounded">
                    </div>
                @endif
            </div>
            @break

        @case('date')
        @case('datetime-local')
        @case('time')
            <x-base.form-input
                id="{{ $fieldName }}"
                name="{{ $fieldName }}"
                type="{{ $fieldType }}"
                value="{{ $fieldValue }}"
                {{ $fieldRequired ? 'required' : '' }}
                {{ $fieldDisabled ? 'disabled' : '' }}
                {{ $fieldReadonly ? 'readonly' : '' }}
                class="{{ $fieldError ? 'border-danger' : '' }} {{ $field['class'] ?? '' }}"
            />
            @break

        @case('range')
            <div class="flex items-center gap-4">
                <input
                    id="{{ $fieldName }}"
                    name="{{ $fieldName }}"
                    type="range"
                    min="{{ $field['min'] ?? 0 }}"
                    max="{{ $field['max'] ?? 100 }}"
                    step="{{ $field['step'] ?? 1 }}"
                    value="{{ $fieldValue }}"
                    class="w-full h-2 bg-slate-200 rounded-lg appearance-none cursor-pointer dark:bg-slate-700 {{ $field['class'] ?? '' }}"
                    {{ $fieldRequired ? 'required' : '' }}
                    {{ $fieldDisabled ? 'disabled' : '' }}
                />
                <span id="{{ $fieldName }}_value" class="text-sm font-medium text-slate-600">
                    {{ $fieldValue }}
                </span>
            </div>
            <script>
                document.getElementById('{{ $fieldName }}').addEventListener('input', function() {
                    document.getElementById('{{ $fieldName }}_value').textContent = this.value;
                });
            </script>
            @break

        @case('color')
            <div class="flex items-center gap-3">
                <input
                    id="{{ $fieldName }}"
                    name="{{ $fieldName }}"
                    type="color"
                    value="{{ $fieldValue }}"
                    class="w-12 h-12 border-0 rounded cursor-pointer {{ $field['class'] ?? '' }}"
                    {{ $fieldRequired ? 'required' : '' }}
                    {{ $fieldDisabled ? 'disabled' : '' }}
                />
                <span class="text-sm text-slate-600">{{ $fieldValue }}</span>
            </div>
            @break

        @case('custom')
            {!! $field['render']($fieldValue, $field) !!}
            @break
    @endswitch

    @if($fieldError)
        <div class="text-danger text-xs mt-1">
            {{ $fieldError }}
        </div>
    @endif

    @if($fieldHelp)
        <div class="text-slate-500 text-xs mt-1">
            {{ __($fieldHelp) }}
        </div>
    @endif
</div>