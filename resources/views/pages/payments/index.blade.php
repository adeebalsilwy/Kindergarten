@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('global.payment_list') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('global.payment_list') }}</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            @can('export_payments')
                <div class="flex gap-2">
                    <x-base.button variant="outline-primary" as="a" href="{{ route('payments.export.pdf') }}" class="flex items-center">
                        <x-base.lucide icon="FileText" class="w-4 h-4 me-2" />
                        {{ __('global.export_pdf') }}
                    </x-base.button>
                    <x-base.button variant="outline-success" as="a" href="{{ route('payments.export.excel') }}" class="flex items-center">
                        <x-base.lucide icon="FileSpreadsheet" class="w-4 h-4 me-2" />
                        {{ __('global.export_excel') }}
                    </x-base.button>
                </div>
            @endcan
            
            @can('create_payments')
                <x-base.button variant="primary" as="a" href="{{ route('payments.create') }}" class="ms-2 flex items-center">
                    <x-base.lucide icon="Plus" class="w-4 h-4 me-2" />
                    {{ __('global.add_new_payment') }}
                </x-base.button>
            @endcan
        </div>
    </div>

    <!-- Statistics -->
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-primary/20 bg-primary/5">
                    <div class="flex items-center">
                        <x-base.lucide icon="DollarSign" class="w-8 h-8 text-primary" />
                        <div class="ms-auto text-success flex items-center">
                            <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                            <span class="text-xs">{{ __('global.total') }}</span>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">{{ number_format($totalPayments ?? 0, 2) }}</div>
                    <div class="text-sm text-slate-500 mt-1">{{ __('global.total_revenue') }}</div>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-success/20 bg-success/5">
                    <div class="flex items-center">
                        <x-base.lucide icon="Calendar" class="w-8 h-8 text-success" />
                        <div class="ms-auto text-success flex items-center">
                            <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                            <span class="text-xs">{{ __('global.month') }}</span>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">{{ number_format($thisMonthPayments ?? 0, 2) }}</div>
                    <div class="text-sm text-slate-500 mt-1">{{ __('global.this_month_revenue') }}</div>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-warning/20 bg-warning/5">
                    <div class="flex items-center">
                        <x-base.lucide icon="Clock" class="w-8 h-8 text-warning" />
                        <div class="ms-auto text-warning flex items-center">
                            <span class="text-xs">{{ __('global.pending') }}</span>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">{{ $pendingPaymentsCount ?? 0 }}</div>
                    <div class="text-sm text-slate-500 mt-1">{{ __('global.pending_payments') }}</div>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-info/20 bg-info/5">
                    <div class="flex items-center">
                        <x-base.lucide icon="CheckCircle" class="w-8 h-8 text-info" />
                        <div class="ms-auto text-info flex items-center">
                            <span class="text-xs">{{ __('global.completed') }}</span>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">{{ $completedPaymentsCount ?? 0 }}</div>
                    <div class="text-sm text-slate-500 mt-1">{{ __('global.completed_payments') }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Filter Section -->
        <div class="intro-y col-span-12">
            <div class="box p-5">
                <form method="GET" action="{{ route('payments.index') }}">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <label class="form-label font-bold">{{ __('global.search') }}</label>
                            <div class="relative">
                                <x-base.form-input 
                                    type="text" 
                                    name="search"
                                    value="{{ request('search') }}"
                                    placeholder="{{ __('global.search_payments') }}..." 
                                    class="w-full ps-10"
                                />
                                <div class="absolute inset-y-0 left-0 ps-3 flex items-center pointer-events-none">
                                    <x-base.lucide icon="Search" class="h-4 w-4 text-slate-400" />
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 md:col-span-4 lg:col-span-2">
                            <label class="form-label font-bold">{{ __('global.status') }}</label>
                            <x-base.form-select name="status" class="w-full">
                                <option value="">{{ __('global.all_status') }}</option>
                                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>{{ __('global.payment_status_completed') }}</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>{{ __('global.payment_status_pending') }}</option>
                                <option value="failed" {{ request('status') == 'failed' ? 'selected' : '' }}>{{ __('global.payment_status_failed') }}</option>
                            </x-base.form-select>
                        </div>
                        <div class="col-span-12 md:col-span-4 lg:col-span-2">
                            <label class="form-label font-bold">{{ __('global.payment_method') }}</label>
                            <x-base.form-select name="payment_method" class="w-full">
                                <option value="">{{ __('global.all') }}</option>
                                <option value="cash" {{ request('payment_method') == 'cash' ? 'selected' : '' }}>{{ __('global.payment_method_cash') }}</option>
                                <option value="bank_transfer" {{ request('payment_method') == 'bank_transfer' ? 'selected' : '' }}>{{ __('global.payment_method_bank_transfer') }}</option>
                                <option value="credit_card" {{ request('payment_method') == 'credit_card' ? 'selected' : '' }}>{{ __('global.payment_method_credit_card') }}</option>
                                <option value="check" {{ request('payment_method') == 'check' ? 'selected' : '' }}>{{ __('global.payment_method_check') }}</option>
                            </x-base.form-select>
                        </div>
                        <div class="col-span-12 md:col-span-4 lg:col-span-2">
                            <label class="form-label font-bold">{{ __('global.student') }}</label>
                            <x-base.form-select name="child_id" class="w-full">
                                <option value="">{{ __('global.all') }}</option>
                                @foreach($children ?? [] as $child)
                                    <option value="{{ $child->id }}" {{ request('child_id') == $child->id ? 'selected' : '' }}>{{ $child->name }}</option>
                                @endforeach
                            </x-base.form-select>
                        </div>
                        <div class="col-span-12 md:col-span-4 lg:col-span-2">
                            <label class="form-label font-bold">{{ __('global.class') }}</label>
                            <x-base.form-select name="class_id" class="w-full">
                                <option value="">{{ __('global.all_classes') }}</option>
                                @foreach($classes ?? [] as $class)
                                    <option value="{{ $class->id }}" {{ request('class_id') == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                                @endforeach
                            </x-base.form-select>
                        </div>
                        <div class="col-span-12 md:col-span-6 lg:col-span-2">
                            <label class="form-label font-bold">{{ __('global.from') }}</label>
                            <x-base.form-input type="date" name="payment_date_from" value="{{ request('payment_date_from') }}" class="w-full" />
                        </div>
                        <div class="col-span-12 md:col-span-6 lg:col-span-2">
                            <label class="form-label font-bold">{{ __('global.to') }}</label>
                            <x-base.form-input type="date" name="payment_date_to" value="{{ request('payment_date_to') }}" class="w-full" />
                        </div>
                        <div class="col-span-12 lg:col-span-1 flex items-end gap-2">
                            <x-base.button type="submit" variant="primary" class="w-full shadow-md">
                                <x-base.lucide icon="Filter" class="w-4 h-4" />
                            </x-base.button>
                            <x-base.button as="a" href="{{ route('payments.index') }}" variant="outline-secondary" class="w-full">
                                <x-base.lucide icon="RotateCcw" class="w-4 h-4" />
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
                        <x-base.table.th class="whitespace-nowrap text-center">{{ __('global.student') }}</x-base.table.th>
                        <x-base.table.th class="whitespace-nowrap text-center">{{ __('global.fee_name') }}</x-base.table.th>
                        <x-base.table.th class="whitespace-nowrap text-center">{{ __('global.amount') }}</x-base.table.th>
                        <x-base.table.th class="whitespace-nowrap text-center">{{ __('global.payment_date') }}</x-base.table.th>
                        <x-base.table.th class="whitespace-nowrap text-center">{{ __('global.payment_method') }}</x-base.table.th>
                        <x-base.table.th class="whitespace-nowrap text-center">{{ __('global.reference_number') }}</x-base.table.th>
                        <x-base.table.th class="whitespace-nowrap text-center">{{ __('global.status') }}</x-base.table.th>
                        <x-base.table.th class="whitespace-nowrap text-center">{{ __('global.receipt_number') }}</x-base.table.th>

                        @if($canEdit || $canDelete || $canView)
                            <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.actions') }}</x-base.table.th>
                        @endif
                    </x-base.table.tr>
                </x-base.table.thead>
                <x-base.table.tbody>
                    @forelse($payments as $payment)
                        <x-base.table.tr class="intro-x">
                            <x-base.table.td>
                                <div class="flex items-center">
                                    <div class="w-10 h-10 image-fit zoom-in me-3">
                                        <img alt="{{ $payment->child->name ?? '' }}" class="rounded-full shadow-md" src="{{ $payment->child->photo_path ? asset($payment->child->photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode($payment->child->name ?? 'N/A') . '&background=random' }}">
                                    </div>
                                    <div>
                                        <a href="{{ route('children.show', $payment->child_id) }}" class="font-medium whitespace-nowrap hover:text-primary transition-colors">
                                            {{ $payment->child->name ?? 'N/A' }}
                                        </a>
                                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                            {{ $payment->child->class->name ?? '' }}
                                        </div>
                                    </div>
                                </div>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">
                                <span class="font-bold text-primary">{{ $payment->fee->name ?? 'N/A' }}</span>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">
                                <div class="font-bold text-success">{{ number_format($payment->amount, 2) }}</div>
                                <div class="text-slate-500 text-xs mt-0.5">{{ $payment->payment_method }}</div>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">
                                <div class="whitespace-nowrap">{{ $payment->payment_date->format('Y-m-d') }}</div>
                                <div class="text-slate-500 text-xs mt-0.5">{{ $payment->payment_date->format('H:i') }}</div>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">
                                <span class="px-3 py-1 rounded-full text-xs font-medium 
                                    {{ $payment->payment_method == 'cash' ? 'bg-blue/10 text-blue border border-blue/20' : '' }}
                                    {{ $payment->payment_method == 'bank_transfer' ? 'bg-indigo/10 text-indigo border border-indigo/20' : '' }}
                                    {{ $payment->payment_method == 'credit_card' ? 'bg-purple/10 text-purple border border-purple/20' : '' }}
                                    {{ $payment->payment_method == 'check' ? 'bg-yellow/10 text-yellow border border-yellow/20' : '' }}">
                                    {{ __('global.payment_method_' . $payment->payment_method) }}
                                </span>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">
                                <span class="text-slate-500">{{ $payment->reference_number ?? '-' }}</span>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">
                                <span class="px-3 py-1 rounded-full text-xs font-medium 
                                    {{ $payment->status == 'completed' ? 'bg-success/10 text-success border border-success/20' : '' }}
                                    {{ $payment->status == 'pending' ? 'bg-warning/10 text-warning border border-warning/20' : '' }}
                                    {{ $payment->status == 'failed' ? 'bg-danger/10 text-danger border border-danger/20' : '' }}">
                                    {{ __('global.payment_status_' . $payment->status) }}
                                </span>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">
                                <span class="font-bold text-slate-600">#{{ $payment->receipt_number }}</span>
                            </x-base.table.td>

                            @if($canEdit || $canDelete || $canView)
                                <x-base.table.td class="table-report__action">
                                    <div class="flex justify-center items-center gap-2">
                                        @can('view_payments')
                                            <x-base.button variant="outline-secondary" as="a" href="{{ route('payments.show', $payment->id) }}" size="sm" class="px-2 py-1">
                                                <x-base.lucide icon="Eye" class="w-4 h-4" />
                                            </x-base.button>
                                        @endcan
                                        
                                        @can('edit_payments')
                                            <x-base.button variant="outline-primary" as="a" href="{{ route('payments.edit', $payment->id) }}" size="sm" class="px-2 py-1">
                                                <x-base.lucide icon="Pencil" class="w-4 h-4" />
                                            </x-base.button>
                                        @endcan
                                        
                                        @can('delete_payments')
                                            <x-base.button variant="outline-danger" size="sm" class="px-2 py-1 delete-btn" 
                                                data-delete-id="{{ $payment->id }}" 
                                                data-delete-name="{{ $payment->reference_number ?? 'Payment' }}" 
                                                data-delete-route="{{ route('payments.destroy', $payment->id) }}">
                                                <x-base.lucide icon="Trash2" class="w-4 h-4" />
                                            </x-base.button>
                                        @endcan
                                    </div>
                                </x-base.table.td>
                            @endif
                        </x-base.table.tr>
                    @empty
                        <x-base.table.tr>
                            <x-base.table.td colspan="{{ $canEdit || $canDelete || $canView ? 9 : 8 }}" class="text-center py-20">
                                <div class="flex flex-col items-center">
                                    <x-base.lucide icon="Database" class="w-16 h-16 text-slate-300 mb-4" />
                                    <div class="text-lg font-medium text-slate-500">{{ __('global.no_records_found') }}</div>
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
                            <div class="ms-auto">
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
                            <div class="ms-auto">
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
                            <div class="ms-auto">
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

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="modal" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <x-base.lucide icon="AlertTriangle" class="w-16 h-16 text-danger mx-auto mt-3" />
                        <div class="text-3xl mt-5">{{ __('global.are_you_sure') }}</div>
                        <div class="text-slate-500 mt-2">
                            {{ __('global.delete_confirmation') }} "<span id="deleteItemName"></span>"?
                        </div>
                        <div class="text-slate-500 mt-1">
                            {{ __('global.this_action_cannot_be_undone') }}
                        </div>
                    </div>
                    <form id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <div class="px-5 pb-8 text-center">
                            <x-base.button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">
                                {{ __('global.cancel') }}
                            </x-base.button>
                            <x-base.button type="submit" class="btn btn-danger w-24">
                                {{ __('global.delete') }}
                            </x-base.button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Delete Confirmation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Delete button click handler
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.dataset.deleteId;
                    const name = this.dataset.deleteName;
                    const route = this.dataset.deleteRoute;
                    
                    document.getElementById('deleteItemName').textContent = name;
                    document.getElementById('deleteForm').setAttribute('action', route);
                    
                    // Show modal
                    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
                    modal.show();
                });
            });
        });
    </script>
@endsection