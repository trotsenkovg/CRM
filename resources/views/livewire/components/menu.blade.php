<div class="sidebar-expanded">
    <!-- Sidebar backdrop (mobile only) -->
    <div
        class="fixed inset-0 bg-orange-900 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200"
        :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'"
        aria-hidden="true">
    </div>

    <!-- Sidebar -->
    <div
        id="sidebar"
        class="flex p-4 flex-col absolute z-40 start-0 top-0 lg:static lg:start-auto lg:top-auto lg:translate-x-0 transform h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 bg-slate-800 transition-all duration-200 ease-in-out"
        :class="sidebarOpen ? 'translate-x-0' : `{{app()->getLocale() == 'he' ? 'translate-x-64' : '-translate-x-64'}}`"
        @click.outside="sidebarOpen = false"
        @keydown.escape.window="sidebarOpen = false">

        <!-- Sidebar header -->
        <div class="mb-10">
            <!-- Close button -->
            <button class="lg:hidden text-orange-500 hover:text-orange-400" @click.stop="sidebarOpen = !sidebarOpen"
                    :class="`{{app()->getLocale() == 'he'}}` && 'rotate-180'"
                    aria-controls="sidebar" :aria-expanded="sidebarOpen">
                <span class="sr-only">Close sidebar</span>
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z"/>
                </svg>
            </button>
            <!-- Logo -->
            <a class="block" href="{{ route('dashboard') }}">
                <x-logo class="w-auto h-16 mx-auto text-orange-600"></x-logo>
            </a>
        </div>

        <!-- Links -->
        <div class="space-y-8">
            <div>
                <ul>
                    @foreach($links as $link)
                        <li class="px-3 py-2 rounded-md mb-0.5 last:mb-0 cursor-pointer rounded-md"
                            x-data="{ open: `{{$link['open']}}` }"
                            :class="`{{$link['open']}}` && 'bg-slate-900'">
                            <a class="block text-orange-400 hover:text-orange-200"
                               :class="`{{$link['open']}}` && '!text-orange-50'"
                               @if(!empty($link['route'])) href="{{ route($link['route'])}} @endif"
                               x-on:click="open = !open"
                               x-cloak>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        @includeIf('components.svg.'.$link['id'])
                                        <span class="text-sm font-medium ms-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">{{$link['name']}}</span>
                                    </div>

                                    <!-- Icon -->
                                    @if(isset($link['subFields']) > 0)
                                        <div
                                            class="flex shrink-0 ms-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                            <svg class="w-3 h-3 shrink-0 ms-1 fill-current text-orange-400"
                                                 :class="open && 'transform rotate-180'" viewBox="0 0 12 12">
                                                <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                            </a>

                            @if(isset($link['subFields']) && !empty($link['subFields']))
                                <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                    <ul class="ps-9 mt-1"
                                        x-transition:enter="transition-all ease-in-out duration-500"
                                        x-transition:enter-start="opacity-25 max-h-0"
                                        x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition-all ease-in-out duration-500"
                                        x-transition:leave-start="opacity-100 max-h-xl"
                                        x-transition:leave-end="opacity-0"
                                        x-show="open"
                                        x-cloak>
                                        @foreach($link['subFields'] as $page)
                                            <li class="mb-1 last:mb-0"
                                                x-data="{subOpen: `{{$page['open']}}`}"
                                                x-on:click="subOpen = !subOpen">
                                                <a class="block text-orange-400 hover:text-orange-200 transition duration-150"
                                                   :class="`{{$page['open']}}` && '!text-orange-50'"
                                                   @if(!empty($page['route'])) href="{{ route($page['route'])}} @endif">
                                        <span
                                            class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">{{$page['name']}}</span>
                                                </a>
                                                @if(isset($page['subFields']) && !empty($page['subFields']))
                                                    <ul class="ps-4 mt-1 list-disc"
                                                        x-transition:enter="transition-all ease-in-out duration-500"
                                                        x-transition:enter-start="opacity-25 max-h-0"
                                                        x-transition:enter-end="opacity-100"
                                                        x-transition:leave="transition-all ease-in-out duration-500"
                                                        x-transition:leave-start="opacity-100 max-h-xl"
                                                        x-transition:leave-end="opacity-0"
                                                        x-show="subOpen"
                                                        x-cloak>
                                                        @foreach($page['subFields'] as $item)
                                                            <li class="mb-1 last:mb-0 cursor-pointer">
                                                                <a class="block text-orange-400 hover:text-orange-200 transition duration-150 ps-2"
                                                                   :class="{ '!text-orange-50': `{{$item['open']}}` }"
                                                                   @if(!empty($item['route'])) href="{{ route($item['route'])}} @endif"
                                                                   x-cloak>
                                                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">{{$item['name']}}</span>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!-- End Sidebar-->
</div>
