<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['id' => null, 'fullWidth' => true, 'selected' => false]));

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

foreach (array_filter((['id' => null, 'fullWidth' => true, 'selected' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<?php foreach ((['variant' => 'tabs']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>

<?php if (! $__env->hasRenderedOnce('73f2fc0b-c183-4e87-adf7-ad2ccf400614')): $__env->markAsRenderedOnce('73f2fc0b-c183-4e87-adf7-ad2ccf400614');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/tab.js'); ?>
<?php $__env->stopPush(); endif; ?>

<li
    id="<?php echo e($id); ?>"
    data-tw-merge
    role="presentation"
    <?php echo e($attributes->class(merge(['focus-visible:outline-none', $fullWidth ? 'flex-1' : null, $variant == 'tabs' ? '-mb-px' : null]))->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>

>
    <?php echo e($slot); ?>

</li>
<?php /**PATH D:\xampp\htdocs\deebo\Source\resources\views\components\base\tab\index.blade.php ENDPATH**/ ?>