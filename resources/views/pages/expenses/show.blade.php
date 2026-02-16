@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Expense.show') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium ms-auto">{{ __('global.expense_details') }}</h2>
        <div class="ms-auto flex gap-2">
            <x-base.button variant="secondary" as="a" href="{{ route('expenses.index') }}">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
                {{ __('global.back') }}
            </x-base.button>
            @can('edit_expenses')
            <x-base.button variant="primary" as="a" href="{{ route('expenses.edit', $expense->id) }}">
                <x-base.lucide icon="Pencil" class="w-4 h-4 me-2" />
                {{ __('global.edit') }}
            </x-base.button>
            @endcan
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8 lg:col-start-3">
            <div class="box p-5">
                <div class="flex flex-col sm:flex-row items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="w-20 h-20 bg-danger/10 flex items-center justify-center text-danger rounded-full mb-4 sm:mb-0">
                        <x-base.lucide icon="ArrowUpCircle" class="w-10 h-10" />
                    </div>
                    <div class="ms-4 text-center sm:text-start">
                        <div class="text-2xl font-bold text-danger">{{ number_format($expense->amount, 2) }}</div>
                        <div class="text-lg font-medium">{{ $expense->title }}</div>
                        <div class="text-slate-500 text-sm">
                            {{ $expense->category }} | {{ $expense->expense_date }}
                        </div>
                    </div>
                    <div class="ms-auto mt-4 sm:mt-0">
                        <span class="px-4 py-2 rounded-full text-sm bg-{{ $expense->status == 'paid' ? 'success' : ($expense->status == 'pending' ? 'warning' : 'danger') }} text-white font-medium">
                            {{ __('global.'.$expense->status) }}
                        </span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-8 mt-6">
                    <div>
                        <div class="text-slate-500 text-xs uppercase">{{ __('global.vendor') }}</div>
                        <div class="font-medium text-base">{{ $expense->vendor ?? '-' }}</div>
                    </div>
                    <div>
                        <div class="text-slate-500 text-xs uppercase">{{ __('global.payment_method') }}</div>
                        <div class="font-medium text-base">{{ $expense->payment_method ?? '-' }}</div>
                    </div>
                    <div>
                        <div class="text-slate-500 text-xs uppercase">{{ __('global.receipt_number') }}</div>
                        <div class="font-medium text-base">{{ $expense->receipt_number ?? '-' }}</div>
                    </div>
                    <div>
                        <div class="text-slate-500 text-xs uppercase">{{ __('global.reference_number') }}</div>
                        <div class="font-medium text-base">{{ $expense->reference_number ?? '-' }}</div>
                    </div>
                    <div class="md:col-span-2">
                        <div class="text-slate-500 text-xs uppercase mb-1">{{ __('global.description') }}</div>
                        <div class="text-slate-600 p-4 bg-slate-50 rounded border border-slate-100">
                            {{ $expense->description ?? '-' }}
                        </div>
                    </div>
                </div>

                <div class="mt-10 pt-6 border-t border-slate-200/60 dark:border-darkmode-400">
                    <div class="flex items-center text-slate-500 text-xs">
                        <x-base.lucide icon="User" class="w-3 h-3 me-1" />
                        <span>{{ __('global.created_by') }}: {{ optional($expense->creator)->name ?? '-' }}</span>
                        <span class="mx-2">|</span>
                        <x-base.lucide icon="Clock" class="w-3 h-3 me-1" />
                        <span>{{ __('global.created_at') }}: {{ $expense->created_at->format('Y-m-d H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
