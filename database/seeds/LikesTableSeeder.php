<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('likes')->insert([
            [
                'cit_id' => 1,
                'idee_id' => 1,
                'like' => 1
            ],[
                'cit_id' => 1,
                'idee_id' => 2,
                'like' => 0
            ],[
                'cit_id' => 1,
                'idee_id' => 3,
                'like' => 1
            ],[
                'cit_id' => 2,
                'idee_id' => 1,
                'like' => 1
            ],[
                'cit_id' => 2,
                'idee_id' => 2,
                'like' => 0
            ],[
                'cit_id' => 1,
                'idee_id' => 3,
                'like' => 0
            ]
        ]);
    }
}
