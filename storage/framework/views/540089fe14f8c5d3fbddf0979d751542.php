<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Materials Export</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 18px;
        }
        .header p {
            margin: 5px 0 0 0;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Materials Export</h1>
        <p>Generated on <?php echo e(date('Y-m-d H:i:s')); ?></p>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Type</th>
                <th>Quantity Available</th>
                <th>Quantity Required</th>
                <th>Unit Cost</th>
                <th>Supplier</th>
                <th>Storage Location</th>
                <th>Is Consumable</th>
                <th>Is Digital</th>
                <th>Is Active</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $materials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($material->id); ?></td>
                <td><?php echo e($material->name); ?></td>
                <td><?php echo e($material->category ?: '-'); ?></td>
                <td><?php echo e($material->type ?: '-'); ?></td>
                <td><?php echo e($material->quantity_available); ?></td>
                <td><?php echo e($material->quantity_required); ?></td>
                <td><?php echo e($material->unit_cost ? '€' . number_format($material->unit_cost, 2) : '-'); ?></td>
                <td><?php echo e($material->supplier ?: '-'); ?></td>
                <td><?php echo e($material->storage_location ?: '-'); ?></td>
                <td><?php echo e($material->is_consumable ? 'Yes' : 'No'); ?></td>
                <td><?php echo e($material->is_digital ? 'Yes' : 'No'); ?></td>
                <td><?php echo e($material->is_active ? 'Yes' : 'No'); ?></td>
                <td><?php echo e($material->created_at->format('Y-m-d H:i:s')); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html><?php /**PATH E:\backup\Source\resources\views\pages\materials\export-pdf.blade.php ENDPATH**/ ?>