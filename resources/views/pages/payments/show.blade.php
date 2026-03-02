@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('global.payment_details') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">
            {{ __('global.payment_details') }} #{{ $payment->receipt_number }}
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0 gap-2">
            <x-base.button variant="outline-secondary" as="a" href="{{ route('payments.index') }}" class="flex items-center">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" /> {{ __('global.back') }}
            </x-base.button>
            @can('edit_payments')
                <x-base.button variant="primary" as="a" href="{{ route('payments.edit', $payment->id) }}" class="flex items-center shadow-md">
                    <x-base.lucide icon="Pencil" class="w-4 h-4 me-2" /> {{ __('global.edit') }}
                </x-base.button>
            @endcan
            <x-base.button variant="outline-primary" onclick="window.print()" class="flex items-center">
                <x-base.lucide icon="Printer" class="w-4 h-4 me-2" /> {{ __('global.print') }}
            </x-base.button>
            <x-base.button variant="outline-primary" as="a" href="{{ route('payments.export.pdf', ['id' => $payment->id]) }}" class="flex items-center">
                <x-base.lucide icon="Download" class="w-4 h-4 me-2" /> {{ __('global.download_receipt') }}
            </x-base.button>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Main Payment Info -->
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="box p-5">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base">{{ __('global.payment_info') }}</div>
                    <div class="ms-auto">
                        <span class="px-3 py-1 rounded-full text-xs font-medium 
                            {{ $payment->status == 'completed' ? 'bg-success/10 text-success border border-success/20' : '' }}
                            {{ $payment->status == 'pending' ? 'bg-warning/10 text-warning border border-warning/20' : '' }}
                            {{ $payment->status == 'failed' ? 'bg-danger/10 text-danger border border-danger/20' : '' }}">
                            {{ __('global.payment_status_' . $payment->status) }}
                        </span>
                    </div>
                </div>
                
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 md:col-span-6">
                        <div class="text-slate-500 text-xs mb-1">{{ __('global.amount') }}</div>
                        <div class="text-2xl font-bold text-success">{{ number_format($payment->amount, 2) }} <span class="text-sm font-normal text-slate-400">YER</span></div>
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <div class="text-slate-500 text-xs mb-1">{{ __('global.payment_date') }}</div>
                        <div class="text-lg font-medium">{{ $payment->payment_date->format('Y-m-d H:i') }}</div>
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <div class="text-slate-500 text-xs mb-1">{{ __('global.payment_method') }}</div>
                        <div class="flex items-center mt-1">
                            <x-base.lucide icon="CreditCard" class="w-4 h-4 me-2 text-slate-400" />
                            <span class="font-medium">{{ __('global.payment_method_' . $payment->payment_method) }}</span>
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <div class="text-slate-500 text-xs mb-1">{{ __('global.fee_name') }}</div>
                        <div class="flex items-center mt-1">
                            <x-base.lucide icon="Tag" class="w-4 h-4 me-2 text-slate-400" />
                            <span class="font-medium">{{ $payment->fee->name ?? 'N/A' }}</span>
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <div class="text-slate-500 text-xs mb-1">{{ __('global.receipt_number') }}</div>
                        <div class="flex items-center mt-1">
                            <x-base.lucide icon="FileText" class="w-4 h-4 me-2 text-slate-400" />
                            <span class="font-medium">#{{ $payment->receipt_number }}</span>
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <div class="text-slate-500 text-xs mb-1">{{ __('global.payment_reference') }}</div>
                        <div class="flex items-center mt-1">
                            <x-base.lucide icon="Hash" class="w-4 h-4 me-2 text-slate-400" />
                            <span class="font-mono text-sm">{{ $payment->reference_number ?: '-' }}</span>
                        </div>
                    </div>
                    @if($payment->notes)
                        <div class="col-span-12">
                            <div class="text-slate-500 text-xs mb-1">{{ __('global.notes') }}</div>
                            <div class="p-3 bg-slate-50 dark:bg-darkmode-600 rounded-md italic text-slate-600">
                                "{{ $payment->notes }}"
                            </div>
                        </div>
                    @endif
                    @if($payment->transaction_id)
                        <div class="col-span-12">
                            <div class="text-slate-500 text-xs mb-1">{{ __('global.transaction_id') }}</div>
                            <div class="p-3 bg-slate-50 dark:bg-darkmode-600 rounded-md font-mono text-sm">
                                {{ $payment->transaction_id }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Receipt Preview -->
            <div class="box p-5 mt-5 bg-slate-50 border-2 border-dashed border-slate-200">
                <div class="flex items-center mb-4 text-slate-500 font-bold uppercase tracking-wider text-xs">
                    <x-base.lucide icon="FileText" class="w-4 h-4 me-2" />
                    {{ __('global.receipt_preview') }}
                </div>
                <div class="bg-white p-8 shadow-sm rounded-lg border">
                    <div class="flex justify-between items-start mb-8">
                        <div>
                            <div class="text-2xl font-bold text-primary">{{ config('app.name') }}</div>
                            <div class="text-slate-500 text-xs">{{ __('global.receipt_official_copy') }}</div>
                        </div>
                        <div class="text-right">
                            <div class="text-xl font-bold">#{{ $payment->receipt_number }}</div>
                            <div class="text-slate-500 text-xs">{{ $payment->payment_date->format('M d, Y') }}</div>
                        </div>
                    </div>
                    <div class="border-y py-4 my-4 grid grid-cols-2 gap-4">
                        <div>
                            <div class="text-slate-400 text-[10px] uppercase font-bold mb-1">{{ __('global.received_from') }}</div>
                            <div class="font-bold">{{ $payment->child->name ?? 'N/A' }}</div>
                            <div class="text-slate-500 text-xs">{{ $payment->child->class->name ?? '' }}</div>
                        </div>
                        <div class="text-right">
                            <div class="text-slate-400 text-[10px] uppercase font-bold mb-1">{{ __('global.payment_for') }}</div>
                            <div class="font-bold">{{ $payment->fee->name ?? 'N/A' }}</div>
                            <div class="text-slate-500 text-xs">{{ __('global.payment_method_' . $payment->payment_method) }}</div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center mt-8">
                        <div class="text-slate-400 text-xs">{{ __('global.thank_you_for_payment') }}</div>
                        <div class="text-right">
                            <div class="text-slate-400 text-[10px] uppercase font-bold mb-1">{{ __('global.total_amount') }}</div>
                            <div class="text-3xl font-bold text-primary">{{ number_format($payment->amount, 2) }} YER</div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 flex justify-center">
                    <x-base.button variant="primary" as="a" href="{{ route('payments.export.pdf', ['id' => $payment->id]) }}" class="w-48">
                        <x-base.lucide icon="Download" class="w-4 h-4 me-2" /> {{ __('global.download_receipt') }}
                    </x-base.button>
                </div>
            </div>
        </div>

        <!-- Sidebar Info -->
        <div class="intro-y col-span-12 lg:col-span-4">
            <!-- Student Profile Summary -->
            <div class="box p-5">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base">{{ __('global.student_profile') }}</div>
                </div>
                <div class="flex flex-col items-center">
                    <div class="w-24 h-24 image-fit">
                        <img alt="{{ $payment->child->name ?? '' }}" class="rounded-full shadow-lg border-4 border-white" src="{{ $payment->child->photo_path ? asset($payment->child->photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode($payment->child->name ?? 'N/A') . '&background=random' }}">
                    </div>
                    <div class="text-lg font-bold mt-3">{{ $payment->child->name ?? 'N/A' }}</div>
                    <div class="text-slate-500 mt-1">{{ $payment->child->class->name ?? '' }}</div>
                    
                    <div class="grid grid-cols-2 gap-2 w-full mt-6">
                        <div class="p-3 bg-slate-50 rounded-lg text-center">
                            <div class="text-xs text-slate-500 mb-1">{{ __('global.total_paid') }}</div>
                            <div class="font-bold text-success">{{ number_format($payment->child->payments()->sum('amount'), 2) }}</div>
                        </div>
                        <div class="p-3 bg-slate-50 rounded-lg text-center">
                            <div class="text-xs text-slate-500 mb-1">{{ __('global.attendance') }}</div>
                            <div class="font-bold text-primary">{{ $payment->child->attendances()->where('status', 'present')->count() }}</div>
                        </div>
                    </div>
                    
                    <x-base.button variant="outline-primary" as="a" href="{{ route('children.show', $payment->child_id) }}" class="w-full mt-6">
                        <x-base.lucide icon="User" class="w-4 h-4 me-2" /> {{ __('global.view_full_profile') }}
                    </x-base.button>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="box p-5 mt-5">
                <div class="font-medium text-base mb-4">{{ __('global.quick_actions') }}</div>
                <div class="flex flex-col gap-2">
                    <x-base.button variant="outline-secondary" as="a" href="{{ route('payments.create', ['child_id' => $payment->child_id]) }}" class="justify-start">
                        <x-base.lucide icon="Plus" class="w-4 h-4 me-2 text-primary" /> {{ __('global.add_new_payment') }}
                    </x-base.button>
                    <x-base.button variant="outline-secondary" as="a" href="{{ route('attendances.create', ['child_id' => $payment->child_id]) }}" class="justify-start">
                        <x-base.lucide icon="CalendarCheck" class="w-4 h-4 me-2 text-success" /> {{ __('global.mark_attendance') }}
                    </x-base.button>
                    <x-base.button variant="outline-secondary" as="a" href="{{ route('payments.index', ['child_id' => $payment->child_id]) }}" class="justify-start">
                        <x-base.lucide icon="History" class="w-4 h-4 me-2 text-info" /> {{ __('global.payment_history') }}
                    </x-base.button>
                </div>
            </div>

            <!-- Financial Summary -->
            <div class="box p-5 mt-5">
                <div class="font-medium text-base mb-4">{{ __('global.financial_overview') }}</div>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-slate-500">{{ __('global.paid_amount') }}</span>
                        <span class="font-bold text-success">{{ number_format($payment->child->payments()->sum('amount'), 2) }} YER</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-500">{{ __('global.outstanding_balance') }}</span>
                        <span class="font-bold text-danger">{{ number_format($payment->child->fees_required - $payment->child->fees_paid, 2) }} YER</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-500">{{ __('global.total_fees_value') }}</span>
                        <span class="font-bold text-primary">{{ number_format($payment->child->fees_required, 2) }} YER</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection