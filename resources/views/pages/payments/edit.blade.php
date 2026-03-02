@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('global.edit_payment') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">
            {{ __('global.edit_payment') }} #{{ $payment->receipt_number }}
        </h2>
    </div>
    
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="box p-5">
                <form action="{{ route('payments.update', $payment->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 md:col-span-6">
                            <x-base.form-label class="font-bold">{{ __('global.student') }}</x-base.form-label>
                            <div class="p-3 bg-slate-100 dark:bg-darkmode-400 rounded-md mt-1 flex items-center">
                                <div class="w-10 h-10 image-fit me-3">
                                    <img alt="{{ $payment->child->name ?? '' }}" class="rounded-full shadow-md" src="{{ $payment->child->photo_path ? asset($payment->child->photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode($payment->child->name ?? 'N/A') . '&background=random' }}">
                                </div>
                                <div>
                                    <div class="font-medium">{{ $payment->child->name ?? 'N/A' }}</div>
                                    <div class="text-slate-500 text-xs">{{ $payment->child->class->name ?? '' }}</div>
                                </div>
                            </div>
                            <input type="hidden" name="child_id" value="{{ $payment->child_id }}">
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <x-base.form-label class="font-bold">{{ __('global.fee_type') }}</x-base.form-label>
                            <x-base.tom-select name="fee_id" class="w-full mt-1">
                                @foreach($fees as $fee)
                                    <option value="{{ $fee->id }}" {{ old('fee_id', $payment->fee_id) == $fee->id ? 'selected' : '' }}>
                                        {{ $fee->name }} ({{ number_format($fee->amount, 2) }})
                                    </option>
                                @endforeach
                            </x-base.tom-select>
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <x-base.form-label class="font-bold">{{ __('global.amount') }}</x-base.form-label>
                            <div class="relative mt-1">
                                <x-base.form-input type="number" step="0.01" name="amount" value="{{ old('amount', $payment->amount) }}" class="w-full ps-12" />
                                <div class="absolute inset-y-0 left-0 ps-3 flex items-center pointer-events-none text-slate-400 font-bold">
                                    YER
                                </div>
                            </div>
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <x-base.form-label class="font-bold">{{ __('global.payment_date') }}</x-base.form-label>
                            <x-base.form-input type="date" name="payment_date" value="{{ old('payment_date', $payment->payment_date ? $payment->payment_date->format('Y-m-d') : '') }}" class="w-full mt-1" />
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <x-base.form-label class="font-bold">{{ __('global.payment_method') }}</x-base.form-label>
                            <x-base.form-select name="payment_method" class="w-full mt-1">
                                <option value="cash" {{ old('payment_method', $payment->payment_method) == 'cash' ? 'selected' : '' }}>{{ __('payments.methods.cash') }}</option>
                                <option value="bank_transfer" {{ old('payment_method', $payment->payment_method) == 'bank_transfer' ? 'selected' : '' }}>{{ __('payments.methods.bank_transfer') }}</option>
                            </x-base.form-select>
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <x-base.form-label class="font-bold">{{ __('global.status') }}</x-base.form-label>
                            <x-base.form-select name="status" class="w-full mt-1">
                                <option value="completed" {{ old('status', $payment->status) == 'completed' ? 'selected' : '' }}>{{ __('payments.status.completed') }}</option>
                                <option value="pending" {{ old('status', $payment->status) == 'pending' ? 'selected' : '' }}>{{ __('payments.status.pending') }}</option>
                                <option value="failed" {{ old('status', $payment->status) == 'failed' ? 'selected' : '' }}>{{ __('payments.status.failed') }}</option>
                            </x-base.form-select>
                        </div>

                        <div class="col-span-12">
                            <x-base.form-label class="font-bold">{{ __('global.reference_number') }}</x-base.form-label>
                            <x-base.form-input type="text" name="reference_number" value="{{ old('reference_number', $payment->reference_number) }}" class="w-full mt-1" />
                        </div>

                        <div class="col-span-12">
                            <x-base.form-label class="font-bold">{{ __('global.notes') }}</x-base.form-label>
                            <x-base.form-textarea name="notes" rows="3" class="w-full mt-1 resize-none">{{ old('notes', $payment->notes) }}</x-base.form-textarea>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 mt-8">
                        <x-base.button variant="outline-secondary" as="a" href="{{ route('payments.index') }}" class="w-32">
                            {{ __('global.cancel') }}
                        </x-base.button>
                        <x-base.button type="submit" variant="primary" class="w-32 shadow-md">
                            <x-base.lucide icon="Save" class="w-4 h-4 me-2" /> {{ __('global.update') }}
                        </x-base.button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Audit Log -->
        <div class="intro-y col-span-12 lg:col-span-4">
            <div class="box p-5">
                <div class="flex items-center font-bold mb-4 border-b pb-4">
                    <x-base.lucide icon="Activity" class="w-5 h-5 me-2 text-primary" />
                    {{ __('global.audit_log') }}
                </div>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <div class="w-2 h-2 rounded-full bg-success me-3"></div>
                        <div class="flex-1">
                            <div class="text-xs text-slate-500">{{ __('global.created_at') }}</div>
                            <div class="font-medium text-xs">{{ $payment->created_at->format('Y-m-d H:i') }}</div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-2 h-2 rounded-full bg-warning me-3"></div>
                        <div class="flex-1">
                            <div class="text-xs text-slate-500">{{ __('global.last_updated') }}</div>
                            <div class="font-medium text-xs">{{ $payment->updated_at->format('Y-m-d H:i') }}</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="box p-5 mt-5">
                <x-base.button variant="outline-danger" class="w-full flex items-center justify-center" onclick="confirmDelete('{{ $payment->id }}')">
                    <x-base.lucide icon="Trash2" class="w-4 h-4 me-2" /> {{ __('global.delete_payment') }}
                </x-base.button>
            </div>
        </div>
    </div>
@endsection
