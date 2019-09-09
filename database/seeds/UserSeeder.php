<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
            'email' => 'admin@codedojo.me',
            'password' => bcrypt('C0d3D0j0!'),
        ]);

        DB::table('users')->insert([
            'name' => 'Code Dojo User',
            'email' => 'user@codedojo.me',
            'password' => bcrypt('C0d3D0j0!'),
        ]);
    }
}
