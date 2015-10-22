<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMatapelajaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matapelajaran', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenjang');
            $table->string('pelajaran');
            $table->string('tahun_ajaran');
            $table->string('user_created');
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
        Schema::drop('matapelajaran');
    }
}
