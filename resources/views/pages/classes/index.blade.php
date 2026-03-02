@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Classes.list') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('Classes.list') }}</h2>
        <div class="w-full sm:w-auto flex flex-wrap gap-2 mt-4 sm:mt-0">
            @can('create_classes')
            <x-base.button variant="primary" as="a" href="{{ route('classes.create') }}" class="flex items-center shadow-md">
                <x-base.lucide icon="PlusCircle" class="w-4 h-4 me-2" />
                {{ __('Classes.add_new') }}
            </x-base.button>
            @endcan
            
            @can('export_classes')
            <div class="dropdown">
                <x-base.button variant="outline-secondary" class="flex items-center">
                    <x-base.lucide icon="Download" class="w-4 h-4 me-2" />
                    {{ __('global.export') }}
                    <x-base.lucide icon="ChevronDown" class="w-4 h-4 ms-2" />
                </x-base.button>
                <div class="dropdown-menu w-40">
                    <div class="dropdown-content">
                        <a href="{{ route('classes.export.pdf') }}{{ request()->getQueryString() ? '?' . request()->getQueryString() : '' }}" class="dropdown-item flex items-center">
                            <x-base.lucide icon="FileText" class="w-4 h-4 me-2" />
                            {{ __('global.export_pdf') }}
                        </a>
                        <a href="{{ route('classes.export.excel') }}{{ request()->getQueryString() ? '?' . request()->getQueryString() : '' }}" class="dropdown-item flex items-center">
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
                            <x-base.lucide icon="School" class="w-6 h-6 text-primary" />
                        </div>
                        <div class="ms-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                                <span class="text-xs">{{ __('global.total') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">{{ $classes->total() }}</div>
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
                        <div class="ms-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                                <span class="text-xs">{{ __('global.enrolled') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">
                        @php
                            $totalStudents = $classes->items() ? collect($classes->items())->sum('current_students') : 0;
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
                        <div class="ms-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                                <span class="text-xs">{{ __('global.utilization') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">
                        @php
                            $totalCapacity = $classes->items() ? collect($classes->items())->sum('capacity') : 0;
                            $totalStudents = $classes->items() ? collect($classes->items())->sum('current_students') : 0;
                            $utilizationRate = $totalCapacity > 0 ? 
                                round(($totalStudents / $totalCapacity) * 100, 1) : 0;
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
                        <div class="ms-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                                <span class="text-xs">{{ __('global.revenue') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">
                        @php
                            $potentialRevenue = $classes->items() ? collect($classes->items())->sum(function($class) { 
                                return $class->monthly_fee * $class->current_students; 
                            }) : 0;
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
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6 gap-4">
                        <div>
                            <x-base.form-label>{{ __('global.search') }}</x-base.form-label>
                            <x-base.form-input name="search" value="{{ request('search') }}" placeholder="{{ __('global.search_classes') }}" />
                        </div>
                        <div>
                            <x-base.form-label>{{ __('classes.fields.teacher_id') }}</x-base.form-label>
                            <x-base.tom-select name="teacher_id" class="w-full">
                                <option value="" {{ request('teacher_id') == '' ? 'selected' : '' }}>{{ __('global.all_teachers') }}</option>
                                @foreach(\App\Models\Teacher::orderBy('name')->get() as $teacher)
                                    <option value="{{ $teacher->id }}" {{ request('teacher_id') == $teacher->id ? 'selected' : '' }}>
                                        {{ $teacher->name }}
                                    </option>
                                @endforeach
                            </x-base.tom-select>
                        </div>
                        <div>
                            <x-base.form-label>{{ __('classes.fields.grade_level_id') }}</x-base.form-label>
                            <x-base.tom-select name="grade_level_id" class="w-full">
                                <option value="" {{ request('grade_level_id') == '' ? 'selected' : '' }}>{{ __('global.all_grade_levels') }}</option>
                                @foreach(\App\Models\GradeLevel::orderBy('name')->get() as $gradeLevel)
                                    <option value="{{ $gradeLevel->id }}" {{ request('grade_level_id') == $gradeLevel->id ? 'selected' : '' }}>
                                        {{ $gradeLevel->name }}
                                    </option>
                                @endforeach
                            </x-base.tom-select>
                        </div>
                        <div>
                            <x-base.form-label>{{ __('classes.fields.age_group') }}</x-base.form-label>
                            <x-base.tom-select name="age_group" class="w-full">
                                <option value="" {{ request('age_group') == '' ? 'selected' : '' }}>{{ __('global.all_age_groups') }}</option>
                                <option value="toddlers" {{ request('age_group') == 'toddlers' ? 'selected' : '' }}>{{ __('classes.age_groups.toddlers') }}</option>
                                <option value="preschool" {{ request('age_group') == 'preschool' ? 'selected' : '' }}>{{ __('classes.age_groups.preschool') }}</option>
                                <option value="pre_k" {{ request('age_group') == 'pre_k' ? 'selected' : '' }}>{{ __('classes.age_groups.pre_k') }}</option>
                                <option value="kindergarten" {{ request('age_group') == 'kindergarten' ? 'selected' : '' }}>{{ __('classes.age_groups.kindergarten') }}</option>
                            </x-base.tom-select>
                        </div>
                        <div>
                            <x-base.form-label>{{ __('classes.fields.is_active') }}</x-base.form-label>
                            <x-base.tom-select name="is_active" class="w-full">
                                <option value="" {{ request('is_active') === null || request('is_active') === '' ? 'selected' : '' }}>{{ __('global.all_statuses') }}</option>
                                <option value="1" {{ request('is_active') == '1' ? 'selected' : '' }}>{{ __('global.active') }}</option>
                                <option value="0" {{ request('is_active') == '0' ? 'selected' : '' }}>{{ __('global.inactive') }}</option>
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
            <div id="classesGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($classes as $class)
                <div class="intro-y box zoom-in shadow-md border border-slate-200/60 dark:border-darkmode-400">
                    <div class="flex items-start px-5 pt-5 pb-3">
                        <div class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
                            <x-base.lucide icon="School" class="w-6 h-6 text-primary" />
                        </div>
                        <div class="ms-4 me-auto">
                            <div class="font-medium text-base">{{ $class->name ?? '-' }}</div>
                            <div class="text-slate-500 text-xs mt-1">
                                {{ $class->code ? 'Code: ' . $class->code : '' }}
                            </div>
                        </div>
                        <div class="flex items-center">
                            @if($class->is_active)
                                <div class="w-3 h-3 rounded-full bg-success me-2"></div>
                                <span class="text-xs text-success">{{ __('global.active') }}</span>
                            @else
                                <div class="w-3 h-3 rounded-full bg-danger me-2"></div>
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
                                <span class="text-slate-600 dark:text-slate-300">{{ __('global.grade_level') }}:</span>
                                <span class="font-medium">{{ $class->gradeLevel->name ?? '-' }}</span>
                            </div>
                            
                            <div class="flex justify-between text-xs">
                                <span class="text-slate-600 dark:text-slate-300">{{ __('global.age_group') }}:</span>
                                <span class="font-medium">{{ $class->age_group ? __('classes.age_groups.' . $class->age_group) : '-' }}</span>
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
                            
                            @can('delete_classes')
                            <x-base.button variant="outline-danger" 
                                          data-delete-id="{{ $class->id }}" 
                                          data-delete-name="{{ $class->name ?? 'Class' }}" 
                                          data-delete-route="{{ route('classes.destroy', $class->id) }}"
                                          size="sm" class="px-2 py-1 delete-btn">
                                <x-base.lucide icon="Trash2" class="w-3 h-3" />
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
                            <x-base.lucide icon="PlusCircle" class="w-4 h-4 me-2" />
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
            <div class="me-auto">
                {{ $classes->withQueryString()->links() }}
            </div>
            <div class="text-slate-500">
                {{ __('global.showing') }} {{ $classes->firstItem() }} {{ __('global.to') }} {{ $classes->lastItem() }} {{ __('global.of') }} {{ $classes->total() }} {{ __('global.results') }}
            </div>
        </div>

        <!-- Summary Cards -->
        @if($classes->count() > 0)
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
                    <div class="text-3xl font-bold leading-8 mt-6">{{ $classes->count() }}</div>
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
                            $recentCount = collect($classes->items())->filter(function($item) {
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
                            $todayCount = collect($classes->items())->filter(function($class) {
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
                        <div class="ms-auto">
                            <div class="report-box__indicator bg-success"> 
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4" /> 
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">
                        @php
                            $items = collect($classes->items());
                            $avgStudents = $items->count() > 0 ? round($items->avg('current_students'), 1) : 0;
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

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="modal" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <x-base.lucide icon="AlertTriangle" class="w-16 h-16 text-danger mx-auto mt-3" />
                        <div class="text-3xl mt-5">{{ __('global.are_you_sure') }}</div>
                        <div class="text-slate-500 mt-2">
                            {{ __('global.delete_confirmation') }} "<span id="deleteItemName"></span>"?
                        </div>
                        <div class="text-slate-500 mt-1">
                            {{ __('global.this_action_cannot_be_undone') }}
                        </div>
                    </div>
                    <form id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <div class="px-5 pb-8 text-center">
                            <x-base.button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">
                                {{ __('global.cancel') }}
                            </x-base.button>
                            <x-base.button type="submit" class="btn btn-danger w-24">
                                {{ __('global.delete') }}
                            </x-base.button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Delete Confirmation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Delete button click handler
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.dataset.deleteId;
                    const name = this.dataset.deleteName;
                    const route = this.dataset.deleteRoute;
                    
                    document.getElementById('deleteItemName').textContent = name;
                    document.getElementById('deleteForm').setAttribute('action', route);
                    
                    // Show modal
                    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
                    modal.show();
                });
            });
        });
    </script>
@endsection