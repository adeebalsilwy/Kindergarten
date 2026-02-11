<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['as' => 'div', 'variant' => null]));

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

foreach (array_filter((['as' => 'div', 'variant' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<?php foreach ((['selectedIndex' => null, 'index' => null, 'id' => null]) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>

<div
    class="accordion-header"
    id="<?php echo e($id); ?>"
>
    <button
        data-tw-merge
        data-tw-toggle="collapse"
        data-tw-target="#<?php echo e($id); ?>-collapse"
        type="button"
        aria-expanded="true"
        aria-controls="<?php echo e($id); ?>-collapse"
        <?php echo e($attributes->class(
                merge([
                    'accordion-button outline-none py-4 -my-4 font-medium w-full text-left dark:text-slate-400',
                    '[&:not(.collapsed)]:text-primary [&:not(.collapsed)]:dark:text-slate-300',
                    $selectedIndex != $index ? 'collapsed' : null,
                    $attributes->whereStartsWith('class')->first(),
                ]),
            )->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>

    ><?php echo e($slot); ?></button>
</div>
<?php /**PATH F:\my project\laravel\contract\Source\resources\views\components\base\disclosure\button.blade.php ENDPATH**/ ?>