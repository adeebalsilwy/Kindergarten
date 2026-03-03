<div
    data-tw-merge
    <?php echo e($attributes->class(['full-calendar-draggable'])->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>

><?php echo e($slot); ?></div>

<?php if (! $__env->hasRenderedOnce('3e0b95a8-5576-4ed1-b090-58c2cfb11926')): $__env->markAsRenderedOnce('3e0b95a8-5576-4ed1-b090-58c2cfb11926');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/full-calendar.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('4df91c0e-3a3d-42e2-b90c-6583de3f7063')): $__env->markAsRenderedOnce('4df91c0e-3a3d-42e2-b90c-6583de3f7063');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/calendar/calendar.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/calendar/plugins/interaction.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('4216ed37-b248-4668-a428-d4afdfc77acd')): $__env->markAsRenderedOnce('4216ed37-b248-4668-a428-d4afdfc77acd');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/calendar/draggable.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH E:\backup\Source\resources\views\components\base\calendar\draggable\index.blade.php ENDPATH**/ ?>