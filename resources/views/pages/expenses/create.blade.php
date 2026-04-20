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
                            <x-form-field 
                                label="{{ __('expenses.fields.title') }}" 
                                name="title" 
                                value="{{ old('title') }}" 
                                placeholder="{{ __('expenses.fields.title') }}" 
                            />
                        </div>
                        <div class="col-span-12">
                            <x-form-field 
                                label="{{ __('expenses.fields.description') }}" 
                                name="description" 
                                type="textarea" 
                                value="{{ old('description') }}" 
                                placeholder="{{ __('expenses.fields.description') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('expenses.fields.amount') }}" 
                                name="amount" 
                                type="number" 
                                value="{{ old('amount') }}" 
                                step="0.01" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('expenses.fields.expense_date') }}" 
                                name="expense_date" 
                                type="date" 
                                value="{{ old('expense_date', now()->format('Y-m-d')) }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('expenses.fields.vendor') }}" 
                                name="vendor" 
                                value="{{ old('vendor') }}" 
                                placeholder="{{ __('expenses.fields.vendor') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('expenses.fields.receipt_number') }}" 
                                name="receipt_number" 
                                value="{{ old('receipt_number') }}" 
                                placeholder="{{ __('expenses.fields.receipt_number') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('expenses.fields.payment_method') }}" 
                                name="payment_method" 
                                type="select" 
                                :options="['cash' => __('global.cash'), 'bank_transfer' => __('global.bank_transfer'), 'credit_card' => __('global.credit_card')]" 
                                value="{{ old('payment_method') }}" 
                                placeholder="{{ __('global.select_payment_method') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('expenses.fields.reference_number') }}" 
                                name="reference_number" 
                                value="{{ old('reference_number') }}" 
                                placeholder="{{ __('expenses.fields.reference_number') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('expenses.fields.status') }}" 
                                name="status" 
                                type="select" 
                                :options="['pending' => __('global.pending'), 'approved' => __('global.approved'), 'rejected' => __('global.rejected'), 'paid' => __('global.paid')]" 
                                value="{{ old('status', 'pending') }}" 
                            />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-form-field 
                                label="{{ __('expenses.fields.assigned_to') }}" 
                                name="assigned_to" 
                                type="select" 
                                :options="$users->pluck('name', 'id')->toArray()" 
                                value="{{ old('assigned_to') }}" 
                                placeholder="{{ __('global.select_user') }}" 
                            />
                        </div>
                    </div>
                    <div class="flex justify-end mt-5">
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.save') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
