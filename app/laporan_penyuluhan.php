<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class laporan_penyuluhan extends Authenticatable
{
    protected $table = "laporan_penyuluhan";

    protected $fillable = [
        'penyuluh_id', 'tema', 'content', 'foto', 'berkas', 'status', 'created_at', 'updated_at'
    ];

    public function user(){
    	return $this->belongsTo(user::class,"penyuluh_id");
    }

    public function process_laporan_penyuluhan(){
    	return $this->hasOne('App\process_laporan_penyuluhan');
    }

}
