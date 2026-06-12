@extends('layouts.index')
@section('title')
    {{ "Game" }}
@endsection

@section('content')
    <h2>Game match</h2>
    @guest
        <p>Pls login to join a game</p>
    @endguest
    @auth
        @if(Auth::user()->currentMatch != 0)
            <a href="{{ route('game.show', Auth::id()) }}">
                View current match
            </a>
        @else
            You arent in a match
            <a href="/players">Invite a player</a>
        @endif
    @endauth
@endsection