<div>
    <!-- Sidebar backdrop (mobile only) -->
    <div
        class="fixed inset-0 bg-slate-900 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200"
        :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'"
        aria-hidden="true"
        x-cloak>

    </div>

    <!-- Sidebar -->
    <div
        id="sidebar"
        class="flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 transform h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 bg-slate-800 p-4 transition-all duration-200 ease-in-out"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'"
        @click.outside="sidebarOpen = false"
        @keydown.escape.window="sidebarOpen = false"
        x-cloak="lg"
    >

        <!-- Sidebar header -->
        <div class="flex mb-10 ps-3 sm:px-2 justify-center">
            <!-- Close button -->
            <button class="lg:hidden text-slate-500 hover:text-slate-400" @click.stop="sidebarOpen = !sidebarOpen"
                    aria-controls="sidebar" :aria-expanded="sidebarOpen">
                <span class="sr-only">Close sidebar</span>
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z"/>
                </svg>
            </button>
            <!-- Logo -->
            <a class="block" href="{{ route('dashboard') }}">
                <x-logo class="w-auto h-16 mx-auto text-indigo-600"></x-logo>
            </a>
        </div>

        <!-- Links -->
        <div class="space-y-8">
            <!-- Pages group -->
            <div x-cloak>
                <h3 class="text-xs uppercase text-slate-500 font-semibold ps-3">
                    <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                          aria-hidden="true">•••</span>
                    <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">@lang('general.pages')</span>
                </h3>
                <ul class="mt-3">
                    <!-- Dashboard -->
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" :class="page === 'dashboard' && 'bg-slate-900'">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150"
                           :class="page === 'dashboard' && 'hover:text-slate-200'" href="{{ route('dashboard')}}">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path class="fill-current text-slate-400"
                                          :class="page.startsWith('dashboard') && '!text-indigo-500'"
                                          d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z"/>
                                    <path class="fill-current text-slate-600"
                                          :class="page.startsWith('dashboard') && 'text-indigo-600'"
                                          d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z"/>
                                    <path class="fill-current text-slate-400"
                                          :class="page.startsWith('dashboard') && 'text-indigo-200'"
                                          d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z"/>
                                </svg>
                                <span
                                    class="text-sm font-medium ms-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">@lang('general.dashboard')</span>
                            </div>
                        </a>
                    </li>
                    <!-- Users -->
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0"
                        :class="{ 'bg-slate-900': page.startsWith('siteUsers') || page.startsWith('addSiteUsers') }"
                        x-data="{ open: false, open1: false }"
                        x-init="$nextTick(() => open = page.startsWith('siteUsers') || page.startsWith('addSiteUsers'))">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150"
                           :class="page.startsWith('siteUsers') || page.startsWith('addSiteUsers') && 'hover:text-slate-200'"
                           @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current text-slate-600"
                                              :class="open &amp;&amp; 'text-indigo-500'"
                                              d="M18.974 8H22a2 2 0 012 2v6h-2v5a1 1 0 01-1 1h-2a1 1 0 01-1-1v-5h-2v-6a2 2 0 012-2h.974zM20 7a2 2 0 11-.001-3.999A2 2 0 0120 7zM2.974 8H6a2 2 0 012 2v6H6v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5H0v-6a2 2 0 012-2h.974zM4 7a2 2 0 11-.001-3.999A2 2 0 014 7z"></path>
                                        <path class="fill-current text-slate-400"
                                              :class="open &amp;&amp; 'text-indigo-300'"
                                              d="M12 6a3 3 0 110-6 3 3 0 010 6zm2 18h-4a1 1 0 01-1-1v-6H6v-6a3 3 0 013-3h6a3 3 0 013 3v6h-3v6a1 1 0 01-1 1z"></path>
                                    </svg>
                                    <span
                                        class="text-sm font-medium ms-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">@lang('users.users')</span>
                                </div>
                                <!-- Icon -->
                                <div
                                    class="flex shrink-0 ms-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ms-1 fill-current text-slate-400"
                                         :class="open && 'transform rotate-180'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="ps-9 mt-1 list-disc"
                                x-transition:enter="transition-all ease-in-out duration-500"
                                x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100"
                                x-transition:leave="transition-all ease-in-out duration-500"
                                x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0"
                                x-show="open"
                                x-cloak>
                                <li class="mb-1 last:mb-0 cursor-pointer"
                                    x-init="$nextTick(() => open1 = page.startsWith('siteUsers') || page.startsWith('addSiteUsers'))">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate ps-2"
                                       :class="{ '!text-slate-200': page.startsWith('siteUsers') || page.startsWith('addSiteUsers')}"
                                       x-on:click="open1 = !open1"
                                       x-cloak>
                                        <span
                                            class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">@lang('users.siteUsers')</span>
                                    </a>
                                    <ul class="ps-4 mt-1 list-disc"
                                        x-transition:enter="transition-all ease-in-out duration-500"
                                        x-transition:enter-start="opacity-25 max-h-0"
                                        x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition-all ease-in-out duration-500"
                                        x-transition:leave-start="opacity-100 max-h-xl"
                                        x-transition:leave-end="opacity-0"
                                        x-show="open1"
                                        x-cloak>
                                        <li class="mb-1 last:mb-0 cursor-pointer">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate ps-2"
                                               :class="{ '!text-slate-200': page.startsWith('siteUsers') }"
                                               href="{{route('siteUsers')}}"
                                               x-cloak>
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">@lang('users.siteUsersList')</span>
                                            </a>
                                        </li>
                                        <li class="mb-1 last:mb-0 cursor-pointer">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate ps-2"
                                               :class="{ '!text-slate-200': page.startsWith('addSiteUsers') }"
                                               href="{{route('addSiteUsers')}}"
                                               x-cloak>
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">@lang('users.addSiteUser')</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="mb-1 last:mb-0 cursor-pointer">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate ps-2"
                                       :class="page === 'settings-account' && '!text-indigo-500'" href="settings.html">
                                        <span
                                            class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Provider users</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0 cursor-pointer">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate ps-2"
                                       :class="page === 'settings-account' && '!text-indigo-500'" href="settings.html">
                                        <span
                                            class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Chipper users</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Settings -->
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 cursor-pointer" x-data="{ open: false }">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150"
                           x-on:click="open = !open"
                           x-cloak>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current text-slate-600"
                                              d="M19.714 14.7l-7.007 7.007-1.414-1.414 7.007-7.007c-.195-.4-.298-.84-.3-1.286a3 3 0 113 3 2.969 2.969 0 01-1.286-.3z"/>
                                        <path class="fill-current text-slate-400"
                                              d="M10.714 18.3c.4-.195.84-.298 1.286-.3a3 3 0 11-3 3c.002-.446.105-.885.3-1.286l-6.007-6.007 1.414-1.414 6.007 6.007z"/>
                                        <path class="fill-current text-slate-600"
                                              d="M5.7 10.714c.195.4.298.84.3 1.286a3 3 0 11-3-3c.446.002.885.105 1.286.3l7.007-7.007 1.414 1.414L5.7 10.714z"/>
                                        <path class="fill-current text-slate-400"
                                              d="M19.707 9.292a3.012 3.012 0 00-1.415 1.415L13.286 5.7c-.4.195-.84.298-1.286.3a3 3 0 113-3 2.969 2.969 0 01-.3 1.286l5.007 5.006z"/>
                                    </svg>
                                    <span
                                        class="text-sm font-medium ms-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Settings</span>
                                </div>
                                <!-- Icon -->
                                <div
                                    class="flex shrink-0 ms-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ms-1 fill-current text-slate-400"
                                         :class="open && 'transform rotate-180'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="ps-9 mt-1"
                                x-transition:enter="transition-all ease-in-out duration-500"
                                x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100"
                                x-transition:leave="transition-all ease-in-out duration-500"
                                x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0"
                                x-show="open"
                                x-cloak>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"
                                       :class="page === 'settings-account' && '!text-indigo-500'" href="settings.html">
                                        <span
                                            class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">My Account</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Expand / collapse button -->
        <div class="pt-3 hidden lg:inline-flex 2xl:hidden justify-end mt-auto">
            <div class="px-3 py-2">
                <button @click="sidebarExpanded = !sidebarExpanded">
                    <span class="sr-only">Expand / collapse sidebar</span>
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"
                         @if(app()->getLocale() == 'he')
                            :class="!sidebarExpanded && 'rotate-180'">
                         @else
                            :class="sidebarExpanded && 'rotate-180'">
                         @endif
                        <path class="text-slate-400"
                              d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z"/>
                        <path class="text-slate-600" d="M3 23H1V1h2z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
