@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('User.list') }} - Laravel</title>
@endsection

@section('subcontent')
    <!-- Header Section -->
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('User.list') }}</h2>
        <div class="w-full sm:w-auto flex flex-wrap gap-2 mt-4 sm:mt-0">
            @can('create_users')
            <x-base.button variant="primary" as="a" href="{{ route('users.create') }}" class="flex items-center shadow-md">
                <x-base.lucide icon="UserPlus" class="w-4 h-4 me-2" />
                {{ __('User.add_new') }}
            </x-base.button>
            @endcan

            @can('export_users')
            <div class="dropdown">
                <x-base.button variant="outline-secondary" class="flex items-center">
                    <x-base.lucide icon="Download" class="w-4 h-4 me-2" />
                    {{ __('global.export') }}
                    <x-base.lucide icon="ChevronDown" class="w-4 h-4 ms-2" />
                </x-base.button>
                <div class="dropdown-menu w-40">
                    <div class="dropdown-content">
                        <a href="{{ route('users.export.pdf') }}{{ request()->getQueryString() ? '?' . request()->getQueryString() : '' }}" class="dropdown-item flex items-center">
                            <x-base.lucide icon="FileText" class="w-4 h-4 me-2" />
                            {{ __('global.export_pdf') }}
                        </a>
                        <a href="{{ route('users.export.excel') }}{{ request()->getQueryString() ? '?' . request()->getQueryString() : '' }}" class="dropdown-item flex items-center">
                            <x-base.lucide icon="FileSpreadsheet" class="w-4 h-4 me-2" />
                            {{ __('global.export_excel') }}
                        </a>
                    </div>
                </div>
            </div>
            @endcan
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-5">
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-primary/20 bg-primary/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                            <x-base.lucide icon="Users" class="w-6 h-6 text-primary" />
                        </div>
                        <div class="ms-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                                <span class="text-xs">{{ __('global.total') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">{{ $users->total() }}</div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.total_users') }}</div>
                </div>
            </div>
        </div>

        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-info/20 bg-info/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-info/10 flex items-center justify-center">
                            <x-base.lucide icon="ShieldCheck" class="w-6 h-6 text-info" />
                        </div>
                        <div class="ms-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                                <span class="text-xs">{{ __('global.active') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">
                        @php
                            $activeUsers = $users->filter(function($user) {
                                return $user->is_active;
                            })->count();
                        @endphp
                        {{ $activeUsers }}
                    </div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.active_users') }}</div>
                </div>
            </div>
        </div>

        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-warning/20 bg-warning/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-warning/10 flex items-center justify-center">
                            <x-base.lucide icon="UserCheck" class="w-6 h-6 text-warning" />
                        </div>
                        <div class="ms-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                                <span class="text-xs">{{ __('global.verified') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">
                        @php
                            $verifiedUsers = $users->filter(function($user) {
                                return $user->email_verified_at !== null;
                            })->count();
                        @endphp
                        {{ $verifiedUsers }}
                    </div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.verified_users') }}</div>
                </div>
            </div>
        </div>

        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-success/20 bg-success/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-success/10 flex items-center justify-center">
                            <x-base.lucide icon="Shield" class="w-6 h-6 text-success" />
                        </div>
                        <div class="ms-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                                <span class="text-xs">{{ __('global.administrators') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">
                        @php
                            $adminUsers = $users->filter(function($user) {
                                return $user->hasRole('Administrator');
                            })->count();
                        @endphp
                        {{ $adminUsers }}
                    </div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.admin_users') }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Filter Section -->
        <div class="intro-y col-span-12">
            <div class="box p-5">
                <form method="GET" action="{{ route('users.index') }}">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6 gap-4">
                        <div>
                            <x-base.form-label>{{ __('global.search') }}</x-base.form-label>
                            <x-base.form-input name="search" value="{{ request('search') }}" placeholder="{{ __('global.search_users') }}" />
                        </div>
                        <div>
                            <x-base.form-label>{{ __('users.fields.status') }}</x-base.form-label>
                            <x-base.tom-select name="is_active" class="w-full">
                                <option value="" {{ request('is_active') === null || request('is_active') === '' ? 'selected' : '' }}>{{ __('global.all_statuses') }}</option>
                                <option value="1" {{ request('is_active') == '1' ? 'selected' : '' }}>{{ __('global.active') }}</option>
                                <option value="0" {{ request('is_active') == '0' ? 'selected' : '' }}>{{ __('global.inactive') }}</option>
                            </x-base.tom-select>
                        </div>
                        <div>
                            <x-base.form-label>{{ __('global.verification_status') }}</x-base.form-label>
                            <x-base.tom-select name="verified" class="w-full">
                                <option value="" {{ request('verified') === null || request('verified') === '' ? 'selected' : '' }}>{{ __('global.all_verification') }}</option>
                                <option value="1" {{ request('verified') == '1' ? 'selected' : '' }}>{{ __('global.verified') }}</option>
                                <option value="0" {{ request('verified') == '0' ? 'selected' : '' }}>{{ __('global.unverified') }}</option>
                            </x-base.tom-select>
                        </div>
                        <div>
                            <x-base.form-label>{{ __('global.role') }}</x-base.form-label>
                            <x-base.tom-select name="role" class="w-full">
                                <option value="" {{ request('role') === null || request('role') === '' ? 'selected' : '' }}>{{ __('global.all_roles') }}</option>
                                @foreach(Spatie\Permission\Models\Role::all() as $role)
                                    <option value="{{ $role->name }}" {{ request('role') == $role->name ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </x-base.tom-select>
                        </div>
                        <div>
                            <x-base.form-label>{{ __('global.last_activity') }}</x-base.form-label>
                            <x-base.tom-select name="activity" class="w-full">
                                <option value="" {{ request('activity') === null || request('activity') === '' ? 'selected' : '' }}>{{ __('global.all_activity') }}</option>
                                <option value="today" {{ request('activity') == 'today' ? 'selected' : '' }}>{{ __('global.today') }}</option>
                                <option value="week" {{ request('activity') == 'week' ? 'selected' : '' }}>{{ __('global.this_week') }}</option>
                                <option value="month" {{ request('activity') == 'month' ? 'selected' : '' }}>{{ __('global.this_month') }}</option>
                                <option value="inactive" {{ request('activity') == 'inactive' ? 'selected' : '' }}>{{ __('global.inactive_users') }}</option>
                            </x-base.tom-select>
                        </div>
                        <div class="flex items-end">
                            <x-base.button type="submit" variant="primary" class="w-full">
                                <x-base.lucide icon="Filter" class="w-4 h-4 me-2" />
                                {{ __('global.filter') }}
                            </x-base.button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Grid View -->
        <div class="intro-y col-span-12">
            <div id="usersGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($users as $user)
                <div class="intro-y box zoom-in shadow-md border border-slate-200/60 dark:border-darkmode-400" data-role="{{ $user->roles->first() ? $user->roles->first()->name : '' }}" data-verified="{{ $user->email_verified_at ? 'true' : 'false' }}" data-active="{{ $user->is_active ? 'true' : 'false' }}">
                    <div class="flex items-start px-5 pt-5 pb-3">
                        <div class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
                            <x-base.lucide icon="User" class="w-6 h-6 text-primary" />
                        </div>
                        <div class="ms-4 me-auto">
                            <div class="font-medium text-base">{{ $user->name ?? '-' }}</div>
                            <div class="text-slate-500 text-xs mt-1">{{ $user->email ?? '' }}</div>
                        </div>
                        <div class="flex flex-col items-end">
                            @if($user->is_active)
                                <div class="w-3 h-3 rounded-full bg-success mb-1"></div>
                                <span class="text-xs text-success">{{ __('global.active') }}</span>
                            @else
                                <div class="w-3 h-3 rounded-full bg-danger mb-1"></div>
                                <span class="text-xs text-danger">{{ __('global.inactive') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="px-5 py-3 border-t border-slate-200/60 dark:border-darkmode-400">
                        <div class="space-y-2">
                            <div class="flex justify-between text-xs">
                                <span class="text-slate-600 dark:text-slate-300">{{ __('global.role') }}:</span>
                                <span class="font-medium">
                                    @if($user->roles->count() > 0)
                                        <span class="px-2 py-1 text-xs rounded-full {{ $user->hasRole('Administrator') ? 'bg-yellow-100 text-yellow-800 border border-yellow-200' : 'bg-primary/10 text-primary border border-primary/20' }}">
                                            {{ $user->roles->first()->name }}
                                            @if($user->hasRole('Administrator'))
                                                <x-base.lucide icon="Crown" class="w-3 h-3 ms-1 inline" />
                                            @endif
                                        </span>
                                    @else
                                        <span class="px-2 py-1 text-xs rounded-full bg-warning/10 text-warning border border-warning/20">
                                            {{ __('global.no_role') }}
                                        </span>
                                    @endif
                                </span>
                            </div>

                            <div class="flex justify-between text-xs">
                                <span class="text-slate-600 dark:text-slate-300">{{ __('global.verification') }}:</span>
                                @if($user->email_verified_at)
                                    <span class="px-2 py-1 text-xs rounded-full bg-success/10 text-success border border-success/20">
                                        {{ __('global.verified') }}
                                    </span>
                                @else
                                    <span class="px-2 py-1 text-xs rounded-full bg-warning/10 text-warning border border-warning/20">
                                        {{ __('global.pending') }}
                                    </span>
                                @endif
                            </div>

                            <div class="flex justify-between text-xs">
                                <span class="text-slate-600 dark:text-slate-300">{{ __('global.last_login') }}:</span>
                                <span class="font-medium">{{ $user->last_activity ? date('M d, Y H:i', $user->last_activity) : 'Never' }}</span>
                            </div>

                            <div class="flex justify-between text-xs">
                                <span class="text-slate-600 dark:text-slate-300">{{ __('global.created') }}:</span>
                                <span class="font-medium">{{ $user->created_at->format('M d, Y') }}</span>
                            </div>

                            <div class="flex justify-between text-xs">
                                <span class="text-slate-600 dark:text-slate-300">{{ __('global.ip_address') }}:</span>
                                <span class="font-medium">{{ $user->ip_address ?? '-' }}</span>
                            </div>
                        </div>

                        @if($user->roles->count() > 1)
                        <div class="mt-3">
                            <div class="text-xs text-slate-600 dark:text-slate-300 mb-1">{{ __('global.additional_roles') }}:</div>
                            <div class="flex flex-wrap gap-1">
                                @foreach($user->roles->skip(1)->take(2) as $role)
                                    <span class="px-2 py-1 text-xs rounded-full bg-secondary/10 text-secondary border border-secondary/20">
                                        {{ Str::limit($role->name, 10) }}
                                    </span>
                                @endforeach
                                @if($user->roles->count() > 3)
                                    <span class="px-2 py-1 text-xs rounded-full bg-gray/10 text-gray border border-gray/20">
                                        +{{ $user->roles->count() - 3 }} {{ __('global.more') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="px-5 py-3 border-t border-slate-200/60 dark:border-darkmode-400 flex justify-between items-center">
                        <div class="text-xs text-slate-500 truncate max-w-[120px]">
                            ID: {{ $user->id }}
                        </div>
                        <div class="flex gap-1">
                            @can('view_users')
                            <x-base.button variant="outline-secondary" as="a" href="{{ route('users.show', $user->id) }}" size="sm" class="px-2 py-1">
                                <x-base.lucide icon="Eye" class="w-3 h-3" />
                            </x-base.button>
                            @endcan

                            @can('edit_users')
                            <x-base.button variant="outline-primary" as="a" href="{{ route('users.edit', $user->id) }}" size="sm" class="px-2 py-1">
                                <x-base.lucide icon="Pencil" class="w-3 h-3" />
                            </x-base.button>
                            @endcan

                            @can('delete_users')
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ __('global.confirm_delete_user') }}')" class="inline">
                                @csrf
                                @method('DELETE')
                                <x-base.button variant="outline-danger" type="submit" size="sm" class="px-2 py-1">
                                    <x-base.lucide icon="Trash2" class="w-3 h-3" />
                                </x-base.button>
                            </form>
                            @endcan
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full">
                    <div class="box p-10 text-center">
                        <x-base.lucide icon="User" class="w-16 h-16 text-slate-400 mx-auto mb-5" />
                        <h3 class="text-xl font-medium text-slate-800 dark:text-slate-200 mb-2">{{ __('global.no_users_found') }}</h3>
                        <p class="text-slate-600 dark:text-slate-400 mb-6">{{ __('global.start_by_adding_user') }}</p>
                        @can('create_users')
                        <x-base.button variant="primary" as="a" href="{{ route('users.create') }}" class="flex items-center mx-auto">
                            <x-base.lucide icon="UserPlus" class="w-4 h-4 me-2" />
                            {{ __('global.add_first_user') }}
                        </x-base.button>
                        @endcan
                    </div>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <div class="me-auto">
                {{ $users->withQueryString()->links() }}
            </div>
            <div class="text-slate-500">
                {{ __('global.showing') }} {{ $users->firstItem() }} {{ __('global.to') }} {{ $users->lastItem() }} {{ __('global.of') }} {{ $users->total() }} {{ __('global.results') }}
            </div>
        </div>

        <!-- Summary Cards -->
        @if($users->count() > 0)
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
                    <div class="text-3xl font-bold leading-8 mt-6">{{ $users->count() }}</div>
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
                            $recentCount = collect($users->items())->filter(function($item) {
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
                            $todayCount = collect($users->items())->filter(function($user) {
                                return $user->created_at->isToday();
                            })->count();
                        @endphp
                        {{ $todayCount }}
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.added_today') }}</div>
                </div>
            </div>

            <div class="report-box zoom-in">
                <div class="box p-5 border border-success/20 bg-success/5">
                    <div class="flex items-center">
                        <x-base.lucide icon="BarChart3" class="w-8 h-8 text-success" />
                        <div class="ms-auto">
                            <div class="report-box__indicator bg-success">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4" />
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">
                        @php
                            $items = collect($users->items());
                            $avgRoles = $items->count() > 0 ? round($items->avg(function($user) { return $user->roles->count(); }), 1) : 0;
                        @endphp
                        {{ $avgRoles }}
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.avg_roles_per_user') }}</div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- JavaScript for Filtering -->
    <script>
        // Add functionality for the Tom Select dropdowns if needed
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Tom Select if needed
            if (typeof TomSelect !== 'undefined') {
                const tomSelectElements = document.querySelectorAll('select[data-search="true"]');
                tomSelectElements.forEach(element => {
                    new TomSelect(element, {
                        plugins: ['dropdown_input'],
                        allowEmptyOption: true
                    });
                });
            }
        });
    </script>
@endsection
