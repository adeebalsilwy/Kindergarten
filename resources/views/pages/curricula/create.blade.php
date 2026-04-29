@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Curriculum.add_new') }} - Laravel</title>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/pages/curricula.css') }}">
    <style>
        .tab-content { display: none; }
        .tab-content.active { display: block; }
        .tab-button.active { background-color: #3b82f6; color: white; }
    </style>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('Curriculum.add_new') }}</h2>
        <button type="button" onclick="fillDemoData()" class="btn btn-outline-secondary me-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 me-2"><path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path></svg>
            {{ __('global.fill_demo_data') }}
        </button>
    </div>
    
    <!-- Tab Navigation -->
    <div class="intro-y mt-5">
        <div class="border-b border-slate-200">
            <nav class="flex space-x-2 overflow-x-auto">
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg active" data-tab="basic-info">
                    <x-base.lucide icon="Info" class="w-4 h-4 me-2" />
                    {{ __('global.basic_info') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="curriculum-details">
                    <x-base.lucide icon="Book" class="w-4 h-4 me-2" />
                    {{ __('global.curriculum_details') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="learning-outcomes">
                    <x-base.lucide icon="Award" class="w-4 h-4 me-2" />
                    {{ __('global.learning_outcomes') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="materials-assessment">
                    <x-base.lucide icon="Clipboard" class="w-4 h-4 me-2" />
                    {{ __('global.materials_assessment') }}
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
                <form action="{{ route('curricula.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Basic Info Tab -->
                    <div id="basic-info" class="tab-content active">
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                <x-base.lucide icon="Info" class="w-5 h-5 me-2 text-blue-600" />
                                {{ __('global.basic_information') }}
                            </h3>
                        </div>
                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('curricula.fields.name') }}</x-base.form-label>
                                <x-base.form-input type="text" name="name" value="{{ old('name', '') }}" class="mt-2" />
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('curricula.fields.code') }}</x-base.form-label>
                                <x-base.form-input type="text" name="code" value="{{ old('code', '') }}" class="mt-2" />
                            </div>
                            <div class="col-span-12">
                                <x-base.form-label>{{ __('curricula.fields.description') }}</x-base.form-label>
                                <x-base.form-textarea name="description" rows="4" class="resize-none mt-2">{{ old('description', '') }}</x-base.form-textarea>
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('curricula.fields.grade_level') }}</x-base.form-label>
                                <x-base.form-input type="text" name="grade_level" value="{{ old('grade_level', '') }}" class="mt-2" />
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('curricula.fields.subject_area') }}</x-base.form-label>
                                <x-base.form-input type="text" name="subject_area" value="{{ old('subject_area', '') }}" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    
                    <!-- Curriculum Details Tab -->
                    <div id="curriculum-details" class="tab-content">
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                <x-base.lucide icon="Book" class="w-5 h-5 me-2 text-blue-600" />
                                {{ __('global.curriculum_details') }}
                            </h3>
                        </div>
                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('curricula.fields.curriculum_type') }}</x-base.form-label>
                                <x-base.form-input type="text" name="curriculum_type" value="{{ old('curriculum_type', '') }}" class="mt-2" />
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('curricula.fields.duration_weeks') }}</x-base.form-label>
                                <x-base.form-input type="number" name="duration_weeks" value="{{ old('duration_weeks', '') }}" class="mt-2" min="1" />
                            </div>
                            <div class="col-span-12">
                                <x-base.form-label>{{ __('curricula.fields.topics') }}</x-base.form-label>
                                <x-base.form-textarea name="topics" rows="4" class="resize-none mt-2" placeholder="{{ __('global.enter_topics_separated_by_commas') }}">{{ old('topics', '') }}</x-base.form-textarea>
                                <small class="text-slate-500">{{ __('global.separate_with_commas') }}</small>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Learning Outcomes Tab -->
                    <div id="learning-outcomes" class="tab-content">
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                <x-base.lucide icon="Award" class="w-5 h-5 me-2 text-blue-600" />
                                {{ __('global.learning_outcomes') }}
                            </h3>
                        </div>
                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-12">
                                <x-base.form-label>{{ __('curricula.fields.objectives') }}</x-base.form-label>
                                <x-base.form-textarea name="objectives" rows="4" class="resize-none mt-2" placeholder="{{ __('global.enter_objectives_separated_by_commas') }}">{{ old('objectives', '') }}</x-base.form-textarea>
                                <small class="text-slate-500">{{ __('global.separate_with_commas') }}</small>
                            </div>
                            <div class="col-span-12">
                                <x-base.form-label>{{ __('curricula.fields.learning_outcomes') }}</x-base.form-label>
                                <x-base.form-textarea name="learning_outcomes" rows="4" class="resize-none mt-2" placeholder="{{ __('global.enter_learning_outcomes_separated_by_commas') }}">{{ old('learning_outcomes', '') }}</x-base.form-textarea>
                                <small class="text-slate-500">{{ __('global.separate_with_commas') }}</small>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Materials and Assessment Tab -->
                    <div id="materials-assessment" class="tab-content">
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                <x-base.lucide icon="Clipboard" class="w-5 h-5 me-2 text-blue-600" />
                                {{ __('global.materials_assessment') }}
                            </h3>
                        </div>
                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mb-4">
                                    <x-base.form-label>{{ __('curricula.fields.materials_needed') }}</x-base.form-label>
                                    <x-base.form-textarea name="materials_needed" rows="4" class="resize-none mt-2" placeholder="{{ __('global.enter_materials_separated_by_commas') }}">{{ old('materials_needed', '') }}</x-base.form-textarea>
                                    <small class="text-slate-500">{{ __('global.separate_with_commas') }}</small>
                                </div>
                            </div>
                            
                            <!-- Connected Materials Section -->
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mb-4">
                                    <x-base.form-label class="font-medium">
                                        <x-base.lucide icon="Package" class="w-4 h-4 inline me-1" />
                                        {{ __('materials.connected_materials') }}
                                    </x-base.form-label>
                                    <div class="mt-2">
                                        <x-base.tom-select name="connected_materials[]" id="connected_materials" multiple>
                                            @foreach($materials as $material)
                                                <option value="{{ $material->id }}" 
                                                    {{ in_array($material->id, old('connected_materials', [])) ? 'selected' : '' }}
                                                    data-category="{{ $material->category }}"
                                                    data-type="{{ $material->type }}">
                                                    {{ $material->name }}
                                                    @if($material->category)
                                                        ({{ $material->category }} - {{ $material->type }})
                                                    @else
                                                        ({{ $material->type }})
                                                    @endif
                                                    @if($material->quantity_available > 0)
                                                        - {{ $material->quantity_formatted }}
                                                    @endif
                                                </option>
                                            @endforeach
                                        </x-base.tom-select>
                                        <div class="mt-2 text-sm text-slate-500">
                                            <x-base.lucide icon="Info" class="w-3 h-3 inline me-1" />
                                            {{ __('materials.hints.multiple_selection') }}
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <x-base.button variant="outline-primary" as="a" href="{{ route('materials.create') }}" target="_blank" size="sm">
                                            <x-base.lucide icon="Plus" class="w-4 h-4 me-1" />
                                            {{ __('materials.create_new') }}
                                        </x-base.button>
                                        <x-base.button variant="outline-secondary" as="a" href="{{ route('materials.index') }}" target="_blank" size="sm" class="ms-2">
                                            <x-base.lucide icon="Package" class="w-4 h-4 me-1" />
                                            {{ __('global.manage') }} {{ __('Materials.title') }}
                                        </x-base.button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-span-12">
                                <x-base.form-label>{{ __('curricula.fields.assessment_methods') }}</x-base.form-label>
                                <x-base.form-textarea name="assessment_methods" rows="4" class="resize-none mt-2" placeholder="{{ __('global.enter_assessment_methods_separated_by_commas') }}">{{ old('assessment_methods', '') }}</x-base.form-textarea>
                                <small class="text-slate-500">{{ __('global.separate_with_commas') }}</small>
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
                                <x-base.form-label>{{ __('curricula.fields.status') }}</x-base.form-label>
                                <x-base.form-select name="status" class="mt-2">
                                    <option value="draft" {{ old('status', '') == 'draft' ? 'selected' : '' }}>{{ __('curricula.status.draft') }}</option>
                                    <option value="active" {{ old('status', '') == 'active' ? 'selected' : '' }}>{{ __('curricula.status.active') }}</option>
                                    <option value="archived" {{ old('status', '') == 'archived' ? 'selected' : '' }}>{{ __('curricula.status.archived') }}</option>
                                </x-base.form-select>
                                @error('status')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('curricula.fields.is_active') }}</x-base.form-label>
                                <div class="mt-2 space-y-2">
                                    <!-- Hidden input to send 0 if unchecked -->
                                    <input type="hidden" name="is_active" value="0">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <x-base.form-input type="checkbox" name="is_active" value="1" {{ old('is_active', false) ? 'checked' : '' }} class="sr-only peer" />
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/30 dark:peer-focus:ring-primary rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"></div>
                                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('global.active') }}</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('curricula.fields.published_at') }}</x-base.form-label>
                                <x-base.form-input type="datetime-local" name="published_at" value="{{ old('published_at', '') }}" class="mt-2" />
                            </div>
                            <div class="col-span-12">
                                <x-base.form-label>{{ __('curricula.fields.prerequisites') }}</x-base.form-label>
                                <x-base.form-textarea name="prerequisites" rows="3" class="resize-none mt-2" placeholder="{{ __('global.enter_prerequisites_separated_by_commas') }}">{{ old('prerequisites', '') }}</x-base.form-textarea>
                                <small class="text-slate-500">{{ __('global.separate_with_commas') }}</small>
                                @error('prerequisites')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-span-12">
                                <x-base.form-label>{{ __('curricula.fields.syllabus') }}</x-base.form-label>
                                <x-base.form-textarea name="syllabus" rows="4" class="resize-none mt-2">{{ old('syllabus', '') }}</x-base.form-textarea>
                                @error('syllabus')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-span-12">
                                <x-base.form-label>{{ __('curricula.fields.learning_objectives') }}</x-base.form-label>
                                <x-base.form-textarea name="learning_objectives" rows="4" class="resize-none mt-2" placeholder="{{ __('global.enter_learning_objectives_separated_by_commas') }}">{{ old('learning_objectives', '') }}</x-base.form-textarea>
                                <small class="text-slate-500">{{ __('global.separate_with_commas') }}</small>
                                @error('learning_objectives')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex justify-between mt-5">
                        <a href="{{ route('curricula.index') }}" class="btn btn-outline-secondary w-24 me-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.save') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');

            tabButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const tabId = this.getAttribute('data-tab');

                    // Remove active class from all buttons and contents
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active'));

                    // Add active class to clicked button and corresponding content
                    this.classList.add('active');
                    document.getElementById(tabId).classList.add('active');
                });
            });

            // Simple fill demo data function
            window.fillDemoData = function() {
                // Helper to set value
                function setVal(name, value) {
                    var el = document.querySelector('input[name="' + name + '"]');
                    if (el) el.value = value;
                    var ta = document.querySelector('textarea[name="' + name + '"]');
                    if (ta) ta.value = value;
                    var sel = document.querySelector('select[name="' + name + '"]');
                    if (sel) sel.value = value;
                }

                // Fill all fields
                setVal('name', 'منهج اللغة العربية - المستوى الأول');
                setVal('code', 'CUR-ARB-' + Math.floor(1000 + Math.random() * 9000));
                setVal('description', 'منهج شامل لتعليم اللغة العربية للأطفال في مرحلة الروضة، يتضمن مهارات القراءة والكتابة والتعبير الشفهي.');
                setVal('grade_level', 'kindergarten');
                setVal('subject_area', 'language');
                setVal('curriculum_type', 'standard');
                setVal('duration_weeks', '12');
                setVal('topics', 'الحروف الهجائية, الكلمات البسيطة, الجمل القصيرة, القراءة الجهرية, الكتابة الأساسية');
                setVal('objectives', 'تعلم الحروف العربية, قراءة الكلمات البسيطة, كتابة الحروف والكلمات, التعبير الشفهي');
                setVal('learning_outcomes', 'إتقان الحروف الهجائية, قراءة جمل بسيطة, كتابة الاسم, التحدث بثقة');
                setVal('materials_needed', 'كتب تعليمية, أوراق عمل, أقلام ملونة, سبورة بيضاء, مغناطيسات حروف');
                setVal('assessment_methods', 'اختبارات شفهية, واجبات يومية, مشاريع فنية, ملاحظة الأداء');
                setVal('prerequisites', 'معرفة أساسية بالألوان, القدرة على التركيز 15 دقيقة');
                setVal('syllabus', 'الأسبوع 1-2: الحروف الهجائية\nالأسبوع 3-4: الكلمات البسيطة\nالأسبوع 5-6: الجمل القصيرة\nالأسبوع 7-8: القراءة الجهرية\nالأسبوع 9-10: الكتابة الأساسية\nالأسبوع 11-12: المراجعة والتقييم');
                setVal('learning_objectives', 'فهم الحروف والكلمات, التطبيق العملي على الكتابة, التقييم الذاتي');
                setVal('status', 'active');
                setVal('published_at', new Date().toISOString().slice(0, 16));

                // Handle checkbox
                var cb = document.querySelector('input[type="checkbox"][name="is_active"]');
                if (cb) cb.checked = true;
                var hid = document.querySelector('input[type="hidden"][name="is_active"]');
                if (hid) hid.value = '1';

                // Show feedback
                var btn = event.target.closest('button');
                if (btn) {
                    var orig = btn.innerHTML;
                    btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 me-2"><polyline points="20 6 9 17 4 12"></polyline></svg> {{ __("global.filled") }}';
                    btn.classList.remove('btn-outline-secondary');
                    btn.classList.add('btn-success');
                    setTimeout(function() {
                        btn.innerHTML = orig;
                        btn.classList.remove('btn-success');
                        btn.classList.add('btn-outline-secondary');
                    }, 2000);
                }
            };
        });
    </script>
@endsection