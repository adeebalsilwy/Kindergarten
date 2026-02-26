<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['icon' => null, 'width' => 24, 'height' => 24]));

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

foreach (array_filter((['icon' => null, 'width' => 24, 'height' => 24]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<i
    data-tw-merge
    data-lucide="<?php echo e(uncamelize($icon, '-')); ?>"
    <?php echo e($attributes->class(merge(['stroke-1.5 w-5 h-5', $attributes->whereStartsWith('class')->first()]))->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>

></i>

<?php if (! $__env->hasRenderedOnce('96d7f8fe-cae0-4003-ac94-dc414a494afc')): $__env->markAsRenderedOnce('96d7f8fe-cae0-4003-ac94-dc414a494afc');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/lucide.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('482f435a-6925-4008-a30a-a26dc6b17d52')): $__env->markAsRenderedOnce('482f435a-6925-4008-a30a-a26dc6b17d52');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/lucide.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH F:\my project\laravel\contract\Source\resources\views/components/base/lucide/index.blade.php ENDPATH**/ ?>