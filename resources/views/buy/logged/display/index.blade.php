{{--<p>--}}
{{--            @if (session('id') == $product->id)--}}
{{--                @if (session('cart_exist'))--}}
{{--                    <div class="alert alert-danger">--}}
{{--                        {{ session('cart_exist') }}--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--                @if (session('cart'))--}}
{{--                    <div class="alert alert-success">--}}
{{--                        {{ session('cart') }}--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            @endif--}}
{{--</p>--}}

{{--                    <button class="show" id="1">{{ $product->brand }}</button>--}}

{{--                    <div class="mode hidden">--}}
{{--                        <button class="close">&times;</button>--}}
{{--                        <h5>{{ $product->name }}</h5>--}}
{{--                        <p><b>Description:</b> {{ $product->description }}</p>--}}
{{--                        <p><b>Feature:</b> {{ $product->feature }}</p>--}}
{{--                        <b title="{{ number_format($product->price,2) }}">Price: <i>{{ number_format($product->price,2) }}</i></b>--}}
{{--                    </div>--}}
{{--                    <div class="overlay hidden"></div>--}}
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
                <h6>Price: <i>{{ number_format($product->price,2) }}</i></h6>
                <p class="card-text">{{ $product->description }}</p>
    </div>
</div>