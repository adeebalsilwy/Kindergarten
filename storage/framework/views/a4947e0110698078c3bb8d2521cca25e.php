<div class="editor">
    <?php echo e($slot); ?>

</div>

<?php if (! $__env->hasRenderedOnce('2b5133cb-6f32-4b44-81b8-346c4cbcc21a')): $__env->markAsRenderedOnce('2b5133cb-6f32-4b44-81b8-346c4cbcc21a');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/ckeditor.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('23133ebb-faa7-4aef-a526-37110a12eb22')): $__env->markAsRenderedOnce('23133ebb-faa7-4aef-a526-37110a12eb22');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/ckeditor/balloon.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('15fac631-f496-4d88-8b47-858c60f69289')): $__env->markAsRenderedOnce('15fac631-f496-4d88-8b47-858c60f69289');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/balloon-editor.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH E:\backup\Source\resources\views\components\base\balloon-editor\index.blade.php ENDPATH**/ ?>