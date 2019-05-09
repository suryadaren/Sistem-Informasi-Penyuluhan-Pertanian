<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KirimDanaTable extends Migration
{
    public function up()
    {
        Schema::create('kirim_dana', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proposal_dana_id')->unsigned();
            $table->foreign('proposal_dana_id')
              ->references('id')->on('proposal_dana')
              ->onDelete('cascade');
            $table->string('jumlah');
            $table->string('norek');
            $table->string('nama_pengirim');
            $table->string('bank_pengirim');
            $table->string('berkas');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kirim_dana');
    }
}
