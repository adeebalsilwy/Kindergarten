<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'field' => [],
    'model' => null,
    'validation' => true,
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
    'field' => [],
    'model' => null,
    'validation' => true,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $fieldName = $field['name'] ?? '';
    $fieldType = $field['type'] ?? 'text';
    $fieldValue = old($fieldName, $model ? ($field['relation'] ?? false ? 
        data_get($model, $field['relation'] . '.' . $fieldName) : 
        $model->{$fieldName}) : ($field['default'] ?? ''));
    $fieldRequired = $field['required'] ?? false;
    $fieldDisabled = $field['disabled'] ?? false;
    $fieldReadonly = $field['readonly'] ?? false;
    $fieldPlaceholder = $field['placeholder'] ?? '';
    $fieldHelp = $field['help'] ?? '';
    $fieldError = $errors->first($fieldName);
?>

<div class="form-field-group mb-4">
    <?php if($field['label'] ?? false): ?>
        <?php if (isset($component)) { $__componentOriginal0b5a207e31917d1ae3d42744188acbdf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-label.index','data' => ['for' => ''.e($fieldName).'','class' => ''.e($fieldRequired ? 'required' : '').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => ''.e($fieldName).'','class' => ''.e($fieldRequired ? 'required' : '').'']); ?>
            <?php echo e(__($field['label'])); ?>

            <?php if($fieldRequired): ?>
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

    <?php switch($fieldType):
        case ('text'): ?>
        <?php case ('email'): ?>
        <?php case ('password'): ?>
        <?php case ('number'): ?>
        <?php case ('tel'): ?>
        <?php case ('url'): ?>
            <x-base.form-input
                id="<?php echo e($fieldName); ?>"
                name="<?php echo e($fieldName); ?>"
                type="<?php echo e($fieldType); ?>"
                value="<?php echo e($fieldValue); ?>"
                placeholder="<?php echo e(__($fieldPlaceholder)); ?>"
                <?php echo e($fieldRequired ? 'required' : ''); ?>

                <?php echo e($fieldDisabled ? 'disabled' : ''); ?>

                <?php echo e($fieldReadonly ? 'readonly' : ''); ?>

                class="<?php echo e($fieldError ? 'border-danger' : ''); ?> <?php echo e($field['class'] ?? ''); ?> <?php echo e($validation ? 'auto-save' : ''); ?>"
            />
            <?php break; ?>

        <?php case ('textarea'): ?>
            <x-base.form-textarea
                id="<?php echo e($fieldName); ?>"
                name="<?php echo e($fieldName); ?>"
                placeholder="<?php echo e(__($fieldPlaceholder)); ?>"
                rows="<?php echo e($field['rows'] ?? 4); ?>"
                <?php echo e($fieldRequired ? 'required' : ''); ?>

                <?php echo e($fieldDisabled ? 'disabled' : ''); ?>

                <?php echo e($fieldReadonly ? 'readonly' : ''); ?>

                class="<?php echo e($fieldError ? 'border-danger' : ''); ?> <?php echo e($field['class'] ?? ''); ?> <?php echo e($validation ? 'auto-save' : ''); ?>"
            ><?php echo e($fieldValue); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal)): ?>
<?php $attributes = $__attributesOriginal; ?>
<?php unset($__attributesOriginal); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal)): ?>
<?php $component = $__componentOriginal; ?>
<?php unset($__componentOriginal); ?>
<?php endif; ?>
            <?php break; ?>

        <?php case ('select'): ?>
            <x-base.tom-select
                id="<?php echo e($fieldName); ?>"
                name="<?php echo e($fieldName); ?>"
                <?php echo e($fieldRequired ? 'required' : ''); ?>

                <?php echo e($fieldDisabled ? 'disabled' : ''); ?>

                <?php echo e($fieldReadonly ? 'readonly' : ''); ?>

                class="<?php echo e($fieldError ? 'border-danger' : ''); ?> <?php echo e($field['class'] ?? ''); ?>"
            >
                <?php if($field['placeholder'] ?? false): ?>
                    <option value=""><?php echo e(__($field['placeholder'])); ?></option>
                <?php endif; ?>
                <?php $__currentLoopData = $field['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option 
                        value="<?php echo e($option['value']); ?>" 
                        <?php echo e((string)$fieldValue === (string)$option['value'] ? 'selected' : ''); ?>

                        <?php echo e($option['disabled'] ?? false ? 'disabled' : ''); ?>

                    >
                        <?php echo e(__($option['label'])); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal)): ?>
