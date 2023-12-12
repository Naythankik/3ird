@extends('buy.logged.main')
@section('body')

<div class="page">
    @foreach($products as $product)
        <div class="image">
            @if(session('cart_exist'))
                <div class="error">
                    <span>{{ session('cart_exist') }}</span>
                </div>
            @endif
            @if(session('cart'))
                <div class="success error">
                    <span>{{ session('cart') }}</span>
                </div>
            @endif
                <button class="back" onclick="history.back()">Back</button>
            <div class="display">
                @if(count($product->images) > 1)
                    <div class="buttons">
                        <button id="previous"><</button>
                        <button id="next">></button>
                    </div>
                @endif
                <img src="{{$image['image_name'] }}" id="active-image" alt="" />
            </div>
            <div class="display-list">
                @foreach($product->images as $image)
                    @if(count($product->images) > 1)
                        <img src="{{ $image->image_name }}" alt="" />
                    @endif
                @endforeach
            </div>
        </div>
        <div class="properties">
            <div class="name">
                <p>{{ $product->name }}</p>
                <p>
                    <i class="fa fa-star"></i><i class="fa fa-star"></i
                    ><i class="fa fa-star"></i><i class="fa fa-star"></i
                    ><i class="fa fa-star"></i><b style="margin-left: 10px">4.5</b>
                </p>
            </div>
            <div class="brand">
                <a href="{{'/buy/brands/'.$product->brand}}">Brand: {{ $product->brand }}</a>
                <a href="{{'/buy/category/'.$product->category}}">Category: {{ ucwords($product->category) }}</a>
            </div>
            <div class="product-property">
                <div class="classify">
                    <p>Features</p>
                    <p>Description</p>
                </div>
                <div class="features">
                    <ul>
                        @php
                            $strings = explode('.',$product->feature);
                        @endphp
                        @foreach($strings as $string)
                            @if($string !== "")
                                <li>{{ $string.'.' }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="description" hidden>
                    <ul>
                        @php
                            $strings = explode('.',$product->description);
                        @endphp
                        @foreach($strings as $string)
                            @if($string !== "")
                                <li>{{ $string.'.' }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="product-prices">
                    <div class="price">
                        <p>Price:</p>
                        <p>&#8358; {{ number_format($product->price,2) }}</p>
                    </div>
                    <span>{{ $product->quantity }} items left</span>
                    <div class="quantity">
                        <span class="progress" style="width: {{ $product->quantity }}%; background: {{($product->quantity <= 20) ? 'red' : 'green'}} ">

                        </span>
                    </div>
                    <div class="action">
                        <a href="/buy/add_to_cart/{{$product->id}}">ADD TO CART</a>
                        <a href="/buy/wishlist/{{$product->id}}">ADD TO WISH LIST</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
