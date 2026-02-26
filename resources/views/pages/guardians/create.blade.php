@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('guardians.add_new') }} - {{ config('app.name') }}</title>
    <style>
        .tab-content { display: none; }
        .tab-content.active { display: block; }
        .tab-button.active { 
            background-color: var(--primary); 
            color: white; 
            border-color: var(--primary);
        }
    </style>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium me-auto">{{ __('guardians.add_new') }}</h2>
    <div class="flex gap-2">
        <x-base.button variant="outline-secondary" onclick="window.history.back()">
            <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
            {{ __('global.back') }}
        </x-base.button>
    </div>
</div>

<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12">
        <!-- Tab Navigation -->
        <div class="intro-y box p-5 mb-6">
            <div class="flex flex-wrap gap-2 border-b border-slate-200 pb-4">
                <button type="button" class="tab-button active px-4 py-2 rounded-t-lg border border-b-0 font-medium transition-colors" 
                        data-tab="personal">
                    <x-base.lucide icon="User" class="w-4 h-4 me-2 inline" />
                    {{ __('guardians.tabs.personal_info') }}
                </button>
                <button type="button" class="tab-button px-4 py-2 rounded-t-lg border border-b-0 font-medium transition-colors" 
                        data-tab="work">
                    <x-base.lucide icon="Briefcase" class="w-4 h-4 me-2 inline" />
                    {{ __('guardians.tabs.work_info') }}
                </button>
                <button type="button" class="tab-button px-4 py-2 rounded-t-lg border border-b-0 font-medium transition-colors" 
                        data-tab="contact">
                    <x-base.lucide icon="Phone" class="w-4 h-4 me-2 inline" />
                    {{ __('guardians.tabs.contact_info') }}
                </button>
                <button type="button" class="tab-button px-4 py-2 rounded-t-lg border border-b-0 font-medium transition-colors" 
                        data-tab="settings">
                    <x-base.lucide icon="Settings" class="w-4 h-4 me-2 inline" />
                    {{ __('guardians.tabs.settings') }}
                </button>
            </div>
        </div>

        <form action="{{ route('guardians.store') }}" method="POST" class="intro-y box p-5">
            @csrf
            
            <!-- Personal Information Tab -->
            <div id="tab-personal" class="tab-content active">
                <x-form-section title="{{ __('guardians.sections.personal_info') }}" 
                               description="{{ __('guardians.descriptions.personal_info') }}" 
                               icon="User">
                    <div class="grid grid-cols-12 gap-4">
                        <x-form-field name="name" 
                                     label="{{ __('guardians.fields.name') }}" 
                                     type="text" 
                                     :required="true" 
                                     :value="old('name')" 
                                     placeholder="{{ __('guardians.placeholders.name') }}" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="email" 
                                     label="{{ __('guardians.fields.email') }}" 
                                     type="email" 
                                     :required="true" 
                                     :value="old('email')" 
                                     placeholder="{{ __('guardians.placeholders.email') }}" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="phone" 
                                     label="{{ __('guardians.fields.phone') }}" 
                                     type="text" 
                                     :required="true" 
                                     :value="old('phone')" 
                                     placeholder="{{ __('guardians.placeholders.phone') }}" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="secondary_phone" 
                                     label="{{ __('guardians.fields.secondary_phone') }}" 
                                     type="text" 
                                     :value="old('secondary_phone')" 
                                     placeholder="{{ __('guardians.placeholders.secondary_phone') }}" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="date_of_birth" 
                                     label="{{ __('guardians.fields.date_of_birth') }}" 
                                     type="date" 
                                     :value="old('date_of_birth')" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="national_id" 
                                     label="{{ __('guardians.fields.national_id') }}" 
                                     type="text" 
                                     :value="old('national_id')" 
                                     placeholder="{{ __('guardians.placeholders.national_id') }}" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="passport_number" 
                                     label="{{ __('guardians.fields.passport_number') }}" 
                                     type="text" 
                                     :value="old('passport_number')" 
                                     placeholder="{{ __('guardians.placeholders.passport_number') }}" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="preferred_language" 
                                     label="{{ __('guardians.fields.preferred_language') }}" 
                                     type="select" 
                                     :value="old('preferred_language', 'en')" 
                                     :options="[
                                         'ar' => 'Arabic',
                                         'en' => 'English'
                                     ]" 
                                     class="col-span-12 sm:col-span-6" />
                    </div>
                </x-form-section>
            </div>
            
            <!-- Work Information Tab -->
            <div id="tab-work" class="tab-content">
                <x-form-section title="{{ __('guardians.sections.work_info') }}" 
                               description="{{ __('guardians.descriptions.work_info') }}" 
                               icon="Briefcase">
                    <div class="grid grid-cols-12 gap-4">
                        <x-form-field name="occupation" 
                                     label="{{ __('guardians.fields.occupation') }}" 
                                     type="text" 
                                     :value="old('occupation')" 
                                     placeholder="{{ __('guardians.placeholders.occupation') }}" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="workplace" 
                                     label="{{ __('guardians.fields.workplace') }}" 
                                     type="text" 
                                     :value="old('workplace')" 
                                     placeholder="{{ __('guardians.placeholders.workplace') }}" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="bank_name" 
                                     label="{{ __('guardians.fields.bank_name') }}" 
                                     type="text" 
                                     :value="old('bank_name')" 
                                     placeholder="{{ __('guardians.placeholders.bank_name') }}" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="bank_account_number" 
                                     label="{{ __('guardians.fields.bank_account_number') }}" 
                                     type="text" 
                                     :value="old('bank_account_number')" 
                                     placeholder="{{ __('guardians.placeholders.bank_account_number') }}" 
                                     class="col-span-12 sm:col-span-6" />
                    </div>
                </x-form-section>
            </div>
            
            <!-- Contact Information Tab -->
            <div id="tab-contact" class="tab-content">
                <x-form-section title="{{ __('guardians.sections.contact_info') }}" 
                               description="{{ __('guardians.descriptions.contact_info') }}" 
                               icon="MapPin">
                    <div class="grid grid-cols-12 gap-4">
                        <x-form-field name="relationship" 
                                     label="{{ __('guardians.fields.relationship') }}" 
                                     type="select" 
                                     :required="true" 
                                     :value="old('relationship')" 
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
                                     :value="old('address')" 
                                     placeholder="{{ __('guardians.placeholders.address') }}" 
                                     rows="4" 
                                     class="col-span-12" />
                    </div>
                </x-form-section>
            </div>
            
            <!-- Settings Tab -->
            <div id="tab-settings" class="tab-content">
                <x-form-section title="{{ __('guardians.sections.settings') }}" 
                               description="{{ __('guardians.descriptions.settings') }}" 
                               icon="Settings">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12">
                            <div class="flex flex-col sm:flex-row gap-6">
                                <div class="flex items-center">
                                    <input type="hidden" name="is_primary_guardian" value="0">
                                    <x-base.form-check-input id="is_primary_guardian" 
                                                             type="checkbox" 
                                                             name="is_primary_guardian" 
                                                             value="1" 
                                                             {{ old('is_primary_guardian') ? 'checked' : '' }} 
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
                                                             {{ old('is_primary_emergency_contact') ? 'checked' : '' }} 
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
                                                             {{ old('receives_sms_notifications', true) ? 'checked' : '' }} 
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
                                                             {{ old('receives_email_notifications', true) ? 'checked' : '' }} 
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
                                                             {{ old('is_active', true) ? 'checked' : '' }} 
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
                                     :value="old('notes')" 
                                     placeholder="{{ __('guardians.placeholders.notes') }}" 
                                     rows="3" 
                                     class="col-span-12" />
                    </div>
                </x-form-section>
            </div>
            
            <!-- Form Actions -->
            <x-form-actions :back-url="route('guardians.index')" 
                           submit-text="{{ __('global.save') }}" />
        </form>
    </div>
</div>

<script>
    // Tab switching functionality
    document.addEventListener('DOMContentLoaded', function() {
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.tab-content');
        
        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                const tabId = this.getAttribute('data-tab');
                
                // Remove active class from all buttons and contents
                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));
                
                // Add active class to clicked button and corresponding content
                this.classList.add('active');
                document.getElementById(`tab-${tabId}`).classList.add('active');
            });
        });
        
        // Form validation
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            let isValid = true;
            const requiredFields = form.querySelectorAll('[required]');
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('border-danger');
                    // Add error message
                    if (!field.parentNode.querySelector('.text-danger')) {
                        const errorDiv = document.createElement('div');
                        errorDiv.className = 'text-danger text-sm mt-1';
                        errorDiv.textContent = '{{ __('global.field_required') }}';
                        field.parentNode.appendChild(errorDiv);
                    }
                } else {
                    field.classList.remove('border-danger');
                    const errorDiv = field.parentNode.querySelector('.text-danger');
                    if (errorDiv) errorDiv.remove();
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                // Switch to first tab with errors
                const firstErrorTab = document.querySelector('.tab-content .border-danger');
                if (firstErrorTab) {
                    const tabContent = firstErrorTab.closest('.tab-content');
                    const tabId = tabContent.id.replace('tab-', '');
                    document.querySelector(`[data-tab="${tabId}"]`).click();
                }
                return false;
            }
        });
    });
</script>
@endsection
