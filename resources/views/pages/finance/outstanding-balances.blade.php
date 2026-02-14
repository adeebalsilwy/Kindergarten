@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>Outstanding Balances Report - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Outstanding Balances Report</h2>
</div>

<div class="grid grid-cols-12 gap-6 mt-5">
    <!-- Summary Cards -->
    <div class="col-span-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <x-base.lucide icon="AlertCircle" class="report-box__icon text-warning" />
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-6 text-warning">
                        {{ __('global.currency_symbol', ['amount' => number_format($outstandingBalances['total_outstanding'] ?? 0)]) }}
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.total_outstanding') }}</div>
                </div>
            </div>
        </div>
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <x-base.lucide icon="Users" class="report-box__icon text-primary" />
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-6">{{ $outstandingBalances['count'] ?? 0 }}</div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.number_of_accounts') }}</div>
                </div>
            </div>
        </div>
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <x-base.lucide icon="CreditCard" class="report-box__icon text-pending" />
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-6">
                        {{ __('global.currency_symbol', ['amount' => number_format($outstandingBalances['count'] > 0 ? ($outstandingBalances['total_outstanding'] / $outstandingBalances['count']) : 0)]) }}
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.average_balance') }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Outstanding Balances Table -->
    <div class="col-span-12 intro-y box p-5">
        <h3 class="text-lg font-medium mb-4">Outstanding Balances Details</h3>
        <div class="overflow-x-auto">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Child Name</th>
                        <th>Parent Name</th>
                        <th>Total Fees</th>
                        <th>Total Paid</th>
                        <th>Balance</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($outstandingBalances['details'] ?? [] as $balance)
                        <tr>
                            <td>{{ $balance['child_name'] }}</td>
                            <td>{{ $balance['parent_name'] }}</td>
                            <td>${{ number_format($balance['total_fees'], 2) }}</td>
                            <td>${{ number_format($balance['total_paid'], 2) }}</td>
                            <td class="font-bold text-red-600">${{ number_format($balance['balance'], 2) }}</td>
                            <td>
                                <span class="badge bg-warning text-white">Outstanding</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No outstanding balances</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="col-span-12 intro-y box p-5">
        <h3 class="text-lg font-medium mb-4">Actions</h3>
        <div class="flex flex-wrap gap-4">
            <a href="{{ route('payments.index') }}" class="btn btn-primary">
                Process Payments
            </a>
            <a href="{{ route('fees.index') }}" class="btn btn-secondary">
                View Fee Structure
            </a>
            <a href="#" class="btn btn-info">
                Send Reminders
            </a>
            <a href="#" class="btn btn-success">
                Export Report
            </a>
        </div>
    </div>
</div>
@endsection