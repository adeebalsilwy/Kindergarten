<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['index' => null, 'id' => null]));

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

foreach (array_filter((['index' => null, 'id' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<?php foreach ((['variant' => null]) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>

<?php if (! $__env->hasRenderedOnce('f2238f57-4c69-4ee7-b775-8a54b44ccc0a')): $__env->markAsRenderedOnce('f2238f57-4c69-4ee7-b775-8a54b44ccc0a');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/accordion.js'); ?>
<?php $__env->stopPush(); endif; ?>

<div
    data-tw-merge
    <?php echo e($attributes->class(
            merge([
                'accordion-item py-4 first:-mt-4 last:-mb-4',
                '[&:not(:last-child)]:border-b [&:not(:last-child)]:border-slate-200/60 [&:not(:last-child)]:dark:border-darkmode-400',
                $variant == 'boxed'
                    ? 'p-4 first:mt-0 last:mb-0 border border-slate-200/60 mt-3 dark:border-darkmode-400'
                    : null,
            ]),
        )->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>

>
    <?php echo e($slot); ?>

</div>
<?php /**PATH F:\my project\laravel\contract\Source\resources\views\components\base\disclosure\index.blade.php ENDPATH**/ ?>