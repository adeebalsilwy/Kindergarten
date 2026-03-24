<?php $__env->startSection('head'); ?>
    <title><?php echo e(__('User.list')); ?> - <?php echo e(config('app.name')); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/pages/users.css']); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
    <!-- Professional Header -->
    <div class="intro-y flex flex-col sm:flex-row items-center mt-10 mb-8">
        <div class="me-auto">
            <h2 class="text-3xl font-black text-slate-800 dark:text-slate-200 tracking-tight flex items-center">
                <div class="w-12 h-12 rounded-2xl bg-primary/10 flex items-center justify-center text-primary shadow-inner me-4">
                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Users','class' => 'w-7 h-7']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Users','class' => 'w-7 h-7']); ?>
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
                <?php echo e(__('User.list')); ?>

                <span class="ms-4 px-4 py-1.5 rounded-full bg-slate-100 dark:bg-darkmode-600 text-slate-500 text-xs font-black border border-slate-200 dark:border-darkmode-400">
                    <?php echo e($users->total()); ?> <?php echo e(__('global.total')); ?>

                </span>
            </h2>
        </div>
        <div class="w-full sm:w-auto flex mt-6 sm:mt-0 gap-3">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_users')): ?>
            <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['variant' => 'primary','as' => 'a','href' => ''.e(route('users.create')).'','class' => 'flex items-center px-6 py-3 rounded-2xl shadow-xl shadow-primary/30 transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'primary','as' => 'a','href' => ''.e(route('users.create')).'','class' => 'flex items-center px-6 py-3 rounded-2xl shadow-xl shadow-primary/30 transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98]']); ?>
                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'UserPlus','class' => 'w-5 h-5 me-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'UserPlus','class' => 'w-5 h-5 me-2']); ?>
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
                <?php echo e(__('User.add_new')); ?>

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
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('export_users')): ?>
            <div class="dropdown">
                <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['variant' => 'outline-secondary','class' => 'flex items-center px-5 py-3 rounded-2xl bg-white dark:bg-darkmode-700 shadow-sm border-slate-200 dark:border-darkmode-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'outline-secondary','class' => 'flex items-center px-5 py-3 rounded-2xl bg-white dark:bg-darkmode-700 shadow-sm border-slate-200 dark:border-darkmode-400']); ?>
                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Download','class' => 'w-5 h-5 me-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Download','class' => 'w-5 h-5 me-2']); ?>
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
                    <?php echo e(__('global.export')); ?>

                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'ChevronDown','class' => 'w-4 h-4 ms-2 opacity-50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'ChevronDown','class' => 'w-4 h-4 ms-2 opacity-50']); ?>
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
<?php if (isset($__attributesOriginale00eb601fbe667f0da582732d70c41c5)): ?>
<?php $attributes = $__attributesOriginale00eb601fbe667f0da582732d70c41c5; ?>
<?php unset($__attributesOriginale00eb601fbe667f0da582732d70c41c5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale00eb601fbe667f0da582732d70c41c5)): ?>
<?php $component = $__componentOriginale00eb601fbe667f0da582732d70c41c5; ?>
<?php unset($__componentOriginale00eb601fbe667f0da582732d70c41c5); ?>
<?php endif; ?>
                <div class="dropdown-menu w-48">
                    <div class="dropdown-content p-2 rounded-2xl shadow-2xl border-0">
                        <a href="<?php echo e(route('users.export.pdf')); ?><?php echo e(request()->getQueryString() ? '?' . request()->getQueryString() : ''); ?>" class="dropdown-item flex items-center p-3 rounded-xl hover:bg-primary/5 transition-colors group">
                            <div class="w-10 h-10 rounded-lg bg-danger/10 text-danger flex items-center justify-center me-3 group-hover:scale-110 transition-transform">
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'FileText','class' => 'w-5 h-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'FileText','class' => 'w-5 h-5']); ?>
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
                            <span class="font-bold text-slate-700 dark:text-slate-300"><?php echo e(__('global.export_pdf')); ?></span>
                        </a>
                        <a href="<?php echo e(route('users.export.excel')); ?><?php echo e(request()->getQueryString() ? '?' . request()->getQueryString() : ''); ?>" class="dropdown-item flex items-center p-3 rounded-xl hover:bg-primary/5 transition-colors group mt-1">
                            <div class="w-10 h-10 rounded-lg bg-success/10 text-success flex items-center justify-center me-3 group-hover:scale-110 transition-transform">
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'FileSpreadsheet','class' => 'w-5 h-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'FileSpreadsheet','class' => 'w-5 h-5']); ?>
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
                            <span class="font-bold text-slate-700 dark:text-slate-300"><?php echo e(__('global.export_excel')); ?></span>
                        </a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Stats Dashboard - Redesigned -->
    <div class="grid grid-cols-12 gap-6 mb-8">
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="box p-8 rounded-[2.5rem] border-0 shadow-xl bg-gradient-to-br from-primary/10 to-transparent relative overflow-hidden group">
                <div class="flex items-center relative z-10">
                    <div class="w-14 h-14 rounded-2xl bg-white dark:bg-darkmode-600 flex items-center justify-center text-primary shadow-lg group-hover:scale-110 transition-transform duration-500">
                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Users','class' => 'w-7 h-7']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Users','class' => 'w-7 h-7']); ?>
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
                    <div class="ms-auto text-[10px] font-black uppercase tracking-[0.2em] text-primary/70"><?php echo e(__('global.total_users')); ?></div>
                </div>
                <div class="text-4xl font-black text-slate-800 dark:text-slate-200 mt-8 relative z-10 tracking-tight"><?php echo e($users->total()); ?></div>
                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Users','class' => 'absolute -bottom-6 -right-6 w-32 h-32 text-primary/5 group-hover:rotate-12 transition-transform duration-700']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Users','class' => 'absolute -bottom-6 -right-6 w-32 h-32 text-primary/5 group-hover:rotate-12 transition-transform duration-700']); ?>
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
        
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="box p-8 rounded-[2.5rem] border-0 shadow-xl bg-gradient-to-br from-success/10 to-transparent relative overflow-hidden group">
                <div class="flex items-center relative z-10">
                    <div class="w-14 h-14 rounded-2xl bg-white dark:bg-darkmode-600 flex items-center justify-center text-success shadow-lg group-hover:scale-110 transition-transform duration-500">
                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'ShieldCheck','class' => 'w-7 h-7']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'ShieldCheck','class' => 'w-7 h-7']); ?>
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
                    <div class="ms-auto text-[10px] font-black uppercase tracking-[0.2em] text-success/70"><?php echo e(__('global.active')); ?></div>
                </div>
                <div class="text-4xl font-black text-slate-800 dark:text-slate-200 mt-8 relative z-10 tracking-tight"><?php echo e($users->where('is_active', true)->count()); ?></div>
                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'ShieldCheck','class' => 'absolute -bottom-6 -right-6 w-32 h-32 text-success/5 group-hover:rotate-12 transition-transform duration-700']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'ShieldCheck','class' => 'absolute -bottom-6 -right-6 w-32 h-32 text-success/5 group-hover:rotate-12 transition-transform duration-700']); ?>
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

        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="box p-8 rounded-[2.5rem] border-0 shadow-xl bg-gradient-to-br from-warning/10 to-transparent relative overflow-hidden group">
                <div class="flex items-center relative z-10">
                    <div class="w-14 h-14 rounded-2xl bg-white dark:bg-darkmode-600 flex items-center justify-center text-warning shadow-lg group-hover:scale-110 transition-transform duration-500">
                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'UserCheck','class' => 'w-7 h-7']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'UserCheck','class' => 'w-7 h-7']); ?>
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
                    <div class="ms-auto text-[10px] font-black uppercase tracking-[0.2em] text-warning/70"><?php echo e(__('global.verified')); ?></div>
                </div>
                <div class="text-4xl font-black text-slate-800 dark:text-slate-200 mt-8 relative z-10 tracking-tight"><?php echo e($users->whereNotNull('email_verified_at')->count()); ?></div>
                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'UserCheck','class' => 'absolute -bottom-6 -right-6 w-32 h-32 text-warning/5 group-hover:rotate-12 transition-transform duration-700']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'UserCheck','class' => 'absolute -bottom-6 -right-6 w-32 h-32 text-warning/5 group-hover:rotate-12 transition-transform duration-700']); ?>
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

        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="box p-8 rounded-[2.5rem] border-0 shadow-xl bg-gradient-to-br from-info/10 to-transparent relative overflow-hidden group">
                <div class="flex items-center relative z-10">
                    <div class="w-14 h-14 rounded-2xl bg-white dark:bg-darkmode-600 flex items-center justify-center text-info shadow-lg group-hover:scale-110 transition-transform duration-500">
                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Shield','class' => 'w-7 h-7']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Shield','class' => 'w-7 h-7']); ?>
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
                    <div class="ms-auto text-[10px] font-black uppercase tracking-[0.2em] text-info/70"><?php echo e(__('global.admins')); ?></div>
                </div>
                <div class="text-4xl font-black text-slate-800 dark:text-slate-200 mt-8 relative z-10 tracking-tight"><?php echo e($users->filter(fn($u) => $u->hasRole('Administrator'))->count()); ?></div>
                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Shield','class' => 'absolute -bottom-6 -right-6 w-32 h-32 text-info/5 group-hover:rotate-12 transition-transform duration-700']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Shield','class' => 'absolute -bottom-6 -right-6 w-32 h-32 text-info/5 group-hover:rotate-12 transition-transform duration-700']); ?>
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
    </div>

    <!-- Advanced Filter Section -->
    <div class="intro-y box p-10 rounded-[3rem] border-0 shadow-2xl bg-white dark:bg-darkmode-700 mb-8 overflow-hidden relative">
        <div class="absolute top-0 right-0 p-10 opacity-5">
            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Filter','class' => 'w-48 h-48 text-primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Filter','class' => 'w-48 h-48 text-primary']); ?>
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
        
        <form method="GET" action="<?php echo e(route('users.index')); ?>" class="relative z-10">
            <div class="grid grid-cols-12 gap-x-8 gap-y-6">
                <div class="col-span-12 lg:col-span-4">
                    <?php if (isset($component)) { $__componentOriginal0b5a207e31917d1ae3d42744188acbdf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-label.index','data' => ['class' => 'font-black text-slate-700 dark:text-slate-300 mb-3 block']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-black text-slate-700 dark:text-slate-300 mb-3 block']); ?><?php echo e(__('global.search')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $attributes = $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $component = $__componentOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
                    <div class="relative group">
                        <div class="absolute inset-y-0 start-0 ps-5 flex items-center text-slate-400 group-focus-within:text-primary transition-colors">
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Search','class' => 'w-5 h-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Search','class' => 'w-5 h-5']); ?>
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
                        <?php if (isset($component)) { $__componentOriginal40054831fd8fc1521987609af4b37cc0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40054831fd8fc1521987609af4b37cc0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-input.index','data' => ['name' => 'search','value' => ''.e(request('search')).'','placeholder' => ''.e(__('global.search_users_placeholder')).'','class' => 'ps-14 py-4 rounded-2xl border-slate-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-sm font-bold shadow-sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'search','value' => ''.e(request('search')).'','placeholder' => ''.e(__('global.search_users_placeholder')).'','class' => 'ps-14 py-4 rounded-2xl border-slate-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-sm font-bold shadow-sm']); ?>
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
                    </div>
                </div>
                
                <div class="col-span-12 sm:col-span-6 lg:col-span-2">
                    <?php if (isset($component)) { $__componentOriginal0b5a207e31917d1ae3d42744188acbdf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-label.index','data' => ['class' => 'font-black text-slate-700 dark:text-slate-300 mb-3 block']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-black text-slate-700 dark:text-slate-300 mb-3 block']); ?><?php echo e(__('users.fields.status')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $attributes = $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $component = $__componentOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalb08e28f9db590bed3446cfb449cfe7fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb08e28f9db590bed3446cfb449cfe7fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tom-select.index','data' => ['name' => 'is_active','class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tom-select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'is_active','class' => 'w-full']); ?>
                        <option value=""><?php echo e(__('global.all_statuses')); ?></option>
                        <option value="1" <?php echo e(request('is_active') == '1' ? 'selected' : ''); ?>><?php echo e(__('global.active')); ?></option>
                        <option value="0" <?php echo e(request('is_active') == '0' ? 'selected' : ''); ?>><?php echo e(__('global.inactive')); ?></option>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb08e28f9db590bed3446cfb449cfe7fd)): ?>
