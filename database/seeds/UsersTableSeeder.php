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
        //
        \App\User::create([
            'name' => 'Fahmi Dafrin Maulana',
            'username' => 'dafrin',
            'password' => bcrypt('password'),
            'email'=> 'dafrinm@gmail.com'
        ]);
    }
}
