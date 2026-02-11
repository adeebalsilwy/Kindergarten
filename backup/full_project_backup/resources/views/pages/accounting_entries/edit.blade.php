@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('AccountingEntry.edit') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('AccountingEntry.edit') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('accounting_entries.update', $accountingEntries->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('accounting-entries.fields.description') }}</x-base.form-label>
                            <x-base.form-textarea name="description" rows="4" class="resize-none">{{ old('description', $accountingEntries->description ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('accounting-entries.fields.debit') }}</x-base.form-label>
                            <x-base.form-input type="number" step="0.01" name="debit" value="{{ old('debit', $accountingEntries->debit ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('accounting-entries.fields.credit') }}</x-base.form-label>
                            <x-base.form-input type="number" step="0.01" name="credit" value="{{ old('credit', $accountingEntries->credit ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('accounting-entries.fields.entry_date') }}</x-base.form-label>
                            <x-base.form-input type="text" name="entry_date" value="{{ old('entry_date', $accountingEntries->entry_date ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('accounting-entries.fields.reference') }}</x-base.form-label>
                            <x-base.form-input type="text" name="reference" value="{{ old('reference', $accountingEntries->reference ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('accounting-entries.fields.account_type') }}</x-base.form-label>
                            <x-base.tom-select name="account_type" class="mt-2">
                                <option value="">{{ __('global.select_option') }}</option>
                                <option value="option1" {{ old('account_type', $accountingEntries->account_type ?? '') == 'option1' ? 'selected' : '' }}>Option 1</option>
                                <option value="option2" {{ old('account_type', $accountingEntries->account_type ?? '') == 'option2' ? 'selected' : '' }}>Option 2</option>
                                <option value="option3" {{ old('account_type', $accountingEntries->account_type ?? '') == 'option3' ? 'selected' : '' }}>Option 3</option>
                            </x-base.tom-select>
                        </div>

                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="{{ route('accounting_entries.index') }}" class="btn btn-outline-secondary w-24 mr-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.update') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
