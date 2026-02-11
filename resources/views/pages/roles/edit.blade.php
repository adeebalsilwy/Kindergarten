@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('global.edit_role') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('global.edit_role') }}: {{ $role->name }}</h2>
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
                <form action="{{ route('roles.update', $role->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
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
                                    value="{{ old('name', $role->name) }}" 
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
                                    value="{{ old('guard_name', $role->guard_name) }}" 
                                    class="mt-2" 
                                    readonly
                                />
                                <div class="text-slate-500 text-xs mt-1">{{ __('global.cannot_change_guard') }}</div>
                            </div>
                        </div>
                        
                        <div class="mt-4 p-3 bg-info/10 border border-info/20 rounded-lg">
                            <div class="flex items-center text-info">
                                <x-base.lucide icon="Info" class="w-5 h-5 mr-2" />
                                <span class="text-sm">{{ __('global.role_id') }}: {{ $role->id }} | {{ __('global.created') }}: {{ $role->created_at->format('M d, Y') }}</span>
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
                                <h3 class="text-lg font-medium">{{ __('global.manage_permissions') }}</h3>
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
                            {{ __('global.current_permissions_count', ['count' => $role->permissions->count()]) }}
                            @if($role->id == 1)
                                <span class="text-yellow-600 font-medium">| {{ __('global.admin_role_note') }}</span>
                            @endif
                        </div>
                        
                        <!-- Admin Role Warning -->
                        @if($role->id == 1)
                        <div class="mb-4 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                            <div class="flex items-center text-yellow-800">
                                <x-base.lucide icon="AlertTriangle" class="w-5 h-5 mr-2" />
                                <span class="font-medium">{{ __('global.admin_role_warning') }}</span>
                            </div>
                            <p class="text-sm mt-1 text-yellow-700">{{ __('global.admin_role_explanation') }}</p>
                        </div>
                        @endif
                        
                        <!-- Permission Categories -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @php
                                $groupedPermissions = $permissions->groupBy(function($permission) {
                                    $parts = explode('_', $permission->name);
                                    return $parts[0] ?? 'general';
                                });
                                $rolePermissions = $role->permissions->pluck('id')->toArray();
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
                                        {{ __('global.toggle_category') }}
                                    </x-base.button>
                                </div>
                                
                                <div class="space-y-2 max-h-60 overflow-y-auto permission-category" data-category="{{ $category }}">
                                    @foreach($perms as $permission)
                                    <div class="flex items-center p-2 rounded hover:bg-white dark:hover:bg-darkmode-500 transition-colors {{ in_array($permission->id, $rolePermissions) ? 'bg-success/5 border border-success/10' : '' }}">
                                        <input 
                                            type="checkbox" 
                                            name="permissions[]" 
                                            value="{{ $permission->id }}" 
                                            id="permission_{{ $permission->id }}"
                                            class="permission-checkbox rounded border-slate-300 text-primary focus:ring-primary/20"
                                            {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}
                                            {{ $role->id == 1 ? 'disabled' : '' }}
                                        >
                                        <label 
                                            for="permission_{{ $permission->id }}" 
                                            class="ml-3 text-sm font-medium {{ in_array($permission->id, $rolePermissions) ? 'text-success' : 'text-slate-700 dark:text-slate-300' }} cursor-pointer flex-1"
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
                                <span id="selectedCount">{{ __('global.loading_permissions') }}</span>
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
                                {{ __('global.reset_changes') }}
                            </x-base.button>
                            <x-base.button type="submit" variant="primary" class="flex items-center">
                                <x-base.lucide icon="Save" class="w-4 h-4 mr-2" />
                                {{ __('global.update_role') }}
                            </x-base.button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Role Information Sidebar -->
        <div class="intro-y col-span-12 lg:col-span-4">
            <div class="space-y-6">
                <!-- Role Stats -->
                <div class="box p-5 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-darkmode-600 dark:to-darkmode-700">
                    <h3 class="text-lg font-medium text-slate-800 dark:text-slate-200 mb-4 flex items-center">
                        <x-base.lucide icon="BarChart3" class="w-5 h-5 text-blue-500 mr-2" />
                        {{ __('global.role_statistics') }}
                    </h3>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-slate-600 dark:text-slate-400">{{ __('global.assigned_users') }}</span>
                            <span class="font-medium">{{ $role->users->count() }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-600 dark:text-slate-400">{{ __('global.current_permissions') }}</span>
                            <span class="font-medium">{{ $role->permissions->count() }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-600 dark:text-slate-400">{{ __('global.role_status') }}</span>
                            <span class="px-2 py-1 text-xs rounded-full {{ $role->users->count() > 0 ? 'bg-success/10 text-success border border-success/20' : 'bg-warning/10 text-warning border border-warning/20' }}">
                                {{ $role->users->count() > 0 ? __('global.active') : __('global.inactive') }}
                            </span>
                        </div>
                    </div>
                </div>
                
                <!-- Help Guide -->
                <div class="box p-5 bg-gradient-to-br from-green-50 to-emerald-50 dark:from-darkmode-600 dark:to-darkmode-700">
                    <h3 class="text-lg font-medium text-slate-800 dark:text-slate-200 mb-4 flex items-center">
                        <x-base.lucide icon="HelpCircle" class="w-5 h-5 text-green-500 mr-2" />
                        {{ __('global.editing_guide') }}
                    </h3>
                    
                    <div class="space-y-3 text-sm text-slate-600 dark:text-slate-400">
                        <div class="flex items-start">
                            <x-base.lucide icon="CheckCircle" class="w-4 h-4 text-green-500 mt-0.5 mr-2 flex-shrink-0" />
                            <span>{{ __('global.permissions_can_be_modified') }}</span>
                        </div>
                        
                        @if($role->id == 1)
                        <div class="flex items-start">
                            <x-base.lucide icon="Shield" class="w-4 h-4 text-yellow-500 mt-0.5 mr-2 flex-shrink-0" />
                            <span>{{ __('global.admin_permissions_locked') }}</span>
                        </div>
                        @endif
                        
                        <div class="flex items-start">
                            <x-base.lucide icon="AlertCircle" class="w-4 h-4 text-blue-500 mt-0.5 mr-2 flex-shrink-0" />
                            <span>{{ __('global.changes_take_effect_immediately') }}</span>
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
            @if($role->id != 1)
            document.querySelectorAll('.permission-checkbox:not(:disabled)').forEach(checkbox => {
                checkbox.checked = true;
            });
            updateSelectedCount();
            @else
            alert('{{ __('global.admin_permissions_cannot_be_changed') }}');
            @endif
        }
        
        // Deselect all permissions
        function deselectAllPermissions() {
            @if($role->id != 1)
            document.querySelectorAll('.permission-checkbox:not(:disabled)').forEach(checkbox => {
                checkbox.checked = false;
            });
            updateSelectedCount();
            @else
            alert('{{ __('global.admin_permissions_cannot_be_changed') }}');
            @endif
        }
        
        // Toggle category selection
        function toggleCategory(category) {
            @if($role->id != 1)
            const categoryCheckboxes = document.querySelectorAll(`.permission-category[data-category="${category}"] .permission-checkbox:not(:disabled)`);
            const allChecked = Array.from(categoryCheckboxes).every(cb => cb.checked);
            
            categoryCheckboxes.forEach(checkbox => {
                checkbox.checked = !allChecked;
            });
            
            updateSelectedCount();
            @else
            alert('{{ __('global.admin_permissions_cannot_be_changed') }}');
            @endif
        }
        
        // Initialize event listeners
        document.addEventListener('DOMContentLoaded', function() {
            // Add event listeners to all checkboxes
            document.querySelectorAll('.permission-checkbox:not(:disabled)').forEach(checkbox => {
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
            if (selectedCount === 0 && roleName.toLowerCase() !== 'admin' && {{ $role->id }} !== 1) {
                if (!confirm('{{ __('global.no_permissions_warning_edit') }}')) {
                    e.preventDefault();
                }
            }
        });
    </script>
@endsection
