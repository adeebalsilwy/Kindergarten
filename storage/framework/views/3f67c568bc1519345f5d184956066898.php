<div class="editor">
    <?php echo e($slot); ?>

</div>

<?php if (! $__env->hasRenderedOnce('604cb785-4f72-41b7-94db-ca968960a6d8')): $__env->markAsRenderedOnce('604cb785-4f72-41b7-94db-ca968960a6d8');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/ckeditor.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('6912daff-dddf-47a2-8dfa-bc77394ad4f0')): $__env->markAsRenderedOnce('6912daff-dddf-47a2-8dfa-bc77394ad4f0');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/ckeditor/inline.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('356d0f63-c07a-415f-afef-39ffcb2b9838')): $__env->markAsRenderedOnce('356d0f63-c07a-415f-afef-39ffcb2b9838');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/inline-editor.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH E:\backup\Source\resources\views\components\base\inline-editor\index.blade.php ENDPATH**/ ?>