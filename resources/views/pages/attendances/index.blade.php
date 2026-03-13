@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('global.attendance_list') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">
            {{ __('global.attendance_list') }}
        </h2>
        <div class="w-full sm:w-auto flex flex-wrap gap-2 mt-4 sm:mt-0">
            @can('create_attendances')
                <x-base.button variant="primary" as="a" href="{{ route('attendances.create') }}" class="flex items-center shadow-md">
                    <x-base.lucide icon="CalendarPlus" class="w-4 h-4 me-2" />
                    {{ __('global.add_new_attendance') }}
                </x-base.button>
                
                <x-base.button variant="outline-primary" as="a" href="{{ route('attendances.bulk') }}" class="flex items-center">
                    <x-base.lucide icon="Users" class="w-4 h-4 me-2" />
                    {{ __('global.bulk_attendance') }}
                </x-base.button>
            @endcan
            
            @can('export_attendances')
                <x-base.button variant="outline-secondary" as="a" href="{{ route('attendances.export.pdf') }}" class="flex items-center">
                    <x-base.lucide icon="FileText" class="w-4 h-4 me-2" />
                    {{ __('global.export_pdf') }}
                </x-base.button>
            @endcan
        </div>
    </div>

    <!-- Attendance Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-5 gap-6 mt-5">
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-primary/20 bg-primary/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                            <x-base.lucide icon="CalendarCheck" class="w-6 h-6 text-primary" />
                        </div>
                        <div class="ms-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                                <span class="text-xs">{{ __('global.today') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">{{ $todayAttendanceCount ?? 0 }}</div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.present_today') }}</div>
                </div>
            </div>
        </div>
        
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-success/20 bg-success/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-success/10 flex items-center justify-center">
                            <x-base.lucide icon="Percent" class="w-6 h-6 text-success" />
                        </div>
                        <div class="ms-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                                <span class="text-xs">{{ __('global.rate') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">{{ $attendanceRate ?? 0 }}%</div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.attendance_rate') }}</div>
                </div>
            </div>
        </div>
        
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-warning/20 bg-warning/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-warning/10 flex items-center justify-center">
                            <x-base.lucide icon="Clock" class="w-6 h-6 text-warning" />
                        </div>
                        <div class="ms-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                                <span class="text-xs">{{ __('global.late') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">{{ $todayLateCount ?? 0 }}</div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.late_today') }}</div>
                </div>
            </div>
        </div>
        
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-danger/20 bg-danger/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-danger/10 flex items-center justify-center">
                            <x-base.lucide icon="XCircle" class="w-6 h-6 text-danger" />
                        </div>
                        <div class="ms-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                                <span class="text-xs">{{ __('global.absent') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">{{ $todayAbsentCount ?? 0 }}</div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.absent_today') }}</div>
                </div>
            </div>
        </div>
        
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-info/20 bg-info/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-info/10 flex items-center justify-center">
                            <x-base.lucide icon="CheckCircle" class="w-6 h-6 text-info" />
                        </div>
                        <div class="ms-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                                <span class="text-xs">{{ __('global.excused') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">{{ $todayExcusedCount ?? 0 }}</div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.excused_today') }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Filter Section -->
        <div class="intro-y col-span-12">
            <div class="box p-5">
                <form method="GET" action="{{ route('attendances.index') }}">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <label class="form-label font-bold">{{ __('global.search') }}</label>
                            <div class="relative">
                                <x-base.form-input 
                                    type="text" 
                                    name="search"
                                    value="{{ request('search') }}"
                                    placeholder="{{ __('global.search_attendance') }}..." 
                                    class="w-full ps-10"
                                />
                                <div class="absolute inset-y-0 left-0 ps-3 flex items-center pointer-events-none">
                                    <x-base.lucide icon="Search" class="h-4 w-4 text-slate-400" />
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 md:col-span-4 lg:col-span-2">
                            <label class="form-label font-bold">{{ __('global.class') }}</label>
                            <x-base.form-select name="class_id" class="w-full">
                                <option value="">{{ __('global.all_classes') }}</option>
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}" {{ request('class_id') == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                                @endforeach
                            </x-base.form-select>
                        </div>
                        <div class="col-span-12 md:col-span-4 lg:col-span-2">
                            <label class="form-label font-bold">{{ __('global.status') }}</label>
                            <x-base.form-select name="status" class="w-full">
                                <option value="">{{ __('global.all_status') }}</option>
                                <option value="present" {{ request('status') == 'present' ? 'selected' : '' }}>{{ __('global.present') }}</option>
                                <option value="absent" {{ request('status') == 'absent' ? 'selected' : '' }}>{{ __('global.absent') }}</option>
                                <option value="late" {{ request('status') == 'late' ? 'selected' : '' }}>{{ __('global.late') }}</option>
                                <option value="excused" {{ request('status') == 'excused' ? 'selected' : '' }}>{{ __('global.excused') }}</option>
                            </x-base.form-select>
                        </div>
                        <div class="col-span-12 md:col-span-4 lg:col-span-2">
                            <label class="form-label font-bold">{{ __('global.student') }}</label>
                            <x-base.form-select name="child_id" class="w-full">
                                <option value="">{{ __('global.all') }}</option>
                                @foreach($children ?? [] as $child)
                                    <option value="{{ $child->id }}" {{ request('child_id') == $child->id ? 'selected' : '' }}>{{ $child->name }}</option>
                                @endforeach
                            </x-base.form-select>
                        </div>
                        <div class="col-span-12 md:col-span-6 lg:col-span-2">
                            <label class="form-label font-bold">{{ __('global.from') }}</label>
                            <x-base.form-input type="date" name="date_from" value="{{ request('date_from') }}" class="w-full" />
                        </div>
                        <div class="col-span-12 md:col-span-6 lg:col-span-2">
                            <label class="form-label font-bold">{{ __('global.to') }}</label>
                            <x-base.form-input type="date" name="date_to" value="{{ request('date_to') }}" class="w-full" />
                        </div>
                        <div class="col-span-12 lg:col-span-1 flex items-end gap-2">
                            <x-base.button type="submit" variant="primary" class="w-full shadow-md">
                                <x-base.lucide icon="Filter" class="w-4 h-4" />
                            </x-base.button>
                            <x-base.button as="a" href="{{ route('attendances.index') }}" variant="outline-secondary" class="w-full">
                                <x-base.lucide icon="RotateCcw" class="w-4 h-4" />
                            </x-base.button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Attendance List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <x-base.table class="table-report -mt-2">
                <x-base.table.thead>
                    <x-base.table.tr>
                        <x-base.table.th class="whitespace-nowrap">{{ __('global.student') }}</x-base.table.th>
                        <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.date') }}</x-base.table.th>
                        <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.status') }}</x-base.table.th>
                        <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.check_in') }}</x-base.table.th>
                        <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.check_out') }}</x-base.table.th>
                        <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.absence_reason') }}</x-base.table.th>
                        <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.actions') }}</x-base.table.th>
                    </x-base.table.tr>
                </x-base.table.thead>
                <x-base.table.tbody>
                    @forelse($attendances as $attendance)
                        <x-base.table.tr class="intro-x">
                            <x-base.table.td>
                                <div class="flex items-center">
                                    <div class="w-10 h-10 image-fit zoom-in me-3">
                                        <img alt="{{ $attendance->child->name ?? '' }}" class="rounded-full shadow-md" src="{{ $attendance->child->photo_path ? asset($attendance->child->photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode($attendance->child->name ?? 'N/A') . '&background=random' }}">
                                    </div>
                                    <div>
                                        <a href="{{ route('children.show', $attendance->child_id) }}" class="font-medium whitespace-nowrap hover:text-primary transition-colors">
                                            {{ $attendance->child->name ?? 'N/A' }}
                                        </a>
                                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                            {{ $attendance->child->class->name ?? '' }}
                                        </div>
                                    </div>
                                </div>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">
                                <div class="whitespace-nowrap font-medium">{{ $attendance->date->format('Y-m-d') }}</div>
                                <div class="text-slate-400 text-xs mt-0.5">{{ $attendance->date->format('l') }}</div>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">
                                <span class="px-3 py-1 rounded-full text-xs font-medium 
                                    {{ $attendance->status == 'present' ? 'bg-success/10 text-success border border-success/20' : '' }}
                                    {{ $attendance->status == 'absent' ? 'bg-danger/10 text-danger border border-danger/20' : '' }}
                                    {{ $attendance->status == 'late' ? 'bg-warning/10 text-warning border border-warning/20' : '' }}
                                    {{ $attendance->status == 'excused' ? 'bg-info/10 text-info border border-info/20' : '' }}">
                                    {{ __('global.' . $attendance->status) }}
                                </span>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">
                                <div class="font-medium {{ $attendance->check_in ? 'text-slate-600' : 'text-slate-300' }}">
                                    {{ $attendance->check_in ?: '--:--' }}
                                </div>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">
                                <div class="font-medium {{ $attendance->check_out ? 'text-slate-600' : 'text-slate-300' }}">
                                    {{ $attendance->check_out ?: '--:--' }}
                                </div>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">
                                <span class="text-slate-500 text-xs">{{ $attendance->absence_reason ?: '-' }}</span>
                            </x-base.table.td>
                            <x-base.table.td class="table-report__action">
                                <div class="flex justify-center items-center gap-2">
                                    <x-base.button variant="outline-secondary" as="a" href="{{ route('attendances.show', $attendance->id) }}" size="sm" class="px-2 py-1">
                                        <x-base.lucide icon="Eye" class="w-4 h-4" />
                                    </x-base.button>
                                    @can('edit_attendances')
                                        <x-base.button variant="outline-primary" as="a" href="{{ route('attendances.edit', $attendance->id) }}" size="sm" class="px-2 py-1">
                                            <x-base.lucide icon="Pencil" class="w-4 h-4" />
                                        </x-base.button>
                                    @endcan
                                    @can('delete_attendances')
                                        <x-base.button variant="outline-danger" size="sm" class="px-2 py-1 delete-btn" 
                                            data-id="{{ $attendance->id }}" 
                                            data-name="{{ $attendance->date->format('Y-m-d') }} - {{ $attendance->child->name ?? '' }}" 
                                            data-delete-url="{{ route('attendances.destroy', $attendance->id) }}"
                                            data-tw-toggle="modal"
                                            data-tw-target="#delete-confirmation-modal">
                                            <x-base.lucide icon="Trash2" class="w-4 h-4" />
                                        </x-base.button>
                                    @endcan
                                </div>
                            </x-base.table.td>
                        </x-base.table.tr>
                    @empty
                        <x-base.table.tr>
                            <x-base.table.td colspan="7" class="text-center py-20">
                                <div class="flex flex-col items-center">
                                    <x-base.lucide icon="Database" class="w-16 h-16 text-slate-300 mb-4" />
                                    <div class="text-lg font-medium text-slate-500">{{ __('global.no_records_found') }}</div>
                                </div>
                            </x-base.table.td>
                        </x-base.table.tr>
                    @endforelse
                </x-base.table.tbody>
            </x-base.table>
        </div>
        
        <!-- Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-5">
            {{ $attendances->links() }}
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <x-base.dialog id="delete-confirmation-modal">
        <x-base.dialog.panel>
            <div class="p-5 text-center">
                <x-base.lucide icon="XCircle" class="w-16 h-16 text-danger mx-auto mt-3" />
                <div class="text-3xl mt-5">{{ __('global.confirm_delete') }}</div>
                <div class="text-slate-500 mt-2">
                    {{ __('global.confirm_delete_message') }}
                </div>
                <div class="text-slate-500 mt-2 font-bold" id="deleteAttendanceName"></div>
            </div>
            <div class="px-5 pb-8 text-center">
                <x-base.button type="button" data-tw-dismiss="modal" variant="outline-secondary" class="w-24 mr-1">
                    {{ __('global.cancel') }}
                </x-base.button>
                <form id="deleteForm" method="POST" action="" class="inline">
                    @csrf
                    @method('DELETE')
                    <x-base.button type="submit" variant="danger" class="w-24">
                        {{ __('global.delete') }}
                    </x-base.button>
                </form>
            </div>
        </x-base.dialog.panel>
    </x-base.dialog>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle delete button clicks
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const name = this.getAttribute('data-name');
                    const deleteUrl = this.getAttribute('data-delete-url');
                    
                    document.getElementById('deleteAttendanceName').textContent = name;
                    
                    const formElement = document.getElementById('deleteForm');
                    if (formElement && deleteUrl) {
                        formElement.action = deleteUrl;
                    }
                });
            });
        });
    </script>
@endsection
