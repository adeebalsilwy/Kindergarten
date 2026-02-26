@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Expense.add_new') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('Expense.add_new') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('expenses.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('expenses.fields.title') }}</x-base.form-label>
                            <x-base.form-input type="text" name="title" value="{{ old('title', $expense->title ?? '') }}" class="mt-2" />
                            @error('title')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('expenses.fields.description') }}</x-base.form-label>
                            <x-base.form-textarea name="description" rows="4" class="resize-none">{{ old('description', $expense->description ?? '') }}</x-base.form-textarea>
                            @error('description')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('expenses.fields.amount') }}</x-base.form-label>
                            <div class="relative mt-2">
                                <div class="absolute inset-y-0 left-0 ps-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">{{ config('app.currency', 'USD') }}</span>
                                </div>
                                <x-base.form-input type="number" step="0.01" min="0" name="amount" value="{{ old('amount', $expense->amount ?? '') }}" class="ps-12" />
                            </div>
                            @error('amount')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('expenses.fields.expense_date') }}</x-base.form-label>
                            <x-base.form-input type="date" name="expense_date" value="{{ old('expense_date', $expense->expense_date ?? '') }}" class="mt-2" />
                            @error('expense_date')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('expenses.fields.vendor') }}</x-base.form-label>
                            <x-base.form-input type="text" name="vendor" value="{{ old('vendor', $expense->vendor ?? '') }}" class="mt-2" />
                            @error('vendor')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('expenses.fields.receipt_number') }}</x-base.form-label>
                            <x-base.form-input type="text" name="receipt_number" value="{{ old('receipt_number', $expense->receipt_number ?? '') }}" class="mt-2" />
                            @error('receipt_number')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('expenses.fields.payment_method') }}</x-base.form-label>
                            <x-base.form-input type="text" name="payment_method" value="{{ old('payment_method', $expense->payment_method ?? '') }}" class="mt-2" />
                            @error('payment_method')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('expenses.fields.reference_number') }}</x-base.form-label>
                            <x-base.form-input type="text" name="reference_number" value="{{ old('reference_number', $expense->reference_number ?? '') }}" class="mt-2" />
                            @error('reference_number')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('expenses.fields.status') }}</x-base.form-label>
                            <x-base.tom-select name="status" class="mt-2">
                                <option value="">{{ __('global.select_option') }}</option>
                                <option value="active" {{ old('status', $expense->status ?? '') == 'active' ? 'selected' : '' }}>{{ __('global.active') }}</option>
                                <option value="inactive" {{ old('status', $expense->status ?? '') == 'inactive' ? 'selected' : '' }}>{{ __('global.inactive') }}</option>
                                <option value="pending" {{ old('status', $expense->status ?? '') == 'pending' ? 'selected' : '' }}>{{ __('global.pending') }}</option>
                                <option value="draft" {{ old('status', $expense->status ?? '') == 'draft' ? 'selected' : '' }}>{{ __('global.draft') }}</option>
                            </x-base.tom-select>
                            @error('status')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('expenses.fields.created_by') }}</x-base.form-label>
                            <x-base.form-input type="text" name="created_by" value="{{ old('created_by', $expense->created_by ?? '') }}" class="mt-2" />
                            @error('created_by')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('expenses.fields.assigned_to') }}</x-base.form-label>
                            <x-base.form-input type="text" name="assigned_to" value="{{ old('assigned_to', $expense->assigned_to ?? '') }}" class="mt-2" />
                            @error('assigned_to')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="{{ route('expenses.index') }}" class="btn btn-outline-secondary w-24 me-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.save') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
