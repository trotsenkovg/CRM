@props(['text' => null, 'customAttributes' => []])

<td {{ $attributes->merge(array_merge(['class' => 'px-3 py-2 md:px-6 md:py-3 text-start text-xs leading-4 font-medium uppercase tracking-wider bg-slate-50 text-orange-500 dark:bg-slate-800 dark:text-orange-400'], $customAttributes)) }}>
    {{ $text ?? $slot }}
</td>
