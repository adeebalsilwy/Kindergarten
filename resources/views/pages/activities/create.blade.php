@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Activity.add_new') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('Activity.add_new') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('activities.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('activities.fields.title') }}</x-base.form-label>
                            <x-base.form-input type="text" name="title" value="{{ old('title', $activity->title ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('activities.fields.description') }}</x-base.form-label>
                            <x-base.form-textarea name="description" rows="4" class="resize-none">{{ old('description', $activity->description ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('activities.fields.instructions') }}</x-base.form-label>
                            <x-base.form-textarea name="instructions" rows="4" class="resize-none">{{ old('instructions', $activity->instructions ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('activities.fields.class_id') }}</x-base.form-label>
                            <x-base.form-input type="text" name="class_id" value="{{ old('class_id', $activity->class_id ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('activities.fields.teacher_id') }}</x-base.form-label>
                            <x-base.form-input type="text" name="teacher_id" value="{{ old('teacher_id', $activity->teacher_id ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('activities.fields.curriculum_id') }}</x-base.form-label>
                            <x-base.form-input type="text" name="curriculum_id" value="{{ old('curriculum_id', $activity->curriculum_id ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('activities.fields.scheduled_date') }}</x-base.form-label>
                            <x-base.form-input type="date" name="scheduled_date" value="{{ old('scheduled_date', $activity->scheduled_date ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('activities.fields.start_time') }}</x-base.form-label>
                            <div class="relative mt-2">
                                <x-base.form-input type="time" name="start_time" value="{{ old('start_time', $activity->start_time ?? '') }}" />
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <x-base.lucide icon="Clock" class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('activities.fields.end_time') }}</x-base.form-label>
                            <div class="relative mt-2">
                                <x-base.form-input type="time" name="end_time" value="{{ old('end_time', $activity->end_time ?? '') }}" />
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <x-base.lucide icon="Clock" class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('activities.fields.activity_type') }}</x-base.form-label>
                            <x-base.form-input type="text" name="activity_type" value="{{ old('activity_type', $activity->activity_type ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('activities.fields.difficulty_level') }}</x-base.form-label>
                            <x-base.form-input type="text" name="difficulty_level" value="{{ old('difficulty_level', $activity->difficulty_level ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('activities.fields.required_materials') }}</x-base.form-label>
                            <x-base.form-textarea name="required_materials" rows="4" class="resize-none">{{ old('required_materials', $activity->required_materials ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('activities.fields.estimated_duration') }}</x-base.form-label>
                            <x-base.form-input type="number" name="estimated_duration" value="{{ old('estimated_duration', $activity->estimated_duration ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('activities.fields.location') }}</x-base.form-label>
                            <x-base.form-input type="text" name="location" value="{{ old('location', $activity->location ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('activities.fields.is_active') }}</x-base.form-label>
                            <div class="mt-2 space-y-2">
                                <!-- Hidden input to send 0 if unchecked -->
                                <input type="hidden" name="is_active" value="0">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <x-base.form-input type="checkbox" name="is_active" value="1" {{ old('is_active', $activity->is_active ?? false) ? 'checked' : '' }} class="sr-only peer" />
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/30 dark:peer-focus:ring-primary rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('global.active') }}</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('activities.fields.learning_objectives') }}</x-base.form-label>
                            <x-base.form-textarea name="learning_objectives" rows="4" class="resize-none">{{ old('learning_objectives', $activity->learning_objectives ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('activities.fields.outcomes') }}</x-base.form-label>
                            <x-base.form-textarea name="outcomes" rows="4" class="resize-none">{{ old('outcomes', $activity->outcomes ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('activities.fields.completed_at') }}</x-base.form-label>
                            <x-base.form-input type="datetime-local" name="completed_at" value="{{ old('completed_at', $activity->completed_at ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('activities.fields.notes') }}</x-base.form-label>
                            <x-base.form-textarea name="notes" rows="4" class="resize-none">{{ old('notes', $activity->notes ?? '') }}</x-base.form-textarea>
                        </div>

                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="{{ route('activities.index') }}" class="btn btn-outline-secondary w-24 mr-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.save') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
