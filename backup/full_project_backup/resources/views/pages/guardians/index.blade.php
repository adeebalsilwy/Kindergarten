@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('global.parents') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('global.parents') }}</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0 gap-2">
            @can('create_guardians')
            <x-base.button variant="primary" as="a" href="{{ route('guardians.create') }}" class="flex items-center shadow-md">
                <x-base.lucide icon="Plus" class="w-4 h-4 mr-2" />
                {{ __('global.add_new') }}
            </x-base.button>
            @endcan
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Search -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <x-base.form-input type="text" class="w-56 pr-10 !box" placeholder="{{ __('global.search') }}..." />
                    <x-base.lucide class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" icon="Search" />
                </div>
            </div>
        </div>

        <!-- Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">{{ __('global.name') }}</th>
                        <th class="whitespace-nowrap">{{ __('global.phone') }}</th>
                        <th class="whitespace-nowrap text-center">{{ __('global.relation') }}</th>
                        <th class="whitespace-nowrap">{{ __('global.address') }}</th>
                        <th class="text-center whitespace-nowrap">{{ __('global.linked_children') }}</th>
                        <th class="text-center whitespace-nowrap">{{ __('global.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($parents as $parent)
                        <tr class="intro-x">
                            <td>
                                <a href="{{ route('guardians.show', $parent->id) }}" class="font-medium whitespace-nowrap">{{ $parent->name }}</a>
                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $parent->email }}</div>
                            </td>
                            <td>{{ $parent->phone }}</td>
                            <td class="text-center">{{ $parent->relation }}</td>
                            <td>
                                <div class="text-slate-500 text-xs">{{ \Illuminate\Support\Str::limit($parent->address, 40) }}</div>
                            </td>
                            <td class="text-center text-primary font-bold">
                                {{ $parent->children->count() }}
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3 text-primary" href="{{ route('guardians.show', $parent->id) }}">
                                        <x-base.lucide icon="Eye" class="w-4 h-4 mr-1" /> {{ __('global.view') }}
                                    </a>
                                    <a class="flex items-center mr-3" href="{{ route('guardians.edit', $parent->id) }}">
                                        <x-base.lucide icon="CheckSquare" class="w-4 h-4 mr-1" /> {{ __('global.edit') }}
                                    </a>
                                    @can('delete_guardians')
                                    <form action="{{ route('guardians.destroy', $parent->id) }}" method="POST" onsubmit="return confirm('{{ __('global.confirm_delete') }}')" class="flex items-center text-danger">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex items-center">
                                            <x-base.lucide icon="Trash2" class="w-4 h-4 mr-1" /> {{ __('global.delete') }}
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-10 text-slate-500">
                                {{ __('global.no_records_found') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-5">
            {{ $parents->links() }}
        </div>
    </div>
@endsection
