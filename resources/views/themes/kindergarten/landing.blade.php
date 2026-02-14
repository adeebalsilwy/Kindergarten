@extends('../themes/base')

@section('head')
    @yield('subhead')
@endsection

@section('content')
    <div @class([
        'kindergarten px-5 sm:px-8 py-10',
        "before:content-[''] before:bg-slate-50 dark:before:bg-darkmode-900 before:fixed before:inset-0 before:z-[-1]",
    ])>
        <div class="min-h-screen">
            @yield('subcontent')
        </div>
    </div>
@endsection

@pushOnce('styles')
    @vite('resources/css/vendors/tippy.css')
@endPushOnce

@pushOnce('vendors')
    @vite('resources/js/vendors/tippy.js')
@endPushOnce

@pushOnce('scripts')
    @vite('resources/js/themes/kindergarten.js')
@endPushOnce
