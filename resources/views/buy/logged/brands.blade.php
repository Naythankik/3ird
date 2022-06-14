@extends("buy.logged.main")
@section('body')



    <div class="product">

        {{--            branding--}}
        <div class="brands">
            <div class="branding-header">
                <p>Official Store Brands</p>
            </div>
            <div class="branding-contents">
                @foreach($brands as $brand)
                    @if($brand->brand !== 'all_brands')
                        <a href="/buy/brands/{{$brand->brand}}">
                            <img src="{{ Storage::url('public/products/brand/'.$brand->brand_image) }}" alt="No Image">
                        </a>
                    @endif
                @endforeach
            </div>
        </div>

    </div>

@endsection
