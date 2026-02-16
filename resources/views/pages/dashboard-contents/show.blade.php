@extends('../themes/kindergarten')

@section('head')
    <title>{{ __('DashboardContent.show') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('DashboardContent.show') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <div class="grid grid-cols-12 gap-4">
                    <!-- Generate dynamic fields here -->
                    @foreach($dashboardContent->toArray() as $key => $value)
                        @if(!in_array($key, ['id', 'created_at', 'updated_at', 'deleted_at']))
                            <div class="col-span-12 sm:col-span-6">
                                <x-base.form-label>{{ __('DashboardContent.fields.'.$key) }}</x-base.form-label>
                                <div class="mt-2">
                                    @if(is_bool($value))
                                        <span class="{{ $value ? 'text-success' : 'text-danger' }}">
                                            <x-base.lucide icon="{{ $value ? 'CheckSquare' : 'XSquare' }}" class="w-4 h-4 me-1" />
                                            {{ $value ? __('global.yes') : __('global.no') }}
                                        </span>
                                    @elseif(in_array($key, ['photo_path', 'image_path', 'avatar', 'profile_image']) && $value)
                                        <img src="{{ asset('storage/'.$value) }}" alt="Image" class="w-16 h-16 object-cover rounded" />
                                    @elseif(in_array($key, ['created_at', 'updated_at']) && $value)
                                        {{ \Carbon\Carbon::parse($value)->format('Y-m-d H:i:s') }}
                                    @else
                                        {{ $value }}
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="flex justify-end mt-5">
                    <a href="{{ route('dashboard-contents.index') }}" class="btn btn-outline-secondary w-24 me-1">{{ __('global.back') }}</a>
                    <a href="{{ route('dashboard-contents.edit', $dashboardContent->id) }}" class="btn btn-primary w-24">{{ __('global.edit') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection