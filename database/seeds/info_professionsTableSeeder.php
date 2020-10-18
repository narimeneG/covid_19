<?php

use Illuminate\Database\Seeder;

class info_professionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('info_professions')->insert([
            [
                'pro_id' => '11',
                'info_id' => '2'
            ],
            [
                'pro_id' => '11',
                'info_id' => '3'
            ],
            [
                'pro_id' => '2',
                'info_id' => '4'
            ],
            [
                'pro_id' => '8',
                'info_id' => '4'
            ],
            [
                'pro_id' => '2',
                'info_id' => '5'
            ],
            [
                'pro_id' => '8',
                'info_id' => '5'
            ]
            
            ]);

    }
}
