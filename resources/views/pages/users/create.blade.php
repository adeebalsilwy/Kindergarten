@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('User.add_new') }} - Laravel</title>
    @vite(['resources/css/pages/users.css'])
@endsection

@section('subcontent')
    <!-- Header -->
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-2xl font-black text-slate-800 dark:text-slate-200 me-auto">
            <span class="text-primary">{{ __('User.add_new') }}</span>
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0 gap-3">
            <x-base.button variant="outline-secondary" as="a" href="{{ route('users.index') }}" class="flex items-center px-4 py-2.5 rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
                {{ __('global.back_to_list') }}
            </x-base.button>
            <x-base.button variant="soft-primary" onclick="fillDemoData()" class="flex items-center px-4 py-2.5 rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                <x-base.lucide icon="Zap" class="w-4 h-4 me-2" />
                {{ __('global.demo_data') }}
            </x-base.button>
        </div>
    </div>

    <!-- Main Content -->
    <div class="mt-8">
        <form action="{{ route('users.store') }}" method="POST" id="userForm" enctype="multipart/form-data">
            @csrf
            
            <div class="intro-y box p-0 mb-8 overflow-hidden rounded-[2rem] shadow-2xl border-0">
                <!-- Tab Navigation -->
                <div class="tabs-navigation">
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

                <div class="p-10">
                    <!-- Basic Information Tab -->
                    <div id="basic" class="tab-content active">
                        <div class="flex items-center mb-10 pb-6 border-b border-slate-100 dark:border-darkmode-400">
                            <div class="w-16 h-16 rounded-[1.5rem] bg-primary/5 flex items-center justify-center text-primary shadow-inner me-6">
                                <x-base.lucide icon="User" class="w-8 h-8" />
                            </div>
                            <div>
                                <h3 class="text-2xl font-black text-slate-800 dark:text-slate-200 tracking-tight">{{ __('global.basic_information') }}</h3>
                                <p class="text-slate-400 font-bold text-sm mt-1 uppercase tracking-widest">{{ __('global.basic_info_description') }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-12 gap-x-10 gap-y-8">
                            <div class="col-span-12 md:col-span-6">
                                <x-base.form-label class="font-black text-slate-700 dark:text-slate-300 mb-3 block" required>{{ __('users.fields.name') }}</x-base.form-label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 start-0 ps-5 flex items-center text-slate-400 group-focus-within:text-primary transition-colors">
                                        <x-base.lucide icon="User" class="w-5 h-5" />
                                    </div>
                                    <x-base.form-input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="{{ __('users.placeholders.name') }}" class="ps-14 py-4 rounded-2xl border-slate-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-base font-bold" />
                                </div>
                                @error('name') <div class="text-danger mt-3 text-xs font-black flex items-center"><x-base.lucide icon="AlertCircle" class="w-4 h-4 me-2" /> {{ $message }}</div> @enderror
                            </div>
                            
                            <div class="col-span-12 md:col-span-6">
                                <x-base.form-label class="font-black text-slate-700 dark:text-slate-300 mb-3 block" required>{{ __('users.fields.email') }}</x-base.form-label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 start-0 ps-5 flex items-center text-slate-400 group-focus-within:text-primary transition-colors">
                                        <x-base.lucide icon="Mail" class="w-5 h-5" />
                                    </div>
                                    <x-base.form-input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="{{ __('users.placeholders.email') }}" class="ps-14 py-4 rounded-2xl border-slate-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-base font-bold" />
                                </div>
                                @error('email') <div class="text-danger mt-3 text-xs font-black flex items-center"><x-base.lucide icon="AlertCircle" class="w-4 h-4 me-2" /> {{ $message }}</div> @enderror
                            </div>
                            
                            <div class="col-span-12 md:col-span-6">
                                <x-base.form-label class="font-black text-slate-700 dark:text-slate-300 mb-3 block">{{ __('users.fields.phone') }}</x-base.form-label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 start-0 ps-5 flex items-center text-slate-400 group-focus-within:text-primary transition-colors">
                                        <x-base.lucide icon="Phone" class="w-5 h-5" />
                                    </div>
                                    <x-base.form-input type="tel" name="phone" id="phone" value="{{ old('phone') }}" placeholder="{{ __('users.placeholders.phone') }}" class="ps-14 py-4 rounded-2xl border-slate-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-base font-bold" />
                                </div>
                                @error('phone') <div class="text-danger mt-3 text-xs font-black flex items-center"><x-base.lucide icon="AlertCircle" class="w-4 h-4 me-2" /> {{ $message }}</div> @enderror
                            </div>
                            
                            <div class="col-span-12 md:col-span-6">
                                <x-base.form-label class="font-black text-slate-700 dark:text-slate-300 mb-3 block">{{ __('users.fields.department') }}</x-base.form-label>
                                <div class="relative group">
                                    <x-base.tom-select name="department" id="department" class="w-full">
                                        <option value="">{{ __('global.select_department') }}</option>
                                        <option value="administration">{{ __('users.fields.departments.administration') }}</option>
                                        <option value="teaching">{{ __('users.fields.departments.teaching') }}</option>
                                        <option value="finance">{{ __('users.fields.departments.finance') }}</option>
                                        <option value="support">{{ __('users.fields.departments.support') }}</option>
                                    </x-base.tom-select>
                                </div>
                            </div>

                            <div class="col-span-12">
                                <div class="p-8 bg-slate-50 dark:bg-darkmode-600 rounded-[2rem] border border-slate-100 dark:border-darkmode-400 shadow-inner group hover:bg-primary/5 transition-colors duration-500">
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 rounded-xl bg-white dark:bg-darkmode-700 flex items-center justify-center text-success shadow-sm me-5 group-hover:scale-110 transition-transform">
                                            <x-base.lucide icon="CheckCircle" class="w-6 h-6" />
                                        </div>
                                        <x-base.form-label for="is_active" class="font-black mb-0 cursor-pointer text-slate-700 dark:text-slate-300 text-lg">{{ __('global.account_active') }}</x-base.form-label>
                                        <div class="ms-auto">
                                            <div class="form-check form-switch scale-150">
                                                <x-base.form-input type="checkbox" id="is_active" name="is_active" value="1" class="form-check-input w-12 h-6" checked />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Security Tab -->
                    <div id="security" class="tab-content">
                        <div class="flex items-center mb-10 pb-6 border-b border-slate-100 dark:border-darkmode-400">
                            <div class="w-16 h-16 rounded-[1.5rem] bg-info/5 flex items-center justify-center text-info shadow-inner me-6">
                                <x-base.lucide icon="Shield" class="w-8 h-8" />
                            </div>
                            <div>
                                <h3 class="text-2xl font-black text-slate-800 dark:text-slate-200 tracking-tight">{{ __('global.security_settings') }}</h3>
                                <p class="text-slate-400 font-bold text-sm mt-1 uppercase tracking-widest">{{ __('global.security_description') }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-12 gap-x-10 gap-y-8">
                            <div class="col-span-12 md:col-span-6">
                                <x-base.form-label class="font-black text-slate-700 dark:text-slate-300 mb-3 block" required>{{ __('users.fields.password') }}</x-base.form-label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 start-0 ps-5 flex items-center text-slate-400 group-focus-within:text-primary transition-colors">
                                        <x-base.lucide icon="Lock" class="w-5 h-5" />
                                    </div>
                                    <x-base.form-input type="password" name="password" id="password" placeholder="{{ __('users.placeholders.password') }}" autocomplete="new-password" class="ps-14 py-4 rounded-2xl border-slate-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-base font-bold" />
                                    <button type="button" onclick="togglePassword('password')" class="absolute inset-y-0 end-0 pe-5 flex items-center text-slate-400 hover:text-primary transition-colors">
                                        <x-base.lucide icon="Eye" class="w-5 h-5" />
                                    </button>
                                </div>
                                <div class="mt-5 flex items-center gap-3">
                                    <x-base.button type="button" variant="soft-primary" onclick="generatePassword()" class="text-[10px] font-black py-2.5 px-6 rounded-xl uppercase tracking-widest flex items-center">
                                        <x-base.lucide icon="Zap" class="w-4 h-4 me-2" />
                                        {{ __('global.generate_password') }}
                                    </x-base.button>
                                    <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest flex items-center">
                                        <x-base.lucide icon="Info" class="w-3.5 h-3.5 me-1.5" />
                                        {{ __('global.secure_password_hint') }}
                                    </div>
                                </div>
                                @error('password') <div class="text-danger mt-3 text-xs font-black flex items-center"><x-base.lucide icon="AlertCircle" class="w-4 h-4 me-2" /> {{ $message }}</div> @enderror
                            </div>
                            
                            <div class="col-span-12 md:col-span-6">
                                <x-base.form-label class="font-black text-slate-700 dark:text-slate-300 mb-3 block" required>{{ __('users.fields.password_confirmation') }}</x-base.form-label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 start-0 ps-5 flex items-center text-slate-400 group-focus-within:text-primary transition-colors">
                                        <x-base.lucide icon="Lock" class="w-5 h-5" />
                                    </div>
                                    <x-base.form-input type="password" name="password_confirmation" id="password_confirmation" placeholder="{{ __('users.placeholders.password_confirmation') }}" autocomplete="new-password" class="ps-14 py-4 rounded-2xl border-slate-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-base font-bold" />
                                </div>
                            </div>
                            
                            <div class="col-span-12 mt-4">
                                <div class="p-8 bg-gradient-to-br from-primary/5 to-transparent rounded-[2rem] border border-primary/10 shadow-inner flex flex-col md:flex-row items-center gap-8 hover:from-primary/10 transition-all duration-500 group">
                                    <div class="form-check form-switch transform scale-150">
                                        <x-base.form-input type="checkbox" id="send_welcome_email" name="send_welcome_email" value="1" class="form-check-input w-12 h-6" />
                                    </div>
                                    <div class="text-center md:text-start">
                                        <x-base.form-label for="send_welcome_email" class="font-black text-xl text-primary mb-2 cursor-pointer block tracking-tight group-hover:translate-x-1 transition-transform">{{ __('users.fields.send_welcome_email') }}</x-base.form-label>
                                        <div class="text-slate-500 text-sm font-bold leading-relaxed max-w-2xl">{{ __('users.fields.send_welcome_email_help') }}</div>
                                    </div>
                                    <div class="ms-auto hidden lg:block opacity-20 group-hover:opacity-40 transition-opacity">
                                        <x-base.lucide icon="Mail" class="w-20 h-20 text-primary" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Roles & Permissions Tab -->
                    <div id="roles" class="tab-content">
                        <div class="flex items-center mb-10 pb-6 border-b border-slate-100 dark:border-darkmode-400">
                            <div class="w-16 h-16 rounded-[1.5rem] bg-warning/5 flex items-center justify-center text-warning shadow-inner me-6">
                                <x-base.lucide icon="ShieldCheck" class="w-8 h-8" />
                            </div>
                            <div>
                                <h3 class="text-2xl font-black text-slate-800 dark:text-slate-200 tracking-tight">{{ __('global.access_control') }}</h3>
                                <p class="text-slate-400 font-bold text-sm mt-1 uppercase tracking-widest">{{ __('global.access_control_description') }}</p>
                            </div>
                        </div>

                        <div class="mb-12">
                            <div class="flex items-center mb-10">
                                <h4 class="text-xl font-black text-slate-700 dark:text-slate-300 tracking-tight">{{ __('global.user_roles') }}</h4>
                                <div class="ms-6 h-px flex-1 bg-slate-100 dark:bg-darkmode-400"></div>
                                <span class="ms-6 px-5 py-2 bg-slate-50 dark:bg-darkmode-600 text-slate-400 text-[10px] rounded-full font-black uppercase tracking-[0.2em] border border-slate-100 dark:border-darkmode-400 shadow-sm">{{ __('global.select_roles') }}</span>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                                @foreach(Spatie\Permission\Models\Role::all() as $role)
                                <div class="role-card group p-6 rounded-[2rem] border-2 border-slate-100 dark:border-darkmode-400 bg-slate-50/50 dark:bg-darkmode-600/50 hover:border-primary/30 hover:bg-white dark:hover:bg-darkmode-700 transition-all duration-300 cursor-pointer relative overflow-hidden" onclick="this.querySelector('input').click()">
                                    <div class="flex items-start relative z-10">
                                        <div class="form-check" onclick="event.stopPropagation()">
                                            <x-base.form-input type="checkbox" id="role_{{ $role->id }}" name="roles[]" value="{{ $role->id }}" class="form-check-input w-8 h-8 border-slate-300 rounded-xl" {{ old('roles') && in_array($role->id, old('roles')) ? 'checked' : '' }} />
                                        </div>
                                        <div class="ms-5">
                                            <x-base.form-label for="role_{{ $role->id }}" class="font-black text-xl text-slate-800 dark:text-slate-200 block mb-2 cursor-pointer group-hover:text-primary transition-colors tracking-tight">
                                                {{ $role->name }}
                                            </x-base.form-label>
                                            <div class="flex items-center gap-5 text-slate-400 text-[10px] font-black uppercase tracking-widest">
                                                <div class="flex items-center group-hover:text-primary/70 transition-colors">
                                                    <x-base.lucide icon="Key" class="w-4 h-4 me-1.5" />
                                                    {{ $role->permissions->count() }}
                                                </div>
                                                <div class="flex items-center group-hover:text-info/70 transition-colors">
                                                    <x-base.lucide icon="Users" class="w-4 h-4 me-1.5" />
                                                    {{ $role->users->count() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <x-base.lucide icon="Shield" class="absolute -bottom-10 -right-10 w-32 h-32 text-slate-100 dark:text-darkmode-800 group-hover:text-primary/5 transition-colors" />
                                </div>
                                @endforeach
                            </div>
                            @error('roles') <div class="text-danger mt-8 text-sm font-black p-6 bg-danger/5 rounded-3xl border border-danger/10 flex items-center shadow-sm"><x-base.lucide icon="AlertCircle" class="w-6 h-6 me-4" /> {{ $message }}</div> @enderror
                        </div>
                        
                        <div class="pt-12 border-t border-slate-100 dark:border-darkmode-400">
                            <div class="flex items-center mb-10">
                                <h4 class="text-xl font-black text-slate-700 dark:text-slate-300 tracking-tight">{{ __('global.direct_permissions') }}</h4>
                                <div class="ms-6 h-px flex-1 bg-slate-100 dark:bg-darkmode-400"></div>
                                <span class="ms-6 px-5 py-2 bg-info/5 text-info text-[10px] rounded-full font-black uppercase tracking-[0.2em] border border-info/10 shadow-sm">{{ __('global.optional') }}</span>
                            </div>
                            
                            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 bg-slate-50 dark:bg-darkmode-800/30 p-10 rounded-[2.5rem] border border-slate-100 dark:border-darkmode-400 shadow-inner">
                                @foreach(Spatie\Permission\Models\Permission::all()->take(24) as $permission)
                                <div class="form-check items-center hover:bg-white dark:hover:bg-darkmode-600 p-4 rounded-2xl transition-all duration-300 cursor-pointer group shadow-sm hover:shadow-lg border border-transparent hover:border-slate-100" onclick="this.querySelector('input').click()">
                                    <div onclick="event.stopPropagation()">
                                        <x-base.form-input type="checkbox" id="permission_{{ $permission->id }}" name="permissions[]" value="{{ $permission->id }}" class="form-check-input w-6 h-6 border-slate-300 rounded-lg" {{ old('permissions') && in_array($permission->id, old('permissions')) ? 'checked' : '' }} />
                                    </div>
                                    <x-base.form-label for="permission_{{ $permission->id }}" class="ms-4 text-[11px] font-black text-slate-500 dark:text-slate-400 cursor-pointer group-hover:text-primary transition-colors uppercase tracking-widest leading-tight">
                                        {{ str_replace('_', ' ', $permission->name) }}
                                    </x-base.form-label>
                                </div>
                                @endforeach
                            </div>
                            
                            <div class="mt-8 text-center">
                                <p class="text-slate-400 text-[10px] font-bold uppercase tracking-[0.3em]">{{ __('global.more_permissions_hint') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sticky Action Bar -->
                <div class="p-8 bg-slate-50 dark:bg-darkmode-600 border-t border-slate-100 dark:border-darkmode-400 flex justify-end gap-4">
                    <x-base.button type="button" variant="outline-secondary" as="a" href="{{ route('users.index') }}" class="px-8 py-4 rounded-2xl text-base font-bold border-2 hover:bg-slate-100">
                        {{ __('global.cancel') }}
                    </x-base.button>
                    <x-base.button type="submit" variant="primary" class="px-12 py-4 rounded-2xl shadow-xl shadow-primary/30 text-base font-black tracking-wide transform transition-all hover:scale-[1.02] active:scale-[0.98]">
                        <x-base.lucide icon="Save" class="w-5 h-5 me-2" />
                        {{ __('global.save_user') }}
                    </x-base.button>
                </div>
            </div>
        </form>
    </div>

    @vite(['resources/js/pages/users.js'])
@endsection
