@if ($filtersEnabled && $showFilterDropdown && ($filtersView || count($customFilters)))
    <div
        x-data="{ open: false }"
        x-on:keydown.escape.stop="open = false"
        x-on:mousedown.away="open = false"
        class="relative block md:inline-block text-start"
    >
        <div>
            <button
                type="button"
                class="lg:mr-2 inline-flex justify-center w-full rounded-md border border-slate-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-orange-700 hover:bg-slate-50 focus:border-slate-300 focus:ring focus:ring-orange-200 focus:ring-opacity-50 dark:bg-slate-700 dark:text-white dark:border-slate-600 dark:hover:bg-slate-600"
                x-on:click="open = !open"
                aria-haspopup="true"
                x-bind:aria-expanded="open"
                aria-expanded="true"
            >
                @lang('Filters')

                @if (count($this->getFiltersWithoutSearch()))
                    <span class="ms-1 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-orange-100 text-orange-800 capitalize dark:bg-orange-200 dark:text-orange-900">
                       {{ count($this->getFiltersWithoutSearch()) }}
                    </span>
                @endif

                <svg class="-me-1 ms-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                </svg>
            </button>
        </div>

        <div
            x-cloak
            x-show="open"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="origin-top-right absolute right-0 mt-2 w-full md:w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-slate-100 focus:outline-none z-50 dark:bg-slate-700 dark:text-white dark:divide-slate-600"
            role="menu"
            aria-orientation="vertical"
        >
            @if ($filtersView)
                @include($filtersView)
            @elseif (count($customFilters))
                @foreach ($customFilters as $key => $filter)
                    <div class="py-1" role="none">
                        <div class="block px-4 py-2 text-sm text-orange-700 dark:text-white" role="menuitem">
                            <label for="filter-{{ $key }}"
                                   class="block text-sm font-medium leading-5 text-orange-700 dark:text-white">
                                {{ $filter->name() }}
                            </label>

                            @if ($filter->isSelect())
                                @include('livewire-tables::tailwind.includes.filter-type-select')
                            @elseif($filter->isMultiSelect())
                                @include('livewire-tables::tailwind.includes.filter-type-multiselect')
                            @elseif($filter->isDate())
                                @include('livewire-tables::tailwind.includes.filter-type-date')
                            @elseif($filter->isDatetime())
                                @include('livewire-tables::tailwind.includes.filter-type-datetime')
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif

            @if (count($this->getFiltersWithoutSearch()))
                <div class="py-1" role="none">
                    <div class="block px-4 py-2 text-sm text-orange-700 dark:text-white" role="menuitem">
                        <button
                            wire:click.prevent="resetFilters"
                            x-on:click="open = false"
                            type="button"
                            class="w-full inline-flex items-center justify-center px-3 py-2 border border-slate-300 shadow-sm text-sm leading-4 font-medium rounded-md text-orange-700 bg-white hover:bg-slate-50 focus:border-slate-300 focus:ring focus:ring-orange-200 focus:ring-opacity-50 dark:bg-slate-800 dark:border-slate-600 dark:text-white dark:hover:border-slate-500"
                        >
                            @lang('Clear')
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endif
