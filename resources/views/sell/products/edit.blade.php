@extends('sell.logged_in.main')
@section('body')

    @foreach($products as $product)
        <center>
                <div class="p-3 m-3">
                    <h3 class="ms-3 my-5 text-warning fw-bold">Edit Product's Details</h3>
                    @if(session('updated'))
                        <p class="w-25 alert alert-success fst-italic">{{ session('updated') }}</p>
                    @endif
                    <form method="post" action="/products/{{ $product->id }}">
                        @method('put')
                        @csrf
                        <div class="input-group mb-2 w-25">
                            <span class="input-group-text" id="basic-addon1">Name</span>
                            <input type="text" class="form-control" name="name" value="{{ $product->name }}" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        @error('name')
                        <p class="alert alert-danger w-25 p-1">{{$message}}</p>
                        @enderror

                        <div class="input-group mb-2 w-25">
                            <span class="input-group-text" id="basic-addon1">Brand</span>
                            <input type="text" class="form-control" name="brand" value="{{ $product->brand }}" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        @error('brand')
                        <p class="alert alert-danger w-25 p-1">{{$message}}</p>
                        @enderror


                        <div class="input-group mb-2 w-25">
                            <span class="input-group-text" id="basic-addon1">Category</span>
                            <input type="text" class="form-control" name="category" value="{{ $product->category }}" aria-label="Username" aria-describedby="basic-addon1" readonly>
                        </div>
                        @error('category')
                        <p class="alert alert-danger w-25 p-1">{{$message}}</p>
                        @enderror


                        <div class="input-group mb-2 w-25">
                            <span class="input-group-text w-100 mb-2" id="basic-addon2">Description</span>
                            <textarea name="description" rows="7" cols="50">{{ $product->description }}</textarea>
                        </div>
                        @error('description')
                        <p class="alert alert-danger w-25 p-1">{{$message}}</p>
                        @enderror

                        <div class="input-group mb-2 w-25">
                            <span class="input-group-text w-100 mb-2" id="basic-addon2">Feature</span>
                        <textarea name="feature" rows="7" cols="50">{{ $product->feature }}</textarea>
                        </div>
                        @error('feature')
                        <p class="alert alert-danger w-25 p-1">{{$message}}</p>
                        @enderror

                        <div class="input-group mb-2 w-25">
                            <span class="input-group-text" id="basic-addon2">Quantity</span>
                            <input type="text" class="form-control" name="quantity" value="{{ $product->quantity }}" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        </div>
                        @error('quantity')
                        <p class="alert alert-danger w-25 p-1">{{$message}}</p>
                        @enderror

                        <div class="input-group mb-2 w-25">
                            <span class="input-group-text" id="basic-addon2">Price</span>
                            <input type="text" class="form-control" name="price" value="{{ $product->price }}" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        </div>
                        @error('price')
                        <p class="alert alert-danger w-25 p-1">{{$message}}</p>
                        @enderror

                        <button class="btn btn-primary fw-bold text-dark fst-normal mt-4" type="submit">Save Changes</button>
                    </form>
                </div>
        </center>

    @endforeach
@endsection