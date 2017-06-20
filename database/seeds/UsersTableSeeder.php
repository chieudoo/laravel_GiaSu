<?php

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
        DB::table('giasu_users_admin')->insert([
        	'name'=>'admin',
        	'email'=>'admin@gmail.com',
        	'password'=>bcrypt('admin'),
        ]);
    }
}
