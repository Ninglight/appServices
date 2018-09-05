<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'toto',
            'email' => 'toto@connexing.com',
            'password' => bcrypt('toto'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        /*DB::table('brands')->insert([
            'name' => 'Jabra',
            'url_logo' => 'jabra.svg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('brands')->insert([
            'name' => 'Plantronics',
            'url_logo' => 'plantronics.svg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('brands')->insert([
            'name' => 'Sennheiser',
            'url_logo' => 'sennheiser.svg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name' => 'GN 12345',
            'description' => 'Super casque jabra',
            'constructor_reference' => 'AZERTY123456',
            'connexing_reference' => 'P000001',
            'external_url_img' => 'https://www.connexing.fr/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/j/a/jabra-speak710-bluetooth.jpg',
            'status' => true,
            'price' => '10.56',
            'url_ecommerce' => 'https://connexing.fr/jabra',
            'category_id' => \App\Category::where('name', 'Casques téléphoniques')->firstOrFail()->id,
            'brand_id' => \App\Brand::where('name', 'Jabra')->firstOrFail()->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        */



    }
}
