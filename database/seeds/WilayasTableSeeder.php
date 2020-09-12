<?php

use Illuminate\Database\Seeder;
use App\Wilaya;

class WilayasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $w = new Wilaya();
        $w->nom = 'Blida';
        $w->save();

        $w = new Wilaya();
        $w->nom = 'Sétif';
        $w->save();

        $w = new Wilaya();
        $w->nom = 'Oran';
        $w->save();

        $w = new Wilaya();
        $w->nom = 'Constantine';
        $w->save();

        $w = new Wilaya();
        $w->nom = 'Batna';
        $w->save();

        $w = new Wilaya();
        $w->nom = 'Ouargla';
        $w->save();

        $w = new Wilaya();
        $w->nom = 'Alger';
        $w->save();

        $w = new Wilaya();
        $w->nom = 'Biskra';
        $w->save();

        $w = new Wilaya();
        $w->nom = 'Béjaia';
        $w->save();

        $w = new Wilaya();
        $w->nom = 'Tlemcen';
        $w->save();

        $w = new Wilaya();
        $w->nom = 'El Oued';
        $w->save();
    }
}
