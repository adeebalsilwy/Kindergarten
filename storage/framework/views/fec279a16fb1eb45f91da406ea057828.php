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

<?php if (! $__env->hasRenderedOnce('e5fe739e-0f62-4fe1-b8f2-9f025a783dfe')): $__env->markAsRenderedOnce('e5fe739e-0f62-4fe1-b8f2-9f025a783dfe');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/tippy.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('9ccd1077-2a33-41e1-bb9a-12fdf15d2019')): $__env->markAsRenderedOnce('9ccd1077-2a33-41e1-bb9a-12fdf15d2019');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/tippy.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('c88d2a1b-2e26-4a99-a117-ab486e0f683b')): $__env->markAsRenderedOnce('c88d2a1b-2e26-4a99-a117-ab486e0f683b');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/themes/rubick.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php echo $__env->make('../themes/base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/resources/views////themes/rubick/landing.blade.php ENDPATH**/ ?>