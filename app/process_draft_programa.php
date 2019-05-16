<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class process_draft_programa extends Authenticatable
{
    protected $table = "process_draft_programa";

    protected $fillable = [
        'draft_programa_id', 'status_pendahuluan', 'status_keadaan', 'status_tujuan', 'status_permasalahan', 'status_berkas', 'des_pendahuluan', 'des_keadaan', 'des_tujuan', 'des_permasalahan', 'des_berkas', 'created_at', 'updated_at'
    ];

    public function draft_programa(){
    	return $this->belongsTo(draft_programa::class,"draft_programa_id");
    }

}
