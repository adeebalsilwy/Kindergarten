@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('global.attendance_report') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('global.attendance_report') }}</h2>
    </div>

    <!-- Filters -->
    <div class="intro-y box p-5 mt-5">
        <form action="{{ route('finance.attendance-report') }}" method="GET" class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <x-base.form-label>{{ __('global.select_class') }}</x-base.form-label>
                <x-base.form-select name="class_id" class="w-full" onchange="this.form.submit()">
                    <option value="">{{ __('global.all_classes') }}</option>
                    @foreach($classes as $class)
                        <option value="{{ $class->id }}" {{ $class_id == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                    @endforeach
                </x-base.form-select>
            </div>
            <div class="w-40">
                <x-base.form-label>{{ __('global.month') }}</x-base.form-label>
                <x-base.form-select name="month" class="w-full" onchange="this.form.submit()">
                    @for($m=1; $m<=12; $m++)
                        <option value="{{ str_pad($m, 2, '0', STR_PAD_LEFT) }}" {{ $month == $m ? 'selected' : '' }}>
                            {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                        </option>
                    @endfor
                </x-base.form-select>
            </div>
            <div class="w-40">
                <x-base.form-label>{{ __('global.year') }}</x-base.form-label>
                <x-base.form-select name="year" class="w-full" onchange="this.form.submit()">
                    @for($y=date('Y')-2; $y<=date('Y')+1; $y++)
                        <option value="{{ $y }}" {{ $year == $y ? 'selected' : '' }}>{{ $y }}</option>
                    @endfor
                </x-base.form-select>
            </div>
        </form>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-12 sm:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 text-center">
                    <div class="text-success font-bold text-2xl">{{ $stats['present'] }}</div>
                    <div class="text-slate-500 text-xs mt-1">{{ __('global.total_present') }}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 text-center">
                    <div class="text-danger font-bold text-2xl">{{ $stats['absent'] }}</div>
                    <div class="text-slate-500 text-xs mt-1">{{ __('global.total_absent') }}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 text-center">
                    <div class="text-warning font-bold text-2xl">{{ $stats['late'] }}</div>
                    <div class="text-slate-500 text-xs mt-1">{{ __('global.total_late') }}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 text-center">
                    <div class="text-info font-bold text-2xl">{{ $stats['excused'] }}</div>
                    <div class="text-slate-500 text-xs mt-1">{{ __('global.total_excused') }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Details Table -->
    <div class="intro-y box p-5 mt-5">
        <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
            <div class="font-medium text-base me-auto">{{ __('global.attendance_records') }}</div>
            <div class="flex gap-2">
                <x-base.button variant="outline-secondary" size="sm" onclick="window.print()">
                    <x-base.lucide icon="Printer" class="w-4 h-4 me-2" /> {{ __('global.print') }}
                </x-base.button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="table table-report table-report--sm">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">{{ __('global.date') }}</th>
                        <th class="whitespace-nowrap">{{ __('global.student') }}</th>
                        <th class="whitespace-nowrap">{{ __('global.class') }}</th>
                        <th class="text-center whitespace-nowrap">{{ __('global.status') }}</th>
                        <th class="whitespace-nowrap">{{ __('global.notes') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($attendances->sortByDesc('date') as $attendance)
                        <tr class="intro-x">
                            <td class="whitespace-nowrap">{{ $attendance->date->format('Y-m-d') }}</td>
                            <td class="whitespace-nowrap font-medium">{{ $attendance->child->name ?? 'N/A' }}</td>
                            <td class="whitespace-nowrap text-slate-500 text-xs">{{ $attendance->child->class->name ?? 'N/A' }}</td>
                            <td class="text-center">
                                @php
                                    $statusColor = [
                                        'present' => 'text-success',
                                        'absent' => 'text-danger',
                                        'late' => 'text-warning',
                                        'excused' => 'text-info'
                                    ][$attendance->status] ?? 'text-slate-500';
                                @endphp
                                <div class="flex items-center justify-center {{ $statusColor }}">
                                    {{ __('global.' . $attendance->status) }}
                                </div>
                            </td>
                            <td class="whitespace-nowrap text-xs">{{ $attendance->notes ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-10 text-slate-500">{{ __('global.no_records_found') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
