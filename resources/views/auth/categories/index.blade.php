@extends('auth.layouts.app')

@section('title', 'Categories')

@section('content')
    <div class="col-md-12">
        <h1>{{ __('Categories') }}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    {{ __('Code') }}
                </th>
                <th>
                    {{ __('Name') }}
                </th>
                <th>
                    {{ __('Options') }}
                </th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->code }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                <a class="btn btn-success" type="button" href="{{ route('categories.show', $category) }}">{{ __('Open') }}</a>
                                <a class="btn btn-warning" type="button" href="{{ route('categories.edit', $category) }}">{{ __('Edit') }}</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="remove"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-success" type="button"
           href="{{ route('categories.create') }}">{{ __('Add category') }}</a>
    </div>
@endsection
