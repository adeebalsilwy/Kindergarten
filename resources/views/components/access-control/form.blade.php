@props([
    'title' => 'Form',
    'subtitle' => '',
    'action' => '',
    'method' => 'POST',
    'model' => null,
    'fields' => [],
    'sections' => [],
    'backUrl' => null,
    'submitText' => 'Save',
    'cancelText' => 'Cancel',
    'formId' => 'accessControlForm',
    'enctype' => 'application/x-www-form-urlencoded',
    'validation' => true,
    'tabs' => false,
])

<div class="access-control-form">
    <!-- Header Section -->
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <div>
            <h2 class="text-lg font-medium">{{ __($title) }}</h2>
            @if($subtitle)
                <div class="text-slate-500 mt-1">{{ __($subtitle) }}</div>
            @endif
        </div>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            @if($backUrl)
                <x-base.button variant="outline-secondary" as="a" href="{{ $backUrl }}" class="flex items-center me-2">
                    <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
                    {{ __('access_control.actions.back') }}
                </x-base.button>
            @endif
        </div>
    </div>

    <!-- Form -->
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 {{ !empty($sections) ? 'lg:col-span-8' : 'lg:col-span-12' }}">
            <form 
                id="{{ $formId }}" 
                action="{{ $action }}" 
                method="{{ $method === 'PUT' ? 'POST' : $method }}"
                enctype="{{ $enctype }}"
                class="form-validate"
            >
                @csrf
                @if($method === 'PUT')
                    @method('PUT')
                @endif

                @if($tabs && !empty($sections))
                    <!-- Tabbed Interface -->
                    <div class="intro-y box">
                        <div class="p-5">
                            <x-base.tab.group>
                                @foreach($sections as $index => $section)
                                    <x-base.tab id="tab-{{ $index }}" {{ $index === 0 ? 'selected' : '' }}>
                                        {{ __($section['title']) }}
                                    </x-base.tab>
                                @endforeach
                            </x-base.tab.group>
                            
                            <div class="tab-content mt-5">
                                @foreach($sections as $index => $section)
                                    <div class="tab-pane {{ $index === 0 ? 'active' : '' }}" id="tab-content-{{ $index }}">
                                        <div class="grid grid-cols-12 gap-4">
                                            @foreach($section['fields'] as $field)
                                                <div class="col-span-12 {{ $field['colspan'] ?? 'md:col-span-6' }}">
                                                    @include('components.access-control.form-field', [
                                                        'field' => $field,
                                                        'model' => $model,
                                                        'validation' => $validation
                                                    ])
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @elseif(!empty($sections))
                    <!-- Sectioned Form -->
                    @foreach($sections as $section)
                        <div class="intro-y box mb-6">
                            <div class="flex items-center px-5 py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base me-2">
                                    {{ __($section['title']) }}
                                </h2>
                                @if($section['description'] ?? false)
                                    <div class="text-slate-500 text-xs">{{ __($section['description']) }}</div>
                                @endif
                            </div>
                            <div class="p-5">
                                <div class="grid grid-cols-12 gap-4">
                                    @foreach($section['fields'] as $field)
                                        <div class="col-span-12 {{ $field['colspan'] ?? 'md:col-span-6' }}">
                                            @include('components.access-control.form-field', [
                                                'field' => $field,
                                                'model' => $model,
                                                'validation' => $validation
                                            ])
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Simple Form -->
                    <div class="intro-y box p-5">
                        <div class="grid grid-cols-12 gap-4">
                            @foreach($fields as $field)
                                <div class="col-span-12 {{ $field['colspan'] ?? 'md:col-span-6' }}">
                                    @include('components.access-control.form-field', [
                                        'field' => $field,
                                        'model' => $model,
                                        'validation' => $validation
                                    ])
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Form Actions -->
                <div class="intro-y box p-5 mt-5">
                    <div class="flex flex-col sm:flex-row items-center">
                        <div class="flex-1"></div>
                        <div class="flex gap-2 w-full sm:w-auto">
                            @if($backUrl)
                                <x-base.button 
                                    variant="outline-secondary" 
                                    as="a" 
                                    href="{{ $backUrl }}" 
                                    class="w-full sm:w-auto"
                                >
                                    {{ __('access_control.actions.cancel') }}
                                </x-base.button>
                            @endif
                            <x-base.button 
                                type="submit" 
                                variant="primary" 
                                class="w-full sm:w-auto flex items-center"
                            >
                                <x-base.lucide icon="Save" class="w-4 h-4 me-2" />
                                {{ __($submitText) }}
                            </x-base.button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        @if(!empty($sections) && false)
            <!-- Sidebar with additional information -->
            <div class="intro-y col-span-12 lg:col-span-4">
                <div class="intro-y box p-5">
                    <h2 class="text-base font-medium mb-4">
                        {{ __('access_control.fields.additional_info') }}
                    </h2>
                    <div class="text-sm text-slate-600">
                        {{ __('access_control.messages.form_help') }}
                    </div>
                    
                    <!-- Quick Actions -->
                    <div class="mt-6">
                        <h3 class="text-sm font-medium mb-3">{{ __('access_control.actions.quick_actions') }}</h3>
                        <div class="space-y-2">
                            <x-base.button variant="soft-primary" class="w-full justify-start">
                                <x-base.lucide icon="Copy" class="w-4 h-4 me-2" />
                                {{ __('access_control.actions.duplicate') }}
                            </x-base.button>
                            <x-base.button variant="soft-secondary" class="w-full justify-start">
                                <x-base.lucide icon="History" class="w-4 h-4 me-2" />
                                {{ __('access_control.actions.view_history') }}
                            </x-base.button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Form Field Component -->
@once
@push('components')
<div class="hidden" id="form-field-template">
    @include('components.access-control.form-field')
</div>
@endpush
@endonce

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form validation removed - all fields are now optional

    // Tab functionality
    if (document.querySelector('[data-tab]')) {
        document.querySelectorAll('[data-tab]').forEach(tab => {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                const target = this.getAttribute('data-tab');
                
                // Remove active classes
                document.querySelectorAll('[data-tab]').forEach(t => t.classList.remove('active'));
                document.querySelectorAll('.tab-pane').forEach(pane => pane.classList.remove('active'));
                
                // Add active classes
                this.classList.add('active');
                document.querySelector(target).classList.add('active');
            });
        });
    }

    // Auto-save functionality
    let saveTimeout;
    document.querySelectorAll('.auto-save').forEach(element => {
        element.addEventListener('input', function() {
            clearTimeout(saveTimeout);
            saveTimeout = setTimeout(function() {
                // Auto-save logic here
                console.log('Auto-saving...');
            }, 2000);
        });
    });
});

// Form validation removed - all fields are now optional
</script>