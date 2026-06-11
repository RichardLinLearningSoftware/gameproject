@extends('layouts.index')

@section('title')
    {{ "Players" }}
@endsection

@section('content')
    <h1>Playerlist</h1>
    <div class="home-main">
        @foreach ($users as $user)
            @if($user->id != Auth::id())
                <h3>{{ $user->name }}</h3>
                <p>{{ $user->email }}</p>
                <p>{{ $user->id }}</p>
                <a href="{{ route('players.show', $user->id) }}">
                    View profile
                </a>
                <br>
                <form method="POST" action="{{ route('players.destroy', $user->id) }}">
                    @csrf
                    @method('DELETE')

                    <button type="submit">Delete</button>
                </form>
            @endif
        @endforeach
    </div>
@endsection