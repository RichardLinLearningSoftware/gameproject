@extends('layouts.index')

@section('title')
    {{ "Profile" }}
@endsection

@section('content')
    <div class="home-main">
        <h1>{{ $user->name }}</h1>
        <p>{{ $user->email }}</p>
        <p>{{ $user->id }}</p>
        <h3>Current match: {{ $user->currentMatch }}</h3>
    </div>
@endsection