<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class process_surat_tugas extends Authenticatable
{
    protected $table = "process_surat_tugas";

    protected $fillable = [
        'surat_tugas_id', 'status_isi', 'status_berkas', 'des_isi', 'des_berkas', 'created_at', 'updated_at'
    ];

    public function surat_tugas(){
    	return $this->belongsTo(surat_tugas::class,"surat_tugas_id");
    }

}
