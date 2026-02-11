<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['src' => null]));

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

foreach (array_filter((['src' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<img
    data-action="zoom"
    src="<?php echo e($src); ?>"
    <?php echo e($attributes->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>

/>

<?php if (! $__env->hasRenderedOnce('e90b1677-a5fe-43c6-bee0-b8a160dc7ec0')): $__env->markAsRenderedOnce('e90b1677-a5fe-43c6-bee0-b8a160dc7ec0');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/zoom-vanilla.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('ede973c3-b10c-4d54-9100-b967218980de')): $__env->markAsRenderedOnce('ede973c3-b10c-4d54-9100-b967218980de');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/image-zoom.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\deebo\Source\resources\views\components\base\image-zoom\index.blade.php ENDPATH**/ ?>