@extends('buy.logged.main')
@section('body')
    @if(count($products) == 0)
        <div class="carts">
            <img src="{{ Storage::url('/logo/search.jpeg') }}" style="width: 20%">
            <div class="contents">
                @if(isset($_GET['q']))
                    <p>There are no results for
                        <span class="search text-danger" style="cursor: pointer" title="{{$_GET['q']." is not found" }}">“{{ $_GET['q'] }}”</span>.
                    </p>
                @endif
                <p>- Check your spelling for typing errors</p>
                <p>- Try searching with short and simple keywords</p>
                <p>- Try searching more general terms - you can then filter the search results</p>
            </div>
            <a class="btn btn-warning fw-bold" href="/buy">Go to Homepage</a>
        </div>
    @else
        @if($headers)
            <div class="brand-header">
                <img src="{{Storage::url('public/products/brand/header/'.$headers->brand_image_header)}}">
            </div>
        @endif
        <div class="distinct-body">
            <div class="distinct-header">
        <span>
            <p>{{ ucwords($category) }}</p>
        <p>Something Fizzy</p>
        </span>
                <span>
                <p>{{count($products)}} Products Found</p>
            </span>
            </div>

            <div class="distinct-contents">
                @foreach($products as $product)
                    <a href="/buy/{{$product->id}}" style="text-decoration: none;">
                        <div class="distinct-info">
                            <img src="{{ Storage::url('public/products/'.$product->image['image_name']) }}" alt="No image">
                            <p>{{ $product->name }}</p>
                            <p> &#8358; {{ number_format($product->price,2) }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

@endsection