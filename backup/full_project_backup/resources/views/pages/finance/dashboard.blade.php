@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('global.dashboard') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex h-10 items-center">
                        <h2 class="mr-5 truncate text-lg font-medium">{{ __('global.general_report') }}</h2>
                        <a href="" class="ml-auto flex items-center text-primary">
                            <x-base.lucide class="mr-3 h-4 w-4" icon="RefreshCcw" /> {{ __('global.reload_data') }}
                        </a>
                    </div>
                    <div class="mt-5 grid grid-cols-12 gap-6">
                        <!-- Total Students -->
                        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                            <div class="report-box zoom-in before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']">
                                <div class="box p-5">
                                    <div class="flex">
                                        <x-base.lucide class="h-8 w-8 text-primary" icon="Users" />
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-success cursor-pointer">
                                                {{ $stats['total_students'] }} <x-base.lucide class="ml-0.5 h-4 w-4" icon="ChevronUp" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8 text-slate-600 dark:text-slate-300">{{ number_format($stats['total_students']) }}</div>
                                    <div class="mt-1 text-base text-slate-500">{{ __('global.total_students') }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Total Teachers -->
                        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                            <div class="report-box zoom-in before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']">
                                <div class="box p-5">
                                    <div class="flex">
                                        <x-base.lucide class="h-8 w-8 text-pending" icon="User" />
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8 text-slate-600 dark:text-slate-300">{{ number_format($stats['total_teachers']) }}</div>
                                    <div class="mt-1 text-base text-slate-500">{{ __('global.total_teachers') }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Monthly Revenue -->
                        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                            <div class="report-box zoom-in before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']">
                                <div class="box p-5">
                                    <div class="flex">
                                        <x-base.lucide class="h-8 w-8 text-success" icon="TrendingUp" />
                                    </div>
                                    <div class="mt-6 text-2xl font-medium leading-8 text-slate-600 dark:text-slate-300">
                                        {{ __('global.currency_symbol', ['amount' => number_format($currentMonth['revenue']['total_revenue'])]) }}
                                    </div>
                                    <div class="mt-1 text-base text-slate-500">{{ __('global.monthly_revenue') }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Total Classes -->
                        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                            <div class="report-box zoom-in before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']">
                                <div class="box p-5">
                                    <div class="flex">
                                        <x-base.lucide class="h-8 w-8 text-warning" icon="Home" />
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8 text-slate-600 dark:text-slate-300">{{ number_format($stats['total_classes']) }}</div>
                                    <div class="mt-1 text-base text-slate-500">{{ __('global.total_classes') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->

                <!-- BEGIN: Revenue Report Chart -->
                <div class="col-span-12 mt-8 lg:col-span-12">
                    <div class="intro-y block h-10 items-center sm:flex">
                        <h2 class="mr-5 truncate text-lg font-medium">{{ __('global.financial_reporting') }}</h2>
                    </div>
                    <div class="intro-y box mt-12 p-5 sm:mt-5 bg-gradient-to-br from-white to-slate-50 dark:from-darkmode-600 dark:to-darkmode-700">
                        <div class="flex flex-col md:flex-row md:items-center">
                            <div class="flex">
                                <div>
                                    <div class="text-lg font-medium text-primary dark:text-slate-300 xl:text-xl">
                                        {{ __('global.currency_symbol', ['amount' => number_format($currentMonth['revenue']['total_revenue'])]) }}
                                    </div>
                                    <div class="mt-0.5 text-slate-500">{{ $currentMonth['period']['formatted'] }}</div>
                                </div>
                                <div class="mx-4 h-12 w-px border border-r border-dashed border-slate-200 dark:border-darkmode-300 xl:mx-5"></div>
                                <div>
                                    <div class="text-lg font-medium text-danger xl:text-xl">
                                        {{ __('global.currency_symbol', ['amount' => number_format($currentMonth['expenses']['total_expenses'])]) }}
                                    </div>
                                    <div class="mt-0.5 text-slate-500">{{ __('global.total_expenses') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-10 h-[300px]">
                            <canvas id="revenue-expense-chart"></canvas>
                        </div>
                    </div>
                </div>
                <!-- END: Revenue Report -->

                <!-- BEGIN: Attendance Status -->
                <div @class(['col-span-12 mt-6 xl:col-span-12 overflow-x-auto'])>
                    <div class="intro-y block h-10 items-center sm:flex">
                        <h2 class="mr-5 truncate text-lg font-medium">{{ __('global.recent_attendance') }}</h2>
                        <a href="{{ route('attendance.index') }}" class="ml-auto text-primary">{{ __('global.view_all_attendance') }}</a>
                    </div>
                    <div class="intro-y mt-8 overflow-auto sm:mt-0 lg:overflow-visible">
                         <table class="table table-report -mt-2">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">{{ __('global.student') }}</th>
                                    <th class="text-center whitespace-nowrap">{{ __('global.class') }}</th>
                                    <th class="text-center whitespace-nowrap">{{ __('global.date') }}</th>
                                    <th class="text-center whitespace-nowrap">{{ __('global.status') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stats['recent_attendance'] as $attendance)
                                    <tr class="intro-x">
                                        <td class="w-40">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 image-fit zoom-in mr-3">
                                                    <img alt="{{ $attendance->child->name }}" class="rounded-full shadow-lg" src="{{ $attendance->child->photo_path ? asset($attendance->child->photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode($attendance->child->name) . '&background=random' }}">
                                                </div>
                                                <div class="font-medium whitespace-nowrap">{{ $attendance->child->name }}</div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="text-slate-500 text-xs whitespace-nowrap">{{ $attendance->child->class->name ?? 'N/A' }}</div>
                                        </td>
                                        <td class="text-center">
                                            <div class="whitespace-nowrap">{{ $attendance->date->format('Y-m-d') }}</div>
                                        </td>
                                        <td class="text-center">
                                            <div class="flex items-center justify-center {{ $attendance->status == 'present' ? 'text-success' : 'text-danger' }}">
                                                <x-base.lucide icon="CheckSquare" class="w-4 h-4 mr-2" /> {{ __('global.'.$attendance->status) }}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                         </table>
                    </div>
                </div>
                <!-- END: Attendance Status -->
            </div>
        </div>

        <!-- BEGIN: Sidebar -->
        <div class="col-span-12 2xl:col-span-3">
            <div class="-mb-10 pb-10 2xl:border-l border-slate-200 dark:border-darkmode-400">
                <div class="grid grid-cols-12 gap-x-6 gap-y-6 2xl:gap-x-0 2xl:pl-6">
                    <!-- Transactions -->
                    <div class="col-span-12 mt-3 md:col-span-6 xl:col-span-4 2xl:col-span-12 2xl:mt-8">
                        <div class="intro-x flex h-10 items-center">
                            <h2 class="mr-5 truncate text-lg font-medium">{{ __('global.recent_payments') }}</h2>
                        </div>
                        <div class="mt-5">
                            @php
                                $recentPayments = \App\Models\Payment::with('child')->latest()->limit(5)->get();
                            @endphp
                            @foreach($recentPayments as $payment)
                                <div class="intro-x">
                                    <div class="box zoom-in mb-3 flex items-center px-5 py-3">
                                        <div class="image-fit h-10 w-10 flex-none overflow-hidden rounded-full shadow-md">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($payment->child->name ?? 'User') }}&background=6366f1&color=fff" />
                                        </div>
                                        <div class="ml-4 mr-auto">
                                            <div class="font-medium">{{ $payment->child->name ?? 'N/A' }}</div>
                                            <div class="mt-0.5 text-xs text-slate-500">{{ $payment->payment_date->format('Y-m-d') }}</div>
                                        </div>
                                        <div class="text-success font-bold text-xs">
                                            +{{ number_format($payment->amount) }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <a href="{{ route('payments.index') }}" class="intro-x block w-full rounded-md border border-dotted border-slate-400 py-3 text-center text-slate-500 dark:border-darkmode-300">
                                {{ __('global.view_all') }}
                            </a>
                        </div>
                    </div>

                    <!-- Upcoming Birthdays -->
                    <div class="col-span-12 mt-3 md:col-span-6 xl:col-span-4 2xl:col-span-12">
                        <div class="intro-x flex h-10 items-center">
                            <h2 class="mr-5 truncate text-lg font-medium">{{ __('global.upcoming_birthdays') }}</h2>
                        </div>
                        <div class="mt-5">
                            @php
                                $birthdays = \App\Models\Children::whereMonth('dob', now()->month)
                                    ->whereDay('dob', '>=', now()->day)
                                    ->orderByRaw('DAY(dob) ASC')
                                    ->limit(5)
                                    ->get();
                            @endphp
                            @forelse($birthdays as $child)
                                <div class="intro-x box p-4 zoom-in mb-3 border-l-4 border-primary">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                            <img alt="{{ $child->name }}" src="{{ $child->photo_path ? asset($child->photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode($child->name) . '&background=FEF3C7&color=D97706' }}">
                                        </div>
                                        <div class="ml-4 mr-auto">
                                            <div class="font-medium">{{ $child->name }}</div>
                                            <div class="text-slate-500 text-xs mt-0.5">{{ $child->dob->format('M d') }} ({{ $child->dob->age }} {{ __('global.years_old') }})</div>
                                        </div>
                                        <div class="text-pending">
                                            <x-base.lucide icon="Cake" class="w-5 h-5" />
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-slate-500 text-center py-4 bg-slate-50 rounded-lg dark:bg-darkmode-600">{{ __('global.no_birthdays_soon') }}</div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="col-span-12 mt-3 md:col-span-6 xl:col-span-4 2xl:col-span-12">
                        <div class="intro-x flex h-10 items-center">
                            <h2 class="mr-5 truncate text-lg font-medium">{{ __('global.quick_actions') }}</h2>
                        </div>
                        <div class="mt-5 grid grid-cols-2 gap-3">
                            <x-base.button as="a" href="{{ route('children.create') }}" variant="outline-primary" class="w-full flex-col p-4 bg-white dark:bg-darkmode-600 border-dashed">
                                <x-base.lucide icon="UserPlus" class="w-6 h-6 mb-2" />
                                <span class="text-xs">{{ __('global.add_student') }}</span>
                            </x-base.button>
                            <x-base.button as="a" href="{{ route('payments.create') }}" variant="outline-success" class="w-full flex-col p-4 bg-white dark:bg-darkmode-600 border-dashed">
                                <x-base.lucide icon="DollarSign" class="w-6 h-6 mb-2" />
                                <span class="text-xs">{{ __('global.record_payment') }}</span>
                            </x-base.button>
                            <x-base.button as="a" href="{{ route('attendance.bulk') }}" variant="outline-pending" class="w-full flex-col p-4 bg-white dark:bg-darkmode-600 border-dashed">
                                <x-base.lucide icon="CheckSquare" class="w-6 h-6 mb-2" />
                                <span class="text-xs">{{ __('global.mark_attendance') }}</span>
                            </x-base.button>
                            <x-base.button as="a" href="{{ route('finance.attendance-report') }}" variant="outline-info" class="w-full flex-col p-4 bg-white dark:bg-darkmode-600 border-dashed">
                                <x-base.lucide icon="FileText" class="w-6 h-6 mb-2" />
                                <span class="text-xs">{{ __('global.view_reports') }}</span>
                            </x-base.button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const ctx = document.getElementById('revenue-expense-chart').getContext('2d');
                
                const revenue = {{ $currentMonth['revenue']['total_revenue'] }};
                const expenses = {{ $currentMonth['expenses']['total_expenses'] }};
                
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'], // Simplified for now
                        datasets: [
                            {
                                label: '{{ __('global.revenue') }}',
                                data: [revenue * 0.2, revenue * 0.5, revenue * 0.8, revenue],
                                borderColor: 'rgb(59, 130, 246)',
                                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                                fill: true,
                                tension: 0.4
                            },
                            {
                                label: '{{ __('global.expenses') }}',
                                data: [expenses * 0.3, expenses * 0.4, expenses * 0.6, expenses],
                                borderColor: 'rgb(239, 68, 68)',
                                backgroundColor: 'rgba(239, 68, 68, 0.1)',
                                fill: true,
                                tension: 0.4
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'top',
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    drawBorder: false,
                                    color: 'rgba(0, 0, 0, 0.05)'
                                }
                            }
                        }
                    }
                });
            });
        </script>
    @endpush
@endsection