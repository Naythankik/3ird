@extends("buy.logged.main")
@section('body')


    <div class="row mt-1 row-cols-md-4 g-4 ">
        @foreach($products as $id => $product)
            <div class="col">
                <div class="card">
                    @include('buy.logged.display.image')
                    <div class="card-body">
                        @include('buy.logged.display.index')
                        <a href="/buy/add_to_cart/{{$product->id}}" class="btn d-flex justify-content-center btn-success text-dark fw-bold mt-2">ADD TO CART</a>
                        <a href="/buy/wishlist/{{ $product->id }}" class="btn d-flex justify-content-center btn-outline-danger mt-2" title="Add to Wishlist">&#10084;</a>
                    </div>
                </div>
            </div>

        @endforeach
    </div>

@endsection
