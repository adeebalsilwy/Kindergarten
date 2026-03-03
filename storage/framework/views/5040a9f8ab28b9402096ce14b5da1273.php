<?php $__env->startSection('subhead'); ?>
    <title><?php echo e(__('global.bulk_attendance')); ?> - <?php echo e(config('app.name')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">
            <?php echo e(__('global.bulk_attendance')); ?>

        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['variant' => 'outline-secondary','as' => 'a','href' => ''.e(route('attendances.index')).'','class' => 'flex items-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'outline-secondary','as' => 'a','href' => ''.e(route('attendances.index')).'','class' => 'flex items-center']); ?>
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
<?php endif; ?> <?php echo e(__('global.back')); ?>

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

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12">
            <!-- Filter Box -->
            <div class="box p-5">
                <form action="<?php echo e(route('attendances.bulk')); ?>" method="GET">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 md:col-span-5">
                            <?php if (isset($component)) { $__componentOriginal0b5a207e31917d1ae3d42744188acbdf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-label.index','data' => ['class' => 'font-bold']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-bold']); ?><?php echo e(__('global.select_class')); ?> <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tom-select.index','data' => ['name' => 'class_id','class' => 'w-full','onchange' => 'this.form.submit()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tom-select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'class_id','class' => 'w-full','onchange' => 'this.form.submit()']); ?>
                                <option value=""><?php echo e(__('global.choose_class')); ?></option>
                                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($class->id); ?>" <?php echo e($class_id == $class->id ? 'selected' : ''); ?>>
                                        <?php echo e($class->name); ?>

                                    </option>
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
                        <div class="col-span-12 md:col-span-5">
                            <?php if (isset($component)) { $__componentOriginal0b5a207e31917d1ae3d42744188acbdf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-label.index','data' => ['class' => 'font-bold']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-bold']); ?><?php echo e(__('global.date')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $attributes = $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $component = $__componentOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal40054831fd8fc1521987609af4b37cc0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40054831fd8fc1521987609af4b37cc0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-input.index','data' => ['type' => 'date','name' => 'date','class' => 'w-full','value' => ''.e($date).'','onchange' => 'this.form.submit()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'date','name' => 'date','class' => 'w-full','value' => ''.e($date).'','onchange' => 'this.form.submit()']); ?>
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
                        <div class="col-span-12 md:col-span-2 flex items-end">
                            <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['type' => 'submit','variant' => 'primary','class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','variant' => 'primary','class' => 'w-full']); ?>
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Filter','class' => 'w-4 h-4 me-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Filter','class' => 'w-4 h-4 me-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> <?php echo e(__('global.filter')); ?>

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
                </form>
            </div>

            <?php if($class_id && count($childrens) > 0): ?>
                <!-- Attendance Sheet -->
                <div class="box p-5 mt-5">
                    <form action="<?php echo e(route('attendances.bulk.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="date" value="<?php echo e($date); ?>">
                        <div class="overflow-x-auto lg:overflow-visible">
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
                                        <?php if (isset($component)) { $__componentOriginalbf9f34089dac534fce4e82b41f223670 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbf9f34089dac534fce4e82b41f223670 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'whitespace-nowrap']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap']); ?><?php echo e(__('global.student')); ?> <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'text-center whitespace-nowrap']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-center whitespace-nowrap']); ?><?php echo e(__('global.status')); ?> <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'whitespace-nowrap']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap']); ?><?php echo e(__('global.notes')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $attributes = $__attributesOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__attributesOriginalbf9f34089dac534fce4e82b41f223670); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf9f34089dac534fce4e82b41f223670)): ?>
