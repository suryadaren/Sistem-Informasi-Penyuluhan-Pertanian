<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class process_proposal_dana extends Authenticatable
{
    protected $table = "process_proposal_dana";

    protected $fillable = [
        'proposal_dana_id', 'status_dana', 'status_isi', 'status_berkas', 'des_dana', 'des_isi', 'des_berkas', 'created_at', 'updated_at'
    ];

    public function proposal_dana(){
    	return $this->belongsTo(proposal_dana::class,"proposal_dana_id");
    }

}
