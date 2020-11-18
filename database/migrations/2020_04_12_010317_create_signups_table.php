<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name',30);
            $table->string('email',30);
            $table->string('password',30);
            $table->string('confirm_password',30);
            $table->string('gender',8);
            $table->string('state_of_origin',25);
            $table->string('area',25);
            $table->string('tertiary_education',40);
            $table->binary('image');
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
        Schema::dropIfExists('signups');
    }
}
