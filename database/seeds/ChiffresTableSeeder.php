<?php

use Illuminate\Database\Seeder;
use App\Chiffre;

class ChiffresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = new Chiffre();
        $c->nbrmal = '65';
        $c->nbrgue = '23';
        $c->nbrmort = '12';
        $c->date = date('Y-m-d', strtotime('2020-05-13'));
        $c->wilaya_id= '1';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '317';
        $c->nbrgue = '80';
        $c->nbrmort = '10';
        $c->date = date('Y-m-d', strtotime('2020-05-13'));
        $c->wilaya_id= '2';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '378';
        $c->nbrgue = '23';
        $c->nbrmort = '6';
        $c->date = date('Y-m-d', strtotime('2020-05-13'));
        $c->wilaya_id= '3';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '281';
        $c->nbrgue = '98';
        $c->nbrmort = '20';
        $c->date = date('Y-m-d', strtotime('2020-05-13'));
        $c->wilaya_id= '4';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '83';
        $c->nbrgue = '16';
        $c->nbrmort = '4';
        $c->date = date('Y-m-d', strtotime('2020-05-13'));
        $c->wilaya_id= '5';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '143';
        $c->nbrgue = '25';
        $c->nbrmort = '6';
        $c->date = date('Y-m-d', strtotime('2020-05-13'));
        $c->wilaya_id= '6';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '83';
        $c->nbrgue = '16';
        $c->nbrmort = '4';
        $c->date = date('Y-m-d', strtotime('2020-05-13'));
        $c->wilaya_id= '7';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '143';
        $c->nbrgue = '25';
        $c->nbrmort = '6';
        $c->date = date('Y-m-d', strtotime('2020-05-13'));
        $c->wilaya_id= '6';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '709';
        $c->nbrgue = '233';
        $c->nbrmort = '45';
        $c->date = date('Y-m-d', strtotime('2020-05-13'));
        $c->wilaya_id= '7';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '86';
        $c->nbrgue = '19';
        $c->nbrmort = '1';
        $c->date = date('Y-m-d', strtotime('2020-05-13'));
        $c->wilaya_id= '8';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '124';
        $c->nbrgue = '12';
        $c->nbrmort = '46';
        $c->date = date('Y-m-d', strtotime('2020-05-13'));
        $c->wilaya_id= '9';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '199';
        $c->nbrgue = '26';
        $c->nbrmort = '10';
        $c->date = date('Y-m-d', strtotime('2020-05-13'));
        $c->wilaya_id= '10';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '48';
        $c->nbrgue = '17';
        $c->nbrmort = '2';
        $c->date = date('Y-m-d', strtotime('2020-05-13'));
        $c->wilaya_id= '11';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '16';
        $c->nbrgue = '33';
        $c->nbrmort = '12';
        $c->date = date('Y-m-d', strtotime('2020-05-24'));
        $c->wilaya_id= '1';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '5';
        $c->nbrgue = '33';
        $c->nbrmort = '6';
        $c->date = date('Y-m-d', strtotime('2020-05-24'));
        $c->wilaya_id= '2';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '2';
        $c->nbrgue = '29';
        $c->nbrmort = '9';
        $c->date = date('Y-m-d', strtotime('2020-05-24'));
        $c->wilaya_id= '3';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '18';
        $c->nbrgue = '45';
        $c->nbrmort = '25';
        $c->date = date('Y-m-d', strtotime('2020-05-24'));
        $c->wilaya_id= '4';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '19';
        $c->nbrgue = '12';
        $c->nbrmort = '33';
        $c->date = date('Y-m-d', strtotime('2020-05-24'));
        $c->wilaya_id= '5';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '0';
        $c->nbrgue = '55';
        $c->nbrmort = '2';
        $c->date = date('Y-m-d', strtotime('2020-05-24'));
        $c->wilaya_id= '6';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '14';
        $c->nbrgue = '47';
        $c->nbrmort = '29';
        $c->date = date('Y-m-d', strtotime('2020-05-24'));
        $c->wilaya_id= '7';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '4';
        $c->nbrgue = '44';
        $c->nbrmort = '6';
        $c->date = date('Y-m-d', strtotime('2020-05-24'));
        $c->wilaya_id= '8';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '0';
        $c->nbrgue = '22';
        $c->nbrmort = '5';
        $c->date = date('Y-m-d', strtotime('2020-05-24'));
        $c->wilaya_id= '9';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '10';
        $c->nbrgue = '69';
        $c->nbrmort = '15';
        $c->date = date('Y-m-d', strtotime('2020-05-24'));
        $c->wilaya_id= '10';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '5';
        $c->nbrgue = '12';
        $c->nbrmort = '0';
        $c->date = date('Y-m-d', strtotime('2020-05-24'));
        $c->wilaya_id= '11';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '23';
        $c->nbrgue = '133';
        $c->nbrmort = '45';
        $c->date = date('Y-m-d', strtotime('2020-07-03'));
        $c->wilaya_id= '1';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '60';
        $c->nbrgue = '110';
        $c->nbrmort = '7';
        $c->date = date('Y-m-d', strtotime('2020-07-03'));
        $c->wilaya_id= '2';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '83';
        $c->nbrgue = '68';
        $c->nbrmort = '16';
        $c->date = date('Y-m-d', strtotime('2020-07-03'));
        $c->wilaya_id= '3';
        $c->save();


        $c = new Chiffre();
        $c->nbrmal = '12';
        $c->nbrgue = '15';
        $c->nbrmort = '87';
        $c->date = date('Y-m-d', strtotime('2020-07-03'));
        $c->wilaya_id= '4';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '8';
        $c->nbrgue = '26';
        $c->nbrmort = '11';
        $c->date = date('Y-m-d', strtotime('2020-07-03'));
        $c->wilaya_id= '5';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '0';
        $c->nbrgue = '120';
        $c->nbrmort = '12';
        $c->date = date('Y-m-d', strtotime('2020-07-03'));
        $c->wilaya_id= '6';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '46';
        $c->nbrgue = '50';
        $c->nbrmort = '5';
        $c->date = date('Y-m-d', strtotime('2020-07-03'));
        $c->wilaya_id= '7';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '0';
        $c->nbrgue = '51';
        $c->nbrmort = '1';
        $c->date = date('Y-m-d', strtotime('2020-07-03'));
        $c->wilaya_id= '8';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '4';
        $c->nbrgue = '55';
        $c->nbrmort = '9';
        $c->date = date('Y-m-d', strtotime('2020-07-03'));
        $c->wilaya_id= '9';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '1';
        $c->nbrgue = '17';
        $c->nbrmort = '2';
        $c->date = date('Y-m-d', strtotime('2020-07-03'));
        $c->wilaya_id= '10';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '17';
        $c->nbrgue = '96';
        $c->nbrmort = '8';
        $c->date = date('Y-m-d', strtotime('2020-07-03'));
        $c->wilaya_id= '11';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '13';
        $c->nbrgue = '120';
        $c->nbrmort = '10';
        $c->date = date('Y-m-d', strtotime('2020-08-11'));
        $c->wilaya_id= '1';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '15';
        $c->nbrgue = '78';
        $c->nbrmort = '116';
        $c->date = date('Y-m-d', strtotime('2020-08-11'));
        $c->wilaya_id= '2';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '61';
        $c->nbrgue = '32';
        $c->nbrmort = '25';
        $c->date = date('Y-m-d', strtotime('2020-08-11'));
        $c->wilaya_id= '3';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '1';
        $c->nbrgue = '50';
        $c->nbrmort = '5';
        $c->date = date('Y-m-d', strtotime('2020-08-11'));
        $c->wilaya_id= '4';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '15';
        $c->nbrgue = '8';
        $c->nbrmort = '6';
        $c->date = date('Y-m-d', strtotime('2020-08-11'));
        $c->wilaya_id= '5';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '5';
        $c->nbrgue = '6';
        $c->nbrmort = '1';
        $c->date = date('Y-m-d', strtotime('2020-08-11'));
        $c->wilaya_id= '6';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '52';
        $c->nbrgue = '12';
        $c->nbrmort = '40';
        $c->date = date('Y-m-d', strtotime('2020-08-11'));
        $c->wilaya_id= '7';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '26';
        $c->nbrgue = '6';
        $c->nbrmort = '8';
        $c->date = date('Y-m-d', strtotime('2020-08-11'));
        $c->wilaya_id= '8';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '13';
        $c->nbrgue = '2';
        $c->nbrmort = '10';
        $c->date = date('Y-m-d', strtotime('2020-08-11'));
        $c->wilaya_id= '9';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '8';
        $c->nbrgue = '26';
        $c->nbrmort = '11';
        $c->date = date('Y-m-d', strtotime('2020-08-11'));
        $c->wilaya_id= '10';
        $c->save();

        $c = new Chiffre();
        $c->nbrmal = '12';
        $c->nbrgue = '10';
        $c->nbrmort = '3';
        $c->date = date('Y-m-d', strtotime('2020-08-11'));
        $c->wilaya_id= '11';
        $c->save();
        
    }
}
