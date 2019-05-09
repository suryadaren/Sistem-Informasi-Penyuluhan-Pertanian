<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NotifikasiTable extends Migration
{
    public function up()
    {
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pengirim_id')->unsigned();
            $table->integer('penerima_id')->unsigned();
            $table->foreign('pengirim_id')
              ->references('id')->on('user')
              ->onDelete('cascade');
            $table->foreign('penerima_id')
              ->references('id')->on('user')
              ->onDelete('cascade');
            $table->integer('id_berkas');
            $table->string('deskripsi');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifikasi');
    }
}
