<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sellables')->insert([
            'title' => 'Habit Techshell Pant & Top',
            'original_price' => 59.99,
            'on_sale' => false,
        ]);

        DB::table('sellables')->insert([
            'title' => 'Habit Men\'s Scent Factor Pant',
            'original_price' => 39.99,
            'on_sale' => false,
        ]);

        DB::table('sellables')->insert([
            'title' => 'Habit Men\'s Techsell Dimensions Jacket RTX',
            'original_price' => 59.99,
            'on_sale' => false,
        ]);
    }
}