<?php $attributes = $__attributesOriginalb08e28f9db590bed3446cfb449cfe7fd; ?>
<?php unset($__attributesOriginalb08e28f9db590bed3446cfb449cfe7fd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb08e28f9db590bed3446cfb449cfe7fd)): ?>
<?php $component = $__componentOriginalb08e28f9db590bed3446cfb449cfe7fd; ?>
<?php unset($__componentOriginalb08e28f9db590bed3446cfb449cfe7fd); ?>
<?php endif; ?>
                </div>

                <div class="col-span-12 sm:col-span-6 lg:col-span-2">
                    <?php if (isset($component)) { $__componentOriginal0b5a207e31917d1ae3d42744188acbdf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-label.index','data' => ['class' => 'font-black text-slate-700 dark:text-slate-300 mb-3 block']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-black text-slate-700 dark:text-slate-300 mb-3 block']); ?><?php echo e(__('global.role')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $attributes = $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $component = $__componentOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalb08e28f9db590bed3446cfb449cfe7fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb08e28f9db590bed3446cfb449cfe7fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tom-select.index','data' => ['name' => 'role','class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tom-select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'role','class' => 'w-full']); ?>
                        <option value=""><?php echo e(__('global.all_roles')); ?></option>
                        <?php $__currentLoopData = Spatie\Permission\Models\Role::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($role->name); ?>" <?php echo e(request('role') == $role->name ? 'selected' : ''); ?>><?php echo e($role->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb08e28f9db590bed3446cfb449cfe7fd)): ?>
