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
		//table('stats')->latest('date')->take(11)->get();
		//Chiffre::whereDate('date', '=', date('Y-m-d'))->get();
		/* $users = DB::table('stats')
        	->selectRaw('SUM(nbrmal)')
            ->groupBy('created_at')
			->get();*/
		$summal = DB::table('stats')
            ->select([DB::raw('sum(nbrmal) as totalmal')])
            ->where(DB::raw("(DATE_FORMAT(date, '%M'))"),date('M'))
			->get();
		$summort = DB::table('stats')
            ->select([DB::raw('sum(nbrmort) as totalmort'),'date'])
            ->groupBy('date')
			->get();
		
		/*DB::table('stats')
			->select([DB::raw('sum(nbrmal) as totalmal'),date('M')])
			->where(DB::raw("(DATE_FORMAT(date, '%M'))"),date('M'))->get();
		$chart = Charts::database($summal, 'line', 'highcharts')
			->title("covid-19 Algérie")
			->colors(['#ff0000', '#ffffff'])
			->dimensions(1000,400)
			->responsive(false)
			->groupByMonth(date('Y'), true);*/
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
		return view('admin.dashboard',['chart2' => $chart2, 'user' => $user, 'info' => $info, 'idée' => $idée, 'signal' => $signal
		, 'nbrmal' => $nbrmal, 'nbrgue' => $nbrgue, 'nbrmort' => $nbrmort, 'usernouv' => $usernouv, 'stats' => $stats]);
	}
	
	public function chart()
      {
        $result = DB::table('stats')
		->select([DB::raw('sum(nbrmal) as totalmal'),'date'])
		->groupBy('date')
		->get();
        return response()->json($result);
      }
	/*function getAllMonths(){
        $month_array = array();
		$posts_dates = Chiffre::orderBy( 'created_at', 'ASC' )->pluck( 'created_at' );
		$posts_dates = json_decode( $posts_dates );

		if ( ! empty( $posts_dates ) ) {
			foreach ( $posts_dates as $unformatted_date ) {
				$date = new \DateTime( $unformatted_date->date );
				$month_no = $date->format( 'm' );
				$month_name = $date->format( 'M' );
				$month_array[ $month_no ] = $month_name;
			}
		}
		return $month_array;
    }
    
    function getMonthlyPostCount( $month ) {
        $monthly_post_count ['nbrmal']= DB::table('stats')
        ->whereMonth( 'created_at', $month )
        ->sum('nbrmal');
        //Chiffre::whereMonth( 'created_at', $month )->get()->count();
		return $monthly_post_count;
    }
    
    function getMonthlyPostData() {

		$monthly_post_count_array = array();
		$month_array = $this->getAllMonths();
		$month_name_array = array();
		if ( ! empty( $month_array ) ) {
			foreach ( $month_array as $month_no => $month_name ){
				$monthly_post_count = $this->getMonthlyPostCount( $month_no );
				array_push( $monthly_post_count_array, $monthly_post_count );
				array_push( $month_name_array, $month_name );
			}
		}

		$max_no = max( $monthly_post_count_array );
		$max = round(( $max_no + 10/2 ) / 10 ) * 10;
		$monthly_post_data_array = array(
			'months' => $month_name_array,
			'post_count_data' => $monthly_post_count_array,
			'max' => $max,
		);

		return $monthly_post_data_array;

    }*/

}
