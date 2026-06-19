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
            <h2>You arent in a match</h2>
            <form action="{{ route('game.store') }}" method="POST">
                @csrf
                <select name="player2Id" required>
                    @foreach ( $users as $user )
                        @if($user->id != Auth::id())
                            <option value={{$user->id}}>
                                {{$user->name}}
                            </option>
                        @endif
                    @endforeach
                </select>
                <input type="submit" value="Invite">
            </form>
        @endif
    @endauth
@endsection