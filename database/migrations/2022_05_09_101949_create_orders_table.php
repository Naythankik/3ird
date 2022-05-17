<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->string('order_number');
            $table->unsignedBigInteger('image_id')->after('product_id')->nullable();
            $table->foreign('image_id')->references('id')->on('product_images')->cascadeOnDelete();
            $table->foreign("user_id")->references('id')->on("buyers")->cascadeOnDelete();
            $table->foreign("product_id")->references('id')->on("products")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