<?php $component = $__componentOriginalbf9f34089dac534fce4e82b41f223670; ?>
<?php unset($__componentOriginalbf9f34089dac534fce4e82b41f223670); ?>
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
                                    <?php $__currentLoopData = $childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.td','data' => ['class' => 'whitespace-nowrap']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap']); ?>
                                                <div class="flex items-center">
                                                    <div class="w-10 h-10 image-fit me-3">
                                                        <img alt="<?php echo e($child->name); ?>" class="rounded-full shadow-md" src="<?php echo e($child->photo_path ? asset($child->photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode($child->name) . '&background=random'); ?>">
                                                    </div>
                                                    <div>
                                                        <div class="font-medium whitespace-nowrap"><?php echo e($child->name); ?></div>
                                                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5"><?php echo e($child->class->name ?? ''); ?></div>
                                                    </div>
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
                                                <div class="flex justify-center items-center gap-6">
                                                    <?php if (isset($component)) { $__componentOriginalfc0d3255d411960ba8c8fe29d7ad392b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc0d3255d411960ba8c8fe29d7ad392b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-check.index','data' => ['class' => 'flex items-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'flex items-center']); ?>
                                                        <?php if (isset($component)) { $__componentOriginal45dc70583f76c3df9e7383efd567b5fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal45dc70583f76c3df9e7383efd567b5fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-check.input','data' => ['type' => 'radio','name' => 'attendance['.e($child->id).'][status]','value' => 'present','id' => 'present-'.e($child->id).'','checked' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-check.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'radio','name' => 'attendance['.e($child->id).'][status]','value' => 'present','id' => 'present-'.e($child->id).'','checked' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal45dc70583f76c3df9e7383efd567b5fd)): ?>
<?php $attributes = $__attributesOriginal45dc70583f76c3df9e7383efd567b5fd; ?>
<?php unset($__attributesOriginal45dc70583f76c3df9e7383efd567b5fd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45dc70583f76c3df9e7383efd567b5fd)): ?>
<?php $component = $__componentOriginal45dc70583f76c3df9e7383efd567b5fd; ?>
<?php unset($__componentOriginal45dc70583f76c3df9e7383efd567b5fd); ?>
<?php endif; ?>
                                                        <?php if (isset($component)) { $__componentOriginal8218ba5fba45bffb9ccf737358e222ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8218ba5fba45bffb9ccf737358e222ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-check.label','data' => ['class' => 'text-success font-medium','for' => 'present-'.e($child->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-check.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-success font-medium','for' => 'present-'.e($child->id).'']); ?><?php echo e(__('global.present')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8218ba5fba45bffb9ccf737358e222ee)): ?>
<?php $attributes = $__attributesOriginal8218ba5fba45bffb9ccf737358e222ee; ?>
<?php unset($__attributesOriginal8218ba5fba45bffb9ccf737358e222ee); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8218ba5fba45bffb9ccf737358e222ee)): ?>
<?php $component = $__componentOriginal8218ba5fba45bffb9ccf737358e222ee; ?>
<?php unset($__componentOriginal8218ba5fba45bffb9ccf737358e222ee); ?>
<?php endif; ?>
                                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc0d3255d411960ba8c8fe29d7ad392b)): ?>
<?php $attributes = $__attributesOriginalfc0d3255d411960ba8c8fe29d7ad392b; ?>
<?php unset($__attributesOriginalfc0d3255d411960ba8c8fe29d7ad392b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc0d3255d411960ba8c8fe29d7ad392b)): ?>
<?php $component = $__componentOriginalfc0d3255d411960ba8c8fe29d7ad392b; ?>
<?php unset($__componentOriginalfc0d3255d411960ba8c8fe29d7ad392b); ?>
<?php endif; ?>
                                                    <?php if (isset($component)) { $__componentOriginalfc0d3255d411960ba8c8fe29d7ad392b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc0d3255d411960ba8c8fe29d7ad392b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-check.index','data' => ['class' => 'flex items-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'flex items-center']); ?>
                                                        <?php if (isset($component)) { $__componentOriginal45dc70583f76c3df9e7383efd567b5fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal45dc70583f76c3df9e7383efd567b5fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-check.input','data' => ['type' => 'radio','name' => 'attendance['.e($child->id).'][status]','value' => 'absent','id' => 'absent-'.e($child->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-check.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'radio','name' => 'attendance['.e($child->id).'][status]','value' => 'absent','id' => 'absent-'.e($child->id).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal45dc70583f76c3df9e7383efd567b5fd)): ?>
<?php $attributes = $__attributesOriginal45dc70583f76c3df9e7383efd567b5fd; ?>
<?php unset($__attributesOriginal45dc70583f76c3df9e7383efd567b5fd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45dc70583f76c3df9e7383efd567b5fd)): ?>
<?php $component = $__componentOriginal45dc70583f76c3df9e7383efd567b5fd; ?>
<?php unset($__componentOriginal45dc70583f76c3df9e7383efd567b5fd); ?>
<?php endif; ?>
                                                        <?php if (isset($component)) { $__componentOriginal8218ba5fba45bffb9ccf737358e222ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8218ba5fba45bffb9ccf737358e222ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-check.label','data' => ['class' => 'text-danger font-medium','for' => 'absent-'.e($child->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-check.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-danger font-medium','for' => 'absent-'.e($child->id).'']); ?><?php echo e(__('global.absent')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8218ba5fba45bffb9ccf737358e222ee)): ?>
<?php $attributes = $__attributesOriginal8218ba5fba45bffb9ccf737358e222ee; ?>
<?php unset($__attributesOriginal8218ba5fba45bffb9ccf737358e222ee); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8218ba5fba45bffb9ccf737358e222ee)): ?>
<?php $component = $__componentOriginal8218ba5fba45bffb9ccf737358e222ee; ?>
<?php unset($__componentOriginal8218ba5fba45bffb9ccf737358e222ee); ?>
<?php endif; ?>
                                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc0d3255d411960ba8c8fe29d7ad392b)): ?>
<?php $attributes = $__attributesOriginalfc0d3255d411960ba8c8fe29d7ad392b; ?>
<?php unset($__attributesOriginalfc0d3255d411960ba8c8fe29d7ad392b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc0d3255d411960ba8c8fe29d7ad392b)): ?>
<?php $component = $__componentOriginalfc0d3255d411960ba8c8fe29d7ad392b; ?>
<?php unset($__componentOriginalfc0d3255d411960ba8c8fe29d7ad392b); ?>
<?php endif; ?>
                                                    <?php if (isset($component)) { $__componentOriginalfc0d3255d411960ba8c8fe29d7ad392b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc0d3255d411960ba8c8fe29d7ad392b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-check.index','data' => ['class' => 'flex items-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'flex items-center']); ?>
                                                        <?php if (isset($component)) { $__componentOriginal45dc70583f76c3df9e7383efd567b5fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal45dc70583f76c3df9e7383efd567b5fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-check.input','data' => ['type' => 'radio','name' => 'attendance['.e($child->id).'][status]','value' => 'late','id' => 'late-'.e($child->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-check.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'radio','name' => 'attendance['.e($child->id).'][status]','value' => 'late','id' => 'late-'.e($child->id).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal45dc70583f76c3df9e7383efd567b5fd)): ?>
<?php $attributes = $__attributesOriginal45dc70583f76c3df9e7383efd567b5fd; ?>
<?php unset($__attributesOriginal45dc70583f76c3df9e7383efd567b5fd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45dc70583f76c3df9e7383efd567b5fd)): ?>
<?php $component = $__componentOriginal45dc70583f76c3df9e7383efd567b5fd; ?>
<?php unset($__componentOriginal45dc70583f76c3df9e7383efd567b5fd); ?>
<?php endif; ?>
                                                        <?php if (isset($component)) { $__componentOriginal8218ba5fba45bffb9ccf737358e222ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8218ba5fba45bffb9ccf737358e222ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-check.label','data' => ['class' => 'text-warning font-medium','for' => 'late-'.e($child->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-check.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-warning font-medium','for' => 'late-'.e($child->id).'']); ?><?php echo e(__('global.late')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8218ba5fba45bffb9ccf737358e222ee)): ?>
<?php $attributes = $__attributesOriginal8218ba5fba45bffb9ccf737358e222ee; ?>
<?php unset($__attributesOriginal8218ba5fba45bffb9ccf737358e222ee); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8218ba5fba45bffb9ccf737358e222ee)): ?>
<?php $component = $__componentOriginal8218ba5fba45bffb9ccf737358e222ee; ?>
<?php unset($__componentOriginal8218ba5fba45bffb9ccf737358e222ee); ?>
<?php endif; ?>
                                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc0d3255d411960ba8c8fe29d7ad392b)): ?>
<?php $attributes = $__attributesOriginalfc0d3255d411960ba8c8fe29d7ad392b; ?>
<?php unset($__attributesOriginalfc0d3255d411960ba8c8fe29d7ad392b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc0d3255d411960ba8c8fe29d7ad392b)): ?>
<?php $component = $__componentOriginalfc0d3255d411960ba8c8fe29d7ad392b; ?>
<?php unset($__componentOriginalfc0d3255d411960ba8c8fe29d7ad392b); ?>
<?php endif; ?>
                                                    <?php if (isset($component)) { $__componentOriginalfc0d3255d411960ba8c8fe29d7ad392b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc0d3255d411960ba8c8fe29d7ad392b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-check.index','data' => ['class' => 'flex items-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'flex items-center']); ?>
                                                        <?php if (isset($component)) { $__componentOriginal45dc70583f76c3df9e7383efd567b5fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal45dc70583f76c3df9e7383efd567b5fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-check.input','data' => ['type' => 'radio','name' => 'attendance['.e($child->id).'][status]','value' => 'excused','id' => 'excused-'.e($child->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-check.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'radio','name' => 'attendance['.e($child->id).'][status]','value' => 'excused','id' => 'excused-'.e($child->id).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal45dc70583f76c3df9e7383efd567b5fd)): ?>
<?php $attributes = $__attributesOriginal45dc70583f76c3df9e7383efd567b5fd; ?>
<?php unset($__attributesOriginal45dc70583f76c3df9e7383efd567b5fd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45dc70583f76c3df9e7383efd567b5fd)): ?>
<?php $component = $__componentOriginal45dc70583f76c3df9e7383efd567b5fd; ?>
<?php unset($__componentOriginal45dc70583f76c3df9e7383efd567b5fd); ?>
<?php endif; ?>
                                                        <?php if (isset($component)) { $__componentOriginal8218ba5fba45bffb9ccf737358e222ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8218ba5fba45bffb9ccf737358e222ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-check.label','data' => ['class' => 'text-info font-medium','for' => 'excused-'.e($child->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-check.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-info font-medium','for' => 'excused-'.e($child->id).'']); ?><?php echo e(__('global.excused')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8218ba5fba45bffb9ccf737358e222ee)): ?>
