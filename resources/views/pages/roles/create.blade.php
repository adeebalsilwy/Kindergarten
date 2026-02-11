@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('global.create_role') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('global.create_new_role') }}</h2>
        <div class="flex gap-2">
            <x-base.button variant="outline-secondary" as="a" href="{{ route('roles.index') }}" class="flex items-center">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 mr-2" />
                {{ __('global.back_to_list') }}
            </x-base.button>
        </div>
    </div>
    
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="intro-y box p-5">
                <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Basic Information -->
                    <div class="border-b border-slate-200/60 dark:border-darkmode-400 pb-6 mb-6">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center mr-3">
                                <x-base.lucide icon="Shield" class="w-5 h-5 text-primary" />
                            </div>
                            <h3 class="text-lg font-medium">{{ __('global.basic_information') }}</h3>
                        </div>
                        
                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label class="font-medium">{{ __('global.role_name') }} *</x-base.form-label>
                                <x-base.form-input 
                                    type="text" 
                                    name="name" 
                                    value="{{ old('name') }}" 
                                    class="mt-2" 
                                    placeholder="{{ __('global.enter_role_name') }}"
                                    required
                                />
                                @error('name')
                                    <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label class="font-medium">{{ __('global.guard_name') }}</x-base.form-label>
                                <x-base.form-input 
                                    type="text" 
                                    name="guard_name" 
                                    value="{{ old('guard_name', 'web') }}" 
                                    class="mt-2" 
                                    readonly
                                />
                                <div class="text-slate-500 text-xs mt-1">{{ __('global.default_guard_explanation') }}</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Permission Selection -->
                    <div class="border-b border-slate-200/60 dark:border-darkmode-400 pb-6 mb-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full bg-success/10 flex items-center justify-center mr-3">
                                    <x-base.lucide icon="Key" class="w-5 h-5 text-success" />
                                </div>
                                <h3 class="text-lg font-medium">{{ __('global.assign_permissions') }}</h3>
                            </div>
                            
                            <!-- Select All Controls -->
                            <div class="flex gap-2">
                                <x-base.button type="button" variant="outline-primary" size="sm" onclick="selectAllPermissions()" class="flex items-center">
                                    <x-base.lucide icon="CheckSquare" class="w-4 h-4 mr-1" />
                                    {{ __('global.select_all') }}
                                </x-base.button>
                                <x-base.button type="button" variant="outline-secondary" size="sm" onclick="deselectAllPermissions()" class="flex items-center">
                                    <x-base.lucide icon="Square" class="w-4 h-4 mr-1" />
                                    {{ __('global.deselect_all') }}
                                </x-base.button>
                            </div>
                        </div>
                        
                        <div class="text-slate-600 text-sm mb-4">
                            {{ __('global.select_permissions_for_role') }}
                        </div>
                        
                        <!-- Permission Categories -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @php
                                $groupedPermissions = $permissions->groupBy(function($permission) {
                                    $parts = explode('_', $permission->name);
                                    return $parts[0] ?? 'general';
                                });
                            @endphp
                            
                            @foreach($groupedPermissions as $category => $perms)
                            <div class="border border-slate-200/60 rounded-lg p-4 bg-slate-50/50 dark:bg-darkmode-600/50">
                                <div class="flex items-center justify-between mb-3">
                                    <h4 class="font-medium text-slate-800 dark:text-slate-200 capitalize">{{ $category }}</h4>
                                    <x-base.button 
                                        type="button" 
                                        variant="outline-secondary" 
                                        size="xs" 
                                        onclick="toggleCategory('{{ $category }}')"
                                        class="category-toggle-btn"
                                        data-category="{{ $category }}"
                                    >
                                        {{ __('global.select_category') }}
                                    </x-base.button>
                                </div>
                                
                                <div class="space-y-2 max-h-60 overflow-y-auto permission-category" data-category="{{ $category }}">
                                    @foreach($perms as $permission)
                                    <div class="flex items-center p-2 rounded hover:bg-white dark:hover:bg-darkmode-500 transition-colors">
                                        <input 
                                            type="checkbox" 
                                            name="permissions[]" 
                                            value="{{ $permission->id }}" 
                                            id="permission_{{ $permission->id }}"
                                            class="permission-checkbox rounded border-slate-300 text-primary focus:ring-primary/20"
                                        >
                                        <label 
                                            for="permission_{{ $permission->id }}" 
                                            class="ml-3 text-sm font-medium text-slate-700 dark:text-slate-300 cursor-pointer flex-1"
                                        >
                                            {{ str_replace('_', ' ', $permission->name) }}
                                        </label>
                                        <span class="text-xs text-slate-500 ml-2">ID: {{ $permission->id }}</span>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                        <!-- Selected Count -->
                        <div class="mt-4 p-3 bg-primary/5 border border-primary/20 rounded-lg">
                            <div class="flex items-center text-primary">
                                <x-base.lucide icon="Info" class="w-5 h-5 mr-2" />
                                <span id="selectedCount">{{ __('global.no_permissions_selected') }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Form Actions -->
                    <div class="flex justify-between items-center pt-4">
                        <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary flex items-center">
                            <x-base.lucide icon="X" class="w-4 h-4 mr-2" />
                            {{ __('global.cancel') }}
                        </a>
                        <div class="flex gap-2">
                            <x-base.button type="reset" variant="outline-secondary" class="flex items-center">
                                <x-base.lucide icon="RotateCcw" class="w-4 h-4 mr-2" />
                                {{ __('global.reset') }}
                            </x-base.button>
                            <x-base.button type="submit" variant="primary" class="flex items-center">
                                <x-base.lucide icon="Save" class="w-4 h-4 mr-2" />
                                {{ __('global.create_role') }}
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
                    <x-base.lucide icon="HelpCircle" class="w-5 h-5 text-blue-500 mr-2" />
                    {{ __('global.help_guide') }}
                </h3>
                
                <div class="space-y-4 text-sm text-slate-600 dark:text-slate-400">
                    <div class="flex items-start">
                        <div class="w-2 h-2 rounded-full bg-blue-500 mt-2 mr-3 flex-shrink-0"></div>
                        <div>
                            <strong class="text-slate-800 dark:text-slate-200">{{ __('global.role_name_required') }}</strong>
                            <p class="mt-1">{{ __('global.role_name_explanation') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-2 h-2 rounded-full bg-green-500 mt-2 mr-3 flex-shrink-0"></div>
                        <div>
                            <strong class="text-slate-800 dark:text-slate-200">{{ __('global.permissions_optional') }}</strong>
                            <p class="mt-1">{{ __('global.permissions_explanation') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-2 h-2 rounded-full bg-yellow-500 mt-2 mr-3 flex-shrink-0"></div>
                        <div>
                            <strong class="text-slate-800 dark:text-slate-200">{{ __('global.admin_auto_assign') }}</strong>
                            <p class="mt-1">{{ __('global.admin_auto_assign_explanation') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Permission Management -->
    <script>
        // Update selected count
        function updateSelectedCount() {
            const selectedCount = document.querySelectorAll('.permission-checkbox:checked').length;
            const totalPermissions = {{ $permissions->count() }};
            
            const countElement = document.getElementById('selectedCount');
            if (selectedCount === 0) {
                countElement.textContent = '{{ __('global.no_permissions_selected') }}';
                countElement.className = 'text-slate-500';
            } else {
                countElement.textContent = `{{ __('global.selected_count') }}: ${selectedCount} {{ __('global.of') }} ${totalPermissions} {{ __('global.permissions') }}`;
                countElement.className = 'text-primary font-medium';
            }
        }
        
        // Select all permissions
        function selectAllPermissions() {
            document.querySelectorAll('.permission-checkbox').forEach(checkbox => {
                checkbox.checked = true;
            });
            updateSelectedCount();
        }
        
        // Deselect all permissions
        function deselectAllPermissions() {
            document.querySelectorAll('.permission-checkbox').forEach(checkbox => {
                checkbox.checked = false;
            });
            updateSelectedCount();
        }
        
        // Toggle category selection
        function toggleCategory(category) {
            const categoryCheckboxes = document.querySelectorAll(`.permission-category[data-category="${category}"] .permission-checkbox`);
            const allChecked = Array.from(categoryCheckboxes).every(cb => cb.checked);
            
            categoryCheckboxes.forEach(checkbox => {
                checkbox.checked = !allChecked;
            });
            
            // Update button text
            const button = document.querySelector(`.category-toggle-btn[data-category="${category}"]`);
            button.textContent = allChecked ? '{{ __('global.select_category') }}' : '{{ __('global.deselect_category') }}';
            
            updateSelectedCount();
        }
        
        // Initialize event listeners
        document.addEventListener('DOMContentLoaded', function() {
            // Add event listeners to all checkboxes
            document.querySelectorAll('.permission-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', updateSelectedCount);
            });
            
            // Initialize count
            updateSelectedCount();
        });
        
        // Form submission handler
        document.querySelector('form').addEventListener('submit', function(e) {
            const selectedCount = document.querySelectorAll('.permission-checkbox:checked').length;
            const roleName = document.querySelector('input[name="name"]').value.trim();
            
            if (!roleName) {
                e.preventDefault();
                alert('{{ __('global.please_enter_role_name') }}');
                return;
            }
            
            // Confirm if no permissions selected (except for admin)
            if (selectedCount === 0 && roleName.toLowerCase() !== 'admin') {
                if (!confirm('{{ __('global.no_permissions_warning') }}')) {
                    e.preventDefault();
                }
            }
        });
    </script>
@endsection