<?php $attributes = $__attributesOriginalb08e28f9db590bed3446cfb449cfe7fd; ?>
<?php unset($__attributesOriginalb08e28f9db590bed3446cfb449cfe7fd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb08e28f9db590bed3446cfb449cfe7fd)): ?>
<?php $component = $__componentOriginalb08e28f9db590bed3446cfb449cfe7fd; ?>
<?php unset($__componentOriginalb08e28f9db590bed3446cfb449cfe7fd); ?>
<?php endif; ?>
                </div>

                <div class="col-span-12 sm:col-span-6 lg:col-span-2">
                    <?php if (isset($component)) { $__componentOriginal0b5a207e31917d1ae3d42744188acbdf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-label.index','data' => ['class' => 'font-black text-slate-700 dark:text-slate-300 mb-3 block']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-black text-slate-700 dark:text-slate-300 mb-3 block']); ?><?php echo e(__('global.verification')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $attributes = $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $component = $__componentOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalb08e28f9db590bed3446cfb449cfe7fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb08e28f9db590bed3446cfb449cfe7fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tom-select.index','data' => ['name' => 'verified','class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tom-select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'verified','class' => 'w-full']); ?>
                        <option value=""><?php echo e(__('global.all_verification')); ?></option>
                        <option value="1" <?php echo e(request('verified') == '1' ? 'selected' : ''); ?>><?php echo e(__('global.verified')); ?></option>
                        <option value="0" <?php echo e(request('verified') == '0' ? 'selected' : ''); ?>><?php echo e(__('global.unverified')); ?></option>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb08e28f9db590bed3446cfb449cfe7fd)): ?>
