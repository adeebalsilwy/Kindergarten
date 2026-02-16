@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('global.edit_permission') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('global.edit_permission') }}: {{ str_replace('_', ' ', $permission->name) }}</h2>
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
                <form action="{{ route('permissions.update', $permission->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
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
                                    value="{{ old('name', $permission->name) }}" 
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
                                <select name="guard_name" class="form-select mt-2" disabled>
                                    <option value="web" {{ $permission->guard_name == 'web' ? 'selected' : '' }}>web</option>
                                    <option value="api" {{ $permission->guard_name == 'api' ? 'selected' : '' }}>api</option>
                                </select>
                                <div class="text-slate-500 text-xs mt-1">{{ __('global.guard_name_cannot_be_changed') }}</div>
                            </div>
                        </div>
                        
                        <div class="mt-4 p-3 bg-info/10 border border-info/20 rounded-lg">
                            <div class="flex items-center text-info">
                                <x-base.lucide icon="Info" class="w-5 h-5 me-2" />
                                <span class="text-sm">{{ __('global.permission_id') }}: {{ $permission->id }} | {{ __('global.created') }}: {{ $permission->created_at->format('M d, Y') }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Preview and Current Status -->
                    <div class="border-b border-slate-200/60 dark:border-darkmode-400 pb-6 mb-6">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 rounded-full bg-success/10 flex items-center justify-center me-3">
                                <x-base.lucide icon="Eye" class="w-5 h-5 text-success" />
                            </div>
                            <h3 class="text-lg font-medium">{{ __('global.current_status') }}</h3>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="p-4 bg-slate-50 dark:bg-darkmode-600 rounded-lg">
                                <div class="text-center">
                                    <div class="text-sm text-slate-600 dark:text-slate-400 mb-2">{{ __('global.current_display_name') }}</div>
                                    <div class="text-lg font-medium text-slate-800 dark:text-slate-200">
                                        {{ str_replace('_', ' ', $permission->name) }}
                                    </div>
                                </div>
                            </div>
                            
                            <div class="p-4 bg-slate-50 dark:bg-darkmode-600 rounded-lg">
                                <div class="text-center">
                                    <div class="text-sm text-slate-600 dark:text-slate-400 mb-2">{{ __('global.updated_preview') }}</div>
                                    <div id="permissionPreview" class="text-lg font-medium text-slate-800 dark:text-slate-200">
                                        {{ old('name', $permission->name) ? str_replace('_', ' ', old('name', $permission->name)) : __('global.enter_name_to_preview') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Assignment Information -->
                    <div class="border-b border-slate-200/60 dark:border-darkmode-400 pb-6 mb-6">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 rounded-full bg-info/10 flex items-center justify-center me-3">
                                <x-base.lucide icon="ShieldCheck" class="w-5 h-5 text-info" />
                            </div>
                            <h3 class="text-lg font-medium">{{ __('global.assignment_information') }}</h3>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="p-4 bg-primary/5 border border-primary/20 rounded-lg">
                                <h4 class="font-medium text-primary mb-2 flex items-center">
                                    <x-base.lucide icon="Users" class="w-4 h-4 me-2" />
                                    {{ __('global.assigned_roles') }}
                                </h4>
                                <div class="text-2xl font-bold">{{ $permission->roles->count() }}</div>
                                <div class="text-sm text-slate-600 mt-1">{{ __('global.roles_using_this_permission') }}</div>
                            </div>
                            
                            <div class="p-4 bg-success/5 border border-success/20 rounded-lg">
                                <h4 class="font-medium text-success mb-2 flex items-center">
                                    <x-base.lucide icon="Crown" class="w-4 h-4 me-2" />
                                    {{ __('global.admin_assignment') }}
                                </h4>
                                <div class="flex items-center">
                                    @if($permission->roles->contains('id', 1))
                                        <x-base.lucide icon="CheckCircle" class="w-5 h-5 text-success me-2" />
                                        <span class="font-medium">{{ __('global.assigned_to_admin') }}</span>
                                    @else
                                        <x-base.lucide icon="AlertCircle" class="w-5 h-5 text-warning me-2" />
                                        <span class="font-medium">{{ __('global.not_assigned_to_admin') }}</span>
                                    @endif
                                </div>
                                <div class="text-sm text-slate-600 mt-1">{{ __('global.admin_role_status') }}</div>
                            </div>
                        </div>
                        
                        @if($permission->roles->count() > 0)
                        <div class="mt-4">
                            <h4 class="font-medium text-slate-800 dark:text-slate-200 mb-2">{{ __('global.assigned_to_roles') }}:</h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach($permission->roles as $role)
                                    <span class="px-3 py-1 text-sm rounded-full {{ $role->id == 1 ? 'bg-yellow-100 text-yellow-800 border border-yellow-200' : 'bg-primary/10 text-primary border border-primary/20' }}">
                                        {{ $role->name }}
                                        @if($role->id == 1)
                                            <x-base.lucide icon="Crown" class="w-3 h-3 ms-1 inline" />
                                        @endif
                                    </span>
                                @endforeach
                            </div>
                        </div>
                        @endif
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
                                {{ __('global.reset_changes') }}
                            </x-base.button>
                            <x-base.button type="submit" variant="primary" class="flex items-center">
                                <x-base.lucide icon="Save" class="w-4 h-4 me-2" />
                                {{ __('global.update_permission') }}
                            </x-base.button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Permission Information Sidebar -->
        <div class="intro-y col-span-12 lg:col-span-4">
            <div class="space-y-6">
                <!-- Usage Statistics -->
                <div class="box p-5 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-darkmode-600 dark:to-darkmode-700">
                    <h3 class="text-lg font-medium text-slate-800 dark:text-slate-200 mb-4 flex items-center">
                        <x-base.lucide icon="BarChart3" class="w-5 h-5 text-blue-500 me-2" />
                        {{ __('global.usage_statistics') }}
                    </h3>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-slate-600 dark:text-slate-400">{{ __('global.total_assignments') }}</span>
                            <span class="font-medium">{{ $permission->roles->count() }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-600 dark:text-slate-400">{{ __('global.users_with_access') }}</span>
                            <span class="font-medium">{{ $permission->roles->sum('users_count') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-600 dark:text-slate-400">{{ __('global.last_modified') }}</span>
                            <span class="text-sm">{{ $permission->updated_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>
                
                <!-- Editing Guidelines -->
                <div class="box p-5 bg-gradient-to-br from-green-50 to-emerald-50 dark:from-darkmode-600 dark:to-darkmode-700">
                    <h3 class="text-lg font-medium text-slate-800 dark:text-slate-200 mb-4 flex items-center">
                        <x-base.lucide icon="HelpCircle" class="w-5 h-5 text-green-500 me-2" />
                        {{ __('global.editing_guidelines') }}
                    </h3>
                    
                    <div class="space-y-3 text-sm text-slate-600 dark:text-slate-400">
                        <div class="flex items-start">
                            <x-base.lucide icon="AlertTriangle" class="w-4 h-4 text-yellow-500 mt-0.5 me-2 flex-shrink-0" />
                            <span>{{ __('global.name_changes_affect_all_roles') }}</span>
                        </div>
                        
                        <div class="flex items-start">
                            <x-base.lucide icon="Lock" class="w-4 h-4 text-red-500 mt-0.5 me-2 flex-shrink-0" />
                            <span>{{ __('global.guard_name_cannot_be_modified') }}</span>
                        </div>
                        
                        <div class="flex items-start">
                            <x-base.lucide icon="Info" class="w-4 h-4 text-blue-500 mt-0.5 me-2 flex-shrink-0" />
                            <span>{{ __('global.changes_take_effect_immediately') }}</span>
                        </div>
                    </div>
                </div>
                
                <!-- Danger Zone -->
                @if($permission->roles->count() > 0)
                <div class="box p-5 bg-gradient-to-br from-red-50 to-rose-50 dark:from-darkmode-600 dark:to-darkmode-700 border border-red-200 dark:border-red-800">
                    <h3 class="text-lg font-medium text-red-800 dark:text-red-200 mb-3 flex items-center">
                        <x-base.lucide icon="AlertTriangle" class="w-5 h-5 text-red-500 me-2" />
                        {{ __('global.caution_zone') }}
                    </h3>
                    
                    <p class="text-sm text-red-700 dark:text-red-300 mb-3">
                        {{ __('global.modifying_used_permission_warning') }}
                    </p>
                    
                    <div class="text-xs text-red-600 dark:text-red-400 bg-red-100 dark:bg-red-900/20 p-2 rounded">
                        {{ __('global.affects_roles_count', ['count' => $permission->roles->count()]) }}
                    </div>
                </div>
                @endif
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
            
            // Warn about name changes affecting roles
            @if($permission->roles->count() > 0)
            if (name !== '{{ $permission->name }}') {
                if (!confirm('{{ __('global.name_change_warning', ['count' => $permission->roles->count()]) }}')) {
                    e.preventDefault();
                    return;
                }
            }
            @endif
        });
    </script>
@endsection
