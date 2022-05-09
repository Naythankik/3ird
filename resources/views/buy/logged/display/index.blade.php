<div id="test">
    <div style="width:fit-content;max-height:180px;overflow:auto;word-wrap: break-word;">
        <p>
        @if (session('id') == $product->id)

            @if (session('cart_exist'))
                <div class="alert alert-danger">
                    {{ session('cart_exist') }}
                </div>
            @endif
            @if (session('cart'))
                <div class="alert alert-success">
                    {{ session('cart') }}
                </div>
                @endif

                @endif
                </p>
                <h5 class="card-title" >{{ $product->name }}</h5>
                <p class="mb-0"><strong>{{ $product->quantity }} Items Left</strong></p>
                    <div class="meter orange nostripes">
                        <span style="width:{{ ($product->quantity !== 0) ? ($product->quantity)."%" : "0%"  }}"></span>
                    </div>
                <h6>Price: <i>{{ number_format($product->price,2) }}</i></h6>
                <p class="card-text">{{ $product->description }}</p>
    </div>
</div>