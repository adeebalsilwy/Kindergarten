<?php $__env->startSection('subhead'); ?>
    <title>Profile - Midone - Tailwind Admin Dashboard Template</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
    <div class="intro-y mt-8 flex items-center">
        <h2 class="mr-auto text-lg font-medium">Profile Layout</h2>
    </div>
    <?php if (isset($component)) { $__componentOriginal2576e1ee28be19bcb92b2de91bd433b9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2576e1ee28be19bcb92b2de91bd433b9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tab.group','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tab.group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <!-- BEGIN: Profile Info -->
        <div class="intro-y box mt-5 px-5 pt-5">
            <div class="-mx-5 flex flex-col border-b border-slate-200/60 pb-5 dark:border-darkmode-400 lg:flex-row">
                <div class="flex flex-1 items-center justify-center px-5 lg:justify-start">
                    <div class="image-fit relative h-20 w-20 flex-none sm:h-24 sm:w-24 lg:h-32 lg:w-32">
                        <img
                            class="rounded-full"
                            src="<?php echo e(Vite::asset($fakers[0]['photos'][0])); ?>"
                            alt="Midone - Tailwind Admin Dashboard Template"
                        />
                        <div
                            class="absolute bottom-0 right-0 mb-1 mr-1 flex items-center justify-center rounded-full bg-primary p-2">
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-4 w-4 text-white','icon' => 'Camera']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-4 w-4 text-white','icon' => 'Camera']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
                        </div>
                    </div>
                    <div class="ml-5">
                        <div class="w-24 truncate text-lg font-medium sm:w-40 sm:whitespace-normal">
                            <?php echo e($fakers[0]['users'][0]['name']); ?>

                        </div>
                        <div class="text-slate-500"><?php echo e($fakers[0]['jobs'][0]); ?></div>
                    </div>
                </div>
                <div
                    class="mt-6 flex-1 border-l border-r border-t border-slate-200/60 px-5 pt-5 dark:border-darkmode-400 lg:mt-0 lg:border-t-0 lg:pt-0">
                    <div class="text-center font-medium lg:mt-3 lg:text-left">
                        Contact Details
                    </div>
                    <div class="mt-4 flex flex-col items-center justify-center lg:items-start">
                        <div class="flex items-center truncate sm:whitespace-normal">
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'mr-2 h-4 w-4','icon' => 'Mail']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-2 h-4 w-4','icon' => 'Mail']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
                            <?php echo e($fakers[0]['users'][0]['email']); ?>

                        </div>
                        <div class="mt-3 flex items-center truncate sm:whitespace-normal">
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'mr-2 h-4 w-4','icon' => 'Instagram']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-2 h-4 w-4','icon' => 'Instagram']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> Instagram
                            <?php echo e($fakers[0]['users'][0]['name']); ?>

                        </div>
                        <div class="mt-3 flex items-center truncate sm:whitespace-normal">
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'mr-2 h-4 w-4','icon' => 'Twitter']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-2 h-4 w-4','icon' => 'Twitter']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> Twitter
                            <?php echo e($fakers[0]['users'][0]['name']); ?>

                        </div>
                    </div>
                </div>
                <div
                    class="mt-6 flex-1 border-t border-slate-200/60 px-5 pt-5 dark:border-darkmode-400 lg:mt-0 lg:border-0 lg:pt-0">
                    <div class="text-center font-medium lg:mt-5 lg:text-left">
                        Sales Growth
                    </div>
                    <div class="mt-2 flex items-center justify-center lg:justify-start">
                        <div class="mr-2 flex w-20">
                            USP:
                            <span class="ml-3 font-medium text-success">+23%</span>
                        </div>
                        <div class="w-3/4">
                            <?php if (isset($component)) { $__componentOriginaleb63e366b0c5e6fc19204c35d33dda3d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleb63e366b0c5e6fc19204c35d33dda3d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.simple-line-chart-1.index','data' => ['class' => '-mr-5','height' => 'h-[55px]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('simple-line-chart-1'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '-mr-5','height' => 'h-[55px]']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleb63e366b0c5e6fc19204c35d33dda3d)): ?>
<?php $attributes = $__attributesOriginaleb63e366b0c5e6fc19204c35d33dda3d; ?>
<?php unset($__attributesOriginaleb63e366b0c5e6fc19204c35d33dda3d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleb63e366b0c5e6fc19204c35d33dda3d)): ?>
<?php $component = $__componentOriginaleb63e366b0c5e6fc19204c35d33dda3d; ?>
<?php unset($__componentOriginaleb63e366b0c5e6fc19204c35d33dda3d); ?>
<?php endif; ?>
                        </div>
                    </div>
                    <div class="flex items-center justify-center lg:justify-start">
                        <div class="mr-2 flex w-20">
                            STP: <span class="ml-3 font-medium text-danger">-2%</span>
                        </div>
                        <div class="w-3/4">
                            <?php if (isset($component)) { $__componentOriginal75748a69dd57dcba9894dc9b4d3ea95d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal75748a69dd57dcba9894dc9b4d3ea95d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.simple-line-chart-2.index','data' => ['class' => '-mr-5','height' => 'h-[55px]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('simple-line-chart-2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '-mr-5','height' => 'h-[55px]']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal75748a69dd57dcba9894dc9b4d3ea95d)): ?>
<?php $attributes = $__attributesOriginal75748a69dd57dcba9894dc9b4d3ea95d; ?>
<?php unset($__attributesOriginal75748a69dd57dcba9894dc9b4d3ea95d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal75748a69dd57dcba9894dc9b4d3ea95d)): ?>
<?php $component = $__componentOriginal75748a69dd57dcba9894dc9b4d3ea95d; ?>
<?php unset($__componentOriginal75748a69dd57dcba9894dc9b4d3ea95d); ?>
<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (isset($component)) { $__componentOriginala58a3fae4dc0c776527239aa10ef32ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala58a3fae4dc0c776527239aa10ef32ab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tab.list','data' => ['class' => 'flex-col justify-center text-center sm:flex-row lg:justify-start','variant' => 'link-tabs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tab.list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'flex-col justify-center text-center sm:flex-row lg:justify-start','variant' => 'link-tabs']); ?>
                <?php if (isset($component)) { $__componentOriginalf959ee9fe5a767411e38d62f8ca1be47 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tab.index','data' => ['id' => 'dashboard-tab','fullWidth' => false,'selected' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'dashboard-tab','fullWidth' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'selected' => true]); ?>
                    <?php if (isset($component)) { $__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tab.button','data' => ['class' => 'cursor-pointer py-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tab.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'cursor-pointer py-4']); ?>Dashboard <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40)): ?>
<?php $attributes = $__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40; ?>
<?php unset($__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40)): ?>
<?php $component = $__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40; ?>
<?php unset($__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47)): ?>
<?php $attributes = $__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47; ?>
<?php unset($__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf959ee9fe5a767411e38d62f8ca1be47)): ?>
<?php $component = $__componentOriginalf959ee9fe5a767411e38d62f8ca1be47; ?>
<?php unset($__componentOriginalf959ee9fe5a767411e38d62f8ca1be47); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalf959ee9fe5a767411e38d62f8ca1be47 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tab.index','data' => ['id' => 'account-and-profile-tab','fullWidth' => false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'account-and-profile-tab','fullWidth' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
                    <?php if (isset($component)) { $__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tab.button','data' => ['class' => 'cursor-pointer py-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tab.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'cursor-pointer py-4']); ?>
                        Account & Profile
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40)): ?>
<?php $attributes = $__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40; ?>
<?php unset($__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40)): ?>
<?php $component = $__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40; ?>
<?php unset($__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47)): ?>
<?php $attributes = $__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47; ?>
<?php unset($__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf959ee9fe5a767411e38d62f8ca1be47)): ?>
<?php $component = $__componentOriginalf959ee9fe5a767411e38d62f8ca1be47; ?>
<?php unset($__componentOriginalf959ee9fe5a767411e38d62f8ca1be47); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalf959ee9fe5a767411e38d62f8ca1be47 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tab.index','data' => ['id' => 'activities-tab','fullWidth' => false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'activities-tab','fullWidth' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
                    <?php if (isset($component)) { $__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tab.button','data' => ['class' => 'cursor-pointer py-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tab.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'cursor-pointer py-4']); ?>
                        Activities
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40)): ?>
<?php $attributes = $__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40; ?>
<?php unset($__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40)): ?>
<?php $component = $__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40; ?>
<?php unset($__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47)): ?>
<?php $attributes = $__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47; ?>
<?php unset($__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf959ee9fe5a767411e38d62f8ca1be47)): ?>
<?php $component = $__componentOriginalf959ee9fe5a767411e38d62f8ca1be47; ?>
<?php unset($__componentOriginalf959ee9fe5a767411e38d62f8ca1be47); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalf959ee9fe5a767411e38d62f8ca1be47 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tab.index','data' => ['id' => 'tasks-tab','fullWidth' => false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tasks-tab','fullWidth' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
                    <?php if (isset($component)) { $__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tab.button','data' => ['class' => 'cursor-pointer py-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tab.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'cursor-pointer py-4']); ?>Tasks <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40)): ?>
