@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('User.edit') }} - Laravel</title>
@endsection

@section('subcontent')
    <!-- Header -->
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('User.edit') }} - {{ $user->name }}</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <x-base.button variant="outline-secondary" as="a" href="{{ route('users.show', $user->id) }}" class="flex items-center me-2">
                <x-base.lucide icon="Eye" class="w-4 h-4 me-2" />
                {{ __('global.view_details') }}
            </x-base.button>
            <x-base.button variant="outline-secondary" as="a" href="{{ route('users.index') }}" class="flex items-center">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
                {{ __('global.back_to_list') }}
            </x-base.button>
        </div>
    </div>

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger show mb-5">
            <div class="flex items-center">
                <x-base.lucide icon="AlertCircle" class="w-6 h-6 me-2" />
                <div>
                    <div class="font-medium">{{ __('global.validation_errors') }}</div>
                    <div class="text-slate-500 mt-1">
                        <ul class="mt-1 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Form -->
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12">
            <!-- Tabs -->
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base me-auto">{{ __('global.user_information') }}</h2>
                    <div class="form-check form-switch w-full sm:w-auto sm:ms-auto mt-3 sm:mt-0">
                        <x-base.form-input type="checkbox" id="is_active" name="is_active" value="1" class="form-check-input" {{ old('is_active', $user->is_active) ? 'checked' : '' }} />
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
                        
                        <form action="{{ route('users.update', $user->id) }}" method="POST" id="userForm">
                            @csrf
                            @method('PUT')
                            
                            <!-- Tab Content -->
                            <div class="tab-content border-l border-r border-b">
                                <!-- Basic Information Tab -->
                                <div id="basic" class="tab-pane leading-relaxed p-5 active" role="tabpanel" aria-labelledby="basic-tab">
                                    <div class="grid grid-cols-12 gap-4">
                                        <div class="col-span-12 sm:col-span-6">
                                            <x-base.form-label required>{{ __('users.fields.name') }}</x-base.form-label>
                                            <div class="relative mt-2">
                                                <x-base.form-input type="text" name="name" id="name" value="{{ old('name', $user->name ?? '') }}" placeholder="{{ __('users.placeholders.name') }}" />
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
                                                <x-base.form-input type="email" name="email" id="email" value="{{ old('email', $user->email ?? '') }}" placeholder="{{ __('users.placeholders.email') }}" />
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
                                                <x-base.form-input type="tel" name="phone" id="phone" value="{{ old('phone', $user->phone ?? '') }}" placeholder="{{ __('users.placeholders.phone') }}" />
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
                                                <option value="administration" {{ old('department', $user->department ?? '') == 'administration' ? 'selected' : '' }}>{{ __('users.departments.administration') }}</option>
                                                <option value="teaching" {{ old('department', $user->department ?? '') == 'teaching' ? 'selected' : '' }}>{{ __('users.departments.teaching') }}</option>
                                                <option value="finance" {{ old('department', $user->department ?? '') == 'finance' ? 'selected' : '' }}>{{ __('users.departments.finance') }}</option>
                                                <option value="support" {{ old('department', $user->department ?? '') == 'support' ? 'selected' : '' }}>{{ __('users.departments.support') }}</option>
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
                                            <x-base.form-label>{{ __('users.fields.password') }}</x-base.form-label>
                                            <div class="relative mt-2">
                                                <x-base.form-input type="password" name="password" id="password" placeholder="{{ __('users.placeholders.password') }}" />
                                                <div class="absolute inset-y-0 right-0 pe-3 flex items-center pointer-events-none">
                                                    <x-base.lucide icon="Lock" class="h-5 w-5 text-gray-400" />
                                                </div>
                                            </div>
                                            <div class="mt-2 text-sm text-slate-500">
                                                {{ __('users.help.password_update') }}
                                            </div>
                                            @error('password')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-span-12 sm:col-span-6">
                                            <x-base.form-label>{{ __('users.fields.password_confirmation') }}</x-base.form-label>
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
                                                <x-base.form-input type="checkbox" id="send_notification" name="send_notification" value="1" class="form-check-input" />
                                                <x-base.form-label for="send_notification" class="ms-2">{{ __('users.fields.send_notification') }}</x-base.form-label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Roles & Permissions Tab -->
                                <div id="roles" class="tab-pane leading-relaxed p-5" role="tabpanel" aria-labelledby="roles-tab">
                                    <div class="mb-6">
                                        <h3 class="text-lg font-medium mb-4">{{ __('global.current_roles') }}</h3>
                                        <div class="bg-slate-100 dark:bg-darkmode-600 rounded-lg p-4 mb-4">
                                            @if($user->roles->count() > 0)
                                                <div class="flex flex-wrap gap-2">
                                                    @foreach($user->roles as $role)
                                                        <span class="px-3 py-1 rounded-full {{ $role->name == 'Administrator' ? 'bg-yellow-100 text-yellow-800' : 'bg-primary/10 text-primary' }} text-sm font-medium">
                                                            {{ $role->name }}
                                                            @if($role->name == 'Administrator')
                                                                <x-base.lucide icon="Crown" class="w-3 h-3 ms-1 inline" />
                                                            @endif
                                                        </span>
                                                    @endforeach
                                                </div>
                                            @else
                                                <p class="text-slate-500">{{ __('global.no_roles_assigned') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="mb-6">
                                        <h3 class="text-lg font-medium mb-4">{{ __('global.assign_roles') }}</h3>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            @foreach(Spatie\Permission\Models\Role::all() as $role)
                                            <div class="form-check">
                                                <x-base.form-input type="checkbox" id="role_{{ $role->id }}" name="roles[]" value="{{ $role->id }}" class="form-check-input" {{ (old('roles') ? in_array($role->id, old('roles')) : $user->hasRole($role->name)) ? 'checked' : '' }} />
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
                                </div>
                            </div>
                            
                            <!-- Form Actions -->
                            <div class="flex justify-end gap-3 p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                                <x-base.button variant="outline-secondary" as="a" href="{{ route('users.index') }}" class="w-24">
                                    {{ __('global.cancel') }}
                                </x-base.button>
                                <x-base.button type="submit" variant="primary" class="w-24">
                                    {{ __('global.update') }}
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
        
        // Form validation
        document.getElementById('userForm').addEventListener('submit', function(e) {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            const passwordConfirmation = document.getElementById('password_confirmation').value;
            
            if (!name || !email) {
                e.preventDefault();
                alert('{{ __('global.please_fill_required_fields') }}');
                return;
            }
            
            if (password && password !== passwordConfirmation) {
                e.preventDefault();
                alert('{{ __('global.passwords_do_not_match') }}');
                return;
            }
            
            if (password && password.length < 8) {
                e.preventDefault();
                alert('{{ __('global.password_min_length') }}');
                return;
            }
        });
    </script>
@endsection
