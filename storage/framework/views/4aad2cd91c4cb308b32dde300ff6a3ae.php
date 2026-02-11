<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo e(__('global.profit_loss_statement')); ?></title>
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
        .section-header {
            font-weight: bold;
            font-size: 14px;
            margin-top: 15px;
            margin-bottom: 5px;
            padding: 5px 0;
            border-bottom: 1px solid #333;
        }
        .total-row {
            font-weight: bold;
            background-color: #f0f0f0;
        }
        .profit-row {
            font-weight: bold;
            background-color: #f0fff4;
            color: #22c55e;
        }
        .loss-row {
            font-weight: bold;
            background-color: #fef2f2;
            color: #ef4444;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #666;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }
        .amount {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="company-name"><?php echo e($companyName); ?></div>
        <div class="report-title"><?php echo e(__('global.profit_loss_statement')); ?> <?php echo e(app()->getLocale() == 'ar' ? ' (' . __('global.profit_loss_statement_ar') . ')' : ''); ?></div>
        <div class="report-info">
            <?php echo e(__('global.generated_on')); ?>: <?php echo e($reportDate); ?><br>
            <?php echo e(__('global.period')); ?>: <?php echo e($startDate ?? __('global.from_beginning')); ?> <?php echo e(__('global.to')); ?> <?php echo e($endDate ?? __('global.to_now')); ?>

        </div>
    </div>

    <div class="section-header"><?php echo e(__('global.revenue')); ?></div>
    <table class="table">
        <tbody>
            <tr>
                <td><?php echo e(__('global.total_revenue')); ?></td>
                <td class="amount"><?php echo e(__('global.currency_symbol', ['amount' => number_format($profitLoss['revenue'], 2)])); ?></td>
            </tr>
        </tbody>
    </table>

    <div class="section-header"><?php echo e(__('global.expenses')); ?></div>
    <table class="table">
        <tbody>
            <tr>
                <td><?php echo e(__('global.total_expenses')); ?></td>
                <td class="amount"><?php echo e(__('global.currency_symbol', ['amount' => number_format($profitLoss['expenses'], 2)])); ?></td>
            </tr>
        </tbody>
    </table>

    <table class="table">
        <tbody>
            <tr class="<?php echo e($profitLoss['profit'] >= 0 ? 'profit-row' : 'loss-row'); ?>">
                <td><?php echo e(__('global.profit_loss')); ?></td>
                <td class="amount">
                    <?php echo e(__('global.currency_symbol', ['amount' => number_format($profitLoss['profit'], 2)])); ?>

                </td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        <p><?php echo e(__('global.generated_by')); ?> <?php echo e($companyName); ?> - <?php echo e(now()->format('Y-m-d H:i:s')); ?></p>
        <p><?php echo e(__('global.page')); ?> <span class="page"></span> <?php echo e(__('global.of')); ?> <span class="topage"></span></p>
    </div>
</body>
</html><?php /**PATH F:\my project\laravel\contract\Source\resources\views\pages\finance\exports\profit-loss-pdf.blade.php ENDPATH**/ ?>