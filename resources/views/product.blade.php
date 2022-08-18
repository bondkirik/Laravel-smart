@extends('layouts.master')

@section('title', 'Product')

@section('content')
    <h1>{{ $product->name }}</h1>
    <h2>{{ $product->category->name }}</h2>
    <p>Price: <b>{{ $product->price }} EUR.</b></p>
    <p>{{ $product->description }}</p>
    <form action="" method="POST">

            <button type="submit" class="btn btn-primary" role="button">Buy</button>

        @csrf
    </form>
@endsection
