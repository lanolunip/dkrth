<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPengeluaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pengeluaran', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_penugasan');
            $table->string('nama_pengeluaran');
            $table->double('banyak_pengeluaran');
            $table->foreign('id_penugasan')->references('id')->on('penugasan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pengeluaran');
    }
}
