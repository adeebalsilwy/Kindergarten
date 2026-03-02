@extends('layouts.app')

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

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h2 class="mb-sm-0 fw-bold text-primary">{{ __('إدارة التسجيلات في الفصول') }}</h2>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('الرئيسية') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('التسجيلات') }}</li>
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
                        <h4 class="card-title mb-0 text-dark">{{ __('قائمة تسجيلات الفصول') }}</h4>
                        <div class="d-flex gap-2">
                            @can('create', App\Models\ClassEnrollment::class)
                                <a href="{{ route('class-enrollments.create') }}" class="btn btn-success waves-effect waves-light">
                                    <i class="fas fa-plus-circle"></i> {{ __('إضافة تسجيل جديد') }}
                                </a>
                            @endcan
                            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" 
                                    data-bs-target="#filtersCollapse" aria-expanded="false" aria-controls="filtersCollapse">
                                <i class="fas fa-filter"></i> {{ __('الفلاتر') }}
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Filters Section -->
                <div class="collapse @if(request()->anyFilled(['class_id', 'child_id', 'status'])) show @endif" id="filtersCollapse">
                    <div class="card-body border-top">
                        <form method="GET" action="{{ route('class-enrollments.index') }}">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label for="class_id" class="form-label">{{ __('الصف') }}</label>
                                    <select name="class_id" id="class_id" class="form-select select2">
                                        <option value="">{{ __('جميع الصفوف') }}</option>
                                        @foreach($classes as $class)
                                            <option value="{{ $class->id }}" {{ request('class_id') == $class->id ? 'selected' : '' }}>
                                                {{ $class->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="child_id" class="form-label">{{ __('الطفل') }}</label>
                                    <select name="child_id" id="child_id" class="form-select select2">
                                        <option value="">{{ __('جميع الأطفال') }}</option>
                                        @foreach($children as $child)
                                            <option value="{{ $child->id }}" {{ request('child_id') == $child->id ? 'selected' : '' }}>
                                                {{ $child->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="status" class="form-label">{{ __('الحالة') }}</label>
                                    <select name="status" id="status" class="form-select">
                                        <option value="">{{ __('جميع الحالات') }}</option>
                                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>{{ __('نشط') }}</option>
                                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>{{ __('غير نشط') }}</option>
                                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>{{ __('مكتمل') }}</option>
                                        <option value="transferred" {{ request('status') == 'transferred' ? 'selected' : '' }}>{{ __('منقول') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-3 d-flex align-items-end">
                                    <div class="d-flex gap-2 w-100">
                                        <button type="submit" class="btn btn-primary flex-fill">
                                            <i class="fas fa-search"></i> {{ __('تصفية') }}
                                        </button>
                                        <a href="{{ route('class-enrollments.index') }}" class="btn btn-secondary flex-fill">
                                            <i class="fas fa-redo"></i> {{ __('إعادة تعيين') }}
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
                                            <h5 class="mb-0">{{ $enrollments->where('status', 'active')->count() }}</h5>
                                            <p class="text-white-50 mb-0">{{ __('التسجيلات النشطة') }}</p>
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
                                            <h5 class="mb-0">{{ $enrollments->where('status', 'completed')->count() }}</h5>
                                            <p class="text-white-50 mb-0">{{ __('التسجيلات المكتملة') }}</p>
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
                                            <h5 class="mb-0">{{ $enrollments->where('status', 'inactive')->count() }}</h5>
                                            <p class="text-white-50 mb-0">{{ __('غير النشطة') }}</p>
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
                                            <h5 class="mb-0">{{ $enrollments->where('status', 'transferred')->count() }}</h5>
                                            <p class="text-white-50 mb-0">{{ __('المنقولة') }}</p>
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
                                        <i class="fas fa-check-square"></i> {{ __('تحديد الكل') }}
                                    </button>
                                    <div class="dropdown">
                                        <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" 
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ __('إجراءات جماعية') }}
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" onclick="bulkAction('update-status')">
                                                <i class="fas fa-sync-alt text-primary"></i> {{ __('تحديث الحالة') }}
                                            </a></li>
                                            <li><a class="dropdown-item" href="#" onclick="bulkAction('transfer')">
                                                <i class="fas fa-exchange-alt text-info"></i> {{ __('نقل') }}
                                            </a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#" onclick="bulkAction('delete')">
                                                <i class="fas fa-trash-alt text-danger"></i> {{ __('حذف') }}
                                            </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div>
                                    <span class="text-muted">{{ __('إظهار') }} {{ $enrollments->firstItem() }} {{ __('إلى') }} {{ $enrollments->lastItem() }} {{ __('من') }} {{ $enrollments->total() }} {{ __('عناصر') }}</span>
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
                                    <th>{{ __('الرقم') }}</th>
                                    <th>{{ __('الصف') }}</th>
                                    <th>{{ __('الطفل') }}</th>
                                    <th>{{ __('تاريخ التسجيل') }}</th>
                                    <th>{{ __('تاريخ الانسحاب') }}</th>
                                    <th>{{ __('الحالة') }}</th>
                                    <th>{{ __('مُنشئ التسجيل') }}</th>
                                    <th>{{ __('الإجراءات') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($enrollments as $enrollment)
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input enrollment-checkbox" type="checkbox" 
                                                       value="{{ $enrollment->id }}" id="enrollment_{{ $enrollment->id }}">
                                                <label class="form-check-label" for="enrollment_{{ $enrollment->id }}"></label>
                                            </div>
                                        </td>
                                        <td>{{ $enrollment->id }}</td>
                                        <td>
                                            <a href="{{ route('classes.show', $enrollment->class) }}" class="text-primary">
                                                {{ $enrollment->class->name }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('children.show', $enrollment->child) }}" class="text-info">
                                                {{ $enrollment->child->name }}
                                            </a>
                                        </td>
                                        <td>{{ $enrollment->enrollment_date->format('Y-m-d') }}</td>
                                        <td>{{ $enrollment->withdrawal_date ? $enrollment->withdrawal_date->format('Y-m-d') : '-' }}</td>
                                        <td>
                                            <span class="badge rounded-pill bg-{{ $enrollment->status === 'active' ? 'success' : ($enrollment->status === 'inactive' ? 'secondary' : ($enrollment->status === 'completed' ? 'primary' : 'warning')) }} fs-6">
                                                {{ $enrollment->status === 'active' ? __('نشط') : ($enrollment->status === 'inactive' ? __('غير نشط') : ($enrollment->status === 'completed' ? __('مكتمل') : __('منقول'))) }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($enrollment->createdBy)
                                                <span class="text-muted">{{ $enrollment->createdBy->name }}</span>
                                            @else
                                                <span class="text-muted">{{ __('غير محدد') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('class-enrollments.show', $enrollment) }}" 
                                                   class="btn btn-sm btn-outline-info" 
                                                   data-bs-toggle="tooltip" 
                                                   data-bs-placement="top" 
                                                   title="{{ __('عرض التفاصيل') }}">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                @can('update', $enrollment)
                                                    <a href="{{ route('class-enrollments.edit', $enrollment) }}" 
                                                       class="btn btn-sm btn-outline-warning" 
                                                       data-bs-toggle="tooltip" 
                                                       data-bs-placement="top" 
                                                       title="{{ __('تعديل') }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('delete', $enrollment)
                                                    <form method="POST" action="{{ route('class-enrollments.destroy', $enrollment) }}" 
                                                          style="display: inline;" 
                                                          onsubmit="return confirm('{{ __('هل أنت متأكد من حذف هذا التسجيل؟') }}')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="btn btn-sm btn-outline-danger" 
                                                                data-bs-toggle="tooltip" 
                                                                data-bs-placement="top" 
                                                                title="{{ __('حذف') }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center py-4">
                                            <div class="d-flex flex-column align-items-center justify-content-center">
                                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                                <h5 class="text-muted">{{ __('لا توجد تسجيلات في الوقت الحالي') }}</h5>
                                                <p class="text-muted">{{ __('يمكنك إضافة تسجيلات جديدة باستخدام زر "إضافة تسجيل جديد"') }}</p>
                                                @can('create', App\Models\ClassEnrollment::class)
                                                    <a href="{{ route('class-enrollments.create') }}" class="btn btn-primary mt-2">
                                                        <i class="fas fa-plus-circle"></i> {{ __('إضافة تسجيل') }}
                                                    </a>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-0">{{ __('إظهار') }} {{ $enrollments->firstItem() }} {{ __('إلى') }} {{ $enrollments->lastItem() }} {{ __('من') }} {{ $enrollments->total() }} {{ __('عناصر') }}</p>
                        </div>
                        <div>
                            {{ $enrollments->appends(request()->query())->links() }}
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
                <h5 class="modal-title" id="bulkActionModalLabel">{{ __('إجراء جماعي') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('إغلاق') }}"></button>
            </div>
            <div class="modal-body">
                <p>{{ __('هل أنت متأكد من تنفيذ هذا الإجراء على') }} <span id="selectedCount">0</span> {{ __('تسجيلات محددة؟') }}</p>
                <div id="actionSpecificFields"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('إلغاء') }}</button>
                <button type="button" class="btn btn-primary" id="confirmBulkAction">{{ __('تأكيد') }}</button>
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
            alert('{{ __('الرجاء تحديد تسجيلات أولاً') }}');
            return;
        }
        
        document.getElementById('selectedCount').textContent = selectedIds.length;
        
        // Show action-specific fields
        const fieldsDiv = document.getElementById('actionSpecificFields');
        fieldsDiv.innerHTML = '';
        
        if (action === 'update-status') {
            fieldsDiv.innerHTML = `
                <div class="mb-3">
                    <label for="newStatus" class="form-label">{{ __('الحالة الجديدة') }}</label>
                    <select id="newStatus" class="form-select">
                        <option value="active">{{ __('نشط') }}</option>
                        <option value="inactive">{{ __('غير نشط') }}</option>
                        <option value="completed">{{ __('مكتمل') }}</option>
                        <option value="transferred">{{ __('منقول') }}</option>
                    </select>
                </div>
            `;
        } else if (action === 'transfer') {
            fieldsDiv.innerHTML = `
                <div class="mb-3">
                    <label for="newClass" class="form-label">{{ __('الصف الجديد') }}</label>
                    <select id="newClass" class="form-select">
                        @foreach($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="transferReason" class="form-label">{{ __('سبب النقل') }}</label>
                    <textarea id="transferReason" class="form-control" rows="3"></textarea>
                </div>
            `;
        } else if (action === 'delete') {
            fieldsDiv.innerHTML = `<p>{{ __('سيتم حذف التسجيلات المحددة نهائياً. هل أنت متأكد؟') }}</p>`;
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
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('ids', JSON.stringify(ids));
        
        let url = '';
        let method = 'POST';
        
        if (action === 'update-status') {
            const newStatus = document.getElementById('newStatus').value;
            formData.append('action', 'update_status');
            formData.append('status', newStatus);
            url = '{{ route("class-enrollments.bulk-update") }}';
        } else if (action === 'transfer') {
            const newClass = document.getElementById('newClass').value;
            const reason = document.getElementById('transferReason').value;
            formData.append('action', 'transfer');
            formData.append('new_class_id', newClass);
            formData.append('reason', reason);
            url = '{{ route("class-enrollments.bulk-transfer") }}';
        } else if (action === 'delete') {
            formData.append('action', 'delete');
            url = '{{ route("class-enrollments.bulk-delete") }}';
            if (!confirm('{{ __('هل أنت متأكد من حذف التسجيلات المحددة؟ لا يمكن التراجع عن هذا الإجراء.') }}')) {
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
                showAlert(data.message || '{{ __('تم تنفيذ الإجراء الجماعي بنجاح') }}', 'success');
                
                // Reload page to reflect changes
                setTimeout(() => {
                    location.reload();
                }, 1500);
            } else {
                // Show error message
                showAlert(data.message || '{{ __('حدث خطأ أثناء تنفيذ الإجراء') }}', 'error');
                bootstrap.Modal.getInstance(document.getElementById('bulkActionModal')).hide();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('{{ __('حدث خطأ أثناء تنفيذ الإجراء') }}', 'error');
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
@endsection