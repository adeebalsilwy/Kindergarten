@extends('../themes/base')

@section('head')
    @yield('subhead')
@endsection

@section('content')
    <div @class([
        'kindergarten px-5 sm:px-8 py-10',
        "before:content-[''] before:bg-gradient-to-b before:from-theme-1 before:to-theme-2 dark:before:from-darkmode-800 dark:before:to-darkmode-800 before:fixed before:inset-0 before:z-[-1]",
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
