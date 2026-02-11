<div
    data-tw-merge
    <?php echo e($attributes->class(['full-calendar-draggable'])->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>

><?php echo e($slot); ?></div>

<?php if (! $__env->hasRenderedOnce('a05b4881-466e-44e2-a7ad-3bb142e205c5')): $__env->markAsRenderedOnce('a05b4881-466e-44e2-a7ad-3bb142e205c5');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/full-calendar.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('b5b66053-b1d1-4273-913a-59168dd67400')): $__env->markAsRenderedOnce('b5b66053-b1d1-4273-913a-59168dd67400');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/calendar/calendar.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/calendar/plugins/interaction.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('e06fc6b9-155c-4580-9974-91392b4c4667')): $__env->markAsRenderedOnce('e06fc6b9-155c-4580-9974-91392b4c4667');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/calendar/draggable.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH F:\my project\laravel\contract\Source\resources\views\components\base\calendar\draggable\index.blade.php ENDPATH**/ ?>