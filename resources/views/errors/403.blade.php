@extends('../themes/base')

@section('head')
    <title>403 - {{ __('global.forbidden') ?? 'Forbidden' }}</title>
    <style>
        .error-page-container {
            background: linear-gradient(135deg, rgb(var(--color-primary) / 0.05) 0%, rgb(var(--color-primary) / 0.1) 100%);
        }
        .error-card {
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        .floating-icon {
            animation: float 4s ease-in-out infinite;
        }
    </style>
@endsection

@section('content')
    <div class="error-page-container min-h-screen flex items-center justify-center p-6 dark:bg-darkmode-800">
        <div class="max-w-2xl w-full">
            <div class="intro-y box error-card p-12 text-center rounded-[3rem] shadow-2xl bg-white/80 dark:bg-darkmode-600/80 relative overflow-hidden">
                <!-- Background Decoration -->
                <div class="absolute -top-24 -right-24 w-64 h-64 bg-primary/5 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-danger/5 rounded-full blur-3xl"></div>

                <div class="relative z-10">
                    <!-- Icon -->
                    <div class="floating-icon mb-10 inline-flex items-center justify-center w-32 h-32 rounded-[2.5rem] bg-danger/10 text-danger shadow-inner">
                        <x-base.lucide icon="ShieldAlert" class="w-16 h-16" />
                    </div>

                    <!-- Error Code -->
                    <h1 class="text-9xl font-black text-slate-800 dark:text-slate-200 tracking-tighter mb-4 opacity-10">403</h1>
                    
                    <!-- Message -->
                    <h2 class="text-4xl font-black text-slate-800 dark:text-slate-200 mb-6 tracking-tight">
                        {{ __('global.access_denied') ?? 'Access Denied' }}
                    </h2>
                    <p class="text-slate-500 dark:text-slate-400 text-lg font-bold mb-12 max-w-md mx-auto leading-relaxed">
                        {{ $exception->getMessage() ?: (__('global.no_permission_message') ?? 'You do not have the necessary permissions to access this page.') }}
                    </p>

                    <!-- Actions -->
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                        <x-base.button as="a" href="{{ url()->previous() }}" variant="outline-secondary" class="px-10 py-4 rounded-2xl font-black uppercase tracking-widest text-xs border-2 hover:bg-slate-100 transition-all duration-300 w-full sm:w-auto">
                            <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
                            {{ __('global.go_back') ?? 'Go Back' }}
                        </x-base.button>
                        
                        <x-base.button as="a" href="{{ route('dashboard-overview-1') }}" variant="primary" class="px-10 py-4 rounded-2xl font-black uppercase tracking-widest text-xs shadow-xl shadow-primary/30 transition-all duration-300 hover:scale-105 active:scale-95 w-full sm:w-auto">
                            <x-base.lucide icon="Home" class="w-4 h-4 me-2" />
                            {{ __('global.back_to_home') ?? 'Return Home' }}
                        </x-base.button>
                    </div>
                </div>
            </div>

            <!-- Footer Info -->
            <div class="intro-y text-center mt-12">
                <p class="text-slate-400 dark:text-slate-500 font-bold text-sm tracking-widest uppercase">
                    &copy; {{ date('Y') }} {{ config('app.name') }}. {{ __('global.all_rights_reserved') ?? 'All rights reserved.' }}
                </p>
            </div>
        </div>
    </div>
@endsection
