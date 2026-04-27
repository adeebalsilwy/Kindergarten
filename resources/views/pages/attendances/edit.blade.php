@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('global.edit_attendance') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">
            {{ __('global.edit_attendance') }}
        </h2>
    </div>
    
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="box p-5">
                <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 md:col-span-6">
                            <x-base.form-label class="font-bold">{{ __('global.student') }}</x-base.form-label>
                            <div class="p-3 bg-slate-100 dark:bg-darkmode-400 rounded-md mt-1 flex items-center">
                                <div class="w-10 h-10 image-fit me-3">
                                    <img alt="{{ $attendance->child->name ?? '' }}" class="rounded-full shadow-md" src="{{ $attendance->child->photo_path ? asset($attendance->child->photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode($attendance->child->name ?? '') . '&background=random' }}">
                                </div>
                                <div>
                                    <div class="font-medium">{{ $attendance->child->name ?? 'N/A' }}</div>
                                    <div class="text-slate-500 text-xs">{{ $attendance->child->class->name ?? '' }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <x-base.form-label class="font-bold">{{ __('global.date') }}</x-base.form-label>
                            <div class="p-3 bg-slate-100 dark:bg-darkmode-400 rounded-md mt-1 flex items-center">
                                <x-base.lucide icon="Calendar" class="w-5 h-5 me-2 text-slate-500" />
                                <span class="font-medium">{{ $attendance->date ? $attendance->date->format('Y-m-d') : '-' }}</span>
                            </div>
                        </div>

                        <div class="col-span-12 md:col-span-4">
                            <x-base.form-label class="font-bold">{{ __('global.status') }}</x-base.form-label>
                            <x-base.form-select name="status" class="w-full mt-1">
                                <option value="present" {{ old('status', $attendance->status) == 'present' ? 'selected' : '' }}>{{ __('global.present') }}</option>
                                <option value="absent" {{ old('status', $attendance->status) == 'absent' ? 'selected' : '' }}>{{ __('global.absent') }}</option>
                                <option value="late" {{ old('status', $attendance->status) == 'late' ? 'selected' : '' }}>{{ __('global.late') }}</option>
                                <option value="excused" {{ old('status', $attendance->status) == 'excused' ? 'selected' : '' }}>{{ __('global.excused') }}</option>
                            </x-base.form-select>
                            @error('status')
                                <div class="text-danger mt-1 text-xs">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-span-12 md:col-span-4">
                            <x-base.form-label class="font-bold">{{ __('global.check_in') }}</x-base.form-label>
                            <x-base.form-input type="time" name="check_in" value="{{ old('check_in', $attendance->check_in) }}" class="w-full mt-1" />
                        </div>

                        <div class="col-span-12 md:col-span-4">
                            <x-base.form-label class="font-bold">{{ __('global.check_out') }}</x-base.form-label>
                            <x-base.form-input type="time" name="check_out" value="{{ old('check_out', $attendance->check_out) }}" class="w-full mt-1" />
                        </div>

                        <div class="col-span-12">
                            <x-base.form-label class="font-bold">{{ __('global.absence_reason') }}</x-base.form-label>
                            <x-base.form-input type="text" name="absence_reason" value="{{ old('absence_reason', $attendance->absence_reason) }}" class="w-full mt-1" placeholder="{{ __('global.absence_reason_field') }}..." />
                            @error('absence_reason')
                                <div class="text-danger mt-1 text-xs">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-span-12">
                            <x-base.form-label class="font-bold">{{ __('global.notes') }}</x-base.form-label>
                            <x-base.form-textarea name="notes" rows="3" class="w-full mt-1 resize-none" placeholder="{{ __('global.add_notes_here') }}...">{{ old('notes', $attendance->notes) }}</x-base.form-textarea>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 mt-8">
                        <x-base.button variant="outline-secondary" as="a" href="{{ route('attendances.index') }}" class="w-32">
                            {{ __('global.cancel') }}
                        </x-base.button>
                        <x-base.button type="submit" variant="primary" class="w-32 shadow-md">
                            <x-base.lucide icon="Save" class="w-4 h-4 me-2" /> {{ __('global.update') }}
                        </x-base.button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Attendance History -->
        <div class="intro-y col-span-12 lg:col-span-4">
            <div class="box p-5">
                <div class="flex items-center font-bold mb-4 border-b pb-4">
                    <x-base.lucide icon="History" class="w-5 h-5 me-2 text-primary" />
                    {{ __('global.recent_history') }}
                </div>
                <div class="relative before:block before:absolute before:w-px before:h-[85%] before:bg-slate-200 before:dark:bg-darkmode-400 before:ms-5 before:mt-5">
                    @foreach($attendance->child->attendances()->latest()->take(5)->get() as $history)
                    <div class="intro-x relative flex items-center mb-3">
                        <div class="before:block before:absolute before:w-3 before:h-3 before:bg-slate-300 before:dark:bg-darkmode-300 before:rounded-full before:ms-4"></div>
                        <div class="box px-5 py-3 ms-10 flex-1 zoom-in">
                            <div class="flex items-center">
                                <div class="font-medium">{{ $history->date->format('Y-m-d') }}</div>
                                <div class="text-xs text-slate-500 ms-auto">{{ $history->date->diffForHumans() }}</div>
                            </div>
                            <div class="text-slate-500 mt-1">
                                <span class="px-2 py-0.5 rounded-full text-xs 
                                    {{ $history->status == 'present' ? 'bg-success/10 text-success' : '' }}
                                    {{ $history->status == 'absent' ? 'bg-danger/10 text-danger' : '' }}
                                    {{ $history->status == 'late' ? 'bg-warning/10 text-warning' : '' }}
                                    {{ $history->status == 'excused' ? 'bg-info/10 text-info' : '' }}">
                                    {{ __('global.' . $history->status) }}
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="mt-8">
                    <x-base.button variant="outline-primary" as="a" href="{{ route('children.show', $attendance->child_id) }}" class="w-full">
                        <x-base.lucide icon="User" class="w-4 h-4 me-2" /> {{ __('global.view_student_profile') }}
                    </x-base.button>
                </div>
            </div>
        </div>
    </div>
@endsection
