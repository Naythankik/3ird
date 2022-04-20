@extends("buy.logged.main")
@section('body')


    <div class="row row-cols- row-cols-md-4 g-4 ">
        @foreach($products as $id => $product)
            <div class="col">
                <div class="card">

                    @include('buy.logged.display.image')

                    <div class="card-body">

                        @include('buy.logged.display.index')

                        <a href="/buy/add_to_cart/{{$product->id}}" class="btn btn-success text-dark fw-bold mt-2">ADD TO CART</a>


                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
