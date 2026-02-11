<div class="editor">
    <?php echo e($slot); ?>

</div>

<?php if (! $__env->hasRenderedOnce('386bb2c5-04b8-4d9f-8f70-8e73b3288b6b')): $__env->markAsRenderedOnce('386bb2c5-04b8-4d9f-8f70-8e73b3288b6b');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/ckeditor.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('e88ff782-be98-497c-be96-53a43ea0de1f')): $__env->markAsRenderedOnce('e88ff782-be98-497c-be96-53a43ea0de1f');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/ckeditor/classic.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('90cd74cf-e687-4b79-93fc-f55c3c89d63e')): $__env->markAsRenderedOnce('90cd74cf-e687-4b79-93fc-f55c3c89d63e');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/classic-editor.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\deebo\Source\resources\views\components\base\classic-editor\index.blade.php ENDPATH**/ ?>