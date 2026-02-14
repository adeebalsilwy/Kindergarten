<?php

namespace App\Main;

class SimpleMenu
{
    /**
     * List of simple menu items.
     */
    public static function menu(): array
    {
        return [
            'dashboard' => [
                'icon' => 'home',
                'title' => __('global.dashboard'),
                'route_name' => 'dashboard-overview-1',
            ],

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
                ],
            ],

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
        ];
    }
}
