

<?php $__env->startSection('head'); ?>
    <?php echo $__env->yieldContent('subhead'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'kindergarten px-5 sm:px-8 py-5',
        "before:content-[''] before:bg-gradient-to-b before:from-pink-300 before:to-blue-300 dark:before:from-purple-900 dark:before:to-indigo-900 before:fixed before:inset-0 before:z-[-1]",
    ]); ?>">
        <?php if (isset($component)) { $__componentOriginal382ffb4e125af6203213609160accaa9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal382ffb4e125af6203213609160accaa9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.mobile-menu.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('mobile-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal382ffb4e125af6203213609160accaa9)): ?>
<?php $attributes = $__attributesOriginal382ffb4e125af6203213609160accaa9; ?>
<?php unset($__attributesOriginal382ffb4e125af6203213609160accaa9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal382ffb4e125af6203213609160accaa9)): ?>
<?php $component = $__componentOriginal382ffb4e125af6203213609160accaa9; ?>
<?php unset($__componentOriginal382ffb4e125af6203213609160accaa9); ?>
<?php endif; ?>
        <!-- BEGIN: Top Bar -->
        <div class="-mx-5 mb-10 mt-[2.2rem] border-b border-white/[0.08] px-3 pt-3 sm:-mx-8 sm:px-8 md:-mt-5 md:pt-0">
            <div class="relative z-[51] flex h-[70px] items-center">
                <!-- BEGIN: Logo -->
                <a
                    class="-intro-x hidden md:flex items-center"
                    href="<?php echo e(route('dashboard-overview-1')); ?>"
                >
                    <img
                        class="w-8"
                        src="<?php echo e(Vite::asset('resources/images/logo.svg')); ?>"
                        alt="Kindergarten Management System"
                    />
                    <span class="ml-3 text-lg font-bold text-white"> 
                        <span class="text-yellow-300">Kids</span>
                        <span class="text-green-300">Care</span>
                    </span>
                </a>
                <!-- END: Logo -->
                <!-- BEGIN: Breadcrumb -->
                <?php if (isset($component)) { $__componentOriginal76c1defe5d8e39ccf7b575dd368106ce = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal76c1defe5d8e39ccf7b575dd368106ce = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.breadcrumb.index','data' => ['class' => '-intro-x mr-auto h-full border-white/[0.08] md:ml-10 md:border-l md:pl-10','light' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '-intro-x mr-auto h-full border-white/[0.08] md:ml-10 md:border-l md:pl-10','light' => true]); ?>
                    <?php if (isset($component)) { $__componentOriginal9359b4b05858cf6b64b838ed277822e3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9359b4b05858cf6b64b838ed277822e3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.breadcrumb.link','data' => ['index' => 0]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.breadcrumb.link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['index' => 0]); ?><?php echo e(__('global.kindergarten')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9359b4b05858cf6b64b838ed277822e3)): ?>
<?php $attributes = $__attributesOriginal9359b4b05858cf6b64b838ed277822e3; ?>
<?php unset($__attributesOriginal9359b4b05858cf6b64b838ed277822e3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9359b4b05858cf6b64b838ed277822e3)): ?>
<?php $component = $__componentOriginal9359b4b05858cf6b64b838ed277822e3; ?>
<?php unset($__componentOriginal9359b4b05858cf6b64b838ed277822e3); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal9359b4b05858cf6b64b838ed277822e3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9359b4b05858cf6b64b838ed277822e3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.breadcrumb.link','data' => ['index' => 1,'active' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.breadcrumb.link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['index' => 1,'active' => true]); ?>
                        <?php echo e(__('global.dashboard')); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9359b4b05858cf6b64b838ed277822e3)): ?>
