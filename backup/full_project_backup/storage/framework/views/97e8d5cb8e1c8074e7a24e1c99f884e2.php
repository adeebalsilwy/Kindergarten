<div
    <?php echo e($attributes->class(merge(['py-5 pl-5 pr-14 bg-white border border-slate-200/60 rounded-lg shadow-xl dark:bg-darkmode-600 dark:text-slate-300 dark:border-darkmode-600 hidden flex', $attributes->whereStartsWith('class')->first()]))->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>>
    <?php echo e($slot); ?>

</div>

<?php if (! $__env->hasRenderedOnce('b9b2ecb4-84e1-42cd-8195-5bd593d9327f')): $__env->markAsRenderedOnce('b9b2ecb4-84e1-42cd-8195-5bd593d9327f');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/toastify.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('523e8fe2-ec5b-4e9f-bc4b-3f0fb6373ed9')): $__env->markAsRenderedOnce('523e8fe2-ec5b-4e9f-bc4b-3f0fb6373ed9');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/toastify.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\deebo\Source\resources\views\components\base\notification\index.blade.php ENDPATH**/ ?>