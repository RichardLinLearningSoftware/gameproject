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
        <h2>Game id: {{$game->id}}</h2>
        <h3>Player one: {{$game->player1Id}}</h3>
        <h3>Player two: {{$game->player2Id}}</h3>
        <p>Current round: {{ $game->round }}</p>
        <p>is active: {{ $game->isActive }}</p>
        <p>Winner: {{ $game->winnerId }}</p>
    @endauth
@endsection