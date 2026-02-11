<?php $__env->startSection('head'); ?>
    <?php echo $__env->yieldContent('subhead'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'rubick px-5 sm:px-8 py-10',
        "before:content-[''] before:bg-gradient-to-b before:from-theme-1 before:to-theme-2 dark:before:from-darkmode-800 dark:before:to-darkmode-800 before:fixed before:inset-0 before:z-[-1]",
    ]); ?>">
        <div class="min-h-screen">
            <?php echo $__env->yieldContent('subcontent'); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php if (! $__env->hasRenderedOnce('b56b8b2e-cf09-4625-a61d-cabad15c8ea3')): $__env->markAsRenderedOnce('b56b8b2e-cf09-4625-a61d-cabad15c8ea3');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/tippy.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('6e6c0056-adfd-497e-8ac2-ca9b73b617aa')): $__env->markAsRenderedOnce('6e6c0056-adfd-497e-8ac2-ca9b73b617aa');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/tippy.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('7d2b4fc5-adbc-405a-91b8-13073cd6f18a')): $__env->markAsRenderedOnce('7d2b4fc5-adbc-405a-91b8-13073cd6f18a');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/themes/rubick.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php echo $__env->make('../themes/base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views\themes\rubick\landing.blade.php ENDPATH**/ ?>