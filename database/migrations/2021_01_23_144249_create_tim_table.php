<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tim', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->unsignedInteger('petugas');
            $table->unsignedInteger('jenis_tim');
            $table->unsignedInteger('kategori_daerah');

            $table->foreign('petugas')->references('id')->on('users');
            $table->foreign('jenis_tim')->references('id')->on('jenis_tim');
            $table->foreign('kategori_daerah')->references('id')->on('kategori_daerah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tim');
    }
}
