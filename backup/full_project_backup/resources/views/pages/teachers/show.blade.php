@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('global.teacher_profile') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('global.teacher_profile') }}</h2>
        <div class="flex gap-2">
            <x-base.button as="a" href="{{ route('teachers.edit', $teachers->id) }}" variant="primary" class="flex items-center">
                <x-base.lucide icon="Pencil" class="w-4 h-4 mr-2" /> {{ __('global.edit') }}
            </x-base.button>
            <x-base.button as="a" href="{{ route('teachers.index') }}" variant="outline-secondary" class="flex items-center">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 mr-2" /> {{ __('global.back') }}
            </x-base.button>
        </div>
    </div>

    <!-- BEGIN: Profile Info -->
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5 text-center lg:text-left">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                    <img alt="{{ $teachers->name }}" class="rounded-full" src="{{ $teachers->photo_path ? asset($teachers->photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode($teachers->name) }}">
                </div>
                <div class="ml-5">
                    <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg ltr:text-left rtl:text-right">{{ $teachers->name }}</div>
                    <div class="text-slate-500 ltr:text-left rtl:text-right">{{ $teachers->qualification ?? 'No Qualification' }}</div>
                    <div class="mt-2 text-xs text-slate-400 ltr:text-left rtl:text-right">{{ __('global.status') }}: <span class="{{ $teachers->is_active ? 'text-success' : 'text-danger' }} font-semibold">{{ $teachers->is_active ? __('global.active') : __('global.inactive') }}</span></div>
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-6 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-3">{{ __('global.contact_details') }}</div>
                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                    <div class="truncate sm:whitespace-normal flex items-center">
                        <x-base.lucide icon="Mail" class="w-4 h-4 mr-2" /> {{ $teachers->email ?? 'N/A' }}
                    </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3">
                        <x-base.lucide icon="Phone" class="w-4 h-4 mr-2" /> {{ $teachers->phone ?? 'N/A' }}
                    </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3 text-slate-500">
                        <x-base.lucide icon="MapPin" class="w-4 h-4 mr-2" /> {{ $teachers->address ?? 'N/A' }}
                    </div>
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 flex items-center justify-center px-5 border-t lg:border-t-0 pt-6 lg:pt-0">
                <div class="text-center rounded-md w-24 py-3">
                    <div class="font-medium text-primary text-xl">{{ $teachers->classes->count() }}</div>
                    <div class="text-slate-500 text-xs">{{ __('global.assigned_classes') }}</div>
                </div>
                <div class="text-center rounded-md w-24 py-3">
                    <div class="font-medium text-xl">{{ $teachers->experience ?? 0 }}</div>
                    <div class="text-slate-500 text-xs">{{ __('global.years_exp') }}</div>
                </div>
                <div class="text-center rounded-md w-24 py-3">
                    <div class="font-medium text-success text-xl">{{ __('global.salary_short', ['amount' => number_format($teachers->salary, 0)]) }}</div>
                    <div class="text-slate-500 text-xs">{{ __('global.monthly_salary') }}</div>
                </div>
            </div>
        </div>
        
        <!-- BEGIN: Tab Navigation -->
        <ul class="nav nav-link-tabs flex-col sm:flex-row justify-center lg:justify-start text-center" role="tablist">
            <li id="info-tab" class="nav-item" role="presentation">
                <button class="nav-link py-4 active w-full sm:w-auto" data-tw-target="#info" data-tw-toggle="tab" role="tab" aria-controls="info" aria-selected="true">
                    {{ __('global.personal_info') }}
                </button>
            </li>
            <li id="classes-tab" class="nav-item" role="presentation">
                <button class="nav-link py-4 w-full sm:w-auto" data-tw-target="#classes" data-tw-toggle="tab" role="tab" aria-controls="classes" aria-selected="false">
                    {{ __('global.assigned_classes_and_students') }}
                </button>
            </li>
            <li id="notes-tab" class="nav-item" role="presentation">
                <button class="nav-link py-4 w-full sm:w-auto" data-tw-target="#notes" data-tw-toggle="tab" role="tab" aria-controls="notes" aria-selected="false">
                    {{ __('global.notes_evaluation') }}
                </button>
            </li>
        </ul>
        <!-- END: Tab Navigation -->
    </div>
    <!-- END: Profile Info -->

    <div class="tab-content mt-5">
        <!-- Info Tab -->
        <div id="info" class="tab-pane active" role="tabpanel" aria-labelledby="info-tab">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y box col-span-12 p-5">
                    <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                        <div class="font-medium text-base mr-auto">{{ __('global.employment_details') }}</div>
                    </div>
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                            <div class="text-slate-500 text-xs">{{ __('global.hire_date') }}</div>
                            <div class="text-base font-medium mt-1">{{ $teachers->hire_date ? $teachers->hire_date->format('Y-m-d') : 'N/A' }}</div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                            <div class="text-slate-500 text-xs">{{ __('global.date_of_birth') }}</div>
                            <div class="text-base font-medium mt-1">{{ $teachers->date_of_birth ? $teachers->date_of_birth->format('Y-m-d') : 'N/A' }}</div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                            <div class="text-slate-500 text-xs">{{ __('global.gender') }}</div>
                            <div class="text-base font-medium mt-1">{{ __('global.'.$teachers->gender) }}</div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                            <div class="text-slate-500 text-xs">{{ __('global.experience') }}</div>
                            <div class="text-base font-medium mt-1">{{ $teachers->experience }} {{ __('global.years') }}</div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                            <div class="text-slate-500 text-xs">{{ __('global.qualification') }}</div>
                            <div class="text-base font-medium mt-1">{{ $teachers->qualification }}</div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                            <div class="text-slate-500 text-xs">{{ __('global.salary') }}</div>
                            <div class="text-base font-medium mt-1 text-success font-bold">{{ __('global.currency_symbol', ['amount' => number_format($teachers->salary, 2)]) }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Classes Tab -->
        <div id="classes" class="tab-pane" role="tabpanel" aria-labelledby="classes-tab">
            <div class="grid grid-cols-12 gap-6">
                @forelse($teachers->classes as $class)
                    <div class="intro-y col-span-12 lg:col-span-6">
                        <div class="box p-5">
                            <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                                <div class="font-medium text-base mr-auto">{{ $class->name }} ({{ $class->room_number }})</div>
                                <div class="text-slate-500">{{ $class->students->count() }}/{{ $class->capacity }} {{ __('global.students') }}</div>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="table table-report table-report--sm">
                                    <thead>
                                        <tr>
                                            <th class="whitespace-nowrap">{{ __('global.student') }}</th>
                                            <th class="text-center whitespace-nowrap">{{ __('global.gender') }}</th>
                                            <th class="text-center whitespace-nowrap">{{ __('global.actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($class->students->take(5) as $student)
                                            <tr class="intro-x">
                                                <td class="whitespace-nowrap font-medium">{{ $student->name }}</td>
                                                <td class="text-center">{{ __('global.'.$student->gender) }}</td>
                                                <td class="table-report__action w-20">
                                                    <div class="flex justify-center items-center">
                                                        <a class="flex items-center mr-3" href="{{ route('children.show', $student->id) }}">
                                                            <x-base.lucide icon="Eye" class="w-4 h-4 mr-1" />
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if($class->students->count() > 5)
                                    <div class="mt-3 text-center">
                                        <a href="{{ route('classes.show', $class->id) }}" class="text-primary text-xs font-semibold uppercase">{{ __('global.view_all_students') }}</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="intro-y col-span-12 box p-20 text-center">
                        <x-base.lucide icon="Inbox" class="w-16 h-16 text-slate-400 mx-auto mb-5" />
                        <div class="text-slate-500">{{ __('global.no_classes_assigned') }}</div>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Notes Tab -->
        <div id="notes" class="tab-pane" role="tabpanel" aria-labelledby="notes-tab">
            <div class="intro-y box p-5">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base mr-auto">{{ __('global.notes_history') }}</div>
                </div>
                <div class="text-slate-600 dark:text-slate-500 whitespace-pre-line">
                    {{ $teachers->notes ?? __('global.no_notes_available') }}
                </div>
            </div>
        </div>
    </div>
@endsection