<?php $attributes = $__attributesOriginal8218ba5fba45bffb9ccf737358e222ee; ?>
<?php unset($__attributesOriginal8218ba5fba45bffb9ccf737358e222ee); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8218ba5fba45bffb9ccf737358e222ee)): ?>
<?php $component = $__componentOriginal8218ba5fba45bffb9ccf737358e222ee; ?>
<?php unset($__componentOriginal8218ba5fba45bffb9ccf737358e222ee); ?>
<?php endif; ?>
                                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc0d3255d411960ba8c8fe29d7ad392b)): ?>
<?php $attributes = $__attributesOriginalfc0d3255d411960ba8c8fe29d7ad392b; ?>
<?php unset($__attributesOriginalfc0d3255d411960ba8c8fe29d7ad392b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc0d3255d411960ba8c8fe29d7ad392b)): ?>
<?php $component = $__componentOriginalfc0d3255d411960ba8c8fe29d7ad392b; ?>
<?php unset($__componentOriginalfc0d3255d411960ba8c8fe29d7ad392b); ?>
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
                                            <?php if (isset($component)) { $__componentOriginala329ce9f1ebd55e8e6b8fb5e267339de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala329ce9f1ebd55e8e6b8fb5e267339de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.td','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                <?php if (isset($component)) { $__componentOriginal40054831fd8fc1521987609af4b37cc0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40054831fd8fc1521987609af4b37cc0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-input.index','data' => ['type' => 'text','name' => 'attendance['.e($child->id).'][notes]','class' => 'w-full','placeholder' => ''.e(__('global.notes')).'...']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'attendance['.e($child->id).'][notes]','class' => 'w-full','placeholder' => ''.e(__('global.notes')).'...']); ?>
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
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <div class="flex justify-end gap-3 mt-8">
                            <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['variant' => 'outline-secondary','as' => 'a','href' => ''.e(route('attendances.index')).'','class' => 'w-32']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'outline-secondary','as' => 'a','href' => ''.e(route('attendances.index')).'','class' => 'w-32']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['type' => 'submit','variant' => 'primary','class' => 'w-48 shadow-md']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','variant' => 'primary','class' => 'w-48 shadow-md']); ?>
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Save','class' => 'w-4 h-4 me-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Save','class' => 'w-4 h-4 me-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> <?php echo e(__('global.save_attendance')); ?>

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
                    </form>
                </div>
            <?php elseif($class_id): ?>
                <div class="box p-20 mt-5 text-center text-slate-500 shadow-sm">
                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Users','class' => 'w-16 h-16 mx-auto mb-5 opacity-20']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Users','class' => 'w-16 h-16 mx-auto mb-5 opacity-20']); ?>
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
                    <div class="text-xl font-medium"><?php echo e(__('global.no_students_found')); ?></div>
                    <div class="mt-2"><?php echo e(__('global.please_add_students_to_this_class')); ?></div>
                </div>
            <?php else: ?>
                <div class="box p-20 mt-5 text-center text-slate-500 shadow-sm">
                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Search','class' => 'w-16 h-16 mx-auto mb-5 opacity-20']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Search','class' => 'w-16 h-16 mx-auto mb-5 opacity-20']); ?>
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
                    <div class="text-xl font-medium"><?php echo e(__('global.please_select_class_to_start')); ?></div>
                    <div class="mt-2 text-slate-400"><?php echo e(__('global.select_class_and_date_to_record_attendance')); ?></div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../themes/' . $activeTheme . '/' . $activeLayout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\backup\Source\resources\views\pages\attendances\bulk.blade.php ENDPATH**/ ?>