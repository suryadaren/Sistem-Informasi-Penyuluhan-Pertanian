<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class user extends Authenticatable
{
    protected $table = "user";

     protected $fillable = [
        'nama', 'username', 'password', 'nip', 'email', 'desa', 'kecamatan', 'jabatan', 'foto', 'created_at', 'updated_at'
    ];

    public function draft_programa() {
    	$this->hasMany(draft_programa::class);
    }
    public function notifikasi() {
    	$this->hasMany(notifikasi::class);
    }
}
