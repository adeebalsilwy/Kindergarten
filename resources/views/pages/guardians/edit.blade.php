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
    <div class="intro-y col-span-12">
        <!-- Tab Navigation -->
        <div class="intro-y box p-0 mb-6 overflow-hidden">
            <div class="tabs-navigation px-2">
                <button type="button" class="tab-button active" data-tab="personal">
                    <x-base.lucide icon="User" class="w-4 h-4" />
                    {{ __('guardians.tabs.personal_info') }}
                </button>
                <button type="button" class="tab-button" data-tab="work">
                    <x-base.lucide icon="Briefcase" class="w-4 h-4" />
                    {{ __('guardians.tabs.work_info') }}
                </button>
                <button type="button" class="tab-button" data-tab="contact">
                    <x-base.lucide icon="Phone" class="w-4 h-4" />
                    {{ __('guardians.tabs.contact_info') }}
                </button>
                <button type="button" class="tab-button" data-tab="settings">
                    <x-base.lucide icon="Settings" class="w-4 h-4" />
                    {{ __('guardians.tabs.settings') }}
                </button>
            </div>
        </div>

        <form action="{{ route('guardians.update', $parents->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <!-- Personal Information Tab -->
            <div id="tab-personal" class="tab-content active">
                <x-form-section title="{{ __('guardians.sections.personal_info') }}" 
                               description="{{ __('guardians.descriptions.personal_info') }}" 
                               icon="User">
                    <x-form-field name="name" 
                                 label="{{ __('guardians.fields.name') }}" 
                                 type="text" 
                                 :value="old('name', $parents->name ?? '')" 
                                 placeholder="{{ __('guardians.placeholders.name') }}" 
                                 class="col-span-12 sm:col-span-6" />
                    
                    <x-form-field name="email" 
                                 label="{{ __('guardians.fields.email') }}" 
                                 type="email" 
                                 :value="old('email', $parents->email ?? '')" 
                                 placeholder="{{ __('guardians.placeholders.email') }}" 
                                 class="col-span-12 sm:col-span-6" />
                    
                    <x-form-field name="phone" 
                                 label="{{ __('guardians.fields.phone') }}" 
                                 type="text" 
                                 :value="old('phone', $parents->phone ?? '')" 
                                 placeholder="{{ __('guardians.placeholders.phone') }}" 
                                 class="col-span-12 sm:col-span-6" />
                    
                    <x-form-field name="secondary_phone" 
                                 label="{{ __('guardians.fields.secondary_phone') }}" 
                                 type="text" 
                                 :value="old('secondary_phone', $parents->secondary_phone ?? '')" 
                                 placeholder="{{ __('guardians.placeholders.secondary_phone') }}" 
                                 class="col-span-12 sm:col-span-6" />
                    
                    <x-form-field name="date_of_birth" 
                                 label="{{ __('guardians.fields.date_of_birth') }}" 
                                 type="date" 
                                 :value="old('date_of_birth', $parents->date_of_birth ? $parents->date_of_birth->format('Y-m-d') : '')" 
                                 class="col-span-12 sm:col-span-6" />
                    
                    <x-form-field name="national_id" 
                                 label="{{ __('guardians.fields.national_id') }}" 
                                 type="text" 
                                 :value="old('national_id', $parents->national_id ?? '')" 
                                 placeholder="{{ __('guardians.placeholders.national_id') }}" 
                                 class="col-span-12 sm:col-span-6" />
                    
                    <x-form-field name="passport_number" 
                                 label="{{ __('guardians.fields.passport_number') }}" 
                                 type="text" 
                                 :value="old('passport_number', $parents->passport_number ?? '')" 
                                 placeholder="{{ __('guardians.placeholders.passport_number') }}" 
                                 class="col-span-12 sm:col-span-6" />
                    
                    <x-form-field name="preferred_language" 
                                 label="{{ __('guardians.fields.preferred_language') }}" 
                                 type="select" 
                                 :value="old('preferred_language', $parents->preferred_language ?? 'en')" 
                                 :options="[
                                     'ar' => 'Arabic',
                                     'en' => 'English'
                                 ]" 
                                 class="col-span-12 sm:col-span-6" />
                </x-form-section>
            </div>
            
            <!-- Work Information Tab -->
            <div id="tab-work" class="tab-content">
                <x-form-section title="{{ __('guardians.sections.work_info') }}" 
                               description="{{ __('guardians.descriptions.work_info') }}" 
                               icon="Briefcase">
                    <x-form-field name="occupation" 
                                 label="{{ __('guardians.fields.occupation') }}" 
                                 type="text" 
                                 :value="old('occupation', $parents->occupation ?? '')" 
                                 placeholder="{{ __('guardians.placeholders.occupation') }}" 
                                 class="col-span-12 sm:col-span-6" />
                    
                    <x-form-field name="workplace" 
                                 label="{{ __('guardians.fields.workplace') }}" 
                                 type="text" 
                                 :value="old('workplace', $parents->workplace ?? '')" 
                                 placeholder="{{ __('guardians.placeholders.workplace') }}" 
                                 class="col-span-12 sm:col-span-6" />
                    
                    <x-form-field name="bank_name" 
                                 label="{{ __('guardians.fields.bank_name') }}" 
                                 type="text" 
                                 :value="old('bank_name', $parents->bank_name ?? '')" 
                                 placeholder="{{ __('guardians.placeholders.bank_name') }}" 
                                 class="col-span-12 sm:col-span-6" />
                    
                    <x-form-field name="bank_account_number" 
                                 label="{{ __('guardians.fields.bank_account_number') }}" 
                                 type="text" 
                                 :value="old('bank_account_number', $parents->bank_account_number ?? '')" 
                                 placeholder="{{ __('guardians.placeholders.bank_account_number') }}" 
                                 class="col-span-12 sm:col-span-6" />
                </x-form-section>
            </div>
            
            <!-- Contact Information Tab -->
            <div id="tab-contact" class="tab-content">
                <x-form-section title="{{ __('guardians.sections.contact_info') }}" 
                               description="{{ __('guardians.descriptions.contact_info') }}" 
                               icon="MapPin">
                    <x-form-field name="relationship" 
                                 label="{{ __('guardians.fields.relationship') }}" 
                                 type="select" 
                                 :value="old('relationship', $parents->relationship ?? '')" 
                                 :options="[
                                     'Father' => __('guardians.relationships.father'),
                                     'Mother' => __('guardians.relationships.mother'),
                                     'Grandfather' => __('guardians.relationships.grandfather'),
                                     'Grandmother' => __('guardians.relationships.grandmother'),
                                     'Uncle' => __('guardians.relationships.uncle'),
                                     'Aunt' => __('guardians.relationships.aunt'),
                                     'Other' => __('guardians.relationships.other')
                                 ]" 
                                 class="col-span-12 sm:col-span-6" />
                    
                    <x-form-field name="address" 
                                 label="{{ __('guardians.fields.address') }}" 
                                 type="textarea" 
                                 :value="old('address', $parents->address ?? '')" 
                                 placeholder="{{ __('guardians.placeholders.address') }}" 
                                 rows="4" 
                                 class="col-span-12" />
                </x-form-section>
            </div>
            
            <!-- Settings Tab -->
            <div id="tab-settings" class="tab-content">
                <x-form-section title="{{ __('guardians.sections.settings') }}" 
                               description="{{ __('guardians.descriptions.settings') }}" 
                               icon="Settings">
                    <div class="col-span-12">
                        <div class="flex flex-col sm:flex-row gap-6">
                            <div class="flex items-center">
                                <input type="hidden" name="is_primary_guardian" value="0">
                                <x-base.form-check-input id="is_primary_guardian" 
                                                         type="checkbox" 
                                                         name="is_primary_guardian" 
                                                         value="1" 
                                                         {{ old('is_primary_guardian', $parents->is_primary_guardian) ? 'checked' : '' }} 
                                                         class="me-3" />
                                <x-base.form-label for="is_primary_guardian" class="mb-0">
                                    {{ __('guardians.fields.is_primary_guardian') }}
                                </x-base.form-label>
                            </div>
                            
                            <div class="flex items-center">
                                <input type="hidden" name="is_primary_emergency_contact" value="0">
                                <x-base.form-check-input id="is_primary_emergency_contact" 
                                                         type="checkbox" 
                                                         name="is_primary_emergency_contact" 
                                                         value="1" 
                                                         {{ old('is_primary_emergency_contact', $parents->is_primary_emergency_contact) ? 'checked' : '' }} 
                                                         class="me-3" />
                                <x-base.form-label for="is_primary_emergency_contact" class="mb-0">
                                    {{ __('guardians.fields.is_primary_emergency_contact') }}
                                </x-base.form-label>
                            </div>
                            
                            <div class="flex items-center">
                                <input type="hidden" name="receives_sms_notifications" value="0">
                                <x-base.form-check-input id="receives_sms_notifications" 
                                                         type="checkbox" 
                                                         name="receives_sms_notifications" 
                                                         value="1" 
                                                         {{ old('receives_sms_notifications', $parents->receives_sms_notifications) ? 'checked' : '' }} 
                                                         class="me-3" />
                                <x-base.form-label for="receives_sms_notifications" class="mb-0">
                                    {{ __('guardians.fields.receives_sms_notifications') }}
                                </x-base.form-label>
                            </div>
                            
                            <div class="flex items-center">
                                <input type="hidden" name="receives_email_notifications" value="0">
                                <x-base.form-check-input id="receives_email_notifications" 
                                                         type="checkbox" 
                                                         name="receives_email_notifications" 
                                                         value="1" 
                                                         {{ old('receives_email_notifications', $parents->receives_email_notifications) ? 'checked' : '' }} 
                                                         class="me-3" />
                                <x-base.form-label for="receives_email_notifications" class="mb-0">
                                    {{ __('guardians.fields.receives_email_notifications') }}
                                </x-base.form-label>
                            </div>
                            
                            <div class="flex items-center">
                                <input type="hidden" name="is_active" value="0">
                                <x-base.form-check-input id="is_active" 
                                                         type="checkbox" 
                                                         name="is_active" 
                                                         value="1" 
                                                         {{ old('is_active', $parents->is_active ?? true) ? 'checked' : '' }} 
                                                         class="me-3" />
                                <x-base.form-label for="is_active" class="mb-0">
                                    {{ __('guardians.fields.is_active') }}
                                </x-base.form-label>
                            </div>
                        </div>
                    </div>
                    
                    <x-form-field name="notes" 
                                 label="{{ __('guardians.fields.notes') }}" 
                                 type="textarea" 
                                 :value="old('notes', $parents->notes ?? '')" 
                                 placeholder="{{ __('guardians.placeholders.notes') }}" 
                                 rows="3" 
                                 class="col-span-12" />
                </x-form-section>
            </div>
            
            <x-form-actions backUrl="{{ route('guardians.index') }}" />
        </form>
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
