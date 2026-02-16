@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('global.create_permission') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('global.create_new_permission') }}</h2>
        <div class="flex gap-2">
            <x-base.button variant="outline-secondary" as="a" href="{{ route('permissions.index') }}" class="flex items-center">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
                {{ __('global.back_to_list') }}
            </x-base.button>
        </div>
    </div>
    
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="intro-y box p-5">
                <form action="{{ route('permissions.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Basic Information -->
                    <div class="border-b border-slate-200/60 dark:border-darkmode-400 pb-6 mb-6">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center me-3">
                                <x-base.lucide icon="Key" class="w-5 h-5 text-primary" />
                            </div>
                            <h3 class="text-lg font-medium">{{ __('global.permission_details') }}</h3>
                        </div>
                        
                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-12">
                                <x-base.form-label class="font-medium">{{ __('global.permission_name') }} *</x-base.form-label>
                                <x-base.form-input 
                                    type="text" 
                                    name="name" 
                                    value="{{ old('name') }}" 
                                    class="mt-2" 
                                    placeholder="{{ __('global.enter_permission_name') }}"
                                    required
                                />
                                <div class="text-slate-500 text-xs mt-1">{{ __('global.permission_name_format') }}</div>
                                @error('name')
                                    <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label class="font-medium">{{ __('global.guard_name') }}</x-base.form-label>
                                <select name="guard_name" class="form-select mt-2">
                                    <option value="web" {{ old('guard_name', 'web') == 'web' ? 'selected' : '' }}>web</option>
                                    <option value="api" {{ old('guard_name') == 'api' ? 'selected' : '' }}>api</option>
                                </select>
                                <div class="text-slate-500 text-xs mt-1">{{ __('global.guard_name_explanation') }}</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Preview and Validation -->
                    <div class="border-b border-slate-200/60 dark:border-darkmode-400 pb-6 mb-6">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 rounded-full bg-success/10 flex items-center justify-center me-3">
                                <x-base.lucide icon="Eye" class="w-5 h-5 text-success" />
                            </div>
                            <h3 class="text-lg font-medium">{{ __('global.preview') }}</h3>
                        </div>
                        
                        <div class="p-4 bg-slate-50 dark:bg-darkmode-600 rounded-lg">
                            <div class="text-center">
                                <div class="text-sm text-slate-600 dark:text-slate-400 mb-2">{{ __('global.permission_display_name') }}</div>
                                <div id="permissionPreview" class="text-lg font-medium text-slate-800 dark:text-slate-200">
                                    {{ old('name') ? str_replace('_', ' ', old('name')) : __('global.enter_name_to_preview') }}
                                </div>
                                <div class="mt-2 text-xs text-slate-500">
                                    {{ __('global.this_is_how_it_will_appear') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Auto-Assignment Notice -->
                    <div class="border-b border-slate-200/60 dark:border-darkmode-400 pb-6 mb-6">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 rounded-full bg-info/10 flex items-center justify-center me-3">
                                <x-base.lucide icon="ShieldCheck" class="w-5 h-5 text-info" />
                            </div>
                            <h3 class="text-lg font-medium">{{ __('global.automatic_assignment') }}</h3>
                        </div>
                        
                        <div class="p-4 bg-info/10 border border-info/20 rounded-lg">
                            <div class="flex items-start">
                                <x-base.lucide icon="Info" class="w-5 h-5 text-info mt-0.5 me-3 flex-shrink-0" />
                                <div>
                                    <p class="text-info font-medium">{{ __('global.admin_auto_assignment_notice') }}</p>
                                    <p class="text-sm text-info mt-1">{{ __('global.permission_will_be_assigned_to_admin') }}</p>
                                    <div class="mt-2 flex items-center text-xs text-info">
                                        <x-base.lucide icon="Crown" class="w-4 h-4 me-1" />
                                        {{ __('global.admin_role') }} (ID: 1)
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Form Actions -->
                    <div class="flex justify-between items-center pt-4">
                        <a href="{{ route('permissions.index') }}" class="btn btn-outline-secondary flex items-center">
                            <x-base.lucide icon="X" class="w-4 h-4 me-2" />
                            {{ __('global.cancel') }}
                        </a>
                        <div class="flex gap-2">
                            <x-base.button type="reset" variant="outline-secondary" class="flex items-center">
                                <x-base.lucide icon="RotateCcw" class="w-4 h-4 me-2" />
                                {{ __('global.reset') }}
                            </x-base.button>
                            <x-base.button type="submit" variant="primary" class="flex items-center">
                                <x-base.lucide icon="Save" class="w-4 h-4 me-2" />
                                {{ __('global.create_permission') }}
                            </x-base.button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Help Sidebar -->
        <div class="intro-y col-span-12 lg:col-span-4">
            <div class="box p-5 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-darkmode-600 dark:to-darkmode-700">
                <h3 class="text-lg font-medium text-slate-800 dark:text-slate-200 mb-4 flex items-center">
                    <x-base.lucide icon="HelpCircle" class="w-5 h-5 text-blue-500 me-2" />
                    {{ __('global.creation_guide') }}
                </h3>
                
                <div class="space-y-4 text-sm text-slate-600 dark:text-slate-400">
                    <div class="flex items-start">
                        <div class="w-2 h-2 rounded-full bg-blue-500 mt-2 me-3 flex-shrink-0"></div>
                        <div>
                            <strong class="text-slate-800 dark:text-slate-200">{{ __('global.naming_convention') }}</strong>
                            <p class="mt-1">{{ __('global.use_underscore_separation') }}</p>
                            <div class="mt-2 text-xs bg-slate-100 dark:bg-darkmode-700 p-2 rounded font-mono">
                                view_users<br>edit_profile<br>delete_records
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-2 h-2 rounded-full bg-green-500 mt-2 me-3 flex-shrink-0"></div>
                        <div>
                            <strong class="text-slate-800 dark:text-slate-200">{{ __('global.guard_selection') }}</strong>
                            <p class="mt-1">{{ __('global.choose_appropriate_guard') }}</p>
                            <ul class="mt-1 text-xs space-y-1">
                                <li>• <strong>web</strong>: {{ __('global.web_interface_access') }}</li>
                                <li>• <strong>api</strong>: {{ __('global.api_endpoint_access') }}</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-2 h-2 rounded-full bg-yellow-500 mt-2 me-3 flex-shrink-0"></div>
                        <div>
                            <strong class="text-slate-800 dark:text-slate-200">{{ __('global.immediate_assignment') }}</strong>
                            <p class="mt-1">{{ __('global.new_permission_auto_assigned') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Real-time Preview -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nameInput = document.querySelector('input[name="name"]');
            const previewElement = document.getElementById('permissionPreview');
            
            function updatePreview() {
                const value = nameInput.value.trim();
                if (value) {
                    previewElement.textContent = value.replace(/_/g, ' ');
                    previewElement.className = 'text-lg font-medium text-slate-800 dark:text-slate-200';
                } else {
                    previewElement.textContent = '{{ __('global.enter_name_to_preview') }}';
                    previewElement.className = 'text-lg font-medium text-slate-500 dark:text-slate-400';
                }
            }
            
            nameInput.addEventListener('input', updatePreview);
            
            // Initialize preview
            updatePreview();
        });
        
        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const name = document.querySelector('input[name="name"]').value.trim();
            
            if (!name) {
                e.preventDefault();
                alert('{{ __('global.please_enter_permission_name') }}');
                return;
            }
            
            // Validate naming convention
            if (!/^[a-z_]+$/.test(name)) {
                if (!confirm('{{ __('global.naming_convention_warning') }}')) {
                    e.preventDefault();
                    return;
                }
            }
        });
    </script>
@endsection
