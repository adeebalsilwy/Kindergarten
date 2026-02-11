@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Guardian.edit') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('Guardian.edit') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('guardians.update', $parents->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('guardians.fields.name') }}</x-base.form-label>
                            <x-base.form-input type="text" name="name" value="{{ old('name', $parents->name ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('guardians.fields.phone') }}</x-base.form-label>
                            <x-base.form-input type="text" name="phone" value="{{ old('phone', $parents->phone) }}" class="mt-2" />
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('guardians.fields.address') }}</x-base.form-label>
                            <x-base.form-textarea name="address" class="mt-2">{{ old('address', $parents->address) }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('guardians.fields.email') }}</x-base.form-label>
                            <x-base.form-input type="email" name="email" value="{{ old('email', $parents->email) }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('guardians.fields.relation') }}</x-base.form-label>
                            <x-base.form-select name="relation" class="mt-2">
                                <option value="Father" @selected(old('relation', $parents->relation) == 'Father')>{{ __('kindergarten.parents.father') }}</option>
                                <option value="Mother" @selected(old('relation', $parents->relation) == 'Mother')>{{ __('kindergarten.parents.mother') }}</option>
                                <option value="Guardian" @selected(old('relation', $parents->relation) == 'Guardian')>{{ __('kindergarten.parents.guardian') }}</option>
                            </x-base.form-select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('guardians.fields.secondary_phone') }}</x-base.form-label>
                            <x-base.form-input type="text" name="secondary_phone" value="{{ old('secondary_phone', $parents->secondary_phone) }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('guardians.fields.occupation') }}</x-base.form-label>
                            <x-base.form-input type="text" name="occupation" value="{{ old('occupation', $parents->occupation) }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('guardians.fields.workplace') }}</x-base.form-label>
                            <x-base.form-input type="text" name="workplace" value="{{ old('workplace', $parents->workplace) }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('guardians.fields.bank_account_number') }}</x-base.form-label>
                            <x-base.form-input type="text" name="bank_account_number" value="{{ old('bank_account_number', $parents->bank_account_number) }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('guardians.fields.bank_name') }}</x-base.form-label>
                            <x-base.form-input type="text" name="bank_name" value="{{ old('bank_name', $parents->bank_name) }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('guardians.fields.preferred_language') }}</x-base.form-label>
                            <x-base.form-select name="preferred_language" class="mt-2">
                                <option value="english" @selected(old('preferred_language', $parents->preferred_language) == 'english')>{{ __('global.english') }}</option>
                                <option value="arabic" @selected(old('preferred_language', $parents->preferred_language) == 'arabic')>{{ __('global.arabic') }}</option>
                            </x-base.form-select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('guardians.fields.date_of_birth') }}</x-base.form-label>
                            <x-base.form-input type="date" name="date_of_birth" value="{{ old('date_of_birth', $parents->date_of_birth) }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('guardians.fields.national_id') }}</x-base.form-label>
                            <x-base.form-input type="text" name="national_id" value="{{ old('national_id', $parents->national_id) }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('guardians.fields.passport_number') }}</x-base.form-label>
                            <x-base.form-input type="text" name="passport_number" value="{{ old('passport_number', $parents->passport_number) }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-4">
                            <div class="form-check mt-6">
                                <input type="checkbox" name="is_primary_emergency_contact" value="1" class="form-check-input" {{ old('is_primary_emergency_contact', $parents->is_primary_emergency_contact) ? 'checked' : '' }}>
                                <label class="form-check-label">{{ __('guardians.fields.is_primary_emergency_contact') }}</label>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-4">
                            <div class="form-check mt-6">
                                <input type="checkbox" name="receives_sms_notifications" value="1" class="form-check-input" {{ old('receives_sms_notifications', $parents->receives_sms_notifications) ? 'checked' : '' }}>
                                <label class="form-check-label">{{ __('guardians.fields.receives_sms_notifications') }}</label>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-4">
                            <div class="form-check mt-6">
                                <input type="checkbox" name="receives_email_notifications" value="1" class="form-check-input" {{ old('receives_email_notifications', $parents->receives_email_notifications) ? 'checked' : '' }}>
                                <label class="form-check-label">{{ __('guardians.fields.receives_email_notifications') }}</label>
                            </div>
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('guardians.fields.children_ids') }}</x-base.form-label>
                            <x-base.form-select name="children_ids[]" multiple class="mt-2">
                                @foreach($children as $child)
                                    <option value="{{ $child->id }}" @selected(in_array($child->id, old('children_ids', $selectedChildren)))>{{ $child->name }}</option>
                                @endforeach
                            </x-base.form-select>
                        </div>
                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="{{ route('guardians.index') }}" class="btn btn-outline-secondary w-24 mr-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.update') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
