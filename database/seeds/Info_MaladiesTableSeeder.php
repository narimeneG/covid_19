<?php

use Illuminate\Database\Seeder;

class Info_MaladiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('info_maladies')->insert([
            [
                'mal_id' => '1',
                'info_id' => '8'
            ],
            [
                'mal_id' => '2',
                'info_id' => '8'
            ],
            [
                'mal_id' => '3',
                'info_id' => '8'
            ],
            [
                'mal_id' => '4',
                'info_id' => '8'
            ],
            [
                'mal_id' => '5',
                'info_id' => '8'
            ],
            [
                'mal_id' => '6',
                'info_id' => '8'
            ],
            [
                'mal_id' => '7',
                'info_id' => '8'
            ],
            [
                'mal_id' => '8',
                'info_id' => '8'
            ],
            [
                'mal_id' => '9',
                'info_id' => '8'
            ],
            [
                'mal_id' => '10',
                'info_id' => '8'
            ],
            [
                'mal_id' => '11',
                'info_id' => '8'
            ]
        ]);
    }
}
