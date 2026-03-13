@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('access_control.roles.edit') }} - {{ config('app.name') }}</title>
    <style>
        .permission-group {
            transition: all 0.3s ease;
        }
        .permission-group:hover {
            border-color: rgba(var(--color-primary), 0.5);
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        .permission-item {
            transition: all 0.2s ease;
        }
        .permission-item:hover {
            background-color: rgba(var(--color-primary), 0.05);
        }
        .form-check-input:checked + label {
            color: rgb(var(--color-primary));
            font-weight: 700;
        }
        .group-header {
            background: linear-gradient(90deg, rgba(var(--color-primary), 0.1) 0%, transparent 100%);
        }
    </style>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-2xl font-black text-slate-800 dark:text-slate-200 me-auto">
            <span class="text-primary">{{ __('access_control.roles.edit') }}</span>: <span class="text-slate-600">{{ $role->name }}</span>
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0 gap-3">
            <x-base.button variant="outline-secondary" as="a" href="{{ route('roles.index') }}" class="flex items-center px-4 py-2.5 rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
                {{ __('global.back_to_list') }}
            </x-base.button>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-8">
        <div class="intro-y col-span-12">
            <form action="{{ route('roles.update', $role->id) }}" method="POST" id="roleForm">
                @csrf
                @method('PUT')
                <div class="intro-y box p-8 rounded-[2rem] shadow-2xl border-0 overflow-hidden">
                    <!-- Basic Info -->
                    <div class="flex items-center mb-8 pb-6 border-b border-slate-100 dark:border-darkmode-400">
                        <div class="w-14 h-14 rounded-2xl bg-primary/5 flex items-center justify-center text-primary shadow-inner me-5">
                            <x-base.lucide icon="Shield" class="w-7 h-7" />
                        </div>
                        <div>
                            <h3 class="text-xl font-black text-slate-800 dark:text-slate-200 tracking-tight">{{ __('access_control.fields.basic_info') }}</h3>
                            <p class="text-slate-400 font-bold text-xs mt-1 uppercase tracking-widest">{{ __('access_control.fields.role_name_description') }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 lg:col-span-6">
                            <x-base.form-label for="name" class="font-black text-slate-700 dark:text-slate-300 mb-3 block" required>{{ __('access_control.fields.name') }}</x-base.form-label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 start-0 ps-5 flex items-center text-slate-400 group-focus-within:text-primary transition-colors">
                                    <x-base.lucide icon="Tag" class="w-5 h-5" />
                                </div>
                                <x-base.form-input 
                                    id="name" 
                                    name="name" 
                                    type="text" 
                                    value="{{ $role->name }}" 
                                    placeholder="{{ __('access_control.fields.name_placeholder') }}" 
                                    required 
                                    class="ps-14 py-4 rounded-2xl border-slate-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-base font-bold"
                                />
                            </div>
                            @error('name') <div class="text-danger mt-2 text-xs font-bold">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <!-- Permissions Section -->
                    <div class="mt-12">
                        <div class="flex flex-col sm:flex-row items-center mb-8 pb-6 border-b border-slate-100 dark:border-darkmode-400">
                            <div class="flex items-center me-auto">
                                <div class="w-14 h-14 rounded-2xl bg-success/5 flex items-center justify-center text-success shadow-inner me-5">
                                    <x-base.lucide icon="ShieldCheck" class="w-7 h-7" />
                                </div>
                                <div>
                                    <h3 class="text-xl font-black text-slate-800 dark:text-slate-200 tracking-tight">{{ __('access_control.fields.permissions') }}</h3>
                                    <p class="text-slate-400 font-bold text-xs mt-1 uppercase tracking-widest">{{ __('access_control.fields.permissions_description') }}</p>
                                </div>
                            </div>
                            <div class="flex gap-2 mt-4 sm:mt-0">
                                <x-base.button type="button" variant="soft-primary" size="sm" class="rounded-xl font-black px-4" id="selectAll">
                                    <x-base.lucide icon="CheckSquare" class="w-4 h-4 me-2" />
                                    {{ __('global.select_all') }}
                                </x-base.button>
                                <x-base.button type="button" variant="soft-secondary" size="sm" class="rounded-xl font-black px-4" id="deselectAll">
                                    <x-base.lucide icon="Square" class="w-4 h-4 me-2" />
                                    {{ __('global.deselect_all') }}
                                </x-base.button>
                            </div>
                        </div>

                        <div class="grid grid-cols-12 gap-8">
                            @php
                                // Enhanced grouping logic
                                $groupedPermissions = $permissions->groupBy(function($p) {
                                    $name = $p->name;
                                    if (str_contains($name, '_')) {
                                        $parts = explode('_', $name);
                                        if (count($parts) >= 2) {
                                            return $parts[1]; 
                                        }
                                    }
                                    return 'other';
                                });
                            @endphp

                            @foreach($groupedPermissions as $group => $groupPerms)
                                <div class="col-span-12 md:col-span-6 xl:col-span-4">
                                    <div class="permission-group border border-slate-200 dark:border-darkmode-400 rounded-[1.5rem] overflow-hidden bg-white dark:bg-darkmode-600 shadow-sm">
                                        <div class="group-header p-4 border-b border-slate-100 dark:border-darkmode-400 flex items-center">
                                            <div class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center me-3">
                                                <x-base.lucide icon="Folder" class="w-4 h-4" />
                                            </div>
                                            <h4 class="font-black text-slate-700 dark:text-slate-200 capitalize tracking-tight">{{ str_replace('_', ' ', $group) }}</h4>
                                            <div class="ms-auto">
                                                <x-base.form-check.input 
                                                    type="checkbox" 
                                                    class="group-select form-check-input scale-110" 
                                                    data-group="{{ $group }}"
                                                />
                                            </div>
                                        </div>
                                        <div class="p-4 grid grid-cols-1 gap-3">
                                            @foreach($groupPerms as $permission)
                                                <div class="permission-item p-3 rounded-xl border border-transparent hover:border-primary/20 transition-all flex items-center">
                                                    <x-base.form-check.input 
                                                        id="perm-{{ $permission->id }}" 
                                                        type="checkbox" 
                                                        name="permissions[]" 
                                                        value="{{ $permission->id }}" 
                                                        class="form-check-input permission-checkbox"
                                                        data-group="{{ $group }}"
                                                        {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}
                                                    />
                                                    <x-base.form-check.label class="ms-3 text-sm cursor-pointer select-none font-bold text-slate-600 dark:text-slate-400" for="perm-{{ $permission->id }}">
                                                        {{ ucwords(str_replace(['_', $group], [' ', ''], $permission->name)) }}
                                                    </x-base.form-check.label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-12 flex flex-col sm:flex-row justify-end gap-4 border-t border-slate-100 dark:border-darkmode-400 pt-8">
                        <x-base.button variant="outline-secondary" as="a" href="{{ route('roles.index') }}" class="w-full sm:w-40 py-4 rounded-2xl font-black text-base shadow-sm">
                            <x-base.lucide icon="X" class="w-5 h-5 me-2" />
                            {{ __('global.cancel') }}
                        </x-base.button>
                        <x-base.button variant="primary" type="submit" class="w-full sm:w-48 py-4 rounded-2xl font-black text-base shadow-xl shadow-primary/30 transform transition-all hover:scale-[1.02] active:scale-[0.98]">
                            <x-base.lucide icon="Save" class="w-5 h-5 me-2" />
                            {{ __('global.update_role') }}
                        </x-base.button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initial check for group checkboxes
            document.querySelectorAll('.group-select').forEach(groupCb => {
                const group = groupCb.dataset.group;
                const allInGroup = document.querySelectorAll(`.permission-checkbox[data-group="${group}"]`);
                const allChecked = Array.from(allInGroup).every(c => c.checked);
                const someChecked = Array.from(allInGroup).some(c => c.checked);
                
                groupCb.checked = allChecked;
                groupCb.indeterminate = someChecked && !allChecked;
            });

            // Select/Deselect All
            document.getElementById('selectAll').addEventListener('click', function() {
                document.querySelectorAll('.permission-checkbox').forEach(cb => cb.checked = true);
                document.querySelectorAll('.group-select').forEach(cb => {
                    cb.checked = true;
                    cb.indeterminate = false;
                });
            });

            document.getElementById('deselectAll').addEventListener('click', function() {
                document.querySelectorAll('.permission-checkbox').forEach(cb => cb.checked = false);
                document.querySelectorAll('.group-select').forEach(cb => {
                    cb.checked = false;
                    cb.indeterminate = false;
                });
            });

            // Group Selection
            document.querySelectorAll('.group-select').forEach(groupCb => {
                groupCb.addEventListener('change', function() {
                    const group = this.dataset.group;
                    const checked = this.checked;
                    document.querySelectorAll(`.permission-checkbox[data-group="${group}"]`).forEach(cb => {
                        cb.checked = checked;
                    });
                });
            });

            // Individual Checkbox Change
            document.querySelectorAll('.permission-checkbox').forEach(cb => {
                cb.addEventListener('change', function() {
                    const group = this.dataset.group;
                    const groupCb = document.querySelector(`.group-select[data-group="${group}"]`);
                    const allInGroup = document.querySelectorAll(`.permission-checkbox[data-group="${group}"]`);
                    const allChecked = Array.from(allInGroup).every(c => c.checked);
                    const someChecked = Array.from(allInGroup).some(c => c.checked);
                    
                    groupCb.checked = allChecked;
                    groupCb.indeterminate = someChecked && !allChecked;
                });
            });
        });
    </script>
@endsection
