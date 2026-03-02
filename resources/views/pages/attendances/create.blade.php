@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('global.add_new_attendance') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">
            {{ __('global.add_new_attendance') }}
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <x-base.button variant="outline-secondary" as="a" href="{{ route('attendances.index') }}" class="flex items-center">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" /> {{ __('global.back') }}
            </x-base.button>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="box p-5">
                <form action="{{ route('attendances.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12">
                            <x-base.form-label class="font-bold">{{ __('global.select_student') }}</x-base.form-label>
                            <x-base.tom-select name="child_id" class="w-full">
                                <option value="">{{ __('global.please_select') }}</option>
                                @foreach($children ?? [] as $child)
                                    <option value="{{ $child->id }}" {{ old('child_id') == $child->id ? 'selected' : '' }}>
                                        {{ $child->name }} ({{ $child->class->name ?? '' }})
                                    </option>
                                @endforeach
                            </x-base.tom-select>
                            @error('child_id')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-span-12 md:col-span-6">
                            <x-base.form-label class="font-bold">{{ __('global.attendance_date') }}</x-base.form-label>
                            <x-base.form-input type="date" name="date" value="{{ old('date', now()->format('Y-m-d')) }}" class="w-full" />
                            @error('date')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-span-12 md:col-span-6">
                            <x-base.form-label class="font-bold">{{ __('global.status') }}</x-base.form-label>
                            <x-base.form-select name="status" class="w-full">
                                <option value="present" {{ old('status', 'present') == 'present' ? 'selected' : '' }}>{{ __('global.present') }}</option>
                                <option value="absent" {{ old('status') == 'absent' ? 'selected' : '' }}>{{ __('global.absent') }}</option>
                                <option value="late" {{ old('status') == 'late' ? 'selected' : '' }}>{{ __('global.late') }}</option>
                                <option value="excused" {{ old('status') == 'excused' ? 'selected' : '' }}>{{ __('global.excused') }}</option>
                            </x-base.form-select>
                            @error('status')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-span-12 md:col-span-6">
                            <x-base.form-label class="font-bold">{{ __('global.check_in') }}</x-base.form-label>
                            <x-base.form-input type="time" name="check_in" value="{{ old('check_in') }}" class="w-full" />
                            @error('check_in')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-span-12 md:col-span-6">
                            <x-base.form-label class="font-bold">{{ __('global.check_out') }}</x-base.form-label>
                            <x-base.form-input type="time" name="check_out" value="{{ old('check_out') }}" class="w-full" />
                            @error('check_out')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-span-12">
                            <x-base.form-label class="font-bold">{{ __('global.absence_reason') }}</x-base.form-label>
                            <x-base.form-input type="text" name="absence_reason" value="{{ old('absence_reason') }}" class="w-full" placeholder="{{ __('global.absence_reason_field') }}..." />
                            @error('absence_reason')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-span-12">
                            <x-base.form-label class="font-bold">{{ __('global.notes') }}</x-base.form-label>
                            <x-base.form-textarea name="notes" class="w-full" rows="3" placeholder="{{ __('global.add_notes_here') }}...">{{ old('notes') }}</x-base.form-textarea>
                            @error('notes')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="flex justify-end gap-3 mt-8">
                        <x-base.button variant="outline-secondary" as="a" href="{{ route('attendances.index') }}" class="w-32">
                            {{ __('global.cancel') }}
                        </x-base.button>
                        <x-base.button type="submit" variant="primary" class="w-48 shadow-md">
                            <x-base.lucide icon="Save" class="w-4 h-4 me-2" /> {{ __('global.save') }}
                        </x-base.button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="intro-y col-span-12 lg:col-span-4">
            <div class="box p-5">
                <div class="font-medium text-base mb-4">{{ __('global.quick_tips') }}</div>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <x-base.lucide icon="CheckCircle" class="w-4 h-4 text-success me-2 mt-0.5 flex-shrink-0" />
                        <span class="text-sm">{{ __('global.attendance_status_tip') }}</span>
                    </li>
                    <li class="flex items-start">
                        <x-base.lucide icon="CheckCircle" class="w-4 h-4 text-success me-2 mt-0.5 flex-shrink-0" />
                        <span class="text-sm">{{ __('global.check_in_out_tip') }}</span>
                    </li>
                    <li class="flex items-start">
                        <x-base.lucide icon="CheckCircle" class="w-4 h-4 text-success me-2 mt-0.5 flex-shrink-0" />
                        <span class="text-sm">{{ __('global.bulk_attendance_tip') }}</span>
                    </li>
                </ul>
            </div>
            
            <div class="box p-5 mt-5">
                <div class="font-medium text-base mb-4">{{ __('global.attendance_statistics') }}</div>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-slate-500">{{ __('global.total_attendance') }}</span>
                        <span class="font-bold text-primary">{{ $totalAttendance ?? 0 }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-500">{{ __('global.present_rate') }}</span>
                        <span class="font-bold text-success">{{ $attendanceRate ?? 0 }}%</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-500">{{ __('global.absent_rate') }}</span>
                        <span class="font-bold text-danger">{{ $absentRate ?? 0 }}%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection