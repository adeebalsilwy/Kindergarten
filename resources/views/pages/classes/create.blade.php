@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Classes.add_new') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('Classes.add_new') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('classes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.name') }}</x-base.form-label>
                            <x-base.form-input type="text" name="name" value="{{ old('name', $classes->name ?? '') }}" class="mt-2" />
                            @error('name')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.code') }}</x-base.form-label>
                            <x-base.form-input type="text" name="code" value="{{ old('code', $classes->code ?? '') }}" class="mt-2" />
                            @error('code')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('classes.fields.description') }}</x-base.form-label>
                            <x-base.form-textarea name="description" rows="4" class="resize-none">{{ old('description', $classes->description ?? '') }}</x-base.form-textarea>
                            @error('description')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.teacher_id') }}</x-base.form-label>
                            <x-base.tom-select name="teacher_id" class="mt-2" data-placeholder="{{ __('global.select_option') }}">
                                <option value="">{{ __('global.select_option') }}</option>
                                @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" {{ old('teacher_id', $classes->teacher_id ?? '') == $teacher->id ? 'selected' : '' }}>
                                        {{ $teacher->name }}
                                    </option>
                                @endforeach
                            </x-base.tom-select>
                            @error('teacher_id')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.grade_id') }}</x-base.form-label>
                            <x-base.tom-select name="grade_id" class="mt-2" data-placeholder="{{ __('global.select_option') }}">
                                <option value="">{{ __('global.select_option') }}</option>
                                @foreach($grades as $grade)
                                    <option value="{{ $grade->id }}" {{ old('grade_id', $classes->grade_id ?? '') == $grade->id ? 'selected' : '' }}>
                                        {{ $grade->name }}
                                    </option>
                                @endforeach
                            </x-base.tom-select>
                            @error('grade_id')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.age_group') }}</x-base.form-label>
                            <x-base.tom-select name="age_group" class="mt-2">
                                <option value="">{{ __('global.select_option') }}</option>
                                <option value="toddlers" {{ old('age_group', $classes->age_group ?? '') == 'toddlers' ? 'selected' : '' }}>{{ __('classes.age_groups.toddlers') }}</option>
                                <option value="preschool" {{ old('age_group', $classes->age_group ?? '') == 'preschool' ? 'selected' : '' }}>{{ __('classes.age_groups.preschool') }}</option>
                                <option value="pre_k" {{ old('age_group', $classes->age_group ?? '') == 'pre_k' ? 'selected' : '' }}>{{ __('classes.age_groups.pre_k') }}</option>
                                <option value="kindergarten" {{ old('age_group', $classes->age_group ?? '') == 'kindergarten' ? 'selected' : '' }}>{{ __('classes.age_groups.kindergarten') }}</option>
                            </x-base.tom-select>
                            @error('age_group')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.capacity') }}</x-base.form-label>
                            <x-base.form-input type="number" name="capacity" value="{{ old('capacity', $classes->capacity ?? '') }}" class="mt-2" />
                            @error('capacity')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.current_students') }}</x-base.form-label>
                            <x-base.form-input type="number" name="current_students" value="{{ old('current_students', $classes->current_students ?? '') }}" class="mt-2" />
                            @error('current_students')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.start_time') }}</x-base.form-label>
                            <div class="relative mt-2">
                                <x-base.form-input type="time" name="start_time" value="{{ old('start_time', $classes->start_time ?? '') }}" />
                                <div class="absolute inset-y-0 right-0 pe-3 flex items-center pointer-events-none">
                                    <x-base.lucide icon="Clock" class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>
                            @error('start_time')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.end_time') }}</x-base.form-label>
                            <div class="relative mt-2">
                                <x-base.form-input type="time" name="end_time" value="{{ old('end_time', $classes->end_time ?? '') }}" />
                                <div class="absolute inset-y-0 right-0 pe-3 flex items-center pointer-events-none">
                                    <x-base.lucide icon="Clock" class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>
                            @error('end_time')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.room_number') }}</x-base.form-label>
                            <x-base.form-input type="text" name="room_number" value="{{ old('room_number', $classes->room_number ?? '') }}" class="mt-2" />
                            @error('room_number')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.monthly_fee') }}</x-base.form-label>
                            <x-base.form-input type="number" step="0.01" name="monthly_fee" value="{{ old('monthly_fee', $classes->monthly_fee ?? '') }}" class="mt-2" />
                            @error('monthly_fee')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.schedule') }}</x-base.form-label>
                            <x-base.form-input type="text" name="schedule" value="{{ old('schedule', $classes->schedule ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.location') }}</x-base.form-label>
                            <x-base.form-input type="text" name="location" value="{{ old('location', $classes->location ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.start_date') }}</x-base.form-label>
                            <x-base.form-input type="date" name="start_date" value="{{ old('start_date', optional($classes->start_date)->format('Y-m-d')) }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.end_date') }}</x-base.form-label>
                            <x-base.form-input type="date" name="end_date" value="{{ old('end_date', optional($classes->end_date)->format('Y-m-d')) }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.is_active') }}</x-base.form-label>
                            <div class="mt-2 space-y-2">
                                <!-- Hidden input to send 0 if unchecked -->
                                <input type="hidden" name="is_active" value="0">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <x-base.form-input type="checkbox" name="is_active" value="1" {{ old('is_active', $classes->is_active ?? false) ? 'checked' : '' }} class="sr-only peer" />
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/30 dark:peer-focus:ring-primary rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"></div>
                                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('global.active') }}</span>
                                </label>
                            </div>
                        </div>

                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="{{ route('classes.index') }}" class="btn btn-outline-secondary w-24 me-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.save') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
