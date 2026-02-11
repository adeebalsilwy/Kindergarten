<div class="editor">
    <?php echo e($slot); ?>

</div>

<?php if (! $__env->hasRenderedOnce('a596762b-59e5-4e54-a625-601d2d0ad605')): $__env->markAsRenderedOnce('a596762b-59e5-4e54-a625-601d2d0ad605');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/ckeditor.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('68c80b67-528c-4663-9c91-db182df628bd')): $__env->markAsRenderedOnce('68c80b67-528c-4663-9c91-db182df628bd');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/ckeditor/classic.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('2a633028-bfe7-40e3-a9ce-cd7fa5047eec')): $__env->markAsRenderedOnce('2a633028-bfe7-40e3-a9ce-cd7fa5047eec');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/classic-editor.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH F:\my project\laravel\contract\Source\resources\views\components\base\classic-editor\index.blade.php ENDPATH**/ ?>