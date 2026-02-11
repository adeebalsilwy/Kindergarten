<div class="editor">
    <?php echo e($slot); ?>

</div>

<?php if (! $__env->hasRenderedOnce('df9b7955-4b7b-4be3-9f73-48194ad199cc')): $__env->markAsRenderedOnce('df9b7955-4b7b-4be3-9f73-48194ad199cc');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/ckeditor.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('2da9eca5-d188-483f-8064-5c3f95fdd943')): $__env->markAsRenderedOnce('2da9eca5-d188-483f-8064-5c3f95fdd943');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/ckeditor/balloon.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('4d3a8e00-91d6-4c85-abee-080dad058bf1')): $__env->markAsRenderedOnce('4d3a8e00-91d6-4c85-abee-080dad058bf1');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/balloon-editor.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\deebo\Source\resources\views\components\base\balloon-editor\index.blade.php ENDPATH**/ ?>