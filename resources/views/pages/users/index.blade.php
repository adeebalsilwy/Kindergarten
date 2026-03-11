@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('User.list') }} - {{ config('app.name') }}</title>
    @vite(['resources/css/pages/users.css'])
@endsection

@section('subcontent')
    <!-- Professional Header -->
    <div class="intro-y flex flex-col sm:flex-row items-center mt-10 mb-8">
        <div class="me-auto">
            <h2 class="text-3xl font-black text-slate-800 dark:text-slate-200 tracking-tight flex items-center">
                <div class="w-12 h-12 rounded-2xl bg-primary/10 flex items-center justify-center text-primary shadow-inner me-4">
                    <x-base.lucide icon="Users" class="w-7 h-7" />
                </div>
                {{ __('User.list') }}
                <span class="ms-4 px-4 py-1.5 rounded-full bg-slate-100 dark:bg-darkmode-600 text-slate-500 text-xs font-black border border-slate-200 dark:border-darkmode-400">
                    {{ $users->total() }} {{ __('global.total') }}
                </span>
            </h2>
        </div>
        <div class="w-full sm:w-auto flex mt-6 sm:mt-0 gap-3">
            @can('create_users')
            <x-base.button variant="primary" as="a" href="{{ route('users.create') }}" class="flex items-center px-6 py-3 rounded-2xl shadow-xl shadow-primary/30 transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98]">
                <x-base.lucide icon="UserPlus" class="w-5 h-5 me-2" />
                {{ __('User.add_new') }}
            </x-base.button>
            @endcan

            @can('export_users')
            <div class="dropdown">
                <x-base.button variant="outline-secondary" class="flex items-center px-5 py-3 rounded-2xl bg-white dark:bg-darkmode-700 shadow-sm border-slate-200 dark:border-darkmode-400">
                    <x-base.lucide icon="Download" class="w-5 h-5 me-2" />
                    {{ __('global.export') }}
                    <x-base.lucide icon="ChevronDown" class="w-4 h-4 ms-2 opacity-50" />
                </x-base.button>
                <div class="dropdown-menu w-48">
                    <div class="dropdown-content p-2 rounded-2xl shadow-2xl border-0">
                        <a href="{{ route('users.export.pdf') }}{{ request()->getQueryString() ? '?' . request()->getQueryString() : '' }}" class="dropdown-item flex items-center p-3 rounded-xl hover:bg-primary/5 transition-colors group">
                            <div class="w-10 h-10 rounded-lg bg-danger/10 text-danger flex items-center justify-center me-3 group-hover:scale-110 transition-transform">
                                <x-base.lucide icon="FileText" class="w-5 h-5" />
                            </div>
                            <span class="font-bold text-slate-700 dark:text-slate-300">{{ __('global.export_pdf') }}</span>
                        </a>
                        <a href="{{ route('users.export.excel') }}{{ request()->getQueryString() ? '?' . request()->getQueryString() : '' }}" class="dropdown-item flex items-center p-3 rounded-xl hover:bg-primary/5 transition-colors group mt-1">
                            <div class="w-10 h-10 rounded-lg bg-success/10 text-success flex items-center justify-center me-3 group-hover:scale-110 transition-transform">
                                <x-base.lucide icon="FileSpreadsheet" class="w-5 h-5" />
                            </div>
                            <span class="font-bold text-slate-700 dark:text-slate-300">{{ __('global.export_excel') }}</span>
                        </a>
                    </div>
                </div>
            </div>
            @endcan
        </div>
    </div>

    <!-- Stats Dashboard - Redesigned -->
    <div class="grid grid-cols-12 gap-6 mb-8">
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="box p-8 rounded-[2.5rem] border-0 shadow-xl bg-gradient-to-br from-primary/10 to-transparent relative overflow-hidden group">
                <div class="flex items-center relative z-10">
                    <div class="w-14 h-14 rounded-2xl bg-white dark:bg-darkmode-600 flex items-center justify-center text-primary shadow-lg group-hover:scale-110 transition-transform duration-500">
                        <x-base.lucide icon="Users" class="w-7 h-7" />
                    </div>
                    <div class="ms-auto text-[10px] font-black uppercase tracking-[0.2em] text-primary/70">{{ __('global.total_users') }}</div>
                </div>
                <div class="text-4xl font-black text-slate-800 dark:text-slate-200 mt-8 relative z-10 tracking-tight">{{ $users->total() }}</div>
                <x-base.lucide icon="Users" class="absolute -bottom-6 -right-6 w-32 h-32 text-primary/5 group-hover:rotate-12 transition-transform duration-700" />
            </div>
        </div>
        
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="box p-8 rounded-[2.5rem] border-0 shadow-xl bg-gradient-to-br from-success/10 to-transparent relative overflow-hidden group">
                <div class="flex items-center relative z-10">
                    <div class="w-14 h-14 rounded-2xl bg-white dark:bg-darkmode-600 flex items-center justify-center text-success shadow-lg group-hover:scale-110 transition-transform duration-500">
                        <x-base.lucide icon="ShieldCheck" class="w-7 h-7" />
                    </div>
                    <div class="ms-auto text-[10px] font-black uppercase tracking-[0.2em] text-success/70">{{ __('global.active') }}</div>
                </div>
                <div class="text-4xl font-black text-slate-800 dark:text-slate-200 mt-8 relative z-10 tracking-tight">{{ $users->where('is_active', true)->count() }}</div>
                <x-base.lucide icon="ShieldCheck" class="absolute -bottom-6 -right-6 w-32 h-32 text-success/5 group-hover:rotate-12 transition-transform duration-700" />
            </div>
        </div>

        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="box p-8 rounded-[2.5rem] border-0 shadow-xl bg-gradient-to-br from-warning/10 to-transparent relative overflow-hidden group">
                <div class="flex items-center relative z-10">
                    <div class="w-14 h-14 rounded-2xl bg-white dark:bg-darkmode-600 flex items-center justify-center text-warning shadow-lg group-hover:scale-110 transition-transform duration-500">
                        <x-base.lucide icon="UserCheck" class="w-7 h-7" />
                    </div>
                    <div class="ms-auto text-[10px] font-black uppercase tracking-[0.2em] text-warning/70">{{ __('global.verified') }}</div>
                </div>
                <div class="text-4xl font-black text-slate-800 dark:text-slate-200 mt-8 relative z-10 tracking-tight">{{ $users->whereNotNull('email_verified_at')->count() }}</div>
                <x-base.lucide icon="UserCheck" class="absolute -bottom-6 -right-6 w-32 h-32 text-warning/5 group-hover:rotate-12 transition-transform duration-700" />
            </div>
        </div>

        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="box p-8 rounded-[2.5rem] border-0 shadow-xl bg-gradient-to-br from-info/10 to-transparent relative overflow-hidden group">
                <div class="flex items-center relative z-10">
                    <div class="w-14 h-14 rounded-2xl bg-white dark:bg-darkmode-600 flex items-center justify-center text-info shadow-lg group-hover:scale-110 transition-transform duration-500">
                        <x-base.lucide icon="Shield" class="w-7 h-7" />
                    </div>
                    <div class="ms-auto text-[10px] font-black uppercase tracking-[0.2em] text-info/70">{{ __('global.admins') }}</div>
                </div>
                <div class="text-4xl font-black text-slate-800 dark:text-slate-200 mt-8 relative z-10 tracking-tight">{{ $users->filter(fn($u) => $u->hasRole('Administrator'))->count() }}</div>
                <x-base.lucide icon="Shield" class="absolute -bottom-6 -right-6 w-32 h-32 text-info/5 group-hover:rotate-12 transition-transform duration-700" />
            </div>
        </div>
    </div>

    <!-- Advanced Filter Section -->
    <div class="intro-y box p-10 rounded-[3rem] border-0 shadow-2xl bg-white dark:bg-darkmode-700 mb-8 overflow-hidden relative">
        <div class="absolute top-0 right-0 p-10 opacity-5">
            <x-base.lucide icon="Filter" class="w-48 h-48 text-primary" />
        </div>
        
        <form method="GET" action="{{ route('users.index') }}" class="relative z-10">
            <div class="grid grid-cols-12 gap-x-8 gap-y-6">
                <div class="col-span-12 lg:col-span-4">
                    <x-base.form-label class="font-black text-slate-700 dark:text-slate-300 mb-3 block">{{ __('global.search') }}</x-base.form-label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 start-0 ps-5 flex items-center text-slate-400 group-focus-within:text-primary transition-colors">
                            <x-base.lucide icon="Search" class="w-5 h-5" />
                        </div>
                        <x-base.form-input name="search" value="{{ request('search') }}" placeholder="{{ __('global.search_users_placeholder') }}" class="ps-14 py-4 rounded-2xl border-slate-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-sm font-bold shadow-sm" />
                    </div>
                </div>
                
                <div class="col-span-12 sm:col-span-6 lg:col-span-2">
                    <x-base.form-label class="font-black text-slate-700 dark:text-slate-300 mb-3 block">{{ __('users.fields.status') }}</x-base.form-label>
                    <x-base.tom-select name="is_active" class="w-full">
                        <option value="">{{ __('global.all_statuses') }}</option>
                        <option value="1" {{ request('is_active') == '1' ? 'selected' : '' }}>{{ __('global.active') }}</option>
                        <option value="0" {{ request('is_active') == '0' ? 'selected' : '' }}>{{ __('global.inactive') }}</option>
                    </x-base.tom-select>
                </div>

                <div class="col-span-12 sm:col-span-6 lg:col-span-2">
                    <x-base.form-label class="font-black text-slate-700 dark:text-slate-300 mb-3 block">{{ __('global.role') }}</x-base.form-label>
                    <x-base.tom-select name="role" class="w-full">
                        <option value="">{{ __('global.all_roles') }}</option>
                        @foreach(Spatie\Permission\Models\Role::all() as $role)
                            <option value="{{ $role->name }}" {{ request('role') == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </x-base.tom-select>
                </div>

                <div class="col-span-12 sm:col-span-6 lg:col-span-2">
                    <x-base.form-label class="font-black text-slate-700 dark:text-slate-300 mb-3 block">{{ __('global.verification') }}</x-base.form-label>
                    <x-base.tom-select name="verified" class="w-full">
                        <option value="">{{ __('global.all_verification') }}</option>
                        <option value="1" {{ request('verified') == '1' ? 'selected' : '' }}>{{ __('global.verified') }}</option>
                        <option value="0" {{ request('verified') == '0' ? 'selected' : '' }}>{{ __('global.unverified') }}</option>
                    </x-base.tom-select>
                </div>

                <div class="col-span-12 sm:col-span-6 lg:col-span-2 flex items-end">
                    <div class="flex w-full gap-2">
                        <x-base.button type="submit" variant="primary" class="flex-1 py-4 rounded-2xl shadow-lg shadow-primary/20 font-black uppercase tracking-widest text-[10px] transition-all hover:scale-[1.02]">
                            {{ __('global.filter') }}
                        </x-base.button>
                        <x-base.button as="a" href="{{ route('users.index') }}" variant="soft-secondary" class="p-4 rounded-2xl">
                            <x-base.lucide icon="RotateCcw" class="w-5 h-5" />
                        </x-base.button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- User Professional Table -->
    <div class="intro-y box rounded-[3rem] border-0 shadow-2xl bg-white dark:bg-darkmode-700 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-start">
                <thead>
                    <tr class="bg-slate-50 dark:bg-darkmode-600 text-slate-400 font-black uppercase tracking-[0.2em] text-[10px]">
                        <th class="px-8 py-8 text-start">{{ __('users.fields.user') }}</th>
                        <th class="px-8 py-8 text-center">{{ __('global.status') }}</th>
                        <th class="px-8 py-8 text-center">{{ __('global.role') }}</th>
                        <th class="px-8 py-8 text-center">{{ __('global.last_activity') }}</th>
                        <th class="px-8 py-8 text-end">{{ __('global.actions') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-darkmode-400">
                    @forelse($users as $user)
                    <tr class="group hover:bg-slate-50/50 dark:hover:bg-darkmode-600/50 transition-colors duration-300">
                        <td class="px-8 py-6">
                            <div class="flex items-center">
                                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-primary/10 to-transparent flex items-center justify-center text-primary shadow-inner me-5 group-hover:scale-110 transition-transform duration-500">
                                    <x-base.lucide icon="User" class="w-7 h-7" />
                                </div>
                                <div>
                                    <div class="text-lg font-black text-slate-800 dark:text-slate-200 tracking-tight leading-tight">{{ $user->name }}</div>
                                    <div class="text-xs font-bold text-slate-400 mt-1 flex items-center tracking-wide">
                                        <x-base.lucide icon="Mail" class="w-3.5 h-3.5 me-2 opacity-50" />
                                        {{ $user->email }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6 text-center">
                            @if($user->is_active)
                                <span class="px-5 py-2 rounded-full bg-success/10 text-success text-[10px] font-black uppercase tracking-widest border border-success/10 shadow-sm">
                                    {{ __('global.active') }}
                                </span>
                            @else
                                <span class="px-5 py-2 rounded-full bg-danger/10 text-danger text-[10px] font-black uppercase tracking-widest border border-danger/10 shadow-sm">
                                    {{ __('global.inactive') }}
                                </span>
                            @endif
                        </td>
                        <td class="px-8 py-6 text-center">
                            @if($user->roles->count() > 0)
                                <div class="flex flex-col items-center gap-2">
                                    <span class="px-4 py-1.5 rounded-xl bg-primary/10 text-primary text-[10px] font-black uppercase tracking-widest border border-primary/10">
                                        {{ $user->roles->first()->name }}
                                    </span>
                                    @if($user->roles->count() > 1)
                                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">+{{ $user->roles->count() - 1 }} {{ __('global.more') }}</span>
                                    @endif
                                </div>
                            @else
                                <span class="text-slate-300 italic text-xs font-bold">{{ __('global.no_role') }}</span>
                            @endif
                        </td>
                        <td class="px-8 py-6 text-center">
                            <div class="text-sm font-black text-slate-700 dark:text-slate-300 tracking-tight">
                                {{ $user->last_login_at ? $user->last_login_at->diffForHumans() : '-' }}
                            </div>
                            <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">
                                {{ $user->last_login_at ? $user->last_login_at->format('M d, H:i') : __('global.never') }}
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex justify-end items-center gap-3">
                                @can('view_users')
                                <x-base.button as="a" href="{{ route('users.show', $user->id) }}" variant="soft-secondary" class="w-10 h-10 rounded-xl p-0 flex items-center justify-center transition-all hover:bg-primary/10 hover:text-primary hover:scale-110 shadow-sm">
                                    <x-base.lucide icon="Eye" class="w-5 h-5" />
                                </x-base.button>
                                @endcan
                                
                                @can('edit_users')
                                <x-base.button as="a" href="{{ route('users.edit', $user->id) }}" variant="soft-secondary" class="w-10 h-10 rounded-xl p-0 flex items-center justify-center transition-all hover:bg-info/10 hover:text-info hover:scale-110 shadow-sm">
                                    <x-base.lucide icon="Pencil" class="w-5 h-5" />
                                </x-base.button>
                                @endcan

                                @can('delete_users')
                                <x-base.button variant="soft-danger" class="w-10 h-10 rounded-xl p-0 flex items-center justify-center transition-all hover:bg-danger hover:text-white hover:scale-110 shadow-sm delete-btn" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                    <x-base.lucide icon="Trash2" class="w-5 h-5" />
                                </x-base.button>
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-8 py-32 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-24 h-24 bg-slate-50 dark:bg-darkmode-600 rounded-[3rem] flex items-center justify-center mb-8 shadow-inner">
                                    <x-base.lucide icon="Search" class="w-12 h-12 text-slate-200" />
                                </div>
                                <h4 class="text-xl font-black text-slate-800 dark:text-slate-200 tracking-tight mb-2">{{ __('global.no_results_found') }}</h4>
                                <p class="text-slate-400 font-bold text-sm">{{ __('global.try_adjusting_filters') }}</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="px-10 py-10 bg-slate-50 dark:bg-darkmode-600 flex flex-col sm:flex-row items-center gap-6">
            <div class="me-auto text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">
                {{ __('global.showing') }} {{ $users->firstItem() ?? 0 }} {{ __('global.to') }} {{ $users->lastItem() ?? 0 }} {{ __('global.of') }} {{ $users->total() }} {{ __('global.entries') }}
            </div>
            <div class="pagination-container">
                {{ $users->links() }}
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <x-base.dialog id="delete-confirmation-modal">
        <x-base.dialog.panel class="p-0 overflow-hidden rounded-[3rem] border-0 shadow-2xl">
            <div class="p-12 text-center relative">
                <div class="absolute top-0 right-0 p-10 opacity-5">
                    <x-base.lucide icon="Trash2" class="w-48 h-48 text-danger" />
                </div>
                
                <div class="w-24 h-24 rounded-[2.5rem] bg-danger/10 flex items-center justify-center text-danger mx-auto mb-10 shadow-inner relative z-10">
                    <x-base.lucide icon="XCircle" class="w-12 h-12" />
                </div>
                
                <div class="relative z-10">
                    <h3 class="text-3xl font-black text-slate-800 dark:text-slate-200 tracking-tight mb-4">{{ __('global.are_you_sure') }}</h3>
                    <p class="text-slate-500 font-bold text-lg leading-relaxed mb-2">{{ __('global.delete_user_warning') }}</p>
                    <div id="deleteUserName" class="text-danger font-black text-2xl tracking-tight mb-12"></div>
                </div>

                <div class="flex justify-center gap-4 relative z-10">
                    <x-base.button type="button" data-tw-dismiss="modal" variant="outline-secondary" class="px-10 py-4 rounded-2xl font-black uppercase tracking-widest text-[10px] border-2">
                        {{ __('global.cancel') }}
                    </x-base.button>
                    <form id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <x-base.button type="submit" variant="danger" class="px-10 py-4 rounded-2xl font-black uppercase tracking-widest text-[10px] shadow-xl shadow-danger/20">
                            {{ __('global.confirm_delete') }}
                        </x-base.button>
                    </form>
                </div>
            </div>
        </x-base.dialog.panel>
    </x-base.dialog>

    @vite(['resources/js/pages/users.js'])
@endsection