<?php $attributes = $__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40; ?>
<?php unset($__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40)): ?>
<?php $component = $__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40; ?>
<?php unset($__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47)): ?>
<?php $attributes = $__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47; ?>
<?php unset($__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf959ee9fe5a767411e38d62f8ca1be47)): ?>
<?php $component = $__componentOriginalf959ee9fe5a767411e38d62f8ca1be47; ?>
<?php unset($__componentOriginalf959ee9fe5a767411e38d62f8ca1be47); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala58a3fae4dc0c776527239aa10ef32ab)): ?>
<?php $attributes = $__attributesOriginala58a3fae4dc0c776527239aa10ef32ab; ?>
<?php unset($__attributesOriginala58a3fae4dc0c776527239aa10ef32ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala58a3fae4dc0c776527239aa10ef32ab)): ?>
<?php $component = $__componentOriginala58a3fae4dc0c776527239aa10ef32ab; ?>
<?php unset($__componentOriginala58a3fae4dc0c776527239aa10ef32ab); ?>
<?php endif; ?>
        </div>
        <!-- END: Profile Info -->
        <?php if (isset($component)) { $__componentOriginal45da2fbbc8bced0c7fb6d718017fa8b9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal45da2fbbc8bced0c7fb6d718017fa8b9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tab.panels','data' => ['class' => 'intro-y mt-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tab.panels'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'intro-y mt-5']); ?>
            <?php if (isset($component)) { $__componentOriginaldfa33edc04489dcb0f4a13a890ee6121 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldfa33edc04489dcb0f4a13a890ee6121 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tab.panel','data' => ['id' => 'dashboard','selected' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tab.panel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'dashboard','selected' => true]); ?>
                <div class="grid grid-cols-12 gap-6">
                    <!-- BEGIN: Top Categories -->
                    <div class="intro-y box col-span-12 lg:col-span-6">
                        <div class="flex items-center border-b border-slate-200/60 p-5 dark:border-darkmode-400">
                            <h2 class="mr-auto text-base font-medium">
                                Top Categories
                            </h2>
                            <?php if (isset($component)) { $__componentOriginal2d0351d0177fb7c133a6e2bbc4d48de3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2d0351d0177fb7c133a6e2bbc4d48de3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.index','data' => ['class' => 'ml-auto']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-auto']); ?>
                                <?php if (isset($component)) { $__componentOriginalee790a68fb753a38af981253b3b3ce0d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalee790a68fb753a38af981253b3b3ce0d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.button','data' => ['class' => 'block h-5 w-5','href' => '#','tag' => 'a']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'block h-5 w-5','href' => '#','tag' => 'a']); ?>
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-5 w-5 text-slate-500','icon' => 'MoreHorizontal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-5 w-5 text-slate-500','icon' => 'MoreHorizontal']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalee790a68fb753a38af981253b3b3ce0d)): ?>
<?php $attributes = $__attributesOriginalee790a68fb753a38af981253b3b3ce0d; ?>
<?php unset($__attributesOriginalee790a68fb753a38af981253b3b3ce0d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalee790a68fb753a38af981253b3b3ce0d)): ?>
<?php $component = $__componentOriginalee790a68fb753a38af981253b3b3ce0d; ?>
<?php unset($__componentOriginalee790a68fb753a38af981253b3b3ce0d); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginalc2c5cf34ff0736adab9e02c67429c492 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2c5cf34ff0736adab9e02c67429c492 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.items','data' => ['class' => 'w-40']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.items'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-40']); ?>
                                    <?php if (isset($component)) { $__componentOriginalebbcd783000cea0f80b377611a7f2faa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalebbcd783000cea0f80b377611a7f2faa = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.item','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'mr-2 h-4 w-4','icon' => 'Plus']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-2 h-4 w-4','icon' => 'Plus']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> Add
                                        Category
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalebbcd783000cea0f80b377611a7f2faa)): ?>
<?php $attributes = $__attributesOriginalebbcd783000cea0f80b377611a7f2faa; ?>
<?php unset($__attributesOriginalebbcd783000cea0f80b377611a7f2faa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalebbcd783000cea0f80b377611a7f2faa)): ?>
<?php $component = $__componentOriginalebbcd783000cea0f80b377611a7f2faa; ?>
<?php unset($__componentOriginalebbcd783000cea0f80b377611a7f2faa); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalebbcd783000cea0f80b377611a7f2faa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalebbcd783000cea0f80b377611a7f2faa = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.item','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'mr-2 h-4 w-4','icon' => 'Settings']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-2 h-4 w-4','icon' => 'Settings']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
                                        Settings
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalebbcd783000cea0f80b377611a7f2faa)): ?>
<?php $attributes = $__attributesOriginalebbcd783000cea0f80b377611a7f2faa; ?>
<?php unset($__attributesOriginalebbcd783000cea0f80b377611a7f2faa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalebbcd783000cea0f80b377611a7f2faa)): ?>
<?php $component = $__componentOriginalebbcd783000cea0f80b377611a7f2faa; ?>
<?php unset($__componentOriginalebbcd783000cea0f80b377611a7f2faa); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2c5cf34ff0736adab9e02c67429c492)): ?>
<?php $attributes = $__attributesOriginalc2c5cf34ff0736adab9e02c67429c492; ?>
<?php unset($__attributesOriginalc2c5cf34ff0736adab9e02c67429c492); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2c5cf34ff0736adab9e02c67429c492)): ?>
<?php $component = $__componentOriginalc2c5cf34ff0736adab9e02c67429c492; ?>
<?php unset($__componentOriginalc2c5cf34ff0736adab9e02c67429c492); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2d0351d0177fb7c133a6e2bbc4d48de3)): ?>
<?php $attributes = $__attributesOriginal2d0351d0177fb7c133a6e2bbc4d48de3; ?>
<?php unset($__attributesOriginal2d0351d0177fb7c133a6e2bbc4d48de3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2d0351d0177fb7c133a6e2bbc4d48de3)): ?>
<?php $component = $__componentOriginal2d0351d0177fb7c133a6e2bbc4d48de3; ?>
<?php unset($__componentOriginal2d0351d0177fb7c133a6e2bbc4d48de3); ?>
<?php endif; ?>
                        </div>
                        <div class="p-5">
                            <div class="flex flex-col sm:flex-row">
                                <div class="mr-auto">
                                    <a
                                        class="font-medium"
                                        href=""
                                    >
                                        Wordpress Template
                                    </a>
                                    <div class="mt-1 text-slate-500">
                                        HTML, PHP, Mysql
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="-ml-2 mr-auto mt-5 w-32 sm:ml-0 sm:mr-5">
                                        <?php if (isset($component)) { $__componentOriginal92789e8445742dede56860fe8a3118da = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal92789e8445742dede56860fe8a3118da = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.simple-line-chart.index','data' => ['height' => 'h-[30px]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('simple-line-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['height' => 'h-[30px]']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal92789e8445742dede56860fe8a3118da)): ?>
<?php $attributes = $__attributesOriginal92789e8445742dede56860fe8a3118da; ?>
<?php unset($__attributesOriginal92789e8445742dede56860fe8a3118da); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal92789e8445742dede56860fe8a3118da)): ?>
<?php $component = $__componentOriginal92789e8445742dede56860fe8a3118da; ?>
<?php unset($__componentOriginal92789e8445742dede56860fe8a3118da); ?>
<?php endif; ?>
                                    </div>
                                    <div class="text-center">
                                        <div class="font-medium">6.5k</div>
                                        <div class="mt-1.5 rounded bg-success/20 px-2 text-success">
                                            +150
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 flex flex-col sm:flex-row">
                                <div class="mr-auto">
                                    <a
                                        class="font-medium"
                                        href=""
                                    >
                                        Bootstrap HTML Template
                                    </a>
                                    <div class="mt-1 text-slate-500">
                                        HTML, PHP, Mysql
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="-ml-2 mr-auto mt-5 w-32 sm:ml-0 sm:mr-5">
                                        <?php if (isset($component)) { $__componentOriginal92789e8445742dede56860fe8a3118da = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal92789e8445742dede56860fe8a3118da = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.simple-line-chart.index','data' => ['height' => 'h-[30px]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('simple-line-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['height' => 'h-[30px]']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal92789e8445742dede56860fe8a3118da)): ?>
<?php $attributes = $__attributesOriginal92789e8445742dede56860fe8a3118da; ?>
<?php unset($__attributesOriginal92789e8445742dede56860fe8a3118da); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal92789e8445742dede56860fe8a3118da)): ?>
<?php $component = $__componentOriginal92789e8445742dede56860fe8a3118da; ?>
<?php unset($__componentOriginal92789e8445742dede56860fe8a3118da); ?>
<?php endif; ?>
                                    </div>
                                    <div class="text-center">
                                        <div class="font-medium">2.5k</div>
                                        <div class="mt-1.5 rounded bg-pending/10 px-2 text-pending">
                                            +150
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 flex flex-col sm:flex-row">
                                <div class="mr-auto">
                                    <a
                                        class="font-medium"
                                        href=""
                                    >
                                        Tailwind HTML Template
                                    </a>
                                    <div class="mt-1 text-slate-500">
                                        HTML, PHP, Mysql
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="-ml-2 mr-auto mt-5 w-32 sm:ml-0 sm:mr-5">
                                        <?php if (isset($component)) { $__componentOriginal92789e8445742dede56860fe8a3118da = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal92789e8445742dede56860fe8a3118da = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.simple-line-chart.index','data' => ['height' => 'h-[30px]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('simple-line-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['height' => 'h-[30px]']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal92789e8445742dede56860fe8a3118da)): ?>
<?php $attributes = $__attributesOriginal92789e8445742dede56860fe8a3118da; ?>
<?php unset($__attributesOriginal92789e8445742dede56860fe8a3118da); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal92789e8445742dede56860fe8a3118da)): ?>
<?php $component = $__componentOriginal92789e8445742dede56860fe8a3118da; ?>
<?php unset($__componentOriginal92789e8445742dede56860fe8a3118da); ?>
<?php endif; ?>
                                    </div>
                                    <div class="text-center">
                                        <div class="font-medium">3.4k</div>
                                        <div class="mt-1.5 rounded bg-primary/10 px-2 text-primary">
                                            +150
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Top Categories -->
                    <!-- BEGIN: Work In Progress -->
                    <?php if (isset($component)) { $__componentOriginal2576e1ee28be19bcb92b2de91bd433b9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2576e1ee28be19bcb92b2de91bd433b9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tab.group','data' => ['class' => 'intro-y box col-span-12 lg:col-span-6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tab.group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'intro-y box col-span-12 lg:col-span-6']); ?>
                        <div
                            class="flex items-center border-b border-slate-200/60 px-5 py-5 dark:border-darkmode-400 sm:py-0">
                            <h2 class="mr-auto text-base font-medium">
                                Work In Progress
                            </h2>
                            <?php if (isset($component)) { $__componentOriginal2d0351d0177fb7c133a6e2bbc4d48de3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2d0351d0177fb7c133a6e2bbc4d48de3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.index','data' => ['class' => 'ml-auto sm:hidden']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-auto sm:hidden']); ?>
                                <?php if (isset($component)) { $__componentOriginalee790a68fb753a38af981253b3b3ce0d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalee790a68fb753a38af981253b3b3ce0d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.button','data' => ['class' => 'block h-5 w-5','href' => '#','tag' => 'a']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'block h-5 w-5','href' => '#','tag' => 'a']); ?>
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-5 w-5 text-slate-500','icon' => 'MoreHorizontal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-5 w-5 text-slate-500','icon' => 'MoreHorizontal']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalee790a68fb753a38af981253b3b3ce0d)): ?>
<?php $attributes = $__attributesOriginalee790a68fb753a38af981253b3b3ce0d; ?>
<?php unset($__attributesOriginalee790a68fb753a38af981253b3b3ce0d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalee790a68fb753a38af981253b3b3ce0d)): ?>
<?php $component = $__componentOriginalee790a68fb753a38af981253b3b3ce0d; ?>
<?php unset($__componentOriginalee790a68fb753a38af981253b3b3ce0d); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginalc2c5cf34ff0736adab9e02c67429c492 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2c5cf34ff0736adab9e02c67429c492 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.items','data' => ['class' => 'w-40']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.items'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-40']); ?>
                                    <?php if (isset($component)) { $__componentOriginalebbcd783000cea0f80b377611a7f2faa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalebbcd783000cea0f80b377611a7f2faa = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.item','data' => ['class' => 'w-full','id' => 'work-in-progress-mobile-new-tab','target' => 'work-in-progress-new','as' => 'x-base.tab.button','unstyled' => true,'selected' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full','id' => 'work-in-progress-mobile-new-tab','target' => 'work-in-progress-new','as' => 'x-base.tab.button','unstyled' => true,'selected' => true]); ?>
                                        New
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalebbcd783000cea0f80b377611a7f2faa)): ?>
<?php $attributes = $__attributesOriginalebbcd783000cea0f80b377611a7f2faa; ?>
<?php unset($__attributesOriginalebbcd783000cea0f80b377611a7f2faa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalebbcd783000cea0f80b377611a7f2faa)): ?>
<?php $component = $__componentOriginalebbcd783000cea0f80b377611a7f2faa; ?>
<?php unset($__componentOriginalebbcd783000cea0f80b377611a7f2faa); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalebbcd783000cea0f80b377611a7f2faa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalebbcd783000cea0f80b377611a7f2faa = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.item','data' => ['class' => 'w-full','id' => 'work-in-progress-mobile-last-week-tab','target' => 'work-in-progress-last-week','as' => 'x-base.tab.button','unstyled' => true,'selected' => false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full','id' => 'work-in-progress-mobile-last-week-tab','target' => 'work-in-progress-last-week','as' => 'x-base.tab.button','unstyled' => true,'selected' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
                                        Last Week
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalebbcd783000cea0f80b377611a7f2faa)): ?>
<?php $attributes = $__attributesOriginalebbcd783000cea0f80b377611a7f2faa; ?>
<?php unset($__attributesOriginalebbcd783000cea0f80b377611a7f2faa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalebbcd783000cea0f80b377611a7f2faa)): ?>
<?php $component = $__componentOriginalebbcd783000cea0f80b377611a7f2faa; ?>
<?php unset($__componentOriginalebbcd783000cea0f80b377611a7f2faa); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2c5cf34ff0736adab9e02c67429c492)): ?>
<?php $attributes = $__attributesOriginalc2c5cf34ff0736adab9e02c67429c492; ?>
<?php unset($__attributesOriginalc2c5cf34ff0736adab9e02c67429c492); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2c5cf34ff0736adab9e02c67429c492)): ?>
<?php $component = $__componentOriginalc2c5cf34ff0736adab9e02c67429c492; ?>
<?php unset($__componentOriginalc2c5cf34ff0736adab9e02c67429c492); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2d0351d0177fb7c133a6e2bbc4d48de3)): ?>
<?php $attributes = $__attributesOriginal2d0351d0177fb7c133a6e2bbc4d48de3; ?>
<?php unset($__attributesOriginal2d0351d0177fb7c133a6e2bbc4d48de3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2d0351d0177fb7c133a6e2bbc4d48de3)): ?>
<?php $component = $__componentOriginal2d0351d0177fb7c133a6e2bbc4d48de3; ?>
<?php unset($__componentOriginal2d0351d0177fb7c133a6e2bbc4d48de3); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginala58a3fae4dc0c776527239aa10ef32ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala58a3fae4dc0c776527239aa10ef32ab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tab.list','data' => ['class' => 'ml-auto hidden w-auto sm:flex','variant' => 'link-tabs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tab.list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-auto hidden w-auto sm:flex','variant' => 'link-tabs']); ?>
                                <?php if (isset($component)) { $__componentOriginalf959ee9fe5a767411e38d62f8ca1be47 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tab.index','data' => ['id' => 'work-in-progress-new-tab','fullWidth' => false,'selected' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'work-in-progress-new-tab','fullWidth' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'selected' => true]); ?>
                                    <?php if (isset($component)) { $__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tab.button','data' => ['class' => 'cursor-pointer py-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tab.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'cursor-pointer py-5']); ?>
                                        New
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40)): ?>
<?php $attributes = $__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40; ?>
<?php unset($__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40)): ?>
<?php $component = $__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40; ?>
<?php unset($__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47)): ?>
<?php $attributes = $__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47; ?>
<?php unset($__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf959ee9fe5a767411e38d62f8ca1be47)): ?>
<?php $component = $__componentOriginalf959ee9fe5a767411e38d62f8ca1be47; ?>
<?php unset($__componentOriginalf959ee9fe5a767411e38d62f8ca1be47); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginalf959ee9fe5a767411e38d62f8ca1be47 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tab.index','data' => ['id' => 'work-in-progress-last-week-tab','fullWidth' => false,'selected' => false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'work-in-progress-last-week-tab','fullWidth' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'selected' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
                                    <?php if (isset($component)) { $__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tab.button','data' => ['class' => 'cursor-pointer py-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tab.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'cursor-pointer py-5']); ?>
                                        Last Week
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40)): ?>
<?php $attributes = $__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40; ?>
<?php unset($__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40)): ?>
<?php $component = $__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40; ?>
<?php unset($__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47)): ?>
<?php $attributes = $__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47; ?>
<?php unset($__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf959ee9fe5a767411e38d62f8ca1be47)): ?>
<?php $component = $__componentOriginalf959ee9fe5a767411e38d62f8ca1be47; ?>
<?php unset($__componentOriginalf959ee9fe5a767411e38d62f8ca1be47); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala58a3fae4dc0c776527239aa10ef32ab)): ?>
<?php $attributes = $__attributesOriginala58a3fae4dc0c776527239aa10ef32ab; ?>
<?php unset($__attributesOriginala58a3fae4dc0c776527239aa10ef32ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala58a3fae4dc0c776527239aa10ef32ab)): ?>
<?php $component = $__componentOriginala58a3fae4dc0c776527239aa10ef32ab; ?>
<?php unset($__componentOriginala58a3fae4dc0c776527239aa10ef32ab); ?>
<?php endif; ?>
                        </div>
                        <div class="p-5">
                            <?php if (isset($component)) { $__componentOriginal45da2fbbc8bced0c7fb6d718017fa8b9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal45da2fbbc8bced0c7fb6d718017fa8b9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tab.panels','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tab.panels'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if (isset($component)) { $__componentOriginaldfa33edc04489dcb0f4a13a890ee6121 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldfa33edc04489dcb0f4a13a890ee6121 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tab.panel','data' => ['id' => 'work-in-progress-new','selected' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tab.panel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'work-in-progress-new','selected' => true]); ?>
                                    <div>
                                        <div class="flex">
                                            <div class="mr-auto">Pending Tasks</div>
                                            <div>20%</div>
                                        </div>
                                        <?php if (isset($component)) { $__componentOriginaldfd2212c8e647e10ddfc5c7b161025af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldfd2212c8e647e10ddfc5c7b161025af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.progress.index','data' => ['class' => 'mt-2 h-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.progress'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-2 h-1']); ?>
                                            <?php if (isset($component)) { $__componentOriginal45d7bf8d551a6d1d9f75fec57cee765c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal45d7bf8d551a6d1d9f75fec57cee765c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.progress.bar.index','data' => ['class' => 'w-1/2 bg-primary','role' => 'progressbar','ariaValuenow' => '0','ariaValuemin' => '0','ariaValuemax' => '100']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.progress.bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-1/2 bg-primary','role' => 'progressbar','aria-valuenow' => '0','aria-valuemin' => '0','aria-valuemax' => '100']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal45d7bf8d551a6d1d9f75fec57cee765c)): ?>
