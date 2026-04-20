@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('User.add_new') }} - {{ config('app.name') }}</title>
    <style>
        .tabs-navigation {
            display: flex;
            gap: 0.5rem;
            padding: 1rem;
            background: rgba(var(--color-primary), 0.03);
            border-bottom: 1px solid rgba(0,0,0,0.05);
            overflow-x: auto;
        }
        .tab-button {
            padding: 0.75rem 1.5rem;
            border-radius: 1.25rem;
            font-weight: 800;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            color: #64748b;
            white-space: nowrap;
            border: 2px solid transparent;
        }
        .tab-button:hover {
            background: rgba(var(--color-primary), 0.05);
            color: rgb(var(--color-primary));
        }
        .tab-button.active {
            background: white;
            color: rgb(var(--color-primary));
            border-color: rgb(var(--color-primary) / 0.1);
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1);
        }
        .tab-content {
            display: none;
            animation: slideUp 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .tab-content.active {
            display: block;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .role-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border-width: 2px;
        }
        .role-card.selected {
            border-color: rgb(var(--color-primary));
            background: rgba(var(--color-primary), 0.04);
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgb(var(--color-primary) / 0.25);
        }
        .role-card.selected .role-checkbox {
            background-color: rgb(var(--color-primary));
            border-color: rgb(var(--color-primary));
        }
        .permission-group-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .permission-group-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1);
        }
        .form-check-input:checked {
            background-color: rgb(var(--color-primary));
            border-color: rgb(var(--color-primary));
        }
        .permission-container {
            max-height: 600px;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: rgb(var(--color-primary) / 0.2) transparent;
            padding-right: 10px;
        }
        .permission-container::-webkit-scrollbar {
            width: 6px;
        }
        .permission-container::-webkit-scrollbar-thumb {
            background-color: rgb(var(--color-primary) / 0.2);
            border-radius: 10px;
        }
    </style>
@endsection

