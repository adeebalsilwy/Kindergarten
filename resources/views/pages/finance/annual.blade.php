@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>Annual Report - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Annual Report - {{ $year ?? date('Y') }}</h2>
</div>

<div class="grid grid-cols-12 gap-6 mt-5">
    <!-- Filters -->
    <div class="col-span-12 intro-y box p-5">
        <form method="GET" action="{{ route('finance.annual') }}">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-10">
                    <label class="form-label">Year</label>
                    <select name="year" class="form-control">
                        @for($y = date('Y') - 5; $y <= date('Y') + 1; $y++)
                            <option value="{{ $y }}" {{ request('year', date('Y')) == $y ? 'selected' : '' }}>
                                {{ $y }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div class="col-span-12 md:col-span-2 flex items-end">
                    <button type="submit" class="btn btn-primary w-full">Filter</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Annual Summary Cards -->
    <div class="col-span-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <x-base.lucide icon="TrendingUp" class="report-box__icon text-success" />
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-6">
                        {{ __('global.currency_symbol', ['amount' => number_format($annualReport['annual_totals']['revenue'] ?? 0)]) }}
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.annual_revenue') }}</div>
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
                        {{ __('global.currency_symbol', ['amount' => number_format($annualReport['annual_totals']['expenses'] ?? 0)]) }}
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.annual_expenses') }}</div>
                </div>
            </div>
        </div>
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-primary/20 bg-primary/5">
                    <div class="flex">
                        <x-base.lucide icon="BarChart3" class="report-box__icon text-primary" />
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-6 {{ ($annualReport['annual_totals']['profit'] ?? 0) >= 0 ? 'text-success' : 'text-danger' }}">
                        {{ __('global.currency_symbol', ['amount' => number_format($annualReport['annual_totals']['profit'] ?? 0)]) }}
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.annual_profit_loss') }}</div>
                </div>
            </div>
        </div>
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <x-base.lucide icon="Percent" class="report-box__icon text-info" />
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-6">
                        {{ number_format($annualReport['annual_totals']['revenue'] > 0 ? ($annualReport['annual_totals']['profit'] / $annualReport['annual_totals']['revenue']) * 100 : 0, 1) }}%
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.annual_profit_margin') }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Annual Chart -->
    <div class="col-span-12 intro-y box p-5">
        <h3 class="text-lg font-medium mb-4">Annual Financial Summary</h3>
        <canvas id="annualChart" height="200"></canvas>
    </div>

    <!-- Monthly Breakdown -->
    <div class="col-span-12 intro-y box p-5">
        <h3 class="text-lg font-medium mb-4">Monthly Breakdown for {{ $year ?? date('Y') }}</h3>
        <div class="overflow-x-auto">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Month</th>
                        <th>Revenue</th>
                        <th>Expenses</th>
                        <th>Profit/Loss</th>
                        <th>Profit Margin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($annualReport['monthly_reports'] ?? [] as $monthlyReport)
                        <tr>
                            <td>{{ $monthlyReport['period']['formatted'] }}</td>
                            <td>${{ number_format($monthlyReport['revenue']['total_revenue'], 2) }}</td>
                            <td>${{ number_format($monthlyReport['expenses']['total_expenses'], 2) }}</td>
                            <td class="{{ $monthlyReport['profit_loss']['profit'] >= 0 ? 'text-green-600 font-bold' : 'text-red-600 font-bold' }}">
                                ${{ number_format($monthlyReport['profit_loss']['profit'], 2) }}
                            </td>
                            <td>{{ number_format($monthlyReport['revenue']['total_revenue'] > 0 ? ($monthlyReport['profit_loss']['profit'] / $monthlyReport['revenue']['total_revenue']) * 100 : 0, 2) }}%</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Annual Comparison -->
    <div class="col-span-12 intro-y box p-5">
        <h3 class="text-lg font-medium mb-4">Annual Comparison</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                <h4 class="font-medium text-green-800 dark:text-green-200">Annual Revenue</h4>
                <div class="text-xl font-bold text-green-600">${{ number_format($annualReport['annual_totals']['revenue'] ?? 0, 2) }}</div>
            </div>
            <div class="bg-red-50 dark:bg-red-900/20 p-4 rounded-lg">
                <h4 class="font-medium text-red-800 dark:text-red-200">Annual Expenses</h4>
                <div class="text-xl font-bold text-red-600">${{ number_format($annualReport['annual_totals']['expenses'] ?? 0, 2) }}</div>
            </div>
            <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg">
                <h4 class="font-medium text-blue-800 dark:text-blue-200">Annual Profit/Loss</h4>
                <div class="text-xl font-bold {{ ($annualReport['annual_totals']['profit'] ?? 0) >= 0 ? 'text-green-600' : 'text-red-600' }}">
                    ${{ number_format($annualReport['annual_totals']['profit'] ?? 0, 2) }}
                </div>
            </div>
        </div>
    </div>

    <!-- Top Months -->
    <div class="col-span-12 intro-y box p-5">
        <h3 class="text-lg font-medium mb-4">Top Performing Months</h3>
        <div class="overflow-x-auto">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Month</th>
                        <th>Revenue</th>
                        <th>Profit</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sortedMonths = collect($annualReport['monthly_reports'] ?? [])
                            ->sortByDesc('profit_loss.profit')
                            ->values();
                    @endphp
                    @forelse($sortedMonths->take(5) as $index => $report)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $report['period']['formatted'] }}</td>
                            <td>${{ number_format($report['revenue']['total_revenue'], 2) }}</td>
                            <td class="{{ $report['profit_loss']['profit'] >= 0 ? 'text-green-600 font-bold' : 'text-red-600 font-bold' }}">
                                ${{ number_format($report['profit_loss']['profit'], 2) }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No data available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('annualChart').getContext('2d');
    
    // Prepare data for chart
    const months = [];
    const revenues = [];
    const expenses = [];
    const profits = [];
    
    @foreach($annualReport['monthly_reports'] ?? [] as $report)
        months.push('{{ $report['period']['formatted'] }}');
        revenues.push({{ $report['revenue']['total_revenue'] }});
        expenses.push({{ $report['expenses']['total_expenses'] }});
        profits.push({{ $report['profit_loss']['profit'] }});
    @endforeach

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: months,
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
                    label: 'Profit',
                    data: profits,
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