

<?php $__env->startSection('head'); ?>
    <title><?php echo e(__('Payment.show')); ?> - Laravel</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto"><?php echo e(__('global.payment_details')); ?></h2>
        <div class="ml-auto flex gap-2">
            <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['variant' => 'secondary','as' => 'a','href' => ''.e(route('payments.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'secondary','as' => 'a','href' => ''.e(route('payments.index')).'']); ?>
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
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_payments')): ?>
            <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['variant' => 'primary','as' => 'a','href' => ''.e(route('payments.edit', $payment->id)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'primary','as' => 'a','href' => ''.e(route('payments.edit', $payment->id)).'']); ?>
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
                <div class="flex items-start">
                    <div>
                        <div class="text-base font-medium">
                            <a href="<?php echo e(route('children.show', $payment->child->id)); ?>" class="text-primary">
                                <?php echo e(optional($payment->child)->name ?? optional($payment->child)->first_name ?? '-'); ?>

                            </a>
                        </div>
                        <div class="text-slate-500 text-sm">
                            <?php echo e(optional(optional($payment->child)->class)->name ?? '-'); ?>

                        </div>
                    </div>
                    <div class="ml-auto">
                        <?php
                            $status = $payment->status ?? 'completed';
                            $badgeColor = match($status) {
                                'completed' => 'success',
                                'pending' => 'warning',
                                'failed' => 'danger',
                                default => 'slate',
                            };
                        ?>
                        <span class="px-2 py-1 rounded-full text-xs bg-<?php echo e($badgeColor); ?>/20 text-<?php echo e($badgeColor); ?>"><?php echo e(ucfirst($status)); ?></span>
                    </div>
                </div>
                <div class="mt-5 grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <div class="text-xs text-slate-500"><?php echo e(__('global.amount')); ?></div>
                        <div class="font-medium"><?php echo e(number_format($payment->amount ?? 0, 2)); ?></div>
                    </div>
                    <div>
                        <div class="text-xs text-slate-500"><?php echo e(__('global.method')); ?></div>
                        <div class="font-medium"><?php echo e($payment->payment_method ?? '-'); ?></div>
                    </div>
                    <div>
                        <div class="text-xs text-slate-500"><?php echo e(__('global.date')); ?></div>
                        <div class="font-medium"><?php echo e(optional($payment->payment_date)->format('Y-m-d') ?? '-'); ?></div>
                    </div>
                    <div>
                        <div class="text-xs text-slate-500"><?php echo e(__('global.reference')); ?></div>
                        <div class="font-medium"><?php echo e($payment->reference_number ?? '-'); ?></div>
                    </div>
                </div>
            </div>

            <div class="box p-5 mt-5">
                <div class="text-base font-medium mb-3"><?php echo e(__('global.fee')); ?></div>
                <div class="text-sm">
                    <?php echo e(optional($payment->fee)->name ?? __('global.not_specified')); ?>

                </div>
            </div>
        </div>

        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="box p-5">
                <div class="text-base font-medium mb-3"><?php echo e(__('global.summary')); ?></div>
                <div class="grid grid-cols-3 gap-4">
                    <?php if (isset($component)) { $__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4 = $attributes; } ?>
<?php $component = App\View\Components\Widgets\StatCard::resolve(['value' => $payment->amount ?? 0,'icon' => 'DollarSign'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('widgets.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Widgets\StatCard::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('global.amount'))]); ?>
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
<?php $component = App\View\Components\Widgets\StatCard::resolve(['value' => optional($payment->payment_date)->format('Y-m-d') ?? '-','icon' => 'Calendar'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('widgets.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Widgets\StatCard::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('global.date'))]); ?>
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
<?php $component = App\View\Components\Widgets\StatCard::resolve(['value' => $payment->receipt_number ?? '-','icon' => 'FileText'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('widgets.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Widgets\StatCard::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('global.receipt'))]); ?>
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
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../themes/' . $activeTheme . '/' . $activeLayout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views\pages\payments\show.blade.php ENDPATH**/ ?>