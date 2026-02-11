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
            // Attendance Management
            'attendance-management' => [
                'icon' => 'clock',
                'title' => __('global.attendance_management'),
                'sub_menu' => [
                    'records' => [
                        'icon' => 'check-circle',
                        'route_name' => 'attendance.index',
                        'title' => __('global.attendance_records'),
                    ],
                    'bulk-attendance' => [
                        'icon' => 'layers',
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
            // Finance & Reporting
            'finance' => [
                'icon' => 'dollar-sign',
                'title' => __('global.finance_reporting'),
                'sub_menu' => [
                    'dashboard' => [
                        'icon' => 'pie-chart',
                        'route_name' => 'finance.dashboard',
                        'title' => __('global.dashboard'),
                    ],
                    'transactions' => [
                        'icon' => 'credit-card',
                        'title' => __('global.transactions'),
                        'sub_menu' => [
                            'payments' => [
                                'icon' => 'arrow-down-circle',
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
                    'accounting' => [
                        'icon' => 'calculator',
                        'route_name' => 'accounting_entries.index',
                        'title' => __('global.accounting_entries'),
                    ],
                    'reports' => [
                        'icon' => 'file-text',
                        'title' => __('global.reports'),
                        'sub_menu' => [
                            'financial-reports' => [
                                'icon' => 'bar-chart',
                                'route_name' => 'financial_reports.index',
                                'title' => __('global.financials'),
                            ],
                            'attendance-report' => [
                                'icon' => 'bar-chart-2',
                                'route_name' => 'finance.attendance-report',
                                'title' => __('global.attendance_report'),
                            ],
                        ],
                    ],
                ],
            ],
            'divider',

            // System Administration
            'system-administration' => [
                'icon' => 'settings',
                'title' => __('global.system_administration'),
                'sub_menu' => [
                    'user-access' => [
                        'icon' => 'users',
                        'title' => __('global.user_access_management'),
                        'sub_menu' => [
                            'users' => [
                                'icon' => 'user',
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
                        ],
                    ],
                    'system-config' => [
                        'icon' => 'tool',
                        'title' => __('global.system_configuration'),
                        'sub_menu' => [
                            'languages' => [
                                'icon' => 'globe',
                                'route_name' => 'languages.index',
                                'title' => __('global.languages'),
                            ],
                        ],
                    ],
                ],
            ],
            'divider',

            // Developer Tools
            'developer-tools' => [
                'icon' => 'code',
                'title' => 'Developer Tools',
                'sub_menu' => [
                    'system-backup' => [
                        'icon' => 'database',
                        'route_name' => 'backup.index',
                        'title' => 'System Backup',
                    ],
                    'crud-builder' => [
                        'icon' => 'zap',
                        'route_name' => 'crud-builder.index',
                        'title' => 'Visual CRUD Builder',
                    ],
                    'command-monitoring' => [
                        'icon' => 'monitor',
                        'route_name' => 'monitoring.index',
                        'title' => 'Command Monitoring',
                    ],
                    'command-logs' => [
                        'icon' => 'file-text',
                        'route_name' => 'command_logs.index',
                        'title' => 'Command Logs',
                    ],
                    'database-import' => [
                        'icon' => 'database',
                        'route_name' => 'database-import.index',
                        'title' => 'Database Import',
                    ],
                    'api-manager' => [
                        'icon' => 'server',
                        'route_name' => 'api-manager.index',
                        'title' => 'API Manager',
                    ],
                    'jobs' => [
                        'icon' => 'briefcase',
                        'route_name' => 'jobs.index',
                        'title' => __('global.jobs'),
                    ],
                ],
            ],

        ];
    }
}
