<div
    data-tw-merge
    <?php echo e($attributes->class(['full-calendar'])->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>

>
    <div></div>
</div>

<?php if (! $__env->hasRenderedOnce('e689bfb1-3c72-495c-9b30-3678ad954448')): $__env->markAsRenderedOnce('e689bfb1-3c72-495c-9b30-3678ad954448');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/full-calendar.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('51cc7fb9-0a03-444d-801c-5a1190c47300')): $__env->markAsRenderedOnce('51cc7fb9-0a03-444d-801c-5a1190c47300');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/calendar/calendar.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/calendar/plugins/interaction.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/calendar/plugins/day-grid.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/calendar/plugins/time-grid.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/calendar/plugins/list.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('8e99a73b-c8f5-49c5-afa6-386b0d4b8ce2')): $__env->markAsRenderedOnce('8e99a73b-c8f5-49c5-afa6-386b0d4b8ce2');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/calendar/calendar.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH E:\backup\Source\resources\views\components\calendar\index.blade.php ENDPATH**/ ?>