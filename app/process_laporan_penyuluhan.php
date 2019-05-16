<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class process_laporan_penyuluhan extends Authenticatable
{
    protected $table = "process_laporan_penyuluhan";

    protected $fillable = [
        'laporan_penyuluhan_id', 'status_tema', 'status_isi', 'status_foto', 'status_berkas', 'des_tema', 'des_isi', 'des_foto', 'des_berkas', 'created_at', 'updated_at'
    ];

    public function laporan_penyuluhan(){
    	return $this->belongsTo(laporan_penyuluhan::class,"laporan_penyuluhan_id");
    }

}
