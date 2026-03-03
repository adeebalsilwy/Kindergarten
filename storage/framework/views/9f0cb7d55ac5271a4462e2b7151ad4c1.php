<div <?php echo e($attributes->class('preview-component')->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>>
    <?php echo e($slot); ?>

</div>

<?php if (! $__env->hasRenderedOnce('d1b88be0-3bad-458b-84ad-035ede2a4d02')): $__env->markAsRenderedOnce('d1b88be0-3bad-458b-84ad-035ede2a4d02');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/preview-component.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH E:\backup\Source\resources\views\components\base\preview-component\index.blade.php ENDPATH**/ ?>