@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Teacher.list') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('Teacher.list') }}</h2>
        <div class="w-full sm:w-auto flex flex-wrap gap-2 mt-4 sm:mt-0">
            @can('create_teachers')
            <x-base.button variant="primary" as="a" href="{{ route('teachers.create') }}" class="flex items-center shadow-md">
                <x-base.lucide icon="UserPlus" class="w-4 h-4 me-2" />
                {{ __('Teacher.add_new') }}
            </x-base.button>
            @endcan
            
            @can('export_teachers')
            <div class="dropdown">
                <x-base.button variant="outline-secondary" class="flex items-center">
                    <x-base.lucide icon="Download" class="w-4 h-4 me-2" />
                    {{ __('global.export') }}
                    <x-base.lucide icon="ChevronDown" class="w-4 h-4 ms-2" />
                </x-base.button>
                <div class="dropdown-menu w-40">
                    <div class="dropdown-content">
                        <a href="{{ route('teachers.export.pdf') }}" class="dropdown-item flex items-center">
                            <x-base.lucide icon="FileText" class="w-4 h-4 me-2" />
                            {{ __('global.export_pdf') }}
                        </a>
                        <a href="{{ route('teachers.export.excel') }}" class="dropdown-item flex items-center">
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
                    <div class="text-2xl font-bold leading-8 mt-4">{{ $teachers->total() }}</div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.total_teachers') }}</div>
                </div>
            </div>
        </div>
        
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-info/20 bg-info/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-info/10 flex items-center justify-center">
                            <x-base.lucide icon="GraduationCap" class="w-6 h-6 text-info" />
                        </div>
                        <div class="ms-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                                <span class="text-xs">{{ __('global.qualified') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">
                        @php
                            $qualifiedCount = $teachers->filter(function($teacher) { 
                                return !empty($teacher->qualification); 
                            })->count();
                        @endphp
                        {{ $qualifiedCount }}
                    </div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.with_qualifications') }}</div>
                </div>
            </div>
        </div>
        
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-warning/20 bg-warning/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-warning/10 flex items-center justify-center">
                            <x-base.lucide icon="Briefcase" class="w-6 h-6 text-warning" />
                        </div>
                        <div class="ms-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                                <span class="text-xs">{{ __('global.experienced') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">
                        @php
                            $experiencedCount = $teachers->filter(function($teacher) { 
                                return $teacher->hire_date && $teacher->hire_date->diffInYears(now()) >= 2; 
                            })->count();
                        @endphp
                        {{ $experiencedCount }}
                    </div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.two_years_plus') }}</div>
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
                                <span class="text-xs">{{ __('global.average') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">
                        @php
                            $avgSalary = $teachers->filter(function($teacher) { 
                                return is_numeric($teacher->salary); 
                            })->avg('salary');
                        @endphp
                        {{ $avgSalary ? number_format($avgSalary, 0) : '0' }}
                    </div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.avg_monthly_salary') }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Filter Section -->
        <div class="intro-y col-span-12">
            <div class="box p-5">
                <form method="GET" action="{{ route('teachers.index') }}">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="flex-1">
                            <div class="relative">
                                <x-base.form-input 
                                    type="text" 
                                    name="search" 
                                    value="{{ request('search') }}"
                                    placeholder="{{ __('global.search_teachers') }}..." 
                                    class="w-full ps-10 pe-4 py-2"
                                />
                                <div class="absolute inset-y-0 left-0 ps-3 flex items-center pointer-events-none">
                                    <x-base.lucide icon="Search" class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>
                        </div>
                        <select name="qualification" class="form-select w-full sm:w-40">
                            <option value="">{{ __('global.all_qualifications') }}</option>
                            <option value="bachelor" {{ request('qualification') == 'bachelor' ? 'selected' : '' }}>{{ __('global.bachelor') }}</option>
                            <option value="master" {{ request('qualification') == 'master' ? 'selected' : '' }}>{{ __('global.master') }}</option>
                            <option value="phd" {{ request('qualification') == 'phd' ? 'selected' : '' }}>{{ __('global.phd') }}</option>
                            <option value="diploma" {{ request('qualification') == 'diploma' ? 'selected' : '' }}>{{ __('global.diploma') }}</option>
                        </select>
                        <select name="is_active" class="form-select w-full sm:w-40">
                            <option value="">{{ __('global.all_statuses') }}</option>
                            <option value="1" {{ request('is_active') == '1' ? 'selected' : '' }}>{{ __('global.active') }}</option>
                            <option value="0" {{ request('is_active') == '0' ? 'selected' : '' }}>{{ __('global.inactive') }}</option>
                        </select>
                        <div class="flex gap-2">
                            <x-base.button as="a" href="{{ route('teachers.index') }}" variant="secondary" class="flex items-center">
                                <x-base.lucide icon="RotateCcw" class="w-4 h-4 me-2" />
                                {{ __('global.reset') }}
                            </x-base.button>
                            <x-base.button type="submit" variant="primary" class="flex items-center">
                                <x-base.lucide icon="Filter" class="w-4 h-4 me-2" />
                                {{ __('global.apply') }}
                            </x-base.button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Grid View -->
        <div class="intro-y col-span-12">
            <div id="teachersGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($teachers as $teacher)
                <div class="intro-y box zoom-in shadow-md border border-slate-200/60 dark:border-darkmode-400">
                    <div class="flex items-start px-5 pt-5 pb-3">
                        <div class="w-16 h-16 image-fit">
                            <img alt="{{ $teacher->name }}" class="rounded-full border-2 border-white shadow-md" 
                                 src="{{ $teacher->photo_path ? asset('storage/' . $teacher->photo_path) : asset('dist/images/profile-2.jpg') }}">
                        </div>
                        <div class="ms-4 me-auto">
                            <div class="font-medium text-base">{{ $teacher->name ?? '-' }}</div>
                            <div class="text-slate-500 text-xs mt-1">
                                {{ $teacher->qualification ? ucfirst($teacher->qualification) : __('global.no_qualification') }}
                            </div>
                        </div>
                        <div class="flex items-center">
                            @if($teacher->is_active)
                                <div class="w-3 h-3 rounded-full bg-success me-2"></div>
                                <span class="text-xs text-success">{{ __('global.active') }}</span>
                            @else
                                <div class="w-3 h-3 rounded-full bg-danger me-2"></div>
                                <span class="text-xs text-danger">{{ __('global.inactive') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="px-5 py-3 border-t border-slate-200/60 dark:border-darkmode-400">
                        <div class="flex flex-wrap gap-2 mb-3">
                            <div class="flex items-center text-xs text-slate-600 dark:text-slate-300">
                                <x-base.lucide icon="Phone" class="w-3 h-3 me-1" />
                                {{ $teacher->phone ?? __('global.not_provided') }}
                            </div>
                            <div class="flex items-center text-xs text-slate-600 dark:text-slate-300 ms-3">
                                <x-base.lucide icon="Mail" class="w-3 h-3 me-1" />
                                {{ $teacher->email ?? __('global.not_provided') }}
                            </div>
                        </div>
                        
                        <div class="flex justify-between text-xs mb-2">
                            <span class="text-slate-600 dark:text-slate-300">{{ __('global.hire_date') }}:</span>
                            <span class="font-medium">{{ $teacher->hire_date ? $teacher->hire_date->format('M d, Y') : '-' }}</span>
                        </div>
                        
                        <div class="flex justify-between text-xs mb-2">
                            <span class="text-slate-600 dark:text-slate-300">{{ __('global.salary') }}:</span>
                            <span class="font-medium">{{ $teacher->salary ? number_format($teacher->salary, 0) . ' ' . config('app.currency', 'USD') : '-' }}</span>
                        </div>
                        
                        <div class="flex justify-between text-xs mb-3">
                            <span class="text-slate-600 dark:text-slate-300">{{ __('global.experience') }}:</span>
                            <span class="font-medium">
                                @php
                                    $experience = $teacher->hire_date ? $teacher->hire_date->diffInYears(now()) : 0;
                                    $expText = $experience == 0 ? __('global.less_than_year') : ($experience == 1 ? '1 ' . __('global.year') : $experience . ' ' . __('global.years'));
                                @endphp
                                {{ $expText }}
                            </span>
                        </div>
                        
                        <div class="mt-2">
                            <div class="text-xs text-slate-600 dark:text-slate-300 mb-1">{{ __('global.classes_assigned') }}:</div>
                            <div class="flex flex-wrap gap-1">
                                @if($teacher->classes->count() > 0)
                                    @foreach($teacher->classes->take(3) as $class)
                                        <span class="px-2 py-1 text-xs rounded-full bg-info/10 text-info border border-info/20">
                                            {{ Str::limit($class->name, 12) }}
                                        </span>
                                    @endforeach
                                    @if($teacher->classes->count() > 3)
                                        <span class="px-2 py-1 text-xs rounded-full bg-secondary/10 text-secondary border border-secondary/20">
                                            +{{ $teacher->classes->count() - 3 }} {{ __('global.more') }}
                                        </span>
                                    @endif
                                @else
                                    <span class="text-xs text-slate-500">{{ __('global.no_classes_assigned') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="px-5 py-3 border-t border-slate-200/60 dark:border-darkmode-400 flex justify-between items-center">
                        <div class="text-xs text-slate-500">
                            {{ __('global.joined') }}: {{ $teacher->created_at->format('M d, Y') }}
                        </div>
                        <div class="flex gap-1">
                            @can('view_teachers')
                            <x-base.button variant="outline-secondary" as="a" href="{{ route('teachers.show', $teacher->id) }}" size="sm" class="px-2 py-1">
                                <x-base.lucide icon="Eye" class="w-3 h-3" />
                            </x-base.button>
                            @endcan
                            
                            @can('edit_teachers')
                            <x-base.button variant="outline-primary" as="a" href="{{ route('teachers.edit', $teacher->id) }}" size="sm" class="px-2 py-1">
                                <x-base.lucide icon="Pencil" class="w-3 h-3" />
                            </x-base.button>
                            @endcan
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full">
                    <div class="box p-10 text-center">
                        <x-base.lucide icon="GraduationCap" class="w-16 h-16 text-slate-400 mx-auto mb-5" />
                        <h3 class="text-xl font-medium text-slate-800 dark:text-slate-200 mb-2">{{ __('global.no_teachers_found') }}</h3>
                        <p class="text-slate-600 dark:text-slate-400 mb-6">{{ __('global.start_by_adding_teacher') }}</p>
                        @can('create_teachers')
                        <x-base.button variant="primary" as="a" href="{{ route('teachers.create') }}" class="flex items-center mx-auto">
                            <x-base.lucide icon="UserPlus" class="w-4 h-4 me-2" />
                            {{ __('global.add_first_teacher') }}
                        </x-base.button>
                        @endcan
                    </div>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            {!! $teachers->links() !!}
        </div>

        <!-- Summary Cards -->
        @if($teachers->count() > 0)
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
                    <div class="text-3xl font-bold leading-8 mt-6">{{ $teachers->total() }}</div>
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
                            $recentCount = $teachers->filter(function($teacher) {
                                return $teacher->created_at >= now()->subDays(7);
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
                            $todayCount = $teachers->filter(function($teacher) {
                                return $teacher->created_at->isToday();
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
                        <x-base.lucide icon="GraduationCap" class="w-8 h-8 text-success" />
                        <div class="ms-auto">
                            <div class="report-box__indicator bg-success"> 
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4" /> 
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">
                        @php
                            $avgClasses = $teachers->count() > 0 ? round($teachers->sum(function($t) { return $t->classes->count(); }) / $teachers->count(), 1) : 0;
                        @endphp
                        {{ $avgClasses }}
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.avg_classes_per_teacher') }}</div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- JavaScript for Filtering -->
    <script>
        function applyFilters() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const qualificationFilter = document.getElementById('qualificationFilter').value;
            const statusFilter = document.getElementById('statusFilter').value;
            
            const cards = document.querySelectorAll('#teachersGrid > div');
            
            cards.forEach(card => {
                const name = card.querySelector('.font-medium.text-base').textContent.toLowerCase();
                const qualification = card.querySelector('.text-slate-500.text-xs').textContent.toLowerCase();
                const statusElement = card.querySelector('.flex.items-center span:last-child');
                const status = statusElement ? statusElement.textContent.trim().toLowerCase() : '';
                
                const matchesSearch = name.includes(searchTerm);
                const matchesQualification = !qualificationFilter || qualification.includes(qualificationFilter);
                const matchesStatus = !statusFilter || status.includes(statusFilter);
                
                if (matchesSearch && matchesQualification && matchesStatus) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
        
        // Live search
        document.getElementById('searchInput').addEventListener('input', applyFilters);
        document.getElementById('qualificationFilter').addEventListener('change', applyFilters);
        document.getElementById('statusFilter').addEventListener('change', applyFilters);
    </script>
@endsection
