<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    public function run()
    {
        \App\admin::create([
        	"username" => "admin",
        	"password" => bcrypt("secret")
        ]);
    }
}
