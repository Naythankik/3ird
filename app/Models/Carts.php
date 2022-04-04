<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $guarded =['id'];


    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function (Carts $cart) {

        });



    }

}
