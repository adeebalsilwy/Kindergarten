<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Developer Tools Visibility
    |--------------------------------------------------------------------------
    |
    | This option controls whether developer tools are visible in the
    | application sidebar. When set to false, all developer tools
    | sections will be hidden from the navigation menu.
    |
    */

    'enabled' => env('DEVELOPER_TOOLS_ENABLED', false),

    /*
    |--------------------------------------------------------------------------
    | Developer Tools Items
    |--------------------------------------------------------------------------
    |
    | Define the developer tools menu items that will be displayed when
    | developer mode is enabled. Each item should have an icon,
    | route name, and title.
    |
    */

    'menu_items' => [
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
            'title' => 'jobs',
        ],
    ],

];
