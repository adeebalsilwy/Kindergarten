@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Guardian.edit') }} - Laravel</title>
    <style>
        .tab-content { display: none; }
        .tab-content.active { display: block; }
        .tab-button.active { background-color: #3b82f6; color: white; }
    </style>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('Guardian.edit') }}</h2>
    </div>

    <!-- Tab Navigation -->
    <div class="intro-y mt-5">
        <div class="border-b border-slate-200">
            <nav class="flex space-x-2 overflow-x-auto">
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg active" data-tab="basic-info">
                    <x-base.lucide icon="User" class="w-4 h-4 me-2" />
                    {{ __('global.basic_info') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="contact-details">
                    <x-base.lucide icon="Phone" class="w-4 h-4 me-2" />
                    {{ __('global.contact_details') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="work-info">
                    <x-base.lucide icon="Briefcase" class="w-4 h-4 me-2" />
                    {{ __('global.work_information') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="identification">
                    <x-base.lucide icon="CreditCard" class="w-4 h-4 me-2" />
                    {{ __('global.identification') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="notifications">
                    <x-base.lucide icon="Bell" class="w-4 h-4 me-2" />
                    {{ __('global.notifications') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="settings">
                    <x-base.lucide icon="Settings" class="w-4 h-4 me-2" />
                    {{ __('global.settings') }}
                </button>
            </nav>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <div class="intro-y box p-5">
                <form action="{{ route('guardians.update', $parents->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Basic Info Tab -->
                    <div id="basic-info" class="tab-content active">
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                <x-base.lucide icon="User" class="w-5 h-5 me-2 text-blue-600" />
                                {{ __('global.basic_information') }}
                            </h3>
                        </div>
                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('guardians.fields.name') }}</x-base.form-label>
                                <x-base.form-input type="text" name="name" value="{{ old('name', $parents->name ?? '') }}" class="mt-2" required />
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('guardians.fields.relationship') }}</x-base.form-label>
                                <x-base.form-input type="text" name="relationship" value="{{ old('relationship', $parents->relationship ?? '') }}" class="mt-2" />
                            </div>
                            <div class="col-span-12">
                                <x-base.form-label>{{ __('guardians.fields.address') }}</x-base.form-label>
                                <x-base.form-textarea name="address" rows="3" class="resize-none mt-2">{{ old('address', $parents->address ?? '') }}</x-base.form-textarea>
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('guardians.fields.date_of_birth') }}</x-base.form-label>
                                <x-base.form-input type="date" name="date_of_birth" value="{{ old('date_of_birth', $parents->date_of_birth?->format('Y-m-d') ?? '') }}" class="mt-2" />
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('guardians.fields.preferred_language') }}</x-base.form-label>
                                <x-base.form-input type="text" name="preferred_language" value="{{ old('preferred_language', $parents->preferred_language ?? 'ar') }}" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <!-- Contact Details Tab -->
                    <div id="contact-details" class="tab-content">
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                <x-base.lucide icon="Phone" class="w-5 h-5 me-2 text-blue-600" />
                                {{ __('global.contact_details') }}
                            </h3>
                        </div>
                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('guardians.fields.phone') }}</x-base.form-label>
                                <x-base.form-input type="tel" name="phone" value="{{ old('phone', $parents->phone ?? '') }}" class="mt-2" required />
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('guardians.fields.secondary_phone') }}</x-base.form-label>
                                <x-base.form-input type="tel" name="secondary_phone" value="{{ old('secondary_phone', $parents->secondary_phone ?? '') }}" class="mt-2" />
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('guardians.fields.email') }}</x-base.form-label>
                                <x-base.form-input type="email" name="email" value="{{ old('email', $parents->email ?? '') }}" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <!-- Work Information Tab -->
                    <div id="work-info" class="tab-content">
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                <x-base.lucide icon="Briefcase" class="w-5 h-5 me-2 text-blue-600" />
                                {{ __('global.work_information') }}
                            </h3>
                        </div>
                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('guardians.fields.occupation') }}</x-base.form-label>
                                <x-base.form-input type="text" name="occupation" value="{{ old('occupation', $parents->occupation ?? '') }}" class="mt-2" />
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('guardians.fields.workplace') }}</x-base.form-label>
                                <x-base.form-input type="text" name="workplace" value="{{ old('workplace', $parents->workplace ?? '') }}" class="mt-2" />
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('guardians.fields.bank_name') }}</x-base.form-label>
                                <x-base.form-input type="text" name="bank_name" value="{{ old('bank_name', $parents->bank_name ?? '') }}" class="mt-2" />
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('guardians.fields.bank_account_number') }}</x-base.form-label>
                                <x-base.form-input type="text" name="bank_account_number" value="{{ old('bank_account_number', $parents->bank_account_number ?? '') }}" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <!-- Identification Tab -->
                    <div id="identification" class="tab-content">
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                <x-base.lucide icon="CreditCard" class="w-5 h-5 me-2 text-blue-600" />
                                {{ __('global.identification') }}
                            </h3>
                        </div>
                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('guardians.fields.national_id') }}</x-base.form-label>
                                <x-base.form-input type="text" name="national_id" value="{{ old('national_id', $parents->national_id ?? '') }}" class="mt-2" />
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('guardians.fields.passport_number') }}</x-base.form-label>
                                <x-base.form-input type="text" name="passport_number" value="{{ old('passport_number', $parents->passport_number ?? '') }}" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <!-- Notifications Tab -->
                    <div id="notifications" class="tab-content">
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                <x-base.lucide icon="Bell" class="w-5 h-5 me-2 text-blue-600" />
                                {{ __('global.notifications_settings') }}
                            </h3>
                        </div>
                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-12 sm:col-span-6">
                                <div class="flex items-center mt-8">
                                    <x-base.form-input type="checkbox" name="receives_sms_notifications" value="1" {{ old('receives_sms_notifications', $parents->receives_sms_notifications) ? 'checked' : '' }} class="mr-2" />
                                    <x-base.form-label class="ml-2">{{ __('guardians.fields.receives_sms_notifications') }}</x-base.form-label>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <div class="flex items-center mt-8">
                                    <x-base.form-input type="checkbox" name="receives_email_notifications" value="1" {{ old('receives_email_notifications', $parents->receives_email_notifications) ? 'checked' : '' }} class="mr-2" />
                                    <x-base.form-label class="ml-2">{{ __('guardians.fields.receives_email_notifications') }}</x-base.form-label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Settings Tab -->
                    <div id="settings" class="tab-content">
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                <x-base.lucide icon="Settings" class="w-5 h-5 me-2 text-blue-600" />
                                {{ __('global.settings') }}
                            </h3>
                        </div>
                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-12 sm:col-span-6">
                                <div class="flex items-center mt-8">
                                    <x-base.form-input type="checkbox" name="is_primary_guardian" value="1" {{ old('is_primary_guardian', $parents->is_primary_guardian) ? 'checked' : '' }} class="mr-2" />
                                    <x-base.form-label class="ml-2">{{ __('guardians.fields.is_primary_guardian') }}</x-base.form-label>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <div class="flex items-center mt-8">
                                    <x-base.form-input type="checkbox" name="is_primary_emergency_contact" value="1" {{ old('is_primary_emergency_contact', $parents->is_primary_emergency_contact) ? 'checked' : '' }} class="mr-2" />
                                    <x-base.form-label class="ml-2">{{ __('guardians.fields.is_primary_emergency_contact') }}</x-base.form-label>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <div class="flex items-center mt-8">
                                    <x-base.form-input type="checkbox" name="is_active" value="1" {{ old('is_active', $parents->is_active ?? true) ? 'checked' : '' }} class="mr-2" />
                                    <x-base.form-label class="ml-2">{{ __('guardians.fields.is_active') }}</x-base.form-label>
                                </div>
                            </div>
                            <div class="col-span-12">
                                <x-base.form-label>{{ __('guardians.fields.notes') }}</x-base.form-label>
                                <x-base.form-textarea name="notes" rows="4" class="resize-none mt-2">{{ old('notes', $parents->notes ?? '') }}</x-base.form-textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-end mt-6 pt-6 border-t border-slate-200">
                        <a href="{{ route('guardians.index') }}" class="btn btn-outline-secondary w-24 me-2">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">
                            <x-base.lucide icon="Save" class="w-4 h-4 me-2" />
                            {{ __('global.update') }}
                        </x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @pushOnce('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');

            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetTab = this.getAttribute('data-tab');

                    // Remove active class from all buttons and contents
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active'));

                    // Add active class to clicked button and corresponding content
                    this.classList.add('active');
                    document.getElementById(targetTab).classList.add('active');
                });
            });
        });
    </script>
    @endPushOnce
@endsection
