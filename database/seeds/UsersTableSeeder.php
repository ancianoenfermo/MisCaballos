<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        User::create(["name" => "Carlos 1", "email" => "carlos1@email.com", "password" => bcrypt("12345678")]);
    	User::create(["name" => "Carlos 2", "email" => "carlos2@email.com", "password" =>  bcrypt("12345678")]);
    	User::create(["name" => "Carlos 3", "email" => "carlos3@email.com", "password" =>  bcrypt("12345678")]);
    	User::create(["name" => "Carlos 4", "email" => "carlos4@email.com", "password" =>  bcrypt("12345678")]);
    	
    }
}
