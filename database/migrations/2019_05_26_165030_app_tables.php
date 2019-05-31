<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // all tables for db 
        Schema::create('app_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->string('username')->unique();
            $table->integer('active')->default(1);//0 not active , 1 active
            $table->integer('subscribed')->default(0);//0 not subscribed , 1 subscribed
            //$table->ipAddress('visitor')->nullable();
            //$table->integer('acl_permission')->default(1);// 1 all , 2 can modified , 3 can see only
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
