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
                        <h2 class="mr-5 truncate text-lg font-medium">{{ __('global.general_report') }}</h2>
                        <a href="{{ route('dashboard-overview-1') }}" class="ml-auto flex items-center text-primary">
                            <x-base.lucide class="mr-3 h-4 w-4" icon="RefreshCcw" /> {{ __('global.reload_data') }}
                        </a>
                    </div>
                    <div class="mt-5 grid grid-cols-12 gap-6">
                        <!-- Total Students -->
                        <x-widgets.stat-card
                            title="{{ __('global.total_students') }}"
                            value="{{ $generalMetrics['total_students'] }}"
                            icon="Users"
                            color="primary"
                            route="children.index"
                        />
                        
                        <!-- Total Teachers -->
                        <x-widgets.stat-card
                            title="{{ __('global.total_teachers') }}"
                            value="{{ $generalMetrics['total_teachers'] }}"
                            icon="User"
                            color="pending"
                            route="teachers.index"
                        />
                        
                        <!-- Monthly Revenue -->
                        <x-widgets.stat-card
                            title="{{ __('global.monthly_revenue') }}"
                            value="{{ $financialSummary['current_month_revenue'] }}"
                            format="currency"
                            icon="TrendingUp"
                            color="success"
                            route="finance.revenue"
                        />
                        
                        <!-- Total Classes -->
                        <x-widgets.stat-card
                            title="{{ __('global.total_classes') }}"
                            value="{{ $generalMetrics['total_classes'] }}"
                            icon="Home"
                            color="warning"
                            route="classes.index"
                        />
                        
                        <!-- Active Attendance Today -->
                        <x-widgets.stat-card
                            title="{{ __('global.active_attendance') }}"
                            value="{{ $generalMetrics['active_attendance_today'] }}"
                            description="Today's attendance"
                            icon="UserCheck"
                            color="info"
                            route="attendance.index"
                        />
                        
                        <!-- Outstanding Balances -->
                        <x-widgets.stat-card
                            title="Outstanding Fees"
                            value="{{ $outstandingBalances['total_outstanding'] }}"
                            format="currency"
                            description="{{ $outstandingBalances['count'] }} students"
                            icon="DollarSign"
                            color="danger"
                            route="finance.outstanding-balances"
                        />
                    </div>
                </div>
                <!-- END: General Metrics -->

                <!-- BEGIN: Financial Summary -->
                <div class="col-span-12 mt-8 lg:col-span-6">
                    <div class="intro-y block h-10 items-center sm:flex">
                        <h2 class="mr-5 truncate text-lg font-medium">{{ __('global.financial_reporting') }}</h2>
                        <div class="relative mt-3 text-slate-500 sm:ml-auto sm:mt-0">
                            <x-base.lucide
                                class="absolute inset-y-0 left-0 z-10 my-auto ml-3 h-4 w-4"
                                icon="Calendar"
                            />
                            <x-base.litepicker
                                class="datepicker !box pl-10 sm:w-56"
                                type="text"
                                :options="[
                                    'format' => 'YYYY-MM-DD',
                                    'singleMode' => false,
                                ]"
                            />
                        </div>
                    </div>
                    <div class="intro-y box mt-5 p-5">
                        <div class="flex flex-col md:flex-row md:items-center">
                            <div class="flex">
                                <div>
                                    <div class="text-lg font-medium text-primary dark:text-slate-300 xl:text-xl">
                                        {{ __('global.currency_symbol', ['amount' => number_format($financialSummary['current_month_revenue'])]) }}
                                    </div>
                                    <div class="mt-0.5 text-slate-500">{{ __('global.this_month_revenue') }}</div>
                                </div>
                                <div
                                    class="mx-4 h-12 w-px border border-r border-dashed border-slate-200 dark:border-darkmode-300 xl:mx-5">
                                </div>
                                <div>
                                    <div class="text-lg font-medium text-danger xl:text-xl">
                                        {{ __('global.currency_symbol', ['amount' => number_format($financialSummary['current_month_expenses'])]) }}
                                    </div>
                                    <div class="mt-0.5 text-slate-500">{{ __('global.total_expenses') }}</div>
                                </div>
                            </div>
                            <x-base.menu class="mt-5 md:ml-auto md:mt-0">
                                <x-base.menu.button
                                    class="font-normal"
                                    as="x-base.button"
                                    variant="outline-secondary"
                                >
                                    {{ __('global.filter_by_category') }}
                                    <x-base.lucide
                                        class="ml-2 h-4 w-4"
                                        icon="ChevronDown"
                                    />
                                </x-base.menu.button>
                                <x-base.menu.items class="h-32 w-40 overflow-y-auto">
                                    <x-base.menu.item>{{ __('global.tuition_fees') }}</x-base.menu.item>
                                    <x-base.menu.item>{{ __('global.activity_fees') }}</x-base.menu.item>
                                    <x-base.menu.item>{{ __('global.material_fees') }}</x-base.menu.item>
                                    <x-base.menu.item>{{ __('global.other_fees') }}</x-base.menu.item>
                                </x-base.menu.items>
                            </x-base.menu>
                        </div>
                        
                        <!-- Revenue vs Expenses Chart -->
                        <div class="mt-6">
                            <canvas id="revenueChart" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <!-- END: Financial Summary -->

                <!-- BEGIN: Recent Activities -->
                <div class="col-span-12 mt-8 sm:col-span-6 lg:col-span-6">
                    <x-widgets.list-card
                        title="{{ __('global.recent_activities') }}"
                        :items="$recentActivities"
                        icon="Activity"
                        color="primary"
                        route="dashboard-overview-1"
                        :show-view-all="true"
                        empty-message="{{ __('global.no_recent_activities') }}"
                    />
                </div>
                <!-- END: Recent Activities -->

                <!-- BEGIN: Quick Actions -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex h-10 items-center">
                        <h2 class="mr-5 truncate text-lg font-medium">{{ __('global.quick_actions') }}</h2>
                    </div>
                    <div class="mt-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($quickActions as $action)
                            <x-widgets.quick-action
                                :title="$action['title']"
                                :description="$action['description']"
                                :icon="$action['icon']"
                                :route="$action['route']"
                                :color="$action['color']"
                                :permission="$action['permission'] ?? null"
                            />
                        @endforeach
                    </div>
                </div>
                <!-- END: Quick Actions -->

                <!-- BEGIN: Enrollment Statistics -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex h-10 items-center">
                        <h2 class="mr-5 truncate text-lg font-medium">{{ __('global.enrollment_statistics') }}</h2>
                    </div>
                    <div class="intro-y box mt-5 p-5">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-primary">{{ $enrollmentStats['total_enrolled'] }}</div>
                                <div class="text-sm text-slate-500">{{ __('global.total_enrolled') }}</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-success">{{ $enrollmentStats['total_capacity'] }}</div>
                                <div class="text-sm text-slate-500">{{ __('global.total_capacity') }}</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-warning">{{ $enrollmentStats['total_available'] }}</div>
                                <div class="text-sm text-slate-500">{{ __('global.available_spots') }}</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-info">{{ $enrollmentStats['overall_occupancy'] }}%</div>
                                <div class="text-sm text-slate-500">{{ __('global.occupancy_rate') }}</div>
                            </div>
                        </div>
                        
                        <!-- Class-wise enrollment -->
                        <div class="mt-6">
                            <h3 class="text-md font-medium mb-3">{{ __('global.by_class') }}</h3>
                            <div class="space-y-2">
                                @foreach($enrollmentStats['by_class'] as $classStat)
                                    <div class="flex items-center justify-between p-2 bg-slate-50 rounded">
                                        <span class="font-medium">{{ $classStat['class_name'] }}</span>
                                        <div class="flex items-center space-x-4">
                                            <span class="text-sm">
                                                {{ $classStat['enrolled'] }}/{{ $classStat['capacity'] }}
                                            </span>
                                            <div class="w-24 bg-slate-200 rounded-full h-2">
                                                <div 
                                                    class="bg-{{ $classStat['occupancy_rate'] > 80 ? 'danger' : ($classStat['occupancy_rate'] > 60 ? 'warning' : 'success') }} h-2 rounded-full" 
                                                    style="width: {{ $classStat['occupancy_rate'] }}%">
                                                </div>
                                            </div>
                                            <span class="text-sm w-12 text-right">{{ $classStat['occupancy_rate'] }}%</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Enrollment Statistics -->
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-span-12 2xl:col-span-3">
            <div class="-mb-10 pb-10 2xl:border-l">
                <div class="grid grid-cols-12 gap-x-6 gap-y-6 2xl:gap-x-0 2xl:pl-6">
                    <!-- BEGIN: Upcoming Events -->
                    <div class="col-span-12 mt-3 md:col-span-6 xl:col-span-12 2xl:mt-8">
                        <div class="intro-y flex h-10 items-center">
                            <h2 class="mr-5 truncate text-lg font-medium">{{ __('global.upcoming_events') }}</h2>
                        </div>
                        <div class="mt-5">
                            @if(count($upcomingEvents) > 0)
                                @foreach(array_slice($upcomingEvents, 0, 5) as $event)
                                    <div class="intro-y">
                                        <div class="box zoom-in mb-3 p-4">
                                            <div class="font-medium truncate">{{ $event['title'] }}</div>
                                            <div class="mt-1 text-xs text-slate-500">
                                                {{ \Carbon\Carbon::parse($event['start_date'])->format('M d, Y') }}
                                            </div>
                                            <div class="mt-2 text-xs text-slate-400">
                                                {{ $event['days_until'] }} {{ __('global.days_until') }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <a
                                    class="intro-y block w-full rounded-md border border-dotted border-slate-400 py-3 text-center text-slate-500 dark:border-darkmode-300"
                                    href="{{ route('events.index') }}"
                                >
                                    {{ __('global.view_all_events') }}
                                </a>
                            @else
                                <div class="text-center py-8 text-slate-500">
                                    <x-base.lucide class="h-12 w-12 mx-auto mb-3 text-slate-300" icon="Calendar" />
                                    <p>{{ __('global.no_upcoming_events') }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- END: Upcoming Events -->

                    <!-- BEGIN: Recent Payments -->
                    <div class="col-span-12 mt-3 md:col-span-6 xl:col-span-12">
                        <div class="intro-y flex h-10 items-center">
                            <h2 class="mr-5 truncate text-lg font-medium">{{ __('global.recent_payments') }}</h2>
                        </div>
                        <div class="mt-5">
                            @if(isset($financialSummary['recent_payments']) && count($financialSummary['recent_payments']) > 0)
                                @foreach(array_slice($financialSummary['recent_payments'], 0, 5) as $payment)
                                    <div class="intro-y">
                                        <div class="box zoom-in mb-3 flex items-center px-4 py-3">
                                            <div class="image-fit h-10 w-10 flex-none overflow-hidden rounded-full">
                                                <img
                                                    src="{{ $payment['child_photo'] ?? 'https://via.placeholder.com/150' }}"
                                                    alt="Student"
                                                />
                                            </div>
                                            <div class="ml-4 mr-auto">
                                                <div class="font-medium">{{ $payment['child_name'] }}</div>
                                                <div class="mt-0.5 text-xs text-slate-500">
                                                    {{ $payment['date'] }}
                                                </div>
                                            </div>
                                            <div class="text-success font-medium">
                                                +${{ number_format($payment['amount'], 2) }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center py-8 text-slate-500">
                                    <x-base.lucide class="h-12 w-12 mx-auto mb-3 text-slate-300" icon="DollarSign" />
                                    <p>{{ __('global.no_recent_payments') }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- END: Recent Payments -->
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Revenue Chart
        const ctx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [@foreach($financialSummary['monthly_revenue'] as $revenue)'{{ $revenue->month }}',@endforeach],
                datasets: [{
                    label: 'Revenue',
                    data: [@foreach($financialSummary['monthly_revenue'] as $revenue){{ $revenue->total }},@endforeach],
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    tension: 0.1
                }, {
                    label: 'Expenses',
                    data: [@foreach($financialSummary['monthly_expenses'] as $expense){{ $expense->total }},@endforeach],
                    borderColor: 'rgb(255, 99, 132)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    tension: 0.1
                }]
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
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    @endpush
@endsection