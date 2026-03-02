@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('global.add_new_payment') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">
            {{ __('global.add_new_payment') }}
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <x-base.button variant="outline-secondary" as="a" href="{{ route('payments.index') }}" class="flex items-center">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" /> {{ __('global.back') }}
            </x-base.button>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="box p-5">
                <form action="{{ route('payments.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12">
                            <x-base.form-label class="font-bold">{{ __('global.select_student') }}</x-base.form-label>
                            <x-base.tom-select name="child_id" class="w-full">
                                <option value="">{{ __('global.please_select') }}</option>
                                @foreach($children ?? [] as $child)
                                    <option value="{{ $child->id }}" {{ old('child_id') == $child->id ? 'selected' : '' }}>
                                        {{ $child->name }} ({{ $child->class->name ?? '' }})
                                    </option>
                                @endforeach
                            </x-base.tom-select>
                            @error('child_id')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-span-12 md:col-span-6">
                            <x-base.form-label class="font-bold">{{ __('global.select_fee') }}</x-base.form-label>
                            <x-base.tom-select name="fee_id" class="w-full">
                                <option value="">{{ __('global.please_select') }}</option>
                                @foreach($fees ?? [] as $fee)
                                    <option value="{{ $fee->id }}" {{ old('fee_id') == $fee->id ? 'selected' : '' }}>
                                        {{ $fee->name }} - {{ number_format($fee->amount, 2) }}
                                    </option>
                                @endforeach
                            </x-base.tom-select>
                            @error('fee_id')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-span-12 md:col-span-6">
                            <x-base.form-label class="font-bold">{{ __('global.amount') }}</x-base.form-label>
                            <x-base.form-input type="number" step="0.01" name="amount" value="{{ old('amount') }}" class="w-full" placeholder="{{ __('global.amount') }}..." />
                            @error('amount')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-span-12 md:col-span-6">
                            <x-base.form-label class="font-bold">{{ __('global.payment_date') }}</x-base.form-label>
                            <x-base.form-input type="date" name="payment_date" value="{{ old('payment_date', now()->format('Y-m-d')) }}" class="w-full" />
                            @error('payment_date')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-span-12 md:col-span-6">
                            <x-base.form-label class="font-bold">{{ __('global.payment_method') }}</x-base.form-label>
                            <x-base.form-select name="payment_method" class="w-full">
                                <option value="">{{ __('global.please_select') }}</option>
                                <option value="cash" {{ old('payment_method') == 'cash' ? 'selected' : '' }}>{{ __('global.payment_method_cash') }}</option>
                                <option value="bank_transfer" {{ old('payment_method') == 'bank_transfer' ? 'selected' : '' }}>{{ __('global.payment_method_bank_transfer') }}</option>
                                <option value="credit_card" {{ old('payment_method') == 'credit_card' ? 'selected' : '' }}>{{ __('global.payment_method_credit_card') }}</option>
                                <option value="check" {{ old('payment_method') == 'check' ? 'selected' : '' }}>{{ __('global.payment_method_check') }}</option>
                            </x-base.form-select>
                            @error('payment_method')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-span-12 md:col-span-6">
                            <x-base.form-label class="font-bold">{{ __('global.reference_number') }}</x-base.form-label>
                            <x-base.form-input type="text" name="reference_number" value="{{ old('reference_number') }}" class="w-full" placeholder="{{ __('global.reference_number_placeholder') }}..." />
                            @error('reference_number')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-span-12 md:col-span-6">
                            <x-base.form-label class="font-bold">{{ __('global.status') }}</x-base.form-label>
                            <x-base.form-select name="status" class="w-full">
                                <option value="completed" {{ old('status', 'completed') == 'completed' ? 'selected' : '' }}>{{ __('global.payment_status_completed') }}</option>
                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>{{ __('global.payment_status_pending') }}</option>
                                <option value="failed" {{ old('status') == 'failed' ? 'selected' : '' }}>{{ __('global.payment_status_failed') }}</option>
                            </x-base.form-select>
                            @error('status')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-span-12">
                            <x-base.form-label class="font-bold">{{ __('global.notes') }}</x-base.form-label>
                            <x-base.form-textarea name="notes" class="w-full" rows="3" placeholder="{{ __('global.add_notes_here') }}...">{{ old('notes') }}</x-base.form-textarea>
                            @error('notes')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="flex justify-end gap-3 mt-8">
                        <x-base.button variant="outline-secondary" as="a" href="{{ route('payments.index') }}" class="w-32">
                            {{ __('global.cancel') }}
                        </x-base.button>
                        <x-base.button type="submit" variant="primary" class="w-48 shadow-md">
                            <x-base.lucide icon="Save" class="w-4 h-4 me-2" /> {{ __('global.save') }}
                        </x-base.button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="intro-y col-span-12 lg:col-span-4">
            <div class="box p-5">
                <div class="font-medium text-base mb-4">{{ __('global.payment_guidelines') }}</div>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <x-base.lucide icon="CheckCircle" class="w-4 h-4 text-success me-2 mt-0.5 flex-shrink-0" />
                        <span class="text-sm">{{ __('global.payment_tip_1') }}</span>
                    </li>
                    <li class="flex items-start">
                        <x-base.lucide icon="CheckCircle" class="w-4 h-4 text-success me-2 mt-0.5 flex-shrink-0" />
                        <span class="text-sm">{{ __('global.payment_tip_2') }}</span>
                    </li>
                    <li class="flex items-start">
                        <x-base.lucide icon="CheckCircle" class="w-4 h-4 text-success me-2 mt-0.5 flex-shrink-0" />
                        <span class="text-sm">{{ __('global.payment_tip_3') }}</span>
                    </li>
                </ul>
            </div>
            
            <div class="box p-5 mt-5">
                <div class="font-medium text-base mb-4">{{ __('global.quick_tips') }}</div>
                <ul class="space-y-2 text-sm text-slate-600">
                    <li class="flex items-start">
                        <x-base.lucide icon="Info" class="w-4 h-4 me-2 mt-0.5 flex-shrink-0" />
                        <span>{{ __('global.payment_tip_1') }}</span>
                    </li>
                    <li class="flex items-start">
                        <x-base.lucide icon="Info" class="w-4 h-4 me-2 mt-0.5 flex-shrink-0" />
                        <span>{{ __('global.payment_tip_2') }}</span>
                    </li>
                    <li class="flex items-start">
                        <x-base.lucide icon="Info" class="w-4 h-4 me-2 mt-0.5 flex-shrink-0" />
                        <span>{{ __('global.payment_tip_3') }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection