@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Expense.edit') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('Expense.edit') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('expenses.update', $expense->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('expenses.fields.title') }}" 
                                name="title" 
                                value="{{ old('title', $expense->title) }}" 
                                placeholder="{{ __('expenses.fields.title') }}" 
                            />
                        </div>
                        <div class="col-span-12">
                            <x-form-field 
                                label="{{ __('expenses.fields.description') }}" 
                                name="description" 
                                type="textarea" 
                                value="{{ old('description', $expense->description) }}" 
                                placeholder="{{ __('expenses.fields.description') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('expenses.fields.amount') }}" 
                                name="amount" 
                                type="number" 
                                value="{{ old('amount', $expense->amount) }}" 
                                step="0.01" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('expenses.fields.expense_date') }}" 
                                name="expense_date" 
                                type="date" 
                                value="{{ old('expense_date', $expense->expense_date ? $expense->expense_date->format('Y-m-d') : '') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('expenses.fields.vendor') }}" 
                                name="vendor" 
                                value="{{ old('vendor', $expense->vendor) }}" 
                                placeholder="{{ __('expenses.fields.vendor') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('expenses.fields.receipt_number') }}" 
                                name="receipt_number" 
                                value="{{ old('receipt_number', $expense->receipt_number) }}" 
                                placeholder="{{ __('expenses.fields.receipt_number') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('expenses.fields.payment_method') }}" 
                                name="payment_method" 
                                type="select" 
                                :options="['cash' => __('global.cash'), 'bank_transfer' => __('global.bank_transfer'), 'credit_card' => __('global.credit_card')]" 
                                value="{{ old('payment_method', $expense->payment_method) }}" 
                                placeholder="{{ __('global.select_payment_method') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('expenses.fields.reference_number') }}" 
                                name="reference_number" 
                                value="{{ old('reference_number', $expense->reference_number) }}" 
                                placeholder="{{ __('expenses.fields.reference_number') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('expenses.fields.status') }}" 
                                name="status" 
                                type="select" 
                                :options="['pending' => __('global.pending'), 'approved' => __('global.approved'), 'rejected' => __('global.rejected'), 'paid' => __('global.paid')]" 
                                value="{{ old('status', $expense->status) }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('expenses.fields.assigned_to') }}" 
                                name="assigned_to" 
                                type="select" 
                                :options="$users->pluck('name', 'id')->toArray()" 
                                value="{{ old('assigned_to', $expense->assigned_to) }}" 
                                placeholder="{{ __('global.select_user') }}" 
                            />
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <a href="{{ route('expenses.index') }}" class="btn btn-outline-secondary w-24 me-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.update') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
