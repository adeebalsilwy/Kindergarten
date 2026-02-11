@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Expense.edit') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('Expense.edit') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('expenses.update', $expenses->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('expenses.fields.title') }}</x-base.form-label>
                            <x-base.form-input type="text" name="title" value="{{ old('title', $expenses->title ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('expenses.fields.description') }}</x-base.form-label>
                            <x-base.form-textarea name="description" rows="4" class="resize-none">{{ old('description', $expenses->description ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('expenses.fields.amount') }}</x-base.form-label>
                            <div class="relative mt-2">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">{{ config('app.currency', 'USD') }}</span>
                                </div>
                                <x-base.form-input type="number" step="0.01" min="0" name="amount" value="{{ old('amount', $expenses->amount ?? '') }}" class="pl-12" />
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('expenses.fields.expense_date') }}</x-base.form-label>
                            <x-base.form-input type="date" name="expense_date" value="{{ old('expense_date', $expenses->expense_date ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('expenses.fields.category') }}</x-base.form-label>
                            <x-base.tom-select name="category" class="mt-2">
                                <option value="">{{ __('global.select_option') }}</option>
                                <option value="option1" {{ old('category', $expenses->category ?? '') == 'option1' ? 'selected' : '' }}>Option 1</option>
                                <option value="option2" {{ old('category', $expenses->category ?? '') == 'option2' ? 'selected' : '' }}>Option 2</option>
                                <option value="option3" {{ old('category', $expenses->category ?? '') == 'option3' ? 'selected' : '' }}>Option 3</option>
                            </x-base.tom-select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('expenses.fields.vendor') }}</x-base.form-label>
                            <x-base.form-input type="text" name="vendor" value="{{ old('vendor', $expenses->vendor ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('expenses.fields.receipt_number') }}</x-base.form-label>
                            <x-base.form-input type="text" name="receipt_number" value="{{ old('receipt_number', $expenses->receipt_number ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('expenses.fields.payment_method') }}</x-base.form-label>
                            <x-base.form-input type="text" name="payment_method" value="{{ old('payment_method', $expenses->payment_method ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('expenses.fields.reference_number') }}</x-base.form-label>
                            <x-base.form-input type="text" name="reference_number" value="{{ old('reference_number', $expenses->reference_number ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('expenses.fields.status') }}</x-base.form-label>
                            <x-base.tom-select name="status" class="mt-2">
                                <option value="">{{ __('global.select_option') }}</option>
                                <option value="active" {{ old('status', $expenses->status ?? '') == 'active' ? 'selected' : '' }}>{{ __('global.active') }}</option>
                                <option value="inactive" {{ old('status', $expenses->status ?? '') == 'inactive' ? 'selected' : '' }}>{{ __('global.inactive') }}</option>
                                <option value="pending" {{ old('status', $expenses->status ?? '') == 'pending' ? 'selected' : '' }}>{{ __('global.pending') }}</option>
                                <option value="draft" {{ old('status', $expenses->status ?? '') == 'draft' ? 'selected' : '' }}>{{ __('global.draft') }}</option>
                            </x-base.tom-select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('expenses.fields.created_by') }}</x-base.form-label>
                            <x-base.form-input type="text" name="created_by" value="{{ old('created_by', $expenses->created_by ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('expenses.fields.assigned_to') }}</x-base.form-label>
                            <x-base.form-input type="text" name="assigned_to" value="{{ old('assigned_to', $expenses->assigned_to ?? '') }}" class="mt-2" />
                        </div>

                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="{{ route('expenses.index') }}" class="btn btn-outline-secondary w-24 mr-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.update') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