<?php $attributes = $__attributesOriginal45d7bf8d551a6d1d9f75fec57cee765c; ?>
<?php unset($__attributesOriginal45d7bf8d551a6d1d9f75fec57cee765c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45d7bf8d551a6d1d9f75fec57cee765c)): ?>
<?php $component = $__componentOriginal45d7bf8d551a6d1d9f75fec57cee765c; ?>
<?php unset($__componentOriginal45d7bf8d551a6d1d9f75fec57cee765c); ?>
<?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldfd2212c8e647e10ddfc5c7b161025af)): ?>
<?php $attributes = $__attributesOriginaldfd2212c8e647e10ddfc5c7b161025af; ?>
<?php unset($__attributesOriginaldfd2212c8e647e10ddfc5c7b161025af); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldfd2212c8e647e10ddfc5c7b161025af)): ?>
<?php $component = $__componentOriginaldfd2212c8e647e10ddfc5c7b161025af; ?>
<?php unset($__componentOriginaldfd2212c8e647e10ddfc5c7b161025af); ?>
<?php endif; ?>
                                    </div>
                                    <div class="mt-5">
                                        <div class="flex">
                                            <div class="mr-auto">Completed Tasks</div>
                                            <div>2 / 20</div>
                                        </div>
                                        <?php if (isset($component)) { $__componentOriginaldfd2212c8e647e10ddfc5c7b161025af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldfd2212c8e647e10ddfc5c7b161025af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.progress.index','data' => ['class' => 'mt-2 h-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.progress'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-2 h-1']); ?>
                                            <?php if (isset($component)) { $__componentOriginal45d7bf8d551a6d1d9f75fec57cee765c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal45d7bf8d551a6d1d9f75fec57cee765c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.progress.bar.index','data' => ['class' => 'w-1/4 bg-primary','role' => 'progressbar','ariaValuenow' => '0','ariaValuemin' => '0','ariaValuemax' => '100']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.progress.bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-1/4 bg-primary','role' => 'progressbar','aria-valuenow' => '0','aria-valuemin' => '0','aria-valuemax' => '100']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal45d7bf8d551a6d1d9f75fec57cee765c)): ?>
