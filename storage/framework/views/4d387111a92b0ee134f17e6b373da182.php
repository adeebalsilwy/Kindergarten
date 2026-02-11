<div class="editor">
    <?php echo e($slot); ?>

</div>

<?php if (! $__env->hasRenderedOnce('990ef843-9d24-49c5-9072-2eeb25eaa19f')): $__env->markAsRenderedOnce('990ef843-9d24-49c5-9072-2eeb25eaa19f');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/ckeditor.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('8923afcf-c659-4c64-88cc-afe01c02ae55')): $__env->markAsRenderedOnce('8923afcf-c659-4c64-88cc-afe01c02ae55');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/ckeditor/balloon-block.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('e1c6876c-86aa-4d50-a519-6c2074ec1288')): $__env->markAsRenderedOnce('e1c6876c-86aa-4d50-a519-6c2074ec1288');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/balloon-block-editor.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH F:\my project\laravel\contract\Source\resources\views\components\base\balloon-block-editor\index.blade.php ENDPATH**/ ?>