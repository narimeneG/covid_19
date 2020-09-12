<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Citoyens_MaladiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('citoyen_maladies')->insert([
            [
                'mal_id' => '1',
                'cit_id' => '1'
            ],
            [
                'mal_id' => '2',
                'cit_id' => '1'
            ],
            [
                'mal_id' => '3',
                'cit_id' => '2'
            ],
            [
                'mal_id' => '4',
                'cit_id' => '2'
            ]
        ]);
    }
}
