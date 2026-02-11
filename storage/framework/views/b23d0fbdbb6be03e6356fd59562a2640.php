<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['config' => null]));

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

foreach (array_filter((['config' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div
    data-config="<?php echo e($config); ?>"
    <?php echo e($attributes->class(merge(['tiny-slider', $attributes->whereStartsWith('class')->first()]))->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>

>
    <?php echo e($slot); ?>

</div>

<?php if (! $__env->hasRenderedOnce('d1b25138-c058-4981-b685-cf46b7ffb84e')): $__env->markAsRenderedOnce('d1b25138-c058-4981-b685-cf46b7ffb84e');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/tiny-slider.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('74f95f35-8b67-4934-8d67-060b2b3ceaaf')): $__env->markAsRenderedOnce('74f95f35-8b67-4934-8d67-060b2b3ceaaf');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/tiny-slider.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('39cda46e-1215-47f8-b826-2d17d40efe6f')): $__env->markAsRenderedOnce('39cda46e-1215-47f8-b826-2d17d40efe6f');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/tiny-slider.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH F:\my project\laravel\contract\Source\resources\views\components\base\tiny-slider\index.blade.php ENDPATH**/ ?>