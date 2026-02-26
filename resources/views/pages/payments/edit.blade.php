@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Payment.edit') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('Payment.edit') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('payments.update', $payment->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('payments.fields.child_id') }}</x-base.form-label>
                            <x-base.tom-select name="child_id" class="mt-2" data-placeholder="{{ __('global.select_option') }}">
                                <option value="">{{ __('global.select_option') }}</option>
                                @foreach($children as $child)
                                    <option value="{{ $child->id }}" {{ old('child_id', $payment->child_id ?? '') == $child->id ? 'selected' : '' }}>
                                        {{ $child->name }}
                                    </option>
                                @endforeach
                            </x-base.tom-select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('payments.fields.fee_id') }}</x-base.form-label>
                            <x-base.tom-select name="fee_id" class="mt-2" data-placeholder="{{ __('global.select_option') }}">
                                <option value="">{{ __('global.select_option') }}</option>
                                @foreach($fees as $fee)
                                    <option value="{{ $fee->id }}" {{ old('fee_id', $payment->fee_id ?? '') == $fee->id ? 'selected' : '' }}>
                                        {{ $fee->name ?? ('#'.$fee->id) }}
                                    </option>
                                @endforeach
                            </x-base.tom-select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('payments.fields.amount') }}</x-base.form-label>
                            <div class="relative mt-2">
                                <div class="absolute inset-y-0 left-0 ps-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">{{ config('app.currency', 'USD') }}</span>
                                </div>
                                <x-base.form-input type="number" step="0.01" min="0" name="amount" value="{{ old('amount', $payment->amount ?? '') }}" class="ps-12" />
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('payments.fields.payment_date') }}</x-base.form-label>
                            <div class="relative mt-2">
                                <x-base.form-input type="date" name="payment_date" value="{{ old('payment_date', $payment->payment_date ?? '') }}" />
                                <div class="absolute inset-y-0 right-0 pe-3 flex items-center pointer-events-none">
                                    <x-base.lucide icon="Calendar" class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('payments.fields.payment_method') }}</x-base.form-label>
                            <x-base.tom-select name="payment_method" class="mt-2">
                                <option value="">{{ __('global.select_option') }}</option>
                                <option value="cash" {{ old('payment_method', $payment->payment_method ?? '') == 'cash' ? 'selected' : '' }}>{{ __('payments.methods.cash') }}</option>
                                <option value="bank_transfer" {{ old('payment_method', $payment->payment_method ?? '') == 'bank_transfer' ? 'selected' : '' }}>{{ __('payments.methods.bank_transfer') }}</option>
                                <option value="credit_card" {{ old('payment_method', $payment->payment_method ?? '') == 'credit_card' ? 'selected' : '' }}>{{ __('payments.methods.credit_card') }}</option>
                                <option value="check" {{ old('payment_method', $payment->payment_method ?? '') == 'check' ? 'selected' : '' }}>{{ __('payments.methods.check') }}</option>
                                <option value="online" {{ old('payment_method', $payment->payment_method ?? '') == 'online' ? 'selected' : '' }}>{{ __('payments.methods.online') }}</option>
                            </x-base.tom-select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('payments.fields.reference_number') }}</x-base.form-label>
                            <x-base.form-input type="text" name="reference_number" value="{{ old('reference_number', $payment->reference_number ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('payments.fields.status') }}</x-base.form-label>
                            <x-base.tom-select name="status" class="mt-2">
                                <option value="">{{ __('global.select_option') }}</option>
                                <option value="completed" {{ old('status', $payment->status ?? '') == 'completed' ? 'selected' : '' }}>{{ __('payments.statuses.completed') }}</option>
                                <option value="pending" {{ old('status', $payment->status ?? '') == 'pending' ? 'selected' : '' }}>{{ __('payments.statuses.pending') }}</option>
                                <option value="failed" {{ old('status', $payment->status ?? '') == 'failed' ? 'selected' : '' }}>{{ __('payments.statuses.failed') }}</option>
                                <option value="refunded" {{ old('status', $payment->status ?? '') == 'refunded' ? 'selected' : '' }}>{{ __('payments.statuses.refunded') }}</option>
                            </x-base.tom-select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('payments.fields.receipt_number') }}</x-base.form-label>
                            <x-base.form-input type="text" name="receipt_number" value="{{ old('receipt_number', $payment->receipt_number ?? '') }}" class="mt-2" />
                        </div>

                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="{{ route('payments.index') }}" class="btn btn-outline-secondary w-24 me-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.update') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
