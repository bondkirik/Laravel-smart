@extends('auth.layouts.app')

@isset($category)
    @section('title', 'Edit category ' . $category->name)
@else
    @section('title', 'Create category ')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($category)
            <h1>{{ __('Edit category') }} <b>{{ $category->name }}</b></h1>
        @else
            <h1>{{ __('Add category') }}</h1>
        @endisset

        <form method="POST" enctype="multipart/form-data"
              @isset($category)
              action="{{ route('categories.update', $category) }}"
              @else
              action="{{ route('categories.store') }}"
            @endisset
        >
            <div>
                @isset($category)
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
                               value="@isset($category){{ $category->code }}@endisset">
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
                               value="@isset($category){{ $category->name }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">{{ __('Description') }}: </label>
                    <div class="col-sm-6">
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
							<textarea name="description" id="description" cols="72"
                                      rows="7">@isset($category){{ $category->description }}@endisset</textarea>
                    </div>
                </div>
                <br>

                <button class="btn btn-success">{{ __('Save') }}</button>
            </div>
        </form>
    </div>
@endsection
