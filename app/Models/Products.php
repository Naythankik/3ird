<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $guarded = ['id'];

    public function images()
    {
        return $this->hasMany(Images::class);
    }

    public function image()
    {
//        aiming to return a distinct a value from model
        return $this->hasOne(Images::class);
    }


//    protected static function boot()
//    {
//        parent::boot();
//
//        static::deleted(function (Products $products){
//            dd($products->images);
//            foreach ($products->images as $image)
//            {
//                Storage::delete('public/products/'.$image['image_name']);
//            }
//        });
//    }

}
