@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Payment.list') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('Payment.list') }}</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            @can('export_payments')
            
                        <div class="flex gap-2">
                            <x-base.button variant="outline-primary" as="a" href="{{ route('payments.export.pdf') }}" class="flex items-center">
                                <x-base.lucide icon="FileText" class="w-4 h-4 mr-2" />
                                {{ __('global.export_pdf') }}
                            </x-base.button>
                            <x-base.button variant="outline-success" as="a" href="{{ route('payments.export.excel') }}" class="flex items-center">
                                <x-base.lucide icon="FileSpreadsheet" class="w-4 h-4 mr-2" />
                                {{ __('global.export_excel') }}
                            </x-base.button>
                        </div>
            @endcan
            
            @can('create_payments')
            <x-base.button variant="primary" as="a" href="{{ route('payments.create') }}" class="ml-2 flex items-center">
                <x-base.lucide icon="Plus" class="w-4 h-4 mr-2" />
                {{ __('Payment.add_new') }}
            </x-base.button>
            @endcan
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Filter Section -->
        <div class="intro-y col-span-12">
            <div class="box p-5">
                <form method="GET" action="{{ route('payments.index') }}">
                    <div class="flex flex-col lg:flex-row gap-4 items-end">
                        <div class="flex-1">
                            <label class="form-label">{{ __('global.search') }}</label>
                            <div class="relative">
                                <x-base.form-input 
                                    type="text" 
                                    name="search"
                                    value="{{ request('search') }}"
                                    placeholder="{{ __('global.search_payments') }}..." 
                                    class="w-full pl-10 pr-4 py-2"
                                />
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <x-base.lucide icon="Search" class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>
                        </div>
                        <div class="w-full lg:w-48">
                            <label class="form-label">{{ __('payments.fields.status') }}</label>
                            <select name="status" class="form-select w-full box">
                                <option value="">{{ __('global.all_status') }}</option>
                                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>{{ __('payments.status.completed') }}</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>{{ __('payments.status.pending') }}</option>
                                <option value="failed" {{ request('status') == 'failed' ? 'selected' : '' }}>{{ __('payments.status.failed') }}</option>
                            </select>
                        </div>
                        <div class="w-full lg:w-48">
                            <label class="form-label">{{ __('payments.fields.payment_date') }}</label>
                            <x-base.form-input 
                                type="date" 
                                name="payment_date"
                                value="{{ request('payment_date') }}"
                                class="w-full"
                            />
                        </div>
                        <div class="flex gap-2">
                            <x-base.button as="a" href="{{ route('payments.index') }}" variant="secondary" class="flex items-center">
                                <x-base.lucide icon="RotateCcw" class="w-4 h-4 mr-2" />
                                {{ __('global.reset') }}
                            </x-base.button>
                            <x-base.button type="submit" variant="primary" class="flex items-center">
                                <x-base.lucide icon="Filter" class="w-4 h-4 mr-2" />
                                {{ __('global.apply') }}
                            </x-base.button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <x-base.table class="table-report -mt-2">
                <x-base.table.thead>
                    <x-base.table.tr>
@php
    $canEdit = auth()->user()->can('edit_payments');
    $canDelete = auth()->user()->can('delete_payments');
    $canView = auth()->user()->can('view_payments');
