

<?php $__env->startSection('head'); ?>
    <title><?php echo e(__('global.edit_permission')); ?> - <?php echo e(config('app.name')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto"><?php echo e(__('global.edit_permission')); ?>: <?php echo e(str_replace('_', ' ', $permission->name)); ?></h2>
        <div class="flex gap-2">
            <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['variant' => 'outline-secondary','as' => 'a','href' => ''.e(route('permissions.index')).'','class' => 'flex items-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'outline-secondary','as' => 'a','href' => ''.e(route('permissions.index')).'','class' => 'flex items-center']); ?>
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
                <?php echo e(__('global.back_to_list')); ?>

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
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="intro-y box p-5">
                <form action="<?php echo e(route('permissions.update', $permission->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    
                    <!-- Basic Information -->
                    <div class="border-b border-slate-200/60 dark:border-darkmode-400 pb-6 mb-6">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center mr-3">
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Key','class' => 'w-5 h-5 text-primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Key','class' => 'w-5 h-5 text-primary']); ?>
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
                            <h3 class="text-lg font-medium"><?php echo e(__('global.permission_details')); ?></h3>
                        </div>
                        
                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-12">
                                <?php if (isset($component)) { $__componentOriginal0b5a207e31917d1ae3d42744188acbdf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-label.index','data' => ['class' => 'font-medium']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-medium']); ?><?php echo e(__('global.permission_name')); ?> * <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-input.index','data' => ['type' => 'text','name' => 'name','value' => ''.e(old('name', $permission->name)).'','class' => 'mt-2','placeholder' => ''.e(__('global.enter_permission_name')).'','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'name','value' => ''.e(old('name', $permission->name)).'','class' => 'mt-2','placeholder' => ''.e(__('global.enter_permission_name')).'','required' => true]); ?>
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
                                <div class="text-slate-500 text-xs mt-1"><?php echo e(__('global.permission_name_format')); ?></div>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger mt-2 text-sm"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            
                            <div class="col-span-12 sm:col-span-6">
                                <?php if (isset($component)) { $__componentOriginal0b5a207e31917d1ae3d42744188acbdf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-label.index','data' => ['class' => 'font-medium']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-medium']); ?><?php echo e(__('global.guard_name')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $attributes = $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $component = $__componentOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
                                <select name="guard_name" class="form-select mt-2" disabled>
                                    <option value="web" <?php echo e($permission->guard_name == 'web' ? 'selected' : ''); ?>>web</option>
                                    <option value="api" <?php echo e($permission->guard_name == 'api' ? 'selected' : ''); ?>>api</option>
                                </select>
                                <div class="text-slate-500 text-xs mt-1"><?php echo e(__('global.guard_name_cannot_be_changed')); ?></div>
                            </div>
                        </div>
                        
                        <div class="mt-4 p-3 bg-info/10 border border-info/20 rounded-lg">
                            <div class="flex items-center text-info">
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Info','class' => 'w-5 h-5 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Info','class' => 'w-5 h-5 mr-2']); ?>
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
                                <span class="text-sm"><?php echo e(__('global.permission_id')); ?>: <?php echo e($permission->id); ?> | <?php echo e(__('global.created')); ?>: <?php echo e($permission->created_at->format('M d, Y')); ?></span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Preview and Current Status -->
                    <div class="border-b border-slate-200/60 dark:border-darkmode-400 pb-6 mb-6">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 rounded-full bg-success/10 flex items-center justify-center mr-3">
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Eye','class' => 'w-5 h-5 text-success']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Eye','class' => 'w-5 h-5 text-success']); ?>
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
                            <h3 class="text-lg font-medium"><?php echo e(__('global.current_status')); ?></h3>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="p-4 bg-slate-50 dark:bg-darkmode-600 rounded-lg">
                                <div class="text-center">
                                    <div class="text-sm text-slate-600 dark:text-slate-400 mb-2"><?php echo e(__('global.current_display_name')); ?></div>
                                    <div class="text-lg font-medium text-slate-800 dark:text-slate-200">
                                        <?php echo e(str_replace('_', ' ', $permission->name)); ?>

                                    </div>
                                </div>
                            </div>
                            
                            <div class="p-4 bg-slate-50 dark:bg-darkmode-600 rounded-lg">
                                <div class="text-center">
                                    <div class="text-sm text-slate-600 dark:text-slate-400 mb-2"><?php echo e(__('global.updated_preview')); ?></div>
                                    <div id="permissionPreview" class="text-lg font-medium text-slate-800 dark:text-slate-200">
                                        <?php echo e(old('name', $permission->name) ? str_replace('_', ' ', old('name', $permission->name)) : __('global.enter_name_to_preview')); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Assignment Information -->
                    <div class="border-b border-slate-200/60 dark:border-darkmode-400 pb-6 mb-6">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 rounded-full bg-info/10 flex items-center justify-center mr-3">
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'ShieldCheck','class' => 'w-5 h-5 text-info']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'ShieldCheck','class' => 'w-5 h-5 text-info']); ?>
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
                            <h3 class="text-lg font-medium"><?php echo e(__('global.assignment_information')); ?></h3>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="p-4 bg-primary/5 border border-primary/20 rounded-lg">
                                <h4 class="font-medium text-primary mb-2 flex items-center">
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Users','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Users','class' => 'w-4 h-4 mr-2']); ?>
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
                                    <?php echo e(__('global.assigned_roles')); ?>

                                </h4>
                                <div class="text-2xl font-bold"><?php echo e($permission->roles->count()); ?></div>
                                <div class="text-sm text-slate-600 mt-1"><?php echo e(__('global.roles_using_this_permission')); ?></div>
                            </div>
                            
                            <div class="p-4 bg-success/5 border border-success/20 rounded-lg">
                                <h4 class="font-medium text-success mb-2 flex items-center">
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Crown','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Crown','class' => 'w-4 h-4 mr-2']); ?>
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
                                    <?php echo e(__('global.admin_assignment')); ?>

                                </h4>
                                <div class="flex items-center">
                                    <?php if($permission->roles->contains('id', 1)): ?>
                                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'CheckCircle','class' => 'w-5 h-5 text-success mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'CheckCircle','class' => 'w-5 h-5 text-success mr-2']); ?>
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
                                        <span class="font-medium"><?php echo e(__('global.assigned_to_admin')); ?></span>
                                    <?php else: ?>
                                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'AlertCircle','class' => 'w-5 h-5 text-warning mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'AlertCircle','class' => 'w-5 h-5 text-warning mr-2']); ?>
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
                                        <span class="font-medium"><?php echo e(__('global.not_assigned_to_admin')); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="text-sm text-slate-600 mt-1"><?php echo e(__('global.admin_role_status')); ?></div>
                            </div>
                        </div>
                        
                        <?php if($permission->roles->count() > 0): ?>
                        <div class="mt-4">
                            <h4 class="font-medium text-slate-800 dark:text-slate-200 mb-2"><?php echo e(__('global.assigned_to_roles')); ?>:</h4>
                            <div class="flex flex-wrap gap-2">
                                <?php $__currentLoopData = $permission->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="px-3 py-1 text-sm rounded-full <?php echo e($role->id == 1 ? 'bg-yellow-100 text-yellow-800 border border-yellow-200' : 'bg-primary/10 text-primary border border-primary/20'); ?>">
                                        <?php echo e($role->name); ?>

                                        <?php if($role->id == 1): ?>
                                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Crown','class' => 'w-3 h-3 ml-1 inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Crown','class' => 'w-3 h-3 ml-1 inline']); ?>
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
                                        <?php endif; ?>
                                    </span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Form Actions -->
                    <div class="flex justify-between items-center pt-4">
                        <a href="<?php echo e(route('permissions.index')); ?>" class="btn btn-outline-secondary flex items-center">
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'X','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'X','class' => 'w-4 h-4 mr-2']); ?>
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
                            <?php echo e(__('global.cancel')); ?>

                        </a>
                        <div class="flex gap-2">
                            <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['type' => 'reset','variant' => 'outline-secondary','class' => 'flex items-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'reset','variant' => 'outline-secondary','class' => 'flex items-center']); ?>
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'RotateCcw','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'RotateCcw','class' => 'w-4 h-4 mr-2']); ?>
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
                                <?php echo e(__('global.reset_changes')); ?>

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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['type' => 'submit','variant' => 'primary','class' => 'flex items-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','variant' => 'primary','class' => 'flex items-center']); ?>
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Save','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Save','class' => 'w-4 h-4 mr-2']); ?>
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
                                <?php echo e(__('global.update_permission')); ?>

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
        </div>
        
        <!-- Permission Information Sidebar -->
        <div class="intro-y col-span-12 lg:col-span-4">
            <div class="space-y-6">
                <!-- Usage Statistics -->
                <div class="box p-5 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-darkmode-600 dark:to-darkmode-700">
                    <h3 class="text-lg font-medium text-slate-800 dark:text-slate-200 mb-4 flex items-center">
                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'BarChart3','class' => 'w-5 h-5 text-blue-500 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'BarChart3','class' => 'w-5 h-5 text-blue-500 mr-2']); ?>
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
                        <?php echo e(__('global.usage_statistics')); ?>

                    </h3>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-slate-600 dark:text-slate-400"><?php echo e(__('global.total_assignments')); ?></span>
                            <span class="font-medium"><?php echo e($permission->roles->count()); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-600 dark:text-slate-400"><?php echo e(__('global.users_with_access')); ?></span>
                            <span class="font-medium"><?php echo e($permission->roles->sum('users_count')); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-600 dark:text-slate-400"><?php echo e(__('global.last_modified')); ?></span>
                            <span class="text-sm"><?php echo e($permission->updated_at->format('M d, Y')); ?></span>
                        </div>
                    </div>
                </div>
                
                <!-- Editing Guidelines -->
                <div class="box p-5 bg-gradient-to-br from-green-50 to-emerald-50 dark:from-darkmode-600 dark:to-darkmode-700">
                    <h3 class="text-lg font-medium text-slate-800 dark:text-slate-200 mb-4 flex items-center">
                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'HelpCircle','class' => 'w-5 h-5 text-green-500 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'HelpCircle','class' => 'w-5 h-5 text-green-500 mr-2']); ?>
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
                        <?php echo e(__('global.editing_guidelines')); ?>

                    </h3>
                    
                    <div class="space-y-3 text-sm text-slate-600 dark:text-slate-400">
                        <div class="flex items-start">
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'AlertTriangle','class' => 'w-4 h-4 text-yellow-500 mt-0.5 mr-2 flex-shrink-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'AlertTriangle','class' => 'w-4 h-4 text-yellow-500 mt-0.5 mr-2 flex-shrink-0']); ?>
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
                            <span><?php echo e(__('global.name_changes_affect_all_roles')); ?></span>
                        </div>
                        
                        <div class="flex items-start">
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Lock','class' => 'w-4 h-4 text-red-500 mt-0.5 mr-2 flex-shrink-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Lock','class' => 'w-4 h-4 text-red-500 mt-0.5 mr-2 flex-shrink-0']); ?>
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
                            <span><?php echo e(__('global.guard_name_cannot_be_modified')); ?></span>
                        </div>
                        
                        <div class="flex items-start">
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Info','class' => 'w-4 h-4 text-blue-500 mt-0.5 mr-2 flex-shrink-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Info','class' => 'w-4 h-4 text-blue-500 mt-0.5 mr-2 flex-shrink-0']); ?>
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
                            <span><?php echo e(__('global.changes_take_effect_immediately')); ?></span>
                        </div>
                    </div>
                </div>
                
                <!-- Danger Zone -->
                <?php if($permission->roles->count() > 0): ?>
                <div class="box p-5 bg-gradient-to-br from-red-50 to-rose-50 dark:from-darkmode-600 dark:to-darkmode-700 border border-red-200 dark:border-red-800">
                    <h3 class="text-lg font-medium text-red-800 dark:text-red-200 mb-3 flex items-center">
                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'AlertTriangle','class' => 'w-5 h-5 text-red-500 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'AlertTriangle','class' => 'w-5 h-5 text-red-500 mr-2']); ?>
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
                        <?php echo e(__('global.caution_zone')); ?>

                    </h3>
                    
                    <p class="text-sm text-red-700 dark:text-red-300 mb-3">
                        <?php echo e(__('global.modifying_used_permission_warning')); ?>

                    </p>
                    
                    <div class="text-xs text-red-600 dark:text-red-400 bg-red-100 dark:bg-red-900/20 p-2 rounded">
                        <?php echo e(__('global.affects_roles_count', ['count' => $permission->roles->count()])); ?>

                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- JavaScript for Real-time Preview -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nameInput = document.querySelector('input[name="name"]');
            const previewElement = document.getElementById('permissionPreview');
            
            function updatePreview() {
                const value = nameInput.value.trim();
                if (value) {
                    previewElement.textContent = value.replace(/_/g, ' ');
                    previewElement.className = 'text-lg font-medium text-slate-800 dark:text-slate-200';
                } else {
                    previewElement.textContent = '<?php echo e(__('global.enter_name_to_preview')); ?>';
                    previewElement.className = 'text-lg font-medium text-slate-500 dark:text-slate-400';
                }
            }
            
            nameInput.addEventListener('input', updatePreview);
            
            // Initialize preview
            updatePreview();
        });
        
        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const name = document.querySelector('input[name="name"]').value.trim();
            
            if (!name) {
                e.preventDefault();
                alert('<?php echo e(__('global.please_enter_permission_name')); ?>');
                return;
            }
            
            // Warn about name changes affecting roles
            <?php if($permission->roles->count() > 0): ?>
            if (name !== '<?php echo e($permission->name); ?>') {
                if (!confirm('<?php echo e(__('global.name_change_warning', ['count' => $permission->roles->count()])); ?>')) {
                    e.preventDefault();
                    return;
                }
            }
            <?php endif; ?>
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../themes/' . $activeTheme . '/' . $activeLayout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views\pages\permissions\edit.blade.php ENDPATH**/ ?>