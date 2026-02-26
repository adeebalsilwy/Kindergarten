@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('global.role_management') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('global.role_management') }}</h2>
        <div class="w-full sm:w-auto flex flex-wrap gap-2 mt-4 sm:mt-0">
            <x-base.button variant="primary" as="a" href="{{ route('roles.create') }}" class="flex items-center shadow-md">
                <x-base.lucide icon="ShieldPlus" class="w-4 h-4 me-2" />
                {{ __('global.add_new_role') }}
            </x-base.button>
            
            <div class="dropdown">
                <x-base.button variant="outline-secondary" class="flex items-center">
                    <x-base.lucide icon="Download" class="w-4 h-4 me-2" />
                    {{ __('global.export') }}
                    <x-base.lucide icon="ChevronDown" class="w-4 h-4 ms-2" />
                </x-base.button>
                <div class="dropdown-menu w-40">
                    <div class="dropdown-content">
                        <a href="{{ route('roles.export.pdf') }}" class="dropdown-item flex items-center">
                            <x-base.lucide icon="FileText" class="w-4 h-4 me-2" />
                            {{ __('global.export_pdf') }}
                        </a>
                        <a href="{{ route('roles.export.excel') }}" class="dropdown-item flex items-center">
                            <x-base.lucide icon="FileSpreadsheet" class="w-4 h-4 me-2" />
                            {{ __('global.export_excel') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Role Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-5">
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-primary/20 bg-primary/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                            <x-base.lucide icon="Shield" class="w-6 h-6 text-primary" />
                        </div>
                        <div class="ms-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                                <span class="text-xs">{{ __('global.total') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">{{ $roles->count() }}</div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.total_roles') }}</div>
                </div>
            </div>
        </div>
        
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-info/20 bg-info/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-info/10 flex items-center justify-center">
                            <x-base.lucide icon="Users" class="w-6 h-6 text-info" />
                        </div>
                        <div class="ms-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                                <span class="text-xs">{{ __('global.assigned') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">
                        @php
                            $assignedRoles = $roles->filter(function($role) { 
                                return $role->users->count() > 0; 
                            })->count();
                        @endphp
                        {{ $assignedRoles }}
                    </div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.roles_with_users') }}</div>
                </div>
            </div>
        </div>
        
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-warning/20 bg-warning/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-warning/10 flex items-center justify-center">
                            <x-base.lucide icon="Key" class="w-6 h-6 text-warning" />
                        </div>
                        <div class="ms-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                                <span class="text-xs">{{ __('global.permissions') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">
                        @php
                            $totalPermissions = $roles->sum(function($role) { 
                                return $role->permissions->count(); 
                            });
                        @endphp
                        {{ $totalPermissions }}
                    </div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.total_permissions') }}</div>
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
                        <div class="ms-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                                <span class="text-xs">{{ __('global.admin') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">1</div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.administrator_role') }}</div>
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
                        <x-base.form-input type="text" id="searchInput" placeholder="{{ __('global.search_roles') }}" class="w-full" />
                    </div>
                    <select id="permissionFilter" class="form-select w-full sm:w-40">
                        <option value="">{{ __('global.all_permissions') }}</option>
                        <option value="0-10">0-10 {{ __('global.permissions') }}</option>
                        <option value="11-20">11-20 {{ __('global.permissions') }}</option>
                        <option value="21+">21+ {{ __('global.permissions') }}</option>
                    </select>
                    <select id="userFilter" class="form-select w-full sm:w-40">
                        <option value="">{{ __('global.all_user_counts') }}</option>
                        <option value="0">{{ __('global.no_users') }}</option>
                        <option value="1-5">1-5 {{ __('global.users') }}</option>
                        <option value="6+">6+ {{ __('global.users') }}</option>
                    </select>
                    <x-base.button variant="secondary" class="flex items-center" onclick="applyFilters()">
                        <x-base.lucide icon="Filter" class="w-4 h-4 me-2" />
                        {{ __('global.filter') }}
                    </x-base.button>
                </div>
            </div>
        </div>

        <!-- Grid View -->
        <div class="intro-y col-span-12">
            <div id="rolesGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($roles as $role)
                <div class="intro-y box zoom-in shadow-md border border-slate-200/60 dark:border-darkmode-400" data-permissions="{{ $role->permissions->count() }}" data-users="{{ $role->users->count() }}">
                    <div class="flex items-start px-5 pt-5 pb-3">
                        <div class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
                            @if($role->id == 1)
                                <x-base.lucide icon="Crown" class="w-6 h-6 text-yellow-500" />
                            @else
                                <x-base.lucide icon="Shield" class="w-6 h-6 text-primary" />
                            @endif
                        </div>
                        <div class="ms-4 me-auto">
                            <div class="font-medium text-base">{{ $role->name }}</div>
                            <div class="text-slate-500 text-xs mt-1">{{ $role->guard_name }}</div>
                        </div>
                        @if($role->id == 1)
                            <div class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800 border border-yellow-200">
                                {{ __('global.admin') }}
                            </div>
                        @endif
                    </div>
                    <div class="px-5 py-3 border-t border-slate-200/60 dark:border-darkmode-400">
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <div class="text-sm text-slate-600 dark:text-slate-300">{{ __('global.permissions') }}:</div>
                                <div class="flex items-center">
                                    <span class="font-medium">{{ $role->permissions->count() }}</span>
                                    @if($role->id == 1)
                                        <span class="ms-2 text-xs text-yellow-600">({{ __('global.all') }})</span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <div class="text-sm text-slate-600 dark:text-slate-300">{{ __('global.users_assigned') }}:</div>
                                <span class="font-medium">{{ $role->users->count() }}</span>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <div class="text-sm text-slate-600 dark:text-slate-300">{{ __('global.created') }}:</div>
                                <span class="text-xs">{{ $role->created_at->format('M d, Y') }}</span>
                            </div>
                        </div>
                        
                        @if($role->permissions->count() > 0 && $role->id != 1)
                        <div class="mt-4">
                            <div class="text-xs text-slate-600 dark:text-slate-300 mb-2">{{ __('global.top_permissions') }}:</div>
                            <div class="flex flex-wrap gap-1">
                                @foreach($role->permissions->take(3) as $permission)
                                    <span class="px-2 py-1 text-xs rounded-full bg-primary/10 text-primary border border-primary/20">
                                        {{ Str::limit(str_replace('_', ' ', $permission->name), 15) }}
                                    </span>
                                @endforeach
                                @if($role->permissions->count() > 3)
                                    <span class="px-2 py-1 text-xs rounded-full bg-secondary/10 text-secondary border border-secondary/20">
                                        +{{ $role->permissions->count() - 3 }} {{ __('global.more') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        @elseif($role->id == 1)
                        <div class="mt-4">
                            <div class="px-3 py-2 bg-yellow-50 border border-yellow-200 rounded-lg">
                                <div class="flex items-center text-yellow-800">
                                    <x-base.lucide icon="Lock" class="w-4 h-4 me-2" />
                                    <span class="text-xs font-medium">{{ __('global.admin_has_all_permissions') }}</span>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="px-5 py-3 border-t border-slate-200/60 dark:border-darkmode-400 flex justify-between items-center">
                        <div class="text-xs text-slate-500">
                            {{ __('global.id') }}: {{ $role->id }}
                        </div>
                        <div class="flex gap-1">
                            <x-base.button variant="outline-secondary" as="a" href="{{ route('roles.show', $role->id) }}" size="sm" class="px-2 py-1">
                                <x-base.lucide icon="Eye" class="w-3 h-3" />
                            </x-base.button>
                            
                            @if($role->id != 1)
                            <x-base.button variant="outline-primary" as="a" href="{{ route('roles.edit', $role->id) }}" size="sm" class="px-2 py-1">
                                <x-base.lucide icon="Pencil" class="w-3 h-3" />
                            </x-base.button>
                            
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('{{ __('global.confirm_delete_role') }}')" class="inline">
                                @csrf
                                @method('DELETE')
                                <x-base.button variant="outline-danger" type="submit" size="sm" class="px-2 py-1">
                                    <x-base.lucide icon="Trash2" class="w-3 h-3" />
                                </x-base.button>
                            </form>
                            @else
                            <div class="px-2 py-1 text-xs text-yellow-600 bg-yellow-50 rounded border border-yellow-200">
                                {{ __('global.protected') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full">
                    <div class="box p-10 text-center">
                        <x-base.lucide icon="Shield" class="w-16 h-16 text-slate-400 mx-auto mb-5" />
                        <h3 class="text-xl font-medium text-slate-800 dark:text-slate-200 mb-2">{{ __('global.no_roles_found') }}</h3>
                        <p class="text-slate-600 dark:text-slate-400 mb-6">{{ __('global.start_by_adding_role') }}</p>
                        <x-base.button variant="primary" as="a" href="{{ route('roles.create') }}" class="flex items-center mx-auto">
                            <x-base.lucide icon="ShieldPlus" class="w-4 h-4 me-2" />
                            {{ __('global.add_first_role') }}
                        </x-base.button>
                    </div>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            {{ $roles->links() }}
        </div>

        <!-- Detailed Statistics -->
        @if($roles->count() > 0)
        <div class="intro-y col-span-12 grid grid-cols-1 md:grid-cols-4 gap-6 mt-6">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-primary/20 bg-primary/5">
                    <div class="flex items-center">
                        <x-base.lucide icon="Database" class="w-8 h-8 text-primary" />
                        <div class="ms-auto">
                            <div class="report-box__indicator bg-success"> 
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4" /> 
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">{{ $roles->count() }}</div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.total_records') }}</div>
                </div>
            </div>
            
            <div class="report-box zoom-in">
                <div class="box p-5 border border-info/20 bg-info/5">
                    <div class="flex items-center">
                        <x-base.lucide icon="Activity" class="w-8 h-8 text-info" />
                        <div class="ms-auto">
                            <div class="report-box__indicator bg-success"> 
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4" /> 
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">
                        @php
                            $recentCount = $roles->filter(function($item) {
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
                        <div class="ms-auto">
                            <div class="report-box__indicator bg-success"> 
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4" /> 
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">
                        @php
                            $avgPermissions = $roles->count() > 0 ? round($roles->avg(function($r) { return $r->permissions->count(); }), 1) : 0;
                        @endphp
                        {{ $avgPermissions }}
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.avg_permissions_per_role') }}</div>
                </div>
            </div>
            
            <div class="report-box zoom-in">
                <div class="box p-5 border border-success/20 bg-success/5">
                    <div class="flex items-center">
                        <x-base.lucide icon="Users" class="w-8 h-8 text-success" />
                        <div class="ms-auto">
                            <div class="report-box__indicator bg-success"> 
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4" /> 
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">
                        @php
                            $totalUsers = $roles->sum(function($r) { return $r->users->count(); });
                        @endphp
                        {{ $totalUsers }}
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.total_users_assigned') }}</div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- JavaScript for Filtering -->
    <script>
        function applyFilters() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const permissionFilter = document.getElementById('permissionFilter').value;
            const userFilter = document.getElementById('userFilter').value;
            
            const cards = document.querySelectorAll('#rolesGrid > div');
            
            cards.forEach(card => {
                const roleName = card.querySelector('.font-medium.text-base').textContent.toLowerCase();
                const permissionCount = parseInt(card.getAttribute('data-permissions'));
                const userCount = parseInt(card.getAttribute('data-users'));
                
                const matchesSearch = roleName.includes(searchTerm);
                
                let matchesPermissions = true;
                if (permissionFilter) {
                    if (permissionFilter === '0-10') {
                        matchesPermissions = permissionCount >= 0 && permissionCount <= 10;
                    } else if (permissionFilter === '11-20') {
                        matchesPermissions = permissionCount >= 11 && permissionCount <= 20;
                    } else if (permissionFilter === '21+') {
                        matchesPermissions = permissionCount >= 21;
                    }
                }
                
                let matchesUsers = true;
                if (userFilter) {
                    if (userFilter === '0') {
                        matchesUsers = userCount === 0;
                    } else if (userFilter === '1-5') {
                        matchesUsers = userCount >= 1 && userCount <= 5;
                    } else if (userFilter === '6+') {
                        matchesUsers = userCount >= 6;
                    }
                }
                
                if (matchesSearch && matchesPermissions && matchesUsers) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
        
        // Live search
        document.getElementById('searchInput').addEventListener('input', applyFilters);
        document.getElementById('permissionFilter').addEventListener('change', applyFilters);
        document.getElementById('userFilter').addEventListener('change', applyFilters);
    </script>
@endsection
