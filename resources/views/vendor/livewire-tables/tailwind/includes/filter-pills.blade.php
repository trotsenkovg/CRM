<div>
    @if ($showFilters && count($this->getFiltersWithoutSearch()))
        <div class="md:mb-4 px-6 py-2 md:p-0">
            <small class="text-orange-700 dark:text-white">@lang('Applied Filters'):</small>

            @foreach($filters as $key => $value)
                @if ($key !== 'search' && filled($value))
                    <span
                        wire:key="filter-pill-{{ $key }}"
                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-orange-100 text-orange-800 capitalize dark:bg-orange-200 dark:text-orange-900"
                    >
                        {{ $filterNames[$key] ?? collect($this->columns())->pluck('text', 'column')->get($key, isset($customFilters[$key]) && property_exists($customFilters[$key], 'name') ? $customFilters[$key]->name : ucwords(strtr($key, ['_' => ' ', '-' => ' ']))) }}:
                        @if(isset($customFilters[$key]) && method_exists($customFilters[$key], 'options'))
                            @if(is_array($value))
                                @foreach($value as $selectedValue)
                                    {{ $customFilters[$key]->options()[$selectedValue] ?? $selectedValue }}@if(!$loop->last), @endif
                                @endforeach
                            @else
                                {{ $customFilters[$key]->options()[$value] ?? $value }}
                            @endif
                        @elseif(is_array($value))
                            {{ implode(', ', $value) }}
                        @else
                            {{ ucwords(strtr($value, ['_' => ' ', '-' => ' '])) }}
                        @endif

                        <button
                            wire:click="removeFilter('{{ $key }}')"
                            type="button"
                            class="flex-shrink-0 ms-0.5 h-4 w-4 rounded-full inline-flex items-center justify-center text-orange-400 hover:bg-orange-200 hover:text-orange-500 focus:outline-none focus:bg-orange-500 focus:text-white"
                        >
                            <span class="sr-only">@lang('Remove filter option')</span>
                            <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                                <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
                            </svg>
                        </button>
                    </span>
                @endif
            @endforeach

            <button class="focus:outline-none active:outline-none" wire:click.prevent="resetFilters">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-orange-800 dark:bg-slate-200 dark:text-orange-900">
                    @lang('Clear')
                </span>
            </button>
        </div>
    @endif
</div>
