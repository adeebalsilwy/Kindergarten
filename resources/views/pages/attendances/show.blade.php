@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Attendance.show') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('global.attendance_record_details') }}</h2>
        <div class="ms-auto flex gap-2">
            <x-base.button variant="outline-secondary" as="a" href="{{ route('attendances.index') }}">
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

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Profile Header like Section -->
        <div class="intro-y col-span-12">
            <div class="box px-5 pt-5 pb-5">
                <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
                    <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                        <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                            <img alt="{{ $attendance->child->name ?? 'Student' }}" class="rounded-full"
                                 src="{{ $attendance->child->photo_path ? asset('storage/' . $attendance->child->photo_path) : asset('dist/images/profile-6.jpg') }}">
                        </div>
                        <div class="ms-5">
                            <div class="truncate sm:whitespace-normal font-medium text-lg">{{ $attendance->child->name ?? 'N/A' }}</div>
                            <div class="text-slate-500">{{ $attendance->child->class->name ?? 'No Class' }}</div>
                            <div class="mt-2 flex items-center">
                                <span class="px-3 py-1 rounded-full text-xs font-medium
                                    {{ $attendance->status == 'present' ? 'bg-success/20 text-success' : '' }}
                                    {{ $attendance->status == 'absent' ? 'bg-danger/20 text-danger' : '' }}
                                    {{ $attendance->status == 'late' ? 'bg-warning/20 text-warning' : '' }}
                                    {{ $attendance->status == 'sick' ? 'bg-info/20 text-info' : '' }}
                                    {{ $attendance->status == 'excused' ? 'bg-slate-200 text-slate-600' : '' }}">
                                    {{ __('global.' . $attendance->status) }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 lg:mt-0 flex-1 px-5 border-s border-e border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-6 lg:pt-0">
                        <div class="font-medium text-center lg:text-start mb-3">{{ __('global.attendance_info') }}</div>
                        <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                            <div class="truncate sm:whitespace-normal flex items-center">
                                <x-base.lucide icon="Calendar" class="w-4 h-4 me-2" />
                                <span class="font-medium">{{ __('global.date') }}:</span>
                                <span class="ms-2 text-slate-500">{{ $attendance->date->format('Y-m-d') }}</span>
                            </div>
                            <div class="truncate sm:whitespace-normal flex items-center mt-3">
                                <x-base.lucide icon="Clock" class="w-4 h-4 me-2" />
                                <span class="font-medium">{{ __('global.check_in') }}:</span>
                                <span class="ms-2 text-slate-500">{{ $attendance->check_in_time ? \Carbon\Carbon::parse($attendance->check_in_time)->format('H:i') : '--:--' }}</span>
                            </div>
                            <div class="truncate sm:whitespace-normal flex items-center mt-3">
                                <x-base.lucide icon="Clock" class="w-4 h-4 me-2" />
                                <span class="font-medium">{{ __('global.check_out') }}:</span>
                                <span class="ms-2 text-slate-500">{{ $attendance->check_out_time ? \Carbon\Carbon::parse($attendance->check_out_time)->format('H:i') : '--:--' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Details Section -->
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="box p-5 h-full">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base me-auto">{{ __('global.notes_and_remarks') }}</div>
                    <x-base.lucide icon="FileText" class="w-4 h-4 text-slate-500" />
                </div>
                <div class="mt-4">
                    <div class="text-slate-500 mb-1">{{ __('global.notes') }}</div>
                    <div class="p-3 bg-slate-50 dark:bg-darkmode-600 rounded">
                        {{ $attendance->notes ?? __('global.no_notes_provided') }}
                    </div>
                </div>
                @if($attendance->absence_reason)
                <div class="mt-5">
                    <div class="text-slate-500 mb-1">{{ __('global.absence_reason') }}</div>
                    <div class="p-3 bg-danger/5 border border-danger/10 text-danger rounded">
                        {{ $attendance->absence_reason }}
                    </div>
                </div>
                @endif
            </div>
        </div>

        <div class="intro-y col-span-12 lg:col-span-4">
            <div class="box p-5 h-full">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base me-auto">{{ __('global.other_details') }}</div>
                    <x-base.lucide icon="Info" class="w-4 h-4 text-slate-500" />
                </div>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                            <x-base.lucide icon="User" class="w-4 h-4" />
                        </div>
                        <div class="ms-3">
                            <div class="text-xs text-slate-500">{{ __('global.guardian') }}</div>
                            <div class="font-medium">{{ $attendance->child->parent->name ?? 'N/A' }}</div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-full bg-success/10 flex items-center justify-center text-success">
                            <x-base.lucide icon="Phone" class="w-4 h-4" />
                        </div>
                        <div class="ms-3">
                            <div class="text-xs text-slate-500">{{ __('global.contact') }}</div>
                            <div class="font-medium">{{ $attendance->child->parent->phone ?? 'N/A' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
