<div class="editor">
    <?php echo e($slot); ?>

</div>

<?php if (! $__env->hasRenderedOnce('972e143c-8c90-40c6-9bfe-567e3d6f057a')): $__env->markAsRenderedOnce('972e143c-8c90-40c6-9bfe-567e3d6f057a');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/ckeditor.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('9b621aa7-d1ce-4035-b2dd-77012a5495dc')): $__env->markAsRenderedOnce('9b621aa7-d1ce-4035-b2dd-77012a5495dc');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/ckeditor/inline.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('d86654cc-52f8-496e-b644-84aa7f0ef6b2')): $__env->markAsRenderedOnce('d86654cc-52f8-496e-b644-84aa7f0ef6b2');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/inline-editor.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH F:\my project\laravel\contract\Source\resources\views\components\base\inline-editor\index.blade.php ENDPATH**/ ?>