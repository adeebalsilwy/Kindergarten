<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" dir="<?php echo e(__('global.text_direction', [], 'en') == 'rtl' ? 'rtl' : 'ltr'); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(__('classes.title')); ?> - <?php echo e(config('app.name')); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 20px;
        }
        .header h1 {
            color: #343a40;
            margin: 0;
            font-size: 28px;
        }
        .header p {
            color: #6c757d;
            margin: 5px 0 0 0;
        }
        .report-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .report-info div {
            background-color: #f1f3f4;
            padding: 10px 15px;
            border-radius: 4px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 14px;
        }
        th, td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        tr:hover {
            background-color: #e9ecef;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            color: #6c757d;
            font-size: 12px;
            border-top: 1px solid #dee2e6;
            padding-top: 15px;
        }
        .logo {
            max-width: 150px;
            height: auto;
            margin-bottom: 15px;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .summary-row {
            background-color: #fff3cd !important;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <?php if(config('app.logo')): ?>
                <img src="<?php echo e(public_path(config('app.logo'))); ?>" alt="<?php echo e(config('app.name')); ?>" class="logo">
            <?php endif; ?>
            <h1><?php echo e(config('app.name')); ?></h1>
            <p><?php echo e(__('classes.title')); ?> - <?php echo e(__('global.export_excel')); ?></p>
        </div>

        <div class="report-info">
            <div>
                <strong><?php echo e(__('global.generated_at')); ?>:</strong> <?php echo e(now()->format('Y-m-d H:i:s')); ?>

            </div>
            <div>
                <strong><?php echo e(__('global.total_records')); ?>:</strong> <?php echo e(${'{{variableNamePlural); ?>'}->count() }}
            </div>
            <div>
                <strong><?php echo e(__('global.language')); ?>:</strong> <?php echo e(app()->getLocale() == 'ar' ? 'العربية' : 'English'); ?>

            </div>
        </div>

        <table>
            <thead>
                <tr>
<?php echo e(tableHeaders); ?>

                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $<?php echo e('{{variableNamePlural); ?>'}}; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $<?php echo e('classes'); ?>): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
<?php echo e(tableBody); ?>

                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <div class="footer">
            <p><?php echo e(__('global.report_generated_by')); ?> <?php echo e(config('app.name')); ?> | <?php echo e(__('global.confidential')); ?></p>
        </div>
    </div>
</body>
</html><?php /**PATH F:\my project\laravel\contract\Source\resources\views\pages\classes\export-excel.blade.php ENDPATH**/ ?>