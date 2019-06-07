<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AnnouncementProblems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       // all tables for db 
       Schema::create('announcementProblems', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('app_user_id');
        $table->string('full_name');
        $table->string('id_announcement');
        $table->string('problem_text');
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
