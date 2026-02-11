@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('global.parent_profile') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('global.parent_profile') }}</h2>
        <div class="flex gap-2">
            <x-base.button as="a" href="{{ route('guardians.edit', $parents->id) }}" variant="primary" class="flex items-center">
                <x-base.lucide icon="Pencil" class="w-4 h-4 mr-2" /> {{ __('global.edit') }}
            </x-base.button>
            <x-base.button as="a" href="{{ route('guardians.index') }}" variant="outline-secondary" class="flex items-center">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 mr-2" /> {{ __('global.back') }}
            </x-base.button>
        </div>
    </div>

    <!-- BEGIN: Profile Info -->
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5 text-center lg:text-left">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative border-2 border-slate-200 rounded-full overflow-hidden">
                    <img alt="{{ $parents->name }}" src="https://ui-avatars.com/api/?name={{ urlencode($parents->name) }}&background=random&size=200">
                </div>
                <div class="ml-5">
                    <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg ltr:text-left rtl:text-right">{{ $parents->name }}</div>
                    <div class="text-slate-500 ltr:text-left rtl:text-right">{{ $parents->occupation ?? 'Parent' }}</div>
                    <div class="mt-2 text-xs text-slate-400 ltr:text-left rtl:text-right">{{ __('global.priority') }}: <span class="text-primary font-semibold">{{ $parents->relation }}</span></div>
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-6 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-3">{{ __('global.contact_details') }}</div>
                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                    <div class="truncate sm:whitespace-normal flex items-center">
                        <x-base.lucide icon="Mail" class="w-4 h-4 mr-2" /> {{ $parents->email ?? 'N/A' }}
                    </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3 text-primary font-bold">
                        <x-base.lucide icon="Phone" class="w-4 h-4 mr-2" /> {{ $parents->phone ?? 'N/A' }}
                    </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3 text-slate-500">
                        <x-base.lucide icon="MapPin" class="w-4 h-4 mr-2" /> {{ $parents->address ?? 'N/A' }}
                    </div>
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 flex items-center justify-center px-5 border-t lg:border-t-0 pt-6 lg:pt-0">
                <div class="text-center rounded-md w-24 py-3">
                    <div class="font-medium text-primary text-xl">{{ $parents->children->count() }}</div>
                    <div class="text-slate-500 text-xs">{{ __('global.linked_children') }}</div>
                </div>
                <div class="text-center rounded-md w-24 py-3">
                    <div class="font-medium text-xl">{{ $parents->receives_sms_notifications ? 'Yes' : 'No' }}</div>
                    <div class="text-slate-500 text-xs">{{ __('global.sms_notifications') }}</div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Profile Info -->

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Linked Children -->
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="box p-5">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base mr-auto">{{ __('global.children') }}</div>
                </div>
                <div class="grid grid-cols-12 gap-6">
                    @forelse($parents->children as $child)
                        <div class="col-span-12 sm:col-span-6 zoom-in">
                            <div class="box p-4 border border-slate-100 flex items-center">
                                <div class="w-12 h-12 image-fit mr-3">
                                    <img alt="{{ $child->name }}" class="rounded-full border border-slate-200" src="{{ $child->photo_path ? asset($child->photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode($child->name) }}">
                                </div>
                                <div class="mr-auto">
                                    <a href="{{ route('children.show', $child->id) }}" class="font-medium">{{ $child->name }}</a>
                                    <div class="text-slate-500 text-xs">{{ $child->class->name ?? 'No class' }}</div>
                                </div>
                                <div class="text-right">
                                    <div class="text-xs text-slate-400">{{ __('global.status') }}</div>
                                    <div class="text-primary font-semibold text-xs">{{ __('global.'.$child->enrollment_status) }}</div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-12 text-center py-10 text-slate-500">
                            {{ __('global.no_children_found') }}
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Additional Info -->
        <div class="intro-y col-span-12 lg:col-span-4">
            <div class="box p-5">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base mr-auto">{{ __('global.additional_info') }}</div>
                </div>
                <div class="flex flex-col gap-4">
                    <div>
                        <div class="text-slate-500 text-xs">{{ __('global.secondary_phone') }}</div>
                        <div class="text-base font-medium mt-1">{{ $parents->secondary_phone ?? 'N/A' }}</div>
                    </div>
                    <div>
                        <div class="text-slate-500 text-xs">{{ __('global.workplace') }}</div>
                        <div class="text-base font-medium mt-1">{{ $parents->workplace ?? 'N/A' }}</div>
                    </div>
                    <div>
                        <div class="text-slate-500 text-xs">{{ __('global.preferred_language') }}</div>
                        <div class="text-base font-medium mt-1">{{ $parents->preferred_language ?? 'N/A' }}</div>
                    </div>
                    <div>
                        <div class="text-slate-500 text-xs">{{ __('global.national_id') }}</div>
                        <div class="text-base font-medium mt-1">{{ $parents->national_id ?? 'N/A' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
