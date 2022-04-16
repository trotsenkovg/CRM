@section('title') @lang('users.siteUsers') @endsection

<div>
    <!-- Page header -->
    <div class="sm:flex sm:justify-between sm:items-center mb-8">
        <!-- Left: Title -->
        <div class="mb-4 sm:mb-0">
            <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">@lang('users.siteUsers')</h1>
        </div>

        <!-- Right: Actions -->
        <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
            <button wire:click="export" wire:loading.attr="disabled" class="disabled:bg-indigo-600 disabled:cursor-progress btn bg-indigo-500 hover:bg-indigo-600 text-white">
                <x-button-loader target="export"/>
                <span class="hidden xs:block">Download site Users</span>
            </button>
            <!-- Add customer button -->
            <a class="btn bg-indigo-500 hover:bg-indigo-600 text-white" href="{{ route('addSiteUsers') }}">
                <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                    <path
                        d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z"/>
                </svg>
                <span class="hidden xs:block ms-2">@lang('users.addSiteUser')</span>
            </a>
        </div>

    </div>

    <div class="bg-white shadow-lg rounded-sm border border-slate-200 p-5">
        <livewire:site-users-table/>
    </div>
</div>
