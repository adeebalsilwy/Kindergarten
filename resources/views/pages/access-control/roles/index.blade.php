@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>Roles Management - Deebo</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">Roles Management</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <x-base.button variant="primary" as="a" href="{{ route('roles.create') }}" class="ms-2 flex items-center">
                <x-base.lucide icon="Plus" class="w-4 h-4 me-2" /> Add New Role
            </x-base.button>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <x-base.table class="table-report -mt-2">
                <x-base.table.thead>
                    <x-base.table.tr>
                        <x-base.table.th class="whitespace-nowrap">ID</x-base.table.th>
                        <x-base.table.th class="whitespace-nowrap">ROLE NAME</x-base.table.th>
                        <x-base.table.th class="text-center whitespace-nowrap">PERMISSIONS</x-base.table.th>
                        <x-base.table.th class="text-center whitespace-nowrap">ACTIONS</x-base.table.th>
                    </x-base.table.tr>
                </x-base.table.thead>
                <x-base.table.tbody>
                    @foreach($roles as $role)
                        <x-base.table.tr class="intro-x">
                            <x-base.table.td class="w-20">{{ $role->id }}</x-base.table.td>
                            <x-base.table.td>
                                <span class="font-medium whitespace-nowrap">{{ $role->name }}</span>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">
                                <div class="flex flex-wrap justify-center gap-1">
                                    @foreach($role->permissions->take(5) as $perm)
                                        <span class="px-2 py-1 rounded-full bg-slate-100 text-slate-600 text-xs dark:bg-darkmode-400">{{ $perm->name }}</span>
                                    @endforeach
                                    @if($role->permissions->count() > 5)
                                        <span class="px-2 py-1 rounded-full bg-primary/10 text-primary text-xs">+{{ $role->permissions->count() - 5 }} More</span>
                                    @endif
                                </div>
                            </x-base.table.td>
                            <x-base.table.td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <x-base.button variant="outline-primary" as="a" href="{{ route('roles.edit', $role->id) }}" size="sm" class="me-2">
                                        <x-base.lucide icon="Pencil" class="w-4 h-4 me-1" /> Edit
                                    </x-base.button>
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <x-base.button variant="outline-danger" type="submit" size="sm">
                                            <x-base.lucide icon="Trash2" class="w-4 h-4 me-1" /> Delete
                                        </x-base.button>
                                    </form>
                                </div>
                            </x-base.table.td>
                        </x-base.table.tr>
                    @endforeach
                </x-base.table.tbody>
            </x-base.table>
        </div>
    </div>
@endsection
