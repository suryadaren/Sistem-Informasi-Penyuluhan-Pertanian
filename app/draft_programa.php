<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class draft_programa extends Authenticatable
{
    protected $table = "draft_programa";

     protected $fillable = [
        'penyuluh_id', 'latar_belakang','tujuan', 'manfaat', 'biofisik', 'sdm', 'usaha_tani', 'tujuan_perilaku', 'tujuan_non_perilaku', 'masalah_perilaku', 'masalah_non_perilaku', 'total_dana', 'dana_terkirim', 'berkas', 'status', 'created_at', 'updated_at'
    ];

    public function user(){
    	return $this->belongsTo(user::class,"penyuluh_id");
    }

    public function process_draft_programa(){
    	return $this->hasOne('App\process_draft_programa');
    }

    public function surat_tugas(){
        return $this->hasOne('App\surat_tugas');
    }

    public function proposal_dana(){
        return $this->hasMany('App\proposal_dana');
    }

    public function laporan_penyuluhan() {
        $this->hasMany(laporan_penyuluhan::class);
    }
}
