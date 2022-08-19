@extends('auth.layouts.app')

@section('title', 'Category' . $category->name)

@section('content')
    <div class="col-md-12">
        <h1>{{ $category->name }}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    {{ __('Field') }}
                </th>
                <th>
                    {{ __('Field') }}
                </th>
            </tr>
            <tr>
                <td>{{ __('ID') }}</td>
                <td>{{ $category->id }}</td>
            </tr>
            <tr>
                <td>{{ __('Code') }}</td>
                <td>{{ $category->code }}</td>
            </tr>
            <tr>
                <td>{{ __('Name') }}</td>
                <td>{{ $category->name }}</td>
            </tr>
            <tr>
                <td>{{ __('Description') }}</td>
                <td>{{ $category->description }}</td>
            </tr>
            <tr>
                <td>{{ __('Qty of goods') }}</td>
                <td>{{ $category->products->count() }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
