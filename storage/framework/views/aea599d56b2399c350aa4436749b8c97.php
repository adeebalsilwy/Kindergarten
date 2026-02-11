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

<?php if (! $__env->hasRenderedOnce('159aee79-3049-4ecc-b752-74bbd769de70')): $__env->markAsRenderedOnce('159aee79-3049-4ecc-b752-74bbd769de70');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/leaflet.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('f70c3b48-4b17-44d8-b40b-2bc75d8dc997')): $__env->markAsRenderedOnce('f70c3b48-4b17-44d8-b40b-2bc75d8dc997');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/leaflet-map.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/axios.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/utils/colors.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('4543fb00-8509-4446-900c-e3f77ecf7288')): $__env->markAsRenderedOnce('4543fb00-8509-4446-900c-e3f77ecf7288');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/leaflet-map-loader.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH F:\my project\laravel\contract\Source\resources\views\components\base\leaflet-map-loader\index.blade.php ENDPATH**/ ?>