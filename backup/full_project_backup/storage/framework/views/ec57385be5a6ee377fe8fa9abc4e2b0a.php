<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['as' => 'a', 'target' => null, 'unstyled' => false]));

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

foreach (array_filter((['as' => 'a', 'target' => null, 'unstyled' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<?php foreach ((['variant' => 'tabs', 'selected' => false, 'id' => null]) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>

<?php if(substr($as, 0, 2) == 'x-'): ?>
    <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => substr($as, 2)] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\DynamicComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-tw-merge' => true,'data-tw-target' => '#'.e($target ? $target : str_replace('-tab', '', uncamelize($id, '-'))).'','role' => 'tab','attributes' => $attributes->class(
                merge([
                    !$unstyled
                        ? 'cursor-pointer block appearance-none px-5 py-2.5 border border-transparent text-slate-700 dark:text-slate-400'
                        : null,
                    !$unstyled ? '[&.active]:text-slate-800 [&.active]:dark:text-white' : null,
        
                    // Default
                    !$unstyled && $variant == 'tabs' ? 'block border-transparent rounded-t-md dark:border-transparent' : null,
                    !$unstyled && $variant == 'tabs'
                        ? '[&.active]:bg-white [&.active]:border-slate-200 [&.active]:border-b-transparent [&.active]:font-medium [&.active]:dark:bg-transparent [&.active]:dark:border-t-darkmode-400 [&.active]:dark:border-b-darkmode-600 [&.active]:dark:border-x-darkmode-400'
                        : null,
                    !$unstyled && $variant == 'tabs'
                        ? '[&:not(.active)]:hover:bg-slate-100 [&:not(.active)]:dark:hover:bg-darkmode-400 [&:not(.active)]:dark:hover:border-transparent'
                        : null,
        
                    // Pills
                    !$unstyled && $variant == 'pills' ? 'rounded-md border-0' : null,
                    !$unstyled && $variant == 'pills'
                        ? '[&.active]:bg-primary [&.active]:text-white [&.active]:font-medium'
                        : null,
        
                    // Boxed tabs
                    !$unstyled && $variant == 'boxed-tabs' ? 'shadow-[0px_3px_20px_#0000000b] rounded-md' : null,
                    !$unstyled && $variant == 'boxed-tabs'
                        ? '[&.active]:bg-primary [&.active]:text-white [&.active]:font-medium'
                        : null,
        
                    // Link tabs
                    !$unstyled && $variant == 'link-tabs' ? 'border-b-2 border-transparent dark:border-transparent' : null,
                    !$unstyled && $variant == 'link-tabs'
                        ? '[&.active]:border-b-primary [&.active]:font-medium [&.active]:dark:border-b-primary'
                        : null,
        
                    $selected ? 'active' : null,
                ]),
            )->merge($attributes->whereDoesntStartWith('class')->getAttributes())]); ?><?php echo e($slot); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $attributes = $__attributesOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php else: ?>
    <<?php echo e($as); ?>

        data-tw-merge
        data-tw-target="#<?php echo e($target ? $target : str_replace('-tab', '', uncamelize($id, '-'))); ?>"
        role="tab"
        <?php echo e($attributes->class(
                merge([
                    !$unstyled
                        ? 'cursor-pointer block appearance-none px-5 py-2.5 border border-transparent text-slate-700 dark:text-slate-400'
                        : null,
                    !$unstyled ? '[&.active]:text-slate-800 [&.active]:dark:text-white' : null,
        
                    // Default
                    !$unstyled && $variant == 'tabs' ? 'block border-transparent rounded-t-md dark:border-transparent' : null,
                    !$unstyled && $variant == 'tabs'
                        ? '[&.active]:bg-white [&.active]:border-slate-200 [&.active]:border-b-transparent [&.active]:font-medium [&.active]:dark:bg-transparent [&.active]:dark:border-t-darkmode-400 [&.active]:dark:border-b-darkmode-600 [&.active]:dark:border-x-darkmode-400'
                        : null,
                    !$unstyled && $variant == 'tabs'
                        ? '[&:not(.active)]:hover:bg-slate-100 [&:not(.active)]:dark:hover:bg-darkmode-400 [&:not(.active)]:dark:hover:border-transparent'
                        : null,
        
                    // Pills
                    !$unstyled && $variant == 'pills' ? 'rounded-md border-0' : null,
                    !$unstyled && $variant == 'pills'
                        ? '[&.active]:bg-primary [&.active]:text-white [&.active]:font-medium'
                        : null,
        
                    // Boxed tabs
                    !$unstyled && $variant == 'boxed-tabs' ? 'shadow-[0px_3px_20px_#0000000b] rounded-md' : null,
                    !$unstyled && $variant == 'boxed-tabs'
                        ? '[&.active]:bg-primary [&.active]:text-white [&.active]:font-medium'
                        : null,
        
                    // Link tabs
                    !$unstyled && $variant == 'link-tabs' ? 'border-b-2 border-transparent dark:border-transparent' : null,
                    !$unstyled && $variant == 'link-tabs'
                        ? '[&.active]:border-b-primary [&.active]:font-medium [&.active]:dark:border-b-primary'
                        : null,
        
                    $selected ? 'active' : null,
                ]),
            )->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>

    ><?php echo e($slot); ?></<?php echo e($as); ?>>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\deebo\Source\resources\views\components\base\tab\button.blade.php ENDPATH**/ ?>