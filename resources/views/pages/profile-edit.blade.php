@extends('../themes/kindergarten/side-menu')

@section('head')
    <title>{{ __('global.edit_profile') }} - Kindergarten Management System</title>
@endsection

@section('subcontent')
<div class="intro-y mt-8 flex items-center">
    <h2 class="me-auto text-lg font-medium">{{ __('global.edit_profile') }}</h2>
</div>
<div class="grid grid-cols-12 gap-6">
    <!-- BEGIN: Profile Menu -->
    <div class="col-span-12 flex flex-col-reverse lg:col-span-4 lg:block 2xl:col-span-3">
        <div class="intro-y box mt-5">
            <div class="relative flex items-center p-5">
                <div class="image-fit h-12 w-12">
                    <img
                        class="rounded-full"
                        src="{{ Vite::asset('resources/images/profile-placeholder.jpg') }}"
                        alt="User Profile"
                        onerror="this.src='{{ Vite::asset('resources/images/avatar-default.png') }}';"
                    />
                </div>
                <div class="ms-4 me-auto">
                    <div class="text-base font-medium">
                        {{ $user->name }}
                    </div>
                    <div class="text-slate-500">
                        @if($user->roles->count() > 0)
                            {{ $user->roles->first()->name }}
                        @else
                            {{ __('global.no_role_assigned') }}
                        @endif
                    </div>
                </div>
                <x-base.menu>
                    <x-base.menu.button
                        class="block h-5 w-5"
                        href="#"
                        tag="a"
                    >
                        <x-base.lucide
                            class="h-5 w-5 text-slate-500"
                            icon="MoreHorizontal"
                        />
                    </x-base.menu.button>
                    <x-base.menu.items class="w-56">
                        <x-base.menu.header> {{ __('global.options') }} </x-base.menu.header>
                        <x-base.menu.divider />
                        <x-base.menu.item>
                            <a href="{{ route('profile.index') }}" class="flex items-center">
                                <x-base.lucide class="me-2 h-4 w-4" icon="User" />
                                {{ __('global.view_profile') }}
                            </a>
                        </x-base.menu.item>
                        <x-base.menu.item>
                            <a href="{{ route('profile.change-password') }}" class="flex items-center">
                                <x-base.lucide class="me-2 h-4 w-4" icon="Lock" />
                                {{ __('global.change_password') }}
                            </a>
                        </x-base.menu.item>
                        <x-base.menu.divider />
                        <x-base.menu.footer>
                            <x-base.button
                                class="px-2 py-1"
                                type="button"
                                variant="primary"
                            >
                                {{ __('global.settings') }}
                            </x-base.button>
                        </x-base.menu.footer>
                    </x-base.menu.items>
                </x-base.menu>
            </div>
            <div class="border-t border-slate-200/60 p-5 dark:border-darkmode-400">
                <a
                    class="flex items-center {{ request()->routeIs('profile.index') ? 'font-medium text-primary' : '' }}"
                    href="{{ route('profile.index') }}"
                >
                    <x-base.lucide
                        class="me-2 h-4 w-4"
                        icon="Activity"
                    /> {{ __('global.personal_information') }}
                </a>
                <a
                    class="mt-5 flex items-center {{ request()->routeIs('profile.edit') ? 'font-medium text-primary' : '' }}"
                    href="{{ route('profile.edit') }}"
                >
                    <x-base.lucide
                        class="me-2 h-4 w-4"
                        icon="Edit"
                    /> {{ __('global.edit_profile') }}
                </a>
                <a
                    class="mt-5 flex items-center {{ request()->routeIs('profile.change-password') ? 'font-medium text-primary' : '' }}"
                    href="{{ route('profile.change-password') }}"
                >
                    <x-base.lucide
                        class="me-2 h-4 w-4"
                        icon="Lock"
                    /> {{ __('global.change_password') }}
                </a>
            </div>
        </div>
    </div>
    <!-- END: Profile Menu -->
    <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
        <!-- BEGIN: Edit Profile Form -->
        <div class="intro-y box lg:mt-5">
            <div class="flex items-center border-b border-slate-200/60 p-5 dark:border-darkmode-400">
                <h2 class="me-auto text-base font-medium">
                    {{ __('global.update_personal_information') }}
                </h2>
            </div>
            <div class="p-5">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible show mb-4 flex items-center" role="alert">
                        <x-base.lucide icon="CheckCircle" class="w-4 h-4 me-2" />
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close">
                            <x-base.lucide icon="X" class="w-4 h-4" />
                        </button>
                    </div>
                @endif
                
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('global.name') }} *</label>
                                <input
                                    id="name"
                                    name="name"
                                    type="text"
                                    class="form-control @error('name') border-danger @enderror"
                                    placeholder="{{ __('global.enter_your_name') }}"
                                    value="{{ old('name', $user->name) }}"
                                    required
                                />
                                @error('name')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('global.email') }} *</label>
                                <input
                                    id="email"
                                    name="email"
                                    type="email"
                                    class="form-control @error('email') border-danger @enderror"
                                    placeholder="{{ __('global.enter_your_email') }}"
                                    value="{{ old('email', $user->email) }}"
                                    required
                                />
                                @error('email')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-span-12">
                            <div class="flex justify-end mt-4">
                                <x-base.button
                                    type="submit"
                                    variant="primary"
                                    class="w-24 ms-2"
                                >
                                    {{ __('global.save') }}
                                </x-base.button>
                                <a href="{{ route('profile.index') }}" class="btn btn-outline-secondary w-24 ms-2">
                                    {{ __('global.cancel') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END: Edit Profile Form -->
    </div>
</div>
@endsection