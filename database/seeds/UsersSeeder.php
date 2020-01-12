<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Code Dojo Administrator',
            'email' => 'admin@ewsg.cf',
            'is_administrator' => true,
            'password' => bcrypt('C0d3D0j0!'),
        ]);
        DB::table('users')->insert([
            'name' => 'Code Dojo User',
            'email' => 'user@ewsg.cf',
            'password' => bcrypt('C0d3D0j0!'),
        ]);
    }
}
