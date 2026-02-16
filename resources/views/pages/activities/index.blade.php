@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Activity.list') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('Activity.list') }}</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            @can('export_activities')
            
                        <div class="flex gap-2">
                            <x-base.button variant="outline-primary" as="a" href="{{ route('activities.export.pdf') }}" class="flex items-center">
                                <x-base.lucide icon="FileText" class="w-4 h-4 me-2" />
                                {{ __('global.export_pdf') }}
                            </x-base.button>
                            <x-base.button variant="outline-success" as="a" href="{{ route('activities.export.excel') }}" class="flex items-center">
                                <x-base.lucide icon="FileSpreadsheet" class="w-4 h-4 me-2" />
                                {{ __('global.export_excel') }}
                            </x-base.button>
                        </div>
            @endcan
            
            @can('create_activities')
            <x-base.button variant="primary" as="a" href="{{ route('activities.create') }}" class="ms-2 flex items-center">
                <x-base.lucide icon="Plus" class="w-4 h-4 me-2" />
                {{ __('Activity.add_new') }}
            </x-base.button>
            @endcan
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Filter Section -->
        <div class="intro-y col-span-12">
            <div class="box p-5">
                <div class="flex flex-col sm:flex-row gap-4">
                    <div class="flex-1">
                        <x-base.form-input type="text" placeholder="{{ __('global.search') }}" class="w-full" />
                    </div>
                    <x-base.button variant="secondary" class="flex items-center">
                        <x-base.lucide icon="Filter" class="w-4 h-4 me-2" />
                        {{ __('global.filter') }}
                    </x-base.button>
                </div>
            </div>
        </div>

        <!-- Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <x-base.table class="table-report -mt-2">
                <x-base.table.thead>
                    <x-base.table.tr>
@php
    $canEdit = auth()->user()->can('edit_activities');
    $canDelete = auth()->user()->can('delete_activities');
    $canView = auth()->user()->can('view_activities');
@endphp
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('activities.fields.title') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('activities.fields.class_id') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('activities.fields.teacher_id') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('activities.fields.curriculum_id') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('activities.fields.scheduled_date') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('activities.fields.start_time') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('activities.fields.end_time') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('activities.fields.activity_type') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('activities.fields.difficulty_level') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('activities.fields.required_materials') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('activities.fields.estimated_duration') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('activities.fields.location') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('activities.fields.is_active') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('activities.fields.learning_objectives') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('activities.fields.outcomes') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('activities.fields.completed_at') }}</x-base.table.th>

                        @if($canEdit || $canDelete || $canView)
                        <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.actions') }}</x-base.table.th>
                        @endif
                    </x-base.table.tr>
                </x-base.table.thead>
                <x-base.table.tbody>
                    @forelse($activities as $activity)
                        <x-base.table.tr class="intro-x">
                            <x-base.table.td class="text-center">{{ $activity->title ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $activity->class_id ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $activity->teacher_id ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $activity->curriculum_id ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $activity->scheduled_date ? $activity->scheduled_date->format('Y-m-d') : '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $activity->start_time ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $activity->end_time ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $activity->activity_type ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $activity->difficulty_level ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $activity->required_materials ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $activity->estimated_duration ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $activity->location ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">
                                <div class="flex items-center justify-center {{ $activity->is_active ? 'text-success' : 'text-danger' }}"> <x-base.lucide icon="{{ $activity->is_active ? 'CheckSquare' : 'XSquare' }}" class="w-4 h-4 me-2" /> {{ $activity->is_active ? __('global.yes') : __('global.no') }} </div>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">{{ $activity->learning_objectives ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $activity->outcomes ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $activity->completed_at ? $activity->completed_at->format('Y-m-d') : '-' }}</x-base.table.td>

                            @if($canEdit || $canDelete || $canView)
                            <x-base.table.td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    @can('view_activities')
                                    <x-base.button variant="outline-secondary" as="a" href="{{ route('activities.show', $activity->id) }}" size="sm" class="me-2">
                                        <x-base.lucide icon="Eye" class="w-4 h-4 me-1" />
                                        {{ __('global.view') }}
                                    </x-base.button>
                                    @endcan
                                    
                                    @can('edit_activities')
                                    <x-base.button variant="outline-primary" as="a" href="{{ route('activities.edit', $activity->id) }}" size="sm" class="me-2">
                                        <x-base.lucide icon="Pencil" class="w-4 h-4 me-1" />
                                        {{ __('global.edit') }}
                                    </x-base.button>
                                    @endcan
                                    
                                    @can('delete_activities')
                                    <form action="{{ route('activities.destroy', $activity->id) }}" method="POST" onsubmit="return confirm('{{ __('global.confirm_delete') }}')" class="inline">
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
                            <x-base.table.td colspan="{{ 16 + ($canEdit || $canDelete || $canView ? 1 : 0) }}" class="text-center py-10">
                                <div class="flex flex-col items-center justify-center">
                                    <x-base.lucide icon="Inbox" class="w-16 h-16 text-gray-400 mb-4" />
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('global.no_data_found') }}</h3>
                                    <p class="text-gray-500 dark:text-gray-400 mt-1">{{ __('global.no_data_description') }}</p>
                                    <x-base.button variant="primary" as="a" href="{{ route('activities.create') }}" class="mt-4">
                                        <x-base.lucide icon="Plus" class="w-4 h-4 me-2" />
                                        {{ __('Activity.add_new') }}
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
            {!! $activities->links() !!}
        </div>

        <!-- Summary Cards -->
        @if($activities->count() > 0)
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
                    <div class="text-3xl font-bold leading-8 mt-6">{{ $activities->count() }}</div>
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
                            $recentCount = $activities->filter(function($item) {
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
                            $todayCount = $activities->filter(fn($item) => \Carbon\Carbon::parse($item->created_at)->isToday())->count();
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
