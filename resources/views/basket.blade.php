@extends('layouts.master')

@section('title', 'Basket')

@section('content')
    <h1>{{ __('Basket') }}</h1>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Qty') }}</th>
                <th>{{ __('Price') }}</th>
                <th>{{ __('SUM') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->products as $product)
                <tr>
                    <td>
                        <a href="{{ route('product', [$product->category->code, $product->code]) }}">
                            {{ $product->name }}
                        </a>
                    </td>
                    <td><span class="badge">{{ $product->pivot->count }}</span>
                        <div class="btn-group form-inline">
                            <form action="{{ route('basket-remove', $product) }}" method="POST">
                                <button type="submit" class="btn btn-light"
                                        href=""><span>-</span></button>
                                @csrf
                            </form>
                            <form action="{{ route('basket-add', $product) }}" method="POST">
                                <button type="submit" class="btn btn-dark"
                                        href=""><span>+</span></button>
                                @csrf
                            </form>
                        </div>
                    </td>
                    <td>{{ $product->price }} {{ __('EUR') }}</td>
                    <td>{{ $product->getPriceForCount() }} {{ __('EUR') }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3">SUM:</td>
                <td>{{ $order->calculateFullSum() }} {{ __('EUR') }}</td>
            </tr>
            </tbody>
        </table>
        <br>
        <div class="btn-group pull-right" role="group">
            <a type="button" class="btn btn-success" href="{{ route('basket-place') }}">
                {{ __('Checkout') }}
            </a>
        </div>
@endsection
