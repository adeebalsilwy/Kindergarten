@extends('layouts.app')

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium me-auto">{{ __('global.dashboard_content_management') }}</h2>
</div>

<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <a href="{{ route('dashboard-content.create') }}" class="btn btn-primary shadow-md me-2">
            <i data-lucide="plus" class="w-4 h-4 me-2"></i> {{ __('global.add_content') }}
        </a>
        <div class="hidden md:block mx-auto text-slate-500"></div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ms-auto md:ms-0">
            <div class="w-56 relative text-slate-500">
                <form method="GET" action="{{ route('dashboard-content.index') }}">
                    <input type="text" name="search" class="form-control w-56 box pe-10" placeholder="{{ __('global.search') }}" value="{{ request('search') }}">
                    <i data-lucide="search" class="w-4 h-4 absolute left-0 top-0 my-auto mx-auto ms-3"></i>
                </form>
            </div>
        </div>
    </div>

    <!-- BEGIN: Content Management Table -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="text-center whitespace-nowrap">{{ __('global.section') }}</th>
                    <th class="text-center">{{ __('global.key') }}</th>
                    <th class="text-center">{{ __('global.content_en') }}</th>
                    <th class="text-center">{{ __('global.content_ar') }}</th>
                    <th class="text-center">{{ __('global.status') }}</th>
                    <th class="text-center">{{ __('global.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dashboardContents as $content)
                <tr class="intro-x">
                    <td class="text-center">{{ $content->section }}</td>
                    <td class="text-center">{{ $content->key }}</td>
                    <td class="text-center">{{ Str::limit($content->content['en'] ?? '', 50) }}</td>
                    <td class="text-center">{{ Str::limit($content->content['ar'] ?? '', 50) }}</td>
                    <td class="w-40 text-center">
                        @if($content->is_active)
                        <div class="flex items-center justify-center text-success">
                            <i data-lucide="check-square" class="w-4 h-4 me-2"></i> {{ __('global.active') }}
                        </div>
                        @else
                        <div class="flex items-center justify-center text-danger">
                            <i data-lucide="x-square" class="w-4 h-4 me-2"></i> {{ __('global.inactive') }}
                        </div>
                        @endif
                    </td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center gap-2">
                            <a class="flex items-center me-3" href="{{ route('dashboard-content.edit', $content) }}">
                                <i data-lucide="check-square" class="w-4 h-4 me-1"></i> {{ __('global.edit') }}
                            </a>
                            <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal" data-id="{{ $content->id }}">
                                <i data-lucide="trash-2" class="w-4 h-4 me-1"></i> {{ __('global.delete') }}
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">{{ __('global.no_records_found') }}</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- END: Content Management Table -->

    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
        {{ $dashboardContents->links() }}
    </div>
    <!-- END: Pagination -->
</div>

<!-- BEGIN: Delete Confirmation Modal -->
<div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <form id="delete-form" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">{{ __('global.confirm_delete') }}</div>
                        <div class="text-slate-500 mt-2">
                            {{ __('global.confirm_delete_message') }}
                        </div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 me-1">{{ __('global.cancel') }}</button>
                        <button type="submit" class="btn btn-danger w-24">{{ __('global.delete') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END: Delete Confirmation Modal -->

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle delete confirmation
    const deleteButtons = document.querySelectorAll('[data-tw-target="#delete-confirmation-modal"]');
    const deleteForm = document.getElementById('delete-form');
    
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const contentId = this.getAttribute('data-id');
            deleteForm.action = '/dashboard-content/' + contentId;
        });
    });
});
</script>
@endsection