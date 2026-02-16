@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>Profit & Loss Report - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium me-auto">Profit & Loss Report</h2>
</div>

<div class="grid grid-cols-12 gap-6 mt-5">
    <!-- Filters -->
    <div class="col-span-12 intro-y box p-5">
        <form method="GET" action="{{ route('finance.profit-loss') }}">
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

    <!-- Profit/Loss Summary Cards -->
    <div class="col-span-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white dark:bg-dark-1 shadow rounded-lg p-6">
            <div class="text-gray-600 dark:text-gray-400">Total Revenue</div>
            <div class="text-2xl font-bold text-green-600 mt-2">${{ number_format($profitLoss['revenue'] ?? 0, 2) }}</div>
        </div>
        <div class="bg-white dark:bg-dark-1 shadow rounded-lg p-6">
            <div class="text-gray-600 dark:text-gray-400">Total Expenses</div>
            <div class="text-2xl font-bold text-red-600 mt-2">${{ number_format($profitLoss['expenses'] ?? 0, 2) }}</div>
        </div>
        <div class="bg-white dark:bg-dark-1 shadow rounded-lg p-6">
            <div class="text-gray-600 dark:text-gray-400">Net Profit/Loss</div>
            <div class="text-2xl font-bold {{ ($profitLoss['profit'] ?? 0) >= 0 ? 'text-green-600' : 'text-red-600' }} mt-2">
                ${{ number_format($profitLoss['profit'] ?? 0, 2) }}
            </div>
        </div>
        <div class="bg-white dark:bg-dark-1 shadow rounded-lg p-6">
            <div class="text-gray-600 dark:text-gray-400">Profit Margin</div>
            <div class="text-2xl font-bold text-blue-600 mt-2">
                {{ number_format($profitLoss['profit_margin'] ?? 0, 2) }}%
            </div>
        </div>
    </div>

    <!-- Profit/Loss Chart -->
    <div class="col-span-12 intro-y box p-5">
        <h3 class="text-lg font-medium mb-4">Revenue vs Expenses vs Profit</h3>
        <canvas id="profitLossChart" height="200"></canvas>
    </div>

    <!-- Detailed Breakdown -->
    <div class="col-span-12 intro-y box p-5">
        <h3 class="text-lg font-medium mb-4">Financial Breakdown</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                <h4 class="font-medium text-green-800 dark:text-green-200">Revenue</h4>
                <div class="text-2xl font-bold text-green-600 mt-2">${{ number_format($profitLoss['revenue'] ?? 0, 2) }}</div>
            </div>
            <div class="bg-red-50 dark:bg-red-900/20 p-4 rounded-lg">
                <h4 class="font-medium text-red-800 dark:text-red-200">Expenses</h4>
                <div class="text-2xl font-bold text-red-600 mt-2">${{ number_format($profitLoss['expenses'] ?? 0, 2) }}</div>
            </div>
            <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg">
                <h4 class="font-medium text-blue-800 dark:text-blue-200">Net Profit/Loss</h4>
                <div class="text-2xl font-bold {{ ($profitLoss['profit'] ?? 0) >= 0 ? 'text-green-600' : 'text-red-600' }} mt-2">
                    ${{ number_format($profitLoss['profit'] ?? 0, 2) }}
                </div>
            </div>
        </div>
    </div>

    <!-- Revenue and Expense Details -->
    <div class="col-span-12 intro-y box p-5">
        <h3 class="text-lg font-medium mb-4">Revenue & Expense Details</h3>
        <div class="overflow-x-auto">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Metric</th>
                        <th>Amount</th>
                        <th>Percentage</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Total Revenue</td>
                        <td>${{ number_format($profitLoss['revenue'] ?? 0, 2) }}</td>
                        <td>100%</td>
                        <td><span class="badge bg-success text-white">Revenue</span></td>
                    </tr>
                    <tr>
                        <td>Total Expenses</td>
                        <td>${{ number_format($profitLoss['expenses'] ?? 0, 2) }}</td>
                        <td>{{ $profitLoss['revenue'] > 0 ? number_format(($profitLoss['expenses'] / $profitLoss['revenue']) * 100, 2) : 0 }}%</td>
                        <td><span class="badge bg-danger text-white">Expense</span></td>
                    </tr>
                    <tr>
                        <td>Net Profit/Loss</td>
                        <td>${{ number_format($profitLoss['profit'] ?? 0, 2) }}</td>
                        <td>{{ $profitLoss['revenue'] > 0 ? number_format(($profitLoss['profit'] / $profitLoss['revenue']) * 100, 2) : 0 }}%</td>
                        <td>
                            <span class="badge {{ ($profitLoss['profit'] ?? 0) >= 0 ? 'bg-success' : 'bg-danger' }} text-white">
                                {{ ($profitLoss['profit'] ?? 0) >= 0 ? 'Profit' : 'Loss' }}
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('profitLossChart').getContext('2d');
    
    // Prepare data for chart
    const revenue = {{ $profitLoss['revenue'] ?? 0 }};
    const expenses = {{ $profitLoss['expenses'] ?? 0 }};
    const profit = {{ $profitLoss['profit'] ?? 0 }};

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Revenue', 'Expenses', 'Profit'],
            datasets: [{
                label: 'Amount ($)',
                data: [revenue, expenses, profit],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(255, 99, 132, 0.6)',
                    profit >= 0 ? 'rgba(54, 162, 235, 0.6)' : 'rgba(255, 159, 64, 0.6)'
                ],
                borderColor: [
                    'rgb(75, 192, 192)',
                    'rgb(255, 99, 132)',
                    profit >= 0 ? 'rgb(54, 162, 235)' : 'rgb(255, 159, 64)'
                ],
                borderWidth: 1
            }]
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