<?php

use Illuminate\Database\Seeder;
use App\Favori;

class FavorisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $f = new Favori();
        $f->date = date('Y-m-d', strtotime('2020-10-18'));
        $f->info_id = '14';
        $f->cit_id = '1';
        $f->save();

        $f = new Favori();
        $f->date = date('Y-m-d', strtotime('2020-10-12'));
        $f->info_id = '4';
        $f->cit_id = '1';
        $f->save();

        $f = new Favori();
        $f->date = date('Y-m-d', strtotime('2020-10-18'));
        $f->info_id = '12';
        $f->cit_id = '1';
        $f->save();

        $f = new Favori();
        $f->date = date('Y-m-d', strtotime('2020-10-14'));
        $f->info_id = '7';
        $f->cit_id = '1';
        $f->save();

        $f = new Favori();
        $f->date = date('Y-m-d', strtotime('2020-10-17'));
        $f->info_id = '13';
        $f->cit_id = '1';
        $f->save();
    }
}
