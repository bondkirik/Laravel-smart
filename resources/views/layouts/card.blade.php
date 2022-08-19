<div class="col-sm-6 col-md-4">
    <div class="card" >
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->description }}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item ">{{ $product->price }} {{ __('EUR') }}.</li>
        </ul>
        <div class="card-body">
            <form action="" method="POST">
                <button type="submit" class="btn btn-primary" role="button">{{ __('Buy') }}</button>
                <a class="btn btn-info"
                   href="{{ route('product', [isset($category) ? $category->code : $product->category->code, $product->code]) }}"
                   role="button">Info</a>
                @csrf
            </form>
        </div>
    </div>
</div>
