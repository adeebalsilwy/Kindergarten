@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('guardians.add_new') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('guardians.add_new') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <div class="intro-y box p-5">
                <form action="{{ route('guardians.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Personal Information -->
                    <div class="border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                        <div class="font-medium text-base mb-5">{{ __('guardians.sections.personal_info') }}</div>
                        <div class="grid grid-cols-12 gap-4 gap-y-5">
                            <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                                <x-base.form-label>{{ __('guardians.fields.name') }}</x-base.form-label>
                                <x-base.form-input type="text" name="name" value="{{ old('name') }}" class="mt-2" />
                                @error('name')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                                <x-base.form-label>{{ __('guardians.fields.email') }}</x-base.form-label>
                                <x-base.form-input type="email" name="email" value="{{ old('email') }}" class="mt-2" />
                                @error('email')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                                <x-base.form-label>{{ __('guardians.fields.phone') }}</x-base.form-label>
                                <x-base.form-input type="text" name="phone" value="{{ old('phone') }}" class="mt-2" />
                                @error('phone')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                                <x-base.form-label>{{ __('guardians.fields.secondary_phone') }}</x-base.form-label>
                                <x-base.form-input type="text" name="secondary_phone" value="{{ old('secondary_phone') }}" class="mt-2" />
                                @error('secondary_phone')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                                <x-base.form-label>{{ __('guardians.fields.date_of_birth') }}</x-base.form-label>
                                <x-base.form-input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="mt-2" />
                                @error('date_of_birth')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                                <x-base.form-label>{{ __('guardians.fields.national_id') }}</x-base.form-label>
                                <x-base.form-input type="text" name="national_id" value="{{ old('national_id') }}" class="mt-2" />
                                @error('national_id')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Work Information -->
                    <div class="border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                        <div class="font-medium text-base mb-5">{{ __('guardians.sections.work_info') }}</div>
                        <div class="grid grid-cols-12 gap-4 gap-y-5">
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('guardians.fields.occupation') }}</x-base.form-label>
                                <x-base.form-input type="text" name="occupation" value="{{ old('occupation') }}" class="mt-2" />
                                @error('occupation')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('guardians.fields.workplace') }}</x-base.form-label>
                                <x-base.form-input type="text" name="workplace" value="{{ old('workplace') }}" class="mt-2" />
                                @error('workplace')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Relationship & Address -->
                    <div class="border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                        <div class="font-medium text-base mb-5">{{ __('guardians.sections.address_info') }}</div>
                        <div class="grid grid-cols-12 gap-4 gap-y-5">
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('guardians.fields.relationship') }}</x-base.form-label>
                                <x-base.tom-select name="relationship" class="w-full mt-2">
                                    <option value="Father" {{ old('relationship') == 'Father' ? 'selected' : '' }}>{{ __('guardians.relationships.father') }}</option>
                                    <option value="Mother" {{ old('relationship') == 'Mother' ? 'selected' : '' }}>{{ __('guardians.relationships.mother') }}</option>
                                    <option value="Grandfather" {{ old('relationship') == 'Grandfather' ? 'selected' : '' }}>{{ __('guardians.relationships.grandfather') }}</option>
                                    <option value="Grandmother" {{ old('relationship') == 'Grandmother' ? 'selected' : '' }}>{{ __('guardians.relationships.grandmother') }}</option>
                                    <option value="Uncle" {{ old('relationship') == 'Uncle' ? 'selected' : '' }}>{{ __('guardians.relationships.uncle') }}</option>
                                    <option value="Aunt" {{ old('relationship') == 'Aunt' ? 'selected' : '' }}>{{ __('guardians.relationships.aunt') }}</option>
                                    <option value="Other" {{ old('relationship') == 'Other' ? 'selected' : '' }}>{{ __('guardians.relationships.other') }}</option>
                                </x-base.tom-select>
                                @error('relationship')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-span-12">
                                <x-base.form-label>{{ __('guardians.fields.address') }}</x-base.form-label>
                                <x-base.form-textarea name="address" rows="3" class="mt-2">{{ old('address') }}</x-base.form-textarea>
                                @error('address')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Settings -->
                    <div class="mb-5">
                        <div class="font-medium text-base mb-5">{{ __('guardians.sections.settings') }}</div>
                        <div class="flex flex-col sm:flex-row mt-2">
                            <div class="form-check mr-5 mt-2 sm:mt-0">
                                <input type="hidden" name="is_primary_guardian" value="0">
                                <x-base.form-check.input id="is_primary_guardian" type="checkbox" name="is_primary_guardian" value="1" {{ old('is_primary_guardian') ? 'checked' : '' }} />
                                <x-base.form-check.label for="is_primary_guardian">{{ __('guardians.fields.is_primary_guardian') }}</x-base.form-check.label>
                            </div>
                            <div class="form-check mr-5 mt-2 sm:mt-0">
                                <input type="hidden" name="is_primary_emergency_contact" value="0">
                                <x-base.form-check.input id="is_primary_emergency_contact" type="checkbox" name="is_primary_emergency_contact" value="1" {{ old('is_primary_emergency_contact') ? 'checked' : '' }} />
                                <x-base.form-check.label for="is_primary_emergency_contact">{{ __('guardians.fields.is_primary_emergency_contact') }}</x-base.form-check.label>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end mt-5">
                        <a href="{{ route('guardians.index') }}" class="btn btn-outline-secondary w-24 mr-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.save') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
