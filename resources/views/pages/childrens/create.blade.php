@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>Create Children - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">Create New Children</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="intro-y box p-5">
                <form action="{{ route('childrens.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <label class="form-label">{{ __('childrens.fields.name') }}</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $children->name ?? '') }}" required>
                        </div>

                    </div>
                    <div class="text-end mt-5">
                        <a href="{{ route('childrens.index') }}" class="btn btn-outline-secondary w-24 me-1">Cancel</a>
                        <button type="submit" class="btn btn-primary w-24">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
