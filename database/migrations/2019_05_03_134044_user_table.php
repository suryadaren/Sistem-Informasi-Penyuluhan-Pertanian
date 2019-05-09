<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserTable extends Migration
{
    
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('username');
            $table->string('password');
            $table->string('nip');
            $table->string('email');
            $table->string('desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->enum('jabatan',['penyuluh','bpp','staff_dinas','kepala_dinas']);
            $table->string('foto');
            $table->rememberToken()->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user');
    }
}
