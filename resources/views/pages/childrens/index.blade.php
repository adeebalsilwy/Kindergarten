@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>Children List - Laravel</title>
@endsection

@section('subcontent')
    <h2 class="intro-y mt-8 text-lg font-medium me-auto">Children Management</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('childrens.create') }}" class="btn btn-primary shadow-md me-2">Add New Children</a>
        </div>
        <!-- Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">{{ __('childrens.fields.name') }}</th>

                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($childrens as $children)
                        <tr class="intro-x">
                            <td>{{ $children->name }}</td>

                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center me-3" href="{{ route('childrens.edit', $children->id) }}"> <i data-lucide="check-square" class="w-4 h-4 me-1"></i> Edit </a>
                                    <form action="{{ route('childrens.destroy', $children->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="flex items-center text-danger"> <i data-lucide="trash-2" class="w-4 h-4 me-1"></i> Delete </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            {{ $childrens->links() }}
        </div>
    </div>
@endsection
