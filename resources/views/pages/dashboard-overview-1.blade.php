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
                        <a href="{{ route('dashboard-overview-1') }}" class="ml-auto flex items-center text-primary">
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
                                            <x-base.tippy class="cursor-pointer bg-primary/10 rounded-full px-2 py-1 text-xs font-medium text-primary" content="{{ __('global.active_students') }}">
                                                {{ $enhancedMetrics['active_students'] ?? 0 }} {{ __('global.active') }}
                                            </x-base.tippy>
                                        </div>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8 text-slate-600 dark:text-slate-300">{{ number_format($stats['total_students'] ?? 0) }}</div>
                                    <div class="mt-1 text-base text-slate-500">{{ __('global.total_students') }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Active Attendance -->
                        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                            <div class="report-box zoom-in before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']">
                                <div class="box p-5">
                                    <div class="flex">
                                        <x-base.lucide class="h-8 w-8 text-success" icon="UserCheck" />
                                        <div class="ml-auto">
                                            <div class="flex items-center text-success">
                                                {{ $attendanceStats['today']['attendance_rate'] ?? 0 }}%
                                                <x-base.lucide class="ml-1 h-4 w-4" icon="ChevronUp" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8 text-slate-600 dark:text-slate-300">{{ number_format($stats['active_attendance'] ?? 0) }}</div>
                                    <div class="mt-1 text-base text-slate-500">{{ __('global.today_attendance') }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Total Teachers -->
                        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                            <div class="report-box zoom-in before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']">
                                <div class="box p-5">
                                    <div class="flex">
                                        <x-base.lucide class="h-8 w-8 text-warning" icon="GraduationCap" />
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8 text-slate-600 dark:text-slate-300">{{ number_format($stats['total_teachers'] ?? 0) }}</div>
                                    <div class="mt-1 text-base text-slate-500">{{ __('global.total_teachers') }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Total Classes -->
                        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                            <div class="report-box zoom-in before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']">
                                <div class="box p-5">
                                    <div class="flex">
                                        <x-base.lucide class="h-8 w-8 text-info" icon="Layout" />
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8 text-slate-600 dark:text-slate-300">{{ number_format($stats['total_classes'] ?? 0) }}</div>
                                    <div class="mt-1 text-base text-slate-500">{{ __('global.total_classes') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->

                <!-- BEGIN: Class Utilization -->
                <div class="col-span-12 mt-8 lg:col-span-6">
                    <div class="intro-y block h-10 items-center sm:flex">
                        <h2 class="mr-5 truncate text-lg font-medium">{{ __('global.class_utilization') }}</h2>
                    </div>
                    <div class="intro-y box mt-12 p-5 sm:mt-5">
                        <div class="flex flex-col md:flex-row md:items-center">
                            <div class="flex">
                                <div>
                                    <div class="text-lg font-medium text-primary dark:text-slate-300 xl:text-xl">
                                        {{ $classStats['average_utilization'] ?? 0 }}%
                                    </div>
                                    <div class="mt-0.5 text-slate-500">{{ __('global.average_utilization') }}</div>
                                </div>
                                <div class="mx-4 h-12 w-px border border-r border-dashed border-slate-200 dark:border-darkmode-300 xl:mx-5"></div>
                                <div>
                                    <div class="text-lg font-medium text-slate-500 xl:text-xl">
                                        {{ $classStats['total_students'] ?? 0 }} / {{ $classStats['total_capacity'] ?? 'N/A' }}
                                    </div>
                                    <div class="mt-0.5 text-slate-500">{{ __('global.capacity_usage') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            @foreach(array_slice($classStats['utilization_rates'] ?? [], 0, 5) as $class)
                            <div class="mt-4">
                                <div class="flex">
                                    <div class="mr-auto">{{ $class['class_name'] }}</div>
                                    <div>{{ $class['utilization_rate'] }}% ({{ $class['student_count'] }}/{{ $class['capacity'] }})</div>
                                </div>
                                <div class="mt-2 h-1 w-full rounded-full bg-slate-200 dark:bg-darkmode-400">
                                    <div class="h-full rounded-full {{ $class['utilization_rate'] > 90 ? 'bg-danger' : ($class['utilization_rate'] > 75 ? 'bg-warning' : 'bg-primary') }}" style="width: {{ $class['utilization_rate'] }}%"></div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- END: Class Utilization -->

                <!-- BEGIN: Attendance Chart -->
                <div class="col-span-12 mt-8 sm:col-span-6 lg:col-span-6">
                    <div class="intro-y flex h-10 items-center">
                        <h2 class="mr-5 truncate text-lg font-medium">{{ __('global.attendance_overview') }}</h2>
                    </div>
                    <div class="intro-y box mt-5 p-5">
                        <div class="flex flex-col md:flex-row md:items-center">
                            <div class="flex">
                                <div class="flex items-center mr-4">
                                    <div class="w-2 h-2 bg-success rounded-full mr-2"></div>
                                    <span class="text-slate-500">{{ __('global.present') }}: {{ $attendanceStats['today']['present'] ?? 0 }}</span>
                                </div>
                                <div class="flex items-center mr-4">
                                    <div class="w-2 h-2 bg-danger rounded-full mr-2"></div>
                                    <span class="text-slate-500">{{ __('global.absent') }}: {{ $attendanceStats['today']['absent'] ?? 0 }}</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-warning rounded-full mr-2"></div>
                                    <span class="text-slate-500">{{ __('global.late') }}: {{ $attendanceStats['today']['late'] ?? 0 }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8">
                             <!-- Using a simple visual representation instead of complex chart for now -->
                             <div class="flex justify-center items-center h-[200px]">
                                <div class="w-48 h-48 rounded-full border-8 border-slate-100 flex items-center justify-center relative">
                                    <div class="absolute inset-0 rounded-full border-8 border-success" style="clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%); transform: rotate({{ ($attendanceStats['today']['attendance_rate'] ?? 0) * 3.6 }}deg);"></div>
                                    <div class="text-center">
                                        <div class="text-3xl font-bold">{{ $attendanceStats['today']['attendance_rate'] ?? 0 }}%</div>
                                        <div class="text-slate-500">{{ __('global.rate') }}</div>
                                    </div>
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
                <!-- END: Attendance Chart -->

                <!-- BEGIN: Recent Activities -->
                <div class="col-span-12 mt-6">
                    <div class="intro-y block h-10 items-center sm:flex">
                        <h2 class="mr-5 truncate text-lg font-medium">{{ __('global.recent_activities') }}</h2>
                    </div>
                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                        <table class="table table-report sm:mt-2">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">{{ __('global.activity') }}</th>
                                    <th class="text-center whitespace-nowrap">{{ __('global.type') }}</th>
                                    <th class="text-center whitespace-nowrap">{{ __('global.date') }}</th>
                                    <th class="text-center whitespace-nowrap">{{ __('global.status') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentActivities['attendances']->take(3) as $attendance)
                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <div class="rounded-full w-full h-full bg-primary/20 flex items-center justify-center text-primary font-bold">
                                                    {{ substr($attendance->child->name ?? 'S', 0, 1) }}
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <a href="" class="font-medium whitespace-nowrap">{{ $attendance->child->name ?? 'Student' }}</a>
                                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $attendance->child->class->name ?? 'Class' }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ __('global.attendance') }}</td>
                                    <td class="text-center">{{ $attendance->date }}</td>
                                    <td class="w-40">
                                        <div class="flex items-center justify-center {{ $attendance->status == 'present' ? 'text-success' : 'text-danger' }}">
                                            <x-base.lucide class="w-4 h-4 mr-2" icon="{{ $attendance->status == 'present' ? 'CheckSquare' : 'XSquare' }}" /> {{ ucfirst($attendance->status) }}
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                
                                @foreach($recentActivities['payments']->take(2) as $payment)
                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <div class="rounded-full w-full h-full bg-success/20 flex items-center justify-center text-success font-bold">
                                                    $
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <a href="" class="font-medium whitespace-nowrap">{{ $payment->child->name ?? 'Student' }}</a>
                                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ __('global.payment') }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ __('global.payment') }}</td>
                                    <td class="text-center">{{ $payment->payment_date }}</td>
                                    <td class="w-40">
                                        <div class="flex items-center justify-center text-success">
                                            <x-base.lucide class="w-4 h-4 mr-2" icon="CheckCircle" /> {{ number_format($payment->amount) }}
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END: Recent Activities -->
            </div>
        </div>
        
        <div class="col-span-12 2xl:col-span-3">
            <div class="2xl:border-l -mb-10 pb-10">
                <div class="2xl:pl-6 grid grid-cols-12 gap-6">
                    <!-- BEGIN: Financial Summary -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3 2xl:mt-8">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">{{ __('global.financial_summary') }}</h2>
                        </div>
                        <div class="mt-5">
                            <div class="intro-x box p-5">
                                <div class="flex">
                                    <x-base.lucide class="w-6 h-6 text-primary" icon="DollarSign" />
                                    <div class="ml-auto">
                                        <div class="text-success flex items-center">
                                            {{ $financialStats['growth_rate'] ?? 0 }}% <x-base.lucide class="w-4 h-4 ml-1" icon="ChevronUp" />
                                        </div>
                                    </div>
                                </div>
                                <div class="text-2xl font-medium mt-5">{{ number_format($financialStats['current_month'] ?? 0) }}</div>
                                <div class="text-slate-500">{{ __('global.monthly_revenue') }}</div>
                            </div>
                            <div class="intro-x box p-5 mt-5">
                                <div class="flex">
                                    <x-base.lucide class="w-6 h-6 text-danger" icon="CreditCard" />
                                </div>
                                <div class="text-2xl font-medium mt-5">{{ number_format($financialStats['pending_payments'] ?? 0) }}</div>
                                <div class="text-slate-500">{{ __('global.pending_payments') }}</div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Financial Summary -->

                    <!-- BEGIN: Upcoming Events -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">{{ __('global.upcoming_events') }}</h2>
                        </div>
                        <div class="mt-5">
                            @forelse($recentActivities['events'] ?? [] as $event)
                            <div class="intro-x">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                        <div class="w-full h-full bg-primary/10 flex items-center justify-center text-primary font-bold">
                                            {{ \Carbon\Carbon::parse($event->start_datetime)->format('d') }}
                                        </div>
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">{{ $event->title }}</div>
                                        <div class="text-slate-500 text-xs mt-0.5">{{ \Carbon\Carbon::parse($event->start_datetime)->format('M d, H:i') }}</div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="intro-x text-center text-slate-500 py-4">
                                {{ __('global.no_upcoming_events') }}
                            </div>
                            @endforelse
                            <a href="" class="intro-x w-full block text-center rounded-md py-3 border border-dotted border-slate-400 dark:border-darkmode-300 text-slate-500">View More</a>
                        </div>
                    </div>
                    <!-- END: Upcoming Events -->
                    
                    <!-- BEGIN: Quick Actions -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">{{ __('global.quick_actions') }}</h2>
                        </div>
                        <div class="mt-5 grid grid-cols-2 gap-4">
                            @foreach($quickActions as $action)
                            <a href="{{ route($action['route']) }}" class="intro-x box p-5 flex items-center transition-all duration-200 hover:scale-[1.01]">
                                <x-base.lucide class="w-6 h-6 mr-3 text-{{ $action['color'] }}" icon="{{ $action['icon'] }}" />
                                <div class="font-medium">{{ __($action['title']) }}</div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <!-- END: Quick Actions -->
                </div>
            </div>
        </div>
    </div>
@endsection
