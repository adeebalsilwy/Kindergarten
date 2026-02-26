<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'label' => '',
    'name' => '',
    'type' => 'text',
    'value' => '',
    'placeholder' => '',
    'required' => false,
    'help' => '',
    'error' => '',
    'icon' => '',
    'addon' => '',
    'options' => [],
    'multiple' => false,
    'rows' => 3,
    'disabled' => false,
    'readonly' => false,
    'autocomplete' => 'off'
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'label' => '',
    'name' => '',
    'type' => 'text',
    'value' => '',
    'placeholder' => '',
    'required' => false,
    'help' => '',
    'error' => '',
    'icon' => '',
    'addon' => '',
    'options' => [],
    'multiple' => false,
    'rows' => 3,
    'disabled' => false,
    'readonly' => false,
    'autocomplete' => 'off'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="mb-4">
    <?php if($label): ?>
        <?php if (isset($component)) { $__componentOriginal0b5a207e31917d1ae3d42744188acbdf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-label.index','data' => ['class' => ''.e($required ? 'required' : '').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => ''.e($required ? 'required' : '').'']); ?>
            <?php echo e($label); ?>

            <?php if($required): ?>
                <span class="text-danger">*</span>
            <?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $attributes = $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $component = $__componentOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
    <?php endif; ?>

    <div class="mt-1">
        <?php switch($type):
            case ('select'): ?>
                <?php if (isset($component)) { $__componentOriginalb08e28f9db590bed3446cfb449cfe7fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb08e28f9db590bed3446cfb449cfe7fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tom-select.index','data' => ['name' => ''.e($name).'','class' => 'w-full','multiple' => $multiple,'disabled' => $disabled,'dataPlaceholder' => ''.e($placeholder ?: __('global.select_option')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tom-select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => ''.e($name).'','class' => 'w-full','multiple' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($multiple),'disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($disabled),'data-placeholder' => ''.e($placeholder ?: __('global.select_option')).'']); ?>
                    <?php if(!$multiple): ?>
                        <option value=""><?php echo e($placeholder ?: __('global.select_option')); ?></option>
                    <?php endif; ?>
                    <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e(is_array($option) ? $option['value'] : $key); ?>" 
                                <?php echo e((is_array($option) ? $option['value'] : $key) == old($name, $value) ? 'selected' : ''); ?>>
                            <?php echo e(is_array($option) ? $option['label'] : $option); ?>

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
                <?php break; ?>

            <?php case ('textarea'): ?>
                <?php if (isset($component)) { $__componentOriginal29dbcf960a4ade6d0a2b790c04ae12cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal29dbcf960a4ade6d0a2b790c04ae12cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-textarea.index','data' => ['name' => ''.e($name).'','rows' => ''.e($rows).'','class' => 'w-full resize-none '.e($disabled ? 'bg-slate-100' : '').'','placeholder' => ''.e($placeholder).'','disabled' => $disabled,'readonly' => $readonly]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => ''.e($name).'','rows' => ''.e($rows).'','class' => 'w-full resize-none '.e($disabled ? 'bg-slate-100' : '').'','placeholder' => ''.e($placeholder).'','disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($disabled),'readonly' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($readonly)]); ?><?php echo e(old($name, $value)); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal29dbcf960a4ade6d0a2b790c04ae12cf)): ?>
