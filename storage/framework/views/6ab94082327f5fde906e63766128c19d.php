

<?php $__env->startSection('subhead'); ?>
    <title>Monthly Report - <?php echo e(config('app.name')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Monthly Report - <?php echo e($monthlyReport['period']['formatted'] ?? ''); ?></h2>
</div>

<div class="grid grid-cols-12 gap-6 mt-5">
    <!-- Filters -->
    <div class="col-span-12 intro-y box p-5">
        <form method="GET" action="<?php echo e(route('finance.monthly')); ?>">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-5">
                    <label class="form-label">Year</label>
                    <select name="year" class="form-control">
                        <?php for($y = date('Y') - 5; $y <= date('Y') + 1; $y++): ?>
                            <option value="<?php echo e($y); ?>" <?php echo e(request('year', date('Y')) == $y ? 'selected' : ''); ?>>
                                <?php echo e($y); ?>

                            </option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col-span-12 md:col-span-5">
                    <label class="form-label">Month</label>
                    <select name="month" class="form-control">
                        <?php for($m = 1; $m <= 12; $m++): ?>
                            <option value="<?php echo e($m); ?>" <?php echo e(request('month', date('n')) == $m ? 'selected' : ''); ?>>
                                <?php echo e(date('F', mktime(0, 0, 0, $m, 1))); ?>

                            </option>
                        <?php endfor; ?>
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
            <div class="text-2xl font-bold text-green-600 mt-2">$<?php echo e(number_format($monthlyReport['revenue']['total_revenue'] ?? 0, 2)); ?></div>
        </div>
        <div class="bg-white dark:bg-dark-1 shadow rounded-lg p-6">
            <div class="text-gray-600 dark:text-gray-400">Expenses</div>
            <div class="text-2xl font-bold text-red-600 mt-2">$<?php echo e(number_format($monthlyReport['expenses']['total_expenses'] ?? 0, 2)); ?></div>
        </div>
        <div class="bg-white dark:bg-dark-1 shadow rounded-lg p-6">
            <div class="text-gray-600 dark:text-gray-400">Net Profit/Loss</div>
            <div class="text-2xl font-bold <?php echo e(($monthlyReport['profit_loss']['profit'] ?? 0) >= 0 ? 'text-green-600' : 'text-red-600'); ?> mt-2">
                $<?php echo e(number_format($monthlyReport['profit_loss']['profit'] ?? 0, 2)); ?>

            </div>
        </div>
        <div class="bg-white dark:bg-dark-1 shadow rounded-lg p-6">
            <div class="text-gray-600 dark:text-gray-400">Profit Margin</div>
            <div class="text-2xl font-bold text-blue-600 mt-2">
                <?php echo e(number_format($monthlyReport['profit_loss']['profit_margin'] ?? 0, 2)); ?>%
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
                <ul class="list-disc pl-5 space-y-1">
                    <li>Total Revenue: $<?php echo e(number_format($monthlyReport['revenue']['total_revenue'] ?? 0, 2)); ?></li>
                    <li>Total Transactions: <?php echo e($monthlyReport['revenue']['total_transactions'] ?? 0); ?></li>
                    <li>Average Transaction: $<?php echo e(number_format($monthlyReport['revenue']['total_transactions'] > 0 ? ($monthlyReport['revenue']['total_revenue'] / $monthlyReport['revenue']['total_transactions']) : 0, 2)); ?></li>
                </ul>
            </div>
            <div>
                <h4 class="font-medium mb-2">Top Payment Methods</h4>
                <ul class="list-disc pl-5 space-y-1">
                    <?php $__currentLoopData = ($monthlyReport['revenue']['payment_methods'] ?? collect([]))->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e(ucfirst($method)); ?>: <?php echo e($count); ?> transactions</li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <ul class="list-disc pl-5 space-y-1">
                    <li>Total Expenses: $<?php echo e(number_format($monthlyReport['expenses']['total_expenses'] ?? 0, 2)); ?></li>
                    <li>Total Expenses Count: <?php echo e($monthlyReport['expenses']['total_expenses_count'] ?? 0); ?></li>
                    <li>Average Expense: $<?php echo e(number_format($monthlyReport['expenses']['total_expenses_count'] > 0 ? ($monthlyReport['expenses']['total_expenses'] / $monthlyReport['expenses']['total_expenses_count']) : 0, 2)); ?></li>
                </ul>
            </div>
            <div>
                <h4 class="font-medium mb-2">Expenses by Category</h4>
                <ul class="list-disc pl-5 space-y-1">
                    <?php $__currentLoopData = ($monthlyReport['expenses']['by_category'] ?? collect([]))->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $amount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e(ucfirst($category)); ?>: $<?php echo e(number_format($amount, 2)); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <td>$<?php echo e(number_format($monthlyReport['revenue']['total_revenue'] ?? 0, 2)); ?></td>
                        <td>$0.00</td>
                        <td class="text-green-600">+100%</td>
                    </tr>
                    <tr>
                        <td>Expenses</td>
                        <td>$<?php echo e(number_format($monthlyReport['expenses']['total_expenses'] ?? 0, 2)); ?></td>
                        <td>$0.00</td>
                        <td class="text-green-600">+100%</td>
                    </tr>
                    <tr>
                        <td>Profit/Loss</td>
                        <td>$<?php echo e(number_format($monthlyReport['profit_loss']['profit'] ?? 0, 2)); ?></td>
                        <td>$0.00</td>
                        <td class="<?php echo e(($monthlyReport['profit_loss']['profit'] ?? 0) >= 0 ? 'text-green-600' : 'text-red-600'); ?>">+100%</td>
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
    const revenue = <?php echo e($monthlyReport['revenue']['total_revenue'] ?? 0); ?>;
    const expenses = <?php echo e($monthlyReport['expenses']['total_expenses'] ?? 0); ?>;
    const profit = <?php echo e($monthlyReport['profit_loss']['profit'] ?? 0); ?>;

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../themes/' . $activeTheme . '/' . $activeLayout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views\pages\finance\monthly.blade.php ENDPATH**/ ?>