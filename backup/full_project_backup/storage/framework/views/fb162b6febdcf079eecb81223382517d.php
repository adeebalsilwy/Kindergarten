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

<?php if (! $__env->hasRenderedOnce('ee19a6da-549a-4ba6-a888-f7e02cfcc079')): $__env->markAsRenderedOnce('ee19a6da-549a-4ba6-a888-f7e02cfcc079');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/leaflet.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('1bba3ea7-c14b-4f6c-a2dc-d0df099a3f0d')): $__env->markAsRenderedOnce('1bba3ea7-c14b-4f6c-a2dc-d0df099a3f0d');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/leaflet-map.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/axios.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/utils/colors.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('6bdb54fd-4a49-4db7-b62c-f318194162e0')): $__env->markAsRenderedOnce('6bdb54fd-4a49-4db7-b62c-f318194162e0');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/leaflet-map-loader.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\deebo\Source\resources\views\components\base\leaflet-map-loader\index.blade.php ENDPATH**/ ?>