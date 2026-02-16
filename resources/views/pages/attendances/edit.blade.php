@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Attendance.edit') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('Attendance.edit') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('attendances.update', $attendance->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('attendances.fields.child_id') }}</x-base.form-label>
                            <x-base.tom-select name="child_id" class="mt-2" data-placeholder="{{ __('global.select_option') }}">
                                <option value="">{{ __('global.select_option') }}</option>
                                @foreach($children as $child)
                                    <option value="{{ $child->id }}" {{ old('child_id', $attendance->child_id ?? '') == $child->id ? 'selected' : '' }}>
                                        {{ $child->name }}
                                    </option>
                                @endforeach
                            </x-base.tom-select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('attendances.fields.date') }}</x-base.form-label>
                            <x-base.form-input type="date" name="date" value="{{ old('date', $attendance->date ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('attendances.fields.status') }}</x-base.form-label>
                            <x-base.tom-select name="status" class="mt-2">
                                <option value="">{{ __('global.select_option') }}</option>
                                <option value="present" {{ old('status', $attendance->status ?? '') == 'present' ? 'selected' : '' }}>{{ __('global.present') }}</option>
                                <option value="absent" {{ old('status', $attendance->status ?? '') == 'absent' ? 'selected' : '' }}>{{ __('global.absent') }}</option>
                                <option value="sick" {{ old('status', $attendance->status ?? '') == 'sick' ? 'selected' : '' }}>{{ __('global.sick') }}</option>
                                <option value="late" {{ old('status', $attendance->status ?? '') == 'late' ? 'selected' : '' }}>{{ __('global.late') }}</option>
                                <option value="excused" {{ old('status', $attendance->status ?? '') == 'excused' ? 'selected' : '' }}>{{ __('global.excused') }}</option>
                            </x-base.tom-select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('attendances.fields.check_in') }}</x-base.form-label>
                            <x-base.form-input type="time" name="check_in" value="{{ old('check_in', $attendance->check_in ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('attendances.fields.check_out') }}</x-base.form-label>
                            <x-base.form-input type="time" name="check_out" value="{{ old('check_out', $attendance->check_out ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('attendances.fields.notes') }}</x-base.form-label>
                            <x-base.form-textarea name="notes" rows="4" class="resize-none">{{ old('notes', $attendance->notes ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('attendances.fields.absence_reason') }}</x-base.form-label>
                            <x-base.form-textarea name="absence_reason" rows="3" class="resize-none">{{ old('absence_reason', $attendance->absence_reason ?? '') }}</x-base.form-textarea>
                        </div>

                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="{{ route('attendances.index') }}" class="btn btn-outline-secondary w-24 me-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.update') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
