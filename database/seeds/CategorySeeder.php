<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Fishing',
            'visible_in_menu' => 'true',
        ]);

        DB::table('categories')->insert([
            'name' => 'Hunting',
            'visible_in_menu' => 'true',
        ]);

        DB::table('categories')->insert([
            'name' => 'Clothing',
            'visible_in_menu' => 'true',
        ]);

        DB::table('categories')->insert([
            'name' => 'Pet Needs',
            'visible_in_menu' => 'false',
        ]);
    }
}
