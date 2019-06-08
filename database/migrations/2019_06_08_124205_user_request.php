<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Request: idUser, username, helkaNumber, GoshNumber, size, description
        // all tables for db 
        Schema::create('user_request', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('app_user_id');
            $table->string('user_ID');
            $table->string('full_name');
            $table->string('mespar_helka');
            $table->string('mespar_gosh');
            $table->string('size');
            $table->string('description');
            $table->float('cost')->default(0);
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
        //
    }
}
