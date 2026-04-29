<select <?php echo e($attributes->class(['tom-select', $attributes->has('name') && $errors->has($attributes->get('name')) ? 'border-danger' : null])->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>>
    <?php echo e($slot); ?>

</select>

<?php if (! $__env->hasRenderedOnce('b34a01f1-f833-48d1-adc9-cf772bd4ff11')): $__env->markAsRenderedOnce('b34a01f1-f833-48d1-adc9-cf772bd4ff11');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/tom-select.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('5639e7cc-97f0-443e-9d8d-8576162f5499')): $__env->markAsRenderedOnce('5639e7cc-97f0-443e-9d8d-8576162f5499');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/tom-select.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('bfd5da48-822c-4da8-bbb5-b2eb1883bcd3')): $__env->markAsRenderedOnce('bfd5da48-822c-4da8-bbb5-b2eb1883bcd3');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/tom-select.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH E:\backup\Source\resources\views/components/base/tom-select/index.blade.php ENDPATH**/ ?>