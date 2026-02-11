@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Classes.list') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('Classes.list') }}</h2>
        <div class="w-full sm:w-auto flex flex-wrap gap-2 mt-4 sm:mt-0">
            @can('create_classes')
            <x-base.button variant="primary" as="a" href="{{ route('classes.create') }}" class="flex items-center shadow-md">
                <x-base.lucide icon="PlusCircle" class="w-4 h-4 mr-2" />
                {{ __('Classes.add_new') }}
            </x-base.button>
            @endcan
            
            @can('export_classes')
            <div class="dropdown">
                <x-base.button variant="outline-secondary" class="flex items-center">
                    <x-base.lucide icon="Download" class="w-4 h-4 mr-2" />
                    {{ __('global.export') }}
                    <x-base.lucide icon="ChevronDown" class="w-4 h-4 ml-2" />
                </x-base.button>
                <div class="dropdown-menu w-40">
                    <div class="dropdown-content">
                        <a href="{{ route('classes.export.pdf') }}" class="dropdown-item flex items-center">
                            <x-base.lucide icon="FileText" class="w-4 h-4 mr-2" />
                            {{ __('global.export_pdf') }}
                        </a>
                        <a href="{{ route('classes.export.excel') }}" class="dropdown-item flex items-center">
                            <x-base.lucide icon="FileSpreadsheet" class="w-4 h-4 mr-2" />
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
                            <x-base.lucide icon="School" class="w-6 h-6 text-primary" />
                        </div>
                        <div class="ml-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 mr-1" />
                                <span class="text-xs">{{ __('global.total') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">{{ $classes->count() }}</div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.total_classes') }}</div>
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
                        <div class="ml-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 mr-1" />
                                <span class="text-xs">{{ __('global.enrolled') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">
                        @php
                            $totalStudents = $classes->sum('current_students');
                        @endphp
                        {{ $totalStudents }}
                    </div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.total_students') }}</div>
                </div>
            </div>
        </div>
        
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-warning/20 bg-warning/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-warning/10 flex items-center justify-center">
                            <x-base.lucide icon="BarChart3" class="w-6 h-6 text-warning" />
                        </div>
                        <div class="ml-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 mr-1" />
                                <span class="text-xs">{{ __('global.utilization') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">
                        @php
                            $utilizationRate = $classes->sum('capacity') > 0 ? 
                                round(($classes->sum('current_students') / $classes->sum('capacity')) * 100, 1) : 0;
                        @endphp
                        {{ $utilizationRate }}%
                    </div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.capacity_utilization') }}</div>
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
                        <div class="ml-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 mr-1" />
                                <span class="text-xs">{{ __('global.revenue') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">
                        @php
                            $potentialRevenue = $classes->sum(function($class) { 
                                return $class->monthly_fee * $class->current_students; 
                            });
                        @endphp
                        {{ number_format($potentialRevenue, 0) }}
                    </div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.monthly_revenue') }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Filter Section -->
        <div class="intro-y col-span-12">
            <div class="box p-5">
                <form method="GET" action="{{ route('classes.index') }}">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="flex-1">
                            <x-base.form-input name="search" value="{{ request('search') }}" placeholder="{{ __('global.search_classes') }}" class="w-full" />
                        </div>
                        <select name="age_group" class="form-select w-full sm:w-40">
                            <option value="" {{ request('age_group') == '' ? 'selected' : '' }}>{{ __('global.all_age_groups') }}</option>
                            <option value="2-3" {{ request('age_group') == '2-3' ? 'selected' : '' }}>2-3 {{ __('global.years') }}</option>
                            <option value="3-4" {{ request('age_group') == '3-4' ? 'selected' : '' }}>3-4 {{ __('global.years') }}</option>
                            <option value="4-5" {{ request('age_group') == '4-5' ? 'selected' : '' }}>4-5 {{ __('global.years') }}</option>
                            <option value="5-6" {{ request('age_group') == '5-6' ? 'selected' : '' }}>5-6 {{ __('global.years') }}</option>
                        </select>
                        <select name="is_active" class="form-select w-full sm:w-40">
                            <option value="" {{ request('is_active') === null ? 'selected' : '' }}>{{ __('global.all_statuses') }}</option>
                            <option value="1" {{ request('is_active') == '1' ? 'selected' : '' }}>{{ __('global.active') }}</option>
                            <option value="0" {{ request('is_active') == '0' ? 'selected' : '' }}>{{ __('global.inactive') }}</option>
                        </select>
                        <x-base.button type="submit" variant="primary" class="flex items-center">
                            <x-base.lucide icon="Filter" class="w-4 h-4 mr-2" />
                            {{ __('global.filter') }}
                        </x-base.button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Grid View -->
        <div class="intro-y col-span-12">
            <div id="classesGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($classes as $class)
                <div class="intro-y box zoom-in shadow-md border border-slate-200/60 dark:border-darkmode-400">
                    <div class="flex items-start px-5 pt-5 pb-3">
                        <div class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
                            <x-base.lucide icon="School" class="w-6 h-6 text-primary" />
                        </div>
                        <div class="ml-4 mr-auto">
                            <div class="font-medium text-base">{{ $class->name ?? '-' }}</div>
                            <div class="text-slate-500 text-xs mt-1">
                                {{ $class->code ? 'Code: ' . $class->code : '' }}
                            </div>
                        </div>
                        <div class="flex items-center">
                            @if($class->is_active)
                                <div class="w-3 h-3 rounded-full bg-success mr-2"></div>
                                <span class="text-xs text-success">{{ __('global.active') }}</span>
                            @else
                                <div class="w-3 h-3 rounded-full bg-danger mr-2"></div>
                                <span class="text-xs text-danger">{{ __('global.inactive') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="px-5 py-3 border-t border-slate-200/60 dark:border-darkmode-400">
                        <div class="space-y-2">
                            <div class="flex justify-between text-xs">
                                <span class="text-slate-600 dark:text-slate-300">{{ __('global.teacher') }}:</span>
                                <span class="font-medium">{{ $class->teacher->name ?? __('global.not_assigned') }}</span>
                            </div>
                            
                            <div class="flex justify-between text-xs">
                                <span class="text-slate-600 dark:text-slate-300">{{ __('global.age_group') }}:</span>
                                <span class="font-medium">{{ $class->age_group ?? '-' }}</span>
                            </div>
                            
                            <div class="flex justify-between text-xs">
                                <span class="text-slate-600 dark:text-slate-300">{{ __('global.schedule') }}:</span>
                                <span class="font-medium">{{ $class->start_time ?? '-' }} - {{ $class->end_time ?? '-' }}</span>
                            </div>
                            
                            <div class="flex justify-between text-xs">
                                <span class="text-slate-600 dark:text-slate-300">{{ __('global.room') }}:</span>
                                <span class="font-medium">{{ $class->room_number ?? '-' }}</span>
                            </div>
                            
                            <div class="flex justify-between text-xs">
                                <span class="text-slate-600 dark:text-slate-300">{{ __('global.monthly_fee') }}:</span>
                                <span class="font-medium">{{ $class->monthly_fee ? number_format($class->monthly_fee, 0) . ' ' . config('app.currency', 'USD') : '-' }}</span>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <div class="flex justify-between text-xs mb-1">
                                <span class="text-slate-600 dark:text-slate-300">{{ __('global.students') }} ({{ $class->current_students ?? 0 }}/{{ $class->capacity ?? 0 }}):</span>
                                <span class="font-medium">{{ $class->capacity > 0 ? round((($class->current_students ?? 0) / $class->capacity) * 100, 0) : 0 }}%</span>
                            </div>
                            <div class="w-full bg-slate-200 rounded-full h-2 dark:bg-darkmode-400">
                                <div class="bg-primary h-2 rounded-full" style="width: {{ $class->capacity > 0 ? min((($class->current_students ?? 0) / $class->capacity) * 100, 100) : 0 }}%"></div>
                            </div>
                        </div>
                        
                        <div class="mt-3 flex flex-wrap gap-1">
                            @if(($class->current_students ?? 0) > 0)
                                <span class="px-2 py-1 text-xs rounded-full bg-success/10 text-success border border-success/20">
                                    {{ $class->current_students }} {{ __('global.enrolled') }}
                                </span>
                            @endif
                            @if(($class->capacity ?? 0) > ($class->current_students ?? 0))
                                <span class="px-2 py-1 text-xs rounded-full bg-warning/10 text-warning border border-warning/20">
                                    {{ ($class->capacity ?? 0) - ($class->current_students ?? 0) }} {{ __('global.available') }}
                                </span>
                            @endif
                            @if(($class->current_students ?? 0) >= ($class->capacity ?? 0))
                                <span class="px-2 py-1 text-xs rounded-full bg-danger/10 text-danger border border-danger/20">
                                    {{ __('global.full') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="px-5 py-3 border-t border-slate-200/60 dark:border-darkmode-400 flex justify-between items-center">
                        <div class="text-xs text-slate-500">
                            {{ __('global.created') }}: {{ $class->created_at->format('M d, Y') }}
                        </div>
                        <div class="flex gap-1">
                            @can('view_classes')
                            <x-base.button variant="outline-secondary" as="a" href="{{ route('classes.show', $class->id) }}" size="sm" class="px-2 py-1">
                                <x-base.lucide icon="Eye" class="w-3 h-3" />
                            </x-base.button>
                            @endcan
                            
                            @can('edit_classes')
                            <x-base.button variant="outline-primary" as="a" href="{{ route('classes.edit', $class->id) }}" size="sm" class="px-2 py-1">
                                <x-base.lucide icon="Pencil" class="w-3 h-3" />
                            </x-base.button>
                            @endcan
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full">
                    <div class="box p-10 text-center">
                        <x-base.lucide icon="School" class="w-16 h-16 text-slate-400 mx-auto mb-5" />
                        <h3 class="text-xl font-medium text-slate-800 dark:text-slate-200 mb-2">{{ __('global.no_classes_found') }}</h3>
                        <p class="text-slate-600 dark:text-slate-400 mb-6">{{ __('global.start_by_adding_class') }}</p>
                        @can('create_classes')
                        <x-base.button variant="primary" as="a" href="{{ route('classes.create') }}" class="flex items-center mx-auto">
                            <x-base.lucide icon="PlusCircle" class="w-4 h-4 mr-2" />
                            {{ __('global.add_first_class') }}
                        </x-base.button>
                        @endcan
                    </div>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            {!! $classes->links() !!}
        </div>

        <!-- Summary Cards -->
        @if($classes->count() > 0)
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
                    <div class="text-3xl font-bold leading-8 mt-6">{{ $classes->count() }}</div>
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
                            $recentCount = $classes->filter(function($item) {
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
                            $todayCount = $classes->filter(function($class) {
                                return $class->created_at->isToday();
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
                        <div class="ml-auto">
                            <div class="report-box__indicator bg-success"> 
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4" /> 
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">
                        @php
                            $avgStudents = $classes->count() > 0 ? round($classes->avg('current_students'), 1) : 0;
                        @endphp
                        {{ $avgStudents }}
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.avg_students_per_class') }}</div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- JavaScript for Filtering -->
    <script>
        function applyFilters() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const ageGroupFilter = document.getElementById('ageGroupFilter').value;
            const statusFilter = document.getElementById('statusFilter').value;
            
            const cards = document.querySelectorAll('#classesGrid > div');
            
            cards.forEach(card => {
                const name = card.querySelector('.font-medium.text-base').textContent.toLowerCase();
                const ageGroupElement = Array.from(card.querySelectorAll('.text-xs')).find(el => 
                    el.textContent.includes('{{ __('global.age_group') }}')
                );
                const ageGroup = ageGroupElement ? ageGroupElement.nextElementSibling.textContent.toLowerCase() : '';
                const statusElement = card.querySelector('.flex.items-center span:last-child');
                const status = statusElement ? statusElement.textContent.trim().toLowerCase() : '';
                
                const matchesSearch = name.includes(searchTerm);
                const matchesAgeGroup = !ageGroupFilter || ageGroup.includes(ageGroupFilter);
                const matchesStatus = !statusFilter || status.includes(statusFilter);
                
                if (matchesSearch && matchesAgeGroup && matchesStatus) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
        
        // Live search
        document.getElementById('searchInput').addEventListener('input', applyFilters);
        document.getElementById('ageGroupFilter').addEventListener('change', applyFilters);
        document.getElementById('statusFilter').addEventListener('change', applyFilters);
    </script>
@endsection
