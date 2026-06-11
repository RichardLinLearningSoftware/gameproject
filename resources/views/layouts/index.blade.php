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
        <header class="header-gap">
            <a href="/">home</a>
            <a href="/contact">contact</a>
            <a href="/game">game</a>
            <a href="/players">Player list</a>
            @guest
                <a href="{{ route('login') }}">Log in</a>
                <a href="{{ route('register') }}"> Register</a>
            @endguest
            
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @endauth
        </header>

        <main class="content-body">
            @yield('content')
        </main>

        <footer>
            footer wow
        </footer>
    </body>
</html>