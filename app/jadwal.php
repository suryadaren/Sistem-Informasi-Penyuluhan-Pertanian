<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class jadwal extends Authenticatable
{
    protected $table = "jadwal";

     protected $fillable = [
        'draft_programa_id', 'materi', 'tanggal', 'created_at', 'updated_at'
    ];


    public function draft_programa(){
    	return $this->belongsTo(draft_programa::class,"draft_programa_id");
    }
}
