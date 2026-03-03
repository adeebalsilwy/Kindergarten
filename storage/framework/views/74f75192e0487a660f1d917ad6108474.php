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

<?php if (! $__env->hasRenderedOnce('4de8dcdf-4f23-4dfe-805b-d310486cfd44')): $__env->markAsRenderedOnce('4de8dcdf-4f23-4dfe-805b-d310486cfd44');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/dropzone.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('1a078415-57d4-401b-89d0-7b8bd0b99589')): $__env->markAsRenderedOnce('1a078415-57d4-401b-89d0-7b8bd0b99589');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/dropzone.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('f8415300-1c79-4f4c-b368-4b8ab42584b9')): $__env->markAsRenderedOnce('f8415300-1c79-4f4c-b368-4b8ab42584b9');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/dropzone.js'); ?>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH E:\backup\Source\resources\views\components\base\dropzone\index.blade.php ENDPATH**/ ?>