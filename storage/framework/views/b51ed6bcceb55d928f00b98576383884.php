<div
    data-tw-merge
    <?php echo e($attributes->class(['space-y-1'])->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>

>
    <?php echo e($slot); ?>

</div>
<?php /**PATH F:\my project\laravel\contract\Source\resources\views/components/base/dropdown/content.blade.php ENDPATH**/ ?>