<label
    data-tw-merge
    <?php echo e($attributes->class(merge(['cursor-pointer ms-2', $attributes->whereStartsWith('class')->first()]))->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>

><?php echo e($slot); ?></label>
<?php /**PATH E:\backup\Source\resources\views\components\base\form-check\label.blade.php ENDPATH**/ ?>