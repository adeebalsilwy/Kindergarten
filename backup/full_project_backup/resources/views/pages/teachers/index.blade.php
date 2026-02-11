@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('global.teachers') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('global.teachers') }}</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0 gap-2">
            @can('create_teachers')
            <x-base.button variant="primary" as="a" href="{{ route('teachers.create') }}" class="flex items-center shadow-md">
                <x-base.lucide icon="Plus" class="w-4 h-4 mr-2" />
                {{ __('global.add_new') }}
            </x-base.button>
            @endcan
            <x-base.dropdown>
                <x-base.dropdown.toggle as="x-base.button" variant="outline-secondary" class="font-normal">
                    {{ __('global.export') }} <x-base.lucide icon="ChevronDown" class="w-4 h-4 ml-2" />
                </x-base.dropdown.toggle>
                <x-base.dropdown.menu class="w-40">
                    <x-base.dropdown.item as="a" href="{{ route('teachers.index', ['export' => 'xlsx']) }}">
                        <x-base.lucide icon="FileSpreadsheet" class="w-4 h-4 mr-2" /> Excel
                    </x-base.dropdown.item>
                    <x-base.dropdown.item as="a" href="{{ route('teachers.index', ['export' => 'pdf']) }}">
                        <x-base.lucide icon="FileText" class="w-4 h-4 mr-2" /> PDF
                    </x-base.dropdown.item>
                </x-base.dropdown.menu>
            </x-base.dropdown>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Teachers Grid -->
        @forelse($teachers as $teacher)
            <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
                <div class="box">
                    <div class="p-5">
                        <div class="h-40 w-full image-fit overflow-hidden rounded-md before:absolute before:inset-0 before:z-10 before:block before:bg-gradient-to-t before:from-black/60 before:to-transparent">
                            <img alt="{{ $teacher->name }}" src="{{ $teacher->photo_path ? asset($teacher->photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode($teacher->name) . '&background=random&size=400' }}">
                            <div class="absolute bottom-0 z-10 px-5 pb-5 text-white">
                                <a href="{{ route('teachers.show', $teacher->id) }}" class="block text-base font-medium">{{ $teacher->name }}</a>
                                <span class="mt-3 text-xs text-white/90">{{ $teacher->qualification }}</span>
                            </div>
                        </div>
                        <div class="mt-5 text-slate-600 dark:text-slate-500">
                            <div class="flex items-center">
                                <x-base.lucide icon="Mail" class="w-4 h-4 mr-2" /> {{ $teacher->email }}
                            </div>
                            <div class="mt-2 flex items-center">
                                <x-base.lucide icon="Phone" class="w-4 h-4 mr-2" /> {{ $teacher->phone }}
                            </div>
                            <div class="mt-2 flex items-center">
                                <x-base.lucide icon="Calendar" class="w-4 h-4 mr-2" /> {{ __('global.hire_date') }}: {{ $teacher->hire_date->format('Y-m-d') }}
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-center border-t border-slate-200/60 p-5 dark:border-darkmode-400 lg:justify-end">
                        <a href="{{ route('teachers.show', $teacher->id) }}" class="mr-auto flex items-center text-primary">
                            <x-base.lucide icon="Eye" class="w-4 h-4 mr-1" /> {{ __('global.view') }}
                        </a>
                        <a href="{{ route('teachers.edit', $teacher->id) }}" class="flex items-center mr-3">
                            <x-base.lucide icon="CheckSquare" class="w-4 h-4 mr-1" /> {{ __('global.edit') }}
                        </a>
                        @can('delete_teachers')
                        <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" onsubmit="return confirm('{{ __('global.confirm_delete') }}')" class="flex items-center text-danger">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="flex items-center">
                                <x-base.lucide icon="Trash2" class="w-4 h-4 mr-1" /> {{ __('global.delete') }}
                            </button>
                        </form>
                        @endcan
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-12 text-center py-20 box">
                <x-base.lucide icon="Users" class="w-16 h-16 mx-auto mb-5 text-slate-300" />
                <div class="text-xl font-medium">{{ __('global.no_records_found') }}</div>
            </div>
        @endforelse

        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-5">
            {{ $teachers->links() }}
        </div>
    </div>
@endsection
