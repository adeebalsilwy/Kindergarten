<div
    <?php echo e($attributes->class('source hide relative [&.hide]:overflow-hidden [&.hide]:h-0')->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>>
    <?php echo e($slot); ?>

</div>

<?php if (! $__env->hasRenderedOnce('8e6dbc66-d85b-4725-83ca-5a9357528c8c')): $__env->markAsRenderedOnce('8e6dbc66-d85b-4725-83ca-5a9357528c8c');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/source.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH F:\my project\laravel\contract\Source\resources\views\components\base\source\index.blade.php ENDPATH**/ ?>