@section('subcontent')
    <!-- Header -->
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8 mb-8">
        <div class="me-auto">
            <h2 class="text-3xl font-black text-slate-800 dark:text-slate-200 tracking-tight flex items-center">
                <div class="w-12 h-12 rounded-2xl bg-primary/10 flex items-center justify-center text-primary shadow-inner me-4">
                    <x-base.lucide icon="UserPlus" class="w-7 h-7" />
                </div>
                <span class="text-primary">{{ __('User.add_new') }}</span>
            </h2>
        </div>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0 gap-3">
            <x-base.button type="button" variant="soft-primary" onclick="fillDemoData()" class="flex items-center px-6 py-3 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 bg-white dark:bg-darkmode-600 border-0 font-bold text-primary">
                <x-base.lucide icon="Zap" class="w-4 h-4 me-2" />
                {{ __('global.fill_demo_data') }}
            </x-base.button>
            <x-base.button variant="outline-secondary" as="a" href="{{ route('users.index') }}" class="flex items-center px-6 py-3 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 bg-white dark:bg-darkmode-600 border-0 font-bold">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
                {{ __('global.back_to_list') }}
            </x-base.button>
        </div>
    </div>

    <!-- Main Content -->
    <div class="mt-8">
        <form action="{{ route('users.store') }}" method="POST" id="userForm" enctype="multipart/form-data">
            @csrf

            <div class="intro-y box p-0 mb-8 overflow-hidden rounded-[2.5rem] shadow-2xl border-0 bg-white dark:bg-darkmode-600">
                <!-- Tab Navigation -->
                <div class="tabs-navigation bg-slate-50/50 dark:bg-darkmode-700/50">
                    <button type="button" class="tab-button active" data-tab="basic">
                        <x-base.lucide icon="User" class="w-4 h-4 me-3" />
                        {{ __('global.basic_info') }}
                    </button>
                    <button type="button" class="tab-button" data-tab="security">
                        <x-base.lucide icon="Shield" class="w-4 h-4 me-3" />
                        {{ __('global.security') }}
                    </button>
                    <button type="button" class="tab-button" data-tab="roles">
                        <x-base.lucide icon="ShieldCheck" class="w-4 h-4 me-3" />
                        {{ __('global.roles_permissions') }}
                    </button>
                </div>

                <div class="p-8 lg:p-12">
                    <!-- Basic Information Tab -->
                    <div id="basic" class="tab-content active">
                        <div class="flex items-center mb-12 pb-8 border-b border-slate-100 dark:border-darkmode-400">
                            <div class="w-16 h-16 rounded-3xl bg-primary/5 flex items-center justify-center text-primary shadow-inner me-6">
                                <x-base.lucide icon="User" class="w-8 h-8" />
                            </div>
                            <div>
                                <h3 class="text-2xl font-black text-slate-800 dark:text-slate-200 tracking-tight">{{ __('global.basic_information') }}</h3>
                                <p class="text-slate-400 font-bold text-sm mt-1 uppercase tracking-widest">{{ __('global.basic_info_description') }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-12 gap-x-10 gap-y-10">
                            <div class="col-span-12 md:col-span-6">
                                <x-base.form-label class="font-black text-slate-700 dark:text-slate-300 mb-4 block">{{ __('users.fields.name') }}</x-base.form-label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 start-0 ps-6 flex items-center text-slate-400 group-focus-within:text-primary transition-colors">
                                        <x-base.lucide icon="User" class="w-5 h-5" />
                                    </div>
                                    <x-base.form-input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="{{ __('users.placeholders.name') }}" class="ps-16 py-5 rounded-[1.5rem] border-slate-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-base font-bold" />
                                </div>
                                @error('name') <div class="text-danger mt-3 text-xs font-black flex items-center"><x-base.lucide icon="AlertCircle" class="w-4 h-4 me-2" /> {{ $message }}</div> @enderror
                            </div>

                            <div class="col-span-12 md:col-span-6">
                                <x-base.form-label class="font-black text-slate-700 dark:text-slate-300 mb-4 block">{{ __('users.fields.email') }}</x-base.form-label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 start-0 ps-6 flex items-center text-slate-400 group-focus-within:text-primary transition-colors">
                                        <x-base.lucide icon="Mail" class="w-5 h-5" />
                                    </div>
                                    <x-base.form-input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="{{ __('users.placeholders.email') }}" class="ps-16 py-5 rounded-[1.5rem] border-slate-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-base font-bold" />
                                </div>
                                @error('email') <div class="text-danger mt-3 text-xs font-black flex items-center"><x-base.lucide icon="AlertCircle" class="w-4 h-4 me-2" /> {{ $message }}</div> @enderror
                            </div>

                            <div class="col-span-12 md:col-span-6">
                                <x-base.form-label class="font-black text-slate-700 dark:text-slate-300 mb-4 block">{{ __('users.fields.phone') }}</x-base.form-label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 start-0 ps-6 flex items-center text-slate-400 group-focus-within:text-primary transition-colors">
                                        <x-base.lucide icon="Phone" class="w-5 h-5" />
                                    </div>
                                    <x-base.form-input type="tel" name="phone" id="phone" value="{{ old('phone') }}" placeholder="{{ __('users.placeholders.phone') }}" class="ps-16 py-5 rounded-[1.5rem] border-slate-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-base font-bold" />
                                </div>
                                @error('phone') <div class="text-danger mt-3 text-xs font-black flex items-center"><x-base.lucide icon="AlertCircle" class="w-4 h-4 me-2" /> {{ $message }}</div> @enderror
                            </div>

                            <div class="col-span-12 md:col-span-6">
                                <x-base.form-label class="font-black text-slate-700 dark:text-slate-300 mb-4 block">{{ __('users.fields.department') }}</x-base.form-label>
                                <x-base.tom-select name="department" id="department" class="w-full">
                                    <option value="">{{ __('global.select_department') }}</option>
                                    <option value="administration">{{ __('users.fields.departments.administration') }}</option>
                                    <option value="teaching">{{ __('users.fields.departments.teaching') }}</option>
                                    <option value="finance">{{ __('users.fields.departments.finance') }}</option>
                                    <option value="support">{{ __('users.fields.departments.support') }}</option>
                                </x-base.tom-select>
                            </div>

                            <div class="col-span-12">
                                <div class="p-10 bg-slate-50 dark:bg-darkmode-700 rounded-[2.5rem] border border-slate-100 dark:border-darkmode-400 shadow-inner group hover:bg-primary/5 transition-all duration-500 cursor-pointer" onclick="toggleCheckbox('is_active')">
                                    <div class="flex items-center">
                                        <div class="w-14 h-14 rounded-2xl bg-white dark:bg-darkmode-600 flex items-center justify-center text-success shadow-sm me-6 group-hover:scale-110 transition-transform">
                                            <x-base.lucide icon="CheckCircle" class="w-7 h-7" />
                                        </div>
                                        <div>
                                            <label for="is_active" class="font-black mb-0 cursor-pointer text-slate-700 dark:text-slate-300 text-xl">{{ __('global.account_active') }}</label>
                                            <p class="text-slate-400 text-xs font-bold mt-1">{{ __('global.account_active_help') }}</p>
                                        </div>
                                        <div class="ms-auto">
                                            <div class="relative inline-block w-14 h-7 align-middle select-none">
                                                <input type="checkbox" id="is_active" name="is_active" value="1" class="toggle-checkbox absolute block w-7 h-7 rounded-full bg-white border-4 border-slate-300 appearance-none cursor-pointer transition-transform duration-200 ease-in-out checked:translate-x-7 checked:border-success checked:bg-success" {{ old('is_active', true) ? 'checked' : '' }} />
                                                <label for="is_active" class="toggle-label block overflow-hidden h-7 rounded-full bg-slate-300 cursor-pointer transition-colors duration-200 ease-in-out"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-12">
                                <div class="p-10 bg-slate-50 dark:bg-darkmode-700 rounded-[2.5rem] border border-slate-100 dark:border-darkmode-400 shadow-inner group hover:bg-warning/5 transition-all duration-500 cursor-pointer" onclick="toggleCheckbox('email_verified')">
                                    <div class="flex items-center">
                                        <div class="w-14 h-14 rounded-2xl bg-white dark:bg-darkmode-600 flex items-center justify-center text-warning shadow-sm me-6 group-hover:scale-110 transition-transform">
                                            <x-base.lucide icon="MailCheck" class="w-7 h-7" />
                                        </div>
                                        <div>
                                            <label for="email_verified" class="font-black mb-0 cursor-pointer text-slate-700 dark:text-slate-300 text-xl">{{ __('global.email_verified') }}</label>
                                            <p class="text-slate-400 text-xs font-bold mt-1">{{ __('global.email_verified_help') }}</p>
                                        </div>
                                        <div class="ms-auto">
                                            <div class="relative inline-block w-14 h-7 align-middle select-none">
                                                <input type="checkbox" id="email_verified" name="email_verified" value="1" class="toggle-checkbox absolute block w-7 h-7 rounded-full bg-white border-4 border-slate-300 appearance-none cursor-pointer transition-transform duration-200 ease-in-out checked:translate-x-7 checked:border-warning checked:bg-warning" {{ old('email_verified', true) ? 'checked' : '' }} />
                                                <label for="email_verified" class="toggle-label block overflow-hidden h-7 rounded-full bg-slate-300 cursor-pointer transition-colors duration-200 ease-in-out"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Security Tab -->
                    <div id="security" class="tab-content">
                        <div class="flex items-center mb-12 pb-8 border-b border-slate-100 dark:border-darkmode-400">
                            <div class="w-16 h-16 rounded-3xl bg-info/5 flex items-center justify-center text-info shadow-inner me-6">
                                <x-base.lucide icon="Shield" class="w-8 h-8" />
                            </div>
                            <div>
                                <h3 class="text-2xl font-black text-slate-800 dark:text-slate-200 tracking-tight">{{ __('global.security_settings') }}</h3>
                                <p class="text-slate-400 font-bold text-sm mt-1 uppercase tracking-widest">{{ __('global.security_description') }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-12 gap-x-10 gap-y-10">
                            <div class="col-span-12 md:col-span-6">
                                <x-base.form-label class="font-black text-slate-700 dark:text-slate-300 mb-4 block">{{ __('users.fields.password') }}</x-base.form-label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 start-0 ps-6 flex items-center text-slate-400 group-focus-within:text-primary transition-colors">
                                        <x-base.lucide icon="Lock" class="w-5 h-5" />
                                    </div>
                                    <x-base.form-input type="password" name="password" id="password" placeholder="{{ __('users.placeholders.password') }}" autocomplete="new-password" class="ps-16 py-5 rounded-[1.5rem] border-slate-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-base font-bold" />
                                    <button type="button" onclick="togglePassword('password')" class="absolute inset-y-0 end-0 pe-6 flex items-center text-slate-400 hover:text-primary transition-colors">
                                        <x-base.lucide icon="Eye" class="w-5 h-5" />
                                    </button>
                                </div>
                                <div class="mt-6 flex flex-wrap items-center gap-4">
                                    <x-base.button type="button" variant="soft-primary" onclick="generatePassword()" class="text-[11px] font-black py-3 px-8 rounded-2xl uppercase tracking-widest flex items-center shadow-sm">
                                        <x-base.lucide icon="Zap" class="w-4 h-4 me-2" />
                                        {{ __('global.generate_password') }}
                                    </x-base.button>
                                    <div class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] flex items-center">
                                        <x-base.lucide icon="Info" class="w-4 h-4 me-2 text-primary opacity-50" />
                                        {{ __('global.secure_password_hint') }}
                                    </div>
                                </div>
                                @error('password') <div class="text-danger mt-3 text-xs font-black flex items-center"><x-base.lucide icon="AlertCircle" class="w-4 h-4 me-2" /> {{ $message }}</div> @enderror
                            </div>

                            <div class="col-span-12 md:col-span-6">
                                <x-base.form-label class="font-black text-slate-700 dark:text-slate-300 mb-4 block">{{ __('users.fields.password_confirmation') }}</x-base.form-label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 start-0 ps-6 flex items-center text-slate-400 group-focus-within:text-primary transition-colors">
                                        <x-base.lucide icon="Lock" class="w-5 h-5" />
                                    </div>
                                    <x-base.form-input type="password" name="password_confirmation" id="password_confirmation" placeholder="{{ __('users.placeholders.password_confirmation') }}" autocomplete="new-password" class="ps-16 py-5 rounded-[1.5rem] border-slate-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-base font-bold" />
                                </div>
                            </div>

                            <div class="col-span-12">
                                <div class="p-10 bg-gradient-to-br from-primary/5 to-transparent rounded-[2.5rem] border border-primary/10 shadow-inner flex flex-col md:flex-row items-center gap-10 hover:from-primary/10 transition-all duration-500 group relative overflow-hidden">
                                    <div class="absolute -right-10 -bottom-10 opacity-5 group-hover:scale-110 transition-transform duration-700">
                                        <x-base.lucide icon="Mail" class="w-48 h-48 text-primary" />
                                    </div>
                                    <div class="form-check form-switch transform scale-150 relative z-10">
                                        <x-base.form-input type="checkbox" id="send_welcome_email" name="send_welcome_email" value="1" class="form-check-input w-14 h-7" />
                                    </div>
                                    <div class="text-center md:text-start relative z-10">
                                        <x-base.form-label for="send_welcome_email" class="font-black text-2xl text-primary mb-2 cursor-pointer block tracking-tight group-hover:translate-x-1 transition-transform">{{ __('users.fields.send_welcome_email') }}</x-base.form-label>
                                        <div class="text-slate-500 text-sm font-bold leading-relaxed max-w-2xl">{{ __('users.fields.send_welcome_email_help') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Roles & Permissions Tab -->
                    <div id="roles" class="tab-content">
                        <div class="flex items-center mb-12 pb-8 border-b border-slate-100 dark:border-darkmode-400">
                            <div class="w-16 h-16 rounded-3xl bg-warning/5 flex items-center justify-center text-warning shadow-inner me-6">
                                <x-base.lucide icon="ShieldCheck" class="w-8 h-8" />
                            </div>
                            <div>
                                <h3 class="text-2xl font-black text-slate-800 dark:text-slate-200 tracking-tight">{{ __('global.access_control') }}</h3>
                                <p class="text-slate-400 font-bold text-sm mt-1 uppercase tracking-widest">{{ __('global.access_control_description') }}</p>
                            </div>
                        </div>

                        <div class="mb-16">
                            <div class="flex items-center mb-10">
                                <h4 class="text-xl font-black text-slate-700 dark:text-slate-300 tracking-tight">{{ __('global.user_roles') }}</h4>
                                <div class="ms-6 h-px flex-1 bg-slate-100 dark:bg-darkmode-400"></div>
                                <span class="ms-6 px-6 py-2.5 bg-slate-50 dark:bg-darkmode-700 text-slate-400 text-[10px] rounded-full font-black uppercase tracking-[0.2em] border border-slate-100 dark:border-darkmode-400 shadow-sm">{{ __('global.select_user_roles') }}</span>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                                @foreach($roles as $role)
                                <div class="role-card group p-8 rounded-[2.5rem] border-2 border-slate-100 dark:border-darkmode-400 bg-slate-50/50 dark:bg-darkmode-700/50 hover:border-primary/30 hover:bg-white dark:hover:bg-darkmode-600 transition-all duration-300 cursor-pointer relative overflow-hidden">
                                    <div class="flex items-start relative z-10">
                                        <div class="form-check" onclick="event.stopPropagation()">
                                            <x-base.form-input type="checkbox" id="role_{{ $role->id }}" name="roles[]" value="{{ $role->id }}" class="form-check-input role-checkbox w-8 h-8 border-slate-300 rounded-xl" {{ (old('roles') && in_array($role->id, old('roles'))) ? 'checked' : '' }} />
                                        </div>
                                        <div class="ms-6">
                                            <x-base.form-label for="role_{{ $role->id }}" class="font-black text-2xl text-slate-800 dark:text-slate-200 block mb-2 cursor-pointer group-hover:text-primary transition-colors tracking-tight">
                                                {{ $role->name }}
                                            </x-base.form-label>
                                            <div class="flex items-center gap-6 text-slate-400 text-[10px] font-black uppercase tracking-[0.2em]">
                                                <div class="flex items-center group-hover:text-primary transition-colors">
                                                    <x-base.lucide icon="Shield" class="w-4 h-4 me-2 text-primary opacity-50" />
                                                    {{ $role->permissions->count() }} {{ __('global.permissions') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="absolute -right-8 -bottom-8 opacity-[0.03] group-hover:opacity-[0.08] transition-opacity duration-500">
                                        <x-base.lucide icon="Shield" class="w-40 h-48 text-primary" />
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @error('roles') <div class="text-danger mt-8 text-sm font-black p-8 bg-danger/5 rounded-[2rem] border border-danger/10 flex items-center shadow-sm"><x-base.lucide icon="AlertCircle" class="w-6 h-6 me-4" /> {{ $message }}</div> @enderror
                        </div>

                        <div class="pt-12 border-t border-slate-100 dark:border-darkmode-400">
                            <div class="flex flex-col sm:flex-row items-center mb-10">
                                <div class="me-auto">
                                    <h4 class="text-xl font-black text-slate-700 dark:text-slate-300 tracking-tight">{{ __('global.direct_permissions') }}</h4>
                                    <p class="text-slate-400 font-bold text-xs mt-1 uppercase tracking-widest">{{ __('global.direct_permissions_description') }}</p>
                                </div>
                                <div class="flex gap-3 mt-6 sm:mt-0 bg-slate-50 dark:bg-darkmode-700 p-2 rounded-2xl border border-slate-100 dark:border-darkmode-400">
                                    <x-base.button type="button" variant="soft-primary" size="sm" class="rounded-xl font-black px-6 py-2.5 text-[10px] uppercase tracking-widest shadow-sm" id="selectAllPermissions">
                                        <x-base.lucide icon="CheckSquare" class="w-4 h-4 me-2" />
                                        {{ __('global.select_all') }}
                                    </x-base.button>
                                    <x-base.button type="button" variant="soft-secondary" size="sm" class="rounded-xl font-black px-6 py-2.5 text-[10px] uppercase tracking-widest shadow-sm" id="deselectAllPermissions">
                                        <x-base.lucide icon="Square" class="w-4 h-4 me-2" />
                                        {{ __('global.deselect_all') }}
                                    </x-base.button>
                                </div>
                            </div>

                            <div class="permission-container grid grid-cols-12 gap-8 bg-slate-50 dark:bg-darkmode-800/30 p-10 lg:p-12 rounded-[3rem] border border-slate-100 dark:border-darkmode-400 shadow-inner" style="max-height: 500px; overflow-y: auto;">
                                @foreach($groupedPermissions as $group => $groupPerms)
                                <div class="col-span-12 md:col-span-6 xl:col-span-4">
                                    <div class="permission-group-card bg-white dark:bg-darkmode-600 rounded-[2rem] border border-slate-200 dark:border-darkmode-400 shadow-sm overflow-hidden h-full flex flex-col">
                                        <div class="p-6 border-b border-slate-100 dark:border-darkmode-400 flex items-center bg-slate-50/50 dark:bg-darkmode-700/50">
                                            <h5 class="font-black text-slate-700 dark:text-slate-200 capitalize tracking-tight flex items-center text-lg">
                                                <div class="w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center me-4">
                                                    <x-base.lucide icon="Folder" class="w-5 h-5" />
                                                </div>
                                                {{ str_replace('_', ' ', $group) }}
                                            </h5>
                                            <div class="ms-auto">
                                                <x-base.form-check.input type="checkbox" class="group-select-permission form-check-input scale-125" data-group="{{ $group }}" />
                                            </div>
                                        </div>
                                        <div class="p-6 space-y-4 flex-1">
                                            @foreach($groupPerms as $permission)
                                            <div class="flex items-center p-4 rounded-2xl hover:bg-primary/5 dark:hover:bg-darkmode-500 transition-all duration-300 group cursor-pointer border border-transparent hover:border-primary/10" onclick="this.querySelector('input').click()">
                                                <div onclick="event.stopPropagation()">
                                                    <x-base.form-input type="checkbox" id="permission_{{ $permission->id }}" name="permissions[]" value="{{ $permission->id }}" class="form-check-input permission-checkbox w-7 h-7 border-slate-300 rounded-xl" data-group="{{ $group }}" {{ (old('permissions') && in_array($permission->id, old('permissions'))) ? 'checked' : '' }} />
                                                </div>
                                                <x-base.form-label for="permission_{{ $permission->id }}" class="ms-4 text-xs font-black text-slate-500 dark:text-slate-400 cursor-pointer group-hover:text-primary transition-colors tracking-wide leading-tight mb-0 uppercase">
                                                    {{ ucwords(str_replace(['_', $group], [' ', ''], $permission->name)) }}
                                                </x-base.form-label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sticky Action Bar -->
                <div class="p-10 bg-slate-50 dark:bg-darkmode-700 border-t border-slate-100 dark:border-darkmode-400 flex flex-col sm:flex-row justify-end gap-6">
                    <x-base.button type="button" variant="outline-secondary" as="a" href="{{ route('users.index') }}" class="px-10 py-5 rounded-[1.5rem] text-base font-black border-0 bg-white dark:bg-darkmode-600 shadow-sm hover:shadow-md transition-all">
                        <x-base.lucide icon="X" class="w-5 h-5 me-2 opacity-50" />
                        {{ __('global.cancel') }}
                    </x-base.button>
                    <x-base.button type="submit" variant="primary" class="px-16 py-5 rounded-[1.5rem] shadow-2xl shadow-primary/30 text-base font-black tracking-widest transform transition-all hover:scale-[1.02] active:scale-[0.98]">
                        <x-base.lucide icon="Save" class="w-5 h-5 me-3" />
                        {{ __('global.save_user') }}
                    </x-base.button>
                </div>
            </div>
        </form>
    </div>

    @vite(['resources/js/pages/users.js'])
    <style>
        /* Toggle Switch Styles */
        .toggle-checkbox {
            top: 0;
            left: 0;
            z-index: 10;
        }
        .toggle-checkbox:checked + .toggle-label {
            background-color: rgb(var(--color-success) / 0.3);
        }
        .toggle-checkbox:checked {
            border-color: rgb(var(--color-success));
            background-color: rgb(var(--color-success));
        }
        /* Warning state for email_verified */
        #email_verified.toggle-checkbox:checked {
            border-color: rgb(var(--color-warning));
            background-color: rgb(var(--color-warning));
        }
        #email_verified.toggle-checkbox:checked + .toggle-label {
            background-color: rgb(var(--color-warning) / 0.3);
        }
    </style>
    <script>
        function toggleCheckbox(checkboxId) {
            const checkbox = document.getElementById(checkboxId);
            if (checkbox && event.target.tagName !== 'INPUT') {
                checkbox.checked = !checkbox.checked;
            }
        }
    </script>
@endsection
