<select <?php echo e($attributes->class(['tom-select', $attributes->has('name') && $errors->has($attributes->get('name')) ? 'border-danger' : null])->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>>
    <?php echo e($slot); ?>

</select>

<?php if (! $__env->hasRenderedOnce('08bb971e-0b1e-4d25-bcd7-a4d5c8eed66e')): $__env->markAsRenderedOnce('08bb971e-0b1e-4d25-bcd7-a4d5c8eed66e');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/tom-select.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('5eb29423-2a21-4eb8-9e0b-9584b12a8e64')): $__env->markAsRenderedOnce('5eb29423-2a21-4eb8-9e0b-9584b12a8e64');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/tom-select.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('72312c49-834c-4bb1-94e4-5a4f92ce273a')): $__env->markAsRenderedOnce('72312c49-834c-4bb1-94e4-5a4f92ce273a');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/tom-select.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH E:\backup\Source\resources\views/components/base/tom-select/index.blade.php ENDPATH**/ ?>