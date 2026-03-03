<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['lat' => null, 'long' => null, 'sources' => null, 'apiKey' => null]));

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

foreach (array_filter((['lat' => null, 'long' => null, 'sources' => null, 'apiKey' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div
    data-lat="<?php echo e($lat); ?>"
    data-long="<?php echo e($long); ?>"
    data-sources="<?php echo e($sources); ?>"
    data-api-key="<?php echo e($apiKey); ?>"
    <?php echo e($attributes->class(['leaflet', 'z-0 [&_.leaflet-tile-pane]:saturate-[.3]'])->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>

>
</div>

<?php if (! $__env->hasRenderedOnce('f169c218-8951-4536-9e18-2dfbf8dfdf02')): $__env->markAsRenderedOnce('f169c218-8951-4536-9e18-2dfbf8dfdf02');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/leaflet.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('3fd4305a-6f2c-4d04-8d14-6d062358d2f8')): $__env->markAsRenderedOnce('3fd4305a-6f2c-4d04-8d14-6d062358d2f8');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/leaflet-map.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/axios.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/utils/colors.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('24a85d03-e937-4a08-b23c-780301ab5251')): $__env->markAsRenderedOnce('24a85d03-e937-4a08-b23c-780301ab5251');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/leaflet-map-loader.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH E:\backup\Source\resources\views\components\base\leaflet-map-loader\index.blade.php ENDPATH**/ ?>