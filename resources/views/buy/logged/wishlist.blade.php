@extends("buy.logged.main")
@section('body')


    @if(session('delete'))
        <p class="alert alert-info mx-2 my-5 w-25" style="display: flex; justify-content: center;">{{ session('delete') }}</p>
    @endif
    <div class="row row-cols- row-cols-md-4 g-4 ">

        @foreach($wishes as $wish)
            <div class="col">
                <div class="card mt-3 ms-2 me-2">

                    @include('buy.logged.display.image',['product' => $wish->product])

                    <div class="card-body">

                        @include('buy.logged.display.index',['product' => $wish->product])

                        <div style="display: flex; justify-content: center" class="mt-2 ms-2">

                            <!-- Button trigger modal for removing product from cart-->
                            <div class="d-grid">
                                <a href="/buy/add_to_cart/{{$wish->product_id}}" class="btn btn-success my-2 fw-bold text-dark" data-bs-target="#exampleModal">
                                    Add to Cart
                                </a>
                                <a href="/buy/remove/{{ $wish->product_id }}" type="button" class="btn btn-danger">Yes, I want to remove it!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection