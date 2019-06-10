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
            $table->integer('app_user_id')->nullable();
            $table->string('user_ID')->nullable();
            $table->string('full_name')->nullable();
            $table->string('mespar_helka')->nullable();
            $table->string('mespar_gosh')->nullable();
            $table->string('size')->nullable();
            $table->string('description')->nullable();
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
