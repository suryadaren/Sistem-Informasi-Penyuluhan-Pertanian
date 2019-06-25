<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class laporan_penyuluhan extends Authenticatable
{
    protected $table = "laporan_penyuluhan";

    protected $fillable = [
        'draft_programa_id', 'tema', 'content', 'foto', 'berkas','presensi', 'jadwal_penyuluhan', 'dana_terpakai', 'status', 'created_at', 'updated_at'
    ];

    public function draft_programa(){
    	return $this->belongsTo(draft_programa::class,"draft_programa_id");
    }

    public function process_laporan_penyuluhan(){
    	return $this->hasOne('App\process_laporan_penyuluhan');
    }

}
