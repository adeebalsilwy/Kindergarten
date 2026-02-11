

<?php $__env->startSection('subhead'); ?>
    <title>Create Children - Laravel</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Create New Children</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="intro-y box p-5">
                <form action="<?php echo e(route('childrens.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <label class="form-label"><?php echo e(__('childrens.fields.name')); ?></label>
                            <input type="text" class="form-control" name="name" value="<?php echo e(old('name', $children->name ?? '')); ?>" required>
                        </div>

                    </div>
                    <div class="text-right mt-5">
                        <a href="<?php echo e(route('childrens.index')); ?>" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                        <button type="submit" class="btn btn-primary w-24">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../themes/' . $activeTheme . '/' . $activeLayout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views\pages\childrens\create.blade.php ENDPATH**/ ?>