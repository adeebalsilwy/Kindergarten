

<?php $__env->startSection('head'); ?>
    <title><?php echo e(__('Children.show')); ?> - Laravel</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto"><?php echo e(__('global.child_profile')); ?></h2>
        <div class="ml-auto flex gap-2">
            <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['variant' => 'secondary','as' => 'a','href' => ''.e(route('children.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'secondary','as' => 'a','href' => ''.e(route('children.index')).'']); ?>
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
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_children')): ?>
            <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['variant' => 'primary','as' => 'a','href' => ''.e(route('children.edit', $children->id)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'primary','as' => 'a','href' => ''.e(route('children.edit', $children->id)).'']); ?>
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
                        <?php if($children->photo_path): ?>
                            <img src="<?php echo e(asset($children->photo_path)); ?>" class="w-full h-full object-cover" alt="<?php echo e($children->name); ?>">
                        <?php else: ?>
                            <div class="w-16 h-16 bg-primary/10 flex items-center justify-center text-primary font-bold">
                                <?php echo e(strtoupper(substr($children->name, 0, 1))); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="ml-4">
                        <div class="text-base font-medium"><?php echo e($children->name); ?></div>
                        <div class="text-slate-500 text-sm">
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Cake','class' => 'w-4 h-4 inline mr-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Cake','class' => 'w-4 h-4 inline mr-1']); ?>
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
                            <?php echo e($children->age); ?> <?php echo e(__('global.years_old')); ?>

                        </div>
                    </div>
                    <div class="ml-auto">
                        <span class="px-2 py-1 rounded-full text-xs bg-slate-200">
                            <?php echo e($children->enrollment_status); ?>

                        </span>
                    </div>
                </div>
                <div class="mt-5 grid grid-cols-2 gap-4">
                    <div>
                        <div class="text-xs text-slate-500"><?php echo e(__('global.class')); ?></div>
                        <div class="font-medium"><?php echo e($children->class->name ?? '-'); ?></div>
                    </div>
                    <div>
                        <div class="text-xs text-slate-500"><?php echo e(__('global.fees_balance')); ?></div>
                        <div class="font-medium <?php echo e(($children->fees_required - $children->fees_paid) > 0 ? 'text-danger' : 'text-success'); ?>">
                            <?php echo e(number_format(($children->fees_required - $children->fees_paid), 2)); ?>

                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <?php
                        $paymentPercentage = $children->fees_required > 0 ? min(100, ($children->fees_paid / $children->fees_required) * 100) : 0;
                    ?>
                    <?php if (isset($component)) { $__componentOriginal45d7bf8d551a6d1d9f75fec57cee765c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal45d7bf8d551a6d1d9f75fec57cee765c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.progress.bar.index','data' => ['value' => $paymentPercentage]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.progress.bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($paymentPercentage)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal45d7bf8d551a6d1d9f75fec57cee765c)): ?>
<?php $attributes = $__attributesOriginal45d7bf8d551a6d1d9f75fec57cee765c; ?>
<?php unset($__attributesOriginal45d7bf8d551a6d1d9f75fec57cee765c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45d7bf8d551a6d1d9f75fec57cee765c)): ?>
<?php $component = $__componentOriginal45d7bf8d551a6d1d9f75fec57cee765c; ?>
<?php unset($__componentOriginal45d7bf8d551a6d1d9f75fec57cee765c); ?>
<?php endif; ?>
                    <div class="text-xs text-right mt-1"><?php echo e(number_format($paymentPercentage, 1)); ?>%</div>
                </div>
            </div>

            <div class="box p-5 mt-5">
                <div class="text-base font-medium mb-3"><?php echo e(__('global.parents')); ?></div>
                <div class="space-y-3">
                    <?php if($children->parent): ?>
                        <div class="flex items-center">
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'User','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'User','class' => 'w-4 h-4 mr-2']); ?>
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
                            <div>
                                <div class="font-medium"><?php echo e($children->parent->name); ?></div>
                                <?php if($children->parent->phone): ?>
                                    <div class="text-xs text-slate-500"><?php echo e($children->parent->phone); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if($children->secondParent): ?>
                        <div class="flex items-center">
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'User','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'User','class' => 'w-4 h-4 mr-2']); ?>
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
                            <div>
                                <div class="font-medium"><?php echo e($children->secondParent->name); ?></div>
                                <?php if($children->secondParent->phone): ?>
                                    <div class="text-xs text-slate-500"><?php echo e($children->secondParent->phone); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="box p-5">
                <div class="text-base font-medium mb-3"><?php echo e(__('global.attendance_summary')); ?></div>
                <div class="grid grid-cols-3 gap-4">
                    <?php if (isset($component)) { $__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4 = $attributes; } ?>
<?php $component = App\View\Components\Widgets\StatCard::resolve(['value' => $children->attendances()->where('status','present')->count(),'icon' => 'CheckCircle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('widgets.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Widgets\StatCard::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('global.present'))]); ?>
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
<?php $component = App\View\Components\Widgets\StatCard::resolve(['value' => $children->attendances()->where('status','absent')->count(),'icon' => 'XCircle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('widgets.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Widgets\StatCard::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('global.absent'))]); ?>
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
<?php $component = App\View\Components\Widgets\StatCard::resolve(['value' => $children->attendances()->where('status','late')->count(),'icon' => 'Clock'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('widgets.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Widgets\StatCard::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('global.late'))]); ?>
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
                <div class="text-base font-medium mb-3"><?php echo e(__('global.activities')); ?></div>
                <div class="grid grid-cols-2 gap-4">
                    <?php $__empty_1 = true; $__currentLoopData = $children->activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="p-3 border rounded">
                            <div class="font-medium"><?php echo e($activity->title ?? $activity->name); ?></div>
                            <div class="text-xs text-slate-500"><?php echo e(optional($activity->teacher)->name); ?></div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="text-slate-500"><?php echo e(__('global.no_activities')); ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="box p-5 mt-5">
                <div class="text-base font-medium mb-3"><?php echo e(__('global.events')); ?></div>
                <div class="grid grid-cols-2 gap-4">
                    <?php $__empty_1 = true; $__currentLoopData = $children->events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="p-3 border rounded">
                            <div class="font-medium"><?php echo e($event->title ?? $event->name); ?></div>
                            <div class="text-xs text-slate-500"><?php echo e(\Carbon\Carbon::parse($event->date ?? $event->start_date)->format('Y-m-d')); ?></div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="text-slate-500"><?php echo e(__('global.no_events')); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../themes/' . $activeTheme . '/' . $activeLayout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views\pages\children\show.blade.php ENDPATH**/ ?>