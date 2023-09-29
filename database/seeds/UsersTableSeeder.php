<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'user',
            'name_full' => 'User Full',
            'email' => 'user@user.com',
            'password' => bcrypt('123456'),
            'isAdmin' => false,
            'status' => 'ativo'
        ]);
    }
}
