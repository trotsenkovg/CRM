@extends('layouts.base')

@section('body')
    <div class="flex h-screen overflow-hidden">
    @include('components.menu')

        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">
    @yield('content')

    @isset($slot)
        {{ $slot }}
    @endisset
        </div>
    </div>
@endsection