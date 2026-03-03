@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Curriculum.list') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('Curriculum.list') }}</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            @can('export_curricula')
                        <div class="flex gap-2">
                            <x-base.button variant="outline-primary" as="a" href="{{ route('curricula.export.pdf') }}" class="flex items-center">
                                <x-base.lucide icon="FileText" class="w-4 h-4 me-2" />
                                {{ __('global.export_pdf') }}
                            </x-base.button>
                            <x-base.button variant="outline-success" as="a" href="{{ route('curricula.export.excel') }}" class="flex items-center">
                                <x-base.lucide icon="FileSpreadsheet" class="w-4 h-4 me-2" />
                                {{ __('global.export_excel') }}
                            </x-base.button>
                        </div>
            @endcan

            @can('create_curricula')
            <x-base.button variant="primary" as="a" href="{{ route('curricula.create') }}" class="ms-2 flex items-center">
                <x-base.lucide icon="Plus" class="w-4 h-4 me-2" />
                {{ __('Curriculum.add_new') }}
            </x-base.button>
            @endcan
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Advanced Filter Section -->
        <div class="intro-y col-span-12">
            <div class="box p-5 curriculum-filters">
                <h3 class="text-md font-medium mb-4 flex items-center">
                    <x-base.lucide icon="Filter" class="w-4 h-4 me-2" />
                    {{ __('global.filters') }}
                </h3>
                <form id="filterForm" method="GET" action="{{ route('curricula.index') }}">
                    <div class="filter-row">
                        <div class="filter-group">
                            <x-base.form-label>{{ __('curricula.fields.name') }}</x-base.form-label>
                            <x-base.form-input type="text" name="name" value="{{ request('name') }}" placeholder="{{ __('curricula.fields.name') }}" />
                        </div>
                        <div class="filter-group">
                            <x-base.form-label>{{ __('curricula.fields.grade_level') }}</x-base.form-label>
                            <x-base.form-input type="text" name="grade_level" value="{{ request('grade_level') }}" placeholder="{{ __('curricula.fields.grade_level') }}" />
                        </div>
                        <div class="filter-group">
                            <x-base.form-label>{{ __('curricula.fields.subject_area') }}</x-base.form-label>
                            <x-base.form-input type="text" name="subject_area" value="{{ request('subject_area') }}" placeholder="{{ __('curricula.fields.subject_area') }}" />
                        </div>
                        <div class="filter-group">
                            <x-base.form-label>{{ __('curricula.fields.is_active') }}</x-base.form-label>
                            <x-base.tom-select name="is_active[]" multiple>
                                <option value="1" {{ in_array('1', request('is_active', [])) ? 'selected' : '' }}>{{ __('global.active') }}</option>
                                <option value="0" {{ in_array('0', request('is_active', [])) ? 'selected' : '' }}>{{ __('global.inactive') }}</option>
                            </x-base.tom-select>
                        </div>
                    </div>
                    <div class="filter-row mt-3">
                        <div class="filter-group">
                            <x-base.form-label>{{ __('curricula.fields.curriculum_type') }}</x-base.form-label>
                            <x-base.form-input type="text" name="curriculum_type" value="{{ request('curriculum_type') }}" placeholder="{{ __('curricula.fields.curriculum_type') }}" />
                        </div>
                        <div class="filter-group">
                            <x-base.form-label>{{ __('curricula.fields.duration_weeks') }}</x-base.form-label>
                            <x-base.form-input type="number" name="duration_weeks" value="{{ request('duration_weeks') }}" placeholder="{{ __('curricula.fields.duration_weeks') }}" min="1" />
                        </div>
                        <div class="filter-group">
                            <x-base.form-label>{{ __('curricula.fields.created_by') }}</x-base.form-label>
                            <x-base.form-input type="text" name="created_by" value="{{ request('created_by') }}" placeholder="{{ __('curricula.fields.created_by') }}" />
                        </div>
                        <div class="filter-group">
                            <x-base.form-label>{{ __('global.sort_by') }}</x-base.form-label>
                            <x-base.tom-select name="sort_by">
                                <option value="created_at" {{ request('sort_by') === 'created_at' ? 'selected' : '' }}>{{ __('global.date_created') }}</option>
                                <option value="name" {{ request('sort_by') === 'name' ? 'selected' : '' }}>{{ __('curricula.fields.name') }}</option>
                                <option value="grade_level" {{ request('sort_by') === 'grade_level' ? 'selected' : '' }}>{{ __('curricula.fields.grade_level') }}</option>
                                <option value="subject_area" {{ request('sort_by') === 'subject_area' ? 'selected' : '' }}>{{ __('curricula.fields.subject_area') }}</option>
                            </x-base.tom-select>
                        </div>
                    </div>
                    <div class="filter-actions">
                        <x-base.button variant="primary" type="submit" class="flex items-center">
                            <x-base.lucide icon="Search" class="w-4 h-4 me-2" />
                            {{ __('global.apply_filters') }}
                        </x-base.button>
                        <a href="{{ route('curricula.index') }}" class="btn btn-outline-secondary flex items-center">
                            <x-base.lucide icon="RefreshCw" class="w-4 h-4 me-2" />
                            {{ __('global.clear_filters') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Data List -->
        <div class="intro-y col-span-12 overflow-x-auto">
            <x-base.table class="curriculum-table table-report -mt-2 min-w-full">
                <x-base.table.thead>
                    <x-base.table.tr>
@php
    $canEdit = auth()->user()->can('edit_curricula');
    $canDelete = auth()->user()->can('delete_curricula');
    $canView = auth()->user()->can('view_curricula');
@endphp
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('curricula.fields.name') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('curricula.fields.code') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('curricula.fields.grade_level') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('curricula.fields.subject_area') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('curricula.fields.topics') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('curricula.fields.materials_needed') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('curricula.fields.curriculum_type') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('curricula.fields.duration_weeks') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('curricula.fields.assessment_methods') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('curricula.fields.is_active') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('curricula.fields.published_at') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('curricula.fields.created_by') }}</x-base.table.th>

                        @if($canEdit || $canDelete || $canView)
                        <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.actions') }}</x-base.table.th>
                        @endif
                    </x-base.table.tr>
                </x-base.table.thead>
                <x-base.table.tbody>
                    @forelse($curricula as $curriculum)
                        <x-base.table.tr class="intro-x">
                            <x-base.table.td class="text-center truncate max-w-xs">{{ $curriculum->name ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center truncate max-w-xs">{{ $curriculum->code ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center truncate max-w-xs">{{ $curriculum->grade_level ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center truncate max-w-xs">{{ $curriculum->subject_area ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center max-w-xs">
                                @if($curriculum->topics && is_array($curriculum->topics))
                                    <div class="array-display-list">
                                        @foreach(array_slice($curriculum->topics, 0, 3) as $topic)
                                            <span class="array-display truncate">{{ $topic }}</span>
                                        @endforeach
                                        @if(count($curriculum->topics) > 3)
                                            <span class="array-display truncate">+{{ count($curriculum->topics) - 3 }} more</span>
                                        @endif
                                    </div>
                                @elseif($curriculum->topics)
                                    <span class="truncate">{{ Str::limit($curriculum->topics, 50) }}</span>
                                @else
                                    -
                                @endif
                            </x-base.table.td>
                            <x-base.table.td class="text-center max-w-xs">
                                @if($curriculum->materials_needed && is_array($curriculum->materials_needed))
                                    <div class="array-display-list">
                                        @foreach(array_slice($curriculum->materials_needed, 0, 3) as $material)
                                            <span class="array-display truncate">{{ $material }}</span>
                                        @endforeach
                                        @if(count($curriculum->materials_needed) > 3)
                                            <span class="array-display truncate">+{{ count($curriculum->materials_needed) - 3 }} more</span>
                                        @endif
                                    </div>
                                @elseif($curriculum->materials_needed)
                                    <span class="truncate">{{ Str::limit($curriculum->materials_needed, 50) }}</span>
                                @else
                                    -
                                @endif
                            </x-base.table.td>
                            <x-base.table.td class="text-center truncate max-w-xs">{{ $curriculum->curriculum_type ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center truncate max-w-xs">{{ $curriculum->duration_weeks ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center max-w-xs">
                                @if($curriculum->assessment_methods && is_array($curriculum->assessment_methods))
                                    <div class="array-display-list">
                                        @foreach(array_slice($curriculum->assessment_methods, 0, 3) as $method)
                                            <span class="array-display truncate">{{ $method }}</span>
                                        @endforeach
                                        @if(count($curriculum->assessment_methods) > 3)
                                            <span class="array-display truncate">+{{ count($curriculum->assessment_methods) - 3 }} more</span>
                                        @endif
                                    </div>
                                @elseif($curriculum->assessment_methods)
                                    <span class="truncate">{{ Str::limit($curriculum->assessment_methods, 50) }}</span>
                                @else
                                    -
                                @endif
                            </x-base.table.td>
                            <x-base.table.td class="text-center truncate max-w-xs">
                                <span class="status-badge {{ $curriculum->is_active ? 'status-active' : 'status-inactive' }}">
                                    {{ $curriculum->is_active ? __('global.active') : __('global.inactive') }}
                                </span>
                            </x-base.table.td>
                            <x-base.table.td class="text-center truncate max-w-xs">{{ $curriculum->published_at ? $curriculum->published_at->format('Y-m-d') : '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center truncate max-w-xs">{{ $curriculum->created_by ?? '-' }}</x-base.table.td>

                            @if($canEdit || $canDelete || $canView)
                            <x-base.table.td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    @can('view_curricula')
                                    <x-base.button variant="outline-secondary" as="a" href="{{ route('curricula.show', $curriculum->id) }}" size="sm" class="me-2">
                                        <x-base.lucide icon="Eye" class="w-4 h-4 me-1" />
                                        {{ __('global.view') }}
                                    </x-base.button>
                                    @endcan

                                    @can('edit_curricula')
                                    <x-base.button variant="outline-primary" as="a" href="{{ route('curricula.edit', $curriculum->id) }}" size="sm" class="me-2">
                                        <x-base.lucide icon="Pencil" class="w-4 h-4 me-1" />
                                        {{ __('global.edit') }}
                                    </x-base.button>
                                    @endcan

                                    @can('delete_curricula')
                                    <form action="{{ route('curricula.destroy', $curriculum->id) }}" method="POST" onsubmit="return confirm('{{ __('global.confirm_delete') }}')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <x-base.button variant="outline-danger" type="submit" size="sm">
                                            <x-base.lucide icon="Trash2" class="w-4 h-4 me-1" />
                                            {{ __('global.delete') }}
                                        </x-base.button>
                                    </form>
                                    @endcan
                                </div>
                            </x-base.table.td>
                            @endif
                        </x-base.table.tr>

                    @empty
                        <x-base.table.tr>
                            <x-base.table.td colspan="{{ 12 + ($canEdit || $canDelete || $canView ? 1 : 0) }}" class="text-center py-10">
                                <div class="flex flex-col items-center justify-center">
                                    <x-base.lucide icon="Inbox" class="w-16 h-16 text-gray-400 mb-4" />
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('global.no_data_found') }}</h3>
                                    <p class="text-gray-500 dark:text-gray-400 mt-1">{{ __('global.no_data_description') }}</p>
                                    <x-base.button variant="primary" as="a" href="{{ route('curricula.create') }}" class="mt-4">
                                        <x-base.lucide icon="Plus" class="w-4 h-4 me-2" />
                                        {{ __('Curriculum.add_new') }}
                                    </x-base.button>
                                </div>
                            </x-base.table.td>
                        </x-base.table.tr>
                    @endforelse
                </x-base.table.tbody>
            </x-base.table>
        </div>

        <!-- Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            {!! $curricula->appends(request()->query())->links() !!}
        </div>

        <!-- Summary Cards -->
        @if($curricula->count() > 0)
        <div class="intro-y col-span-12 grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex items-center">
                        <x-base.lucide icon="Database" class="w-8 h-8 text-primary" />
                        <div class="ms-auto">
                            <div class="report-box__indicator bg-success">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4" />
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">{{ $curricula->count() }}</div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.total_records') }}</div>
                </div>
            </div>
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex items-center">
                        <x-base.lucide icon="Activity" class="w-8 h-8 text-pending" />
                        <div class="ms-auto">
                            <div class="report-box__indicator bg-success">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4" />
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">
                        @php
                            $recentCount = $curricula->filter(function($item) {
                                return $item->created_at >= \Carbon\Carbon::now()->subDays(7);
                            })->count();
                        @endphp
                        {{ $recentCount }}
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.added_this_week') }}</div>
                </div>
            </div>
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex items-center">
                        <x-base.lucide icon="Calendar" class="w-8 h-8 text-success" />
                        <div class="ms-auto">
                            <div class="report-box__indicator bg-success">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4" />
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">
                        @php
                            $todayCount = $curricula->filter(fn($item) => \Carbon\Carbon::parse($item->created_at)->isToday())->count();
                        @endphp
                        {{ $todayCount }}
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.added_today') }}</div>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection
