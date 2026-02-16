@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>Edit Role - Deebo</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">Edit Role: {{ $role->name }}</h2>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="intro-y box p-5">
                <form action="{{ route('roles.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-base.form-label for="name">Role Name</x-base.form-label>
                        <x-base.form-input id="name" name="name" type="text" value="{{ $role->name }}" required />
                    </div>

                    <div class="mt-5">
                        <x-base.form-label>Assign Permissions</x-base.form-label>
                        <div class="grid grid-cols-12 gap-4 mt-2">
                            @foreach($permissions as $permission)
                                <div class="col-span-12 sm:col-span-4 flex items-center">
                                    <x-base.form-check.input 
                                        id="perm-{{ $permission->id }}" 
                                        type="checkbox" 
                                        name="permissions[]" 
                                        value="{{ $permission->id }}"
                                        {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}
                                    />
                                    <x-base.form-label class="ms-2 mb-0" for="perm-{{ $permission->id }}">{{ $permission->name }}</x-base.form-label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end">
                        <x-base.button variant="outline-secondary" as="a" href="{{ route('roles.index') }}" class="w-24 me-2">Cancel</x-base.button>
                        <x-base.button variant="primary" type="submit" class="w-24">Update</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
