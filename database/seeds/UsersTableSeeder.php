<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->truncate();
        $user = new User;
        $user->insert([
        	'name' => 'Doanphu',
        	'email' =>'Doanphuxm01@gmail.com',
        	'password' => bcrypt('12345678'),
            'role' => 1,
        ]);
    }
}