@endphp
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('payments.fields.child_id') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('payments.fields.fee_id') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('payments.fields.amount') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('payments.fields.payment_date') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('payments.fields.payment_method') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('payments.fields.reference_number') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('payments.fields.status') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('payments.fields.receipt_number') }}</x-base.table.th>

                        @if($canEdit || $canDelete || $canView)
                        <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.actions') }}</x-base.table.th>
                        @endif
                    </x-base.table.tr>
                </x-base.table.thead>
                <x-base.table.tbody>
                    @forelse($payments as $payment)
                        <x-base.table.tr class="intro-x">
                            <x-base.table.td class="text-center">{{ $payment->child->name ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $payment->fee->name ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center font-medium text-success">{{ __('global.currency_symbol', ['amount' => number_format($payment->amount)]) }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $payment->payment_date ? $payment->payment_date->format('Y-m-d') : '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $payment->payment_method ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $payment->reference_number ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">
                                <span class="px-2 py-1 rounded-full text-xs font-medium
                                    {{ $payment->status == 'completed' ? 'bg-success/10 text-success' : '' }}
                                    {{ $payment->status == 'pending' ? 'bg-warning/10 text-warning' : '' }}
                                    {{ $payment->status == 'failed' ? 'bg-danger/10 text-danger' : '' }}">
                                    {{ __('payments.status.' . ($payment->status ?? 'pending')) }}
                                </span>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">{{ $payment->receipt_number ?? '-' }}</x-base.table.td>

                            @if($canEdit || $canDelete || $canView)
                            <x-base.table.td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    @can('view_payments')
                                    <x-base.button variant="outline-secondary" as="a" href="{{ route('payments.show', $payment->id) }}" size="sm" class="mr-2">
                                        <x-base.lucide icon="Eye" class="w-4 h-4 mr-1" />
                                        {{ __('global.view') }}
                                    </x-base.button>
                                    @endcan
                                    
                                    @can('edit_payments')
                                    <x-base.button variant="outline-primary" as="a" href="{{ route('payments.edit', $payment->id) }}" size="sm" class="mr-2">
                                        <x-base.lucide icon="Pencil" class="w-4 h-4 mr-1" />
                                        {{ __('global.edit') }}
                                    </x-base.button>
                                    @endcan
                                    
                                    @can('delete_payments')
                                    <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" onsubmit="return confirm('{{ __('global.confirm_delete') }}')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <x-base.button variant="outline-danger" type="submit" size="sm">
                                            <x-base.lucide icon="Trash2" class="w-4 h-4 mr-1" />
                                            {{ __('global.delete') }}
                                        </x-base.button>
                                    </form>
                                    @endcan
                                </div>
                            </x-base.table.td>
                            @endif
                        </x-base.table.tr>

                    @empty
                        <x-base.table.tr>
                        <x-base.table.td colspan="{{ 8 + ($canEdit || $canDelete || $canView ? 1 : 0) }}" class="text-center py-10">
                                <div class="flex flex-col items-center justify-center">
                                    <x-base.lucide icon="Inbox" class="w-16 h-16 text-gray-400 mb-4" />
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('global.no_data_found') }}</h3>
                                    <p class="text-gray-500 dark:text-gray-400 mt-1">{{ __('global.no_data_description') }}</p>
                                    <x-base.button variant="primary" as="a" href="{{ route('payments.create') }}" class="mt-4">
                                        <x-base.lucide icon="Plus" class="w-4 h-4 mr-2" />
                                        {{ __('Payment.add_new') }}
                                    </x-base.button>
                                </div>
                            </x-base.table.td>
                        </x-base.table.tr>
                    @endforelse
                </x-base.table.tbody>
            </x-base.table>
        </div>

        <!-- Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            {!! $payments->links() !!}
        </div>

        <!-- Summary Cards -->
        @if($payments->count() > 0)
        <div class="intro-y col-span-12 grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex items-center">
                        <x-base.lucide icon="Database" class="w-8 h-8 text-primary" />
                        <div class="ml-auto">
                            <div class="report-box__indicator bg-success"> 
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4" /> 
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">{{ $payments->count() }}</div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.total_records') }}</div>
                </div>
            </div>
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex items-center">
                        <x-base.lucide icon="Activity" class="w-8 h-8 text-pending" />
                        <div class="ml-auto">
                            <div class="report-box__indicator bg-success"> 
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4" /> 
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">
                        @php
                            $recentCount = $payments->filter(function($payment) {
                                return $payment->created_at >= now()->subDays(7);
                            })->count();
                        @endphp
                        {{ $recentCount }}
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.added_this_week') }}</div>
                </div>
            </div>
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex items-center">
                        <x-base.lucide icon="Calendar" class="w-8 h-8 text-success" />
                        <div class="ml-auto">
                            <div class="report-box__indicator bg-success"> 
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4" /> 
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">
                        @php
                            $todayCount = $payments->filter(fn($item) => \Carbon\Carbon::parse($item->created_at)->isToday())->count();
                        @endphp
                        {{ $todayCount }}
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.added_today') }}</div>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection
