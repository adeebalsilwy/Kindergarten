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
            <x-base.button variant="outline-secondary" as="a" href="{{ route('payments.index') }}" class="flex items-center shadow-sm">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" /> {{ __('global.back') }}
            </x-base.button>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <form action="{{ route('payments.store') }}" method="POST">
                @csrf
                
                <x-form-section title="{{ __('global.payment_information') }}" 
                               description="{{ __('global.payment_details_description') }}" 
                               icon="CreditCard">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12">
                            <x-form-field name="child_id" 
                                         label="{{ __('global.select_student') }}" 
                                         type="select" 
                                         :required="true" 
                                         :options="$children->pluck('name', 'id')->toArray()" 
                                         :value="old('child_id')" 
                                         icon="User" />
                        </div>
                        
                        <div class="col-span-12 md:col-span-6">
                            <x-form-field name="fee_id" 
                                         label="{{ __('global.select_fee') }}" 
                                         type="select" 
                                         :required="true" 
                                         :options="$fees->pluck('name', 'id')->toArray()" 
                                         :value="old('fee_id')" 
                                         icon="FileText" />
                        </div>
                        
                        <div class="col-span-12 md:col-span-6">
                            <x-form-field name="amount" 
                                         label="{{ __('global.amount') }}" 
                                         type="number" 
                                         :required="true" 
                                         :value="old('amount')" 
                                         placeholder="0.00" 
                                         icon="DollarSign" />
                        </div>
                        
                        <div class="col-span-12 md:col-span-6">
                            <x-form-field name="payment_date" 
                                         label="{{ __('global.payment_date') }}" 
                                         type="date" 
                                         :required="true" 
                                         :value="old('payment_date', now()->format('Y-m-d'))" 
                                         icon="Calendar" />
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
                                         :value="old('payment_method')" 
                                         icon="Wallet" />
                        </div>
                        
                        <div class="col-span-12 md:col-span-6">
                            <x-form-field name="reference_number" 
                                         label="{{ __('global.reference_number') }}" 
                                         type="text" 
                                         :value="old('reference_number')" 
                                         placeholder="{{ __('global.reference_number_placeholder') }}" 
                                         icon="Hash" />
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
                                         :value="old('status', 'completed')" 
                                         icon="Activity" />
                        </div>
                        
                        <div class="col-span-12">
                            <x-form-field name="notes" 
                                         label="{{ __('global.notes') }}" 
                                         type="textarea" 
                                         :value="old('notes')" 
                                         placeholder="{{ __('global.add_notes_here') }}" 
                                         icon="MessageSquare" />
                        </div>
                    </div>
                    
                    <x-form-actions backUrl="{{ route('payments.index') }}" />
                </x-form-section>
            </form>
        </div>
        
        <div class="intro-y col-span-12 lg:col-span-4">
            <div class="box p-6 border-l-4 border-info shadow-sm">
                <div class="flex items-center font-bold text-lg mb-6 text-info">
                    <x-base.lucide icon="Lightbulb" class="w-6 h-6 me-2" />
                    {{ __('global.payment_guidelines') }}
                </div>
                <ul class="space-y-4">
                    <li class="flex items-start bg-slate-50 p-3 rounded-lg border border-slate-100">
                        <x-base.lucide icon="CheckCircle" class="w-5 h-5 text-success me-3 mt-0.5 flex-shrink-0" />
                        <span class="text-sm font-medium text-slate-600">{{ __('global.payment_tip_1') }}</span>
                    </li>
                    <li class="flex items-start bg-slate-50 p-3 rounded-lg border border-slate-100">
                        <x-base.lucide icon="CheckCircle" class="w-5 h-5 text-success me-3 mt-0.5 flex-shrink-0" />
                        <span class="text-sm font-medium text-slate-600">{{ __('global.payment_tip_2') }}</span>
                    </li>
                    <li class="flex items-start bg-slate-50 p-3 rounded-lg border border-slate-100">
                        <x-base.lucide icon="CheckCircle" class="w-5 h-5 text-success me-3 mt-0.5 flex-shrink-0" />
                        <span class="text-sm font-medium text-slate-600">{{ __('global.payment_tip_3') }}</span>
                    </li>
                </ul>
            </div>
            
            <div class="box p-6 mt-6 border-l-4 border-warning shadow-sm">
                <div class="flex items-center font-bold text-lg mb-6 text-warning">
                    <x-base.lucide icon="AlertCircle" class="w-6 h-6 me-2" />
                    {{ __('global.quick_tips') }}
                </div>
                <div class="text-sm text-slate-600 leading-relaxed">
                    {{ __('global.payment_quick_tip_description') }}
                </div>
            </div>
        </div>
    </div>
@endsection
