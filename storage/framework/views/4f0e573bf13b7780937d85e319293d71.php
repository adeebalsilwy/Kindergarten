

<?php $__env->startSection('subcontent'); ?>
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto"><?php echo e(__('global.view_dashboard_content')); ?></h2>
</div>

<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-8 mx-auto">
        <div class="tab-content mt-5">
            <div class="tab-pane active" id="content-details">
                <div class="box p-5">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12">
                            <label class="form-label font-weight-bold"><?php echo e(__('global.section')); ?></label>
                            <div class="form-control"><?php echo e($dashboardContent->section); ?></div>
                        </div>

                        <div class="col-span-12">
                            <label class="form-label font-weight-bold"><?php echo e(__('global.key')); ?></label>
                            <div class="form-control"><?php echo e($dashboardContent->key); ?></div>
                        </div>

                        <div class="col-span-12">
                            <label class="form-label font-weight-bold"><?php echo e(__('global.content_en')); ?></label>
                            <div class="form-control"><?php echo e($dashboardContent->content['en'] ?? ''); ?></div>
                        </div>

                        <div class="col-span-12">
                            <label class="form-label font-weight-bold"><?php echo e(__('global.content_ar')); ?></label>
                            <div class="form-control"><?php echo e($dashboardContent->content['ar'] ?? ''); ?></div>
                        </div>

                        <div class="col-span-6">
                            <label class="form-label font-weight-bold"><?php echo e(__('global.status')); ?></label>
                            <div class="form-control">
                                <?php if($dashboardContent->is_active): ?>
                                    <span class="text-success"><?php echo e(__('global.active')); ?></span>
                                <?php else: ?>
                                    <span class="text-danger"><?php echo e(__('global.inactive')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-span-6">
                            <label class="form-label font-weight-bold"><?php echo e(__('global.order')); ?></label>
                            <div class="form-control"><?php echo e($dashboardContent->order); ?></div>
                        </div>

                        <div class="col-span-12">
                            <label class="form-label font-weight-bold"><?php echo e(__('global.created_at')); ?></label>
                            <div class="form-control"><?php echo e($dashboardContent->created_at->format('Y-m-d H:i:s')); ?></div>
                        </div>

                        <div class="col-span-12">
                            <label class="form-label font-weight-bold"><?php echo e(__('global.updated_at')); ?></label>
                            <div class="form-control"><?php echo e($dashboardContent->updated_at->format('Y-m-d H:i:s')); ?></div>
                        </div>
                    </div>

                    <div class="mt-5">
                        <a href="<?php echo e(route('dashboard-content.index')); ?>" class="btn btn-outline-secondary w-24 mr-1"><?php echo e(__('global.back')); ?></a>
                        <a href="<?php echo e(route('dashboard-content.edit', $dashboardContent)); ?>" class="btn btn-primary w-24"><?php echo e(__('global.edit')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views\pages\dashboard-content\show.blade.php ENDPATH**/ ?>