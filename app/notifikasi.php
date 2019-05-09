<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class notifikasi extends Authenticatable
{
    protected $table = "notifikasi";

     protected $fillable = [
        'pengirim_id', 'penerima_id', 'id_berkas', 'deskripsi', 'status', 'created_at', 'updated_at'
    ];
}
