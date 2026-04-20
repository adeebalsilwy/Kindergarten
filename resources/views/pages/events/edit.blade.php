@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Event.edit') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('Event.edit') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('events.fields.title') }}" 
                                name="title" 
                                value="{{ old('title', $event->title) }}" 
                                placeholder="{{ __('events.fields.title') }}" 
                            />
                        </div>
                        <div class="col-span-12">
                            <x-form-field 
                                label="{{ __('events.fields.description') }}" 
                                name="description" 
                                type="textarea" 
                                value="{{ old('description', $event->description) }}" 
                                placeholder="{{ __('events.fields.description') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('events.fields.start_datetime') }}" 
                                name="start_datetime" 
                                type="datetime-local" 
                                value="{{ old('start_datetime', $event->start_datetime ? $event->start_datetime->format('Y-m-d\TH:i') : '') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('events.fields.end_datetime') }}" 
                                name="end_datetime" 
                                type="datetime-local" 
                                value="{{ old('end_datetime', $event->end_datetime ? $event->end_datetime->format('Y-m-d\TH:i') : '') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('events.fields.location') }}" 
                                name="location" 
                                value="{{ old('location', $event->location) }}" 
                                placeholder="{{ __('events.fields.location') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('events.fields.event_type') }}" 
                                name="event_type" 
                                value="{{ old('event_type', $event->event_type) }}" 
                                placeholder="{{ __('events.fields.event_type') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('events.fields.organizer') }}" 
                                name="organizer" 
                                value="{{ old('organizer', $event->organizer) }}" 
                                placeholder="{{ __('events.fields.organizer') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('events.fields.class_id') }}" 
                                name="class_id" 
                                type="select" 
                                :options="$classes->pluck('name', 'id')->toArray()" 
                                value="{{ old('class_id', $event->class_id) }}" 
                                placeholder="{{ __('global.select_class') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('events.fields.teacher_id') }}" 
                                name="teacher_id" 
                                type="select" 
                                :options="$teachers->pluck('name', 'id')->toArray()" 
                                value="{{ old('teacher_id', $event->teacher_id) }}" 
                                placeholder="{{ __('global.select_teacher') }}" 
                            />
                        </div>
                        <div class="col-span-12">
                            <x-form-field 
                                label="{{ __('events.fields.attendees') }}" 
                                name="attendees" 
                                type="textarea" 
                                value="{{ old('attendees', $event->attendees) }}" 
                                placeholder="{{ __('events.fields.attendees') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-4">
                            <x-form-field 
                                label="{{ __('events.fields.requires_confirmation') }}" 
                                name="requires_confirmation" 
                                type="checkbox" 
                                value="{{ old('requires_confirmation', $event->requires_confirmation) }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-4">
                            <x-form-field 
                                label="{{ __('events.fields.is_public') }}" 
                                name="is_public" 
                                type="checkbox" 
                                value="{{ old('is_public', $event->is_public) }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-4">
                            <x-form-field 
                                label="{{ __('events.fields.is_recurring') }}" 
                                name="is_recurring" 
                                type="checkbox" 
                                value="{{ old('is_recurring', $event->is_recurring) }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('events.fields.recurrence_pattern') }}" 
                                name="recurrence_pattern" 
                                value="{{ old('recurrence_pattern', $event->recurrence_pattern) }}" 
                                placeholder="{{ __('events.fields.recurrence_pattern') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('events.fields.recurrence_end_date') }}" 
                                name="recurrence_end_date" 
                                type="date" 
                                value="{{ old('recurrence_end_date', $event->recurrence_end_date ? $event->recurrence_end_date->format('Y-m-d') : '') }}" 
                            />
                        </div>
                        <div class="col-span-12">
                            <x-form-field 
                                label="{{ __('events.fields.children') }}" 
                                name="child_ids[]" 
                                type="select" 
                                :options="$children->pluck('name', 'id')->toArray()" 
                                :value="old('child_ids', $event->children->pluck('id')->toArray())" 
                                multiple="true" 
                                placeholder="{{ __('global.select_children') }}" 
                            />
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <a href="{{ route('events.index') }}" class="btn btn-outline-secondary w-24 me-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.update') }}</x-base.button>
                    </div>
                </form>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('events.fields.status') }}</x-base.form-label>
                            <x-base.tom-select name="status" class="mt-2">
                                <option value="">{{ __('global.select_option') }}</option>
                                <option value="active" {{ old('status', $event->status ?? '') == 'active' ? 'selected' : '' }}>{{ __('global.active') }}</option>
                                <option value="inactive" {{ old('status', $event->status ?? '') == 'inactive' ? 'selected' : '' }}>{{ __('global.inactive') }}</option>
                                <option value="pending" {{ old('status', $event->status ?? '') == 'pending' ? 'selected' : '' }}>{{ __('global.pending') }}</option>
                                <option value="draft" {{ old('status', $event->status ?? '') == 'draft' ? 'selected' : '' }}>{{ __('global.draft') }}</option>
                            </x-base.tom-select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('events.fields.send_reminders') }}</x-base.form-label>
                            <div class="mt-2 space-y-2">
                                <!-- Hidden input to send 0 if unchecked -->
                                <input type="hidden" name="send_reminders" value="0">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <x-base.form-input type="checkbox" name="send_reminders" value="1" {{ old('send_reminders', $event->send_reminders ?? false) ? 'checked' : '' }} class="sr-only peer" />
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/30 dark:peer-focus:ring-primary rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"></div>
                                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('global.active') }}</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('events.fields.reminder_hours_before') }}</x-base.form-label>
                            <x-base.form-input type="number" name="reminder_hours_before" value="{{ old('reminder_hours_before', $event->reminder_hours_before ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('events.fields.documents') }}</x-base.form-label>
                            <x-base.form-textarea name="documents" rows="4" class="resize-none">{{ old('documents', $event->documents ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('events.fields.notes') }}</x-base.form-label>
                            <x-base.form-textarea name="notes" rows="4" class="resize-none">{{ old('notes', $event->notes ?? '') }}</x-base.form-textarea>
                        </div>

                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="{{ route('events.index') }}" class="btn btn-outline-secondary w-24 me-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.update') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
