@extends('buy.logged.main')
@section('body')
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="{{ asset('css/profile.css') }}" type="text/css" />
        <title>Profile</title>
    </head>
    <body>
    <div class="update">
        @if(session('updated'))
            <p>{{ session('updated') }}</p>
        @endif
    </div>
    @foreach($profiles as $profile)
        <div class="picture-view">
            <div class="profile-close">&times;</div>
            <img src="{{ Storage::url($profile->profile) }}" alt="" />
        </div>
        <div class="contents-details">
            <form method="post" action="/buy/{{ auth()->id() }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="face">
                    @error('profile_picture')
                    <p>{{ $message }}</p>
                    @enderror
                    <img src="{{ Storage::url($profile->profile) }}" alt="" />
                    <div class="file">
                        <input type="file" name="profile_picture" title="select picture" class="fa fa-pencil">
                        <input type="text" name="image" value="{{ $profile->profile }}" hidden>
                    </div>
                </div>
                <div class="editUser">
                    <div class="names">
                        <div class="first">
                            <label for="first-name">First Name</label>
                            <input type="text" name="first_name" value="{{ $profile->first_name }}" />
                            @error('first_name')
                            <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="last">
                            <label for="last-name">Last Name</label>
                            <input type="text" name="last_name" value="{{ $profile->last_name }}" />
                            @error('last_name')
                            <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="email">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{ $profile->email }}" />
                        @error('email')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="telephone">
                        <label for="telephone">Telephone</label>
                        <input type="tel" name="telephone" value="{{ $profile->telephone }}" />
                        @error('telephone')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="names">
                        <div class="username">
                            <label for="username">Username</label>
                            <input type="text" name="username" value="{{ $profile->username }} " readonly/>
                            @error('username')
                            <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="dob">
                            <label for="dob">Date of Birth</label>
                            <input type="text" name="dob" value="{{ date('Y-m-d',$profile->dob) || $profile->dob }}" />
                            @error('dob')
                            <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="names">
                        <div class="gender">
                            <label for="gender">Gender</label>
                            <input type="text" name="gender" value="{{ ucwords($profile->gender) }}"/>
                            @error('gender')
                            <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="city">
                            <label for="city">City</label>
                            <input type="text" name="city" value="{{ $profile->city }}" />
                            @error('city')
                            <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="names">
                        <div class="state">
                            <label for="state">State</label>
                            <input type="text" name="state" value="{{ ucwords($profile->state) }}"/>
                            @error('state')
                            <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="country">
                            <label for="country">Country</label>
                            <input type="text" name="country" value="{{ $profile->country }}"/>
                            @error('country')
                            <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="address">
                        <label for="address">Address</label>
                        <input type="text" name="address" value="{{ $profile->address }}"/>
                        @error('address')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="address">
                        <label for="password">Password</label>
                        <input type="password" name="password" />
                        @error('password')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="submit">
                        <button type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    @endforeach

@endsection

