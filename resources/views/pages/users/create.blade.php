@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('User.add_new') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('User.add_new') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('users.fields.name') }}</x-base.form-label>
                            <x-base.form-input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" class="mt-2" />
                            @error('name')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('users.fields.email') }}</x-base.form-label>
                            <div class="relative mt-2">
                                <x-base.form-input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" />
                                <div class="absolute inset-y-0 right-0 pe-3 flex items-center pointer-events-none">
                                    <x-base.lucide icon="Mail" class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>
                            @error('email')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('users.fields.email_verified_at') }}</x-base.form-label>
                            <x-base.form-input type="datetime-local" name="email_verified_at" value="{{ old('email_verified_at', $user->email_verified_at ?? '') }}" class="mt-2" />
                            @error('email_verified_at')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('users.fields.password') }}</x-base.form-label>
                            <x-base.form-input type="text" name="password" value="{{ old('password', $user->password ?? '') }}" class="mt-2" />
                            @error('password')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('users.fields.token') }}</x-base.form-label>
                            <x-base.form-input type="text" name="token" value="{{ old('token', $user->token ?? '') }}" class="mt-2" />
                            @error('token')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('users.fields.user_id') }}</x-base.form-label>
                            <x-base.form-input type="text" name="user_id" value="{{ old('user_id', $user->user_id ?? '') }}" class="mt-2" />
                            @error('user_id')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('users.fields.ip_address') }}</x-base.form-label>
                            <x-base.form-input type="text" name="ip_address" value="{{ old('ip_address', $user->ip_address ?? '') }}" class="mt-2" />
                            @error('ip_address')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('users.fields.user_agent') }}</x-base.form-label>
                            <x-base.form-textarea name="user_agent" rows="4" class="resize-none">{{ old('user_agent', $user->user_agent ?? '') }}</x-base.form-textarea>
                            @error('user_agent')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('users.fields.payload') }}</x-base.form-label>
                            <x-base.form-textarea name="payload" rows="4" class="resize-none">{{ old('payload', $user->payload ?? '') }}</x-base.form-textarea>
                            @error('payload')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('users.fields.last_activity') }}</x-base.form-label>
                            <x-base.form-input type="number" name="last_activity" value="{{ old('last_activity', $user->last_activity ?? '') }}" class="mt-2" />
                            @error('last_activity')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary w-24 me-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.save') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
