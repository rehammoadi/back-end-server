<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Objection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         // all tables for db 
         Schema::create('objection', function (Blueprint $table) {
            $table->increments('id');
            $table->string('block_number');
            $table->string('name_req');
            $table->string('cause_text');
            $table->string('app_user_id');
            $table->string('announcement_id');
            $table->integer('processed')->default(0);
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
