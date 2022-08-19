@extends('auth.layouts.app')

@isset($category)
    @section('title', 'Edit category ' . $product->name)
@else
    @section('title', 'Create Product ')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($product)
            <h1>{{ __('Edit category') }}<b>{{ $product->name  }}</b></h1>
        @else
            <h1>{{ __('Add category') }}</h1>
        @endisset

        <form method="POST" enctype="multipart/form-data"
              @isset($product)
              action="{{ route('products.update', $product) }}"
              @else
              action="{{ route('products.store') }}"
            @endisset
        >
            <div>
                @isset($product)
                    @method('PUT')
                @endisset
                @csrf
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">{{ __('code') }}: </label>
                    <div class="col-sm-6">
                        @error('code')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" name="code" id="code"
                               value="@isset($product){{ $product->code }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">{{ __('Name') }}: </label>
                    <div class="col-sm-6">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" name="name" id="name"
                               value="@isset($product){{ $product->name }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">{{ __('Description') }}: </label>
                    <div class="col-sm-6">
                        @error('description')
                        <div class="alert alert-danger">{{ $product }}</div>
                        @enderror
							<textarea name="description" id="description" cols="72"
                                      rows="7">@isset($product){{ $product->description }}@endisset</textarea>
                    </div>
                </div>
                <br>
                    <div class="input-group row">
                        <label for="price" class="col-sm-2 col-form-label">{{ __('Price') }}: </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="price" id="price"
                                   value="@isset($product){{ $product->price }}@endisset">
                        </div>
                    </div>
                    <div class="input-group row">
                        <label for="count" class="col-sm-2 col-form-label">{{ __('Qty') }}: </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="count" id="count"
                                   value="@isset($product){{ $product->count }}@endisset">
                        </div>
                    </div>
                <button class="btn btn-success">{{ __('Save') }}</button>
            </div>
        </form>
    </div>
@endsection
