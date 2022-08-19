@extends('auth.layouts.app')

@section('title', 'Product')

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
                    {{ __('Category') }}
                </th>
                <th>
                    {{ __('Price') }}
                </th>
                <th>
                    {{ __('Qty') }}
                </th>
                <th>
                    {{ __('Options') }}
                </th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->count }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                <a class="btn btn-success" type="button" href="{{ route('products.show', $product) }}">{{ __('Open') }} </a>
                                <a class="btn btn-warning" type="button" href="{{ route('products.edit', $product) }}">{{ __('Edit') }} </a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="remove">
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-success" type="button"
           href="{{ route('products.create') }}">{{ __('Add Service') }}</a>
    </div>
@endsection
