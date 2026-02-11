<select <?php echo e($attributes->class(['tom-select'])->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>>
    <?php echo e($slot); ?>

</select>

<?php if (! $__env->hasRenderedOnce('f30b04f5-a6a4-41b8-8af1-ac1f6307e661')): $__env->markAsRenderedOnce('f30b04f5-a6a4-41b8-8af1-ac1f6307e661');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/tom-select.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('a4fcca6c-11db-4aae-b9d3-d8e25def32c0')): $__env->markAsRenderedOnce('a4fcca6c-11db-4aae-b9d3-d8e25def32c0');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/tom-select.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('04107769-63fd-4334-94d5-67eebf0eed61')): $__env->markAsRenderedOnce('04107769-63fd-4334-94d5-67eebf0eed61');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/tom-select.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\deebo\Source\resources\views\components\base\tom-select\index.blade.php ENDPATH**/ ?>