<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory, Notifiable;

    protected $table = "orders";

    protected $guarded = ["id"];


    public function product()
    {
        return $this->hasOne(Products::class, 'id','product_id');
    }

    public function user()
    {
        return $this->belongsTo(Users::class);
    }
    public function image()
    {
        return $this->hasOne(Images::class,'id','image_id');
    }

}
