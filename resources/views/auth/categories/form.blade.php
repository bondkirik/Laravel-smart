@extends('auth.layouts.app')

@isset($category)
    @section('title', 'Edit category ' . $category->name)
@else
    @section('title', 'Create category ')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($category)
            <h1>Edit category <b>{{ $category->name }}</b></h1>
        @else
            <h1>Add category</h1>
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
                    <label for="code" class="col-sm-2 col-form-label">code: </label>
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
                    <label for="name" class="col-sm-2 col-form-label">Name: </label>
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
                    <label for="description" class="col-sm-2 col-form-label">Description: </label>
                    <div class="col-sm-6">
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
							<textarea name="description" id="description" cols="72"
                                      rows="7">@isset($category){{ $category->description }}@endisset</textarea>
                    </div>
                </div>
                <br>
{{--                <div class="input-group row">--}}
{{--                    <label for="image" class="col-sm-2 col-form-label">Image: </label>--}}
{{--                    <div class="col-sm-10">--}}
{{--                        <label class="btn btn-default btn-file">--}}
{{--                            Загрузить <input type="file" style="display: none;" name="image" id="image">--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <button class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
@endsection