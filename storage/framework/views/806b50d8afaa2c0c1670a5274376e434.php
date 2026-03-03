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

<?php if (! $__env->hasRenderedOnce('4b708fc3-2354-4282-8308-a6d9d933495c')): $__env->markAsRenderedOnce('4b708fc3-2354-4282-8308-a6d9d933495c');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/zoom-vanilla.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('23e94dce-146e-4409-997a-51b38da6efbc')): $__env->markAsRenderedOnce('23e94dce-146e-4409-997a-51b38da6efbc');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/image-zoom.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH E:\backup\Source\resources\views\components\base\image-zoom\index.blade.php ENDPATH**/ ?>