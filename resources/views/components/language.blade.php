<div>
    <!-- Start -->
    <div class="relative inline-flex ml-5"
         x-data="{open: false, selected: ''}"
         x-init="selected = getLanguageNumber('{{app()->getLocale()}}')"
         x-cloak
    >
        <button
            x-ref="options"
            class="btn justify-between min-w-36 bg-white border-slate-200 hover:border-slate-300 text-slate-500 hover:text-slate-600"
            aria-label="Select date range"
            aria-haspopup="true"
            @click.prevent="open = !open"
            :aria-expanded="open"
            x-cloak
        >
                                        <span class="flex items-center">
                                            <span
                                                x-text="$refs.options.children[selected].children[1].innerHTML"></span>
                                        </span>
            <svg class="shrink-0 ms-1 fill-current text-slate-400" width="11" height="7"
                 viewBox="0 0 11 7">
                <path d="M5.4 6.8L0 1.4 1.4 0l4 4 4-4 1.4 1.4z"/>
            </svg>
        </button>
        <div
            class="z-10 absolute top-full left-0 w-full bg-white border border-slate-200 py-1.5 rounded shadow-lg overflow-hidden mt-1"
            @click.outside="open = false"
            @keydown.escape.window="open = false"
            x-show="open"
            x-transition:enter="transition ease-out duration-100 transform"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-out duration-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            x-cloak
        >
            <div class="font-medium text-sm text-slate-600" x-ref="options">
                <a
                    tabindex="0"
                    class="flex items-center w-full hover:bg-orange-50 py-1 px-3 cursor-pointer"
                    :class="selected === 0 && 'text-slate-500'"
                    @click="selected = 0;open = false"
                    @focus="open = true"
                    @focusout="open = false"
                    x-cloak
                    wire:click="setLocale('he')"
                >
                    <svg class="shrink-0 mx-2 fill-current text-slate-400"
                         :class="selected !== 0 && 'invisible'" width="12" height="9"
                         viewBox="0 0 12 9">
                        <path
                            d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z"/>
                    </svg>
                    <span>??????????????</span>
                </a>
                <a
                    tabindex="0"
                    class="flex items-center w-full hover:bg-orange-50 py-1 px-3 cursor-pointer"
                    :class="selected === 1 && 'text-slate-900'"
                    @click="selected = 1; open = false"
                    @focus="open = true"
                    @focusout="open = false"
                    x-cloak
                    wire:click="setLocale('en')"
                >
                    <svg class="shrink-0 mx-2 fill-current text-slate-400"
                         :class="selected !== 1 && 'invisible'" width="12" height="9"
                         viewBox="0 0 12 9">
                        <path
                            d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z"/>
                    </svg>
                    <span>English</span>
                </a>
                <a
                    tabindex="0"
                    class="flex items-center w-full hover:bg-orange-50 py-1 px-3 cursor-pointer"
                    :class="selected === 2 && 'text-slate-500'"
                    @click="selected = 2;open = false"
                    @focus="open = true"
                    @focusout="open = false"
                    x-cloak
                    wire:click="setLocale('ru')"
                >
                    <svg class="shrink-0 mx-2 fill-current text-slate-400"
                         :class="selected !== 2 && 'invisible'" width="12" height="9"
                         viewBox="0 0 12 9">
                        <path
                            d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z"/>
                    </svg>
                    <span>??????????????</span>
                </a>
            </div>
        </div>
    </div>
    <!-- End -->
</div>