<?php $attributes = $__attributesOriginal; ?>
<?php unset($__attributesOriginal); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal)): ?>
<?php $component = $__componentOriginal; ?>
<?php unset($__componentOriginal); ?>
<?php endif; ?>
            <?php break; ?>

        <?php case ('checkbox'): ?>
            <div class="flex items-center">
                <x-base.form-check.input
                    id="<?php echo e($fieldName); ?>"
                    name="<?php echo e($fieldName); ?>"
                    type="checkbox"
                    value="<?php echo e($field['value'] ?? '1'); ?>"
                    <?php echo e((bool)$fieldValue ? 'checked' : ''); ?>

                    <?php echo e($fieldRequired ? 'required' : ''); ?>

                    <?php echo e($fieldDisabled ? 'disabled' : ''); ?>

                    <?php echo e($fieldReadonly ? 'readonly' : ''); ?>

                    class="<?php echo e($fieldError ? 'border-danger' : ''); ?> <?php echo e($field['class'] ?? ''); ?>"
                />
                <?php if (isset($component)) { $__componentOriginal8218ba5fba45bffb9ccf737358e222ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8218ba5fba45bffb9ccf737358e222ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-check.label','data' => ['for' => ''.e($fieldName).'','class' => 'ms-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-check.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => ''.e($fieldName).'','class' => 'ms-2']); ?>
                    <?php echo e(__($field['label'])); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8218ba5fba45bffb9ccf737358e222ee)): ?>
<?php $attributes = $__attributesOriginal8218ba5fba45bffb9ccf737358e222ee; ?>
<?php unset($__attributesOriginal8218ba5fba45bffb9ccf737358e222ee); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8218ba5fba45bffb9ccf737358e222ee)): ?>
<?php $component = $__componentOriginal8218ba5fba45bffb9ccf737358e222ee; ?>
<?php unset($__componentOriginal8218ba5fba45bffb9ccf737358e222ee); ?>
<?php endif; ?>
            </div>
            <?php break; ?>

        <?php case ('radio'): ?>
            <div class="space-y-2">
                <?php $__currentLoopData = $field['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-center">
                        <x-base.form-check.input
                            id="<?php echo e($fieldName); ?>_<?php echo e($option['value']); ?>"
                            name="<?php echo e($fieldName); ?>"
                            type="radio"
                            value="<?php echo e($option['value']); ?>"
                            <?php echo e((string)$fieldValue === (string)$option['value'] ? 'checked' : ''); ?>

                            <?php echo e($fieldRequired ? 'required' : ''); ?>

                            <?php echo e($fieldDisabled ? 'disabled' : ''); ?>

                            <?php echo e($fieldReadonly ? 'readonly' : ''); ?>

                            class="<?php echo e($fieldError ? 'border-danger' : ''); ?> <?php echo e($field['class'] ?? ''); ?>"
                        />
                        <?php if (isset($component)) { $__componentOriginal8218ba5fba45bffb9ccf737358e222ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8218ba5fba45bffb9ccf737358e222ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-check.label','data' => ['for' => ''.e($fieldName).'_'.e($option['value']).'','class' => 'ms-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-check.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => ''.e($fieldName).'_'.e($option['value']).'','class' => 'ms-2']); ?>
                            <?php echo e(__($option['label'])); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8218ba5fba45bffb9ccf737358e222ee)): ?>
<?php $attributes = $__attributesOriginal8218ba5fba45bffb9ccf737358e222ee; ?>
<?php unset($__attributesOriginal8218ba5fba45bffb9ccf737358e222ee); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8218ba5fba45bffb9ccf737358e222ee)): ?>
<?php $component = $__componentOriginal8218ba5fba45bffb9ccf737358e222ee; ?>
<?php unset($__componentOriginal8218ba5fba45bffb9ccf737358e222ee); ?>
<?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php break; ?>

        <?php case ('switch'): ?>
            <div class="form-switch mt-2">
                <x-base.form-check.input
                    id="<?php echo e($fieldName); ?>"
                    name="<?php echo e($fieldName); ?>"
                    type="checkbox"
                    value="<?php echo e($field['value'] ?? '1'); ?>"
                    <?php echo e((bool)$fieldValue ? 'checked' : ''); ?>

                    <?php echo e($fieldRequired ? 'required' : ''); ?>

                    <?php echo e($fieldDisabled ? 'disabled' : ''); ?>

                    <?php echo e($fieldReadonly ? 'readonly' : ''); ?>

                    class="<?php echo e($fieldError ? 'border-danger' : ''); ?> <?php echo e($field['class'] ?? ''); ?>"
                />
                <?php if (isset($component)) { $__componentOriginal8218ba5fba45bffb9ccf737358e222ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8218ba5fba45bffb9ccf737358e222ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-check.label','data' => ['for' => ''.e($fieldName).'','class' => 'ms-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-check.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => ''.e($fieldName).'','class' => 'ms-2']); ?>
                    <?php echo e(__($field['label'])); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8218ba5fba45bffb9ccf737358e222ee)): ?>
