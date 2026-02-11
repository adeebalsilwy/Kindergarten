<div class="editor">
    <?php echo e($slot); ?>

</div>

<?php if (! $__env->hasRenderedOnce('536cb1ce-82ce-46cd-a764-43085edf0b4b')): $__env->markAsRenderedOnce('536cb1ce-82ce-46cd-a764-43085edf0b4b');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/ckeditor.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('48c5870a-db17-41ae-9ee9-463d05c15427')): $__env->markAsRenderedOnce('48c5870a-db17-41ae-9ee9-463d05c15427');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/ckeditor/balloon.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('563f875b-984c-4438-96aa-57fe8e5f89e7')): $__env->markAsRenderedOnce('563f875b-984c-4438-96aa-57fe8e5f89e7');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/balloon-editor.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH F:\my project\laravel\contract\Source\resources\views\components\base\balloon-editor\index.blade.php ENDPATH**/ ?>