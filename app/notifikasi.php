<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class notifikasi extends Authenticatable
{
    protected $table = "notifikasi";

     protected $fillable = [
        'pengirim', 'penerima', 'id_berkas', 'type', 'deskripsi', 'status', 'created_at', 'updated_at'
    ];

    public function user(){
    	return $this->belongsTo(user::class,"pengirim");
    }
}
