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


    }
}