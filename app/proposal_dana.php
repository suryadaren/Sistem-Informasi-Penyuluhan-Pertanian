<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class proposal_dana extends Authenticatable
{
    protected $table = "proposal_dana";

     protected $fillable = [
        'draft_programa_id', 'dana_dikirim', 'content', 'berkas', 'status', 'created_at', 'updated_at'
    ];
    

    public function draft_programa(){
    	return $this->belongsTo(draft_programa::class,"draft_programa_id");
    }

    public function process_proposal_dana(){
    	return $this->hasOne('App\process_proposal_dana');
    }

    public function kirim_dana(){
        return $this->hasMany('App\kirim_dana');
    }
}
