

<?php $__env->startSection('subcontent'); ?>
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto"><?php echo e(__('global.edit_dashboard_content')); ?></h2>
</div>

<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-8 mx-auto">
        <div class="tab-content mt-5">
            <div class="tab-pane active" id="content-form">
                <div class="box p-5">
                    <form method="POST" action="<?php echo e(route('dashboard-content.update', $dashboardContent)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-12">
                                <label for="section" class="form-label"><?php echo e(__('global.section')); ?> <span class="text-danger">*</span></label>
                                <?php if (isset($component)) { $__componentOriginal1c0beb3cd2271cd34645d22f15db5e3a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1c0beb3cd2271cd34645d22f15db5e3a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-select.index','data' => ['id' => 'section','name' => 'section','class' => 'form-control @error(\'section\') is-invalid @enderror','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'section','name' => 'section','class' => 'form-control @error(\'section\') is-invalid @enderror','required' => true]); ?>
                                    <option value=""><?php echo e(__('global.select_section')); ?></option>
                                    <option value="welcome_section" <?php echo e(old('section', $dashboardContent->section) == 'welcome_section' ? 'selected' : ''); ?>>Welcome Section</option>
                                    <option value="stats_cards" <?php echo e(old('section', $dashboardContent->section) == 'stats_cards' ? 'selected' : ''); ?>>Stats Cards</option>
                                    <option value="recent_activities" <?php echo e(old('section', $dashboardContent->section) == 'recent_activities' ? 'selected' : ''); ?>>Recent Activities</option>
                                    <option value="monthly_summary" <?php echo e(old('section', $dashboardContent->section) == 'monthly_summary' ? 'selected' : ''); ?>>Monthly Summary</option>
                                    <option value="quick_actions" <?php echo e(old('section', $dashboardContent->section) == 'quick_actions' ? 'selected' : ''); ?>>Quick Actions</option>
                                    <option value="parents_communication" <?php echo e(old('section', $dashboardContent->section) == 'parents_communication' ? 'selected' : ''); ?>>Parents Communication</option>
                                    <option value="important_updates" <?php echo e(old('section', $dashboardContent->section) == 'important_updates' ? 'selected' : ''); ?>>Important Updates</option>
                                    <option value="custom" <?php echo e(old('section', $dashboardContent->section) == 'custom' ? 'selected' : ''); ?>>Custom Section</option>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1c0beb3cd2271cd34645d22f15db5e3a)): ?>
