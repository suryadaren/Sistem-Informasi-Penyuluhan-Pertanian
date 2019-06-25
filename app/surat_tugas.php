<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class surat_tugas extends Authenticatable
{
    protected $table = "surat_tugas";

     protected $fillable = [
        'draft_programa_id', 'content', 'berkas', 'status', 'created_at', 'updated_at'
    ];
    

    public function draft_programa(){
    	return $this->belongsTo(draft_programa::class,"draft_programa_id");
    }

    public function process_surat_tugas(){
    	return $this->hasOne('App\process_surat_tugas');
    }
}
