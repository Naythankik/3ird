<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest;
use App\Models\Images;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store = Products::where('email', auth('selling')->user()->email)->get();
        return view('sell.products.store',['products' => $store]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $seller = auth('selling')->user();
        return view('sell.products.create',['user' => $seller]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsRequest $request)
    {

        $pro = Products::create([
            'email' => $request->email,
            'name' => $request->name,
            'seller_id' => auth('selling')->id(),
            'brand' => $request->brand,
            'category' => $request->category,
            'description' => $request->description,
            'feature' => $request->feature,
            'quantity' => $request->quantity,
            'price' => $request->price
        ]);

        //loop through the image to edit each of them
        foreach ($request->image as $image){
            $new_name = uniqid(Str::slug($request->name,'_'),true).".".$image->extension();
            $image->storeAs('public/products/',$new_name);

//            using images model
            Images::create([
                'products_id' => $pro->id,
                'image_name' => $new_name
            ]);
        }

        return back()->with(['success' => 'Products was saved successfully']);

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
        $products = Products::with('images')->where('id', $id)->get();
        return view('sell.products.edit')->with(['products' => $products]);
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
            'name' => 'required',
            'brand' => 'required',
            'category' => 'required',
            'feature' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required'
        ],[

        ]);
        Products::where('id',$id)
            ->update([
                'name' => $request->name,
                'brand' => $request->brand,
                'category' => $request->category,
                'feature' => $request->feature,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'description' => $request->description
            ]);
        return back()->with(['updated' => 'Product is updated successfully!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Products::where('id',$id)->delete();
        return back()->with(['deleted' => 'Product Successfully deleted']);
    }

    public function brands(Request $request){

        $name = uniqid($request->brand).'.'.$request->brand_image->Extension();
        $request->brand_image->storeAs('/public/products/brand/header',$name);
        DB::table('brands')->where('brand', '=',$request->brand)->update([
            'brand_image_header' => $name,
        ]);
        return view('branding');
    }
}