<?php $attributes = $__attributesOriginal45d7bf8d551a6d1d9f75fec57cee765c; ?>
<?php unset($__attributesOriginal45d7bf8d551a6d1d9f75fec57cee765c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45d7bf8d551a6d1d9f75fec57cee765c)): ?>
<?php $component = $__componentOriginal45d7bf8d551a6d1d9f75fec57cee765c; ?>
<?php unset($__componentOriginal45d7bf8d551a6d1d9f75fec57cee765c); ?>
<?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldfd2212c8e647e10ddfc5c7b161025af)): ?>
<?php $attributes = $__attributesOriginaldfd2212c8e647e10ddfc5c7b161025af; ?>
<?php unset($__attributesOriginaldfd2212c8e647e10ddfc5c7b161025af); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldfd2212c8e647e10ddfc5c7b161025af)): ?>
<?php $component = $__componentOriginaldfd2212c8e647e10ddfc5c7b161025af; ?>
<?php unset($__componentOriginaldfd2212c8e647e10ddfc5c7b161025af); ?>
<?php endif; ?>
                                    </div>
                                    <div class="mt-5">
                                        <div class="flex">
                                            <div class="mr-auto">Tasks In Progress</div>
                                            <div>42</div>
                                        </div>
                                        <?php if (isset($component)) { $__componentOriginaldfd2212c8e647e10ddfc5c7b161025af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldfd2212c8e647e10ddfc5c7b161025af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.progress.index','data' => ['class' => 'mt-2 h-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.progress'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-2 h-1']); ?>
                                            <?php if (isset($component)) { $__componentOriginal45d7bf8d551a6d1d9f75fec57cee765c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal45d7bf8d551a6d1d9f75fec57cee765c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.progress.bar.index','data' => ['class' => 'w-3/4 bg-primary','role' => 'progressbar','ariaValuenow' => '0','ariaValuemin' => '0','ariaValuemax' => '100']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.progress.bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3/4 bg-primary','role' => 'progressbar','aria-valuenow' => '0','aria-valuemin' => '0','aria-valuemax' => '100']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal45d7bf8d551a6d1d9f75fec57cee765c)): ?>
