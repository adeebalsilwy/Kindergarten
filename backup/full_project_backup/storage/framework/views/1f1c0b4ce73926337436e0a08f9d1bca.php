

<?php $__env->startSection('subhead'); ?>
    <title><?php echo e(__('kindergarten.attendance.title')); ?> - <?php echo e(__('kindergarten.menu.kindergarten')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
    <h2 class="intro-y mt-8 text-lg font-medium mr-auto"><?php echo e(__('kindergarten.attendance.title')); ?>: <?php echo e($date); ?></h2>
    
    <?php if(session('success')): ?>
        <div class="alert alert-success show mb-2"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="intro-y box p-5 mt-5">
        <form action="<?php echo e(route('attendance.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="date" value="<?php echo e($date); ?>">
            
            <div class="overflow-x-auto">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap"><?php echo e(__('kindergarten.children.name')); ?></th>
                            <th class="text-center"><?php echo e(__('kindergarten.attendance.status.present')); ?></th>
                            <th class="text-center"><?php echo e(__('kindergarten.attendance.status.absent')); ?></th>
                            <th class="text-center"><?php echo e(__('kindergarten.attendance.status.sick')); ?></th>
                            <th class="text-center"><?php echo e(__('kindergarten.attendance.status.late')); ?></th>
                            <th class="text-center"><?php echo e(__('kindergarten.attendance.status.excused')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $status = $attendances[$child->id]->status ?? 'present'; // Default to present
                            ?>
                            <tr>
                                <td class="font-medium"><?php echo e($child->name); ?> (<?php echo e($child->class_grade); ?>)</td>
                                <td class="text-center">
                                    <input type="radio" name="attendance[<?php echo e($child->id); ?>]" value="present" <?php echo e($status == 'present' ? 'checked' : ''); ?> class="form-check-input">
                                </td>
                                <td class="text-center">
                                    <input type="radio" name="attendance[<?php echo e($child->id); ?>]" value="absent" <?php echo e($status == 'absent' ? 'checked' : ''); ?> class="form-check-input">
                                </td>
                                <td class="text-center">
                                    <input type="radio" name="attendance[<?php echo e($child->id); ?>]" value="sick" <?php echo e($status == 'sick' ? 'checked' : ''); ?> class="form-check-input">
                                </td>
                                <td class="text-center">
                                    <input type="radio" name="attendance[<?php echo e($child->id); ?>]" value="late" <?php echo e($status == 'late' ? 'checked' : ''); ?> class="form-check-input">
                                </td>
                                <td class="text-center">
                                    <input type="radio" name="attendance[<?php echo e($child->id); ?>]" value="excused" <?php echo e($status == 'excused' ? 'checked' : ''); ?> class="form-check-input">
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-5 text-right">
                <button type="submit" class="btn btn-primary w-40"><?php echo e(__('kindergarten.attendance.save')); ?></button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../themes/' . $activeTheme . '/' . $activeLayout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\deebo\Source\resources\views\pages\attendance\index.blade.php ENDPATH**/ ?>