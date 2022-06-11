@extends("buy.logged.main")
@section('body')


    <div class="product">
        <div class="trending">
            <div class="trending-header">
                <p>Low Budgets</p>
                <a href="#">see all <i class="fa fa-arrow-right"></i></a>
            </div>
            <div class="trending-products">
                <div class="trending-info">
                    @foreach($budgets as $product)
                        <a href="/buy/{{$product->id}}" style="text-decoration: none;">

                            <div class="trending-good">
                                <img src="{{ Storage::url('public/products/'.$product->image['image_name']) }}" alt="No mage">
                                <div class="trending-name">
                                    <p>{{ substr($product->name,0,20)."..." }}</p>
                                </div>
                                <div class="trending-price">&#8358; {{ number_format($product->price,2) }}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        {{--            recommendation--}}
        <div class="recommended">
            <div class="trending-header">
                <p>Recommendations for you</p>
            </div>
            <div class="trending-products">
                <div class="trending-info">
                    @foreach($recommends as $product)
                        <a href="/buy/{{$product->id}}" style="text-decoration: none;">

                            <div class="trending-good">
                                <img src="{{ Storage::url('public/products/'.$product->image['image_name']) }}" alt="No mage">
                                <div class="trending-name">
                                    <p>{{ substr($product->name,0,20)."..." }}</p>
                                </div>
                                <div class="trending-price">&#8358; {{ number_format($product->price,2) }}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        {{--            top categories--}}
        <div class="category">
            <div class="trending-header">
                <p>Top Deals | Stay Connected</p>
            </div>
            <div class="trending-products">
                <div class="trending-info">
                    @foreach($category as $product)
                        <a href="/buy/{{$product->id}}" style="text-decoration: none;">

                            <div class="trending-good">
                                <img src="{{ Storage::url('public/products/'.$product->image['image_name']) }}" alt="No mage">
                                <div class="trending-name">
                                    <p>{{ substr($product->name,0,20)."..." }}</p>
                                </div>
                                <div class="trending-price">&#8358; {{ number_format($product->price,2) }}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        {{--            branding--}}
        <div class="brands">
            <div class="branding-header">
                <p>Official Store Brands</p>
            </div>
            <div class="branding-contents">
                @foreach($brands as $brand)
                    <a href="/brands/{{$brand->brand}}">
                        <img src="{{ Storage::url('public/products/brand/'.$brand->brand_image) }}" alt="No Image">
                    </a>
                @endforeach
            </div>
        </div>

        {{--           all products--}}
        <div class="recommended">
            <div class="trending-header">
                <p>All products</p>
            </div>
            <div class="trending-products">
                <div class="trending-info">
                    @foreach($all as $product)
                        <a href="/buy/{{$product->id}}" style="text-decoration: none;">

                            <div class="trending-good">
                                <img src="{{ Storage::url('public/products/'.$product->image['image_name']) }}" alt="No mage">
                                <div class="trending-name">
                                    <p>{{ substr($product->name,0,20)."..." }}</p>
                                </div>
                                <div class="trending-price">&#8358; {{ number_format($product->price,2) }}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
