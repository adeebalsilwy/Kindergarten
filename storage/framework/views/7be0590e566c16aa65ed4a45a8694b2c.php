<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['light' => null]));

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

foreach (array_filter((['light' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<nav
    aria-label="breadcrumb"
    <?php echo e($attributes->class(merge(['flex']))->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>

>
    <ol class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'flex items-center text-theme-1 dark:text-slate-300',
        'text-white/90' => $light,
    ]); ?>">
        <?php echo e($slot); ?>

    </ol>
</nav>
<?php /**PATH F:\my project\laravel\contract\Source\resources\views/components/base/breadcrumb/index.blade.php ENDPATH**/ ?>