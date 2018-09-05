<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
            'assignement_multiple' => 0,
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
            'assignement_multiple' => 0,
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
            'assignement_multiple' => 0,
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
            'assignement_multiple' => 1,
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
            'assignement_multiple' => 1,
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
            'assignement_multiple' => 0,
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
    }
}
