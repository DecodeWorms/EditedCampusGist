<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdeaAndSupport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ideas', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('Title',25);
            $table->string('Name',25);
            $table->timestamps();
        });

        Schema::create('supports', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('Name',25);
            $table->string('Comment',25);
            $table->integer('idea_id')->unsigned();
            $table->foreign('idea_id')->references('id')->on('ideas');
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
        Schema::dropIfExists('ideas');
        Schema::dropIfExists('supports');
    }
}
