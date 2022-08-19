@extends('auth.layouts.app')

@section('title', 'Order ' . $order->id)

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="justify-content-center">
                <div class="panel">
                    <h1>{{ __('Order') }} №{{ $order->id }}</h1>
                    <p>{{ __('Company') }}: <b>{{ $order->name }}</b></p>
                    <p>{{ __('Phone') }}: <b>{{ $order->phone }}</b></p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Qty') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th>{{ __('Sum') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($order->products as $product)
                            <tr>
                                <td>
                                    <a href="{{ route('product', $product) }}">
                                        {{ $product->name }}
                                    </a>
                                </td>
                                <td><span class="badge">1</span></td>
                                <td>{{ $product->price }} {{ __('EUR') }}.</td>
                                <td>{{ $product->getPriceForCount()}} {{ __('EUR') }}.</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">SUM:</td>
                            <td>{{ $order->calculateFullSum() }} {{ __('EUR') }}.</td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
