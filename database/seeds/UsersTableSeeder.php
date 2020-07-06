<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => '111',
            'name' => 'Administrator',
            'email' => 'admin@krs.com',
            'password' => Hash::make('111'),
            'role' => 'admin'
        ]);
    }
}
