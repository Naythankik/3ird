@extends('sell.logged_in.main')
@section('body')
<div class="seller-product">
    @if(session('success'))
        <p id="alert" class="alert alert-success text-center mt-1">{{ session('success') }}</p>
    @endif

    <form method="post" action="/products/" enctype="multipart/form-data" class="px-3 m-2 mt-4">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Product's Name</label>
            <input type="text" class="form-control"  name="name" placeholder="Enter product's Name..." id="exampleFormControlInput1" value="{{ old('name') }}">
        </div>
        @error('name')
        <p class="alert alert-danger p-1">{{$message}}</p>
        @enderror

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Product's Brand</label>
            <input type="text" class="form-control"  name="brand" placeholder="Enter product's Brand..." id="exampleFormControlInput1" value="{{ old('brand') }}">
        </div>
        @error('brand')
        <p class="alert alert-danger p-1">{{$message}}</p>
        @enderror

        <div class="mb-3">
            <input type="text" name="email" class="form-control" id="exampleFormControlInput1" value="{{ $user->email }}" hidden>
        </div>


        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" placeholder="Product's description should be here..." value="{{ old('description') }}"></textarea>
        </div>
        @error('description')
        <p class="alert alert-danger p-1">{{$message}}</p>
        @enderror

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Features</label>
            <textarea class="form-control" name="feature" id="exampleFormControlTextarea1" rows="3" placeholder="Product's features should be here..." value="{{ old('feature') }}"></textarea>
        </div>
        @error('feature')
        <p class="alert alert-danger p-1">{{$message}}</p>
        @enderror

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Price</label>
            <input type="text" name="price" class="form-control" id="exampleFormControlInput1" value="{{ old('price') }}" placeholder="Enter Product's Price...">
        </div>
        @error('price')
        <p class="alert alert-danger p-1">{{$message}}</p>
        @enderror

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" id="exampleFormControlInput1" value="{{ old('quantity') }}" placeholder="99">
        </div>
        @error('quantity')
        <p class="alert alert-danger p-1">{{$message}}</p>
        @enderror

        <div class="mb-3">
            <label for="formFileMultiple" class="form-label">Product's Image(s)</label>
            <input class="form-control" type="file" name="image[]" id="formFileMultiple" multiple>
        </div>
        @error('image')
        <p class="alert alert-danger p-1">{{$message}}</p>
        @enderror

        <label for="formFileMultiple" class="form-label">Category</label>
        <select class="form-select" name="category" aria-label="Default select example">
            <option disabled>Select Category</option>
            @foreach(config('product')['categories'] as $key => $value)
                <option value="{{ $key }}">{{ ucwords($value) }}</option>
            @endforeach
        </select>
        <div class="col-12 mt-3 seller-button">
            <button type="submit" onclick="sell()" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
@endsection