<?php $attributes = $__attributesOriginal45d7bf8d551a6d1d9f75fec57cee765c; ?>
<?php unset($__attributesOriginal45d7bf8d551a6d1d9f75fec57cee765c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45d7bf8d551a6d1d9f75fec57cee765c)): ?>
<?php $component = $__componentOriginal45d7bf8d551a6d1d9f75fec57cee765c; ?>
<?php unset($__componentOriginal45d7bf8d551a6d1d9f75fec57cee765c); ?>
<?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldfd2212c8e647e10ddfc5c7b161025af)): ?>
<?php $attributes = $__attributesOriginaldfd2212c8e647e10ddfc5c7b161025af; ?>
<?php unset($__attributesOriginaldfd2212c8e647e10ddfc5c7b161025af); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldfd2212c8e647e10ddfc5c7b161025af)): ?>
<?php $component = $__componentOriginaldfd2212c8e647e10ddfc5c7b161025af; ?>
<?php unset($__componentOriginaldfd2212c8e647e10ddfc5c7b161025af); ?>
<?php endif; ?>
                                    </div>
                                    <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['class' => 'mx-auto mt-5 block w-40','href' => '','as' => 'a','variant' => 'secondary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mx-auto mt-5 block w-40','href' => '','as' => 'a','variant' => 'secondary']); ?>
                                        View More Details
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
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldfa33edc04489dcb0f4a13a890ee6121)): ?>
<?php $attributes = $__attributesOriginaldfa33edc04489dcb0f4a13a890ee6121; ?>
<?php unset($__attributesOriginaldfa33edc04489dcb0f4a13a890ee6121); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldfa33edc04489dcb0f4a13a890ee6121)): ?>
<?php $component = $__componentOriginaldfa33edc04489dcb0f4a13a890ee6121; ?>
<?php unset($__componentOriginaldfa33edc04489dcb0f4a13a890ee6121); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal45da2fbbc8bced0c7fb6d718017fa8b9)): ?>
<?php $attributes = $__attributesOriginal45da2fbbc8bced0c7fb6d718017fa8b9; ?>
<?php unset($__attributesOriginal45da2fbbc8bced0c7fb6d718017fa8b9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45da2fbbc8bced0c7fb6d718017fa8b9)): ?>
<?php $component = $__componentOriginal45da2fbbc8bced0c7fb6d718017fa8b9; ?>
<?php unset($__componentOriginal45da2fbbc8bced0c7fb6d718017fa8b9); ?>
<?php endif; ?>
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2576e1ee28be19bcb92b2de91bd433b9)): ?>
<?php $attributes = $__attributesOriginal2576e1ee28be19bcb92b2de91bd433b9; ?>
<?php unset($__attributesOriginal2576e1ee28be19bcb92b2de91bd433b9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2576e1ee28be19bcb92b2de91bd433b9)): ?>
<?php $component = $__componentOriginal2576e1ee28be19bcb92b2de91bd433b9; ?>
<?php unset($__componentOriginal2576e1ee28be19bcb92b2de91bd433b9); ?>
<?php endif; ?>
                    <!-- END: Work In Progress -->
                    <!-- BEGIN: Daily Sales -->
                    <div class="intro-y box col-span-12 lg:col-span-6">
                        <div
                            class="flex items-center border-b border-slate-200/60 px-5 py-5 dark:border-darkmode-400 sm:py-3">
                            <h2 class="mr-auto text-base font-medium">Daily Sales</h2>
                            <?php if (isset($component)) { $__componentOriginal2d0351d0177fb7c133a6e2bbc4d48de3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2d0351d0177fb7c133a6e2bbc4d48de3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.index','data' => ['class' => 'ml-auto sm:hidden']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-auto sm:hidden']); ?>
                                <?php if (isset($component)) { $__componentOriginalee790a68fb753a38af981253b3b3ce0d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalee790a68fb753a38af981253b3b3ce0d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.button','data' => ['class' => 'block h-5 w-5','href' => '#','tag' => 'a']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'block h-5 w-5','href' => '#','tag' => 'a']); ?>
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-5 w-5 text-slate-500','icon' => 'MoreHorizontal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-5 w-5 text-slate-500','icon' => 'MoreHorizontal']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalee790a68fb753a38af981253b3b3ce0d)): ?>
<?php $attributes = $__attributesOriginalee790a68fb753a38af981253b3b3ce0d; ?>
<?php unset($__attributesOriginalee790a68fb753a38af981253b3b3ce0d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalee790a68fb753a38af981253b3b3ce0d)): ?>
<?php $component = $__componentOriginalee790a68fb753a38af981253b3b3ce0d; ?>
<?php unset($__componentOriginalee790a68fb753a38af981253b3b3ce0d); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginalc2c5cf34ff0736adab9e02c67429c492 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2c5cf34ff0736adab9e02c67429c492 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.items','data' => ['class' => 'w-40']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.items'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-40']); ?>
                                    <?php if (isset($component)) { $__componentOriginalebbcd783000cea0f80b377611a7f2faa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalebbcd783000cea0f80b377611a7f2faa = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.item','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'mr-2 h-4 w-4','icon' => 'File']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-2 h-4 w-4','icon' => 'File']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> Download
                                        Excel
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalebbcd783000cea0f80b377611a7f2faa)): ?>
<?php $attributes = $__attributesOriginalebbcd783000cea0f80b377611a7f2faa; ?>
<?php unset($__attributesOriginalebbcd783000cea0f80b377611a7f2faa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalebbcd783000cea0f80b377611a7f2faa)): ?>
<?php $component = $__componentOriginalebbcd783000cea0f80b377611a7f2faa; ?>
<?php unset($__componentOriginalebbcd783000cea0f80b377611a7f2faa); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2c5cf34ff0736adab9e02c67429c492)): ?>
<?php $attributes = $__attributesOriginalc2c5cf34ff0736adab9e02c67429c492; ?>
<?php unset($__attributesOriginalc2c5cf34ff0736adab9e02c67429c492); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2c5cf34ff0736adab9e02c67429c492)): ?>
<?php $component = $__componentOriginalc2c5cf34ff0736adab9e02c67429c492; ?>
<?php unset($__componentOriginalc2c5cf34ff0736adab9e02c67429c492); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2d0351d0177fb7c133a6e2bbc4d48de3)): ?>
<?php $attributes = $__attributesOriginal2d0351d0177fb7c133a6e2bbc4d48de3; ?>
<?php unset($__attributesOriginal2d0351d0177fb7c133a6e2bbc4d48de3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2d0351d0177fb7c133a6e2bbc4d48de3)): ?>
<?php $component = $__componentOriginal2d0351d0177fb7c133a6e2bbc4d48de3; ?>
<?php unset($__componentOriginal2d0351d0177fb7c133a6e2bbc4d48de3); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['class' => 'hidden sm:flex','variant' => 'outline-secondary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'hidden sm:flex','variant' => 'outline-secondary']); ?>
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'mr-2 h-4 w-4','icon' => 'File']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-2 h-4 w-4','icon' => 'File']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> Download
                                Excel
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
                        <div class="p-5">
                            <div class="relative flex items-center">
                                <div class="image-fit h-12 w-12 flex-none">
                                    <img
                                        class="rounded-full"
                                        src="<?php echo e(Vite::asset($fakers[0]['photos'][0])); ?>"
                                        alt="Midone - Tailwind Admin Dashboard Template"
                                    />
                                </div>
                                <div class="ml-4 mr-auto">
                                    <a
                                        class="font-medium"
                                        href=""
                                    >
                                        <?php echo e($fakers[0]['users'][0]['name']); ?>

                                    </a>
                                    <div class="mr-5 text-slate-500 sm:mr-5">
                                        Bootstrap 4 HTML Admin Template
                                    </div>
                                </div>
                                <div class="font-medium text-slate-600 dark:text-slate-500">
                                    +$19
                                </div>
                            </div>
                            <div class="relative mt-5 flex items-center">
                                <div class="image-fit h-12 w-12 flex-none">
                                    <img
                                        class="rounded-full"
                                        src="<?php echo e(Vite::asset($fakers[1]['photos'][0])); ?>"
                                        alt="Midone - Tailwind Admin Dashboard Template"
                                    />
                                </div>
                                <div class="ml-4 mr-auto">
                                    <a
                                        class="font-medium"
                                        href=""
                                    >
                                        <?php echo e($fakers[1]['users'][0]['name']); ?>

                                    </a>
                                    <div class="mr-5 text-slate-500 sm:mr-5">
                                        Tailwind Admin Dashboard Template
                                    </div>
                                </div>
                                <div class="font-medium text-slate-600 dark:text-slate-500">
                                    +$25
                                </div>
                            </div>
                            <div class="relative mt-5 flex items-center">
                                <div class="image-fit h-12 w-12 flex-none">
                                    <img
                                        class="rounded-full"
                                        src="<?php echo e(Vite::asset($fakers[2]['photos'][0])); ?>"
                                        alt="Midone - Tailwind Admin Dashboard Template"
                                    />
                                </div>
                                <div class="ml-4 mr-auto">
                                    <a
                                        class="font-medium"
                                        href=""
                                    >
                                        <?php echo e($fakers[2]['users'][0]['name']); ?>

                                    </a>
                                    <div class="mr-5 text-slate-500 sm:mr-5">
                                        Vuejs HTML Admin Template
                                    </div>
                                </div>
                                <div class="font-medium text-slate-600 dark:text-slate-500">
                                    +$21
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Daily Sales -->
                    <!-- BEGIN: Latest Tasks -->
                    <?php if (isset($component)) { $__componentOriginal2576e1ee28be19bcb92b2de91bd433b9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2576e1ee28be19bcb92b2de91bd433b9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tab.group','data' => ['class' => 'intro-y box col-span-12 lg:col-span-6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tab.group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'intro-y box col-span-12 lg:col-span-6']); ?>
                        <div
                            class="flex items-center border-b border-slate-200/60 px-5 py-5 dark:border-darkmode-400 sm:py-0">
                            <h2 class="mr-auto text-base font-medium">
                                Latest Tasks
                            </h2>
                            <?php if (isset($component)) { $__componentOriginal2d0351d0177fb7c133a6e2bbc4d48de3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2d0351d0177fb7c133a6e2bbc4d48de3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.index','data' => ['class' => 'ml-auto sm:hidden']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-auto sm:hidden']); ?>
                                <?php if (isset($component)) { $__componentOriginalee790a68fb753a38af981253b3b3ce0d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalee790a68fb753a38af981253b3b3ce0d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.button','data' => ['class' => 'block h-5 w-5','href' => '#','tag' => 'a']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'block h-5 w-5','href' => '#','tag' => 'a']); ?>
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-5 w-5 text-slate-500','icon' => 'MoreHorizontal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-5 w-5 text-slate-500','icon' => 'MoreHorizontal']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalee790a68fb753a38af981253b3b3ce0d)): ?>
<?php $attributes = $__attributesOriginalee790a68fb753a38af981253b3b3ce0d; ?>
<?php unset($__attributesOriginalee790a68fb753a38af981253b3b3ce0d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalee790a68fb753a38af981253b3b3ce0d)): ?>
<?php $component = $__componentOriginalee790a68fb753a38af981253b3b3ce0d; ?>
<?php unset($__componentOriginalee790a68fb753a38af981253b3b3ce0d); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginalc2c5cf34ff0736adab9e02c67429c492 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2c5cf34ff0736adab9e02c67429c492 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.items','data' => ['class' => 'w-40']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.items'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-40']); ?>
                                    <?php if (isset($component)) { $__componentOriginalebbcd783000cea0f80b377611a7f2faa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalebbcd783000cea0f80b377611a7f2faa = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.item','data' => ['class' => 'w-full','id' => 'latest-tasks-mobile-new-tab','target' => 'latest-tasks-new','as' => 'x-base.tab.button','unstyled' => true,'selected' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full','id' => 'latest-tasks-mobile-new-tab','target' => 'latest-tasks-new','as' => 'x-base.tab.button','unstyled' => true,'selected' => true]); ?>
                                        New
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalebbcd783000cea0f80b377611a7f2faa)): ?>
<?php $attributes = $__attributesOriginalebbcd783000cea0f80b377611a7f2faa; ?>
<?php unset($__attributesOriginalebbcd783000cea0f80b377611a7f2faa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalebbcd783000cea0f80b377611a7f2faa)): ?>
<?php $component = $__componentOriginalebbcd783000cea0f80b377611a7f2faa; ?>
<?php unset($__componentOriginalebbcd783000cea0f80b377611a7f2faa); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalebbcd783000cea0f80b377611a7f2faa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalebbcd783000cea0f80b377611a7f2faa = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.item','data' => ['class' => 'w-full','id' => 'latest-tasks-mobile-last-week-tab','target' => 'latest-tasks-last-week','as' => 'x-base.tab.button','unstyled' => true,'selected' => false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full','id' => 'latest-tasks-mobile-last-week-tab','target' => 'latest-tasks-last-week','as' => 'x-base.tab.button','unstyled' => true,'selected' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
                                        Last Week
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalebbcd783000cea0f80b377611a7f2faa)): ?>
<?php $attributes = $__attributesOriginalebbcd783000cea0f80b377611a7f2faa; ?>
<?php unset($__attributesOriginalebbcd783000cea0f80b377611a7f2faa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalebbcd783000cea0f80b377611a7f2faa)): ?>
<?php $component = $__componentOriginalebbcd783000cea0f80b377611a7f2faa; ?>
<?php unset($__componentOriginalebbcd783000cea0f80b377611a7f2faa); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2c5cf34ff0736adab9e02c67429c492)): ?>
<?php $attributes = $__attributesOriginalc2c5cf34ff0736adab9e02c67429c492; ?>
<?php unset($__attributesOriginalc2c5cf34ff0736adab9e02c67429c492); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2c5cf34ff0736adab9e02c67429c492)): ?>
<?php $component = $__componentOriginalc2c5cf34ff0736adab9e02c67429c492; ?>
<?php unset($__componentOriginalc2c5cf34ff0736adab9e02c67429c492); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2d0351d0177fb7c133a6e2bbc4d48de3)): ?>
<?php $attributes = $__attributesOriginal2d0351d0177fb7c133a6e2bbc4d48de3; ?>
<?php unset($__attributesOriginal2d0351d0177fb7c133a6e2bbc4d48de3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2d0351d0177fb7c133a6e2bbc4d48de3)): ?>
<?php $component = $__componentOriginal2d0351d0177fb7c133a6e2bbc4d48de3; ?>
<?php unset($__componentOriginal2d0351d0177fb7c133a6e2bbc4d48de3); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginala58a3fae4dc0c776527239aa10ef32ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala58a3fae4dc0c776527239aa10ef32ab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tab.list','data' => ['class' => 'ml-auto hidden w-auto sm:flex','variant' => 'link-tabs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tab.list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-auto hidden w-auto sm:flex','variant' => 'link-tabs']); ?>
                                <?php if (isset($component)) { $__componentOriginalf959ee9fe5a767411e38d62f8ca1be47 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tab.index','data' => ['id' => 'latest-tasks-new-tab','fullWidth' => false,'selected' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'latest-tasks-new-tab','fullWidth' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'selected' => true]); ?>
                                    <?php if (isset($component)) { $__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tab.button','data' => ['class' => 'cursor-pointer py-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tab.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'cursor-pointer py-5']); ?>
                                        New
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40)): ?>
<?php $attributes = $__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40; ?>
<?php unset($__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40)): ?>
<?php $component = $__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40; ?>
<?php unset($__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47)): ?>
<?php $attributes = $__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47; ?>
<?php unset($__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf959ee9fe5a767411e38d62f8ca1be47)): ?>
<?php $component = $__componentOriginalf959ee9fe5a767411e38d62f8ca1be47; ?>
<?php unset($__componentOriginalf959ee9fe5a767411e38d62f8ca1be47); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginalf959ee9fe5a767411e38d62f8ca1be47 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tab.index','data' => ['id' => 'latest-tasks-last-week-tab','fullWidth' => false,'selected' => false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'latest-tasks-last-week-tab','fullWidth' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'selected' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
                                    <?php if (isset($component)) { $__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tab.button','data' => ['class' => 'cursor-pointer py-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tab.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'cursor-pointer py-5']); ?>
                                        Last Week
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40)): ?>
<?php $attributes = $__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40; ?>
<?php unset($__attributesOriginal8c7c3d52781cfb8ca7ed98d2974aab40); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40)): ?>
<?php $component = $__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40; ?>
<?php unset($__componentOriginal8c7c3d52781cfb8ca7ed98d2974aab40); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47)): ?>
<?php $attributes = $__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47; ?>
<?php unset($__attributesOriginalf959ee9fe5a767411e38d62f8ca1be47); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf959ee9fe5a767411e38d62f8ca1be47)): ?>
<?php $component = $__componentOriginalf959ee9fe5a767411e38d62f8ca1be47; ?>
<?php unset($__componentOriginalf959ee9fe5a767411e38d62f8ca1be47); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala58a3fae4dc0c776527239aa10ef32ab)): ?>
<?php $attributes = $__attributesOriginala58a3fae4dc0c776527239aa10ef32ab; ?>
<?php unset($__attributesOriginala58a3fae4dc0c776527239aa10ef32ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala58a3fae4dc0c776527239aa10ef32ab)): ?>
<?php $component = $__componentOriginala58a3fae4dc0c776527239aa10ef32ab; ?>
<?php unset($__componentOriginala58a3fae4dc0c776527239aa10ef32ab); ?>
<?php endif; ?>
                        </div>
                        <div class="p-5">
                            <?php if (isset($component)) { $__componentOriginal45da2fbbc8bced0c7fb6d718017fa8b9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal45da2fbbc8bced0c7fb6d718017fa8b9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tab.panels','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tab.panels'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if (isset($component)) { $__componentOriginaldfa33edc04489dcb0f4a13a890ee6121 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldfa33edc04489dcb0f4a13a890ee6121 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tab.panel','data' => ['id' => 'latest-tasks-new','selected' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tab.panel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'latest-tasks-new','selected' => true]); ?>
                                    <div class="flex items-center">
                                        <div class="border-l-2 border-primary pl-4 dark:border-primary">
                                            <a
                                                class="font-medium"
                                                href=""
                                            >
                                                Create New Campaign
                                            </a>
                                            <div class="text-slate-500">10:00 AM</div>
                                        </div>
                                        <?php if (isset($component)) { $__componentOriginal0e9b1708c541f0772f542e0482be43cc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0e9b1708c541f0772f542e0482be43cc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-switch.index','data' => ['class' => 'ml-auto']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-switch'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-auto']); ?>
                                            <?php if (isset($component)) { $__componentOriginala545c0dc845886385891e9173fb8e250 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala545c0dc845886385891e9173fb8e250 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-switch.input','data' => ['type' => 'checkbox']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-switch.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'checkbox']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala545c0dc845886385891e9173fb8e250)): ?>
<?php $attributes = $__attributesOriginala545c0dc845886385891e9173fb8e250; ?>
<?php unset($__attributesOriginala545c0dc845886385891e9173fb8e250); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala545c0dc845886385891e9173fb8e250)): ?>
<?php $component = $__componentOriginala545c0dc845886385891e9173fb8e250; ?>
<?php unset($__componentOriginala545c0dc845886385891e9173fb8e250); ?>
<?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0e9b1708c541f0772f542e0482be43cc)): ?>
<?php $attributes = $__attributesOriginal0e9b1708c541f0772f542e0482be43cc; ?>
<?php unset($__attributesOriginal0e9b1708c541f0772f542e0482be43cc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0e9b1708c541f0772f542e0482be43cc)): ?>
<?php $component = $__componentOriginal0e9b1708c541f0772f542e0482be43cc; ?>
<?php unset($__componentOriginal0e9b1708c541f0772f542e0482be43cc); ?>
<?php endif; ?>
                                    </div>
                                    <div class="mt-5 flex items-center">
                                        <div class="border-l-2 border-primary pl-4 dark:border-primary">
                                            <a
                                                class="font-medium"
                                                href=""
                                            >
                                                Meeting With Client
                                            </a>
                                            <div class="text-slate-500">02:00 PM</div>
                                        </div>
                                        <?php if (isset($component)) { $__componentOriginal0e9b1708c541f0772f542e0482be43cc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0e9b1708c541f0772f542e0482be43cc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-switch.index','data' => ['class' => 'ml-auto']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-switch'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-auto']); ?>
                                            <?php if (isset($component)) { $__componentOriginala545c0dc845886385891e9173fb8e250 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala545c0dc845886385891e9173fb8e250 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-switch.input','data' => ['type' => 'checkbox']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-switch.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'checkbox']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala545c0dc845886385891e9173fb8e250)): ?>
<?php $attributes = $__attributesOriginala545c0dc845886385891e9173fb8e250; ?>
<?php unset($__attributesOriginala545c0dc845886385891e9173fb8e250); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala545c0dc845886385891e9173fb8e250)): ?>
<?php $component = $__componentOriginala545c0dc845886385891e9173fb8e250; ?>
<?php unset($__componentOriginala545c0dc845886385891e9173fb8e250); ?>
<?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0e9b1708c541f0772f542e0482be43cc)): ?>
<?php $attributes = $__attributesOriginal0e9b1708c541f0772f542e0482be43cc; ?>
<?php unset($__attributesOriginal0e9b1708c541f0772f542e0482be43cc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0e9b1708c541f0772f542e0482be43cc)): ?>
<?php $component = $__componentOriginal0e9b1708c541f0772f542e0482be43cc; ?>
<?php unset($__componentOriginal0e9b1708c541f0772f542e0482be43cc); ?>
<?php endif; ?>
                                    </div>
                                    <div class="mt-5 flex items-center">
                                        <div class="border-l-2 border-primary pl-4 dark:border-primary">
                                            <a
                                                class="font-medium"
                                                href=""
                                            >
                                                Create New Repository
                                            </a>
                                            <div class="text-slate-500">04:00 PM</div>
                                        </div>
                                        <?php if (isset($component)) { $__componentOriginal0e9b1708c541f0772f542e0482be43cc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0e9b1708c541f0772f542e0482be43cc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-switch.index','data' => ['class' => 'ml-auto']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-switch'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-auto']); ?>
                                            <?php if (isset($component)) { $__componentOriginala545c0dc845886385891e9173fb8e250 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala545c0dc845886385891e9173fb8e250 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-switch.input','data' => ['type' => 'checkbox']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-switch.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'checkbox']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala545c0dc845886385891e9173fb8e250)): ?>
<?php $attributes = $__attributesOriginala545c0dc845886385891e9173fb8e250; ?>
<?php unset($__attributesOriginala545c0dc845886385891e9173fb8e250); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala545c0dc845886385891e9173fb8e250)): ?>
<?php $component = $__componentOriginala545c0dc845886385891e9173fb8e250; ?>
<?php unset($__componentOriginala545c0dc845886385891e9173fb8e250); ?>
<?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0e9b1708c541f0772f542e0482be43cc)): ?>
<?php $attributes = $__attributesOriginal0e9b1708c541f0772f542e0482be43cc; ?>
<?php unset($__attributesOriginal0e9b1708c541f0772f542e0482be43cc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0e9b1708c541f0772f542e0482be43cc)): ?>
<?php $component = $__componentOriginal0e9b1708c541f0772f542e0482be43cc; ?>
<?php unset($__componentOriginal0e9b1708c541f0772f542e0482be43cc); ?>
<?php endif; ?>
                                    </div>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldfa33edc04489dcb0f4a13a890ee6121)): ?>
