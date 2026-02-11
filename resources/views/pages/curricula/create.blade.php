@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Curriculum.add_new') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('Curriculum.add_new') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('curricula.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
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
                            <x-base.form-textarea name="description" rows="4" class="resize-none">{{ old('description', $curriculum->description ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('curricula.fields.objectives') }}</x-base.form-label>
                            <x-base.form-textarea name="objectives" rows="4" class="resize-none">{{ old('objectives', $curriculum->objectives ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('curricula.fields.learning_outcomes') }}</x-base.form-label>
                            <x-base.form-textarea name="learning_outcomes" rows="4" class="resize-none">{{ old('learning_outcomes', $curriculum->learning_outcomes ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('curricula.fields.grade_level') }}</x-base.form-label>
                            <x-base.form-input type="text" name="grade_level" value="{{ old('grade_level', $curriculum->grade_level ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('curricula.fields.subject_area') }}</x-base.form-label>
                            <x-base.form-input type="text" name="subject_area" value="{{ old('subject_area', $curriculum->subject_area ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('curricula.fields.topics') }}</x-base.form-label>
                            <x-base.form-textarea name="topics" rows="4" class="resize-none">{{ old('topics', $curriculum->topics ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('curricula.fields.materials_needed') }}</x-base.form-label>
                            <x-base.form-textarea name="materials_needed" rows="4" class="resize-none">{{ old('materials_needed', $curriculum->materials_needed ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('curricula.fields.curriculum_type') }}</x-base.form-label>
                            <x-base.form-input type="text" name="curriculum_type" value="{{ old('curriculum_type', $curriculum->curriculum_type ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('curricula.fields.duration_weeks') }}</x-base.form-label>
                            <x-base.form-input type="number" name="duration_weeks" value="{{ old('duration_weeks', $curriculum->duration_weeks ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('curricula.fields.assessment_methods') }}</x-base.form-label>
                            <x-base.form-textarea name="assessment_methods" rows="4" class="resize-none">{{ old('assessment_methods', $curriculum->assessment_methods ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('curricula.fields.is_active') }}</x-base.form-label>
                            <div class="mt-2 space-y-2">
                                <!-- Hidden input to send 0 if unchecked -->
                                <input type="hidden" name="is_active" value="0">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <x-base.form-input type="checkbox" name="is_active" value="1" {{ old('is_active', $curriculum->is_active ?? false) ? 'checked' : '' }} class="sr-only peer" />
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/30 dark:peer-focus:ring-primary rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('global.active') }}</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('curricula.fields.published_at') }}</x-base.form-label>
                            <x-base.form-input type="datetime-local" name="published_at" value="{{ old('published_at', $curriculum->published_at ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('curricula.fields.created_by') }}</x-base.form-label>
                            <x-base.form-input type="text" name="created_by" value="{{ old('created_by', $curriculum->created_by ?? '') }}" class="mt-2" />
                        </div>

                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="{{ route('curricula.index') }}" class="btn btn-outline-secondary w-24 mr-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.save') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
