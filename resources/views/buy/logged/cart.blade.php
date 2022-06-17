@extends('buy.logged.main')
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
        <div class="cart-body">
            <div class="cart-header">
                <b>Shopping Cart</b>
                <a href="#" style="text-decoration: none">Remove all</a>
            </div>
            @foreach($carts as $cart)
                <div class="cart-content">
                    <img src="{{ \Illuminate\Support\Facades\Storage::url('public/products/'.$cart->product->image['image_name']) }}" alt="" />
                    <div class="cart-product-name">
                        <a href="/buy/{{$cart->product_id}}" style="text-decoration: none; color: black">
                            <p>{{ substr($cart->product['name'],0,20)."..." }}</p>
                            <p>{{ $cart->product['brand'] }}</p>
                            <p>{{ number_format($cart->product['price'],2) }}</p>
                        </a>
                    </div>
                    <div class="cart-product-quantity">
                        <span id="add">+</span>
                        <span id="quantity">1</span>
                        <span id="subtract">-</span>
                    </div>
                    <div class="cart-prices">
                        <p id="price">{{ number_format($cart->product['price'],2) }}</p>
                        <a href="/buy/remove_cart/{{ $cart->product_id }}" >Remove</a>
                    </div>
                </div>
            @endforeach
            <div class="cart-payment">
                <hr>
                <div class="cart-total">
                    <input type="text" id="total" value="{{ number_format($price,2) }}" >
                    <span>
                        <p>Sub Total</p>
                        <p>{{ count($carts) }} Items</p>
                    </span>
                </div>
                @if($price > 0)
                    <div class="cart-pay">
                        <form id="paymentForm">
                            @csrf
                            <input type="hidden" id="email-address" value="{{ auth()->user()->email}}">
                            <input type="hidden" id="amount" value="{{ $price }}">
                            <input type="hidden" id="first-name" value="{{ auth()->user()->first_name }}">
                            <input type="hidden" id="last-name" value="{{ auth()->user()->last_name }}">
                            <button type="submit" id="pay-now" class="btn btn-success mt-1">checkout</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    @endif
@endsection






