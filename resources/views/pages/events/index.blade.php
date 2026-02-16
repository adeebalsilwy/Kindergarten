@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Event.list') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('Event.list') }}</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            @can('export_events')
            
                        <div class="flex gap-2">
                            <x-base.button variant="outline-primary" as="a" href="{{ route('events.export.pdf') }}" class="flex items-center">
                                <x-base.lucide icon="FileText" class="w-4 h-4 me-2" />
                                {{ __('global.export_pdf') }}
                            </x-base.button>
                            <x-base.button variant="outline-success" as="a" href="{{ route('events.export.excel') }}" class="flex items-center">
                                <x-base.lucide icon="FileSpreadsheet" class="w-4 h-4 me-2" />
                                {{ __('global.export_excel') }}
                            </x-base.button>
                        </div>
            @endcan
            
            @can('create_events')
            <x-base.button variant="primary" as="a" href="{{ route('events.create') }}" class="ms-2 flex items-center">
                <x-base.lucide icon="Plus" class="w-4 h-4 me-2" />
                {{ __('Event.add_new') }}
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
    $canEdit = auth()->user()->can('edit_events');
    $canDelete = auth()->user()->can('delete_events');
    $canView = auth()->user()->can('view_events');
@endphp
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('events.fields.title') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('events.fields.start_datetime') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('events.fields.end_datetime') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('events.fields.location') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('events.fields.event_type') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('events.fields.organizer') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('events.fields.class_id') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('events.fields.teacher_id') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('events.fields.attendees') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('events.fields.requires_confirmation') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('events.fields.is_public') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('events.fields.is_recurring') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('events.fields.recurrence_pattern') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('events.fields.recurrence_end_date') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('events.fields.recurring_days') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('events.fields.status') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('events.fields.send_reminders') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('events.fields.reminder_hours_before') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('events.fields.documents') }}</x-base.table.th>

                        @if($canEdit || $canDelete || $canView)
                        <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.actions') }}</x-base.table.th>
                        @endif
                    </x-base.table.tr>
                </x-base.table.thead>
                <x-base.table.tbody>
                    @forelse($events as $event)
                        <x-base.table.tr class="intro-x">
                            <x-base.table.td class="text-center">{{ $event->title ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $event->start_datetime ? $event->start_datetime->format('Y-m-d') : '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $event->end_datetime ? $event->end_datetime->format('Y-m-d') : '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $event->location ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $event->event_type ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $event->organizer ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $event->class_id ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $event->teacher_id ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $event->attendees ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">
                                <div class="flex items-center justify-center {{ $event->requires_confirmation ? 'text-success' : 'text-danger' }}"> <x-base.lucide icon="{{ $event->requires_confirmation ? 'CheckSquare' : 'XSquare' }}" class="w-4 h-4 me-2" /> {{ $event->requires_confirmation ? __('global.yes') : __('global.no') }} </div>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">
                                <div class="flex items-center justify-center {{ $event->is_public ? 'text-success' : 'text-danger' }}"> <x-base.lucide icon="{{ $event->is_public ? 'CheckSquare' : 'XSquare' }}" class="w-4 h-4 me-2" /> {{ $event->is_public ? __('global.yes') : __('global.no') }} </div>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">
                                <div class="flex items-center justify-center {{ $event->is_recurring ? 'text-success' : 'text-danger' }}"> <x-base.lucide icon="{{ $event->is_recurring ? 'CheckSquare' : 'XSquare' }}" class="w-4 h-4 me-2" /> {{ $event->is_recurring ? __('global.yes') : __('global.no') }} </div>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">{{ $event->recurrence_pattern ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $event->recurrence_end_date ? $event->recurrence_end_date->format('Y-m-d') : '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $event->recurring_days ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $event->status ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">
                                <div class="flex items-center justify-center {{ $event->send_reminders ? 'text-success' : 'text-danger' }}"> <x-base.lucide icon="{{ $event->send_reminders ? 'CheckSquare' : 'XSquare' }}" class="w-4 h-4 me-2" /> {{ $event->send_reminders ? __('global.yes') : __('global.no') }} </div>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">{{ $event->reminder_hours_before ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $event->documents ?? '-' }}</x-base.table.td>

                            @if($canEdit || $canDelete || $canView)
                            <x-base.table.td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    @can('view_events')
                                    <x-base.button variant="outline-secondary" as="a" href="{{ route('events.show', $event->id) }}" size="sm" class="me-2">
                                        <x-base.lucide icon="Eye" class="w-4 h-4 me-1" />
                                        {{ __('global.view') }}
                                    </x-base.button>
                                    @endcan
                                    
                                    @can('edit_events')
                                    <x-base.button variant="outline-primary" as="a" href="{{ route('events.edit', $event->id) }}" size="sm" class="me-2">
                                        <x-base.lucide icon="Pencil" class="w-4 h-4 me-1" />
                                        {{ __('global.edit') }}
                                    </x-base.button>
                                    @endcan
                                    
                                    @can('delete_events')
                                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('{{ __('global.confirm_delete') }}')" class="inline">
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
                            <x-base.table.td colspan="{{ 19 + ($canEdit || $canDelete || $canView? 1 : 0) }}" class="text-center py-10">
                                <div class="flex flex-col items-center justify-center">
                                    <x-base.lucide icon="Inbox" class="w-16 h-16 text-gray-400 mb-4" />
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('global.no_data_found') }}</h3>
                                    <p class="text-gray-500 dark:text-gray-400 mt-1">{{ __('global.no_data_description') }}</p>
                                    <x-base.button variant="primary" as="a" href="{{ route('events.create') }}" class="mt-4">
                                        <x-base.lucide icon="Plus" class="w-4 h-4 me-2" />
                                        {{ __('Event.add_new') }}
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
            {!! $events->links() !!}
        </div>

        <!-- Summary Cards -->
        @if($events->count() > 0)
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
                    <div class="text-3xl font-bold leading-8 mt-6">{{ $events->count() }}</div>
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
                            $recentCount = $events->filter(function($item) {
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
                            $todayCount = $events->filter(fn($item) => \Carbon\Carbon::parse($item->created_at)->isToday())->count();
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
