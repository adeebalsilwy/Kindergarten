

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
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h2 class="mb-sm-0 fw-bold text-primary"><?php echo e(__('إدارة التسجيلات في الفصول')); ?></h2>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('الرئيسية')); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo e(__('التسجيلات')); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-transparent border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0 text-dark"><?php echo e(__('قائمة تسجيلات الفصول')); ?></h4>
                        <div class="d-flex gap-2">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Models\ClassEnrollment::class)): ?>
                                <a href="<?php echo e(route('class-enrollments.create')); ?>" class="btn btn-success waves-effect waves-light">
                                    <i class="fas fa-plus-circle"></i> <?php echo e(__('إضافة تسجيل جديد')); ?>

                                </a>
                            <?php endif; ?>
                            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" 
                                    data-bs-target="#filtersCollapse" aria-expanded="false" aria-controls="filtersCollapse">
                                <i class="fas fa-filter"></i> <?php echo e(__('الفلاتر')); ?>

                            </button>
                        </div>
                    </div>
                </div>

                <!-- Filters Section -->
                <div class="collapse <?php if(request()->anyFilled(['class_id', 'child_id', 'status'])): ?> show <?php endif; ?>" id="filtersCollapse">
                    <div class="card-body border-top">
                        <form method="GET" action="<?php echo e(route('class-enrollments.index')); ?>">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label for="class_id" class="form-label"><?php echo e(__('الصف')); ?></label>
                                    <select name="class_id" id="class_id" class="form-select select2">
                                        <option value=""><?php echo e(__('جميع الصفوف')); ?></option>
                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($class->id); ?>" <?php echo e(request('class_id') == $class->id ? 'selected' : ''); ?>>
                                                <?php echo e($class->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="child_id" class="form-label"><?php echo e(__('الطفل')); ?></label>
                                    <select name="child_id" id="child_id" class="form-select select2">
                                        <option value=""><?php echo e(__('جميع الأطفال')); ?></option>
                                        <?php $__currentLoopData = $children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($child->id); ?>" <?php echo e(request('child_id') == $child->id ? 'selected' : ''); ?>>
                                                <?php echo e($child->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="status" class="form-label"><?php echo e(__('الحالة')); ?></label>
                                    <select name="status" id="status" class="form-select">
                                        <option value=""><?php echo e(__('جميع الحالات')); ?></option>
                                        <option value="active" <?php echo e(request('status') == 'active' ? 'selected' : ''); ?>><?php echo e(__('نشط')); ?></option>
                                        <option value="inactive" <?php echo e(request('status') == 'inactive' ? 'selected' : ''); ?>><?php echo e(__('غير نشط')); ?></option>
                                        <option value="completed" <?php echo e(request('status') == 'completed' ? 'selected' : ''); ?>><?php echo e(__('مكتمل')); ?></option>
                                        <option value="transferred" <?php echo e(request('status') == 'transferred' ? 'selected' : ''); ?>><?php echo e(__('منقول')); ?></option>
                                    </select>
                                </div>
                                <div class="col-md-3 d-flex align-items-end">
                                    <div class="d-flex gap-2 w-100">
                                        <button type="submit" class="btn btn-primary flex-fill">
                                            <i class="fas fa-search"></i> <?php echo e(__('تصفية')); ?>

                                        </button>
                                        <a href="<?php echo e(route('class-enrollments.index')); ?>" class="btn btn-secondary flex-fill">
                                            <i class="fas fa-redo"></i> <?php echo e(__('إعادة تعيين')); ?>

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    <!-- Statistics Cards -->
                    <div class="row mb-4">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-users h2 text-white-50 mb-0"></i>
                                        </div>
                                        <div class="flex-grow-1 text-end">
                                            <h5 class="mb-0"><?php echo e($enrollments->where('status', 'active')->count()); ?></h5>
                                            <p class="text-white-50 mb-0"><?php echo e(__('التسجيلات النشطة')); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-check-circle h2 text-white-50 mb-0"></i>
                                        </div>
                                        <div class="flex-grow-1 text-end">
                                            <h5 class="mb-0"><?php echo e($enrollments->where('status', 'completed')->count()); ?></h5>
                                            <p class="text-white-50 mb-0"><?php echo e(__('التسجيلات المكتملة')); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-exclamation-circle h2 text-white-50 mb-0"></i>
                                        </div>
                                        <div class="flex-grow-1 text-end">
                                            <h5 class="mb-0"><?php echo e($enrollments->where('status', 'inactive')->count()); ?></h5>
                                            <p class="text-white-50 mb-0"><?php echo e(__('غير النشطة')); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-sync-alt h2 text-white-50 mb-0"></i>
                                        </div>
                                        <div class="flex-grow-1 text-end">
                                            <h5 class="mb-0"><?php echo e($enrollments->where('status', 'transferred')->count()); ?></h5>
                                            <p class="text-white-50 mb-0"><?php echo e(__('المنقولة')); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bulk Actions -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-outline-secondary btn-sm" id="selectAllBtn">
                                        <i class="fas fa-check-square"></i> <?php echo e(__('تحديد الكل')); ?>

                                    </button>
                                    <div class="dropdown">
                                        <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" 
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php echo e(__('إجراءات جماعية')); ?>

                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" onclick="bulkAction('update-status')">
                                                <i class="fas fa-sync-alt text-primary"></i> <?php echo e(__('تحديث الحالة')); ?>

                                            </a></li>
                                            <li><a class="dropdown-item" href="#" onclick="bulkAction('transfer')">
                                                <i class="fas fa-exchange-alt text-info"></i> <?php echo e(__('نقل')); ?>

                                            </a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#" onclick="bulkAction('delete')">
                                                <i class="fas fa-trash-alt text-danger"></i> <?php echo e(__('حذف')); ?>

                                            </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div>
                                    <span class="text-muted"><?php echo e(__('إظهار')); ?> <?php echo e($enrollments->firstItem()); ?> <?php echo e(__('إلى')); ?> <?php echo e($enrollments->lastItem()); ?> <?php echo e(__('من')); ?> <?php echo e($enrollments->total()); ?> <?php echo e(__('عناصر')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-centered">
                            <thead class="table-light">
                                <tr>
                                    <th width="5%">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="selectAll">
                                            <label class="form-check-label" for="selectAll"></label>
                                        </div>
                                    </th>
                                    <th><?php echo e(__('الرقم')); ?></th>
                                    <th><?php echo e(__('الصف')); ?></th>
                                    <th><?php echo e(__('الطفل')); ?></th>
                                    <th><?php echo e(__('تاريخ التسجيل')); ?></th>
                                    <th><?php echo e(__('تاريخ الانسحاب')); ?></th>
                                    <th><?php echo e(__('الحالة')); ?></th>
                                    <th><?php echo e(__('مُنشئ التسجيل')); ?></th>
                                    <th><?php echo e(__('الإجراءات')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $enrollments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enrollment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input enrollment-checkbox" type="checkbox" 
                                                       value="<?php echo e($enrollment->id); ?>" id="enrollment_<?php echo e($enrollment->id); ?>">
                                                <label class="form-check-label" for="enrollment_<?php echo e($enrollment->id); ?>"></label>
                                            </div>
                                        </td>
                                        <td><?php echo e($enrollment->id); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('classes.show', $enrollment->class)); ?>" class="text-primary">
                                                <?php echo e($enrollment->class->name); ?>

                                            </a>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('children.show', $enrollment->child)); ?>" class="text-info">
                                                <?php echo e($enrollment->child->name); ?>

                                            </a>
                                        </td>
                                        <td><?php echo e($enrollment->enrollment_date->format('Y-m-d')); ?></td>
                                        <td><?php echo e($enrollment->withdrawal_date ? $enrollment->withdrawal_date->format('Y-m-d') : '-'); ?></td>
                                        <td>
                                            <span class="badge rounded-pill bg-<?php echo e($enrollment->status === 'active' ? 'success' : ($enrollment->status === 'inactive' ? 'secondary' : ($enrollment->status === 'completed' ? 'primary' : 'warning'))); ?> fs-6">
                                                <?php echo e($enrollment->status === 'active' ? __('نشط') : ($enrollment->status === 'inactive' ? __('غير نشط') : ($enrollment->status === 'completed' ? __('مكتمل') : __('منقول')))); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <?php if($enrollment->createdBy): ?>
                                                <span class="text-muted"><?php echo e($enrollment->createdBy->name); ?></span>
                                            <?php else: ?>
                                                <span class="text-muted"><?php echo e(__('غير محدد')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="<?php echo e(route('class-enrollments.show', $enrollment)); ?>" 
                                                   class="btn btn-sm btn-outline-info" 
                                                   data-bs-toggle="tooltip" 
                                                   data-bs-placement="top" 
                                                   title="<?php echo e(__('عرض التفاصيل')); ?>">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $enrollment)): ?>
                                                    <a href="<?php echo e(route('class-enrollments.edit', $enrollment)); ?>" 
                                                       class="btn btn-sm btn-outline-warning" 
                                                       data-bs-toggle="tooltip" 
                                                       data-bs-placement="top" 
                                                       title="<?php echo e(__('تعديل')); ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $enrollment)): ?>
                                                    <form method="POST" action="<?php echo e(route('class-enrollments.destroy', $enrollment)); ?>" 
                                                          style="display: inline;" 
                                                          onsubmit="return confirm('<?php echo e(__('هل أنت متأكد من حذف هذا التسجيل؟')); ?>')">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" 
                                                                class="btn btn-sm btn-outline-danger" 
                                                                data-bs-toggle="tooltip" 
                                                                data-bs-placement="top" 
                                                                title="<?php echo e(__('حذف')); ?>">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="9" class="text-center py-4">
                                            <div class="d-flex flex-column align-items-center justify-content-center">
                                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                                <h5 class="text-muted"><?php echo e(__('لا توجد تسجيلات في الوقت الحالي')); ?></h5>
                                                <p class="text-muted"><?php echo e(__('يمكنك إضافة تسجيلات جديدة باستخدام زر "إضافة تسجيل جديد"')); ?></p>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Models\ClassEnrollment::class)): ?>
                                                    <a href="<?php echo e(route('class-enrollments.create')); ?>" class="btn btn-primary mt-2">
                                                        <i class="fas fa-plus-circle"></i> <?php echo e(__('إضافة تسجيل')); ?>

                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-0"><?php echo e(__('إظهار')); ?> <?php echo e($enrollments->firstItem()); ?> <?php echo e(__('إلى')); ?> <?php echo e($enrollments->lastItem()); ?> <?php echo e(__('من')); ?> <?php echo e($enrollments->total()); ?> <?php echo e(__('عناصر')); ?></p>
                        </div>
                        <div>
                            <?php echo e($enrollments->appends(request()->query())->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bulk Action Modal -->
<div class="modal fade" id="bulkActionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bulkActionModalLabel"><?php echo e(__('إجراء جماعي')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?php echo e(__('إغلاق')); ?>"></button>
            </div>
            <div class="modal-body">
                <p><?php echo e(__('هل أنت متأكد من تنفيذ هذا الإجراء على')); ?> <span id="selectedCount">0</span> <?php echo e(__('تسجيلات محددة؟')); ?></p>
                <div id="actionSpecificFields"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('إلغاء')); ?></button>
                <button type="button" class="btn btn-primary" id="confirmBulkAction"><?php echo e(__('تأكيد')); ?></button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Select all checkbox functionality
    const selectAllCheckbox = document.getElementById('selectAll');
    const enrollmentCheckboxes = document.querySelectorAll('.enrollment-checkbox');
    
    selectAllCheckbox.addEventListener('change', function() {
        enrollmentCheckboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
    });
    
    // Individual checkbox functionality
    enrollmentCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const allChecked = Array.from(enrollmentCheckboxes).every(cb => cb.checked);
            selectAllCheckbox.checked = allChecked;
        });
    });
    
    // Bulk action functionality
    window.bulkAction = function(action) {
        const selectedIds = Array.from(document.querySelectorAll('.enrollment-checkbox:checked')).map(cb => cb.value);
        
        if (selectedIds.length === 0) {
            alert('<?php echo e(__('الرجاء تحديد تسجيلات أولاً')); ?>');
            return;
        }
        
        document.getElementById('selectedCount').textContent = selectedIds.length;
        
        // Show action-specific fields
        const fieldsDiv = document.getElementById('actionSpecificFields');
        fieldsDiv.innerHTML = '';
        
        if (action === 'update-status') {
            fieldsDiv.innerHTML = `
                <div class="mb-3">
                    <label for="newStatus" class="form-label"><?php echo e(__('الحالة الجديدة')); ?></label>
                    <select id="newStatus" class="form-select">
                        <option value="active"><?php echo e(__('نشط')); ?></option>
                        <option value="inactive"><?php echo e(__('غير نشط')); ?></option>
                        <option value="completed"><?php echo e(__('مكتمل')); ?></option>
                        <option value="transferred"><?php echo e(__('منقول')); ?></option>
                    </select>
                </div>
            `;
        } else if (action === 'transfer') {
            fieldsDiv.innerHTML = `
                <div class="mb-3">
                    <label for="newClass" class="form-label"><?php echo e(__('الصف الجديد')); ?></label>
                    <select id="newClass" class="form-select">
                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($class->id); ?>"><?php echo e($class->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="transferReason" class="form-label"><?php echo e(__('سبب النقل')); ?></label>
                    <textarea id="transferReason" class="form-control" rows="3"></textarea>
                </div>
            `;
        } else if (action === 'delete') {
            fieldsDiv.innerHTML = `<p><?php echo e(__('سيتم حذف التسجيلات المحددة نهائياً. هل أنت متأكد؟')); ?></p>`;
        }
        
        document.getElementById('confirmBulkAction').onclick = function() {
            performBulkAction(action, selectedIds);
        };
        
        new bootstrap.Modal(document.getElementById('bulkActionModal')).show();
    };
    
    // Perform bulk action
    function performBulkAction(action, ids) {
        // Prepare form data for AJAX request
        const formData = new FormData();
        formData.append('_token', '<?php echo e(csrf_token()); ?>');
        formData.append('ids', JSON.stringify(ids));
        
        let url = '';
        let method = 'POST';
        
        if (action === 'update-status') {
            const newStatus = document.getElementById('newStatus').value;
            formData.append('action', 'update_status');
            formData.append('status', newStatus);
            url = '<?php echo e(route("class-enrollments.bulk-update")); ?>';
        } else if (action === 'transfer') {
            const newClass = document.getElementById('newClass').value;
            const reason = document.getElementById('transferReason').value;
            formData.append('action', 'transfer');
            formData.append('new_class_id', newClass);
            formData.append('reason', reason);
            url = '<?php echo e(route("class-enrollments.bulk-transfer")); ?>';
        } else if (action === 'delete') {
            formData.append('action', 'delete');
            url = '<?php echo e(route("class-enrollments.bulk-delete")); ?>';
            if (!confirm('<?php echo e(__('هل أنت متأكد من حذف التسجيلات المحددة؟ لا يمكن التراجع عن هذا الإجراء.')); ?>')) {
                return;
            }
        }
        
        // Make AJAX request
        fetch(url, {
            method: method,
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Close modal and show success message
                bootstrap.Modal.getInstance(document.getElementById('bulkActionModal')).hide();
                showAlert(data.message || '<?php echo e(__('تم تنفيذ الإجراء الجماعي بنجاح')); ?>', 'success');
                
                // Reload page to reflect changes
                setTimeout(() => {
                    location.reload();
                }, 1500);
            } else {
                // Show error message
                showAlert(data.message || '<?php echo e(__('حدث خطأ أثناء تنفيذ الإجراء')); ?>', 'error');
                bootstrap.Modal.getInstance(document.getElementById('bulkActionModal')).hide();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('<?php echo e(__('حدث خطأ أثناء تنفيذ الإجراء')); ?>', 'error');
            bootstrap.Modal.getInstance(document.getElementById('bulkActionModal')).hide();
        });
    }
    
    // Show alert function
    function showAlert(message, type) {
        // Remove any existing alerts
        const existingAlert = document.querySelector('.alert-fixed');
        if (existingAlert) {
            existingAlert.remove();
        }
        
        // Create alert element
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type === 'error' ? 'danger' : 'success'} alert-dismissible fade show alert-fixed`;
        alertDiv.style.cssText = 'position: fixed; top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
        alertDiv.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        document.body.appendChild(alertDiv);
        
        // Auto-hide after 5 seconds
        setTimeout(() => {
            if (alertDiv) {
                const bsAlert = new bootstrap.Alert(alertDiv);
                bsAlert.close();
            }
        }, 5000);
    }
});

// Initialize tooltips
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\backup\Source\resources\views\pages\class-enrollments\index.blade.php ENDPATH**/ ?>