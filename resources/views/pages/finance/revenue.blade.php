@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>Revenue Report - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium me-auto">Revenue Report</h2>
</div>

<div class="grid grid-cols-12 gap-6 mt-5">
    <!-- Filters -->
    <div class="col-span-12 intro-y box p-5">
        <form method="GET" action="{{ route('finance.revenue') }}">
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
            <div class="text-gray-600 dark:text-gray-400">Total Revenue</div>
            <div class="text-2xl font-bold text-green-600 mt-2">${{ number_format($revenueSummary['total_revenue'] ?? 0, 2) }}</div>
        </div>
        <div class="bg-white dark:bg-dark-1 shadow rounded-lg p-6">
            <div class="text-gray-600 dark:text-gray-400">Total Transactions</div>
            <div class="text-2xl font-bold text-blue-600 mt-2">{{ $revenueSummary['total_transactions'] ?? 0 }}</div>
        </div>
        <div class="bg-white dark:bg-dark-1 shadow rounded-lg p-6">
            <div class="text-gray-600 dark:text-gray-400">Average Transaction</div>
            <div class="text-2xl font-bold text-purple-600 mt-2">${{ number_format($revenueSummary['total_transactions'] > 0 ? ($revenueSummary['total_revenue'] / $revenueSummary['total_transactions']) : 0, 2) }}</div>
        </div>
        <div class="bg-white dark:bg-dark-1 shadow rounded-lg p-6">
            <div class="text-gray-600 dark:text-gray-400">Payment Methods</div>
            <div class="mt-2">
                @foreach(($revenueSummary['payment_methods'] ?? collect([]))->take(2) as $method => $count)
                    <div class="text-sm">{{ ucfirst($method) }}: {{ $count }}</div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Revenue Chart -->
    <div class="col-span-12 intro-y box p-5">
        <h3 class="text-lg font-medium mb-4">Revenue Trend</h3>
        <canvas id="revenueChart" height="200"></canvas>
    </div>

    <!-- Daily Revenue Table -->
    <div class="col-span-12 intro-y box p-5">
        <h3 class="text-lg font-medium mb-4">Daily Revenue</h3>
        <div class="overflow-x-auto">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Revenue</th>
                        <th>Transactions</th>
                        <th>Average</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse(($revenueSummary['daily_revenue'] ?? collect([]))->take(10) as $date => $amount)
                        <tr>
                            <td>{{ $date }}</td>
                            <td>${{ number_format($amount, 2) }}</td>
                            <td>{{ $revenueSummary['total_transactions'] ?? 0 }}</td>
                            <td>${{ number_format($amount, 2) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No revenue data available</td>
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
    const ctx = document.getElementById('revenueChart').getContext('2d');
    
    // Prepare data for chart
    const dailyRevenue = @json($revenueSummary['daily_revenue'] ?? []);
    const dates = Object.keys(dailyRevenue);
    const amounts = Object.values(dailyRevenue);

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: dates,
            datasets: [{
                label: 'Revenue',
                data: amounts,
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                tension: 0.1
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