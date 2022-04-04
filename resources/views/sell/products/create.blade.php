@extends('sell.logged_in.main')
@section('body')



    <h3 class="px-5 mt-5 text-decoration-underline">Products Information</h3>
    @if(session('success'))
        <p id="alert" class="alert alert-success px-5 w-50 mt-1" hidden>{{ session('success') }}</p>
    @endif

    <form method="post" action="/products/" enctype="multipart/form-data" class="px-5 m-2 mt-4">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Product's Name</label>
            <input type="text" class="form-control w-50"  name="name" placeholder="Enter product's Name..." id="exampleFormControlInput1" value="{{ old('name') }}">
        </div>
        @error('name')
        <p class="alert alert-danger w-50 p-1">{{$message}}</p>
        @enderror

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Product's Brand</label>
            <input type="text" class="form-control w-50"  name="brand" placeholder="Enter product's Brand..." id="exampleFormControlInput1" value="{{ old('brand') }}">
        </div>
        @error('brand')
        <p class="alert alert-danger w-50 p-1">{{$message}}</p>
        @enderror

        <div class="mb-3">
            <input type="text" name="email" class="form-control w-50" id="exampleFormControlInput1" value="{{ $user->email }}" hidden>
        </div>


        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control w-50" name="description" id="exampleFormControlTextarea1" rows="3" placeholder="Product's description should be here..." value="{{ old('description') }}"></textarea>
        </div>
        @error('description')
        <p class="alert alert-danger w-50 p-1">{{$message}}</p>
        @enderror

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Features</label>
            <textarea class="form-control w-50" name="feature" id="exampleFormControlTextarea1" rows="3" placeholder="Product's features should be here..." value="{{ old('feature') }}"></textarea>
        </div>
        @error('feature')
        <p class="alert alert-danger w-50 p-1">{{$message}}</p>
        @enderror

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Price</label>
            <input type="text" name="price" class="form-control w-50" id="exampleFormControlInput1" value="{{ old('price') }}" placeholder="Enter Product's Price...">
        </div>
        @error('price')
        <p class="alert alert-danger w-50 p-1">{{$message}}</p>
        @enderror

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control w-50" id="exampleFormControlInput1" value="{{ old('quantity') }}" placeholder="99">
        </div>
        @error('quantity')
        <p class="alert alert-danger w-50 p-1">{{$message}}</p>
        @enderror

        <div class="mb-3">
            <label for="formFileMultiple" class="form-label">Product's Image(s)</label>
            <input class="form-control w-50" type="file" name="image[]" id="formFileMultiple" multiple>
        </div>
        @error('image')
        <p class="alert alert-danger w-50 p-1">{{$message}}</p>
        @enderror

        <label for="formFileMultiple" class="form-label">Category</label>
        <select class="form-select w-50" name="category" aria-label="Default select example">
            <option disabled>Select Category</option>
            <option value="supermarket">Supermarket</option>
            <option value="health & beauty">Health & Beauty</option>
            <option value="home & office">Home & Office</option>
            <option value="phones & tablets">Phones & Tablets</option>
            <option value="computing">Computing</option>
            <option value="electronics">Electronics</option>
            <option value="fashion">Fashion</option>
            <option value="baby products">Baby Products</option>
            <option value="gaming">Gaming</option>
            <option value="sporting goods">Sporting Goods</option>
            <option value="automobile">Automobile</option>
            <option value="others">Others</option>
        </select>
        <div class="col-12 mt-3">
            <button type="submit" onclick="sell()" class="btn btn-primary w-50">Save</button>
        </div>
    </form>

@endsection