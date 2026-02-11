

<?php $__env->startSection('subhead'); ?>
    <title>Visual CRUD Builder - Deebo</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
    <div class="mt-8 flex items-center justify-between">
        <div>
            <h2 class="intro-y text-2xl font-bold mr-auto text-slate-800 dark:text-slate-200">New Module Builder</h2>
            <div class="text-slate-500 text-sm mt-1">Create a new module with Model, Migration, and CRUD views.</div>
        </div>
        <a href="<?php echo e(route('crud-builder.edit')); ?>">
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Edit','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Edit','class' => 'w-4 h-4 mr-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> Edit Existing Model
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
    
    <div class="intro-y box mt-5 p-6" id="crud-builder-app">
        <form id="crud-form" method="POST" action="<?php echo e(route('crud-builder.generate')); ?>">
            <?php echo csrf_field(); ?>
            <div class="grid grid-cols-12 gap-6">
                
                <!-- Model Info Card -->
                <div class="col-span-12 intro-y">
                    <div class="box p-6 border border-slate-200/60 shadow-lg dark:border-darkmode-400 bg-gradient-to-br from-slate-50 to-white dark:from-darkmode-500/20 dark:to-darkmode-600">
                        <div class="flex items-center border-b border-slate-200/60 pb-4 mb-5 dark:border-darkmode-400">
                            <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-600 text-white flex items-center justify-center rounded-lg mr-4 shadow-md">
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Box','class' => 'w-5 h-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Box','class' => 'w-5 h-5']); ?>
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
                                <h3 class="font-bold text-lg text-slate-800 dark:text-slate-200">Module Information</h3>
                                <div class="text-slate-500 text-sm">Basic details for the new module.</div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-5">
                            <div class="col-span-12 sm:col-span-6">
                                <div class="flex items-center gap-2">
                                    <?php if (isset($component)) { $__componentOriginal0b5a207e31917d1ae3d42744188acbdf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-label.index','data' => ['for' => 'model_name','class' => 'font-medium text-slate-700 dark:text-slate-300 mb-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'model_name','class' => 'font-medium text-slate-700 dark:text-slate-300 mb-2']); ?>Model Name <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $attributes = $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $component = $__componentOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginale20ed82c418469896d8832ea04767a66 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale20ed82c418469896d8832ea04767a66 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.popover.index','data' => ['placement' => 'top']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.popover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['placement' => 'top']); ?>
                                        <div class="flex items-center">
                                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'HelpCircle','class' => 'w-4 h-4 text-slate-500 cursor-pointer']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'HelpCircle','class' => 'w-4 h-4 text-slate-500 cursor-pointer']); ?>
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
                                        <?php if (isset($component)) { $__componentOriginal2dd4bcc6b9a50576b67c27a9fed722b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2dd4bcc6b9a50576b67c27a9fed722b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.popover.panel','data' => ['class' => 'p-3 bg-slate-800 text-white text-xs max-w-xs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.popover.panel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-3 bg-slate-800 text-white text-xs max-w-xs']); ?>
                                            Enter the name of your model in PascalCase (e.g., UserProfile)
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
                                </div>
                                <?php if (isset($component)) { $__componentOriginal40054831fd8fc1521987609af4b37cc0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40054831fd8fc1521987609af4b37cc0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-input.index','data' => ['id' => 'model_name','name' => 'model_name','type' => 'text','placeholder' => 'e.g. Product','required' => true,'class' => 'py-3 px-4 text-sm rounded-lg border-2 border-slate-200 focus:border-blue-500 dark:border-darkmode-300 dark:bg-darkmode-700 dark:text-slate-200']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'model_name','name' => 'model_name','type' => 'text','placeholder' => 'e.g. Product','required' => true,'class' => 'py-3 px-4 text-sm rounded-lg border-2 border-slate-200 focus:border-blue-500 dark:border-darkmode-300 dark:bg-darkmode-700 dark:text-slate-200']); ?>
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
                                <div class="form-help text-slate-500 text-xs mt-2">PascalCase (e.g. UserProfile)</div>
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <div class="flex items-center gap-2">
                                    <?php if (isset($component)) { $__componentOriginal0b5a207e31917d1ae3d42744188acbdf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-label.index','data' => ['for' => 'table_name','class' => 'font-medium text-slate-700 dark:text-slate-300 mb-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'table_name','class' => 'font-medium text-slate-700 dark:text-slate-300 mb-2']); ?>Table Name <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $attributes = $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $component = $__componentOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginale20ed82c418469896d8832ea04767a66 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale20ed82c418469896d8832ea04767a66 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.popover.index','data' => ['placement' => 'top']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.popover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['placement' => 'top']); ?>
                                        <div class="flex items-center">
                                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'HelpCircle','class' => 'w-4 h-4 text-slate-500 cursor-pointer']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'HelpCircle','class' => 'w-4 h-4 text-slate-500 cursor-pointer']); ?>
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
                                        <?php if (isset($component)) { $__componentOriginal2dd4bcc6b9a50576b67c27a9fed722b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2dd4bcc6b9a50576b67c27a9fed722b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.popover.panel','data' => ['class' => 'p-3 bg-slate-800 text-white text-xs max-w-xs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.popover.panel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-3 bg-slate-800 text-white text-xs max-w-xs']); ?>
                                            Enter the name of your database table in snake_case (e.g., user_profiles)
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
                                </div>
                                <?php if (isset($component)) { $__componentOriginal40054831fd8fc1521987609af4b37cc0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40054831fd8fc1521987609af4b37cc0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-input.index','data' => ['id' => 'table_name','name' => 'table_name','type' => 'text','placeholder' => 'e.g. products','required' => true,'class' => 'py-3 px-4 text-sm rounded-lg border-2 border-slate-200 focus:border-blue-500 dark:border-darkmode-300 dark:bg-darkmode-700 dark:text-slate-200']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'table_name','name' => 'table_name','type' => 'text','placeholder' => 'e.g. products','required' => true,'class' => 'py-3 px-4 text-sm rounded-lg border-2 border-slate-200 focus:border-blue-500 dark:border-darkmode-300 dark:bg-darkmode-700 dark:text-slate-200']); ?>
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
                                <div class="form-help text-slate-500 text-xs mt-2">snake_case (e.g. user_profiles)</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fields Card -->
                <div class="col-span-12 intro-y">
                    <div class="box p-6 border border-slate-200/60 shadow-lg dark:border-darkmode-400 bg-gradient-to-br from-slate-50 to-white dark:from-darkmode-500/20 dark:to-darkmode-600">
                        <div class="flex items-center justify-between border-b border-slate-200/60 pb-4 mb-5 dark:border-darkmode-400">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-600 text-white flex items-center justify-center rounded-lg mr-4 shadow-md">
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'List','class' => 'w-5 h-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'List','class' => 'w-5 h-5']); ?>
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
                                    <h3 class="font-bold text-lg text-slate-800 dark:text-slate-200">Fields Definition</h3>
                                    <div class="text-slate-500 text-sm">Define the columns for your database table.</div>
                                </div>
                            </div>
                            <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['type' => 'button','id' => 'add-field','variant' => 'primary','size' => 'sm','class' => 'shadow-md px-4 py-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','id' => 'add-field','variant' => 'primary','size' => 'sm','class' => 'shadow-md px-4 py-2']); ?>
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
                        
                        <div class="space-y-4" id="fields-container">
                            <!-- Default ID field is implicit, adding first custom field -->
                            <div class="field-row grid grid-cols-12 gap-3 items-center p-5 rounded-lg border bg-white border-blue-100 shadow-md dark:bg-darkmode-600 dark:border-blue-500/30 hover:border-blue-300 transition-all duration-300">
                                <div class="col-span-12 md:col-span-3">
                                    <?php if (isset($component)) { $__componentOriginal0b5a207e31917d1ae3d42744188acbdf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-label.index','data' => ['class' => 'text-xs font-semibold text-slate-600 dark:text-slate-300 mb-2 block']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-xs font-semibold text-slate-600 dark:text-slate-300 mb-2 block']); ?>Column Name <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-input.index','data' => ['name' => 'fields[0][name]','placeholder' => 'name','required' => true,'class' => 'form-control-sm py-2 px-3 text-sm rounded-lg border-2 border-slate-200 focus:border-blue-500 dark:border-darkmode-300 dark:bg-darkmode-700 dark:text-slate-200']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'fields[0][name]','placeholder' => 'name','required' => true,'class' => 'form-control-sm py-2 px-3 text-sm rounded-lg border-2 border-slate-200 focus:border-blue-500 dark:border-darkmode-300 dark:bg-darkmode-700 dark:text-slate-200']); ?>
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
                                <div class="col-span-12 md:col-span-3">
                                    <?php if (isset($component)) { $__componentOriginal0b5a207e31917d1ae3d42744188acbdf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-label.index','data' => ['class' => 'text-xs font-semibold text-slate-600 dark:text-slate-300 mb-2 block']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-xs font-semibold text-slate-600 dark:text-slate-300 mb-2 block']); ?>Type <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tom-select.index','data' => ['name' => 'fields[0][type]','class' => 'mt-1 rounded-lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tom-select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'fields[0][type]','class' => 'mt-1 rounded-lg']); ?>
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
                                <div class="col-span-12 md:col-span-2">
                                    <?php if (isset($component)) { $__componentOriginal0b5a207e31917d1ae3d42744188acbdf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-label.index','data' => ['class' => 'text-xs font-semibold text-slate-600 dark:text-slate-300 mb-2 block']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-xs font-semibold text-slate-600 dark:text-slate-300 mb-2 block']); ?>Default <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-input.index','data' => ['name' => 'fields[0][default]','placeholder' => 'Optional','class' => 'form-control-sm py-2 px-3 text-sm rounded-lg border-2 border-slate-200 focus:border-blue-500 dark:border-darkmode-300 dark:bg-darkmode-700 dark:text-slate-200']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'fields[0][default]','placeholder' => 'Optional','class' => 'form-control-sm py-2 px-3 text-sm rounded-lg border-2 border-slate-200 focus:border-blue-500 dark:border-darkmode-300 dark:bg-darkmode-700 dark:text-slate-200']); ?>
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
                                <div class="col-span-12 md:col-span-3 flex items-center space-x-5 pt-6">
                                    <label class="flex items-center text-sm cursor-pointer">
                                        <?php if (isset($component)) { $__componentOriginal45dc70583f76c3df9e7383efd567b5fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal45dc70583f76c3df9e7383efd567b5fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-check.input','data' => ['name' => 'fields[0][nullable]','value' => '1','class' => 'mr-2 w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-check.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'fields[0][nullable]','value' => '1','class' => 'mr-2 w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal45dc70583f76c3df9e7383efd567b5fd)): ?>
<?php $attributes = $__attributesOriginal45dc70583f76c3df9e7383efd567b5fd; ?>
<?php unset($__attributesOriginal45dc70583f76c3df9e7383efd567b5fd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45dc70583f76c3df9e7383efd567b5fd)): ?>
<?php $component = $__componentOriginal45dc70583f76c3df9e7383efd567b5fd; ?>
<?php unset($__componentOriginal45dc70583f76c3df9e7383efd567b5fd); ?>
<?php endif; ?> <?php if (isset($component)) { $__componentOriginal0b5a207e31917d1ae3d42744188acbdf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-label.index','data' => ['class' => 'mb-0 text-slate-600 dark:text-slate-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-0 text-slate-600 dark:text-slate-300']); ?>Nullable <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $attributes = $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $component = $__componentOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
                                    </label>
                                    <label class="flex items-center text-sm cursor-pointer">
                                        <?php if (isset($component)) { $__componentOriginal45dc70583f76c3df9e7383efd567b5fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal45dc70583f76c3df9e7383efd567b5fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-check.input','data' => ['name' => 'fields[0][unique]','value' => '1','class' => 'mr-2 w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-check.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'fields[0][unique]','value' => '1','class' => 'mr-2 w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal45dc70583f76c3df9e7383efd567b5fd)): ?>
<?php $attributes = $__attributesOriginal45dc70583f76c3df9e7383efd567b5fd; ?>
<?php unset($__attributesOriginal45dc70583f76c3df9e7383efd567b5fd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45dc70583f76c3df9e7383efd567b5fd)): ?>
<?php $component = $__componentOriginal45dc70583f76c3df9e7383efd567b5fd; ?>
<?php unset($__componentOriginal45dc70583f76c3df9e7383efd567b5fd); ?>
<?php endif; ?> <?php if (isset($component)) { $__componentOriginal0b5a207e31917d1ae3d42744188acbdf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-label.index','data' => ['class' => 'mb-0 text-slate-600 dark:text-slate-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-0 text-slate-600 dark:text-slate-300']); ?>Unique <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $attributes = $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $component = $__componentOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
                                    </label>
                                </div>
                                <div class="col-span-12 md:col-span-1 text-right pt-4 md:pt-0">
                                    <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['type' => 'button','class' => 'text-slate-400 hover:text-danger transition-colors remove-field p-2 rounded-full hover:bg-red-50 dark:hover:bg-red-500/10','variant' => 'soft-danger']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','class' => 'text-slate-400 hover:text-danger transition-colors remove-field p-2 rounded-full hover:bg-red-50 dark:hover:bg-red-500/10','variant' => 'soft-danger']); ?>
                                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Trash2','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Trash2','class' => 'w-4 h-4']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['type' => 'button','id' => 'add-relationship','variant' => 'success','size' => 'sm','class' => 'shadow-md px-4 py-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','id' => 'add-relationship','variant' => 'success','size' => 'sm','class' => 'shadow-md px-4 py-2']); ?>
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
                        <div class="space-y-4" id="relationships-container">
                            <div class="text-slate-500 text-center py-10 bg-slate-50 rounded-lg border-2 border-dashed border-slate-300 italic" id="no-rels-msg">
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Layers','class' => 'w-10 h-10 mx-auto mb-3 text-slate-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Layers','class' => 'w-10 h-10 mx-auto mb-3 text-slate-300']); ?>
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
                                <p>No relationships defined yet.</p>
                                <p class="text-sm mt-1">Click "Add Relationship" to define connections between models.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit -->
                <div class="col-span-12 mt-6 p-6 bg-gradient-to-r from-blue-500 to-blue-600 border border-blue-300/50 rounded-xl flex items-center justify-between intro-y shadow-lg">
                    <div class="text-white">
                        <h4 class="font-bold text-xl">Generate Module</h4>
                        <p class="text-blue-100">This will create the Migration, Model, Controller, and Views.</p>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Zap','class' => 'w-5 h-5 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Zap','class' => 'w-5 h-5 mr-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> Generate Module
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
            <h3 class="text-2xl font-bold text-slate-800 dark:text-white mb-2">Generating Module...</h3>
            <p class="text-slate-500">Please wait while we set up everything for you.</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let fieldCount = 1;
            let relCount = 0;
            let availableTables = [];
            const noRelsMsg = document.getElementById('no-rels-msg');

            // Fetch Tables on Load
            fetch("<?php echo e(route('crud-builder.tables')); ?>")
                .then(response => response.json())
                .then(data => {
                    availableTables = data;
                })
                .catch(error => console.error('Error loading tables:', error));
            
            // Helper to create field row
            function createFieldRow(index, data = {}) {
                const row = document.createElement('div');
                row.className = 'field-row grid grid-cols-12 gap-3 items-center p-5 rounded-lg border bg-white border-blue-100 shadow-md dark:bg-darkmode-600 dark:border-blue-500/30 hover:border-blue-300 transition-all duration-300';
                
                const name = data.name || '';
                const type = data.type || 'string';

                row.innerHTML = `
                    <div class="col-span-12 md:col-span-3">
                        <label class="text-xs font-semibold text-slate-600 dark:text-slate-300 mb-2 block">Column Name</label>
                        <input type="text" name="fields[${index}][name]" value="${name}" placeholder="column_name" required class="form-control form-control-sm py-2 px-3 text-sm rounded-lg border-2 border-slate-200 focus:border-blue-500 dark:border-darkmode-300 dark:bg-darkmode-700 dark:text-slate-200" />
                    </div>
                    <div class="col-span-12 md:col-span-3">
                        <label class="text-xs font-semibold text-slate-600 dark:text-slate-300 mb-2 block">Type</label>
                        <select name="fields[${index}][type]" class="tom-select">
                            <option value="string" ${type === 'string' ? 'selected' : ''}>String</option>
                            <option value="text" ${type === 'text' ? 'selected' : ''}>Text</option>
                            <option value="integer" ${type === 'integer' ? 'selected' : ''}>Integer</option>
                            <option value="decimal" ${type === 'decimal' ? 'selected' : ''}>Decimal</option>
                            <option value="boolean" ${type === 'boolean' ? 'selected' : ''}>Boolean</option>
                            <option value="date" ${type === 'date' ? 'selected' : ''}>Date</option>
                            <option value="dateTime" ${type === 'dateTime' ? 'selected' : ''}>DateTime</option>
                            <option value="enum" ${type === 'enum' ? 'selected' : ''}>Enum</option>
                            <option value="json" ${type === 'json' ? 'selected' : ''}>JSON</option>
                            <option value="foreignId" ${type === 'foreignId' ? 'selected' : ''}>Foreign Key</option>
                        </select>
                    </div>
                    <div class="col-span-12 md:col-span-2">
                        <label class="text-xs font-semibold text-slate-600 dark:text-slate-300 mb-2 block">Default</label>
                        <input type="text" name="fields[${index}][default]" placeholder="Optional" class="form-control form-control-sm py-2 px-3 text-sm rounded-lg border-2 border-slate-200 focus:border-blue-500 dark:border-darkmode-300 dark:bg-darkmode-700 dark:text-slate-200" />
                    </div>
                    <div class="col-span-12 md:col-span-3 flex items-center space-x-5 pt-6">
                        <label class="flex items-center text-sm cursor-pointer">
                            <input type="checkbox" name="fields[${index}][nullable]" value="1" class="form-check-input mr-2 w-4 h-4" /> <span class="mb-0 text-slate-600 dark:text-slate-300">Nullable</span>
                        </label>
                        <label class="flex items-center text-sm cursor-pointer">
                            <input type="checkbox" name="fields[${index}][unique]" value="1" class="form-check-input mr-2 w-4 h-4" /> <span class="mb-0 text-slate-600 dark:text-slate-300">Unique</span>
                        </label>
                    </div>
                    <div class="col-span-12 md:col-span-1 text-right pt-4 md:pt-0">
                        <button type="button" class="text-slate-400 hover:text-danger transition-colors remove-field p-2 rounded-full hover:bg-red-50 dark:hover:bg-red-500/10">
                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                        </button>
                    </div>
                `;
                
                // Add event listener for remove button
                row.querySelector('.remove-field').addEventListener('click', function() {
                    row.remove();
                });
                
                // Initialize TomSelect components if they exist
                if (window.TomSelect) {
                    const typeSelect = row.querySelector('select.tom-select');
                    if (typeSelect && !typeSelect.tomselect) {
                        new TomSelect(typeSelect, {});
                    }
                }
                
                return row;
            }

            // Add Field
            document.getElementById('add-field').addEventListener('click', function() {
                const container = document.getElementById('fields-container');
                const row = createFieldRow(fieldCount);
                container.appendChild(row);
                fieldCount++;
                if(window.lucide) lucide.createIcons();
            });
            
            // Handle initial remove button
            document.querySelectorAll('.remove-field').forEach(btn => {
                btn.addEventListener('click', function() {
                    this.closest('.field-row').remove();
                });
            });

            // Helper to create relationship row
            function createRelRow(index, data = {}) {
                const row = document.createElement('div');
                row.className = 'rel-row grid grid-cols-12 gap-4 p-5 bg-white border border-green-100 shadow-md rounded-lg dark:bg-darkmode-600 dark:border-green-500/30 relative animate-[fadeIn_0.3s_ease-in-out] hover:border-green-300 transition-all duration-300';
                
                // Build Table Options
                let tableOptions = '<option value="">Select Table...</option>';
                availableTables.forEach(t => {
                    tableOptions += `<option value="${t}">${t}</option>`;
                });

                row.innerHTML = `
                    <div class="col-span-12 md:col-span-3">
                        <label class="form-label text-xs font-semibold text-slate-600 dark:text-slate-300 mb-2">Type</label>
                        <select name="relationships[${index}][type]" class="tom-select rel-type-select">
                            <option value="belongsTo">Belongs To</option>
                            <option value="hasMany">Has Many</option>
                            <option value="hasOne">Has One</option>
                            <option value="belongsToMany">Many to Many</option>
                        </select>
                    </div>
                    <div class="col-span-12 md:col-span-3">
                        <label class="form-label text-xs font-semibold text-slate-600 dark:text-slate-300 mb-2">Related Table</label>
                        <select name="relationships[${index}][related_table]" class="tom-select rel-table-select" required>
                            ${tableOptions}
                        </select>
                    </div>
                    <div class="col-span-12 md:col-span-3">
                        <label class="form-label text-xs font-semibold text-slate-600 dark:text-slate-300 mb-2">Related Column</label>
                         <select name="relationships[${index}][related_key]" class="tom-select rel-column-select" disabled>
                            <option value="">Select Table First</option>
                        </select>
                        <div class="form-help text-[10px] text-slate-400 mt-1">Owner Key (BelongsTo) or Foreign Key (HasMany)</div>
                    </div>
                    <div class="col-span-12 md:col-span-2">
                        <label class="form-label text-xs font-semibold text-slate-600 dark:text-slate-300 mb-2">Foreign Key</label>
                        <input type="text" name="relationships[${index}][foreign_key]" class="form-control form-control-sm py-2 px-3 text-sm rounded-lg border-2 border-slate-200 focus:border-green-500 dark:border-darkmode-300 dark:bg-darkmode-700 dark:text-slate-200" placeholder="e.g. user_id">
                         <div class="form-help text-[10px] text-slate-400 mt-1">Foreign Key (BelongsTo) or Local Key (HasMany)</div>
                    </div>
                    <div class="col-span-12 md:col-span-1 text-right pt-4 md:pt-0">
                        <button type="button" class="text-slate-400 hover:text-danger transition-colors remove-rel p-2 rounded-full hover:bg-red-50 dark:hover:bg-red-500/10">
                            <i data-lucide="x" class="w-4 h-4"></i>
                        </button>
                    </div>
                `;
                
                // Event Listener for Table Change
                const select = row.querySelector('.rel-table-select');
                select.addEventListener('change', function() {
                    loadColumns(this.value, index);
                    
                    // Auto-suggest Foreign Key
                    const typeSelect = row.querySelector('.rel-type-select');
                    const fkInput = row.querySelector(`input[name="relationships[${index}][foreign_key]"]`);
                    
                    if(this.value && !fkInput.value && typeSelect.value === 'belongsTo') {
                         fkInput.value = this.value.replace(/s$/, '') + '_id'; 
                    }
                });
                
                // Initialize TomSelect for the new row
                if (window.TomSelect) {
                    row.querySelectorAll('select.tom-select').forEach(select => {
                        if (!select.tomselect) {
                            new TomSelect(select, {});
                        }
                    });
                }
                
                row.querySelector('.remove-rel').addEventListener('click', function() {
                    row.remove();
                    if(document.getElementById('relationships-container').children.length <= 1) { // 1 for message
                         noRelsMsg.style.display = 'block';
                    }
                });

                return row;
            }

            function loadColumns(tableName, index, selectedValue = null) {
                const container = document.getElementById('relationships-container');
                const rows = container.querySelectorAll('.rel-row');
                let targetRow = null;
                
                // Find the row that triggered this function
                for (let row of rows) {
                    const tableSelect = row.querySelector('.rel-table-select');
                    if (tableSelect && tableSelect.value === tableName) {
                        targetRow = row;
                        break;
                    }
                }
                
                if (!targetRow) return;
                
                const colSelect = targetRow.querySelector('.rel-column-select');
                colSelect.innerHTML = '<option>Loading...</option>';
                colSelect.disabled = true;
                
                fetch(`<?php echo e(route('crud-builder.columns')); ?>?table=${tableName}`)
                    .then(res => res.json())
                    .then(cols => {
                        colSelect.innerHTML = '';
                        cols.forEach(c => {
                            const option = document.createElement('option');
                            option.value = c.name;
                            option.text = `${c.name} (${c.type_name})`;
                            if (selectedValue === c.name || (!selectedValue && c.name === 'id')) {
                                option.selected = true;
                            }
                            colSelect.appendChild(option);
                        });
                        colSelect.disabled = false;
                    })
                    .catch(() => {
                        colSelect.innerHTML = '<option value="">Error loading columns</option>';
                        colSelect.disabled = false;
                    });
            }

            // Add Relationship  
            document.getElementById('add-relationship').addEventListener('click', function() {
                noRelsMsg.style.display = 'none';
                const container = document.getElementById('relationships-container');
                const row = createRelRow(relCount);
                container.appendChild(row);
                relCount++;
                if(window.lucide) lucide.createIcons();
            });

            // Submit Form
            const form = document.getElementById('crud-form');
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                document.getElementById('processing-modal').classList.remove('hidden');
                
                const formData = new FormData(this);
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
                         // Optional: Redirect or clear form
                    } else {
                        alert("Error: " + data.message);
                    }
                })
                .catch(error => {
                    document.getElementById('processing-modal').classList.add('hidden');
                    alert("System Error: " + error.message);
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../themes/' . $activeTheme . '/' . $activeLayout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views\pages\crud-builder\index.blade.php ENDPATH**/ ?>