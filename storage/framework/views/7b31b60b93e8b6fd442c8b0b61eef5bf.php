<div class="editor document-editor">
    <div class="document-editor__toolbar"></div>
    <div class="document-editor__editable-container">
        <div class="document-editor__editable">
            <?php echo e($slot); ?>

        </div>
    </div>
</div>

<?php if (! $__env->hasRenderedOnce('cf658572-f9ea-4186-9a6b-2db1cee1c870')): $__env->markAsRenderedOnce('cf658572-f9ea-4186-9a6b-2db1cee1c870');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/ckeditor.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('58d217a0-764b-4488-9bb9-db60218544bb')): $__env->markAsRenderedOnce('58d217a0-764b-4488-9bb9-db60218544bb');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/ckeditor/document.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('0a712916-4f22-4321-be02-72136de8913c')): $__env->markAsRenderedOnce('0a712916-4f22-4321-be02-72136de8913c');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/document-editor.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH F:\my project\laravel\contract\Source\resources\views\components\base\document-editor\index.blade.php ENDPATH**/ ?>