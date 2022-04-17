@if ($reorderEnabled)
    <button
        wire:click="{{ $reordering ? 'disableReordering' : 'enableReordering' }}"
        type="button"
        class="inline-flex justify-center items-center w-full md:w-auto px-4 py-2 border border-slate-300 shadow-sm text-sm font-medium rounded-md text-orange-700 bg-white hover:text-orange-500 focus:border-slate-300 focus:ring focus:ring-orange-200 focus:ring-opacity-50 active:bg-slate-50 active:text-orange-800 transition ease-in-out duration-150 dark:bg-slate-700 dark:text-white dark:border-slate-600 dark:hover:bg-slate-600"
    >
        @if ($reordering)
            @lang('Done Reordering')
        @else
            @lang('Reorder')
        @endif
    </button>
@endif
