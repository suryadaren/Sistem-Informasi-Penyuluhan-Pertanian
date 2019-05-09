<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class proposal_dana extends Authenticatable
{
    protected $table = "proposal_dana";

     protected $fillable = [
        'penyuluh_id', 'draft_programa_id', 'dana_dibutuhkan', 'dana_terkirim', 'content', 'berkas', 'status', 'created_at', 'updated_at'
    ];
}