<?php $attributes = $__attributesOriginal29dbcf960a4ade6d0a2b790c04ae12cf; ?>
<?php unset($__attributesOriginal29dbcf960a4ade6d0a2b790c04ae12cf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal29dbcf960a4ade6d0a2b790c04ae12cf)): ?>
<?php $component = $__componentOriginal29dbcf960a4ade6d0a2b790c04ae12cf; ?>
<?php unset($__componentOriginal29dbcf960a4ade6d0a2b790c04ae12cf); ?>
<?php endif; ?>
                <?php break; ?>

            <?php case ('file'): ?>
                <div class="flex items-center">
                    <?php if (isset($component)) { $__componentOriginal40054831fd8fc1521987609af4b37cc0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40054831fd8fc1521987609af4b37cc0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-input.index','data' => ['type' => 'file','name' => ''.e($name).'','accept' => ''.e($addon ?: 'image/*').'','class' => 'block w-full text-sm text-slate-500 file:me-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary/90','disabled' => $disabled]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'file','name' => ''.e($name).'','accept' => ''.e($addon ?: 'image/*').'','class' => 'block w-full text-sm text-slate-500 file:me-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary/90','disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($disabled)]); ?>
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
                <?php if($value && $type === 'file'): ?>
                    <div class="mt-2 flex items-center">
                        <?php if(Str::startsWith($value, ['http', 'https'])): ?>
                            <img src="<?php echo e($value); ?>" alt="Current File" class="w-16 h-16 object-cover rounded border-2 border-slate-200">
                        <?php else: ?>
                            <img src="<?php echo e(asset('storage/' . $value)); ?>" alt="Current File" class="w-16 h-16 object-cover rounded border-2 border-slate-200">
                        <?php endif; ?>
                        <span class="ms-3 text-sm text-slate-500"><?php echo e(__('global.current_file')); ?></span>
                    </div>
                <?php endif; ?>
                <?php break; ?>

            <?php case ('checkbox'): ?>
                <div class="flex items-center">
                    <x-base.form-check-input 
                        type="checkbox" 
                        name="<?php echo e($name); ?>" 
                        value="1"
                        class="border-slate-300 rounded text-primary focus:ring-primary"
                        <?php echo e(old($name, $value) ? 'checked' : ''); ?>

                        :disabled="$disabled" />
                    <?php if (isset($component)) { $__componentOriginal0b5a207e31917d1ae3d42744188acbdf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-label.index','data' => ['class' => 'ms-2 mb-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ms-2 mb-0']); ?><?php echo e($placeholder); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $attributes = $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $component = $__componentOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
                </div>
                <?php break; ?>

            <?php case ('radio'): ?>
                <div class="space-y-2">
                    <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex items-center">
                            <x-base.form-check-input 
                                type="radio" 
                                name="<?php echo e($name); ?>" 
                                value="<?php echo e(is_array($option) ? $option['value'] : $key); ?>"
                                class="border-slate-300 text-primary focus:ring-primary"
                                <?php echo e((is_array($option) ? $option['value'] : $key) == old($name, $value) ? 'checked' : ''); ?>

                                :disabled="$disabled" />
                            <?php if (isset($component)) { $__componentOriginal0b5a207e31917d1ae3d42744188acbdf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-label.index','data' => ['class' => 'ms-2 mb-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ms-2 mb-0']); ?>
                                <?php echo e(is_array($option) ? $option['label'] : $option); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $attributes = $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $component = $__componentOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php break; ?>

            <?php default: ?>
                <?php if($icon || $addon): ?>
                    <div class="relative">
                        <?php if($icon): ?>
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => ''.e($icon).'','class' => 'h-5 w-5 text-slate-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => ''.e($icon).'','class' => 'h-5 w-5 text-slate-400']); ?>
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
                        <?php endif; ?>
                        <?php if($addon): ?>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <span class="text-slate-500 sm:text-sm"><?php echo e($addon); ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal40054831fd8fc1521987609af4b37cc0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40054831fd8fc1521987609af4b37cc0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-input.index','data' => ['type' => ''.e($type).'','name' => ''.e($name).'','value' => ''.e(old($name, $value)).'','class' => 'w-full '.e($icon ? 'pl-10' : '').' '.e($addon ? 'pr-12' : '').' '.e($disabled ? 'bg-slate-100' : '').'','placeholder' => ''.e($placeholder).'','disabled' => $disabled,'readonly' => $readonly,'autocomplete' => ''.e($autocomplete).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => ''.e($type).'','name' => ''.e($name).'','value' => ''.e(old($name, $value)).'','class' => 'w-full '.e($icon ? 'pl-10' : '').' '.e($addon ? 'pr-12' : '').' '.e($disabled ? 'bg-slate-100' : '').'','placeholder' => ''.e($placeholder).'','disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($disabled),'readonly' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($readonly),'autocomplete' => ''.e($autocomplete).'']); ?>
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
                <?php else: ?>
                    <?php if (isset($component)) { $__componentOriginal40054831fd8fc1521987609af4b37cc0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40054831fd8fc1521987609af4b37cc0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-input.index','data' => ['type' => ''.e($type).'','name' => ''.e($name).'','value' => ''.e(old($name, $value)).'','class' => 'w-full '.e($disabled ? 'bg-slate-100' : '').'','placeholder' => ''.e($placeholder).'','disabled' => $disabled,'readonly' => $readonly,'autocomplete' => ''.e($autocomplete).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => ''.e($type).'','name' => ''.e($name).'','value' => ''.e(old($name, $value)).'','class' => 'w-full '.e($disabled ? 'bg-slate-100' : '').'','placeholder' => ''.e($placeholder).'','disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($disabled),'readonly' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($readonly),'autocomplete' => ''.e($autocomplete).'']); ?>
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
                <?php endif; ?>
        <?php endswitch; ?>
    </div>

    <?php if($help): ?>
        <p class="mt-2 text-sm text-slate-500"><?php echo e($help); ?></p>
    <?php endif; ?>

    <?php if($error || $errors->has($name)): ?>
        <p class="mt-2 text-sm text-danger">
            <?php echo e($error ?: $errors->first($name)); ?>

        </p>
    <?php endif; ?>
</div><?php /**PATH F:\my project\laravel\contract\Source\resources\views/components/form-field.blade.php ENDPATH**/ ?>