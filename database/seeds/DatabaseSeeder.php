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
            'name' => 'Footwear',
            'visible_in_menu' => true,
        ]);

        DB::table('categories')->insert([
            'name' => 'Apparel',
            'visible_in_menu' => true,
        ]);

        DB::table('categories')->insert([
            'name' => 'Outdoor',
            'visible_in_menu' => true,
        ]);

        DB::table('categories')->insert([
            'name' => 'Fan Supplies',
            'visible_in_menu' => true,
        ]);

        DB::table('categories')->insert([
            'name' => 'Holidays',
            'visible_in_menu' => true,
        ]);
    }
}