<?php $attributes = $__attributesOriginal9359b4b05858cf6b64b838ed277822e3; ?>
<?php unset($__attributesOriginal9359b4b05858cf6b64b838ed277822e3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9359b4b05858cf6b64b838ed277822e3)): ?>
<?php $component = $__componentOriginal9359b4b05858cf6b64b838ed277822e3; ?>
<?php unset($__componentOriginal9359b4b05858cf6b64b838ed277822e3); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal76c1defe5d8e39ccf7b575dd368106ce)): ?>
<?php $attributes = $__attributesOriginal76c1defe5d8e39ccf7b575dd368106ce; ?>
<?php unset($__attributesOriginal76c1defe5d8e39ccf7b575dd368106ce); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal76c1defe5d8e39ccf7b575dd368106ce)): ?>
<?php $component = $__componentOriginal76c1defe5d8e39ccf7b575dd368106ce; ?>
<?php unset($__componentOriginal76c1defe5d8e39ccf7b575dd368106ce); ?>
<?php endif; ?>
                <!-- END: Breadcrumb -->
                <!-- BEGIN: Search -->
                <div class="search intro-x relative mr-3 sm:mr-6">
                    <div class="hidden sm:block">
                        <?php if (isset($component)) { $__componentOriginal40054831fd8fc1521987609af4b37cc0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40054831fd8fc1521987609af4b37cc0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-input.index','data' => ['class' => 'w-56 rounded-full border-transparent bg-white/20 pr-8 shadow-none transition-[width] duration-300 ease-in-out focus:w-72 focus:border-transparent dark:bg-darkmode-400/70','type' => 'text','placeholder' => ''.e(__('global.search')).'...']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-56 rounded-full border-transparent bg-white/20 pr-8 shadow-none transition-[width] duration-300 ease-in-out focus:w-72 focus:border-transparent dark:bg-darkmode-400/70','type' => 'text','placeholder' => ''.e(__('global.search')).'...']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal40054831fd8fc1521987609af4b37cc0)): ?>
<?php $attributes = $__attributesOriginal40054831fd8fc1521987609af4b37cc0; ?>
<?php unset($__attributesOriginal40054831fd8fc1521987609af4b37cc0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal40054831fd8fc1521987609af4b37cc0)): ?>
<?php $component = $__componentOriginal40054831fd8fc1521987609af4b37cc0; ?>
<?php unset($__componentOriginal40054831fd8fc1521987609af4b37cc0); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'absolute inset-y-0 right-0 my-auto mr-3 h-5 w-5 text-white/70 dark:text-slate-300','icon' => 'Search']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'absolute inset-y-0 right-0 my-auto mr-3 h-5 w-5 text-white/70 dark:text-slate-300','icon' => 'Search']); ?>
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
                    <a
                        class="relative text-white/70 sm:hidden"
                        href=""
                    >
                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-5 w-5 dark:text-slate-300','icon' => 'Search']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-5 w-5 dark:text-slate-300','icon' => 'Search']); ?>
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
                    </a>
                    <?php if (isset($component)) { $__componentOriginalf680044c1842e049a2fe070d6973c7e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf680044c1842e049a2fe070d6973c7e9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.transition.index','data' => ['class' => 'search-result absolute right-0 z-10 mt-[3px] hidden','selector' => '.show','enter' => 'transition-all ease-linear duration-150','enterFrom' => 'mt-5 invisible opacity-0 translate-y-1','enterTo' => 'mt-[3px] visible opacity-100 translate-y-0','leave' => 'transition-all ease-linear duration-150','leaveFrom' => 'mt-[3px] visible opacity-100 translate-y-0','leaveTo' => 'mt-5 invisible opacity-0 translate-y-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.transition'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'search-result absolute right-0 z-10 mt-[3px] hidden','selector' => '.show','enter' => 'transition-all ease-linear duration-150','enterFrom' => 'mt-5 invisible opacity-0 translate-y-1','enterTo' => 'mt-[3px] visible opacity-100 translate-y-0','leave' => 'transition-all ease-linear duration-150','leaveFrom' => 'mt-[3px] visible opacity-100 translate-y-0','leaveTo' => 'mt-5 invisible opacity-0 translate-y-1']); ?>
                        <div class="box w-[450px] p-5 bg-white/90 backdrop-blur">
                            <div class="mb-2 font-medium"><?php echo e(__('global.pages')); ?></div>
                            <div class="mb-5">
                                <a
                                    class="flex items-center"
                                    href="<?php echo e(route('children.index')); ?>"
                                >
                                    <div
                                        class="flex h-8 w-8 items-center justify-center rounded-full bg-green-500/20 text-green-600">
                                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-4 w-4','icon' => 'Users']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-4 w-4','icon' => 'Users']); ?>
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
                                    <div class="ml-3"><?php echo e(__('global.children')); ?></div>
                                </a>
                                <a
                                    class="mt-2 flex items-center"
                                    href="<?php echo e(route('teachers.index')); ?>"
                                >
                                    <div
                                        class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-500/20 text-blue-600">
                                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-4 w-4','icon' => 'User']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-4 w-4','icon' => 'User']); ?>
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
                                    <div class="ml-3"><?php echo e(__('global.teachers')); ?></div>
                                </a>
                                <a
                                    class="mt-2 flex items-center"
                                    href="<?php echo e(route('finance.dashboard')); ?>"
                                >
                                    <div
                                        class="flex h-8 w-8 items-center justify-center rounded-full bg-yellow-500/20 text-yellow-600">
                                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-4 w-4','icon' => 'CreditCard']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-4 w-4','icon' => 'CreditCard']); ?>
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
                                    <div class="ml-3"><?php echo e(__('global.financial_reports')); ?></div>
                                </a>
                            </div>
                            <div class="mb-2 font-medium"><?php echo e(__('global.quick_actions')); ?></div>
                            <div class="mb-5">
                                <a
                                    class="mt-2 flex items-center"
                                    href="<?php echo e(route('attendance.index')); ?>"
                                >
                                    <div class="image-fit h-8 w-8">
                                        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-purple-500/20 text-purple-600">
                                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-4 w-4','icon' => 'Calendar']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-4 w-4','icon' => 'Calendar']); ?>
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
                                    <div class="ml-3"><?php echo e(__('global.attendance')); ?></div>
                                </a>
                                <a
                                    class="mt-2 flex items-center"
                                    href="<?php echo e(route('payments.index')); ?>"
                                >
                                    <div class="image-fit h-8 w-8">
                                        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-red-500/20 text-red-600">
                                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-4 w-4','icon' => 'DollarSign']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-4 w-4','icon' => 'DollarSign']); ?>
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
                                    <div class="ml-3"><?php echo e(__('global.payments')); ?></div>
                                </a>
                            </div>
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf680044c1842e049a2fe070d6973c7e9)): ?>
<?php $attributes = $__attributesOriginalf680044c1842e049a2fe070d6973c7e9; ?>
<?php unset($__attributesOriginalf680044c1842e049a2fe070d6973c7e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf680044c1842e049a2fe070d6973c7e9)): ?>
<?php $component = $__componentOriginalf680044c1842e049a2fe070d6973c7e9; ?>
<?php unset($__componentOriginalf680044c1842e049a2fe070d6973c7e9); ?>
<?php endif; ?>
                </div>
                <!-- END: Search -->
                <!-- BEGIN: Language Switcher -->
                <div class="intro-x mr-4 sm:mr-6">
                    <?php if (isset($component)) { $__componentOriginal7f18f43b3d2bacb563c64f2b49c801bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7f18f43b3d2bacb563c64f2b49c801bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.dropdown.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <?php if (isset($component)) { $__componentOriginalba58e9a4a9c2e9003cffbe68273c0c5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba58e9a4a9c2e9003cffbe68273c0c5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.dropdown.button','data' => ['class' => 'flex items-center text-white/90']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.dropdown.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'flex items-center text-white/90']); ?>
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-5 w-5 mr-1','icon' => 'Globe']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-5 w-5 mr-1','icon' => 'Globe']); ?>
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
                            <?php echo e(app()->getLocale() == 'ar' ? 'AR' : 'EN'); ?>

                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-4 w-4 ml-1','icon' => 'ChevronDown']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-4 w-4 ml-1','icon' => 'ChevronDown']); ?>
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
<?php if (isset($__attributesOriginalba58e9a4a9c2e9003cffbe68273c0c5f)): ?>
<?php $attributes = $__attributesOriginalba58e9a4a9c2e9003cffbe68273c0c5f; ?>
<?php unset($__attributesOriginalba58e9a4a9c2e9003cffbe68273c0c5f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalba58e9a4a9c2e9003cffbe68273c0c5f)): ?>
<?php $component = $__componentOriginalba58e9a4a9c2e9003cffbe68273c0c5f; ?>
<?php unset($__componentOriginalba58e9a4a9c2e9003cffbe68273c0c5f); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal49e4d5b30f37c24695afd5f914cb6d2f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49e4d5b30f37c24695afd5f914cb6d2f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.dropdown.menu','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.dropdown.menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <?php if (isset($component)) { $__componentOriginal52d72b5ee0d0e59719e77d4bcc160573 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal52d72b5ee0d0e59719e77d4bcc160573 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.dropdown.content','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.dropdown.content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if (isset($component)) { $__componentOriginal94c7f5da0e5ac8d371ca91de24cd83b0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal94c7f5da0e5ac8d371ca91de24cd83b0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.dropdown.item','data' => ['href' => ''.e(route('locale.switch', 'en')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('locale.switch', 'en')).'']); ?>
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-4 w-4 mr-2','icon' => 'Globe']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-4 w-4 mr-2','icon' => 'Globe']); ?>
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
                                    English
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal94c7f5da0e5ac8d371ca91de24cd83b0)): ?>
<?php $attributes = $__attributesOriginal94c7f5da0e5ac8d371ca91de24cd83b0; ?>
<?php unset($__attributesOriginal94c7f5da0e5ac8d371ca91de24cd83b0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal94c7f5da0e5ac8d371ca91de24cd83b0)): ?>
<?php $component = $__componentOriginal94c7f5da0e5ac8d371ca91de24cd83b0; ?>
<?php unset($__componentOriginal94c7f5da0e5ac8d371ca91de24cd83b0); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginal94c7f5da0e5ac8d371ca91de24cd83b0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal94c7f5da0e5ac8d371ca91de24cd83b0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.dropdown.item','data' => ['href' => ''.e(route('locale.switch', 'ar')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('locale.switch', 'ar')).'']); ?>
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-4 w-4 mr-2','icon' => 'Globe']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-4 w-4 mr-2','icon' => 'Globe']); ?>
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
                                    العربية
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal94c7f5da0e5ac8d371ca91de24cd83b0)): ?>
<?php $attributes = $__attributesOriginal94c7f5da0e5ac8d371ca91de24cd83b0; ?>
<?php unset($__attributesOriginal94c7f5da0e5ac8d371ca91de24cd83b0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal94c7f5da0e5ac8d371ca91de24cd83b0)): ?>
<?php $component = $__componentOriginal94c7f5da0e5ac8d371ca91de24cd83b0; ?>
<?php unset($__componentOriginal94c7f5da0e5ac8d371ca91de24cd83b0); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal52d72b5ee0d0e59719e77d4bcc160573)): ?>
<?php $attributes = $__attributesOriginal52d72b5ee0d0e59719e77d4bcc160573; ?>
<?php unset($__attributesOriginal52d72b5ee0d0e59719e77d4bcc160573); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal52d72b5ee0d0e59719e77d4bcc160573)): ?>
<?php $component = $__componentOriginal52d72b5ee0d0e59719e77d4bcc160573; ?>
<?php unset($__componentOriginal52d72b5ee0d0e59719e77d4bcc160573); ?>
<?php endif; ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49e4d5b30f37c24695afd5f914cb6d2f)): ?>
<?php $attributes = $__attributesOriginal49e4d5b30f37c24695afd5f914cb6d2f; ?>
<?php unset($__attributesOriginal49e4d5b30f37c24695afd5f914cb6d2f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49e4d5b30f37c24695afd5f914cb6d2f)): ?>
<?php $component = $__componentOriginal49e4d5b30f37c24695afd5f914cb6d2f; ?>
<?php unset($__componentOriginal49e4d5b30f37c24695afd5f914cb6d2f); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7f18f43b3d2bacb563c64f2b49c801bc)): ?>
<?php $attributes = $__attributesOriginal7f18f43b3d2bacb563c64f2b49c801bc; ?>
<?php unset($__attributesOriginal7f18f43b3d2bacb563c64f2b49c801bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7f18f43b3d2bacb563c64f2b49c801bc)): ?>
<?php $component = $__componentOriginal7f18f43b3d2bacb563c64f2b49c801bc; ?>
<?php unset($__componentOriginal7f18f43b3d2bacb563c64f2b49c801bc); ?>
<?php endif; ?>
                </div>
                <!-- END: Language Switcher -->
                <!-- BEGIN: Notifications -->
                <?php if (isset($component)) { $__componentOriginale20ed82c418469896d8832ea04767a66 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale20ed82c418469896d8832ea04767a66 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.popover.index','data' => ['class' => 'intro-x mr-4 sm:mr-6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.popover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'intro-x mr-4 sm:mr-6']); ?>
                    <?php if (isset($component)) { $__componentOriginalce53004ad8bce630a08e3ec702a279ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce53004ad8bce630a08e3ec702a279ab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.popover.button','data' => ['class' => 'relative block text-white/70 outline-none before:absolute before:right-0 before:top-[-2px] before:h-[8px] before:w-[8px] before:rounded-full before:bg-danger before:content-[\'\']']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.popover.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'relative block text-white/70 outline-none before:absolute before:right-0 before:top-[-2px] before:h-[8px] before:w-[8px] before:rounded-full before:bg-danger before:content-[\'\']']); ?>
                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-5 w-5 dark:text-slate-300','icon' => 'Bell']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-5 w-5 dark:text-slate-300','icon' => 'Bell']); ?>
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
<?php if (isset($__attributesOriginalce53004ad8bce630a08e3ec702a279ab)): ?>
<?php $attributes = $__attributesOriginalce53004ad8bce630a08e3ec702a279ab; ?>
<?php unset($__attributesOriginalce53004ad8bce630a08e3ec702a279ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce53004ad8bce630a08e3ec702a279ab)): ?>
<?php $component = $__componentOriginalce53004ad8bce630a08e3ec702a279ab; ?>
<?php unset($__componentOriginalce53004ad8bce630a08e3ec702a279ab); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal2dd4bcc6b9a50576b67c27a9fed722b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2dd4bcc6b9a50576b67c27a9fed722b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.popover.panel','data' => ['class' => 'mt-2 w-[280px] p-5 sm:w-[350px] bg-white/90 backdrop-blur']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.popover.panel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-2 w-[280px] p-5 sm:w-[350px] bg-white/90 backdrop-blur']); ?>
                        <div class="mb-5 font-medium"><?php echo e(__('global.notifications')); ?></div>
                        <div class="cursor-pointer relative flex items-center mt-2">
                            <div class="image-fit relative mr-1 h-10 w-10 flex-none">
                                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-green-500/20 text-green-600">
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-5 w-5','icon' => 'UserPlus']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-5 w-5','icon' => 'UserPlus']); ?>
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
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <div class="mr-5 truncate font-medium">
                                        <?php echo e(__('global.new_student_enrolled')); ?>

                                    </div>
                                </div>
                                <div class="mt-0.5 w-full truncate text-slate-600">
                                    <?php echo e(__('global.student_joined_today')); ?>

                                </div>
                            </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-3">
                            <div class="image-fit relative mr-1 h-10 w-10 flex-none">
                                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-yellow-500/20 text-yellow-600">
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-5 w-5','icon' => 'DollarSign']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-5 w-5','icon' => 'DollarSign']); ?>
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
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <div class="mr-5 truncate font-medium">
                                        <?php echo e(__('global.payment_received')); ?>

                                    </div>
                                </div>
                                <div class="mt-0.5 w-full truncate text-slate-600">
                                    <?php echo e(__('global.new_payment_recorded')); ?>

                                </div>
                            </div>
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2dd4bcc6b9a50576b67c27a9fed722b8)): ?>
<?php $attributes = $__attributesOriginal2dd4bcc6b9a50576b67c27a9fed722b8; ?>
<?php unset($__attributesOriginal2dd4bcc6b9a50576b67c27a9fed722b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2dd4bcc6b9a50576b67c27a9fed722b8)): ?>
<?php $component = $__componentOriginal2dd4bcc6b9a50576b67c27a9fed722b8; ?>
<?php unset($__componentOriginal2dd4bcc6b9a50576b67c27a9fed722b8); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale20ed82c418469896d8832ea04767a66)): ?>
<?php $attributes = $__attributesOriginale20ed82c418469896d8832ea04767a66; ?>
<?php unset($__attributesOriginale20ed82c418469896d8832ea04767a66); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale20ed82c418469896d8832ea04767a66)): ?>
<?php $component = $__componentOriginale20ed82c418469896d8832ea04767a66; ?>
<?php unset($__componentOriginale20ed82c418469896d8832ea04767a66); ?>
<?php endif; ?>
                <!-- END: Notifications -->
                <!-- BEGIN: Account Menu -->
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.button','data' => ['class' => 'image-fit zoom-in intro-x block h-8 w-8 scale-110 overflow-hidden rounded-full shadow-lg border-2 border-white/30']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'image-fit zoom-in intro-x block h-8 w-8 scale-110 overflow-hidden rounded-full shadow-lg border-2 border-white/30']); ?>
                        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-white/20 text-white">
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-5 w-5','icon' => 'User']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-5 w-5','icon' => 'User']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.items','data' => ['class' => 'relative mt-px w-56 bg-white/90 backdrop-blur text-slate-800 before:absolute before:inset-0 before:z-[-1] before:block before:rounded-md before:bg-black/5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.items'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'relative mt-px w-56 bg-white/90 backdrop-blur text-slate-800 before:absolute before:inset-0 before:z-[-1] before:block before:rounded-md before:bg-black/5']); ?>
                        <?php if (isset($component)) { $__componentOriginalb00b4c41155366a81f8ca08d91bd0c58 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb00b4c41155366a81f8ca08d91bd0c58 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.header','data' => ['class' => 'font-normal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-normal']); ?>
                            <div class="font-medium"><?php echo e(Auth::user()->name ?? 'Administrator'); ?></div>
                            <div class="mt-0.5 text-xs text-slate-600">
                                <?php echo e(__('global.administrator')); ?>

                            </div>
                         <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.divider','data' => ['class' => 'bg-slate-200']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.divider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-slate-200']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.item','data' => ['class' => 'hover:bg-slate-100']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'hover:bg-slate-100']); ?>
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'mr-2 h-4 w-4','icon' => 'User']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-2 h-4 w-4','icon' => 'User']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> <?php echo e(__('global.profile')); ?>

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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.item','data' => ['class' => 'hover:bg-slate-100']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'hover:bg-slate-100']); ?>
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
<?php endif; ?> <?php echo e(__('global.settings')); ?>

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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.divider','data' => ['class' => 'bg-slate-200']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.divider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-slate-200']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.item','data' => ['class' => 'hover:bg-slate-100']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'hover:bg-slate-100']); ?>
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'mr-2 h-4 w-4','icon' => 'LogOut']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-2 h-4 w-4','icon' => 'LogOut']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> <?php echo e(__('global.logout')); ?>

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
                <!-- END: Account Menu -->
            </div>
        </div>
        <!-- END: Top Bar -->
        <!-- BEGIN: Top Menu -->
        <nav class="top-nav relative z-50 hidden md:block">
            <ul class="flex flex-wrap pb-3 xl:px-[50px] xl:pb-0">
                <?php $__currentLoopData = $mainMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuKey => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a
                            href="<?php echo e(isset($menu['route_name']) ? route($menu['route_name'], isset($menu['params']) ? $menu['params'] : []) : 'javascript:;'); ?>"
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                $firstLevelActiveIndex == $menuKey
                                    ? 'top-menu top-menu--active'
                                    : 'top-menu',
                            ]); ?>"
                        >
                            <div class="top-menu__icon">
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => ''.e($menu['icon']).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => ''.e($menu['icon']).'']); ?>
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
                            <div class="top-menu__title">
                                <?php echo e($menu['title']); ?>

                                <?php if(isset($menu['sub_menu'])): ?>
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'top-menu__sub-icon','icon' => 'chevron-down']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'top-menu__sub-icon','icon' => 'chevron-down']); ?>
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
                                <?php endif; ?>
                            </div>
                        </a>
                        <?php if(isset($menu['sub_menu'])): ?>
                            <ul class="<?php echo e($firstLevelActiveIndex == $menuKey ? 'top-menu__sub-open' : ''); ?>">
                                <?php $__currentLoopData = $menu['sub_menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subMenuKey => $subMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a
                                            class="top-menu"
                                            href="<?php echo e(isset($subMenu['route_name']) ? route($subMenu['route_name'], isset($subMenu['params']) ? $subMenu['params'] : []) : 'javascript:;'); ?>"
                                        >
                                            <div class="top-menu__icon">
                                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => ''.e($subMenu['icon']).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => ''.e($subMenu['icon']).'']); ?>
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
                                            <div class="top-menu__title">
                                                <?php echo e($subMenu['title']); ?>

                                                <?php if(isset($subMenu['sub_menu'])): ?>
                                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'top-menu__sub-icon','icon' => 'chevron-down']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'top-menu__sub-icon','icon' => 'chevron-down']); ?>
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
                                                <?php endif; ?>
                                            </div>
                                        </a>
                                        <?php if(isset($subMenu['sub_menu'])): ?>
                                            <ul
                                                class="<?php echo e($secondLevelActiveIndex == $subMenuKey ? 'top-menu__sub-open' : ''); ?>">
                                                <?php $__currentLoopData = $subMenu['sub_menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lastSubMenuKey => $lastSubMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <a
                                                            class="top-menu"
                                                            href="<?php echo e(isset($lastSubMenu['route_name']) ? route($lastSubMenu['route_name'], isset($lastSubMenu['params']) ? $lastSubMenu['params'] : []) : 'javascript:;'); ?>"
                                                        >
                                                            <div class="top-menu__icon">
                                                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => ''.e($lastSubMenu['icon']).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => ''.e($lastSubMenu['icon']).'']); ?>
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
                                                            <div class="top-menu__title"><?php echo e($lastSubMenu['title']); ?></div>
                                                        </a>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </nav>
        <!-- END: Top Menu -->
        <!-- BEGIN: Content -->
        <div
            class="md:max-w-auto min-h-screen min-w-0 max-w-full flex-1 rounded-[30px] bg-gradient-to-br from-pink-50 to-blue-50 px-4 pb-10 before:block before:h-px before:w-full before:content-[''] dark:bg-darkmode-700 md:px-[22px]">
            <?php echo $__env->yieldContent('subcontent'); ?>
        </div>
        <!-- END: Content -->
    </div>
<?php $__env->stopSection(); ?>

<?php if (! $__env->hasRenderedOnce('987a257f-49bf-4cf0-b634-1f936f7807af')): $__env->markAsRenderedOnce('987a257f-49bf-4cf0-b634-1f936f7807af');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/themes/kindergarten/top-nav.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('ac008acb-d4d1-4ecf-9c72-aec7c6da3104')): $__env->markAsRenderedOnce('ac008acb-d4d1-4ecf-9c72-aec7c6da3104');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/themes/kindergarten/top-bar.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php echo $__env->make('../themes/base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views\themes\kindergarten\top-menu.blade.php ENDPATH**/ ?>