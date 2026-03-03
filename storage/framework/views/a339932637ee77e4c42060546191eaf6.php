<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" dir="<?php echo e(app()->getLocale() == 'ar' ? 'rtl' : 'ltr'); ?>">
<head>
    <meta charset="utf-8">
    <title><?php echo e(__('global.accounting_entries')); ?></title>
    <style>
        @page { margin: 1cm; }
        body { font-family: 'almarai', sans-serif; color: #333; line-height: 1.5; }
        .header { border-bottom: 2px solid #1e293b; padding-bottom: 10px; margin-bottom: 20px; display: flex; justify-content: space-between; }
        .school-name { font-size: 24px; font-weight: bold; color: #10b981; }
        .report-title { text-align: center; font-size: 20px; font-weight: bold; margin: 20px 0; background: #f8fafc; padding: 10px; }
        .data-table { width: 100%; border-collapse: collapse; font-size: 10px; }
        .data-table th { background-color: #1e293b; color: white; padding: 8px; text-align: <?php echo e(app()->getLocale() == 'ar' ? 'right' : 'left'); ?>; }
        .data-table td { border-bottom: 1px solid #e2e8f0; padding: 8px; }
        .footer { position: fixed; bottom: 0; width: 100%; text-align: center; font-size: 10px; color: #94a3b8; }
        .debit { color: #b91c1c; }
        .credit { color: #15803d; }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo-section">
            <div class="school-name">KidsCare</div>
            <div style="font-size: 12px;"><?php echo e(__('global.accounting_department')); ?></div>
        </div>
        <div style="text-align: <?php echo e(app()->getLocale() == 'ar' ? 'left' : 'right'); ?>; font-size: 12px;">
            <div><?php echo e(__('global.date')); ?>: <?php echo e(date('Y/m/d')); ?></div>
        </div>
    </div>

    <div class="report-title"><?php echo e(__('global.general_ledger')); ?></div>

    <table class="data-table">
        <thead>
            <tr>
                <th><?php echo e(__('global.date')); ?></th>
                <th><?php echo e(__('global.reference')); ?></th>
                <th><?php echo e(__('global.description')); ?></th>
                <th style="text-align: end;"><?php echo e(__('global.debit')); ?></th>
                <th style="text-align: end;"><?php echo e(__('global.credit')); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $totalDebit = 0; $totalCredit = 0; ?>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $totalDebit += $item->debit; $totalCredit += $item->credit; ?>
                <tr>
                    <td><?php echo e($item->entry_date); ?></td>
                    <td><?php echo e($item->reference); ?></td>
                    <td><?php echo e($item->description); ?></td>
                    <td style="text-align: end;" class="debit"><?php echo e($item->debit > 0 ? number_format($item->debit, 2) : '-'); ?></td>
                    <td style="text-align: end;" class="credit"><?php echo e($item->credit > 0 ? number_format($item->credit, 2) : '-'); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
            <tr style="background-color: #f1f5f9; font-weight: bold;">
                <td colspan="3" style="text-align: end; padding: 8px;"><?php echo e(__('global.totals')); ?></td>
                <td style="text-align: end; padding: 8px;" class="debit"><?php echo e(number_format($totalDebit, 2)); ?></td>
                <td style="text-align: end; padding: 8px;" class="credit"><?php echo e(number_format($totalCredit, 2)); ?></td>
            </tr>
        </tfoot>
    </table>

    <div class="footer">
        <?php echo e(__('global.all_rights_reserved')); ?> &copy; <?php echo e(date('Y')); ?> KidsCare
    </div>
</body>
</html>
<?php /**PATH E:\backup\Source\resources\views\pages\accounting_entries\export-pdf.blade.php ENDPATH**/ ?>