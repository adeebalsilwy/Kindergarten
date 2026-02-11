<div class="editor">
    <?php echo e($slot); ?>

</div>

<?php if (! $__env->hasRenderedOnce('4d728a7d-00fd-49fb-b91f-0c518dec0e63')): $__env->markAsRenderedOnce('4d728a7d-00fd-49fb-b91f-0c518dec0e63');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/ckeditor.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('6f12226d-a527-4860-8fb9-ce30bc0807fe')): $__env->markAsRenderedOnce('6f12226d-a527-4860-8fb9-ce30bc0807fe');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/ckeditor/balloon-block.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('fbb9f5d0-4530-4384-b6e6-036f8752d323')): $__env->markAsRenderedOnce('fbb9f5d0-4530-4384-b6e6-036f8752d323');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/balloon-block-editor.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\deebo\Source\resources\views\components\base\balloon-block-editor\index.blade.php ENDPATH**/ ?>