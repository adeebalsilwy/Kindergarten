

<?php $__env->startSection('head'); ?>
    <title><?php echo e(__('global.profile')); ?> - Kindergarten Management System</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
<div class="intro-y mt-8 flex items-center">
    <h2 class="mr-auto text-lg font-medium"><?php echo e(__('global.user_profile')); ?></h2>
</div>
<div class="grid grid-cols-12 gap-6">
    <!-- BEGIN: Profile Menu -->
    <div class="col-span-12 flex flex-col-reverse lg:col-span-4 lg:block 2xl:col-span-3">
        <div class="intro-y box mt-5">
            <div class="relative flex items-center p-5">
                <div class="image-fit h-12 w-12">
                    <img
                        class="rounded-full"
                        src="<?php echo e(Vite::asset('resources/images/profile-placeholder.jpg')); ?>"
                        alt="User Profile"
                        onerror="this.src='<?php echo e(Vite::asset('resources/images/avatar-default.png')); ?>';"
                    />
                </div>
                <div class="ml-4 mr-auto">
                    <div class="text-base font-medium">
                        <?php echo e($user->name); ?>

                    </div>
                    <div class="text-slate-500">
                        <?php if($user->roles->count() > 0): ?>
                            <?php echo e($user->roles->first()->name); ?>

                        <?php else: ?>
                            <?php echo e(__('global.no_role_assigned')); ?>

                        <?php endif; ?>
                    </div>
                </div>
                <?php if (isset($component)) { $__componentOriginal2d0351d0177fb7c133a6e2bbc4d48de3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2d0351d0177fb7c133a6e2bbc4d48de3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.items','data' => ['class' => 'w-56']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.items'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-56']); ?>
                        <?php if (isset($component)) { $__componentOriginalb00b4c41155366a81f8ca08d91bd0c58 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb00b4c41155366a81f8ca08d91bd0c58 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo e(__('global.options')); ?>  <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb00b4c41155366a81f8ca08d91bd0c58)): ?>
<?php $attributes = $__attributesOriginalb00b4c41155366a81f8ca08d91bd0c58; ?>
<?php unset($__attributesOriginalb00b4c41155366a81f8ca08d91bd0c58); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb00b4c41155366a81f8ca08d91bd0c58)): ?>
<?php $component = $__componentOriginalb00b4c41155366a81f8ca08d91bd0c58; ?>
<?php unset($__componentOriginalb00b4c41155366a81f8ca08d91bd0c58); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal56c3820e16ff422bae37ef63aae48d38 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56c3820e16ff422bae37ef63aae48d38 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.divider','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.divider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal56c3820e16ff422bae37ef63aae48d38)): ?>
<?php $attributes = $__attributesOriginal56c3820e16ff422bae37ef63aae48d38; ?>
<?php unset($__attributesOriginal56c3820e16ff422bae37ef63aae48d38); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal56c3820e16ff422bae37ef63aae48d38)): ?>
<?php $component = $__componentOriginal56c3820e16ff422bae37ef63aae48d38; ?>
<?php unset($__componentOriginal56c3820e16ff422bae37ef63aae48d38); ?>
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
                            <a href="<?php echo e(route('profile.edit')); ?>" class="flex items-center">
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'mr-2 h-4 w-4','icon' => 'Edit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-2 h-4 w-4','icon' => 'Edit']); ?>
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
                                <?php echo e(__('global.edit_profile')); ?>

                            </a>
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
                            <a href="<?php echo e(route('profile.change-password')); ?>" class="flex items-center">
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'mr-2 h-4 w-4','icon' => 'Lock']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-2 h-4 w-4','icon' => 'Lock']); ?>
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
                                <?php echo e(__('global.change_password')); ?>

                            </a>
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
                        <?php if (isset($component)) { $__componentOriginal56c3820e16ff422bae37ef63aae48d38 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56c3820e16ff422bae37ef63aae48d38 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.divider','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.divider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal56c3820e16ff422bae37ef63aae48d38)): ?>
