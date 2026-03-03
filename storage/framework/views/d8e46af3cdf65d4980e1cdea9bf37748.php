<div class="editor">
    <?php echo e($slot); ?>

</div>

<?php if (! $__env->hasRenderedOnce('ac6e647d-4a58-4de0-bc6b-6c115d183cda')): $__env->markAsRenderedOnce('ac6e647d-4a58-4de0-bc6b-6c115d183cda');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/ckeditor.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('86344bbd-8958-4d17-a59d-2a05a2ab3e03')): $__env->markAsRenderedOnce('86344bbd-8958-4d17-a59d-2a05a2ab3e03');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/ckeditor/balloon-block.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('c2575362-bf89-46cd-9305-932f313d9644')): $__env->markAsRenderedOnce('c2575362-bf89-46cd-9305-932f313d9644');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/balloon-block-editor.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH E:\backup\Source\resources\views\components\base\balloon-block-editor\index.blade.php ENDPATH**/ ?>