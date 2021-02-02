<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenugasanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penugasan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tipe_penugasan')->default(1);
            $table->string('nama');
            $table->text('deskripsi');
            $table->unsignedInteger('tim');
            $table->string('pelapor')->nullable();
            $table->string('nomor_telepon_pelapor')->nullable();
            $table->double('banyak_pengeluaran');
            $table->timestamps();
            $table->timestamp('tanggal_berakhir')->nullable();

            $table->foreign('tim')->references('id')->on('tim');
            $table->foreign('tipe_penugasan')->references('id')->on('tipe_penugasan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penugasan');
    }
}
