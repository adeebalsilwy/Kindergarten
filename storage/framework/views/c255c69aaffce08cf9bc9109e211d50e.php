<select <?php echo e($attributes->class(['tom-select', $attributes->has('name') && $errors->has($attributes->get('name')) ? 'border-danger' : null])->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>>
    <?php echo e($slot); ?>

</select>

<?php if (! $__env->hasRenderedOnce('6078d555-f5a5-4295-adad-9f0cb4e63a1d')): $__env->markAsRenderedOnce('6078d555-f5a5-4295-adad-9f0cb4e63a1d');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/tom-select.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('96759584-98ff-41c0-85a5-014dfe530699')): $__env->markAsRenderedOnce('96759584-98ff-41c0-85a5-014dfe530699');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/tom-select.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('a21f1be8-4d9a-40b0-b18a-3cea4ec60100')): $__env->markAsRenderedOnce('a21f1be8-4d9a-40b0-b18a-3cea4ec60100');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/tom-select.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH /app/resources/views/components/base/tom-select/index.blade.php ENDPATH**/ ?>