<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaladiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('maladies')->insert([
            [
                'nom' => 'Cardiopathies'
            ],[
                'nom' => 'Diabétique'
            ],[
                'nom' => 'Allergique'
            ],[
                'nom' => 'Hypertension'
            ],[
                'nom' => 'Cholestérol'
            ],[
                'nom' => 'Infarctus'
            ],[
                'nom' => 'Hypothyroïdie'
            ],[
                'nom' => 'Asthme'
            ],[
                'nom' => 'Schizophrénie'
            ],[
                'nom' => 'Cancer'
            ],[
                'nom' => 'Accidents vasculaires cérébraux'
            ],[
                'nom' => 'Valvulopathie'
            ],[
                'nom' => 'Bronchite chronique'
            ],[
                'nom' => 'Fibrose pulmonaire'
            ],[
                'nom' => 'Sinusite chronique'
            ],[
                'nom' => 'Arthrose'
            ],[
                'nom' => 'Scoliose'
            ],[
                'nom' => 'Amylose'
            ],[
                'nom' => 'Anémie de Fanconi'
            ],[
                'nom' => 'Tuberculose'
            ],[
                'nom' => 'Hépatite C'
            ]
        ]);
    }
}
