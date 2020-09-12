<?php

use Illuminate\Database\Seeder;
use App\Signal;

class SignalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $signal = new Signal();
        $signal->contenu = 'La situation est devenue insupportable dans la ville de Nadroma, un dépotoir laissé par les vendeurs illégaux de légumes et de fruits, qui sont sortis sur l\'autoroute';
        $signal->localisation = 'nedroma';
        $signal->image = 'uploads/signal/s1.jpg';
        $signal->date = date('Y-m-d', strtotime('2020-08-14'));
        $signal->cat_id = '1';
        $signal->wilaya_id = '10';
        $signal->cit_id = '1';
        $signal->save();


        $signal = new Signal();
        $signal->contenu = 'Il n\'y a pas d\'eau dans le quartier de Bohanak pendant 7 jours, et nous souffrons surtout ces jours-ci que nous traversons la maladie covid19';
        $signal->localisation = 'bouhanak';
        $signal->date = date('Y-m-d', strtotime('2020-06-18'));
        $signal->cat_id = '1';
        $signal->wilaya_id = '10';
        $signal->cit_id = '2';
        $signal->save();

        $signal = new Signal();
        $signal->contenu = 'Nous, les habitants du quartier d\'Abou Tashfin, souffrons énormément et les déchets n\'ont pas été pris pendant 5 jours. Nous demandons aux autorités supérieures de prendre les mesures nécessaire';
        $signal->localisation = 'aboutechfine';
        $signal->image = 'uploads/signal/s2.jpg';
        $signal->date = date('Y-m-d', strtotime('2020-08-01'));
        $signal->cat_id = '2';
        $signal->wilaya_id = '1';
        $signal->save();

        $signal = new Signal();
        $signal->contenu = 'Les bavettes ont été jetées dans la forêt de Tlemcen de cette manière par des gens qui vont dans la forêt pour se promener';
        $signal->localisation = 'remchi';
        $signal->date = date('Y-m-d', strtotime('2020-08-01'));
        $signal->cat_id = '2';
        $signal->wilaya_id = '10';
        $signal->save();

        $signal = new Signal();
        $signal->contenu = 'La pharmacie de Sidi Saïd a profité de l’occasion pour vendre les produits qu’on a besoin (bavette, gel) avec des prix inacceptables ';
        $signal->localisation = 'remchi';
        $signal->date = date('Y-m-d', strtotime('2020-08-01'));
        $signal->cat_id = '2';
        $signal->wilaya_id = '10';
        $signal->save();
    }
}
