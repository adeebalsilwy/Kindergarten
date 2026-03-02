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
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h2 class="mb-sm-0 fw-bold text-primary">{{ __('إضافة تسجيل جديد') }}</h2>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('الرئيسية') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('class-enrollments.index') }}">{{ __('التسجيلات') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('إضافة جديد') }}</li>
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
                        <h4 class="card-title mb-0 text-dark">{{ __('نموذج تسجيل فصل جديد') }}</h4>
                        <div class="d-flex gap-2">
                            <a href="{{ route('class-enrollments.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left"></i> {{ __('العودة إلى القائمة') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('class-enrollments.store') }}" id="enrollmentForm">
                        @csrf

                        <div class="row">
                            <!-- Class Selection -->
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="class_id" class="form-label fw-bold text-dark">{{ __('الصف') }} <span class="text-danger">*</span></label>
                                    <select name="class_id" id="class_id" class="form-select @error('class_id') is-invalid @enderror" required>
                                        <option value="">{{ __('اختر الصف') }}</option>
                                        @foreach($classes as $class)
                                            <option value="{{ $class->id }}" 
                                                    data-available-spots="{{ $class->capacity - $class->current_students }}"
                                                    {{ old('class_id') == $class->id ? 'selected' : '' }}>
                                                {{ $class->name }} ({{ $class->capacity - $class->current_students }} {{ __('مواقع متاحة') }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('class_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">{{ __('اختر الصف الذي سيتم تسجيل الطفل فيه') }}</div>
                                </div>
                            </div>

                            <!-- Child Selection -->
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="child_id" class="form-label fw-bold text-dark">{{ __('الطفل') }} <span class="text-danger">*</span></label>
                                    <select name="child_id" id="child_id" class="form-select @error('child_id') is-invalid @enderror" required>
                                        <option value="">{{ __('اختر الطفل') }}</option>
                                        @foreach($children as $child)
                                            <option value="{{ $child->id }}" {{ old('child_id') == $child->id ? 'selected' : '' }}>
                                                {{ $child->name }} ({{ $child->age }} {{ __('سنوات') }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('child_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">{{ __('اختر الطفل الذي سيتم تسجيله') }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Enrollment Date -->
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="enrollment_date" class="form-label fw-bold text-dark">{{ __('تاريخ التسجيل') }} <span class="text-danger">*</span></label>
                                    <input type="date" name="enrollment_date" id="enrollment_date" 
                                           class="form-control @error('enrollment_date') is-invalid @enderror" 
                                           value="{{ old('enrollment_date', date('Y-m-d')) }}" required>
                                    @error('enrollment_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">{{ __('حدد تاريخ بدء التسجيل') }}</div>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="status" class="form-label fw-bold text-dark">{{ __('الحالة') }} <span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>{{ __('نشط') }}</option>
                                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>{{ __('غير نشط') }}</option>
                                        <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>{{ __('مكتمل') }}</option>
                                        <option value="transferred" {{ old('status') == 'transferred' ? 'selected' : '' }}>{{ __('منقول') }}</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">{{ __('حالة التسجيل الحالية') }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Reason Field -->
                        <div class="mb-4">
                            <label for="reason" class="form-label fw-bold text-dark">{{ __('السبب') }}</label>
                            <textarea name="reason" id="reason" class="form-control @error('reason') is-invalid @enderror" 
                                      rows="3" placeholder="{{ __('أدخل السبب إذا لزم الأمر') }}">{{ old('reason') }}</textarea>
                            @error('reason')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">{{ __('سبب التسجيل أو أي ملاحظات إضافية') }}</div>
                        </div>

                        <!-- Confirmation Alert -->
                        <div id="confirmationAlert" class="alert alert-info d-none" role="alert">
                            <h5 class="alert-heading">{{ __('تأكيد التسجيل') }}</h5>
                            <p id="confirmationText"></p>
                            <hr>
                            <p class="mb-0">{{ __('يرجى التأكد من صحة المعلومات قبل الإرسال') }}</p>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ route('class-enrollments.index') }}" class="btn btn-outline-secondary px-4">
                                <i class="fas fa-times"></i> {{ __('إلغاء') }}
                            </a>
                            <button type="submit" class="btn btn-success px-4" id="submitBtn">
                                <i class="fas fa-save"></i> {{ __('حفظ التسجيل') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bulk Enrollment Modal -->
<div class="modal fade" id="bulkEnrollmentModal" tabindex="-1" aria-hidden="true">
    <div="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('تسجيل جماعي') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('إغلاق') }}"></button>
            </div>
            <div class="modal-body">
                <form id="bulkEnrollmentForm">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="selectedClass" class="form-label">{{ __('الصف') }}</label>
                                <select id="selectedClass" class="form-select">
                                    <option value="">{{ __('اختر الصف') }}</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}">
                                            {{ $class->name }} ({{ $class->capacity - $class->current_students }} {{ __('مواقع متاحة') }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="selectedChildren" class="form-label">{{ __('الطلاب') }}</label>
                        <select id="selectedChildren" class="form-select select2" multiple="multiple" style="width: 100%;">
                            @foreach($children as $child)
                                <option value="{{ $child->id }}">{{ $child->name }}</option>
                            @endforeach
                        </select>
                        <div class="form-text">{{ __('اختر الطلاب الذين سيتم تسجيلهم') }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="bulkEnrollmentDate" class="form-label">{{ __('تاريخ التسجيل') }}</label>
                                <input type="date" id="bulkEnrollmentDate" class="form-control" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="bulkStatus" class="form-label">{{ __('الحالة') }}</label>
                                <select id="bulkStatus" class="form-select">
                                    <option value="active">{{ __('نشط') }}</option>
                                    <option value="inactive">{{ __('غير نشط') }}</option>
                                    <option value="completed">{{ __('مكتمل') }}</option>
                                    <option value="transferred">{{ __('منقول') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('إغلاق') }}</button>
                <button type="button" class="btn btn-primary" id="performBulkEnrollment">{{ __('تنفيذ التسجيل الجماعي') }}</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Class availability check
    const classSelect = document.getElementById('class_id');
    const childSelect = document.getElementById('child_id');
    
    classSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const availableSpots = selectedOption.dataset.availableSpots;
        
        if (availableSpots && parseInt(availableSpots) <= 0) {
            alert('{{ __('هذا الصف ممتلئ') }}');
        }
    });

    // Form submission with confirmation
    const form = document.getElementById('enrollmentForm');
    const submitBtn = document.getElementById('submitBtn');
    
    form.addEventListener('submit', function(e) {
        const classId = document.getElementById('class_id').value;
        const childId = document.getElementById('child_id').value;
        const className = document.getElementById('class_id').options[document.getElementById('class_id').selectedIndex].text;
        const childName = document.getElementById('child_id').options[document.getElementById('child_id').selectedIndex].text;
        
        const confirmationText = `{{ __('سيتم تسجيل') }} ${childName} {{ __('في') }} ${className}. {{ __('هل أنت متأكد من استمرار العملية؟') }}`;
        
        if (!confirm(confirmationText)) {
            e.preventDefault();
        }
    });

    // Initialize Select2 for bulk enrollment
    if (typeof jQuery !== 'undefined' && typeof $.fn.select2 !== 'undefined') {
        $('#selectedChildren').select2({
            placeholder: '{{ __('اختر الأطفال') }}',
            allowClear: true
        });
    }

    // Bulk enrollment functionality
    document.getElementById('performBulkEnrollment').addEventListener('click', function() {
        const selectedClass = document.getElementById('selectedClass').value;
        const selectedChildren = $('#selectedChildren').val();
        const enrollmentDate = document.getElementById('bulkEnrollmentDate').value;
        const status = document.getElementById('bulkStatus').value;
        
        if (!selectedClass || !selectedChildren || selectedChildren.length === 0) {
            alert('{{ __('يرجى اختيار الصف والأطفال') }}');
            return;
        }
        
        // This would typically make an AJAX call to the backend
        console.log('Bulk enrollment:', {
            class: selectedClass,
            children: selectedChildren,
            date: enrollmentDate,
            status: status
        });
        
        alert('{{ __('تم بدء عملية التسجيل الجماعي') }}');
        bootstrap.Modal.getInstance(document.getElementById('bulkEnrollmentModal')).hide();
    });
});

// Initialize tooltips
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
});
</script>
@endsection