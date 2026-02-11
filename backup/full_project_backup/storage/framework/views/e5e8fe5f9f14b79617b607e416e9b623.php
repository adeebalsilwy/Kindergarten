<div
    data-tw-merge
    <?php echo e($attributes->class(['full-calendar'])->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>

>
    <div></div>
</div>

<?php if (! $__env->hasRenderedOnce('4c32dcd4-cf8f-42c6-ad6e-ca6b44b9a18e')): $__env->markAsRenderedOnce('4c32dcd4-cf8f-42c6-ad6e-ca6b44b9a18e');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/full-calendar.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('00d547c2-b20f-4b87-9f6d-f857241648f9')): $__env->markAsRenderedOnce('00d547c2-b20f-4b87-9f6d-f857241648f9');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/calendar/calendar.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/calendar/plugins/interaction.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/calendar/plugins/day-grid.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/calendar/plugins/time-grid.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/calendar/plugins/list.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('ffa7ea4e-006e-4e2a-99fc-d6fc65ea7e1b')): $__env->markAsRenderedOnce('ffa7ea4e-006e-4e2a-99fc-d6fc65ea7e1b');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/calendar/calendar.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\deebo\Source\resources\views\components\calendar\index.blade.php ENDPATH**/ ?>