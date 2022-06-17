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
        Schema::create('inbox',function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('sender_id');
            $table->unsignedBigInteger('user_id');
            $table->text('message');
            $table->text('reply');
            $table->timestamps();
            $table->foreign('sender_id')->on('messages')->references('id');
            $table->foreign('user_id')->on('buyers')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inbox');
    }
};
