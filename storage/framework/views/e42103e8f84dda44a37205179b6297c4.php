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

<?php if (! $__env->hasRenderedOnce('7b3606e5-2a12-484a-83a2-a90435b72c83')): $__env->markAsRenderedOnce('7b3606e5-2a12-484a-83a2-a90435b72c83');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/tippy.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('79f0db20-c2a8-4714-82e8-dfee7108ad90')): $__env->markAsRenderedOnce('79f0db20-c2a8-4714-82e8-dfee7108ad90');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/tippy.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('15396934-3184-48ed-b7af-ae4c63191ebb')): $__env->markAsRenderedOnce('15396934-3184-48ed-b7af-ae4c63191ebb');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/themes/rubick.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php echo $__env->make('../themes/base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\backup\Source\resources\views////themes/rubick/landing.blade.php ENDPATH**/ ?>