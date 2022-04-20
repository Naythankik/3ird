<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\Products;
use App\Models\Users;
use App\Models\Carts;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;


class UserControllers extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('create','store','login','forgot','reset');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show = Products::with('images')->get();

        return view('buy.logged.home',['products' => $show]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('buy.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $request->validated();
        $new_name = uniqid($request->username,'true').'.'.$request->profile->extension();
        $picture = $request->profile->storeAs('public/buyer/profile',$new_name);

        Users::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'dob' => $request->age,
            'profile' => $picture,
            'password' => Hash::make($request->password)
        ]);

        return view('buy.login')->with(['success' => 'User created Successfully!']);
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
        $user = Users::where('id',$id)->get();
        return view('buy.logged.editProfile',['user' => $user]);
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
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'telephone' => 'required|numeric'
        ],[
           'first_name.required' => 'This field is empty',
            'last_name.required' => 'This field is empty',
            'username.required' => 'This field is empty',
            'email.required' => 'This field is empty',
            'telephone.required' => 'This field is empty',
            'telephone.numeric' => 'This field must be a number',
        ]);

        Users::where('id',auth()->id())->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'username' => $request->username
            ]);

        return back()->with(['updated' => 'User Info updated successfully!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Users::with('cart')->where('id',$id)->delete();
        return redirect('/login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'Email is empty',
            'password.required' => 'Password is empty'
        ]);
        $user = Users::where('email',$request->email)->first();
        if (!$user)
        {
            return back()->withErrors(['username' => 'Email is not Registered'])->withInput();
        }
        if (!Hash::check($request->password,$user->password))
        {
            return back()->withErrors(['password' => 'Password is incorrect'])->withInput();
        }

        auth()->login($user);

        return redirect('/buy');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }

    public function category($category)
    {
        $categories = Products::with('images')->where('category','=',$category)->get();
        return view('buy.logged.home',['products' => $categories]);
    }

    public function cart()
    {
        $carts = Carts::with('product.images')->where('users_id',auth()->id())->get();
        $price = [];
       foreach ($carts as $cart){
            $price[] = $cart->product['price'];
       }
       $price = array_sum($price);

        return view('buy.logged.cart',['carts' => $carts,'price' => $price]);
    }

    public function add_to_cart($p_id)
    {
        $check_cart = Carts::where('users_id',auth()->id())->where('product_id',$p_id)->count();

        if ($check_cart > 0)
        {
            return back()->with(['cart_exist' => 'Product is in cart!','id' => $p_id]);
        }

        Carts::create([
            'users_id' => auth()->id(),
            'product_id' => $p_id
        ]);

        return back()->with(['cart' => 'Product Added to cart successfully!','id'=> $p_id]);
    }

    public function remove_cart($id)
    {
       Carts::where('users_id',auth()->id())->where('product_id',$id)->delete();
       return back()->with(['delete' => 'Product removed from cart successfully!']);
    }

    public function search(Request $request)
    {
        $user = '%'.$request->search.'%';
      $string = Products::with('images')
          ->where('brand','like',$user)
          ->orWhere('category','like',$user)
          ->orWhere('name','like',$user)
          ->get();

        return view('buy.logged.home',['products' => $string]);
    }

    public function profile($id)
    {
        $profile = Users::where('id',$id)->get();
        return view('buy.logged.profile',['profiles' => $profile]);
    }

    public function forgot(Request $request)
    {

        $request->validate([
            'email' => 'required'
        ],[
            'email.required' => 'Email is Empty!'
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);

    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|min:2',
            'passwordConfirmed' => 'same:password'
        ],[
            'password.required' => 'Password is required',
            'password.min' => 'Password is too short',
            'passwordConfirmed.same' => 'Password must match!'
        ]);

        $status = Password::reset(
            $request->only('password','token','passwordConfirmed'),
            function ($user, $password){
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function paymentCompleted()
    {
        $id = auth()->id();
        Carts::where('users_id',$id)->delete();
        return redirect('/buy/cart');
    }

}
