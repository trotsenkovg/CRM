@if ($showSearch)
    <div class="flex rounded-md shadow-sm">
        <input
            wire:model{{ $this->searchFilterOptions }}="filters.search"
            placeholder="{{ __('Search') }}"
            type="text"
            class="block w-full border-slate-300 rounded-md shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 dark:bg-slate-700 dark:text-white dark:border-slate-600 @if (isset($filters['search']) && strlen($filters['search'])) rounded-none rounded-s-md focus:ring-0 focus:border-slate-300 @else focus:border-slate-300 focus:ring focus:ring-orange-200 focus:ring-opacity-50 rounded-md @endif"
        />

        @if (isset($filters['search']) && strlen($filters['search']))
            <span wire:click="$set('filters.search', null)"
                  class="inline-flex items-center px-3 text-orange-500 bg-slate-50 rounded-e-md border border-s-0 border-slate-300 cursor-pointer sm:text-sm dark:bg-slate-700 dark:text-white dark:border-slate-600 dark:hover:bg-slate-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </span>
        @endif
    </div>
@endif
