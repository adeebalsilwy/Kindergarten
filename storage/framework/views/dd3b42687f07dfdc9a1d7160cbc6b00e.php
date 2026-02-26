<select <?php echo e($attributes->class(['tom-select', $attributes->has('name') && $errors->has($attributes->get('name')) ? 'border-danger' : null])->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>>
    <?php echo e($slot); ?>

</select>

<?php if (! $__env->hasRenderedOnce('1f342499-a2e1-4d17-ae97-2b93a69fd061')): $__env->markAsRenderedOnce('1f342499-a2e1-4d17-ae97-2b93a69fd061');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/tom-select.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('551cc853-c2ce-4a6e-bf16-2a8b5d2c9559')): $__env->markAsRenderedOnce('551cc853-c2ce-4a6e-bf16-2a8b5d2c9559');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/tom-select.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('3af794a1-ff5d-4dd6-9123-14697ab576a0')): $__env->markAsRenderedOnce('3af794a1-ff5d-4dd6-9123-14697ab576a0');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/tom-select.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH F:\my project\laravel\contract\Source\resources\views/components/base/tom-select/index.blade.php ENDPATH**/ ?>