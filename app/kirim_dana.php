<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class kirim_dana extends Authenticatable
{
    protected $table = "kirim_dana";

     protected $fillable = [
        'proposal_dana_id', 'jumlah','norek', 'nama_pengirim', 'bank_pengirim', 'berkas', 'status', 'created_at', 'updated_at'
    ];
}
