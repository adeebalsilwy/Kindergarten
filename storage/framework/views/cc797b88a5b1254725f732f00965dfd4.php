

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h2 class="mb-sm-0 fw-bold text-primary"><?php echo e(__('تفاصيل التسجيل')); ?></h2>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('الرئيسية')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('class-enrollments.index')); ?>"><?php echo e(__('التسجيلات')); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo e(__('التفاصيل')); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header bg-transparent border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0 text-dark">#<?php echo e($classEnrollment->id); ?> - <?php echo e($classEnrollment->child->name); ?></h4>
                        <div class="d-flex gap-2">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $classEnrollment)): ?>
                                <a href="<?php echo e(route('class-enrollments.edit', $classEnrollment)); ?>" class="btn btn-primary">
                                    <i class="fas fa-edit"></i> <?php echo e(__('تعديل')); ?>

                                </a>
                            <?php endif; ?>
                            <a href="<?php echo e(route('class-enrollments.index')); ?>" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left"></i> <?php echo e(__('العودة إلى القائمة')); ?>

                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <!-- Enrollment Info Card -->
                        <div class="col-md-12">
                            <div class="card border shadow-none">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="card-title mb-0"><i class="fas fa-info-circle"></i> <?php echo e(__('معلومات التسجيل')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-muted"><?php echo e(__('رقم التسجيل')); ?></label>
                                                <div class="form-control-plaintext">#<?php echo e($classEnrollment->id); ?></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-muted"><?php echo e(__('الحالة')); ?></label>
                                                <div class="form-control-plaintext">
                                                    <span class="badge rounded-pill bg-<?php echo e($classEnrollment->status === 'active' ? 'success' : ($classEnrollment->status === 'inactive' ? 'secondary' : ($classEnrollment->status === 'completed' ? 'primary' : 'warning'))); ?> fs-6">
                                                        <?php echo e($classEnrollment->status === 'active' ? __('نشط') : ($classEnrollment->status === 'inactive' ? __('غير نشط') : ($classEnrollment->status === 'completed' ? __('مكتمل') : __('منقول')))); ?>

                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-muted"><?php echo e(__('تاريخ التسجيل')); ?></label>
                                                <div class="form-control-plaintext"><?php echo e($classEnrollment->enrollment_date->format('Y-m-d')); ?></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-muted"><?php echo e(__('تاريخ الانسحاب')); ?></label>
                                                <div class="form-control-plaintext">
                                                    <?php echo e($classEnrollment->withdrawal_date ? $classEnrollment->withdrawal_date->format('Y-m-d') : __('غير محدد')); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label text-muted"><?php echo e(__('السبب')); ?></label>
                                                <div class="form-control-plaintext">
                                                    <?php echo e($classEnrollment->reason ?: __('غير محدد')); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Child Info Card -->
                        <div class="col-md-6">
                            <div class="card border shadow-none">
                                <div class="card-header bg-info text-white">
                                    <h5 class="card-title mb-0"><i class="fas fa-child"></i> <?php echo e(__('معلومات الطفل')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <div class="avatar-lg mx-auto mb-3">
                                            <div class="avatar-title bg-light text-info rounded-circle h2">
                                                <i class="fas fa-user"></i>
                                            </div>
                                        </div>
                                        <h5 class="mb-1"><?php echo e($classEnrollment->child->name); ?></h5>
                                        <p class="text-muted mb-0"><?php echo e($classEnrollment->child->age); ?> <?php echo e(__('سنوات')); ?></p>
                                    </div>
                                    
                                    <div class="mt-3">
                                        <div class="mb-2">
                                            <label class="form-label text-muted"><?php echo e(__('الجنس')); ?></label>
                                            <div class="form-control-plaintext">
                                                <?php echo e($classEnrollment->child->gender === 'male' ? __('ذكر') : ($classEnrollment->child->gender === 'female' ? __('أنثى') : __('غير محدد'))); ?>

                                            </div>
                                        </div>
                                        
                                        <div class="mb-2">
                                            <label class="form-label text-muted"><?php echo e(__('تاريخ الميلاد')); ?></label>
                                            <div class="form-control-plaintext"><?php echo e($classEnrollment->child->dob->format('Y-m-d')); ?></div>
                                        </div>
                                        
                                        <div class="mb-2">
                                            <label class="form-label text-muted"><?php echo e(__('الصف الحالي')); ?></label>
                                            <div class="form-control-plaintext"><?php echo e($classEnrollment->class->name); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Class Info Card -->
                        <div class="col-md-6">
                            <div class="card border shadow-none">
                                <div class="card-header bg-success text-white">
                                    <h5 class="card-title mb-0"><i class="fas fa-chalkboard-teacher"></i> <?php echo e(__('معلومات الصف')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <div class="avatar-lg mx-auto mb-3">
                                            <div class="avatar-title bg-light text-success rounded-circle h2">
                                                <i class="fas fa-school"></i>
                                            </div>
                                        </div>
                                        <h5 class="mb-1"><?php echo e($classEnrollment->class->name); ?></h5>
                                        <p class="text-muted mb-0"><?php echo e($classEnrollment->class->code); ?></p>
                                    </div>
                                    
                                    <div class="mt-3">
                                        <div class="mb-2">
                                            <label class="form-label text-muted"><?php echo e(__('الوصف')); ?></label>
                                            <div class="form-control-plaintext"><?php echo e($classEnrollment->class->description); ?></div>
                                        </div>
                                        
                                        <div class="mb-2">
                                            <label class="form-label text-muted"><?php echo e(__('السعة')); ?></label>
                                            <div class="form-control-plaintext"><?php echo e($classEnrollment->class->capacity); ?> <?php echo e(__('طلاب')); ?></div>
                                        </div>
                                        
                                        <div class="mb-2">
                                            <label class="form-label text-muted"><?php echo e(__('عدد الطلاب الحالي')); ?></label>
                                            <div class="form-control-plaintext"><?php echo e($classEnrollment->class->current_students); ?> <?php echo e(__('طلاب')); ?></div>
                                        </div>
                                        
                                        <div class="mb-2">
                                            <label class="form-label text-muted"><?php echo e(__('معلم الصف')); ?></label>
                                            <div class="form-control-plaintext"><?php echo e($classEnrollment->class->teacher->name); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Additional Info Card -->
                        <div class="col-md-12">
                            <div class="card border shadow-none">
                                <div class="card-header bg-secondary text-white">
                                    <h5 class="card-title mb-0"><i class="fas fa-info"></i> <?php echo e(__('معلومات إضافية')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-muted"><?php echo e(__('تم الإنشاء في')); ?></label>
                                                <div class="form-control-plaintext"><?php echo e($classEnrollment->created_at->format('Y-m-d H:i:s')); ?></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-muted"><?php echo e(__('آخر تحديث')); ?></label>
                                                <div class="form-control-plaintext"><?php echo e($classEnrollment->updated_at->format('Y-m-d H:i:s')); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-muted"><?php echo e(__('مُنشئ التسجيل')); ?></label>
                                                <div class="form-control-plaintext">
                                                    <?php if($classEnrollment->createdBy): ?>
                                                        <?php echo e($classEnrollment->createdBy->name); ?>

                                                    <?php else: ?>
                                                        <?php echo e(__('غير محدد')); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-muted"><?php echo e(__('نوع التسجيل')); ?></label>
                                                <div class="form-control-plaintext">
                                                    <?php if($classEnrollment->status === 'active'): ?>
                                                        <?php echo e(__('تسجيل نشط')); ?>

                                                    <?php elseif($classEnrollment->status === 'inactive'): ?>
                                                        <?php echo e(__('تسجيل غير نشط')); ?>

                                                    <?php elseif($classEnrollment->status === 'completed'): ?>
                                                        <?php echo e(__('تسجيل مكتمل')); ?>

                                                    <?php else: ?>
                                                        <?php echo e(__('تسجيل منقول')); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <a href="<?php echo e(route('class-enrollments.index')); ?>" class="btn btn-outline-secondary px-4">
                                    <i class="fas fa-arrow-left"></i> <?php echo e(__('العودة إلى القائمة')); ?>

                                </a>
                                <div class="d-flex gap-2">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $classEnrollment)): ?>
                                        <a href="<?php echo e(route('class-enrollments.edit', $classEnrollment)); ?>" class="btn btn-primary px-4">
                                            <i class="fas fa-edit"></i> <?php echo e(__('تعديل التسجيل')); ?>

                                        </a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $classEnrollment)): ?>
                                        <form method="POST" action="<?php echo e(route('class-enrollments.destroy', $classEnrollment)); ?>" 
                                              style="display: inline;" 
                                              onsubmit="return confirm('<?php echo e(__('هل أنت متأكد من حذف هذا التسجيل؟')); ?>')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger px-4">
                                                <i class="fas fa-trash"></i> <?php echo e(__('حذف التسجيل')); ?>

                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Initialize tooltips
document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\backup\Source\resources\views\pages\class-enrollments\show.blade.php ENDPATH**/ ?>