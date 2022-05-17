@extends('buy.logged.main')
@section('body')

{{--    check if the array for orders list is empty--}}
        @if(!empty($orders->toArray()))
            @foreach($orders as $id => $order)
                <div id="body">
                    <img src="{{ Storage::url("public/products/".$order->image['image_name']) }}" alt="My name is Nathaniel Abolarin">
                    <div id="contents">
                        <h4>{{ $order->product['name'] }}</h4>
                        <p>Order {{$order['order_number']}}</p>
                        <div id="list">
                            <p>On {{ date("d-m-Y",strtotime($order['created_at'])) }}</p>
                        </div>
                    </div>
                    <a class="see-details">See Details</a>

{{--                    modal for viewing details of products--}}
                    <div id="myModal-body">
                        <div class="myModal-content">
                            <span class="close-contents">&times;</span>
                            <div class="details">
                                <h3>Product's Details</h3>
                                <label for="name" style="text-decoration: none;font-weight: bold; color: #4babca">Name</label>
                                <p>{{ $order->product['name'] }}</p>
                                <label for="desc" style="text-decoration: none;font-weight: bold; color: #4babca">Description</label>
                                <p>{{ $order->product['description'] }}</p>
                                <label for="desc" style="text-decoration: none;font-weight: bold; color: #4babca">Order Number</label>
                                <p>{{ $order['order_number'] }}</p>
                                <label for="desc" style="text-decoration: none;font-weight: bold; color: #4babca">Payment method</label>
                                <p>Paystack</p>
                                <label for="desc" style="text-decoration: none;font-weight: bold; color: #4babca">Payment Details</label>
                                <p>Item total: &#8358; {{ number_format($order->product['price'],2) }}</p>
                                <p>Shipping Fee : 200</p>
                                <p>Total : &#8358; {{ number_format($order->product['price'] + 200,'2') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        @else
        <div class="carts">
            <img src="{{ Storage::url('/logo/order.jpeg') }}">
            <div class="contents">
                <p>Nothing to show here</p>
                <p>Your Order is empty!</p>
                <p style="margin-top: 14px">Browse our categories and discover our best deals!</p>
            </div>
            <a class="btn btn-warning fw-bold" href="/buy">Start Shopping</a>
        </div>
        @endif

@endsection
