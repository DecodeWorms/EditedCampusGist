<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('Name',25);
            $table->string('Address',30);
            $table->integer('Age');
            $table->timestamps();
        });

        Schema::create('cards', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('Dept',25);
            $table->string('Class',30);
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students');
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
        Schema::dropIfExists('student');
        Schema::dropIfExists('cards');

    }
}
