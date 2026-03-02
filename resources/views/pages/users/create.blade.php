@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('User.add_new') }} - Laravel</title>
@endsection

@section('subcontent')
    <!-- Header -->
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('User.add_new') }}</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <x-base.button variant="outline-secondary" as="a" href="{{ route('users.index') }}" class="flex items-center me-2">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
                {{ __('global.back_to_list') }}
            </x-base.button>
            <x-base.button variant="outline-primary" onclick="fillDemoData()" class="flex items-center">
                <x-base.lucide icon="Zap" class="w-4 h-4 me-2" />
                {{ __('global.demo_data') }}
            </x-base.button>
        </div>
    </div>

    <!-- Form -->
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12">
            <!-- Tabs -->
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base me-auto">{{ __('global.user_information') }}</h2>
                    <div class="form-check form-switch w-full sm:w-auto sm:ms-auto mt-3 sm:mt-0">
                        <x-base.form-input type="checkbox" id="is_active" name="is_active" value="1" class="form-check-input" checked />
                        <x-base.form-label for="is_active" class="ms-3">{{ __('global.active') }}</x-base.form-label>
                    </div>
                </div>
                
                <div class="p-5">
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md">
                        <!-- Tab Navigation -->
                        <div class="flex flex-col sm:flex-row">
                            <div class="flex-1 border-e border-slate-200/60 dark:border-darkmode-400 border-t sm:border-t-0 border-b sm:border-b-0">
                                <div id="basic-tab" class="cursor-pointer font-medium p-5 text-center border-b sm:border-b-0 border-slate-200/60 dark:border-darkmode-400 transition duration-300 ease-in-out bg-slate-100 dark:bg-darkmode-400 dark:text-slate-300" data-tw-toggle="pill" data-tw-target="#basic" role="tab" aria-controls="basic" aria-selected="true">
                                    <x-base.lucide icon="User" class="w-4 h-4 me-2 inline" />
                                    {{ __('global.basic_info') }}
                                </div>
                            </div>
                            <div class="flex-1 border-e border-slate-200/60 dark:border-darkmode-400 border-t sm:border-t-0 border-b sm:border-b-0">
                                <div id="security-tab" class="cursor-pointer font-medium p-5 text-center border-b sm:border-b-0 border-slate-200/60 dark:border-darkmode-400 transition duration-300 ease-in-out" data-tw-toggle="pill" data-tw-target="#security" role="tab" aria-controls="security" aria-selected="false">
                                    <x-base.lucide icon="Shield" class="w-4 h-4 me-2 inline" />
                                    {{ __('global.security') }}
                                </div>
                            </div>
                            <div class="flex-1 border-t sm:border-t-0 border-b sm:border-b-0">
                                <div id="roles-tab" class="cursor-pointer font-medium p-5 text-center border-b sm:border-b-0 border-slate-200/60 dark:border-darkmode-400 transition duration-300 ease-in-out" data-tw-toggle="pill" data-tw-target="#roles" role="tab" aria-controls="roles" aria-selected="false">
                                    <x-base.lucide icon="ShieldCheck" class="w-4 h-4 me-2 inline" />
                                    {{ __('global.roles_permissions') }}
                                </div>
                            </div>
                        </div>
                        
                        <form action="{{ route('users.store') }}" method="POST" id="userForm">
                            @csrf
                            
                            <!-- Tab Content -->
                            <div class="tab-content border-l border-r border-b">
                                <!-- Basic Information Tab -->
                                <div id="basic" class="tab-pane leading-relaxed p-5 active" role="tabpanel" aria-labelledby="basic-tab">
                                    <div class="grid grid-cols-12 gap-4">
                                        <div class="col-span-12 sm:col-span-6">
                                            <x-base.form-label required>{{ __('users.fields.name') }}</x-base.form-label>
                                            <div class="relative mt-2">
                                                <x-base.form-input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="{{ __('users.placeholders.name') }}" />
                                                <div class="absolute inset-y-0 right-0 pe-3 flex items-center pointer-events-none">
                                                    <x-base.lucide icon="User" class="h-5 w-5 text-gray-400" />
                                                </div>
                                            </div>
                                            @error('name')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-span-12 sm:col-span-6">
                                            <x-base.form-label required>{{ __('users.fields.email') }}</x-base.form-label>
                                            <div class="relative mt-2">
                                                <x-base.form-input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="{{ __('users.placeholders.email') }}" />
                                                <div class="absolute inset-y-0 right-0 pe-3 flex items-center pointer-events-none">
                                                    <x-base.lucide icon="Mail" class="h-5 w-5 text-gray-400" />
                                                </div>
                                            </div>
                                            @error('email')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-span-12 sm:col-span-6">
                                            <x-base.form-label>{{ __('users.fields.phone') }}</x-base.form-label>
                                            <div class="relative mt-2">
                                                <x-base.form-input type="tel" name="phone" id="phone" value="{{ old('phone') }}" placeholder="{{ __('users.placeholders.phone') }}" />
                                                <div class="absolute inset-y-0 right-0 pe-3 flex items-center pointer-events-none">
                                                    <x-base.lucide icon="Phone" class="h-5 w-5 text-gray-400" />
                                                </div>
                                            </div>
                                            @error('phone')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-span-12 sm:col-span-6">
                                            <x-base.form-label>{{ __('users.fields.department') }}</x-base.form-label>
                                            <x-base.tom-select name="department" id="department" class="w-full">
                                                <option value="">{{ __('global.select_department') }}</option>
                                                <option value="administration" {{ old('department') == 'administration' ? 'selected' : '' }}>{{ __('users.departments.administration') }}</option>
                                                <option value="teaching" {{ old('department') == 'teaching' ? 'selected' : '' }}>{{ __('users.departments.teaching') }}</option>
                                                <option value="finance" {{ old('department') == 'finance' ? 'selected' : '' }}>{{ __('users.departments.finance') }}</option>
                                                <option value="support" {{ old('department') == 'support' ? 'selected' : '' }}>{{ __('users.departments.support') }}</option>
                                            </x-base.tom-select>
                                            @error('department')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Security Tab -->
                                <div id="security" class="tab-pane leading-relaxed p-5" role="tabpanel" aria-labelledby="security-tab">
                                    <div class="grid grid-cols-12 gap-4">
                                        <div class="col-span-12 sm:col-span-6">
                                            <x-base.form-label required>{{ __('users.fields.password') }}</x-base.form-label>
                                            <div class="relative mt-2">
                                                <x-base.form-input type="password" name="password" id="password" placeholder="{{ __('users.placeholders.password') }}" />
                                                <div class="absolute inset-y-0 right-0 pe-3 flex items-center pointer-events-none">
                                                    <x-base.lucide icon="Lock" class="h-5 w-5 text-gray-400" />
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <x-base.button type="button" variant="outline-secondary" onclick="generatePassword()" class="text-xs">
                                                    <x-base.lucide icon="Zap" class="w-3 h-3 me-1" />
                                                    {{ __('global.generate_password') }}
                                                </x-base.button>
                                            </div>
                                            @error('password')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-span-12 sm:col-span-6">
                                            <x-base.form-label required>{{ __('users.fields.password_confirmation') }}</x-base.form-label>
                                            <div class="relative mt-2">
                                                <x-base.form-input type="password" name="password_confirmation" id="password_confirmation" placeholder="{{ __('users.placeholders.password_confirmation') }}" />
                                                <div class="absolute inset-y-0 right-0 pe-3 flex items-center pointer-events-none">
                                                    <x-base.lucide icon="Lock" class="h-5 w-5 text-gray-400" />
                                                </div>
                                            </div>
                                            @error('password_confirmation')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-span-12">
                                            <div class="form-check">
                                                <x-base.form-input type="checkbox" id="send_welcome_email" name="send_welcome_email" value="1" class="form-check-input" />
                                                <x-base.form-label for="send_welcome_email" class="ms-2">{{ __('users.fields.send_welcome_email') }}</x-base.form-label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Roles & Permissions Tab -->
                                <div id="roles" class="tab-pane leading-relaxed p-5" role="tabpanel" aria-labelledby="roles-tab">
                                    <div class="mb-6">
                                        <h3 class="text-lg font-medium mb-4">{{ __('global.assign_roles') }}</h3>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            @foreach(Spatie\Permission\Models\Role::all() as $role)
                                            <div class="form-check">
                                                <x-base.form-input type="checkbox" id="role_{{ $role->id }}" name="roles[]" value="{{ $role->id }}" class="form-check-input" {{ old('roles') && in_array($role->id, old('roles')) ? 'checked' : '' }} />
                                                <x-base.form-label for="role_{{ $role->id }}" class="ms-2 font-medium">
                                                    {{ $role->name }}
                                                    @if($role->name == 'Administrator')
                                                        <span class="text-warning text-xs ms-1">
                                                            <x-base.lucide icon="Crown" class="w-3 h-3 inline" />
                                                            {{ __('global.admin_role') }}
                                                        </span>
                                                    @endif
                                                </x-base.form-label>
                                                <p class="text-sm text-slate-500 ms-6 mt-1">{{ $role->permissions->count() }} {{ __('global.permissions') }}</p>
                                            </div>
                                            @endforeach
                                        </div>
                                        @error('roles')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="border-t border-slate-200/60 dark:border-darkmode-400 pt-6">
                                        <h3 class="text-lg font-medium mb-4">{{ __('global.additional_permissions') }}</h3>
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                                            @foreach(Spatie\Permission\Models\Permission::all()->take(12) as $permission)
                                            <div class="form-check">
                                                <x-base.form-input type="checkbox" id="permission_{{ $permission->id }}" name="permissions[]" value="{{ $permission->id }}" class="form-check-input" {{ old('permissions') && in_array($permission->id, old('permissions')) ? 'checked' : '' }} />
                                                <x-base.form-label for="permission_{{ $permission->id }}" class="ms-2 text-sm">
                                                    {{ str_replace('_', ' ', $permission->name) }}
                                                </x-base.form-label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Form Actions -->
                            <div class="flex justify-end gap-3 p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                                <x-base.button variant="outline-secondary" as="a" href="{{ route('users.index') }}" class="w-24">
                                    {{ __('global.cancel') }}
                                </x-base.button>
                                <x-base.button type="submit" variant="primary" class="w-24">
                                    {{ __('global.save') }}
                                </x-base.button>
                            </div>
                        </form>
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
            
            // Initialize Tom Select
            if (typeof TomSelect !== 'undefined') {
                new TomSelect('#department', {
                    plugins: ['dropdown_input'],
                    allowEmptyOption: true
                });
            }
        });
        
        // Generate password function
        function generatePassword() {
            const length = 12;
            const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*";
            let password = "";
            for (let i = 0, n = charset.length; i < length; ++i) {
                password += charset.charAt(Math.floor(Math.random() * n));
            }
            document.getElementById('password').value = password;
            document.getElementById('password_confirmation').value = password;
        }
        
        // Fill demo data function
        function fillDemoData() {
            document.getElementById('name').value = 'John Doe';
            document.getElementById('email').value = 'john.doe@example.com';
            document.getElementById('phone').value = '+1234567890';
            document.getElementById('department').value = 'administration';
            generatePassword();
            
            // Show success message
            alert('{{ __('global.demo_data_filled') }}');
        }
        
        // Form validation
        document.getElementById('userForm').addEventListener('submit', function(e) {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            const passwordConfirmation = document.getElementById('password_confirmation').value;
            
            if (!name || !email || !password || !passwordConfirmation) {
                e.preventDefault();
                alert('{{ __('global.please_fill_required_fields') }}');
                return;
            }
            
            if (password !== passwordConfirmation) {
                e.preventDefault();
                alert('{{ __('global.passwords_do_not_match') }}');
                return;
            }
            
            if (password.length < 8) {
                e.preventDefault();
                alert('{{ __('global.password_min_length') }}');
                return;
            }
        });
    </script>
@endsection
