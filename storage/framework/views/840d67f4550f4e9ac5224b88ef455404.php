<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['id' => null, 'selected' => false]));

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

foreach (array_filter((['id' => null, 'selected' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php if (isset($component)) { $__componentOriginalf680044c1842e049a2fe070d6973c7e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf680044c1842e049a2fe070d6973c7e9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.transition.index','data' => ['id' => ''.e($id).'','role' => 'tabpanel','ariaLabelledby' => ''.e(uncamelize($id, '-')).'-tab','selector' => '.active','enter' => 'transition-[visibility,opacity] ease-linear duration-150','enterFrom' => '!p-0 !h-0 overflow-hidden invisible opacity-0','enterTo' => 'visible opacity-100','leave' => 'transition-[visibility,opacity] ease-linear duration-150','leaveFrom' => 'visible opacity-100','leaveTo' => '!p-0 !h-0 overflow-hidden invisible opacity-0','attributes' => $attributes->class(merge(['tab-pane', $selected ? 'active' : null]))->merge($attributes->whereDoesntStartWith('class')->getAttributes())]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.transition'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => ''.e($id).'','role' => 'tabpanel','aria-labelledby' => ''.e(uncamelize($id, '-')).'-tab','selector' => '.active','enter' => 'transition-[visibility,opacity] ease-linear duration-150','enterFrom' => '!p-0 !h-0 overflow-hidden invisible opacity-0','enterTo' => 'visible opacity-100','leave' => 'transition-[visibility,opacity] ease-linear duration-150','leaveFrom' => 'visible opacity-100','leaveTo' => '!p-0 !h-0 overflow-hidden invisible opacity-0','attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes->class(merge(['tab-pane', $selected ? 'active' : null]))->merge($attributes->whereDoesntStartWith('class')->getAttributes()))]); ?>
    <?php echo e($slot); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf680044c1842e049a2fe070d6973c7e9)): ?>
<?php $attributes = $__attributesOriginalf680044c1842e049a2fe070d6973c7e9; ?>
<?php unset($__attributesOriginalf680044c1842e049a2fe070d6973c7e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf680044c1842e049a2fe070d6973c7e9)): ?>
<?php $component = $__componentOriginalf680044c1842e049a2fe070d6973c7e9; ?>
<?php unset($__componentOriginalf680044c1842e049a2fe070d6973c7e9); ?>
<?php endif; ?>
<?php /**PATH F:\my project\laravel\contract\Source\resources\views\components\base\tab\panel.blade.php ENDPATH**/ ?>