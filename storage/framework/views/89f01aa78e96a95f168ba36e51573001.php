<?php $__env->startSection('subhead'); ?>
    <title>Edit Model - Visual CRUD Builder</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
    <div class="mt-8 flex items-center justify-between">
        <div>
            <h2 class="intro-y text-2xl font-bold mr-auto text-slate-800 dark:text-slate-200">Edit Existing Model</h2>
            <div class="text-slate-500 text-sm mt-1">Add fields and relationships to your existing database tables.</div>
        </div>
        <a href="<?php echo e(route('crud-builder.index')); ?>">
            <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['variant' => 'outline-secondary','class' => 'px-4 py-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'outline-secondary','class' => 'px-4 py-2']); ?>
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
<?php endif; ?> Back to Builder
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
        </a>
    </div>
    
    <div class="intro-y box mt-5 p-6" id="edit-app">
        
        <!-- Step 1: Select Table -->
        <div class="mb-8 border-b border-slate-200/60 pb-5 dark:border-darkmode-400 bg-gradient-to-r from-slate-50 to-white dark:from-darkmode-500/20 dark:to-darkmode-600 p-5 rounded-lg shadow-sm">
            <div class="flex flex-col sm:flex-row items-end gap-4">
                <div class="w-full sm:w-1/3">
                    <?php if (isset($component)) { $__componentOriginal0b5a207e31917d1ae3d42744188acbdf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-label.index','data' => ['class' => 'font-medium text-slate-700 dark:text-slate-300 mb-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-medium text-slate-700 dark:text-slate-300 mb-2']); ?>Select Model/Table <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tom-select.index','data' => ['id' => 'target-table-select','class' => 'w-full rounded-lg','dataPlaceholder' => 'Select a table...']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tom-select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'target-table-select','class' => 'w-full rounded-lg','data-placeholder' => 'Select a table...']); ?>
                        <option value="">Select a table...</option>
                        <?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($table); ?>"><?php echo e($table); ?></option>
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
                    <div class="text-xs text-slate-500 mt-2">Select an existing table to modify.</div>
                </div>
                <div class="pb-1">
                    <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['id' => 'btn-load-target','variant' => 'primary','disabled' => true,'class' => 'px-4 py-2.5 shadow-md']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'btn-load-target','variant' => 'primary','disabled' => true,'class' => 'px-4 py-2.5 shadow-md']); ?>
                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Download','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Download','class' => 'w-4 h-4 mr-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> Load Schema
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

        <!-- Main Form (Hidden until loaded) -->
        <form id="edit-form" class="hidden" method="POST" action="<?php echo e(route('crud-builder.generate')); ?>">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="modified_relationships" id="modified-relationships-input" value="">
            
            <div class="grid grid-cols-12 gap-6">
                <!-- Model Info Card -->
                <div class="col-span-12 intro-y">
                    <div class="box p-6 border border-slate-200/60 shadow-lg dark:border-darkmode-400 bg-gradient-to-br from-slate-50 to-white dark:from-darkmode-500/20 dark:to-darkmode-600">
                        <div class="flex items-center border-b border-slate-200/60 pb-4 mb-5 dark:border-darkmode-400">
                            <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-600 text-white flex items-center justify-center rounded-lg mr-4 shadow-md">
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Info','class' => 'w-5 h-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Info','class' => 'w-5 h-5']); ?>
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
                                <h3 class="font-bold text-lg text-slate-800 dark:text-slate-200">Model Information</h3>
                                <div class="text-slate-500 text-sm">Basic details about the selected model.</div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-5">
                            <div class="col-span-12 sm:col-span-6">
                                <?php if (isset($component)) { $__componentOriginal0b5a207e31917d1ae3d42744188acbdf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-label.index','data' => ['class' => 'font-medium text-slate-700 dark:text-slate-300 mb-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-medium text-slate-700 dark:text-slate-300 mb-2']); ?>Model Name <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-input.index','data' => ['id' => 'model_name','name' => 'model_name','type' => 'text','readonly' => true,'class' => 'py-3 px-4 text-sm rounded-lg border-2 border-slate-200 focus:border-blue-500 dark:border-darkmode-300 dark:bg-darkmode-700 dark:text-slate-200 bg-slate-100 cursor-not-allowed']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'model_name','name' => 'model_name','type' => 'text','readonly' => true,'class' => 'py-3 px-4 text-sm rounded-lg border-2 border-slate-200 focus:border-blue-500 dark:border-darkmode-300 dark:bg-darkmode-700 dark:text-slate-200 bg-slate-100 cursor-not-allowed']); ?>
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
                            <div class="col-span-12 sm:col-span-6">
                                <?php if (isset($component)) { $__componentOriginal0b5a207e31917d1ae3d42744188acbdf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-label.index','data' => ['class' => 'font-medium text-slate-700 dark:text-slate-300 mb-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-medium text-slate-700 dark:text-slate-300 mb-2']); ?>Table Name <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-input.index','data' => ['id' => 'table_name','name' => 'table_name','type' => 'text','readonly' => true,'class' => 'py-3 px-4 text-sm rounded-lg border-2 border-slate-200 focus:border-blue-500 dark:border-darkmode-300 dark:bg-darkmode-700 dark:text-slate-200 bg-slate-100 cursor-not-allowed']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'table_name','name' => 'table_name','type' => 'text','readonly' => true,'class' => 'py-3 px-4 text-sm rounded-lg border-2 border-slate-200 focus:border-blue-500 dark:border-darkmode-300 dark:bg-darkmode-700 dark:text-slate-200 bg-slate-100 cursor-not-allowed']); ?>
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
                    </div>
                </div>

                <!-- Existing Schema Card -->
                <div class="col-span-12 intro-y">
                    <div class="box p-6 border border-slate-200/60 shadow-lg dark:border-darkmode-400 bg-gradient-to-br from-slate-50 to-white dark:from-darkmode-500/20 dark:to-darkmode-600">
                        <div class="flex items-center justify-between border-b border-slate-200/60 pb-4 mb-5 dark:border-darkmode-400">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-purple-600 text-white flex items-center justify-center rounded-lg mr-4 shadow-md">
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Database','class' => 'w-5 h-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Database','class' => 'w-5 h-5']); ?>
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
                                    <h3 class="font-bold text-lg text-slate-800 dark:text-slate-200">Current Schema</h3>
                                    <div class="text-slate-500 text-sm">Modify existing field properties (index/unique/foreign key)</div>
                                </div>
                            </div>
                            <div class="text-sm">
                                <span class="bg-purple-100 dark:bg-purple-900/30 text-purple-800 dark:text-purple-200 px-3 py-1.5 rounded-lg font-medium"><?php echo e(__('global.total')); ?>: </span>
                                <span id="existing-fields-count" class="font-bold text-lg ml-2">0</span>
                            </div>
                        </div>
                        <div class="overflow-x-auto rounded-lg border border-slate-200 dark:border-darkmode-400 shadow-sm max-h-[400px]">
                            <style>
                                .scrollable-table-container::-webkit-scrollbar {
                                    height: 8px;
                                }
                                .scrollable-table-container::-webkit-scrollbar-track {
                                    background: #f1f5f9;
                                    border-radius: 4px;
                                }
                                .scrollable-table-container::-webkit-scrollbar-thumb {
                                    background: #cbd5e1;
                                    border-radius: 4px;
                                }
                                .scrollable-table-container::-webkit-scrollbar-thumb:hover {
                                    background: #94a3b8;
                                }
                            </style>
                            <?php if (isset($component)) { $__componentOriginal6c5ca5075b77ab710d72d6982b9fdde0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6c5ca5075b77ab710d72d6982b9fdde0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.index','data' => ['class' => 'table-auto bg-white dark:bg-darkmode-600 w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'table-auto bg-white dark:bg-darkmode-600 w-full']); ?>
                                <?php if (isset($component)) { $__componentOriginalbc0bb9ed77cf2ae443f0607b342b41ff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc0bb9ed77cf2ae443f0607b342b41ff = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.thead','data' => ['class' => 'bg-gradient-to-r from-slate-100 to-slate-200 dark:from-darkmode-500 dark:to-darkmode-600 sticky top-0 z-10']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.thead'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-gradient-to-r from-slate-100 to-slate-200 dark:from-darkmode-500 dark:to-darkmode-600 sticky top-0 z-10']); ?>
                                    <?php if (isset($component)) { $__componentOriginalc80837cbdc4af1ed654f491102c7dce5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc80837cbdc4af1ed654f491102c7dce5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.tr','data' => ['class' => 'text-slate-700 dark:text-slate-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.tr'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-slate-700 dark:text-slate-300']); ?>
                                        <?php if (isset($component)) { $__componentOriginalbf9f34089dac534fce4e82b41f223670 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbf9f34089dac534fce4e82b41f223670 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'whitespace-nowrap px-4 py-3 text-left font-semibold border-b border-slate-200 dark:border-darkmode-400 sticky left-0 bg-inherit z-20']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap px-4 py-3 text-left font-semibold border-b border-slate-200 dark:border-darkmode-400 sticky left-0 bg-inherit z-20']); ?>Column <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'whitespace-nowrap px-4 py-3 text-left font-semibold border-b border-slate-200 dark:border-darkmode-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap px-4 py-3 text-left font-semibold border-b border-slate-200 dark:border-darkmode-400']); ?>Type <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'whitespace-nowrap px-4 py-3 text-center font-semibold border-b border-slate-200 dark:border-darkmode-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap px-4 py-3 text-center font-semibold border-b border-slate-200 dark:border-darkmode-400']); ?>Nullable <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'whitespace-nowrap px-4 py-3 text-left font-semibold border-b border-slate-200 dark:border-darkmode-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap px-4 py-3 text-left font-semibold border-b border-slate-200 dark:border-darkmode-400']); ?>Default <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'whitespace-nowrap px-4 py-3 text-center font-semibold border-b border-slate-200 dark:border-darkmode-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap px-4 py-3 text-center font-semibold border-b border-slate-200 dark:border-darkmode-400']); ?>Fillable <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'whitespace-nowrap px-4 py-3 text-center font-semibold border-b border-slate-200 dark:border-darkmode-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap px-4 py-3 text-center font-semibold border-b border-slate-200 dark:border-darkmode-400']); ?>Index <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'whitespace-nowrap px-4 py-3 text-center font-semibold border-b border-slate-200 dark:border-darkmode-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap px-4 py-3 text-center font-semibold border-b border-slate-200 dark:border-darkmode-400']); ?>Unique <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.th','data' => ['class' => 'whitespace-nowrap px-4 py-3 text-left font-semibold border-b border-slate-200 dark:border-darkmode-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'whitespace-nowrap px-4 py-3 text-left font-semibold border-b border-slate-200 dark:border-darkmode-400']); ?>Foreign Key <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.table.tbody','data' => ['id' => 'existing-fields-body','class' => 'divide-y divide-slate-200 dark:divide-darkmode-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.table.tbody'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'existing-fields-body','class' => 'divide-y divide-slate-200 dark:divide-darkmode-400']); ?>
                                    <!-- Existing fields loaded here -->
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
                    </div>
                </div>

                <!-- New Fields Card -->
                <div class="col-span-12 intro-y">
                    <div class="box p-6 border border-slate-200/60 shadow-lg dark:border-darkmode-400 bg-gradient-to-br from-slate-50 to-white dark:from-darkmode-500/20 dark:to-darkmode-600">
                        <div class="flex items-center justify-between border-b border-slate-200/60 pb-4 mb-5 dark:border-darkmode-400">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-600 text-white flex items-center justify-center rounded-lg mr-4 shadow-md">
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'PlusCircle','class' => 'w-5 h-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'PlusCircle','class' => 'w-5 h-5']); ?>
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
                                    <h3 class="font-bold text-lg text-slate-800 dark:text-slate-200">Add New Fields</h3>
                                    <div class="text-slate-500 text-sm">Define new columns to add to the table.</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="text-sm">
                                    <span class="bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-200 px-3 py-1.5 rounded-lg font-medium"><?php echo e(__('global.new')); ?>: </span>
                                    <span id="new-fields-count" class="font-bold text-lg ml-2">0</span>
                                </div>
                                <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['type' => 'button','id' => 'add-field-btn','variant' => 'primary','size' => 'sm','class' => 'shadow-md px-4 py-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','id' => 'add-field-btn','variant' => 'primary','size' => 'sm','class' => 'shadow-md px-4 py-2']); ?>
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
<?php endif; ?> Add Field
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
                        
                        <div class="space-y-4" id="new-fields-container">
                            <!-- New Fields loaded here -->
                            <div class="text-slate-500 text-center py-10 bg-slate-50 rounded-xl border-2 border-dashed border-slate-300 italic" id="no-new-fields-msg">
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'FilePlus','class' => 'w-10 h-10 mx-auto mb-3 text-slate-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'FilePlus','class' => 'w-10 h-10 mx-auto mb-3 text-slate-300']); ?>
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
                                <p>No new fields added yet.</p>
                                <p class="text-sm mt-1">Click "Add Field" to start defining new columns.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Relationships Card -->
                <div class="col-span-12 intro-y">
                    <div class="box p-6 border border-slate-200/60 shadow-lg dark:border-darkmode-400 bg-gradient-to-br from-slate-50 to-white dark:from-darkmode-500/20 dark:to-darkmode-600">
                        <div class="flex items-center justify-between border-b border-slate-200/60 pb-4 mb-5 dark:border-darkmode-400">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-green-600 text-white flex items-center justify-center rounded-lg mr-4 shadow-md">
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Link','class' => 'w-5 h-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Link','class' => 'w-5 h-5']); ?>
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
                                    <h3 class="font-bold text-lg text-slate-800 dark:text-slate-200">Relationships</h3>
                                    <div class="text-slate-500 text-sm">Define connections to other models.</div>
                                </div>
                            </div>
                            <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['type' => 'button','id' => 'add-rel-btn','variant' => 'success','size' => 'sm','class' => 'shadow-md px-4 py-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','id' => 'add-rel-btn','variant' => 'success','size' => 'sm','class' => 'shadow-md px-4 py-2']); ?>
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
<?php endif; ?> Add Relationship
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
                        
                        <!-- Existing Relationships (Detected) -->
                        <div id="existing-rels-container" class="mb-6 hidden">
                            <h4 class="text-sm font-bold text-slate-600 dark:text-slate-300 uppercase mb-3 pl-1 border-b pb-2 border-slate-200 dark:border-darkmode-400">Existing / Detected</h4>
                            <div id="existing-rels-list" class="space-y-3 mt-3"></div>
                        </div>

                        <!-- New Relationships -->
                        <h4 class="text-sm font-bold text-slate-600 dark:text-slate-300 uppercase mb-3 pl-1 border-b pb-2 border-slate-200 dark:border-darkmode-400">New Relationships</h4>
                        <div class="space-y-4" id="relationships-container">
                            <div class="text-slate-500 text-center py-10 bg-slate-50 rounded-xl border-2 border-dashed border-slate-300 italic" id="no-rels-msg">
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'GitBranch','class' => 'w-10 h-10 mx-auto mb-3 text-slate-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'GitBranch','class' => 'w-10 h-10 mx-auto mb-3 text-slate-300']); ?>
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
                                <p>No new relationships added yet.</p>
                                <p class="text-sm mt-1">Click "Add Relationship" to define connections between models.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Components Selection -->
                <div class="col-span-12 intro-y">
                    <div class="box p-6 border border-slate-200/60 shadow-lg dark:border-darkmode-400 bg-gradient-to-br from-slate-50 to-white dark:from-darkmode-500/20 dark:to-darkmode-600">
                        <div class="flex items-center border-b border-slate-200/60 pb-4 mb-5 dark:border-darkmode-400">
                            <div class="w-10 h-10 bg-gradient-to-r from-yellow-500 to-yellow-600 text-white flex items-center justify-center rounded-lg mr-4 shadow-md">
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Settings','class' => 'w-5 h-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Settings','class' => 'w-5 h-5']); ?>
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
                                <h3 class="font-bold text-lg text-slate-800 dark:text-slate-200">Select Components to Update</h3>
                                <div class="text-slate-500 text-sm">Choose which files to update</div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-12">
                                <?php if (isset($component)) { $__componentOriginalb08e28f9db590bed3446cfb449cfe7fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb08e28f9db590bed3446cfb449cfe7fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tom-select.index','data' => ['class' => 'w-full rounded-lg','name' => 'components[]','multiple' => true,'dataPlaceholder' => 'Select components...']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tom-select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full rounded-lg','name' => 'components[]','multiple' => true,'data-placeholder' => 'Select components...']); ?>
                                    <option value="model" selected>Model</option>
                                    <option value="repository_interface" selected>Repository Interface</option>
                                    <option value="repository" selected>Repository</option>
                                    <option value="service" selected>Service</option>
                                    <option value="requests" selected>Form Requests</option>
                                    <option value="controller" selected>Controller</option>
                                    <option value="api" selected>API (Resource + Controller)</option>
                                    <option value="views" selected>Views</option>
                                    <option value="localization" selected>Localization</option>
                                    <option value="routes_web" selected>Web Routes</option>
                                    <option value="routes_api" selected>API Routes</option>
                                    <option value="side_menu" selected>Side Menu</option>
                                    <option value="permissions" selected>Permissions</option>
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
                        </div>
                    </div>
                </div>

                <!-- Submit -->
                <div class="col-span-12 mt-6 p-6 bg-gradient-to-r from-blue-500 to-blue-600 border border-blue-300/50 rounded-xl flex items-center justify-between intro-y shadow-lg">
                    <div class="text-white">
                        <h4 class="font-bold text-xl">Save Changes</h4>
                        <p class="text-blue-100">This will generate a migration for new fields and update the model.</p>
                    </div>
                    <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['type' => 'submit','variant' => 'primary','size' => 'lg','class' => 'w-44 shadow-xl bg-white text-blue-600 hover:bg-slate-100 font-bold px-4 py-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','variant' => 'primary','size' => 'lg','class' => 'w-44 shadow-xl bg-white text-blue-600 hover:bg-slate-100 font-bold px-4 py-3']); ?>
                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Save','class' => 'w-5 h-5 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Save','class' => 'w-5 h-5 mr-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> Save Changes
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

    <!-- Processing Modal -->
    <div id="processing-modal" class="hidden fixed inset-0 z-[9999] flex items-center justify-center bg-black/70 backdrop-blur-sm transition-all">
        <div class="bg-white p-10 rounded-2xl shadow-2xl text-center dark:bg-darkmode-600 transform scale-100 max-w-md w-full mx-4">
            <?php if (isset($component)) { $__componentOriginal5d4f0998832ed68db8b1c96c5084383f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5d4f0998832ed68db8b1c96c5084383f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.loading-icon.index','data' => ['icon' => 'puff','class' => 'w-16 h-16 mx-auto mb-6 text-blue-500']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.loading-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'puff','class' => 'w-16 h-16 mx-auto mb-6 text-blue-500']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5d4f0998832ed68db8b1c96c5084383f)): ?>
<?php $attributes = $__attributesOriginal5d4f0998832ed68db8b1c96c5084383f; ?>
<?php unset($__attributesOriginal5d4f0998832ed68db8b1c96c5084383f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5d4f0998832ed68db8b1c96c5084383f)): ?>
<?php $component = $__componentOriginal5d4f0998832ed68db8b1c96c5084383f; ?>
<?php unset($__componentOriginal5d4f0998832ed68db8b1c96c5084383f); ?>
<?php endif; ?>
            <h3 class="text-2xl font-bold text-slate-800 dark:text-white mb-2">Processing...</h3>
            <p class="text-slate-500">Updating your model and database.</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const targetSelect = document.getElementById('target-table-select');
            const loadBtn = document.getElementById('btn-load-target');
            const form = document.getElementById('edit-form');
            const existingFieldsBody = document.getElementById('existing-fields-body');
            const newFieldsContainer = document.getElementById('new-fields-container');
            const relContainer = document.getElementById('relationships-container');
            const existingRelsContainer = document.getElementById('existing-rels-container');
            const existingRelsList = document.getElementById('existing-rels-list');
            const noNewFieldsMsg = document.getElementById('no-new-fields-msg');
            const noRelsMsg = document.getElementById('no-rels-msg');
            const existingFieldsCount = document.getElementById('existing-fields-count');
            const newFieldsCount = document.getElementById('new-fields-count');
            
            let fieldCount = 0;
            let relCount = 0;

            // Enable Load button when table selected
            targetSelect.addEventListener('change', () => {
                loadBtn.disabled = !targetSelect.value;
            });

            // 2. Load Table Schema
            loadBtn.addEventListener('click', function() {
                const table = targetSelect.value;
                if(!table) return;

                loadBtn.disabled = true;
                const originalBtnContent = loadBtn.innerHTML;
                loadBtn.innerHTML = '<span class="w-4 h-4 mr-2"><svg width="25" viewBox="-2 -2 42 42" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" class="w-full h-full"><g fill="none" fill-rule="evenodd"><g transform="translate(1 1)" stroke-width="4"><circle stroke-opacity=".5" cx="18" cy="18" r="18"></circle><path d="M36 18c0-9.94-8.06-18-18-18"><animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="1s" repeatCount="indefinite"></animateTransform></path></g></g></svg></span> Loading...';

                fetch(`<?php echo e(route('crud-builder.table-details')); ?>?table=${table}`)
                    .then(res => res.json())
                    .then(data => {
                        form.classList.remove('hidden');
                        document.getElementById('model_name').value = data.model_name;
                        document.getElementById('table_name').value = data.table_name;
                        
                        // Populate Existing Fields (Read-Only Table)
                        existingFieldsBody.innerHTML = '';
                        data.fields.forEach(field => {
                            const tr = document.createElement('tr');
                            const tableOptions = availableTables.map(t => `<option value="${t}">${t}</option>`).join('');
                            tr.innerHTML = `
                                <td class="font-medium px-4 py-3 text-left border-b border-slate-200 dark:border-darkmode-400">
                                    <div class="flex items-center">
                                        <i data-lucide="Database" class="w-4 h-4 mr-2 text-slate-400"></i>
                                        \${field.name}
                                    </div>
                                </td>
                                <td class="text-slate-500 px-4 py-3 text-left border-b border-slate-200 dark:border-darkmode-400">
                                    <span class="inline-block px-2 py-1 text-xs font-medium bg-slate-100 dark:bg-darkmode-400 rounded">
                                        \${field.type}
                                    </span>
                                </td>
                                <td class="text-center px-4 py-3 text-slate-500 border-b border-slate-200 dark:border-darkmode-400">
                                    \${field.nullable ? '<span class="text-success text-xs font-medium bg-success/10 px-2 py-1 rounded">Yes</span>' : '<span class="text-slate-400 text-xs">No</span>'}
                                </td>
                                <td class="text-slate-500 text-xs px-4 py-3 text-left border-b border-slate-200 dark:border-darkmode-400">
                                    \${field.default || '-'}
                                </td>
                                <td class="text-center px-4 py-3 text-slate-500 border-b border-slate-200 dark:border-darkmode-400">
                                    <input type="checkbox" name="existing[\${field.name}][fillable]" value="1" class="form-check-input" \${field.fillable ? 'checked' : ''}>
                                </td>
                                <td class="text-center px-4 py-3 text-slate-500 border-b border-slate-200 dark:border-darkmode-400">
                                    <input type="checkbox" name="existing[\${field.name}][index]" value="1" class="form-check-input" \${field.index ? 'checked' : ''}>
                                </td>
                                <td class="text-center px-4 py-3 text-slate-500 border-b border-slate-200 dark:border-darkmode-400">
                                    <input type="checkbox" name="existing[\${field.name}][unique]" value="1" class="form-check-input" \${field.unique ? 'checked' : ''}>
                                </td>
                                <td class="px-4 py-3 text-slate-500 border-b border-slate-200 dark:border-darkmode-400">
                                    <div class="flex items-center gap-2">
                                        <select name="existing[\${field.name}][fk][table]" class="tom-select existing-fk-table-select">
                                            <option value="">Select Table...</option>
                                            \${tableOptions}
                                        </select>
                                        <select name="existing[\${field.name}][fk][column]" class="tom-select existing-fk-column-select" disabled>
                                            <option value="id">id</option>
                                        </select>
                                    </div>
                                </td>
                            `;
                            existingFieldsBody.appendChild(tr);
                            const fkTableSelect = tr.querySelector('.existing-fk-table-select');
                            const fkColSelect = tr.querySelector('.existing-fk-column-select');
                            fkTableSelect.addEventListener('change', function() {
                                loadColumns(this.value, fkColSelect);
                            });
                            initTomSelects(tr);
                        });
                        
                        // Update counter
                        existingFieldsCount.textContent = data.fields.length;

                        // Clear New Fields
                        newFieldsContainer.innerHTML = '';
                        newFieldsContainer.appendChild(noNewFieldsMsg);
                        noNewFieldsMsg.style.display = 'block';
                        fieldCount = 0;

                        // Populate Existing Relationships
                        existingRelsList.innerHTML = '';
                        if(data.relationships && data.relationships.length > 0) {
                            existingRelsContainer.classList.remove('hidden');
                            data.relationships.forEach(rel => {
                                const div = document.createElement('div');
                                div.className = 'p-3 bg-slate-50 border border-slate-200 rounded-md text-sm text-slate-600 flex justify-between items-center shadow-sm';
                                div.innerHTML = `
                                    <div class="flex items-center">
                                        <div class="w-2 h-2 bg-slate-400 rounded-full mr-2"></div>
                                        <div class="flex items-center">
                                            <i data-lucide="Link" class="w-4 h-4 mr-2 text-primary"></i>
                                            <span class="font-bold text-primary">\${rel.type}</span> 
                                            <span class="mx-1">-></span> 
                                            Model <span class="font-bold text-slate-800">\${rel.related_table}</span> 
                                            <span class="text-slate-400 text-xs ml-2">(via \${rel.foreign_key})</span>
                                        </div>
                                    </div>
                                    <div class="flex gap-2">
                                        <button type="button" class="btn btn-sm btn-outline-warning edit-rel-btn" data-rel-id="\${rel.id || rel.type + '_' + rel.related_table}">
                                            <i data-lucide="Edit" class="w-4 h-4"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-danger delete-rel-btn" data-rel-id="\${rel.id || rel.type + '_' + rel.related_table}">
                                            <i data-lucide="Trash2" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                `;
                                existingRelsList.appendChild(div);
                            });
                        } else {
                            existingRelsContainer.classList.remove('hidden');
                            existingRelsList.innerHTML = '<div class="text-slate-500 text-center py-4 bg-slate-50 rounded-lg border border-dashed border-slate-300 italic">No existing relationships detected for this table.</div>';
                        }
                        
                        // Add event listeners for edit/delete buttons in existing relationships
                        setTimeout(() => {
                            existingRelsList.querySelectorAll('.edit-rel-btn').forEach(btn => {
                                btn.addEventListener('click', function() {
                                    const relId = this.getAttribute('data-rel-id');
                                    const relDiv = this.closest('div');
                                    const relText = relDiv.querySelector('span.font-bold.text-primary').textContent;
                                    const relTable = relDiv.querySelector('span.font-bold.text-slate-800').textContent;
                                    const relForeignKey = relDiv.querySelector('span.text-slate-400').textContent.replace('(via ', '').replace(')', '');
                                    
                                    // Create an edit form temporarily
                                    const editForm = document.createElement('div');
                                    editForm.className = 'p-3 bg-blue-50 border border-blue-200 rounded-md text-sm text-slate-600 flex justify-between items-center shadow-sm mb-2';
                                    editForm.innerHTML = `
                                        <div class="flex items-center gap-2">
                                            <i data-lucide="Edit" class="w-4 h-4 text-blue-500"></i>
                                            <span class="font-bold text-blue-600">\${relText}</span> 
                                            <span class="mx-1">-></span> 
                                            <span class="font-bold text-slate-800">\${relTable}</span>
                                            <input type="text" class="form-control form-control-sm w-24 ml-2" value="\${relForeignKey}" placeholder="Foreign Key">
                                        </div>
                                        <div class="flex gap-2">
                                            <button type="button" class="btn btn-sm btn-success save-rel-btn" data-rel-id="\${relId}">
                                                <i data-lucide="Check" class="w-4 h-4"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary cancel-rel-btn" data-rel-id="\${relId}">
                                                <i data-lucide="X" class="w-4 h-4"></i>
                                            </button>
                                        </div>
                                    `;
                                    
                                    // Replace the original div with the edit form
                                    relDiv.parentNode.replaceChild(editForm, relDiv);
                                    
                                    // Initialize lucide icons
                                    if(window.lucide) lucide.createIcons();
                                    
                                    // Add event listeners to save/cancel buttons
                                    editForm.querySelector('.save-rel-btn').addEventListener('click', function() {
                                        const newFk = editForm.querySelector('input').value;
                                        // Here you would typically send an AJAX request to update the relationship
                                        // For now, we'll just update the display
                                        const savedDiv = document.createElement('div');
                                        savedDiv.className = 'p-3 bg-slate-50 border border-slate-200 rounded-md text-sm text-slate-600 flex justify-between items-center shadow-sm mb-2';
                                        savedDiv.innerHTML = `
                                            <div class="flex items-center">
                                                <div class="w-2 h-2 bg-slate-400 rounded-full mr-2"></div>
                                                <div class="flex items-center">
                                                    <i data-lucide="Link" class="w-4 h-4 mr-2 text-primary"></i>
                                                    <span class="font-bold text-primary">\${relText}</span> 
                                                    <span class="mx-1">-></span> 
                                                    Model <span class="font-bold text-slate-800">\${relTable}</span> 
                                                    <span class="text-slate-400 text-xs ml-2">(via \${newFk})</span>
                                                </div>
                                            </div>
                                            <div class="flex gap-2">
                                                <button type="button" class="btn btn-sm btn-outline-warning edit-rel-btn" data-rel-id="\${relId}">
                                                    <i data-lucide="Edit" class="w-4 h-4"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-danger delete-rel-btn" data-rel-id="\${relId}">
                                                    <i data-lucide="Trash2" class="w-4 h-4"></i>
                                                </button>
                                            </div>
                                        `;
                                        
                                        editForm.parentNode.replaceChild(savedDiv, editForm);
                                        
                                        // Reattach event listeners
                                        savedDiv.querySelector('.edit-rel-btn').addEventListener('click', arguments.callee.caller.arguments[0]);
                                        savedDiv.querySelector('.delete-rel-btn').addEventListener('click', function() {
                                            if(confirm('Are you sure you want to remove this relationship?')) {
                                                this.closest('div').remove();
                                            }
                                        });
                                        
                                        if(window.lucide) lucide.createIcons();
                                    });
                                    
                                    editForm.querySelector('.cancel-rel-btn').addEventListener('click', function() {
                                        // Restore the original div
                                        const originalDiv = document.createElement('div');
                                        originalDiv.className = 'p-3 bg-slate-50 border border-slate-200 rounded-md text-sm text-slate-600 flex justify-between items-center shadow-sm mb-2';
                                        originalDiv.innerHTML = `
                                            <div class="flex items-center">
                                                <div class="w-2 h-2 bg-slate-400 rounded-full mr-2"></div>
                                                <div class="flex items-center">
                                                    <i data-lucide="Link" class="w-4 h-4 mr-2 text-primary"></i>
                                                    <span class="font-bold text-primary">\${relText}</span> 
                                                    <span class="mx-1">-></span> 
                                                    Model <span class="font-bold text-slate-800">\${relTable}</span> 
                                                    <span class="text-slate-400 text-xs ml-2">(via \${relForeignKey})</span>
                                                </div>
                                            </div>
                                            <div class="flex gap-2">
                                                <button type="button" class="btn btn-sm btn-outline-warning edit-rel-btn" data-rel-id="\${relId}">
                                                    <i data-lucide="Edit" class="w-4 h-4"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-danger delete-rel-btn" data-rel-id="\${relId}">
                                                    <i data-lucide="Trash2" class="w-4 h-4"></i>
                                                </button>
                                            </div>
                                        `;
                                        
                                        editForm.parentNode.replaceChild(originalDiv, editForm);
                                        
                                        // Reattach event listeners
                                        originalDiv.querySelector('.edit-rel-btn').addEventListener('click', arguments.callee.caller.arguments[0]);
                                        originalDiv.querySelector('.delete-rel-btn').addEventListener('click', function() {
                                            if(confirm('Are you sure you want to remove this relationship?')) {
                                                this.closest('div').remove();
                                            }
                                        });
                                        
                                        if(window.lucide) lucide.createIcons();
                                    });
                                    
                                    if(window.lucide) lucide.createIcons();
                                });
                            });
                            
                            existingRelsList.querySelectorAll('.delete-rel-btn').forEach(btn => {
                                btn.addEventListener('click', function() {
                                    const relId = this.getAttribute('data-rel-id');
                                    if(confirm('Are you sure you want to remove this relationship?')) {
                                        // For now, just hide the element - in a real implementation, you'd send a request to remove the relationship
                                        this.closest('div').remove();
                                    }
                                });
                            });
                        }, 100); // Delay to ensure elements are rendered
                        
                        // Clear New Relationships
                        relContainer.innerHTML = '';
                        relContainer.appendChild(noRelsMsg);
                        noRelsMsg.style.display = 'block';
                        relCount = 0;
                        
                        loadBtn.disabled = false;
                        loadBtn.innerHTML = originalBtnContent;
                        if(window.lucide) lucide.createIcons();
                        
                        // Smooth scroll to form
                        form.scrollIntoView({ behavior: 'smooth' });
                    })
                    .catch(err => {
                        alert("Error loading schema: " + err);
                        loadBtn.disabled = false;
                        loadBtn.innerHTML = originalBtnContent;
                    });
            });

            // --- Field Logic ---
            document.getElementById('add-field-btn').addEventListener('click', () => {
                noNewFieldsMsg.style.display = 'none';
                addFieldRow();
            });

            function addFieldRow() {
                const row = document.createElement('div');
                row.className = `grid grid-cols-12 gap-2 items-center p-4 rounded-md border bg-white border-primary/30 shadow-sm dark:bg-darkmode-600 dark:border-darkmode-400 field-row animate-[fadeIn_0.3s_ease-in-out] hover:border-primary/60 transition-colors`;
                
                row.innerHTML = `
                    <div class="col-span-12 md:col-span-3">
                        <label class="text-xs font-medium text-slate-500 mb-1 block">Column Name <span class="text-primary">(New)</span></label>
                        <input type="text" name="fields[${fieldCount}][name]" class="form-control form-control-sm" required placeholder="e.g. phone_number">
                        <input type="hidden" name="fields[${fieldCount}][is_new]" value="1">
                    </div>
                    <div class="col-span-12 md:col-span-3">
                        <label class="text-xs font-medium text-slate-500 mb-1 block">Type</label>
                        <select name="fields[${fieldCount}][type]" class="tom-select">
                            <option value="string">String</option>
                            <option value="text">Text</option>
                            <option value="integer">Integer</option>
                            <option value="decimal">Decimal</option>
                            <option value="boolean">Boolean</option>
                            <option value="date">Date</option>
                            <option value="dateTime">DateTime</option>
                            <option value="enum">Enum</option>
                            <option value="json">JSON</option>
                            <option value="foreignId">Foreign Key</option>
                        </select>
                    </div>
                    <div class="col-span-12 md:col-span-2">
                        <label class="text-xs font-medium text-slate-500 mb-1 block">Default</label>
                        <input type="text" name="fields[${fieldCount}][default]" class="form-control form-control-sm" placeholder="Optional">
                    </div>
                    <div class="col-span-12 md:col-span-3 flex items-center space-x-4 pt-5">
                        <label class="flex items-center text-xs cursor-pointer">
                            <input type="checkbox" name="fields[${fieldCount}][nullable]" value="1" class="form-check-input mr-1.5"> Nullable
                        </label>
                        <label class="flex items-center text-xs cursor-pointer">
                            <input type="checkbox" name="fields[${fieldCount}][unique]" value="1" class="form-check-input mr-1.5"> Unique
                        </label>
                        <label class="flex items-center text-xs cursor-pointer">
                            <input type="checkbox" name="fields[${fieldCount}][fillable]" value="1" class="form-check-input mr-1.5" checked> Fillable
                        </label>
                    </div>
                    <div class="col-span-12 md:col-span-1 flex justify-end pt-5">
                        <button type="button" class="btn btn-sm btn-outline-danger w-8 h-8 rounded-full p-0 flex items-center justify-center remove-row-btn">
                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                        </button>
                    </div>
                `;
                
                newFieldsContainer.appendChild(row);
                if(window.lucide) lucide.createIcons();
                initTomSelects(row);
                
                row.querySelector('.remove-row-btn').addEventListener('click', () => {
                    row.remove();
                    if(newFieldsContainer.children.length <= 1) { // 1 because of the hidden message
                        noNewFieldsMsg.style.display = 'block';
                    }
                    // Update counter after removal
                    updateNewFieldsCounter();
                });
                
                fieldCount++;
                
                // Update counter after adding
                updateNewFieldsCounter();
            }
            
            function updateNewFieldsCounter() {
                const count = newFieldsContainer.querySelectorAll('.field-row').length;
                newFieldsCount.textContent = count;
                return count;
            }

            // --- Relationship Logic ---
            document.getElementById('add-rel-btn').addEventListener('click', () => {
                noRelsMsg.style.display = 'none';
                addRelRow();
            });

            function addRelRow() {
                const index = relCount;
                const row = document.createElement('div');
                row.className = `grid grid-cols-12 gap-2 items-center p-4 rounded-md border bg-white border-success/30 shadow-sm dark:bg-darkmode-600 dark:border-darkmode-400 rel-row animate-[fadeIn_0.3s_ease-in-out] hover:border-success/60 transition-colors`;
                
                // Helper to create options from available tables
                const tableOptions = availableTables.map(t => `<option value="${t}">${t}</option>`).join('');

                row.innerHTML = `
                    <div class="col-span-12 md:col-span-3">
                        <label class="text-xs font-medium text-slate-500 mb-1 block">Type</label>
                        <select name="relationships[${index}][type]" class="tom-select rel-type-select">
                            <option value="belongsTo">Belongs To</option>
                            <option value="hasMany">Has Many</option>
                            <option value="hasOne">Has One</option>
                        </select>
                    </div>
                    <div class="col-span-12 md:col-span-3">
                        <label class="text-xs font-medium text-slate-500 mb-1 block">Related Table</label>
                        <select name="relationships[${index}][related_table]" class="tom-select rel-table-select">
                            <option value="">Select Table...</option>
                            ${tableOptions}
                        </select>
                    </div>
                    <div class="col-span-12 md:col-span-3">
                         <label class="text-xs font-medium text-slate-500 mb-1 block">Foreign Key</label>
                         <input type="text" name="relationships[${index}][foreign_key]" class="form-control form-control-sm" placeholder="e.g. user_id">
                    </div>
                    <div class="col-span-12 md:col-span-2">
                         <label class="text-xs font-medium text-slate-500 mb-1 block">Related Column</label>
                         <select name="relationships[${index}][related_column]" class="tom-select rel-column-select" disabled>
                            <option value="id">id</option>
                         </select>
                    </div>
                    <div class="col-span-12 md:col-span-1 flex justify-end pt-5">
                        <button type="button" class="btn btn-sm btn-outline-danger w-8 h-8 rounded-full p-0 flex items-center justify-center remove-row-btn">
                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                        </button>
                    </div>
                `;
                
                relContainer.appendChild(row);
                if(window.lucide) lucide.createIcons();
                initTomSelects(row);

                // Dependent Dropdown Logic
                const select = row.querySelector('.rel-table-select');
                const columnSelect = row.querySelector('.rel-column-select');
                
                select.addEventListener('change', function() {
                    loadColumns(this.value, columnSelect);
                    
                    // Auto-suggest Foreign Key
                    const typeSelect = row.querySelector('.rel-type-select');
                    const fkInput = row.querySelector(`input[name="relationships[${index}][foreign_key]"]`);
                    
                    if(this.value && !fkInput.value && typeSelect.value === 'belongsTo') {
                         fkInput.value = this.value.replace(/s$/, '') + '_id'; 
                    }
                });

                row.querySelector('.remove-row-btn').addEventListener('click', () => {
                    row.remove();
                    if(relContainer.children.length <= 1) {
                        noRelsMsg.style.display = 'block';
                    }
                });
                
                relCount++;
            }
            
            function loadColumns(table, selectElement) {
                if(!table) {
                    selectElement.innerHTML = '<option value="id">id</option>';
                    selectElement.disabled = true;
                    return;
                }
                
                selectElement.innerHTML = '<option value="">Loading...</option>';
                selectElement.disabled = true;
                
                fetch(`<?php echo e(route('crud-builder.columns')); ?>?table=${table}`)
                    .then(res => res.json())
                    .then(columns => {
                        selectElement.innerHTML = '';
                        columns.forEach(col => {
                            const opt = document.createElement('option');
                            opt.value = col.name;
                            opt.textContent = col.name;
                            if(col.name === 'id') opt.selected = true;
                            selectElement.appendChild(opt);
                        });
                        selectElement.disabled = false;
                    })
                    .catch(() => {
                        selectElement.innerHTML = '<option value="id">id</option>';
                    });
            }

            // 3. Submit Form
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                document.getElementById('processing-modal').classList.remove('hidden');
                
                // Collect modified relationships data
                const modifiedRels = [];
                existingRelsList.querySelectorAll('div').forEach(div => {
                    const relType = div.querySelector('span.font-bold.text-primary').textContent;
                    const relTable = div.querySelector('span.font-bold.text-slate-800').textContent;
                    const relForeignKey = div.querySelector('span.text-slate-400').textContent.replace('(via ', '').replace(')', '');
                    
                    modifiedRels.push({
                        type: relType,
                        related_table: relTable,
                        foreign_key: relForeignKey
                    });
                });
                
                // Set the hidden input value with modified relationships
                document.getElementById('modified-relationships-input').value = JSON.stringify(modifiedRels);
                
                const formData = new FormData(this);
                // client-side validation: ensure new field names not empty
                const nameInputs = newFieldsContainer.querySelectorAll('input[name*="[name]"]');
                for (const inp of nameInputs) {
                    if (!inp.value || !inp.value.trim()) {
                        document.getElementById('processing-modal').classList.add('hidden');
                        alert("يرجى إدخال اسم العمود لكل حقل جديد قبل الحفظ");
                        return;
                    }
                }
                fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('processing-modal').classList.add('hidden');
                    if (data.success) {
                        alert(data.message + "\n\nOutput: " + data.output);
                        window.location.reload(); 
                    } else {
                        alert("Error: " + data.message);
                    }
                })
                .catch(error => {
                    document.getElementById('processing-modal').classList.add('hidden');
                    alert("System Error: " + error.message);
                });
            });

            // Initialize available tables for relationships
             availableTables = <?php echo json_encode($tables, 15, 512) ?>;

            function initTomSelects(container) {
                if (window.TomSelect) {
                    container.querySelectorAll('select.tom-select').forEach(function(el) {
                        if (!el.tomselect) {
                            new TomSelect(el, {});
                        }
                    });
                }
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../themes/' . $activeTheme . '/' . $activeLayout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views\pages\crud-builder\edit.blade.php ENDPATH**/ ?>