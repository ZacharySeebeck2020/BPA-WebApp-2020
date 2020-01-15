<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Shoes
        $shoes = json_decode(file_get_contents('storage/data/Shoes.json'));
        foreach ($shoes as $key => $shoe) {
            DB::table('products')->insert([
                'name' => $shoe->brand . " " . $shoe->name,
                'slug' => Str::slug($shoe->slug) . Str::random(5),
                'details' => $shoe->details,
                'price' => str_replace('$', '', $shoe->price),
                'description' => $shoe->description,
                'short_description' => $shoe->short_description,
                'featured' => $shoe->featured,
                'category_id' => $shoe->category_id,
                'image' => $shoe->image
            ]);
        }

        // Apparel
        $apparel = json_decode(file_get_contents('storage/data/Apparel.json'));
        foreach ($apparel as $key => $app) {
            DB::table('products')->insert([
                'name' => $app->brand . " " . $app->name,
                'slug' => Str::slug($app->slug) . Str::random(5),
                'details' => $app->details,
                'price' => str_replace('$', '', $app->price),
                'description' => $app->description,
                'short_description' => $app->short_description,
                'featured' => $app->featured,
                'category_id' => $app->category_id,
                'image' => $app->image
            ]);
        }

        // Outdoor
        $apparel = json_decode(file_get_contents('storage/data/Outdoor.json'));
        foreach ($apparel as $key => $app) {
            DB::table('products')->insert([
                'name' => $app->brand . " " . $app->name,
                'slug' => Str::slug($app->slug) . Str::random(5),
                'details' => $app->details,
                'price' => str_replace('$', '', $app->price),
                'description' => $app->description,
                'short_description' => $app->short_description,
                'featured' => $app->featured,
                'category_id' => $app->category_id,
                'image' => $app->image
            ]);
        }
    }
}
