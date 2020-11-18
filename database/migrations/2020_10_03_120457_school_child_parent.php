<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SchoolChildParent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('Add',25);
            $table->string('Webdite',25);
            $table->timestamps();
        });

        Schema::create('childs', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('Name',25);
            $table->integer('Points');
            $table->integer('school_id')->unsigned();
            $table->foreign('school_id')->references('id')->on('schools');
            $table->timestamps();
        });

        Schema::create('parents', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('Name',25);
            $table->string('Add',25);
            $table->integer('child_id')->unsigned();
            $table->foreign('child_id')->references('id')->on('childs');
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
        Schema::dropIfExist(['schools','childs','parents']);
        // Schema::dropIfExist('childs');
        // Schema::dropIfExist('parents');
    }
}
