@extends('auth.layouts.app')

@section('title', 'Category' . $category->name)

@section('content')
    <div class="col-md-12">
        <h1>{{ $category->name }}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Field
                </th>
                <th>
                    Name
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $category->id }}</td>
            </tr>
            <tr>
                <td>Code</td>
                <td>{{ $category->code }}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{ $category->name }}</td>
            </tr>
            <tr>
                <td>Description</td>
                <td>{{ $category->description }}</td>
            </tr>
            <tr>
                <td>Qty of goods</td>
                <td>{{ $category->products->count() }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
