@extends('layouts.index')
@section('title')
    {{ "Product" }}
@endsection

@section('content')
    <h2>Products</h2>
    @foreach ($products as $products)
        <p>{{$products}}</p>
    @endforeach
@endsection