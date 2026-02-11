

<?php $__env->startSection('head'); ?>
    <title><?php echo e(__('Guardian.show')); ?> - Laravel</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto"><?php echo e(__('global.guardian_profile')); ?></h2>
        <div class="ml-auto flex gap-2">
            <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['variant' => 'secondary','as' => 'a','href' => ''.e(route('guardians.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'secondary','as' => 'a','href' => ''.e(route('guardians.index')).'']); ?>
                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'ArrowLeft','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'ArrowLeft','class' => 'w-4 h-4 mr-2']); ?>
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
                <?php echo e(__('global.back')); ?>

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
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_guardians')): ?>
            <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['variant' => 'primary','as' => 'a','href' => ''.e(route('guardians.edit', $parents->id)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'primary','as' => 'a','href' => ''.e(route('guardians.edit', $parents->id)).'']); ?>
                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Pencil','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Pencil','class' => 'w-4 h-4 mr-2']); ?>
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
                <?php echo e(__('global.edit')); ?>

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
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-4">
            <div class="box p-5">
                <div class="flex items-center">
                    <div class="w-16 h-16 rounded-full overflow-hidden">
                        <?php if($parents->photo): ?>
                            <img src="<?php echo e(asset('storage/'.$parents->photo)); ?>" class="w-full h-full object-cover" alt="<?php echo e($parents->name); ?>">
                        <?php else: ?>
                            <div class="w-16 h-16 bg-primary/10 flex items-center justify-center text-primary font-bold">
                                <?php echo e(strtoupper(substr($parents->name, 0, 1))); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="ml-4">
                        <div class="text-base font-medium"><?php echo e($parents->name); ?></div>
                        <div class="text-slate-500 text-sm">
                            <?php echo e($parents->relationship ?? __('global.not_specified')); ?>

                        </div>
                    </div>
                    <div class="ml-auto">
                        <?php if($parents->is_active ?? true): ?>
                            <span class="px-2 py-1 rounded-full text-xs bg-success/20 text-success"><?php echo e(__('global.active')); ?></span>
                        <?php else: ?>
                            <span class="px-2 py-1 rounded-full text-xs bg-danger/20 text-danger"><?php echo e(__('global.inactive')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="mt-5 space-y-2">
                    <div class="flex items-center text-sm">
                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Phone','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Phone','class' => 'w-4 h-4 mr-2']); ?>
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
                        <span><?php echo e($parents->phone ?? __('global.not_provided')); ?></span>
                    </div>
                    <div class="flex items-center text-sm">
                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Mail','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Mail','class' => 'w-4 h-4 mr-2']); ?>
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
                        <span><?php echo e($parents->email ?? __('global.not_provided')); ?></span>
                    </div>
                    <div class="flex items-center text-sm">
                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Home','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Home','class' => 'w-4 h-4 mr-2']); ?>
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
                        <span><?php echo e($parents->address ?? __('global.not_provided')); ?></span>
                    </div>
                </div>
            </div>

            <div class="box p-5 mt-5">
                <div class="text-base font-medium mb-3"><?php echo e(__('global.children')); ?></div>
                <div class="flex flex-wrap gap-2">
                    <?php $__empty_1 = true; $__currentLoopData = $parents->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <a href="<?php echo e(route('children.show', $child->id)); ?>" class="px-2 py-1 text-xs rounded-full bg-primary/10 text-primary border border-primary/20">
                            <?php echo e($child->name ?? $child->first_name); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="text-slate-500"><?php echo e(__('global.no_children_found')); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="box p-5">
                <div class="text-base font-medium mb-3"><?php echo e(__('global.contact_preferences')); ?></div>
                <div class="grid grid-cols-3 gap-4">
                    <?php if (isset($component)) { $__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4 = $attributes; } ?>
<?php $component = App\View\Components\Widgets\StatCard::resolve(['value' => ($parents->receives_sms_notifications ?? false) ? __('global.enabled') : __('global.disabled'),'icon' => 'MessageSquare'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('widgets.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Widgets\StatCard::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('global.sms_notifications'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4)): ?>
<?php $attributes = $__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4; ?>
<?php unset($__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4)): ?>
<?php $component = $__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4; ?>
<?php unset($__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4 = $attributes; } ?>
<?php $component = App\View\Components\Widgets\StatCard::resolve(['value' => ($parents->receives_email_notifications ?? false) ? __('global.enabled') : __('global.disabled'),'icon' => 'Mail'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('widgets.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Widgets\StatCard::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('global.email_notifications'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4)): ?>
<?php $attributes = $__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4; ?>
<?php unset($__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4)): ?>
<?php $component = $__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4; ?>
<?php unset($__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4 = $attributes; } ?>
<?php $component = App\View\Components\Widgets\StatCard::resolve(['value' => $parents->children->count(),'icon' => 'Users'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('widgets.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Widgets\StatCard::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('global.children_count'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4)): ?>
<?php $attributes = $__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4; ?>
<?php unset($__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4)): ?>
<?php $component = $__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4; ?>
<?php unset($__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4); ?>
<?php endif; ?>
                </div>
            </div>

            <div class="box p-5 mt-5">
                <div class="text-base font-medium mb-3"><?php echo e(__('global.activity_summary')); ?></div>
                <div class="grid grid-cols-2 gap-4">
                    <?php $__currentLoopData = $parents->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="p-3 border rounded">
                            <div class="font-medium"><?php echo e($child->name); ?></div>
                            <div class="text-xs text-slate-500">
                                <?php echo e(__('global.class')); ?>: <?php echo e(optional($child->class)->name ?? '-'); ?>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if($parents->children->isEmpty()): ?>
                        <div class="text-slate-500"><?php echo e(__('global.no_data')); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../themes/' . $activeTheme . '/' . $activeLayout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views\pages\guardians\show.blade.php ENDPATH**/ ?>