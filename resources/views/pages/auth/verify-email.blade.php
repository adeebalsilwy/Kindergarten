@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('auth.verify_email') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
<div class="intro-y box p-5 md:p-8 max-w-2xl mx-auto mt-10">
    <h2 class="text-xl font-semibold mb-4">{{ __('auth.verify_email') }}</h2>
    <p class="text-slate-600 mb-6">
        {{ __('auth.verify_email_instruction') }}
    </p>
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <x-base.button type="submit" variant="primary">
            <x-base.lucide icon="Mail" class="w-4 h-4 mr-2" /> {{ __('auth.resend_verification_link') }}
        </x-base.button>
    </form>
    <div class="mt-6">
        <x-base.button as="a" href="{{ route('dashboard-overview-1') }}" variant="outline-primary">
            <x-base.lucide icon="Layout" class="w-4 h-4 mr-2" /> {{ __('global.dashboard') }}
        </x-base.button>
    </div>
</div>
@endsection
