@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Attendance.list') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('Attendance.management') }}</h2>
        <div class="w-full sm:w-auto flex flex-wrap gap-2 mt-4 sm:mt-0">
            @can('create_attendances')
            <x-base.button variant="primary" as="a" href="{{ route('attendances.create') }}" class="flex items-center shadow-md">
                <x-base.lucide icon="CalendarPlus" class="w-4 h-4 me-2" />
                {{ __('global.mark_attendance') }}
            </x-base.button>
            
            <x-base.button variant="outline-primary" as="a" href="{{ route('attendances.bulk') }}" class="flex items-center">
                <x-base.lucide icon="Users" class="w-4 h-4 me-2" />
                {{ __('global.bulk_marking') }}
            </x-base.button>
            @endcan
            
            @can('export_attendances')
            <div class="dropdown">
                <x-base.button variant="outline-secondary" class="flex items-center">
                    <x-base.lucide icon="Download" class="w-4 h-4 me-2" />
                    {{ __('global.export') }}
                    <x-base.lucide icon="ChevronDown" class="w-4 h-4 ms-2" />
                </x-base.button>
                <div class="dropdown-menu w-40">
                    <div class="dropdown-content">
                        <a href="{{ route('attendances.export.pdf') }}" class="dropdown-item flex items-center">
                            <x-base.lucide icon="FileText" class="w-4 h-4 me-2" />
                            {{ __('global.export_pdf') }}
                        </a>
                        <a href="{{ route('attendances.export.excel') }}" class="dropdown-item flex items-center">
                            <x-base.lucide icon="FileSpreadsheet" class="w-4 h-4 me-2" />
                            {{ __('global.export_excel') }}
                        </a>
                    </div>
                </div>
            </div>
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
                    <div class="text-2xl font-bold leading-8 mt-4">{{ $lateArrivals ?? 0 }}</div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.late_arrivals') }}</div>
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
                    <div class="text-2xl font-bold leading-8 mt-4">{{ $absentCount ?? 0 }}</div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.absent_today') }}</div>
                </div>
            </div>
        </div>
        
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-info/20 bg-info/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-info/10 flex items-center justify-center">
                            <x-base.lucide icon="BarChart3" class="w-6 h-6 text-info" />
                        </div>
                        <div class="ms-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                                <span class="text-xs">{{ __('global.average') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">{{ $weeklyAverage ?? 0 }}%</div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.weekly_avg') }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Calendar View Toggle -->
        <div class="intro-y col-span-12">
            <div class="box p-5">
                <div class="flex flex-col sm:flex-row gap-4 items-center">
                    <div class="flex-1 flex gap-2">
                        <x-base.button id="calendarViewBtn" variant="primary" class="flex items-center" onclick="toggleView('calendar')">
                            <x-base.lucide icon="Calendar" class="w-4 h-4 me-2" />
                            {{ __('global.calendar_view') }}
                        </x-base.button>
                        <x-base.button id="listViewBtn" variant="outline-secondary" class="flex items-center" onclick="toggleView('list')">
                            <x-base.lucide icon="List" class="w-4 h-4 me-2" />
                            {{ __('global.list_view') }}
                        </x-base.button>
                    </div>
                    
                    <div class="flex gap-2">
                        <input type="date" id="attendanceDate" class="form-control w-40" value="{{ now()->format('Y-m-d') }}" onchange="loadAttendanceData()">
                        <select id="classFilter" class="form-select w-40" onchange="loadAttendanceData()">
                            <option value="">{{ __('global.all_classes') }}</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                        <select id="statusFilter" class="form-select w-32" onchange="applyFilters()">
                            <option value="">{{ __('global.all') }}</option>
                            <option value="present">{{ __('global.present') }}</option>
                            <option value="absent">{{ __('global.absent') }}</option>
                            <option value="late">{{ __('global.late') }}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Calendar View -->
        <div id="calendarView" class="intro-y col-span-12">
            <div class="box p-5">
                <div id="attendanceCalendar" class="min-h-[500px]"></div>
            </div>
        </div>
        
        <!-- List View -->
        <div id="listView" class="intro-y col-span-12 hidden">
            <div class="overflow-x-auto">
                <x-base.table class="table-report -mt-2">
                    <x-base.table.thead>
                        <x-base.table.tr>
@php
    $canEdit = auth()->user()->can('edit_attendances');
    $canDelete = auth()->user()->can('delete_attendances');
    $canView = auth()->user()->can('view_attendances');
@endphp
                            <x-base.table.th class="whitespace-nowrap">{{ __('global.student') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap">{{ __('global.class') }}</x-base.table.th>
                            <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.date') }}</x-base.table.th>
                            <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.status') }}</x-base.table.th>
                            <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.check_in') }}</x-base.table.th>
                            <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.check_out') }}</x-base.table.th>

                        @if($canEdit || $canDelete || $canView)
                        <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.actions') }}</x-base.table.th>
                        @endif
                        </x-base.table.tr>
                    </x-base.table.thead>
                    <x-base.table.tbody id="attendanceTableBody">
                        @forelse($attendances as $attendance)
                            <x-base.table.tr class="intro-x" data-status="{{ $attendance->status }}" data-class="{{ $attendance->child->class_id ?? '' }}">
                                <x-base.table.td>
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 image-fit zoom-in me-3">
                                            <img alt="{{ $attendance->child->name }}" class="rounded-full shadow-md" 
                                                 src="{{ $attendance->child->photo_path ? asset('storage/' . $attendance->child->photo_path) : asset('dist/images/profile-3.jpg') }}">
                                        </div>
                                        <div>
                                            <div class="font-medium">{{ $attendance->child->name ?? 'N/A' }}</div>
                                            <div class="text-slate-500 text-xs">{{ $attendance->child->guardian->name ?? 'No Guardian' }}</div>
                                        </div>
                                    </div>
                                </x-base.table.td>
                                <x-base.table.td>
                                    <span class="px-2 py-1 text-xs rounded-full bg-primary/10 text-primary border border-primary/20">
                                        {{ $attendance->child->class->name ?? 'No Class' }}
                                    </span>
                                </x-base.table.td>
                                <x-base.table.td class="text-center">{{ $attendance->date->format('M d, Y') }}</x-base.table.td>
                                <x-base.table.td class="text-center">
                                    <span class="px-2 py-1 text-xs rounded-full 
                                        {{ $attendance->status == 'present' ? 'bg-success/10 text-success border border-success/20' : '' }}
                                        {{ $attendance->status == 'absent' ? 'bg-danger/10 text-danger border border-danger/20' : '' }}
                                        {{ $attendance->status == 'late' ? 'bg-warning/10 text-warning border border-warning/20' : '' }}
                                        {{ $attendance->status == 'excused' ? 'bg-info/10 text-info border border-info/20' : '' }}">
                                        {{ __('global.' . $attendance->status) }}
                                    </span>
                                </x-base.table.td>
                                <x-base.table.td class="text-center">{{ $attendance->check_in_time ?? '-' }}</x-base.table.td>
                                <x-base.table.td class="text-center">{{ $attendance->check_out_time ?? '-' }}</x-base.table.td>

                                @if($canEdit || $canDelete || $canView)
                                <x-base.table.td class="table-report__action w-56">
                                    <div class="flex justify-center items-center gap-1">
                                        @can('view_attendances')
                                        <x-base.button variant="outline-secondary" as="a" href="{{ route('attendances.show', $attendance->id) }}" size="sm" class="px-2 py-1">
                                            <x-base.lucide icon="Eye" class="w-3 h-3" />
                                        </x-base.button>
                                        @endcan
                                        
                                        @can('edit_attendances')
                                        <x-base.button variant="outline-primary" as="a" href="{{ route('attendances.edit', $attendance->id) }}" size="sm" class="px-2 py-1">
                                            <x-base.lucide icon="Pencil" class="w-3 h-3" />
                                        </x-base.button>
                                        @endcan
                                    </div>
                                </x-base.table.td>
                                @endif
                            </x-base.table.tr>
                        @empty
                            <x-base.table.tr>
                                <x-base.table.td colspan="7" class="text-center py-10">
                                    <div class="flex flex-col items-center justify-center">
                                        <x-base.lucide icon="Calendar" class="w-16 h-16 text-gray-400 mb-4" />
                                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('global.no_attendance_records') }}</h3>
                                        <p class="text-gray-500 dark:text-gray-400 mt-1">{{ __('global.select_date_to_view_attendance') }}</p>
                                        @can('create_attendances')
                                        <x-base.button variant="primary" as="a" href="{{ route('attendances.create') }}" class="mt-4 flex items-center">
                                            <x-base.lucide icon="CalendarPlus" class="w-4 h-4 me-2" />
                                            {{ __('global.mark_attendance') }}
                                        </x-base.button>
                                        @endcan
                                    </div>
                                </x-base.table.td>
                            </x-base.table.tr>
                        @endforelse
                    </x-base.table.tbody>
                </x-base.table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            {!! $attendances->links() !!}
        </div>

        <!-- Detailed Statistics -->
        @if($attendances->count() > 0)
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
                    <div class="text-3xl font-bold leading-8 mt-6">{{ $attendances->count() }}</div>
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
                            $recentCount = $attendances->filter(function($item) {
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
                            $thisMonthCount = $attendances->filter(function($item) {
                                return $item->date >= \Carbon\Carbon::now()->startOfMonth() 
                                    && $item->date <= \Carbon\Carbon::now()->endOfMonth();
                            })->count();
                        @endphp
                        {{ $thisMonthCount }}
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.this_month') }}</div>
                </div>
            </div>
            
            <div class="report-box zoom-in">
                <div class="box p-5 border border-success/20 bg-success/5">
                    <div class="flex items-center">
                        <x-base.lucide icon="TrendingUp" class="w-8 h-8 text-success" />
                        <div class="ms-auto">
                            <div class="report-box__indicator bg-success"> 
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4" /> 
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">
                        @php
                            $presentPercentage = $attendances->count() > 0 ? 
                                round(($attendances->where('status', 'present')->count() / $attendances->count()) * 100, 1) : 0;
                        @endphp
                        {{ $presentPercentage }}%
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.present_rate') }}</div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- JavaScript for Attendance Management -->
    <script>
        let currentView = 'calendar';
        
        function toggleView(view) {
            currentView = view;
            
            if (view === 'calendar') {
                document.getElementById('calendarView').classList.remove('hidden');
                document.getElementById('listView').classList.add('hidden');
                document.getElementById('calendarViewBtn').variant = 'primary';
                document.getElementById('listViewBtn').variant = 'outline-secondary';
            } else {
                document.getElementById('calendarView').classList.add('hidden');
                document.getElementById('listView').classList.remove('hidden');
                document.getElementById('calendarViewBtn').variant = 'outline-secondary';
                document.getElementById('listViewBtn').variant = 'primary';
            }
        }
        
        function loadAttendanceData() {
            const date = document.getElementById('attendanceDate').value;
            const classId = document.getElementById('classFilter').value;
            
            // This would make an AJAX call to load attendance data
            console.log('Loading attendance for:', date, 'Class:', classId);
            
            // Simulate loading data
            setTimeout(() => {
                updateCalendarView(date);
                updateListView(date, classId);
            }, 500);
        }
        
        function updateCalendarView(date) {
            // Update calendar display with attendance data
            const calendar = document.getElementById('attendanceCalendar');
            calendar.innerHTML = `
                <div class="text-center py-10">
                    <div class="text-2xl font-bold mb-2">${new Date(date).toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}</div>
                    <div class="grid grid-cols-7 gap-2 mt-6">
                        <div class="text-center font-medium p-2 bg-slate-100 rounded">{{ __('global.sunday') }}</div>
                        <div class="text-center font-medium p-2 bg-slate-100 rounded">{{ __('global.monday') }}</div>
                        <div class="text-center font-medium p-2 bg-slate-100 rounded">{{ __('global.tuesday') }}</div>
                        <div class="text-center font-medium p-2 bg-slate-100 rounded">{{ __('global.wednesday') }}</div>
                        <div class="text-center font-medium p-2 bg-slate-100 rounded">{{ __('global.thursday') }}</div>
                        <div class="text-center font-medium p-2 bg-slate-100 rounded">{{ __('global.friday') }}</div>
                        <div class="text-center font-medium p-2 bg-slate-100 rounded">{{ __('global.saturday') }}</div>
                    </div>
                    <div class="mt-4 text-slate-500">{{ __('global.calendar_view_coming_soon') }}</div>
                </div>
            `;
        }
        
        function updateListView(date, classId) {
            // Filter table rows based on selected criteria
            const rows = document.querySelectorAll('#attendanceTableBody tr[data-status]');
            const statusFilter = document.getElementById('statusFilter').value;
            
            rows.forEach(row => {
                const rowStatus = row.getAttribute('data-status');
                const rowClass = row.getAttribute('data-class');
                
                const statusMatch = !statusFilter || rowStatus === statusFilter;
                const classMatch = !classId || rowClass === classId;
                
                if (statusMatch && classMatch) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
        
        function applyFilters() {
            loadAttendanceData();
        }
        
        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            loadAttendanceData();
        });
    </script>
@endsection
