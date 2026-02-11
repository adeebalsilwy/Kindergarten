@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Teacher.add_new') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('Teacher.add_new') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('teachers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('teachers.fields.name') }}</x-base.form-label>
                            <x-base.form-input type="text" name="name" value="{{ old('name', $teacher->name ?? '') }}" class="mt-2" />
                            @error('name')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('teachers.fields.email') }}</x-base.form-label>
                            <div class="relative mt-2">
                                <x-base.form-input type="email" name="email" value="{{ old('email', $teacher->email ?? '') }}" />
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <x-base.lucide icon="Mail" class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>
                            @error('email')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('teachers.fields.phone') }}</x-base.form-label>
                            <div class="relative mt-2">
                                <x-base.form-input type="tel" name="phone" value="{{ old('phone', $teacher->phone ?? '') }}" />
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <x-base.lucide icon="Phone" class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>
                            @error('phone')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('teachers.fields.address') }}</x-base.form-label>
                            <x-base.form-textarea name="address" rows="4" class="resize-none">{{ old('address', $teacher->address ?? '') }}</x-base.form-textarea>
                            @error('address')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('teachers.fields.date_of_birth') }}</x-base.form-label>
                            <div class="relative mt-2">
                                <x-base.form-input type="date" name="date_of_birth" value="{{ old('date_of_birth', $teacher->date_of_birth ?? '') }}" />
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <x-base.lucide icon="Calendar" class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>
                            @error('date_of_birth')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('teachers.fields.gender') }}</x-base.form-label>
                            <x-base.tom-select name="gender" class="mt-2">
                                <option value="">{{ __('global.select_option') }}</option>
                                <option value="male" {{ old('gender', $teacher->gender ?? '') == 'male' ? 'selected' : '' }}>{{ __('global.male') }}</option>
                                <option value="female" {{ old('gender', $teacher->gender ?? '') == 'female' ? 'selected' : '' }}>{{ __('global.female') }}</option>
                            </x-base.tom-select>
                            @error('gender')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('teachers.fields.qualification') }}</x-base.form-label>
                            <x-base.form-input type="text" name="qualification" value="{{ old('qualification', $teacher->qualification ?? '') }}" class="mt-2" />
                            @error('qualification')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('teachers.fields.experience') }}</x-base.form-label>
                            <x-base.form-textarea name="experience" rows="4" class="resize-none">{{ old('experience', $teacher->experience ?? '') }}</x-base.form-textarea>
                            @error('experience')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('teachers.fields.salary') }}</x-base.form-label>
                            <div class="relative mt-2">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">{{ config('app.currency', 'USD') }}</span>
                                </div>
                                <x-base.form-input type="number" step="0.01" min="0" name="salary" value="{{ old('salary', $teacher->salary ?? '') }}" class="pl-12" />
                            </div>
                            @error('salary')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('teachers.fields.hire_date') }}</x-base.form-label>
                            <x-base.form-input type="date" name="hire_date" value="{{ old('hire_date', $teacher->hire_date ?? '') }}" class="mt-2" />
                            @error('hire_date')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('teachers.fields.photo_path') }}</x-base.form-label>
                            <div class="mt-2 flex items-center">
                                <x-base.form-input type="file" name="photo_path" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary/90" />
                            </div>
                            @if($teacher->photo_path)
                                <div class="mt-2 flex items-center">
                                    <img src="{{ asset('storage/' . $teacher->photo_path) }}" alt="Current Photo" class="w-16 h-16 object-cover rounded border-2 border-gray-200">
                                    <span class="ml-3 text-sm text-gray-500">{{ __('global.current_image') }}</span>
                                </div>
                            @endif
                            @error('photo_path')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('teachers.fields.is_active') }}</x-base.form-label>
                            <div class="mt-2 space-y-2">
                                <!-- Hidden input to send 0 if unchecked -->
                                <input type="hidden" name="is_active" value="0">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <x-base.form-input type="checkbox" name="is_active" value="1" {{ old('is_active', $teacher->is_active ?? false) ? 'checked' : '' }} class="sr-only peer" />
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/30 dark:peer-focus:ring-primary rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('global.active') }}</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('teachers.fields.notes') }}</x-base.form-label>
                            <x-base.form-textarea name="notes" rows="4" class="resize-none">{{ old('notes', $teacher->notes ?? '') }}</x-base.form-textarea>
                        </div>

                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="{{ route('teachers.index') }}" class="btn btn-outline-secondary w-24 mr-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.save') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
