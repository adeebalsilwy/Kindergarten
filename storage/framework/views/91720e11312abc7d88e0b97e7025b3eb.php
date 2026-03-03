

<style>
.alert-fixed {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 9999;
    min-width: 300px;
}

.card-stats {
    transition: transform 0.3s ease;
}

.card-stats:hover {
    transform: translateY(-5px);
}

.btn-group-actions {
    box-shadow: 0 2px 4px rgba(0,0,0,.1);
}

.table th {
    font-weight: 600;
    color: #495057;
    border-top: none;
}

.badge {
    font-size: 0.8em;
}

.form-control:focus, .form-select:focus {
    border-color: #80bdff;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
}

.pagination .page-link {
    color: #0d6efd;
}

.pagination .page-item.active .page-link {
    background-color: #0d6efd;
    border-color: #0d6efd;
}

.tooltip {
    font-size: 0.875rem;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .table-responsive {
        font-size: 0.875rem;
    }
    
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
    }
}

/* Animation for loading states */
.loading {
    opacity: 0.6;
    pointer-events: none;
}

/* Custom scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}
</style>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h2 class="mb-sm-0 fw-bold text-primary"><?php echo e(__('تعديل التسجيل')); ?></h2>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('الرئيسية')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('class-enrollments.index')); ?>"><?php echo e(__('التسجيلات')); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo e(__('تعديل')); ?></li>
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
                        <h4 class="card-title mb-0 text-dark"><?php echo e(__('تحديث معلومات التسجيل')); ?></h4>
                        <div class="d-flex gap-2">
                            <a href="<?php echo e(route('class-enrollments.show', $classEnrollment)); ?>" class="btn btn-outline-info">
                                <i class="fas fa-eye"></i> <?php echo e(__('عرض التفاصيل')); ?>

                            </a>
                            <a href="<?php echo e(route('class-enrollments.index')); ?>" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left"></i> <?php echo e(__('العودة إلى القائمة')); ?>

                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('class-enrollments.update', $classEnrollment)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="row">
                            <!-- Class Selection -->
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="class_id" class="form-label fw-bold text-dark"><?php echo e(__('الصف')); ?> <span class="text-danger">*</span></label>
                                    <select name="class_id" id="class_id" class="form-select <?php $__errorArgs = ['class_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                        <option value=""><?php echo e(__('اختر الصف')); ?></option>
                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($class->id); ?>" 
                                                    <?php echo e(old('class_id', $classEnrollment->class_id) == $class->id ? 'selected' : ''); ?>>
                                                <?php echo e($class->name); ?> (<?php echo e($class->capacity - $class->current_students); ?> <?php echo e(__('مواقع متاحة')); ?>)
                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['class_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <div class="form-text"><?php echo e(__('اختر الصف الذي سيتم تسجيل الطفل فيه')); ?></div>
                                </div>
                            </div>

                            <!-- Child Selection -->
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="child_id" class="form-label fw-bold text-dark"><?php echo e(__('الطفل')); ?> <span class="text-danger">*</span></label>
                                    <select name="child_id" id="child_id" class="form-select <?php $__errorArgs = ['child_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                        <option value=""><?php echo e(__('اختر الطفل')); ?></option>
                                        <?php $__currentLoopData = $children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($child->id); ?>" 
                                                    <?php echo e(old('child_id', $classEnrollment->child_id) == $child->id ? 'selected' : ''); ?>>
                                                <?php echo e($child->name); ?> (<?php echo e($child->age); ?> <?php echo e(__('سنوات')); ?>)
                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['child_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <div class="form-text"><?php echo e(__('اختر الطفل الذي سيتم تسجيله')); ?></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Enrollment Date -->
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="enrollment_date" class="form-label fw-bold text-dark"><?php echo e(__('تاريخ التسجيل')); ?> <span class="text-danger">*</span></label>
                                    <input type="date" name="enrollment_date" id="enrollment_date" 
                                           class="form-control <?php $__errorArgs = ['enrollment_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           value="<?php echo e(old('enrollment_date', $classEnrollment->enrollment_date->format('Y-m-d'))); ?>" required>
                                    <?php $__errorArgs = ['enrollment_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <div class="form-text"><?php echo e(__('تاريخ بدء التسجيل')); ?></div>
                                </div>
                            </div>

                            <!-- Withdrawal Date -->
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="withdrawal_date" class="form-label fw-bold text-dark"><?php echo e(__('تاريخ الانسحاب')); ?></label>
                                    <input type="date" name="withdrawal_date" id="withdrawal_date" 
                                           class="form-control <?php $__errorArgs = ['withdrawal_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           value="<?php echo e(old('withdrawal_date', $classEnrollment->withdrawal_date ? $classEnrollment->withdrawal_date->format('Y-m-d') : '')); ?>">
                                    <?php $__errorArgs = ['withdrawal_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <div class="form-text"><?php echo e(__('تاريخ انسحاب الطفل من الصف (اختياري)')); ?></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Status -->
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="status" class="form-label fw-bold text-dark"><?php echo e(__('الحالة')); ?> <span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-select <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                        <option value="active" <?php echo e(old('status', $classEnrollment->status) == 'active' ? 'selected' : ''); ?>><?php echo e(__('نشط')); ?></option>
                                        <option value="inactive" <?php echo e(old('status', $classEnrollment->status) == 'inactive' ? 'selected' : ''); ?>><?php echo e(__('غير نشط')); ?></option>
                                        <option value="completed" <?php echo e(old('status', $classEnrollment->status) == 'completed' ? 'selected' : ''); ?>><?php echo e(__('مكتمل')); ?></option>
                                        <option value="transferred" <?php echo e(old('status', $classEnrollment->status) == 'transferred' ? 'selected' : ''); ?>><?php echo e(__('منقول')); ?></option>
                                    </select>
                                    <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <div class="form-text"><?php echo e(__('حالة التسجيل الحالية')); ?></div>
                                </div>
                            </div>

                            <!-- Enrollment ID Display -->
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark"><?php echo e(__('رقم التسجيل')); ?></label>
                                    <div class="form-control-plaintext p-2 bg-light border rounded">
                                        #<?php echo e($classEnrollment->id); ?>

                                    </div>
                                    <div class="form-text"><?php echo e(__('هذا هو الرقم التعريفي لهذا التسجيل')); ?></div>
                                </div>
                            </div>
                        </div>

                        <!-- Reason Field -->
                        <div class="mb-4">
                            <label for="reason" class="form-label fw-bold text-dark"><?php echo e(__('السبب')); ?></label>
                            <textarea name="reason" id="reason" class="form-control <?php $__errorArgs = ['reason'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                      rows="3" placeholder="<?php echo e(__('أدخل السبب إذا لزم الأمر')); ?>"><?php echo e(old('reason', $classEnrollment->reason)); ?></textarea>
                            <?php $__errorArgs = ['reason'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <div class="form-text"><?php echo e(__('سبب التغيير أو أي ملاحظات إضافية')); ?></div>
                        </div>

                        <!-- Current Enrollment Info -->
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="card bg-light border">
                                    <div class="card-header bg-transparent">
                                        <h5 class="card-title mb-0 text-dark"><?php echo e(__('معلومات التسجيل الحالية')); ?></h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p class="mb-1"><strong><?php echo e(__('تم الإنشاء في:')); ?></strong></p>
                                                <p class="text-muted"><?php echo e($classEnrollment->created_at->format('Y-m-d H:i:s')); ?></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="mb-1"><strong><?php echo e(__('آخر تحديث:')); ?></strong></p>
                                                <p class="text-muted"><?php echo e($classEnrollment->updated_at->format('Y-m-d H:i:s')); ?></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="mb-1"><strong><?php echo e(__('مُنشئ التسجيل:')); ?></strong></p>
                                                <p class="text-muted">
                                                    <?php if($classEnrollment->createdBy): ?>
                                                        <?php echo e($classEnrollment->createdBy->name); ?>

                                                    <?php else: ?>
                                                        <?php echo e(__('غير محدد')); ?>

                                                    <?php endif; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Transfer Button -->
                        <?php if($classEnrollment->status === 'active'): ?>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#transferModal">
                                    <i class="fas fa-exchange-alt"></i> <?php echo e(__('نقل الطفل إلى صف آخر')); ?>

                                </button>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Submit Buttons -->
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="<?php echo e(route('class-enrollments.index')); ?>" class="btn btn-outline-secondary px-4">
                                <i class="fas fa-times"></i> <?php echo e(__('إلغاء')); ?>

                            </a>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-success px-4">
                                    <i class="fas fa-save"></i> <?php echo e(__('تحديث التسجيل')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Transfer Modal -->
    <div class="modal fade" id="transferModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('نقل الطفل إلى صف آخر')); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?php echo e(__('إغلاق')); ?>"></button>
                </div>
                <form method="POST" action="<?php echo e(route('class-enrollments.transfer', $classEnrollment)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="new_class_id" class="form-label"><?php echo e(__('الصف الجديد')); ?> <span class="text-danger">*</span></label>
                            <select name="new_class_id" id="new_class_id" class="form-select" required>
                                <option value=""><?php echo e(__('اختر الصف الجديد')); ?></option>
                                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($class->id != $classEnrollment->class_id): ?>
                                        <option value="<?php echo e($class->id); ?>">
                                            <?php echo e($class->name); ?> (<?php echo e($class->capacity - $class->current_students); ?> <?php echo e(__('مواقع متاحة')); ?>)
                                        </option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="transfer_reason" class="form-label"><?php echo e(__('سبب النقل')); ?></label>
                            <textarea name="transfer_reason" id="transfer_reason" class="form-control" rows="3" 
                                      placeholder="<?php echo e(__('أدخل سبب نقل الطفل إلى الصف الجديد')); ?>"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="transfer_date" class="form-label"><?php echo e(__('تاريخ النقل')); ?> <span class="text-danger">*</span></label>
                            <input type="date" name="transfer_date" id="transfer_date" class="form-control" 
                                   value="<?php echo e(date('Y-m-d')); ?>" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('إغلاق')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('نقل الطفل')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form submission with confirmation
    const form = document.querySelector('form[method="POST"]');
    
    form.addEventListener('submit', function(e) {
        const classId = document.getElementById('class_id').value;
        const childId = document.getElementById('child_id').value;
        const className = document.getElementById('class_id').options[document.getElementById('class_id').selectedIndex].text;
        const childName = document.getElementById('child_id').options[document.getElementById('child_id').selectedIndex].text;
        
        const confirmationText = `<?php echo e(__('سيتم تحديث تسجيل')); ?> ${childName} <?php echo e(__('في')); ?> ${className}. <?php echo e(__('هل أنت متأكد من استمرار العملية؟')); ?>`;
        
        if (!confirm(confirmationText)) {
            e.preventDefault();
        }
    });
});

// Initialize tooltips
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\backup\Source\resources\views\pages\class-enrollments\edit.blade.php ENDPATH**/ ?>