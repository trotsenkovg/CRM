@extends('layouts.base')

@section('body')
    <div class="flex h-screen overflow-hidden"
        x-data="{ sidebarOpen: false }"
        x-cloak>
        <livewire:components.menu-component />
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">
            <livewire:components.header-component />
            <main>
                <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
                    @isset($slot)
                        {{ $slot }}
                    @endisset
                </div>
            </main>
        </div>
    </div>
@endsection
