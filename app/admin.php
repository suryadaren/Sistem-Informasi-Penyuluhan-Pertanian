<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
    protected $table = "admin";

     protected $fillable = [
        'username', 'password', 'created_at', 'updated_at'
    ];
}
