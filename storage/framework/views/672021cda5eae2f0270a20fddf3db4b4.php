<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['multiple' => null]));

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

foreach (array_filter((['multiple' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<form
    <?php echo e($attributes->class(merge(['[&.dropzone]:border-2 [&.dropzone]:border-dashed dropzone [&.dropzone]:border-darkmode-200/60 [&.dropzone]:dark:bg-darkmode-600 [&.dropzone]:dark:border-white/5', $attributes->whereStartsWith('class')->first()]))->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>

>
    <div class="fallback">
        <input
            name="file"
            type="file"
            <?php echo e($multiple ? 'multiple' : ''); ?>

        />
    </div>
    <div
        class="dz-message"
        data-dz-message
    >
        <?php echo e($slot); ?>

    </div>
</form>

<?php if (! $__env->hasRenderedOnce('276e74d6-92ad-443a-81c8-9b7d32d44270')): $__env->markAsRenderedOnce('276e74d6-92ad-443a-81c8-9b7d32d44270');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/dropzone.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('6d138c34-7926-4d03-b344-c0cd94acf214')): $__env->markAsRenderedOnce('6d138c34-7926-4d03-b344-c0cd94acf214');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/dropzone.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('67dd1ea2-4487-4e69-884c-a0ca3643e7e2')): $__env->markAsRenderedOnce('67dd1ea2-4487-4e69-884c-a0ca3643e7e2');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/dropzone.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH F:\my project\laravel\contract\Source\resources\views\components\base\dropzone\index.blade.php ENDPATH**/ ?>