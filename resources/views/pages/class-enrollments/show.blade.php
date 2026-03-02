@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h2 class="mb-sm-0 fw-bold text-primary">{{ __('تفاصيل التسجيل') }}</h2>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('الرئيسية') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('class-enrollments.index') }}">{{ __('التسجيلات') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('التفاصيل') }}</li>
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
                        <h4 class="card-title mb-0 text-dark">#{{ $classEnrollment->id }} - {{ $classEnrollment->child->name }}</h4>
                        <div class="d-flex gap-2">
                            @can('update', $classEnrollment)
                                <a href="{{ route('class-enrollments.edit', $classEnrollment) }}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i> {{ __('تعديل') }}
                                </a>
                            @endcan
                            <a href="{{ route('class-enrollments.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left"></i> {{ __('العودة إلى القائمة') }}
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
                                    <h5 class="card-title mb-0"><i class="fas fa-info-circle"></i> {{ __('معلومات التسجيل') }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-muted">{{ __('رقم التسجيل') }}</label>
                                                <div class="form-control-plaintext">#{{ $classEnrollment->id }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-muted">{{ __('الحالة') }}</label>
                                                <div class="form-control-plaintext">
                                                    <span class="badge rounded-pill bg-{{ $classEnrollment->status === 'active' ? 'success' : ($classEnrollment->status === 'inactive' ? 'secondary' : ($classEnrollment->status === 'completed' ? 'primary' : 'warning')) }} fs-6">
                                                        {{ $classEnrollment->status === 'active' ? __('نشط') : ($classEnrollment->status === 'inactive' ? __('غير نشط') : ($classEnrollment->status === 'completed' ? __('مكتمل') : __('منقول'))) }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-muted">{{ __('تاريخ التسجيل') }}</label>
                                                <div class="form-control-plaintext">{{ $classEnrollment->enrollment_date->format('Y-m-d') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-muted">{{ __('تاريخ الانسحاب') }}</label>
                                                <div class="form-control-plaintext">
                                                    {{ $classEnrollment->withdrawal_date ? $classEnrollment->withdrawal_date->format('Y-m-d') : __('غير محدد') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label text-muted">{{ __('السبب') }}</label>
                                                <div class="form-control-plaintext">
                                                    {{ $classEnrollment->reason ?: __('غير محدد') }}
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
                                    <h5 class="card-title mb-0"><i class="fas fa-child"></i> {{ __('معلومات الطفل') }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <div class="avatar-lg mx-auto mb-3">
                                            <div class="avatar-title bg-light text-info rounded-circle h2">
                                                <i class="fas fa-user"></i>
                                            </div>
                                        </div>
                                        <h5 class="mb-1">{{ $classEnrollment->child->name }}</h5>
                                        <p class="text-muted mb-0">{{ $classEnrollment->child->age }} {{ __('سنوات') }}</p>
                                    </div>
                                    
                                    <div class="mt-3">
                                        <div class="mb-2">
                                            <label class="form-label text-muted">{{ __('الجنس') }}</label>
                                            <div class="form-control-plaintext">
                                                {{ $classEnrollment->child->gender === 'male' ? __('ذكر') : ($classEnrollment->child->gender === 'female' ? __('أنثى') : __('غير محدد')) }}
                                            </div>
                                        </div>
                                        
                                        <div class="mb-2">
                                            <label class="form-label text-muted">{{ __('تاريخ الميلاد') }}</label>
                                            <div class="form-control-plaintext">{{ $classEnrollment->child->dob->format('Y-m-d') }}</div>
                                        </div>
                                        
                                        <div class="mb-2">
                                            <label class="form-label text-muted">{{ __('الصف الحالي') }}</label>
                                            <div class="form-control-plaintext">{{ $classEnrollment->class->name }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Class Info Card -->
                        <div class="col-md-6">
                            <div class="card border shadow-none">
                                <div class="card-header bg-success text-white">
                                    <h5 class="card-title mb-0"><i class="fas fa-chalkboard-teacher"></i> {{ __('معلومات الصف') }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <div class="avatar-lg mx-auto mb-3">
                                            <div class="avatar-title bg-light text-success rounded-circle h2">
                                                <i class="fas fa-school"></i>
                                            </div>
                                        </div>
                                        <h5 class="mb-1">{{ $classEnrollment->class->name }}</h5>
                                        <p class="text-muted mb-0">{{ $classEnrollment->class->code }}</p>
                                    </div>
                                    
                                    <div class="mt-3">
                                        <div class="mb-2">
                                            <label class="form-label text-muted">{{ __('الوصف') }}</label>
                                            <div class="form-control-plaintext">{{ $classEnrollment->class->description }}</div>
                                        </div>
                                        
                                        <div class="mb-2">
                                            <label class="form-label text-muted">{{ __('السعة') }}</label>
                                            <div class="form-control-plaintext">{{ $classEnrollment->class->capacity }} {{ __('طلاب') }}</div>
                                        </div>
                                        
                                        <div class="mb-2">
                                            <label class="form-label text-muted">{{ __('عدد الطلاب الحالي') }}</label>
                                            <div class="form-control-plaintext">{{ $classEnrollment->class->current_students }} {{ __('طلاب') }}</div>
                                        </div>
                                        
                                        <div class="mb-2">
                                            <label class="form-label text-muted">{{ __('معلم الصف') }}</label>
                                            <div class="form-control-plaintext">{{ $classEnrollment->class->teacher->name }}</div>
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
                                    <h5 class="card-title mb-0"><i class="fas fa-info"></i> {{ __('معلومات إضافية') }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-muted">{{ __('تم الإنشاء في') }}</label>
                                                <div class="form-control-plaintext">{{ $classEnrollment->created_at->format('Y-m-d H:i:s') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-muted">{{ __('آخر تحديث') }}</label>
                                                <div class="form-control-plaintext">{{ $classEnrollment->updated_at->format('Y-m-d H:i:s') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-muted">{{ __('مُنشئ التسجيل') }}</label>
                                                <div class="form-control-plaintext">
                                                    @if($classEnrollment->createdBy)
                                                        {{ $classEnrollment->createdBy->name }}
                                                    @else
                                                        {{ __('غير محدد') }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-muted">{{ __('نوع التسجيل') }}</label>
                                                <div class="form-control-plaintext">
                                                    @if($classEnrollment->status === 'active')
                                                        {{ __('تسجيل نشط') }}
                                                    @elseif($classEnrollment->status === 'inactive')
                                                        {{ __('تسجيل غير نشط') }}
                                                    @elseif($classEnrollment->status === 'completed')
                                                        {{ __('تسجيل مكتمل') }}
                                                    @else
                                                        {{ __('تسجيل منقول') }}
                                                    @endif
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
                                <a href="{{ route('class-enrollments.index') }}" class="btn btn-outline-secondary px-4">
                                    <i class="fas fa-arrow-left"></i> {{ __('العودة إلى القائمة') }}
                                </a>
                                <div class="d-flex gap-2">
                                    @can('update', $classEnrollment)
                                        <a href="{{ route('class-enrollments.edit', $classEnrollment) }}" class="btn btn-primary px-4">
                                            <i class="fas fa-edit"></i> {{ __('تعديل التسجيل') }}
                                        </a>
                                    @endcan
                                    @can('delete', $classEnrollment)
                                        <form method="POST" action="{{ route('class-enrollments.destroy', $classEnrollment) }}" 
                                              style="display: inline;" 
                                              onsubmit="return confirm('{{ __('هل أنت متأكد من حذف هذا التسجيل؟') }}')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger px-4">
                                                <i class="fas fa-trash"></i> {{ __('حذف التسجيل') }}
                                            </button>
                                        </form>
                                    @endcan
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
@endsection