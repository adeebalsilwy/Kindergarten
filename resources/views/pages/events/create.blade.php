@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Event.add_new') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('Event.add_new') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('events.fields.title') }}" 
                                name="title" 
                                value="{{ old('title') }}" 
                                required="true" 
                                placeholder="{{ __('events.fields.title') }}" 
                            />
                        </div>
                        <div class="col-span-12">
                            <x-form-field 
                                label="{{ __('events.fields.description') }}" 
                                name="description" 
                                type="textarea" 
                                value="{{ old('description') }}" 
                                placeholder="{{ __('events.fields.description') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('events.fields.start_datetime') }}" 
                                name="start_datetime" 
                                type="datetime-local" 
                                value="{{ old('start_datetime') }}" 
                                required="true" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('events.fields.end_datetime') }}" 
                                name="end_datetime" 
                                type="datetime-local" 
                                value="{{ old('end_datetime') }}" 
                                required="true" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('events.fields.location') }}" 
                                name="location" 
                                value="{{ old('location') }}" 
                                required="true" 
                                placeholder="{{ __('events.fields.location') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('events.fields.event_type') }}" 
                                name="event_type" 
                                value="{{ old('event_type') }}" 
                                required="true" 
                                placeholder="{{ __('events.fields.event_type') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('events.fields.organizer') }}" 
                                name="organizer" 
                                value="{{ old('organizer') }}" 
                                placeholder="{{ __('events.fields.organizer') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('events.fields.class_id') }}" 
                                name="class_id" 
                                type="select" 
                                :options="$classes->pluck('name', 'id')->toArray()" 
                                value="{{ old('class_id') }}" 
                                placeholder="{{ __('global.select_class') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('events.fields.teacher_id') }}" 
                                name="teacher_id" 
                                type="select" 
                                :options="$teachers->pluck('name', 'id')->toArray()" 
                                value="{{ old('teacher_id') }}" 
                                placeholder="{{ __('global.select_teacher') }}" 
                            />
                        </div>
                        <div class="col-span-12">
                            <x-form-field 
                                label="{{ __('events.fields.attendees') }}" 
                                name="attendees" 
                                type="textarea" 
                                value="{{ old('attendees') }}" 
                                placeholder="{{ __('events.fields.attendees') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-4">
                            <x-form-field 
                                label="{{ __('events.fields.requires_confirmation') }}" 
                                name="requires_confirmation" 
                                type="checkbox" 
                                value="{{ old('requires_confirmation', 0) }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-4">
                            <x-form-field 
                                label="{{ __('events.fields.is_public') }}" 
                                name="is_public" 
                                type="checkbox" 
                                value="{{ old('is_public', 1) }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-4">
                            <x-form-field 
                                label="{{ __('events.fields.is_recurring') }}" 
                                name="is_recurring" 
                                type="checkbox" 
                                value="{{ old('is_recurring', 0) }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('events.fields.recurrence_pattern') }}" 
                                name="recurrence_pattern" 
                                value="{{ old('recurrence_pattern') }}" 
                                placeholder="{{ __('events.fields.recurrence_pattern') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('events.fields.recurrence_end_date') }}" 
                                name="recurrence_end_date" 
                                type="date" 
                                value="{{ old('recurrence_end_date') }}" 
                            />
                        </div>
                        <div class="col-span-12">
                            <x-form-field 
                                label="{{ __('events.fields.children') }}" 
                                name="child_ids[]" 
                                type="select" 
                                :options="$children->pluck('name', 'id')->toArray()" 
                                :value="old('child_ids', [])" 
                                multiple="true" 
                                placeholder="{{ __('global.select_children') }}" 
                            />
                        </div>
                    </div>
                    <div class="flex justify-end mt-5">
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.save') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
