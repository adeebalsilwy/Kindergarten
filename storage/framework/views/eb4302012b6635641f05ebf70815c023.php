<div class="editor document-editor">
    <div class="document-editor__toolbar"></div>
    <div class="document-editor__editable-container">
        <div class="document-editor__editable">
            <?php echo e($slot); ?>

        </div>
    </div>
</div>

<?php if (! $__env->hasRenderedOnce('3402f07a-a9de-4468-abe9-0e1dd08481ca')): $__env->markAsRenderedOnce('3402f07a-a9de-4468-abe9-0e1dd08481ca');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/ckeditor.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('7d882f8d-52ca-4fcc-98c9-52b1826a9000')): $__env->markAsRenderedOnce('7d882f8d-52ca-4fcc-98c9-52b1826a9000');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/ckeditor/document.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('c18ecde4-3faf-4ab8-a2c7-15e0f53c4812')): $__env->markAsRenderedOnce('c18ecde4-3faf-4ab8-a2c7-15e0f53c4812');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/document-editor.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH E:\backup\Source\resources\views\components\base\document-editor\index.blade.php ENDPATH**/ ?>