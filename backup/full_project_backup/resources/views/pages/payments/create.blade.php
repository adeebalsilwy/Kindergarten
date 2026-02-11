@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('kindergarten.payments.add_new') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('kindergarten.payments.add_new') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.payments.fields.child_id') }}</x-base.form-label>
                            <x-base.form-input type="text" name="child_id" value="{{ old('child_id', $payments->child_id ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.payments.fields.fee_id') }}</x-base.form-label>
                            <x-base.form-input type="text" name="fee_id" value="{{ old('fee_id', $payments->fee_id ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.payments.fields.amount') }}</x-base.form-label>
                            <div class="relative mt-2">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">{{ config('app.currency', 'USD') }}</span>
                                </div>
                                <x-base.form-input type="number" step="0.01" min="0" name="amount" value="{{ old('amount', $payments->amount ?? '') }}" class="pl-12" />
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.payments.fields.payment_date') }}</x-base.form-label>
                            <div class="relative mt-2">
                                <x-base.form-input type="date" name="payment_date" value="{{ old('payment_date', $payments->payment_date ?? '') }}" />
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <x-base.lucide icon="Calendar" class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.payments.fields.payment_method') }}</x-base.form-label>
                            <x-base.tom-select name="payment_method" class="mt-2">
                                <option value="">{{ __('global.select_option') }}</option>
                                <option value="option1" {{ old('payment_method', $payments->payment_method ?? '') == 'option1' ? 'selected' : '' }}>Option 1</option>
                                <option value="option2" {{ old('payment_method', $payments->payment_method ?? '') == 'option2' ? 'selected' : '' }}>Option 2</option>
                                <option value="option3" {{ old('payment_method', $payments->payment_method ?? '') == 'option3' ? 'selected' : '' }}>Option 3</option>
                            </x-base.tom-select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.payments.fields.reference_number') }}</x-base.form-label>
                            <x-base.form-input type="text" name="reference_number" value="{{ old('reference_number', $payments->reference_number ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.payments.fields.status') }}</x-base.form-label>
                            <x-base.tom-select name="status" class="mt-2">
                                <option value="">{{ __('global.select_option') }}</option>
                                <option value="active" {{ old('status', $payments->status ?? '') == 'active' ? 'selected' : '' }}>{{ __('global.active') }}</option>
                                <option value="inactive" {{ old('status', $payments->status ?? '') == 'inactive' ? 'selected' : '' }}>{{ __('global.inactive') }}</option>
                                <option value="pending" {{ old('status', $payments->status ?? '') == 'pending' ? 'selected' : '' }}>{{ __('global.pending') }}</option>
                                <option value="draft" {{ old('status', $payments->status ?? '') == 'draft' ? 'selected' : '' }}>{{ __('global.draft') }}</option>
                            </x-base.tom-select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.payments.fields.receipt_number') }}</x-base.form-label>
                            <x-base.form-input type="text" name="receipt_number" value="{{ old('receipt_number', $payments->receipt_number ?? '') }}" class="mt-2" />
                        </div>

                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="{{ route('payments.index') }}" class="btn btn-outline-secondary w-24 mr-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.save') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
