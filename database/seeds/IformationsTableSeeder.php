<?php

use Illuminate\Database\Seeder;
use App\Information;

class IformationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $info = new Information();
        $info->titre = 'Ouverture des mosquées ';
        $info->contenu = 'Les fidèles respectent les procédures en portant des masques et en les espaçant et en quittant la mosquée après avoir terminé la prière.';
        $info->image = 'uploads/info/p10.jpg';
        $info->date = date('Y-m-d', strtotime('2020-08-01'));
        $info->sou_id = '4';
        $info->save();

        $info = new Information();
        $info->titre = 'Autoriser les taxieurs de reprendre leur circuit';
        $info->contenu = 'Respecter les mesures prises par les chauffeurs en portant des masques, en stérilisant et en transportant une seule personne.';
        $info->date = date('Y-m-d', strtotime('2020-06-18'));
        $info->sou_id = '1';
        $info->save();

        $info = new Information();
        $info->titre = 'L\'interdiction de circulation entre wilayas';
        $info->contenu = 'Prenez vos précaution nécessaires pour lutter la propagation de covid-19 et réduise les visites familiale.';
        $info->date = date('Y-m-d', strtotime('2020-07-20'));
        $info->sou_id = '1';
        $info->save();

        $info = new Information();
        $info->titre = 'Empêcher les études';
        $info->contenu = 'Ce confinement à pousser des milliers des étudiants d\'étudier de rester chez eux et étudier à distance.';
        $info->image = 'uploads/info/p4.jpg';
        $info->date = date('Y-m-d', strtotime('2020-05-20'));
        $info->sou_id = '2';
        $info->save();

        $info = new Information();
        $info->titre = 'Reprendre les études';
        $info->contenu = 'Les étudiants ont finalement eu la chance de terminer leurs études en respectant les procédures de protection.';
        $info->image = 'uploads/info/p1.jpg';
        $info->date = date('Y-m-d', strtotime('2020-08-01'));
        $info->sou_id = '2';
        $info->save();

        $info = new Information();
        $info->titre = 'Fermer Lalla Setti';
        $info->contenu = 'Trop de rassemblement les gens ne sont pas conscient ils prennent ce virus a la légère.';
        $info->image = 'uploads/info/p5.jpg';
        $info->date = date('Y-m-d', strtotime('2020-07-20'));
        $info->save();

        $info = new Information();
        $info->titre = 'Ouverture des plages';
        $info->contenu = 'Prendre plusieurs mesure pour assurer la sécurité des citoyens la distance entre estivants, la prise de température à l\'entrée de la plage et mettre les bavettes.';
        $info->image = 'uploads/info/p8.jpg';
        $info->date = date('Y-m-d', strtotime('2020-08-10'));
        $info->sou_id = '6';
        $info->save();

        $info = new Information();
        $info->titre = 'Les éffets du COVID-19 sur les maladies chroniques';
        $info->contenu = 'Vous avez une ou plusieurs maladies chroniques et pour limiter la propagation du COVID-19 et vous protégez, vous sortez le moins possible. Dans cette situation exceptionnelle, il est indispensable de rester très attentif à votre santé en lien avec votre médecin, vos autres soignants et votre entourage. Il est également important de ne pas se fier aux rumeurs.';
        $info->date = date('Y-m-d', strtotime('2020-05-09'));
        $info->sou_id = '1';
        $info->save();

        $info = new Information();
        $info->titre = 'Blida totalement confiné';
        $info->contenu = 'Un confinement total pour une durée de 10 renouvelable avec interdiction de et vers wilaya car c la plus touchée par la pandémie de corona virus covid-19.';
        $info->date = date('Y-m-d', strtotime('2020-04-20'));
        $info->sou_id = '1';
        $info->save();

        $info = new Information();
        $info->image = 'uploads/info/5.jpg';
        $info->date = date('Y-m-d', strtotime('2020-04-29'));
        $info->sou_id = '1';
        $info->save();

        $info = new Information();
        $info->image = 'uploads/info/laver.png';
        $info->date = date('Y-m-d', strtotime('2020-03-29'));
        $info->sou_id = '3';
        $info->save();

        $info = new Information();
        $info->image = 'uploads/info/v.png';
        $info->date = date('Y-m-d', strtotime('2020-05-02'));
        $info->sou_id = '3';
        $info->save();

        $info = new Information();
        $info->image = 'uploads/info/j.png';
        $info->date = date('Y-m-d', strtotime('2020-07-30'));
        $info->sou_id = '3';
        $info->save();

        $info = new Information();
        $info->image = 'uploads/info/co.jpg';
        $info->date = date('Y-m-d', strtotime('2020-05-27'));
        $info->save();

        $info = new Information();
        $info->image = 'uploads/info/coronavirus-protection-mask-vector.jpg';
        $info->date = date('Y-m-d', strtotime('2020-07-22'));
        $info->sou_id = '1';
        $info->save();

        $info = new Information();
        $info->image = 'uploads/info/france-corona.jpg';
        $info->date = date('Y-m-d', strtotime('2020-06-15'));
        $info->sou_id = '1';
        $info->save();
    }
}
