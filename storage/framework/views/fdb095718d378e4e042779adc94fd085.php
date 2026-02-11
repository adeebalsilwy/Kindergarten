<div
    <?php echo e($attributes->class(merge(['py-5 pl-5 pr-14 bg-white border border-slate-200/60 rounded-lg shadow-xl dark:bg-darkmode-600 dark:text-slate-300 dark:border-darkmode-600 hidden flex', $attributes->whereStartsWith('class')->first()]))->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>>
    <?php echo e($slot); ?>

</div>

<?php if (! $__env->hasRenderedOnce('08b907ac-0b60-4e0b-94ea-d1030ad94fe0')): $__env->markAsRenderedOnce('08b907ac-0b60-4e0b-94ea-d1030ad94fe0');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/toastify.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('848dd0a9-8c49-4967-b245-3cabf3bfab95')): $__env->markAsRenderedOnce('848dd0a9-8c49-4967-b245-3cabf3bfab95');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/toastify.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH F:\my project\laravel\contract\Source\resources\views\components\base\notification\index.blade.php ENDPATH**/ ?>