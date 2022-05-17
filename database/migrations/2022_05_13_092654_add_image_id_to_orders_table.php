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
            Schema::table('orders', function (Blueprint $table) {
                $table->unsignedBigInteger('image_id')->after('product_id')->nullable();
                $table->foreign('image_id')->references('id')->on('product_images')->cascadeOnDelete();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('image_id');
        });
    }
};
