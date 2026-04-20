<?php

namespace App\Main;

class SideMenu
{
    /**
     * List of side menu items.
     */
    public static function menu(): array
    {
        return [
            // Dashboard
            'dashboard' => [
                'icon' => 'home',
                'title' => __('global.dashboard'),
                'route_name' => 'dashboard-overview-1',
            ],

            // Core Kindergarten Management
            'kindergarten-management' => [
                'icon' => 'users',
                'title' => __('global.kindergarten_management'),
                'sub_menu' => [
                    'students' => [
                        'icon' => 'user',
                        'route_name' => 'children.index',
                        'title' => __('global.students'),
                    ],
                    'parents' => [
                        'icon' => 'users',
                        'route_name' => 'guardians.index',
                        'title' => __('global.parents'),
                    ],
                    'teachers' => [
                        'icon' => 'user-check',
                        'route_name' => 'teachers.index',
                        'title' => __('global.teachers'),
                    ],
                    'classes' => [
                        'icon' => 'home',
                        'route_name' => 'classes.index',
                        'title' => __('global.classes'),
                    ],
                    'grades' => [
                        'icon' => 'award',
                        'route_name' => 'grades.index',
                        'title' => __('global.grades'),
                    ],
                ],
            ],

            // Academic Content
            'academic-content' => [
                'icon' => 'book-open',
                'title' => __('global.academic_content'),
                'sub_menu' => [
                    'curriculum' => [
                        'icon' => 'book',
                        'route_name' => 'curricula.index',
                        'title' => __('global.curriculum'),
                    ],
                    'materials' => [
                        'icon' => 'box',
                        'route_name' => 'materials.index',
                        'title' => __('global.materials'),
                    ],
                    'activities' => [
                        'icon' => 'calendar',
                        'route_name' => 'activities.index',
                        'title' => __('global.activities'),
                    ],
                    'events' => [
                        'icon' => 'calendar',
                        'route_name' => 'events.index',
                        'title' => __('global.events'),
                    ],
                ],
            ],
            // Attendance Management
            'attendance-management' => [
                'icon' => 'clock',
                'title' => __('global.attendance_management'),
                'sub_menu' => [
                    'records' => [
                        'icon' => 'check-circle',
                        'route_name' => 'attendances.index',
                        'title' => __('global.attendance_records'),
                    ],
                    'bulk-attendance' => [
                        'icon' => 'layers',
                        'route_name' => 'attendances.bulk',
                        'title' => __('global.bulk_attendance'),
                    ],
                    'reports' => [
                        'icon' => 'bar-chart-2',
                        'route_name' => 'finance.attendance-report',
                        'title' => __('global.attendance_report'),
                    ],
                ],
            ],
            // Finance & Reporting
            'finance' => [
                'icon' => 'dollar-sign',
                'title' => __('global.finance_reporting'),
                'sub_menu' => [
                    'payments' => [
                        'icon' => 'credit-card',
                        'route_name' => 'payments.index',
                        'title' => __('global.payments'),
                    ],
                    'expenses' => [
                        'icon' => 'arrow-up-circle',
                        'route_name' => 'expenses.index',
                        'title' => __('global.expenses'),
                    ],
                    'fees' => [
                        'icon' => 'tag',
                        'route_name' => 'fees.index',
                        'title' => __('global.fees'),
                    ],
                ],
            ],
            'divider',

            // System
            'system' => [
                'icon' => 'settings',
                'title' => __('global.system_administration'),
                'sub_menu' => [
                    'users' => [
                        'icon' => 'users',
                        'route_name' => 'users.index',
                        'title' => __('global.users'),
                    ],
                    'roles' => [
                        'icon' => 'shield',
                        'route_name' => 'roles.index',
                        'title' => __('global.roles'),
                    ],
                    'permissions' => [
                        'icon' => 'key',
                        'route_name' => 'permissions.index',
                        'title' => __('global.permissions'),
                    ],
                    'languages' => [
                        'icon' => 'globe',
                        'route_name' => 'languages.index',
                        'title' => __('global.languages'),
                    ],
                ],
            ],
            'divider',

        ];
    }
}