<?php $attributes = $__attributesOriginalb08e28f9db590bed3446cfb449cfe7fd; ?>
<?php unset($__attributesOriginalb08e28f9db590bed3446cfb449cfe7fd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb08e28f9db590bed3446cfb449cfe7fd)): ?>
<?php $component = $__componentOriginalb08e28f9db590bed3446cfb449cfe7fd; ?>
<?php unset($__componentOriginalb08e28f9db590bed3446cfb449cfe7fd); ?>
<?php endif; ?>
                </div>

                <div class="col-span-12 sm:col-span-6 lg:col-span-2 flex items-end">
                    <div class="flex w-full gap-2">
                        <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['type' => 'submit','variant' => 'primary','class' => 'flex-1 py-4 rounded-2xl shadow-lg shadow-primary/20 font-black uppercase tracking-widest text-[10px] transition-all hover:scale-[1.02]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','variant' => 'primary','class' => 'flex-1 py-4 rounded-2xl shadow-lg shadow-primary/20 font-black uppercase tracking-widest text-[10px] transition-all hover:scale-[1.02]']); ?>
                            <?php echo e(__('global.filter')); ?>

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
                        <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['as' => 'a','href' => ''.e(route('users.index')).'','variant' => 'soft-secondary','class' => 'p-4 rounded-2xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['as' => 'a','href' => ''.e(route('users.index')).'','variant' => 'soft-secondary','class' => 'p-4 rounded-2xl']); ?>
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'RotateCcw','class' => 'w-5 h-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'RotateCcw','class' => 'w-5 h-5']); ?>
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
            </div>
        </form>
    </div>

    <!-- User Professional Table -->
    <div class="intro-y box rounded-[3rem] border-0 shadow-2xl bg-white dark:bg-darkmode-700 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-start">
                <thead>
                    <tr class="bg-slate-50 dark:bg-darkmode-600 text-slate-400 font-black uppercase tracking-[0.2em] text-[10px]">
                        <th class="px-8 py-8 text-start"><?php echo e(__('users.fields.user')); ?></th>
                        <th class="px-8 py-8 text-center"><?php echo e(__('global.status')); ?></th>
                        <th class="px-8 py-8 text-center"><?php echo e(__('global.role')); ?></th>
                        <th class="px-8 py-8 text-center"><?php echo e(__('global.last_activity')); ?></th>
                        <th class="px-8 py-8 text-end"><?php echo e(__('global.actions')); ?></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-darkmode-400">
                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="group hover:bg-slate-50/50 dark:hover:bg-darkmode-600/50 transition-colors duration-300">
                        <td class="px-8 py-6">
                            <div class="flex items-center">
                                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-primary/10 to-transparent flex items-center justify-center text-primary shadow-inner me-5 group-hover:scale-110 transition-transform duration-500">
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'User','class' => 'w-7 h-7']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'User','class' => 'w-7 h-7']); ?>
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
                                <div>
                                    <div class="text-lg font-black text-slate-800 dark:text-slate-200 tracking-tight leading-tight"><?php echo e($user->name); ?></div>
                                    <div class="text-xs font-bold text-slate-400 mt-1 flex items-center tracking-wide">
                                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Mail','class' => 'w-3.5 h-3.5 me-2 opacity-50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Mail','class' => 'w-3.5 h-3.5 me-2 opacity-50']); ?>
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
                                        <?php echo e($user->email); ?>

                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6 text-center">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_users')): ?>
                            <div class="flex flex-col items-center gap-2">
                                <?php if (isset($component)) { $__componentOriginal0e9b1708c541f0772f542e0482be43cc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0e9b1708c541f0772f542e0482be43cc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-switch.index','data' => ['class' => 'w-full justify-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-switch'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full justify-center']); ?>
                                    <x-base.form-switch.input 
                                        type="checkbox" 
                                        class="status-toggle" 
                                        data-id="<?php echo e($user->id); ?>"
                                        data-url="<?php echo e(route('users.toggle-status', $user->id)); ?>"
                                        <?php echo e($user->is_active ? 'checked' : ''); ?> />
                                    <?php if (isset($component)) { $__componentOriginal2d72b4ed762a09d18a89903d2344442f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2d72b4ed762a09d18a89903d2344442f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-switch.label','data' => ['class' => 'ms-2 text-[10px] font-black uppercase tracking-widest text-slate-500']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-switch.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ms-2 text-[10px] font-black uppercase tracking-widest text-slate-500']); ?>
                                        <?php echo e($user->is_active ? __('global.active') : __('global.inactive')); ?>

                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2d72b4ed762a09d18a89903d2344442f)): ?>
<?php $attributes = $__attributesOriginal2d72b4ed762a09d18a89903d2344442f; ?>
<?php unset($__attributesOriginal2d72b4ed762a09d18a89903d2344442f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2d72b4ed762a09d18a89903d2344442f)): ?>
<?php $component = $__componentOriginal2d72b4ed762a09d18a89903d2344442f; ?>
<?php unset($__componentOriginal2d72b4ed762a09d18a89903d2344442f); ?>
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

                                <?php if (isset($component)) { $__componentOriginal0e9b1708c541f0772f542e0482be43cc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0e9b1708c541f0772f542e0482be43cc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-switch.index','data' => ['class' => 'w-full justify-center mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-switch'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full justify-center mt-2']); ?>
                                    <x-base.form-switch.input 
                                        type="checkbox" 
                                        class="verification-toggle" 
                                        data-id="<?php echo e($user->id); ?>"
                                        data-url="<?php echo e(route('users.toggle-verification', $user->id)); ?>"
                                        <?php echo e($user->email_verified_at ? 'checked' : ''); ?> />
                                    <?php if (isset($component)) { $__componentOriginal2d72b4ed762a09d18a89903d2344442f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2d72b4ed762a09d18a89903d2344442f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-switch.label','data' => ['class' => 'ms-2 text-[10px] font-black uppercase tracking-widest text-slate-500']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-switch.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ms-2 text-[10px] font-black uppercase tracking-widest text-slate-500']); ?>
                                        <?php echo e($user->email_verified_at ? __('global.verified') : __('global.unverified')); ?>

                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2d72b4ed762a09d18a89903d2344442f)): ?>
