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
        DB::table('users')->insert([
            'name' => 'toto',
            'email' => 'toto@connexing.com',
            'password' => bcrypt('toto')
        ]);

        DB::table('categories')->insert([
            'name' => 'Casques téléphoniques',
            'url_img' => 'QCNIfezfiqdsbnze.png',
            'identification' => 'casques'
        ]);

        DB::table('brands')->insert([
            'name' => 'Jabra',
            'url_logo' => 'jabra.svg'
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
            'category_id' => 1,
            'brand_id' => 1
        ]);

    }
}
