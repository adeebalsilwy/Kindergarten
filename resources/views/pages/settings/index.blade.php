@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('global.system_settings') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('global.system_settings') }}</h2>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-3">
            <div class="box p-5">
                <div class="flex flex-col gap-1 nav-tabs" role="tablist">
                    @foreach($settings as $group => $items)
                    <x-base.button
                        variant="outline-secondary"
                        class="justify-start mb-2 {{ $loop->first ? 'active' : '' }}"
                        data-tw-toggle="tab"
                        data-tw-target="#group-{{ $group }}"
                        role="tab"
                        aria-controls="group-{{ $group }}"
                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                        <x-base.lucide icon="{{ $group == 'general' ? 'Settings' : ($group == 'academic' ? 'Book' : 'CreditCard') }}" class="w-4 h-4 me-2" />
                        {{ ucfirst($group) }}
                    </x-base.button>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="intro-y col-span-12 lg:col-span-9">
            <div class="box p-5">
                <form action="{{ route('settings.update') }}" method="POST">
                    @csrf
                    <div class="tab-content">
                        @foreach($settings as $group => $items)
                        <div id="group-{{ $group }}" class="tab-pane {{ $loop->first ? 'active' : '' }}" role="tabpanel" aria-labelledby="group-{{ $group }}-tab">
                            <div class="grid grid-cols-12 gap-4 gap-y-5">
                                @foreach($items as $setting)
                                <div class="col-span-12 sm:col-span-6">
                                    <x-base.form-label for="{{ $setting->key }}">{{ str_replace('_', ' ', ucfirst($setting->key)) }}</x-base.form-label>
                                    @if($setting->type == 'text' || $setting->type == 'email' || $setting->type == 'number')
                                        <x-base.form-input id="{{ $setting->key }}" name="{{ $setting->key }}" type="{{ $setting->type }}" value="{{ $setting->value }}" class="mt-2" />
                                    @elseif($setting->type == 'textarea')
                                        <x-base.form-textarea id="{{ $setting->key }}" name="{{ $setting->key }}" rows="3" class="mt-2">{{ $setting->value }}</x-base.form-textarea>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="flex justify-end mt-6">
                        <x-base.button type="submit" variant="primary" class="w-40 shadow-md">
                            <x-base.lucide icon="Save" class="w-4 h-4 me-2" />
                            {{ __('global.save_settings') }}
                        </x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
