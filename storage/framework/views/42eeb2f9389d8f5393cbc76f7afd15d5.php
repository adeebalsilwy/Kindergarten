

<?php $__env->startSection('subhead'); ?>
    <title>Outstanding Balances Report - <?php echo e(config('app.name')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Outstanding Balances Report</h2>
</div>

<div class="grid grid-cols-12 gap-6 mt-5">
    <!-- Summary Cards -->
    <div class="col-span-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white dark:bg-dark-1 shadow rounded-lg p-6">
            <div class="text-gray-600 dark:text-gray-400">Total Outstanding</div>
            <div class="text-2xl font-bold text-orange-600 mt-2">$<?php echo e(number_format($outstandingBalances['total_outstanding'] ?? 0, 2)); ?></div>
        </div>
        <div class="bg-white dark:bg-dark-1 shadow rounded-lg p-6">
            <div class="text-gray-600 dark:text-gray-400">Number of Accounts</div>
            <div class="text-2xl font-bold text-blue-600 mt-2"><?php echo e($outstandingBalances['count'] ?? 0); ?></div>
        </div>
        <div class="bg-white dark:bg-dark-1 shadow rounded-lg p-6">
            <div class="text-gray-600 dark:text-gray-400">Average Balance</div>
            <div class="text-2xl font-bold text-purple-600 mt-2">$<?php echo e(number_format($outstandingBalances['count'] > 0 ? ($outstandingBalances['total_outstanding'] / $outstandingBalances['count']) : 0, 2)); ?></div>
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
                    <?php $__empty_1 = true; $__currentLoopData = $outstandingBalances['details'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $balance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($balance['child_name']); ?></td>
                            <td><?php echo e($balance['parent_name']); ?></td>
                            <td>$<?php echo e(number_format($balance['total_fees'], 2)); ?></td>
                            <td>$<?php echo e(number_format($balance['total_paid'], 2)); ?></td>
                            <td class="font-bold text-red-600">$<?php echo e(number_format($balance['balance'], 2)); ?></td>
                            <td>
                                <span class="badge bg-warning text-white">Outstanding</span>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="text-center">No outstanding balances</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="col-span-12 intro-y box p-5">
        <h3 class="text-lg font-medium mb-4">Actions</h3>
        <div class="flex flex-wrap gap-4">
            <a href="<?php echo e(route('payments.index')); ?>" class="btn btn-primary">
                Process Payments
            </a>
            <a href="<?php echo e(route('fees.index')); ?>" class="btn btn-secondary">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../themes/' . $activeTheme . '/' . $activeLayout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views\pages\finance\outstanding-balances.blade.php ENDPATH**/ ?>