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
            'dashboard' => [
                'icon' => 'home',
                'title' => __('global.dashboard'),
                'route_name' => 'dashboard-overview-1',
            ],
            'kindergarten' => [
                'icon' => 'box',
                'title' => __('global.kindergarten_management'),
                'sub_menu' => [
                    'children' => [
                        'icon' => 'user',
                        'route_name' => 'children.index',
                        'title' => __('global.students'),
                    ],
                    'guardians' => [
                        'icon' => 'users',
                        'route_name' => 'guardians.index',
                        'title' => __('global.parents'),
                    ],
                    'teachers' => [
                        'icon' => 'users',
                        'route_name' => 'teachers.index',
                        'title' => __('global.teachers'),
                    ],
                    'classes' => [
                        'icon' => 'home',
                        'route_name' => 'classes.index',
                        'title' => __('global.classes'),
                    ],
                    'grades' => [
                        'icon' => 'clipboard',
                        'route_name' => 'grades.index',
                        'title' => __('global.grades'),
                    ],
                    'curriculum' => [
                        'icon' => 'book-open',
                        'route_name' => 'curriculum.index',
                        'title' => __('global.curriculum'),
                    ],
                    'activities' => [
                        'icon' => 'calendar',
                        'route_name' => 'activities.index',
                        'title' => __('global.activities'),
                    ],
                    'events' => [
                        'icon' => 'calendar-event',
                        'route_name' => 'events.index',
                        'title' => __('global.events'),
                    ],
                ],
            ],
            'attendance-management' => [
                'icon' => 'calendar',
                'title' => __('global.attendance_management'),
                'sub_menu' => [
                    'list' => [
                        'icon' => 'activity',
                        'route_name' => 'attendance.index',
                        'title' => __('global.attendance_records'),
                    ],
                    'bulk' => [
                        'icon' => 'activity',
                        'route_name' => 'attendance.bulk',
                        'title' => __('global.bulk_attendance'),
                    ],
                    'reports' => [
                        'icon' => 'bar-chart-2',
                        'route_name' => 'finance.attendance-report',
                        'title' => __('global.attendance_report'),
                    ],
                ],
            ],
            'finance' => [
                'icon' => 'credit-card',
                'title' => __('global.finance_reporting'),
                'sub_menu' => [
                    'finance-dashboard' => [
                        'icon' => 'activity',
                        'route_name' => 'finance.dashboard',
                        'title' => __('global.dashboard'),
                    ],
                    'payments' => [
                        'icon' => 'activity',
                        'route_name' => 'payments.index',
                        'title' => __('global.payments'),
                    ],
                    'expenses' => [
                        'icon' => 'activity',
                        'route_name' => 'expenses.index',
                        'title' => __('global.expenses'),
                    ],
                    'fees' => [
                        'icon' => 'activity',
                        'route_name' => 'fees.index',
                        'title' => __('global.fees'),
                    ],
                    'accounting' => [
                        'icon' => 'activity',
                        'route_name' => 'accounting_entries.index',
                        'title' => __('global.accounting_entries'),
                    ],
                    'reports' => [
                        'icon' => 'activity',
                        'title' => __('global.reports'),
                        'sub_menu' => [
                            'financial-reports' => [
                                'icon' => 'activity',
                                'route_name' => 'financial_reports.index',
                                'title' => __('global.financials'),
                            ],
                            'attendance-report' => [
                                'icon' => 'activity',
                                'route_name' => 'finance.attendance-report',
                                'title' => __('global.attendance_report'),
                            ],
                        ],
                    ],
                ],
            ],
            'divider',
            'system-settings' => [
                'icon' => 'settings',
                'title' => __('global.settings'),
                'sub_menu' => [
                    'languages' => [
                        'icon' => 'activity',
                        'route_name' => 'languages.index',
                        'title' => __('global.languages'),
                    ],
                    'users' => [
                        'icon' => 'activity',
                        'route_name' => 'users.index',
                        'title' => __('global.users'),
                    ],
                    'access-control' => [
                        'icon' => 'activity',
                        'title' => __('global.access_control'),
                        'sub_menu' => [
                            'roles' => [
                                'icon' => 'activity',
                                'route_name' => 'roles.index',
                                'title' => __('global.roles'),
                            ],
                            'permissions' => [
                                'icon' => 'activity',
                                'route_name' => 'permissions.index',
                                'title' => __('global.permissions'),
                            ],
                        ],
                    ],
                ],
            ],
            'divider',
            'developer-backup' => [
                'icon' => 'server',
                'title' => 'System & Backups',
                'sub_menu' => [
                    'backup-manager' => [
                        'icon' => 'activity',
                        'route_name' => 'backup.index',
                        'title' => 'Backup Manager',
                    ],
                    'crud-builder' => [
                        'icon' => 'zap',
                        'route_name' => 'crud-builder.index',
                        'title' => 'Visual CRUD Builder',
                    ],
                    'monitoring' => [
                        'icon' => 'activity',
                        'route_name' => 'monitoring.index',
                        'title' => 'Command Monitoring',
                    ],
                    'command_logs' => [
                        'icon' => 'activity',
                        'route_name' => 'command_logs.index',
                        'title' => 'Command Logs',
                    ],
                ],
            ],
        ];
    }
}
