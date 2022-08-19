@extends('auth.layouts.app')

@section('title', 'Order')

@section('content')
    <div class="col-md-12">
        <h1>Order</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    {{ __('Company Name') }}
                </th>
                <th>
                    {{ __('Phone') }}
                </th>
                <th>
                    {{ __('Order time') }}
                </th>
                <th>
                    {{ __('Sum') }}
                </th>
                <th>
                    {{ __('Options') }}
                </th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id}}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->created_at->format('H:i d/m/Y') }}</td>
                    <td>{{ $order->calculateFullSum() }}   {{ __('EUR') }}.</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a class="btn btn-success" type="button"
                               @admin
                               href="{{ route('orders.show', $order) }}"
                               @else
                               href="{{ route('person.orders.show', $order) }}"
                               @endadmin
                            >Open</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
