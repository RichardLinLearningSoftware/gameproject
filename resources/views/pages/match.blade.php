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
        @if($game->isActive)
            <p>is active: true</p>
        @else
            <p>is active: false</p>
        @endif
        <p>Winner: {{ $game->winnerId }}</p>
        <p>Player one choice: {{ $game->player1Choice }}</p>
        <p>player two choice: {{ $game->player2Choice }}</p>

        @if(Auth::id() == $game->player1Id || Auth::id() == $game->player2Id)
            @if($game->isActive)
                <form action="{{ route('game.update', $game->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <select name="choice" required>
                        <option value="rock">rock</option>
                        <option value="paper">paper</option>
                        <option value="scicors">scicors</option>
                    </select>
                    <input type="submit" value="Play">
                </form>
            @endif
        @endif
    @endauth
@endsection