<div class="editor">
    <?php echo e($slot); ?>

</div>

<?php if (! $__env->hasRenderedOnce('90a5d22a-8dd8-4bea-a9ca-6240f8282a57')): $__env->markAsRenderedOnce('90a5d22a-8dd8-4bea-a9ca-6240f8282a57');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/ckeditor.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('94451c52-93e5-41c6-bd8f-3aef5bad2233')): $__env->markAsRenderedOnce('94451c52-93e5-41c6-bd8f-3aef5bad2233');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/ckeditor/inline.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('c7b7bd13-bf29-4097-974d-03c60851414a')): $__env->markAsRenderedOnce('c7b7bd13-bf29-4097-974d-03c60851414a');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/inline-editor.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\deebo\Source\resources\views\components\base\inline-editor\index.blade.php ENDPATH**/ ?>