<?php $attributes = $__attributesOriginal2d72b4ed762a09d18a89903d2344442f; ?>
<?php unset($__attributesOriginal2d72b4ed762a09d18a89903d2344442f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2d72b4ed762a09d18a89903d2344442f)): ?>
<?php $component = $__componentOriginal2d72b4ed762a09d18a89903d2344442f; ?>
<?php unset($__componentOriginal2d72b4ed762a09d18a89903d2344442f); ?>
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
                            <?php else: ?>
                                <div class="flex flex-col items-center gap-2">
                                    <?php if($user->is_active): ?>
                                        <span class="px-5 py-2 rounded-full bg-success/10 text-success text-[10px] font-black uppercase tracking-widest border border-success/10 shadow-sm">
                                            <?php echo e(__('global.active')); ?>

                                        </span>
                                    <?php else: ?>
                                        <span class="px-5 py-2 rounded-full bg-danger/10 text-danger text-[10px] font-black uppercase tracking-widest border border-danger/10 shadow-sm">
                                            <?php echo e(__('global.inactive')); ?>

                                        </span>
                                    <?php endif; ?>
                                    
                                    <?php if($user->email_verified_at): ?>
                                        <span class="px-5 py-2 rounded-full bg-primary/10 text-primary text-[10px] font-black uppercase tracking-widest border border-primary/10 shadow-sm mt-1">
                                            <?php echo e(__('global.verified')); ?>

                                        </span>
                                    <?php else: ?>
                                        <span class="px-5 py-2 rounded-full bg-slate-100 text-slate-400 text-[10px] font-black uppercase tracking-widest border border-slate-200 shadow-sm mt-1">
                                            <?php echo e(__('global.unverified')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td class="px-8 py-6 text-center">
                            <?php if($user->roles->count() > 0): ?>
                                <div class="flex flex-col items-center gap-2">
                                    <span class="px-4 py-1.5 rounded-xl bg-primary/10 text-primary text-[10px] font-black uppercase tracking-widest border border-primary/10">
                                        <?php echo e($user->roles->first()->name); ?>

                                    </span>
                                    <?php if($user->roles->count() > 1): ?>
                                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">+<?php echo e($user->roles->count() - 1); ?> <?php echo e(__('global.more')); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php else: ?>
                                <span class="text-slate-300 italic text-xs font-bold"><?php echo e(__('global.no_role')); ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="px-8 py-6 text-center">
                            <div class="text-sm font-black text-slate-700 dark:text-slate-300 tracking-tight">
                                <?php echo e($user->last_login_at ? $user->last_login_at->diffForHumans() : '-'); ?>

                            </div>
                            <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">
                                <?php echo e($user->last_login_at ? $user->last_login_at->format('M d, H:i') : __('global.never')); ?>

                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex justify-end items-center gap-3">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_users')): ?>
                                <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['as' => 'a','href' => ''.e(route('users.show', $user->id)).'','variant' => 'soft-secondary','class' => 'w-10 h-10 rounded-xl p-0 flex items-center justify-center transition-all hover:bg-primary/10 hover:text-primary hover:scale-110 shadow-sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['as' => 'a','href' => ''.e(route('users.show', $user->id)).'','variant' => 'soft-secondary','class' => 'w-10 h-10 rounded-xl p-0 flex items-center justify-center transition-all hover:bg-primary/10 hover:text-primary hover:scale-110 shadow-sm']); ?>
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Eye','class' => 'w-5 h-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Eye','class' => 'w-5 h-5']); ?>
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
<?php if (isset($__attributesOriginale00eb601fbe667f0da582732d70c41c5)): ?>
<?php $attributes = $__attributesOriginale00eb601fbe667f0da582732d70c41c5; ?>
<?php unset($__attributesOriginale00eb601fbe667f0da582732d70c41c5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale00eb601fbe667f0da582732d70c41c5)): ?>
<?php $component = $__componentOriginale00eb601fbe667f0da582732d70c41c5; ?>
<?php unset($__componentOriginale00eb601fbe667f0da582732d70c41c5); ?>
<?php endif; ?>
                                <?php endif; ?>
                                
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_users')): ?>
                                <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['as' => 'a','href' => ''.e(route('users.edit', $user->id)).'','variant' => 'soft-secondary','class' => 'w-10 h-10 rounded-xl p-0 flex items-center justify-center transition-all hover:bg-info/10 hover:text-info hover:scale-110 shadow-sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['as' => 'a','href' => ''.e(route('users.edit', $user->id)).'','variant' => 'soft-secondary','class' => 'w-10 h-10 rounded-xl p-0 flex items-center justify-center transition-all hover:bg-info/10 hover:text-info hover:scale-110 shadow-sm']); ?>
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Pencil','class' => 'w-5 h-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Pencil','class' => 'w-5 h-5']); ?>
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
<?php if (isset($__attributesOriginale00eb601fbe667f0da582732d70c41c5)): ?>
<?php $attributes = $__attributesOriginale00eb601fbe667f0da582732d70c41c5; ?>
<?php unset($__attributesOriginale00eb601fbe667f0da582732d70c41c5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale00eb601fbe667f0da582732d70c41c5)): ?>
<?php $component = $__componentOriginale00eb601fbe667f0da582732d70c41c5; ?>
<?php unset($__componentOriginale00eb601fbe667f0da582732d70c41c5); ?>
<?php endif; ?>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_users')): ?>
                                <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['variant' => 'soft-danger','class' => 'w-10 h-10 rounded-xl p-0 flex items-center justify-center transition-all hover:bg-danger hover:text-white hover:scale-110 shadow-sm delete-btn','dataId' => ''.e($user->id).'','dataName' => ''.e($user->name).'','dataDeleteUrl' => ''.e(route('users.destroy', $user->id)).'','dataTwToggle' => 'modal','dataTwTarget' => '#delete-confirmation-modal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'soft-danger','class' => 'w-10 h-10 rounded-xl p-0 flex items-center justify-center transition-all hover:bg-danger hover:text-white hover:scale-110 shadow-sm delete-btn','data-id' => ''.e($user->id).'','data-name' => ''.e($user->name).'','data-delete-url' => ''.e(route('users.destroy', $user->id)).'','data-tw-toggle' => 'modal','data-tw-target' => '#delete-confirmation-modal']); ?>
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Trash2','class' => 'w-5 h-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Trash2','class' => 'w-5 h-5']); ?>
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
<?php if (isset($__attributesOriginale00eb601fbe667f0da582732d70c41c5)): ?>
<?php $attributes = $__attributesOriginale00eb601fbe667f0da582732d70c41c5; ?>
<?php unset($__attributesOriginale00eb601fbe667f0da582732d70c41c5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale00eb601fbe667f0da582732d70c41c5)): ?>
<?php $component = $__componentOriginale00eb601fbe667f0da582732d70c41c5; ?>
<?php unset($__componentOriginale00eb601fbe667f0da582732d70c41c5); ?>
<?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="px-8 py-32 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-24 h-24 bg-slate-50 dark:bg-darkmode-600 rounded-[3rem] flex items-center justify-center mb-8 shadow-inner">
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Search','class' => 'w-12 h-12 text-slate-200']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Search','class' => 'w-12 h-12 text-slate-200']); ?>
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
                                <h4 class="text-xl font-black text-slate-800 dark:text-slate-200 tracking-tight mb-2"><?php echo e(__('global.no_results_found')); ?></h4>
                                <p class="text-slate-400 font-bold text-sm"><?php echo e(__('global.try_adjusting_filters')); ?></p>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="px-10 py-10 bg-slate-50 dark:bg-darkmode-600 flex flex-col sm:flex-row items-center gap-6">
            <div class="me-auto text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">
                <?php echo e(__('global.showing')); ?> <?php echo e($users->firstItem() ?? 0); ?> <?php echo e(__('global.to')); ?> <?php echo e($users->lastItem() ?? 0); ?> <?php echo e(__('global.of')); ?> <?php echo e($users->total()); ?> <?php echo e(__('global.entries')); ?>

            </div>
            <div class="pagination-container">
                <?php echo e($users->links()); ?>

            </div>
        </div>
    </div>

    <!-- Toggle Confirmation Modal -->
    <?php if (isset($component)) { $__componentOriginalad7e71e98d6bc7c4deec90df8ba81dfd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalad7e71e98d6bc7c4deec90df8ba81dfd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.dialog.index','data' => ['id' => 'toggle-confirmation-modal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.dialog'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'toggle-confirmation-modal']); ?>
        <?php if (isset($component)) { $__componentOriginal231386b9e8f52ce181634663542c77d5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal231386b9e8f52ce181634663542c77d5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.dialog.panel','data' => ['class' => 'p-0 overflow-hidden rounded-[3rem] border-0 shadow-2xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.dialog.panel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-0 overflow-hidden rounded-[3rem] border-0 shadow-2xl']); ?>
            <div class="p-12 text-center relative">
                <div class="absolute top-0 right-0 p-10 opacity-5">
                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'AlertCircle','class' => 'w-48 h-48 text-warning']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'AlertCircle','class' => 'w-48 h-48 text-warning']); ?>
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
                
                <div class="w-24 h-24 rounded-[2.5rem] bg-warning/10 flex items-center justify-center text-warning mx-auto mb-10 shadow-inner relative z-10">
                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'ToggleLeft','class' => 'w-12 h-12']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'ToggleLeft','class' => 'w-12 h-12']); ?>
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
                
                <div class="relative z-10">
                    <h3 class="text-3xl font-black text-slate-800 dark:text-slate-200 tracking-tight mb-4"><?php echo e(__('global.confirm_toggle_title')); ?></h3>
                    <p id="toggleUserName" class="text-slate-500 font-bold text-lg leading-relaxed mb-2"></p>
                    <p id="toggleActionText" class="text-warning font-black text-xl tracking-tight mb-12"></p>
                </div>

                <div class="flex justify-center gap-4 relative z-10">
                    <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['type' => 'button','dataTwDismiss' => 'modal','variant' => 'outline-secondary','class' => 'px-10 py-4 rounded-2xl font-black uppercase tracking-widest text-[10px] border-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','data-tw-dismiss' => 'modal','variant' => 'outline-secondary','class' => 'px-10 py-4 rounded-2xl font-black uppercase tracking-widest text-[10px] border-2']); ?>
                        <?php echo e(__('global.cancel')); ?>

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
                    <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['type' => 'button','id' => 'confirmToggleBtn','variant' => 'warning','class' => 'px-10 py-4 rounded-2xl font-black uppercase tracking-widest text-[10px] shadow-xl shadow-warning/20']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','id' => 'confirmToggleBtn','variant' => 'warning','class' => 'px-10 py-4 rounded-2xl font-black uppercase tracking-widest text-[10px] shadow-xl shadow-warning/20']); ?>
                        <?php echo e(__('global.confirm')); ?>

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
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal231386b9e8f52ce181634663542c77d5)): ?>
<?php $attributes = $__attributesOriginal231386b9e8f52ce181634663542c77d5; ?>
<?php unset($__attributesOriginal231386b9e8f52ce181634663542c77d5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal231386b9e8f52ce181634663542c77d5)): ?>
<?php $component = $__componentOriginal231386b9e8f52ce181634663542c77d5; ?>
<?php unset($__componentOriginal231386b9e8f52ce181634663542c77d5); ?>
<?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalad7e71e98d6bc7c4deec90df8ba81dfd)): ?>
<?php $attributes = $__attributesOriginalad7e71e98d6bc7c4deec90df8ba81dfd; ?>
<?php unset($__attributesOriginalad7e71e98d6bc7c4deec90df8ba81dfd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad7e71e98d6bc7c4deec90df8ba81dfd)): ?>
<?php $component = $__componentOriginalad7e71e98d6bc7c4deec90df8ba81dfd; ?>
<?php unset($__componentOriginalad7e71e98d6bc7c4deec90df8ba81dfd); ?>
<?php endif; ?>

    <!-- Delete Confirmation Modal -->
    <?php if (isset($component)) { $__componentOriginalad7e71e98d6bc7c4deec90df8ba81dfd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalad7e71e98d6bc7c4deec90df8ba81dfd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.dialog.index','data' => ['id' => 'delete-confirmation-modal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.dialog'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'delete-confirmation-modal']); ?>
        <?php if (isset($component)) { $__componentOriginal231386b9e8f52ce181634663542c77d5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal231386b9e8f52ce181634663542c77d5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.dialog.panel','data' => ['class' => 'p-0 overflow-hidden rounded-[3rem] border-0 shadow-2xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.dialog.panel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-0 overflow-hidden rounded-[3rem] border-0 shadow-2xl']); ?>
            <div class="p-12 text-center relative">
                <div class="absolute top-0 right-0 p-10 opacity-5">
                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Trash2','class' => 'w-48 h-48 text-danger']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Trash2','class' => 'w-48 h-48 text-danger']); ?>
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
                
                <div class="w-24 h-24 rounded-[2.5rem] bg-danger/10 flex items-center justify-center text-danger mx-auto mb-10 shadow-inner relative z-10">
                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'XCircle','class' => 'w-12 h-12']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'XCircle','class' => 'w-12 h-12']); ?>
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
                
                <div class="relative z-10">
                    <h3 class="text-3xl font-black text-slate-800 dark:text-slate-200 tracking-tight mb-4"><?php echo e(__('global.are_you_sure')); ?></h3>
                    <p class="text-slate-500 font-bold text-lg leading-relaxed mb-2"><?php echo e(__('global.delete_user_warning')); ?></p>
                    <div id="deleteUserName" class="text-danger font-black text-2xl tracking-tight mb-12"></div>
                </div>

                <div class="flex justify-center gap-4 relative z-10">
                    <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['type' => 'button','dataTwDismiss' => 'modal','variant' => 'outline-secondary','class' => 'px-10 py-4 rounded-2xl font-black uppercase tracking-widest text-[10px] border-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','data-tw-dismiss' => 'modal','variant' => 'outline-secondary','class' => 'px-10 py-4 rounded-2xl font-black uppercase tracking-widest text-[10px] border-2']); ?>
                        <?php echo e(__('global.cancel')); ?>

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
                    <form id="deleteForm" method="POST" action="">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['type' => 'submit','variant' => 'danger','class' => 'px-10 py-4 rounded-2xl font-black uppercase tracking-widest text-[10px] shadow-xl shadow-danger/20']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','variant' => 'danger','class' => 'px-10 py-4 rounded-2xl font-black uppercase tracking-widest text-[10px] shadow-xl shadow-danger/20']); ?>
                            <?php echo e(__('global.confirm_delete')); ?>

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
                    </form>
                </div>
            </div>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal231386b9e8f52ce181634663542c77d5)): ?>
