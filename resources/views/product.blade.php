@extends('layouts.master')

@section('title', 'Product')

@section('content')
    <h1>{{ $product->name }}</h1>
    <h2>{{ $product->category->name }}</h2>
    <p>{{ __('Price') }}: <b>{{ $product->price }} {{ __('EUR') }}.</b></p>
    <p>{{ $product->description }}</p>
    <form action="{{ route('basket-add', $product) }}" method="POST">
        @if($product->isAvailable())
            <button type="submit" class="btn btn-primary" role="button">{{ __('Buy') }}</button>
        @else
            {{ __('Not Available') }}
        @endif
        @csrf
    </form>
@endsection
