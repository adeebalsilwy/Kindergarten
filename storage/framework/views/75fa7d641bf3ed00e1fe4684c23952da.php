

<?php $__env->startSection('subhead'); ?>
    <title><?php echo e(__('global.general_ledger')); ?> - <?php echo e(config('app.name')); ?></title>
    <style>
        .rtl { direction: rtl; text-align: right; }
        .ltr { direction: ltr; text-align: left; }
        .financial-table th, .financial-table td { 
            padding: 12px; 
            vertical-align: middle;
        }
        .account-card {
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }
        .account-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border-left-color: #3b82f6;
        }
        .transaction-row:nth-child(even) {
            background-color: rgba(0,0,0,0.02);
        }
        .dark .transaction-row:nth-child(even) {
            background-color: rgba(255,255,255,0.03);
        }
        .balance-positive { color: #10b981; }
        .balance-negative { color: #ef4444; }
        .amount-debit { color: #3b82f6; }
        .amount-credit { color: #f59e0b; }
        
        @media print {
            .no-print { display: none !important; }
            .financial-table { font-size: 11px; }
            .account-card { box-shadow: none; border: 1px solid #ddd; }
            .page-break { page-break-before: always; }
        }
        
        /* RTL specific adjustments */
        .rtl .financial-table th,
        .rtl .financial-table td {
            text-align: right;
        }
        
        .rtl .text-right {
            text-align: left;
        }
        
        .rtl .text-left {
            text-align: right;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
<div class="intro-y flex items-center mt-8">
    <h2 class="text-2xl font-bold mr-auto">
        <span class="ltr:inline"><?php echo e(__('global.general_ledger')); ?></span>
        <span class="rtl:inline"><?php echo e(__('global.general_ledger_ar')); ?></span>
    </h2>
    <div class="flex space-x-2 no-print">
        <?php if($generalLedger): ?>
        <a href="<?php echo e(route('finance.export.excel', ['report_type' => 'general-ledger', 'account_name' => $generalLedger['account_name'], 'start_date' => request('start_date'), 'end_date' => request('end_date')])); ?>" 
           class="btn btn-success flex items-center">
            <i data-lucide="download" class="w-4 h-4 mr-2"></i>
            <?php echo e(__('global.export_excel')); ?>

        </a>
        <a href="<?php echo e(route('finance.export.pdf', ['report_type' => 'general-ledger', 'account_name' => $generalLedger['account_name'], 'start_date' => request('start_date'), 'end_date' => request('end_date')])); ?>" 
           class="btn btn-primary flex items-center">
            <i data-lucide="printer" class="w-4 h-4 mr-2"></i>
            <?php echo e(__('global.export_pdf')); ?>

        </a>
        <button onclick="window.print()" class="btn btn-secondary flex items-center no-print">
            <i data-lucide="printer" class="w-4 h-4 mr-2"></i>
            <?php echo e(__('global.print')); ?>

        </button>
        <?php endif; ?>
    </div>
</div>

<div class="grid grid-cols-12 gap-6 mt-5">
    <!-- Report Header -->
    <div class="col-span-12 intro-y box p-6 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-dark-2 dark:to-dark-3">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                    <span class="ltr:inline"><?php echo e(__('global.general_ledger')); ?></span>
                    <span class="rtl:inline"><?php echo e(__('global.general_ledger_ar')); ?></span>
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
                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                        <?php echo e(app()->getLocale() == 'ar' ? 'العربية' : 'English'); ?>

                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="col-span-12 intro-y box p-5 no-print">
        <form method="GET" action="<?php echo e(route('finance.general-ledger')); ?>">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-4">
                    <label class="form-label font-medium"><?php echo e(__('global.account_name')); ?></label>
                    <select name="account_name" class="tom-select w-full" data-placeholder="<?php echo e(__('global.select_account')); ?>">
                        <option value=""><?php echo e(__('global.select_account')); ?></option>
                        <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($account); ?>" <?php echo e(request('account_name') == $account ? 'selected' : ''); ?>>
                                <?php echo e($account); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-span-12 md:col-span-3">
                    <label class="form-label font-medium"><?php echo e(__('global.start_date')); ?></label>
                    <input type="date" name="start_date" class="form-control w-full" value="<?php echo e(request('start_date')); ?>">
                </div>
                <div class="col-span-12 md:col-span-3">
                    <label class="form-label font-medium"><?php echo e(__('global.end_date')); ?></label>
                    <input type="date" name="end_date" class="form-control w-full" value="<?php echo e(request('end_date')); ?>">
                </div>
                <div class="col-span-12 md:col-span-2 flex items-end space-x-2">
                    <button type="submit" class="btn btn-primary w-full md:w-auto">
                        <i data-lucide="filter" class="w-4 h-4 mr-2"></i>
                        <?php echo e(__('global.filter')); ?>

                    </button>
                    <a href="<?php echo e(route('finance.general-ledger')); ?>" class="btn btn-outline-secondary w-full md:w-auto">
                        <?php echo e(__('global.reset')); ?>

                    </a>
                </div>
            </div>
        </form>
    </div>

    <!-- General Ledger Summary Cards (when account is selected) -->
    <?php if($generalLedger): ?>
    <div class="col-span-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="account-card bg-white dark:bg-dark-1 shadow rounded-lg p-6 border-l-4 border-blue-500">
            <div class="text-gray-600 dark:text-gray-400 text-sm font-medium"><?php echo e(__('global.account_name')); ?></div>
            <div class="text-xl font-bold text-blue-600 mt-2"><?php echo e($generalLedger['account_name']); ?></div>
            <div class="text-xs text-gray-500 mt-1"><?php echo e(__('global.selected_account')); ?></div>
        </div>
        
        <div class="account-card bg-white dark:bg-dark-1 shadow rounded-lg p-6 border-l-4 border-green-500">
            <div class="text-gray-600 dark:text-gray-400 text-sm font-medium"><?php echo e(__('global.entries_count')); ?></div>
            <div class="text-xl font-bold text-green-600 mt-2"><?php echo e(count($generalLedger['entries'])); ?></div>
            <div class="text-xs text-gray-500 mt-1"><?php echo e(__('global.transactions')); ?></div>
        </div>
        
        <div class="account-card bg-white dark:bg-dark-1 shadow rounded-lg p-6 border-l-4 <?php echo e($generalLedger['final_balance'] >= 0 ? 'border-green-500' : 'border-red-500'); ?>">
            <div class="text-gray-600 dark:text-gray-400 text-sm font-medium"><?php echo e(__('global.final_balance')); ?></div>
            <div class="text-xl font-bold <?php echo e($generalLedger['final_balance'] >= 0 ? 'text-green-600' : 'text-red-600'); ?> mt-2">
                <?php echo e(__('global.currency_symbol', ['amount' => number_format(abs($generalLedger['final_balance']), 2)])); ?>

                <span class="text-sm ml-1"><?php echo e($generalLedger['final_balance'] >= 0 ? 'DR' : 'CR'); ?></span>
            </div>
            <div class="text-xs text-gray-500 mt-1">
                <?php echo e($generalLedger['final_balance'] >= 0 ? __('global.debit_balance') : __('global.credit_balance')); ?>

            </div>
        </div>
        
        <div class="account-card bg-white dark:bg-dark-1 shadow rounded-lg p-6 border-l-4 border-purple-500">
            <div class="text-gray-600 dark:text-gray-400 text-sm font-medium"><?php echo e(__('global.period')); ?></div>
            <div class="text-sm font-medium text-purple-600 mt-2">
                <?php echo e($startDate ?? __('global.from_beginning')); ?><br>
                <?php echo e(__('global.to')); ?> <?php echo e($endDate ?? __('global.to_now')); ?>

            </div>
            <div class="text-xs text-gray-500 mt-1"><?php echo e(__('global.reporting_period')); ?></div>
        </div>
    </div>

    <!-- Account Activity Chart -->
    <div class="col-span-12 intro-y box p-5">
        <h3 class="text-lg font-medium mb-4"><?php echo e(__('global.account_activity')); ?></h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-blue-50 dark:bg-blue-900/20 rounded-lg p-4">
                <div class="text-blue-800 dark:text-blue-200 font-medium"><?php echo e(__('global.total_debits')); ?></div>
                <div class="text-2xl font-bold text-blue-600 dark:text-blue-400 mt-1">
                    <?php echo e(__('global.currency_symbol', ['amount' => number_format(array_sum(array_column($generalLedger['entries'], 'debit')), 2)])); ?>

                </div>
            </div>
            <div class="bg-orange-50 dark:bg-orange-900/20 rounded-lg p-4">
                <div class="text-orange-800 dark:text-orange-200 font-medium"><?php echo e(__('global.total_credits')); ?></div>
                <div class="text-2xl font-bold text-orange-600 dark:text-orange-400 mt-1">
                    <?php echo e(__('global.currency_symbol', ['amount' => number_format(array_sum(array_column($generalLedger['entries'], 'credit')), 2)])); ?>

                </div>
            </div>
            <div class="bg-purple-50 dark:bg-purple-900/20 rounded-lg p-4">
                <div class="text-purple-800 dark:text-purple-200 font-medium"><?php echo e(__('global.net_movement')); ?></div>
                <?php
                    $netMovement = array_sum(array_column($generalLedger['entries'], 'debit')) - array_sum(array_column($generalLedger['entries'], 'credit'));
                ?>
                <div class="text-2xl font-bold <?php echo e($netMovement >= 0 ? 'text-green-600' : 'text-red-600'); ?> mt-1">
                    <?php echo e(__('global.currency_symbol', ['amount' => number_format(abs($netMovement), 2)])); ?>

                </div>
            </div>
        </div>
    </div>

    <!-- General Ledger Table -->
    <div class="col-span-12 intro-y box p-5">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <div>
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                    <?php echo e(__('global.transactions_for')); ?>: <?php echo e($generalLedger['account_name']); ?>

                </h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                    <?php echo e(count($generalLedger['entries'])); ?> <?php echo e(__('global.transactions_recorded')); ?>

                </p>
            </div>
            <div class="mt-4 md:mt-0 flex space-x-2 no-print">
                <button onclick="toggleColumns()" class="btn btn-outline-secondary btn-sm">
                    <i data-lucide="columns" class="w-4 h-4 mr-1"></i>
                    <?php echo e(__('global.toggle_columns')); ?>

                </button>
                <button onclick="exportVisibleData()" class="btn btn-outline-info btn-sm">
                    <i data-lucide="download" class="w-4 h-4 mr-1"></i>
                    <?php echo e(__('global.export_visible')); ?>

                </button>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="financial-table table table-striped w-full">
                <thead class="bg-gray-50 dark:bg-dark-2 sticky top-0">
                    <tr>
                        <th class="font-semibold text-gray-700 dark:text-gray-300 text-left">
                            <div class="flex items-center">
                                <i data-lucide="calendar" class="w-4 h-4 mr-2"></i>
                                <?php echo e(__('global.date')); ?>

                            </div>
                        </th>
                        <th class="font-semibold text-gray-700 dark:text-gray-300 text-left">
                            <div class="flex items-center">
                                <i data-lucide="file-text" class="w-4 h-4 mr-2"></i>
                                <?php echo e(__('global.description')); ?>

                            </div>
                        </th>
                        <th class="font-semibold text-gray-700 dark:text-gray-300 text-right">
                            <div class="flex items-center justify-end">
                                <i data-lucide="trending-up" class="w-4 h-4 mr-2"></i>
                                <?php echo e(__('global.debit')); ?>

                            </div>
                        </th>
                        <th class="font-semibold text-gray-700 dark:text-gray-300 text-right">
                            <div class="flex items-center justify-end">
                                <i data-lucide="trending-down" class="w-4 h-4 mr-2"></i>
                                <?php echo e(__('global.credit')); ?>

                            </div>
                        </th>
                        <th class="font-semibold text-gray-700 dark:text-gray-300 text-right">
                            <div class="flex items-center justify-end">
                                <i data-lucide="scale" class="w-4 h-4 mr-2"></i>
                                <?php echo e(__('global.balance')); ?>

                            </div>
                        </th>
                        <th class="font-semibold text-gray-700 dark:text-gray-300 text-center no-print">
                            <?php echo e(__('global.actions')); ?>

                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-dark-3">
                    <?php $__empty_1 = true; $__currentLoopData = $generalLedger['entries']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="transaction-row hover:bg-gray-50 dark:hover:bg-dark-2 transition-colors">
                            <td class="font-medium text-gray-900 dark:text-gray-100">
                                <div class="flex items-center">
                                    <span class="px-2 py-1 bg-gray-100 dark:bg-dark-3 rounded text-xs mr-2">
                                        <?php echo e(str_pad($index + 1, 3, '0', STR_PAD_LEFT)); ?>

                                    </span>
                                    <?php echo e($entry['date']->format('Y-m-d')); ?>

                                    <span class="text-xs text-gray-500 ml-2 hidden md:inline">
                                        <?php echo e($entry['date']->format('H:i')); ?>

                                    </span>
                                </div>
                            </td>
                            <td class="text-gray-700 dark:text-gray-300 max-w-xs">
                                <div class="truncate" title="<?php echo e($entry['description']); ?>">
                                    <?php echo e($entry['description']); ?>

                                </div>
                            </td>
                            <td class="text-right amount-debit font-medium">
                                <?php if($entry['debit'] > 0): ?>
                                    <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded text-sm">
                                        <?php echo e(__('global.currency_symbol', ['amount' => number_format($entry['debit'], 2)])); ?>

                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="text-right amount-credit font-medium">
                                <?php if($entry['credit'] > 0): ?>
                                    <span class="px-2 py-1 bg-orange-100 text-orange-800 rounded text-sm">
                                        <?php echo e(__('global.currency_symbol', ['amount' => number_format($entry['credit'], 2)])); ?>

                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="text-right font-bold <?php echo e($entry['balance'] >= 0 ? 'balance-positive' : 'balance-negative'); ?>">
                                <?php echo e(__('global.currency_symbol', ['amount' => number_format(abs($entry['balance']), 2)])); ?>

                                <span class="text-xs ml-1"><?php echo e($entry['balance'] >= 0 ? 'DR' : 'CR'); ?></span>
                            </td>
                            <td class="text-center no-print">
                                <div class="flex justify-center space-x-1">
                                    <button onclick="showTransactionDetails(<?php echo e($index); ?>)" 
                                            class="btn btn-sm btn-outline-primary p-1"
                                            title="<?php echo e(__('global.view_details')); ?>">
                                        <i data-lucide="eye" class="w-4 h-4"></i>
                                    </button>
                                    <button onclick="printTransaction(<?php echo e($index); ?>)" 
                                            class="btn btn-sm btn-outline-secondary p-1"
                                            title="<?php echo e(__('global.print')); ?>">
                                        <i data-lucide="printer" class="w-4 h-4"></i>
                                    </button>
                                </div>
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
                <?php if(count($generalLedger['entries']) > 0): ?>
                <tfoot class="bg-gray-100 dark:bg-dark-3 font-bold sticky bottom-0">
                    <tr>
                        <td colspan="2" class="px-6 py-3 text-gray-900 dark:text-gray-100">
                            <?php echo e(__('global.total')); ?>

                        </td>
                        <td class="px-6 py-3 text-right amount-debit">
                            <?php echo e(__('global.currency_symbol', ['amount' => number_format(array_sum(array_column($generalLedger['entries'], 'debit')), 2)])); ?>

                        </td>
                        <td class="px-6 py-3 text-right amount-credit">
                            <?php echo e(__('global.currency_symbol', ['amount' => number_format(array_sum(array_column($generalLedger['entries'], 'credit')), 2)])); ?>

                        </td>
                        <td class="px-6 py-3 text-right <?php echo e($generalLedger['final_balance'] >= 0 ? 'balance-positive' : 'balance-negative'); ?>">
                            <?php echo e(__('global.currency_symbol', ['amount' => number_format(abs($generalLedger['final_balance']), 2)])); ?>

                        </td>
                        <td class="px-6 py-3 text-center no-print"></td>
                    </tr>
                </tfoot>
                <?php endif; ?>
            </table>
        </div>
    </div>

    <!-- Account Analysis -->
    <div class="col-span-12 intro-y box p-5">
        <h3 class="text-lg font-medium mb-4"><?php echo e(__('global.account_analysis')); ?></h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h4 class="font-medium text-gray-800 dark:text-gray-200 mb-3"><?php echo e(__('global.transaction_patterns')); ?></h4>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400"><?php echo e(__('global.average_transaction')); ?>:</span>
                        <span class="font-medium">
                            <?php echo e(__('global.currency_symbol', ['amount' => number_format((array_sum(array_column($generalLedger['entries'], 'debit')) + array_sum(array_column($generalLedger['entries'], 'credit'))) / max(count($generalLedger['entries']), 1), 2)])); ?>

                        </span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400"><?php echo e(__('global.largest_transaction')); ?>:</span>
                        <?php
                            $largestAmount = 0;
                            foreach($generalLedger['entries'] as $entry) {
                                $largestAmount = max($largestAmount, $entry['debit'], $entry['credit']);
                            }
                        ?>
                        <span class="font-medium">
                            <?php echo e(__('global.currency_symbol', ['amount' => number_format($largestAmount, 2)])); ?>

                        </span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400"><?php echo e(__('global.debit_transactions')); ?>:</span>
                        <span class="font-medium text-blue-600">
                            <?php echo e(count(array_filter($generalLedger['entries'], fn($e) => $e['debit'] > 0))); ?>

                        </span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400"><?php echo e(__('global.credit_transactions')); ?>:</span>
                        <span class="font-medium text-orange-600">
                            <?php echo e(count(array_filter($generalLedger['entries'], fn($e) => $e['credit'] > 0))); ?>

                        </span>
                    </div>
                </div>
            </div>
            <div>
                <h4 class="font-medium text-gray-800 dark:text-gray-200 mb-3"><?php echo e(__('global.balance_trend')); ?></h4>
                <div class="bg-gray-100 dark:bg-dark-2 rounded-lg p-4">
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <div class="w-3 h-3 rounded-full bg-green-500 mr-2"></div>
                            <span class="text-sm"><?php echo e(__('global.starting_balance')); ?>: 
                                <span class="font-medium">
                                    <?php echo e(__('global.currency_symbol', ['amount' => number_format($generalLedger['entries'][0]['balance'] ?? 0, 2)])); ?>

                                </span>
                            </span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 rounded-full bg-blue-500 mr-2"></div>
                            <span class="text-sm"><?php echo e(__('global.current_balance')); ?>: 
                                <span class="font-medium <?php echo e($generalLedger['final_balance'] >= 0 ? 'text-green-600' : 'text-red-600'); ?>">
                                    <?php echo e(__('global.currency_symbol', ['amount' => number_format(abs($generalLedger['final_balance']), 2)])); ?>

                                </span>
                            </span>
                        </div>
                        <div class="mt-3 pt-3 border-t border-gray-200 dark:border-dark-3">
                            <span class="text-sm text-gray-600 dark:text-gray-400">
                                <?php echo e(__('global.account_status')); ?>: 
                                <span class="font-medium <?php echo e($generalLedger['final_balance'] >= 0 ? 'text-green-600' : 'text-red-600'); ?>">
                                    <?php echo e($generalLedger['final_balance'] >= 0 ? __('global.active_positive') : __('global.needs_attention')); ?>

                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
    <!-- Account Selection Interface -->
    <div class="col-span-12 intro-y box p-5">
        <div class="text-center py-10">
            <i data-lucide="book-open" class="w-16 h-16 mx-auto text-gray-400 mb-4"></i>
            <h3 class="text-xl font-medium text-gray-700 dark:text-gray-300 mb-2">
                <?php echo e(__('global.select_account_to_view')); ?>

            </h3>
            <p class="text-gray-500 dark:text-gray-400 mb-6">
                <?php echo e(__('global.please_select_account_from_dropdown')); ?>

            </p>
            
            <?php if(count($accounts) > 0): ?>
            <div class="max-w-2xl mx-auto">
                <h4 class="text-lg font-medium text-gray-800 dark:text-gray-200 mb-4">
                    <?php echo e(__('global.available_accounts')); ?> (<?php echo e(count($accounts)); ?>)
                </h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('finance.general-ledger', ['account_name' => $account])); ?>" 
                           class="flex items-center p-3 bg-white dark:bg-dark-1 rounded-lg border border-gray-200 dark:border-dark-3 hover:border-blue-500 hover:shadow-md transition-all">
                            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mr-3">
                                <i data-lucide="folder" class="w-4 h-4 text-blue-600 dark:text-blue-400"></i>
                            </div>
                            <div class="text-left">
                                <div class="font-medium text-gray-900 dark:text-gray-100"><?php echo e($account); ?></div>
                                <div class="text-xs text-gray-500 dark:text-gray-400"><?php echo e(__('global.click_to_view_details')); ?></div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php else: ?>
            <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg p-4 max-w-md mx-auto">
                <div class="flex items-center">
                    <i data-lucide="alert-circle" class="w-5 h-5 text-yellow-600 dark:text-yellow-400 mr-2"></i>
                    <span class="font-medium text-yellow-800 dark:text-yellow-200">
                        <?php echo e(__('global.no_accounts_available')); ?>

                    </span>
                </div>
                <p class="text-sm text-yellow-700 dark:text-yellow-300 mt-2">
                    <?php echo e(__('global.create_accounting_entries_first')); ?>

                </p>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- Instructions and Notes -->
    <div class="col-span-12 intro-y box p-5">
        <h3 class="text-lg font-medium mb-4"><?php echo e(__('global.instructions')); ?></h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h4 class="font-medium text-gray-800 dark:text-gray-200 mb-2">
                    <span class="ltr:inline"><?php echo e(__('global.about_general_ledger')); ?></span>
                    <span class="rtl:inline"><?php echo e(__('global.about_general_ledger_ar')); ?></span>
                </h4>
                <ul class="list-disc pl-5 space-y-1 text-gray-600 dark:text-gray-400 text-sm">
                    <li><?php echo e(__('global.general_ledger_explanation')); ?></li>
                    <li><?php echo e(__('global.shows_detailed_transactions')); ?></li>
                    <li><?php echo e(__('global.running_balance_calculation')); ?></li>
                </ul>
            </div>
            <div>
                <h4 class="font-medium text-gray-800 dark:text-gray-200 mb-2"><?php echo e(__('global.features')); ?></h4>
                <ul class="list-disc pl-5 space-y-1 text-gray-600 dark:text-gray-400 text-sm">
                    <li><?php echo e(__('global.multilingual_support_note')); ?></li>
                    <li><?php echo e(__('global.rtl_layout_support')); ?></li>
                    <li><?php echo e(__('global.professional_export_formats')); ?></li>
                    <li><?php echo e(__('global.print_optimized_design')); ?></li>
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
        
        // Initialize Tom Select for account dropdown
        if (typeof TomSelect !== 'undefined') {
            new TomSelect('.tom-select', {
                create: false,
                sortField: {
                    field: "text",
                    direction: "asc"
                }
            });
        }
        
        // Column toggle functionality
        window.toggleColumns = function() {
            const columns = document.querySelectorAll('th:not(:last-child), td:not(:last-child)');
            columns.forEach(col => {
                col.classList.toggle('hidden');
            });
        };
        
        // Export visible data
        window.exportVisibleData = function() {
            // This would typically trigger an export of currently visible data
            alert('<?php echo e(__('global.export_functionality_coming_soon')); ?>');
        };
        
        // Show transaction details
        window.showTransactionDetails = function(index) {
            // This would show a modal with detailed transaction information
            alert('<?php echo e(__('global.transaction_details_feature_coming_soon')); ?>');
        };
        
        // Print transaction
        window.printTransaction = function(index) {
            // This would print a specific transaction
            alert('<?php echo e(__('global.print_transaction_feature_coming_soon')); ?>');
        };
        
        // Print event handlers
        window.addEventListener('beforeprint', function() {
            document.body.classList.add('printing');
        });
        
        window.addEventListener('afterprint', function() {
            document.body.classList.remove('printing');
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('../themes/' . $activeTheme . '/' . $activeLayout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views\pages\finance\general-ledger.blade.php ENDPATH**/ ?>