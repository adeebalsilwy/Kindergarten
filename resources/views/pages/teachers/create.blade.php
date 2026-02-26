@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('teachers.add_new') }} - {{ config('app.name') }}</title>
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
    <h2 class="text-lg font-medium me-auto">{{ __('teachers.add_new') }}</h2>
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
                    {{ __('teachers.tabs.personal_info') }}
                </button>
                <button type="button" class="tab-button px-4 py-2 rounded-t-lg border border-b-0 font-medium transition-colors" 
                        data-tab="professional">
                    <x-base.lucide icon="Briefcase" class="w-4 h-4 me-2 inline" />
                    {{ __('teachers.tabs.professional_info') }}
                </button>
                <button type="button" class="tab-button px-4 py-2 rounded-t-lg border border-b-0 font-medium transition-colors" 
                        data-tab="employment">
                    <x-base.lucide icon="Calendar" class="w-4 h-4 me-2 inline" />
                    {{ __('teachers.tabs.employment_info') }}
                </button>
            </div>
        </div>

        <form action="{{ route('teachers.store') }}" method="POST" enctype="multipart/form-data" class="intro-y box p-5">
            @csrf
            
            <!-- Personal Information Tab -->
            <div id="tab-personal" class="tab-content active">
                <x-form-section title="{{ __('teachers.sections.personal_info') }}" 
                               description="{{ __('teachers.descriptions.personal_info') }}" 
                               icon="User">
                    <div class="grid grid-cols-12 gap-4">
                        <x-form-field name="name" 
                                     label="{{ __('teachers.fields.name') }}" 
                                     type="text" 
                                     :required="true" 
                                     :value="old('name', $teacher->name ?? '')" 
                                     placeholder="{{ __('teachers.placeholders.name') }}" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="email" 
                                     label="{{ __('teachers.fields.email') }}" 
                                     type="email" 
                                     :required="true" 
                                     :value="old('email', $teacher->email ?? '')" 
                                     placeholder="{{ __('teachers.placeholders.email') }}" 
                                     icon="Mail" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="phone" 
                                     label="{{ __('teachers.fields.phone') }}" 
                                     type="tel" 
                                     :required="true" 
                                     :value="old('phone', $teacher->phone ?? '')" 
                                     placeholder="{{ __('teachers.placeholders.phone') }}" 
                                     icon="Phone" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="date_of_birth" 
                                     label="{{ __('teachers.fields.date_of_birth') }}" 
                                     type="date" 
                                     :value="old('date_of_birth', $teacher->date_of_birth ?? '')" 
                                     icon="Calendar" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="gender" 
                                     label="{{ __('teachers.fields.gender') }}" 
                                     type="select" 
                                     :value="old('gender', $teacher->gender ?? '')" 
                                     :options="[
                                         'male' => __('global.male'),
                                         'female' => __('global.female')
                                     ]" 
                                     placeholder="{{ __('global.select_option') }}" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="address" 
                                     label="{{ __('teachers.fields.address') }}" 
                                     type="textarea" 
                                     :value="old('address', $teacher->address ?? '')" 
                                     placeholder="{{ __('teachers.placeholders.address') }}" 
                                     rows="4" 
                                     class="col-span-12" />
                        
                        <x-form-field name="photo_path" 
                                     label="{{ __('teachers.fields.photo_path') }}" 
                                     type="file" 
                                     accept="image/*" 
                                     :value="$teacher->photo_path ?? ''" 
                                     class="col-span-12 sm:col-span-6" />
                    </div>
                </x-form-section>
            </div>
            
            <!-- Professional Information Tab -->
            <div id="tab-professional" class="tab-content">
                <x-form-section title="{{ __('teachers.sections.professional_info') }}" 
                               description="{{ __('teachers.descriptions.professional_info') }}" 
                               icon="GraduationCap">
                    <div class="grid grid-cols-12 gap-4">
                        <x-form-field name="qualification" 
                                     label="{{ __('teachers.fields.qualification') }}" 
                                     type="text" 
                                     :value="old('qualification', $teacher->qualification ?? '')" 
                                     placeholder="{{ __('teachers.placeholders.qualification') }}" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="specialization" 
                                     label="{{ __('teachers.fields.specialization') }}" 
                                     type="text" 
                                     :value="old('specialization', $teacher->specialization ?? '')" 
                                     placeholder="{{ __('teachers.placeholders.specialization') }}" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="experience_years" 
                                     label="{{ __('teachers.fields.experience_years') }}" 
                                     type="number" 
                                     min="0" 
                                     :value="old('experience_years', $teacher->experience_years ?? '')" 
                                     placeholder="{{ __('teachers.placeholders.experience_years') }}" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="bio" 
                                     label="{{ __('teachers.fields.bio') }}" 
                                     type="textarea" 
                                     :value="old('bio', $teacher->bio ?? '')" 
                                     placeholder="{{ __('teachers.placeholders.bio') }}" 
                                     rows="4" 
                                     class="col-span-12" />
                    </div>
                </x-form-section>
            </div>
            
            <!-- Employment Information Tab -->
            <div id="tab-employment" class="tab-content">
                <x-form-section title="{{ __('teachers.sections.employment_info') }}" 
                               description="{{ __('teachers.descriptions.employment_info') }}" 
                               icon="Building">
                    <div class="grid grid-cols-12 gap-4">
                        <x-form-field name="hire_date" 
                                     label="{{ __('teachers.fields.hire_date') }}" 
                                     type="date" 
                                     :required="true" 
                                     :value="old('hire_date', $teacher->hire_date ?? '')" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="salary" 
                                     label="{{ __('teachers.fields.salary') }}" 
                                     type="number" 
                                     step="0.01" 
                                     min="0" 
                                     :value="old('salary', $teacher->salary ?? '')" 
                                     addon="{{ config('app.currency', 'USD') }}" 
                                     class="col-span-12 sm:col-span-6" />
                        
                        <x-form-field name="user_id" 
                                     label="{{ __('teachers.fields.user_id') }}" 
                                     type="select" 
                                     :value="old('user_id', $teacher->user_id ?? '')" 
                                     :options="$users->pluck('name', 'id')" 
                                     placeholder="{{ __('global.select_option') }}" 
                                     help="{{ __('teachers.help.user_assignment') }}" 
                                     class="col-span-12" />
                        
                        <div class="col-span-12">
                            <div class="flex items-center">
                                <input type="hidden" name="is_active" value="0">
                                <x-base.form-check-input id="is_active" 
                                                         type="checkbox" 
                                                         name="is_active" 
                                                         value="1" 
                                                         {{ old('is_active', $teacher->is_active ?? true) ? 'checked' : '' }} 
                                                         class="me-3" />
                                <x-base.form-label for="is_active" class="mb-0">
                                    {{ __('teachers.fields.is_active') }}
                                </x-base.form-label>
                            </div>
                        </div>
                        
                        <x-form-field name="notes" 
                                     label="{{ __('teachers.fields.notes') }}" 
                                     type="textarea" 
                                     :value="old('notes', $teacher->notes ?? '')" 
                                     placeholder="{{ __('teachers.placeholders.notes') }}" 
                                     rows="3" 
                                     class="col-span-12" />
                    </div>
                </x-form-section>
            </div>
            
            <!-- Form Actions -->
            <x-form-actions :back-url="route('teachers.index')" 
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
