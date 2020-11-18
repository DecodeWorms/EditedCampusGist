<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aposts', function (Blueprint $table){
            $table->increments('id');
            $table->integer('user_id');
            $table->string('user_name',25);
            $table->binary('user_image');
            $table->text('description');
            $table->binary('post_image');
            $table->string('time_occured',15);
            $table->timestamps();
        });

        Schema::create('acomments',function(Blueprint $table){
            $table->increments('id');
            $table->integer('apost_id')->unsigned();
            $table->foreign('apost_id')->references('id')->on('aposts');
            $table->integer('user_id');
            $table->string('user_name',15);
            $table->binary('user_image');
            $table->text('comments');
            $table->string('time_occured');
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
        Schema::dropIfExists('aposts');
        Schema::dropIfExists('acomments');

    }
}
