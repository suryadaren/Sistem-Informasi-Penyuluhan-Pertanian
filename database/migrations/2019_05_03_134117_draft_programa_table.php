<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DraftProgramaTable extends Migration
{
   public function up()
    {
        Schema::create('draft_programa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('penyuluh_id')
              ->references('id')->on('user')
              ->onDelete('cascade');
            $table->longText('latar_belakang');
            $table->longText('tujuan');
            $table->longText('manfaat');
            $table->longText('biofisik');
            $table->longText('sdm');
            $table->longText('usaha_tani');
            $table->longText('tujuan_perilaku');
            $table->longText('tujuan_non_perilaku');
            $table->longText('masalah_perilaku');
            $table->longText('masalah_non_perilaku');
            $table->longText('total_dana');
            $table->string('berkas');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('draft_programa');
    }
}
