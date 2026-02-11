<canvas
    <?php echo e($attributes->class(merge(['chart', $attributes->whereStartsWith('class')->first()]))->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>

></canvas>

<?php if (! $__env->hasRenderedOnce('54293c86-6c01-4a21-9415-346c683c261c')): $__env->markAsRenderedOnce('54293c86-6c01-4a21-9415-346c683c261c');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/chartjs.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH F:\my project\laravel\contract\Source\resources\views\components\base\chart\index.blade.php ENDPATH**/ ?>