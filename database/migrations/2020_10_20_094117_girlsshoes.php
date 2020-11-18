<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Girlsshoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('girls',function(Blueprint $table){
            $table->Increments('id');
            $table->string('Name',25);
            $table->timestamps();

        });

        Schema::create('shoes',function(Blueprint $table){
            $table->Increments('id');
            $table->integer('girl_id')->unsigned();
            $table->foreign('girl_id')->references('id')->on('girls');
            $table->string('shoes',25);
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
        Schema::dropIfExist(['girls','shoes']);
    }
}
