@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Classes.edit') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('Classes.edit') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('classes.update', $classes->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.name') }}</x-base.form-label>
                            <x-base.form-input type="text" name="name" value="{{ old('name', $classes->name ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.code') }}</x-base.form-label>
                            <x-base.form-input type="text" name="code" value="{{ old('code', $classes->code ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('classes.fields.description') }}</x-base.form-label>
                            <x-base.form-textarea name="description" rows="4" class="resize-none">{{ old('description', $classes->description ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.teacher_id') }}</x-base.form-label>
                            <x-base.form-input type="text" name="teacher_id" value="{{ old('teacher_id', $classes->teacher_id ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.age_group') }}</x-base.form-label>
                            <x-base.tom-select name="age_group" class="mt-2">
                                <option value="">{{ __('global.select_option') }}</option>
                                <option value="option1" {{ old('age_group', $classes->age_group ?? '') == 'option1' ? 'selected' : '' }}>Option 1</option>
                                <option value="option2" {{ old('age_group', $classes->age_group ?? '') == 'option2' ? 'selected' : '' }}>Option 2</option>
                                <option value="option3" {{ old('age_group', $classes->age_group ?? '') == 'option3' ? 'selected' : '' }}>Option 3</option>
                            </x-base.tom-select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.capacity') }}</x-base.form-label>
                            <x-base.form-input type="number" name="capacity" value="{{ old('capacity', $classes->capacity ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.current_students') }}</x-base.form-label>
                            <x-base.form-input type="number" name="current_students" value="{{ old('current_students', $classes->current_students ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.start_time') }}</x-base.form-label>
                            <div class="relative mt-2">
                                <x-base.form-input type="time" name="start_time" value="{{ old('start_time', $classes->start_time ?? '') }}" />
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <x-base.lucide icon="Clock" class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.end_time') }}</x-base.form-label>
                            <div class="relative mt-2">
                                <x-base.form-input type="time" name="end_time" value="{{ old('end_time', $classes->end_time ?? '') }}" />
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <x-base.lucide icon="Clock" class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.room_number') }}</x-base.form-label>
                            <x-base.form-input type="text" name="room_number" value="{{ old('room_number', $classes->room_number ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.monthly_fee') }}</x-base.form-label>
                            <x-base.form-input type="number" step="0.01" name="monthly_fee" value="{{ old('monthly_fee', $classes->monthly_fee ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.is_active') }}</x-base.form-label>
                            <div class="mt-2 space-y-2">
                                <!-- Hidden input to send 0 if unchecked -->
                                <input type="hidden" name="is_active" value="0">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <x-base.form-input type="checkbox" name="is_active" value="1" {{ old('is_active', $classes->is_active ?? false) ? 'checked' : '' }} class="sr-only peer" />
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/30 dark:peer-focus:ring-primary rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('global.active') }}</span>
                                </label>
                            </div>
                        </div>

                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="{{ route('classes.index') }}" class="btn btn-outline-secondary w-24 mr-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.update') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
