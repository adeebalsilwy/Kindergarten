@extends('../themes/kindergarten/side-menu')

@section('head')
    <title>{{ $dashboardContent['welcome_section']['title'] ?? __('global.dashboard') }} - Kindergarten Management System</title>
@endsection

@section('subcontent')
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: Kindergarten Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex h-10 items-center">
                    <h2 class="mr-5 truncate text-lg font-medium">{{ $dashboardContent['welcome_section']['title'] ?? __('global.kindergarten_report') }}</h2>
                    <a
                        class="ml-auto flex items-center text-primary"
                        href=""
                    >
                        <x-base.lucide
                            class="mr-3 h-4 w-4"
                            icon="RefreshCcw"
                        /> {{ __('global.reload_data') }}
                    </a>
                </div>
                <div class="mt-5 grid grid-cols-12 gap-6">
                    <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                        <div @class([
                            'relative zoom-in',
                            "before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']",
                        ])>
                            <div class="box p-5">
                                <div class="flex">
                                    <x-base.lucide
                                        class="h-[28px] w-[28px] text-primary"
                                        icon="Users"
                                    />
                                    <div class="ml-auto">
                                        <x-base.tippy
                                            class="flex cursor-pointer items-center rounded-full bg-success py-[3px] pl-2 pr-1 text-xs font-medium text-white"
                                            as="div"
                                            content="{{ __('global.20_higher_than_last_month') }}"
                                        >
                                            20%
                                            <x-base.lucide
                                                class="ml-0.5 h-4 w-4"
                                                icon="ChevronUp"
                                            />
                                        </x-base.tippy>
                                    </div>
                                </div>
                                <div class="mt-6 text-3xl font-medium leading-8">{{ $childrenCount ?? 0 }}</div>
                                <div class="mt-1 text-base text-slate-500">{{ $dashboardContent['stats_cards']['children_enrolled_label'] ?? __('global.children_enrolled') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                        <div @class([
                            'relative zoom-in',
                            "before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']",
                        ])>
                            <div class="box p-5">
                                <div class="flex">
                                    <x-base.lucide
                                        class="h-[28px] w-[28px] text-pending"
                                        icon="User"
                                    />
                                    <div class="ml-auto">
                                        <x-base.tippy
                                            class="flex cursor-pointer items-center rounded-full bg-success py-[3px] pl-2 pr-1 text-xs font-medium text-white"
                                            as="div"
                                            content="{{ __('global.5_higher_than_last_month') }}"
                                        >
                                            5%
                                            <x-base.lucide
                                                class="ml-0.5 h-4 w-4"
                                                icon="ChevronUp"
                                            />
                                        </x-base.tippy>
                                    </div>
                                </div>
                                <div class="mt-6 text-3xl font-medium leading-8">{{ $teachersCount ?? 0 }}</div>
                                <div class="mt-1 text-base text-slate-500">{{ $dashboardContent['stats_cards']['teachers_label'] ?? __('global.qualified_teachers') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                        <div @class([
                            'relative zoom-in',
                            "before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']",
                        ])>
                            <div class="box p-5">
                                <div class="flex">
                                    <x-base.lucide
                                        class="h-[28px] w-[28px] text-warning"
                                        icon="Layers"
                                    />
                                    <div class="ml-auto">
                                        <x-base.tippy
                                            class="flex cursor-pointer items-center rounded-full bg-success py-[3px] pl-2 pr-1 text-xs font-medium text-white"
                                            as="div"
                                            content="{{ __('global.10_higher_than_last_month') }}"
                                        >
                                            10%
                                            <x-base.lucide
                                                class="ml-0.5 h-4 w-4"
                                                icon="ChevronUp"
                                            />
                                        </x-base.tippy>
                                    </div>
                                </div>
                                <div class="mt-6 text-3xl font-medium leading-8">{{ $classesCount ?? 0 }}</div>
                                <div class="mt-1 text-base text-slate-500">
                                    {{ $dashboardContent['stats_cards']['classes_label'] ?? __('global.classes_available') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                        <div @class([
                            'relative zoom-in',
                            "before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']",
                        ])>
                            <div class="box p-5">
                                <div class="flex">
                                    <x-base.lucide
                                        class="h-[28px] w-[28px] text-success"
                                        icon="DollarSign"
                                    />
                                    <div class="ml-auto">
                                        <x-base.tippy
                                            class="flex cursor-pointer items-center rounded-full bg-success py-[3px] pl-2 pr-1 text-xs font-medium text-white"
                                            as="div"
                                            content="{{ __('global.15_higher_than_last_month') }}"
                                        >
                                            15%
                                            <x-base.lucide
                                                class="ml-0.5 h-4 w-4"
                                                icon="ChevronUp"
                                            />
                                        </x-base.tippy>
                                    </div>
                                </div>
                                <div class="mt-6 text-3xl font-medium leading-8">{{ $revenue ?? 0 }}</div>
                                <div class="mt-1 text-base text-slate-500">
                                    {{ $dashboardContent['stats_cards']['revenue_label'] ?? __('global.monthly_revenue') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Kindergarten Report -->
            
            <!-- BEGIN: Student Attendance Chart -->
            <div class="col-span-12 mt-5 lg:col-span-6">
                <div class="intro-y block h-10 items-center sm:flex">
                    <h2 class="mr-5 truncate text-lg font-medium">{{ $dashboardContent['attendance_chart']['title'] ?? __('global.student_attendance') }}</h2>
                    <div class="relative mt-3 text-slate-500 sm:ml-auto sm:mt-0">
                        <x-base.lucide
                            class="absolute inset-y-0 left-0 z-10 my-auto ml-3 h-4 w-4"
                            icon="Calendar"
                        />
                        <x-base.litepicker
                            class="datepicker !box pl-10 sm:w-56"
                            type="text"
                        />
                    </div>
                </div>
                <div class="intro-y box mt-5 p-5">
                    <div class="h-[300px]">
                        <canvas id="student-attendance-chart"></canvas>
                    </div>
                </div>
            </div>
            <!-- END: Student Attendance Chart -->
            
            <!-- BEGIN: Recent Activities -->
            <div class="col-span-12 mt-5 lg:col-span-6">
                <div class="intro-y block h-10 items-center sm:flex">
                    <h2 class="mr-5 truncate text-lg font-medium">{{ $dashboardContent['recent_activities']['title'] ?? __('global.recent_activities') }}</h2>
                    <div class="relative mt-3 text-slate-500 sm:ml-auto sm:mt-0">
                        <x-base.lucide
                            class="absolute inset-y-0 left-0 z-10 my-auto ml-3 h-4 w-4"
                            icon="Calendar"
                        />
                        <x-base.litepicker
                            class="datepicker !box pl-10 sm:w-56"
                            type="text"
                        />
                    </div>
                </div>
                <div class="intro-y box mt-5 p-5">
                    <div class="flow-root">
                        <ul class="relative m-0 list-none p-0">
                            <li class="relative mb-5 pl-8">
                                <div class="absolute bottom-0 left-0 top-5 h-4 w-4 rounded-full border border-slate-300 bg-white dark:border-darkmode-400 dark:bg-darkmode-600"></div>
                                <div class="font-medium">{{ $dashboardContent['recent_activities']['activity_1_title'] ?? __('global.new_student_enrollment') }}</div>
                                <div class="mt-1 text-slate-500 text-sm">{{ $dashboardContent['recent_activities']['activity_1_desc'] ?? __('global.student_joined_class') }}</div>
                            </li>
                            <li class="relative mb-5 pl-8">
                                <div class="absolute bottom-0 left-0 top-5 h-4 w-4 rounded-full border border-slate-300 bg-white dark:border-darkmode-400 dark:bg-darkmode-600"></div>
                                <div class="font-medium">{{ $dashboardContent['recent_activities']['activity_2_title'] ?? __('global.teacher_added') }}</div>
                                <div class="mt-1 text-slate-500 text-sm">{{ $dashboardContent['recent_activities']['activity_2_desc'] ?? __('global.new_teacher_joined') }}</div>
                            </li>
                            <li class="relative mb-5 pl-8">
                                <div class="absolute bottom-0 left-0 top-5 h-4 w-4 rounded-full border border-slate-300 bg-white dark:border-darkmode-400 dark:bg-darkmode-600"></div>
                                <div class="font-medium">{{ $dashboardContent['recent_activities']['activity_3_title'] ?? __('global.payment_received') }}</div>
                                <div class="mt-1 text-slate-500 text-sm">{{ $dashboardContent['recent_activities']['activity_3_desc'] ?? __('global.monthly_fee_payment') }}</div>
                            </li>
                            <li class="relative mb-5 pl-8">
                                <div class="absolute bottom-0 left-0 top-5 h-4 w-4 rounded-full border border-slate-300 bg-white dark:border-darkmode-400 dark:bg-darkmode-600"></div>
                                <div class="font-medium">{{ $dashboardContent['recent_activities']['activity_4_title'] ?? __('global.event_announcement') }}</div>
                                <div class="mt-1 text-slate-500 text-sm">{{ $dashboardContent['recent_activities']['activity_4_desc'] ?? __('global.upcoming_school_event') }}</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- END: Recent Activities -->
            
            <!-- BEGIN: Monthly Financial Summary -->
            <div class="col-span-12 mt-5">
                <div class="intro-y block h-10 items-center sm:flex">
                    <h2 class="mr-5 truncate text-lg font-medium">{{ $dashboardContent['monthly_summary']['title'] ?? __('global.monthly_financial_summary') }}</h2>
                    <div class="relative mt-3 text-slate-500 sm:ml-auto sm:mt-0">
                        <x-base.lucide
                            class="absolute inset-y-0 left-0 z-10 my-auto ml-3 h-4 w-4"
                            icon="Calendar"
                        />
                        <x-base.litepicker
                            class="datepicker !box pl-10 sm:w-56"
                            type="text"
                        />
                    </div>
                </div>
                <div class="intro-y box mt-5 p-5">
                    <div class="overflow-x-auto">
                        <table class="table table-report mt-2">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ __('global.category') }}</th>
                                    <th class="text-center">{{ __('global.amount') }}</th>
                                    <th class="text-center">{{ __('global.budget') }}</th>
                                    <th class="text-center">{{ __('global.spent') }}</th>
                                    <th class="text-center">{{ __('global.remaining') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">{{ __('global.teacher_salaries') }}</td>
                                    <td class="text-center">$5,000</td>
                                    <td class="text-center">$5,000</td>
                                    <td class="text-center">$4,800</td>
                                    <td class="text-center">$200</td>
                                </tr>
                                <tr>
                                    <td class="text-center">{{ __('global.supplies_materials') }}</td>
                                    <td class="text-center">$1,500</td>
                                    <td class="text-center">$1,500</td>
                                    <td class="text-center">$1,200</td>
                                    <td class="text-center">$300</td>
                                </tr>
                                <tr>
                                    <td class="text-center">{{ __('global.utilities') }}</td>
                                    <td class="text-center">$800</td>
                                    <td class="text-center">$800</td>
                                    <td class="text-center">$750</td>
                                    <td class="text-center">$50</td>
                                </tr>
                                <tr>
                                    <td class="text-center">{{ __('global.miscellaneous') }}</td>
                                    <td class="text-center">$700</td>
                                    <td class="text-center">$700</td>
                                    <td class="text-center">$500</td>
                                    <td class="text-center">$200</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END: Monthly Financial Summary -->
        </div>
    </div>
    <div class="col-span-12 2xl:col-span-3">
        <!-- BEGIN: Important Updates -->
        <div class="intro-y mt-3 box p-5">
            <h3 class="mb-5 text-lg font-medium">{{ $dashboardContent['important_updates']['title'] ?? __('global.important_updates') }}</h3>
            <div class="relative border-l-2 border-slate-200 dark:border-darkmode-400">
                <div class="relative mb-5 ml-5 pl-5">
                    <div class="absolute -left-2.5 top-0 rounded-full border border-slate-300 bg-slate-50 p-2 dark:border-darkmode-400 dark:bg-darkmode-600">
                        <x-base.lucide
                            class="h-4 w-4 text-primary"
                            icon="Info"
                        />
                    </div>
                    <div class="font-medium">{{ $dashboardContent['important_updates']['update_1_title'] ?? __('global.new_policy_update') }}</div>
                    <div class="mt-1 text-slate-500 text-sm">{{ $dashboardContent['important_updates']['update_1_desc'] ?? __('global.updated_safety_procedures') }}</div>
                </div>
                <div class="relative mb-5 ml-5 pl-5">
                    <div class="absolute -left-2.5 top-0 rounded-full border border-slate-300 bg-slate-50 p-2 dark:border-darkmode-400 dark:bg-darkmode-600">
                        <x-base.lucide
                            class="h-4 w-4 text-pending"
                            icon="Calendar"
                        />
                    </div>
                    <div class="font-medium">{{ $dashboardContent['important_updates']['update_2_title'] ?? __('global.holiday_schedule') }}</div>
                    <div class="mt-1 text-slate-500 text-sm">{{ $dashboardContent['important_updates']['update_2_desc'] ?? __('global.upcoming_holidays') }}</div>
                </div>
                <div class="relative mb-5 ml-5 pl-5">
                    <div class="absolute -left-2.5 top-0 rounded-full border border-slate-300 bg-slate-50 p-2 dark:border-darkmode-400 dark:bg-darkmode-600">
                        <x-base.lucide
                            class="h-4 w-4 text-warning"
                            icon="AlertTriangle"
                        />
                    </div>
                    <div class="font-medium">{{ $dashboardContent['important_updates']['update_3_title'] ?? __('global.maintenance_notice') }}</div>
                    <div class="mt-1 text-slate-500 text-sm">{{ $dashboardContent['important_updates']['update_3_desc'] ?? __('global.facility_maintenance') }}</div>
                </div>
            </div>
        </div>
        <!-- END: Important Updates -->
        
        <!-- BEGIN: Parents Communication -->
        <div class="intro-y mt-5 box p-5">
            <h3 class="mb-5 text-lg font-medium">{{ $dashboardContent['parents_communication']['title'] ?? __('global.parents_communication') }}</h3>
            <div class="relative border-l-2 border-slate-200 dark:border-darkmode-400">
                <div class="relative mb-5 ml-5 pl-5">
                    <div class="absolute -left-2.5 top-0 rounded-full border border-slate-300 bg-slate-50 p-2 dark:border-darkmode-400 dark:bg-darkmode-600">
                        <x-base.lucide
                            class="h-4 w-4 text-success"
                            icon="Mail"
                        />
                    </div>
                    <div class="font-medium">{{ $dashboardContent['parents_communication']['comm_1_title'] ?? __('global.new_message') }}</div>
                    <div class="mt-1 text-slate-500 text-sm">{{ $dashboardContent['parents_communication']['comm_1_desc'] ?? __('global.parent_inquiry') }}</div>
                </div>
                <div class="relative mb-5 ml-5 pl-5">
                    <div class="absolute -left-2.5 top-0 rounded-full border border-slate-300 bg-slate-50 p-2 dark:border-darkmode-400 dark:bg-darkmode-600">
                        <x-base.lucide
                            class="h-4 w-4 text-primary"
                            icon="Send"
                        />
                    </div>
                    <div class="font-medium">{{ $dashboardContent['parents_communication']['comm_2_title'] ?? __('global.newsletter_sent') }}</div>
                    <div class="mt-1 text-slate-500 text-sm">{{ $dashboardContent['parents_communication']['comm_2_desc'] ?? __('global.weekly_newsletter') }}</div>
                </div>
            </div>
        </div>
        <!-- END: Parents Communication -->
        
        <!-- BEGIN: Quick Actions -->
        <div class="intro-y mt-5 box p-5">
            <h3 class="mb-5 text-lg font-medium">{{ $dashboardContent['quick_actions']['title'] ?? __('global.quick_actions') }}</h3>
            <div class="grid grid-cols-2 gap-3">
                <a href="{{ route('children.index') }}" class="btn btn-primary w-full">
                    <x-base.lucide class="h-4 w-4 mr-2" icon="Users" />
                    {{ $dashboardContent['quick_actions']['action_1_label'] ?? __('global.add_child') }}
                </a>
                <a href="{{ route('teachers.index') }}" class="btn btn-primary w-full">
                    <x-base.lucide class="h-4 w-4 mr-2" icon="User" />
                    {{ $dashboardContent['quick_actions']['action_2_label'] ?? __('global.add_teacher') }}
                </a>
                <a href="{{ route('classes.index') }}" class="btn btn-primary w-full">
                    <x-base.lucide class="h-4 w-4 mr-2" icon="Layers" />
                    {{ $dashboardContent['quick_actions']['action_3_label'] ?? __('global.add_class') }}
                </a>
                <a href="{{ route('finance.dashboard') }}" class="btn btn-primary w-full">
                    <x-base.lucide class="h-4 w-4 mr-2" icon="DollarSign" />
                    {{ $dashboardContent['quick_actions']['action_4_label'] ?? __('global.financial_reports') }}
                </a>
            </div>
        </div>
        <!-- END: Quick Actions -->
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Initialize student attendance chart
    const ctx = document.getElementById('student-attendance-chart').getContext('2d');
    
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['{{ __("global.monday") }}', '{{ __("global.tuesday") }}', '{{ __("global.wednesday") }}', '{{ __("global.thursday") }}', '{{ __("global.friday") }}'],
            datasets: [{
                label: '{{ __("global.present_students") }}',
                data: [45, 48, 42, 47, 46],
                backgroundColor: '#3b82f6',
                borderWidth: 0
            }, {
                label: '{{ __("global.absent_students") }}',
                data: [5, 2, 8, 3, 4],
                backgroundColor: '#ef4444',
                borderWidth: 0
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
                    beginAtZero: true,
                    ticks: {
                        stepSize: 10
                    }
                }
            }
        }
    });
});
</script>
@endsection