@extends('auth.layouts.app')

@section('title', 'Product')

@section('content')
    <div class="col-md-12">
        <h1>Categories</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Code
                </th>
                <th>
                    Name
                </th>
                <th>
                    Category
                </th>
                <th>
                    Price
                </th>
                <th>
                    Qty
                </th>
                <th>
                    Options
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
                                <a class="btn btn-success" type="button" href="{{ route('products.show', $product) }}">Open</a>
                                <a class="btn btn-warning" type="button" href="{{ route('products.edit', $product) }}">Edit</a>
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
           href="{{ route('products.create') }}">Add Product</a>
    </div>
@endsection
