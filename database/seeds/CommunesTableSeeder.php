<?php

use Illuminate\Database\Seeder;
use App\Commune;

class CommunesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = new Commune();
        $c->nom = 'Tlemcen';
        $c->wilaya_id ='10';
        $c->save();

        $c = new Commune();
        $c->nom = 'Blida';
        $c->wilaya_id ='1';
        $c->save();

        $c = new Commune();
        $c->nom = 'Béjaïa';
        $c->wilaya_id ='9';
        $c->save();

        $c = new Commune();
        $c->nom = 'Bab El Oued';
        $c->wilaya_id ='7';
        $c->save();

        $c = new Commune();
        $c->nom = 'Tichy';
        $c->wilaya_id ='9';
        $c->save();

        $c = new Commune();
        $c->nom = 'Chréa';
        $c->wilaya_id ='1';
        $c->save();

        $c = new Commune();
        $c->nom = 'Chetouane';
        $c->wilaya_id ='10';
        $c->save();

        $c = new Commune();
        $c->nom = 'Beni Snous';
        $c->wilaya_id ='10';
        $c->save();

        $c = new Commune();
        $c->nom = 'Alger-Centre';
        $c->wilaya_id ='7';
        $c->save();

        $c = new Commune();
        $c->nom = 'Hennaya';
        $c->wilaya_id ='10';
        $c->save();

        $c = new Commune();
        $c->nom = 'El Harrach';
        $c->wilaya_id ='7';
        $c->save();

        $c = new Commune();
        $c->nom = 'Sebdou';
        $c->wilaya_id ='10';
        $c->save();
    }
}
