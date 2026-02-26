<?php $__env->startSection('head'); ?>
    <title><?php echo e(__('Children.show')); ?> - <?php echo e($children->name); ?></title>
    <style>
        .tab-content { display: none; }
        .tab-content.active { display: block; }
        .tab-button.active { background-color: #3b82f6; color: white; }
        .info-card { transition: all 0.3s ease; }
        .info-card:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">
            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'User','class' => 'w-5 h-5 inline me-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'User','class' => 'w-5 h-5 inline me-2']); ?>
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
            <?php echo e(__('global.child_profile')); ?> - <?php echo e($children->name); ?>

        </h2>
        <div class="ms-auto flex gap-2">
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'ArrowLeft','class' => 'w-4 h-4 me-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'ArrowLeft','class' => 'w-4 h-4 me-2']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Pencil','class' => 'w-4 h-4 me-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Pencil','class' => 'w-4 h-4 me-2']); ?>
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

    <!-- Tab Navigation -->
    <div class="intro-y mt-5">
        <div class="border-b border-slate-200">
            <nav class="flex space-x-2 overflow-x-auto">
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg active" data-tab="overview">
                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Layout','class' => 'w-4 h-4 me-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Layout','class' => 'w-4 h-4 me-2']); ?>
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
                    <?php echo e(__('global.overview')); ?>

                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="personal">
                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'User','class' => 'w-4 h-4 me-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'User','class' => 'w-4 h-4 me-2']); ?>
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
                    <?php echo e(__('global.personal_info')); ?>

                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="parents">
                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Users','class' => 'w-4 h-4 me-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Users','class' => 'w-4 h-4 me-2']); ?>
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
                    <?php echo e(__('global.parents')); ?>

                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="class">
                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Home','class' => 'w-4 h-4 me-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Home','class' => 'w-4 h-4 me-2']); ?>
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
                    <?php echo e(__('global.class_info')); ?>

                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="attendance">
                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Clock','class' => 'w-4 h-4 me-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Clock','class' => 'w-4 h-4 me-2']); ?>
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
                    <?php echo e(__('global.attendance')); ?>

                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="grades">
                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Award','class' => 'w-4 h-4 me-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Award','class' => 'w-4 h-4 me-2']); ?>
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
                    <?php echo e(__('global.grades')); ?>

                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="payments">
                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'DollarSign','class' => 'w-4 h-4 me-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'DollarSign','class' => 'w-4 h-4 me-2']); ?>
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
                    <?php echo e(__('global.payments')); ?>

                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="activities">
                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Calendar','class' => 'w-4 h-4 me-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Calendar','class' => 'w-4 h-4 me-2']); ?>
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
                    <?php echo e(__('global.activities')); ?>

                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="events">
                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'CalendarEvent','class' => 'w-4 h-4 me-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'CalendarEvent','class' => 'w-4 h-4 me-2']); ?>
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
                    <?php echo e(__('global.events')); ?>

                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="medical">
                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Heart','class' => 'w-4 h-4 me-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Heart','class' => 'w-4 h-4 me-2']); ?>
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
                    <?php echo e(__('global.medical_info')); ?>

                </button>
            </nav>
        </div>
    </div>

    <!-- Tab Content -->
    <div class="mt-5">
        <!-- Overview Tab -->
        <div id="overview" class="tab-content active">
            <div class="grid grid-cols-12 gap-6">
                <!-- Profile Card -->
                <div class="intro-y col-span-12 lg:col-span-4">
                    <div class="box p-5 info-card">
                        <div class="flex items-center">
                            <div class="w-20 h-20 rounded-full overflow-hidden border-4 border-primary/20">
                                <?php if($children->photo_path): ?>
                                    <img src="<?php echo e(asset($children->photo_path)); ?>" class="w-full h-full object-cover" alt="<?php echo e($children->name); ?>">
                                <?php else: ?>
                                    <div class="w-full h-full bg-primary/10 flex items-center justify-center text-primary font-bold text-2xl">
                                        <?php echo e(strtoupper(substr($children->name, 0, 2))); ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="ms-4 flex-1">
                                <div class="text-xl font-bold"><?php echo e($children->name); ?></div>
                                <div class="text-slate-500 flex items-center mt-1">
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Cake','class' => 'w-4 h-4 me-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Cake','class' => 'w-4 h-4 me-1']); ?>
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
                                <div class="text-slate-500 text-sm mt-1">
                                    <?php echo e($children->gender); ?> • <?php echo e($children->nationality ?? 'Not specified'); ?>

                                </div>
                            </div>
                            <div class="ms-auto">
                                <span class="px-3 py-1 rounded-full text-sm font-medium 
                                    <?php echo e($children->enrollment_status === 'active' ? 'bg-success/20 text-success' : 'bg-warning/20 text-warning'); ?>">
                                    <?php echo e(ucfirst($children->enrollment_status)); ?>

                                </span>
                            </div>
                        </div>
                        
                        <div class="mt-6 grid grid-cols-2 gap-4">
                            <div class="text-center p-3 bg-slate-50 rounded-lg">
                                <div class="text-2xl font-bold text-primary"><?php echo e($children->class->name ?? 'Not assigned'); ?></div>
                                <div class="text-xs text-slate-500"><?php echo e(__('global.class')); ?></div>
                            </div>
                            <div class="text-center p-3 bg-slate-50 rounded-lg">
                                <div class="text-2xl font-bold <?php echo e($children->balance > 0 ? 'text-danger' : 'text-success'); ?>">
                                    <?php echo e(number_format(abs($children->balance), 2)); ?>

                                </div>
                                <div class="text-xs text-slate-500"><?php echo e($children->balance > 0 ? __('global.balance_due') : __('global.overpaid')); ?></div>
                            </div>
                        </div>
                        
                        <div class="mt-5">
                            <div class="text-sm text-slate-500 mb-2"><?php echo e(__('global.payment_progress')); ?></div>
                            <?php
                                $paymentPercentage = $children->fees_required > 0 ? min(100, ($children->fees_paid / $children->fees_required) * 100) : 0;
                            ?>
                            <?php if (isset($component)) { $__componentOriginal45d7bf8d551a6d1d9f75fec57cee765c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal45d7bf8d551a6d1d9f75fec57cee765c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.progress.bar.index','data' => ['value' => $paymentPercentage,'class' => 'h-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.progress.bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($paymentPercentage),'class' => 'h-2']); ?>
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
                            <div class="text-xs text-end mt-1"><?php echo e(number_format($paymentPercentage, 1)); ?>% <?php echo e(__('global.completed')); ?></div>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="box p-5 mt-5">
                        <div class="text-base font-medium mb-4"><?php echo e(__('global.quick_stats')); ?></div>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="text-center p-2 bg-blue-50 rounded">
                                <div class="text-lg font-bold text-blue-600"><?php echo e($children->attendances()->where('status', 'present')->count()); ?></div>
                                <div class="text-xs text-slate-500"><?php echo e(__('global.present_days')); ?></div>
                            </div>
                            <div class="text-center p-2 bg-red-50 rounded">
                                <div class="text-lg font-bold text-red-600"><?php echo e($children->attendances()->where('status', 'absent')->count()); ?></div>
                                <div class="text-xs text-slate-500"><?php echo e(__('global.absent_days')); ?></div>
                            </div>
                            <div class="text-center p-2 bg-yellow-50 rounded">
                                <div class="text-lg font-bold text-yellow-600"><?php echo e($children->attendances()->where('status', 'late')->count()); ?></div>
                                <div class="text-xs text-slate-500"><?php echo e(__('global.late_days')); ?></div>
                            </div>
                            <div class="text-center p-2 bg-green-50 rounded">
                                <div class="text-lg font-bold text-green-600"><?php echo e($children->grades()->count()); ?></div>
                                <div class="text-xs text-slate-500"><?php echo e(__('global.grades_recorded')); ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="intro-y col-span-12 lg:col-span-8">
                    <div class="box p-5">
                        <div class="text-base font-medium mb-4"><?php echo e(__('global.recent_activity')); ?></div>
                        <div class="space-y-3">
                            <?php $__empty_1 = true; $__currentLoopData = $children->attendances()->latest()->take(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="flex items-center p-3 border rounded-lg hover:bg-slate-50">
                                    <div class="w-3 h-3 rounded-full me-3 
                                        <?php echo e($attendance->status === 'present' ? 'bg-success' : ($attendance->status === 'absent' ? 'bg-danger' : 'bg-warning')); ?>">
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-medium"><?php echo e($attendance->status); ?></div>
                                        <div class="text-xs text-slate-500"><?php echo e($attendance->date->format('M d, Y')); ?></div>
                                    </div>
                                    <?php if($attendance->check_in): ?>
                                        <div class="text-xs text-slate-500">
                                            <?php echo e($attendance->check_in->format('H:i')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="text-center py-8 text-slate-500">
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Calendar','class' => 'w-12 h-12 mx-auto mb-3 opacity-50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Calendar','class' => 'w-12 h-12 mx-auto mb-3 opacity-50']); ?>
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
                                    <p><?php echo e(__('global.no_attendance_records')); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Personal Information Tab -->
        <div id="personal" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'User','class' => 'w-5 h-5 me-2 text-primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'User','class' => 'w-5 h-5 me-2 text-primary']); ?>
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
                            <?php echo e(__('global.basic_information')); ?>

                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500"><?php echo e(__('global.name')); ?>:</span>
                                <span class="font-medium"><?php echo e($children->name); ?></span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500"><?php echo e(__('global.date_of_birth')); ?>:</span>
                                <span class="font-medium"><?php echo e($children->dob->format('F j, Y')); ?></span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500"><?php echo e(__('global.age')); ?>:</span>
                                <span class="font-medium"><?php echo e($children->age); ?> <?php echo e(__('global.years')); ?></span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500"><?php echo e(__('global.gender')); ?>:</span>
                                <span class="font-medium"><?php echo e(ucfirst($children->gender)); ?></span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500"><?php echo e(__('global.nationality')); ?>:</span>
                                <span class="font-medium"><?php echo e($children->nationality ?? 'Not specified'); ?></span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500"><?php echo e(__('global.religion')); ?>:</span>
                                <span class="font-medium"><?php echo e($children->religion ?? 'Not specified'); ?></span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500"><?php echo e(__('global.special_needs')); ?>:</span>
                                <span class="font-medium"><?php echo e($children->special_needs ?? 'None'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Calendar','class' => 'w-5 h-5 me-2 text-primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Calendar','class' => 'w-5 h-5 me-2 text-primary']); ?>
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
                            <?php echo e(__('global.enrollment_info')); ?>

                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500"><?php echo e(__('global.enrollment_date')); ?>:</span>
                                <span class="font-medium"><?php echo e($children->enrollment_date->format('F j, Y')); ?></span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500"><?php echo e(__('global.expected_graduation')); ?>:</span>
                                <span class="font-medium"><?php echo e($children->expected_graduation_date 
                                    ? $children->expected_graduation_date->format('F j, Y') 
                                    : 'N/A'); ?></span>

                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500"><?php echo e(__('global.enrollment_status')); ?>:</span>
                                <span class="font-medium px-2 py-1 rounded text-sm 
                                    <?php echo e($children->enrollment_status === 'active' ? 'bg-success/20 text-success' : 'bg-warning/20 text-warning'); ?>">
                                    <?php echo e(ucfirst($children->enrollment_status)); ?>

                                </span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500"><?php echo e(__('global.last_attended')); ?>:</span>
                                <span class="font-medium"><?php echo e($children->last_attended_at ? $children->last_attended_at->format('F j, Y H:i') : 'Never'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Parents Tab -->
        <div id="parents" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <?php if($children->parent): ?>
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'User','class' => 'w-5 h-5 me-2 text-primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'User','class' => 'w-5 h-5 me-2 text-primary']); ?>
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
                            <?php echo e(__('global.primary_parent')); ?>

                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center me-3">
                                    <span class="text-primary font-bold"><?php echo e(strtoupper(substr($children->parent->name, 0, 1))); ?></span>
                                </div>
                                <div>
                                    <div class="font-medium"><?php echo e($children->parent->name); ?></div>
                                    <div class="text-sm text-slate-500"><?php echo e($children->parent->relationship ?? 'Parent'); ?></div>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-2 mt-4">
                                <?php if($children->parent->phone): ?>
                                    <div class="flex items-center text-sm">
                                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Phone','class' => 'w-4 h-4 me-2 text-slate-500']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Phone','class' => 'w-4 h-4 me-2 text-slate-500']); ?>
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
                                        <span><?php echo e($children->parent->phone); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if($children->parent->email): ?>
                                    <div class="flex items-center text-sm">
                                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Mail','class' => 'w-4 h-4 me-2 text-slate-500']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Mail','class' => 'w-4 h-4 me-2 text-slate-500']); ?>
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
                                        <span><?php echo e($children->parent->email); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if($children->parent->address): ?>
                                    <div class="flex items-start text-sm">
                                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Home','class' => 'w-4 h-4 me-2 text-slate-500 mt-0.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Home','class' => 'w-4 h-4 me-2 text-slate-500 mt-0.5']); ?>
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
                                        <span><?php echo e($children->parent->address); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="mt-4 pt-4 border-t">
                                <a href="<?php echo e(route('guardians.show', $children->parent->id)); ?>" class="text-primary hover:underline text-sm">
                                    <?php echo e(__('global.view_full_profile')); ?>

                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'ArrowRight','class' => 'w-3 h-3 inline ms-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'ArrowRight','class' => 'w-3 h-3 inline ms-1']); ?>
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
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if($children->secondParent): ?>
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'UserPlus','class' => 'w-5 h-5 me-2 text-primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'UserPlus','class' => 'w-5 h-5 me-2 text-primary']); ?>
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
                            <?php echo e(__('global.secondary_parent')); ?>

                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full bg-secondary/10 flex items-center justify-center me-3">
                                    <span class="text-secondary font-bold"><?php echo e(strtoupper(substr($children->secondParent->name, 0, 1))); ?></span>
                                </div>
                                <div>
                                    <div class="font-medium"><?php echo e($children->secondParent->name); ?></div>
                                    <div class="text-sm text-slate-500"><?php echo e($children->secondParent->relationship ?? 'Parent'); ?></div>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-2 mt-4">
                                <?php if($children->secondParent->phone): ?>
                                    <div class="flex items-center text-sm">
                                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Phone','class' => 'w-4 h-4 me-2 text-slate-500']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Phone','class' => 'w-4 h-4 me-2 text-slate-500']); ?>
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
                                        <span><?php echo e($children->secondParent->phone); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if($children->secondParent->email): ?>
                                    <div class="flex items-center text-sm">
                                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Mail','class' => 'w-4 h-4 me-2 text-slate-500']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Mail','class' => 'w-4 h-4 me-2 text-slate-500']); ?>
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
                                        <span><?php echo e($children->secondParent->email); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if($children->secondParent->address): ?>
                                    <div class="flex items-start text-sm">
                                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Home','class' => 'w-4 h-4 me-2 text-slate-500 mt-0.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Home','class' => 'w-4 h-4 me-2 text-slate-500 mt-0.5']); ?>
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
                                        <span><?php echo e($children->secondParent->address); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="mt-4 pt-4 border-t">
                                <a href="<?php echo e(route('guardians.show', $children->secondParent->id)); ?>" class="text-primary hover:underline text-sm">
                                    <?php echo e(__('global.view_full_profile')); ?>

                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'ArrowRight','class' => 'w-3 h-3 inline ms-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'ArrowRight','class' => 'w-3 h-3 inline ms-1']); ?>
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
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if(!$children->parent && !$children->secondParent): ?>
                <div class="intro-y col-span-12">
                    <div class="box p-8 text-center">
                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Users','class' => 'w-16 h-16 mx-auto mb-4 text-slate-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Users','class' => 'w-16 h-16 mx-auto mb-4 text-slate-300']); ?>
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
                        <h3 class="text-lg font-medium text-slate-500"><?php echo e(__('global.no_parents_assigned')); ?></h3>
                        <p class="text-slate-400 mt-2"><?php echo e(__('global.assign_parents_to_view_details')); ?></p>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Class Information Tab -->
        <div id="class" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-8">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Home','class' => 'w-5 h-5 me-2 text-primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Home','class' => 'w-5 h-5 me-2 text-primary']); ?>
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
                            <?php echo e(__('global.class_details')); ?>

                        </div>
                        <?php if($children->class): ?>
                            <div class="space-y-4">
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-slate-500"><?php echo e(__('global.class_name')); ?>:</span>
                                    <span class="font-medium"><?php echo e($children->class->name); ?></span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-slate-500"><?php echo e(__('global.class_code')); ?>:</span>
                                    <span class="font-medium"><?php echo e($children->class->code ?? 'Not specified'); ?></span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-slate-500"><?php echo e(__('global.teacher')); ?>:</span>
                                    <span class="font-medium"><?php echo e($children->class->teacher->name ?? 'Not assigned'); ?></span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-slate-500"><?php echo e(__('global.age_group')); ?>:</span>
                                    <span class="font-medium"><?php echo e($children->class->age_group ?? 'Not specified'); ?></span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-slate-500"><?php echo e(__('global.capacity')); ?>:</span>
                                    <span class="font-medium"><?php echo e($children->class->capacity ?? 'Not specified'); ?></span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-slate-500"><?php echo e(__('global.current_students')); ?>:</span>
                                    <span class="font-medium"><?php echo e($children->class->current_students ?? 0); ?></span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-slate-500"><?php echo e(__('global.room_number')); ?>:</span>
                                    <span class="font-medium"><?php echo e($children->class->room_number ?? 'Not specified'); ?></span>
                                </div>
                                <div class="flex justify-between py-2">
                                    <span class="text-slate-500"><?php echo e(__('global.monthly_fee')); ?>:</span>
                                    <span class="font-medium"><?php echo e(number_format($children->class->monthly_fee ?? 0, 2)); ?></span>
                                </div>
                            </div>
                            <div class="mt-6 pt-4 border-t">
                                <a href="<?php echo e(route('classes.show', $children->class->id)); ?>" class="text-primary hover:underline">
                                    <?php echo e(__('global.view_class_details')); ?>

                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'ArrowRight','class' => 'w-4 h-4 inline ms-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'ArrowRight','class' => 'w-4 h-4 inline ms-1']); ?>
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
                            </div>
                        <?php else: ?>
                            <div class="text-center py-8">
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Home','class' => 'w-16 h-16 mx-auto mb-4 text-slate-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Home','class' => 'w-16 h-16 mx-auto mb-4 text-slate-300']); ?>
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
                                <h3 class="text-lg font-medium text-slate-500"><?php echo e(__('global.not_assigned_to_class')); ?></h3>
                                <p class="text-slate-400 mt-2"><?php echo e(__('global.assign_class_to_view_details')); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-4">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4"><?php echo e(__('global.classmates')); ?></div>
                        <div class="space-y-2 max-h-96 overflow-y-auto">
                            <?php $__empty_1 = true; $__currentLoopData = $children->class->children->where('id', '!=', $children->id)->take(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classmate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="flex items-center p-2 hover:bg-slate-50 rounded">
                                    <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center me-3">
                                        <span class="text-primary text-sm font-bold"><?php echo e(strtoupper(substr($classmate->name, 0, 1))); ?></span>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-medium text-sm"><?php echo e($classmate->name); ?></div>
                                        <div class="text-xs text-slate-500"><?php echo e($classmate->age); ?> <?php echo e(__('global.years_old')); ?></div>
                                    </div>
                                    <a href="<?php echo e(route('children.show', $classmate->id)); ?>" class="text-primary hover:underline text-xs">
                                        <?php echo e(__('global.view')); ?>

                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="text-center py-4 text-slate-500">
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Users','class' => 'w-8 h-8 mx-auto mb-2 opacity-50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Users','class' => 'w-8 h-8 mx-auto mb-2 opacity-50']); ?>
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
                                    <p class="text-sm"><?php echo e(__('global.no_classmates')); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Attendance Tab -->
        <div id="attendance" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-4">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4"><?php echo e(__('global.attendance_summary')); ?></div>
                        <div class="space-y-4">
                            <div class="text-center p-4 bg-success/10 rounded-lg">
                                <div class="text-3xl font-bold text-success"><?php echo e($children->attendances()->where('status', 'present')->count()); ?></div>
                                <div class="text-sm text-slate-600"><?php echo e(__('global.days_present')); ?></div>
                            </div>
                            <div class="text-center p-4 bg-danger/10 rounded-lg">
                                <div class="text-3xl font-bold text-danger"><?php echo e($children->attendances()->where('status', 'absent')->count()); ?></div>
                                <div class="text-sm text-slate-600"><?php echo e(__('global.days_absent')); ?></div>
                            </div>
                            <div class="text-center p-4 bg-warning/10 rounded-lg">
                                <div class="text-3xl font-bold text-warning"><?php echo e($children->attendances()->where('status', 'late')->count()); ?></div>
                                <div class="text-sm text-slate-600"><?php echo e(__('global.days_late')); ?></div>
                            </div>
                            <div class="pt-4 border-t">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-primary">
                                        <?php echo e($children->attendances()->count() > 0 ? round(($children->attendances()->where('status', 'present')->count() / $children->attendances()->count()) * 100, 1) : 0); ?>%
                                    </div>
                                    <div class="text-sm text-slate-600"><?php echo e(__('global.attendance_rate')); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-8">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center justify-between">
                            <span><?php echo e(__('global.attendance_history')); ?></span>
                            <span class="text-sm text-slate-500"><?php echo e($children->attendances()->count()); ?> <?php echo e(__('global.records')); ?></span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-left"><?php echo e(__('global.date')); ?></th>
                                        <th class="text-left"><?php echo e(__('global.status')); ?></th>
                                        <th class="text-left"><?php echo e(__('global.check_in')); ?></th>
                                        <th class="text-left"><?php echo e(__('global.check_out')); ?></th>
                                        <th class="text-left"><?php echo e(__('global.notes')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $children->attendances()->latest()->take(20)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td class="py-2"><?php echo e($attendance->date->format('M d, Y')); ?></td>
                                            <td>
                                                <span class="px-2 py-1 rounded text-xs font-medium 
                                                    <?php echo e($attendance->status === 'present' ? 'bg-success/20 text-success' : ($attendance->status === 'absent' ? 'bg-danger/20 text-danger' : 'bg-warning/20 text-warning')); ?>">
                                                    <?php echo e(ucfirst($attendance->status)); ?>

                                                </span>
                                            </td>
                                            <td><?php echo e($attendance->check_in ? $attendance->check_in->format('H:i') : '--'); ?></td>
                                            <td><?php echo e($attendance->check_out ? $attendance->check_out->format('H:i') : '--'); ?></td>
                                            <td class="text-sm text-slate-600 max-w-xs truncate"><?php echo e($attendance->notes ?? '--'); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="5" class="text-center py-8 text-slate-500">
                                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Clock','class' => 'w-12 h-12 mx-auto mb-3 opacity-50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Clock','class' => 'w-12 h-12 mx-auto mb-3 opacity-50']); ?>
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
                                                <p><?php echo e(__('global.no_attendance_records')); ?></p>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grades Tab -->
        <div id="grades" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-4">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4"><?php echo e(__('global.grade_summary')); ?></div>
                        <div class="space-y-4">
                            <div class="text-center p-4 bg-blue-50 rounded-lg">
                                <div class="text-3xl font-bold text-blue-600"><?php echo e($children->grades()->count()); ?></div>
                                <div class="text-sm text-slate-600"><?php echo e(__('global.total_grades')); ?></div>
                            </div>
                            <div class="text-center p-4 bg-green-50 rounded-lg">
                                <div class="text-3xl font-bold text-green-600">
                                    <?php echo e($children->grades()->count() > 0 ? round($children->grades()->avg('score'), 1) : 0); ?>

                                </div>
                                <div class="text-sm text-slate-600"><?php echo e(__('global.average_score')); ?></div>
                            </div>
                            <div class="text-center p-4 bg-purple-50 rounded-lg">
                                <div class="text-3xl font-bold text-purple-600">
                                    <?php echo e($children->grades->filter(function($grade) { return $grade->grade === 'A'; })->count()); ?>

                                </div>
                                <div class="text-sm text-slate-600"><?php echo e(__('global.a_grades')); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-8">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center justify-between">
                            <span><?php echo e(__('global.grade_history')); ?></span>
                            <span class="text-sm text-slate-500"><?php echo e($children->grades()->count()); ?> <?php echo e(__('global.records')); ?></span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-left"><?php echo e(__('global.date')); ?></th>
                                        <th class="text-left"><?php echo e(__('global.subject')); ?></th>
                                        <th class="text-left"><?php echo e(__('global.score')); ?></th>
                                        <th class="text-left"><?php echo e(__('global.grade')); ?></th>
                                        <th class="text-left"><?php echo e(__('global.evaluator')); ?></th>
                                        <th class="text-left"><?php echo e(__('global.comments')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $children->grades()->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td class="py-2"><?php echo e($grade->date->format('M d, Y')); ?></td>
                                            <td><?php echo e($grade->subject); ?></td>
                                            <td>
                                                <span class="font-medium"><?php echo e($grade->score); ?></span>
                                            </td>
                                            <td>
                                                <span class="px-2 py-1 rounded text-xs font-medium 
                                                    <?php echo e($grade->grade === 'A' ? 'bg-success/20 text-success' : ($grade->grade === 'B' ? 'bg-blue/20 text-blue' : ($grade->grade === 'C' ? 'bg-warning/20 text-warning' : 'bg-danger/20 text-danger'))); ?>">
                                                    <?php echo e($grade->grade); ?>

                                                </span>
                                            </td>
                                            <td><?php echo e($grade->evaluator); ?></td>
                                            <td class="text-sm text-slate-600 max-w-xs truncate"><?php echo e($grade->comments ?? '--'); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="6" class="text-center py-8 text-slate-500">
                                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Award','class' => 'w-12 h-12 mx-auto mb-3 opacity-50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Award','class' => 'w-12 h-12 mx-auto mb-3 opacity-50']); ?>
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
                                                <p><?php echo e(__('global.no_grades_recorded')); ?></p>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payments Tab -->
        <div id="payments" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-4">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4"><?php echo e(__('global.financial_summary')); ?></div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500"><?php echo e(__('global.fees_required')); ?>:</span>
                                <span class="font-medium"><?php echo e(number_format($children->fees_required, 2)); ?></span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500"><?php echo e(__('global.fees_paid')); ?>:</span>
                                <span class="font-medium text-success"><?php echo e(number_format($children->fees_paid, 2)); ?></span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500"><?php echo e(__('global.balance')); ?>:</span>
                                <span class="font-medium <?php echo e($children->balance > 0 ? 'text-danger' : 'text-success'); ?>">
                                    <?php echo e(number_format(abs($children->balance), 2)); ?>

                                </span>
                            </div>
                            <div class="pt-4">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-primary">
                                        <?php echo e($children->fees_required > 0 ? round(($children->fees_paid / $children->fees_required) * 100, 1) : 100); ?>%
                                    </div>
                                    <div class="text-sm text-slate-600"><?php echo e(__('global.payment_completion')); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-8">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center justify-between">
                            <span><?php echo e(__('global.payment_history')); ?></span>
                            <span class="text-sm text-slate-500"><?php echo e($children->payments()->count()); ?> <?php echo e(__('global.payments')); ?></span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-left"><?php echo e(__('global.date')); ?></th>
                                        <th class="text-left"><?php echo e(__('global.amount')); ?></th>
                                        <th class="text-left"><?php echo e(__('global.method')); ?></th>
                                        <th class="text-left"><?php echo e(__('global.status')); ?></th>
                                        <th class="text-left"><?php echo e(__('global.reference')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $children->payments()->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td class="py-2"><?php echo e($payment->payment_date->format('M d, Y')); ?></td>
                                            <td class="font-medium"><?php echo e(number_format($payment->amount, 2)); ?></td>
                                            <td><?php echo e(ucfirst($payment->payment_method ?? 'Not specified')); ?></td>
                                            <td>
                                                <span class="px-2 py-1 rounded text-xs font-medium 
                                                    <?php echo e($payment->status === 'completed' ? 'bg-success/20 text-success' : ($payment->status === 'pending' ? 'bg-warning/20 text-warning' : 'bg-danger/20 text-danger')); ?>">
                                                    <?php echo e(ucfirst($payment->status ?? 'unknown')); ?>

                                                </span>
                                            </td>
                                            <td class="text-sm text-slate-600"><?php echo e($payment->reference_number ?? '--'); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="5" class="text-center py-8 text-slate-500">
                                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'DollarSign','class' => 'w-12 h-12 mx-auto mb-3 opacity-50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'DollarSign','class' => 'w-12 h-12 mx-auto mb-3 opacity-50']); ?>
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
                                                <p><?php echo e(__('global.no_payments_recorded')); ?></p>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Activities Tab -->
        <div id="activities" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center justify-between">
                            <span><?php echo e(__('global.activities_participation')); ?></span>
                            <span class="text-sm text-slate-500"><?php echo e($children->activities()->count()); ?> <?php echo e(__('global.activities')); ?></span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <?php $__empty_1 = true; $__currentLoopData = $children->activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="flex items-start justify-between mb-3">
                                        <h3 class="font-medium text-lg"><?php echo e($activity->title ?? $activity->name); ?></h3>
                                        <span class="px-2 py-1 rounded text-xs 
                                            <?php echo e($activity->is_active ? 'bg-success/20 text-success' : 'bg-slate-200 text-slate-600'); ?>">
                                            <?php echo e($activity->is_active ? __('global.active') : __('global.inactive')); ?>

                                        </span>
                                    </div>
                                    <div class="space-y-2 text-sm text-slate-600">
                                        <div class="flex items-center">
                                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'User','class' => 'w-4 h-4 me-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'User','class' => 'w-4 h-4 me-2']); ?>
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
                                            <?php echo e(optional($activity->teacher)->name ?? 'Not assigned'); ?>

                                        </div>
                                        <div class="flex items-center">
                                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Calendar','class' => 'w-4 h-4 me-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Calendar','class' => 'w-4 h-4 me-2']); ?>
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
                                            <?php echo e($activity->scheduled_date ? $activity->scheduled_date->format('M d, Y') : 'Not scheduled'); ?>

                                        </div>
                                        <div class="flex items-center">
                                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Clock','class' => 'w-4 h-4 me-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Clock','class' => 'w-4 h-4 me-2']); ?>
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
                                            <?php echo e($activity->start_time ? $activity->start_time->format('H:i') : '--'); ?> - 
                                            <?php echo e($activity->end_time ? $activity->end_time->format('H:i') : '--'); ?>

                                        </div>
                                        <div class="flex items-center">
                                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'MapPin','class' => 'w-4 h-4 me-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'MapPin','class' => 'w-4 h-4 me-2']); ?>
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
                                            <?php echo e($activity->location ?? 'Not specified'); ?>

                                        </div>
                                    </div>
                                    <?php if($activity->description): ?>
                                        <div class="mt-3 pt-3 border-t text-sm">
                                            <p class="text-slate-700 line-clamp-2"><?php echo e($activity->description); ?></p>
                                        </div>
                                    <?php endif; ?>
                                    <div class="mt-4 pt-3 border-t flex justify-between items-center">
                                        <span class="text-xs text-slate-500">
                                            <?php echo e($activity->activity_type ?? 'General'); ?>

                                        </span>
                                        <a href="<?php echo e(route('activities.show', $activity->id)); ?>" class="text-primary hover:underline text-sm">
                                            <?php echo e(__('global.view_details')); ?>

                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="col-span-full text-center py-12">
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Calendar','class' => 'w-16 h-16 mx-auto mb-4 text-slate-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Calendar','class' => 'w-16 h-16 mx-auto mb-4 text-slate-300']); ?>
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
                                    <h3 class="text-lg font-medium text-slate-500"><?php echo e(__('global.no_activities_participated')); ?></h3>
                                    <p class="text-slate-400 mt-2"><?php echo e(__('global.child_not_assigned_to_activities')); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Events Tab -->
        <div id="events" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center justify-between">
                            <span><?php echo e(__('global.events_participation')); ?></span>
                            <span class="text-sm text-slate-500"><?php echo e($children->events()->count()); ?> <?php echo e(__('global.events')); ?></span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <?php $__empty_1 = true; $__currentLoopData = $children->events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="flex items-start justify-between mb-3">
                                        <h3 class="font-medium text-lg"><?php echo e($event->title ?? $event->name); ?></h3>
                                        <span class="px-2 py-1 rounded text-xs 
                                            <?php echo e($event->status === 'active' ? 'bg-success/20 text-success' : 'bg-slate-200 text-slate-600'); ?>">
                                            <?php echo e(ucfirst($event->status ?? 'active')); ?>

                                        </span>
                                    </div>
                                    <div class="space-y-2 text-sm text-slate-600">
                                        <div class="flex items-center">
                                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'User','class' => 'w-4 h-4 me-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'User','class' => 'w-4 h-4 me-2']); ?>
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
                                            <?php echo e(optional($event->teacher)->name ?? 'Not assigned'); ?>

                                        </div>
                                        <div class="flex items-center">
                                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Calendar','class' => 'w-4 h-4 me-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Calendar','class' => 'w-4 h-4 me-2']); ?>
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
                                            <?php echo e($event->start_datetime ? $event->start_datetime->format('M d, Y H:i') : 'Not scheduled'); ?>

                                        </div>
                                        <?php if($event->end_datetime): ?>
                                            <div class="flex items-center">
                                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Calendar','class' => 'w-4 h-4 me-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Calendar','class' => 'w-4 h-4 me-2']); ?>
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
                                                <?php echo e(__('global.ends')); ?>: <?php echo e($event->end_datetime->format('M d, Y H:i')); ?>

                                            </div>
                                        <?php endif; ?>
                                        <div class="flex items-center">
                                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'MapPin','class' => 'w-4 h-4 me-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'MapPin','class' => 'w-4 h-4 me-2']); ?>
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
                                            <?php echo e($event->location ?? 'Not specified'); ?>

                                        </div>
                                        <div class="flex items-center">
                                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Users','class' => 'w-4 h-4 me-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Users','class' => 'w-4 h-4 me-2']); ?>
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
                                            <?php echo e($event->attendee_count); ?>/<?php echo e($event->max_attendees ?? '∞'); ?> <?php echo e(__('global.attendees')); ?>

                                        </div>
                                    </div>
                                    <?php if($event->description): ?>
                                        <div class="mt-3 pt-3 border-t text-sm">
                                            <p class="text-slate-700 line-clamp-2"><?php echo e($event->description); ?></p>
                                        </div>
                                    <?php endif; ?>
                                    <div class="mt-4 pt-3 border-t flex justify-between items-center">
                                        <span class="text-xs text-slate-500">
                                            <?php echo e(ucfirst($event->event_type ?? 'General')); ?>

                                        </span>
                                        <a href="<?php echo e(route('events.show', $event->id)); ?>" class="text-primary hover:underline text-sm">
                                            <?php echo e(__('global.view_details')); ?>

                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="col-span-full text-center py-12">
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'CalendarEvent','class' => 'w-16 h-16 mx-auto mb-4 text-slate-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'CalendarEvent','class' => 'w-16 h-16 mx-auto mb-4 text-slate-300']); ?>
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
                                    <h3 class="text-lg font-medium text-slate-500"><?php echo e(__('global.no_events_participated')); ?></h3>
                                    <p class="text-slate-400 mt-2"><?php echo e(__('global.child_not_assigned_to_events')); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Medical Information Tab -->
        <div id="medical" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Heart','class' => 'w-5 h-5 me-2 text-primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Heart','class' => 'w-5 h-5 me-2 text-primary']); ?>
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
                            <?php echo e(__('global.medical_conditions')); ?>

                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500"><?php echo e(__('global.medical_conditions')); ?>:</span>
                                <span class="font-medium"><?php echo e($children->medical_conditions ?? 'None reported'); ?></span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500"><?php echo e(__('global.allergies')); ?>:</span>
                                <span class="font-medium"><?php echo e($children->allergies ?? 'None reported'); ?></span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500"><?php echo e(__('global.medications')); ?>:</span>
                                <span class="font-medium"><?php echo e($children->medications ?? 'None required'); ?></span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500"><?php echo e(__('global.blood_type')); ?>:</span>
                                <span class="font-medium"><?php echo e($children->blood_type ?? 'Not specified'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Phone','class' => 'w-5 h-5 me-2 text-primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Phone','class' => 'w-5 h-5 me-2 text-primary']); ?>
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
                            <?php echo e(__('global.emergency_contact')); ?>

                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500"><?php echo e(__('global.contact_name')); ?>:</span>
                                <span class="font-medium"><?php echo e($children->emergency_contact_name ?? 'Not specified'); ?></span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500"><?php echo e(__('global.contact_phone')); ?>:</span>
                                <span class="font-medium"><?php echo e($children->emergency_contact_phone ?? 'Not specified'); ?></span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500"><?php echo e(__('global.relationship')); ?>:</span>
                                <span class="font-medium"><?php echo e($children->emergency_contact_relation ?? 'Not specified'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');
            
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const tabId = this.getAttribute('data-tab');
                    
                    // Remove active class from all buttons and contents
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active'));
                    
                    // Add active class to clicked button and corresponding content
                    this.classList.add('active');
                    document.getElementById(tabId).classList.add('active');
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../themes/' . $activeTheme . '/' . $activeLayout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views/pages/children/show.blade.php ENDPATH**/ ?>