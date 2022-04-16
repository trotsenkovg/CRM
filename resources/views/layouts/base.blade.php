<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="data()"
      x-init="setLocale('{{app()->getLocale()}}')">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @hasSection('title')
        <title>@yield('title')</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

<!-- Favicon -->
    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ url(mix('js/app.js')) }}" defer></script>
    {{--<script src="{{ url(mix('js/app.js')) }}"></script>--}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body
    class="font-inter antialiased bg-slate-100 text-slate-600"
    x-data="{ page: '{{ Request::path() }}', sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true' }"
    :class="{ 'sidebar-expanded': sidebarExpanded }"
    x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))"
    dir="{{ app()->getLocale() == 'he' ? 'rtl' : 'ltr' }}"
>
@yield('body')

@livewireScripts
<script src="js/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
</body>
</html>
