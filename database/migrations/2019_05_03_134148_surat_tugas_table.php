<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SuratTugasTable extends Migration
{
    public function up()
    {
        Schema::create('surat_tugas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('penyuluh_id')->unsigned();
            $table->integer('draft_programa_id')->unsigned();
            $table->foreign('penyuluh_id')
              ->references('id')->on('user')
              ->onDelete('cascade');
            $table->foreign('draft_programa_id')
              ->references('id')->on('draft_programa')
              ->onDelete('cascade');
            $table->longText('content');
            $table->string('berkas');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('surat_tugas');
    }
}
