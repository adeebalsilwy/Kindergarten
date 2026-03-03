<div
    <?php echo e($attributes->class('source hide relative [&.hide]:overflow-hidden [&.hide]:h-0')->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>>
    <?php echo e($slot); ?>

</div>

<?php if (! $__env->hasRenderedOnce('7304027a-310b-410c-8b94-639402da01b6')): $__env->markAsRenderedOnce('7304027a-310b-410c-8b94-639402da01b6');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/source.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH E:\backup\Source\resources\views\components\base\source\index.blade.php ENDPATH**/ ?>