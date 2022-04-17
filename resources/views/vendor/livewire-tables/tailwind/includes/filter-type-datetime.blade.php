<div class="flex rounded-md shadow-sm mt-1">
    <input
        wire:model.stop="filters.{{ $key }}"
        wire:key="filter-{{ $key }}"
        id="filter-{{ $key }}"
        type="datetime-local"
        @if(isset($filter->options['min']) && strlen($filter->options['min'])) min="{{ $filter->options['min'] }}" @endif
        @if(isset($filter->options['max']) && strlen($filter->options['max'])) max="{{ $filter->options['max'] }}" @endif
        class="block w-full border-slate-300 rounded-md shadow-sm transition duration-150 ease-in-out focus:border-slate-300 focus:ring focus:ring-orange-200 focus:ring-opacity-50 dark:bg-slate-800 dark:text-white dark:border-slate-600"
    />
</div>
