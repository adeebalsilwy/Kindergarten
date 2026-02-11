@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('global.student_profile') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('global.student_profile') }}</h2>
        <div class="flex gap-2">
            <x-base.button as="a" href="{{ route('children.edit', $children->id) }}" variant="primary" class="flex items-center">
                <x-base.lucide icon="Pencil" class="w-4 h-4 mr-2" /> {{ __('global.edit') }}
            </x-base.button>
            <x-base.button as="a" href="{{ route('children.index') }}" variant="outline-secondary" class="flex items-center">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 mr-2" /> {{ __('global.back') }}
            </x-base.button>
        </div>
    </div>

    <!-- BEGIN: Profile Info -->
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5 text-center lg:text-left">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                    <img alt="{{ $children->name }}" class="rounded-full" src="{{ $children->photo_path ? asset($children->photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode($children->name) }}">
                </div>
                <div class="ml-5">
                    <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg ltr:text-left rtl:text-right">{{ $children->name }}</div>
                    <div class="text-slate-500 ltr:text-left rtl:text-right">{{ $children->class->name ?? 'No Class assigned' }}</div>
                    <div class="mt-2 text-xs text-slate-400 ltr:text-left rtl:text-right">{{ __('global.enrollment_status') }}: <span class="text-primary font-semibold">{{ __('global.'.$children->enrollment_status) }}</span></div>
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-6 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-3">{{ __('global.contact_details') }}</div>
                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                    <div class="truncate sm:whitespace-normal flex items-center">
                        <x-base.lucide icon="User" class="w-4 h-4 mr-2" /> {{ __('global.parent') }}: {{ $children->parent->name ?? 'N/A' }}
                    </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3">
                        <x-base.lucide icon="Phone" class="w-4 h-4 mr-2" /> {{ $children->parent->phone ?? 'N/A' }}
                    </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3 text-slate-500">
                        <x-base.lucide icon="MapPin" class="w-4 h-4 mr-2" /> {{ $children->parent->address ?? 'N/A' }}
                    </div>
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 flex items-center justify-center px-5 border-t lg:border-t-0 pt-6 lg:pt-0">
                <div class="text-center rounded-md w-20 py-3">
                    <div class="font-medium text-primary text-xl">{{ $children->attendances->where('status', 'present')->count() }}</div>
                    <div class="text-slate-500 text-xs">{{ __('global.present') }}</div>
                </div>
                <div class="text-center rounded-md w-20 py-3">
                    <div class="font-medium text-danger text-xl">{{ $children->attendances->where('status', 'absent')->count() }}</div>
                    <div class="text-slate-500 text-xs">{{ __('global.absent') }}</div>
                </div>
                <div class="text-center rounded-md w-20 py-3">
                    <div class="font-medium text-pending text-xl">{{ $children->payments->sum('amount') }}</div>
                    <div class="text-slate-500 text-xs">{{ __('global.paid') }}</div>
                </div>
            </div>
        </div>
        
        <!-- BEGIN: Tab Navigation -->
        <ul class="nav nav-link-tabs flex-col sm:flex-row justify-center lg:justify-start text-center" role="tablist">
            <li id="info-tab" class="nav-item" role="presentation">
                <button class="nav-link py-4 active w-full sm:w-auto" data-tw-target="#info" data-tw-toggle="tab" role="tab" aria-controls="info" aria-selected="true">
                    {{ __('global.personal_info') }}
                </button>
            </li>
            <li id="academic-tab" class="nav-item" role="presentation">
                <button class="nav-link py-4 w-full sm:w-auto" data-tw-target="#academic" data-tw-toggle="tab" role="tab" aria-controls="academic" aria-selected="false">
                    {{ __('global.academic_attendance') }}
                </button>
            </li>
            <li id="financial-tab" class="nav-item" role="presentation">
                <button class="nav-link py-4 w-full sm:w-auto" data-tw-target="#financial" data-tw-toggle="tab" role="tab" aria-controls="financial" aria-selected="false">
                    {{ __('global.financials') }}
                </button>
            </li>
            <li id="medical-tab" class="nav-item" role="presentation">
                <button class="nav-link py-4 w-full sm:w-auto" data-tw-target="#medical" data-tw-toggle="tab" role="tab" aria-controls="medical" aria-selected="false">
                    {{ __('global.medical_health') }}
                </button>
            </li>
        </ul>
        <!-- END: Tab Navigation -->
    </div>
    <!-- END: Profile Info -->

    <div class="tab-content mt-5">
        <!-- Info Tab -->
        <div id="info" class="tab-pane active" role="tabpanel" aria-labelledby="info-tab">
            <div class="grid grid-cols-12 gap-6">
                <!-- Details -->
                <div class="intro-y box col-span-12 lg:col-span-8 p-5">
                    <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                        <div class="font-medium text-base mr-auto">{{ __('global.full_details') }}</div>
                    </div>
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <div class="text-slate-500 text-xs">{{ __('global.date_of_birth') }}</div>
                            <div class="text-base font-medium mt-1">{{ $children->dob ? $children->dob->format('Y-m-d') : 'N/A' }} ({{ $children->dob ? $children->dob->age : '?' }} {{ __('global.years_old') }})</div>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <div class="text-slate-500 text-xs">{{ __('global.gender') }}</div>
                            <div class="text-base font-medium mt-1">{{ __('global.'.$children->gender) }}</div>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <div class="text-slate-500 text-xs">{{ __('global.nationality') }}</div>
                            <div class="text-base font-medium mt-1">{{ $children->nationality ?? 'N/A' }}</div>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <div class="text-slate-500 text-xs">{{ __('global.religion') }}</div>
                            <div class="text-base font-medium mt-1">{{ $children->religion ?? 'N/A' }}</div>
                        </div>
                        <div class="col-span-12">
                            <div class="text-slate-500 text-xs">{{ __('global.address') }}</div>
                            <div class="text-base font-medium mt-1">{{ $children->parent->address ?? 'N/A' }}</div>
                        </div>
                    </div>
                </div>

                <!-- Emergency Contact -->
                <div class="intro-y box col-span-12 lg:col-span-4 p-5">
                    <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                        <div class="font-medium text-base mr-auto">{{ __('global.emergency_contact') }}</div>
                    </div>
                    <div class="flex flex-col gap-4">
                        <div>
                            <div class="text-slate-500 text-xs">{{ __('global.name') }}</div>
                            <div class="text-base font-medium mt-1">{{ $children->emergency_contact_name ?? 'N/A' }}</div>
                        </div>
                        <div>
                            <div class="text-slate-500 text-xs">{{ __('global.phone') }}</div>
                            <div class="text-base font-medium mt-1 text-primary">{{ $children->emergency_contact_phone ?? 'N/A' }}</div>
                        </div>
                        <div>
                            <div class="text-slate-500 text-xs">{{ __('global.relation') }}</div>
                            <div class="text-base font-medium mt-1">{{ $children->emergency_contact_relation ?? 'N/A' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Academic & Attendance Tab -->
        <div id="academic" class="tab-pane" role="tabpanel" aria-labelledby="academic-tab">
            <div class="grid grid-cols-12 gap-6">
                <!-- Class Info -->
                <div class="intro-y box col-span-12 lg:col-span-4 p-5">
                    <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                        <div class="font-medium text-base mr-auto">{{ __('global.current_enrollment') }}</div>
                    </div>
                    <div class="flex flex-col gap-4">
                        <div>
                            <div class="text-slate-500 text-xs">{{ __('global.class') }}</div>
                            <div class="text-base font-medium mt-1">{{ $children->class->name ?? 'N/A' }}</div>
                        </div>
                        <div>
                            <div class="text-slate-500 text-xs">{{ __('global.teacher') }}</div>
                            <div class="text-base font-medium mt-1">{{ $children->class->teacher->name ?? 'N/A' }}</div>
                        </div>
                        <div>
                            <div class="text-slate-500 text-xs">{{ __('global.enrollment_date') }}</div>
                            <div class="text-base font-medium mt-1">{{ $children->enrollment_date ? $children->enrollment_date->format('Y-m-d') : 'N/A' }}</div>
                        </div>
                    </div>
                </div>

                <!-- Recent Attendance -->
                <div class="intro-y box col-span-12 lg:col-span-8 p-5">
                    <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                        <div class="font-medium text-base mr-auto">{{ __('global.recent_attendance') }}</div>
                        <a href="{{ route('attendance.index', ['child_id' => $children->id]) }}" class="text-primary">{{ __('global.view_full_history') }}</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="table table-report table-report--sm">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">{{ __('global.date') }}</th>
                                    <th class="text-center whitespace-nowrap">{{ __('global.status') }}</th>
                                    <th class="whitespace-nowrap">{{ __('global.notes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($children->attendances->take(10) as $attendance)
                                    <tr class="intro-x">
                                        <td class="whitespace-nowrap">{{ $attendance->date->format('Y-m-d') }}</td>
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
                                                <x-base.lucide icon="{{ $attendance->status == 'present' ? 'CheckSquare' : 'Slash' }}" class="w-4 h-4 mr-2" />
                                                {{ __('global.' . $attendance->status) }}
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap">{{ $attendance->notes ?? '-' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4 text-slate-500">{{ __('global.no_records_found') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Financial Tab -->
        <div id="financial" class="tab-pane" role="tabpanel" aria-labelledby="financial-tab">
            <div class="grid grid-cols-12 gap-6">
                <!-- Summary -->
                <div class="col-span-12 grid grid-cols-12 gap-6">
                    <div class="col-span-12 sm:col-span-4 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5 text-center">
                                <div class="text-slate-500 text-xs">{{ __('global.total_fees_required') }}</div>
                                <div class="text-2xl font-bold mt-2">{{ __('global.currency_symbol', ['amount' => number_format($children->fees_required, 2)]) }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-4 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5 text-center">
                                <div class="text-slate-500 text-xs">{{ __('global.total_paid') }}</div>
                                <div class="text-2xl font-bold mt-2 text-success">{{ __('global.currency_symbol', ['amount' => number_format($children->fees_paid, 2)]) }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-4 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5 text-center">
                                <div class="text-slate-500 text-xs">{{ __('global.balance_due') }}</div>
                                <div class="text-2xl font-bold mt-2 text-danger">{{ __('global.currency_symbol', ['amount' => number_format($children->fees_required - $children->fees_paid, 2)]) }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Payments -->
                <div class="intro-y box col-span-12 p-5">
                    <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                        <div class="font-medium text-base mr-auto">{{ __('global.payment_history') }}</div>
                        <x-base.button as="a" href="{{ route('payments.create', ['child_id' => $children->id]) }}" variant="outline-primary" size="sm">
                            <x-base.lucide icon="Plus" class="w-4 h-4 mr-2" /> {{ __('global.record_payment') }}
                        </x-base.button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="table table-report table-report--sm">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap text-center font-bold">{{ __('global.date') }}</th>
                                    <th class="whitespace-nowrap font-bold">{{ __('global.receipt_no') }}</th>
                                    <th class="text-right whitespace-nowrap font-bold">{{ __('global.amount') }}</th>
                                    <th class="whitespace-nowrap font-bold">{{ __('global.method') }}</th>
                                    <th class="whitespace-nowrap font-bold">{{ __('global.status') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($children->payments as $payment)
                                    <tr class="intro-x">
                                        <td class="whitespace-nowrap text-center">{{ $payment->payment_date ? $payment->payment_date->format('Y-m-d') : '-' }}</td>
                                        <td class="whitespace-nowrap font-medium">{{ $payment->receipt_number ?? '-' }}</td>
                                        <td class="text-right font-bold">{{ __('global.currency_symbol', ['amount' => number_format($payment->amount, 2)]) }}</td>
                                        <td class="whitespace-nowrap">{{ __('global.'.$payment->payment_method) }}</td>
                                        <td class="whitespace-nowrap">
                                            <div class="flex items-center text-success">
                                                <x-base.lucide icon="CheckCircle" class="w-4 h-4 mr-2" /> {{ __('global.paid') }}
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-slate-500">{{ __('global.no_payments_recorded') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Medical Tab -->
        <div id="medical" class="tab-pane" role="tabpanel" aria-labelledby="medical-tab">
            <div class="grid grid-cols-12 gap-6">
                <!-- Health Info -->
                <div class="intro-y box col-span-12 lg:col-span-12 p-5">
                    <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                        <div class="font-medium text-base mr-auto">{{ __('global.medical_health_records') }}</div>
                    </div>
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 sm:col-span-4">
                            <div class="box p-5 border border-slate-100 bg-slate-50">
                                <div class="flex items-center mb-3">
                                    <x-base.lucide icon="Droplet" class="text-danger w-5 h-5 mr-2" />
                                    <div class="font-medium">{{ __('global.blood_type') }}</div>
                                </div>
                                <div class="text-2xl font-bold">{{ $children->blood_type ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-8 grid grid-cols-1 gap-6">
                            <div class="box p-5 border border-slate-100">
                                <div class="font-medium text-slate-500 mb-2">{{ __('global.medical_conditions') }}</div>
                                <div class="text-base text-slate-700">{{ $children->medical_conditions ?? __('global.none') }}</div>
                            </div>
                            <div class="box p-5 border border-slate-100">
                                <div class="font-medium text-danger mb-2 font-bold">{{ __('global.allergies') }}</div>
                                <div class="text-base text-slate-700">{{ $children->allergies ?? __('global.none') }}</div>
                            </div>
                            <div class="box p-5 border border-slate-100">
                                <div class="font-medium text-slate-500 mb-2">{{ __('global.medications') }}</div>
                                <div class="text-base text-slate-700">{{ $children->medications ?? __('global.none') }}</div>
                            </div>
                            <div class="box p-5 border border-slate-100">
                                <div class="font-medium text-primary mb-2">{{ __('global.special_needs') }}</div>
                                <div class="text-base text-slate-700">{{ $children->special_needs ?? __('global.none') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection