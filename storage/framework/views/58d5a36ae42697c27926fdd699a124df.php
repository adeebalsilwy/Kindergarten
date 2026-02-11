<!-- BEGIN: Top Bar -->
<div
    class="top-bar-boxed relative z-[51] -mx-5 mb-12 mt-12 h-[70px] border-b border-white/[0.08] px-3 sm:-mx-8 sm:px-8 md:-mt-5 md:pt-0">
    <div class="flex h-full items-center">
        <!-- BEGIN: Logo -->
        <a
            class="-intro-x hidden md:flex"
            href=""
        >
            <img
                class="w-6"
                src="<?php echo e(Vite::asset('resources/images/logo.svg')); ?>"
                alt="Icewall Tailwind Admin Dashboard Template"
            />
            <span class="ml-3 text-lg text-white"> Icewall </span>
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
<?php $component->withAttributes(['index' => 0]); ?>Application <?php echo $__env->renderComponent(); ?>
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
                Dashboard
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
        <div class="intro-x relative mr-3 sm:mr-6">
            <div class="search hidden sm:block">
                <?php if (isset($component)) { $__componentOriginal40054831fd8fc1521987609af4b37cc0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40054831fd8fc1521987609af4b37cc0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-input.index','data' => ['class' => 'w-56 rounded-full border-transparent bg-slate-200 pr-8 shadow-none transition-[width] duration-300 ease-in-out focus:w-72 focus:border-transparent dark:bg-darkmode-400/70','type' => 'text','placeholder' => 'Search...']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-56 rounded-full border-transparent bg-slate-200 pr-8 shadow-none transition-[width] duration-300 ease-in-out focus:w-72 focus:border-transparent dark:bg-darkmode-400/70','type' => 'text','placeholder' => 'Search...']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'absolute inset-y-0 right-0 my-auto mr-3 h-5 w-5 text-slate-600 dark:text-slate-500','icon' => 'Search']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'absolute inset-y-0 right-0 my-auto mr-3 h-5 w-5 text-slate-600 dark:text-slate-500','icon' => 'Search']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-5 w-5 dark:text-slate-500','icon' => 'Search']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-5 w-5 dark:text-slate-500','icon' => 'Search']); ?>
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
                <div class="box w-[450px] p-5">
                    <div class="mb-2 font-medium">Pages</div>
                    <div class="mb-5">
                        <a
                            class="flex items-center"
                            href=""
                        >
                            <div
                                class="flex h-8 w-8 items-center justify-center rounded-full bg-success/20 text-success dark:bg-success/10">
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-4 w-4','icon' => 'Inbox']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-4 w-4','icon' => 'Inbox']); ?>
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
                            <div class="ml-3">Mail Settings</div>
                        </a>
                        <a
                            class="mt-2 flex items-center"
                            href=""
                        >
                            <div
                                class="flex h-8 w-8 items-center justify-center rounded-full bg-pending/10 text-pending">
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
                            <div class="ml-3">Users & Permissions</div>
                        </a>
                        <a
                            class="mt-2 flex items-center"
                            href=""
                        >
                            <div
                                class="flex h-8 w-8 items-center justify-center rounded-full bg-primary/10 text-primary/80 dark:bg-primary/20">
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
                            <div class="ml-3">Transactions Report</div>
                        </a>
                    </div>
                    <div class="mb-2 font-medium">Users</div>
                    <div class="mb-5">
                        <?php $__currentLoopData = array_slice($fakers, 0, 4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faker): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a
                                class="mt-2 flex items-center"
                                href=""
                            >
                                <div class="image-fit h-8 w-8">
                                    <img
                                        class="rounded-full"
                                        src="<?php echo e(Vite::asset($faker['photos'][0])); ?>"
                                        alt="Midone - Tailwind Admin Dashboard Template"
                                    />
                                </div>
                                <div class="ml-3"><?php echo e($faker['users'][0]['name']); ?></div>
                                <div class="ml-auto w-48 truncate text-right text-xs text-slate-500">
                                    <?php echo e($faker['users'][0]['email']); ?>

                                </div>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="mb-2 font-medium">Products</div>
                    <?php $__currentLoopData = array_slice($fakers, 0, 4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faker): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a
                            class="mt-2 flex items-center"
                            href=""
                        >
                            <div class="image-fit h-8 w-8">
                                <img
                                    class="rounded-full"
                                    src="<?php echo e(Vite::asset($faker['images'][0])); ?>"
                                    alt="Midone - Tailwind Admin Dashboard Template"
                                />
                            </div>
                            <div class="ml-3"><?php echo e($faker['products'][0]['name']); ?></div>
                            <div class="ml-auto w-48 truncate text-right text-xs text-slate-500">
                                <?php echo e($faker['products'][0]['category']); ?>

                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-5 w-5 dark:text-slate-500','icon' => 'Bell']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-5 w-5 dark:text-slate-500','icon' => 'Bell']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.popover.panel','data' => ['class' => 'mt-2 w-[280px] p-5 sm:w-[350px]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.popover.panel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-2 w-[280px] p-5 sm:w-[350px]']); ?>
                <div class="mb-5 font-medium">Notifications</div>
                <?php $__currentLoopData = array_slice($fakers, 0, 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fakerKey => $faker): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'cursor-pointer relative flex items-center',
                        'mt-5' => $fakerKey,
                    ]); ?>">
                        <div class="image-fit relative mr-1 h-12 w-12 flex-none">
                            <img
                                class="rounded-full"
                                src="<?php echo e(Vite::asset($faker['photos'][0])); ?>"
                                alt="Midone - Tailwind Admin Dashboard Template"
                            />
                            <div
                                class="absolute bottom-0 right-0 h-3 w-3 rounded-full border-2 border-white bg-success dark:border-darkmode-600">
                            </div>
                        </div>
                        <div class="ml-2 overflow-hidden">
                            <div class="flex items-center">
                                <a
                                    class="mr-5 truncate font-medium"
                                    href=""
                                >
                                    <?php echo e($faker['users'][0]['name']); ?>

                                </a>
                                <div class="ml-auto whitespace-nowrap text-xs text-slate-400">
                                    <?php echo e($faker['times'][0]); ?>

                                </div>
                            </div>
                            <div class="mt-0.5 w-full truncate text-slate-500">
                                <?php echo e($faker['news'][0]['short_content']); ?>

                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        <!-- BEGIN: Locale Switcher -->
        <?php if (isset($component)) { $__componentOriginal7f18f43b3d2bacb563c64f2b49c801bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7f18f43b3d2bacb563c64f2b49c801bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.dropdown.index','data' => ['class' => 'intro-x mr-3 sm:mr-6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'intro-x mr-3 sm:mr-6']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-5 w-5 mr-2','icon' => 'Globe']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-5 w-5 mr-2','icon' => 'Globe']); ?>
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
                <?php
                    $isAr = app()->getLocale() === 'ar';
                    $langLeft = $isAr ? __('global.arabic') : __('global.english');
                    $langRight = $isAr ? __('global.english') : __('global.arabic');
                ?>
                <span>
                    <span class="font-semibold text-primary"><?php echo e($langLeft); ?></span>
                    <span class="mx-1">|</span>
                    <span class="text-white/70"><?php echo e($langRight); ?></span>
                </span>
                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-4 w-4 ml-2','icon' => 'ChevronDown']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-4 w-4 ml-2','icon' => 'ChevronDown']); ?>
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
                <?php if (isset($component)) { $__componentOriginal94c7f5da0e5ac8d371ca91de24cd83b0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal94c7f5da0e5ac8d371ca91de24cd83b0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.dropdown.item','data' => ['as' => 'a','href' => ''.e(route('locale.switch', ['locale' => 'en'])).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['as' => 'a','href' => ''.e(route('locale.switch', ['locale' => 'en'])).'']); ?><?php echo e(__('global.english')); ?> <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.dropdown.item','data' => ['as' => 'a','href' => ''.e(route('locale.switch', ['locale' => 'ar'])).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['as' => 'a','href' => ''.e(route('locale.switch', ['locale' => 'ar'])).'']); ?><?php echo e(__('global.arabic')); ?> <?php echo $__env->renderComponent(); ?>
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
        <!-- END: Locale Switcher -->
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.button','data' => ['class' => 'image-fit zoom-in intro-x block h-8 w-8 scale-110 overflow-hidden rounded-full shadow-lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'image-fit zoom-in intro-x block h-8 w-8 scale-110 overflow-hidden rounded-full shadow-lg']); ?>
                <img
                    src="<?php echo e(Vite::asset($faker['photos'][0])); ?>"
                    alt="Midone - Tailwind Admin Dashboard Template"
                />
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.items','data' => ['class' => 'relative mt-px w-56 bg-theme-1/80 text-white before:absolute before:inset-0 before:z-[-1] before:block before:rounded-md before:bg-black']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.items'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'relative mt-px w-56 bg-theme-1/80 text-white before:absolute before:inset-0 before:z-[-1] before:block before:rounded-md before:bg-black']); ?>
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
                    <div class="font-medium"><?php echo e($fakers[0]['users'][0]['name']); ?></div>
                    <div class="mt-0.5 text-xs text-white/70 dark:text-slate-500">
                        <?php echo e($fakers[0]['jobs'][0]); ?>

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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.divider','data' => ['class' => 'bg-white/[0.08]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.divider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-white/[0.08]']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.item','data' => ['class' => 'hover:bg-white/5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'hover:bg-white/5']); ?>
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
<?php endif; ?> Profile
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.item','data' => ['class' => 'hover:bg-white/5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'hover:bg-white/5']); ?>
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
<?php endif; ?> Add Account
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.item','data' => ['class' => 'hover:bg-white/5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'hover:bg-white/5']); ?>
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
<?php endif; ?> Reset Password
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.item','data' => ['class' => 'hover:bg-white/5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'hover:bg-white/5']); ?>
                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'mr-2 h-4 w-4','icon' => 'HelpCircle']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-2 h-4 w-4','icon' => 'HelpCircle']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> Help
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.divider','data' => ['class' => 'bg-white/[0.08]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.divider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-white/[0.08]']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.item','data' => ['class' => 'hover:bg-white/5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'hover:bg-white/5']); ?>
                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'mr-2 h-4 w-4','icon' => 'ToggleRight']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-2 h-4 w-4','icon' => 'ToggleRight']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> Logout
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

<?php if (! $__env->hasRenderedOnce('3b698a1f-6cf4-42e3-bd06-f56a40003b19')): $__env->markAsRenderedOnce('3b698a1f-6cf4-42e3-bd06-f56a40003b19');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/themes/icewall/top-bar.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH F:\my project\laravel\contract\Source\resources\views\components\themes\icewall\top-bar\index.blade.php ENDPATH**/ ?>