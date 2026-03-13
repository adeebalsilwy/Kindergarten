@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('global.edit_payment') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">
            {{ __('global.edit_payment') }} #{{ $payment->receipt_number }}
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <x-base.button variant="outline-secondary" as="a" href="{{ route('payments.index') }}" class="flex items-center shadow-sm">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" /> {{ __('global.back') }}
            </x-base.button>
        </div>
    </div>
    
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <form action="{{ route('payments.update', $payment->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <x-form-section title="{{ __('global.edit_payment_information') }}" 
                               description="{{ __('global.edit_payment_details_description') }}" 
                               icon="CreditCard">
                    <div class="col-span-12">
                        <x-base.form-label class="text-slate-700 font-bold mb-2 flex items-center">
                            <x-base.lucide icon="User" class="w-4 h-4 me-2 text-primary/70" />
                            {{ __('global.student') }}
                        </x-base.form-label>
                        <div class="p-4 bg-slate-50 border border-slate-200 rounded-xl mt-2 flex items-center shadow-sm">
                            <div class="w-12 h-12 image-fit me-4">
                                <img alt="{{ $payment->child->name ?? '' }}" class="rounded-full border-2 border-white shadow-md" src="{{ $payment->child->photo_path ? asset($payment->child->photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode($payment->child->name ?? 'N/A') . '&background=random' }}">
                            </div>
                            <div>
                                <div class="font-bold text-slate-800">{{ $payment->child->name ?? 'N/A' }}</div>
                                <div class="text-slate-500 text-xs font-medium">{{ $payment->child->class->name ?? '' }}</div>
                            </div>
                        </div>
                        <input type="hidden" name="child_id" value="{{ $payment->child_id }}">
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <x-form-field name="fee_id" 
                                     label="{{ __('global.fee_type') }}" 
                                     type="select" 
                                     :required="true" 
                                     :options="$fees->pluck('name', 'id')->toArray()" 
                                     :value="old('fee_id', $payment->fee_id)" 
                                     icon="FileText" 
                                     class="col-span-12" />
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <x-form-field name="amount" 
                                     label="{{ __('global.amount') }}" 
                                     type="number" 
                                     :required="true" 
                                     :value="old('amount', $payment->amount)" 
                                     placeholder="0.00" 
                                     icon="DollarSign" 
                                     class="col-span-12" />
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <x-form-field name="payment_date" 
                                     label="{{ __('global.payment_date') }}" 
                                     type="date" 
                                     :required="true" 
                                     :value="old('payment_date', $payment->payment_date ? $payment->payment_date->format('Y-m-d') : '')" 
                                     icon="Calendar" 
                                     class="col-span-12" />
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <x-form-field name="payment_method" 
                                     label="{{ __('global.payment_method') }}" 
                                     type="select" 
                                     :required="true" 
                                     :options="[
                                         'cash' => __('global.payment_method_cash'),
                                         'bank_transfer' => __('global.payment_method_bank_transfer'),
                                         'credit_card' => __('global.payment_method_credit_card'),
                                         'check' => __('global.payment_method_check')
                                     ]" 
                                     :value="old('payment_method', $payment->payment_method)" 
                                     icon="Wallet" 
                                     class="col-span-12" />
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <x-form-field name="status" 
                                     label="{{ __('global.status') }}" 
                                     type="select" 
                                     :required="true" 
                                     :options="[
                                         'completed' => __('global.payment_status_completed'),
                                         'pending' => __('global.payment_status_pending'),
                                         'failed' => __('global.payment_status_failed')
                                     ]" 
                                     :value="old('status', $payment->status)" 
                                     icon="Activity" 
                                     class="col-span-12" />
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <x-form-field name="reference_number" 
                                     label="{{ __('global.reference_number') }}" 
                                     type="text" 
                                     :value="old('reference_number', $payment->reference_number)" 
                                     placeholder="{{ __('global.reference_number_placeholder') }}" 
                                     icon="Hash" 
                                     class="col-span-12" />
                    </div>

                    <div class="col-span-12">
                        <x-form-field name="notes" 
                                     label="{{ __('global.notes') }}" 
                                     type="textarea" 
                                     :value="old('notes', $payment->notes)" 
                                     placeholder="{{ __('global.add_notes_here') }}" 
                                     icon="MessageSquare" 
                                     class="col-span-12" />
                    </div>

                    <div class="col-span-12">
                        <x-form-actions backUrl="{{ route('payments.index') }}" submitText="{{ __('global.update') }}" />
                    </div>
                </x-form-section>
            </form>
        </div>

        <div class="intro-y col-span-12 lg:col-span-4">
            <div class="box p-6 border-l-4 border-primary shadow-sm">
                <div class="flex items-center font-bold text-lg mb-6 text-primary">
                    <x-base.lucide icon="Activity" class="w-6 h-6 me-2" />
                    {{ __('global.audit_log') }}
                </div>
                <div class="space-y-6">
                    <div class="flex items-center bg-slate-50 p-3 rounded-lg border border-slate-100">
                        <div class="w-2 h-2 rounded-full bg-success me-4"></div>
                        <div class="flex-1">
                            <div class="text-xs font-bold text-slate-500 uppercase tracking-wider">{{ __('global.created_at') }}</div>
                            <div class="font-bold text-slate-700 mt-1">{{ $payment->created_at->format('Y-m-d H:i') }}</div>
                        </div>
                    </div>
                    <div class="flex items-center bg-slate-50 p-3 rounded-lg border border-slate-100">
                        <div class="w-2 h-2 rounded-full bg-warning me-4"></div>
                        <div class="flex-1">
                            <div class="text-xs font-bold text-slate-500 uppercase tracking-wider">{{ __('global.last_updated') }}</div>
                            <div class="font-bold text-slate-700 mt-1">{{ $payment->updated_at->format('Y-m-d H:i') }}</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="box p-6 mt-6 border-l-4 border-danger shadow-sm">
                <div class="flex items-center font-bold text-lg mb-6 text-danger">
                    <x-base.lucide icon="Trash2" class="w-6 h-6 me-2" />
                    {{ __('global.danger_zone') }}
                </div>
                <x-base.button variant="outline-danger" class="w-full flex items-center justify-center font-bold" onclick="confirmDelete('{{ $payment->id }}')">
                    <x-base.lucide icon="Trash2" class="w-4 h-4 me-2" /> {{ __('global.delete_payment') }}
                </x-base.button>
            </div>
        </div>
    </div>
@endsection
