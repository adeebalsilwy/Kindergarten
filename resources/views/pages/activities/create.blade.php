@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Activity.add_new') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('Activity.add_new') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('activities.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('activities.fields.title') }}" 
                                name="title" 
                                value="{{ old('title', $activity->title ?? '') }}" 
                                placeholder="{{ __('activities.fields.title') }}" 
                            />
                        </div>
                        <div class="col-span-12">
                            <x-form-field 
                                label="{{ __('activities.fields.description') }}" 
                                name="description" 
                                type="textarea" 
                                value="{{ old('description', $activity->description ?? '') }}" 
                                placeholder="{{ __('activities.fields.description') }}" 
                            />
                        </div>
                        <div class="col-span-12">
                            <x-form-field 
                                label="{{ __('activities.fields.instructions') }}" 
                                name="instructions" 
                                type="textarea" 
                                value="{{ old('instructions', $activity->instructions ?? '') }}" 
                                placeholder="{{ __('activities.fields.instructions') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('activities.fields.class_id') }}" 
                                name="class_id" 
                                type="select" 
                                :options="$classes->pluck('name', 'id')->toArray()" 
                                value="{{ old('class_id', $activity->class_id ?? '') }}" 
                                placeholder="{{ __('global.select_class') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('activities.fields.teacher_id') }}" 
                                name="teacher_id" 
                                type="select" 
                                :options="$teachers->pluck('name', 'id')->toArray()" 
                                value="{{ old('teacher_id', $activity->teacher_id ?? '') }}" 
                                placeholder="{{ __('global.select_teacher') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('activities.fields.curriculum_id') }}" 
                                name="curriculum_id" 
                                type="select" 
                                :options="$curricula->pluck('title', 'id')->toArray()" 
                                value="{{ old('curriculum_id', $activity->curriculum_id ?? '') }}" 
                                placeholder="{{ __('global.select_curriculum') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('activities.fields.scheduled_date') }}" 
                                name="scheduled_date" 
                                type="date" 
                                value="{{ old('scheduled_date', $activity->scheduled_date ?? '') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('activities.fields.start_time') }}" 
                                name="start_time" 
                                type="time" 
                                value="{{ old('start_time', $activity->start_time ?? '') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('activities.fields.end_time') }}" 
                                name="end_time" 
                                type="time" 
                                value="{{ old('end_time', $activity->end_time ?? '') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('activities.fields.activity_type') }}" 
                                name="activity_type" 
                                value="{{ old('activity_type', $activity->activity_type ?? '') }}" 
                                placeholder="{{ __('activities.fields.activity_type') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('activities.fields.difficulty_level') }}" 
                                name="difficulty_level" 
                                value="{{ old('difficulty_level', $activity->difficulty_level ?? '') }}" 
                                placeholder="{{ __('activities.fields.difficulty_level') }}" 
                            />
                        </div>
                        <div class="col-span-12">
                            <x-form-field 
                                label="{{ __('activities.fields.required_materials') }}" 
                                name="required_materials" 
                                type="textarea" 
                                value="{{ old('required_materials', $activity->required_materials ?? '') }}" 
                                placeholder="{{ __('global.enter_comma_separated_values') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('activities.fields.estimated_duration') }}" 
                                name="estimated_duration" 
                                type="number" 
                                value="{{ old('estimated_duration', $activity->estimated_duration ?? '') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('activities.fields.location') }}" 
                                name="location" 
                                value="{{ old('location', $activity->location ?? '') }}" 
                                placeholder="{{ __('activities.fields.location') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('activities.fields.is_active') }}" 
                                name="is_active" 
                                type="checkbox" 
                                value="{{ old('is_active', $activity->is_active ?? 1) }}" 
                                placeholder="{{ __('global.active') }}" 
                            />
                        </div>
                        <div class="col-span-12">
                            <x-form-field 
                                label="{{ __('activities.fields.learning_objectives') }}" 
                                name="learning_objectives" 
                                type="textarea" 
                                value="{{ old('learning_objectives', $activity->learning_objectives ?? '') }}" 
                                placeholder="{{ __('global.enter_comma_separated_values') }}" 
                            />
                        </div>
                        <div class="col-span-12">
                            <x-form-field 
                                label="{{ __('activities.fields.outcomes') }}" 
                                name="outcomes" 
                                type="textarea" 
                                value="{{ old('outcomes', $activity->outcomes ?? '') }}" 
                                placeholder="{{ __('global.enter_comma_separated_values') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('activities.fields.completed_at') }}" 
                                name="completed_at" 
                                type="datetime-local" 
                                value="{{ old('completed_at', $activity->completed_at ?? '') }}" 
                            />
                        </div>
                        <div class="col-span-12">
                            <x-form-field 
                                label="{{ __('activities.fields.notes') }}" 
                                name="notes" 
                                type="textarea" 
                                value="{{ old('notes', $activity->notes ?? '') }}" 
                                placeholder="{{ __('activities.fields.notes') }}" 
                            />
                        </div>
                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="{{ route('activities.index') }}" class="btn btn-outline-secondary w-24 me-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.save') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
