

<?php $__env->startSection('head'); ?>
    <title><?php echo e(__('Event.list')); ?> - Laravel</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto"><?php echo e(__('Event.list')); ?></h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('export_events')): ?>
            
                        <div class="flex gap-2">
                            <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['variant' => 'outline-primary','as' => 'a','href' => ''.e(route('events.export.pdf')).'','class' => 'flex items-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'outline-primary','as' => 'a','href' => ''.e(route('events.export.pdf')).'','class' => 'flex items-center']); ?>
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'FileText','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'FileText','class' => 'w-4 h-4 mr-2']); ?>
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
                                <?php echo e(__('global.export_pdf')); ?>

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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['variant' => 'outline-success','as' => 'a','href' => ''.e(route('events.export.excel')).'','class' => 'flex items-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'outline-success','as' => 'a','href' => ''.e(route('events.export.excel')).'','class' => 'flex items-center']); ?>
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'FileSpreadsheet','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'FileSpreadsheet','class' => 'w-4 h-4 mr-2']); ?>
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
                                <?php echo e(__('global.export_excel')); ?>

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
            <?php endif; ?>
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_events')): ?>
            <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['variant' => 'primary','as' => 'a','href' => ''.e(route('events.create')).'','class' => 'ml-2 flex items-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'primary','as' => 'a','href' => ''.e(route('events.create')).'','class' => 'ml-2 flex items-center']); ?>
                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Plus','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Plus','class' => 'w-4 h-4 mr-2']); ?>
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
                <?php echo e(__('Event.add_new')); ?>

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
        <!-- Filter Section -->
        <div class="intro-y col-span-12">
            <div class="box p-5">
                <div class="flex flex-col sm:flex-row gap-4">
                    <div class="flex-1">
                        <?php if (isset($component)) { $__componentOriginal40054831fd8fc1521987609af4b37cc0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40054831fd8fc1521987609af4b37cc0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-input.index','data' => ['type' => 'text','placeholder' => ''.e(__('global.search')).'','class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','placeholder' => ''.e(__('global.search')).'','class' => 'w-full']); ?>
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
                    <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['variant' => 'secondary','class' => 'flex items-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'secondary','class' => 'flex items-center']); ?>
                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Filter','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Filter','class' => 'w-4 h-4 mr-2']); ?>
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
                </div>
            </div>
        </div>

        <!-- Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <?php if (isset($component)) { $__componentOriginal6c5ca5075b77ab710d72d6982b9fdde0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6c5ca5075b77ab710d72d6982b9fdde0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.index','data' => ['class' => 'table-report -mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'table-report -mt-2']); ?>
                <?php if (isset($component)) { $__componentOriginalbc0bb9ed77cf2ae443f0607b342b41ff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc0bb9ed77cf2ae443f0607b342b41ff = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.thead','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.thead'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php if (isset($component)) { $__componentOriginalc80837cbdc4af1ed654f491102c7dce5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc80837cbdc4af1ed654f491102c7dce5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.tr','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.tr'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php
    $canEdit = auth()->user()->can('edit_events');
    $canDelete = auth()->user()->can('delete_events');
    $canView = auth()->user()->can('view_events');
?>
                            <?php if (isset($component)) { $__componentOriginalbf9f34089dac534fce4e82b41f223670 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbf9f34089dac534fce4e82b41f223670 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'whitespace-nowrap text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap text-center']); ?><?php echo e(__('events.fields.title')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $attributes = $__attributesOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__attributesOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $component = $__componentOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__componentOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalbf9f34089dac534fce4e82b41f223670 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbf9f34089dac534fce4e82b41f223670 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'whitespace-nowrap text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap text-center']); ?><?php echo e(__('events.fields.start_datetime')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $attributes = $__attributesOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__attributesOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $component = $__componentOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__componentOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalbf9f34089dac534fce4e82b41f223670 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbf9f34089dac534fce4e82b41f223670 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'whitespace-nowrap text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap text-center']); ?><?php echo e(__('events.fields.end_datetime')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $attributes = $__attributesOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__attributesOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $component = $__componentOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__componentOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalbf9f34089dac534fce4e82b41f223670 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbf9f34089dac534fce4e82b41f223670 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'whitespace-nowrap text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap text-center']); ?><?php echo e(__('events.fields.location')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $attributes = $__attributesOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__attributesOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $component = $__componentOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__componentOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalbf9f34089dac534fce4e82b41f223670 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbf9f34089dac534fce4e82b41f223670 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'whitespace-nowrap text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap text-center']); ?><?php echo e(__('events.fields.event_type')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $attributes = $__attributesOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__attributesOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $component = $__componentOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__componentOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalbf9f34089dac534fce4e82b41f223670 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbf9f34089dac534fce4e82b41f223670 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'whitespace-nowrap text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap text-center']); ?><?php echo e(__('events.fields.organizer')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $attributes = $__attributesOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__attributesOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $component = $__componentOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__componentOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalbf9f34089dac534fce4e82b41f223670 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbf9f34089dac534fce4e82b41f223670 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'whitespace-nowrap text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap text-center']); ?><?php echo e(__('events.fields.class_id')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $attributes = $__attributesOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__attributesOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $component = $__componentOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__componentOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalbf9f34089dac534fce4e82b41f223670 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbf9f34089dac534fce4e82b41f223670 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'whitespace-nowrap text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap text-center']); ?><?php echo e(__('events.fields.teacher_id')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $attributes = $__attributesOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__attributesOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $component = $__componentOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__componentOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalbf9f34089dac534fce4e82b41f223670 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbf9f34089dac534fce4e82b41f223670 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'whitespace-nowrap text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap text-center']); ?><?php echo e(__('events.fields.attendees')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $attributes = $__attributesOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__attributesOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $component = $__componentOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__componentOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalbf9f34089dac534fce4e82b41f223670 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbf9f34089dac534fce4e82b41f223670 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'whitespace-nowrap text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap text-center']); ?><?php echo e(__('events.fields.requires_confirmation')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $attributes = $__attributesOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__attributesOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $component = $__componentOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__componentOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalbf9f34089dac534fce4e82b41f223670 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbf9f34089dac534fce4e82b41f223670 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'whitespace-nowrap text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap text-center']); ?><?php echo e(__('events.fields.is_public')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $attributes = $__attributesOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__attributesOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $component = $__componentOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__componentOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalbf9f34089dac534fce4e82b41f223670 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbf9f34089dac534fce4e82b41f223670 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'whitespace-nowrap text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap text-center']); ?><?php echo e(__('events.fields.is_recurring')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $attributes = $__attributesOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__attributesOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $component = $__componentOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__componentOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalbf9f34089dac534fce4e82b41f223670 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbf9f34089dac534fce4e82b41f223670 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'whitespace-nowrap text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap text-center']); ?><?php echo e(__('events.fields.recurrence_pattern')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $attributes = $__attributesOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__attributesOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $component = $__componentOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__componentOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalbf9f34089dac534fce4e82b41f223670 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbf9f34089dac534fce4e82b41f223670 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'whitespace-nowrap text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap text-center']); ?><?php echo e(__('events.fields.recurrence_end_date')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $attributes = $__attributesOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__attributesOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $component = $__componentOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__componentOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalbf9f34089dac534fce4e82b41f223670 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbf9f34089dac534fce4e82b41f223670 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'whitespace-nowrap text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap text-center']); ?><?php echo e(__('events.fields.recurring_days')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $attributes = $__attributesOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__attributesOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $component = $__componentOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__componentOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalbf9f34089dac534fce4e82b41f223670 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbf9f34089dac534fce4e82b41f223670 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'whitespace-nowrap text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap text-center']); ?><?php echo e(__('events.fields.status')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $attributes = $__attributesOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__attributesOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $component = $__componentOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__componentOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalbf9f34089dac534fce4e82b41f223670 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbf9f34089dac534fce4e82b41f223670 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'whitespace-nowrap text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap text-center']); ?><?php echo e(__('events.fields.send_reminders')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $attributes = $__attributesOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__attributesOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $component = $__componentOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__componentOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalbf9f34089dac534fce4e82b41f223670 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbf9f34089dac534fce4e82b41f223670 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'whitespace-nowrap text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap text-center']); ?><?php echo e(__('events.fields.reminder_hours_before')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $attributes = $__attributesOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__attributesOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $component = $__componentOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__componentOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalbf9f34089dac534fce4e82b41f223670 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbf9f34089dac534fce4e82b41f223670 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'whitespace-nowrap text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap text-center']); ?><?php echo e(__('events.fields.documents')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $attributes = $__attributesOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__attributesOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $component = $__componentOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__componentOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>

                        <?php if($canEdit || $canDelete || $canView): ?>
                        <?php if (isset($component)) { $__componentOriginalbf9f34089dac534fce4e82b41f223670 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbf9f34089dac534fce4e82b41f223670 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'text-center whitespace-nowrap']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-center whitespace-nowrap']); ?><?php echo e(__('global.actions')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $attributes = $__attributesOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__attributesOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $component = $__componentOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__componentOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
                        <?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc80837cbdc4af1ed654f491102c7dce5)): ?>
<?php $attributes = $__attributesOriginalc80837cbdc4af1ed654f491102c7dce5; ?>
<?php unset($__attributesOriginalc80837cbdc4af1ed654f491102c7dce5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc80837cbdc4af1ed654f491102c7dce5)): ?>
<?php $component = $__componentOriginalc80837cbdc4af1ed654f491102c7dce5; ?>
<?php unset($__componentOriginalc80837cbdc4af1ed654f491102c7dce5); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbc0bb9ed77cf2ae443f0607b342b41ff)): ?>
<?php $attributes = $__attributesOriginalbc0bb9ed77cf2ae443f0607b342b41ff; ?>
<?php unset($__attributesOriginalbc0bb9ed77cf2ae443f0607b342b41ff); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbc0bb9ed77cf2ae443f0607b342b41ff)): ?>
<?php $component = $__componentOriginalbc0bb9ed77cf2ae443f0607b342b41ff; ?>
<?php unset($__componentOriginalbc0bb9ed77cf2ae443f0607b342b41ff); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal543ae11ed083c771b9f19a901c11bcdf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal543ae11ed083c771b9f19a901c11bcdf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.tbody','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.tbody'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php $__empty_1 = true; $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if (isset($component)) { $__componentOriginalc80837cbdc4af1ed654f491102c7dce5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc80837cbdc4af1ed654f491102c7dce5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.tr','data' => ['class' => 'intro-x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.tr'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'intro-x']); ?>
                            <?php if (isset($component)) { $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.td','data' => ['class' => 'text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-center']); ?><?php echo e($event->title ?? '-'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $attributes = $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $component = $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.td','data' => ['class' => 'text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-center']); ?><?php echo e($event->start_datetime ? $event->start_datetime->format('Y-m-d') : '-'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $attributes = $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $component = $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.td','data' => ['class' => 'text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-center']); ?><?php echo e($event->end_datetime ? $event->end_datetime->format('Y-m-d') : '-'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $attributes = $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $component = $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.td','data' => ['class' => 'text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-center']); ?><?php echo e($event->location ?? '-'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $attributes = $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $component = $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.td','data' => ['class' => 'text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-center']); ?><?php echo e($event->event_type ?? '-'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $attributes = $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $component = $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.td','data' => ['class' => 'text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-center']); ?><?php echo e($event->organizer ?? '-'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $attributes = $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $component = $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.td','data' => ['class' => 'text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-center']); ?><?php echo e($event->class_id ?? '-'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $attributes = $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $component = $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.td','data' => ['class' => 'text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-center']); ?><?php echo e($event->teacher_id ?? '-'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $attributes = $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $component = $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.td','data' => ['class' => 'text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-center']); ?><?php echo e($event->attendees ?? '-'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $attributes = $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $component = $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.td','data' => ['class' => 'text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-center']); ?>
                                <div class="flex items-center justify-center <?php echo e($event->requires_confirmation ? 'text-success' : 'text-danger'); ?>"> <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => ''.e($event->requires_confirmation ? 'CheckSquare' : 'XSquare').'','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => ''.e($event->requires_confirmation ? 'CheckSquare' : 'XSquare').'','class' => 'w-4 h-4 mr-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> <?php echo e($event->requires_confirmation ? __('global.yes') : __('global.no')); ?> </div>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $attributes = $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $component = $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.td','data' => ['class' => 'text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-center']); ?>
                                <div class="flex items-center justify-center <?php echo e($event->is_public ? 'text-success' : 'text-danger'); ?>"> <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => ''.e($event->is_public ? 'CheckSquare' : 'XSquare').'','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => ''.e($event->is_public ? 'CheckSquare' : 'XSquare').'','class' => 'w-4 h-4 mr-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> <?php echo e($event->is_public ? __('global.yes') : __('global.no')); ?> </div>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $attributes = $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $component = $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.td','data' => ['class' => 'text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-center']); ?>
                                <div class="flex items-center justify-center <?php echo e($event->is_recurring ? 'text-success' : 'text-danger'); ?>"> <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => ''.e($event->is_recurring ? 'CheckSquare' : 'XSquare').'','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => ''.e($event->is_recurring ? 'CheckSquare' : 'XSquare').'','class' => 'w-4 h-4 mr-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> <?php echo e($event->is_recurring ? __('global.yes') : __('global.no')); ?> </div>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $attributes = $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $component = $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.td','data' => ['class' => 'text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-center']); ?><?php echo e($event->recurrence_pattern ?? '-'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $attributes = $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $component = $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.td','data' => ['class' => 'text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-center']); ?><?php echo e($event->recurrence_end_date ? $event->recurrence_end_date->format('Y-m-d') : '-'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $attributes = $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $component = $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.td','data' => ['class' => 'text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-center']); ?><?php echo e($event->recurring_days ?? '-'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $attributes = $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $component = $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.td','data' => ['class' => 'text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-center']); ?><?php echo e($event->status ?? '-'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $attributes = $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $component = $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.td','data' => ['class' => 'text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-center']); ?>
                                <div class="flex items-center justify-center <?php echo e($event->send_reminders ? 'text-success' : 'text-danger'); ?>"> <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => ''.e($event->send_reminders ? 'CheckSquare' : 'XSquare').'','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => ''.e($event->send_reminders ? 'CheckSquare' : 'XSquare').'','class' => 'w-4 h-4 mr-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> <?php echo e($event->send_reminders ? __('global.yes') : __('global.no')); ?> </div>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $attributes = $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $component = $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.td','data' => ['class' => 'text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-center']); ?><?php echo e($event->reminder_hours_before ?? '-'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $attributes = $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $component = $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.td','data' => ['class' => 'text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-center']); ?><?php echo e($event->documents ?? '-'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $attributes = $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $component = $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>

                            <?php if($canEdit || $canDelete || $canView): ?>
                            <?php if (isset($component)) { $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.td','data' => ['class' => 'table-report__action w-56']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'table-report__action w-56']); ?>
                                <div class="flex justify-center items-center">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_events')): ?>
                                    <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['variant' => 'outline-secondary','as' => 'a','href' => ''.e(route('events.show', $event->id)).'','size' => 'sm','class' => 'mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'outline-secondary','as' => 'a','href' => ''.e(route('events.show', $event->id)).'','size' => 'sm','class' => 'mr-2']); ?>
                                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Eye','class' => 'w-4 h-4 mr-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Eye','class' => 'w-4 h-4 mr-1']); ?>
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
                                        <?php echo e(__('global.view')); ?>

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
                                    
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_events')): ?>
                                    <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['variant' => 'outline-primary','as' => 'a','href' => ''.e(route('events.edit', $event->id)).'','size' => 'sm','class' => 'mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'outline-primary','as' => 'a','href' => ''.e(route('events.edit', $event->id)).'','size' => 'sm','class' => 'mr-2']); ?>
                                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Pencil','class' => 'w-4 h-4 mr-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Pencil','class' => 'w-4 h-4 mr-1']); ?>
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
                                    
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_events')): ?>
                                    <form action="<?php echo e(route('events.destroy', $event->id)); ?>" method="POST" onsubmit="return confirm('<?php echo e(__('global.confirm_delete')); ?>')" class="inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['variant' => 'outline-danger','type' => 'submit','size' => 'sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'outline-danger','type' => 'submit','size' => 'sm']); ?>
                                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Trash2','class' => 'w-4 h-4 mr-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Trash2','class' => 'w-4 h-4 mr-1']); ?>
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
                                            <?php echo e(__('global.delete')); ?>

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
                                    <?php endif; ?>
                                </div>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $attributes = $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $component = $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
                            <?php endif; ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc80837cbdc4af1ed654f491102c7dce5)): ?>
<?php $attributes = $__attributesOriginalc80837cbdc4af1ed654f491102c7dce5; ?>
<?php unset($__attributesOriginalc80837cbdc4af1ed654f491102c7dce5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc80837cbdc4af1ed654f491102c7dce5)): ?>
<?php $component = $__componentOriginalc80837cbdc4af1ed654f491102c7dce5; ?>
<?php unset($__componentOriginalc80837cbdc4af1ed654f491102c7dce5); ?>
<?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php if (isset($component)) { $__componentOriginalc80837cbdc4af1ed654f491102c7dce5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc80837cbdc4af1ed654f491102c7dce5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.tr','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.tr'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <?php if (isset($component)) { $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.td','data' => ['colspan' => ''.e(19 + ($canEdit || $canDelete || $canView? 1 : 0)).'','class' => 'text-center py-10']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['colspan' => ''.e(19 + ($canEdit || $canDelete || $canView? 1 : 0)).'','class' => 'text-center py-10']); ?>
                                <div class="flex flex-col items-center justify-center">
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Inbox','class' => 'w-16 h-16 text-gray-400 mb-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Inbox','class' => 'w-16 h-16 text-gray-400 mb-4']); ?>
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
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100"><?php echo e(__('global.no_data_found')); ?></h3>
                                    <p class="text-gray-500 dark:text-gray-400 mt-1"><?php echo e(__('global.no_data_description')); ?></p>
                                    <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['variant' => 'primary','as' => 'a','href' => ''.e(route('events.create')).'','class' => 'mt-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'primary','as' => 'a','href' => ''.e(route('events.create')).'','class' => 'mt-4']); ?>
                                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Plus','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Plus','class' => 'w-4 h-4 mr-2']); ?>
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
                                        <?php echo e(__('Event.add_new')); ?>

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
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $attributes = $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de)): ?>
<?php $component = $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de; ?>
<?php unset($__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de); ?>
<?php endif; ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc80837cbdc4af1ed654f491102c7dce5)): ?>
<?php $attributes = $__attributesOriginalc80837cbdc4af1ed654f491102c7dce5; ?>
<?php unset($__attributesOriginalc80837cbdc4af1ed654f491102c7dce5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc80837cbdc4af1ed654f491102c7dce5)): ?>
<?php $component = $__componentOriginalc80837cbdc4af1ed654f491102c7dce5; ?>
<?php unset($__componentOriginalc80837cbdc4af1ed654f491102c7dce5); ?>
<?php endif; ?>
                    <?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal543ae11ed083c771b9f19a901c11bcdf)): ?>
<?php $attributes = $__attributesOriginal543ae11ed083c771b9f19a901c11bcdf; ?>
<?php unset($__attributesOriginal543ae11ed083c771b9f19a901c11bcdf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal543ae11ed083c771b9f19a901c11bcdf)): ?>
<?php $component = $__componentOriginal543ae11ed083c771b9f19a901c11bcdf; ?>
<?php unset($__componentOriginal543ae11ed083c771b9f19a901c11bcdf); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6c5ca5075b77ab710d72d6982b9fdde0)): ?>
<?php $attributes = $__attributesOriginal6c5ca5075b77ab710d72d6982b9fdde0; ?>
<?php unset($__attributesOriginal6c5ca5075b77ab710d72d6982b9fdde0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6c5ca5075b77ab710d72d6982b9fdde0)): ?>
<?php $component = $__componentOriginal6c5ca5075b77ab710d72d6982b9fdde0; ?>
<?php unset($__componentOriginal6c5ca5075b77ab710d72d6982b9fdde0); ?>
<?php endif; ?>
        </div>

        <!-- Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <?php echo $events->links(); ?>

        </div>

        <!-- Summary Cards -->
        <?php if($events->count() > 0): ?>
        <div class="intro-y col-span-12 grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex items-center">
                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Database','class' => 'w-8 h-8 text-primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Database','class' => 'w-8 h-8 text-primary']); ?>
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
                        <div class="ml-auto">
                            <div class="report-box__indicator bg-success"> 
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'TrendingUp','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'TrendingUp','class' => 'w-4 h-4']); ?>
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
                    <div class="text-3xl font-bold leading-8 mt-6"><?php echo e($events->count()); ?></div>
                    <div class="text-base text-slate-500 mt-1"><?php echo e(__('global.total_records')); ?></div>
                </div>
            </div>
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex items-center">
                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Activity','class' => 'w-8 h-8 text-pending']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Activity','class' => 'w-8 h-8 text-pending']); ?>
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
                        <div class="ml-auto">
                            <div class="report-box__indicator bg-success"> 
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'TrendingUp','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'TrendingUp','class' => 'w-4 h-4']); ?>
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
                    <div class="text-3xl font-bold leading-8 mt-6">
                        <?php
                            $recentCount = $events->filter(function($item) {
                                return $item->created_at >= \Carbon\Carbon::now()->subDays(7);
                            })->count();
                        ?>
                        <?php echo e($recentCount); ?>

                    </div>
                    <div class="text-base text-slate-500 mt-1"><?php echo e(__('global.added_this_week')); ?></div>
                </div>
            </div>
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex items-center">
                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Calendar','class' => 'w-8 h-8 text-success']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Calendar','class' => 'w-8 h-8 text-success']); ?>
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
                        <div class="ml-auto">
                            <div class="report-box__indicator bg-success"> 
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'TrendingUp','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'TrendingUp','class' => 'w-4 h-4']); ?>
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
                    <div class="text-3xl font-bold leading-8 mt-6">
                        <?php
                            $todayCount = $events->filter(fn($item) => \Carbon\Carbon::parse($item->created_at)->isToday())->count();
                        ?>
                        <?php echo e($todayCount); ?>

                    </div>
                    <div class="text-base text-slate-500 mt-1"><?php echo e(__('global.added_today')); ?></div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../themes/' . $activeTheme . '/' . $activeLayout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views\pages\events\index.blade.php ENDPATH**/ ?>