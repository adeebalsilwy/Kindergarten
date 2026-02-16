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
                <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="grid grid-cols-12 gap-4 gap-y-5">
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label for="child_id">{{ __('attendances.fields.child_id') }}</x-base.form-label>
                            <x-base.tom-select name="child_id" id="child_id" class="mt-2" data-placeholder="{{ __('global.select_option') }}">
                                <option value="">{{ __('global.select_option') }}</option>
                                @foreach($children as $child)
                                    <option value="{{ $child->id }}" {{ old('child_id', $attendance->child_id) == $child->id ? 'selected' : '' }}>
                                        {{ $child->name }}
                                    </option>
                                @endforeach
                            </x-base.tom-select>
                            @error('child_id')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label for="date">{{ __('attendances.fields.date') }}</x-base.form-label>
                            <x-base.form-input id="date" type="date" name="date" value="{{ old('date', $attendance->date ? \Carbon\Carbon::parse($attendance->date)->format('Y-m-d') : '') }}" class="mt-2" />
                            @error('date')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label for="status">{{ __('attendances.fields.status') }}</x-base.form-label>
                            <x-base.tom-select name="status" id="status" class="mt-2" data-placeholder="{{ __('global.select_option') }}">
                                <option value="">{{ __('global.select_option') }}</option>
                                <option value="present" {{ old('status', $attendance->status) == 'present' ? 'selected' : '' }}>{{ __('global.present') }}</option>
                                <option value="absent" {{ old('status', $attendance->status) == 'absent' ? 'selected' : '' }}>{{ __('global.absent') }}</option>
                                <option value="sick" {{ old('status', $attendance->status) == 'sick' ? 'selected' : '' }}>{{ __('global.sick') }}</option>
                                <option value="late" {{ old('status', $attendance->status) == 'late' ? 'selected' : '' }}>{{ __('global.late') }}</option>
                                <option value="excused" {{ old('status', $attendance->status) == 'excused' ? 'selected' : '' }}>{{ __('global.excused') }}</option>
                            </x-base.tom-select>
                            @error('status')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-3">
                            <x-base.form-label for="check_in">{{ __('attendances.fields.check_in') }}</x-base.form-label>
                            <x-base.form-input id="check_in" type="time" name="check_in" value="{{ old('check_in', $attendance->check_in_time ? \Carbon\Carbon::parse($attendance->check_in_time)->format('H:i') : '') }}" class="mt-2" />
                            @error('check_in')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-3">
                            <x-base.form-label for="check_out">{{ __('attendances.fields.check_out') }}</x-base.form-label>
                            <x-base.form-input id="check_out" type="time" name="check_out" value="{{ old('check_out', $attendance->check_out_time ? \Carbon\Carbon::parse($attendance->check_out_time)->format('H:i') : '') }}" class="mt-2" />
                            @error('check_out')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label for="notes">{{ __('attendances.fields.notes') }}</x-base.form-label>
                            <x-base.form-textarea id="notes" name="notes" rows="3" class="mt-2 resize-none">{{ old('notes', $attendance->notes) }}</x-base.form-textarea>
                            @error('notes')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12" id="absence_reason_container">
                            <x-base.form-label for="absence_reason">{{ __('attendances.fields.absence_reason') }}</x-base.form-label>
                            <x-base.form-textarea id="absence_reason" name="absence_reason" rows="2" class="mt-2 resize-none">{{ old('absence_reason', $attendance->absence_reason) }}</x-base.form-textarea>
                            @error('absence_reason')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="flex justify-end mt-6 gap-2">
                        <x-base.button type="button" variant="outline-secondary" as="a" href="{{ route('attendances.index') }}" class="w-24">
                            {{ __('global.cancel') }}
                        </x-base.button>
                        <x-base.button type="submit" variant="primary" class="w-24 shadow-md">
                            {{ __('global.update') }}
                        </x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusSelect = document.getElementById('status');
            const absenceReasonContainer = document.getElementById('absence_reason_container');

            function toggleAbsenceReason() {
                if (statusSelect.value === 'absent' || statusSelect.value === 'sick' || statusSelect.value === 'excused') {
                    absenceReasonContainer.style.display = 'block';
                } else {
                    absenceReasonContainer.style.display = 'none';
                }
            }

            statusSelect.addEventListener('change', toggleAbsenceReason);
            toggleAbsenceReason();
        });
    </script>
@endsection
