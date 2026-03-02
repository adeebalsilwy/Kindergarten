@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('global.bulk_attendance') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">
            {{ __('global.bulk_attendance') }}
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <x-base.button variant="outline-secondary" as="a" href="{{ route('attendances.index') }}" class="flex items-center">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" /> {{ __('global.back') }}
            </x-base.button>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12">
            <!-- Filter Box -->
            <div class="box p-5">
                <form action="{{ route('attendances.bulk') }}" method="GET">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 md:col-span-5">
                            <x-base.form-label class="font-bold">{{ __('global.select_class') }}</x-base.form-label>
                            <x-base.tom-select name="class_id" class="w-full" onchange="this.form.submit()">
                                <option value="">{{ __('global.choose_class') }}</option>
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}" {{ $class_id == $class->id ? 'selected' : '' }}>
                                        {{ $class->name }}
                                    </option>
                                @endforeach
                            </x-base.tom-select>
                        </div>
                        <div class="col-span-12 md:col-span-5">
                            <x-base.form-label class="font-bold">{{ __('global.date') }}</x-base.form-label>
                            <x-base.form-input type="date" name="date" class="w-full" value="{{ $date }}" onchange="this.form.submit()" />
                        </div>
                        <div class="col-span-12 md:col-span-2 flex items-end">
                            <x-base.button type="submit" variant="primary" class="w-full">
                                <x-base.lucide icon="Filter" class="w-4 h-4 me-2" /> {{ __('global.filter') }}
                            </x-base.button>
                        </div>
                    </div>
                </form>
            </div>

            @if($class_id && count($childrens) > 0)
                <!-- Attendance Sheet -->
                <div class="box p-5 mt-5">
                    <form action="{{ route('attendances.bulk.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="date" value="{{ $date }}">
                        <div class="overflow-x-auto lg:overflow-visible">
                            <x-base.table class="table-report -mt-2">
                                <x-base.table.thead>
                                    <x-base.table.tr>
                                        <x-base.table.th class="whitespace-nowrap">{{ __('global.student') }}</x-base.table.th>
                                        <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.status') }}</x-base.table.th>
                                        <x-base.table.th class="whitespace-nowrap">{{ __('global.notes') }}</x-base.table.th>
                                    </x-base.table.tr>
                                </x-base.table.thead>
                                <x-base.table.tbody>
                                    @foreach($childrens as $child)
                                        <x-base.table.tr class="intro-x">
                                            <x-base.table.td class="whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="w-10 h-10 image-fit me-3">
                                                        <img alt="{{ $child->name }}" class="rounded-full shadow-md" src="{{ $child->photo_path ? asset($child->photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode($child->name) . '&background=random' }}">
                                                    </div>
                                                    <div>
                                                        <div class="font-medium whitespace-nowrap">{{ $child->name }}</div>
                                                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $child->class->name ?? '' }}</div>
                                                    </div>
                                                </div>
                                            </x-base.table.td>
                                            <x-base.table.td class="text-center">
                                                <div class="flex justify-center items-center gap-6">
                                                    <x-base.form-check class="flex items-center">
                                                        <x-base.form-check.input type="radio" name="attendance[{{ $child->id }}][status]" value="present" id="present-{{ $child->id }}" checked />
                                                        <x-base.form-check.label class="text-success font-medium" for="present-{{ $child->id }}">{{ __('global.present') }}</x-base.form-check.label>
                                                    </x-base.form-check>
                                                    <x-base.form-check class="flex items-center">
                                                        <x-base.form-check.input type="radio" name="attendance[{{ $child->id }}][status]" value="absent" id="absent-{{ $child->id }}" />
                                                        <x-base.form-check.label class="text-danger font-medium" for="absent-{{ $child->id }}">{{ __('global.absent') }}</x-base.form-check.label>
                                                    </x-base.form-check>
                                                    <x-base.form-check class="flex items-center">
                                                        <x-base.form-check.input type="radio" name="attendance[{{ $child->id }}][status]" value="late" id="late-{{ $child->id }}" />
                                                        <x-base.form-check.label class="text-warning font-medium" for="late-{{ $child->id }}">{{ __('global.late') }}</x-base.form-check.label>
                                                    </x-base.form-check>
                                                    <x-base.form-check class="flex items-center">
                                                        <x-base.form-check.input type="radio" name="attendance[{{ $child->id }}][status]" value="excused" id="excused-{{ $child->id }}" />
                                                        <x-base.form-check.label class="text-info font-medium" for="excused-{{ $child->id }}">{{ __('global.excused') }}</x-base.form-check.label>
                                                    </x-base.form-check>
                                                </div>
                                            </x-base.table.td>
                                            <x-base.table.td>
                                                <x-base.form-input type="text" name="attendance[{{ $child->id }}][notes]" class="w-full" placeholder="{{ __('global.notes') }}..." />
                                            </x-base.table.td>
                                        </x-base.table.tr>
                                    @endforeach
                                </x-base.table.tbody>
                            </x-base.table>
                        </div>
                        <div class="flex justify-end gap-3 mt-8">
                            <x-base.button variant="outline-secondary" as="a" href="{{ route('attendances.index') }}" class="w-32">
                                {{ __('global.cancel') }}
                            </x-base.button>
                            <x-base.button type="submit" variant="primary" class="w-48 shadow-md">
                                <x-base.lucide icon="Save" class="w-4 h-4 me-2" /> {{ __('global.save_attendance') }}
                            </x-base.button>
                        </div>
                    </form>
                </div>
            @elseif($class_id)
                <div class="box p-20 mt-5 text-center text-slate-500 shadow-sm">
                    <x-base.lucide icon="Users" class="w-16 h-16 mx-auto mb-5 opacity-20" />
                    <div class="text-xl font-medium">{{ __('global.no_students_found') }}</div>
                    <div class="mt-2">{{ __('global.please_add_students_to_this_class') }}</div>
                </div>
            @else
                <div class="box p-20 mt-5 text-center text-slate-500 shadow-sm">
                    <x-base.lucide icon="Search" class="w-16 h-16 mx-auto mb-5 opacity-20" />
                    <div class="text-xl font-medium">{{ __('global.please_select_class_to_start') }}</div>
                    <div class="mt-2 text-slate-400">{{ __('global.select_class_and_date_to_record_attendance') }}</div>
                </div>
            @endif
        </div>
    </div>
@endsection
