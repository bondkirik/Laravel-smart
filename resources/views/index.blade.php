@extends('layouts.master')

@section('title', 'Main')

@section('content')
    <div class="row">
        @foreach($products as $product)
            @include('layouts.card', compact('product'))
        @endforeach
    </div>
@endsection
