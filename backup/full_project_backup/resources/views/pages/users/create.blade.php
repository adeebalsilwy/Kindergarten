@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('User.add_new') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('User.add_new') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('users.fields.name') }}</x-base.form-label>
                            <x-base.form-input type="text" name="name" value="{{ old('name', $users->name ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('users.fields.email') }}</x-base.form-label>
                            <div class="relative mt-2">
                                <x-base.form-input type="email" name="email" value="{{ old('email', $users->email ?? '') }}" />
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <x-base.lucide icon="Mail" class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('users.fields.email_verified_at') }}</x-base.form-label>
                            <x-base.form-input type="datetime-local" name="email_verified_at" value="{{ old('email_verified_at', $users->email_verified_at ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('users.fields.password') }}</x-base.form-label>
                            <x-base.form-input type="text" name="password" value="{{ old('password', $users->password ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('users.fields.token') }}</x-base.form-label>
                            <x-base.form-input type="text" name="token" value="{{ old('token', $users->token ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('users.fields.user_id') }}</x-base.form-label>
                            <x-base.form-input type="text" name="user_id" value="{{ old('user_id', $users->user_id ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('users.fields.ip_address') }}</x-base.form-label>
                            <x-base.form-input type="text" name="ip_address" value="{{ old('ip_address', $users->ip_address ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('users.fields.user_agent') }}</x-base.form-label>
                            <x-base.form-textarea name="user_agent" rows="4" class="resize-none">{{ old('user_agent', $users->user_agent ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('users.fields.payload') }}</x-base.form-label>
                            <x-base.form-textarea name="payload" rows="4" class="resize-none">{{ old('payload', $users->payload ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('users.fields.last_activity') }}</x-base.form-label>
                            <x-base.form-input type="number" name="last_activity" value="{{ old('last_activity', $users->last_activity ?? '') }}" class="mt-2" />
                        </div>

                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary w-24 mr-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.save') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
