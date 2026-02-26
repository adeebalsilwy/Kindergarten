@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Attendance.show') }} - {{ $attendance->date->format('M d, Y') }}</title>
    <style>
        .tab-content { display: none; }
        .tab-content.active { display: block; }
        .tab-button.active { background-color: #3b82f6; color: white; }
        .info-card { transition: all 0.3s ease; }
        .info-card:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
    </style>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">
            <x-base.lucide icon="CheckCircle" class="w-5 h-5 inline me-2" />
            {{ __('global.attendance_record') }} - {{ $attendance->date->format('M d, Y') }}
        </h2>
        <div class="ms-auto flex gap-2">
            <x-base.button variant="secondary" as="a" href="{{ route('attendances.index') }}">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
                {{ __('global.back') }}
            </x-base.button>
            @can('edit_attendances')
            <x-base.button variant="primary" as="a" href="{{ route('attendances.edit', $attendance->id) }}">
                <x-base.lucide icon="Pencil" class="w-4 h-4 me-2" />
                {{ __('global.edit') }}
            </x-base.button>
            @endcan
        </div>
    </div>

    <!-- Tab Navigation -->
    <div class="intro-y mt-5">
        <div class="border-b border-slate-200">
            <nav class="flex space-x-2 overflow-x-auto">
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg active" data-tab="overview">
                    <x-base.lucide icon="Layout" class="w-4 h-4 me-2" />
                    {{ __('global.overview') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="student">
                    <x-base.lucide icon="User" class="w-4 h-4 me-2" />
                    {{ __('global.student_info') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="attendance">
                    <x-base.lucide icon="Clock" class="w-4 h-4 me-2" />
                    {{ __('global.attendance_details') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="class">
                    <x-base.lucide icon="Home" class="w-4 h-4 me-2" />
                    {{ __('global.class_info') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="history">
                    <x-base.lucide icon="Activity" class="w-4 h-4 me-2" />
                    {{ __('global.attendance_history') }}
                </button>
            </nav>
        </div>
    </div>

    <!-- Tab Content -->
    <div class="mt-5">
        <!-- Overview Tab -->
        <div id="overview" class="tab-content active">
            <div class="grid grid-cols-12 gap-6">
                <!-- Attendance Card -->
                <div class="intro-y col-span-12 lg:col-span-4">
                    <div class="box p-5 info-card">
                        <div class="text-center">
                            <div class="w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-4 
                                {{ $attendance->status === 'present' ? 'bg-success/20 text-success' : ($attendance->status === 'late' ? 'bg-warning/20 text-warning' : 'bg-danger/20 text-danger') }}">
                                <x-base.lucide icon="{{ $attendance->status === 'present' ? 'CheckCircle' : ($attendance->status === 'late' ? 'Clock' : 'XCircle') }}" class="w-12 h-12" />
                            </div>
                            <div class="text-2xl font-bold mb-2">
                                {{ ucfirst($attendance->status) }}
                            </div>
                            <div class="text-slate-500 text-lg">
                                {{ $attendance->date->format('F j, Y') }}
                            </div>
                            
                            <div class="mt-6 pt-4 border-t">
                                <div class="grid grid-cols-2 gap-3">
                                    <div class="text-center p-3 bg-blue-50 rounded">
                                        <div class="text-xl font-bold text-blue-600">
                                            {{ $attendance->child->attendances()->where('status', 'present')->count() }}
                                        </div>
                                        <div class="text-xs text-slate-500">{{ __('global.total_present') }}</div>
                                    </div>
                                    <div class="text-center p-3 bg-red-50 rounded">
                                        <div class="text-xl font-bold text-red-600">
                                            {{ $attendance->child->attendances()->where('status', 'absent')->count() }}
                                        </div>
                                        <div class="text-xs text-slate-500">{{ __('global.total_absent') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Attendance Context -->
                <div class="intro-y col-span-12 lg:col-span-8">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 md:col-span-6">
                            <div class="box p-5">
                                <div class="text-base font-medium mb-3 flex items-center">
                                    <x-base.lucide icon="User" class="w-5 h-5 me-2 text-primary" />
                                    {{ __('global.student') }}
                                </div>
                                <div class="flex items-center">
                                    <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center me-3">
                                        <span class="text-primary font-bold">{{ strtoupper(substr($attendance->child->name, 0, 1)) }}</span>
                                    </div>
                                    <div>
                                        <div class="font-medium">{{ $attendance->child->name }}</div>
                                        <div class="text-sm text-slate-500">
                                            {{ optional($attendance->child->class)->name ?? 'Not assigned' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 pt-3 border-t">
                                    <a href="{{ route('children.show', $attendance->child->id) }}" class="text-primary hover:underline">
                                        {{ __('global.view_student_profile') }}
                                        <x-base.lucide icon="ArrowRight" class="w-4 h-4 inline ms-1" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-span-12 md:col-span-6">
                            <div class="box p-5">
                                <div class="text-base font-medium mb-3 flex items-center">
                                    <x-base.lucide icon="Clock" class="w-5 h-5 me-2 text-primary" />
                                    {{ __('global.time_info') }}
                                </div>
                                <div class="space-y-3">
                                    <div class="flex justify-between">
                                        <span class="text-slate-500">{{ __('global.check_in') }}:</span>
                                        <span class="font-medium">
                                            {{ $attendance->check_in ? $attendance->check_in->format('H:i') : '--:--' }}
                                        </span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-slate-500">{{ __('global.check_out') }}:</span>
                                        <span class="font-medium">
                                            {{ $attendance->check_out ? $attendance->check_out->format('H:i') : '--:--' }}
                                        </span>
                                    </div>
                                    @if($attendance->check_in && $attendance->check_out)
                                        <div class="flex justify-between pt-2 border-t">
                                            <span class="text-slate-500">{{ __('global.duration') }}:</span>
                                            <span class="font-medium">
                                                {{ $attendance->check_in->diffInHours($attendance->check_out) }}h 
                                                {{ $attendance->check_in->diff($attendance->check_out)->format('%i') }}m
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Student Information Tab -->
        <div id="student" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="User" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.student_profile') }}
                        </div>
                        <div class="flex items-start">
                            <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center me-4">
                                <span class="text-primary font-bold text-xl">{{ strtoupper(substr($attendance->child->name, 0, 2)) }}</span>
                            </div>
                            <div class="flex-1">
                                <div class="text-xl font-bold">{{ $attendance->child->name }}</div>
                                <div class="text-slate-500 text-sm mt-1">
                                    {{ $attendance->child->age }} {{ __('global.years_old') }} • {{ ucfirst($attendance->child->gender) }}
                                </div>
                                <div class="text-slate-500 text-sm mt-1">
                                    {{ $attendance->child->nationality ?? 'Not specified' }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-5 space-y-3">
                            <div class="flex items-center text-sm">
                                <x-base.lucide icon="Home" class="w-4 h-4 me-2 text-slate-500" />
                                <span>{{ optional($attendance->child->class)->name ?? 'Not assigned' }}</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <x-base.lucide icon="Cake" class="w-4 h-4 me-2 text-slate-500" />
                                <span>{{ $attendance->child->dob->format('F j, Y') }}</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <x-base.lucide icon="Users" class="w-4 h-4 me-2 text-slate-500" />
                                <span>{{ optional($attendance->child->parent)->name ?? 'No parent assigned' }}</span>
                            </div>
                        </div>
                        
                        <div class="mt-5 pt-4 border-t">
                            <a href="{{ route('children.show', $attendance->child->id) }}" class="text-primary hover:underline">
                                {{ __('global.view_full_student_profile') }}
                                <x-base.lucide icon="ArrowRight" class="w-4 h-4 inline ms-1" />
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="BarChart2" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.attendance_summary') }}
                        </div>
                        <div class="space-y-4">
                            <div class="text-center p-4 bg-success/10 rounded-lg">
                                <div class="text-2xl font-bold text-success">
                                    {{ $attendance->child->attendances()->where('status', 'present')->count() }}
                                </div>
                                <div class="text-sm text-slate-600">{{ __('global.days_present') }}</div>
                            </div>
                            <div class="text-center p-4 bg-danger/10 rounded-lg">
                                <div class="text-2xl font-bold text-danger">
                                    {{ $attendance->child->attendances()->where('status', 'absent')->count() }}
                                </div>
                                <div class="text-sm text-slate-600">{{ __('global.days_absent') }}</div>
                            </div>
                            <div class="text-center p-4 bg-warning/10 rounded-lg">
                                <div class="text-2xl font-bold text-warning">
                                    {{ $attendance->child->attendances()->where('status', 'late')->count() }}
                                </div>
                                <div class="text-sm text-slate-600">{{ __('global.days_late') }}</div>
                            </div>
                            <div class="pt-4 border-t text-center">
                                <div class="text-2xl font-bold text-primary">
                                    {{ $attendance->child->attendances()->count() > 0 ? round(($attendance->child->attendances()->where('status', 'present')->count() / $attendance->child->attendances()->count()) * 100, 1) : 0 }}%
                                </div>
                                <div class="text-sm text-slate-600">{{ __('global.attendance_rate') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Attendance Details Tab -->
        <div id="attendance" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Clock" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.attendance_information') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.date') }}:</span>
                                <span class="font-medium">{{ $attendance->date->format('F j, Y') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.status') }}:</span>
                                <span class="font-medium px-2 py-1 rounded text-sm 
                                    {{ $attendance->status === 'present' ? 'bg-success/20 text-success' : ($attendance->status === 'late' ? 'bg-warning/20 text-warning' : 'bg-danger/20 text-danger') }}">
                                    {{ ucfirst($attendance->status) }}
                                </span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.check_in') }}:</span>
                                <span class="font-medium">
                                    {{ $attendance->check_in ? $attendance->check_in->format('H:i:s') : '--:--:--' }}
                                </span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.check_out') }}:</span>
                                <span class="font-medium">
                                    {{ $attendance->check_out ? $attendance->check_out->format('H:i:s') : '--:--:--' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="MessageSquare" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.additional_info') }}
                        </div>
                        <div class="space-y-4">
                            <div>
                                <div class="text-slate-500 text-sm mb-1">{{ __('global.notes') }}:</div>
                                @if($attendance->notes)
                                    <div class="p-3 bg-slate-50 rounded text-sm">{{ $attendance->notes }}</div>
                                @else
                                    <div class="text-slate-400 text-sm">{{ __('global.no_notes') }}</div>
                                @endif
                            </div>
                            <div>
                                <div class="text-slate-500 text-sm mb-1">{{ __('global.absence_reason') }}:</div>
                                @if($attendance->absence_reason)
                                    <div class="p-3 bg-slate-50 rounded text-sm">{{ $attendance->absence_reason }}</div>
                                @else
                                    <div class="text-slate-400 text-sm">{{ __('global.no_absence_reason') }}</div>
                                @endif
                            </div>
                            <div class="pt-3 border-t">
                                <div class="text-slate-500 text-sm">{{ __('global.recorded_at') }}:</div>
                                <div class="font-medium text-sm">{{ $attendance->created_at->format('M d, Y H:i:s') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Class Information Tab -->
        <div id="class" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Home" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.class_information') }}
                        </div>
                        @if($attendance->child->class)
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <div class="text-xl font-bold mb-3">{{ $attendance->child->class->name }}</div>
                                    <div class="space-y-3">
                                        <div class="flex items-center">
                                            <x-base.lucide icon="Hash" class="w-4 h-4 me-2 text-slate-500" />
                                            <span>{{ $attendance->child->class->code ?? 'No code' }}</span>
                                        </div>
                                        <div class="flex items-center">
                                            <x-base.lucide icon="UserCheck" class="w-4 h-4 me-2 text-slate-500" />
                                            <span>{{ optional($attendance->child->class->teacher)->name ?? 'No teacher assigned' }}</span>
                                        </div>
                                        <div class="flex items-center">
                                            <x-base.lucide icon="Users" class="w-4 h-4 me-2 text-slate-500" />
                                            <span>{{ $attendance->child->class->current_students ?? 0 }}/{{ $attendance->child->class->capacity ?? '∞' }} {{ __('global.students') }}</span>
                                        </div>
                                        <div class="flex items-center">
                                            <x-base.lucide icon="MapPin" class="w-4 h-4 me-2 text-slate-500" />
                                            <span>{{ $attendance->child->class->room_number ?? 'Not specified' }}</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div>
                                    <div class="text-base font-medium mb-3">{{ __('global.class_attendance_summary') }}</div>
                                    <div class="space-y-3">
                                        <div class="flex justify-between">
                                            <span class="text-slate-500">{{ __('global.present_today') }}:</span>
                                            <span class="font-medium">
                                                {{ $attendance->child->class->children()->whereHas('attendances', function($query) use ($attendance) {
                                                    $query->whereDate('date', $attendance->date)->where('status', 'present');
                                                })->count() }}
                                            </span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-slate-500">{{ __('global.absent_today') }}:</span>
                                            <span class="font-medium">
                                                {{ $attendance->child->class->children()->whereHas('attendances', function($query) use ($attendance) {
                                                    $query->whereDate('date', $attendance->date)->where('status', 'absent');
                                                })->count() }}
                                            </span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-slate-500">{{ __('global.late_today') }}:</span>
                                            <span class="font-medium">
                                                {{ $attendance->child->class->children()->whereHas('attendances', function($query) use ($attendance) {
                                                    $query->whereDate('date', $attendance->date)->where('status', 'late');
                                                })->count() }}
                                            </span>
                                        </div>
                                        <div class="pt-3 border-t">
                                            <div class="text-center">
                                                <div class="text-2xl font-bold text-primary">
                                                    {{ $attendance->child->class->children()->count() > 0 ? round(($attendance->child->class->children()->whereHas('attendances', function($query) use ($attendance) {
                                                        $query->whereDate('date', $attendance->date)->where('status', 'present');
                                                    })->count() / $attendance->child->class->children()->count()) * 100, 1) : 0 }}%
                                                </div>
                                                <div class="text-sm text-slate-600">{{ __('global.class_attendance_rate') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-5 pt-4 border-t">
                                <a href="{{ route('classes.show', $attendance->child->class->id) }}" class="text-primary hover:underline">
                                    {{ __('global.view_class_details') }}
                                    <x-base.lucide icon="ArrowRight" class="w-4 h-4 inline ms-1" />
                                </a>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <x-base.lucide icon="Home" class="w-16 h-16 mx-auto mb-4 text-slate-300" />
                                <h3 class="text-lg font-medium text-slate-500">{{ __('global.student_not_assigned_to_class') }}</h3>
                                <p class="text-slate-400 mt-2">{{ __('global.assign_class_to_view_details') }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- History Tab -->
        <div id="history" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center justify-between">
                            <span>{{ __('global.attendance_history') }}</span>
                            <span class="text-sm text-slate-500">{{ $attendance->child->attendances()->count() }} {{ __('global.records') }}</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-left">{{ __('global.date') }}</th>
                                        <th class="text-left">{{ __('global.status') }}</th>
                                        <th class="text-left">{{ __('global.check_in') }}</th>
                                        <th class="text-left">{{ __('global.check_out') }}</th>
                                        <th class="text-left">{{ __('global.notes') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($attendance->child->attendances()->latest()->take(10)->get() as $attendanceRecord)
                                        <tr class="{{ $attendanceRecord->id === $attendance->id ? 'bg-primary/10' : '' }}">
                                            <td class="py-2">{{ $attendanceRecord->date->format('M d, Y') }}</td>
                                            <td>
                                                <span class="px-2 py-1 rounded text-xs font-medium 
                                                    {{ $attendanceRecord->status === 'present' ? 'bg-success/20 text-success' : ($attendanceRecord->status === 'absent' ? 'bg-danger/20 text-danger' : 'bg-warning/20 text-warning') }}">
                                                    {{ ucfirst($attendanceRecord->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $attendanceRecord->check_in ? $attendanceRecord->check_in->format('H:i') : '--' }}</td>
                                            <td>{{ $attendanceRecord->check_out ? $attendanceRecord->check_out->format('H:i') : '--' }}</td>
                                            <td class="text-sm text-slate-600 max-w-xs truncate">{{ $attendanceRecord->notes ?? '--' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-8 text-slate-500">
                                                <x-base.lucide icon="Activity" class="w-12 h-12 mx-auto mb-3 opacity-50" />
                                                <p>{{ __('global.no_attendance_records') }}</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4 text-center">
                            <a href="{{ route('attendances.index', ['child_id' => $attendance->child->id]) }}" class="text-primary hover:underline">
                                {{ __('global.view_all_attendance_records') }}
                                <x-base.lucide icon="ArrowRight" class="w-4 h-4 inline ms-1" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');
            
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const tabId = this.getAttribute('data-tab');
                    
                    // Remove active class from all buttons and contents
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active'));
                    
                    // Add active class to clicked button and corresponding content
                    this.classList.add('active');
                    document.getElementById(tabId).classList.add('active');
                });
            });
        });
    </script>
@endsection
