@extends('layouts.index')
@section('title')
    {{ "Game" }}
@endsection

@section('content')
    <h2>Game match</h2>
    @guest
        <p>Pls login to join a game</p>
    @endguest
@endsection