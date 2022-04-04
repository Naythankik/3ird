<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellersRequest;
use App\Models\Seller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class SellersController extends Controller
{
    public function __construct()
    {
        $this->middleware('seller:selling')->except('create','store', 'login','forget');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sell.logged_in.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sell.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SellersRequest $request)
    {
        $validated = $request->validated();
        $new_name = uniqid($request->username,'true').'.'.$request->profile->extension();
        $picture = $request->profile->storeAs('seller/profile',$new_name);

        Seller::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'address' => $request->address,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'dob' => $request->age,
            'profile' => $picture,
            'password' => Hash::make($request->password)
        ]);

        return view('sell.login')->with(['success' => 'User created Successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ],[
            'username.required' => 'Username is required',
            'password.required' => 'Password is required'
        ]);

        $seller = Seller::where('username',$request->username)->first();

        if(!$seller)
        {
            return back()->with(['username' => 'Username not found!'])->withInput();
        }

        if(!Hash::check($request->password,$seller->password))
        {
            return back()->with(['password' => 'Password is incorrect'])->withInput();
        }
        auth('selling')->login($seller);
        return redirect('/sell');
    }

    public function logout()
    {
        auth('selling')->logout();
        return redirect('sell/login');
    }

    public function forget(Request $request)
    {

        $status = Password::broker('sellers')->sendResetLink($request->only('email'));

dd($status);
       return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

}
