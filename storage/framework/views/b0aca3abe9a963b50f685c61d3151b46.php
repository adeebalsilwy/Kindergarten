<div
    data-tw-merge
    <?php echo e($attributes->class(['full-calendar'])->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>

>
    <div></div>
</div>

<?php if (! $__env->hasRenderedOnce('caf038fc-a0f8-4897-aa9f-757837aa2abf')): $__env->markAsRenderedOnce('caf038fc-a0f8-4897-aa9f-757837aa2abf');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/full-calendar.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('695964b6-d4f7-47b6-9d10-11161e8263d8')): $__env->markAsRenderedOnce('695964b6-d4f7-47b6-9d10-11161e8263d8');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/calendar/calendar.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/calendar/plugins/interaction.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/calendar/plugins/day-grid.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/calendar/plugins/time-grid.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/calendar/plugins/list.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('de4da0e0-78de-4fcf-9a4b-56b2c31ab7bb')): $__env->markAsRenderedOnce('de4da0e0-78de-4fcf-9a4b-56b2c31ab7bb');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/calendar/calendar.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH F:\my project\laravel\contract\Source\resources\views\components\calendar\index.blade.php ENDPATH**/ ?>