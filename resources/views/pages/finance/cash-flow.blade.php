@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>Cash Flow Report - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Cash Flow Report</h2>
</div>

<div class="grid grid-cols-12 gap-6 mt-5">
    <!-- Filters -->
    <div class="col-span-12 intro-y box p-5">
        <form method="GET" action="{{ route('finance.cash-flow') }}">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-5">
                    <label class="form-label">Start Date</label>
                    <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                </div>
                <div class="col-span-12 md:col-span-5">
                    <label class="form-label">End Date</label>
                    <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                </div>
                <div class="col-span-12 md:col-span-2 flex items-end">
                    <button type="submit" class="btn btn-primary w-full">Filter</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Cash Flow Summary Cards -->
    <div class="col-span-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <x-base.lucide icon="TrendingUp" class="report-box__icon text-success" />
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-6">
                        {{ __('global.currency_symbol', ['amount' => number_format($cashFlow['total_net_cash_flow'] > 0 ? $cashFlow['total_net_cash_flow'] : 0)]) }}
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.total_revenue') }}</div>
                </div>
            </div>
        </div>
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <x-base.lucide icon="TrendingDown" class="report-box__icon text-danger" />
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-6">
                        {{ __('global.currency_symbol', ['amount' => number_format($cashFlow['total_net_cash_flow'] < 0 ? abs($cashFlow['total_net_cash_flow']) : 0)]) }}
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.total_expenses') }}</div>
                </div>
            </div>
        </div>
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-primary/20 bg-primary/5">
                    <div class="flex">
                        <x-base.lucide icon="BarChart3" class="report-box__icon text-primary" />
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-6 {{ ($cashFlow['total_net_cash_flow'] ?? 0) >= 0 ? 'text-success' : 'text-danger' }}">
                        {{ __('global.currency_symbol', ['amount' => number_format($cashFlow['total_net_cash_flow'] ?? 0)]) }}
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.net_cash_flow') }}</div>
                </div>
            </div>
        </div>
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <x-base.lucide icon="Activity" class="report-box__icon text-info" />
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-6">
                        {{ __('global.currency_symbol', ['amount' => number_format($cashFlow['average_daily_cash_flow'] ?? 0)]) }}
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.average_daily_flow') }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cash Flow Chart -->
    <div class="col-span-12 intro-y box p-5">
        <h3 class="text-lg font-medium mb-4">Daily Cash Flow</h3>
        <canvas id="cashFlowChart" height="200"></canvas>
    </div>

    <!-- Daily Cash Flow Table -->
    <div class="col-span-12 intro-y box p-5">
        <h3 class="text-lg font-medium mb-4">Daily Cash Flow Details</h3>
        <div class="overflow-x-auto">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Revenue</th>
                        <th>Expenses</th>
                        <th>Net Cash Flow</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse(collect($cashFlow['daily_cash_flow'] ?? [])->sortByDesc('net_cash_flow')->take(20) as $date => $flow)
                        <tr>
                            <td>{{ $date }}</td>
                            <td class="text-green-600">${{ number_format($flow['revenue'], 2) }}</td>
                            <td class="text-red-600">${{ number_format($flow['expenses'], 2) }}</td>
                            <td class="{{ $flow['net_cash_flow'] >= 0 ? 'text-green-600 font-bold' : 'text-red-600 font-bold' }}">
                                ${{ number_format($flow['net_cash_flow'], 2) }}
                            </td>
                            <td>
                                <span class="badge {{ $flow['net_cash_flow'] >= 0 ? 'bg-success' : 'bg-danger' }} text-white">
                                    {{ $flow['net_cash_flow'] >= 0 ? 'Positive' : 'Negative' }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No cash flow data available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Cash Flow Analysis -->
    <div class="col-span-12 intro-y box p-5">
        <h3 class="text-lg font-medium mb-4">Cash Flow Analysis</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                <h4 class="font-medium text-green-800 dark:text-green-200">Positive Days</h4>
                <div class="text-xl font-bold text-green-600 mt-2">
                    {{ collect($cashFlow['daily_cash_flow'] ?? [])->filter(fn($day) => $day['net_cash_flow'] > 0)->count() }}
                </div>
            </div>
            <div class="bg-red-50 dark:bg-red-900/20 p-4 rounded-lg">
                <h4 class="font-medium text-red-800 dark:text-red-200">Negative Days</h4>
                <div class="text-xl font-bold text-red-600 mt-2">
                    {{ collect($cashFlow['daily_cash_flow'] ?? [])->filter(fn($day) => $day['net_cash_flow'] < 0)->count() }}
                </div>
            </div>
            <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg">
                <h4 class="font-medium text-blue-800 dark:text-blue-200">Break-even Days</h4>
                <div class="text-xl font-bold text-blue-600 mt-2">
                    {{ collect($cashFlow['daily_cash_flow'] ?? [])->filter(fn($day) => $day['net_cash_flow'] == 0)->count() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Cash Flow Trends -->
    <div class="col-span-12 intro-y box p-5">
        <h3 class="text-lg font-medium mb-4">Cash Flow Trends</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h4 class="font-medium mb-2">Best Performing Days</h4>
                <ul class="list-disc pl-5 space-y-1">
                    @foreach(collect($cashFlow['daily_cash_flow'] ?? [])->sortByDesc('net_cash_flow')->take(3) as $date => $flow)
                        <li>{{ $date }}: ${{ number_format($flow['net_cash_flow'], 2) }}</li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h4 class="font-medium mb-2">Worst Performing Days</h4>
                <ul class="list-disc pl-5 space-y-1">
                    @foreach(collect($cashFlow['daily_cash_flow'] ?? [])->sortBy('net_cash_flow')->take(3) as $date => $flow)
                        <li>{{ $date }}: ${{ number_format($flow['net_cash_flow'], 2) }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('cashFlowChart').getContext('2d');
    
    // Prepare data for chart
    const dailyCashFlow = @json($cashFlow['daily_cash_flow'] ?? []);
    const dates = Object.keys(dailyCashFlow);
    const netFlows = Object.values(dailyCashFlow).map(day => day.net_cash_flow);
    const revenues = Object.values(dailyCashFlow).map(day => day.revenue);
    const expenses = Object.values(dailyCashFlow).map(day => day.expenses);

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: dates,
            datasets: [
                {
                    label: 'Revenue',
                    data: revenues,
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    tension: 0.1
                },
                {
                    label: 'Expenses',
                    data: expenses,
                    borderColor: 'rgb(255, 99, 132)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    tension: 0.1
                },
                {
                    label: 'Net Cash Flow',
                    data: netFlows,
                    borderColor: 'rgb(54, 162, 235)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    tension: 0.1
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>
@endsection