<?php $attributes = $__attributesOriginal8218ba5fba45bffb9ccf737358e222ee; ?>
<?php unset($__attributesOriginal8218ba5fba45bffb9ccf737358e222ee); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8218ba5fba45bffb9ccf737358e222ee)): ?>
<?php $component = $__componentOriginal8218ba5fba45bffb9ccf737358e222ee; ?>
<?php unset($__componentOriginal8218ba5fba45bffb9ccf737358e222ee); ?>
<?php endif; ?>
            </div>
            <?php break; ?>

        <?php case ('file'): ?>
            <div class="border-2 border-dashed rounded-md p-4 <?php echo e($fieldError ? 'border-danger' : 'border-slate-300'); ?>">
                <div class="flex items-center justify-center w-full">
                    <label for="<?php echo e($fieldName); ?>" class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed rounded-lg cursor-pointer <?php echo e($fieldError ? 'border-danger' : 'border-slate-300'); ?> hover:border-primary">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Upload','class' => 'w-8 h-8 mb-2 text-slate-500']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Upload','class' => 'w-8 h-8 mb-2 text-slate-500']); ?>
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
                            <p class="mb-2 text-sm text-slate-500">
                                <span class="font-semibold"><?php echo e(__('access_control.actions.click_to_upload')); ?></span> <?php echo e(__('access_control.actions.or_drag_drop')); ?>

                            </p>
                            <p class="text-xs text-slate-500">
                                <?php echo e($field['accept'] ?? 'PNG, JPG, GIF up to 10MB'); ?>

                            </p>
                        </div>
                        <input 
                            id="<?php echo e($fieldName); ?>" 
                            name="<?php echo e($fieldName); ?>" 
                            type="file" 
                            class="hidden" 
                            <?php echo e($field['accept'] ?? ''); ?>

                            <?php echo e($fieldRequired ? 'required' : ''); ?>

                            <?php echo e($fieldDisabled ? 'disabled' : ''); ?>

                        />
                    </label>
                </div>
                <?php if($fieldValue && $field['show_preview'] ?? false): ?>
                    <div class="mt-3">
                        <img src="<?php echo e($fieldValue); ?>" alt="Preview" class="w-20 h-20 object-cover rounded">
                    </div>
                <?php endif; ?>
            </div>
            <?php break; ?>

        <?php case ('date'): ?>
        <?php case ('datetime-local'): ?>
        <?php case ('time'): ?>
            <x-base.form-input
                id="<?php echo e($fieldName); ?>"
                name="<?php echo e($fieldName); ?>"
                type="<?php echo e($fieldType); ?>"
                value="<?php echo e($fieldValue); ?>"
                <?php echo e($fieldRequired ? 'required' : ''); ?>

                <?php echo e($fieldDisabled ? 'disabled' : ''); ?>

                <?php echo e($fieldReadonly ? 'readonly' : ''); ?>

                class="<?php echo e($fieldError ? 'border-danger' : ''); ?> <?php echo e($field['class'] ?? ''); ?>"
            />
            <?php break; ?>

        <?php case ('range'): ?>
            <div class="flex items-center gap-4">
                <input
                    id="<?php echo e($fieldName); ?>"
                    name="<?php echo e($fieldName); ?>"
                    type="range"
                    min="<?php echo e($field['min'] ?? 0); ?>"
                    max="<?php echo e($field['max'] ?? 100); ?>"
                    step="<?php echo e($field['step'] ?? 1); ?>"
                    value="<?php echo e($fieldValue); ?>"
                    class="w-full h-2 bg-slate-200 rounded-lg appearance-none cursor-pointer dark:bg-slate-700 <?php echo e($field['class'] ?? ''); ?>"
                    <?php echo e($fieldRequired ? 'required' : ''); ?>

                    <?php echo e($fieldDisabled ? 'disabled' : ''); ?>

                />
                <span id="<?php echo e($fieldName); ?>_value" class="text-sm font-medium text-slate-600">
                    <?php echo e($fieldValue); ?>

                </span>
            </div>
            <script>
                document.getElementById('<?php echo e($fieldName); ?>').addEventListener('input', function() {
                    document.getElementById('<?php echo e($fieldName); ?>_value').textContent = this.value;
                });
            </script>
            <?php break; ?>

        <?php case ('color'): ?>
            <div class="flex items-center gap-3">
                <input
                    id="<?php echo e($fieldName); ?>"
                    name="<?php echo e($fieldName); ?>"
                    type="color"
                    value="<?php echo e($fieldValue); ?>"
                    class="w-12 h-12 border-0 rounded cursor-pointer <?php echo e($field['class'] ?? ''); ?>"
                    <?php echo e($fieldRequired ? 'required' : ''); ?>

                    <?php echo e($fieldDisabled ? 'disabled' : ''); ?>

                />
                <span class="text-sm text-slate-600"><?php echo e($fieldValue); ?></span>
            </div>
            <?php break; ?>

        <?php case ('custom'): ?>
            <?php echo $field['render']($fieldValue, $field); ?>

            <?php break; ?>
    <?php endswitch; ?>

    <?php if($fieldError): ?>
        <div class="text-danger text-xs mt-1">
            <?php echo e($fieldError); ?>

        </div>
    <?php endif; ?>

    <?php if($fieldHelp): ?>
        <div class="text-slate-500 text-xs mt-1">
            <?php echo e(__($fieldHelp)); ?>

        </div>
    <?php endif; ?>
</div><?php /**PATH E:\backup\Source\resources\views\components\access-control\form-field.blade.php ENDPATH**/ ?>