<?php $attributes = $__attributesOriginaldfa33edc04489dcb0f4a13a890ee6121; ?>
<?php unset($__attributesOriginaldfa33edc04489dcb0f4a13a890ee6121); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldfa33edc04489dcb0f4a13a890ee6121)): ?>
<?php $component = $__componentOriginaldfa33edc04489dcb0f4a13a890ee6121; ?>
<?php unset($__componentOriginaldfa33edc04489dcb0f4a13a890ee6121); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal45da2fbbc8bced0c7fb6d718017fa8b9)): ?>
<?php $attributes = $__attributesOriginal45da2fbbc8bced0c7fb6d718017fa8b9; ?>
<?php unset($__attributesOriginal45da2fbbc8bced0c7fb6d718017fa8b9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45da2fbbc8bced0c7fb6d718017fa8b9)): ?>
<?php $component = $__componentOriginal45da2fbbc8bced0c7fb6d718017fa8b9; ?>
<?php unset($__componentOriginal45da2fbbc8bced0c7fb6d718017fa8b9); ?>
<?php endif; ?>
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2576e1ee28be19bcb92b2de91bd433b9)): ?>
<?php $attributes = $__attributesOriginal2576e1ee28be19bcb92b2de91bd433b9; ?>
<?php unset($__attributesOriginal2576e1ee28be19bcb92b2de91bd433b9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2576e1ee28be19bcb92b2de91bd433b9)): ?>
<?php $component = $__componentOriginal2576e1ee28be19bcb92b2de91bd433b9; ?>
<?php unset($__componentOriginal2576e1ee28be19bcb92b2de91bd433b9); ?>
<?php endif; ?>
                    <!-- END: Latest Tasks -->
                    <!-- BEGIN: General Statistic -->
                    <div class="intro-y box col-span-12">
                        <div
                            class="flex items-center border-b border-slate-200/60 px-5 py-5 dark:border-darkmode-400 sm:py-3">
                            <h2 class="mr-auto text-base font-medium">
                                General Statistics
                            </h2>
                            <?php if (isset($component)) { $__componentOriginal2d0351d0177fb7c133a6e2bbc4d48de3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2d0351d0177fb7c133a6e2bbc4d48de3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.index','data' => ['class' => 'ml-auto sm:hidden']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-auto sm:hidden']); ?>
                                <?php if (isset($component)) { $__componentOriginalee790a68fb753a38af981253b3b3ce0d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalee790a68fb753a38af981253b3b3ce0d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.button','data' => ['class' => 'block h-5 w-5','href' => '#']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'block h-5 w-5','href' => '#']); ?>
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-5 w-5 text-slate-500','icon' => 'MoreHorizontal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-5 w-5 text-slate-500','icon' => 'MoreHorizontal']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalee790a68fb753a38af981253b3b3ce0d)): ?>
<?php $attributes = $__attributesOriginalee790a68fb753a38af981253b3b3ce0d; ?>
<?php unset($__attributesOriginalee790a68fb753a38af981253b3b3ce0d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalee790a68fb753a38af981253b3b3ce0d)): ?>
<?php $component = $__componentOriginalee790a68fb753a38af981253b3b3ce0d; ?>
<?php unset($__componentOriginalee790a68fb753a38af981253b3b3ce0d); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginalc2c5cf34ff0736adab9e02c67429c492 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2c5cf34ff0736adab9e02c67429c492 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.items','data' => ['class' => 'w-40']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.items'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-40']); ?>
                                    <?php if (isset($component)) { $__componentOriginalebbcd783000cea0f80b377611a7f2faa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalebbcd783000cea0f80b377611a7f2faa = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.item','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'mr-2 h-4 w-4','icon' => 'File']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-2 h-4 w-4','icon' => 'File']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> Download
                                        XML
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalebbcd783000cea0f80b377611a7f2faa)): ?>
<?php $attributes = $__attributesOriginalebbcd783000cea0f80b377611a7f2faa; ?>
<?php unset($__attributesOriginalebbcd783000cea0f80b377611a7f2faa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalebbcd783000cea0f80b377611a7f2faa)): ?>
<?php $component = $__componentOriginalebbcd783000cea0f80b377611a7f2faa; ?>
<?php unset($__componentOriginalebbcd783000cea0f80b377611a7f2faa); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2c5cf34ff0736adab9e02c67429c492)): ?>
<?php $attributes = $__attributesOriginalc2c5cf34ff0736adab9e02c67429c492; ?>
<?php unset($__attributesOriginalc2c5cf34ff0736adab9e02c67429c492); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2c5cf34ff0736adab9e02c67429c492)): ?>
<?php $component = $__componentOriginalc2c5cf34ff0736adab9e02c67429c492; ?>
<?php unset($__componentOriginalc2c5cf34ff0736adab9e02c67429c492); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2d0351d0177fb7c133a6e2bbc4d48de3)): ?>
<?php $attributes = $__attributesOriginal2d0351d0177fb7c133a6e2bbc4d48de3; ?>
<?php unset($__attributesOriginal2d0351d0177fb7c133a6e2bbc4d48de3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2d0351d0177fb7c133a6e2bbc4d48de3)): ?>
<?php $component = $__componentOriginal2d0351d0177fb7c133a6e2bbc4d48de3; ?>
<?php unset($__componentOriginal2d0351d0177fb7c133a6e2bbc4d48de3); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['class' => 'hidden sm:flex','variant' => 'outline-secondary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'hidden sm:flex','variant' => 'outline-secondary']); ?>
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'mr-2 h-4 w-4','icon' => 'File']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-2 h-4 w-4','icon' => 'File']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> Download XML
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
                        <div class="grid grid-cols-1 gap-6 p-5 2xl:grid-cols-7">
                            <div class="2xl:col-span-2">
                                <div class="grid grid-cols-2 gap-6">
                                    <div class="box col-span-2 p-5 dark:bg-darkmode-500 sm:col-span-1 2xl:col-span-2">
                                        <div class="font-medium">Net Worth</div>
                                        <div class="mt-1 flex items-center sm:mt-0">
                                            <div class="mr-4 flex w-20">
                                                USP:
                                                <span class="ml-3 font-medium text-success">
                                                    +23%
                                                </span>
                                            </div>
                                            <div class="w-5/6 overflow-auto">
                                                <?php if (isset($component)) { $__componentOriginal92789e8445742dede56860fe8a3118da = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal92789e8445742dede56860fe8a3118da = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.simple-line-chart.index','data' => ['height' => 'h-[51px]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('simple-line-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['height' => 'h-[51px]']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal92789e8445742dede56860fe8a3118da)): ?>
<?php $attributes = $__attributesOriginal92789e8445742dede56860fe8a3118da; ?>
<?php unset($__attributesOriginal92789e8445742dede56860fe8a3118da); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal92789e8445742dede56860fe8a3118da)): ?>
<?php $component = $__componentOriginal92789e8445742dede56860fe8a3118da; ?>
<?php unset($__componentOriginal92789e8445742dede56860fe8a3118da); ?>
<?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box col-span-2 p-5 dark:bg-darkmode-500 sm:col-span-1 2xl:col-span-2">
                                        <div class="font-medium">Sales</div>
                                        <div class="mt-1 flex items-center sm:mt-0">
                                            <div class="mr-4 flex w-20">
                                                USP:
                                                <span class="ml-3 font-medium text-danger">
                                                    -5%
                                                </span>
                                            </div>
                                            <div class="w-5/6 overflow-auto">
                                                <?php if (isset($component)) { $__componentOriginal92789e8445742dede56860fe8a3118da = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal92789e8445742dede56860fe8a3118da = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.simple-line-chart.index','data' => ['height' => 'h-[51px]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('simple-line-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['height' => 'h-[51px]']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal92789e8445742dede56860fe8a3118da)): ?>
<?php $attributes = $__attributesOriginal92789e8445742dede56860fe8a3118da; ?>
<?php unset($__attributesOriginal92789e8445742dede56860fe8a3118da); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal92789e8445742dede56860fe8a3118da)): ?>
<?php $component = $__componentOriginal92789e8445742dede56860fe8a3118da; ?>
<?php unset($__componentOriginal92789e8445742dede56860fe8a3118da); ?>
<?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box col-span-2 p-5 dark:bg-darkmode-500 sm:col-span-1 2xl:col-span-2">
                                        <div class="font-medium">Profit</div>
                                        <div class="mt-1 flex items-center sm:mt-0">
                                            <div class="mr-4 flex w-20">
                                                USP:
                                                <span class="ml-3 font-medium text-danger">
                                                    -10%
                                                </span>
                                            </div>
                                            <div class="w-5/6 overflow-auto">
                                                <?php if (isset($component)) { $__componentOriginal92789e8445742dede56860fe8a3118da = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal92789e8445742dede56860fe8a3118da = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.simple-line-chart.index','data' => ['height' => 'h-[51px]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('simple-line-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['height' => 'h-[51px]']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal92789e8445742dede56860fe8a3118da)): ?>
<?php $attributes = $__attributesOriginal92789e8445742dede56860fe8a3118da; ?>
<?php unset($__attributesOriginal92789e8445742dede56860fe8a3118da); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal92789e8445742dede56860fe8a3118da)): ?>
<?php $component = $__componentOriginal92789e8445742dede56860fe8a3118da; ?>
<?php unset($__componentOriginal92789e8445742dede56860fe8a3118da); ?>
<?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box col-span-2 p-5 dark:bg-darkmode-500 sm:col-span-1 2xl:col-span-2">
                                        <div class="font-medium">Products</div>
                                        <div class="mt-1 flex items-center sm:mt-0">
                                            <div class="mr-4 flex w-20">
                                                USP:
                                                <span class="ml-3 font-medium text-success">
                                                    +55%
                                                </span>
                                            </div>
                                            <div class="w-5/6 overflow-auto">
                                                <?php if (isset($component)) { $__componentOriginal92789e8445742dede56860fe8a3118da = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal92789e8445742dede56860fe8a3118da = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.simple-line-chart.index','data' => ['height' => 'h-[51px]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('simple-line-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['height' => 'h-[51px]']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal92789e8445742dede56860fe8a3118da)): ?>
<?php $attributes = $__attributesOriginal92789e8445742dede56860fe8a3118da; ?>
<?php unset($__attributesOriginal92789e8445742dede56860fe8a3118da); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal92789e8445742dede56860fe8a3118da)): ?>
<?php $component = $__componentOriginal92789e8445742dede56860fe8a3118da; ?>
<?php unset($__componentOriginal92789e8445742dede56860fe8a3118da); ?>
<?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full 2xl:col-span-5">
                                <div class="mt-8 flex justify-center">
                                    <div class="mr-5 flex items-center">
                                        <div class="mr-3 h-2 w-2 rounded-full bg-primary"></div>
                                        <span>Product Profit</span>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="mr-3 h-2 w-2 rounded-full bg-slate-300"></div>
                                        <span>Author Sales</span>
                                    </div>
                                </div>
                                <div class="mt-8">
                                    <?php if (isset($component)) { $__componentOriginal457ea326de3abd2108f80834051c1f80 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal457ea326de3abd2108f80834051c1f80 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.stacked-bar-chart-1.index','data' => ['height' => 'h-[420px]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('stacked-bar-chart-1'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['height' => 'h-[420px]']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal457ea326de3abd2108f80834051c1f80)): ?>
