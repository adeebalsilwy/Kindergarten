<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo e(__('Children.title')); ?></title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .title {
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="title"><?php echo e(__('Children.title')); ?></div>
        <div>Date: <?php echo e(date('Y-m-d H:i:s')); ?></div>
    </div>
    
    <table>
        <thead>
            <tr>
                <?php if(count($data) > 0): ?>
                    <?php $__currentLoopData = $data[0]->getAttributes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!in_array($key, ['id', 'created_at', 'updated_at', 'deleted_at'])): ?>
                            <th><?php echo e(__('Children.fields.'.$key)); ?></th>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <?php $__currentLoopData = $item->getAttributes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!in_array($key, ['id', 'created_at', 'updated_at', 'deleted_at'])): ?>
                            <td>
                                <?php if(is_bool($value)): ?>
                                    <?php echo e($value ? __('global.yes') : __('global.no')); ?>

                                <?php elseif(in_array($key, ['created_at', 'updated_at']) && $value): ?>
                                    <?php echo e(\Carbon\Carbon::parse($value)->format('Y-m-d H:i:s')); ?>

                                <?php else: ?>
                                    <?php echo e($value); ?>

                                <?php endif; ?>
                            </td>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html><?php /**PATH D:\xampp\htdocs\deebo\Source\resources\views\pages\children\export-pdf.blade.php ENDPATH**/ ?>