@extends("buy.logged.main")
@section('body')


    @if(session('delete'))
        <p class="alert alert-info mx-2 my-5 w-25" style="display: flex; justify-content: center;">{{ session('delete') }}</p>
    @endif

    @if($price == 0)
        <div class="carts">
            <img src="{{ Storage::url('/logo/cart.jpeg') }}">
            <div class="contents">
                <p>Nothing to show here</p>
                <p>Your cart is empty!</p>
                <p style="margin-top: 14px">Browse our categories and discover our best deals!</p>
            </div>
            <a class="btn btn-warning fw-bold" href="/buy">Start Shopping</a>
        </div>
    @else
        <div class="row row-cols- row-cols-md-4 g-4 ">
            @foreach($carts as $cart)
                <div class="col">
                    <div class="card mt-3 ms-2 me-2">

                        @include('buy.logged.display.image',['product' => $cart->product])

                        <div class="card-body">

                            @include('buy.logged.display.index',['product' => $cart->product])

                            <div style="display: flex; justify-content: center" class="mt-2 ms-2">

                                <!-- Button trigger modal for removing product from cart-->
                                <button type="button" class="btn btn-danger fw-bold text-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Remove from cart
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Do you want to remove product from cart?
                                            </div>
                                            <div class="modal-footer" style="display: flex; justify-content: space-between">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, I did not!</button>
                                                <a href="/buy/remove_cart/{{ $cart->product_id }}" type="button" class="btn btn-primary">Yes, I want to remove it!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @if($price > 0)
        <div class="mt-5">
            <div class="p-1 m-1" style="display: flex; justify-content: center">
                <b class="">Total Amount: {{ number_format($price,2) }}</b>
            </div>
            <form id="paymentForm">
                @csrf
                <input type="hidden" id="email-address" value="{{ auth()->user()->email}}">
                <input type="hidden" id="amount" value="{{ $price }}">
                <input type="hidden" id="first-name" value="{{ auth()->user()->first_name }}">
                <input type="hidden" id="last-name" value="{{ auth()->user()->last_name }}">
                <div class="" style="display: flex; justify-content: center">
                    <button type="submit" id="pay-now" class="btn btn-success mt-1">Payment</button>
                </div>
            </form>
        </div>
    @else
    @endif
@endsection
