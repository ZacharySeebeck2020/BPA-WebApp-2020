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
        DB::table('products')->insert([
            'short_title' => 'Hydro Flask Bottle Brush',
            'title' => 'Hydro Flask Bottle Brush',
            'description' => 'Keep all your Hydro Flask bottles spotless and ready for your next adventure with the Hydro Flask Bottle Brush. It is tall enough to get to the bottom of even the tallest Hydro Flask bottles and features a non-slip grip for ease of use when cleaning. Simply scrub your bottle clean and hit the road.',
            'price' => '12.95',
        ]);

        DB::table('products')->insert([
            'short_title' => 'Hydro Flask Standard 24oz',
            'title' => 'Hydro Flask Standard Mouth 24oz Bottle',
            'description' => 'Cool off or heat up with this awesome Standard Mouth Bottle by Hydro Flask®! Whether you prefer coffee or refreshing ice water, this bottle keeps your favorite drink at the perfect temperature. BPA free and compatible with other Hydro Flask® lids, this water bottle boasts a powder-coated, sweat-free finish, making it ideal for your daily jaunt.',
            'price' => '34.95',
        ]);

        DB::table('products')->insert([
            'short_title' => 'Hydro Flask Flip Top 20oz',
            'title' => 'Hydro Flask Flip Top 20oz Bottle',
            'description' => 'Take your daily caffeine to go when you travel with the Hydro Flask® Flip Top Coffee Mug! Built for hot and cold beverages alike, this travel bottle delivers the same capacity as coffee shops so you’ll enjoy every drop of coffee while reducing waste! The large, wide mouth design works with the flip top lid for easy drinking and easy commutes. This bottle boasts a powder-coated finish and durable design.',
            'price' => '27.95',
        ]);

        DB::table('products')->insert([
            'short_title' => 'Hydro Flask Flip Wide Lid',
            'title' => 'Hydro Flask Hydro Flip Wide Mouth Lid',
            'description' => 'Cap off your favorite beverage with the Hydro Flip Cap by Hydro Flask®. Designed for easy access, this flip top lid features a rubber stopper to help eliminate spills, and is BPA free for safe, long-term consumption. Whether you’re sipping your coffee in the morning, or a refreshing cold drink later in the day, the Hydro Flip lid boasts compatibility with all newer model wide mouth bottles.',
            'price' => '4.95',
        ]);

        DB::table('products')->insert([
            'title' => 'Hydro Flask 32 oz Tumbler',
            'description' => 'Whether you’re hiking the mountains, hanging out at the campsite or relaxing in the backyard, the Hydro Flask® Tumbler is the perfect companion. You’ll love the TempShield™ double-wall insulation to keep your cold drink cold, or your hot drink hot- longer! The included Honeycomb Insulation™ lid features built-in temperature control, while the press-in design helps eliminate spills while you’re on the go.',
            'price' => '39.95',
        ]);
    }
}
