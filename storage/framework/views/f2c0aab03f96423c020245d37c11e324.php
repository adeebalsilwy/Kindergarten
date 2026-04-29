<select <?php echo e($attributes->class(['tom-select', $attributes->has('name') && $errors->has($attributes->get('name')) ? 'border-danger' : null])->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>>
    <?php echo e($slot); ?>

</select>

<?php if (! $__env->hasRenderedOnce('639879b2-6126-4710-bc38-463c206600d1')): $__env->markAsRenderedOnce('639879b2-6126-4710-bc38-463c206600d1');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/tom-select.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('d54102a6-19b9-4eed-9097-94239cb47b5e')): $__env->markAsRenderedOnce('d54102a6-19b9-4eed-9097-94239cb47b5e');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/tom-select.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('5abc51e2-a91a-46d5-a02c-01f542cef3bf')): $__env->markAsRenderedOnce('5abc51e2-a91a-46d5-a02c-01f542cef3bf');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/tom-select.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH E:\backup\Source\resources\views/components/base/tom-select/index.blade.php ENDPATH**/ ?>