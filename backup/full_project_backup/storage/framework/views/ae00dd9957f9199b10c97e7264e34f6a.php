<div
    data-tw-merge
    <?php echo e($attributes->class(['bg-primary h-full rounded text-xs text-white flex justify-center items-center'])->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>

>
    <?php echo e($slot); ?>

</div>
<?php /**PATH D:\xampp\htdocs\deebo\Source\resources\views\components\base\progress\bar\index.blade.php ENDPATH**/ ?>