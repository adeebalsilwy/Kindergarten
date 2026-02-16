@extends('../themes/kindergarten/side-menu')

@section('head')
    <title>{{ __('global.profile') }} - Kindergarten Management System</title>
@endsection

@section('subcontent')
<div class="intro-y mt-8 flex items-center">
    <h2 class="me-auto text-lg font-medium">{{ __('global.user_profile') }}</h2>
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
                            <a href="{{ route('profile.edit') }}" class="flex items-center">
                                <x-base.lucide class="me-2 h-4 w-4" icon="Edit" />
                                {{ __('global.edit_profile') }}
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
        <!-- BEGIN: Display Information -->
        <div class="intro-y box lg:mt-5">
            <div class="flex items-center border-b border-slate-200/60 p-5 dark:border-darkmode-400">
                <h2 class="me-auto text-base font-medium">
                    {{ __('global.personal_information') }}
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
                
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-12 sm:col-span-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('global.name') }}</label>
                            <div class="form-control">{{ $user->name }}</div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('global.email') }}</label>
                            <div class="form-control">{{ $user->email }}</div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('global.role') }}</label>
                            <div class="form-control">
                                @if($user->roles->count() > 0)
                                    @foreach($user->roles as $role)
                                        <span class="badge badge-primary">{{ $role->name }}</span>
                                    @endforeach
                                @else
                                    {{ __('global.no_role_assigned') }}
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('global.joined_date') }}</label>
                            <div class="form-control">{{ $user->created_at->format('Y-m-d') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Display Information -->
        
        <!-- BEGIN: Security Information -->
        <div class="intro-y box mt-5">
            <div class="flex items-center border-b border-slate-200/60 p-5 dark:border-darkmode-400">
                <h2 class="me-auto text-base font-medium">
                    {{ __('global.security') }}
                </h2>
            </div>
            <div class="p-5">
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('global.last_login') }}</label>
                            <div class="form-control">
                                @if(auth()->user()->last_login_at)
                                    {{ auth()->user()->last_login_at->diffForHumans() }}
                                @else
                                    {{ __('global.never_logged_in') }}
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12">
                        <a href="{{ route('profile.change-password') }}" class="btn btn-primary w-40">
                            {{ __('global.change_password') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Security Information -->
    </div>
</div>
@endsection