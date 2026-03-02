@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('global.attendance_details') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">
            {{ __('global.attendance_details') }} - {{ $attendance->date->format('Y-m-d') }}
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0 gap-2">
            <x-base.button variant="outline-secondary" as="a" href="{{ route('attendances.index') }}" class="flex items-center">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" /> {{ __('global.back') }}
            </x-base.button>
            @can('edit_attendances')
                <x-base.button variant="primary" as="a" href="{{ route('attendances.edit', $attendance->id) }}" class="flex items-center shadow-md">
                    <x-base.lucide icon="Pencil" class="w-4 h-4 me-2" /> {{ __('global.edit') }}
                </x-base.button>
            @endcan
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Main Attendance Info -->
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="box p-5">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base">{{ __('global.attendance_info') }}</div>
                    <div class="ms-auto">
                        <span class="px-3 py-1 rounded-full text-xs font-medium 
                            {{ $attendance->status == 'present' ? 'bg-success/10 text-success border border-success/20' : '' }}
                            {{ $attendance->status == 'absent' ? 'bg-danger/10 text-danger border border-danger/20' : '' }}
                            {{ $attendance->status == 'late' ? 'bg-warning/10 text-warning border border-warning/20' : '' }}
                            {{ $attendance->status == 'excused' ? 'bg-info/10 text-info border border-info/20' : '' }}">
                            {{ __('global.' . $attendance->status) }}
                        </span>
                    </div>
                </div>
                
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 md:col-span-6">
                        <div class="text-slate-500 text-xs mb-1">{{ __('global.date') }}</div>
                        <div class="text-xl font-bold">{{ $attendance->date->format('Y-m-d') }}</div>
                        <div class="text-slate-400 text-xs mt-1">{{ $attendance->date->format('l') }}</div>
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <div class="text-slate-500 text-xs mb-1">{{ __('global.class') }}</div>
                        <div class="text-lg font-medium">{{ $attendance->child->class->name ?? 'N/A' }}</div>
                    </div>
                    <div class="col-span-12 md:col-span-6 border-t pt-4">
                        <div class="text-slate-500 text-xs mb-1">{{ __('global.check_in') }}</div>
                        <div class="flex items-center mt-1">
                            <x-base.lucide icon="Clock" class="w-4 h-4 me-2 text-success" />
                            <span class="font-medium text-lg">{{ $attendance->check_in ?: '--:--' }}</span>
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-6 border-t pt-4">
                        <div class="text-slate-500 text-xs mb-1">{{ __('global.check_out') }}</div>
                        <div class="flex items-center mt-1">
                            <x-base.lucide icon="Clock" class="w-4 h-4 me-2 text-danger" />
                            <span class="font-medium text-lg">{{ $attendance->check_out ?: '--:--' }}</span>
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-6 border-t pt-4">
                        <div class="text-slate-500 text-xs mb-1">{{ __('global.absence_reason') }}</div>
                        <div class="flex items-center mt-1">
                            <x-base.lucide icon="AlertCircle" class="w-4 h-4 me-2 text-slate-400" />
                            <span class="font-medium">{{ $attendance->absence_reason ?: '-' }}</span>
                        </div>
                    </div>
                    @if($attendance->notes)
                        <div class="col-span-12 border-t pt-4">
                            <div class="text-slate-500 text-xs mb-1">{{ __('global.notes') }}</div>
                            <div class="p-3 bg-slate-50 dark:bg-darkmode-600 rounded-md italic text-slate-600">
                                "{{ $attendance->notes }}"
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Recent Attendance for this Class -->
            <div class="box p-5 mt-5">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base">{{ __('global.class_attendance_summary') }}</div>
                </div>
                <div class="grid grid-cols-4 gap-4">
                    <div class="text-center p-4 bg-success/5 rounded-lg border border-success/10">
                        <div class="text-2xl font-bold text-success">{{ \App\Models\Attendance::whereDate('date', $attendance->date)->where('status', 'present')->count() }}</div>
                        <div class="text-[10px] text-slate-500 uppercase font-bold mt-1">{{ __('global.present') }}</div>
                    </div>
                    <div class="text-center p-4 bg-danger/5 rounded-lg border border-danger/10">
                        <div class="text-2xl font-bold text-danger">{{ \App\Models\Attendance::whereDate('date', $attendance->date)->where('status', 'absent')->count() }}</div>
                        <div class="text-[10px] text-slate-500 uppercase font-bold mt-1">{{ __('global.absent') }}</div>
                    </div>
                    <div class="text-center p-4 bg-warning/5 rounded-lg border border-warning/10">
                        <div class="text-2xl font-bold text-warning">{{ \App\Models\Attendance::whereDate('date', $attendance->date)->where('status', 'late')->count() }}</div>
                        <div class="text-[10px] text-slate-500 uppercase font-bold mt-1">{{ __('global.late') }}</div>
                    </div>
                    <div class="text-center p-4 bg-info/5 rounded-lg border border-info/10">
                        <div class="text-2xl font-bold text-info">{{ \App\Models\Attendance::whereDate('date', $attendance->date)->where('status', 'excused')->count() }}</div>
                        <div class="text-[10px] text-slate-500 uppercase font-bold mt-1">{{ __('global.excused') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Info -->
        <div class="intro-y col-span-12 lg:col-span-4">
            <!-- Student Profile Summary -->
            <div class="box p-5">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base">{{ __('global.student_profile') }}</div>
                </div>
                <div class="flex flex-col items-center">
                    <div class="w-24 h-24 image-fit">
                        <img alt="{{ $attendance->child->name ?? '' }}" class="rounded-full shadow-lg border-4 border-white" src="{{ $attendance->child->photo_path ? asset($attendance->child->photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode($attendance->child->name ?? 'N/A') . '&background=random' }}">
                    </div>
                    <div class="text-lg font-bold mt-3">{{ $attendance->child->name ?? 'N/A' }}</div>
                    <div class="text-slate-500 mt-1">{{ $attendance->child->class->name ?? '' }}</div>
                    
                    <div class="grid grid-cols-2 gap-2 w-full mt-6">
                        <div class="p-3 bg-slate-50 rounded-lg text-center">
                            <div class="text-xs text-slate-500 mb-1">{{ __('global.present_rate') }}</div>
                            @php
                                $total = $attendance->child->attendances()->count();
                                $present = $attendance->child->attendances()->where('status', 'present')->count();
                                $rate = $total > 0 ? round(($present / $total) * 100) : 0;
                            @endphp
                            <div class="font-bold text-success">{{ $rate }}%</div>
                        </div>
                        <div class="p-3 bg-slate-50 rounded-lg text-center">
                            <div class="text-xs text-slate-500 mb-1">{{ __('global.total_days') }}</div>
                            <div class="font-bold text-primary">{{ $total }}</div>
                        </div>
                    </div>
                    
                    <x-base.button variant="outline-primary" as="a" href="{{ route('children.show', $attendance->child_id) }}" class="w-full mt-6">
                        <x-base.lucide icon="User" class="w-4 h-4 me-2" /> {{ __('global.view_full_profile') }}
                    </x-base.button>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="box p-5 mt-5">
                <div class="font-medium text-base mb-4">{{ __('global.quick_actions') }}</div>
                <div class="flex flex-col gap-2">
                    <x-base.button variant="outline-secondary" as="a" href="{{ route('attendances.bulk', ['class_id' => $attendance->child->class_id]) }}" class="justify-start">
                        <x-base.lucide icon="Users" class="w-4 h-4 me-2 text-primary" /> {{ __('global.bulk_marking_for_class') }}
                    </x-base.button>
                    <x-base.button variant="outline-secondary" as="a" href="{{ route('payments.create', ['child_id' => $attendance->child_id]) }}" class="justify-start">
                        <x-base.lucide icon="DollarSign" class="w-4 h-4 me-2 text-success" /> {{ __('global.collect_fees') }}
                    </x-base.button>
                    <x-base.button variant="outline-secondary" as="a" href="{{ route('attendances.create', ['child_id' => $attendance->child_id]) }}" class="justify-start">
                        <x-base.lucide icon="Calendar" class="w-4 h-4 me-2 text-info" /> {{ __('global.add_new_attendance') }}
                    </x-base.button>
                </div>
            </div>

            <!-- Attendance History -->
            <div class="box p-5 mt-5">
                <div class="font-medium text-base mb-4">{{ __('global.attendance_history') }}</div>
                <div class="space-y-3 max-h-60 overflow-y-auto">
                    @forelse($attendance->child->attendances()->orderBy('date', 'desc')->limit(5)->get() as $recentAttendance)
                        <div class="flex items-center justify-between p-2 bg-slate-50 rounded">
                            <div class="flex items-center">
                                <span class="me-2 text-xs px-2 py-1 rounded-full 
                                    {{ $recentAttendance->status == 'present' ? 'bg-success/10 text-success' : '' }}
                                    {{ $recentAttendance->status == 'absent' ? 'bg-danger/10 text-danger' : '' }}
                                    {{ $recentAttendance->status == 'late' ? 'bg-warning/10 text-warning' : '' }}
                                    {{ $recentAttendance->status == 'excused' ? 'bg-info/10 text-info' : '' }}">
                                    {{ __('global.' . $recentAttendance->status) }}
                                </span>
                                <span class="text-sm">{{ $recentAttendance->date->format('Y-m-d') }}</span>
                            </div>
                            <span class="text-xs text-slate-500">{{ $recentAttendance->check_in ?: '--:--' }}</span>
                        </div>
                    @empty
                        <div class="text-center py-4 text-slate-400 text-sm">{{ __('global.no_recent_attendance') }}</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection