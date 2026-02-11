<div
    data-tw-merge
    <?php echo e($attributes->class(['full-calendar-draggable'])->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>

><?php echo e($slot); ?></div>

<?php if (! $__env->hasRenderedOnce('c8c8588f-8d40-48fc-b7bf-d821757dab6e')): $__env->markAsRenderedOnce('c8c8588f-8d40-48fc-b7bf-d821757dab6e');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/full-calendar.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('941aa303-2f3c-44b0-ba05-c04de6660133')): $__env->markAsRenderedOnce('941aa303-2f3c-44b0-ba05-c04de6660133');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/calendar/calendar.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/calendar/plugins/interaction.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('2e96f8bd-3795-4d52-bfcd-ac9beb56dc6a')): $__env->markAsRenderedOnce('2e96f8bd-3795-4d52-bfcd-ac9beb56dc6a');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/calendar/draggable.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\deebo\Source\resources\views\components\base\calendar\draggable\index.blade.php ENDPATH**/ ?>