@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Payment.show') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('global.payment_details') }}</h2>
        <div class="ml-auto flex gap-2">
            <x-base.button variant="secondary" as="a" href="{{ route('payments.index') }}">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 mr-2" />
                {{ __('global.back') }}
            </x-base.button>
            @can('edit_payments')
            <x-base.button variant="primary" as="a" href="{{ route('payments.edit', $payment->id) }}">
                <x-base.lucide icon="Pencil" class="w-4 h-4 mr-2" />
                {{ __('global.edit') }}
            </x-base.button>
            @endcan
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-4">
            <div class="box p-5">
                <div class="flex items-start">
                    <div>
                        <div class="text-base font-medium">
                            <a href="{{ route('children.show', $payment->child->id) }}" class="text-primary">
                                {{ optional($payment->child)->name ?? optional($payment->child)->first_name ?? '-' }}
                            </a>
                        </div>
                        <div class="text-slate-500 text-sm">
                            {{ optional(optional($payment->child)->class)->name ?? '-' }}
                        </div>
                    </div>
                    <div class="ml-auto">
                        @php
                            $status = $payment->status ?? 'completed';
                            $badgeColor = match($status) {
                                'completed' => 'success',
                                'pending' => 'warning',
                                'failed' => 'danger',
                                default => 'slate',
                            };
                        @endphp
                        <span class="px-2 py-1 rounded-full text-xs bg-{{ $badgeColor }}/20 text-{{ $badgeColor }}">{{ ucfirst($status) }}</span>
                    </div>
                </div>
                <div class="mt-5 grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <div class="text-xs text-slate-500">{{ __('global.amount') }}</div>
                        <div class="font-medium">{{ number_format($payment->amount ?? 0, 2) }}</div>
                    </div>
                    <div>
                        <div class="text-xs text-slate-500">{{ __('global.method') }}</div>
                        <div class="font-medium">{{ $payment->payment_method ?? '-' }}</div>
                    </div>
                    <div>
                        <div class="text-xs text-slate-500">{{ __('global.date') }}</div>
                        <div class="font-medium">{{ optional($payment->payment_date)->format('Y-m-d') ?? '-' }}</div>
                    </div>
                    <div>
                        <div class="text-xs text-slate-500">{{ __('global.reference') }}</div>
                        <div class="font-medium">{{ $payment->reference_number ?? '-' }}</div>
                    </div>
                </div>
            </div>

            <div class="box p-5 mt-5">
                <div class="text-base font-medium mb-3">{{ __('global.fee') }}</div>
                <div class="text-sm">
                    {{ optional($payment->fee)->name ?? __('global.not_specified') }}
                </div>
            </div>
        </div>

        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="box p-5">
                <div class="text-base font-medium mb-3">{{ __('global.summary') }}</div>
                <div class="grid grid-cols-3 gap-4">
                    <x-widgets.stat-card :value="$payment->amount ?? 0" :label="__('global.amount')" icon="DollarSign" />
                    <x-widgets.stat-card :value="optional($payment->payment_date)->format('Y-m-d') ?? '-'" :label="__('global.date')" icon="Calendar" />
                    <x-widgets.stat-card :value="$payment->receipt_number ?? '-'" :label="__('global.receipt')" icon="FileText" />
                </div>
            </div>
        </div>
    </div>
@endsection
