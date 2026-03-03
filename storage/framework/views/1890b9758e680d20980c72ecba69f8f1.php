<div
    <?php echo e($attributes->class(merge(['py-5 ps-5 pe-14 bg-white border border-slate-200/60 rounded-lg shadow-xl dark:bg-darkmode-600 dark:text-slate-300 dark:border-darkmode-600 hidden flex', $attributes->whereStartsWith('class')->first()]))->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>>
    <?php echo e($slot); ?>

</div>

<?php if (! $__env->hasRenderedOnce('64925c5a-e18f-4dda-82ba-0595c0a89130')): $__env->markAsRenderedOnce('64925c5a-e18f-4dda-82ba-0595c0a89130');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/toastify.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('782c7d31-b7a1-4c21-aa49-bdb566c5adf8')): $__env->markAsRenderedOnce('782c7d31-b7a1-4c21-aa49-bdb566c5adf8');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/toastify.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH E:\backup\Source\resources\views\components\base\notification\index.blade.php ENDPATH**/ ?>