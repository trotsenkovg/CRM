@if ($paginationEnabled && $showPerPage)
    <div class="w-full md:w-auto ms-0 md:ms-2">
        <select
            wire:model="perPage"
            id="perPage"
            class="block w-full border-slate-300 rounded-md shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:border-slate-300 focus:ring focus:ring-orange-200 focus:ring-opacity-50 dark:bg-slate-700 dark:text-white dark:border-slate-600"
        >
            @foreach ($perPageAccepted as $item)
                <option value="{{ $item }}">{{ $item === -1 ? __('All') : $item }}</option>
            @endforeach
        </select>
    </div>
@endif
