@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Curriculum.edit') }} - Laravel</title>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/pages/curricula.css') }}">
    <style>
        .tab-content { display: none; }
        .tab-content.active { display: block; }
        .tab-button.active { background-color: #3b82f6; color: white; }
    </style>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('Curriculum.edit') }}</h2>
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
                <form action="{{ route('curricula.update', $curriculum->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

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
                                <x-base.form-input type="text" name="name" value="{{ old('name', $curriculum->name ?? '') }}" class="mt-2" />
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('curricula.fields.code') }}</x-base.form-label>
                                <x-base.form-input type="text" name="code" value="{{ old('code', $curriculum->code ?? '') }}" class="mt-2" />
                            </div>
                            <div class="col-span-12">
                                <x-base.form-label>{{ __('curricula.fields.description') }}</x-base.form-label>
                                <x-base.form-textarea name="description" rows="4" class="resize-none mt-2">{{ old('description', $curriculum->description ?? '') }}</x-base.form-textarea>
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('curricula.fields.grade_level') }}</x-base.form-label>
                                <x-base.form-input type="text" name="grade_level" value="{{ old('grade_level', $curriculum->grade_level ?? '') }}" class="mt-2" />
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('curricula.fields.subject_area') }}</x-base.form-label>
                                <x-base.form-input type="text" name="subject_area" value="{{ old('subject_area', $curriculum->subject_area ?? '') }}" class="mt-2" />
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
                                <x-base.form-input type="text" name="curriculum_type" value="{{ old('curriculum_type', $curriculum->curriculum_type ?? '') }}" class="mt-2" />
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('curricula.fields.duration_weeks') }}</x-base.form-label>
                                <x-base.form-input type="number" name="duration_weeks" value="{{ old('duration_weeks', $curriculum->duration_weeks ?? '') }}" class="mt-2" min="1" />
                            </div>
                            <div class="col-span-12">
                                <x-base.form-label>{{ __('curricula.fields.topics') }}</x-base.form-label>
                                <x-base.form-textarea name="topics" rows="4" class="resize-none mt-2" placeholder="{{ __('global.enter_topics_separated_by_commas') }}">{{ old('topics', is_array($curriculum->topics) ? implode(', ', $curriculum->topics) : ($curriculum->topics ?? '')) }}</x-base.form-textarea>
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
                                <x-base.form-textarea name="objectives" rows="4" class="resize-none mt-2" placeholder="{{ __('global.enter_objectives_separated_by_commas') }}">{{ old('objectives', is_array($curriculum->objectives) ? implode(', ', $curriculum->objectives) : ($curriculum->objectives ?? '')) }}</x-base.form-textarea>
                                <small class="text-slate-500">{{ __('global.separate_with_commas') }}</small>
                            </div>
                            <div class="col-span-12">
                                <x-base.form-label>{{ __('curricula.fields.learning_outcomes') }}</x-base.form-label>
                                <x-base.form-textarea name="learning_outcomes" rows="4" class="resize-none mt-2" placeholder="{{ __('global.enter_learning_outcomes_separated_by_commas') }}">{{ old('learning_outcomes', is_array($curriculum->learning_outcomes) ? implode(', ', $curriculum->learning_outcomes) : ($curriculum->learning_outcomes ?? '')) }}</x-base.form-textarea>
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
                                    <x-base.form-textarea name="materials_needed" rows="4" class="resize-none mt-2" placeholder="{{ __('global.enter_materials_separated_by_commas') }}">{{ old('materials_needed', is_array($curriculum->materials_needed) ? implode(', ', $curriculum->materials_needed) : ($curriculum->materials_needed ?? '')) }}</x-base.form-textarea>
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
                                                    {{ in_array($material->id, old('connected_materials', $curriculum->materials->pluck('id')->toArray())) ? 'selected' : '' }}
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

                                    <!-- Current connected materials preview -->
                                    @if($curriculum->materials->count() > 0)
                                    <div class="mt-4 p-3 bg-slate-50 rounded-lg dark:bg-slate-800">
                                        <h4 class="text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                            {{ __('materials.currently_connected') }} ({{ $curriculum->materials->count() }}):
                                        </h4>
                                        <div class="flex flex-wrap gap-1">
                                            @foreach($curriculum->materials as $material)
                                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-primary/10 text-primary">
                                                    {{ $material->name }}
                                                    @if($material->quantity_available > 0)
                                                        <span class="ms-1 text-xs">({{ $material->quantity_available }})</span>
                                                    @endif
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-span-12">
                                <x-base.form-label>{{ __('curricula.fields.assessment_methods') }}</x-base.form-label>
                                <x-base.form-textarea name="assessment_methods" rows="4" class="resize-none mt-2" placeholder="{{ __('global.enter_assessment_methods_separated_by_commas') }}">{{ old('assessment_methods', is_array($curriculum->assessment_methods) ? implode(', ', $curriculum->assessment_methods) : ($curriculum->assessment_methods ?? '')) }}</x-base.form-textarea>
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
                                    <option value="draft" {{ old('status', $curriculum->status ?? '') == 'draft' ? 'selected' : '' }}>{{ __('curricula.status.draft') }}</option>
                                    <option value="active" {{ old('status', $curriculum->status ?? '') == 'active' ? 'selected' : '' }}>{{ __('curricula.status.active') }}</option>
                                    <option value="archived" {{ old('status', $curriculum->status ?? '') == 'archived' ? 'selected' : '' }}>{{ __('curricula.status.archived') }}</option>
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
                                        <x-base.form-input type="checkbox" name="is_active" value="1" {{ old('is_active', $curriculum->is_active ?? false) ? 'checked' : '' }} class="sr-only peer" />
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/30 dark:peer-focus:ring-primary rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"></div>
                                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('global.active') }}</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('curricula.fields.published_at') }}</x-base.form-label>
                                <x-base.form-input type="datetime-local" name="published_at" value="{{ old('published_at', $curriculum->published_at ?? '') }}" class="mt-2" />
                            </div>
                            <div class="col-span-12">
                                <x-base.form-label>{{ __('curricula.fields.prerequisites') }}</x-base.form-label>
                                <x-base.form-textarea name="prerequisites" rows="3" class="resize-none mt-2" placeholder="{{ __('global.enter_prerequisites_separated_by_commas') }}">{{ old('prerequisites', is_array($curriculum->prerequisites) ? implode(', ', $curriculum->prerequisites) : ($curriculum->prerequisites ?? '')) }}</x-base.form-textarea>
                                <small class="text-slate-500">{{ __('global.separate_with_commas') }}</small>
                                @error('prerequisites')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-span-12">
                                <x-base.form-label>{{ __('curricula.fields.syllabus') }}</x-base.form-label>
                                <x-base.form-textarea name="syllabus" rows="4" class="resize-none mt-2">{{ old('syllabus', $curriculum->syllabus ?? '') }}</x-base.form-textarea>
                                @error('syllabus')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-span-12">
                                <x-base.form-label>{{ __('curricula.fields.learning_objectives') }}</x-base.form-label>
                                <x-base.form-textarea name="learning_objectives" rows="4" class="resize-none mt-2" placeholder="{{ __('global.enter_learning_objectives_separated_by_commas') }}">{{ old('learning_objectives', is_array($curriculum->learning_objectives) ? implode(', ', $curriculum->learning_objectives) : ($curriculum->learning_objectives ?? '')) }}</x-base.form-textarea>
                                <small class="text-slate-500">{{ __('global.separate_with_commas') }}</small>
                                @error('learning_objectives')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between mt-5">
                        <a href="{{ route('curricula.index') }}" class="btn btn-outline-secondary w-24 me-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.update') }}</x-base.button>
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
        });
    </script>
@endsection
