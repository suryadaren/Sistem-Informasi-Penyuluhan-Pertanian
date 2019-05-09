<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class draft_programa extends Authenticatable
{
    protected $table = "draft_programa";

     protected $fillable = [
        'penyuluh_id', 'latar_belakang','tujuan', 'manfaat', 'biofisik', 'sdm', 'usaha_tani', 'tujuan_perilaku', 'tujuan_non_perilaku', 'masalah_perilaku', 'masalah_non_perilaku', 'total_dana', 'berkas', 'status', 'created_at', 'updated_at'
    ];

    public function user(){
    	return $this->belongsTo(user::class,"penyuluh_id");
    }
}
