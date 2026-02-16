@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Grade.show') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('global.grade_details') }}</h2>
        <div class="ms-auto flex gap-2">
            <x-base.button variant="outline-secondary" as="a" href="{{ route('grades.index') }}">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
                {{ __('global.back') }}
            </x-base.button>
            @can('edit_grades')
            <x-base.button variant="primary" as="a" href="{{ route('grades.edit', $grade->id) }}">
                <x-base.lucide icon="Pencil" class="w-4 h-4 me-2" />
                {{ __('global.edit') }}
            </x-base.button>
            @endcan
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Profile Header like Section -->
        <div class="intro-y col-span-12">
            <div class="box px-5 pt-5 pb-5">
                <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
                    <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                        <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                            <img alt="{{ $grade->child->name ?? 'Student' }}" class="rounded-full"
                                 src="{{ $grade->child->photo_path ? asset('storage/' . $grade->child->photo_path) : asset('dist/images/profile-12.jpg') }}">
                        </div>
                        <div class="ms-5">
                            <div class="truncate sm:whitespace-normal font-medium text-lg">{{ $grade->child->name ?? 'N/A' }}</div>
                            <div class="text-slate-500">{{ $grade->child->class->name ?? 'No Class' }}</div>
                            <div class="mt-2">
                                <span class="px-3 py-1 rounded-full text-sm font-bold bg-primary/10 text-primary border border-primary/20">
                                    {{ __('global.grade') }}: {{ $grade->score }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 lg:mt-0 flex-1 px-5 border-s border-e border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-6 lg:pt-0">
                        <div class="font-medium text-center lg:text-start mb-3">{{ __('global.academic_info') }}</div>
                        <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                            <div class="truncate sm:whitespace-normal flex items-center">
                                <x-base.lucide icon="Book" class="w-4 h-4 me-2" />
                                <span class="font-medium">{{ __('global.subject') }}:</span>
                                <span class="ms-2 text-slate-500">{{ $grade->subject }}</span>
                            </div>
                            <div class="truncate sm:whitespace-normal flex items-center mt-3">
                                <x-base.lucide icon="Calendar" class="w-4 h-4 me-2" />
                                <span class="font-medium">{{ __('global.date') }}:</span>
                                <span class="ms-2 text-slate-500">{{ $grade->date ? $grade->date->format('Y-m-d') : '-' }}</span>
                            </div>
                            <div class="truncate sm:whitespace-normal flex items-center mt-3">
                                <x-base.lucide icon="User" class="w-4 h-4 me-2" />
                                <span class="font-medium">{{ __('global.evaluator') }}:</span>
                                <span class="ms-2 text-slate-500">{{ $grade->evaluator->name ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Details Section -->
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="box p-5 h-full">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base me-auto">{{ __('global.comments_and_feedback') }}</div>
                    <x-base.lucide icon="MessageSquare" class="w-4 h-4 text-slate-500" />
                </div>
                <div class="mt-4">
                    <div class="text-slate-500 mb-2">{{ __('global.teacher_comments') }}</div>
                    <div class="p-4 bg-slate-50 dark:bg-darkmode-600 rounded-lg italic text-slate-600 dark:text-slate-400 border-s-4 border-primary">
                        "{{ $grade->comments ?? __('global.no_comments_provided') }}"
                    </div>
                </div>
            </div>
        </div>

        <div class="intro-y col-span-12 lg:col-span-4">
            <div class="box p-5 h-full">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base me-auto">{{ __('global.grade_summary') }}</div>
                    <x-base.lucide icon="PieChart" class="w-4 h-4 text-slate-500" />
                </div>
                <div class="flex flex-col items-center">
                    <div class="text-5xl font-bold text-primary">{{ $grade->score }}</div>
                    <div class="mt-2 text-slate-500">{{ __('global.final_score') }}</div>

                    @php
                        $percentage = $grade->percentage;
                        $color = 'success';
                        if ($percentage < 50) $color = 'danger';
                        elseif ($percentage < 75) $color = 'warning';
                    @endphp

                    <div class="w-full mt-6">
                        <div class="flex mb-2 items-center justify-between">
                            <div class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-{{ $color }} bg-{{ $color }}/20">
                                {{ __('global.attainment') }}
                            </div>
                            <div class="text-end">
                                <span class="text-xs font-semibold inline-block text-{{ $color }}">
                                    {{ $percentage }}%
                                </span>
                            </div>
                        </div>
                        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-{{ $color }}/10">
                            <div style="width:{{ $percentage }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-{{ $color }}"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
