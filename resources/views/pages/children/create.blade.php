@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('childrens.add_new') }} - {{ config('app.name') }}</title>
    <style>
        .tab-content { display: none; }
        .tab-content.active { display: block; }
        .tab-button.active { 
            background-color: var(--primary); 
            color: white; 
            border-color: var(--primary);
        }
        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        .field-error {
            border-color: #dc3545 !important;
        }
    </style>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium me-auto">{{ __('childrens.add_new') }}</h2>
    <div class="flex gap-2">
        <x-base.button variant="outline-secondary" onclick="window.history.back()">
            <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
            {{ __('global.back') }}
        </x-base.button>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger intro-y box mt-5">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12">
        <!-- Tab Navigation -->
        <div class="intro-y box p-5 mb-6">
            <div class="flex flex-wrap gap-2 border-b border-slate-200 pb-4">
                <button type="button" class="tab-button active px-4 py-2 rounded-t-lg border border-b-0 font-medium transition-colors" 
                        data-tab="basic">
                    <x-base.lucide icon="User" class="w-4 h-4 me-2 inline" />
                    {{ __('childrens.tabs.basic_info') }}
                </button>
                <button type="button" class="tab-button px-4 py-2 rounded-t-lg border border-b-0 font-medium transition-colors" 
                        data-tab="parents">
                    <x-base.lucide icon="Users" class="w-4 h-4 me-2 inline" />
                    {{ __('childrens.tabs.parents') }}
                </button>
                <button type="button" class="tab-button px-4 py-2 rounded-t-lg border border-b-0 font-medium transition-colors" 
                        data-tab="medical">
                    <x-base.lucide icon="Heart" class="w-4 h-4 me-2 inline" />
                    {{ __('childrens.tabs.medical') }}
                </button>
                <button type="button" class="tab-button px-4 py-2 rounded-t-lg border border-b-0 font-medium transition-colors" 
                        data-tab="enrollment">
                    <x-base.lucide icon="GraduationCap" class="w-4 h-4 me-2 inline" />
                    {{ __('childrens.tabs.enrollment') }}
                </button>
            </div>
        </div>

        <form action="{{ route('children.store') }}" method="POST" enctype="multipart/form-data" class="intro-y box p-5" id="children-form">
            @csrf
            
            <!-- Basic Information Tab -->
            <div id="tab-basic" class="tab-content active">
                <x-form-section title="{{ __('childrens.sections.personal_info') }}" 
                               description="{{ __('childrens.descriptions.personal_info') }}" 
                               icon="User">
                    <div class="grid grid-cols-12 gap-4">
                        <x-form-field name="name" 
                                     label="{{ __('childrens.fields.name') }}" 
                                     type="text" 
                                     :required="true" 
                                     :value="old('name')" 
                                     placeholder="{{ __('childrens.placeholders.name') }}" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="dob" 
                                     label="{{ __('childrens.fields.dob') }}" 
                                     type="date" 
                                     :required="true" 
                                     :value="old('dob')" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="gender" 
                                     label="{{ __('childrens.fields.gender') }}" 
                                     type="select" 
                                     :required="true" 
                                     :value="old('gender')" 
                                     :options="[
                                         'male' => __('global.male'),
                                         'female' => __('global.female')
                                     ]" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="nationality" 
                                     label="{{ __('childrens.fields.nationality') }}" 
                                     type="text" 
                                     :value="old('nationality')" 
                                     placeholder="{{ __('childrens.placeholders.nationality') }}" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="religion" 
                                     label="{{ __('childrens.fields.religion') }}" 
                                     type="text" 
                                     :value="old('religion')" 
                                     placeholder="{{ __('childrens.placeholders.religion') }}" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="photo_path" 
                                     label="{{ __('childrens.fields.photo_path') }}" 
                                     type="file" 
                                     accept="image/*" 
                                     :value="old('photo_path')" 
                                     class="col-span-12 sm:col-span-6" />
                    </div>
                </x-form-section>
                
                <x-form-section title="{{ __('childrens.sections.class_assignment') }}" 
                               description="{{ __('childrens.descriptions.class_assignment') }}" 
                               icon="Home">
                    <div class="grid grid-cols-12 gap-4">
                        <x-form-field name="class_id" 
                                     label="{{ __('childrens.fields.class_id') }}" 
                                     type="select" 
                                     :required="true" 
                                     :value="old('class_id')" 
                                     :options="$classes->pluck('name', 'id')" 
                                     placeholder="{{ __('global.select_option') }}" 
                                     class="col-span-12" />
                    </div>
                </x-form-section>
            </div>
            
            <!-- Parents Information Tab -->
            <div id="tab-parents" class="tab-content">
                <x-form-section title="{{ __('childrens.sections.parent_info') }}" 
                               description="{{ __('childrens.descriptions.parent_info') }}" 
                               icon="Users">
                    <div class="grid grid-cols-12 gap-4">
                        <x-form-field name="parent_id" 
                                     label="{{ __('childrens.fields.parent_id') }}" 
                                     type="select" 
                                     :required="true" 
                                     :value="old('parent_id')" 
                                     :options="$parents->pluck('name', 'id')" 
                                     placeholder="{{ __('global.select_option') }}" 
                                     class="col-span-12" />
                        
                        <x-form-field name="second_parent_id" 
                                     label="{{ __('childrens.fields.second_parent_id') }}" 
                                     type="select" 
                                     :value="old('second_parent_id')" 
                                     :options="$parents->pluck('name', 'id')" 
                                     placeholder="{{ __('global.select_option') }}" 
                                     class="col-span-12" 
                                     help="{{ __('childrens.help.second_parent_optional') }}" />
                    </div>
                </x-form-section>
                
                <x-form-section title="{{ __('childrens.sections.emergency_contact') }}" 
                               description="{{ __('childrens.descriptions.emergency_contact') }}" 
                               icon="AlertTriangle">
                    <div class="grid grid-cols-12 gap-4">
                        <x-form-field name="emergency_contact_name" 
                                     label="{{ __('childrens.fields.emergency_contact_name') }}" 
                                     type="text" 
                                     :required="true" 
                                     :value="old('emergency_contact_name')" 
                                     placeholder="{{ __('childrens.placeholders.emergency_contact_name') }}" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="emergency_contact_phone" 
                                     label="{{ __('childrens.fields.emergency_contact_phone') }}" 
                                     type="text" 
                                     :required="true" 
                                     :value="old('emergency_contact_phone')" 
                                     placeholder="{{ __('childrens.placeholders.emergency_contact_phone') }}" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="emergency_contact_relation" 
                                     label="{{ __('childrens.fields.emergency_contact_relation') }}" 
                                     type="text" 
                                     :required="true" 
                                     :value="old('emergency_contact_relation')" 
                                     placeholder="{{ __('childrens.placeholders.emergency_contact_relation') }}" 
                                     class="col-span-12" />
                    </div>
                </x-form-section>
            </div>
            
            <!-- Medical Information Tab -->
            <div id="tab-medical" class="tab-content">
                <x-form-section title="{{ __('childrens.sections.medical_info') }}" 
                               description="{{ __('childrens.descriptions.medical_info') }}" 
                               icon="Heart">
                    <div class="grid grid-cols-12 gap-4">
                        <x-form-field name="blood_type" 
                                     label="{{ __('childrens.fields.blood_type') }}" 
                                     type="select" 
                                     :value="old('blood_type')" 
                                     :options="[
                                         'A+' => 'A+', 'A-' => 'A-',
                                         'B+' => 'B+', 'B-' => 'B-',
                                         'AB+' => 'AB+', 'AB-' => 'AB-',
                                         'O+' => 'O+', 'O-' => 'O-'
                                     ]" 
                                     placeholder="{{ __('global.select_option') }}" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="medical_conditions" 
                                     label="{{ __('childrens.fields.medical_conditions') }}" 
                                     type="textarea" 
                                     :value="old('medical_conditions')" 
                                     placeholder="{{ __('childrens.placeholders.medical_conditions') }}" 
                                     rows="3" 
                                     class="col-span-12" />
                        
                        <x-form-field name="allergies" 
                                     label="{{ __('childrens.fields.allergies') }}" 
                                     type="textarea" 
                                     :value="old('allergies')" 
                                     placeholder="{{ __('childrens.placeholders.allergies') }}" 
                                     rows="2" 
                                     class="col-span-12" />
                        
                        <x-form-field name="medications" 
                                     label="{{ __('childrens.fields.medications') }}" 
                                     type="textarea" 
                                     :value="old('medications')" 
                                     placeholder="{{ __('childrens.placeholders.medications') }}" 
                                     rows="2" 
                                     class="col-span-12" />
                        
                        <x-form-field name="special_needs" 
                                     label="{{ __('childrens.fields.special_needs') }}" 
                                     type="textarea" 
                                     :value="old('special_needs')" 
                                     placeholder="{{ __('childrens.placeholders.special_needs') }}" 
                                     rows="2" 
                                     class="col-span-12" />
                    </div>
                </x-form-section>
            </div>
            
            <!-- Enrollment Information Tab -->
            <div id="tab-enrollment" class="tab-content">
                <x-form-section title="{{ __('childrens.sections.financial_info') }}" 
                               description="{{ __('childrens.descriptions.financial_info') }}" 
                               icon="DollarSign">
                    <div class="grid grid-cols-12 gap-4">
                        <x-form-field name="fees_required" 
                                     label="{{ __('childrens.fields.fees_required') }}" 
                                     type="number" 
                                     step="0.01" 
                                     min="0" 
                                     :value="old('fees_required')" 
                                     addon="{{ config('app.currency', 'USD') }}" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="fees_paid" 
                                     label="{{ __('childrens.fields.fees_paid') }}" 
                                     type="number" 
                                     step="0.01" 
                                     min="0" 
                                     :value="old('fees_paid')" 
                                     addon="{{ config('app.currency', 'USD') }}" 
                                     class="col-span-12 sm:col-span-6" />
                    </div>
                </x-form-section>
                
                <x-form-section title="{{ __('childrens.sections.enrollment_info') }}" 
                               description="{{ __('childrens.descriptions.enrollment_info') }}" 
                               icon="Calendar">
                    <div class="grid grid-cols-12 gap-4">
                        <x-form-field name="enrollment_date" 
                                     label="{{ __('childrens.fields.enrollment_date') }}" 
                                     type="date" 
                                     :value="old('enrollment_date')" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="expected_graduation_date" 
                                     label="{{ __('childrens.fields.expected_graduation_date') }}" 
                                     type="date" 
                                     :value="old('expected_graduation_date')" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="enrollment_status" 
                                     label="{{ __('childrens.fields.enrollment_status') }}" 
                                     type="select" 
                                     :value="old('enrollment_status', 'active')" 
                                     :options="[
                                         'active' => __('global.active'),
                                         'inactive' => __('global.inactive'),
                                         'graduated' => __('global.graduated')
                                     ]" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="last_attended_at" 
                                     label="{{ __('childrens.fields.last_attended_at') }}" 
                                     type="datetime-local" 
                                     :value="old('last_attended_at')" 
                                     class="col-span-12 sm:col-span-6" />
                    </div>
                </x-form-section>
            </div>
            
            <!-- Form Actions -->
            <div class="flex justify-between mt-8 pt-6 border-t border-slate-200">
                <div class="flex gap-3">
                    <x-base.button type="button" variant="secondary" onclick="fillDemoData()" class="w-32">
                        <x-base.lucide icon="Sparkles" class="w-4 h-4 me-2" />
                        {{ __('childrens.fill_demo_data') }}
                    </x-base.button>
                    <x-base.button variant="outline-secondary" onclick="window.history.back()" class="w-24">
                        <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
                        {{ __('global.cancel') }}
                    </x-base.button>
                </div>
                <x-base.button type="submit" variant="primary" class="w-24">
                    <x-base.lucide icon="Save" class="w-4 h-4 me-2" />
                    {{ __('global.save') }}
                </x-base.button>
            </div>
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
        
        // Show validation errors from server if any
        @if ($errors->any())
            // Find the first tab that has an error field and switch to it
            const errorInputs = document.querySelectorAll('.field-error');
            if (errorInputs.length > 0) {
                const firstError = errorInputs[0];
                const closestTabContent = firstError.closest('.tab-content');
                if (closestTabContent) {
                    const tabId = closestTabContent.id.replace('tab-', '');
                    document.querySelector(`[data-tab="${tabId}"]`).click();
                }
            }
        @endif
    });
    
    // Function to fill demo data
    function fillDemoData() {
        // Personal Information
        document.querySelector('input[name="name"]').value = 'Ahmad Ali Mohamed';
        document.querySelector('input[name="dob"]').value = '2018-05-15';
        document.querySelector('select[name="gender"]').value = 'male';
        document.querySelector('input[name="nationality"]').value = 'Yemeni';
        document.querySelector('input[name="religion"]').value = 'Muslim';
        
        // Class Assignment
        if(document.querySelector('select[name="class_id"] option[value="1"]')) {
            document.querySelector('select[name="class_id"]').value = '1';
        }
        
        // Parent Information
        if(document.querySelector('select[name="parent_id"] option[value="1"]')) {
            document.querySelector('select[name="parent_id"]').value = '1';
        }
        
        // Emergency Contact
        document.querySelector('input[name="emergency_contact_name"]').value = 'Fatima Ali';
        document.querySelector('input[name="emergency_contact_phone"]').value = '+967771234567';
        document.querySelector('input[name="emergency_contact_relation"]').value = 'Mother';
        
        // Medical Information
        document.querySelector('select[name="blood_type"]').value = 'O+';
        document.querySelector('textarea[name="medical_conditions"]').value = 'None';
        document.querySelector('textarea[name="allergies"]').value = 'No known allergies';
        document.querySelector('textarea[name="medications"]').value = 'None';
        document.querySelector('textarea[name="special_needs"]').value = 'None';
        
        // Financial Information
        document.querySelector('input[name="fees_required"]').value = '500.00';
        document.querySelector('input[name="fees_paid"]').value = '300.00';
        
        // Enrollment Information
        const today = new Date().toISOString().split('T')[0];
        document.querySelector('input[name="enrollment_date"]').value = today;
        const nextYear = new Date();
        nextYear.setFullYear(nextYear.getFullYear() + 1);
        document.querySelector('input[name="expected_graduation_date"]').value = nextYear.toISOString().split('T')[0];
        document.querySelector('select[name="enrollment_status"]').value = 'active';
        
        // Show success message
        alert('{{ __("childrens.demo_data_filled") }}');
    }
    
    // Form validation
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('#children-form');
        form.addEventListener('submit', function(e) {
            let isValid = true;
            const requiredFields = form.querySelectorAll('[required]');
            
            // Clear previous error styles
            const previousErrors = form.querySelectorAll('.field-error');
            previousErrors.forEach(el => el.classList.remove('field-error'));
            
            const previousMessages = form.querySelectorAll('.error-message');
            previousMessages.forEach(el => el.remove());
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('field-error');
                    
                    // Add error message
                    const errorDiv = document.createElement('div');
                    errorDiv.className = 'error-message';
                    errorDiv.textContent = '{{ __('global.field_required') }}';
                    field.parentNode.appendChild(errorDiv);
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                
                // Switch to first tab with errors
                const firstErrorTab = document.querySelector('.tab-content .field-error');
                if (firstErrorTab) {
                    const tabContent = firstErrorTab.closest('.tab-content');
                    const tabId = tabContent.id.replace('tab-', '');
                    document.querySelector(`[data-tab="${tabId}"]`).click();
                }
                
                // Scroll to first error
                const firstError = document.querySelector('.field-error');
                if (firstError) {
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    firstError.focus();
                }
                
                return false;
            }
        });
    });
</script>
@endsection