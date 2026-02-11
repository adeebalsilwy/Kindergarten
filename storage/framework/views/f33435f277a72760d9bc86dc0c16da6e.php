<?php $__env->startSection('head'); ?>
    <?php echo $__env->yieldContent('subhead'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'kindergarten px-5 sm:px-8 py-10',
        "before:content-[''] before:bg-gradient-to-b before:from-theme-1 before:to-theme-2 dark:before:from-darkmode-800 dark:before:to-darkmode-800 before:fixed before:inset-0 before:z-[-1]",
    ]); ?>">
        <div class="min-h-screen">
            <?php echo $__env->yieldContent('subcontent'); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php if (! $__env->hasRenderedOnce('783e051e-8b46-4806-90ba-c7b071233376')): $__env->markAsRenderedOnce('783e051e-8b46-4806-90ba-c7b071233376');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/tippy.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('35cf56e8-0674-4ed4-967e-de1132e19b0c')): $__env->markAsRenderedOnce('35cf56e8-0674-4ed4-967e-de1132e19b0c');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/tippy.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('9786b597-1b48-4afc-a237-7e65530464ee')): $__env->markAsRenderedOnce('9786b597-1b48-4afc-a237-7e65530464ee');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/themes/kindergarten.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php echo $__env->make('../themes/base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views\themes\kindergarten\landing.blade.php ENDPATH**/ ?>