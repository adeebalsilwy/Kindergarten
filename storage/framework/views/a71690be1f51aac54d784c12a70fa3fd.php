<?php $__env->startSection('head'); ?>
    <title>Error Page - Midone - Tailwind Admin Dashboard Template</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="py-2 bg-gradient-to-b from-theme-1 to-theme-2 dark:from-darkmode-800 dark:to-darkmode-800">
        <div class="container">
            <!-- BEGIN: Error Page -->
            <div class="flex flex-col items-center justify-center h-screen text-center error-page lg:flex-row lg:text-left">
                <div class="-intro-x lg:mr-20">
                    <img
                        class="h-48 w-[450px] lg:h-auto"
                        src="<?php echo e(Vite::asset('resources/images/error-illustration.svg')); ?>"
                        alt="Midone - Tailwind Admin Dashboard Template"
                    />
                </div>
                <div class="mt-10 text-white lg:mt-0">
                    <div class="font-medium intro-x text-8xl">404</div>
                    <div class="mt-5 text-xl font-medium intro-x lg:text-3xl">
                        Oops. This page has gone missing.
                    </div>
                    <div class="mt-3 text-lg intro-x">
                        You may have mistyped the address or the page may have moved.
                    </div>
                    <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['class' => 'px-4 py-3 mt-10 text-white border-white intro-x dark:border-darkmode-400 dark:text-slate-200']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'px-4 py-3 mt-10 text-white border-white intro-x dark:border-darkmode-400 dark:text-slate-200']); ?>
                        Back to Home
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale00eb601fbe667f0da582732d70c41c5)): ?>
<?php $attributes = $__attributesOriginale00eb601fbe667f0da582732d70c41c5; ?>
<?php unset($__attributesOriginale00eb601fbe667f0da582732d70c41c5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale00eb601fbe667f0da582732d70c41c5)): ?>
<?php $component = $__componentOriginale00eb601fbe667f0da582732d70c41c5; ?>
<?php unset($__componentOriginale00eb601fbe667f0da582732d70c41c5); ?>
<?php endif; ?>
                </div>
            </div>
            <!-- END: Error Page -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../themes/base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views\pages\error-page.blade.php ENDPATH**/ ?>