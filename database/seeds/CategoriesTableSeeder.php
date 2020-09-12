<?php

use Illuminate\Database\Seeder;
use App\Categorie;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = new Categorie();
        $cat->nom ='Santé';
        $cat->save();

        $cat = new Categorie();
        $cat->nom ='Commerce';
        $cat->save();

        $cat = new Categorie();
        $cat->nom ='Social';
        $cat->save();
    }
}
