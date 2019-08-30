<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkeds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('food_safety_id');
            $table->string('year');
            $table->string('month');
            $table->string('day');
            $table->string('result');
            $table->string('note')->nullable();
            $table->string('penalize')->nullable();
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
        Schema::dropIfExists('checkeds');
    }
}
