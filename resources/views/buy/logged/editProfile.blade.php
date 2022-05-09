@extends('buy.logged.main')
@section('body')

    <center>
        @foreach($user as $user)
        <div class="p-3 m-3">
            <h3 class="ms-3 mt-5 text-info fw-bold">Edit User Information</h3>
            @if(session('updated'))
                <p class="w-25 alert alert-primary fst-italic">{{ session('updated') }}</p>
            @endif
            <form method="post" action="/buy/{{ auth()->id() }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="input-group mb-2 w-25">
                    <span class="input-group-text" id="basic-addon1">First Name</span>
                    <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                @error('first_name')
                <p class="alert alert-danger w-25 p-1">{{$message}}</p>
                @enderror

                <div class="input-group mb-2 w-25">
                    <span class="input-group-text" id="basic-addon1">Last Name</span>
                    <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                @error('last_name')
                <p class="alert alert-danger w-25p-1">{{$message}}</p>
                @enderror


                <div class="input-group mb-2 w-25">
                    <span class="input-group-text" id="basic-addon1">Username</span>
                    <input type="text" class="form-control" name="username" value="{{ $user->username }}" aria-label="Username" aria-describedby="basic-addon1" readonly>
                </div>
                @error('username')
                <p class="alert alert-danger w-25 p-1">{{$message}}</p>
                @enderror


                <div class="input-group mb-2 w-25">
                    <span class="input-group-text" id="basic-addon2">Email</span>
                    <input type="text" class="form-control" name="email" value="{{ $user->email }}" aria-label="Recipient's username" aria-describedby="basic-addon2">
                </div>
                @error('email')
                <p class="alert alert-danger w-25 p-1">{{$message}}</p>
                @enderror

                <div class="input-group mb-2 w-25">
                    <input type="file" class="form-control" name="image"  aria-label="Recipient's username" aria-describedby="basic-addon2">
                </div>
                @error('image')
                <p class="alert alert-danger w-25 p-1">{{$message}}</p>
                @enderror

                <div class="input-group mb-2 w-25">
                    <span class="input-group-text" id="basic-addon2">Telephone</span>
                    <input type="text" class="form-control" name="telephone" value="{{ $user->telephone }}" aria-label="Recipient's username" aria-describedby="basic-addon2">
                </div>
                @error('telephone')
                <p class="alert alert-danger w-25 p-1">{{$message}}</p>
                @enderror

                <a class="btn btn-secondary fw-bold text-dark fst-normal mt-4 cancel me-5" href="#">Cancel Changes</a>
                <button class="btn btn-primary fw-bold text-dark fst-normal mt-4" type="submit">Save Changes</button>
            </form>
        </div>
        @endforeach
    </center>

    @endsection
