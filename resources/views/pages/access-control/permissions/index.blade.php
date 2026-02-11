@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>Permissions - Deebo</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Permissions Management</h2>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-4">
            <div class="intro-y box p-5">
                <h3 class="text-base font-medium mb-4">Add New Permission</h3>
                <form action="{{ route('permissions.store') }}" method="POST">
                    @csrf
                    <div>
                        <x-base.form-label for="name">Permission Name</x-base.form-label>
                        <x-base.form-input id="name" name="name" type="text" placeholder="e.g. view_reports" required />
                    </div>
                    <x-base.button variant="primary" type="submit" class="mt-4 w-full">Create Permission</x-base.button>
                </form>
            </div>
        </div>

        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="intro-y box p-5">
                <x-base.table class="table-report">
                    <x-base.table.thead>
                        <x-base.table.tr>
                            <x-base.table.th class="whitespace-nowrap">ID</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap">NAME</x-base.table.th>
                            <x-base.table.th class="text-center whitespace-nowrap">ACTIONS</x-base.table.th>
                        </x-base.table.tr>
                    </x-base.table.thead>
                    <x-base.table.tbody>
                        @foreach($permissions as $perm)
                            <x-base.table.tr>
                                <x-base.table.td>{{ $perm->id }}</x-base.table.td>
                                <x-base.table.td>
                                    <span class="font-medium whitespace-nowrap">{{ $perm->name }}</span>
                                </x-base.table.td>
                                <x-base.table.td class="table-report__action">
                                    <div class="flex justify-center items-center">
                                        <form action="{{ route('permissions.destroy', $perm->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <x-base.button variant="outline-danger" type="submit" size="sm">
                                                <x-base.lucide icon="Trash2" class="w-4 h-4 mr-1" /> Delete
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
    </div>
@endsection