<?php $attributes = $__attributesOriginal457ea326de3abd2108f80834051c1f80; ?>
<?php unset($__attributesOriginal457ea326de3abd2108f80834051c1f80); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal457ea326de3abd2108f80834051c1f80)): ?>
<?php $component = $__componentOriginal457ea326de3abd2108f80834051c1f80; ?>
<?php unset($__componentOriginal457ea326de3abd2108f80834051c1f80); ?>
<?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: General Statistic -->
                </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldfa33edc04489dcb0f4a13a890ee6121)): ?>
<?php $attributes = $__attributesOriginaldfa33edc04489dcb0f4a13a890ee6121; ?>
<?php unset($__attributesOriginaldfa33edc04489dcb0f4a13a890ee6121); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldfa33edc04489dcb0f4a13a890ee6121)): ?>
<?php $component = $__componentOriginaldfa33edc04489dcb0f4a13a890ee6121; ?>
<?php unset($__componentOriginaldfa33edc04489dcb0f4a13a890ee6121); ?>
<?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal45da2fbbc8bced0c7fb6d718017fa8b9)): ?>
<?php $attributes = $__attributesOriginal45da2fbbc8bced0c7fb6d718017fa8b9; ?>
<?php unset($__attributesOriginal45da2fbbc8bced0c7fb6d718017fa8b9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45da2fbbc8bced0c7fb6d718017fa8b9)): ?>
<?php $component = $__componentOriginal45da2fbbc8bced0c7fb6d718017fa8b9; ?>
<?php unset($__componentOriginal45da2fbbc8bced0c7fb6d718017fa8b9); ?>
<?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2576e1ee28be19bcb92b2de91bd433b9)): ?>
<?php $attributes = $__attributesOriginal2576e1ee28be19bcb92b2de91bd433b9; ?>
<?php unset($__attributesOriginal2576e1ee28be19bcb92b2de91bd433b9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2576e1ee28be19bcb92b2de91bd433b9)): ?>
<?php $component = $__componentOriginal2576e1ee28be19bcb92b2de91bd433b9; ?>
<?php unset($__componentOriginal2576e1ee28be19bcb92b2de91bd433b9); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../themes/' . $activeTheme . '/' . $activeLayout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views\pages\profile-overview-1.blade.php ENDPATH**/ ?>