<?php

use Illuminate\Database\Seeder;
use App\Profession;

class ProfessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new Profession();
        $p->nom = 'Pharmacien';
        $p->save();

        $p = new Profession();
        $p->nom = 'Enseignant';
        $p->save();

        $p = new Profession();
        $p->nom = 'Medecin';
        $p->save();

        $p = new Profession();
        $p->nom = 'Infermier';
        $p->save();

        $p = new Profession();
        $p->nom = 'Agent policier';
        $p->save();

        $p = new Profession();
        $p->nom = 'Sapeur-pompier';
        $p->save();

        $p = new Profession();
        $p->nom = 'Commerçant';
        $p->save();

        $p = new Profession();
        $p->nom = 'Etudiant';
        $p->save();

        $p = new Profession();
        $p->nom = 'Coiffeure';
        $p->save();

        $p = new Profession();
        $p->nom = 'Gendarme';
        $p->save();

        $p = new Profession();
        $p->nom = 'Taxieur';
        $p->save();

        $p = new Profession();
        $p->nom = 'Peintre';
        $p->save();

        $p = new Profession();
        $p->nom = 'Maçon';
        $p->save();

        $p = new Profession();
        $p->nom = 'Menuisier';
        $p->save();

        $p = new Profession();
        $p->nom = 'Educateur';
        $p->save();

        $p = new Profession();
        $p->nom = 'Cultuvateur';
        $p->save();

        $p = new Profession();
        $p->nom = 'Cordonnier';
        $p->save();

        $p = new Profession();
        $p->nom = 'Blombier';
        $p->save();
        
        $p = new Profession();
        $p->nom = 'Eboueur';
        $p->save();
    }
}
