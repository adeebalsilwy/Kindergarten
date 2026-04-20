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
                <h2 class="mb-sm-0 fw-bold text-primary">{{ __('تعديل التسجيل') }}</h2>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('الرئيسية') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('class-enrollments.index') }}">{{ __('التسجيلات') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('تعديل') }}</li>
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
                        <h4 class="card-title mb-0 text-dark">{{ __('تحديث معلومات التسجيل') }}</h4>
                        <div class="d-flex gap-2">
                            <a href="{{ route('class-enrollments.show', $classEnrollment) }}" class="btn btn-outline-info">
                                <i class="fas fa-eye"></i> {{ __('عرض التفاصيل') }}
                            </a>
                            <a href="{{ route('class-enrollments.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left"></i> {{ __('العودة إلى القائمة') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('class-enrollments.update', $classEnrollment) }}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Class Selection -->
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="class_id" class="form-label fw-bold text-dark">{{ __('الصف') }}</label>
                                    <select name="class_id" id="class_id" class="form-select @error('class_id') is-invalid @enderror">
                                        <option value="">{{ __('اختر الصف') }}</option>
                                        @foreach($classes as $class)
                                            <option value="{{ $class->id }}" 
                                                    {{ old('class_id', $classEnrollment->class_id) == $class->id ? 'selected' : '' }}>
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
                                    <label for="child_id" class="form-label fw-bold text-dark">{{ __('الطفل') }}</label>
                                    <select name="child_id" id="child_id" class="form-select @error('child_id') is-invalid @enderror">
                                        <option value="">{{ __('اختر الطفل') }}</option>
                                        @foreach($children as $child)
                                            <option value="{{ $child->id }}" 
                                                    {{ old('child_id', $classEnrollment->child_id) == $child->id ? 'selected' : '' }}>
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
                                    <label for="enrollment_date" class="form-label fw-bold text-dark">{{ __('تاريخ التسجيل') }}</label>
                                    <input type="date" name="enrollment_date" id="enrollment_date" 
                                           class="form-control @error('enrollment_date') is-invalid @enderror" 
                                           value="{{ old('enrollment_date', $classEnrollment->enrollment_date->format('Y-m-d')) }}">
                                    @error('enrollment_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">{{ __('تاريخ بدء التسجيل') }}</div>
                                </div>
                            </div>

                            <!-- Withdrawal Date -->
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="withdrawal_date" class="form-label fw-bold text-dark">{{ __('تاريخ الانسحاب') }}</label>
                                    <input type="date" name="withdrawal_date" id="withdrawal_date" 
                                           class="form-control @error('withdrawal_date') is-invalid @enderror" 
                                           value="{{ old('withdrawal_date', $classEnrollment->withdrawal_date ? $classEnrollment->withdrawal_date->format('Y-m-d') : '') }}">
                                    @error('withdrawal_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">{{ __('تاريخ انسحاب الطفل من الصف (اختياري)') }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Status -->
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="status" class="form-label fw-bold text-dark">{{ __('الحالة') }}</label>
                                    <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                                        <option value="active" {{ old('status', $classEnrollment->status) == 'active' ? 'selected' : '' }}>{{ __('نشط') }}</option>
                                        <option value="inactive" {{ old('status', $classEnrollment->status) == 'inactive' ? 'selected' : '' }}>{{ __('غير نشط') }}</option>
                                        <option value="completed" {{ old('status', $classEnrollment->status) == 'completed' ? 'selected' : '' }}>{{ __('مكتمل') }}</option>
                                        <option value="transferred" {{ old('status', $classEnrollment->status) == 'transferred' ? 'selected' : '' }}>{{ __('منقول') }}</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">{{ __('حالة التسجيل الحالية') }}</div>
                                </div>
                            </div>

                            <!-- Enrollment ID Display -->
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">{{ __('رقم التسجيل') }}</label>
                                    <div class="form-control-plaintext p-2 bg-light border rounded">
                                        #{{ $classEnrollment->id }}
                                    </div>
                                    <div class="form-text">{{ __('هذا هو الرقم التعريفي لهذا التسجيل') }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Reason Field -->
                        <div class="mb-4">
                            <label for="reason" class="form-label fw-bold text-dark">{{ __('السبب') }}</label>
                            <textarea name="reason" id="reason" class="form-control @error('reason') is-invalid @enderror" 
                                      rows="3" placeholder="{{ __('أدخل السبب إذا لزم الأمر') }}">{{ old('reason', $classEnrollment->reason) }}</textarea>
                            @error('reason')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">{{ __('سبب التغيير أو أي ملاحظات إضافية') }}</div>
                        </div>

                        <!-- Current Enrollment Info -->
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="card bg-light border">
                                    <div class="card-header bg-transparent">
                                        <h5 class="card-title mb-0 text-dark">{{ __('معلومات التسجيل الحالية') }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p class="mb-1"><strong>{{ __('تم الإنشاء في:') }}</strong></p>
                                                <p class="text-muted">{{ $classEnrollment->created_at->format('Y-m-d H:i:s') }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="mb-1"><strong>{{ __('آخر تحديث:') }}</strong></p>
                                                <p class="text-muted">{{ $classEnrollment->updated_at->format('Y-m-d H:i:s') }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="mb-1"><strong>{{ __('مُنشئ التسجيل:') }}</strong></p>
                                                <p class="text-muted">
                                                    @if($classEnrollment->createdBy)
                                                        {{ $classEnrollment->createdBy->name }}
                                                    @else
                                                        {{ __('غير محدد') }}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Transfer Button -->
                        @if($classEnrollment->status === 'active')
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#transferModal">
                                    <i class="fas fa-exchange-alt"></i> {{ __('نقل الطفل إلى صف آخر') }}
                                </button>
                            </div>
                        </div>
                        @endif

                        <!-- Submit Buttons -->
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ route('class-enrollments.index') }}" class="btn btn-outline-secondary px-4">
                                <i class="fas fa-times"></i> {{ __('إلغاء') }}
                            </a>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-success px-4">
                                    <i class="fas fa-save"></i> {{ __('تحديث التسجيل') }}
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
                    <h5 class="modal-title">{{ __('نقل الطفل إلى صف آخر') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('إغلاق') }}"></button>
                </div>
                <form method="POST" action="{{ route('class-enrollments.transfer', $classEnrollment) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="new_class_id" class="form-label">{{ __('الصف الجديد') }}</label>
                            <select name="new_class_id" id="new_class_id" class="form-select">
                                <option value="">{{ __('اختر الصف الجديد') }}</option>
                                @foreach($classes as $class)
                                    @if($class->id != $classEnrollment->class_id)
                                        <option value="{{ $class->id }}">
                                            {{ $class->name }} ({{ $class->capacity - $class->current_students }} {{ __('مواقع متاحة') }})
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="transfer_reason" class="form-label">{{ __('سبب النقل') }}</label>
                            <textarea name="transfer_reason" id="transfer_reason" class="form-control" rows="3" 
                                      placeholder="{{ __('أدخل سبب نقل الطفل إلى الصف الجديد') }}"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="transfer_date" class="form-label">{{ __('تاريخ النقل') }}</label>
                            <input type="date" name="transfer_date" id="transfer_date" class="form-control" 
                                   value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('إغلاق') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('نقل الطفل') }}</button>
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
        
        const confirmationText = `{{ __('سيتم تحديث تسجيل') }} ${childName} {{ __('في') }} ${className}. {{ __('هل أنت متأكد من استمرار العملية؟') }}`;
        
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
@endsection