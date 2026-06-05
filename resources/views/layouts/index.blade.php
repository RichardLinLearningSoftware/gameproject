<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <link rel="icon" href="{{ asset('yum.gif') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    </head>
    <body>
        <header>
            <a href="/">home</a>
            <a href="/contact">contact</a>
            <a href="/about">about</a>
        </header>

        <main class="content-body">
            @yield('content')
        </main>

        <footer>
            footer wow
        </footer>
    </body>
</html>