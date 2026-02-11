@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('global.classes') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('global.classes') }}</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0 gap-2">
            @can('create_classes')
            <x-base.button variant="primary" as="a" href="{{ route('classes.create') }}" class="flex items-center shadow-md">
                <x-base.lucide icon="Plus" class="w-4 h-4 mr-2" />
                {{ __('global.add_new') }}
            </x-base.button>
            @endcan
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        @forelse($classes as $class)
            <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
                <div class="box p-5 relative overflow-hidden">
                    <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                        <div class="mr-auto">
                            <div class="text-slate-500 text-xs">{{ $class->code ?? 'CLASS' }}</div>
                            <a href="{{ route('classes.show', $class->id) }}" class="text-lg font-medium block mt-1">{{ $class->name }}</a>
                        </div>
                        <div class="flex items-center justify-center w-12 h-12 rounded-full bg-primary/10 text-primary">
                            <x-base.lucide icon="BookOpen" class="w-6 h-6" />
                        </div>
                    </div>
                    
                    <div class="text-slate-600 dark:text-slate-500">
                        <div class="flex items-center">
                            <x-base.lucide icon="User" class="w-4 h-4 mr-2" /> {{ __('global.teacher') }}: <span class="ml-1 text-slate-900 dark:text-slate-300">{{ $class->teacher->name ?? 'N/A' }}</span>
                        </div>
                        <div class="mt-2 flex items-center">
                            <x-base.lucide icon="Users" class="w-4 h-4 mr-2" /> {{ __('global.students') }}: <span class="ml-1 text-slate-900 dark:text-slate-300">{{ $class->students->count() }} / {{ $class->capacity }}</span>
                        </div>
                        <div class="mt-2 flex items-center">
                            <x-base.lucide icon="Clock" class="w-4 h-4 mr-2" /> {{ $class->start_time }} - {{ $class->end_time }}
                        </div>
                    </div>

                    <div class="mt-5 pt-5 border-t border-slate-200/60 dark:border-darkmode-400">
                        <div class="flex items-center">
                            <div class="font-medium text-base mr-auto">{{ __('global.currency_symbol', ['amount' => number_format($class->monthly_fee)]) }} <span class="text-xs text-slate-500">/ mo</span></div>
                            <div class="flex">
                                <a href="{{ route('classes.show', $class->id) }}" class="w-8 h-8 rounded-full flex items-center justify-center border border-slate-200 text-slate-500 mr-2 hover:bg-slate-100">
                                    <x-base.lucide icon="Eye" class="w-4 h-4" />
                                </a>
                                <a href="{{ route('classes.edit', $class->id) }}" class="w-8 h-8 rounded-full flex items-center justify-center border border-slate-200 text-slate-500 mr-2 hover:bg-slate-100">
                                    <x-base.lucide icon="CheckSquare" class="w-4 h-4" />
                                </a>
                                @can('delete_classes')
                                <form action="{{ route('classes.destroy', $class->id) }}" method="POST" onsubmit="return confirm('{{ __('global.confirm_delete') }}')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-8 h-8 rounded-full flex items-center justify-center border border-slate-200 text-danger hover:bg-danger/10">
                                        <x-base.lucide icon="Trash2" class="w-4 h-4" />
                                    </button>
                                </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
             <div class="col-span-12 text-center py-20 box">
                <x-base.lucide icon="Layers" class="w-16 h-16 mx-auto mb-5 text-slate-300" />
                <div class="text-xl font-medium">{{ __('global.no_records_found') }}</div>
            </div>
        @endforelse

        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-5">
            {{ $classes->links() }}
        </div>
    </div>
@endsection
