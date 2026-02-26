@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Classes.add_new') }} - Laravel</title>
    <style>
        .demo-data-section {
            background-color: #f8fafc;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-bottom: 1rem;
        }
        .color-palette {
            display: flex;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }
        .color-option {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid transparent;
        }
        .color-option.selected {
            border-color: #3b82f6;
        }
    </style>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('Classes.add_new') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <!-- Demo Data Section -->
                <div class="demo-data-section">
                    <div class="flex justify-between items-center">
                        <h3 class="font-medium">{{ __('global.demo_data') }}</h3>
                        <x-base.button type="button" variant="primary" id="fill-demo-data" class="w-40">
                            <x-base.lucide icon="Database" class="w-4 h-4 me-2" />
                            {{ __('global.fill_with_demo_data') }}
                        </x-base.button>
                    </div>
                    <p class="text-sm text-slate-600 mt-2">{{ __('global.demo_data_help_text') }}</p>
                </div>
                
                <form action="{{ route('classes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.name') }}</x-base.form-label>
                            <x-base.form-input type="text" name="name" id="name" value="{{ old('name', $classes->name ?? '') }}" class="mt-2" placeholder="{{ __('classes.placeholders.name') }}" />
                            @error('name')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.code') }}</x-base.form-label>
                            <x-base.form-input type="text" name="code" id="code" value="{{ old('code', $classes->code ?? '') }}" class="mt-2" placeholder="{{ __('classes.placeholders.code') }}" />
                            @error('code')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('classes.fields.description') }}</x-base.form-label>
                            <x-base.form-textarea name="description" id="description" rows="4" class="resize-none">{{ old('description', $classes->description ?? '') }}</x-base.form-textarea>
                            @error('description')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.teacher_id') }}</x-base.form-label>
                            <x-base.tom-select name="teacher_id" id="teacher_id" class="mt-2" data-placeholder="{{ __('global.select_option') }}">
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
                            <x-base.form-label>{{ __('classes.fields.grade_level_id') }}</x-base.form-label>
                            <x-base.tom-select name="grade_level_id" id="grade_level_id" class="mt-2" data-placeholder="{{ __('global.select_option') }}">
                                <option value="">{{ __('global.select_option') }}</option>
                                @foreach($gradeLevels as $gradeLevel)
                                    <option value="{{ $gradeLevel->id }}" {{ old('grade_level_id', $classes->grade_level_id ?? '') == $gradeLevel->id ? 'selected' : '' }}>
                                        {{ $gradeLevel->name }}
                                    </option>
                                @endforeach
                            </x-base.tom-select>
                            @error('grade_level_id')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.age_group') }}</x-base.form-label>
                            <x-base.tom-select name="age_group" id="age_group" class="mt-2">
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
                            <x-base.form-input type="number" name="capacity" id="capacity" value="{{ old('capacity', $classes->capacity ?? '') }}" class="mt-2" placeholder="{{ __('classes.placeholders.capacity') }}" />
                            @error('capacity')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.current_students') }}</x-base.form-label>
                            <x-base.form-input type="number" name="current_students" id="current_students" value="{{ old('current_students', $classes->current_students ?? '') }}" class="mt-2" placeholder="{{ __('classes.placeholders.current_students') }}" />
                            @error('current_students')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.start_time') }}</x-base.form-label>
                            <div class="relative mt-2">
                                <x-base.form-input type="time" name="start_time" id="start_time" value="{{ old('start_time', $classes->start_time ?? '') }}" />
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
                                <x-base.form-input type="time" name="end_time" id="end_time" value="{{ old('end_time', $classes->end_time ?? '') }}" />
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
                            <x-base.form-input type="text" name="room_number" id="room_number" value="{{ old('room_number', $classes->room_number ?? '') }}" class="mt-2" placeholder="{{ __('classes.placeholders.room_number') }}" />
                            @error('room_number')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.monthly_fee') }}</x-base.form-label>
                            <x-base.form-input type="number" step="0.01" name="monthly_fee" id="monthly_fee" value="{{ old('monthly_fee', $classes->monthly_fee ?? '') }}" class="mt-2" placeholder="{{ __('classes.placeholders.monthly_fee') }}" />
                            @error('monthly_fee')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.schedule') }}</x-base.form-label>
                            <x-base.form-input type="text" name="schedule" id="schedule" value="{{ old('schedule', $classes->schedule ?? '') }}" class="mt-2" placeholder="{{ __('classes.placeholders.schedule') }}" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.location') }}</x-base.form-label>
                            <x-base.form-input type="text" name="location" id="location" value="{{ old('location', $classes->location ?? '') }}" class="mt-2" placeholder="{{ __('classes.placeholders.location') }}" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.start_date') }}</x-base.form-label>
                            <x-base.form-input type="date" name="start_date" id="start_date" value="{{ old('start_date', optional($classes->start_date)->format('Y-m-d')) }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('classes.fields.end_date') }}</x-base.form-label>
                            <x-base.form-input type="date" name="end_date" id="end_date" value="{{ old('end_date', optional($classes->end_date)->format('Y-m-d')) }}" class="mt-2" />
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
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('fill-demo-data').addEventListener('click', function() {
                // Fill form with demo data
                document.getElementById('name').value = 'Demo Class ' + Math.floor(Math.random() * 1000);
                document.getElementById('code').value = 'CLS' + Math.floor(Math.random() * 1000);
                document.getElementById('description').value = 'This is a demo class for testing purposes.';
                document.getElementById('capacity').value = Math.floor(Math.random() * 20) + 10;
                document.getElementById('current_students').value = Math.floor(Math.random() * 15) + 5;
                document.getElementById('room_number').value = 'Room ' + Math.floor(Math.random() * 100);
                document.getElementById('monthly_fee').value = (Math.random() * 100).toFixed(2);
                document.getElementById('schedule').value = 'Monday-Wednesday-Friday';
                document.getElementById('location').value = 'Building A';
                
                // Randomly select age group
                const ageGroups = ['toddlers', 'preschool', 'pre_k', 'kindergarten'];
                const randomAgeGroup = ageGroups[Math.floor(Math.random() * ageGroups.length)];
                document.getElementById('age_group').value = randomAgeGroup;
                
                // Randomly select teacher
                const teacherOptions = document.querySelectorAll('#teacher_id option');
                if (teacherOptions.length > 1) {
                    const randomIndex = Math.floor(Math.random() * (teacherOptions.length - 1)) + 1; // Skip first option
                    document.getElementById('teacher_id').value = teacherOptions[randomIndex].value;
                }
                
                // Randomly select grade level
                const gradeLevelOptions = document.querySelectorAll('#grade_level_id option');
                if (gradeLevelOptions.length > 1) {
                    const randomIndex = Math.floor(Math.random() * (gradeLevelOptions.length - 1)) + 1; // Skip first option
                    document.getElementById('grade_level_id').value = gradeLevelOptions[randomIndex].value;
                }
                
                // Set random start and end times
                const startHour = Math.floor(Math.random() * 6) + 8; // Between 8 AM and 2 PM
                const endHour = startHour + 2; // 2 hours duration
                document.getElementById('start_time').value = String(startHour).padStart(2, '0') + ':00';
                document.getElementById('end_time').value = String(endHour).padStart(2, '0') + ':00';
                
                // Set random dates
                const today = new Date();
                const startDate = new Date();
                startDate.setDate(today.getDate() + Math.floor(Math.random() * 30));
                document.getElementById('start_date').value = startDate.toISOString().split('T')[0];
                
                const endDate = new Date(startDate);
                endDate.setMonth(startDate.getMonth() + 3); // 3 months later
                document.getElementById('end_date').value = endDate.toISOString().split('T')[0];
                
                // Randomly set active status
                const isActive = Math.random() > 0.5;
                document.querySelector('input[name="is_active"]').checked = isActive;
            });
        });
    </script>
@endsection