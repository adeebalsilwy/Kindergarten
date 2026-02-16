@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('global.dashboard') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="grid grid-cols-12 gap-6">
        <!-- Main Content Area -->
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Metrics -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex h-10 items-center">
                        <h2 class="me-5 truncate text-lg font-medium">{{ __('global.general_report') }}</h2>
                        <a href="{{ route('dashboard-overview-1') }}" class="ms-auto flex items-center text-primary">
                            <x-base.lucide class="me-3 h-4 w-4" icon="RefreshCcw" /> {{ __('global.reload_data') }}
                        </a>
                    </div>
                    <div class="mt-5 grid grid-cols-12 gap-6">
                        <!-- Total Students -->
                        <x-widgets.stat-card
                            title="{{ __('global.Total_Students') }}"
                            value="{{ $enhancedMetrics['total_students'] }}"
                            icon="Users"
                            color="primary"
                            route="children.index"
                        />
                        
                        <!-- Active Students -->
                        <x-widgets.stat-card
                            title="{{ __('global.Active_Students') }}"
                            value="{{ $enhancedMetrics['active_students'] }}"
                            icon="UserCheck"
                            color="success"
                            route="children.index"
                        />
                        
                        <!-- Total Teachers -->
                        <x-widgets.stat-card
                            title="{{ __('global.Total_Teachers') }}"
                            value="{{ $enhancedMetrics['total_teachers'] }}"
                            icon="User"
                            color="pending"
                            route="teachers.index"
                        />
                        
                        <!-- Total Classes -->
                        <x-widgets.stat-card
                            title="{{ __('global.Total_Classes') }}"
                            value="{{ $enhancedMetrics['total_classes'] }}"
                            icon="Home"
                            color="warning"
                            route="classes.index"
                        />
                        
                        <!-- Active Attendance Today -->
                        <x-widgets.stat-card
                            title="{{ __('global.Active_Attendance') }}"
                            value="{{ $enhancedMetrics['active_attendance'] }}"
                            description="Today's attendance"
                            icon="UserCheck"
                            color="info"
                            route="attendance.index"
                        />
                        
                        <!-- Monthly Revenue -->
                        <x-widgets.stat-card
                            title="{{ __('global.Monthly_Revenue') }}"
                            value="{{ $enhancedMetrics['monthly_revenue'] }}"
                            format="currency"
                            icon="DollarSign"
                            color="success"
                            route="finance.revenue"
                        />
                    </div>
                </div>
                <!-- END: General Metrics -->

                <!-- BEGIN: Attendance Stats -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y block h-10 items-center sm:flex">
                        <h2 class="me-5 truncate text-lg font-medium">{{ __('global.Attendance_Statistics') }}</h2>
                    </div>
                    <div class="intro-y box mt-5 p-5">
                        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                            <div class="text-center">
                                <div class="text-xl font-bold text-primary">{{ $attendanceStats['today']['total_today'] }}</div>
                                <div class="text-sm text-slate-500">{{ __('global.Total_Today') }}</div>
                            </div>
                            <div class="text-center">
                                <div class="text-xl font-bold text-success">{{ $attendanceStats['today']['present'] }}</div>
                                <div class="text-sm text-slate-500">{{ __('global.Present') }}</div>
                            </div>
                            <div class="text-center">
                                <div class="text-xl font-bold text-warning">{{ $attendanceStats['today']['late'] }}</div>
                                <div class="text-sm text-slate-500">{{ __('global.Late') }}</div>
                            </div>
                            <div class="text-center">
                                <div class="text-xl font-bold text-danger">{{ $attendanceStats['today']['absent'] }}</div>
                                <div class="text-sm text-slate-500">{{ __('global.Absent') }}</div>
                            </div>
                            <div class="text-center">
                                <div class="text-xl font-bold text-info">{{ $attendanceStats['today']['attendance_rate'] }}%</div>
                                <div class="text-sm text-slate-500">{{ __('global.Rate') }}</div>
                            </div>
                        </div>
                        
                        <!-- Attendance Chart -->
                        <div class="mt-6">
                            <canvas id="attendanceChart" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <!-- END: Attendance Stats -->

                <!-- BEGIN: Financial Summary -->
                <div class="col-span-12 mt-8 lg:col-span-6">
                    <div class="intro-y block h-10 items-center sm:flex">
                        <h2 class="me-5 truncate text-lg font-medium">{{ __('global.Financial_Reporting') }}</h2>
                    </div>
                    <div class="intro-y box mt-5 p-5">
                        <div class="flex flex-col md:flex-row md:items-center">
                            <div class="flex">
                                <div>
                                    <div class="text-lg font-medium text-primary dark:text-slate-300 xl:text-xl">
                                        {{ __('global.currency_symbol', ['amount' => number_format($financialStats['current_month'])]) }}
                                    </div>
                                    <div class="mt-0.5 text-slate-500">{{ __('global.this_month_revenue') }}</div>
                                </div>
                                <div
                                    class="mx-4 h-12 w-px border border-r border-dashed border-slate-200 dark:border-darkmode-300 xl:mx-5">
                                </div>
                                <div>
                                    <div class="text-lg font-medium text-danger xl:text-xl">
                                        {{ __('global.currency_symbol', ['amount' => number_format($financialStats['pending_payments'])]) }}
                                    </div>
                                    <div class="mt-0.5 text-slate-500">{{ __('global.Pending_Payments') }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Financial Chart -->
                        <div class="mt-6">
                            <canvas id="financialChart" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <!-- END: Financial Summary -->

                <!-- BEGIN: Class Utilization -->
                <div class="col-span-12 mt-8 lg:col-span-6">
                    <div class="intro-y block h-10 items-center sm:flex">
                        <h2 class="me-5 truncate text-lg font-medium">{{ __('global.Class_Utilization') }}</h2>
                    </div>
                    <div class="intro-y box mt-5 p-5">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-primary">{{ $classStats['total_classes'] }}</div>
                                <div class="text-sm text-slate-500">{{ __('global.Total_Classes') }}</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-success">{{ $classStats['total_students'] }}</div>
                                <div class="text-sm text-slate-500">{{ __('global.Total_Students') }}</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-warning">{{ $classStats['average_utilization'] }}%</div>
                                <div class="text-sm text-slate-500">{{ __('global.Average_Utilization') }}</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-info">{{ $teacherStats['average_classes_per_teacher'] }}</div>
                                <div class="text-sm text-slate-500">{{ __('global.Classes_Per_Teacher') }}</div>
                            </div>
                        </div>
                        
                        <!-- Class Utilization Details -->
                        <div class="mt-6">
                            <h3 class="text-md font-medium mb-3">{{ __('global.Class_Details') }}</h3>
                            <div class="space-y-2">
                                @foreach($classStats['utilization_rates'] as $classStat)
                                    <div class="flex items-center justify-between p-2 bg-slate-50 rounded">
                                        <span class="font-medium">{{ $classStat['class_name'] }}</span>
                                        <div class="flex items-center space-x-4">
                                            <span class="text-sm">
                                                {{ $classStat['student_count'] }}/{{ $classStat['capacity'] }}
                                            </span>
                                            <div class="w-24 bg-slate-200 rounded-full h-2">
                                                <div 
                                                    class="bg-{{ $classStat['utilization_rate'] > 80 ? 'danger' : ($classStat['utilization_rate'] > 60 ? 'warning' : 'success') }} h-2 rounded-full" 
                                                    style="width: {{ $classStat['utilization_rate'] }}%">
                                                </div>
                                            </div>
                                            <span class="text-sm w-12 text-end">{{ $classStat['utilization_rate'] }}%</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Class Utilization -->

                <!-- BEGIN: Academic Performance -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y block h-10 items-center sm:flex">
                        <h2 class="me-5 truncate text-lg font-medium">{{ __('global.Academic_Performance') }}</h2>
                    </div>
                    <div class="intro-y box mt-5 p-5">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-primary">{{ $academicStats['average_score'] }}</div>
                                <div class="text-sm text-slate-500">{{ __('global.Average_Score') }}</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-success">{{ $academicStats['highest_score'] }}</div>
                                <div class="text-sm text-slate-500">{{ __('global.Highest_Score') }}</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-warning">{{ $academicStats['lowest_score'] }}</div>
                                <div class="text-sm text-slate-500">{{ __('global.Lowest_Score') }}</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-info">{{ $academicStats['total_assessments'] }}</div>
                                <div class="text-sm text-slate-500">{{ __('global.Total_Assessments') }}</div>
                            </div>
                        </div>
                        
                        <!-- Grade Distribution -->
                        <div class="mt-6">
                            <h3 class="text-md font-medium mb-3">{{ __('global.Grade_Distribution') }}</h3>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <div class="text-center">
                                    <div class="text-xl font-bold text-success">{{ $academicStats['grade_distribution']['excellent'] }}</div>
                                    <div class="text-sm text-slate-500">{{ __('global.Excellent') }} (90-100)</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-xl font-bold text-primary">{{ $academicStats['grade_distribution']['good'] }}</div>
                                    <div class="text-sm text-slate-500">{{ __('global.Good') }} (75-89)</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-xl font-bold text-warning">{{ $academicStats['grade_distribution']['average'] }}</div>
                                    <div class="text-sm text-slate-500">{{ __('global.Average') }} (60-74)</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-xl font-bold text-danger">{{ $academicStats['grade_distribution']['below_average'] }}</div>
                                    <div class="text-sm text-slate-500">{{ __('global.Below_Average') }} (&lt;60)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Academic Performance -->

                <!-- BEGIN: Recent Activities -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex h-10 items-center">
                        <h2 class="me-5 truncate text-lg font-medium">{{ __('global.Recent_Activities') }}</h2>
                    </div>
                    <div class="intro-y box mt-5 p-5">
                        <div class="grid grid-cols-1 lg:grid-cols-5 gap-4">
                            <div class="lg:col-span-1">
                                <h3 class="text-md font-medium mb-3">{{ __('global.Attendances') }}</h3>
                                <div class="space-y-2 max-h-60 overflow-y-auto">
                                    @forelse($recentActivities['attendances'] as $activity)
                                        <div class="p-2 bg-slate-50 rounded">
                                            <div class="font-medium truncate">{{ $activity->child->name ?? 'N/A' }}</div>
                                            <div class="text-xs text-slate-500">{{ $activity->status }} - {{ $activity->date->format('M d') }}</div>
                                        </div>
                                    @empty
                                        <div class="text-center text-slate-500 py-4">{{ __('global.No_Recent_Attendances') }}</div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="lg:col-span-1">
                                <h3 class="text-md font-medium mb-3">{{ __('global.Payments') }}</h3>
                                <div class="space-y-2 max-h-60 overflow-y-auto">
                                    @forelse($recentActivities['payments'] as $activity)
                                        <div class="p-2 bg-slate-50 rounded">
                                            <div class="font-medium truncate">{{ $activity->child->name ?? 'N/A' }}</div>
                                            <div class="text-xs text-slate-500">{{ $activity->amount }} - {{ $activity->payment_date->format('M d') }}</div>
                                        </div>
                                    @empty
                                        <div class="text-center text-slate-500 py-4">{{ __('global.No_Recent_Payments') }}</div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="lg:col-span-1">
                                <h3 class="text-md font-medium mb-3">{{ __('global.Enrollments') }}</h3>
                                <div class="space-y-2 max-h-60 overflow-y-auto">
                                    @forelse($recentActivities['enrollments'] as $activity)
                                        <div class="p-2 bg-slate-50 rounded">
                                            <div class="font-medium truncate">{{ $activity->name ?? 'N/A' }}</div>
                                            <div class="text-xs text-slate-500">{{ $activity->created_at->format('M d') }}</div>
                                        </div>
                                    @empty
                                        <div class="text-center text-slate-500 py-4">{{ __('global.No_Recent_Enrollments') }}</div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="lg:col-span-1">
                                <h3 class="text-md font-medium mb-3">{{ __('global.Activities') }}</h3>
                                <div class="space-y-2 max-h-60 overflow-y-auto">
                                    @forelse($recentActivities['activities'] as $activity)
                                        <div class="p-2 bg-slate-50 rounded">
                                            <div class="font-medium truncate">{{ $activity->title ?? 'N/A' }}</div>
                                            <div class="text-xs text-slate-500">{{ $activity->class->name ?? 'N/A' }}</div>
                                        </div>
                                    @empty
                                        <div class="text-center text-slate-500 py-4">{{ __('global.No_Recent_Activities') }}</div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="lg:col-span-1">
                                <h3 class="text-md font-medium mb-3">{{ __('global.Events') }}</h3>
                                <div class="space-y-2 max-h-60 overflow-y-auto">
                                    @forelse($recentActivities['events'] as $activity)
                                        <div class="p-2 bg-slate-50 rounded">
                                            <div class="font-medium truncate">{{ $activity->title ?? 'N/A' }}</div>
                                            <div class="text-xs text-slate-500">{{ $activity->class->name ?? 'N/A' }}</div>
                                        </div>
                                    @empty
                                        <div class="text-center text-slate-500 py-4">{{ __('global.No_Recent_Events') }}</div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Recent Activities -->
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-span-12 2xl:col-span-3">
            <div class="-mb-10 pb-10 2xl:border-l">
                <div class="grid grid-cols-12 gap-x-6 gap-y-6 2xl:gap-x-0 2xl:ps-6">
                    <!-- BEGIN: Enrollment Stats -->
                    <div class="col-span-12 mt-3 md:col-span-6 xl:col-span-12 2xl:mt-8">
                        <div class="intro-y flex h-10 items-center">
                            <h2 class="me-5 truncate text-lg font-medium">{{ __('global.Enrollment_Stats') }}</h2>
                        </div>
                        <div class="intro-y box mt-5 p-5">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="text-center">
                                    <div class="text-lg font-bold text-primary">{{ $enrollmentStats['this_month'] }}</div>
                                    <div class="text-xs text-slate-500">{{ __('global.This_Month') }}</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-lg font-bold text-success">{{ $enrollmentStats['last_month'] }}</div>
                                    <div class="text-xs text-slate-500">{{ __('global.Last_Month') }}</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-lg font-bold text-warning">{{ $enrollmentStats['growth_rate'] }}%</div>
                                    <div class="text-xs text-slate-500">{{ __('global.Growth_Rate') }}</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-lg font-bold text-info">{{ $enrollmentStats['by_status']['active'] }}</div>
                                    <div class="text-xs text-slate-500">{{ __('global.Active') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Enrollment Stats -->

                    <!-- BEGIN: Quick Actions -->
                    <div class="col-span-12 mt-3 md:col-span-6 xl:col-span-12">
                        <div class="intro-y flex h-10 items-center">
                            <h2 class="me-5 truncate text-lg font-medium">{{ __('global.Quick_Actions') }}</h2>
                        </div>
                        <div class="mt-5 space-y-3">
                            <a href="{{ route('children.create') }}" class="block">
                                <div class="box p-4 flex items-center hover:bg-slate-100 dark:hover:bg-darkmode-400">
                                    <x-base.lucide icon="UserPlus" class="w-5 h-5 text-primary me-3" />
                                    <span class="truncate">{{ __('global.Add_New_Child') }}</span>
                                </div>
                            </a>
                            <a href="{{ route('attendance.index') }}" class="block">
                                <div class="box p-4 flex items-center hover:bg-slate-100 dark:hover:bg-darkmode-400">
                                    <x-base.lucide icon="Calendar" class="w-5 h-5 text-success me-3" />
                                    <span class="truncate">{{ __('global.Record_Attendance') }}</span>
                                </div>
                            </a>
                            <a href="{{ route('payments.create') }}" class="block">
                                <div class="box p-4 flex items-center hover:bg-slate-100 dark:hover:bg-darkmode-400">
                                    <x-base.lucide icon="CreditCard" class="w-5 h-5 text-warning me-3" />
                                    <span class="truncate">{{ __('global.Process_Payment') }}</span>
                                </div>
                            </a>
                            <a href="{{ route('activities.create') }}" class="block">
                                <div class="box p-4 flex items-center hover:bg-slate-100 dark:hover:bg-darkmode-400">
                                    <x-base.lucide icon="Activity" class="w-5 h-5 text-info me-3" />
                                    <span class="truncate">{{ __('global.Add_New_Activity') }}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- END: Quick Actions -->
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Attendance Chart
        const attendanceCtx = document.getElementById('attendanceChart').getContext('2d');
        new Chart(attendanceCtx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach($chartData['attendance_chart'] as $day)
                        "{{ $day['date'] }}",
                    @endforeach
                ],
                datasets: [{
                    label: 'Attendance Rate',
                    data: [
                        @foreach($chartData['attendance_chart'] as $day)
                            {{ $day['attendance_rate'] }},
                        @endforeach
                    ],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgb(75, 192, 192)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });

        // Financial Chart
        const financialCtx = document.getElementById('financialChart').getContext('2d');
        new Chart(financialCtx, {
            type: 'line',
            data: {
                labels: [
                    @foreach($chartData['revenue_chart'] as $month)
                        "{{ $month['month'] }}",
                    @endforeach
                ],
                datasets: [{
                    label: 'Monthly Revenue',
                    data: [
                        @foreach($chartData['revenue_chart'] as $month)
                            {{ $month['revenue'] }},
                        @endforeach
                    ],
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    @endpush
@endsection