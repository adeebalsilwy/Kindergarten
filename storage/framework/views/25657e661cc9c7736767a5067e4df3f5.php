<div class="editor">
    <?php echo e($slot); ?>

</div>

<?php if (! $__env->hasRenderedOnce('65eb0454-a618-44b6-87e2-4742bb38e152')): $__env->markAsRenderedOnce('65eb0454-a618-44b6-87e2-4742bb38e152');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/ckeditor.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('cdad520b-f3ec-42c8-8328-977729a753f8')): $__env->markAsRenderedOnce('cdad520b-f3ec-42c8-8328-977729a753f8');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/ckeditor/classic.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('9996b6f8-f668-4a5a-902c-862a1d441aae')): $__env->markAsRenderedOnce('9996b6f8-f668-4a5a-902c-862a1d441aae');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/classic-editor.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH E:\backup\Source\resources\views\components\base\classic-editor\index.blade.php ENDPATH**/ ?>