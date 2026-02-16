@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('global.bulk_attendance') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('global.bulk_attendance') }}</h2>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12">
            <!-- Filter Box -->
            <div class="box p-5">
                <form action="{{ route('attendance.bulk') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <x-base.form-label>{{ __('global.select_class') }}</x-base.form-label>
                        <x-base.form-select name="class_id" class="w-full" onchange="this.form.submit()">
                            <option value="">{{ __('global.choose_class') }}</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}" {{ $class_id == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                            @endforeach
                        </x-base.form-select>
                    </div>
                    <div class="flex-1">
                        <x-base.form-label>{{ __('global.date') }}</x-base.form-label>
                        <x-base.form-input type="date" name="date" class="w-full" value="{{ $date }}" onchange="this.form.submit()" />
                    </div>
                </form>
            </div>

            @if($class_id)
                <!-- Attendance Sheet -->
                <div class="box p-5 mt-5">
                    <form action="{{ route('attendance.bulk.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="date" value="{{ $date }}">
                        <div class="overflow-x-auto">
                            <table class="table table-report table-report--sm">
                                <thead>
                                    <tr>
                                        <th class="whitespace-nowrap">{{ __('global.student') }}</th>
                                        <th class="text-center whitespace-nowrap">{{ __('global.status') }}</th>
                                        <th class="whitespace-nowrap">{{ __('global.notes') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($childrens as $child)
                                        <tr class="intro-x">
                                            <td class="whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="w-8 h-8 image-fit me-3">
                                                        <img alt="{{ $child->name }}" class="rounded-full" src="{{ $child->photo_path ? asset($child->photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode($child->name) }}">
                                                    </div>
                                                    <div class="font-medium">{{ $child->name }}</div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="flex justify-center gap-4">
                                                    <div class="flex items-center">
                                                        <input type="radio" name="attendance[{{ $child->id }}][status]" value="present" id="present-{{ $child->id }}" class="form-check-input" checked>
                                                        <label class="form-check-label ms-1 text-success" for="present-{{ $child->id }}">{{ __('global.present') }}</label>
                                                    </div>
                                                    <div class="flex items-center ms-2">
                                                        <input type="radio" name="attendance[{{ $child->id }}][status]" value="absent" id="absent-{{ $child->id }}" class="form-check-input">
                                                        <label class="form-check-label ms-1 text-danger" for="absent-{{ $child->id }}">{{ __('global.absent') }}</label>
                                                    </div>
                                                    <div class="flex items-center ms-2">
                                                        <input type="radio" name="attendance[{{ $child->id }}][status]" value="late" id="late-{{ $child->id }}" class="form-check-input">
                                                        <label class="form-check-label ms-1 text-warning" for="late-{{ $child->id }}">{{ __('global.late') }}</label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <x-base.form-input type="text" name="attendance[{{ $child->id }}][notes]" class="w-full" placeholder="{{ __('global.notes') }}" />
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="flex justify-end mt-5">
                            <x-base.button type="submit" variant="primary" class="w-40">
                                <x-base.lucide icon="Save" class="w-4 h-4 me-2" /> {{ __('global.save_attendance') }}
                            </x-base.button>
                        </div>
                    </form>
                </div>
            @else
                <div class="box p-20 mt-5 text-center text-slate-500">
                    <x-base.lucide icon="Search" class="w-16 h-16 mx-auto mb-5" />
                    {{ __('global.please_select_class_to_start') }}
                </div>
            @endif
        </div>
    </div>
@endsection
