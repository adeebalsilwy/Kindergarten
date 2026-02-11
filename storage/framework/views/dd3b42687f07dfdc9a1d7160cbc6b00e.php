<select <?php echo e($attributes->class(['tom-select', $attributes->has('name') && $errors->has($attributes->get('name')) ? 'border-danger' : null])->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>>
    <?php echo e($slot); ?>

</select>

<?php if (! $__env->hasRenderedOnce('1b952cce-4581-4412-8b6a-eb037634ed4d')): $__env->markAsRenderedOnce('1b952cce-4581-4412-8b6a-eb037634ed4d');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/tom-select.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('beab0881-ef82-4d3e-aa41-b912285cec44')): $__env->markAsRenderedOnce('beab0881-ef82-4d3e-aa41-b912285cec44');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/tom-select.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('8d9fe68b-f0d7-4890-a2da-fdbd8ba28bbc')): $__env->markAsRenderedOnce('8d9fe68b-f0d7-4890-a2da-fdbd8ba28bbc');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/tom-select.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH F:\my project\laravel\contract\Source\resources\views/components/base/tom-select/index.blade.php ENDPATH**/ ?>