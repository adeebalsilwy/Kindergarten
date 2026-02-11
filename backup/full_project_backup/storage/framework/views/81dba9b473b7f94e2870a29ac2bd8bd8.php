<div class="editor document-editor">
    <div class="document-editor__toolbar"></div>
    <div class="document-editor__editable-container">
        <div class="document-editor__editable">
            <?php echo e($slot); ?>

        </div>
    </div>
</div>

<?php if (! $__env->hasRenderedOnce('2e492478-95fb-4099-979f-2016a0988af6')): $__env->markAsRenderedOnce('2e492478-95fb-4099-979f-2016a0988af6');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/ckeditor.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('8b59bd90-9c88-4c4c-8829-2f0d0eff19fd')): $__env->markAsRenderedOnce('8b59bd90-9c88-4c4c-8829-2f0d0eff19fd');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/ckeditor/document.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('ae789ddc-57e6-4786-a885-3ecdda444a4b')): $__env->markAsRenderedOnce('ae789ddc-57e6-4786-a885-3ecdda444a4b');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/document-editor.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\deebo\Source\resources\views\components\base\document-editor\index.blade.php ENDPATH**/ ?>