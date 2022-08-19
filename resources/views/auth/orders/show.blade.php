@extends('auth.layouts.app')

@section('title', 'Order ' . $order->id)

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="justify-content-center">
                <div class="panel">
                    <h1>Order №{{ $order->id }}</h1>
                    <p>Company: <b>{{ $order->name }}</b></p>
                    <p>Phone: <b>{{ $order->phone }}</b></p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th> {{ __('Name') }}</th>
                            <th>{{ __('Qty') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th>{{ __('Sum') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products  as $product)
                            <tr>
                                <td>
                                    <a href="{{ route('product', $product) }}">
                                        {{ $product->name }}
                                    </a>
                                </td>
                                <td><span class="badge">1</span></td>
                                <td>{{ $product->price }} EUR.</td>
                                <td>{{ $product->getPriceForCount()}} EUR.</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">SUM:</td>
                            <td>{{ $order->calculateFullSum() }} EUR.</td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
