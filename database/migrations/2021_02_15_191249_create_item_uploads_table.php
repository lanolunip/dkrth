<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_upload', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kategori_upload');   
            $table->foreign('kategori_upload')->references('id')->on('kategori_upload');
            $table->integer('id_upload');
            $table->string('nama_file');
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
        Schema::dropIfExists('item_upload');
    }
}
