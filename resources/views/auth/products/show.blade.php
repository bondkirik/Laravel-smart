@extends('auth.layouts.app')

@section('title', 'Product' . $product->name)

@section('content')
    <div class="col-md-12">
        <h1>{{ $product->name }}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    {{ __('Field') }}
                </th>
                <th>
                    {{ __('Name') }}
                </th>
            </tr>
            <tr>
                <td> {{ __('ID') }}</td>
                <td>{{ $product->id }}</td>
            </tr>
            <tr>
                <td>{{ __('Code') }}</td>
                <td>{{ $product->code }}</td>
            </tr>
            <tr>
                <td>{{ __('Name') }}</td>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <td>{{ __('Description') }}</td>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <td>{{ __('Qty of service') }}</td>
                <td>{{ $product->category->name }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
