

<?php $__env->startSection('subhead'); ?>
    <title>Annual Report - <?php echo e(config('app.name')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Annual Report - <?php echo e($year ?? date('Y')); ?></h2>
</div>

<div class="grid grid-cols-12 gap-6 mt-5">
    <!-- Filters -->
    <div class="col-span-12 intro-y box p-5">
        <form method="GET" action="<?php echo e(route('finance.annual')); ?>">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-10">
                    <label class="form-label">Year</label>
                    <select name="year" class="form-control">
                        <?php for($y = date('Y') - 5; $y <= date('Y') + 1; $y++): ?>
                            <option value="<?php echo e($y); ?>" <?php echo e(request('year', date('Y')) == $y ? 'selected' : ''); ?>>
                                <?php echo e($y); ?>

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

    <!-- Annual Summary Cards -->
    <div class="col-span-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white dark:bg-dark-1 shadow rounded-lg p-6">
            <div class="text-gray-600 dark:text-gray-400">Annual Revenue</div>
            <div class="text-2xl font-bold text-green-600 mt-2">$<?php echo e(number_format($annualReport['annual_totals']['revenue'] ?? 0, 2)); ?></div>
        </div>
        <div class="bg-white dark:bg-dark-1 shadow rounded-lg p-6">
            <div class="text-gray-600 dark:text-gray-400">Annual Expenses</div>
            <div class="text-2xl font-bold text-red-600 mt-2">$<?php echo e(number_format($annualReport['annual_totals']['expenses'] ?? 0, 2)); ?></div>
        </div>
        <div class="bg-white dark:bg-dark-1 shadow rounded-lg p-6">
            <div class="text-gray-600 dark:text-gray-400">Annual Profit/Loss</div>
            <div class="text-2xl font-bold <?php echo e(($annualReport['annual_totals']['profit'] ?? 0) >= 0 ? 'text-green-600' : 'text-red-600'); ?> mt-2">
                $<?php echo e(number_format($annualReport['annual_totals']['profit'] ?? 0, 2)); ?>

            </div>
        </div>
        <div class="bg-white dark:bg-dark-1 shadow rounded-lg p-6">
            <div class="text-gray-600 dark:text-gray-400">Annual Profit Margin</div>
            <div class="text-2xl font-bold text-blue-600 mt-2">
                <?php echo e(number_format($annualReport['annual_totals']['revenue'] > 0 ? ($annualReport['annual_totals']['profit'] / $annualReport['annual_totals']['revenue']) * 100 : 0, 2)); ?>%
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
        <h3 class="text-lg font-medium mb-4">Monthly Breakdown for <?php echo e($year ?? date('Y')); ?></h3>
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
                    <?php $__currentLoopData = $annualReport['monthly_reports'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $monthlyReport): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($monthlyReport['period']['formatted']); ?></td>
                            <td>$<?php echo e(number_format($monthlyReport['revenue']['total_revenue'], 2)); ?></td>
                            <td>$<?php echo e(number_format($monthlyReport['expenses']['total_expenses'], 2)); ?></td>
                            <td class="<?php echo e($monthlyReport['profit_loss']['profit'] >= 0 ? 'text-green-600 font-bold' : 'text-red-600 font-bold'); ?>">
                                $<?php echo e(number_format($monthlyReport['profit_loss']['profit'], 2)); ?>

                            </td>
                            <td><?php echo e(number_format($monthlyReport['revenue']['total_revenue'] > 0 ? ($monthlyReport['profit_loss']['profit'] / $monthlyReport['revenue']['total_revenue']) * 100 : 0, 2)); ?>%</td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <div class="text-xl font-bold text-green-600">$<?php echo e(number_format($annualReport['annual_totals']['revenue'] ?? 0, 2)); ?></div>
            </div>
            <div class="bg-red-50 dark:bg-red-900/20 p-4 rounded-lg">
                <h4 class="font-medium text-red-800 dark:text-red-200">Annual Expenses</h4>
                <div class="text-xl font-bold text-red-600">$<?php echo e(number_format($annualReport['annual_totals']['expenses'] ?? 0, 2)); ?></div>
            </div>
            <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg">
                <h4 class="font-medium text-blue-800 dark:text-blue-200">Annual Profit/Loss</h4>
                <div class="text-xl font-bold <?php echo e(($annualReport['annual_totals']['profit'] ?? 0) >= 0 ? 'text-green-600' : 'text-red-600'); ?>">
                    $<?php echo e(number_format($annualReport['annual_totals']['profit'] ?? 0, 2)); ?>

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
                    <?php
                        $sortedMonths = collect($annualReport['monthly_reports'] ?? [])
                            ->sortByDesc('profit_loss.profit')
                            ->values();
                    ?>
                    <?php $__empty_1 = true; $__currentLoopData = $sortedMonths->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e($report['period']['formatted']); ?></td>
                            <td>$<?php echo e(number_format($report['revenue']['total_revenue'], 2)); ?></td>
                            <td class="<?php echo e($report['profit_loss']['profit'] >= 0 ? 'text-green-600 font-bold' : 'text-red-600 font-bold'); ?>">
                                $<?php echo e(number_format($report['profit_loss']['profit'], 2)); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4" class="text-center">No data available</td>
                        </tr>
                    <?php endif; ?>
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
    
    <?php $__currentLoopData = $annualReport['monthly_reports'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        months.push('<?php echo e($report['period']['formatted']); ?>');
        revenues.push(<?php echo e($report['revenue']['total_revenue']); ?>);
        expenses.push(<?php echo e($report['expenses']['total_expenses']); ?>);
        profits.push(<?php echo e($report['profit_loss']['profit']); ?>);
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../themes/' . $activeTheme . '/' . $activeLayout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views\pages\finance\annual.blade.php ENDPATH**/ ?>