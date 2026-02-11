@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('global.permission_management') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('global.permission_management') }}</h2>
        <div class="w-full sm:w-auto flex flex-wrap gap-2 mt-4 sm:mt-0">
            <x-base.button variant="primary" as="a" href="{{ route('permissions.create') }}" class="flex items-center shadow-md">
                <x-base.lucide icon="Key" class="w-4 h-4 mr-2" />
                {{ __('global.add_new_permission') }}
            </x-base.button>
            
            <div class="dropdown">
                <x-base.button variant="outline-secondary" class="flex items-center">
                    <x-base.lucide icon="Download" class="w-4 h-4 mr-2" />
                    {{ __('global.export') }}
                    <x-base.lucide icon="ChevronDown" class="w-4 h-4 ml-2" />
                </x-base.button>
                <div class="dropdown-menu w-40">
                    <div class="dropdown-content">
                        <a href="{{ route('permissions.export.pdf') }}" class="dropdown-item flex items-center">
                            <x-base.lucide icon="FileText" class="w-4 h-4 mr-2" />
                            {{ __('global.export_pdf') }}
                        </a>
                        <a href="{{ route('permissions.export.excel') }}" class="dropdown-item flex items-center">
                            <x-base.lucide icon="FileSpreadsheet" class="w-4 h-4 mr-2" />
                            {{ __('global.export_excel') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Permission Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-5">
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-primary/20 bg-primary/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                            <x-base.lucide icon="Key" class="w-6 h-6 text-primary" />
                        </div>
                        <div class="ml-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 mr-1" />
                                <span class="text-xs">{{ __('global.total') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">{{ $permissions->count() }}</div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.total_permissions') }}</div>
                </div>
            </div>
        </div>
        
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-info/20 bg-info/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-info/10 flex items-center justify-center">
                            <x-base.lucide icon="Shield" class="w-6 h-6 text-info" />
                        </div>
                        <div class="ml-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 mr-1" />
                                <span class="text-xs">{{ __('global.assigned') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">
                        @php
                            $assignedPermissions = $permissions->filter(function($perm) { 
                                return $perm->roles->count() > 0; 
                            })->count();
                        @endphp
                        {{ $assignedPermissions }}
                    </div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.assigned_permissions') }}</div>
                </div>
            </div>
        </div>
        
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-warning/20 bg-warning/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-warning/10 flex items-center justify-center">
                            <x-base.lucide icon="Users" class="w-6 h-6 text-warning" />
                        </div>
                        <div class="ml-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 mr-1" />
                                <span class="text-xs">{{ __('global.roles') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">
                        @php
                            $uniqueRoles = $permissions->flatMap(function($perm) { 
                                return $perm->roles; 
                            })->unique('id')->count();
                        @endphp
                        {{ $uniqueRoles }}
                    </div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.unique_roles_using_permissions') }}</div>
                </div>
            </div>
        </div>
        
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-success/20 bg-success/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-success/10 flex items-center justify-center">
                            <x-base.lucide icon="Crown" class="w-6 h-6 text-success" />
                        </div>
                        <div class="ml-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 mr-1" />
                                <span class="text-xs">{{ __('global.admin') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">{{ $permissions->count() }}</div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.auto_assigned_to_admin') }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Filter Section -->
        <div class="intro-y col-span-12">
            <div class="box p-5">
                <div class="flex flex-col sm:flex-row gap-4">
                    <div class="flex-1">
                        <x-base.form-input type="text" id="searchInput" placeholder="{{ __('global.search_permissions') }}" class="w-full" />
                    </div>
                    <select id="roleFilter" class="form-select w-full sm:w-40">
                        <option value="">{{ __('global.all_roles') }}</option>
                        @foreach(App\Models\Role::all() as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    <select id="assignmentFilter" class="form-select w-full sm:w-40">
                        <option value="">{{ __('global.all_assignments') }}</option>
                        <option value="assigned">{{ __('global.assigned') }}</option>
                        <option value="unassigned">{{ __('global.unassigned') }}</option>
                    </select>
                    <x-base.button variant="secondary" class="flex items-center" onclick="applyFilters()">
                        <x-base.lucide icon="Filter" class="w-4 h-4 mr-2" />
                        {{ __('global.filter') }}
                    </x-base.button>
                </div>
            </div>
        </div>

        <!-- Grid View -->
        <div class="intro-y col-span-12">
            <div id="permissionsGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($permissions as $permission)
                <div class="intro-y box zoom-in shadow-md border border-slate-200/60 dark:border-darkmode-400" data-role-count="{{ $permission->roles->count() }}" data-assigned="{{ $permission->roles->count() > 0 ? 'true' : 'false' }}">
                    <div class="flex items-start px-5 pt-5 pb-3">
                        <div class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
                            <x-base.lucide icon="Key" class="w-6 h-6 text-primary" />
                        </div>
                        <div class="ml-4 mr-auto">
                            <div class="font-medium text-base">{{ str_replace('_', ' ', $permission->name) }}</div>
                            <div class="text-slate-500 text-xs mt-1">{{ $permission->guard_name }}</div>
                        </div>
                        @if($permission->roles->count() > 0)
                            <div class="w-3 h-3 rounded-full bg-success"></div>
                        @else
                            <div class="w-3 h-3 rounded-full bg-warning"></div>
                        @endif
                    </div>
                    <div class="px-5 py-3 border-t border-slate-200/60 dark:border-darkmode-400">
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <div class="text-sm text-slate-600 dark:text-slate-300">{{ __('global.assigned_to_roles') }}:</div>
                                <span class="font-medium">{{ $permission->roles->count() }}</span>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <div class="text-sm text-slate-600 dark:text-slate-300">{{ __('global.status') }}:</div>
                                @if($permission->roles->count() > 0)
                                    <span class="px-2 py-1 text-xs rounded-full bg-success/10 text-success border border-success/20">
                                        {{ __('global.assigned') }}
                                    </span>
                                @else
                                    <span class="px-2 py-1 text-xs rounded-full bg-warning/10 text-warning border border-warning/20">
                                        {{ __('global.unassigned') }}
                                    </span>
                                @endif
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <div class="text-sm text-slate-600 dark:text-slate-300">{{ __('global.created') }}:</div>
                                <span class="text-xs">{{ $permission->created_at->format('M d, Y') }}</span>
                            </div>
                        </div>
                        
                        @if($permission->roles->count() > 0)
                        <div class="mt-4">
                            <div class="text-xs text-slate-600 dark:text-slate-300 mb-2">{{ __('global.assigned_roles') }}:</div>
                            <div class="flex flex-wrap gap-1">
                                @foreach($permission->roles->take(3) as $role)
                                    <span class="px-2 py-1 text-xs rounded-full {{ $role->id == 1 ? 'bg-yellow-100 text-yellow-800 border border-yellow-200' : 'bg-primary/10 text-primary border border-primary/20' }}">
                                        {{ Str::limit($role->name, 12) }}
                                        @if($role->id == 1)
                                            <x-base.lucide icon="Crown" class="w-3 h-3 ml-1 inline" />
                                        @endif
                                    </span>
                                @endforeach
                                @if($permission->roles->count() > 3)
                                    <span class="px-2 py-1 text-xs rounded-full bg-secondary/10 text-secondary border border-secondary/20">
                                        +{{ $permission->roles->count() - 3 }} {{ __('global.more') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="px-5 py-3 border-t border-slate-200/60 dark:border-darkmode-400 flex justify-between items-center">
                        <div class="text-xs text-slate-500 truncate max-w-[120px]">
                            ID: {{ $permission->id }} | {{ Str::limit($permission->name, 20) }}
                        </div>
                        <div class="flex gap-1">
                            <x-base.button variant="outline-secondary" as="a" href="{{ route('permissions.show', $permission->id) }}" size="sm" class="px-2 py-1">
                                <x-base.lucide icon="Eye" class="w-3 h-3" />
                            </x-base.button>
                            
                            <x-base.button variant="outline-primary" as="a" href="{{ route('permissions.edit', $permission->id) }}" size="sm" class="px-2 py-1">
                                <x-base.lucide icon="Pencil" class="w-3 h-3" />
                            </x-base.button>
                            
                            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('{{ __('global.confirm_delete_permission') }}')" class="inline">
                                @csrf
                                @method('DELETE')
                                <x-base.button variant="outline-danger" type="submit" size="sm" class="px-2 py-1">
                                    <x-base.lucide icon="Trash2" class="w-3 h-3" />
                                </x-base.button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full">
                    <div class="box p-10 text-center">
                        <x-base.lucide icon="Key" class="w-16 h-16 text-slate-400 mx-auto mb-5" />
                        <h3 class="text-xl font-medium text-slate-800 dark:text-slate-200 mb-2">{{ __('global.no_permissions_found') }}</h3>
                        <p class="text-slate-600 dark:text-slate-400 mb-6">{{ __('global.start_by_adding_permission') }}</p>
                        <x-base.button variant="primary" as="a" href="{{ route('permissions.create') }}" class="flex items-center mx-auto">
                            <x-base.lucide icon="Key" class="w-4 h-4 mr-2" />
                            {{ __('global.add_first_permission') }}
                        </x-base.button>
                    </div>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            {{ $permissions->links() }}
        </div>

        <!-- Detailed Statistics -->
        @if($permissions->count() > 0)
        <div class="intro-y col-span-12 grid grid-cols-1 md:grid-cols-4 gap-6 mt-6">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-primary/20 bg-primary/5">
                    <div class="flex items-center">
                        <x-base.lucide icon="Database" class="w-8 h-8 text-primary" />
                        <div class="ml-auto">
                            <div class="report-box__indicator bg-success"> 
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4" /> 
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">{{ $permissions->count() }}</div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.total_records') }}</div>
                </div>
            </div>
            
            <div class="report-box zoom-in">
                <div class="box p-5 border border-info/20 bg-info/5">
                    <div class="flex items-center">
                        <x-base.lucide icon="Activity" class="w-8 h-8 text-info" />
                        <div class="ml-auto">
                            <div class="report-box__indicator bg-success"> 
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4" /> 
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">
                        @php
                            $recentCount = $permissions->filter(function($item) {
                                return $item->created_at >= \Carbon\Carbon::now()->subDays(7);
                            })->count();
                        @endphp
                        {{ $recentCount }}
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.added_this_week') }}</div>
                </div>
            </div>
            
            <div class="report-box zoom-in">
                <div class="box p-5 border border-warning/20 bg-warning/5">
                    <div class="flex items-center">
                        <x-base.lucide icon="Calendar" class="w-8 h-8 text-warning" />
                        <div class="ml-auto">
                            <div class="report-box__indicator bg-success"> 
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4" /> 
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">
                        @php
                            $avgRoles = $permissions->count() > 0 ? round($permissions->avg(function($p) { return $p->roles->count(); }), 1) : 0;
                        @endphp
                        {{ $avgRoles }}
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.avg_roles_per_permission') }}</div>
                </div>
            </div>
            
            <div class="report-box zoom-in">
                <div class="box p-5 border border-success/20 bg-success/5">
                    <div class="flex items-center">
                        <x-base.lucide icon="ShieldCheck" class="w-8 h-8 text-success" />
                        <div class="ml-auto">
                            <div class="report-box__indicator bg-success"> 
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4" /> 
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">100%</div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.admin_auto_assignment') }}</div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- JavaScript for Filtering -->
    <script>
        function applyFilters() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const roleFilter = document.getElementById('roleFilter').value;
            const assignmentFilter = document.getElementById('assignmentFilter').value;
            
            const cards = document.querySelectorAll('#permissionsGrid > div');
            
            cards.forEach(card => {
                const permissionName = card.querySelector('.font-medium.text-base').textContent.toLowerCase();
                const roleCount = parseInt(card.getAttribute('data-role-count'));
                const isAssigned = card.getAttribute('data-assigned') === 'true';
                
                const matchesSearch = permissionName.includes(searchTerm);
                
                let matchesRole = true;
                if (roleFilter) {
                    // This would need to check if the permission is assigned to the specific role
                    // For now, we'll implement a simpler version
                    matchesRole = true; // Placeholder
                }
                
                let matchesAssignment = true;
                if (assignmentFilter === 'assigned') {
                    matchesAssignment = isAssigned;
                } else if (assignmentFilter === 'unassigned') {
                    matchesAssignment = !isAssigned;
                }
                
                if (matchesSearch && matchesRole && matchesAssignment) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
        
        // Live search
        document.getElementById('searchInput').addEventListener('input', applyFilters);
        document.getElementById('roleFilter').addEventListener('change', applyFilters);
        document.getElementById('assignmentFilter').addEventListener('change', applyFilters);
    </script>
@endsection
