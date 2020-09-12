<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sources')->insert([
            [
                'nom' => 'Ministère de la santé'
            ],[
                'nom' => 'Ministère de l\'enseignement supérieur et de la recherche scientifique'
            ],[
                'nom' => 'Ministère de l\'éducation'
            ],[
                'nom' => 'Ministère des affaires religieuses et des Wakfs'
            ],[
                'nom' => 'Ministère de la Défense'
            ],[
                'nom' => 'Ministre de tourisme'
            ],[
                'nom' => 'Ministère de la jeunesse et des sports'
            ]
        ]);
    }
}
