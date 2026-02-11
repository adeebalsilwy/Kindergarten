<?php foreach ((['selectedIndex' => null, 'index' => null]) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>
<?php foreach ((['id' => null]) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>

<div
    id="<?php echo e($id); ?>-collapse"
    aria-labelledby="<?php echo e($id); ?>"
    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'accordion-collapse collapse mt-3 text-slate-700 leading-relaxed dark:text-slate-400',
        '[&.collapse:not(.show)]:hidden [&.collapse.show]:visible',
        'show' => $selectedIndex == $index,
    ]); ?>"
>
    <div
        data-tw-merge
        <?php echo e($attributes->class(merge(['accordion-body', $attributes->whereStartsWith('class')->first()]))->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>

    >
        <?php echo e($slot); ?>

    </div>
</div>
<?php /**PATH F:\my project\laravel\contract\Source\resources\views\components\base\disclosure\panel.blade.php ENDPATH**/ ?>