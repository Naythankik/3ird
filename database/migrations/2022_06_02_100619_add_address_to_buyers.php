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
        Schema::table('buyers', function (Blueprint $table) {
            $table->text('address')->after('gender');
            $table->string('city')->after('address')->default('Lagos');
            $table->string('state')->after('city')->default('Lagos');
            $table->string('country')->after('state')->default('Nigeria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('buyers', function (Blueprint $table) {
            $table->dropColumn(['address','state','country','city']);
        });
    }
};
