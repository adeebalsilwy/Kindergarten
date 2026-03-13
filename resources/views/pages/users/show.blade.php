@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ $user->name }} - {{ __('User.details') }}</title>
    @vite(['resources/css/pages/users.css'])
@endsection

@section('subcontent')
    <!-- Header -->
    <div class="intro-y flex flex-col sm:flex-row items-center mt-10 mb-8">
        <div class="me-auto">
            <h2 class="text-3xl font-black text-slate-800 dark:text-slate-200 tracking-tight flex items-center gap-4">
                <div class="w-16 h-16 rounded-[2rem] bg-primary/10 flex items-center justify-center text-primary shadow-inner border border-primary/5">
                    <x-base.lucide icon="User" class="w-8 h-8" />
                </div>
                <div>
                    <div class="flex items-center gap-3">
                        <span>{{ $user->name }}</span>
                        @if($user->is_active)
                            <span class="px-4 py-1 rounded-full bg-success/10 text-success text-[10px] font-black uppercase tracking-widest border border-success/20">
                                {{ __('global.active') }}
                            </span>
                        @else
                            <span class="px-4 py-1 rounded-full bg-danger/10 text-danger text-[10px] font-black uppercase tracking-widest border border-danger/20">
                                {{ __('global.inactive') }}
                            </span>
                        @endif
                    </div>
                    <div class="text-sm font-bold text-slate-400 mt-1 uppercase tracking-widest">{{ $user->email }}</div>
                </div>
            </h2>
        </div>
        <div class="w-full sm:w-auto flex mt-6 sm:mt-0 gap-3">
            <x-base.button variant="outline-secondary" as="a" href="{{ route('users.index') }}" class="flex items-center px-5 py-3 rounded-2xl bg-white dark:bg-darkmode-700 shadow-sm border-slate-200 dark:border-darkmode-400 transition-all hover:bg-slate-50">
                <x-base.lucide icon="ArrowLeft" class="w-5 h-5 me-2" />
                {{ __('global.back_to_list') }}
            </x-base.button>
            @can('edit_users')
            <x-base.button variant="primary" as="a" href="{{ route('users.edit', $user->id) }}" class="flex items-center px-6 py-3 rounded-2xl shadow-xl shadow-primary/30 transition-all duration-300 transform hover:scale-[1.02]">
                <x-base.lucide icon="Pencil" class="w-5 h-5 me-2" />
                {{ __('global.edit_profile') }}
            </x-base.button>
            @endcan
        </div>
    </div>

    <!-- Professional Stats Cards -->
    <div class="grid grid-cols-12 gap-6 mt-10">
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="box p-8 rounded-[2.5rem] border-0 shadow-xl bg-gradient-to-br from-primary/10 to-transparent relative overflow-hidden group">
                <div class="flex items-center relative z-10">
                    <div class="w-14 h-14 rounded-2xl bg-white dark:bg-darkmode-600 flex items-center justify-center text-primary shadow-lg group-hover:scale-110 transition-transform duration-500">
                        <x-base.lucide icon="ShieldCheck" class="w-7 h-7" />
                    </div>
                    <div class="ms-auto text-[10px] font-black uppercase tracking-[0.2em] text-primary/70">{{ __('global.roles') }}</div>
                </div>
                <div class="text-4xl font-black text-slate-800 dark:text-slate-200 mt-8 relative z-10 tracking-tight">{{ $user->roles->count() }}</div>
                <div class="text-slate-500 text-xs font-bold mt-2 relative z-10 uppercase tracking-widest">{{ __('global.assigned_roles') }}</div>
                <x-base.lucide icon="ShieldCheck" class="absolute -bottom-6 -right-6 w-32 h-32 text-primary/5 group-hover:rotate-12 transition-transform duration-700" />
            </div>
        </div>
        
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="box p-8 rounded-[2.5rem] border-0 shadow-xl bg-gradient-to-br from-info/10 to-transparent relative overflow-hidden group">
                <div class="flex items-center relative z-10">
                    <div class="w-14 h-14 rounded-2xl bg-white dark:bg-darkmode-600 flex items-center justify-center text-info shadow-lg group-hover:scale-110 transition-transform duration-500">
                        <x-base.lucide icon="Key" class="w-7 h-7" />
                    </div>
                    <div class="ms-auto text-[10px] font-black uppercase tracking-[0.2em] text-info/70">{{ __('global.perms') }}</div>
                </div>
                <div class="text-4xl font-black text-slate-800 dark:text-slate-200 mt-8 relative z-10 tracking-tight">{{ $user->getAllPermissions()->count() }}</div>
                <div class="text-slate-500 text-xs font-bold mt-2 relative z-10 uppercase tracking-widest">{{ __('global.total_permissions') }}</div>
                <x-base.lucide icon="Key" class="absolute -bottom-6 -right-6 w-32 h-32 text-info/5 group-hover:rotate-12 transition-transform duration-700" />
            </div>
        </div>

        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="box p-8 rounded-[2.5rem] border-0 shadow-xl bg-gradient-to-br from-warning/10 to-transparent relative overflow-hidden group">
                <div class="flex items-center relative z-10">
                    <div class="w-14 h-14 rounded-2xl bg-white dark:bg-darkmode-600 flex items-center justify-center text-warning shadow-lg group-hover:scale-110 transition-transform duration-500">
                        <x-base.lucide icon="Clock" class="w-7 h-7" />
                    </div>
                    <div class="ms-auto text-[10px] font-black uppercase tracking-[0.2em] text-warning/70">{{ __('global.activity') }}</div>
                </div>
                <div class="text-3xl font-black text-slate-800 dark:text-slate-200 mt-8 relative z-10 tracking-tight">
                    {{ $user->last_login_at ? $user->last_login_at->diffForHumans(null, true) : '-' }}
                </div>
                <div class="text-slate-500 text-xs font-bold mt-2 relative z-10 uppercase tracking-widest">{{ __('global.last_login') }}</div>
                <x-base.lucide icon="Clock" class="absolute -bottom-6 -right-6 w-32 h-32 text-warning/5 group-hover:rotate-12 transition-transform duration-700" />
            </div>
        </div>

        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="box p-8 rounded-[2.5rem] border-0 shadow-xl bg-gradient-to-br from-success/10 to-transparent relative overflow-hidden group">
                <div class="flex items-center relative z-10">
                    <div class="w-14 h-14 rounded-2xl bg-white dark:bg-darkmode-600 flex items-center justify-center text-success shadow-lg group-hover:scale-110 transition-transform duration-500">
                        <x-base.lucide icon="Calendar" class="w-7 h-7" />
                    </div>
                    <div class="ms-auto text-[10px] font-black uppercase tracking-[0.2em] text-success/70">{{ __('global.member') }}</div>
                </div>
                <div class="text-4xl font-black text-slate-800 dark:text-slate-200 mt-8 relative z-10 tracking-tight">{{ $user->created_at->format('Y') }}</div>
                <div class="text-slate-500 text-xs font-bold mt-2 relative z-10 uppercase tracking-widest">{{ $user->created_at->format('M d') }}</div>
                <x-base.lucide icon="Calendar" class="absolute -bottom-6 -right-6 w-32 h-32 text-success/5 group-hover:rotate-12 transition-transform duration-700" />
            </div>
        </div>
    </div>

    <!-- Tab Navigation -->
    <div class="intro-y mt-10">
        <div class="border-b border-slate-200 bg-white dark:bg-darkmode-600 p-2 rounded-t-[2rem] shadow-2xl overflow-x-auto">
            <nav class="flex space-x-2">
                <button class="tab-button px-6 py-4 text-sm font-black uppercase tracking-widest rounded-2xl flex items-center transition-all duration-300 active" data-tab="profile">
                    <x-base.lucide icon="User" class="w-4 h-4 me-3" />
                    {{ __('global.profile_info') }}
                </button>
                <button class="tab-button px-6 py-4 text-sm font-black uppercase tracking-widest rounded-2xl flex items-center transition-all duration-300" data-tab="roles">
                    <x-base.lucide icon="ShieldCheck" class="w-4 h-4 me-3" />
                    {{ __('global.roles_permissions') }}
                </button>
                <button class="tab-button px-6 py-4 text-sm font-black uppercase tracking-widest rounded-2xl flex items-center transition-all duration-300" data-tab="activity">
                    <x-base.lucide icon="Activity" class="w-4 h-4 me-3" />
                    {{ __('global.activity_log') }}
                </button>
                @can('edit_users')
                <button class="tab-button px-6 py-4 text-sm font-black uppercase tracking-widest rounded-2xl flex items-center transition-all duration-300" data-tab="security">
                    <x-base.lucide icon="Lock" class="w-4 h-4 me-3" />
                    {{ __('global.security_settings') }}
                </button>
                @endcan
                <button class="tab-button px-6 py-4 text-sm font-black uppercase tracking-widest rounded-2xl flex items-center transition-all duration-300" data-tab="settings">
                    <x-base.lucide icon="Cpu" class="w-4 h-4 me-3" />
                    {{ __('global.system_info') }}
                </button>
            </nav>
        </div>
    </div>

    <!-- Tab Content -->
    <div class="mt-8">
        <!-- Profile Tab -->
        <div id="profile" class="tab-content active">
                        <div class="grid grid-cols-12 gap-8">
                            <div class="col-span-12 lg:col-span-4">
                                <div class="intro-y box p-10 text-center rounded-[3rem] border-0 shadow-2xl bg-white dark:bg-darkmode-700 relative overflow-hidden group">
                                    <div class="absolute top-0 right-0 p-10 opacity-5 group-hover:scale-110 transition-transform duration-700">
                                        <x-base.lucide icon="User" class="w-48 h-48 text-primary" />
                                    </div>
                                    
                                    <div class="relative z-10">
                                        <div class="w-44 h-44 rounded-[3rem] bg-gradient-to-br from-primary/10 to-primary/5 flex items-center justify-center mx-auto mb-10 border-4 border-white dark:border-darkmode-600 shadow-2xl relative group/avatar">
                                            <x-base.lucide icon="User" class="w-24 h-24 text-primary transition-all duration-500 group-hover/avatar:scale-110 group-hover/avatar:rotate-3" />
                                            <div class="absolute -bottom-4 -right-4 w-14 h-14 rounded-3xl bg-success flex items-center justify-center text-white shadow-xl border-8 border-white dark:border-darkmode-700 transform group-hover/avatar:scale-110 transition-transform">
                                                <x-base.lucide icon="Check" class="w-6 h-6" />
                                            </div>
                                        </div>
                                        <h3 class="text-3xl font-black text-slate-800 dark:text-slate-200 tracking-tight leading-tight">{{ $user->name }}</h3>
                                        <p class="text-primary font-black mt-3 text-xs uppercase tracking-[0.2em]">{{ $user->email }}</p>
                                        
                                        <div class="mt-10 flex flex-wrap justify-center gap-4">
                                            @if($user->department)
                                                <span class="px-6 py-2.5 rounded-2xl bg-primary/5 text-primary text-[10px] font-black uppercase tracking-[0.2em] border border-primary/10 shadow-sm hover:bg-primary/10 transition-colors">
                                                    {{ __('users.fields.departments.' . $user->department) }}
                                                </span>
                                            @endif
                                            <span class="px-6 py-2.5 rounded-2xl {{ $user->is_active ? 'bg-success/5 text-success border-success/10' : 'bg-danger/5 text-danger border-danger/10' }} text-[10px] font-black uppercase tracking-[0.2em] border shadow-sm">
                                                {{ $user->is_active ? __('global.active') : __('global.inactive') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-span-12 lg:col-span-8">
                                <div class="intro-y box p-10 rounded-[3rem] border-0 shadow-2xl bg-white dark:bg-darkmode-700">
                                    <div class="flex items-center mb-12 pb-6 border-b border-slate-100 dark:border-darkmode-400">
                                        <div class="w-14 h-14 rounded-2xl bg-primary/5 flex items-center justify-center text-primary shadow-inner me-6">
                                            <x-base.lucide icon="Info" class="w-7 h-7" />
                                        </div>
                                        <h3 class="text-2xl font-black text-slate-800 dark:text-slate-200 tracking-tight">{{ __('global.basic_information') }}</h3>
                                    </div>
                                    
                                    <div class="grid grid-cols-12 gap-8">
                                        <div class="col-span-12 md:col-span-6 p-8 rounded-[2.5rem] bg-slate-50 dark:bg-darkmode-600 border border-slate-100 dark:border-darkmode-400 shadow-inner group hover:bg-white transition-all duration-300">
                                            <div class="text-slate-400 text-[10px] font-black uppercase tracking-[0.3em] mb-4 group-hover:text-primary transition-colors">{{ __('users.fields.name') }}</div>
                                            <div class="text-2xl font-black text-slate-800 dark:text-slate-200 tracking-tight">{{ $user->name }}</div>
                                        </div>
                                        
                                        <div class="col-span-12 md:col-span-6 p-8 rounded-[2.5rem] bg-slate-50 dark:bg-darkmode-600 border border-slate-100 dark:border-darkmode-400 shadow-inner group hover:bg-white transition-all duration-300">
                                            <div class="text-slate-400 text-[10px] font-black uppercase tracking-[0.3em] mb-4 group-hover:text-primary transition-colors">{{ __('users.fields.email') }}</div>
                                            <div class="flex items-center text-xl font-black text-slate-800 dark:text-slate-200 tracking-tight">
                                                {{ $user->email }}
                                                @if($user->email_verified_at)
                                                    <div class="ms-3 w-6 h-6 rounded-lg bg-primary/10 flex items-center justify-center text-primary shadow-sm">
                                                        <x-base.lucide icon="Verified" class="w-4 h-4" />
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div class="col-span-12 md:col-span-6 p-8 rounded-[2.5rem] bg-slate-50 dark:bg-darkmode-600 border border-slate-100 dark:border-darkmode-400 shadow-inner group hover:bg-white transition-all duration-300">
                                            <div class="text-slate-400 text-[10px] font-black uppercase tracking-[0.3em] mb-4 group-hover:text-primary transition-colors">{{ __('users.fields.phone') }}</div>
                                            <div class="text-2xl font-black text-slate-800 dark:text-slate-200 tracking-tight">{{ $user->phone ?? '-' }}</div>
                                        </div>
                                        
                                        <div class="col-span-12 md:col-span-6 p-8 rounded-[2.5rem] bg-slate-50 dark:bg-darkmode-600 border border-slate-100 dark:border-darkmode-400 shadow-inner group hover:bg-white transition-all duration-300">
                                            <div class="text-slate-400 text-[10px] font-black uppercase tracking-[0.3em] mb-4 group-hover:text-primary transition-colors">{{ __('users.fields.department') }}</div>
                                            <div class="text-2xl font-black text-slate-800 dark:text-slate-200 tracking-tight">
                                                {{ $user->department ? __('users.fields.departments.' . $user->department) : '-' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>
        
        <!-- Roles Tab -->
        <div id="roles" class="tab-content">
                        <div class="grid grid-cols-12 gap-8">
                            <div class="col-span-12 lg:col-span-5">
                                <div class="intro-y box p-10 rounded-[3rem] border-0 shadow-2xl bg-white dark:bg-darkmode-700">
                                    <div class="flex items-center mb-12 pb-6 border-b border-slate-100 dark:border-darkmode-400">
                                        <div class="w-14 h-14 rounded-2xl bg-warning/5 flex items-center justify-center text-warning shadow-inner me-6">
                                            <x-base.lucide icon="ShieldCheck" class="w-7 h-7" />
                                        </div>
                                        <h3 class="text-2xl font-black text-slate-800 dark:text-slate-200 tracking-tight">{{ __('global.assigned_roles') }}</h3>
                                    </div>
                                    <div class="space-y-6">
                                        @forelse($user->roles as $role)
                                            <div class="role-card active p-8 rounded-[2.5rem] border-2 border-primary/20 bg-gradient-to-br from-primary/5 to-transparent relative overflow-hidden group">
                                                <div class="flex items-center relative z-10">
                                                    <div class="w-16 h-16 rounded-2xl bg-white dark:bg-darkmode-600 flex items-center justify-center text-primary me-6 shadow-xl group-hover:scale-110 transition-transform duration-500">
                                                        <x-base.lucide icon="Shield" class="w-8 h-8" />
                                                    </div>
                                                    <div>
                                                        <div class="font-black text-2xl text-slate-800 dark:text-slate-200 tracking-tight">{{ $role->name }}</div>
                                                        <div class="text-[10px] text-slate-500 font-black uppercase tracking-[0.2em] mt-2 flex items-center">
                                                            <x-base.lucide icon="Key" class="w-3.5 h-3.5 me-2 text-primary/50" />
                                                            {{ $role->permissions->count() }} {{ __('global.permissions') }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <x-base.lucide icon="Shield" class="absolute -bottom-10 -right-10 w-40 h-40 text-primary/5 group-hover:rotate-12 transition-transform duration-700" />
                                            </div>
                                        @empty
                                            <div class="text-center py-24 bg-slate-50 dark:bg-darkmode-600 rounded-[3rem] border-4 border-dashed border-slate-200 dark:border-darkmode-400">
                                                <x-base.lucide icon="ShieldOff" class="w-20 h-20 text-slate-200 mx-auto mb-6" />
                                                <div class="text-slate-400 font-black uppercase tracking-[0.3em] text-[10px]">{{ __('global.no_roles_assigned') }}</div>
                                            </div>
                                        @endforelse
                                    </div>

                                    @can('edit_users')
                                    <div class="mt-12 pt-8 border-t border-slate-100 dark:border-darkmode-400">
                                        <h4 class="text-lg font-black text-slate-700 dark:text-slate-200 mb-6 flex items-center">
                                            <x-base.lucide icon="PlusCircle" class="w-5 h-5 me-3 text-primary" />
                                            {{ __('global.assign_new_role') }}
                                        </h4>
                                        <form action="{{ route('users.assign-role', $user->id) }}" method="POST">
                                            @csrf
                                            <div class="flex gap-3">
                                                <div class="flex-1">
                                                    <x-base.tom-select name="role_id" class="w-full">
                                                        <option value="">{{ __('global.select_role') }}</option>
                                                        @foreach($allRoles as $role)
                                                            <option value="{{ $role->id }}" {{ $user->hasRole($role->name) ? 'disabled' : '' }}>
                                                                {{ $role->name }} {{ $user->hasRole($role->name) ? '(' . __('global.already_assigned') . ')' : '' }}
                                                            </option>
                                                        @endforeach
                                                    </x-base.tom-select>
                                                </div>
                                                <x-base.button type="submit" variant="primary" class="px-6 rounded-xl">
                                                    {{ __('global.assign') }}
                                                </x-base.button>
                                            </div>
                                        </form>
                                    </div>
                                    @endcan
                                </div>
                            </div>
                            
                            <div class="col-span-12 lg:col-span-7">
                                <div class="intro-y box p-10 rounded-[3rem] border-0 shadow-2xl bg-white dark:bg-darkmode-700">
                                    <div class="flex items-center mb-12 pb-6 border-b border-slate-100 dark:border-darkmode-400">
                                        <div class="w-14 h-14 rounded-2xl bg-info/5 flex items-center justify-center text-info shadow-inner me-6">
                                            <x-base.lucide icon="Key" class="w-7 h-7" />
                                        </div>
                                        <h3 class="text-2xl font-black text-slate-800 dark:text-slate-200 tracking-tight">{{ __('global.all_permissions') }}</h3>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                        @foreach($user->getAllPermissions() as $permission)
                                            <div class="flex items-center p-5 rounded-2xl bg-slate-50 dark:bg-darkmode-600 border border-slate-100 dark:border-darkmode-400 shadow-sm hover:shadow-xl hover:bg-white transition-all duration-500 group">
                                                <div class="w-3 h-3 rounded-full bg-success me-5 shadow-[0_0_15px_rgba(var(--color-success),0.6)] group-hover:scale-125 transition-transform"></div>
                                                <span class="text-[11px] font-black text-slate-600 dark:text-slate-300 uppercase tracking-widest group-hover:text-primary transition-colors">{{ str_replace('_', ' ', $permission->name) }}</span>
                                            </div>
                                        @endforeach
                                        @if($user->getAllPermissions()->isEmpty())
                                            <div class="col-span-2 text-center py-24">
                                                <x-base.lucide icon="Lock" class="w-16 h-16 text-slate-200 mx-auto mb-4" />
                                                <p class="text-slate-400 font-black uppercase tracking-[0.2em] text-[10px]">{{ __('global.no_permissions_found') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>

        <!-- Activity Tab -->
        <div id="activity" class="tab-content">
                        <div class="intro-y box p-12 rounded-[3rem] border-0 shadow-2xl bg-white dark:bg-darkmode-700">
                            <div class="flex items-center mb-16 pb-6 border-b border-slate-100 dark:border-darkmode-400">
                                <div class="w-14 h-14 rounded-2xl bg-danger/5 flex items-center justify-center text-danger shadow-inner me-6">
                                    <x-base.lucide icon="Activity" class="w-7 h-7" />
                                </div>
                                <h3 class="text-2xl font-black text-slate-800 dark:text-slate-200 tracking-tight">{{ __('global.recent_activity') }}</h3>
                            </div>
                            
                            <div class="relative before:content-[''] before:absolute before:w-1 before:bg-slate-100 dark:before:bg-darkmode-400 before:ms-7 before:h-full">
                                @forelse($user->actions ?? [] as $action)
                                    <div class="intro-x relative flex items-center mb-12 last:mb-0 group">
                                        <div class="w-14 h-14 rounded-2xl bg-white dark:bg-darkmode-600 border-4 border-slate-50 dark:border-darkmode-400 flex items-center justify-center z-10 shadow-xl group-hover:border-primary/20 transition-all duration-500">
                                            <x-base.lucide icon="Clock" class="w-6 h-6 text-primary" />
                                        </div>
                                        <div class="box px-10 py-7 ms-8 flex-1 rounded-[2.5rem] border-0 shadow-xl hover:shadow-2xl transition-all duration-500 bg-slate-50/50 dark:bg-darkmode-600/50 hover:bg-white dark:hover:bg-darkmode-600">
                                            <div class="flex items-center mb-4">
                                                <div class="font-black text-xl text-slate-800 dark:text-slate-200 tracking-tight">{{ $action['title'] ?? 'Action' }}</div>
                                                <div class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ms-auto bg-white dark:bg-darkmode-700 px-4 py-1.5 rounded-full shadow-inner">{{ $action['time'] ?? '' }}</div>
                                            </div>
                                            <div class="text-slate-500 font-bold text-sm leading-relaxed">{{ $action['description'] ?? '' }}</div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center py-24">
                                        <div class="w-24 h-24 bg-slate-50 dark:bg-darkmode-600 rounded-[3rem] flex items-center justify-center mx-auto mb-8 shadow-inner">
                                            <x-base.lucide icon="History" class="w-12 h-12 text-slate-200" />
                                        </div>
                                        <h4 class="text-slate-400 font-black uppercase tracking-[0.3em] text-[10px]">{{ __('global.no_recent_activity') }}</h4>
                                    </div>
                                @endforelse
                            </div>
                        </div>
        </div>

        @can('edit_users')
        <!-- Security Tab -->
        <div id="security" class="tab-content">
            <div class="intro-y box p-12 rounded-[3rem] border-0 shadow-2xl bg-white dark:bg-darkmode-700">
                <div class="flex items-center mb-16 pb-6 border-b border-slate-100 dark:border-darkmode-400">
                    <div class="w-14 h-14 rounded-2xl bg-warning/5 flex items-center justify-center text-warning shadow-inner me-6">
                        <x-base.lucide icon="Lock" class="w-7 h-7" />
                    </div>
                    <h3 class="text-2xl font-black text-slate-800 dark:text-slate-200 tracking-tight">{{ __('global.security_settings') }}</h3>
                </div>
                
                <div class="max-w-xl mx-auto">
                    <div class="bg-slate-50 dark:bg-darkmode-600 p-10 rounded-[3rem] border border-slate-100 dark:border-darkmode-400 shadow-inner group hover:bg-white transition-all duration-500">
                        <h4 class="text-xl font-black text-slate-800 dark:text-slate-200 mb-8 flex items-center">
                            <x-base.lucide icon="Shield" class="w-6 h-6 me-4 text-primary" />
                            {{ __('global.change_user_password') }}
                        </h4>
                        
                        <form action="{{ route('users.change-password', $user->id) }}" method="POST">
                            @csrf
                            <div class="space-y-6">
                                <div>
                                    <x-base.form-label class="font-black text-slate-700 dark:text-slate-300 mb-3 block text-xs uppercase tracking-widest">{{ __('global.new_password') }}</x-base.form-label>
                                    <x-base.form-input type="password" name="password" class="py-4 rounded-2xl border-slate-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-sm font-bold shadow-sm" required />
                                </div>
                                <div>
                                    <x-base.form-label class="font-black text-slate-700 dark:text-slate-300 mb-3 block text-xs uppercase tracking-widest">{{ __('global.confirm_new_password') }}</x-base.form-label>
                                    <x-base.form-input type="password" name="password_confirmation" class="py-4 rounded-2xl border-slate-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-sm font-bold shadow-sm" required />
                                </div>
                                <div class="pt-6">
                                    <x-base.button type="submit" variant="primary" class="w-full py-4 rounded-2xl shadow-xl shadow-primary/20 font-black uppercase tracking-widest text-xs transition-all hover:scale-[1.02]">
                                        {{ __('global.update_password') }}
                                    </x-base.button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endcan

        <!-- System Info Tab -->
        <div id="settings" class="tab-content">
                        <div class="intro-y box p-12 rounded-[3rem] border-0 shadow-2xl bg-white dark:bg-darkmode-700">
                            <div class="flex items-center mb-16 pb-6 border-b border-slate-100 dark:border-darkmode-400">
                                <div class="w-14 h-14 rounded-2xl bg-success/5 flex items-center justify-center text-success shadow-inner me-6">
                                    <x-base.lucide icon="Cpu" class="w-7 h-7" />
                                </div>
                                <h3 class="text-2xl font-black text-slate-800 dark:text-slate-200 tracking-tight">{{ __('global.system_information') }}</h3>
                            </div>
                            
                            <div class="grid grid-cols-12 gap-10">
                                <div class="col-span-12 md:col-span-6 p-10 rounded-[3rem] bg-slate-50 dark:bg-darkmode-600 border border-slate-100 dark:border-darkmode-400 shadow-inner group hover:bg-white transition-all duration-500">
                                    <div class="text-slate-400 text-[10px] font-black uppercase tracking-[0.3em] mb-10 group-hover:text-primary transition-colors flex items-center">
                                        <x-base.lucide icon="Calendar" class="w-4 h-4 me-3" />
                                        {{ __('global.account_lifecycle') }}
                                    </div>
                                    <div class="space-y-8">
                                        <div class="flex justify-between items-center pb-6 border-b border-slate-200/50">
                                            <span class="text-xs font-black text-slate-500 uppercase tracking-widest">{{ __('global.created_at') }}</span>
                                            <span class="font-black text-lg text-slate-800 dark:text-slate-200 tracking-tight">{{ $user->created_at->format('d M Y, H:i') }}</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-xs font-black text-slate-500 uppercase tracking-widest">{{ __('global.last_updated') }}</span>
                                            <span class="font-black text-lg text-slate-800 dark:text-slate-200 tracking-tight">{{ $user->updated_at->format('d M Y, H:i') }}</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-span-12 md:col-span-6 p-10 rounded-[3rem] bg-slate-50 dark:bg-darkmode-600 border border-slate-100 dark:border-darkmode-400 shadow-inner group hover:bg-white transition-all duration-500">
                                    <div class="text-slate-400 text-[10px] font-black uppercase tracking-[0.3em] mb-10 group-hover:text-primary transition-colors flex items-center">
                                        <x-base.lucide icon="Hash" class="w-4 h-4 me-3" />
                                        {{ __('global.technical_details') }}
                                    </div>
                                    <div class="space-y-8">
                                        <div class="flex justify-between items-center pb-6 border-b border-slate-200/50">
                                            <span class="text-xs font-black text-slate-500 uppercase tracking-widest">{{ __('global.user_id') }}</span>
                                            <span class="px-6 py-2 rounded-2xl bg-primary text-white text-xs font-mono font-black shadow-xl shadow-primary/30">#{{ $user->id }}</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-xs font-black text-slate-500 uppercase tracking-widest">{{ __('global.uuid') }}</span>
                                            <span class="text-xs font-mono text-slate-400 font-black truncate max-w-[200px] bg-white dark:bg-darkmode-700 px-4 py-2 rounded-xl shadow-inner">{{ $user->uuid ?? 'N/A' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>
    </div>

    @vite(['resources/js/pages/users.js'])
@endsection
