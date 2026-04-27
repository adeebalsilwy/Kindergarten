@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('kindergarten.parents.add_new') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('kindergarten.parents.add_new') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('parents.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-12 gap-4">
                        <!-- Basic Information -->
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.parents.name') }} <span class="text-danger">*</span></x-base.form-label>
                            <x-base.form-input type="text" name="name" value="{{ old('name', $parents->name ?? '') }}" class="mt-2" required />
                            @error('name')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.parents.relationship') }} <span class="text-danger">*</span></x-base.form-label>
                            <x-base.form-select name="relationship" class="mt-2" required>
                                <option value="">{{ __('global.select_option') }}</option>
                                <option value="Father" {{ old('relationship', $parents->relationship ?? '') == 'Father' ? 'selected' : '' }}>{{ __('kindergarten.parents.father') }}</option>
                                <option value="Mother" {{ old('relationship', $parents->relationship ?? '') == 'Mother' ? 'selected' : '' }}>{{ __('kindergarten.parents.mother') }}</option>
                                <option value="Guardian" {{ old('relationship', $parents->relationship ?? '') == 'Guardian' ? 'selected' : '' }}>{{ __('kindergarten.parents.guardian') }}</option>
                                <option value="Other" {{ old('relationship', $parents->relationship ?? '') == 'Other' ? 'selected' : '' }}>{{ __('kindergarten.parents.other') }}</option>
                            </x-base.form-select>
                            @error('relationship')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Contact Information -->
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.parents.phone') }} <span class="text-danger">*</span></x-base.form-label>
                            <div class="relative mt-2">
                                <x-base.form-input type="tel" name="phone" value="{{ old('phone', $parents->phone ?? '') }}" required />
                                <div class="absolute inset-y-0 right-0 pe-3 flex items-center pointer-events-none">
                                    <x-base.lucide icon="Phone" class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>
                            @error('phone')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.parents.secondary_phone') }}</x-base.form-label>
                            <div class="relative mt-2">
                                <x-base.form-input type="tel" name="secondary_phone" value="{{ old('secondary_phone', $parents->secondary_phone ?? '') }}" />
                                <div class="absolute inset-y-0 right-0 pe-3 flex items-center pointer-events-none">
                                    <x-base.lucide icon="Smartphone" class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>
                            @error('secondary_phone')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.parents.email') }}</x-base.form-label>
                            <div class="relative mt-2">
                                <x-base.form-input type="email" name="email" value="{{ old('email', $parents->email ?? '') }}" />
                                <div class="absolute inset-y-0 right-0 pe-3 flex items-center pointer-events-none">
                                    <x-base.lucide icon="Mail" class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>
                            @error('email')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('kindergarten.parents.address') }}</x-base.form-label>
                            <x-base.form-textarea name="address" rows="3" class="resize-none">{{ old('address', $parents->address ?? '') }}</x-base.form-textarea>
                            @error('address')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Personal Information -->
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.parents.date_of_birth') }}</x-base.form-label>
                            <x-base.form-input type="date" name="date_of_birth" value="{{ old('date_of_birth', $parents->date_of_birth ?? '') }}" class="mt-2" />
                            @error('date_of_birth')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.parents.national_id') }}</x-base.form-label>
                            <x-base.form-input type="text" name="national_id" value="{{ old('national_id', $parents->national_id ?? '') }}" class="mt-2" />
                            @error('national_id')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.parents.passport_number') }}</x-base.form-label>
                            <x-base.form-input type="text" name="passport_number" value="{{ old('passport_number', $parents->passport_number ?? '') }}" class="mt-2" />
                            @error('passport_number')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Work Information -->
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.parents.occupation') }}</x-base.form-label>
                            <x-base.form-input type="text" name="occupation" value="{{ old('occupation', $parents->occupation ?? '') }}" class="mt-2" />
                            @error('occupation')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.parents.workplace') }}</x-base.form-label>
                            <x-base.form-input type="text" name="workplace" value="{{ old('workplace', $parents->workplace ?? '') }}" class="mt-2" />
                            @error('workplace')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Financial Information -->
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.parents.bank_name') }}</x-base.form-label>
                            <x-base.form-input type="text" name="bank_name" value="{{ old('bank_name', $parents->bank_name ?? '') }}" class="mt-2" />
                            @error('bank_name')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.parents.bank_account_number') }}</x-base.form-label>
                            <x-base.form-input type="text" name="bank_account_number" value="{{ old('bank_account_number', $parents->bank_account_number ?? '') }}" class="mt-2" />
                            @error('bank_account_number')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Communication Preferences -->
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.parents.preferred_language') }}</x-base.form-label>
                            <x-base.form-select name="preferred_language" class="mt-2">
                                <option value="english" {{ old('preferred_language', $parents->preferred_language ?? 'english') == 'english' ? 'selected' : '' }}>{{ __('global.english') }}</option>
                                <option value="arabic" {{ old('preferred_language', $parents->preferred_language ?? 'english') == 'arabic' ? 'selected' : '' }}>{{ __('global.arabic') }}</option>
                            </x-base.form-select>
                            @error('preferred_language')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Preferences Checkboxes -->
                        <div class="col-span-12 sm:col-span-6">
                            <div class="mt-6 space-y-3">
                                <label class="flex items-center cursor-pointer">
                                    <input type="hidden" name="is_primary_emergency_contact" value="0">
                                    <input type="checkbox" name="is_primary_emergency_contact" value="1" {{ old('is_primary_emergency_contact', $parents->is_primary_emergency_contact ?? true) ? 'checked' : '' }} class="form-check-input">
                                    <span class="ms-2">{{ __('kindergarten.parents.is_primary_emergency_contact') }}</span>
                                </label>
                                @error('is_primary_emergency_contact')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <div class="mt-2 space-y-3">
                                <label class="flex items-center cursor-pointer">
                                    <input type="hidden" name="receives_sms_notifications" value="0">
                                    <input type="checkbox" name="receives_sms_notifications" value="1" {{ old('receives_sms_notifications', $parents->receives_sms_notifications ?? true) ? 'checked' : '' }} class="form-check-input">
                                    <span class="ms-2">{{ __('kindergarten.parents.receives_sms_notifications') }}</span>
                                </label>
                                @error('receives_sms_notifications')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <label class="flex items-center cursor-pointer">
                                    <input type="hidden" name="receives_email_notifications" value="0">
                                    <input type="checkbox" name="receives_email_notifications" value="1" {{ old('receives_email_notifications', $parents->receives_email_notifications ?? true) ? 'checked' : '' }} class="form-check-input">
                                    <span class="ms-2">{{ __('kindergarten.parents.receives_email_notifications') }}</span>
                                </label>
                                @error('receives_email_notifications')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <div class="mt-2 space-y-3">
                                <label class="flex items-center cursor-pointer">
                                    <input type="hidden" name="is_active" value="0">
                                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $parents->is_active ?? true) ? 'checked' : '' }} class="form-check-input">
                                    <span class="ms-2">{{ __('kindergarten.parents.is_active') }}</span>
                                </label>
                                @error('is_active')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="{{ route('parents.index') }}" class="btn btn-outline-secondary w-24 me-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.save') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
