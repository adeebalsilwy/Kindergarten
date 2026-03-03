<canvas
    <?php echo e($attributes->class(merge(['chart', $attributes->whereStartsWith('class')->first()]))->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>

></canvas>

<?php if (! $__env->hasRenderedOnce('f2093e9e-8c7e-4339-ace8-74d58f4b0879')): $__env->markAsRenderedOnce('f2093e9e-8c7e-4339-ace8-74d58f4b0879');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/chartjs.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH E:\backup\Source\resources\views\components\base\chart\index.blade.php ENDPATH**/ ?>