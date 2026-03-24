<select <?php echo e($attributes->class(['tom-select', $attributes->has('name') && $errors->has($attributes->get('name')) ? 'border-danger' : null])->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>>
    <?php echo e($slot); ?>

</select>

<?php if (! $__env->hasRenderedOnce('3b2f7514-8ae3-4001-b26c-ab19b3879dd6')): $__env->markAsRenderedOnce('3b2f7514-8ae3-4001-b26c-ab19b3879dd6');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/tom-select.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('3986f3ea-645f-48f0-aad2-fe638ef0eefd')): $__env->markAsRenderedOnce('3986f3ea-645f-48f0-aad2-fe638ef0eefd');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/tom-select.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('c12dbd99-ec31-4d44-b645-79950056dfaa')): $__env->markAsRenderedOnce('c12dbd99-ec31-4d44-b645-79950056dfaa');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/tom-select.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH E:\backup\Source\resources\views/components/base/tom-select/index.blade.php ENDPATH**/ ?>