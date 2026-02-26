@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Classes.edit') }} - Laravel</title>
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
        <h2 class="text-lg font-medium me-auto">{{ __('Classes.edit') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <!-- Archive/Delete Section -->
                <div class="demo-data-section" style="background-color: #fef2f2; border: 1px solid #fecaca;">
                    <div class="flex justify-between items-center">
                        <h3 class="font-medium text-red-600">{{ __('global.danger_zone') }}</h3>
                        <div class="flex gap-2">
                            <x-base.button type="button" variant="danger" id="archive-class" class="w-32">
                                <x-base.lucide icon="Archive" class="w-4 h-4 me-2" />
                                {{ __('global.archive') }}
                            </x-base.button>
                            <x-base.button type="button" variant="error" id="delete-class" class="w-32">
                                <x-base.lucide icon="Trash2" class="w-4 h-4 me-2" />
                                {{ __('global.delete') }}
                            </x-base.button>
                        </div>
                    </div>
                    <p class="text-sm text-red-600 mt-2">{{ __('global.danger_zone_warning') }}</p>
                </div>
                
                <form action="{{ route('classes.update', $classes->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.update') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Confirmation Modal -->
    <div id="confirmation-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-md mx-4">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center mr-4">
                    <x-base.lucide icon="AlertTriangle" class="w-6 h-6 text-red-600" />
                </div>
                <div>
                    <h3 class="text-lg font-medium text-gray-900" id="modal-title">{{ __('global.confirm_action') }}</h3>
                    <p class="text-sm text-gray-500" id="modal-message">{{ __('global.confirm_message') }}</p>
                </div>
            </div>
            <div class="mt-6 flex justify-end space-x-3">
                <x-base.button type="button" variant="secondary" id="cancel-modal" class="w-24">
                    {{ __('global.cancel') }}
                </x-base.button>
                <x-base.button type="button" variant="danger" id="confirm-action" class="w-24">
                    {{ __('global.confirm') }}
                </x-base.button>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let actionUrl = '';
            let actionMethod = '';
            
            document.getElementById('archive-class').addEventListener('click', function() {
                document.getElementById('modal-title').textContent = '{{ __("global.confirm_archive") }}';
                document.getElementById('modal-message').textContent = '{{ __("global.confirm_archive_class_message") }}';
                actionUrl = '{{ route("classes.update", $classes->id) }}';
                actionMethod = 'PUT';
                
                // Show modal
                document.getElementById('confirmation-modal').classList.remove('hidden');
            });
            
            document.getElementById('delete-class').addEventListener('click', function() {
                document.getElementById('modal-title').textContent = '{{ __("global.confirm_delete") }}';
                document.getElementById('modal-message').textContent = '{{ __("global.confirm_delete_class_message") }}';
                actionUrl = '{{ route("classes.destroy", $classes->id) }}';
                actionMethod = 'DELETE';
                
                // Show modal
                document.getElementById('confirmation-modal').classList.remove('hidden');
            });
            
            document.getElementById('cancel-modal').addEventListener('click', function() {
                document.getElementById('confirmation-modal').classList.add('hidden');
            });
            
            document.getElementById('confirm-action').addEventListener('click', function() {
                // Create a form to submit the request
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = actionUrl;
                form.style.display = 'none';
                
                // Add CSRF token
                const csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = '{{ csrf_token() }}';
                form.appendChild(csrfInput);
                
                // Add method override if needed
                if (actionMethod !== 'POST') {
                    const methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    methodInput.value = actionMethod;
                    form.appendChild(methodInput);
                }
                
                // If archiving, add soft delete (we'll add a field to mark as archived)
                if (actionMethod === 'PUT') {
                    const archivedInput = document.createElement('input');
                    archivedInput.type = 'hidden';
                    archivedInput.name = 'is_archived';
                    archivedInput.value = '1';
                    form.appendChild(archivedInput);
                }
                
                document.body.appendChild(form);
                form.submit();
            });
        });
    </script>
@endsection