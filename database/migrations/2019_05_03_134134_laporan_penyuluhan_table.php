<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LaporanPenyuluhanTable extends Migration
{
    public function up()
    {
        Schema::create('laporan_penyuluhan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('penyuluh_id')->unsigned();
            $table->foreign('penyuluh_id')
              ->references('id')->on('user')
              ->onDelete('cascade');
            $table->text('tema');
            $table->text('status_content');
            $table->text('status_berkas');
            $table->text('status_foto');
            $table->longText('content');
            $table->string('foto');
            $table->string('berkas');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporan_penyuluhan');
    }
}
