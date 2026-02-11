

<?php $__env->startSection('subhead'); ?>
    <title><?php echo e(__('global.trial_balance')); ?> - <?php echo e(config('app.name')); ?></title>
    <style>
        .rtl { direction: rtl; text-align: right; }
        .ltr { direction: ltr; text-align: left; }
        .financial-table th, .financial-table td { 
            padding: 12px; 
            vertical-align: middle;
        }
        .financial-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .financial-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        @media print {
            .no-print { display: none !important; }
            .financial-table { font-size: 12px; }
            .financial-card { box-shadow: none; border: 1px solid #ddd; }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
<div class="intro-y flex items-center mt-8">
    <h2 class="text-2xl font-bold mr-auto">
        <span class="ltr:inline"><?php echo e(__('global.trial_balance')); ?></span>
        <span class="rtl:inline"><?php echo e(__('global.trial_balance_ar')); ?></span>
    </h2>
    <div class="flex space-x-2 no-print">
        <a href="<?php echo e(route('finance.export.excel', ['report_type' => 'trial-balance', 'start_date' => request('start_date'), 'end_date' => request('end_date')])); ?>" 
           class="btn btn-success flex items-center">
            <i data-lucide="download" class="w-4 h-4 mr-2"></i>
            <?php echo e(__('global.export_excel')); ?>

        </a>
        <a href="<?php echo e(route('finance.export.pdf', ['report_type' => 'trial-balance', 'start_date' => request('start_date'), 'end_date' => request('end_date')])); ?>" 
           class="btn btn-primary flex items-center">
            <i data-lucide="printer" class="w-4 h-4 mr-2"></i>
            <?php echo e(__('global.export_pdf')); ?>

        </a>
        <button onclick="window.print()" class="btn btn-secondary flex items-center no-print">
            <i data-lucide="printer" class="w-4 h-4 mr-2"></i>
            <?php echo e(__('global.print')); ?>

        </button>
    </div>
</div>

<div class="grid grid-cols-12 gap-6 mt-5">
    <!-- Report Header -->
    <div class="col-span-12 intro-y box p-6 bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-dark-2 dark:to-dark-3">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                    <?php echo e(__('global.trial_balance')); ?>

                </h3>
                <p class="text-gray-600 dark:text-gray-400 mt-1">
                    <?php echo e(__('global.generated_on')); ?> <?php echo e(now()->format('F j, Y g:i A')); ?>

                </p>
                <?php if(request('start_date') && request('end_date')): ?>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                        <?php echo e(__('global.period')); ?>: <?php echo e(request('start_date')); ?> <?php echo e(__('global.to')); ?> <?php echo e(request('end_date')); ?>

                    </p>
                <?php endif; ?>
            </div>
            <div class="mt-4 md:mt-0">
                <div class="flex items-center space-x-2">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300"><?php echo e(__('global.language')); ?>:</span>
                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
                        <?php echo e(app()->getLocale() == 'ar' ? 'العربية' : 'English'); ?>

                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="col-span-12 intro-y box p-5 no-print">
        <form method="GET" action="<?php echo e(route('finance.trial-balance')); ?>">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-4">
                    <label class="form-label font-medium"><?php echo e(__('global.start_date')); ?></label>
                    <input type="date" name="start_date" class="form-control w-full" value="<?php echo e(request('start_date')); ?>">
                </div>
                <div class="col-span-12 md:col-span-4">
                    <label class="form-label font-medium"><?php echo e(__('global.end_date')); ?></label>
                    <input type="date" name="end_date" class="form-control w-full" value="<?php echo e(request('end_date')); ?>">
                </div>
                <div class="col-span-12 md:col-span-4 flex items-end space-x-2">
                    <button type="submit" class="btn btn-primary w-full md:w-auto">
                        <i data-lucide="filter" class="w-4 h-4 mr-2"></i>
                        <?php echo e(__('global.filter')); ?>

                    </button>
                    <a href="<?php echo e(route('finance.trial-balance')); ?>" class="btn btn-outline-secondary w-full md:w-auto">
                        <?php echo e(__('global.reset')); ?>

                    </a>
                </div>
            </div>
        </form>
    </div>

    <!-- Financial Summary Cards -->
    <div class="col-span-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="financial-card bg-white dark:bg-dark-1 shadow rounded-lg p-6 border-l-4 border-blue-500">
            <div class="text-gray-600 dark:text-gray-400 text-sm font-medium"><?php echo e(__('global.total_debits')); ?></div>
            <div class="text-2xl font-bold text-blue-600 mt-2">
                <?php echo e(__('global.currency_symbol', ['amount' => number_format($trialBalance['totals']['total_debits'] ?? 0, 2)])); ?>

            </div>
            <div class="text-xs text-gray-500 mt-1"><?php echo e(__('global.trial_balance')); ?></div>
        </div>
        
        <div class="financial-card bg-white dark:bg-dark-1 shadow rounded-lg p-6 border-l-4 border-green-500">
            <div class="text-gray-600 dark:text-gray-400 text-sm font-medium"><?php echo e(__('global.total_credits')); ?></div>
            <div class="text-2xl font-bold text-green-600 mt-2">
                <?php echo e(__('global.currency_symbol', ['amount' => number_format($trialBalance['totals']['total_credits'] ?? 0, 2)])); ?>

            </div>
            <div class="text-xs text-gray-500 mt-1"><?php echo e(__('global.trial_balance')); ?></div>
        </div>
        
        <div class="financial-card bg-white dark:bg-dark-1 shadow rounded-lg p-6 border-l-4 <?php echo e(($trialBalance['totals']['difference'] ?? 0) == 0 ? 'border-green-500' : 'border-red-500'); ?>">
            <div class="text-gray-600 dark:text-gray-400 text-sm font-medium"><?php echo e(__('global.difference')); ?></div>
            <div class="text-2xl font-bold <?php echo e(($trialBalance['totals']['difference'] ?? 0) == 0 ? 'text-green-600' : 'text-red-600'); ?> mt-2">
                <?php echo e(__('global.currency_symbol', ['amount' => number_format($trialBalance['totals']['difference'] ?? 0, 2)])); ?>

            </div>
            <div class="text-xs text-gray-500 mt-1">
                <?php echo e(($trialBalance['totals']['difference'] ?? 0) == 0 ? __('global.balanced_books') : __('global.unbalanced_books')); ?>

            </div>
        </div>
        
        <div class="financial-card bg-white dark:bg-dark-1 shadow rounded-lg p-6 border-l-4 border-purple-500">
            <div class="text-gray-600 dark:text-gray-400 text-sm font-medium"><?php echo e(__('global.accounts_count')); ?></div>
            <div class="text-2xl font-bold text-purple-600 mt-2"><?php echo e(count($trialBalance['entries'] ?? [])); ?></div>
            <div class="text-xs text-gray-500 mt-1"><?php echo e(__('global.active_accounts')); ?></div>
        </div>
    </div>

    <!-- Trial Balance Table -->
    <div class="col-span-12 intro-y box p-5">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                <span class="ltr:inline"><?php echo e(__('global.trial_balance')); ?></span>
                <span class="rtl:inline"><?php echo e(__('global.trial_balance_ar')); ?></span>
            </h3>
            <div class="mt-4 md:mt-0 text-sm text-gray-600 dark:text-gray-400">
                <?php echo e(__('global.entries_count')); ?>: <?php echo e(count($trialBalance['entries'] ?? [])); ?>

            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="financial-table table table-striped w-full">
                <thead class="bg-gray-50 dark:bg-dark-2">
                    <tr>
                        <th class="font-semibold text-gray-700 dark:text-gray-300 text-left">
                            <?php echo e(__('global.account_name')); ?>

                        </th>
                        <th class="font-semibold text-gray-700 dark:text-gray-300 text-right">
                            <?php echo e(__('global.debits')); ?>

                        </th>
                        <th class="font-semibold text-gray-700 dark:text-gray-300 text-right">
                            <?php echo e(__('global.credits')); ?>

                        </th>
                        <th class="font-semibold text-gray-700 dark:text-gray-300 text-right">
                            <?php echo e(__('global.balance')); ?>

                        </th>
                        <th class="font-semibold text-gray-700 dark:text-gray-300 text-center">
                            <?php echo e(__('global.type')); ?>

                        </th>
                        <th class="font-semibold text-gray-700 dark:text-gray-300 text-center no-print">
                            <?php echo e(__('global.actions')); ?>

                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-dark-3">
                    <?php $__empty_1 = true; $__currentLoopData = $trialBalance['entries'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-gray-50 dark:hover:bg-dark-2 transition-colors">
                            <td class="font-medium text-gray-900 dark:text-gray-100">
                                <?php echo e($entry['account_name']); ?>

                            </td>
                            <td class="text-right text-blue-600 font-medium">
                                <?php echo e(__('global.currency_symbol', ['amount' => number_format($entry['debits'], 2)])); ?>

                            </td>
                            <td class="text-right text-green-600 font-medium">
                                <?php echo e(__('global.currency_symbol', ['amount' => number_format($entry['credits'], 2)])); ?>

                            </td>
                            <td class="text-right font-bold <?php echo e($entry['balance'] >= 0 ? 'text-green-600' : 'text-red-600'); ?>">
                                <?php echo e(__('global.currency_symbol', ['amount' => number_format(abs($entry['balance']), 2)])); ?>

                                <span class="text-xs ml-1"><?php echo e($entry['balance'] >= 0 ? 'DR' : 'CR'); ?></span>
                            </td>
                            <td class="text-center">
                                <span class="px-2 py-1 rounded-full text-xs font-medium 
                                    <?php echo e($entry['type'] === 'debit' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800'); ?>">
                                    <?php echo e(__('global.' . $entry['type'])); ?>

                                </span>
                            </td>
                            <td class="text-center no-print">
                                <a href="<?php echo e(route('finance.general-ledger', ['account_name' => urlencode($entry['account_name'])])); ?>" 
                                   class="btn btn-sm btn-outline-primary">
                                    <i data-lucide="eye" class="w-4 h-4 mr-1"></i>
                                    <?php echo e(__('global.view_details')); ?>

                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="text-center py-8 text-gray-500 dark:text-gray-400">
                                <i data-lucide="file-text" class="w-12 h-12 mx-auto mb-3 text-gray-300"></i>
                                <p class="font-medium"><?php echo e(__('global.no_records_found')); ?></p>
                                <p class="text-sm mt-1"><?php echo e(__('global.try_adjusting_filters')); ?></p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
                <?php if(count($trialBalance['entries'] ?? []) > 0): ?>
                <tfoot class="bg-gray-100 dark:bg-dark-3 font-bold">
                    <tr>
                        <td class="px-6 py-3 text-gray-900 dark:text-gray-100">
                            <?php echo e(__('global.total')); ?>

                        </td>
                        <td class="px-6 py-3 text-right text-blue-600">
                            <?php echo e(__('global.currency_symbol', ['amount' => number_format($trialBalance['totals']['total_debits'] ?? 0, 2)])); ?>

                        </td>
                        <td class="px-6 py-3 text-right text-green-600">
                            <?php echo e(__('global.currency_symbol', ['amount' => number_format($trialBalance['totals']['total_credits'] ?? 0, 2)])); ?>

                        </td>
                        <td class="px-6 py-3 text-right <?php echo e(($trialBalance['totals']['difference'] ?? 0) == 0 ? 'text-green-600' : 'text-red-600'); ?>">
                            <?php echo e(__('global.currency_symbol', ['amount' => number_format(abs($trialBalance['totals']['difference'] ?? 0), 2)])); ?>

                        </td>
                        <td class="px-6 py-3 text-center"></td>
                        <td class="px-6 py-3 text-center no-print"></td>
                    </tr>
                </tfoot>
                <?php endif; ?>
            </table>
        </div>
    </div>

    <!-- Account Categories Summary -->
    <?php if(count($trialBalance['entries'] ?? []) > 0): ?>
    <div class="col-span-12 intro-y box p-5">
        <h3 class="text-lg font-medium mb-4"><?php echo e(__('global.account_categories_summary')); ?></h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <?php
                $categories = [
                    'assets' => ['color' => 'blue', 'label' => __('global.assets')],
                    'liabilities' => ['color' => 'red', 'label' => __('global.liabilities')],
                    'equity' => ['color' => 'green', 'label' => __('global.equity')],
                    'revenue' => ['color' => 'purple', 'label' => __('global.revenue')],
                    'expenses' => ['color' => 'orange', 'label' => __('global.expenses')]
                ];
            ?>
            
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $categoryEntries = array_filter($trialBalance['entries'] ?? [], function($entry) use ($category) {
                        // Simple categorization based on account name keywords
                        $accountName = strtolower($entry['account_name']);
                        $keywords = [
                            'assets' => ['asset', 'cash', 'bank', 'inventory', 'equipment'],
                            'liabilities' => ['liability', 'loan', 'payable', 'debt'],
                            'equity' => ['equity', 'capital', 'owner'],
                            'revenue' => ['revenue', 'income', 'sales'],
                            'expenses' => ['expense', 'cost', 'rent', 'salary']
                        ];
                        
                        foreach($keywords[$category] as $keyword) {
                            if(str_contains($accountName, $keyword)) {
                                return true;
                            }
                        }
                        return false;
                    });
                    
                    $totalDebits = array_sum(array_column($categoryEntries, 'debits'));
                    $totalCredits = array_sum(array_column($categoryEntries, 'credits'));
                ?>
                
                <?php if(count($categoryEntries) > 0): ?>
                <div class="bg-white dark:bg-dark-1 rounded-lg p-4 border border-gray-200 dark:border-dark-3">
                    <div class="flex items-center justify-between">
                        <h4 class="font-medium text-<?php echo e($info['color']); ?>-600"><?php echo e($info['label']); ?></h4>
                        <span class="px-2 py-1 bg-<?php echo e($info['color']); ?>-100 text-<?php echo e($info['color']); ?>-800 rounded-full text-xs">
                            <?php echo e(count($categoryEntries)); ?> <?php echo e(__('global.accounts')); ?>

                        </span>
                    </div>
                    <div class="mt-3 space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400"><?php echo e(__('global.debits')); ?>:</span>
                            <span class="font-medium text-blue-600">
                                <?php echo e(__('global.currency_symbol', ['amount' => number_format($totalDebits, 2)])); ?>

                            </span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400"><?php echo e(__('global.credits')); ?>:</span>
                            <span class="font-medium text-green-600">
                                <?php echo e(__('global.currency_symbol', ['amount' => number_format($totalCredits, 2)])); ?>

                            </span>
                        </div>
                        <div class="flex justify-between text-sm font-medium pt-2 border-t border-gray-200 dark:border-dark-3">
                            <span><?php echo e(__('global.net')); ?>:</span>
                            <span class="<?php echo e(($totalDebits - $totalCredits) >= 0 ? 'text-green-600' : 'text-red-600'); ?>">
                                <?php echo e(__('global.currency_symbol', ['amount' => number_format(abs($totalDebits - $totalCredits), 2)])); ?>

                            </span>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- Instructions and Notes -->
    <div class="col-span-12 intro-y box p-5">
        <h3 class="text-lg font-medium mb-4"><?php echo e(__('global.instructions')); ?></h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h4 class="font-medium text-gray-800 dark:text-gray-200 mb-2"><?php echo e(__('global.about_trial_balance')); ?></h4>
                <ul class="list-disc pl-5 space-y-1 text-gray-600 dark:text-gray-400 text-sm">
                    <li><?php echo e(__('global.trial_balance_explanation')); ?></li>
                    <li><?php echo e(__('global.difference_zero_note')); ?></li>
                    <li><?php echo e(__('global.use_for_verification')); ?></li>
                </ul>
            </div>
            <div>
                <h4 class="font-medium text-gray-800 dark:text-gray-200 mb-2"><?php echo e(__('global.export_options')); ?></h4>
                <ul class="list-disc pl-5 space-y-1 text-gray-600 dark:text-gray-400 text-sm">
                    <li><?php echo e(__('global.export_options_note')); ?></li>
                    <li><?php echo e(__('global.supports_multilingual')); ?></li>
                    <li><?php echo e(__('global.preserves_formatting')); ?></li>
                    <li><?php echo e(__('global.print_ready')); ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Lucide icons
        lucide.createIcons();
        
        // Add print event listener
        window.addEventListener('beforeprint', function() {
            document.body.classList.add('printing');
        });
        
        window.addEventListener('afterprint', function() {
            document.body.classList.remove('printing');
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('../themes/' . $activeTheme . '/' . $activeLayout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views\pages\finance\trial-balance.blade.php ENDPATH**/ ?>