<?php $attributes = $__attributesOriginal56c3820e16ff422bae37ef63aae48d38; ?>
<?php unset($__attributesOriginal56c3820e16ff422bae37ef63aae48d38); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal56c3820e16ff422bae37ef63aae48d38)): ?>
<?php $component = $__componentOriginal56c3820e16ff422bae37ef63aae48d38; ?>
<?php unset($__componentOriginal56c3820e16ff422bae37ef63aae48d38); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalee21acfcaea4540168864e36abb478ea = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalee21acfcaea4540168864e36abb478ea = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['class' => 'px-2 py-1','type' => 'button','variant' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'px-2 py-1','type' => 'button','variant' => 'primary']); ?>
                                <?php echo e(__('global.settings')); ?>

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
<?php if (isset($__attributesOriginalee21acfcaea4540168864e36abb478ea)): ?>
<?php $attributes = $__attributesOriginalee21acfcaea4540168864e36abb478ea; ?>
<?php unset($__attributesOriginalee21acfcaea4540168864e36abb478ea); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalee21acfcaea4540168864e36abb478ea)): ?>
<?php $component = $__componentOriginalee21acfcaea4540168864e36abb478ea; ?>
<?php unset($__componentOriginalee21acfcaea4540168864e36abb478ea); ?>
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
            <div class="border-t border-slate-200/60 p-5 dark:border-darkmode-400">
                <a
                    class="flex items-center <?php echo e(request()->routeIs('profile.index') ? 'font-medium text-primary' : ''); ?>"
                    href="<?php echo e(route('profile.index')); ?>"
                >
                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'mr-2 h-4 w-4','icon' => 'Activity']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-2 h-4 w-4','icon' => 'Activity']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> <?php echo e(__('global.personal_information')); ?>

                </a>
                <a
                    class="mt-5 flex items-center <?php echo e(request()->routeIs('profile.edit') ? 'font-medium text-primary' : ''); ?>"
                    href="<?php echo e(route('profile.edit')); ?>"
                >
                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'mr-2 h-4 w-4','icon' => 'Edit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-2 h-4 w-4','icon' => 'Edit']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> <?php echo e(__('global.edit_profile')); ?>

                </a>
                <a
                    class="mt-5 flex items-center <?php echo e(request()->routeIs('profile.change-password') ? 'font-medium text-primary' : ''); ?>"
                    href="<?php echo e(route('profile.change-password')); ?>"
                >
                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'mr-2 h-4 w-4','icon' => 'Lock']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-2 h-4 w-4','icon' => 'Lock']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> <?php echo e(__('global.change_password')); ?>

                </a>
            </div>
        </div>
    </div>
    <!-- END: Profile Menu -->
    <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
        <!-- BEGIN: Display Information -->
        <div class="intro-y box lg:mt-5">
            <div class="flex items-center border-b border-slate-200/60 p-5 dark:border-darkmode-400">
                <h2 class="mr-auto text-base font-medium">
                    <?php echo e(__('global.personal_information')); ?>

                </h2>
            </div>
            <div class="p-5">
                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible show mb-4 flex items-center" role="alert">
                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'CheckCircle','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'CheckCircle','class' => 'w-4 h-4 mr-2']); ?>
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
                        <?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close">
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'X','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'X','class' => 'w-4 h-4']); ?>
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
                        </button>
                    </div>
                <?php endif; ?>
                
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-12 sm:col-span-6">
                        <div class="mb-3">
                            <label class="form-label"><?php echo e(__('global.name')); ?></label>
                            <div class="form-control"><?php echo e($user->name); ?></div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <div class="mb-3">
                            <label class="form-label"><?php echo e(__('global.email')); ?></label>
                            <div class="form-control"><?php echo e($user->email); ?></div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <div class="mb-3">
                            <label class="form-label"><?php echo e(__('global.role')); ?></label>
                            <div class="form-control">
                                <?php if($user->roles->count() > 0): ?>
                                    <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="badge badge-primary"><?php echo e($role->name); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <?php echo e(__('global.no_role_assigned')); ?>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <div class="mb-3">
                            <label class="form-label"><?php echo e(__('global.joined_date')); ?></label>
                            <div class="form-control"><?php echo e($user->created_at->format('Y-m-d')); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Display Information -->
        
        <!-- BEGIN: Security Information -->
        <div class="intro-y box mt-5">
            <div class="flex items-center border-b border-slate-200/60 p-5 dark:border-darkmode-400">
                <h2 class="mr-auto text-base font-medium">
                    <?php echo e(__('global.security')); ?>

                </h2>
            </div>
            <div class="p-5">
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-12">
                        <div class="mb-3">
                            <label class="form-label"><?php echo e(__('global.last_login')); ?></label>
                            <div class="form-control">
                                <?php if(auth()->user()->last_login_at): ?>
                                    <?php echo e(auth()->user()->last_login_at->diffForHumans()); ?>

                                <?php else: ?>
                                    <?php echo e(__('global.never_logged_in')); ?>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12">
                        <a href="<?php echo e(route('profile.change-password')); ?>" class="btn btn-primary w-40">
                            <?php echo e(__('global.change_password')); ?>

                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Security Information -->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../themes/kindergarten/side-menu', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views\pages\profile.blade.php ENDPATH**/ ?>