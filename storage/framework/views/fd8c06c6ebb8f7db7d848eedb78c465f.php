<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo e(__('global.general_ledger')); ?></title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: 20px;
            direction: <?php echo e(app()->getLocale() == 'ar' ? 'rtl' : 'ltr'); ?>;
            text-align: <?php echo e(app()->getLocale() == 'ar' ? 'right' : 'left'); ?>;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .company-name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .report-title {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }
        .account-name {
            font-size: 14px;
            font-weight: bold;
            color: #444;
            margin-bottom: 5px;
        }
        .report-info {
            font-size: 12px;
            color: #666;
            margin-bottom: 10px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            border: 1px solid #333;
            padding: 8px;
            font-size: 12px;
        }
        .table th {
            background-color: #f0f0f0;
            font-weight: bold;
            text-align: center;
        }
        .table td {
            text-align: <?php echo e(app()->getLocale() == 'ar' ? 'right' : 'left'); ?>;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .text-left {
            text-align: left;
        }
        .summary-box {
            margin: 20px 0;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .summary-item {
            margin: 5px 0;
            font-size: 14px;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #666;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }
        .positive {
            color: #22c55e;
        }
        .negative {
            color: #ef4444;
        }
        .debit {
            color: #3b82f6;
        }
        .credit {
            color: #f59e0b;
        }
        .amount {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="company-name"><?php echo e($companyName); ?></div>
        <div class="report-title"><?php echo e(__('global.general_ledger')); ?> <?php echo e(app()->getLocale() == 'ar' ? ' (' . __('global.general_ledger_ar') . ')' : ''); ?></div>
        <div class="account-name"><?php echo e(__('global.account_name')); ?>: <?php echo e($generalLedger['account_name']); ?></div>
        <div class="report-info">
            <?php echo e(__('global.generated_on')); ?>: <?php echo e($reportDate); ?><br>
            <?php echo e(__('global.period')); ?>: <?php echo e($startDate ?? __('global.from_beginning')); ?> <?php echo e(__('global.to')); ?> <?php echo e($endDate ?? __('global.to_now')); ?>

        </div>
    </div>

    <div class="summary-box">
        <div class="summary-item"><strong><?php echo e(__('global.entries_count')); ?>:</strong> <?php echo e(count($generalLedger['entries'])); ?></div>
        <div class="summary-item"><strong><?php echo e(__('global.total_debits')); ?>:</strong> <span class="amount debit"><?php echo e(__('global.currency_symbol', ['amount' => number_format(array_sum(array_column($generalLedger['entries'], 'debit')), 2)])); ?></span></div>
        <div class="summary-item"><strong><?php echo e(__('global.total_credits')); ?>:</strong> <span class="amount credit"><?php echo e(__('global.currency_symbol', ['amount' => number_format(array_sum(array_column($generalLedger['entries'], 'credit')), 2)])); ?></span></div>
        <div class="summary-item"><strong><?php echo e(__('global.final_balance')); ?>:</strong> 
            <span class="amount <?php echo e($generalLedger['final_balance'] >= 0 ? 'positive' : 'negative'); ?>">
                <?php echo e(__('global.currency_symbol', ['amount' => number_format(abs($generalLedger['final_balance']), 2)])); ?>

                <span style="font-size: 10px;"><?php echo e($generalLedger['final_balance'] >= 0 ? 'DR' : 'CR'); ?></span>
            </span>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th class="text-center"><?php echo e(__('global.date')); ?></th>
                <th><?php echo e(__('global.description')); ?></th>
                <th class="text-right"><?php echo e(__('global.debit')); ?></th>
                <th class="text-right"><?php echo e(__('global.credit')); ?></th>
                <th class="text-right"><?php echo e(__('global.balance')); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $generalLedger['entries']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="text-center"><?php echo e($entry['date']->format('Y-m-d')); ?></td>
                    <td><?php echo e($entry['description']); ?></td>
                    <td class="amount debit"><?php if($entry['debit'] > 0): ?><?php echo e(__('global.currency_symbol', ['amount' => number_format($entry['debit'], 2)])); ?><?php endif; ?></td>
                    <td class="amount credit"><?php if($entry['credit'] > 0): ?><?php echo e(__('global.currency_symbol', ['amount' => number_format($entry['credit'], 2)])); ?><?php endif; ?></td>
                    <td class="amount <?php echo e($entry['balance'] >= 0 ? 'positive' : 'negative'); ?>">
                        <?php echo e(__('global.currency_symbol', ['amount' => number_format(abs($entry['balance']), 2)])); ?>

                        <span style="font-size: 10px;"><?php echo e($entry['balance'] >= 0 ? 'DR' : 'CR'); ?></span>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="text-center"><?php echo e(__('global.no_records_found')); ?></td>
                </tr>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr style="background-color: #f0f0f0; font-weight: bold;">
                <td colspan="2"><?php echo e(__('global.total')); ?></td>
                <td class="amount debit"><?php echo e(__('global.currency_symbol', ['amount' => number_format(array_sum(array_column($generalLedger['entries'], 'debit')), 2)])); ?></td>
                <td class="amount credit"><?php echo e(__('global.currency_symbol', ['amount' => number_format(array_sum(array_column($generalLedger['entries'], 'credit')), 2)])); ?></td>
                <td class="amount <?php echo e($generalLedger['final_balance'] >= 0 ? 'positive' : 'negative'); ?>">
                    <?php echo e(__('global.currency_symbol', ['amount' => number_format($generalLedger['final_balance'], 2)])); ?>

                </td>
            </tr>
        </tfoot>
    </table>

    <div class="footer">
        <p><?php echo e(__('global.generated_by')); ?> <?php echo e($companyName); ?> - <?php echo e(now()->format('Y-m-d H:i:s')); ?></p>
        <p><?php echo e(__('global.page')); ?> <span class="page"></span> <?php echo e(__('global.of')); ?> <span class="topage"></span></p>
    </div>
</body>
</html><?php /**PATH F:\my project\laravel\contract\Source\resources\views\pages\finance\exports\general-ledger-pdf.blade.php ENDPATH**/ ?>