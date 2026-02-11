<div
    <?php echo e($attributes->class('source hide relative [&.hide]:overflow-hidden [&.hide]:h-0')->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>>
    <?php echo e($slot); ?>

</div>

<?php if (! $__env->hasRenderedOnce('01919c23-687b-45e9-a0d9-9f0f64a56fd1')): $__env->markAsRenderedOnce('01919c23-687b-45e9-a0d9-9f0f64a56fd1');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/source.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\deebo\Source\resources\views\components\base\source\index.blade.php ENDPATH**/ ?>