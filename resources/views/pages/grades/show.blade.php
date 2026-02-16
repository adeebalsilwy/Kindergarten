@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Grade.show') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium ms-auto">{{ __('global.grade_details') }}</h2>
        <div class="ms-auto flex gap-2">
            <x-base.button variant="secondary" as="a" href="{{ route('grades.index') }}">
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
        <div class="intro-y col-span-12 lg:col-span-6 lg:col-start-4">
            <div class="box p-5 text-center">
                <div class="w-24 h-24 bg-primary/10 flex items-center justify-center text-primary rounded-full text-4xl font-bold mx-auto mb-4">
                    {{ $grade->score }}
                </div>
                <div class="text-xl font-bold">{{ $grade->subject }}</div>
                <div class="text-slate-500 mt-1">
                    {{ optional($grade->child)->name }}
                </div>

                <div class="mt-8 border-t border-slate-200/60 dark:border-darkmode-400 pt-6 grid grid-cols-2 gap-4">
                    <div class="text-start">
                        <div class="text-slate-500 text-xs uppercase">{{ __('global.student') }}</div>
                        <a href="{{ route('children.show', $grade->child_id) }}" class="font-medium text-primary">{{ optional($grade->child)->name }}</a>
                    </div>
                    <div class="text-start">
                        <div class="text-slate-500 text-xs uppercase">{{ __('global.date') }}</div>
                        <div class="font-medium">{{ $grade->date ?? '-' }}</div>
                    </div>
                    <div class="text-start">
                        <div class="text-slate-500 text-xs uppercase">{{ __('global.class') }}</div>
                        <div class="font-medium">{{ optional($grade->child->class)->name ?? '-' }}</div>
                    </div>
                    <div class="text-start">
                        <div class="text-slate-500 text-xs uppercase">{{ __('global.recorded_at') }}</div>
                        <div class="font-medium text-xs">{{ $grade->created_at->format('Y-m-d H:i') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
