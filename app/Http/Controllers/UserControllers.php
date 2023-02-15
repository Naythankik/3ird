<?php

namespace App\Http\Controllers;

use App\Http\Middleware\VerifyCsrfToken;
use App\Http\Requests\UsersRequest;
use App\Jobs\RegisteredUser;
use App\Mail\OrderProduct;
use App\Mail\UserRegistered;
use App\Models\Images;
use App\Models\Inbox;
use App\Models\Messages;
use App\Models\Order;
use App\Models\Products;
use App\Models\Users;
use App\Models\Carts;
use App\Models\WishLists;
use App\Notifications\OrderMail;
use App\Providers\ProductOrdered;
use http\Message;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Validation\Rules\In;
use phpDocumentor\Reflection\Types\Integer;


class UserControllers extends Controller
{
    use Notifiable;


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
        $budgets = Products::with('image')->where('price','<' ,50000)->limit(10)->get();
        $recommends = Products::with('image')->inRandomOrder()->limit(10)->get();
        $category = Products::with('image')->where('price','>=' ,100000)->get();
        $brands = DB::table('brands')->select('*')->limit(12)->get();
        $all = Products::with('image')->limit(10)->inRandomOrder()->get();

        $views = view('buy.logged.home')->with([
            'budgets' => $budgets,
            'recommends' => $recommends,
            'category' => $category,
            'brands' => $brands,
            'all' => $all
        ]);

