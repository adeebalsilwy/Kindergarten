@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Guardian.add_new') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('Guardian.add_new') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('guardians.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('guardians.fields.name') }}</x-base.form-label>
                            <x-base.form-input type="text" name="name" value="{{ old('name', $parents->name ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('guardians.fields.phone') }}</x-base.form-label>
                            <x-base.form-input type="text" name="phone" value="{{ old('phone') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('guardians.fields.address') }}</x-base.form-label>
                            <x-base.form-textarea name="address" class="mt-2">{{ old('address') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('guardians.fields.email') }}</x-base.form-label>
                            <x-base.form-input type="email" name="email" value="{{ old('email') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('guardians.fields.relation') }}</x-base.form-label>
                            <x-base.form-select name="relation" class="mt-2">
                                <option value="Father">{{ __('kindergarten.parents.father') }}</option>
                                <option value="Mother">{{ __('kindergarten.parents.mother') }}</option>
                                <option value="Guardian">{{ __('kindergarten.parents.guardian') }}</option>
                            </x-base.form-select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('guardians.fields.secondary_phone') }}</x-base.form-label>
                            <x-base.form-input type="text" name="secondary_phone" value="{{ old('secondary_phone') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('guardians.fields.occupation') }}</x-base.form-label>
                            <x-base.form-input type="text" name="occupation" value="{{ old('occupation') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('guardians.fields.workplace') }}</x-base.form-label>
                            <x-base.form-input type="text" name="workplace" value="{{ old('workplace') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('guardians.fields.bank_account_number') }}</x-base.form-label>
                            <x-base.form-input type="text" name="bank_account_number" value="{{ old('bank_account_number') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('guardians.fields.bank_name') }}</x-base.form-label>
                            <x-base.form-input type="text" name="bank_name" value="{{ old('bank_name') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('guardians.fields.preferred_language') }}</x-base.form-label>
                            <x-base.form-select name="preferred_language" class="mt-2">
                                <option value="english">{{ __('global.english') }}</option>
                                <option value="arabic">{{ __('global.arabic') }}</option>
                            </x-base.form-select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('guardians.fields.date_of_birth') }}</x-base.form-label>
                            <x-base.form-input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('guardians.fields.national_id') }}</x-base.form-label>
                            <x-base.form-input type="text" name="national_id" value="{{ old('national_id') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('guardians.fields.passport_number') }}</x-base.form-label>
                            <x-base.form-input type="text" name="passport_number" value="{{ old('passport_number') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-4">
                            <div class="form-check mt-6">
                                <input type="checkbox" name="is_primary_emergency_contact" value="1" class="form-check-input" {{ old('is_primary_emergency_contact', true) ? 'checked' : '' }}>
                                <label class="form-check-label">{{ __('guardians.fields.is_primary_emergency_contact') }}</label>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-4">
                            <div class="form-check mt-6">
                                <input type="checkbox" name="receives_sms_notifications" value="1" class="form-check-input" {{ old('receives_sms_notifications', true) ? 'checked' : '' }}>
                                <label class="form-check-label">{{ __('guardians.fields.receives_sms_notifications') }}</label>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-4">
                            <div class="form-check mt-6">
                                <input type="checkbox" name="receives_email_notifications" value="1" class="form-check-input" {{ old('receives_email_notifications', true) ? 'checked' : '' }}>
                                <label class="form-check-label">{{ __('guardians.fields.receives_email_notifications') }}</label>
                            </div>
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('guardians.fields.children_ids') }}</x-base.form-label>
                            <x-base.form-select name="children_ids[]" multiple class="mt-2">
                                @foreach($children as $child)
                                    <option value="{{ $child->id }}">{{ $child->name }}</option>
                                @endforeach
                            </x-base.form-select>
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
