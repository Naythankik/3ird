<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControllers;
use App\Http\Controllers\SellersController;
use App\Http\Controllers\ProductsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//page routes
Route::view('/','home');

//Routes for Buyer
//this route is with the name attribute
//to deny access to users that are not logged in
//and redirect them to the login form page instead of throwing laravel error
Route::view('/login','buy.login')->name('login');

Route::post('/login',[UserControllers::class,'login']);


Route::prefix('buy')
    ->controller(UserControllers::class)
    ->group(function (){
        Route::get('/read/{id}','markAsRead');
        Route::post('/complaint','complaint');
        Route::get('/inbox/{id}','inbox');
        Route::post('/pay','payment');
        Route::get('/add_to_cart/{p_id}','add_to_cart');
        Route::get('/cart','cart');
        Route::get('/remove_cart/{id}','remove_cart');
        Route::get("/wishlist/{p_id}",'wishList');
        Route::get("/list",'list');
        Route::get("/remove/{p_id}","remove_list");
        Route::get('/cart/complete','paymentCompleted');
        Route::get('/search','search');
        Route::get('/logout','logout');
        Route::get("/orders/{order}",'orders');
        Route::get('/category/{category}','category');
        Route::get('/{id}/profile','profile')->name('profile');
        Route::get('/forgot-password',function ()
        {
            return view('buy.forget');
        })->name('password.request');
        Route::post('forgot-password','forgot')->middleware('guest')->name('password.email');

        Route::get('/reset-password/{token}', function ($token) {
            return view('buy.reset', ['token' => $token]);
        })->middleware('guest')->name('password.reset');
        Route::post('/reset-password','reset')->middleware('guest');
    });
Route::resource('/buy',UserControllers::class);



//Routes for sellers
Route::prefix('/sell')->group(function (){
    Route::view('/login','sell.login')->name('reLogin');
    Route::get('/logout',[SellersController::class,'logout']);
    Route::post('/login',[SellersController::class,'login']);
    Route::resource('/',SellersController::class);
});



//Route for products
Route::middleware('seller:selling')->group( function (){
    Route::resource('/products',ProductsController::class);
}
);



//Route for forgot password
Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('password.request');

Route::post('/forget',[SellersController::class,'forget']);
