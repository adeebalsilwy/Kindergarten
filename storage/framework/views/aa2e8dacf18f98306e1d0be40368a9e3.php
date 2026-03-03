<select <?php echo e($attributes->class(['tom-select', $attributes->has('name') && $errors->has($attributes->get('name')) ? 'border-danger' : null])->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>>
    <?php echo e($slot); ?>

</select>

<?php if (! $__env->hasRenderedOnce('c3eefa1f-0e69-423c-96bf-7ddbc6ce7f9b')): $__env->markAsRenderedOnce('c3eefa1f-0e69-423c-96bf-7ddbc6ce7f9b');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/tom-select.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('d41ac81e-44e6-4ee2-8e3e-2a938fe81fc2')): $__env->markAsRenderedOnce('d41ac81e-44e6-4ee2-8e3e-2a938fe81fc2');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/tom-select.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('d458eaee-255f-4d97-8414-e8290d94de1c')): $__env->markAsRenderedOnce('d458eaee-255f-4d97-8414-e8290d94de1c');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/tom-select.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH E:\backup\Source\resources\views\components\base\tom-select\index.blade.php ENDPATH**/ ?>