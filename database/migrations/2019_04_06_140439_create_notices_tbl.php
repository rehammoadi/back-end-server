<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticesTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->increments('id');//pk
            $table->integer('user_created');//id fk
            $table->dateTime('created_at');

            $table->string('title', 255)->nullable();
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
        //
    }
}
