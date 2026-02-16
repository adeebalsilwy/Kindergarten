@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('global.guardians') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('global.guardian_management') }}</h2>
        <div class="w-full sm:w-auto flex flex-wrap gap-2 mt-4 sm:mt-0">
            @can('create_guardians')
            <x-base.button variant="primary" as="a" href="{{ route('guardians.create') }}" class="flex items-center shadow-md">
                <x-base.lucide icon="UserPlus" class="w-4 h-4 me-2" />
                {{ __('global.add_new_guardian') }}
            </x-base.button>
            @endcan
            
            @can('export_guardians')
            <div class="dropdown ms-2">
                <x-base.button variant="outline-secondary" class="flex items-center">
                    <x-base.lucide icon="Download" class="w-4 h-4 me-2" />
                    {{ __('global.export') }}
                    <x-base.lucide icon="ChevronDown" class="w-4 h-4 ms-2" />
                </x-base.button>
                <div class="dropdown-menu w-40">
                    <div class="dropdown-content">
                        <a href="{{ route('guardians.export.pdf') }}" class="dropdown-item flex items-center">
                            <x-base.lucide icon="FileText" class="w-4 h-4 me-2" />
                            {{ __('global.export_pdf') }}
                        </a>
                        <a href="{{ route('guardians.export.excel') }}" class="dropdown-item flex items-center">
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
                    <div class="text-2xl font-bold leading-8 mt-4">{{ $totalGuardians ?? 0 }}</div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.total_guardians') }}</div>
                </div>
            </div>
        </div>
        
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-info/20 bg-info/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-info/10 flex items-center justify-center">
                            <x-base.lucide icon="UserCheck" class="w-6 h-6 text-info" />
                        </div>
                        <div class="ms-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                                <span class="text-xs">{{ __('global.primary') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">{{ $primaryGuardians ?? 0 }}</div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.primary_guardians') }}</div>
                </div>
            </div>
        </div>
        
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-warning/20 bg-warning/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-warning/10 flex items-center justify-center">
                            <x-base.lucide icon="Phone" class="w-6 h-6 text-warning" />
                        </div>
                        <div class="ms-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                                <span class="text-xs">{{ __('global.contactable') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">{{ $contactableGuardians ?? 0 }}</div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.can_be_contacted') }}</div>
                </div>
            </div>
        </div>
        
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-success/20 bg-success/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-success/10 flex items-center justify-center">
                            <x-base.lucide icon="DollarSign" class="w-6 h-6 text-success" />
                        </div>
                        <div class="ms-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                                <span class="text-xs">{{ __('global.outstanding') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">{{ $guardiansWithOutstanding ?? 0 }}</div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.have_outstanding_fees') }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Filter Section -->
        <div class="intro-y col-span-12">
            <div class="box p-5">
                <form method="GET" action="{{ route('guardians.index') }}">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="flex-1">
                            <x-base.form-input name="search" value="{{ request('search') }}" placeholder="{{ __('global.search_guardians') }}" class="w-full" />
                        </div>
                        <select name="relationship_type" class="form-select w-full sm:w-40">
                            <option value="" {{ request('relationship_type') === null ? 'selected' : '' }}>{{ __('global.all_relationships') }}</option>
                            <option value="father" {{ request('relationship_type') == 'father' ? 'selected' : '' }}>{{ __('global.father') }}</option>
                            <option value="mother" {{ request('relationship_type') == 'mother' ? 'selected' : '' }}>{{ __('global.mother') }}</option>
                            <option value="guardian" {{ request('relationship_type') == 'guardian' ? 'selected' : '' }}>{{ __('global.guardian') }}</option>
                        </select>
                        <select name="is_active" class="form-select w-full sm:w-40">
                            <option value="" {{ request('is_active') === null ? 'selected' : '' }}>{{ __('global.all_statuses') }}</option>
                            <option value="1" {{ request('is_active') == '1' ? 'selected' : '' }}>{{ __('global.active') }}</option>
                            <option value="0" {{ request('is_active') == '0' ? 'selected' : '' }}>{{ __('global.inactive') }}</option>
                        </select>
                        <x-base.button type="submit" variant="secondary" class="flex items-center">
                            <x-base.lucide icon="Filter" class="w-4 h-4 me-2" />
                            {{ __('global.filter') }}
                        </x-base.button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Grid View -->
        <div class="intro-y col-span-12">
            <div id="guardiansGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($parents as $guardian)
                <div class="intro-y box zoom-in shadow-md border border-slate-200/60 dark:border-darkmode-400">
                    <div class="flex items-start px-5 pt-5 pb-3">
                        <div class="w-16 h-16 image-fit">
                            <img alt="{{ $guardian->name }}" class="rounded-full border-2 border-white shadow-md" 
                                 src="{{ $guardian->photo ? asset('storage/' . $guardian->photo) : asset('dist/images/profile-1.jpg') }}">
                        </div>
                        <div class="ms-4 me-auto">
                            <div class="font-medium text-base">{{ $guardian->name ?? '-' }}</div>
                            <div class="text-slate-500 text-xs mt-1">
                                {{ $guardian->relationship_type ? ucfirst($guardian->relationship_type) : __('global.not_specified') }}
                            </div>
                        </div>
                        <div class="flex items-center">
                            @if($guardian->is_active)
                                <div class="w-3 h-3 rounded-full bg-success me-2"></div>
                                <span class="text-xs text-success">{{ __('global.active') }}</span>
                            @else
                                <div class="w-3 h-3 rounded-full bg-danger me-2"></div>
                                <span class="text-xs text-danger">{{ __('global.inactive') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="px-5 py-3 border-t border-slate-200/60 dark:border-darkmode-400">
                        <div class="flex flex-wrap gap-2">
                            <div class="flex items-center text-xs text-slate-600 dark:text-slate-300">
                                <x-base.lucide icon="Phone" class="w-3 h-3 me-1" />
                                {{ $guardian->phone ?? __('global.not_provided') }}
                            </div>
                            <div class="flex items-center text-xs text-slate-600 dark:text-slate-300 ms-3">
                                <x-base.lucide icon="Mail" class="w-3 h-3 me-1" />
                                {{ $guardian->email ?? __('global.not_provided') }}
                            </div>
                        </div>
                        
                        <div class="mt-3">
                            <div class="flex justify-between text-xs mb-1">
                                <span class="text-slate-600 dark:text-slate-300">{{ __('global.children') }}:</span>
                                <span class="font-medium">{{ $guardian->children->count() }}</span>
                            </div>
                            <div class="w-full bg-slate-200 rounded-full h-1.5 dark:bg-darkmode-400">
                                <div class="bg-primary h-1.5 rounded-full" style="width: {{ min(($guardian->children->count() / 5) * 100, 100) }}%"></div>
                            </div>
                        </div>
                        
                        <div class="mt-3 flex flex-wrap gap-1">
                            @foreach($guardian->children as $child)
                                <span class="px-2 py-1 text-xs rounded-full bg-primary/10 text-primary border border-primary/20">
                                    {{ Str::limit($child->first_name ?? $child->name, 10) }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                    <div class="px-5 py-3 border-t border-slate-200/60 dark:border-darkmode-400 flex justify-between items-center">
                        <div class="text-xs text-slate-500">
                            {{ __('global.created') }}: {{ $guardian->created_at->format('M d, Y') }}
                        </div>
                        <div class="flex gap-1">
                            @can('view_guardians')
                            <x-base.button variant="outline-secondary" as="a" href="{{ route('guardians.show', $guardian->id) }}" size="sm" class="px-2 py-1">
                                <x-base.lucide icon="Eye" class="w-3 h-3" />
                            </x-base.button>
                            @endcan
                            
                            @can('edit_guardians')
                            <x-base.button variant="outline-primary" as="a" href="{{ route('guardians.edit', $guardian->id) }}" size="sm" class="px-2 py-1">
                                <x-base.lucide icon="Pencil" class="w-3 h-3" />
                            </x-base.button>
                            @endcan
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full">
                    <div class="box p-10 text-center">
                        <x-base.lucide icon="Users" class="w-16 h-16 text-slate-400 mx-auto mb-5" />
                        <h3 class="text-xl font-medium text-slate-800 dark:text-slate-200 mb-2">{{ __('global.no_guardians_found') }}</h3>
                        <p class="text-slate-600 dark:text-slate-400 mb-6">{{ __('global.start_by_adding_guardian') }}</p>
                        @can('create_guardians')
                        <x-base.button variant="primary" as="a" href="{{ route('guardians.create') }}" class="flex items-center mx-auto">
                            <x-base.lucide icon="UserPlus" class="w-4 h-4 me-2" />
                            {{ __('global.add_first_guardian') }}
                        </x-base.button>
                        @endcan
                    </div>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            {!! $parents->links() !!}
        </div>

        <!-- Summary Cards -->
        @if($parents->count() > 0)
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
                    <div class="text-3xl font-bold leading-8 mt-6">{{ $parents->count() }}</div>
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
                            $recentCount = $parents->filter(function($parent) {
                                return $parent->created_at >= now()->subDays(7);
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
                            $todayCount = $parents->filter(fn($item) => \Carbon\Carbon::parse($item->created_at)->isToday())->count();
                        @endphp
                        {{ $todayCount }}
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.added_today') }}</div>
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
                            $avgChildren = $parents->count() > 0 ? round($parents->sum(function($g) { return $g->children->count(); }) / $parents->count(), 1) : 0;
                        @endphp
                        {{ $avgChildren }}
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.avg_children_per_guardian') }}</div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- JavaScript for Filtering -->
    <script>
        function applyFilters() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const relationshipFilter = document.getElementById('relationshipFilter').value;
            const statusFilter = document.getElementById('statusFilter').value;
            
            const cards = document.querySelectorAll('#guardiansGrid > div');
            
            cards.forEach(card => {
                const name = card.querySelector('.font-medium.text-base').textContent.toLowerCase();
                const relationship = card.querySelector('.text-slate-500.text-xs').textContent.toLowerCase();
                const statusElement = card.querySelector('.flex.items-center span:last-child');
                const status = statusElement ? statusElement.textContent.trim().toLowerCase() : '';
                
                const matchesSearch = name.includes(searchTerm);
                const matchesRelationship = !relationshipFilter || relationship.includes(relationshipFilter);
                const matchesStatus = !statusFilter || status.includes(statusFilter);
                
                if (matchesSearch && matchesRelationship && matchesStatus) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
        
        // Live search
        document.getElementById('searchInput').addEventListener('input', applyFilters);
        document.getElementById('relationshipFilter').addEventListener('change', applyFilters);
        document.getElementById('statusFilter').addEventListener('change', applyFilters);
    </script>
@endsection
