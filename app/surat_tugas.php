<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class surat_tugas extends Authenticatable
{
    protected $table = "surat_tugas";

     protected $fillable = [
        'penyuluh_id', 'draft_programa_id', 'content', 'berkas', 'status', 'created_at', 'updated_at'
    ];
}
