@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Payment.show') }} - {{ number_format($payment->amount ?? 0, 2) }}</title>
    <style>
        .tab-content { display: none; }
        .tab-content.active { display: block; }
        .tab-button.active { background-color: #3b82f6; color: white; }
        .info-card { transition: all 0.3s ease; }
        .info-card:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
    </style>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">
            <x-base.lucide icon="DollarSign" class="w-5 h-5 inline me-2" />
            {{ __('global.payment_details') }} - {{ number_format($payment->amount ?? 0, 2) }}
        </h2>
        <div class="ms-auto flex gap-2">
            <x-base.button variant="secondary" as="a" href="{{ route('payments.index') }}">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
                {{ __('global.back') }}
            </x-base.button>
            @can('edit_payments')
            <x-base.button variant="primary" as="a" href="{{ route('payments.edit', $payment->id) }}">
                <x-base.lucide icon="Pencil" class="w-4 h-4 me-2" />
                {{ __('global.edit') }}
            </x-base.button>
            @endcan
        </div>
    </div>

    <!-- Tab Navigation -->
    <div class="intro-y mt-5">
        <div class="border-b border-slate-200">
            <nav class="flex space-x-2 overflow-x-auto">
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg active" data-tab="overview">
                    <x-base.lucide icon="Layout" class="w-4 h-4 me-2" />
                    {{ __('global.overview') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="student">
                    <x-base.lucide icon="User" class="w-4 h-4 me-2" />
                    {{ __('global.student_info') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="financial">
                    <x-base.lucide icon="CreditCard" class="w-4 h-4 me-2" />
                    {{ __('global.financial_details') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="receipt">
                    <x-base.lucide icon="FileText" class="w-4 h-4 me-2" />
                    {{ __('global.receipt_info') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="history">
                    <x-base.lucide icon="Activity" class="w-4 h-4 me-2" />
                    {{ __('global.payment_history') }}
                </button>
            </nav>
        </div>
    </div>

    <!-- Tab Content -->
    <div class="mt-5">
        <!-- Overview Tab -->
        <div id="overview" class="tab-content active">
            <div class="grid grid-cols-12 gap-6">
                <!-- Payment Card -->
                <div class="intro-y col-span-12 lg:col-span-4">
                    <div class="box p-5 info-card">
                        <div class="text-center">
                            <div class="w-24 h-24 bg-gradient-to-br from-green-500/20 to-blue-500/20 flex items-center justify-center rounded-full text-3xl font-bold mx-auto mb-4 text-green-600">
                                {{ number_format($payment->amount ?? 0, 2) }}
                            </div>
                            <div class="text-2xl font-bold mb-2">{{ __('global.payment_received') }}</div>
                            <div class="text-slate-500 text-lg">
                                {{ optional($payment->child)->name ?? 'Student' }}
                            </div>
                            
                            <div class="mt-6 pt-4 border-t">
                                <div class="grid grid-cols-2 gap-3">
                                    <div class="text-center p-3 bg-blue-50 rounded">
                                        <div class="text-xl font-bold text-blue-600">
                                            {{ $payment->child->payments()->count() }}
                                        </div>
                                        <div class="text-xs text-slate-500">{{ __('global.total_payments') }}</div>
                                    </div>
                                    <div class="text-center p-3 bg-green-50 rounded">
                                        <div class="text-xl font-bold text-green-600">
                                            {{ number_format($payment->child->payments()->sum('amount'), 2) }}
                                        </div>
                                        <div class="text-xs text-slate-500">{{ __('global.total_paid') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Context -->
                <div class="intro-y col-span-12 lg:col-span-8">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 md:col-span-6">
                            <div class="box p-5">
                                <div class="text-base font-medium mb-3 flex items-center">
                                    <x-base.lucide icon="User" class="w-5 h-5 me-2 text-primary" />
                                    {{ __('global.student') }}
                                </div>
                                <div class="flex items-center">
                                    <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center me-3">
                                        <span class="text-primary font-bold">{{ strtoupper(substr(optional($payment->child)->name ?? 'S', 0, 1)) }}</span>
                                    </div>
                                    <div>
                                        <div class="font-medium">{{ optional($payment->child)->name ?? 'Student' }}</div>
                                        <div class="text-sm text-slate-500">
                                            {{ optional(optional($payment->child)->class)->name ?? 'Not assigned' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 pt-3 border-t">
                                    <a href="{{ route('children.show', $payment->child->id) }}" class="text-primary hover:underline">
                                        {{ __('global.view_student_profile') }}
                                        <x-base.lucide icon="ArrowRight" class="w-4 h-4 inline ms-1" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-span-12 md:col-span-6">
                            <div class="box p-5">
                                <div class="text-base font-medium mb-3 flex items-center">
                                    <x-base.lucide icon="Calendar" class="w-5 h-5 me-2 text-primary" />
                                    {{ __('global.payment_info') }}
                                </div>
                                <div class="space-y-3">
                                    <div class="flex justify-between">
                                        <span class="text-slate-500">{{ __('global.date') }}:</span>
                                        <span class="font-medium">{{ optional($payment->payment_date)->format('M d, Y') ?? '--' }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-slate-500">{{ __('global.method') }}:</span>
                                        <span class="font-medium">{{ $payment->payment_method ?? 'Not specified' }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-slate-500">{{ __('global.status') }}:</span>
                                        <span class="font-medium px-2 py-1 rounded text-xs 
                                            {{ $payment->status === 'completed' ? 'bg-success/20 text-success' : ($payment->status === 'pending' ? 'bg-warning/20 text-warning' : 'bg-danger/20 text-danger') }}">
                                            {{ ucfirst($payment->status ?? 'completed') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Student Information Tab -->
        <div id="student" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="User" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.student_profile') }}
                        </div>
                        <div class="flex items-start">
                            <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center me-4">
                                <span class="text-primary font-bold text-xl">{{ strtoupper(substr(optional($payment->child)->name ?? 'S', 0, 2)) }}</span>
                            </div>
                            <div class="flex-1">
                                <div class="text-xl font-bold">{{ optional($payment->child)->name ?? 'Student' }}</div>
                                <div class="text-slate-500 text-sm mt-1">
                                    {{ optional($payment->child)->age ?? '--' }} {{ __('global.years_old') }} • {{ ucfirst(optional($payment->child)->gender ?? '--') }}
                                </div>
                                <div class="text-slate-500 text-sm mt-1">
                                    {{ optional($payment->child)->nationality ?? 'Not specified' }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-5 space-y-3">
                            <div class="flex items-center text-sm">
                                <x-base.lucide icon="Home" class="w-4 h-4 me-2 text-slate-500" />
                                <span>{{ optional(optional($payment->child)->class)->name ?? 'Not assigned' }}</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <x-base.lucide icon="DollarSign" class="w-4 h-4 me-2 text-slate-500" />
                                <span>{{ number_format(optional($payment->child)->balance ?? 0, 2) }} {{ __('global.balance') }}</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <x-base.lucide icon="Users" class="w-4 h-4 me-2 text-slate-500" />
                                <span>{{ optional(optional($payment->child)->parent)->name ?? 'No parent assigned' }}</span>
                            </div>
                        </div>
                        
                        <div class="mt-5 pt-4 border-t">
                            <a href="{{ route('children.show', $payment->child->id) }}" class="text-primary hover:underline">
                                {{ __('global.view_full_student_profile') }}
                                <x-base.lucide icon="ArrowRight" class="w-4 h-4 inline ms-1" />
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="BarChart2" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.financial_summary') }}
                        </div>
                        <div class="space-y-4">
                            <div class="text-center p-4 bg-blue-50 rounded-lg">
                                <div class="text-2xl font-bold text-blue-600">
                                    {{ number_format(optional($payment->child)->fees_required ?? 0, 2) }}
                                </div>
                                <div class="text-sm text-slate-600">{{ __('global.fees_required') }}</div>
                            </div>
                            <div class="text-center p-4 bg-green-50 rounded-lg">
                                <div class="text-2xl font-bold text-green-600">
                                    {{ number_format(optional($payment->child)->fees_paid ?? 0, 2) }}
                                </div>
                                <div class="text-sm text-slate-600">{{ __('global.fees_paid') }}</div>
                            </div>
                            <div class="text-center p-4 bg-{{ (optional($payment->child)->balance ?? 0) > 0 ? 'red' : 'green' }}-50 rounded-lg">
                                <div class="text-2xl font-bold {{ (optional($payment->child)->balance ?? 0) > 0 ? 'text-red-600' : 'text-green-600' }}">
                                    {{ number_format(abs(optional($payment->child)->balance ?? 0), 2) }}
                                </div>
                                <div class="text-sm text-slate-600">
                                    {{ (optional($payment->child)->balance ?? 0) > 0 ? __('global.balance_due') : __('global.overpaid') }}
                                </div>
                            </div>
                            <div class="pt-4 border-t text-center">
                                <div class="text-2xl font-bold text-primary">
                                    {{ (optional($payment->child)->fees_required ?? 0) > 0 ? round(((optional($payment->child)->fees_paid ?? 0) / (optional($payment->child)->fees_required ?? 1)) * 100, 1) : 100 }}%
                                </div>
                                <div class="text-sm text-slate-600">{{ __('global.payment_completion') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Financial Details Tab -->
        <div id="financial" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="CreditCard" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.payment_information') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.amount') }}:</span>
                                <span class="font-medium text-xl text-green-600">{{ number_format($payment->amount ?? 0, 2) }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.payment_method') }}:</span>
                                <span class="font-medium">{{ $payment->payment_method ?? __('global.not_specified') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.date') }}:</span>
                                <span class="font-medium">{{ optional($payment->payment_date)->format('F j, Y') ?? '--' }}</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.status') }}:</span>
                                <span class="font-medium px-2 py-1 rounded text-sm 
                                    {{ $payment->status === 'completed' ? 'bg-success/20 text-success' : ($payment->status === 'pending' ? 'bg-warning/20 text-warning' : 'bg-danger/20 text-danger') }}">
                                    {{ ucfirst($payment->status ?? 'completed') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Hash" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.identification') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.reference_number') }}:</span>
                                <span class="font-medium">{{ $payment->reference_number ?? __('global.not_provided') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.receipt_number') }}:</span>
                                <span class="font-medium">{{ $payment->receipt_number ?? __('global.not_generated') }}</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.recorded_at') }}:</span>
                                <span class="font-medium text-sm">{{ $payment->created_at->format('M d, Y H:i:s') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Receipt Information Tab -->
        <div id="receipt" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="FileText" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.receipt_details') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.receipt_number') }}:</span>
                                <span class="font-medium">{{ $payment->receipt_number ?? __('global.not_generated') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.amount') }}:</span>
                                <span class="font-medium">{{ number_format($payment->amount ?? 0, 2) }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.student') }}:</span>
                                <span class="font-medium">{{ optional($payment->child)->name ?? '--' }}</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.date') }}:</span>
                                <span class="font-medium">{{ optional($payment->payment_date)->format('F j, Y') ?? '--' }}</span>
                            </div>
                        </div>
                        
                        <div class="mt-5 pt-4 border-t">
                            <button class="btn btn-primary w-full">
                                <x-base.lucide icon="Download" class="w-4 h-4 me-2" />
                                {{ __('global.download_receipt') }}
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="File" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.related_documents') }}
                        </div>
                        @if($payment->receipt_number)
                            <div class="text-center p-8 bg-slate-50 rounded-lg">
                                <x-base.lucide icon="FileText" class="w-12 h-12 mx-auto mb-3 text-slate-400" />
                                <p class="text-slate-600">{{ __('global.receipt_available') }}</p>
                                <button class="btn btn-outline-primary mt-3">
                                    {{ __('global.view_receipt') }}
                                </button>
                            </div>
                        @else
                            <div class="text-center py-8 text-slate-500">
                                <x-base.lucide icon="FileText" class="w-12 h-12 mx-auto mb-3 opacity-50" />
                                <p>{{ __('global.no_receipt_generated') }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment History Tab -->
        <div id="history" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center justify-between">
                            <span>{{ __('global.payment_history') }}</span>
                            <span class="text-sm text-slate-500">{{ $payment->child->payments()->count() }} {{ __('global.payments') }}</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-left">{{ __('global.date') }}</th>
                                        <th class="text-left">{{ __('global.amount') }}</th>
                                        <th class="text-left">{{ __('global.method') }}</th>
                                        <th class="text-left">{{ __('global.status') }}</th>
                                        <th class="text-left">{{ __('global.reference') }}</th>
                                        <th class="text-left">{{ __('global.receipt') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($payment->child->payments()->latest()->get() as $paymentRecord)
                                        <tr class="{{ $paymentRecord->id === $payment->id ? 'bg-primary/10' : '' }}
                                            {{ $paymentRecord->status === 'failed' ? 'bg-danger/5' : '' }}">
                                            <td class="py-2">{{ optional($paymentRecord->payment_date)->format('M d, Y') ?? '--' }}</td>
                                            <td class="font-medium {{ $paymentRecord->id === $payment->id ? 'text-primary' : '' }}">
                                                {{ number_format($paymentRecord->amount ?? 0, 2) }}
                                            </td>
                                            <td>{{ $paymentRecord->payment_method ?? '--' }}</td>
                                            <td>
                                                <span class="px-2 py-1 rounded text-xs font-medium 
                                                    {{ $paymentRecord->status === 'completed' ? 'bg-success/20 text-success' : ($paymentRecord->status === 'pending' ? 'bg-warning/20 text-warning' : 'bg-danger/20 text-danger') }}">
                                                    {{ ucfirst($paymentRecord->status ?? 'completed') }}
                                                </span>
                                            </td>
                                            <td class="text-sm text-slate-600">{{ $paymentRecord->reference_number ?? '--' }}</td>
                                            <td class="text-sm text-slate-600">{{ $paymentRecord->receipt_number ?? '--' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-8 text-slate-500">
                                                <x-base.lucide icon="DollarSign" class="w-12 h-12 mx-auto mb-3 opacity-50" />
                                                <p>{{ __('global.no_payment_records') }}</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4 text-center">
                            <a href="{{ route('payments.index', ['child_id' => $payment->child->id]) }}" class="text-primary hover:underline">
                                {{ __('global.view_all_payments') }}
                                <x-base.lucide icon="ArrowRight" class="w-4 h-4 inline ms-1" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');
            
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const tabId = this.getAttribute('data-tab');
                    
                    // Remove active class from all buttons and contents
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active'));
                    
                    // Add active class to clicked button and corresponding content
                    this.classList.add('active');
                    document.getElementById(tabId).classList.add('active');
                });
            });
        });
    </script>
@endsection
