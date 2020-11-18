<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditSignupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('signups',function($table){
            $table->dropColumn(['password','confirm_password']);
        });

        Schema::table('signups',function($table){
            $table->string('user_password',43);
            $table->string('user_confirm_password',43);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(['user_password','user_confrim_password']);
    }
}
