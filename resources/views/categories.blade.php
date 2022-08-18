@extends('layouts.master')

@section('title', 'Categories')

@section('content')
    @foreach($categories as $category)
        <div class="container">
            <a href="{{ route('category', $category->code) }}">
                <h2>{{ $category->name }}</h2>
            </a>
            <p>
                {{ $category->description }}
            </p>
        </div>
    @endforeach
@endsection
