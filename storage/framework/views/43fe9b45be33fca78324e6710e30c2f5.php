

<?php $__env->startSection('subhead'); ?>
    <title>Children List - Laravel</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
    <h2 class="intro-y mt-8 text-lg font-medium mr-auto">Children Management</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="<?php echo e(route('childrens.create')); ?>" class="btn btn-primary shadow-md mr-2">Add New Children</a>
        </div>
        <!-- Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap"><?php echo e(__('childrens.fields.name')); ?></th>

                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="intro-x">
                            <td><?php echo e($children->name); ?></td>

                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="<?php echo e(route('childrens.edit', $children->id)); ?>"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                    <form action="<?php echo e(route('childrens.destroy', $children->id)); ?>" method="POST" onsubmit="return confirm('Are you sure?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button class="flex items-center text-danger"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <?php echo e($childrens->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../themes/' . $activeTheme . '/' . $activeLayout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views\pages\childrens\index.blade.php ENDPATH**/ ?>