<?php $attributes = $__attributesOriginal231386b9e8f52ce181634663542c77d5; ?>
<?php unset($__attributesOriginal231386b9e8f52ce181634663542c77d5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal231386b9e8f52ce181634663542c77d5)): ?>
<?php $component = $__componentOriginal231386b9e8f52ce181634663542c77d5; ?>
<?php unset($__componentOriginal231386b9e8f52ce181634663542c77d5); ?>
<?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalad7e71e98d6bc7c4deec90df8ba81dfd)): ?>
<?php $attributes = $__attributesOriginalad7e71e98d6bc7c4deec90df8ba81dfd; ?>
<?php unset($__attributesOriginalad7e71e98d6bc7c4deec90df8ba81dfd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad7e71e98d6bc7c4deec90df8ba81dfd)): ?>
<?php $component = $__componentOriginalad7e71e98d6bc7c4deec90df8ba81dfd; ?>
<?php unset($__componentOriginalad7e71e98d6bc7c4deec90df8ba81dfd); ?>
<?php endif; ?>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/pages/users.js']); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle delete button clicks
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const name = this.getAttribute('data-name');
                    const deleteUrl = this.getAttribute('data-delete-url');
                    
                    const nameElement = document.getElementById('deleteUserName');
                    if (nameElement) nameElement.textContent = name;
                    
                    const formElement = document.getElementById('deleteForm');
                    if (formElement && deleteUrl) {
                        formElement.action = deleteUrl;
                    }
                });
            });

            // Handle AJAX toggles with confirmation
            let pendingToggle = null;
            const toggleModal = document.getElementById('toggle-confirmation-modal');
            const confirmToggleBtn = document.getElementById('confirmToggleBtn');
            const toggleUserName = document.getElementById('toggleUserName');
            const toggleActionText = document.getElementById('toggleActionText');

            // Status toggles
            document.querySelectorAll('.status-toggle').forEach(toggle => {
                toggle.addEventListener('change', function(e) {
                    e.preventDefault();
                    const url = this.dataset.url;
                    const userName = this.closest('tr').querySelector('.font-black')?.textContent || '';
                    const newStatus = this.checked ? '<?php echo e(__("global.active")); ?>' : '<?php echo e(__("global.inactive")); ?>';
                    
                    pendingToggle = {
                        element: this,
                        url: url,
                        type: 'status',
                        newValue: this.checked
                    };

                    if (toggleUserName) toggleUserName.textContent = userName;
                    if (toggleActionText) toggleActionText.textContent = '<?php echo e(__("global.change_status_to")); ?>: ' + newStatus;
                    
                    // Show modal
                    const modalInstance = tailwind.Modal.getOrCreateInstance(toggleModal);
                    modalInstance.show();
                });
            });

            // Verification toggles
            document.querySelectorAll('.verification-toggle').forEach(toggle => {
                toggle.addEventListener('change', function(e) {
                    e.preventDefault();
                    const url = this.dataset.url;
                    const userName = this.closest('tr').querySelector('.font-black')?.textContent || '';
                    const newStatus = this.checked ? '<?php echo e(__("global.verified")); ?>' : '<?php echo e(__("global.unverified")); ?>';
                    
                    pendingToggle = {
                        element: this,
                        url: url,
                        type: 'verification',
                        newValue: this.checked
                    };

                    if (toggleUserName) toggleUserName.textContent = userName;
                    if (toggleActionText) toggleActionText.textContent = '<?php echo e(__("global.change_verification_to")); ?>: ' + newStatus;
                    
                    // Show modal
                    const modalInstance = tailwind.Modal.getOrCreateInstance(toggleModal);
                    modalInstance.show();
                });
            });

            // Confirm toggle action
            if (confirmToggleBtn) {
                confirmToggleBtn.addEventListener('click', async function() {
                    if (!pendingToggle) return;

                    const { element, url, type } = pendingToggle;
                    const label = element.closest('.flex-col')?.querySelector('label');
                    
                    try {
                        const response = await fetch(url, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                            }
                        });

                        const data = await response.json();
                        if (data.success) {
                            // Update label text
                            if (type === 'status' && label) {
                                label.textContent = data.is_active ? '<?php echo e(__("global.active")); ?>' : '<?php echo e(__("global.inactive")); ?>';
                            } else if (type === 'verification' && label) {
                                label.textContent = data.is_verified ? '<?php echo e(__("global.verified")); ?>' : '<?php echo e(__("global.unverified")); ?>';
                            }
                            
                            // Show success toast if available
                            if (typeof Toastify !== 'undefined') {
                                Toastify({
                                    text: data.message,
                                    duration: 3000,
                                    gravity: "top",
                                    position: "right",
                                    style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
                                }).showToast();
                            }
                        } else {
                            // Revert checkbox on failure
                            element.checked = !element.checked;
                        }
                    } catch (error) {
                        element.checked = !element.checked;
                        if (typeof Toastify !== 'undefined') {
                            Toastify({
                                text: '<?php echo e(__("global.error_occurred")); ?>',
                                duration: 3000,
                                gravity: "top",
                                position: "right",
                                style: { background: "linear-gradient(to right, #ff5f6d, #ffc371)" }
                            }).showToast();
                        }
                    }

                    // Close modal
                    const modalInstance = tailwind.Modal.getOrCreateInstance(toggleModal);
                    modalInstance.hide();
                    pendingToggle = null;
                });
            }

            // Cancel toggle - revert checkbox
            toggleModal?.addEventListener('hidden.tw.modal', function() {
                if (pendingToggle) {
                    pendingToggle.element.checked = !pendingToggle.element.checked;
                    pendingToggle = null;
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../themes/' . $activeTheme . '/' . $activeLayout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\backup\Source\resources\views/pages/users/index.blade.php ENDPATH**/ ?>