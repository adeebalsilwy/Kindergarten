<select <?php echo e($attributes->class(['tom-select', $attributes->has('name') && $errors->has($attributes->get('name')) ? 'border-danger' : null])->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>>
    <?php echo e($slot); ?>

</select>

<?php if (! $__env->hasRenderedOnce('bf3aedf4-8ae2-4158-948c-d45fda2e18cb')): $__env->markAsRenderedOnce('bf3aedf4-8ae2-4158-948c-d45fda2e18cb');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/tom-select.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('aa244049-0363-479c-a297-8e67088edc30')): $__env->markAsRenderedOnce('aa244049-0363-479c-a297-8e67088edc30');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/tom-select.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('33b21e3d-22b1-46fb-8483-9fce4b11198f')): $__env->markAsRenderedOnce('33b21e3d-22b1-46fb-8483-9fce4b11198f');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/tom-select.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH E:\backup\Source\resources\views/components/base/tom-select/index.blade.php ENDPATH**/ ?>