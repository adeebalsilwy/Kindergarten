@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Children.edit') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('Children.edit') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('children.update', $children->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('childrens.fields.name') }}</x-base.form-label>
                            <x-base.form-input type="text" name="name" value="{{ old('name', $children->name ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('childrens.fields.dob') }}</x-base.form-label>
                            <div class="relative mt-2">
                                <x-base.form-input type="date" name="dob" value="{{ old('dob', $children->dob ?? '') }}" />
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <x-base.lucide icon="Calendar" class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('childrens.fields.gender') }}</x-base.form-label>
                            <x-base.tom-select name="gender" class="mt-2">
                                <option value="">{{ __('global.select_option') }}</option>
                                <option value="male" {{ old('gender', $children->gender ?? '') == 'male' ? 'selected' : '' }}>{{ __('global.male') }}</option>
                                <option value="female" {{ old('gender', $children->gender ?? '') == 'female' ? 'selected' : '' }}>{{ __('global.female') }}</option>
                            </x-base.tom-select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('childrens.fields.class_id') }}</x-base.form-label>
                            <x-base.tom-select name="class_id" class="mt-2" data-placeholder="{{ __('global.select_option') }}">
                                <option value="">{{ __('global.select_option') }}</option>
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}" {{ old('class_id', $children->class_id ?? '') == $class->id ? 'selected' : '' }}>
                                        {{ $class->name }}
                                    </option>
                                @endforeach
                            </x-base.tom-select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('childrens.fields.parent_id') }}</x-base.form-label>
                            <x-base.tom-select name="parent_id" class="mt-2" data-placeholder="{{ __('global.select_option') }}">
                                <option value="">{{ __('global.select_option') }}</option>
                                @foreach($parents as $parent)
                                    <option value="{{ $parent->id }}" {{ old('parent_id', $children->parent_id ?? '') == $parent->id ? 'selected' : '' }}>
                                        {{ $parent->name }}
                                    </option>
                                @endforeach
                            </x-base.tom-select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('childrens.fields.second_parent_id') }}</x-base.form-label>
                            <x-base.tom-select name="second_parent_id" class="mt-2" data-placeholder="{{ __('global.select_option') }}">
                                <option value="">{{ __('global.select_option') }}</option>
                                @foreach($parents as $parent)
                                    <option value="{{ $parent->id }}" {{ old('second_parent_id', $children->second_parent_id ?? '') == $parent->id ? 'selected' : '' }}>
                                        {{ $parent->name }}
                                    </option>
                                @endforeach
                            </x-base.tom-select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('childrens.fields.photo_path') }}</x-base.form-label>
                            <div class="mt-2 flex items-center">
                                <x-base.form-input type="file" name="photo_path" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary/90" />
                            </div>
                            @if($children->photo_path)
                                <div class="mt-2 flex items-center">
                                    <img src="{{ asset('storage/' . $children->photo_path) }}" alt="Current Photo" class="w-16 h-16 object-cover rounded border-2 border-gray-200">
                                    <span class="ml-3 text-sm text-gray-500">{{ __('global.current_image') }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('childrens.fields.fees_required') }}</x-base.form-label>
                            <div class="relative mt-2">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">{{ config('app.currency', 'USD') }}</span>
                                </div>
                                <x-base.form-input type="number" step="0.01" min="0" name="fees_required" value="{{ old('fees_required', $children->fees_required ?? '') }}" class="pl-12" />
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('childrens.fields.fees_paid') }}</x-base.form-label>
                            <div class="relative mt-2">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">{{ config('app.currency', 'USD') }}</span>
                                </div>
                                <x-base.form-input type="number" step="0.01" min="0" name="fees_paid" value="{{ old('fees_paid', $children->fees_paid ?? '') }}" class="pl-12" />
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('childrens.fields.emergency_contact_name') }}</x-base.form-label>
                            <x-base.form-input type="text" name="emergency_contact_name" value="{{ old('emergency_contact_name', $children->emergency_contact_name ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('childrens.fields.emergency_contact_phone') }}</x-base.form-label>
                            <x-base.form-input type="text" name="emergency_contact_phone" value="{{ old('emergency_contact_phone', $children->emergency_contact_phone ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('childrens.fields.emergency_contact_relation') }}</x-base.form-label>
                            <x-base.form-input type="text" name="emergency_contact_relation" value="{{ old('emergency_contact_relation', $children->emergency_contact_relation ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('childrens.fields.medical_conditions') }}</x-base.form-label>
                            <x-base.form-textarea name="medical_conditions" rows="3" class="resize-none">{{ old('medical_conditions', $children->medical_conditions ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('childrens.fields.allergies') }}</x-base.form-label>
                            <x-base.form-textarea name="allergies" rows="2" class="resize-none">{{ old('allergies', $children->allergies ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('childrens.fields.medications') }}</x-base.form-label>
                            <x-base.form-textarea name="medications" rows="2" class="resize-none">{{ old('medications', $children->medications ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('childrens.fields.blood_type') }}</x-base.form-label>
                            <x-base.tom-select name="blood_type" class="mt-2">
                                <option value="">{{ __('global.select_option') }}</option>
                                @foreach(['A+','A-','B+','B-','AB+','AB-','O+','O-'] as $bt)
                                    <option value="{{ $bt }}" {{ old('blood_type', $children->blood_type ?? '') == $bt ? 'selected' : '' }}>{{ $bt }}</option>
                                @endforeach
                            </x-base.tom-select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('childrens.fields.enrollment_date') }}</x-base.form-label>
                            <x-base.form-input type="date" name="enrollment_date" value="{{ old('enrollment_date', optional($children->enrollment_date)->format('Y-m-d')) }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('childrens.fields.expected_graduation_date') }}</x-base.form-label>
                            <x-base.form-input type="date" name="expected_graduation_date" value="{{ old('expected_graduation_date', optional($children->expected_graduation_date)->format('Y-m-d')) }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('childrens.fields.last_attended_at') }}</x-base.form-label>
                            <x-base.form-input type="datetime-local" name="last_attended_at" value="{{ old('last_attended_at', optional($children->last_attended_at)->format('Y-m-d\TH:i')) }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('childrens.fields.enrollment_status') }}</x-base.form-label>
                            <x-base.tom-select name="enrollment_status" class="mt-2">
                                <option value="active" {{ old('enrollment_status', $children->enrollment_status ?? 'active') == 'active' ? 'selected' : '' }}>{{ __('global.active') }}</option>
                                <option value="inactive" {{ old('enrollment_status', $children->enrollment_status ?? '') == 'inactive' ? 'selected' : '' }}>{{ __('global.inactive') }}</option>
                                <option value="graduated" {{ old('enrollment_status', $children->enrollment_status ?? '') == 'graduated' ? 'selected' : '' }}>{{ __('global.graduated') }}</option>
                            </x-base.tom-select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('childrens.fields.nationality') }}</x-base.form-label>
                            <x-base.form-input type="text" name="nationality" value="{{ old('nationality', $children->nationality ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('childrens.fields.religion') }}</x-base.form-label>
                            <x-base.form-input type="text" name="religion" value="{{ old('religion', $children->religion ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('childrens.fields.special_needs') }}</x-base.form-label>
                            <x-base.form-textarea name="special_needs" rows="2" class="resize-none">{{ old('special_needs', $children->special_needs ?? '') }}</x-base.form-textarea>
                        </div>

                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="{{ route('children.index') }}" class="btn btn-outline-secondary w-24 mr-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.update') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