<?php $attributes = $__attributesOriginal1c0beb3cd2271cd34645d22f15db5e3a; ?>
<?php unset($__attributesOriginal1c0beb3cd2271cd34645d22f15db5e3a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1c0beb3cd2271cd34645d22f15db5e3a)): ?>
<?php $component = $__componentOriginal1c0beb3cd2271cd34645d22f15db5e3a; ?>
<?php unset($__componentOriginal1c0beb3cd2271cd34645d22f15db5e3a); ?>
<?php endif; ?>
                                <?php $__errorArgs = ['section'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-span-12">
                                <label for="key" class="form-label"><?php echo e(__('global.key')); ?> <span class="text-danger">*</span></label>
                                <?php if (isset($component)) { $__componentOriginal40054831fd8fc1521987609af4b37cc0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40054831fd8fc1521987609af4b37cc0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-input.index','data' => ['id' => 'key','name' => 'key','type' => 'text','class' => 'form-control @error(\'key\') is-invalid @enderror','placeholder' => ''.e(__('global.enter_key')).'','value' => ''.e(old('key', $dashboardContent->key)).'','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'key','name' => 'key','type' => 'text','class' => 'form-control @error(\'key\') is-invalid @enderror','placeholder' => ''.e(__('global.enter_key')).'','value' => ''.e(old('key', $dashboardContent->key)).'','required' => true]); ?>
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
                                <?php $__errorArgs = ['key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-span-12">
                                <label for="content_en" class="form-label"><?php echo e(__('global.content_en')); ?> <span class="text-danger">*</span></label>
                                <?php if (isset($component)) { $__componentOriginal29dbcf960a4ade6d0a2b790c04ae12cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal29dbcf960a4ade6d0a2b790c04ae12cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-textarea.index','data' => ['id' => 'content_en','name' => 'content_en','class' => 'form-control @error(\'content_en\') is-invalid @enderror','placeholder' => ''.e(__('global.enter_content_en')).'','rows' => '4','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'content_en','name' => 'content_en','class' => 'form-control @error(\'content_en\') is-invalid @enderror','placeholder' => ''.e(__('global.enter_content_en')).'','rows' => '4','required' => true]); ?><?php echo e(old('content_en', $dashboardContent->content['en'] ?? '')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal29dbcf960a4ade6d0a2b790c04ae12cf)): ?>
<?php $attributes = $__attributesOriginal29dbcf960a4ade6d0a2b790c04ae12cf; ?>
<?php unset($__attributesOriginal29dbcf960a4ade6d0a2b790c04ae12cf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal29dbcf960a4ade6d0a2b790c04ae12cf)): ?>
<?php $component = $__componentOriginal29dbcf960a4ade6d0a2b790c04ae12cf; ?>
<?php unset($__componentOriginal29dbcf960a4ade6d0a2b790c04ae12cf); ?>
<?php endif; ?>
                                <?php $__errorArgs = ['content_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-span-12">
                                <label for="content_ar" class="form-label"><?php echo e(__('global.content_ar')); ?> <span class="text-danger">*</span></label>
                                <?php if (isset($component)) { $__componentOriginal29dbcf960a4ade6d0a2b790c04ae12cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal29dbcf960a4ade6d0a2b790c04ae12cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-textarea.index','data' => ['id' => 'content_ar','name' => 'content_ar','class' => 'form-control @error(\'content_ar\') is-invalid @enderror','placeholder' => ''.e(__('global.enter_content_ar')).'','rows' => '4','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'content_ar','name' => 'content_ar','class' => 'form-control @error(\'content_ar\') is-invalid @enderror','placeholder' => ''.e(__('global.enter_content_ar')).'','rows' => '4','required' => true]); ?><?php echo e(old('content_ar', $dashboardContent->content['ar'] ?? '')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal29dbcf960a4ade6d0a2b790c04ae12cf)): ?>
<?php $attributes = $__attributesOriginal29dbcf960a4ade6d0a2b790c04ae12cf; ?>
<?php unset($__attributesOriginal29dbcf960a4ade6d0a2b790c04ae12cf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal29dbcf960a4ade6d0a2b790c04ae12cf)): ?>
<?php $component = $__componentOriginal29dbcf960a4ade6d0a2b790c04ae12cf; ?>
<?php unset($__componentOriginal29dbcf960a4ade6d0a2b790c04ae12cf); ?>
<?php endif; ?>
                                <?php $__errorArgs = ['content_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-span-6">
                                <label for="is_active" class="form-label"><?php echo e(__('global.status')); ?></label>
                                <x-base.form-check.input id="is_active" name="is_active" class="form-check-input <?php $__errorArgs = ['is_active'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    type="checkbox" value="1" <?php echo e(old('is_active', $dashboardContent->is_active) ? 'checked' : ''); ?> />
                                <label for="is_active" class="form-check-label"><?php echo e(__('global.active')); ?></label>
                                <?php $__errorArgs = ['is_active'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-span-6">
                                <label for="order" class="form-label"><?php echo e(__('global.order')); ?></label>
                                <?php if (isset($component)) { $__componentOriginal40054831fd8fc1521987609af4b37cc0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40054831fd8fc1521987609af4b37cc0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-input.index','data' => ['id' => 'order','name' => 'order','type' => 'number','class' => 'form-control @error(\'order\') is-invalid @enderror','placeholder' => ''.e(__('global.enter_order')).'','value' => ''.e(old('order', $dashboardContent->order)).'','min' => '0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'order','name' => 'order','type' => 'number','class' => 'form-control @error(\'order\') is-invalid @enderror','placeholder' => ''.e(__('global.enter_order')).'','value' => ''.e(old('order', $dashboardContent->order)).'','min' => '0']); ?>
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
                                <?php $__errorArgs = ['order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="mt-5">
                            <a href="<?php echo e(route('dashboard-content.index')); ?>" class="btn btn-outline-secondary w-24 mr-1"><?php echo e(__('global.cancel')); ?></a>
                            <button type="submit" class="btn btn-primary w-24"><?php echo e(__('global.update')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views\pages\dashboard-content\edit.blade.php ENDPATH**/ ?>