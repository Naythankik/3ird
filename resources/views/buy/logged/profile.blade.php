@extends('buy.logged.main')
@section('body')

    @foreach($profiles as $profile)
        <img src="{{ Storage::url($profile->profile) }}" class="rounded mx-auto mt-3 d-block" style="width: 90px" alt="...">
        <table>
    <thead>
    <tr style="display: grid; justify-items: center;margin: 10px 0px 10px;">
        <th scope="col">Profile</th>
    </tr>
    </thead>

        <tbody>
        <tr>
            <th scope="row">Full Name</th>
            <td>{{ $profile->first_name." ".$profile->last_name }}</td>
        </tr>
        <tr>
            <th scope="row">Username</th>
            <td>{{ $profile->username }}</td>
        </tr>
        <tr>
            <th scope="row">E-mail</th>
            <td colspan="2">{{ $profile->email }}</td>
        </tr>
        <tr>
            <th scope="row">Age</th>
            <td colspan="2">{{ floor((strtotime('now') - strtotime($profile->dob))/(86400*365)) }}</td>
        </tr>
        <tr>
            <th scope="row">E-mail</th>
            <td colspan="2">{{ $profile->telephone }}</td>
        </tr>
        <tr>
            <th scope="row">Date created</th>
            <td colspan="2">{{ date('l, F Y H:i:sa',strtotime($profile->created_at)) }}</td>
        </tr>

        </tbody>

</table>
       <div class="delete">
           <form method="post" action="/buy/{{ $profile->id }}">
               @method('delete')
               @csrf
               <button type="submit" class="alert alert-danger px-5 py-1" >Delete Account</button>
           </form>
       </div>
    @endforeach

@endsection