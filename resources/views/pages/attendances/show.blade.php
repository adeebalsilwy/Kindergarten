@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Attendance.show') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('global.attendance_record') }}</h2>
        <div class="ml-auto flex gap-2">
            <x-base.button variant="secondary" as="a" href="{{ route('attendances.index') }}">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 mr-2" />
                {{ __('global.back') }}
            </x-base.button>
            @can('edit_attendances')
            <x-base.button variant="primary" as="a" href="{{ route('attendances.edit', $attendance->id) }}">
                <x-base.lucide icon="Pencil" class="w-4 h-4 mr-2" />
                {{ __('global.edit') }}
            </x-base.button>
            @endcan
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-4">
            <div class="box p-5">
                <div class="flex items-start">
                    <div>
                        <div class="text-base font-medium">
                            <a href="{{ route('children.show', $attendance->child->id) }}" class="text-primary">
                                {{ $attendance->child->name ?? $attendance->child->first_name }}
                            </a>
                        </div>
                        <div class="text-slate-500 text-sm">
                            {{ optional($attendance->child->class)->name ?? '-' }}
                        </div>
                    </div>
                    <div class="ml-auto">
                        @php
                            $status = $attendance->status;
                            $badgeColor = match($status) {
                                'present' => 'success',
                                'late' => 'warning',
                                'absent' => 'danger',
                                'excused' => 'info',
                                default => 'slate',
                            };
                        @endphp
                        <span class="px-2 py-1 rounded-full text-xs bg-{{ $badgeColor }}/20 text-{{ $badgeColor }}">{{ ucfirst($status) }}</span>
                    </div>
                </div>
                <div class="mt-5 space-y-2 text-sm">
                    <div class="flex items-center">
                        <x-base.lucide icon="Calendar" class="w-4 h-4 mr-2" />
                        <span>{{ \Carbon\Carbon::parse($attendance->date)->format('Y-m-d') }}</span>
                    </div>
                    @if($attendance->check_in || $attendance->check_out)
                    <div class="flex items-center">
                        <x-base.lucide icon="Clock" class="w-4 h-4 mr-2" />
                        <span>{{ $attendance->check_in ?? '--:--' }} / {{ $attendance->check_out ?? '--:--' }}</span>
                    </div>
                    @endif
                </div>
            </div>

            <div class="box p-5 mt-5">
                <div class="text-base font-medium mb-3">{{ __('global.notes') }}</div>
                <div class="text-sm">
                    {{ $attendance->notes ?? __('global.no_data') }}
                </div>
                @if($attendance->absence_reason)
                <div class="text-sm mt-3">
                    <span class="text-slate-500">{{ __('global.absence_reason') }}:</span>
                    {{ $attendance->absence_reason }}
                </div>
                @endif
            </div>
        </div>

        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="box p-5">
                <div class="text-base font-medium mb-3">{{ __('global.summary') }}</div>
                <div class="grid grid-cols-3 gap-4">
                    <x-widgets.stat-card :value="($attendance->status === 'present' || $attendance->status === 'late') ? 1 : 0" :label="__('global.present')" icon="CheckCircle" />
                    <x-widgets.stat-card :value="$attendance->status === 'absent' ? 1 : 0" :label="__('global.absent')" icon="XCircle" />
                    <x-widgets.stat-card :value="$attendance->status === 'late' ? 1 : 0" :label="__('global.late')" icon="Clock" />
                </div>
            </div>
        </div>
    </div>
@endsection
