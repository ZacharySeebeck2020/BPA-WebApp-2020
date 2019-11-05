<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);

        // Category seeder because calling it won't work.

        DB::table('categories')->insert([
            'name' => 'Fishing',
            'visible_in_menu' => true,
        ]);

        DB::table('categories')->insert([
            'name' => 'Hunting',
            'visible_in_menu' => true,
        ]);

        DB::table('categories')->insert([
            'name' => 'Clothing',
            'visible_in_menu' => true,
        ]);

        DB::table('categories')->insert([
            'name' => 'Pet Needs',
            'visible_in_menu' => true,
        ]);
    }
}
