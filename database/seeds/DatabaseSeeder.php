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

        // ------------ Default user

        DB::table('users')->insert([
            'name' => 'toto',
            'email' => 'toto@connexing.com',
            'password' => bcrypt('toto'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // ------------ Brands

        DB::table('brands')->insert([
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

        /*DB::table('products')->insert([
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
        ]);*/

        // ------------ Attributes

        DB::table('categories')->insert([
            'name' => 'Casques téléphoniques',
            'url_img' => 'QCNIfezfiqdsbnze.png',
            'identification' => 'casques',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Attribut 'Filaire', de 'Casques téléphoniques'

        DB::table('attributes')->insert([
            'name' => 'Filaire',
            'category_id' => \App\Category::where('name', 'Casques téléphoniques')->firstOrFail()->id,
            'identification' => 'filaire',
            'assignment_multiple' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Filaire')->firstOrFail()->id,
            'value' => 'Filaire',
            'identification' => '250',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Filaire')->firstOrFail()->id,
            'value' => 'Sans-fil',
            'identification' => '246',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


        // Attribut 'Autonomie en conversation', de 'Casques téléphoniques'

        DB::table('attributes')->insert([
            'name' => 'Autonomie en conversation',
            'category_id' => \App\Category::where('name', 'Casques téléphoniques')->firstOrFail()->id,
            'identification' => 'autonomie_conversation',
            'assignment_multiple' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Autonomie en conversation')->firstOrFail()->id,
            'value' => '10 heures',
            'identification' => '9h-11h',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Autonomie en conversation')->firstOrFail()->id,
            'value' => '7 heures',
            'identification' => '6h-8h',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Autonomie en conversation')->firstOrFail()->id,
            'value' => 'Plus de 11 heures',
            'identification' => '+11h',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


        // Attribut 'Autonomie en veille', de 'Casques téléphoniques'

        DB::table('attributes')->insert([
            'name' => 'Autonomie en veille',
            'category_id' => \App\Category::where('name', 'Casques téléphoniques')->firstOrFail()->id,
            'identification' => 'autonomie_veille',
            'assignment_multiple' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Autonomie en veille')->firstOrFail()->id,
            'value' => '60 heures',
            'identification' => '60h',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Autonomie en veille')->firstOrFail()->id,
            'value' => '50 heures',
            'identification' => '50h',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Autonomie en veille')->firstOrFail()->id,
            'value' => '40 heures',
            'identification' => '40h',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Autonomie en veille')->firstOrFail()->id,
            'value' => '100 heures',
            'identification' => '100h',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Autonomie en veille')->firstOrFail()->id,
            'value' => 'Plus de 150 heures',
            'identification' => '+ 150h',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


        // Attribut 'Connexion', de 'Casques téléphoniques'

        DB::table('attributes')->insert([
            'name' => 'Connexion',
            'category_id' => \App\Category::where('name', 'Casques téléphoniques')->firstOrFail()->id,
            'identification' => 'connexion_casque',
            'assignment_multiple' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Connexion')->firstOrFail()->id,
            'value' => 'Ethernet',
            'identification' => 'RJ',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Connexion')->firstOrFail()->id,
            'value' => 'Cordon QD',
            'identification' => 'QD',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Connexion')->firstOrFail()->id,
            'value' => 'Câble USB',
            'identification' => 'USB',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Connexion')->firstOrFail()->id,
            'value' => 'Bluetooth',
            'identification' => 'Bluetooth',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Connexion')->firstOrFail()->id,
            'value' => 'Câble Jack',
            'identification' => 'Jack',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Attribut 'Compatibilité', de 'Casques téléphoniques'

        DB::table('attributes')->insert([
            'name' => 'Compatibilité',
            'category_id' => \App\Category::where('name', 'Casques téléphoniques')->firstOrFail()->id,
            'identification' => 'compatibilites_casque',
            'assignment_multiple' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Compatibilité')->firstOrFail()->id,
            'value' => 'Téléphone fixe',
            'identification' => 'Tel Fixe',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Compatibilité')->firstOrFail()->id,
            'value' => 'Ordinateur',
            'identification' => 'PC',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Compatibilité')->firstOrFail()->id,
            'value' => 'Mobile',
            'identification' => 'Gsm',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Compatibilité')->firstOrFail()->id,
            'value' => 'Téléphone sans fil',
            'identification' => 'DECT',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Attribut 'Nombre d'écouteurs', de 'Casques téléphoniques'

        DB::table('attributes')->insert([
            'name' => 'Nombre d\'écouteurs',
            'category_id' => \App\Category::where('name', 'Casques téléphoniques')->firstOrFail()->id,
            'identification' => 'nombre_ecouteurs',
            'assignment_multiple' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Nombre d\'écouteurs')->firstOrFail()->id,
            'value' => 'Monaural',
            'identification' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Nombre d\'écouteurs')->firstOrFail()->id,
            'value' => 'Binaural',
            'identification' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Attribut 'Prix', de 'Casques téléphoniques'

        DB::table('attributes')->insert([
            'name' => 'Prix',
            'category_id' => \App\Category::where('name', 'Casques téléphoniques')->firstOrFail()->id,
            'identification' => 'price',
            'assignment_multiple' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Prix')->firstOrFail()->id,
            'value' => '< 100 €',
            'identification' => '100',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Prix')->firstOrFail()->id,
            'value' => '100 - 200 €',
            'identification' => '150',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Prix')->firstOrFail()->id,
            'value' => '> 200 €',
            'identification' => '200',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Attribut 'Marque', de 'Casques téléphoniques'

        DB::table('attributes')->insert([
            'name' => 'Marque',
            'category_id' => \App\Category::where('name', 'Casques téléphoniques')->firstOrFail()->id,
            'identification' => 'brand',
            'assignment_multiple' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Marque')->firstOrFail()->id,
            'value' => 'Jabra',
            'identification' => 'jabra',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Marque')->firstOrFail()->id,
            'value' => 'Plantronics',
            'identification' => 'plantronics',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('default_values')->insert([
            'attribute_id' => \App\Attribute::where('name', 'Marque')->firstOrFail()->id,
            'value' => 'Sennheiser',
            'identification' => 'sennheiser',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);



        // ------------ Questions

        // Question 'Êtes-vous mobile dans votre activité ?', de 'Casques téléphoniques'

        DB::table('questions')->insert([
            'value' => 'Êtes-vous mobile dans votre activité ?',
            'category_id' => \App\Category::where('name', 'Casques téléphoniques')->firstOrFail()->id,
            'attribute_id' => \App\Attribute::where('name', 'Filaire')->firstOrFail()->id,
            'order' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('answers')->insert([
            'question_id' => \App\Question::where('value', 'Êtes-vous mobile dans votre activité ?')->firstOrFail()->id,
            'default_value_id' => \App\DefaultValue::where('value', 'Filaire')->firstOrFail()->id,
            'value' => 'Je me déplace peu',
            'order' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('answers')->insert([
            'question_id' => \App\Question::where('value', 'Êtes-vous mobile dans votre activité ?')->firstOrFail()->id,
            'default_value_id' => \App\DefaultValue::where('value', 'Sans-fil')->firstOrFail()->id,
            'value' => 'Je suis mobile',
            'order' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


        // Question 'Dans quel type d'environnement travaillez-vous ?', de 'Casques téléphoniques'

        DB::table('questions')->insert([
            'value' => 'Dans quel type d\'environnement travaillez-vous ?',
            'category_id' => \App\Category::where('name', 'Casques téléphoniques')->firstOrFail()->id,
            'attribute_id' => \App\Attribute::where('name', 'Nombre d\'écouteurs')->firstOrFail()->id,
            'order' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('answers')->insert([
            'question_id' => \App\Question::where('value', 'Dans quel type d\'environnement travaillez-vous ?')->firstOrFail()->id,
            'default_value_id' => \App\DefaultValue::where('value', 'Binaural')->firstOrFail()->id,
            'value' => 'Plutôt un environnement bruyant',
            'order' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('answers')->insert([
            'question_id' => \App\Question::where('value', 'Dans quel type d\'environnement travaillez-vous ?')->firstOrFail()->id,
            'default_value_id' => \App\DefaultValue::where('value', 'Monaural')->firstOrFail()->id,
            'value' => 'C\'est plutôt calme',
            'order' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


        // Question '', de 'Casques téléphoniques'

        DB::table('questions')->insert([
            'value' => 'À quel support souhaitez-vous connecter votre casque ?',
            'category_id' => \App\Category::where('name', 'Casques téléphoniques')->firstOrFail()->id,
            'attribute_id' => \App\Attribute::where('name', 'Compatibilité')->firstOrFail()->id,
            'order' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('answers')->insert([
            'question_id' => \App\Question::where('value', 'À quel support souhaitez-vous connecter votre casque ?')->firstOrFail()->id,
            'default_value_id' => \App\DefaultValue::where('value', 'Téléphone sans fil')->firstOrFail()->id,
            'value' => 'Téléphone sans fil',
            'order' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('answers')->insert([
            'question_id' => \App\Question::where('value', 'À quel support souhaitez-vous connecter votre casque ?')->firstOrFail()->id,
            'default_value_id' => \App\DefaultValue::where('value', 'Mobile')->firstOrFail()->id,
            'value' => 'Mobile',
            'order' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('answers')->insert([
            'question_id' => \App\Question::where('value', 'À quel support souhaitez-vous connecter votre casque ?')->firstOrFail()->id,
            'default_value_id' => \App\DefaultValue::where('value', 'Ordinateur')->firstOrFail()->id,
            'value' => 'Ordinateur',
            'order' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('answers')->insert([
            'question_id' => \App\Question::where('value', 'À quel support souhaitez-vous connecter votre casque ?')->firstOrFail()->id,
            'default_value_id' => \App\DefaultValue::where('value', 'Téléphone fixe')->firstOrFail()->id,
            'value' => 'Téléphone fixe',
            'order' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


        // Question 'Comment souhaitez-vous connecter votre casque ?', de 'Casques téléphoniques'

        DB::table('questions')->insert([
            'value' => 'Comment souhaitez-vous connecter votre casque ?',
            'category_id' => \App\Category::where('name', 'Casques téléphoniques')->firstOrFail()->id,
            'attribute_id' => \App\Attribute::where('name', 'Connexion')->firstOrFail()->id,
            'order' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('answers')->insert([
            'question_id' => \App\Question::where('value', 'Comment souhaitez-vous connecter votre casque ?')->firstOrFail()->id,
            'default_value_id' => \App\DefaultValue::where('value', 'Câble Jack')->firstOrFail()->id,
            'value' => 'Câble Jack',
            'order' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('answers')->insert([
            'question_id' => \App\Question::where('value', 'Comment souhaitez-vous connecter votre casque ?')->firstOrFail()->id,
            'default_value_id' => \App\DefaultValue::where('value', 'Bluetooth')->firstOrFail()->id,
            'value' => 'Bluetooth',
            'order' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('answers')->insert([
            'question_id' => \App\Question::where('value', 'Comment souhaitez-vous connecter votre casque ?')->firstOrFail()->id,
            'default_value_id' => \App\DefaultValue::where('value', 'Câble USB')->firstOrFail()->id,
            'value' => 'Câble USB',
            'order' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('answers')->insert([
            'question_id' => \App\Question::where('value', 'Comment souhaitez-vous connecter votre casque ?')->firstOrFail()->id,
            'default_value_id' => \App\DefaultValue::where('value', 'Cordon QD')->firstOrFail()->id,
            'value' => 'Cordon QD',
            'order' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('answers')->insert([
            'question_id' => \App\Question::where('value', 'Comment souhaitez-vous connecter votre casque ?')->firstOrFail()->id,
            'default_value_id' => \App\DefaultValue::where('value', 'Ethernet')->firstOrFail()->id,
            'value' => 'Ethernet / Câble réseau',
            'order' => 6,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Question 'Communiquez-vous longtemps dans une journée ?', de 'Casques téléphoniques'

        DB::table('questions')->insert([
            'value' => 'Communiquez-vous longtemps dans une journée ?',
            'category_id' => \App\Category::where('name', 'Casques téléphoniques')->firstOrFail()->id,
            'attribute_id' => \App\Attribute::where('name', 'Autonomie en conversation')->firstOrFail()->id,
            'order' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('answers')->insert([
            'question_id' => \App\Question::where('value', 'Communiquez-vous longtemps dans une journée ?')->firstOrFail()->id,
            'default_value_id' => \App\DefaultValue::where('value', '7 heures')->firstOrFail()->id,
            'value' => 'Basique (6h - 8h)',
            'order' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('answers')->insert([
            'question_id' => \App\Question::where('value', 'Communiquez-vous longtemps dans une journée ?')->firstOrFail()->id,
            'default_value_id' => \App\DefaultValue::where('value', '10 heures')->firstOrFail()->id,
            'value' => 'Intermédiaire (9h-11h)',
            'order' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('answers')->insert([
            'question_id' => \App\Question::where('value', 'Communiquez-vous longtemps dans une journée ?')->firstOrFail()->id,
            'default_value_id' => \App\DefaultValue::where('value', 'Plus de 11 heuress')->firstOrFail()->id,
            'value' => 'Intensive (Plus de 11h)',
            'order' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


        // Question 'Quel est votre budget ?', de 'Casques téléphoniques'

        DB::table('questions')->insert([
            'value' => 'Quel est votre budget ?',
            'category_id' => \App\Category::where('name', 'Casques téléphoniques')->firstOrFail()->id,
            'attribute_id' => \App\Attribute::where('name', 'Prix')->firstOrFail()->id,
            'order' => 6,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('answers')->insert([
            'question_id' => \App\Question::where('value', 'Communiquez-vous longtemps dans une journée ?')->firstOrFail()->id,
            'default_value_id' => \App\DefaultValue::where('value', '< 100 €')->firstOrFail()->id,
            'value' => 'Économique (< 100 €)',
            'order' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('answers')->insert([
            'question_id' => \App\Question::where('value', 'Communiquez-vous longtemps dans une journée ?')->firstOrFail()->id,
            'default_value_id' => \App\DefaultValue::where('value', '100 - 200 €')->firstOrFail()->id,
            'value' => 'Raisonnable (100 - 200 € )',
            'order' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('answers')->insert([
            'question_id' => \App\Question::where('value', 'Communiquez-vous longtemps dans une journée ?')->firstOrFail()->id,
            'default_value_id' => \App\DefaultValue::where('value', '> 200 €')->firstOrFail()->id,
            'value' => 'Maximale  (> 200 €)',
            'order' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    // Question 'Quel est votre budget ?', de 'Casques téléphoniques'

        DB::table('questions')->insert([
            'value' => 'Avez-vous des préférences de marques ?',
            'category_id' => \App\Category::where('name', 'Casques téléphoniques')->firstOrFail()->id,
            'attribute_id' => \App\Attribute::where('name', 'Prix')->firstOrFail()->id,
            'order' => 6,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('answers')->insert([
            'question_id' => \App\Question::where('value', 'Avez-vous des préférences de marques ?')->firstOrFail()->id,
            'default_value_id' => \App\DefaultValue::where('value', 'Jabra')->firstOrFail()->id,
            'value' => 'Jabra',
            'order' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('answers')->insert([
            'question_id' => \App\Question::where('value', 'Avez-vous des préférences de marques ?')->firstOrFail()->id,
            'default_value_id' => \App\DefaultValue::where('value', 'Plantronics')->firstOrFail()->id,
            'value' => 'Plantronics',
            'order' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('answers')->insert([
            'question_id' => \App\Question::where('value', 'Avez-vous des préférences de marques ?')->firstOrFail()->id,
            'default_value_id' => \App\DefaultValue::where('value', 'Sennheiser')->firstOrFail()->id,
            'value' => 'Sennheiser',
            'order' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}