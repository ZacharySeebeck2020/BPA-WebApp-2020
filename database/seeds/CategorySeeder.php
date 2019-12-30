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
            'id' => '0',
            'name' => 'Outdoors',
            'parent_id' => null,
            'slug' => 'outdoor'
        ]);

        DB::table('categories')->insert([
            'id' => '1',
            'name' => 'Hunting',
            'parent_id' => 0,
            'slug' => 'outdoor'
        ]);
    }
}
