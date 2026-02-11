<canvas
    <?php echo e($attributes->class(merge(['chart', $attributes->whereStartsWith('class')->first()]))->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>

></canvas>

<?php if (! $__env->hasRenderedOnce('c66c113c-ae18-4d92-b388-f503eb3ab357')): $__env->markAsRenderedOnce('c66c113c-ae18-4d92-b388-f503eb3ab357');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/chartjs.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\deebo\Source\resources\views\components\base\chart\index.blade.php ENDPATH**/ ?>