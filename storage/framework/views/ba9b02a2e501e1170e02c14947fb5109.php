<div <?php echo e($attributes->class('preview-component')->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>>
    <?php echo e($slot); ?>

</div>

<?php if (! $__env->hasRenderedOnce('ba19f377-0b05-496d-a213-2a595432fc67')): $__env->markAsRenderedOnce('ba19f377-0b05-496d-a213-2a595432fc67');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/preview-component.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH F:\my project\laravel\contract\Source\resources\views\components\base\preview-component\index.blade.php ENDPATH**/ ?>