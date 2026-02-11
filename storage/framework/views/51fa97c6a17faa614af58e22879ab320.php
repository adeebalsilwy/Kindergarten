<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['active' => null, 'index' => 0]));

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

foreach (array_filter((['active' => null, 'index' => 0]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<?php foreach ((['light' => null]) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>

<li
    <?php echo e($attributes->whereStartsWith('class')->class(
            merge([
                $index > 0 ? 'relative ml-5 pl-0.5' : null,

                !$light && $index > 0
                    ? "before:content-[''] before:w-[14px] before:h-[14px] before:bg-chevron-black before:transform before:rotate-[-90deg] before:bg-[length:100%] before:-ml-[1.125rem] before:absolute before:my-auto before:inset-y-0"
                    : null,

                $light && $index > 0
                    ? "before:content-[''] before:w-[14px] before:h-[14px] before:bg-chevron-white before:transform before:rotate-[-90deg] before:bg-[length:100%] before:-ml-[1.125rem] before:absolute before:my-auto before:inset-y-0"
                    : null,
                $index > 0 ? 'dark:before:bg-chevron-white' : null,

                !$light && $active ? 'text-slate-800 cursor-text dark:text-slate-400' : null,
                $light && $active ? 'text-white/70' : null,
            ]),
        )); ?>>
    <a <?php echo e($attributes->merge(['href' => ''])->whereDoesntStartWith('class')); ?>><?php echo e($slot); ?></a>
</li>
<?php /**PATH F:\my project\laravel\contract\Source\resources\views/components/base/breadcrumb/link.blade.php ENDPATH**/ ?>