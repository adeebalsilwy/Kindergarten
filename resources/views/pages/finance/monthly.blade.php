@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>Monthly Report - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium me-auto">Monthly Report - {{ $monthlyReport['period']['formatted'] ?? '' }}</h2>
</div>

<div class="grid grid-cols-12 gap-6 mt-5">
    <!-- Filters -->
    <div class="col-span-12 intro-y box p-5">
        <form method="GET" action="{{ route('finance.monthly') }}">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-5">
                    <label class="form-label">Year</label>
                    <select name="year" class="form-control">
                        @for($y = date('Y') - 5; $y <= date('Y') + 1; $y++)
                            <option value="{{ $y }}" {{ request('year', date('Y')) == $y ? 'selected' : '' }}>
                                {{ $y }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div class="col-span-12 md:col-span-5">
                    <label class="form-label">Month</label>
                    <select name="month" class="form-control">
                        @for($m = 1; $m <= 12; $m++)
                            <option value="{{ $m }}" {{ request('month', date('n')) == $m ? 'selected' : '' }}>
                                {{ date('F', mktime(0, 0, 0, $m, 1)) }}
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

    <!-- Monthly Summary Cards -->
    <div class="col-span-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white dark:bg-dark-1 shadow rounded-lg p-6">
            <div class="text-gray-600 dark:text-gray-400">Revenue</div>
            <div class="text-2xl font-bold text-green-600 mt-2">${{ number_format($monthlyReport['revenue']['total_revenue'] ?? 0, 2) }}</div>
        </div>
        <div class="bg-white dark:bg-dark-1 shadow rounded-lg p-6">
            <div class="text-gray-600 dark:text-gray-400">Expenses</div>
            <div class="text-2xl font-bold text-red-600 mt-2">${{ number_format($monthlyReport['expenses']['total_expenses'] ?? 0, 2) }}</div>
        </div>
        <div class="bg-white dark:bg-dark-1 shadow rounded-lg p-6">
            <div class="text-gray-600 dark:text-gray-400">Net Profit/Loss</div>
            <div class="text-2xl font-bold {{ ($monthlyReport['profit_loss']['profit'] ?? 0) >= 0 ? 'text-green-600' : 'text-red-600' }} mt-2">
                ${{ number_format($monthlyReport['profit_loss']['profit'] ?? 0, 2) }}
            </div>
        </div>
        <div class="bg-white dark:bg-dark-1 shadow rounded-lg p-6">
            <div class="text-gray-600 dark:text-gray-400">Profit Margin</div>
            <div class="text-2xl font-bold text-blue-600 mt-2">
                {{ number_format($monthlyReport['profit_loss']['profit_margin'] ?? 0, 2) }}%
            </div>
        </div>
    </div>

    <!-- Monthly Chart -->
    <div class="col-span-12 intro-y box p-5">
        <h3 class="text-lg font-medium mb-4">Monthly Financial Summary</h3>
        <canvas id="monthlyChart" height="200"></canvas>
    </div>

    <!-- Revenue Details -->
    <div class="col-span-12 intro-y box p-5">
        <h3 class="text-lg font-medium mb-4">Revenue Details</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h4 class="font-medium mb-2">Revenue Summary</h4>
                <ul class="list-disc ps-5 space-y-1">
                    <li>Total Revenue: ${{ number_format($monthlyReport['revenue']['total_revenue'] ?? 0, 2) }}</li>
                    <li>Total Transactions: {{ $monthlyReport['revenue']['total_transactions'] ?? 0 }}</li>
                    <li>Average Transaction: ${{ number_format($monthlyReport['revenue']['total_transactions'] > 0 ? ($monthlyReport['revenue']['total_revenue'] / $monthlyReport['revenue']['total_transactions']) : 0, 2) }}</li>
                </ul>
            </div>
            <div>
                <h4 class="font-medium mb-2">Top Payment Methods</h4>
                <ul class="list-disc ps-5 space-y-1">
                    @foreach(($monthlyReport['revenue']['payment_methods'] ?? collect([]))->take(3) as $method => $count)
                        <li>{{ ucfirst($method) }}: {{ $count }} transactions</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- Expense Details -->
    <div class="col-span-12 intro-y box p-5">
        <h3 class="text-lg font-medium mb-4">Expense Details</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h4 class="font-medium mb-2">Expense Summary</h4>
                <ul class="list-disc ps-5 space-y-1">
                    <li>Total Expenses: ${{ number_format($monthlyReport['expenses']['total_expenses'] ?? 0, 2) }}</li>
                    <li>Total Expenses Count: {{ $monthlyReport['expenses']['total_expenses_count'] ?? 0 }}</li>
                    <li>Average Expense: ${{ number_format($monthlyReport['expenses']['total_expenses_count'] > 0 ? ($monthlyReport['expenses']['total_expenses'] / $monthlyReport['expenses']['total_expenses_count']) : 0, 2) }}</li>
                </ul>
            </div>
            <div>
                <h4 class="font-medium mb-2">Expenses by Category</h4>
                <ul class="list-disc ps-5 space-y-1">
                    @foreach(($monthlyReport['expenses']['by_category'] ?? collect([]))->take(3) as $category => $amount)
                        <li>{{ ucfirst($category) }}: ${{ number_format($amount, 2) }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- Monthly Comparison -->
    <div class="col-span-12 intro-y box p-5">
        <h3 class="text-lg font-medium mb-4">Monthly Comparison</h3>
        <div class="overflow-x-auto">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Metric</th>
                        <th>Current Month</th>
                        <th>Previous Month</th>
                        <th>Variance</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Revenue</td>
                        <td>${{ number_format($monthlyReport['revenue']['total_revenue'] ?? 0, 2) }}</td>
                        <td>$0.00</td>
                        <td class="text-green-600">+100%</td>
                    </tr>
                    <tr>
                        <td>Expenses</td>
                        <td>${{ number_format($monthlyReport['expenses']['total_expenses'] ?? 0, 2) }}</td>
                        <td>$0.00</td>
                        <td class="text-green-600">+100%</td>
                    </tr>
                    <tr>
                        <td>Profit/Loss</td>
                        <td>${{ number_format($monthlyReport['profit_loss']['profit'] ?? 0, 2) }}</td>
                        <td>$0.00</td>
                        <td class="{{ ($monthlyReport['profit_loss']['profit'] ?? 0) >= 0 ? 'text-green-600' : 'text-red-600' }}">+100%</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('monthlyChart').getContext('2d');
    
    // Prepare data for chart
    const revenue = {{ $monthlyReport['revenue']['total_revenue'] ?? 0 }};
    const expenses = {{ $monthlyReport['expenses']['total_expenses'] ?? 0 }};
    const profit = {{ $monthlyReport['profit_loss']['profit'] ?? 0 }};

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