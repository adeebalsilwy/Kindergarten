<div
    data-tw-merge
    <?php echo e($attributes->class(['w-full h-2 bg-slate-200 rounded dark:bg-black/20'])->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>

>
    <?php echo e($slot); ?>

</div>
<?php /**PATH D:\xampp\htdocs\deebo\Source\resources\views\components\base\progress\index.blade.php ENDPATH**/ ?>