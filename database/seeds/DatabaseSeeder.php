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

        DB::table('brands')->insert([
            'name' => 'Plantronics',
            'url_logo' => 'plantronics.svg'
        ]);

        DB::table('brands')->insert([
            'name' => 'Sennheiser',
            'url_logo' => 'sennheiser.svg'
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
            'brand_id' => \App\Brand::where('name', 'Jabra')->firstOrFail()->id
        ]);


        // Attribut 'Filaire', de 'Casques téléphoniques'

        DB::table('attributes')->insert([
            'name' => 'Filaire',
            'category_id' => \App\Category::where('name', 'Casques téléphoniques')->firstOrFail()->id,
            'identification' => 'filaire',
            'assignement_multiple' => 0
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Filaire')->firstOrFail()->id,
            'value' => 'Filaire',
            'identification' => '250'
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Filaire')->firstOrFail()->id,
            'value' => 'Sans-fil',
            'identification' => '246'
        ]);


        // Attribut 'Autonomie en conversation', de 'Casques téléphoniques'

        DB::table('attributes')->insert([
            'name' => 'Autonomie en conversation',
            'category_id' => \App\Category::where('name', 'Casques téléphoniques')->firstOrFail()->id,
            'identification' => 'autonomie_conversation',
            'assignement_multiple' => 0
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Filaire')->firstOrFail()->id,
            'value' => '10 heures',
            'identification' => '9h-11h'
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Filaire')->firstOrFail()->id,
            'value' => '7 heures',
            'identification' => '6h-8h'
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Filaire')->firstOrFail()->id,
            'value' => 'Plus de 11 heures',
            'identification' => '+11h'
        ]);


        // Attribut 'Autonomie en veille', de 'Casques téléphoniques'

        DB::table('attributes')->insert([
            'name' => 'Autonomie en veille',
            'category_id' => \App\Category::where('name', 'Casques téléphoniques')->firstOrFail()->id,
            'identification' => 'autonomie_veille',
            'assignement_multiple' => 0
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Filaire')->firstOrFail()->id,
            'value' => '60 heures',
            'identification' => '60h'
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Filaire')->firstOrFail()->id,
            'value' => '50 heures',
            'identification' => '50h'
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Filaire')->firstOrFail()->id,
            'value' => '40 heures',
            'identification' => '40h'
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Filaire')->firstOrFail()->id,
            'value' => '100 heures',
            'identification' => '100h'
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Filaire')->firstOrFail()->id,
            'value' => 'Plus de 150 heures',
            'identification' => '+ 150h'
        ]);


    }
}
