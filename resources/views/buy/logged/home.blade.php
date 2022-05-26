@extends("buy.logged.main")
@section('body')

    @if(!empty($products->toArray()))
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
    @else
        <div class="carts">
            <img src="{{ Storage::url('/logo/search.jpeg') }}">
            <div class="contents">
                <p>There are no results for <span class="search text-danger" style="cursor: pointer" title="{{$_GET['q']." is not found" }}">“{{ $_GET['q'] }}”</span>.</p>
                <p>- Check your spelling for typing errors</p>
                <p>- Try searching with short and simple keywords</p>
                <p>- Try searching more general terms - you can then filter the search results</p>
            </div>
            <a class="btn btn-warning fw-bold" href="/buy">Go to Homepage</a>
        </div>
    @endif



@endsection
