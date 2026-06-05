@extends('layouts.index')
@section('title')
    {{ "Test" }}
@endsection

@section('content')
    <h2>Hi</h2>
    @if ($isAdmin)
        <p>User is admin</p>
    @endif
@endsection