<div
    <?php echo e($attributes->class(merge(['tab-content']))->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>>
    <?php echo e($slot); ?>

</div>
<?php /**PATH D:\xampp\htdocs\deebo\Source\resources\views\components\base\tab\panels.blade.php ENDPATH**/ ?>