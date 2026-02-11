<select <?php echo e($attributes->class(['tom-select', $attributes->has('name') && $errors->has($attributes->get('name')) ? 'border-danger' : null])->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>>
    <?php echo e($slot); ?>

</select>

<?php if (! $__env->hasRenderedOnce('3d9e4ff1-3c15-4c4a-bf0a-dab28116635b')): $__env->markAsRenderedOnce('3d9e4ff1-3c15-4c4a-bf0a-dab28116635b');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/tom-select.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('a3fa465e-40d2-4d93-bfe8-bcde8a001d3b')): $__env->markAsRenderedOnce('a3fa465e-40d2-4d93-bfe8-bcde8a001d3b');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/tom-select.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('efaa9907-629e-48c0-841a-04dc504e7628')): $__env->markAsRenderedOnce('efaa9907-629e-48c0-841a-04dc504e7628');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/tom-select.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH F:\my project\laravel\contract\Source\resources\views\components\base\tom-select\index.blade.php ENDPATH**/ ?>