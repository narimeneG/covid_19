<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Charts;
use App\Chiffre;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Information;
use App\Idee;
use App\Signal;

class ChartController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

	function index(){
		$user = User::count();
		$info = Information::count();
		$idée = Idee::count();
		$signal = Signal::count();
		$nbrmal = DB::table('stats')->sum('nbrmal');
		$nbrgue = DB::table('stats')->sum('nbrgue');
		$nbrmort = DB::table('stats')->sum('nbrmort');
		$usernouv = User::whereDate('created_at',DB::raw('CURDATE()'))->count();
		$stats = DB::table('stats')->select('stats.*' ,'wilayas.nom','wilayas.id as w_id')
			->join('wilayas', 'wilayas.id', '=', 'stats.wilaya_id')
			->orderBy('date','desc')->take(11)->get();
		$summal = DB::table('stats')
			->select([DB::raw('sum(nbrmal) as totalmal'),'date'])
			->groupBy('date')
			->get();
		$summort = DB::table('stats')
            ->select([DB::raw('sum(nbrmort) as totalmort'),'date'])
            ->groupBy('date')
			->get();
		$sumgue = DB::table('stats')
            ->select([DB::raw('sum(nbrgue) as totalgue'),'date'])
            ->groupBy('date')
			->get();
		$chart = Charts::create('line', 'highcharts')
			->title("Développement quotidien de nouveaux cas confirmés")
			->labels($summal->pluck('date')->all())
			->values($summal->pluck('totalmal')->all())
			->dimensions(400,400)
			->responsive(true);
		$chart2 = Charts::create('line', 'highcharts')
			->title("L'évolution quotidienne des cas de mortalité")
			->colors(['#d32f2f', '#d32f2f'])
			->labels($summort->pluck('date')->all())
			->values($summort->pluck('totalmort')->all())
			->dimensions(400,400)
			->responsive(true);
		$chart3 = Charts::create('line', 'highcharts')
			->title("Développement quotidien des cas de guérison")
			->colors(['#00c853', '#00c853'])
			->labels($sumgue->pluck('date')->all())
			->values($sumgue->pluck('totalgue')->all())
			->dimensions(400,400)
			->responsive(true);	
		$pie_chart = Charts::create('donut', 'highcharts')
			->title('pourcentage des cas')
			->colors(['#1565c0', '#1b5e20 ','#d50000'])
			->labels(['cas', 'Guérisons', 'Décès'])
			->values([$nbrmal,$nbrgue,$nbrmort])
			->dimensions(400,400)
			->responsive(true);
		
		$nbrmal1 = DB::table('stats')->where('wilaya_id', '1')->sum('nbrmal');
		$nbrmal2 = DB::table('stats')->where('wilaya_id', '2')->sum('nbrmal');
		$nbrmal3 = DB::table('stats')->where('wilaya_id', '3')->sum('nbrmal');
		$nbrmal4 = DB::table('stats')->where('wilaya_id', '4')->sum('nbrmal');
		$nbrmal5 = DB::table('stats')->where('wilaya_id', '5')->sum('nbrmal');
		$nbrmal6 = DB::table('stats')->where('wilaya_id', '6')->sum('nbrmal');
		$nbrmal7 = DB::table('stats')->where('wilaya_id', '7')->sum('nbrmal');
		$nbrmal8 = DB::table('stats')->where('wilaya_id', '8')->sum('nbrmal');
		$nbrmal9 = DB::table('stats')->where('wilaya_id', '9')->sum('nbrmal');
		$nbrmal10 = DB::table('stats')->where('wilaya_id', '10')->sum('nbrmal');
		$nbrmal11 = DB::table('stats')->where('wilaya_id', '11')->sum('nbrmal');
		$donut_mal = Charts::create('donut', 'highcharts')
			->title('Cas par wilaya')
			->colors(['#cddc39', '#dd2c00','#6d4c41', '#ec407a', '#00bfa5','#ff5722', '#d50000', '#ffd600','#ea80fc','#607d8b', '#4fc3f7'])
			->labels(['Blida', 'Sétif', 'Oran', 'Constantine', 'Batna', 'Ouargla', 'Alger', 'Biskra', 'Béjaia', 'Tlemcen', 'El Oued'])
			->values([$nbrmal1,$nbrmal2,$nbrmal3,$nbrmal4,$nbrmal5,$nbrmal6,$nbrmal7,$nbrmal8,$nbrmal9,$nbrmal10,$nbrmal11])
			->dimensions(1000,500)
			->responsive(true);
		$nbrmort1 = DB::table('stats')->where('wilaya_id', '1')->sum('nbrmort');
		$nbrmort2 = DB::table('stats')->where('wilaya_id', '2')->sum('nbrmort');
		$nbrmort3 = DB::table('stats')->where('wilaya_id', '3')->sum('nbrmort');
		$nbrmort4 = DB::table('stats')->where('wilaya_id', '4')->sum('nbrmort');
		$nbrmort5 = DB::table('stats')->where('wilaya_id', '5')->sum('nbrmort');
		$nbrmort6 = DB::table('stats')->where('wilaya_id', '6')->sum('nbrmort');
		$nbrmort7 = DB::table('stats')->where('wilaya_id', '7')->sum('nbrmort');
		$nbrmort8 = DB::table('stats')->where('wilaya_id', '8')->sum('nbrmort');
		$nbrmort9 = DB::table('stats')->where('wilaya_id', '9')->sum('nbrmort');
		$nbrmort10 = DB::table('stats')->where('wilaya_id', '10')->sum('nbrmort');
		$nbrmort11 = DB::table('stats')->where('wilaya_id', '11')->sum('nbrmort');
		$donut_mort = Charts::create('donut', 'highcharts')
			->title('Décés par wilaya')
			->colors(['#cddc39', '#dd2c00','#6d4c41', '#ec407a', '#00bfa5','#ff5722', '#d50000', '#ffd600','#ea80fc','#607d8b', '#4fc3f7'])
			->labels(['Blida', 'Sétif', 'Oran', 'Constantine', 'Batna', 'Ouargla', 'Alger', 'Biskra', 'Béjaia', 'Tlemcen', 'El Oued'])
			->values([$nbrmort1,$nbrmort2,$nbrmort3,$nbrmort4,$nbrmort5,$nbrmort6,$nbrmort7,$nbrmort8,$nbrmort9,$nbrmort10,$nbrmort11])
			->dimensions(1000,500)
			->responsive(true);
		$nbrgue1 = DB::table('stats')->where('wilaya_id', '1')->sum('nbrgue');
		$nbrgue2 = DB::table('stats')->where('wilaya_id', '2')->sum('nbrgue');
		$nbrgue3 = DB::table('stats')->where('wilaya_id', '3')->sum('nbrgue');
		$nbrgue4 = DB::table('stats')->where('wilaya_id', '4')->sum('nbrgue');
		$nbrgue5 = DB::table('stats')->where('wilaya_id', '5')->sum('nbrgue');
		$nbrgue6 = DB::table('stats')->where('wilaya_id', '6')->sum('nbrgue');
		$nbrgue7 = DB::table('stats')->where('wilaya_id', '7')->sum('nbrgue');
		$nbrgue8 = DB::table('stats')->where('wilaya_id', '8')->sum('nbrgue');
		$nbrgue9 = DB::table('stats')->where('wilaya_id', '9')->sum('nbrgue');
		$nbrgue10 = DB::table('stats')->where('wilaya_id', '10')->sum('nbrgue');
		$nbrgue11 = DB::table('stats')->where('wilaya_id', '11')->sum('nbrgue');
		$donut_gue = Charts::create('donut', 'highcharts')
			->title('Guérisons par wilaya')
			->colors(['#cddc39', '#dd2c00','#6d4c41', '#ec407a', '#00bfa5','#ff5722', '#d50000', '#ffd600','#ea80fc','#607d8b', '#4fc3f7'])
			->labels(['Blida', 'Sétif', 'Oran', 'Constantine', 'Batna', 'Ouargla', 'Alger', 'Biskra', 'Béjaia', 'Tlemcen', 'El Oued'])
			->values([$nbrgue1,$nbrgue2,$nbrgue3,$nbrgue4,$nbrgue5,$nbrgue6,$nbrgue7,$nbrgue8,$nbrgue9,$nbrgue10,$nbrgue11])
			->dimensions(1000,500)
			->responsive(true);
		return view('admin.dashboard',['chart2' => $chart2, 'chart' => $chart,'chart3' => $chart3,'pie_chart' => $pie_chart, 
		'donut_mal' => $donut_mal, 'donut_mort' => $donut_mort, 'donut_gue' => $donut_gue, 'user' => $user, 'info' => $info, 'idée' => $idée, 'signal' => $signal,
		 'nbrmal' => $nbrmal, 'nbrgue' => $nbrgue,'nbrmort' => $nbrmort, 'usernouv' => $usernouv, 'stats' => $stats]);
	}
	
}
