@extends("buy.logged.main")
@section('body')

    @if(session('delete'))
        {{ session('delete') }}
    @endif

    @if(count($wishes) > 0)
        <div class="wish-body">
            @foreach($wishes as $wish)
                <div class="wish-content">
                   <div class="wish-display">
                       <a href="/buy/{{$wish->product->id}}" style="text-decoration: none;">
                           <div class="wish-info">
                               <img src="{{ Storage::url('public/products/'.$wish->product->image['image_name']) }}" alt="No image">
                               <p>{{ substr($wish->product['name'],0,20)."..." }}</p>
                               <p> &#8358; {{ number_format($wish->product->price,2) }}</p>
                           </div>
                       </a>
                   </div>
                    <div class="wish-action">
                        <a href="/buy/add_to_cart/{{$wish->product_id}}" id="wishes">Add to Cart</a>
                        <a href="/buy/remove/{{ $wish->product_id }}">Remove From Wish</a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="carts">
            <img src="{{ Storage::url('/logo/wish.png') }}">
            <div class="contents">
                <p>Nothing to show here</p>
                <p>Your Wish List is empty!</p>
                <p style="margin-top: 14px">Browse our categories and discover our best deals!</p>
            </div>
            <a class="btn btn-warning fw-bold" href="/buy">Start Shopping</a>
        </div>
    @endif
@endsection
