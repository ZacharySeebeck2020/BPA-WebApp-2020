<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Footwear',
            'slug' => 'footwear',
        ]);

        DB::table('categories')->insert([
            'name' => 'Apparel',
            'slug' => 'apparel',
        ]);

        DB::table('categories')->insert([
            'name' => 'Outdoor',
            'slug' => 'outdoor',
        ]);

        DB::table('categories')->insert([
            'name' => 'Accessories',
            'slug' => 'accessories',
        ]);
    }
}
