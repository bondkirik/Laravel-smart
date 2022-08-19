@extends('layouts.master')

@section('title', 'Order')

@section('content')
    <div class="container">
        <h1 class="text-center"> {{ __('Confirm order') }}</h1>
        <div class="card-body text-center">
            <p>SUM: <b>{{ $order->calculateFullSum() }} {{ __('EUR') }}</b></p>
            <form action="{{ route('basket-confirm') }}" method="POST">
                <div>
                    <p>{{ __('Company name and phone number') }} :</p>
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label text-right">{{ __('Company name') }}: </label>
                            <div class="col-sm-4">
                                <input type="text" name="name" id="name"
                                       @auth
                                       value="{{ Auth::user()->name}}" readonly
                                       @endauth
                                       class="form-control" placeholder="Company name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-4 col-form-label text-right">
                                {{ __('Phone number') }}
                            </label>
                            <div class="col-sm-4">
                                <input type="text" name="phone" id="phone" value="" class="form-control" placeholder="Phone number">
                            </div>
                        </div>
                    @csrf
                    <input type="submit" class="btn btn-success" value="Confirm order">
                </div>
            </form>
        </div>
    </div>
@endsection
