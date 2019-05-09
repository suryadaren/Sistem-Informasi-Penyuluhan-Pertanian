<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    public function run()
    {
    	$faker = Faker::create('id_ID');
        for ($i=0; $i < 10 ; $i++) {
	        \App\user::create([
	        	"nama" => $faker->name,
	        	"username" => $faker->userName,
	        	"password" => bcrypt("secret"),
	        	"nip" => "1",
	        	"email" => $faker->email,
	        	"desa" => $faker->city,
	        	"kecamatan" => $faker->state,
	        	"jabatan" => "penyuluh",
	        	"foto" => "3.jpg"
	        ]); 
        }
    }
}
