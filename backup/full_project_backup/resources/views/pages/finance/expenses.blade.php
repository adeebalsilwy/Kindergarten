@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>Expense Report - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Expense Report</h2>
</div>

<div class="grid grid-cols-12 gap-6 mt-5">
    <!-- Filters -->
    <div class="col-span-12 intro-y box p-5">
        <form method="GET" action="{{ route('finance.expenses') }}">
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

    <!-- Summary Cards -->
    <div class="col-span-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white dark:bg-dark-1 shadow rounded-lg p-6">
            <div class="text-gray-600 dark:text-gray-400">Total Expenses</div>
            <div class="text-2xl font-bold text-red-600 mt-2">${{ number_format($expenseSummary['total_expenses'] ?? 0, 2) }}</div>
        </div>
        <div class="bg-white dark:bg-dark-1 shadow rounded-lg p-6">
            <div class="text-gray-600 dark:text-gray-400">Total Expenses Count</div>
            <div class="text-2xl font-bold text-blue-600 mt-2">{{ $expenseSummary['total_expenses_count'] ?? 0 }}</div>
        </div>
        <div class="bg-white dark:bg-dark-1 shadow rounded-lg p-6">
            <div class="text-gray-600 dark:text-gray-400">Average Expense</div>
            <div class="text-2xl font-bold text-purple-600 mt-2">${{ number_format($expenseSummary['total_expenses_count'] > 0 ? ($expenseSummary['total_expenses'] / $expenseSummary['total_expenses_count']) : 0, 2) }}</div>
        </div>
        <div class="bg-white dark:bg-dark-1 shadow rounded-lg p-6">
            <div class="text-gray-600 dark:text-gray-400">Expense Categories</div>
            <div class="mt-2">
                @foreach(($expenseSummary['by_category'] ?? collect([]))->take(2) as $category => $amount)
                    <div class="text-sm">{{ ucfirst($category) }}: ${{ number_format($amount, 2) }}</div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Expense Chart -->
    <div class="col-span-12 intro-y box p-5">
        <h3 class="text-lg font-medium mb-4">Expense by Category</h3>
        <canvas id="expenseChart" height="200"></canvas>
    </div>

    <!-- Daily Expenses Table -->
    <div class="col-span-12 intro-y box p-5">
        <h3 class="text-lg font-medium mb-4">Daily Expenses</h3>
        <div class="overflow-x-auto">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Expense</th>
                        <th>Category</th>
                        <th>Vendor</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse(($expenseSummary['daily_expenses'] ?? collect([]))->take(10) as $date => $amount)
                        <tr>
                            <td>{{ $date }}</td>
                            <td>${{ number_format($amount, 2) }}</td>
                            <td>General</td>
                            <td>N/A</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No expense data available</td>
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
    const ctx = document.getElementById('expenseChart').getContext('2d');
    
    // Prepare data for chart
    const expensesByCategory = @json($expenseSummary['by_category'] ?? []);
    const categories = Object.keys(expensesByCategory);
    const amounts = Object.values(expensesByCategory);

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: categories,
            datasets: [{
                label: 'Expenses by Category',
                data: amounts,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(153, 102, 255)',
                    'rgb(255, 159, 64)'
                ],
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
});
</script>
@endsection