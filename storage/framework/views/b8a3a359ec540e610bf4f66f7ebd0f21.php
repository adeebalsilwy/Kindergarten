<nav <?php echo e($attributes->merge($attributes->whereDoesntStartWith('class')->getAttributes())); ?>>
    <ul class="flex w-full me-0 sm:me-auto sm:w-auto">
        <?php echo e($slot); ?>

    </ul>
</nav>
<?php /**PATH E:\backup\Source\resources\views\components\base\pagination\index.blade.php ENDPATH**/ ?>