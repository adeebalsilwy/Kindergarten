@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('global.class_details') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('global.class_details') }}</h2>
        <div class="flex gap-2">
            <x-base.button as="a" href="{{ route('classes.edit', $classes->id) }}" variant="primary" class="flex items-center">
                <x-base.lucide icon="Pencil" class="w-4 h-4 mr-2" /> {{ __('global.edit') }}
            </x-base.button>
            <x-base.button as="a" href="{{ route('classes.index') }}" variant="outline-secondary" class="flex items-center">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 mr-2" /> {{ __('global.back') }}
            </x-base.button>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Class Meta Info -->
        <div class="intro-y col-span-12 lg:col-span-4">
            <div class="box p-5">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base mr-auto">{{ __('global.overview') }}</div>
                    <div class="text-primary font-bold">{{ $classes->code }}</div>
                </div>
                <div class="flex flex-col gap-4">
                    <div class="flex items-center">
                        <x-base.lucide icon="Home" class="w-4 h-4 mr-2 text-slate-500" />
                        <span class="text-slate-500 mr-2">{{ __('global.room') }}:</span>
                        <span class="font-medium">{{ $classes->room_number }}</span>
                    </div>
                    <div class="flex items-center mt-3">
                        <x-base.lucide icon="Users" class="w-4 h-4 mr-2 text-slate-500" />
                        <span class="text-slate-500 mr-2">{{ __('global.capacity') }}:</span>
                        <span class="font-medium">{{ $classes->students->count() }} / {{ $classes->capacity }}</span>
                    </div>
                    <div class="flex items-center mt-3">
                        <x-base.lucide icon="Clock" class="w-4 h-4 mr-2 text-slate-500" />
                        <span class="text-slate-500 mr-2">{{ __('global.schedule') }}:</span>
                        <span class="font-medium">{{ $classes->start_time }} - {{ $classes->end_time }}</span>
                    </div>
                    <div class="flex items-center mt-3">
                        <x-base.lucide icon="DollarSign" class="w-4 h-4 mr-2 text-slate-500" />
                        <span class="text-slate-500 mr-2">{{ __('global.monthly_fee') }}:</span>
                        <span class="font-medium text-success">{{ __('global.currency_symbol', ['amount' => number_format($classes->monthly_fee, 2)]) }}</span>
                    </div>
                </div>
                
                <div class="mt-5 pt-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <div class="font-medium mb-3">{{ __('global.assigned_teacher') }}</div>
                    @if($classes->teacher)
                        <div class="flex items-center">
                            <div class="w-10 h-10 image-fit">
                                <img alt="{{ $classes->teacher->name }}" class="rounded-full" src="{{ $classes->teacher->photo_path ? asset($classes->teacher->photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode($classes->teacher->name) }}">
                            </div>
                            <div class="ml-3">
                                <a href="{{ route('teachers.show', $classes->teacher->id) }}" class="font-medium text-primary">{{ $classes->teacher->name }}</a>
                                <div class="text-slate-500 text-xs">{{ $classes->teacher->phone }}</div>
                            </div>
                        </div>
                    @else
                        <div class="text-danger flex items-center">
                            <x-base.lucide icon="AlertCircle" class="w-4 h-4 mr-2" /> {{ __('global.no_teacher_assigned') }}
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="box p-5 mt-5">
                <div class="font-medium mb-3">{{ __('global.description') }}</div>
                <div class="text-slate-600 dark:text-slate-500">
                    {{ $classes->description ?? __('global.no_description_available') }}
                </div>
            </div>
        </div>

        <!-- Student List -->
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="box p-5">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base mr-auto">{{ __('global.students_in_class') }}</div>
                    <x-base.button as="a" href="{{ route('children.create', ['class_id' => $classes->id]) }}" variant="outline-primary" size="sm">
                        <x-base.lucide icon="Plus" class="w-4 h-4 mr-2" /> {{ __('global.add_student') }}
                    </x-base.button>
                </div>
                <div class="overflow-x-auto">
                    <table class="table table-report">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">{{ __('global.student') }}</th>
                                <th class="whitespace-nowrap">{{ __('global.parent') }}</th>
                                <th class="text-center whitespace-nowrap">{{ __('global.gender') }}</th>
                                <th class="text-center whitespace-nowrap">{{ __('global.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($classes->students as $student)
                                <tr class="intro-x">
                                    <td class="whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 image-fit mr-3">
                                                <img alt="{{ $student->name }}" class="rounded-full border border-slate-200" src="{{ $student->photo_path ? asset($student->photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode($student->name) }}">
                                            </div>
                                            <a href="{{ route('children.show', $student->id) }}" class="font-medium">{{ $student->name }}</a>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap">
                                        {{ $student->parent->name ?? '-' }}
                                        <div class="text-slate-500 text-xs">{{ $student->parent->phone ?? '' }}</div>
                                    </td>
                                    <td class="text-center whitespace-nowrap">{{ __('global.'.$student->gender) }}</td>
                                    <td class="table-report__action w-20">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3 text-primary" href="{{ route('children.show', $student->id) }}">
                                                <x-base.lucide icon="Eye" class="w-4 h-4 mr-1" />
                                            </a>
                                            <a class="flex items-center mr-3" href="{{ route('children.edit', $student->id) }}">
                                                <x-base.lucide icon="CheckSquare" class="w-4 h-4 mr-1" />
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-10 text-slate-500">
                                        <x-base.lucide icon="Inbox" class="w-12 h-12 mx-auto mb-3" />
                                        {{ __('global.no_students_enrolled') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection