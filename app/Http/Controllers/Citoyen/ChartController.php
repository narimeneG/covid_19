<?php

namespace App\Http\Controllers\Citoyen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Charts;
use App\Chiffre;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Information;
use App\Idee;
use App\Signal;
use App\Wilaya;

class ChartController extends Controller
{
	function index(){
		$nbrmal = DB::table('stats')->sum('nbrmal');
		$nbrgue = DB::table('stats')->sum('nbrgue');
		$nbrmort = DB::table('stats')->sum('nbrmort');
		$nvcas = DB::table('stats')->whereDate('date',DB::raw('CURDATE()'))->sum('nbrmal');
        $nvmort = DB::table('stats')->whereDate('date',DB::raw('CURDATE()'))->sum('nbrmort');
        $nvgue = DB::table('stats')->whereDate('date',DB::raw('CURDATE()'))->sum('nbrgue');
		$stats = DB::table('stats')->select('stats.*' ,'wilayas.nom','wilayas.id as w_id')
			->join('wilayas', 'wilayas.id', '=', 'stats.wilaya_id')
			->orderBy('date','desc')->take(11)->get();
		//table('stats')->latest('date')->take(11)->get();
		//Chiffre::whereDate('date', '=', date('Y-m-d'))->get();
		/* $users = DB::table('stats')
        	->selectRaw('SUM(nbrmal)')
            ->groupBy('created_at')
			->get();*/
		$summal = DB::table('stats')
            ->select([DB::raw('sum(nbrmal) as totalmal'),'date'])
            ->groupBy('date')
			->get();
		$summort = DB::table('stats')
            ->select([DB::raw('sum(nbrmort) as totalmort'),'date'])
            ->groupBy('date')
			->get();
		$chart = Charts::create('line', 'highcharts')
			->title("covid-19 Algérie")
			->colors(['#ff0000', '#ffffff'])
			->labels($summal->pluck('date')->all())
			->values($summal->pluck('totalmort')->all())
			->dimensions(400,400)
			->responsive(true);
		/*$chart2 = Charts::multi('percentage', 'justgage')
				    ->title('Percentage Chart Demo')
				    ->elementLabel('Chart Labels')
					->dataset('Product 1',[65,0,100])
					->dataset('Product 2',[0,0,100])
				    ->responsive(true)
				    ->height(300)
				    ->width(0);*/
		$chart2 = Charts::create('line', 'highcharts')
			->title("Les morts")
			->labels($summort->pluck('date')->all())
			->values($summort->pluck('totalmort')->all())
			->dimensions(400,400)
			->responsive(true);
			
			/*$chart2 = Charts::multi('line', 'highcharts')
				    ->title('Areaspline Chart Demo')
				    ->colors(['#ff0000', '#ffffff'])
				    ->labels(['Jan', 'Feb', 'Mar', 'Apl', 'May','Jun'])
				    ->dataset('Product 1', [10, 15, 20, 25, 30, 35])
					->dataset('Product 2',  [14, 19, 26, 32, 40, 50,60]);*/
		return view('user.index',['chart2' => $chart2, 'nbrmal' => $nbrmal, 'nbrgue' => $nbrgue, 'nbrmort' => $nbrmort, 'stats' => $stats,
		'nvcas' => $nvcas, 'nvmort' => $nvmort, 'nvgue' => $nvgue]);
	}
	
	public function show($id)
    {
        $wilaya = Wilaya::where('id',$id)->first()->nom;
        $stats = Chiffre::where('wilaya_id', $id)->get();
        $nbrmal = DB::table('stats')->where('wilaya_id', $id)->sum('nbrmal');
        $nbrgue = DB::table('stats')->where('wilaya_id', $id)->sum('nbrgue');
        $nbrmort = DB::table('stats')->where('wilaya_id', $id)->sum('nbrmort');
        $nvcas = DB::table('stats')->select('nbrmal')->where('wilaya_id', $id)->orderBy('date','desc')->first()->nbrmal;
        $nvmort = DB::table('stats')->select('nbrmort')->where('wilaya_id', $id)->orderBy('date','desc')->first()->nbrmort;
        $nvgue = DB::table('stats')->select('nbrgue')->where('wilaya_id', $id)->orderBy('date','desc')->first()->nbrgue;
        $summal = DB::table('stats')
            ->select([DB::raw('sum(nbrmal) as totalmal'),'date'])
            ->where('wilaya_id', $id)
            ->groupBy('date')
            ->get();
        $summort = DB::table('stats')
            ->select([DB::raw('sum(nbrmort) as totalmort'),'date'])
            ->where('wilaya_id', $id)
            ->groupBy('date')
            ->get();
        $sumgue = DB::table('stats')
            ->select([DB::raw('sum(nbrgue) as totalgue'),'date'])
            ->where('wilaya_id', $id)
            ->groupBy('date')
			->get();
		$linemal = Charts::create('line', 'highcharts')
			->title("Les malades")
			->labels($summal->pluck('date')->all())
			->values($summal->pluck('totalmal')->all())
			->dimensions(400,400)
            ->responsive(true);
        $barmal = Charts::create('bar', 'highcharts')
			->title("Les malades")
			->labels($summal->pluck('date')->all())
			->values($summal->pluck('totalmal')->all())
			->dimensions(400,400)
            ->responsive(true);
        $linemort = Charts::create('line', 'highcharts')
            ->title("Les morts")
            ->colors(['#d32f2f', '#d32f2f'])
			->labels($summort->pluck('date')->all())
			->values($summort->pluck('totalmort')->all())
			->dimensions(400,400)
            ->responsive(true);
        $barmort = Charts::create('bar', 'highcharts')
            ->title("Les morts")
            ->colors(['#d32f2f', '#d32f2f'])
			->labels($summort->pluck('date')->all())
			->values($summort->pluck('totalmort')->all())
			->dimensions(400,400)
            ->responsive(true);
        $linegue = Charts::create('line', 'highcharts')
            ->title("Les guéris")
            ->colors(['#00c853', '#00c853'])
			->labels($sumgue->pluck('date')->all())
			->values($sumgue->pluck('totalgue')->all())
			->dimensions(400,400)
            ->responsive(true);
        $bargue = Charts::create('bar', 'highcharts')
            ->title("Les guéris")
            ->colors(['#00c853', '#00c853'])
			->labels($sumgue->pluck('date')->all())
			->values($sumgue->pluck('totalgue')->all())
			->dimensions(400,400)
			->responsive(true);
        return view('user.wilayaStat',['wilaya' => $wilaya, 'stats' => $stats, 'nbrmort' => $nbrmort, 'nbrmal' => $nbrmal, 
        'nbrgue' => $nbrgue, 'nvcas' => $nvcas, 'nvmort' => $nvmort, 'nvgue' => $nvgue, 'linemal' => $linemal, 'barmal' => $barmal, 
        'linemort' => $linemort, 'barmort' => $barmort, 'linegue' => $linegue, 'bargue' => $bargue]);
    }

}
