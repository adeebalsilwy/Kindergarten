@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ $user->name }} - {{ __('User.details') }}</title>
@endsection

@section('subcontent')
    <!-- Header -->
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">
            <x-base.lucide icon="User" class="w-5 h-5 me-2 inline" />
            {{ $user->name }}
            <span class="text-sm font-normal text-slate-500 ms-2">
                @if($user->is_active)
                    <span class="text-success">
                        <x-base.lucide icon="CheckCircle" class="w-4 h-4 inline me-1" />
                        {{ __('global.active') }}
                    </span>
                @else
                    <span class="text-danger">
                        <x-base.lucide icon="XCircle" class="w-4 h-4 inline me-1" />
                        {{ __('global.inactive') }}
                    </span>
                @endif
            </span>
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <x-base.button variant="outline-secondary" as="a" href="{{ route('users.index') }}" class="flex items-center me-2">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
                {{ __('global.back_to_list') }}
            </x-base.button>
            @can('edit_users')
            <x-base.button variant="primary" as="a" href="{{ route('users.edit', $user->id) }}" class="flex items-center">
                <x-base.lucide icon="Pencil" class="w-4 h-4 me-2" />
                {{ __('global.edit') }}
            </x-base.button>
            @endcan
        </div>
    </div>

    <!-- User Overview Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-5">
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-primary/20 bg-primary/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                            <x-base.lucide icon="User" class="w-6 h-6 text-primary" />
                        </div>
                        <div class="ms-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                                <span class="text-xs">{{ __('global.profile') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">{{ $user->name }}</div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.user_profile') }}</div>
                </div>
            </div>
        </div>
        
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-info/20 bg-info/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-info/10 flex items-center justify-center">
                            <x-base.lucide icon="ShieldCheck" class="w-6 h-6 text-info" />
                        </div>
                        <div class="ms-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                                <span class="text-xs">{{ __('global.roles') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">{{ $user->roles->count() }}</div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.assigned_roles') }}</div>
                </div>
            </div>
        </div>
        
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-warning/20 bg-warning/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-warning/10 flex items-center justify-center">
                            <x-base.lucide icon="Key" class="w-6 h-6 text-warning" />
                        </div>
                        <div class="ms-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                                <span class="text-xs">{{ __('global.permissions') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">
                        @php
                            $totalPermissions = $user->roles->sum(function($role) { 
                                return $role->permissions->count(); 
                            });
                        @endphp
                        {{ $totalPermissions }}
                    </div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.total_permissions') }}</div>
                </div>
            </div>
        </div>
        
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-success/20 bg-success/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-success/10 flex items-center justify-center">
                            <x-base.lucide icon="Calendar" class="w-6 h-6 text-success" />
                        </div>
                        <div class="ms-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                                <span class="text-xs">{{ __('global.activity') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">
                        {{ $user->last_activity ? date('M d', $user->last_activity) : 'Never' }}
                    </div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.last_login') }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabbed Content -->
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12">
            <div class="intro-y box">
                <!-- Tab Navigation -->
                <div class="flex flex-col sm:flex-row">
                    <div class="flex-1 border-e border-slate-200/60 dark:border-darkmode-400 border-t sm:border-t-0 border-b sm:border-b-0">
                        <div id="profile-tab" class="cursor-pointer font-medium p-5 text-center border-b sm:border-b-0 border-slate-200/60 dark:border-darkmode-400 transition duration-300 ease-in-out bg-slate-100 dark:bg-darkmode-400 dark:text-slate-300" data-tw-toggle="pill" data-tw-target="#profile" role="tab" aria-controls="profile" aria-selected="true">
                            <x-base.lucide icon="User" class="w-4 h-4 me-2 inline" />
                            {{ __('global.profile_info') }}
                        </div>
                    </div>
                    <div class="flex-1 border-e border-slate-200/60 dark:border-darkmode-400 border-t sm:border-t-0 border-b sm:border-b-0">
                        <div id="roles-tab" class="cursor-pointer font-medium p-5 text-center border-b sm:border-b-0 border-slate-200/60 dark:border-darkmode-400 transition duration-300 ease-in-out" data-tw-toggle="pill" data-tw-target="#roles" role="tab" aria-controls="roles" aria-selected="false">
                            <x-base.lucide icon="ShieldCheck" class="w-4 h-4 me-2 inline" />
                            {{ __('global.roles_permissions') }}
                        </div>
                    </div>
                    <div class="flex-1 border-e border-slate-200/60 dark:border-darkmode-400 border-t sm:border-t-0 border-b sm:border-b-0">
                        <div id="activity-tab" class="cursor-pointer font-medium p-5 text-center border-b sm:border-b-0 border-slate-200/60 dark:border-darkmode-400 transition duration-300 ease-in-out" data-tw-toggle="pill" data-tw-target="#activity" role="tab" aria-controls="activity" aria-selected="false">
                            <x-base.lucide icon="Activity" class="w-4 h-4 me-2 inline" />
                            {{ __('global.activity_log') }}
                        </div>
                    </div>
                    <div class="flex-1 border-t sm:border-t-0 border-b sm:border-b-0">
                        <div id="settings-tab" class="cursor-pointer font-medium p-5 text-center border-b sm:border-b-0 border-slate-200/60 dark:border-darkmode-400 transition duration-300 ease-in-out" data-tw-toggle="pill" data-tw-target="#settings" role="tab" aria-controls="settings" aria-selected="false">
                            <x-base.lucide icon="Settings" class="w-4 h-4 me-2 inline" />
                            {{ __('global.system_info') }}
                        </div>
                    </div>
                </div>
                
                <!-- Tab Content -->
                <div class="tab-content border-l border-r border-b">
                    <!-- Profile Tab -->
                    <div id="profile" class="tab-pane leading-relaxed p-5 active" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="grid grid-cols-12 gap-6">
                            <div class="col-span-12 md:col-span-4">
                                <div class="box p-5">
                                    <div class="flex flex-col items-center">
                                        <div class="w-24 h-24 rounded-full bg-primary/10 flex items-center justify-center mb-4">
                                            <x-base.lucide icon="User" class="w-12 h-12 text-primary" />
                                        </div>
                                        <h3 class="text-lg font-medium">{{ $user->name }}</h3>
                                        <p class="text-slate-500">{{ $user->email }}</p>
                                        @if($user->phone)
                                            <p class="text-slate-500 mt-1">
                                                <x-base.lucide icon="Phone" class="w-4 h-4 inline me-1" />
                                                {{ $user->phone }}
                                            </p>
                                        @endif
                                        @if($user->department)
                                            <span class="px-3 py-1 rounded-full bg-primary/10 text-primary text-sm mt-2">
                                                {{ __('users.departments.' . $user->department) }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-span-12 md:col-span-8">
                                <div class="box p-5">
                                    <h3 class="text-lg font-medium mb-4">{{ __('global.basic_information') }}</h3>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <x-base.form-label class="font-medium">{{ __('users.fields.name') }}</x-base.form-label>
                                            <div class="mt-1">{{ $user->name ?? '-' }}</div>
                                        </div>
                                        
                                        <div>
                                            <x-base.form-label class="font-medium">{{ __('users.fields.email') }}</x-base.form-label>
                                            <div class="mt-1 flex items-center">
                                                {{ $user->email ?? '-' }}
                                                @if($user->email_verified_at)
                                                    <span class="ms-2 text-success">
                                                        <x-base.lucide icon="CheckCircle" class="w-4 h-4 inline" />
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <x-base.form-label class="font-medium">{{ __('users.fields.phone') }}</x-base.form-label>
                                            <div class="mt-1">{{ $user->phone ?? '-' }}</div>
                                        </div>
                                        
                                        <div>
                                            <x-base.form-label class="font-medium">{{ __('users.fields.department') }}</x-base.form-label>
                                            <div class="mt-1">
                                                @if($user->department)
                                                    <span class="px-2 py-1 rounded-full bg-primary/10 text-primary text-sm">
                                                        {{ __('users.departments.' . $user->department) }}
                                                    </span>
                                                @else
                                                    <span class="text-slate-500">-</span>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <x-base.form-label class="font-medium">{{ __('global.status') }}</x-base.form-label>
                                            <div class="mt-1">
                                                @if($user->is_active)
                                                    <span class="px-2 py-1 rounded-full bg-success/10 text-success text-sm">
                                                        <x-base.lucide icon="CheckCircle" class="w-3 h-3 inline me-1" />
                                                        {{ __('global.active') }}
                                                    </span>
                                                @else
                                                    <span class="px-2 py-1 rounded-full bg-danger/10 text-danger text-sm">
                                                        <x-base.lucide icon="XCircle" class="w-3 h-3 inline me-1" />
                                                        {{ __('global.inactive') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <x-base.form-label class="font-medium">{{ __('global.created_at') }}</x-base.form-label>
                                            <div class="mt-1">{{ $user->created_at->format('M d, Y H:i') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Roles & Permissions Tab -->
                    <div id="roles" class="tab-pane leading-relaxed p-5" role="tabpanel" aria-labelledby="roles-tab">
                        <div class="grid grid-cols-12 gap-6">
                            <div class="col-span-12 md:col-span-6">
                                <div class="box p-5">
                                    <h3 class="text-lg font-medium mb-4">{{ __('global.assigned_roles') }}</h3>
                                    @if($user->roles->count() > 0)
                                        <div class="space-y-3">
                                            @foreach($user->roles as $role)
                                            <div class="flex items-center justify-between p-3 border rounded-lg {{ $role->name == 'Administrator' ? 'border-yellow-200 bg-yellow-50' : 'border-slate-200' }}">
                                                <div>
                                                    <div class="font-medium">
                                                        {{ $role->name }}
                                                        @if($role->name == 'Administrator')
                                                            <x-base.lucide icon="Crown" class="w-4 h-4 text-yellow-500 inline ms-1" />
                                                        @endif
                                                    </div>
                                                    <div class="text-sm text-slate-500 mt-1">
                                                        {{ $role->permissions->count() }} {{ __('global.permissions') }}
                                                    </div>
                                                </div>
                                                <div class="text-xs text-slate-500">
                                                    {{ $role->created_at->format('M d, Y') }}
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="text-center py-8">
                                            <x-base.lucide icon="Shield" class="w-12 h-12 text-slate-400 mx-auto mb-3" />
                                            <p class="text-slate-500">{{ __('global.no_roles_assigned') }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-span-12 md:col-span-6">
                                <div class="box p-5">
                                    <h3 class="text-lg font-medium mb-4">{{ __('global.permissions_summary') }}</h3>
                                    @if($user->roles->count() > 0)
                                        <div class="space-y-4">
                                            @foreach($user->roles as $role)
                                            <div>
                                                <div class="font-medium mb-2">{{ $role->name }}</div>
                                                <div class="flex flex-wrap gap-1">
                                                    @foreach($role->permissions->take(8) as $permission)
                                                        <span class="px-2 py-1 text-xs rounded-full bg-primary/10 text-primary border border-primary/20">
                                                            {{ str_replace('_', ' ', $permission->name) }}
                                                        </span>
                                                    @endforeach
                                                    @if($role->permissions->count() > 8)
                                                        <span class="px-2 py-1 text-xs rounded-full bg-secondary/10 text-secondary border border-secondary/20">
                                                            +{{ $role->permissions->count() - 8 }} {{ __('global.more') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="text-center py-8">
                                            <x-base.lucide icon="Key" class="w-12 h-12 text-slate-400 mx-auto mb-3" />
                                            <p class="text-slate-500">{{ __('global.no_permissions_assigned') }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Activity Tab -->
                    <div id="activity" class="tab-pane leading-relaxed p-5" role="tabpanel" aria-labelledby="activity-tab">
                        <div class="box p-5">
                            <h3 class="text-lg font-medium mb-4">{{ __('global.recent_activity') }}</h3>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0 mt-1">
                                        <x-base.lucide icon="LogIn" class="w-4 h-4 text-primary" />
                                    </div>
                                    <div class="ms-3">
                                        <div class="font-medium">{{ __('global.last_login') }}</div>
                                        <div class="text-sm text-slate-500">
                                            {{ $user->last_activity ? date('M d, Y H:i', $user->last_activity) : __('global.never_logged_in') }}
                                        </div>
                                        @if($user->ip_address)
                                            <div class="text-xs text-slate-400 mt-1">
                                                {{ __('global.ip_address') }}: {{ $user->ip_address }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="flex items-start">
                                    <div class="w-8 h-8 rounded-full bg-info/10 flex items-center justify-center flex-shrink-0 mt-1">
                                        <x-base.lucide icon="UserCheck" class="w-4 h-4 text-info" />
                                    </div>
                                    <div class="ms-3">
                                        <div class="font-medium">{{ __('global.account_created') }}</div>
                                        <div class="text-sm text-slate-500">
                                            {{ $user->created_at->format('M d, Y H:i') }}
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="flex items-start">
                                    <div class="w-8 h-8 rounded-full bg-warning/10 flex items-center justify-center flex-shrink-0 mt-1">
                                        <x-base.lucide icon="Mail" class="w-4 h-4 text-warning" />
                                    </div>
                                    <div class="ms-3">
                                        <div class="font-medium">{{ __('global.email_status') }}</div>
                                        <div class="text-sm text-slate-500">
                                            @if($user->email_verified_at)
                                                <span class="text-success">
                                                    <x-base.lucide icon="CheckCircle" class="w-3 h-3 inline me-1" />
                                                    {{ __('global.verified') }}
                                                </span>
                                                <div class="text-xs mt-1">
                                                    {{ $user->email_verified_at->format('M d, Y H:i') }}
                                                </div>
                                            @else
                                                <span class="text-warning">
                                                    <x-base.lucide icon="Clock" class="w-3 h-3 inline me-1" />
                                                    {{ __('global.pending_verification') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Settings Tab -->
                    <div id="settings" class="tab-pane leading-relaxed p-5" role="tabpanel" aria-labelledby="settings-tab">
                        <div class="grid grid-cols-12 gap-6">
                            <div class="col-span-12 md:col-span-6">
                                <div class="box p-5">
                                    <h3 class="text-lg font-medium mb-4">{{ __('global.system_information') }}</h3>
                                    <div class="space-y-3">
                                        <div class="flex justify-between">
                                            <span class="text-slate-600">{{ __('global.user_id') }}</span>
                                            <span class="font-medium">{{ $user->id }}</span>
                                        </div>
                                        
                                        <div class="flex justify-between">
                                            <span class="text-slate-600">{{ __('global.ip_address') }}</span>
                                            <span class="font-medium">{{ $user->ip_address ?? 'N/A' }}</span>
                                        </div>
                                        
                                        <div class="flex justify-between">
                                            <span class="text-slate-600">{{ __('users.fields.user_agent') }}</span>
                                            <span class="font-medium text-sm max-w-[200px] truncate" title="{{ $user->user_agent ?? 'N/A' }}">
                                                {{ $user->user_agent ? Str::limit($user->user_agent, 30) : 'N/A' }}
                                            </span>
                                        </div>
                                        
                                        <div class="flex justify-between">
                                            <span class="text-slate-600">{{ __('global.created_at') }}</span>
                                            <span class="font-medium">{{ $user->created_at->format('Y-m-d H:i:s') }}</span>
                                        </div>
                                        
                                        <div class="flex justify-between">
                                            <span class="text-slate-600">{{ __('global.updated_at') }}</span>
                                            <span class="font-medium">{{ $user->updated_at->format('Y-m-d H:i:s') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-span-12 md:col-span-6">
                                <div class="box p-5">
                                    <h3 class="text-lg font-medium mb-4">{{ __('global.security_info') }}</h3>
                                    <div class="space-y-3">
                                        <div class="flex justify-between">
                                            <span class="text-slate-600">{{ __('users.fields.password') }}</span>
                                            <span class="font-medium">
                                                <span class="px-2 py-1 rounded-full bg-success/10 text-success text-xs">
                                                    <x-base.lucide icon="Lock" class="w-3 h-3 inline me-1" />
                                                    {{ __('global.set') }}
                                                </span>
                                            </span>
                                        </div>
                                        
                                        <div class="flex justify-between">
                                            <span class="text-slate-600">{{ __('global.token') }}</span>
                                            <span class="font-medium text-sm max-w-[150px] truncate" title="{{ $user->token ?? 'N/A' }}">
                                                {{ $user->token ? Str::limit($user->token, 20) : 'N/A' }}
                                            </span>
                                        </div>
                                        
                                        <div class="flex justify-between">
                                            <span class="text-slate-600">{{ __('global.session_data') }}</span>
                                            <span class="font-medium">
                                                @if($user->payload)
                                                    <span class="px-2 py-1 rounded-full bg-info/10 text-info text-xs">
                                                        {{ Str::length($user->payload) }} {{ __('global.bytes') }}
                                                    </span>
                                                @else
                                                    <span class="text-slate-500">N/A</span>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Data Tabs -->
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12">
            <div class="intro-y box">
                <!-- Related Data Tab Navigation -->
                <div class="flex flex-col sm:flex-row">
                    <div class="flex-1 border-e border-slate-200/60 dark:border-darkmode-400 border-t sm:border-t-0 border-b sm:border-b-0">
                        <div id="accounting-entries-tab" class="cursor-pointer font-medium p-5 text-center border-b sm:border-b-0 border-slate-200/60 dark:border-darkmode-400 transition duration-300 ease-in-out" data-tw-toggle="pill" data-tw-target="#accounting-entries" role="tab" aria-controls="accounting-entries" aria-selected="false">
                            <x-base.lucide icon="Calculator" class="w-4 h-4 me-2 inline" />
                            {{ __('global.accounting_entries') }} ({{ $user->accountingEntries->count() }})
                        </div>
                    </div>
                    <div class="flex-1 border-e border-slate-200/60 dark:border-darkmode-400 border-t sm:border-t-0 border-b sm:border-b-0">
                        <div id="expenses-created-tab" class="cursor-pointer font-medium p-5 text-center border-b sm:border-b-0 border-slate-200/60 dark:border-darkmode-400 transition duration-300 ease-in-out" data-tw-toggle="pill" data-tw-target="#expenses-created" role="tab" aria-controls="expenses-created" aria-selected="false">
                            <x-base.lucide icon="CreditCard" class="w-4 h-4 me-2 inline" />
                            {{ __('global.expenses_created') }} ({{ $user->expensesCreated->count() }})
                        </div>
                    </div>
                    <div class="flex-1 border-e border-slate-200/60 dark:border-darkmode-400 border-t sm:border-t-0 border-b sm:border-b-0">
                        <div id="expenses-assigned-tab" class="cursor-pointer font-medium p-5 text-center border-b sm:border-b-0 border-slate-200/60 dark:border-darkmode-400 transition duration-300 ease-in-out" data-tw-toggle="pill" data-tw-target="#expenses-assigned" role="tab" aria-controls="expenses-assigned" aria-selected="false">
                            <x-base.lucide icon="UserCheck" class="w-4 h-4 me-2 inline" />
                            {{ __('global.expenses_assigned') }} ({{ $user->expensesAssigned->count() }})
                        </div>
                    </div>
                    <div class="flex-1 border-t sm:border-t-0 border-b sm:border-b-0">
                        <div id="reports-generated-tab" class="cursor-pointer font-medium p-5 text-center border-b sm:border-b-0 border-slate-200/60 dark:border-darkmode-400 transition duration-300 ease-in-out" data-tw-toggle="pill" data-tw-target="#reports-generated" role="tab" aria-controls="reports-generated" aria-selected="false">
                            <x-base.lucide icon="FileText" class="w-4 h-4 me-2 inline" />
                            {{ __('global.reports_generated') }} ({{ $user->financialReports->count() }})
                        </div>
                    </div>
                </div>
                
                <!-- Related Data Tab Content -->
                <div class="tab-content border-l border-r border-b">
                    <!-- Accounting Entries Tab -->
                    <div id="accounting-entries" class="tab-pane leading-relaxed p-5" role="tabpanel" aria-labelledby="accounting-entries-tab">
                        <div class="box p-5">
                            <h3 class="text-lg font-medium mb-4">{{ __('global.accounting_entries') }}</h3>
                            @if($user->accountingEntries->count() > 0)
                                <div class="overflow-x-auto">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-left">{{ __('global.description') }}</th>
                                                <th class="text-left">{{ __('global.amount') }}</th>
                                                <th class="text-left">{{ __('global.type') }}</th>
                                                <th class="text-left">{{ __('global.date') }}</th>
                                                <th class="text-left">{{ __('global.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($user->accountingEntries->take(10) as $entry)
                                                <tr>
                                                    <td class="py-2">{{ $entry->description }}</td>
                                                    <td>{{ number_format($entry->amount, 2) }}</td>
                                                    <td>
                                                        <span class="px-2 py-1 rounded text-xs 
                                                            {{ $entry->type === 'debit' ? 'bg-success/20 text-success' : 'bg-danger/20 text-danger' }}">
                                                            {{ ucfirst($entry->type) }}
                                                        </span>
                                                    </td>
                                                    <td>{{ $entry->date->format('M d, Y') }}</td>
                                                    <td>
                                                        <a href="{{ route('accounting_entries.show', $entry->id) }}" class="text-primary hover:underline">
                                                            {{ __('global.view') }}
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @if($user->accountingEntries->count() > 10)
                                    <div class="mt-4 text-center">
                                        <a href="{{ route('accounting_entries.index', ['user_id' => $user->id]) }}" class="text-primary hover:underline">
                                            {{ __('global.view_all') }} ({{ $user->accountingEntries->count() }} {{ __('global.entries') }})
                                        </a>
                                    </div>
                                @endif
                            @else
                                <div class="text-center py-8">
                                    <x-base.lucide icon="Calculator" class="w-12 h-12 text-slate-400 mx-auto mb-3" />
                                    <p class="text-slate-500">{{ __('global.no_accounting_entries') }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Expenses Created Tab -->
                    <div id="expenses-created" class="tab-pane leading-relaxed p-5" role="tabpanel" aria-labelledby="expenses-created-tab">
                        <div class="box p-5">
                            <h3 class="text-lg font-medium mb-4">{{ __('global.expenses_created') }}</h3>
                            @if($user->expensesCreated->count() > 0)
                                <div class="overflow-x-auto">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-left">{{ __('global.name') }}</th>
                                                <th class="text-left">{{ __('global.amount') }}</th>
                                                <th class="text-left">{{ __('global.category') }}</th>
                                                <th class="text-left">{{ __('global.date') }}</th>
                                                <th class="text-left">{{ __('global.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($user->expensesCreated->take(10) as $expense)
                                                <tr>
                                                    <td class="py-2">{{ $expense->name }}</td>
                                                    <td>{{ number_format($expense->amount, 2) }}</td>
                                                    <td>{{ $expense->category ?? 'General' }}</td>
                                                    <td>{{ $expense->date->format('M d, Y') }}</td>
                                                    <td>
                                                        <a href="{{ route('expenses.show', $expense->id) }}" class="text-primary hover:underline">
                                                            {{ __('global.view') }}
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @if($user->expensesCreated->count() > 10)
                                    <div class="mt-4 text-center">
                                        <a href="{{ route('expenses.index', ['created_by' => $user->id]) }}" class="text-primary hover:underline">
                                            {{ __('global.view_all') }} ({{ $user->expensesCreated->count() }} {{ __('global.expenses') }})
                                        </a>
                                    </div>
                                @endif
                            @else
                                <div class="text-center py-8">
                                    <x-base.lucide icon="CreditCard" class="w-12 h-12 text-slate-400 mx-auto mb-3" />
                                    <p class="text-slate-500">{{ __('global.no_expenses_created') }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Expenses Assigned Tab -->
                    <div id="expenses-assigned" class="tab-pane leading-relaxed p-5" role="tabpanel" aria-labelledby="expenses-assigned-tab">
                        <div class="box p-5">
                            <h3 class="text-lg font-medium mb-4">{{ __('global.expenses_assigned') }}</h3>
                            @if($user->expensesAssigned->count() > 0)
                                <div class="overflow-x-auto">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-left">{{ __('global.name') }}</th>
                                                <th class="text-left">{{ __('global.amount') }}</th>
                                                <th class="text-left">{{ __('global.category') }}</th>
                                                <th class="text-left">{{ __('global.status') }}</th>
                                                <th class="text-left">{{ __('global.due_date') }}</th>
                                                <th class="text-left">{{ __('global.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($user->expensesAssigned->take(10) as $expense)
                                                <tr>
                                                    <td class="py-2">{{ $expense->name }}</td>
                                                    <td>{{ number_format($expense->amount, 2) }}</td>
                                                    <td>{{ $expense->category ?? 'General' }}</td>
                                                    <td>
                                                        <span class="px-2 py-1 rounded text-xs 
                                                            {{ $expense->status === 'paid' ? 'bg-success/20 text-success' : ($expense->status === 'pending' ? 'bg-warning/20 text-warning' : 'bg-danger/20 text-danger') }}">
                                                            {{ ucfirst($expense->status) }}
                                                        </span>
                                                    </td>
                                                    <td>{{ $expense->due_date ? $expense->due_date->format('M d, Y') : 'N/A' }}</td>
                                                    <td>
                                                        <a href="{{ route('expenses.show', $expense->id) }}" class="text-primary hover:underline">
                                                            {{ __('global.view') }}
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @if($user->expensesAssigned->count() > 10)
                                    <div class="mt-4 text-center">
                                        <a href="{{ route('expenses.index', ['assigned_to' => $user->id]) }}" class="text-primary hover:underline">
                                            {{ __('global.view_all') }} ({{ $user->expensesAssigned->count() }} {{ __('global.expenses') }})
                                        </a>
                                    </div>
                                @endif
                            @else
                                <div class="text-center py-8">
                                    <x-base.lucide icon="UserCheck" class="w-12 h-12 text-slate-400 mx-auto mb-3" />
                                    <p class="text-slate-500">{{ __('global.no_expenses_assigned') }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Reports Generated Tab -->
                    <div id="reports-generated" class="tab-pane leading-relaxed p-5" role="tabpanel" aria-labelledby="reports-generated-tab">
                        <div class="box p-5">
                            <h3 class="text-lg font-medium mb-4">{{ __('global.reports_generated') }}</h3>
                            @if($user->financialReports->count() > 0)
                                <div class="overflow-x-auto">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-left">{{ __('global.title') }}</th>
                                                <th class="text-left">{{ __('global.type') }}</th>
                                                <th class="text-left">{{ __('global.period') }}</th>
                                                <th class="text-left">{{ __('global.generated_date') }}</th>
                                                <th class="text-left">{{ __('global.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($user->financialReports->take(10) as $report)
                                                <tr>
                                                    <td class="py-2">{{ $report->title }}</td>
                                                    <td>{{ $report->type ?? 'General' }}</td>
                                                    <td>{{ $report->period_start ? $report->period_start->format('M d, Y') . ' - ' . $report->period_end->format('M d, Y') : 'N/A' }}</td>
                                                    <td>{{ $report->created_at->format('M d, Y H:i') }}</td>
                                                    <td>
                                                        <a href="{{ route('financial_reports.show', $report->id) }}" class="text-primary hover:underline">
                                                            {{ __('global.view') }}
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @if($user->financialReports->count() > 10)
                                    <div class="mt-4 text-center">
                                        <a href="{{ route('financial_reports.index', ['generated_by' => $user->id]) }}" class="text-primary hover:underline">
                                            {{ __('global.view_all') }} ({{ $user->financialReports->count() }} {{ __('global.reports') }})
                                        </a>
                                    </div>
                                @endif
                            @else
                                <div class="text-center py-8">
                                    <x-base.lucide icon="FileText" class="w-12 h-12 text-slate-400 mx-auto mb-3" />
                                    <p class="text-slate-500">{{ __('global.no_reports_generated') }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Tab functionality
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('[data-tw-toggle="pill"]');
            const tabContents = document.querySelectorAll('.tab-pane');
            
            tabs.forEach(tab => {
                tab.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Remove active classes
                    tabs.forEach(t => {
                        t.classList.remove('bg-slate-100', 'dark:bg-darkmode-400', 'dark:text-slate-300');
                    });
                    tabContents.forEach(content => {
                        content.classList.remove('active');
                    });
                    
                    // Add active classes
                    this.classList.add('bg-slate-100', 'dark:bg-darkmode-400', 'dark:text-slate-300');
                    const target = document.querySelector(this.getAttribute('data-tw-target'));
                    if (target) {
                        target.classList.add('active');
                    }
                });
            });
        });
    </script>
@endsection