        return $views;
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UsersRequest $request)
    {
        $day = $request->day;
        $month = $request->month;
        $year = $request->year;
        $dobArray = [$day,$month,$year];
        $dateOfBirth = strtotime($day." ".$month." ".$year);

        if (in_array("",$dobArray)){
            return back()->withErrors(['emptyDate' => 'date of birth is empty!'])->withInput();
        }
        if($dateOfBirth > 1262304000){
            return back()->withErrors(['dob' => 'age range is not invalid!'])->withInput();
        };
        if (empty($request->gender)){
            return back()->withErrors(['gend' => 'gender is not selected!'])->withInput();
        }
        if ($request->gender == "custom"){
            if ($request->genderCustom == null){
                return back()->withErrors(['gender' => 'customed gender is not selected!'])->withInput();
            }else{
                $request->gender = $request->genderCustom;
            }
        }

        $new_name = uniqid($request->username,'true').'.'.$request->profile->extension();
        $picture = $request->profile->storeAs('public/buyer/profile',$new_name);
        $NewUser = Users::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'address' => $request->address,
            'dob' => $dateOfBirth,
            'gender' => $request->gender,
            'profile' => $picture,
            'password' => Hash::make($request->password)
        ]);
        RegisteredUser::dispatch($NewUser)->delay(now()->addMinutes(2));

        return redirect('/login')->with(['status' => 'User registered successfully!!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Products::with('images')->where('id',$id)->get();
        $firstImage = Images::where('products_id', $id)->first();
        return view('buy.logged.show',[
            'products' => $products,
            'image' => $firstImage
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect('/buy/'.$id.'/profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,int $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'telephone' => 'required|numeric',
            'profile_picture' => 'image|max:2000',
            'dob' => 'required|date|before_or_equal:2010-01-01|date_format:Y-m-d',
            'gender' => 'required|alpha',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'address' => 'required',
            'password' => 'required|current_password',
        ],[
            'first_name.required' => 'first name is required',
            'last_name.required' => 'last name is required',
            'email.required' => 'email is required',
            'telephone.required' => 'telephone is required',
            'telephone.numeric' => 'telephone must be a number',
            'dob.required' => 'date of birth is required',
            'dob.date' => 'date is invalid',
            'dob.before_or_equal' => 'user is underage',
            'gender.required' => 'gender is required',
            'gender.alpha' => 'gender must be alphabet',
            'city.required' => 'city is required',
            'state.required' => 'state is required',
            'country.required' => 'country is required',
            'address.required' =>'user address is required',
            'profile_picture.image' => 'File is not an image',
            'profile_picture.size' => 'File is too big',
            'password.required' => 'password verification is needed',
            'password.current_password' => 'password is incorrect, failed to update profile'
        ]);
        $image = $request->profile_picture;
        if (!empty($image)){
            $profiles = uniqid(lcfirst(auth()->user()->username),true).".".$image->extension();
            $image = $image->storeAs('public/buyer/profile',$profiles);
            Storage::delete($request->image);
        }else{
            $image = $request->image;
        }


        $update = Users::where('id',$id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'username' => $request->username,
            'dob' => strtotime($request->dob),
            'gender' => $request->gender,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'address' => $request->address,
            'profile' => $image
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
        $categories = Products::with('image')->where('category','=',$category)->inRandomOrder()->get();
        $category = Str::replace('_',' ',$category);
        return view('buy.logged.view',[
            'products' => $categories,
            'category' => $category,
            'headers' => ''
        ]);
    }

    public function brands($brand){
        if($brand == "all_brands"){
            $brands = DB::table('brands')->select('*')->inRandomOrder()->get();
            return view('buy.logged.brands',[
                'brands' => $brands
            ]);
        }else{
            $brands = Products::with('image')->where('brand','=',$brand)->inRandomOrder()->get();
            $header = DB::table('brands')->where('brand','=',$brand)->first();
            return view('buy.logged.view',[
                'headers' => $header,
                'products' => $brands,
                'category' => $brand
            ]);
        };
    }

    public function cart()
    {
        $carts = Carts::with('product.image')->where('users_id',auth()->id())->get();
        $price = [];
        foreach ($carts as $cart){
            $price[] = $cart->product['price'];
        }
        $price = array_sum($price);

        return view('buy.logged.cart',['carts' => $carts,'price' => $price]);
    }
    public function list()
    {
        $wish = WishLists::with('product.image')->where('users_id',auth()->id())->get();
        return view('buy.logged.wishlist',['wishes' => $wish]);
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
        WishLists::where('users_id',auth()->id())->where('product_id',$p_id)->delete();
        return back()->with(['cart' => 'Product Added to cart successfully!','id'=> $p_id]);
    }

    public function remove_cart($id)
    {
        Carts::where('users_id',auth()->id())->where('product_id',$id)->delete();
        return back()->with(['delete' => 'Product removed from cart successfully!']);
    }

    public function search(Request $request)
    {
        if (empty($request->q)){
            return back();
        }else{
            $user = '%'.$request->q.'%';
            $string = Products::with('images')
                ->where('brand','like',$user)
                ->orWhere('category','like',$user)
                ->orWhere('name','like',$user)
                ->inRandomOrder()
                ->get();

            return view('buy.logged.view',[
                'headers' => '',
                'products' => $string,
                'category' => $request->q
            ]);
        }
    }

    public function profile($id)
    {
        $profile = Users::where('id',$id)->get();
        return view('buy.logged.profile',['profiles' => $profile]);
    }

    public function remove_list($id)
    {
        WishLists::where('users_id',auth()->id())->where('product_id',$id)->delete();
        return back()->with(['delete' => 'Product removed from Wish List successfully!']);
    }

    public function wishList($p_id)
    {
        $wish = WishLists::where('users_id',auth()->id())->where('product_id',$p_id)->count();
        $cartWish = Carts::where('users_id',auth()->id())->where('product_id',$p_id)->count();

        if ($cartWish > 0)
        {
            return back()->with(['cart_exist' => 'Product is in Cart!','id' => $p_id]);
        }
        if ($wish > 0)
        {
            return back()->with(['cart_exist' => 'Product is in Wish List!','id' => $p_id]);
        }
        WishLists::create([
            'users_id' => auth()->id(),
            'product_id' => $p_id
        ]);
        return back()->with(['cart' => 'Product Added to Wish List successfully!', 'id' => $p_id]);
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

    public function paymentCompleted($token)
    {
        $id = auth()->id();

        $users = Carts::where('users_id',$id)->get();

        foreach ($users as  $user){
            $image = Images::where('products_id',$user['product_id'])->first();

            Order::create([
                'user_id' => $id,
                'product_id' => $user['product_id'],
                'image_id' => $image['id'],
                'order_number' => uniqid()
            ]);

            $pr_id = Products::where('id',$user['product_id'])->get();

            Products::where('id',$user['product_id'])->update([
                'quantity' => $pr_id[0]['quantity'] - 1
            ]);
        }
        event(new ProductOrdered(auth()->user()));

        Carts::where('users_id',$id)->delete();
        return redirect('/buy');
    }

    public function orders($order){
        $orders = Order::with(['user', 'product','image'])
            ->where('user_id',$order)->get();
        return view('buy.logged.order',['orders' => $orders]);

    }

    public function inbox($id){
        $message = Messages::all();
        $inbox = Inbox::where([
            'user_id' => auth()->id(),
            'sender_id' => $id
        ])->orderBy('id','desc')
            ->orderBy('updated_at','desc')
            ->get();

        return view('buy.logged.inbox',[
            'messages' => $message,
            'inboxes' => $inbox
        ]);
    }

    public function message()
    {
        $message = Messages::all();
        return view('buy.logged.inbox',[
            'messages' => $message
        ]);

    }

    public function reply(Request $request, $user_id){
        $message_id = $request->server('HTTP_REFERER');
        $message_id = Str::afterLast($message_id,'/');
        $last = Inbox::where([
            'user_id' => $user_id,
            'sender_id' => $message_id,
            'reply' => ''
        ])->orderBy('id','desc')->first();


//        check if the row has null reply column
        if (empty($last)){
//            if true, insert request into new row
            Inbox::create([
                'user_id' => $user_id,
                'sender_id' => $message_id,
                'message' => '',
                'reply' => $request->reply
            ]);
            return back();
        }else{
//            or update the reply column with the request received
            Inbox::where([
                'user_id' => $user_id,
                'sender_id' => $message_id,
                'id' => $last->id
            ])->update([
                'reply' => $request->reply
            ]);
            return back();
        }
    }

    public function complaint(Request $request){
        $request->validate([
            $request->name => 'required',
            $request->email => 'required',
            $request->phone => 'required',
            $request->address => 'required',
            $request->gender => 'required',
            $request->country => 'required',
            $request->state => 'required',
            $request->subject => 'required',
            $request->message => 'required'
        ]);
    }
    public function lowBudget(){
        $all = Products::with('images')
            ->where('price', '<' , 50000)
            ->inRandomOrder()
            ->get();

        return view('buy.logged.view',[
            'headers' => '',
            'products' => $all,
            'category' => 'Low Budgets'
        ]);
    }
    public function all(){
        $all = Products::with('images')
            ->inRandomOrder()
            ->get();

        return view('buy.logged.view',[
            'headers' => '',
            'products' => $all,
            'category' => 'All Products'
        ]);
    }

}
