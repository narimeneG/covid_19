<?php

use Illuminate\Database\Seeder;
use App\Idee;

class IdeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idee = new Idee();
        $idee->titre = 'Couture des bavettes';
        $idee->contenu = 'On va réaliser des bavettes pour limiter la propagation de covid-19 pour fabriquer les bavettes on les utilise des tissu qui sert à respirer et il faut utiliser une seul fois.';
        $idee->image = 'uploads/idée/2.jpg';
        $idee->etat = 'accepté';
        $idee->date = date('Y-m-d', strtotime('2020-05-18'));
        $idee->cat_id = '2';
        $idee->cit_id = '1';
        $idee->save();

        $idee = new Idee();
        $idee->titre = 'Stériliser les mosquées et les entreprises';
        $idee->contenu = 'On a utilisé des produits de type DERMACOOL pour nettoyage rapide et efficace.';
        $idee->image = 'uploads/idée/3.jpg';
        $idee->etat = 'accepté';
        $idee->date = date('Y-m-d', strtotime('2020-06-22'));
        $idee->cat_id = '3';
        $idee->cit_id = '3';
        $idee->save();

        $idee = new Idee();
        $idee->titre = 'Distribuer des produit au bénévole';
        $idee->contenu = 'Une quantité de produit sanitaire puis une autre quantité de gel hydro alcoolique.';
        $idee->image = 'uploads/idée/5.jpg';
        $idee->etat = 'accepté';
        $idee->date = date('Y-m-d', strtotime('2020-05-18'));
        $idee->cat_id = '1';
        $idee->cit_id = '1';
        $idee->save();

        $idee = new Idee();
        $idee->titre = 'Donner les vetement au profit des pauvre';
        $idee->contenu = 'Des vetements de tous genre(enfant, homme, femme)ainsi les chaussures de bon qualite.';
        $idee->date = date('Y-m-d', strtotime('2020-05-18'));
        $idee->cat_id = '3';
        $idee->cit_id = '3';
        $idee->save();

        $idee = new Idee();
        $idee->titre = 'Préparer des repas aux médecins';
        $idee->contenu = 'Des repas consistants et réconfortants pour soutenir le personnel soignant dans sa noble et dure mission de lutte contre le coronavirus (Covid-19).';
        $idee->image = 'uploads/idée/6.jpg';
        $idee->date = date('Y-m-d', strtotime('2020-04-01'));
        $idee->cat_id = '1';
        $idee->cit_id = '1';
        $idee->save();

        $idee = new Idee();
        $idee->titre = 'Aider le gens indigents';
        $idee->contenu = 'L\'idée est commencée à proposer des livraisons hebdomadaires de légumes, de viandes, de fromages pendant l\'épidémie de coronavirus.';
        $idee->image = 'uploads/idée/1.jpg';
        $idee->date = date('Y-m-d', strtotime('2020-05-18'));
        $idee->cat_id = '2';
        $idee->cit_id = '2';
        $idee->save();

        $idee = new Idee();
        $idee->titre = 'Distribution d\'alimentation';
        $idee->contenu = 'Distribution d\'alimentation sur la wilaya confinée. On a proposé de mettre des paniers dans les superettes et les clients les remplissez avec ce qu\'ils peuvent et on a aussi demandé aux gens de rester chez soi en leurs offrants une livraison gratuite.';
        $idee->date = date('Y-m-d', strtotime('2020-05-18'));
        $idee->cat_id = '2';
        $idee->cit_id = '1';
        $idee->save();
    }
}
