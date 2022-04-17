<div class="mt-1 relative rounded-md shadow-sm">
    <select
        wire:model.stop="filters.{{ $key }}"
        wire:key="filter-{{ $key }}"
        id="filter-{{ $key }}"
        class="block w-full border-slate-300 rounded-md shadow-sm transition duration-150 ease-in-out focus:border-slate-300 focus:ring focus:ring-orange-200 focus:ring-opacity-50 dark:bg-slate-800 dark:text-white dark:border-slate-600"
    >
        @foreach($filter->options() as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
</div>
