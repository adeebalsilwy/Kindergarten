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
                <form method="GET" action="{{ route('events.index') }}">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="flex-1">
                            <div class="relative">
                                <x-base.form-input 
                                    type="text" 
                                    name="search" 
                                    value="{{ request('search') }}"
                                    placeholder="{{ __('global.search_events') }}..." 
                                    class="w-full ps-10 pe-4 py-2" 
                                />
                                <div class="absolute inset-y-0 left-0 ps-3 flex items-center pointer-events-none">
                                    <x-base.lucide icon="Search" class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>
                        </div>
                        <select name="event_type" class="form-select w-full sm:w-40">
                            <option value="">{{ __('global.all_event_types') }}</option>
                            <option value="meeting" {{ request('event_type') == 'meeting' ? 'selected' : '' }}>{{ __('global.meeting') }}</option>
                            <option value="activity" {{ request('event_type') == 'activity' ? 'selected' : '' }}>{{ __('global.activity') }}</option>
                            <option value="outing" {{ request('event_type') == 'outing' ? 'selected' : '' }}>{{ __('global.outing') }}</option>
                            <option value="performance" {{ request('event_type') == 'performance' ? 'selected' : '' }}>{{ __('global.performance') }}</option>
                        </select>
                        <select name="status" class="form-select w-full sm:w-40">
                            <option value="">{{ __('global.all_statuses') }}</option>
                            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>{{ __('global.active') }}</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>{{ __('global.completed') }}</option>
                            <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>{{ __('global.cancelled') }}</option>
                        </select>
                        <select name="sort" class="form-select w-full sm:w-40">
                            <option value="">{{ __('global.sort_by_default') }}</option>
                            <option value="start_datetime_desc" {{ request('sort') == 'start_datetime_desc' ? 'selected' : '' }}>{{ __('global.newest_first') }}</option>
                            <option value="start_datetime_asc" {{ request('sort') == 'start_datetime_asc' ? 'selected' : '' }}>{{ __('global.oldest_first') }}</option>
                        </select>
                        <div class="flex gap-2">
                            <x-base.button as="a" href="{{ route('events.index') }}" variant="secondary" class="flex items-center">
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
                                    <x-base.button variant="outline-danger" 
                                                  data-delete-id="{{ $event->id }}" 
                                                  data-delete-name="{{ $event->title ?? 'Event' }}" 
                                                  data-delete-route="{{ route('events.destroy', $event->id) }}"
                                                  size="sm" class="delete-btn">
                                        <x-base.lucide icon="Trash2" class="w-4 h-4 me-1" />
                                        {{ __('global.delete') }}
                                    </x-base.button>
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
