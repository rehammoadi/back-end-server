<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('user_created');//id fk

            $table->string('title', 255)->nullable();
            $table->string('mespar_tokhnet', 255)->nullable();
            $table->string('area', 255)->nullable();//mahoz
            $table->string('merhav_tekhnon', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('address', 255)->nullable();//ktovet
            $table->string('doc_number', 100)->nullable();//tek benian
            $table->string('block_number', 100)->nullable();//gosh
            $table->string('helka', 100)->nullable();//helka

            $table->mediumText('description')->nullable();
            $table->mediumText('note')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcements');
    }
}
