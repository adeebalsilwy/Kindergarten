<div <?php echo e($attributes->class('preview-component')->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>>
    <?php echo e($slot); ?>

</div>

<?php if (! $__env->hasRenderedOnce('3cf20f97-01b8-4ebb-9e9b-bac65192ebaa')): $__env->markAsRenderedOnce('3cf20f97-01b8-4ebb-9e9b-bac65192ebaa');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/preview-component.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\deebo\Source\resources\views\components\base\preview-component\index.blade.php ENDPATH**/ ?>